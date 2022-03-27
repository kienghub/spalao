<!-- Header start -->
<?php include_once('../../connection.php')?>
<header class="header">
     <div class="toggle-btns">
          <a id="toggle-sidebar" href="#">
               <i class="icon-list"></i>
          </a>
          <a id="pin-sidebar" href="#">
               <i class="icon-list"></i>
          </a>
     </div>
     <?php 
        // GET RATE
        $selectRate ="SELECT * FROM spa_rate ORDER BY rate_id DESC LIMIT 1";
        $resultRate =$DB_con->prepare($selectRate);
        $resultRate->execute();
        $_row=$resultRate->fetch();

     //    get order
     $selectOrder =mysqli_query($web_connect,"SELECT * FROM spa_booking WHERE bookingType='SPA' AND status='0' ORDER BY _id");
     $totalOrder =mysqli_num_rows($selectOrder);
  ?>
     <div class="header-items" <?php echo @$_isHide ?>>
          <a href="../../services/rate/"><strong style="color:#3b4252"> ບາດ(THB):
                    <?php echo @number_format($_row['rate_THB'])?> </strong></a>
     </div>
     <div class="header-items" <?php echo @$_isHide ?>>
          <a href="../../services/rate/"><strong style="color:#3b4252"> ໂດລາ(USD):
                    <?php echo @number_format($_row['rate_USD'])?></strong> </a>
     </div>
     <div class="header-items">
          <!-- Custom search start -->
          <div class="custom-search">
               <input type="text" id="search" ng-model="_filter" class="search-query" placeholder="ຄົ້ນຫາ...">
               <i class="icon-search1"></i>
          </div>
          <!-- Custom search end -->

          <!-- Header actions start -->
          <ul class="header-actions">
               <li class="dropdown">
                    <a href="../../services/settings/" class="settings" id="notifications">
                         <i class="fa fa-th-large"></i>
                    </a>
               </li>
               <li class="dropdown">
                    <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                         <i class="icon-bell"></i>
                         <span class="count-label"><?php echo $totalOrder ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                         <div class="dropdown-menu-header">
                              ມີການແຈ້ງເຕືອນ (<?php echo $totalOrder ?>)
                         </div>
                         <ul class="header-notifications">
                              <?php 
                              foreach($selectOrder as $row){
                              ?>
                              <li>
                                   <a href="../../services/booking/">
                                        <div class="user-img away">
                                             <i class="icon-bell fa-2x"></i>
                                        </div>
                                        <div class="details">
                                             <div class="user-title"><?php echo $row['fullName']?></div>
                                             <div class="noti-details"><?php echo $row['phoneNumber']?></div>
                                             <div class="noti-date"><?php echo $row['bookingDate']?></div>
                                        </div>
                                   </a>
                              </li>
                              <?php } ?>
                         </ul>
                    </div>
               </li>
               <li class="dropdown">
                    <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                         <span class="user-name"><?php echo $_USER_FNAME ?></span>
                         <span class="avatar">
                              <img src="../../img/<?php if($_USER_IMG){echo $_USER_IMG;}else{echo 'user_null.png';}?>"
                                   alt="">
                              <span class="status busy"></span>
                         </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                         <div class="header-profile-actions">
                              <div class="header-user-profile">
                                   <div class="header-user">
                                        <img src="../../img/<?php if($_USER_IMG){echo $_USER_IMG;}else{echo 'user_null.png';}?>"
                                             alt="user">
                                   </div>
                                   <h5><?php echo $_USER_FNAME ?></h5>
                                   <p><?php echo $_USER_ROLE?></p>
                              </div>
                              <a href="../../services/users/user-profile.php?id=<?php echo $_USER_ID?>"><i
                                        class="icon-user1"></i> ໂປຣໄຟລ໌</a>
                              <a href="../../services/change_password/"><i class="fa fa-key"></i> ປ່ຽນລະຫັດຜ່ານ</a>
                              <a href="../../services/loginhistory/?years=<?php echo $_YEAR ?>">
                                   <i class="fa fa-history"></i>
                                   ການເຂົ້າລະບົບ</a>
                              <a href="../../services/profilesystem/"><i class="fa fa-cog"></i> ຂໍ້ມູນສຳນັກງານ</a>
                              <a href="#" onclick="_logout()"><i class="icon-log-out1"></i> ອອກຈາກລະບົບ</a>
                         </div>
                    </div>
               </li>
          </ul>
          <!-- Header actions end -->
     </div>
</header>
<!-- Header end -->