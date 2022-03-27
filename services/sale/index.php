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
<?php _active('.sale') ?>

<body ng-app="app" ng-controller="controller" ng-init="_callProduct();_callCategory();cate_id='';_callMember()">
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
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="task-section" style="width:100%">
                              <form action="#" method="POST">
                                   <!-- Row start -->
                                   <div class="row no-gutters">
                                        <div class="col-8">
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
                                                       <center>
                                                            <h4>ລາຍການຄອສ໌</span>
                                                       </center>

                                                       <div class="row filters-block">
                                                            <?php 
                                                            @$cateId=$_GET['id'];
                                                            if(!@$_GET['id']){
                                                                 $params="";
                                                            }else{
                                                                 $params="WHERE pro_cate_id='$cateId'";
                                                            }
                                                            $callPackage=mysqli_query($con,"SELECT pro_id, pro_title,pro_img FROM spa_product $params");
                                                            foreach ($callPackage as $key ) {?>
                                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                                 <figure class="user-card pb-3"
                                                                      style="background-color:#f1f1f1">
                                                                      <div class="presize pull-right">
                                                                           <?php 
                                                                           $p_id=$key['pro_id'];
                                                                           $countPackage=mysqli_query($con,"SELECT COUNT(*) AS total FROM spa_package WHERE pro_id='$p_id'");
                                                                           $result=mysqli_fetch_assoc($countPackage);
                                                                           echo $result['total']; 
                                                                           ?> ແພັກເກັຈ
                                                                      </div>
                                                                      <figcaption
                                                                           style="margin-right:-15px;margin-left:-15px;margin-top:-30px">
                                                                           <img src="../../img/<?php if($key['pro_img']){echo $key['pro_img'];}else{echo 'photo.jpg';}?>"
                                                                                alt="user"
                                                                                style="width:100%;height:150px;">
                                                                      </figcaption>
                                                                      <br>
                                                                      <strong style="font-size:16px">
                                                                           <?php echo $key['pro_title']?>
                                                                      </strong>
                                                                      <hr>
                                                                      <button type="button"
                                                                           <?php if($result['total']==0){echo 'disabled';}?>
                                                                           class="btn btn-primary btn-block mb-0"
                                                                           ng-click="addToCart('ຈັດການ ການສັ່ງຊື້','./sale.php?id=<?php echo $key['pro_id']?>',100,100)">
                                                                           <i class="icon-shopping-cart1"></i>
                                                                           ສັ່ງຊື້
                                                                      </button>
                                                                 </figure>
                                                            </div>
                                                            <?php } ?>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class=" col-4">
                                             <div class="labels-container p-3">
                                                  <div class="lablesContainerScroll p-2">
                                                       <center>
                                                            <h4> ເລກບິນ
                                                       </center>
                                                       <div class="filters-block">
                                                            <table class="table table-hover table-sm">
                                                                 <tr>
                                                                      <th>#</th>
                                                                      <th>ລາຍການ
                                                                      </th>
                                                                      <th class="text-center">
                                                                           ຈຳນວນ
                                                                      </th>
                                                                      <th class="text-right">
                                                                           ລາຄາ
                                                                      </th>
                                                                      <th class="text-right">
                                                                           ເປັນເງິນ
                                                                      </th>
                                                                 </tr>
                                                                 <tr>
                                                                      <td style="width:20px">
                                                                      </td>
                                                                      <td class="wrap-text">
                                                                      </td>
                                                                      <td class="text-center">
                                                                      </td>
                                                                      <td class="text-right">
                                                                      </td>
                                                                      <td class="text-right">
                                                                      </td>
                                                                 </tr>
                                                            </table>
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-6">
                                                            <button type="button"
                                                                 ng-click="layer_show('test','',1000,600,'2011200803')"
                                                                 class="btn btn-warning btn-lg btn-block p-2"
                                                                 style="font-size:25px">
                                                                 <i class="icon-printer"></i>
                                                                 ພິມບິນ</button>
                                                       </div>
                                                       <div class="col-6">
                                                            <button type="button"
                                                                 class="btn btn-danger btn-lg btn-block p-2"
                                                                 style="font-size:25px">
                                                                 <i class="icon-power1"></i>
                                                                 ປິດການຂາຍ</button>
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