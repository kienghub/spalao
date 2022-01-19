var app = angular.module("app", []);
app.controller("controller", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope._living = true;
  $scope._liveSearch = function () {
    $scope._living = false;
  };
  $scope._clearSearch = function () {
    $scope._living = true;
  };
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
  $scope._callUsers = function () {
    $http.get("sql/user-query.php").success(function (data) {
      $scope._users = data;
    });
  };
  $scope._callMember = function () {
    $http.get("sql/query_member.php").success(function (data) {
      $scope._member = data;
    });
  };

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
            if (data == 200) {
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
  $scope._selectType = function (x) {
    $scope.type = x;
  };
  $scope._showUser = function (data) {
    $scope.user_img = data.user_img;
    $scope.user_fname = data.user_fname;
    $scope.user_lname = data.user_lname;
  };

  $scope.addToCart = function (title, url, w, h) {
    layer.open({
      type: 2,
      area: [w + "%", h + "%"],
      fix: true,
      maxmin: true,
      shade: 0.4,
      title: title,
      content: url
    });
  };
});
