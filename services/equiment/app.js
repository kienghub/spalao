function _Success() {
    Notiflix.Notify.Success("ການດຳເນີນງານສຳເລັດ");
}

function _Warning(e) {
    Notiflix.Notify.Warning(e);
}

function _Fail() {
    Notiflix.Notify.Failure("ການດຳເນີນງານບໍ່ສຳເລັດ");
}

    // DELETE DATA 
function _onDelete(id) {
        Notiflix.Confirm.Show('ສະຖານະ', 'ຕ້ອງການ ລຶບຂໍ້ມູນນີ້ ແທ້ບໍ່?', 'ຕົກລົງ', 'ຍົກເລີກ', function () {
            $.ajax({
                url: "./sql/delete-equiment.php",
                type: "GET",
                data: { id: id },
                success: function (dataResult) {
                    if (dataResult == 7070) {
                        _Success()
                        setTimeout(() => {
                            window.location.reload()
                        }, 1000);
                    } else {
                        _Fail()
                    }
                }
            });
        });
    }

