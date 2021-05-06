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
        <script src="../../assets/layer/2.4/layer.js"></script>

        <!-- Apex Charts -->
        <script src="../../assets/vendor/apex/apexcharts.min.js"></script>
        <script src="../../assets/vendor/apex/admin/visitors.js"></script>
        <script src="../../assets/vendor/apex/admin/deals.js"></script>
        <script src="../../assets/vendor/apex/admin/income.js"></script>
        <script src="../../assets/vendor/apex/admin/customers.js"></script>
        <script src="../../assets/AIO/notiflix-aio-2.4.0.min.js"></script>
        <!-- Data Tables -->
        <script src="../../assets/data-table/jquery.dataTables.min.js"></script>
        <script src="../../assets/data-table/dataTables.bootstrap4.min.js"></script>

        <script src="../../assets/js/main.js"></script>
        <script src="../../assets/js/app.js"></script>
        <script src="../../assets/js/onload_file.js"></script>
        <script src="../../assets/select2/dist/js/select2.full.min.js"></script>
        <script src="../../assets/js/printThis.js"></script>
        <script src="../../assets/angularjs.1.4.0/angular.min.js"></script>
        <script src="../../assets/data-table/angular-datatables.min.js"></script>
        <script src="../../assets/darkbox/darkbox.min.js"></script>
        <!-- Lobipanel -->
        <script src="../../assets/vendor/lobipanel/js/lobipanel.js"></script>
        <script src="../../assets/vendor/lobipanel/js/lobipanel-custom.js"></script>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script>
function layer_close() {
     var index = parent.layer.getFrameIndex(window.name);
     parent.layer.close(index);
}
$(document).ready(function() {
     $('.select2').select2();
});
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
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
        </script>