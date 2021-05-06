var app = angular.module("app", ["datatables"]);
app.controller("rate", function ($scope, $http) {
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
  $scope._callRate = function () {
    $http.get("sql/query_rate.php").success(function (data) {
      $scope._rate = data;
      $scope._length = data.length;
    });
  };
  // CREATE DATA
  $("#onSubmitRate").on("submit", function (event) {
    event.preventDefault();
    var rate_THB = $("#rate_THB").val();
    var rate_USD = $("#rate_USD").val();
    if (rate_THB == "") {
      _Warning("ກະລຸນາປ້ອນອັດຕາແລກປ່ຽນ(THB)ກ່ອນ");
    } else if (rate_USD == "") {
      _Warning("ກະລຸນາປ້ອນອັດຕາແລກປ່ຽນ(USD)ກ່ອນ");
    } else {
      $.ajax({
        url: "./sql/create_rate.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (data) {
          if (data == "DUPLICATE") {
            _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີໃນຖານຂໍ້ມູນແລ້ວ");
          }
          if (data == 200) {
            _Success();
            $scope._callRate();
          } else {
            _Fail();
            $scope._callRate();
          }
        }
      });
    }
  });

  // DELETE DATA
  $scope._onDelete = function (id) {
    Notiflix.Confirm.Show(
      "ສະຖານະ",
      "ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ່ ?",
      "ຕົກລົງ",
      "ຍົກເລີກ",
      function () {
        $http
          .post("./sql/delete_rate.php", {
            id: id
          })
          .success(function (data) {
            if (data == 200) {
              _Success();
              $scope._callRate();
            } else {
              _Fail();
            }
          });
      },
      function () {
        $scope._callRate();
      }
    );
  };
});
