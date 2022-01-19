<!doctype html>
<html lang="en">

<head>

     <title>Print</title>
     <style>
     body {
          padding: 20px;
          padding-left: 5px;
          background-color: #ffff;
          font-family: "Phetsarath OT";
     }

     #table {
          margin: 20px;
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
     }

     td,
     .thead {
          border: 1px inset black;
          padding: 5px;
     }

     .btn {
          padding: 10px;
          background-color: #ced4da;
          border-radius: 4px;
          border: 1px solid #ced4da;
          border-collapse: collapse;
          border-spacing: 0;
          font-size: 16px;
     }

     @media print {
          body {
               margin: 0px;
               padding: 0px;
          }

          #layout {
               padding-right: 40px;
          }
     }

     h5 {
          color: #BC243C !important;
     }
     </style>
</head>
<?php 
     include('../../connection.php');
    function _renderUserName($_param){
     global $con;
     global $_SQL;
     global $_ASSOC;
    $_callUser=$_SQL($con,"SELECT*FROM spa_users WHERE user_id='$_param'");
    $_userName=$_ASSOC($_callUser);
    echo $_userName['user_fname'];
    }
?>

<body ng-app="app" ng-controller="add_package" ng-init="_onFilter()">
     <!-- Page header end -->
     <div id="layout">
          <table width="100%" style="text-align:left;margin-left:20px">
               <tr>
                    <th colspan="2">
                         <center>
                              <h3 style="color:black!important">
                                   ລາຍງານການເພິ່ມແພັກເກັດ
                              </h3>
                         </center>
                    </th>
               </tr>
               <tr>
                    <th width="50%">
                         <img src="../../img/app-logo.png" width="130px">
                    </th>
                    <th width="50%" style="text-align:right;">
                         ວັນທີ: <?php echo $_DATE ?> &nbsp;&nbsp;
                    </th>
               </tr>
               <tr>
                    <th width="50%">
                         ຮ້ານອາຫານລາວປະຍຸກ ແລະ ຄວາມງາມ
                    </th>
               </tr>
               <tr>
                    <th width="50%">
                         ບ້ານ ໂພນສະຫວ່າງ, ເມືອງ ຈັນທະບູລີ, ນະຄອນຫຼວງວຽງຈັນ
                    </th>
               </tr>
          </table><br>
          <table id="table">
               <thead>
                    <tr>
                         <th style="text-align:center" class="thead">#</th>
                         <th style="text-align:center" class="thead">ຊື່ແພັກເກັດ</th>
                         <th style="text-align:center" class="thead">ລາຄາ</th>
                         <th style="text-align:center" class="thead">ຈຳນວນ</th>
                         <th style="text-align:center" class="thead">ໝາຍເຫດ</th>
                         <th style="text-align:center" class="thead">ວັນທີ</th>
                         <th style="text-align:center" class="thead">ເພີ່ມໂດຍ</th>
                    </tr>
               </thead>
               <tbody>
                    <?php 
                    if(@$_GET['st_date'] || @$_GET['end_date']){
                    $start_date=$_GET['st_date'];
                    $end_date=$_GET['end_date'];
                    $params="WHERE spa_add_package.add_date BETWEEN '$start_date' AND '$end_date'";
                    }else{
                    $params="";
                    }
                    $i=1;
                    $query  =mysqli_query($con,"SELECT*,spa_add_package._id as p_id FROM spa_add_package 
                         left join spa_users on spa_add_package.createdBy=spa_users.user_id
                         left join spa_package on spa_add_package.package_id_fk=spa_package._id $params
                         ORDER BY spa_add_package._id DESC");
                         foreach ($query as $key) { ?>
                    <tr>
                         <td><?php echo $i ?></td>
                         <td><?php echo $key['package_name']?></td>
                         <td style="text-align:right">
                              <?php echo number_format($key['package_price'])?>
                         </td>
                         <td style="text-align:right">
                              <?php echo number_format($key['package_qty'])?>
                         </td>
                         <td><?php echo $key['package_note']?></td>
                         <td style="text-align:center"><?php echo $key['createdAt']?></td>
                         <td><?php _renderUserName($key['createdBy'])?></td>
                    </tr>
                    <?php $i++; } ?>
                    <tr>
                         <td style="text-align:center" colspan="6">ລວມທັງໝົດ</td>
                         <td style="text-align:right" colspan="ຟ"></td>
                    </tr>
               </tbody>
          </table>
          <table width="100%" style="text-align:center;margin-top:15px;border:none!important">
               <tr>
                    <th width="50%">
                         ບັນຊີ
                    </th>
                    <th width="50%">
                         ຜູ້ອຳນວຍການ
                    </th>
               </tr>
          </table>
     </div>
     <!-- Row end -->
     </div>
     <!-- Main container end -->
     </div>

     <!-- Page wrapper end -->
     <?php 
     include('../../components/lib/script.php');?>
     <script>
     function printThis(data) {
          var printContents = document.getElementById(data).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
     }

     $("#stock_of_sale_icon,#stock_of_sale_text,#report_delivered").addClass("text-white");

     var app = angular.module('app', []);
     app.controller("add_package", function($scope, $http) {
          $scope._onFilter = function() {
               var st_date = moment($scope.st_date).format("YYYY-MM-DD");
               var end_date = moment($scope.end_date).format("YYYY-MM-DD");
               console.log(st_date);
               console.log(end_date);
               $http
                    .get(
                         "./sql/query_package.php?st_date=" + st_date + "&end_date=" + end_date
                    )
                    .success(function(data) {
                         $scope._package = data;
                    });
          };
     });
     </script>
</body>

</html>