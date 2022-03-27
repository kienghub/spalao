var app = angular.module("app", ["datatables"]);
app.controller("package", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope.form_title = "ເພີ່ມແພັກເກັຈ";
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
  $scope._reset = function () {
    window.location.reload();
  };

  // display data
  $scope._cateSelected = function () {
    var cate_id = $scope.cate_id;
    $http.get("./sql/query_product.php?id=" + cate_id).success(function (data) {
      $scope._product = data;
    });
  };

  $scope._callPackage = function () {
    $http.get("./sql/query_package.php").success(function (data) {
      $scope._package = data;
    });
  };
  // insert data
  $scope._onSave = function () {
    if (!$scope.pro_id) {
      $('[ng-model="pro_id"]').focus();
      _Warning("ກະລຸນາເລືອກລາຍການຄອສ໌ກ່ອນ");
    } else if (!$scope.package_name) {
      $('[ng-model="package_name"]').focus();
      _Warning("ກະລຸນາປ້ອນຊື່ແພັກເກັຈກ່ອນ");
    } else if (!$scope.package_type) {
      $('[ng-model="package_type"]').focus();
      _Warning("ກະລຸນາເລືອກປະເພດແພັກເກັຈກ່ອນ");
    } else if (!$scope.package_price) {
      $('[ng-model="package_price"]').focus();
      _Warning("ກະລຸນາປ້ອນລາຄາແພັກເກັຈກ່ອນ");
    } else if (!$scope.package_qty) {
      $('[ng-model="package_qty"]').focus();
      _Warning("ກະລຸນາປ້ອນຈຳນວນແພັກເກັຈກ່ອນ");
    } else {
      $http
        .post("sql/create_package.php", {
          _id: $scope._id,
          pro_id: $scope.pro_id,
          package_name: $scope.package_name,
          package_type: $scope.package_type,
          package_price: Number($scope.package_price.replace(/[^0-9.-]+/g, "")),
          package_qty: Number($scope.package_qty.replace(/[^0-9.-]+/g, "")),
          note: $scope.note,
          btnName: $scope.btnName
        })
        .success(function (output) {
          console.log(output);
          if (output == "DATA_READY_EXIT") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ");
          } else if (output == 200) {
            $scope._callPackage();
            _Success();
            setTimeout(() => {
              window.location.reload();
            }, 2000);
            $scope.pro_id = null;
            $scope.package_name = null;
            $scope.pro_title = null;
            $scope.package_qty = null;
            $scope.package_price = null;
            $scope.package_qty = null;
            $scope.btnName = "ບັນທຶກ";
          } else {
            _Fail();
          }
        });
    }
  };
  // UPDATE DATA
  $scope._onUpdate = function (x) {
    $scope._id = x._id;
    $scope.pro_id = x.pro_id;
    $scope.pro_title = x.pro_title;
    $scope.package_name = x.package_name;
    $scope.package_price = x.package_price;
    $scope.package_type = x.package_type;
    $scope.package_qty = x.package_qty;
    $scope.note = x.note;
    $scope.btnName = "ແກ້ໄຂ";
    $scope.form_title = "ແກ້ໄຂແພັກເກັຈ";
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
          .post("sql/delete_package.php", {
            _id: id
          })
          .success(function (data) {
            if (data == 200) {
              _Success();
              $scope._callPackage();
            } else {
              _Fail();
            }
          });
      },
      function () {
        $scope._callPackage();
      }
    );
  };
});
