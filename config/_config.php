<?php function _active($class){?>
<style>
<?php echo $class ?> {
     background-color: #f1f1f1f1;
     border-left: 5px solid #485167;
}

.breadcrumb-item {
     cursor: pointer;
}

table tr th {
     background-color: #485167;
     color: white;
}

h1,
h2,
h3,
h4,
h5,
h4 {
     color: #485167 !important
}

#checkbox {
     width: 20px;
     height: 20px;
}
</style>

<?php } ?>

<?php
$today = date('D');

function isVal(){echo "<font style='color:red'>*</font>";}
 function _back( $url ) { ?>
<a href="#" onclick="window.location='<?php echo $url;?>'">
     <i class="fa fa-angle-left fa-2x"
          style="margin-top:3px!important;margin-bottom:-0px!important;margin-right:20px!important;"></i></a>
<?}?>

<?php function _close(){ ?>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
               class="fa fa-times-circle" style="color:white"></i> </span>
</button>
<?php } ?>

<?php function callBack($params){ ?>
<button type="button" class="btn btn-outline-danger" style="margin-left:20px"
     onclick="window.location='<?php echo $params;?>'">
     <i class="fa fa-times-circle"></i> ຍົກເລີກ
</button>
<?php } ?>

<?php function Success($location){ ?>
<script>
Notiflix.Report.Success('ສຳເລັດ', 'ການດຳເນີນງານສຳເລັດ...', 'ປິດ',
     function() {
          window.location = '<?php $location;?>'
     })
</script>
<?php } ?>

<?php function Fail($location){ ?>
<script>
Notiflix.Report.Failure('ຜິດພາດ', 'ການດຳເນີນງານບໍ່ສຳເລັດ...', 'ປິດ',
     function() {
          window.location = '<?php $location;?>'
     })
</script>
<?php } ?>

<?php function Duplicate($location){ ?>
<script>
Notiflix.Report.Warning('ຜິດພາດ', 'ຂໍ້ມູນທີ່ທ່ານປ້ອນມີແລ້ວ ກະລຸນາກວດຄືນແລ້ວປ້ອນໃໝ່ພາຍຫຼັງ', 'ປິດ',
     function() {
          window.location = '<?php $location;?>'
     })
</script>
<?php } ?>


<?php function Del_Success($location){ ?>
<script>
window.location = "<?php echo $location;?>"
</script>
<?php } ?>

<?php function Del_Fail($location){ ?>
<script>
window.location = "<?php echo $location;?>"
</script>
<?php } ?>

<?php function _limit(){?>
<select class="form-control" ng-model="_limitTo" required="required" style="width:200px;float:right;margin-top:-5px">
     <option value={{_limitTo}}>{{_limitTo}} ລາຍການ</option>
     <?php for($i=10;$i < 1000; $i+=20){ ?>
     <option value="<?php echo $i ?>"><?php echo $i ?> ລາຍການ</option>
     <?php } ?>
</select>
<?php } ?>

<?php 
function _length(){ ?>
<div class="col-md-12 p-3">
     ທັງໝົດ <span ng-bind="_length | number"></span> ລາຍການ
</div>
<?php } ?>

<?php function _renderName($id){
include('../../connection.php');
$_callUserData=$_SQL($con,"SELECT*FROM spa_users WHERE user_id='$id'");
$_userName=$_ASSOC($_callUserData);
echo $_userName['user_fname'];
}
?>

<?php function _clear() { ?>
<a href="#" ng-hide="_living" ng-click="_clearSearch()"
     style="float:right;margin-top:-30px;z-index:999;margin-right:10px">
     <i class="icon-x"></i>
</a>
<?php } ?>