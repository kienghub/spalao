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

  $scope._callPackage = function () {
    $http.get("./sql/query_package.php").success(function (data) {
      $scope._package = data;
    });
  };

  $scope._onFilter = function () {
    var st_date = moment($scope.st_date).format("YYYY-MM-DD");
    var end_date = moment($scope.end_date).format("YYYY-MM-DD");
    $http
      .get(
        "./sql/query_package.php?st_date=" + st_date + "&end_date=" + end_date
      )
      .success(function (data) {
        $scope._package = data;
      });
  };
  // insert data
  $scope._onSave = function () {
    if (!$scope.package_id_fk) {
      $('[ng-model="package_id_fk"]').focus();
      _Warning("ກະລຸນາເລືອກແພັກເກັຈກ່ອນ");
    } else if (!$scope.add_package_qty) {
      $('[ng-model="add_package_qty"]').focus();
      _Warning("ກະລຸນາປ້ອນຈຳນວນແພັກເກັຈກ່ອນ");
    } else {
      $http
        .post("sql/create_package.php", {
          _id: $scope._id,
          package_id_fk: $scope.package_id_fk,
          add_package_qty: Number(
            $scope.add_package_qty.replace(/[^0-9.-]+/g, "")
          ),
          old_qty: Number($scope.old_qty),
          package_note: $scope.package_note,
          btnName: $scope.btnName
        })
        .success(function (output) {
          console.log(output);
          if (output == "DATA_READY_EXIT") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ");
          } else if (output == 200) {
            $scope._callPackage();
            _Success();

            $scope._id = null;
            $scope.package_id_fk = null;
            $scope.add_package_qty = null;
            $scope.package_note = null;
            $scope.btnName = "ບັນທຶກ";
          } else {
            _Fail();
          }
        });
    }
  };
  // UPDATE DATA
  $scope._onUpdate = function (x) {
    $scope._id = x.p_id;
    $scope.package_id_fk = x.package_id_fk;
    $scope.add_package_qty = x.add_package_qty;
    $scope.package_note = x.package_note;

    $scope.old_qty = x.add_package_qty;
    $scope.btnName = "ແກ້ໄຂ";
    $scope.form_title = "ແກ້ໄຂແພັກເກັຈ";
  };

  // DELETE DATA
  $scope._onDelete = function (id, package_id_fk, package_qty) {
    Notiflix.Confirm.Show(
      "ສະຖານະ",
      "ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ່ ?",
      "ຕົກລົງ",
      "ຍົກເລີກ",
      function () {
        $http
          .post("sql/delete_package.php", {
            _id: id,
            package_id_fk: package_id_fk,
            package_qty: package_qty
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
