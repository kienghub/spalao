var app = angular.module("app", ["datatables"]);
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
  $("#insert_data").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "./sql/create_products.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(data);
        if (data == "PRO_CATE_ID_INVALID") {
          _Warning("ກະລຸນາເລືອກປະເພດຄອສ໌ກ່ອນ");
        } else if (data == "PRO_TITLE_INVALID") {
          _Warning("ກະລຸນາປ້ອ່ນຊື່ຄອສ໌ກ່ອນ");
        } else if (data == "PRICE_FOR_COURSE_INVALID") {
          _Warning("ກະລຸນາປ້ອນລາຄາ/ຄອສ໌ກ່ອນ");
        } else if (data == "PRO_QTY_INVALID") {
          _Warning("ກະລຸນາປ້ອນຈຳນວນກ່ອນ");
        } else if (data == "PRICE_FOR_TIME_INVALID") {
          _Warning("ກະລຸນາລາຄາ/ຄັ້ງກ່ອນ");
        } else if (data == 200) {
          _Success();
          $scope._callProducts();
          $scope.titles = "ເພີ່ມຂໍ້ມູນເກມ";
          $scope.btnName = "ບັນທຶກ";
          $scope.pro_img = null;
          $("#insert_data").trigger("reset");
          $("#preview").attr("src", "../../img/photo.jpg");
        } else {
          _Fail();
        }
      }
    });
  });
  // CLEAR FORM
  $scope._clear = function () {
    $scope.pro_img = null;
    $("#insert_data").trigger("reset");
    $("#preview").attr("src", "../../img/photo.jpg");
  };
  // UPDATE DATA
  $scope._onUpdate = function (x) {
    $scope.pro_id = x.pro_id;
    $scope.pro_cate_id = x.pro_cate_id;
    $scope.pro_title = x.pro_title;
    $scope.price_for_course = x.price_for_course;
    $scope.pro_qty = x.pro_qty;
    $scope.price_for_time = x.price_for_time;
    $scope.pro_note = x.pro_note;
    $scope.pro_img = x.pro_img;
    $scope.btnName = "ແກ້ໄຂ";
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
            if (data == 200) {
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
