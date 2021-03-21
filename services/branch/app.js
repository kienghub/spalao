var app = angular.module("app", []);
app.controller("controller", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope.titles = "ເພີ່ມຂໍ້ມູນສາຂາ";
  var addBranch = angular.element("#addBranch");
  function _Success() {
    Notiflix.Notify.Success("ການດຳເນີນງານສຳເລັດ");
  }

  function _Warning(e) {
    Notiflix.Notify.Warning(e);
  }

  function _Fail() {
    Notiflix.Notify.Failure("ການດຳເນີນງານບໍ່ສຳເລັດ");
  }
  $scope._refresh = function () {
    window.location.reload();
  };
  // QUERY DATA
  $scope._callBranch = function () {
    $http.get("sql/query_branch.php").success(function (data) {
      $scope._branchs = data;
      $scope._length = data.length;
    });
  };
  // INSERT DATA
  $scope._onSave = function () {
    if ($scope.branch_name_l == null) {
      _Warning("ກະລຸນາປ້ອນຊື່ສາຂາກ່ອນ");
    } else {
      $http
        .post("sql/create_branch.php", {
          branch_id: $scope.branch_id,
          branch_name_l: $scope.branch_name_l,
          branch_name_e: $scope.branch_name_e,
          btnName: $scope.btnName
        })
        .success(function (output) {
          if (output == "DATA_READY_EXIT") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ");
          } else if (output == 7070) {
            _Success();
            $scope.branch_id = null;
            $scope.branch_name_l = null;
            $scope.branch_name_e = null;
            $scope.btnName = "ບັນທຶກ";
            $scope._callBranch();
          } else {
            _Fail();
            $scope._callBranch();
          }
        });
    }
  };
  //   UPDATE DATA
  $scope._onUpdate = function (data) {
    ($scope.branch_id = data.branch_id),
      ($scope.branch_name_l = data.branch_name_l),
      ($scope.branch_name_e = data.branch_name_e),
      ($scope.titles = "ແກ້ໄຂຂໍ້ມູນສາຂາ");
    $scope.btnName = "ແກ້ໄຂ";
    addBranch.modal("show");
  };

  // DELETE DATA
  $scope._onDelete = function (id) {
    Notiflix.Confirm.Show(
      "ສະຖານະ",
      "ຕ້ອງການ ລຶບຂໍ້ມູນນີ້ ແທ້ບໍ່?",
      "ຕົກລົງ",
      "ຍົກເລີກ",
      function () {
        $.ajax({
          url: "./sql/delete_branch.php",
          type: "GET",
          data: { id: id },
          success: function (dataResult) {
            if (dataResult == "SUCCESS") {
              _Success();
              $scope._callBranch();
            } else {
              _Fail();
              $scope._callBranch();
            }
          }
        });
      }
    );
  };
});
