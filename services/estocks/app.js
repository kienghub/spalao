function _Success() {
  Notiflix.Notify.Success("ການດຳເນີນງານສຳເລັດ");
}

function _Warning(e) {
  Notiflix.Notify.Warning(e);
}

function _Fail() {
  Notiflix.Notify.Failure("ການດຳເນີນງານບໍ່ສຳເລັດ");
}

// GET MENU
function _callMenu() {
  let e_cate_id = $("#e_cate_id").val();
  $.get("sql/query_menu.php", { e_cate_id }, function (data) {
    $("#ere_equiment_id").html(data);
  });
}
function _callTypeEquiment() {
  let e_cate_id = $("#e_cate_id").val();
  $.get("sql/query_menu.php", { e_cate_id }, function (data) {
    $("#bk_equiment_id").html(data);
  });
}
function _callTypeEquiment2() {
  let e_cate_id = $("#e_cate_id").val();
  $.get("sql/query_menu.php", { e_cate_id }, function (data) {
    $("#bring_equiment_id").html(data);
  });
}
// CREATE Resivce
$("#onSubmitResivce").on("submit", function (event) {
  event.preventDefault();
  var e_cate_id = $("#e_cate_id").val();
  var ere_equiment_id = $("#ere_equiment_id").val();
  var ere_qty = $("#ere_qty").val();
  var ere_Bprice = $("#ere_Bprice").val();
  var ere_time = $("#ere_time").val();
  if (e_cate_id == "") {
    _Warning("ກະລຸນາເລືອກໝວເຄື່ອງກ່ອນ");
    $("#e_cate_id").focus();
  } else if (ere_equiment_id == "") {
    _Warning("ກະລຸນາເລືອກລາຍການເຄື່ອງກ່ອນ");
    $("#ere_equiment_id").focus();
  } else if (ere_qty == "") {
    _Warning("ກະລຸນາປ້ອນຈຳນວນກ່ອນ");
    $("#ere_qty").focus();
  } else if (ere_Bprice == "") {
    _Warning("ກະລຸນາປ້ອນລາຄາຊື້ກ່ອນ");
    $("#ere_Bprice").focus();
  } else if (ere_time == "") {
    _Warning("ກະລຸນາເລືອກວັນທີກ່ອນ");
    $("#ere_time").focus();
  } else {
    $.ajax({
      url: "./sql/create_resivce.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        console.log({ data });
        if (data == "DATA_READY_EXIT") {
          _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີໃນຖານຂໍ້ມູນແລ້ວ");
        } else if (data == 7070) {
          _Success();
          setTimeout(function () {
            window.location.reload();
          }, 1000);
        } else {
          _Fail();
        }
      }
    });
  }
});
// CREATE BROKED
$("#onSubmitBroked").on("submit", function (event) {
  event.preventDefault();
  var e_cate_id = $("#e_cate_id").val();
  var bk_equiment_id = $("#bk_equiment_id").val();
  var bk_qty = $("#bk_qty").val();
  var bk_time = $("#bk_time").val();
  if (e_cate_id == "") {
    _Warning("ກະລຸນາເລືອກໝວເຄື່ອງກ່ອນ");
    $("#e_cate_id").focus();
  } else if (bk_equiment_id == "") {
    _Warning("ກະລຸນາເລືອກລາຍການເຄື່ອງກ່ອນ");
    $("#bk_equiment_id").focus();
  } else if (bk_qty == "") {
    _Warning("ກະລຸນາປ້ອນຈຳນວນກ່ອນ");
    $("#bk_qty").focus();
  } else if (bk_time == "") {
    _Warning("ກະລຸນາເລືອກວັນທີກ່ອນ");
    $("#bk_time").focus();
  } else {
    $.ajax({
      url: "./sql/create_broked.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(data);
        if (data == "DATA_READY_EXIT") {
          _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີໃນຖານຂໍ້ມູນແລ້ວ");
        } else if (data == 7070) {
          _Success();
          setTimeout(function () {
            window.location.reload();
          }, 1000);
        } else {
          _Fail();
        }
      }
    });
  }
});

// CREATE bringOut
$("#onSubmitBringOut").on("submit", function (event) {
  event.preventDefault();
  var e_cate_id = $("#e_cate_id").val();
  var bring_equiment_id = $("#bring_equiment_id").val();
  var bring_qty = $("#bring_qty").val();
  var bring_time = $("#bring_time").val();
  if (e_cate_id == "") {
    _Warning("ກະລຸນາເລືອກໝວເຄື່ອງກ່ອນ");
    $("#e_cate_id").focus();
  } else if (bring_equiment_id == "") {
    _Warning("ກະລຸນາເລືອກລາຍການເຄື່ອງກ່ອນ");
    $("#bring_equiment_id").focus();
  } else if (bring_qty == "") {
    _Warning("ກະລຸນາປ້ອນຈຳນວນກ່ອນ");
    $("#bring_qty").focus();
  } else if (bring_time == "") {
    _Warning("ກະລຸນາເລືອກວັນທີກ່ອນ");
    $("#bring_time").focus();
  } else {
    $.ajax({
      url: "./sql/create_bring_out.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        console.log({ data });
        if (data == "DATA_READY_EXIT") {
          _Warning("ຂໍ້ມູນທີ່ທ່ານປ້ອນມີໃນຖານຂໍ້ມູນແລ້ວ");
        } else if (data == 7070) {
          _Success();
          setTimeout(function () {
            window.location.reload();
          }, 1000);
        } else {
          _Fail();
        }
      }
    });
  }
});
// DELETE RESIVE
function _onDelete(id, qty, ere_equiment_id) {
  Notiflix.Confirm.Show(
    "ສະຖານະ",
    "ຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່?",
    "ຕົກລົງ",
    "ຍົກເລີກ",
    function () {
      $.ajax({
        url: "./sql/delete_resivce.php",
        type: "GET",
        data: { id, qty, ere_equiment_id },
        success: function (dataResult) {
          if (dataResult == 7070) {
            _Success();
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            _Fail();
          }
        }
      });
    }
  );
}
// DELETE BROKED
function _onDeleteBroked(id, qty, ere_equiment_id) {
  Notiflix.Confirm.Show(
    "ສະຖານະ",
    "ຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່?",
    "ຕົກລົງ",
    "ຍົກເລີກ",
    function () {
      $.ajax({
        url: "./sql/delete_broked.php",
        type: "GET",
        data: { id, qty, ere_equiment_id },
        success: function (dataResult) {
          if (dataResult == 7070) {
            _Success();
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            _Fail();
          }
        }
      });
    }
  );
}
// DELETE BRING OUT
function _onDeleteBringOut(id, qty, bring_equiment_id) {
  Notiflix.Confirm.Show(
    "ສະຖານະ",
    "ຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່?",
    "ຕົກລົງ",
    "ຍົກເລີກ",
    function () {
      $.ajax({
        url: "./sql/create_bring_out.php",
        type: "GET",
        data: { id, qty, bring_equiment_id },
        success: function (dataResult) {
          if (dataResult == 7070) {
            _Success();
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          } else {
            _Fail();
          }
        }
      });
    }
  );
}
