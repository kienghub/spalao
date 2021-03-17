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
      console.log(data);
      $scope._callcate = data;
      $scope._length = data.length;
    });
  };

  $scope._callSumAmount_old = function (bill_no) {
    $http.get("sql/sum_order.php?bill_no=" + bill_no).success(function (data) {
      console.log("====>", data);
      $scope._sumOldBill = data;
    });
  };
  $scope._callOrderData_old = function (bill_no) {
    $http
      .get("sql/query_order.php?bill_no=" + bill_no)
      .success(function (data) {
        console.log("====>", data);
        $scope._callOrder = data;
        $scope._length = data.length;
      });
  };

  $scope._onSelected_first = function () {
    var id = $scope._oldTable;
    $http.get("sql/call_bill.php?id=" + id).success(function (data) {
      $scope._callBill_no = data;
      $scope._callOrderData_old(data);
      $scope._callSumAmount_old(data);
    });
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
