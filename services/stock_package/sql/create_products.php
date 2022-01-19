<?php 
include ('../../../connection.php');
    $pro_id =mysqli_real_escape_string($con,$_POST['pro_id']);
    $package_name =mysqli_real_escape_string($con,$_POST['package_name']);
    $package_price =mysqli_real_escape_string($con,$_POST['package_price']);
    $package_qty =mysqli_real_escape_string($con,$_POST['package_qty']);
    $note =mysqli_real_escape_string($con,$_POST['note']);

    $file_img    = $_FILES['pro_img']['name'];
    $tmp_dir    = $_FILES['pro_img']['tmp_name'];
    $upload_dir = '../../../img/';// upload directory
    // INSERT DATA 

        $id=$_POST['pro_id'];
        $_callGameDataResult=$_SQL($con,"SELECT*FROM spa_product where pro_id='$id'");
        $rows=$_ASSOC($_callGameDataResult);

        @$fileExt  = strtolower(pathinfo($file_img, PATHINFO_EXTENSION));
    if ($file_img == "") {$img = $rows['pro_img'];} else {
        @$img = rand(100000, 1000000).".".$fileExt;
    }

            if($_POST['pro_cate_id']==""){
                echo "PRO_CATE_ID_INVALID";
            }else if($_POST['pro_title']==""){
                echo "PRO_TITLE_INVALID";
            }else if ($_POST['pro_id']=="") {
            $_select_max_id_for_add_id=$_SQL($con,"SELECT _id FROM spa_product WHERE _id=(SELECT MAX(_id)FROM spa_product)");
            $result=$_ASSOC($_select_max_id_for_add_id);
            $max_number=$result['_id'];
            if($max_number==""){
                $id_number=1;
            }else{ 
                $id_number=$max_number+1;
            }
            $_saveData = $_SQL($con, "INSERT INTO spa_product VALUES('$id_number','$_AUTO_ID','$pro_cate_id','$pro_title','true','$img','$pro_note','$_TIMESTAMP','$_USER_ID')");
            if($_saveData){
                 @move_uploaded_file($tmp_dir, $upload_dir.$img);
               echo 200;
            }else{
                 echo 400;
               }
        }else {
        $id = $_POST['pro_id'];
        $Updated=mysqli_query($con,"UPDATE spa_product SET pro_cate_id='$pro_cate_id',pro_title='$pro_title',pro_img='$img',pro_note='$pro_note',pro_createdAt='$_TIMESTAMP',pro_createdBy='$_USER_ID' WHERE pro_id='$id'");
            if($Updated){
               @unlink($tmp_dir, $upload_dir.$rows['pro_img']);
               @move_uploaded_file($tmp_dir, $upload_dir.$img);
               echo 200;
            }else{
                echo 400;
         }
    }         
mysqli_close($con);
exit();
?>