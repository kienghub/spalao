var app = angular.module("app", ["datatables"]);
app.controller("equiment", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope.form_title = "ເພີ່ມອັດຕາແລກປ່ຽນ";
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
  $scope._callEquiment = function () {
    $http.get("sql/query_equiment.php").success(function (data) {
      $scope._equiment = data;
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
        $http
          .post("./sql/delete-equiment.php", {
            id: id
          })
          .success(function (data) {
            if (data == 200) {
              _Success();
              $scope._callEquiment();
            } else {
              _Fail();
            }
          });
      },
      function () {
        $scope._callEquiment();
      }
    );
  };
});
