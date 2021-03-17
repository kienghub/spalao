function _Success() {
    Notiflix.Notify.Success("ການດຳເນີນງານສຳເລັດ");
}

function _Warning(e) {
    Notiflix.Notify.Warning(e);
}

function _Fail() {
    Notiflix.Notify.Failure("ການດຳເນີນງານບໍ່ສຳເລັດ");
}

// CREATE DATA 
$('#onSubmitRate').on('submit', function(event) {
    event.preventDefault();
    var rate_THB = $('#rate_THB').val()
    var rate_USD = $('#rate_USD').val()
    if (rate_THB == "") { _Warning('ກະລຸນາປ້ອນອັດຕາແລກປ່ຽນ(THB)ກ່ອນ') }
    else if (rate_USD == "") { _Warning('ກະລຸນາປ້ອນອັດຕາແລກປ່ຽນ(USD)ກ່ອນ') }
    else {
        $.ajax({
            url: "./sql/create_rate.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                if(data=="DUPLICATE"){_Warning('ຂໍ້ມູນທີ່ທ່ານປ້ອນມີໃນຖານຂໍ້ມູນແລ້ວ')}
                if (data == "SUCCESS") {
                    _Success()
                    setTimeout(function () {
                       window.location.reload()
                    }, 1000);
                } else {
                    _Fail()
                }
            }
        });
    }
})

// UPDATE DATA 
function _onUpdate(id){
    $('#addRate').modal()
    $('#btnName').html('ແກ້ໄຂ')
    $.ajax({
        url: "./sql/query_rate.php",
        type: "GET",
        data: { id: id },
        dataType: "json",
        success: function (data) {
            $('#rate_id').val(data.rate_id)
            $('#rate_THB').val(data.rate_THB)
            $('#rate_USD').val(data.rate_USD)
            
        }
    });
}
    // DELETE DATA 
    function _onDelete(id) {
        Notiflix.Confirm.Show('ສະຖານະ', 'ຕ້ອງການ ລຶບຂໍ້ມູນນີ້ ແທ້ບໍ່?', 'ຕົກລົງ', 'ຍົກເລີກ', function () {
            $.ajax({
                url: "./sql/delete_rate.php",
                type: "GET",
                data: { id: id },
                success: function (dataResult) {
                    if (dataResult == "SUCCESS") {
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

