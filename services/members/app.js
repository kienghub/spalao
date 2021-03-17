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
$('#onSubmitMember').on('submit', function (event) {
    event.preventDefault();
    var mb_fullName = $('#mb_fullName').val()
    var mb_phoneNumber = $('#mb_phoneNumber').val()
    var mb_address = $('#mb_address').val()
    if (mb_fullName == "") { _Warning('ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ') }
    else if (mb_phoneNumber == "") { _Warning('ກະລຸນາປ້ອນເບີໂທລະສັບ') }
    else if (mb_address == "") { _Warning('ກະລຸນາປ້ອນທີ່ຢູ່') }
    else {
        $.ajax({
            url: "./sql/create_member.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log({ data });
                if (data == "DUPLICATED") {
                    _Warning('ຂໍ້ມູນທີ່ທ່ານປ້ອນມີໃນຖານຂໍ້ມູນແລ້ວ')
                } else if (data == "SUCCESS") {
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
function _onUpdate(id) {
    $('#addMember').modal()
    $('#btnName').html('ແກ້ໄຂ')
    $.ajax({
        url: "./sql/query_member.php",
        type: "GET",
        data: { id: id },
        dataType: "json",
        success: function (data) {
            $('#mb_id').val(data.mb_id)
            $('#mb_fullName').val(data.mb_fullName)
            $('#mb_phoneNumber').val(parseInt(data.mb_phoneNumber))
            $('#mb_address').val(data.mb_address)
            $('#mb_note').val(data.mb_note)

        }
    });
}
// DELETE DATA 
function _onDelete(id) {
    Notiflix.Confirm.Show('ສະຖານະ', 'ຕ້ອງການ ລຶບຂໍ້ມູນນີ້ ແທ້ບໍ່?', 'ຕົກລົງ', 'ຍົກເລີກ', function () {
        $.ajax({
            url: "./sql/delete_member.php",
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

