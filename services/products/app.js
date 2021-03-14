var app = angular.module("app", []);
app.controller("controller", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope.form_title = "ເພີ່ມຄອສ໌";
  // notification
  function _Success() {
    Notiflix.Notify.Success("ການດຳເນີນງານສຳເລັດ");
  }

  function _Warning(e) {
    Notiflix.Notify.Warning(e);
  }

  function _Fail() {
    Notiflix.Notify.Failure("ການດຳເນີນງານບໍ່ສຳເລັດ");
  }

  // CALL PRODUCTS
  $scope._callProducts = function () {
    $http.get("sql/query_products.php").success(function (data) {
      $scope._products = data;
      $scope._length = data.length;
    });
  };
  // CALL CATEGORY
  $scope._callCategory = function () {
    $http.get("../category/sql/query_category.php").success(function (data) {
      $scope._categorys = data;
    });
  };

  // INSERT DATA
  $scope._onSave = function () {
    if ($scope.pro_cate_id == null) {
      _Warning("ກະລຸນາປ້ອນປະເພດຄອສ໌");
    } else if ($scope.pro_title == null) {
      _Warning("ກະລຸນາປ້ອນຄອສ໌");
    } else if ($scope.price_for_time & ($scope.pro_qty == null)) {
      _Warning("ກະລຸນາປ້ອນຈຳນວນຄັ້ງໃນ/ຄອສ໌");
    } else if ($scope.price_for_course == null) {
      _Warning("ກະລຸນາປ້ອນລາຄາ/ຄອສ໌");
    } else if ($scope.price_for_time == null) {
      _Warning("ກະລຸນາປ້ອນລາຄາ/ຄັ້ງ");
    } else {
      $http
        .post("./sql/create_products.php", {
          pro_id: $scope.pro_id,
          pro_cate_id: $scope.pro_cate_id,
          pro_title: $scope.pro_title,
          price_for_course: $scope.price_for_course,
          pro_qty: $scope.pro_qty,
          price_for_time: $scope.price_for_time,
          pro_note: $scope.pro_note,
          btnName: $scope.btnName
        })
        .success(function (output) {
          if (output == "DATA_READY_EXIT") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ");
          } else if (output == 7070) {
            _Success();
            $scope.pro_id = null;
            $scope.pro_cate_id = null;
            $scope.pro_title = null;
            $scope.price_for_course = null;
            $scope.pro_qty = null;
            $scope.price_for_time = null;
            $scope.pro_note = null;
            $scope.btnName = "ບັນທຶກ";

            $scope._callProducts();
          } else {
            _Fail();
          }
        });
    }
  };
  // CLEAR FORM
  $scope._clear = function () {
    $scope.pro_id = null;
    $scope.pro_cate_id = null;
    $scope.pro_title = null;
    $scope.price_for_course = null;
    $scope.pro_qty = null;
    $scope.price_for_time = null;
    $scope.pro_note = null;
  };
  // UPDATE DATA
  $scope._onUpdate = function (x) {
    ($scope.pro_id = x.pro_id),
      ($scope.pro_cate_id = x.pro_cate_id),
      ($scope.pro_title = x.pro_title),
      ($scope.price_for_course = x.price_for_course),
      ($scope.pro_qty = x.pro_qty),
      ($scope.price_for_time = x.price_for_time),
      ($scope.pro_note = x.pro_note),
      ($scope.btnName = "ແກ້ໄຂ");
    $scope.form_title = "ແກ້ໄຂຄອສ໌";
  };
  // DELETE DATA
  $scope._onDelete = function (id) {
    Notiflix.Confirm.Show(
      "ສະຖານະ",
      "ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ່ ?",
      "ຕົກລົງ",
      "ຍົກເລີກ",
      function () {
        $http
          .post("sql/delete_products.php", {
            pro_id: id
          })
          .success(function (data) {
            if (data == 7070) {
              _Success();
              $scope._callProducts();
            } else {
              _Fail();
            }
          });
      },
      function () {
        $scope._callProducts();
      }
    );
  };
});
