<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../Components/lib/lib.php')?>
     <?php include('../../access/access.php')?>
     <?php _active('.settings')?>
</head>

<body>
     <!-- Page wrapper start -->
     <div class="page-wrapper pinned">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php')?>
               <!-- Page header start -->
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item">ຈັດການຂໍ້ມູນ</li>
                         <li class="breadcrumb-item active">ລາຍການຈັດການ</li>
                    </ol>

                    <ul class="app-actions">
                         <li>
                              <a href="#" id="reportrange">
                                   <span class="range-text"></span>
                                   <i class="icon-chevron-down"></i>
                              </a>
                         </li>
                         <li>
                              <a href="../home/">
                                   <i class="icon-export"></i>
                              </a>
                         </li>
                    </ul>
               </div>
               <!-- Page header end -->
               <!-- Main container start -->
               <div class="main-container" id="main">
                    <div class="row gutters">
                         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" id="sublist">
                              <a href="../category/">
                                   <div class="info-stats4">
                                        <div class="info-icon">
                                             <i class="icon-activity"></i>
                                        </div>
                                        <div class="sale-num">
                                             <h4>ຈັດການປະເພດຄອສ໌</h4>
                                        </div>
                                   </div>
                              </a>
                         </div>
                         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" id="sublist">
                              <a href="../products/">
                                   <div class="info-stats4">
                                        <div class="info-icon">
                                             <i class="fa fa-th-large"></i>
                                        </div>
                                        <div class="sale-num">
                                             <h4>ຈັດການຄອສ໌</h4>
                                        </div>
                                   </div>
                              </a>
                         </div>
                         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" id="sublist">
                              <a href="../package/">
                                   <div class="info-stats4">
                                        <div class="info-icon">
                                             <i class="icon-layers2"></i>
                                        </div>
                                        <div class="sale-num">
                                             <h4>ຈັດການແພັກເກັດ</h4>
                                        </div>
                                   </div>
                              </a>
                         </div>

                         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" id="sublist">
                              <a href="../rate/">
                                   <div class="info-stats4">
                                        <div class="info-icon">
                                             <i class="fa fa-usd"></i>
                                        </div>
                                        <div class="sale-num">
                                             <h4>ຈັດການອັດຕາແລກປ່ຽນ</h4>
                                        </div>
                                   </div>
                              </a>
                         </div>
                         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" id="sublist">
                              <a href="../users/">
                                   <div class="info-stats4">
                                        <div class="info-icon">
                                             <i class="icon-user"></i>
                                        </div>
                                        <div class="sale-num">
                                             <h4>ຈັດການຜູ້ໃຊ້ລະບົບ</h4>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>
                    <!-- Row end -->
               </div>
               <!-- Main container end -->
          </div>
          <!-- Page content end -->
     </div>
     <!-- Page wrapper end -->
     <?php include('../../components/lib/script.php')?>
</body>

</html>