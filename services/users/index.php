<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php')?>
     <?php include('../../access/access.php')?>
     <?php _active('.settings') ?>
</head>

<body ng-app="app" ng-controller="user" ng-init="_callUsers();_limitTo='20'">
     <!-- Page wrapper start -->
     <div class="page-wrapper">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php')?>
               <!-- Page header start -->
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item" onclick="window.location='../settings/'">ຈັດການຂໍ້ມູນ</li>
                         <li class="breadcrumb-item active">ລາຍການຈັດການ</li>
                    </ol>

                    <ul class="app-actions">
                         <li>
                              <a href="#" id="reportrange">
                                   <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock"
                                        onload="showTime()">
                                   </div>
                              </a>
                         </li>
                         <li>
                              <a href="../users/add-user.php">
                                   <i class="icon-user-plus"></i>
                              </a>
                         </li>
                    </ul>
               </div>
               <!-- Page header end -->
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="col-md-12 pb-3">
                              <?php echo _limit() ?>
                         </div>
                         <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"
                              ng-repeat="x in _users |filter:_filter | limitTo:_limitTo">
                              <figure class="user-card">
                                   <figcaption>
                                        <a href="./user-profile.php?id={{x.user_id}}" class="edit-card">
                                             <i class="icon-mode_edit"></i></a>
                                        <img src="../../img/{{x.user_img?x.user_img:'user_null.png'}}"
                                             data-darkbox='../../img/{{x.user_img?x.user_img:"user_null.png"}}'
                                             data-darkbox-group='two' alt="user" class="profile"
                                             style="border:2px solid green;width:72px;height:72px;">
                                        <h5
                                             ng-bind="x.user_gender=='MALE'?'ທ້າວ'+' '+ x.user_fname + ' '+x.user_lname : ' ນາງ '+' '+ x.user_fname + ' '+x.user_lname">
                                        </h5>
                                        <ul class="list-group">
                                             <li class="list-group-item text-success" ng-bind="x.user_role"></li>
                                             <li class="list-group-item" ng-bind="x.user_address"></li>
                                             <li class="list-group-item" ng-bind="x.user_tel"></li>
                                        </ul>
                                   </figcaption>
                              </figure>
                         </div>
                         <div class="col-md-12 pb-3">
                              <?php echo _length() ?>
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
     <?php include('../../components/lib/script.php')?>
     <script src="app.js"></script>
</body>

</html>