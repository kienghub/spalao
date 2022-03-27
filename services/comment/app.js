var app = angular.module("app", ["datatables"]);
app.controller("comment", function ($scope, $http) {
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
  $scope._callComment = function () {
    $http.get("sql/queryComment.php").success(function (data) {
      $scope._comment = data;
      $scope._length = data.length;
    });
  };
});
