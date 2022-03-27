<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include('../../components/lib/lib.php');?>
     <style>
     .c-img {
          display: block;
          width: 200px;
          border-radius: 3px;
          justify-content: center;
          align-items: center;

     }

     td {
          padding: 10px
     }
     </style>
</head>
<?php
     include_once('../../connection.php');
     $pro_id=$_GET['id'];
     $call_data_from_local=mysqli_query($con,"SELECT*FROM spa_product  WHERE pro_id='$pro_id'");
     $res=$_ASSOC($call_data_from_local);
?>

<body ng-app="app" ng-controller="controller" ng-init="type='0';
_callUsers();
_callMember();
order_date='<?php echo $_DATE ?>';
order_time='<?php echo $_TIME ?>';
pro_img='<?php echo $res['pro_img']?>';
pro_title='<?php echo $res['pro_title']?>';
price_for_time='<?php echo $res['price_for_time']?>';
price_for_course='<?php echo $res['price_for_course']?>';
pro_qty='<?php echo $res['pro_qty']?>'
">
     <div class="row">
          <div class="col-md-6 p-5">
               <center>
                    <img src="../../img/{{pro_img?pro_img:'./photo.jpg'}}" alt="" class="c-img">
                    <h4 class="mt-3" ng-bind="pro_title"></h4>
               </center>
               <hr>
               <div class="mb-3"></div>
               <div class="form-gorup text-center">
                    <div class="btn-group">
                         <?php 
                         $callPackage=mysqli_query($con,"SELECT _id,package_name,pro_id FROM spa_package WHERE pro_id='$pro_id'");
                         foreach ($callPackage as $key) {?>
                         <button type="button"
                              onclick="window.location='./sale.php?p_id=<?php echo $key['_id']?>&id=<?php echo $pro_id ?>'"
                              class="btn btn-<?php if($_GET['p_id']==$key['_id']){echo 'success';} else{echo 'secondary';}?>">
                              <?php echo $key['package_name'];?>
                         </button>
                         <?php } ?>
                    </div>
               </div>
               <div class="mb-3"></div>
               <div class="form-group text-center">
                    <label for="">ລາຍລະອຽດ</label>
               </div>
               <div class="mb-3"></div>
               <center>
                    <hr>
                    <?php
                    @$p_id=$_GET['p_id'];
                    $callPackageDetail=mysqli_query($con,"SELECT * FROM spa_package WHERE _id='$p_id'");
                    $value=mysqli_fetch_assoc($callPackageDetail);
                    ?>
                    <table width="50%">
                         <tr>
                              <td>ປະເພດ</td>
                              <td class="text-right">
                                   <b class="text-success">
                                        <?php if($value['package_type']==0){echo "ເປັນລາຍການ";}else{echo "ເປັນຄອສ໌";} ?>
                                   </b>
                              </td>
                         </tr>
                         <tr>
                              <td>ລາຄາ /
                                   <?php if($value['package_type']==0){echo "ລາຍການ";}else{echo "ຄອສ໌";} ?></td>
                              <td class="text-right">
                                   <i class="icon-check-circle text-success {{type==1?'':'hidden'}}"></i>
                                   <b class="{{type==1?'text-success':''}}">
                                        <?php echo number_format($value['package_price'])?> ກີບ
                                   </b>
                              </td>
                         </tr>
                         <tr>
                              <td>ຈຳນວນ /
                                   <?php if($value['package_type']==0){echo "ລາຍການ";}else{echo "ຄອສ໌";} ?></td>
                              <td class="text-right">
                                   <i class="icon-check-circle text-success {{type==1?'':'hidden'}}"></i>
                                   <b class="{{type==1?'text-success':''}}">
                                        <?php echo number_format($value['package_qty'])?> ຄັ້ງ
                                   </b>
                              </td>
                         </tr>
                    </table>
               </center>
          </div>
          <div class="col-md-6">
               <div class="row">
                    <div class="col-md-8">
                         <div class="card p-3 h-100">
                              <center>
                                   <img src="../../img/{{user_img?user_img:'user_null.png'}}" width="120px">
                                   <h4 class="mt-3 mb-3" ng-bind="user_fname +' '+ user_lname"></h4>
                              </center>
                              <div class="form-group">
                                   <label for="">ວັນທີ</label>
                                   <input type="date" class="form-control" ng-model="order_date" value={{order_date}}>
                              </div>
                              <div class="form-group">
                                   <label for="">ເວລາ</label>
                                   <input type="text" class="form-control timepicker" ng-model="order_time"
                                        value={{order_time}}>
                              </div>
                              <div class="form-group">
                                   <label for="">ລູກຄ້າ</label>
                                   <select class="form-control select2" ng-model="mb_id">
                                        <option value="">ເລືອກລູກຄ້າ</option>
                                        <option ng-repeat="n in _member" value={{n.mb_id}} ng-bind="n.mb_fullName">
                                        </option>
                                   </select>
                              </div>

                              <div class="mt-3"></div>
                              <div class="form-group text-center">
                                   <button type="button" class="btn btn-primary w-45">
                                        <i class="icon-check-circle"></i> ຢືນຢັນ
                                   </button>
                                   <button type="button" class="btn btn-danger w-45">
                                        <i class="icon-check-circle"></i> ຍົກເລີກ
                                   </button>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-3 text-center" style="max-height:670px;overflow:auto;">
                         <div class="card p-1" ng-repeat="n in _users" ng-click="_showUser(n)" style="cursor:pointer">
                              <img src="../../img/{{n.user_img}}" alt="">
                              <hr>
                              <h5 ng-bind="n.user_fname"></h5>
                              <h5 ng-bind="n.user_lname"></h5>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <?php include('../../components/lib/script.php');?>
     <script src="app.js"></script>
</body>

</html>