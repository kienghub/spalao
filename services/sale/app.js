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

  $scope.layer_show = function (title, url, w, h, id) {
    if (title == null || title == "") {
      title = false;
    }
    if (url == null || url == "") {
      url = "http://localhost/spalao/services/users/user-profile.php?id=" + id;
    }
    if (w == null || w == "") {
      w = 800;
    }
    if (h == null || h == "") {
      h = $(window).height() - 50;
    }
    layer.open({
      type: 2,
      area: [w + "px", h + "px"],
      fix: true,
      maxmin: true,
      shade: 0.4,
      title: title,
      content: url
    });
  };
});
