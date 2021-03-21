var app = angular.module("app", []);
app.controller("controller", function ($scope, $http) {
  $scope.btnName = "ບັນທຶກ";
  $scope.form_title = "ເພີ່ມປະເພດຄອສ໌";
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
    $http.get("sql/query_category.php").success(function (data) {
      $scope._categorys = data;
      $scope._length = data.length;
    });
  };

  // insert data
  $scope._onSave = function () {
    if ($scope.cate_title == null) {
      _Warning("ກະລຸນາປ້ອນປະເພດຄອສ໌");
    } else {
      $http
        .post("sql/create_category.php", {
          cate_id: $scope.cate_id,
          cate_title: $scope.cate_title,
          cate_note: $scope.cate_note,
          btnName: $scope.btnName
        })
        .success(function (output) {
          // var arr=output.split(',')
          // var _catch=arr[0]
          // var id=arr[1];
          if (output == "DATA_READY_EXIT") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ");
          } else if (output == 7070) {
            _Success();
            $scope.cate_id = null;
            $scope.cate_title = null;
            $scope.cate_note = null;
            $scope.btnName = "ບັນທຶກ";

            $scope._callCategory();
          } else {
            _Fail();
          }
        });
    }
  };
  // CLEAR FORM
  $scope._clear = function () {
    $scope.cate_id = null;
    $scope.cate_title = null;
    $scope.cate_note = null;
  };
  // UPDATE DATA
  $scope._onUpdate = function (x) {
    $scope.cate_id = x.cate_id;
    $scope.cate_title = x.cate_title;
    $scope.cate_note = x.cate_note;
    $scope.btnName = "ແກ້ໄຂ";
    $scope.form_title = "ແກ້ໄຂປະເພດຄອສ໌";
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
          .post("sql/delete_category.php", {
            cate_id: id
          })
          .success(function (data) {
            if (data == 7070) {
              _Success();
              $scope._callCategory();
            } else {
              _Fail();
            }
          });
      },
      function () {
        $scope._callCategory();
      }
    );
  };
});
