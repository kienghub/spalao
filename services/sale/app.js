var app = angular.module("app", []);
app.controller("controller", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
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
  $scope._callCategory = function () {
    $http.get("sql/call_category.php").success(function (data) {
      $scope._callcate = data;
      $scope._length = data.length;
    });
  };

  $scope._callProduct = function () {
    $http.get("sql/query_product.php").success(function (data) {
      $scope._callproduct = data;
      $scope._length = data.length;
    });
  };

  $scope._onSelected = function (id) {
    $scope.cate_id = id;
  };

  // DELETE DATA
  $scope._onDelete = function (id) {
    console.log(id);
    Notiflix.Confirm.Show(
      "ສະຖານະ",
      "ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ່ ?",
      "ຕົກລົງ",
      "ຍົກເລີກ",
      function () {
        $http
          .post("sql/delete_history.php", { id: id })
          .success(function (data) {
            if (data == 7070) {
              _Success();
              $scope._callData();
            } else {
              _Fail();
            }
          });
      },
      function () {
        $scope._callData();
      }
    );
  };
});
