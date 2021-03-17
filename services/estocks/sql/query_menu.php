<option value=""> ເລືອກ...</option>
<?php
include '../../../connection.php';
    $id=$_GET['e_cate_id'];
    $_queryMenu=$_SQL($con,"SELECT * FROM spa_equiment WHERE e_cate_id='$id'");
    foreach($_queryMenu as $val){?>
 <option value="<?php echo $val['e_id']?>"><?php echo $val['e_name_l']?>
    (<?php echo $val['e_type'].','.$val['e_size']?>)</option>
<?php } ?>