<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
     <style>
     .card {
          cursor: pointer;
          border: 1px solid #ced4da;
     }

     .card:hover {
          background-color: #ced4da;
     }


     .active {
          background-color: #ced4da;
          border-bottom: 3px solid black;
     }

     .check-box {
          width: 18px;
          height: 18px;
     }

     .presize {
          margin-top: -35px;
          margin-right: -17px;
          width: 80px;
          padding: 3px;
          background-color: #37b24d;
          color: white;
          border-top-right-radius: 5px;
          border-bottom-left-radius: 5px;
     }
     </style>
</head>
<?php _active('.package') ?>

<body ng-app="app" ng-controller="controller"
     ng-init="_callProduct();_callCategory();cate_id='<?php echo $_GET['id']?>';_callMember()">
     <!-- Page wrapper start -->
     <div class="page-wrapper pinned">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php') ?>
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item">ໜ້າຂາຍ</li>
                         <li class="breadcrumb-item">ລາຍລະອຽດ</li>
                    </ol>

                    <ul class="app-actions">

                    </ul>
               </div>
               <!-- COUNT FUNCTION -->
               <?php 
               function _countReceive($x){
                    global $con;
                    $count=mysqli_query($con,"SELECT count(*)as total FROM spa_add_package WHERE package_id_fk='$x'");
                    $res=mysqli_fetch_assoc($count);
                    echo number_format($res['total']);
               }
               ?>
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="task-section" style="width:100%">
                              <form action="#" method="POST">
                                   <!-- Row start -->
                                   <div class="row no-gutters">
                                        <div class="col-10">
                                             <div class="labels-container p-3">
                                                  <div id="elem">
                                                       <label onclick="window.location='./'"
                                                            class="list-menu <?php if(!$_GET['id']){echo 'active';}else{echo '';}?>">
                                                            <a href="#"> <strong> ທັງໝົດ</strong></a>
                                                       </label>&nbsp;
                                                       <?php 
                                                       $callPackage=mysqli_query($con,"SELECT cate_id,cate_title From spa_category");
                                                       foreach ($callPackage as $key ) {?>
                                                       <label
                                                            class="list-menu <?php if($_GET['id']==$key['cate_id']){echo 'active';}else{echo '';}?>"
                                                            onclick="window.location='./?id=<?php echo $key['cate_id']?>'">
                                                            <a href="#">
                                                                 <strong><?php echo $key['cate_title']?></strong>
                                                            </a>
                                                       </label>
                                                       <?php } ?>
                                                  </div>

                                                  <div class="lablesContainerScroll p-2">

                                                       <div class="table-responsive">
                                                            <table class="table table-hover table-sm">
                                                                 <thead>
                                                                      <tr>
                                                                           <th>#</th>
                                                                           <th>ຊື່ແພັກເກັດ</th>
                                                                           <th>ຈຳນເພິ່ມເຂົ້າ</th>
                                                                           <th>ຈຳນຂາຍອອກ</th>
                                                                           <th>ຍອດຄົງເຫຼືອ</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      <?php 
                                                                      $i=1;
                                                                      $callPackage=mysqli_query($con,"SELECT*FROM spa_stock_package LEFT JOIN spa_package ON spa_stock_package.package_id_fk=spa_package._id");
                                                                      foreach ($callPackage as $key ) {?>
                                                                      <tr>
                                                                           <td><?php echo $i ?></td>
                                                                           <td><?php echo $key['package_name']?></td>
                                                                           <td>
                                                                                <?php _countReceive($key['package_id_fk'])?>
                                                                           </td>
                                                                           <td>
                                                                                <?php _countReceive($key['package_id_fk'])?>
                                                                           </td>
                                                                           <td>
                                                                                <?php _countReceive($key['package_id_fk'])?>
                                                                           </td>
                                                                      </tr>
                                                                      <?php $i++;} ?>
                                                                 </tbody>
                                                            </table>
                                                       </div>

                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-2">
                                             <div class="labels-container p-3">
                                                  <div class="lablesContainerScroll p-2">
                                                       <center>
                                                            <h4>ລາຍການຄອສ໌</h4>
                                                       </center>
                                                       <div class="filters-block">
                                                            <ul>
                                                                 <?php 
                                                                 $cate_id=@$_GET['id'];
                                                                 if(!@$_GET['id']){
                                                                      $params="";
                                                                 }else{
                                                                      $params="WHERE pro_cate_id='$cate_id'";
                                                                 }
                                                                 $callProduct=mysqli_query($con,"SELECT*FROM spa_product $params");
                                                                 foreach ($callProduct as $key ) { ?>
                                                                 <li style="border-bottom:1px solid #ccc;padding:5px">
                                                                      <a href=""><?php echo $key['pro_title']?></a>
                                                                 </li>
                                                                 <?php } ?>
                                                            </ul>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </form>
                         </div>
                         <!-- Main container end -->
                    </div>
                    <!-- Page content end -->
               </div>
               <!-- Page wrapper end -->
               <?php include('../../components/lib/script.php') ?>
               <script src="./app.js"></script>

</body>

</html>