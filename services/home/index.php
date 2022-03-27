<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../Components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
</head>
<?php _active('.home') ?>
<?php
// get booking not accepted
$selectOrder = mysqli_query($web_connect, "SELECT * FROM spa_booking WHERE bookingType='SPA' AND status='0' ORDER BY _id");
$totalOrder = mysqli_num_rows($selectOrder);

// get booking accepted
$selectOrderAccept = mysqli_query($web_connect, "SELECT * FROM spa_booking WHERE bookingType='SPA' AND status='1' ORDER BY _id");
$totalOrderAccept = mysqli_num_rows($selectOrderAccept);
// get customer total
$callTotal = mysqli_query($con, "SELECT * FROM spa_member");
$totalCustomer = mysqli_num_rows($callTotal);

?>

<body>
     <!-- Page wrapper start -->
     <div class="page-wrapper">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php') ?>
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item">ໜ້າຫຼັກ</li>
                         <li class="breadcrumb-item active">ລາຍລະອຽດ</li>
                    </ol>

                    <ul class="app-actions">
                         <li>
                              <a href="#" id="reportrange">
                                   <span class="range-text"></span>
                                   <i class="icon-chevron-down"></i>
                              </a>
                         </li>
                    </ul>
               </div>
               <!-- Main container start -->
               <div class="main-container">

                    <!-- Row start -->
                    <div class="row gutters">
                         <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                              <!-- Row starts -->
                              <div class="row gutters">
                                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="goal-card">
                                             <i class="icon-user1"></i>
                                             <h2><?php echo number_format($totalCustomer) ?></h2>
                                             <h6>ລູກຄ້າ</h6>
                                        </div>
                                   </div>
                                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="goal-card">
                                             <i class="icon-shopping-cart1"></i>
                                             <h2><?php echo number_format($totalOrderAccept) ?></h2>
                                             <h5>ອີເດີ່ເດືອນນີ້</h5>
                                        </div>
                                   </div>
                                   <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="card h-340">
                                             <div class="card-header">
                                                  <div class="card-title">ການນັດໝາຍ</div>
                                             </div>
                                             <div class="card-body">
                                                  <div class="customScroll5">
                                                       <div class="todo-container">
                                                            <ul class="todo-body">
                                                                 <?php foreach ($selectOrder as $key) { ?>
                                                                      <li class="todo-list">
                                                                           <div class="todo-info">
                                                                                <span class="dot blue"></span>
                                                                                <p><?php echo $key['fullName'] ?></p>
                                                                                <p><?php echo $key['bookingDate'] ?></p>
                                                                           </div>
                                                                      </li>
                                                                 <?php } ?>
                                                            </ul>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="card h-340">
                                   <div class="card-header">
                                        <div class="card-title">ການສັ່ງຈອງໃໝ່</div>
                                   </div>
                                   <div class="card-body">
                                        <div class="customScroll5">
                                             <ul class="statistics">
                                                  <?php foreach ($selectOrder as $key) { ?>
                                                       <li>
                                                            <span class="stat-icon">
                                                                 <i class="icon-shopping-cart"></i>
                                                            </span>
                                                            <p><?php echo $key['fullName'] ?></p>
                                                            <hr>
                                                            <p><?php echo $key['bookingDate'] ?></p>
                                                       </li>
                                                  <?php } ?>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                                   </div>
                              </div>
                              <!-- Row ends -->
                         </div>
                         <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card h-310">
                                   <div class="card-header">
                                        <div class="card-title">ແພັກເກັດທີຍັງເຫຼືອ</div>
                                   </div>
                                   <div class="card-body pt-0">
                                        <!-- Row starts -->
                                        <div class="row gutters">
                                             <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                                                  <div class="graph-label-container">
                                                       <?php
                                                       $selectPackage = mysqli_query($con, "SELECT package_name,package_price,package_qty from spa_package");
                                                       foreach ($selectPackage as $key) { ?>
                                                            <div class="graph-label">
                                                                 <i class="icon-controller-play"></i>
                                                                 <div class="label-detail">
                                                                      <h5><?php echo $key['package_name'] ?></h5>
                                                                      <p class="float-right">
                                                                           <?php echo number_format($key['package_price']) ?>
                                                                      </p>
                                                                 </div>
                                                            </div>
                                                       <?php } ?>
                                                  </div>
                                             </div>
                                             <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                                                  <div id="earnings"></div>
                                             </div>
                                        </div>
                                        <!-- Row ends -->
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- Row end -->
               </div>
               <!-- Main container end -->
          </div>
          <!-- Page content end -->
     </div>
     <!-- Page wrapper end -->
     <?php include('../../components/lib/script.php') ?>
</body>

</html>