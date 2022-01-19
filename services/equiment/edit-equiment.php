<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../Components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <?php include('../../connection.php') ?>
    <?php _active('.equiment') ?>
</head>
<?php
$queryEquiment = $_SQL($con, "SELECT
	spa_equiment.*, 
	spa_etype.etype_name_l, 
	spa_etype.etype_name_e
FROM
	spa_equiment LEFT JOIN spa_etype on spa_equiment.e_cate_id=spa_etype.etype_id WHERE e_id='$_GET[id]'");
$_res = $_ASSOC($queryEquiment);
?>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper pinned">
        <div class="page-content">
            <?php include('../../components/layout/side-bar.php') ?>
            <?php include_once('../../components/layout/heading.php') ?>

            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" onclick="window.location='./'">ລາຍການອຸປະກອນ</li>
                    <li class="breadcrumb-item active">ແກ້ໄຂຂໍ້ມູນອຸປະກອນ</li>
                </ol>
                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock" onload="showTime()">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <form action="#" method="post" enctype="multipart/form-data">
                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="account-settings">
                                        <div class="user-profile">
                                            <div class="user-avatar">
                                                <div class="image">
                                                    <div class="dropbox">
                                                        <input type="file" name="e_img" onchange="readURL(this);"
                                                            id="file-5" class="hidden inputfile inputfile-4"
                                                            data-multiple-caption="{count} files selected" multiple
                                                            style="display: none!important" />
                                                        <label for="file-5">
                                                            <img src="../../img/<?php if ($_res['e_img']) {
                                                                                    echo $_res['e_img'];
                                                                                } else {
                                                                                    echo 'photo.jpg';
                                                                                } ?>" id="preview"
                                                                style="width:150px;height:150px;margin-bottom:15px" />
                                                            <span class="btn btn-success btn-block"><i
                                                                    class="fa fa-paperclip"></i> ເລືອກຮູບ</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                            <div class="card h-100">
                                <div class="card-header">
                                    <div class="card-title">ຂໍ້ມູນອຸປະກອນ</div>
                                </div>
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="fullName">ໝວດອຸປະກອນ <?php isVal() ?></label>
                                                <select class="form-control select2" name="e_cate_id" required>
                                                    <option value="<?php echo $_res['e_cate_id'] ?>">
                                                        <?php echo $_res['etype_name_l'] ?></option>
                                                    <?php
                                                    $queryCategory = $_SQL($con, "SELECT * FROM spa_etype");
                                                    $x = 1;
                                                    foreach ($queryCategory as $key) {
                                                    ?>
                                                    <option value="<?php echo $key['etype_id'] ?>">
                                                        <?php echo $key['etype_name_l'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຊື່ອຸປະກອນ(ລາວ) <?php isVal() ?></label>
                                                <input type="hidden" class="form-control" name="e_id"
                                                    value="<?php echo $_res['e_id'] ?>" required>
                                                <input type="text" class="form-control" name="e_name_l"
                                                    value="<?php echo $_res['e_name_l'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຊື່ອຸປະກອນ(ອັງກິດ)</label>
                                                <input type="text" class="form-control" name="e_name_e"
                                                    value="<?php echo $_res['e_name_e'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຫົວໜ່ວຍ <?php isVal() ?></label>
                                                <input type="text" class="form-control" name="e_type"
                                                    value="<?php echo $_res['e_type'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຂະໜາດ <?php isVal() ?></label>
                                                <select name="e_size" class="form-control" required>
                                                    <option value="<?php echo $_res['e_size'] ?>">
                                                        <?php echo $_res['e_size'] ?></option>
                                                    <option value="ປົກກະຕິ">ປົກກະຕິ</option>
                                                    <option value="ນ້ອຍ">ນ້ອຍ</option>
                                                    <option value="ກາງ">ກາງ</option>
                                                    <option value="ໃຫຍ່">ໃຫຍ່</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ລາຄາຊື້</label>
                                                <input type="number" class="form-control text-right" name="e_Bprice"
                                                    value="<?php echo $_res['e_Bprice'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ໝາຍເຫດ</label>
                                                <textarea name="e_note" id="e_note" cols="30" class="form-control"
                                                    rows="4"
                                                    value="<?php echo $_res['e_note'] ?>"><?php echo $_res['e_note'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text">
                                                <button type="submit" name="_handleSubmit"
                                                    class="btn btn-outline-primary"><i class="icon-check-circle"></i>
                                                    ຢືນຢັນ</button>
                                                <a href="../users/user-profile.php?id=<?php echo $res['user_id'] ?>"
                                                    class="btn btn-outline-danger"><i class="icon-close"></i>
                                                    ຍົກເລີກ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </form>
            </div>
            <!-- Main container end -->
        </div>
        <!-- Main container end -->
    </div>
    <!-- Page content end -->
    </div>
    <!-- Page wrapper end -->
    <?php include('../../components/lib/script.php') ?>
    <script src="app.js"></script>
    <?php
    require_once('../../connection.php');
    if (isset($_POST['_handleSubmit'])) {
        $e_id = $_SETSTRING($con, $_POST['e_id']);
        $e_cate_id = $_SETSTRING($con, $_POST['e_cate_id']);
        $e_name_l = $_SETSTRING($con, $_POST['e_name_l']);
        $e_name_e = $_SETSTRING($con, $_POST['e_name_e']);
        $e_type = $_SETSTRING($con, $_POST['e_type']);
        $e_size = $_SETSTRING($con, $_POST['e_size']);
        $e_Bprice = $_SETSTRING($con, $_POST['e_Bprice']);
        $e_note = $_SETSTRING($con, $_POST['e_note']);

        //Check DAta IMG
        $selectMenu = $_SQL($con, "SELECT * FROM spa_equiment WHERE e_id='$e_id'");
        $res = $_ASSOC($selectMenu);

        @$file_img    = $_FILES['e_img']['name'];
        @$tmp_dir    = $_FILES['e_img']['tmp_name'];

        @$upload_dir = '../../img/'; // upload directory
        @$fileExt  = strtolower(pathinfo($file_img, PATHINFO_EXTENSION));
        if ($file_img == "") {
            $img = $res['e_img'];
        } else {
            @$img = rand(100000, 1000000) . "." . $fileExt;
        }

        $data = "e_cate_id='$e_cate_id',e_name_l='$e_name_l',e_name_e='$e_name_e',e_type='$e_type',e_size='$e_size',e_Bprice='$e_Bprice',e_note='$e_note',e_img='$img',e_createdAt='$_DATE',e_createdBy='$_USER_ID'";
        $createdEqument = $_SQL($con, "UPDATE spa_equiment SET $data WHERE e_id='$e_id'");
        if ($createdEqument) {
            echo "<script>
            Notiflix.Notify.Success('ການດຳເນີນງານສຳເລັດ');
            setTimeout(() => {
                window.location='./'
            }, 2000);
            </script>";
            @unlink($tmp_dir, $upload_dir . $img);
            @move_uploaded_file($tmp_dir, $upload_dir . $img);
        } else {
            echo "<script>
                Notiflix.Notify.Failure('ການດຳເນີນງານບໍ່ສຳເລັດ');
                setTimeout(() => {
                    window.location='./edit-equiment.php?id=$e_id'
                    }, 2000);
            </script>";
        }
    }
    ?>
</body>

</html>