var app = angular.module("app", []);
app.controller("user", function ($scope, $http) {
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
  $scope._callUsers = function () {
    $http.get("sql/user-query.php").success(function (data) {
      $scope._users = data;
      $scope._length = data.length;
    });
  };

  // DELETE DATA
  $scope._onDelete = function (id) {
    Notiflix.Confirm.Show(
      "ສະຖານະ",
      "ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ່ ?",
      "ຕົກລົງ",
      "ຍົກເລີກ",
      function () {
        $http.post("sql/delete-user.php", { id: id }).success(function (data) {
          if (data == 200) {
            _Success();
            $scope._onReset();
            $scope._callUsers();
          } else {
            _Fail();
            $scope._callUsers();
          }
        });
      },
      function () {
        $scope._callUsers();
      }
    );
  };
});
