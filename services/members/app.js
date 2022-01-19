var app = angular.module("app", ["datatables"]);
app.controller("member", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope.titles = "ເພີ່ມຂໍ້ມູນສະມາຊິກ";
  $scope._delete = true;
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
  $scope._callMemberData = function () {
    $http.get("sql/query_member.php").success(function (data) {
      $scope._members = data;
      $scope._length = data.length;
    });
  };
  // INSERT DATA
  $scope._onSave = function () {
    if ($scope.mb_fullName == null) {
      _Warning("ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນກ່ອນ");
      $('[ng-model="mb_fullName"]').focus();
    } else if ($scope.mb_phoneNumber == null) {
      _Warning("ກະລຸນາປ້ອນເບີໂທກ່ອນ");
    } else if ($scope.mb_address == null) {
      _Warning("ກະລຸນາປ້ອນທີ່ຢູ່ກ່ອນ");
    } else {
      $http
        .post("sql/create_member.php", {
          mb_id: $scope.mb_id,
          mb_fullName: $scope.mb_fullName,
          mb_phoneNumber: $scope.mb_phoneNumber,
          mb_address: $scope.mb_address,
          mb_note: $scope.mb_note,
          btnName: $scope.btnName
        })
        .success(function (output) {
          if (output == "DATA_READY_EXIT") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ");
          } else if (output == 200) {
            _Success();
            $scope.mb_id = null;
            $scope.mb_fullName = null;
            $scope.mb_phoneNumber = null;
            $scope.mb_address = null;
            $scope.mb_note = null;
            $scope.btnName = "ບັນທຶກ";
            $scope._callMemberData();
          } else {
            _Fail();
            $scope._callMemberData();
          }
        });
    }
  };

  //   CLEAR FORM
  $scope._onReset = function () {
    $scope.mb_id = null;
    $scope.mb_fullName = null;
    $scope.mb_phoneNumber = null;
    $scope.mb_address = null;
    $scope.mb_note = null;
    $scope.btnName = "ບັນທຶກ";
    $scope._edit = false;
    $scope._delete = true;
  };
  //   UPDATE DATA
  $scope._onUpdate = function (data) {
    $scope.mb_id = data.mb_id;
    $scope.mb_fullName = data.mb_fullName;
    $scope.mb_phoneNumber = Number(data.mb_phoneNumber);
    $scope.mb_address = data.mb_address;
    $scope.titles = "ແກ້ໄຂຂໍ້ມູນສະມາຊິກ";
    $scope.btnName = "ແກ້ໄຂ";
    $scope._edit = true;
    $scope._delete = false;
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
          .post("sql/delete_member.php", { id: id })
          .success(function (data) {
            if (data == 200) {
              _Success();
              $scope._onReset();
              $scope._callMemberData();
            } else {
              _Fail();
              $scope._callMemberData();
            }
          });
      },
      function () {
        $scope._callMemberData();
      }
    );
  };
});
