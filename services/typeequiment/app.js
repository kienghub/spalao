var app = angular.module("app", []);
app.controller("controller", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope.form_title = "ເພີ່ມປະເພດອຸປະກອນ";
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

  // display data
  $scope._callTypeEqument = function () {
    $http.get("sql/query_type.php").success(function (data) {
      $scope._typeequiment = data;
      $scope.count = data.length;
    });
  };

  // insert data
  $scope._onSave = function () {
    if ($scope.etype_name_l == null) {
      _Warning("ກະລຸນາປ້ອນປະເພດອຸປະກອນ");
    } else {
      $http
        .post("sql/create_type.php", {
          etype_id: $scope.etype_id,
          etype_name_l: $scope.etype_name_l,
          etype_name_e: $scope.etype_name_e,
          btnName: $scope.btnName
        })
        .success(function (output) {
          console.log(output);
          if (output == "DATA_READY_EXIT") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ");
          } else if (output == 3000) {
            _Success();
            $scope.etype_id = null;
            $scope.etype_name_l = null;
            $scope.etype_name_e = null;
            $scope.btnName = "ບັນທຶກ";
            $scope.form_title = "ເພີ່ມປະເພດອຸປະກອນ";
            $scope._callTypeEqument();
          } else {
            _Fail();
          }
        });
    }
  };
  // CLEAR FORM
  $scope._clear = function () {
    $scope.etype_id = null;
    $scope.etype_name_l = null;
    $scope.etype_name_e = null;
  };
  // UPDATE DATA
  $scope._onUpdate = function (x) {
    console.log({ x });
    $scope.etype_id = x.etype_id;
    $scope.etype_name_l = x.etype_name_l;
    $scope.etype_name_e = x.etype_name_e;
    $scope.btnName = "ແກ້ໄຂ";
    $scope.form_title = "ແກ້ໄຂປະເພດອຸປະກອນ";
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
          .post("sql/delete_type.php", {
            etype_id: id
          })
          .success(function (data) {
            if (data == 3000) {
              _Success();
              $scope._callTypeEqument();
            } else {
              _Fail();
            }
          });
      },
      function () {
        $scope._callTypeEqument();
      }
    );
  };
});
