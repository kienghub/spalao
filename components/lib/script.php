        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/js/moment.js"></script>

        <!-- Slimscroll JS -->
        <script src="../../assets/vendor/slimscroll/slimscroll.min.js"></script>
        <script src="../../assets/vendor/slimscroll/custom-scrollbar.js"></script>

        <!-- Daterange -->
        <script src="../../assets/vendor/daterange/daterange.js"></script>
        <script src="../../assets/vendor/daterange/custom-daterange.js"></script>

        <!-- Polyfill JS -->
        <script src="../../assets/vendor/polyfill/polyfill.min.js"></script>

        <!-- Apex Charts -->
        <script src="../../assets/vendor/apex/apexcharts.min.js"></script>
        <script src="../../assets/vendor/apex/admin/visitors.js"></script>
        <script src="../../assets/vendor/apex/admin/deals.js"></script>
        <script src="../../assets/vendor/apex/admin/income.js"></script>
        <script src="../../assets/vendor/apex/admin/customers.js"></script>
        <script src="../../assets/AIO/notiflix-aio-2.4.0.min.js"></script>
        <!-- Data Tables -->
        <script src="../../assets/vendor/datatables/dataTables.min.js"></script>
        <script src="../../assets/vendor/datatables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Data tables -->
        <script src="../../assets/vendor/datatables/custom/custom-datatables.js"></script>
        <script src="../../assets/vendor/datatables/custom/fixedHeader.js"></script>

        <!-- Download / CSV / Copy / Print -->
        <script src="../../assets/vendor/datatables/buttons.min.js"></script>
        <script src="../../assets/vendor/datatables/jszip.min.js"></script>
        <script src="../../assets/vendor/datatables/pdfmake.min.js"></script>
        <script src="../../assets/vendor/datatables/vfs_fonts.js"></script>
        <script src="../../assets/vendor/datatables/html5.min.js"></script>
        <script src="../../assets/vendor/datatables/buttons.print.min.js"></script>
        <!-- Main JS -->
        <script src="../../assets/js/main.js"></script>
        <script src="../../assets/js/app.js"></script>
        <script src="../../assets/js/onload_file.js"></script>
        <script src="../../assets/select2/dist/js/select2.full.min.js"></script>
        <script src="../../assets/js/printThis.js"></script>
        <script src="../../assets/angularjs.1.4.0/angular.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script type="text/javascript" src="../../assets/js/printThis.js"></script>
        <script>
$(document).ready(function() {
    $('.select2').select2();
});

$('#printFinalReport').on("click", function() {
    $('#finalReport').printThis({
        // printDelay: 2000, // waiting 2 secondes
        importCSS: true,
        importStyle: true, //thrown in for extra measure
        loadCSS: '../../assets/css/app.css',
        header: "<br><br><center> <p>ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</p><p>ສັນຕິພາບ ເອກະສາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</p></center><table width='100%'><tr><td><img src='../../img/<?php echo $_profile['p_logo']?>' style='width:90px;height:90px'></td></tr><tr><td><?php echo $_profile['p_title']?><br><?php echo $_profile['p_contact1']?><br><?php echo $_profile['p_contact2']?><br><?php echo $_profile['p_contact3']?></td><td style='text-align:right'>ວັນທີ: <?php echo $_DATE ?></td></tr></table> </p><center><h3>ສະຫຼຸບ ບັນຊີປະຈຳວັນ</h3><br><br></center>",
        footer: "<br><br><table width='100%' style='text-align:center'><tr><td>ຜູ້ຈັດການ</td><td>ຜູ້ຮັບຜິດຊອບ</td><td>ບັນຊີ</td></tr></table><br><br>",
        base: false,
    });
});
        </script>

        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114774247-1"></script>
        <script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'UA-114774247-1');
        </script>
        <script>
function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if (h == 0) {
        h = 12;
    }

    if (h > 12) {
        h = h - 12;
        session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);

}

showTime();

$(document).ready(function() {
    $('.select2').select2();
});
        </script>