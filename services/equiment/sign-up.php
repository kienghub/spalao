<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <?php include('../../connection.php') ?>
    <?php _active('.equiment') ?>
</head>

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
                    <li class="breadcrumb-item active">ເພີ່ມຂໍ້ມູນອຸປະກອນ</li>
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
                                                            <img src="../../img/photo.jpg" id="preview"
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
                                                    <option value="">-- ເລືອກ --</option>
                                                    <?php
                                                    $queryEtype = $_SQL($con, "SELECT * FROM spa_etype");
                                                    $x = 1;
                                                    foreach ($queryEtype as $key) {
                                                    ?>
                                                    <option value="<?php echo $key['etype_id'] ?>">
                                                        <?php echo $key['etype_name_l'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຊື່ອຸປະກອນ(ລາວ) <?php isVal() ?></label>
                                                <input type="text" class="form-control" name="e_name_l"
                                                    placeholder="ກະລຸນາປ້ອນຊື່ອຸປະກອນ(ລາວ)" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຊື່ອຸປະກອນ(ອັງກິດ)</label>
                                                <input type="text" class="form-control" name="e_name_e"
                                                    placeholder="ກະລຸນາປ້ອນຊື່ອຸປະກອນ(ອັງກິດ)">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຫົວໜ່ວຍ <?php isVal() ?></label>
                                                <input type="text" class="form-control" name="e_type"
                                                    placeholder="ກະລຸນາປ້ອນຫົວໜ່ວຍ" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ຂະໜາດ <?php isVal() ?></label>
                                                <select name="e_size" class="form-control" required>
                                                    <option value="ປົກກະຕິ">ປົກກະຕິ</option>
                                                    <option value="ນ້ອຍ">ນ້ອຍ</option>
                                                    <option value="ກາງ">ກາງ</option>
                                                    <option value="ໃຫຍ່">ໃຫຍ່</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ລາຄາຊື້</label>
                                                <input type="number" class="form-control text-right" name="e_Bprice"
                                                    placeholder="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">ໝາຍເຫດ</label>
                                                <textarea name="e_note" id="e_note" cols="30" class="form-control"
                                                    rows="4" placeholder="ກະລຸນາປ້ອນໝາຍເຫດ"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text">
                                                <button type="submit" name="_handleSubmit"
                                                    class="btn btn-outline-primary"><i class="icon-check-circle"></i>
                                                    ຢືນຢັນ</button>
                                                <a href="../equiment/" class="btn btn-outline-danger"><i
                                                        class="icon-close"></i>
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
        $e_cate_id = $_SETSTRING($con, $_POST['e_cate_id']);
        $e_name_l = $_SETSTRING($con, $_POST['e_name_l']);
        $e_name_e = $_SETSTRING($con, $_POST['e_name_e']);
        $e_type = $_SETSTRING($con, $_POST['e_type']);
        $e_size = $_SETSTRING($con, $_POST['e_size']);
        $e_Bprice = $_SETSTRING($con, $_POST['e_Bprice']);
        $e_note = $_SETSTRING($con, $_POST['e_note']);

        @$file_img    = $_FILES['e_img']['name'];
        @$tmp_dir    = $_FILES['e_img']['tmp_name'];

        @$upload_dir = '../../img/'; // upload directory
        @$fileExt  = strtolower(pathinfo($file_img, PATHINFO_EXTENSION));
        if ($file_img == "") {
            $img = "";
        } else {
            @$img = rand(100000, 1000000) . "." . $fileExt;
        }

        //CHECK DATA DUPLICATE
        $selectMenu = $_SQL($con, "SELECT * FROM spa_equiment WHERE e_name_l='$e_name_l' AND e_name_e='$e_name_e' AND e_type='$e_type' AND e_size='$e_size'");
        $res = $_COUNT($selectMenu);
        if ($res > 0) {
            echo "<script>Notiflix.Notify.Warning('ຂໍ້ມູນທີ່ທ່ານປ່ອນມີຢູ່ແລ້ວ! ');</script>";
        } else {
            $data = "'$_AUTO_ID','$e_cate_id','$e_name_l','$e_name_e','$e_type','$e_size','$e_Bprice','true','$img','$e_note','$_DATE','$_USER_ID'";
            $createdMenu = $_SQL($con, "INSERT spa_equiment value($data)");
            if ($createdMenu) {
                @move_uploaded_file($tmp_dir, $upload_dir . $img);
                echo "<script>
                Notiflix.Notify.Success('ການດຳເນີນງານສຳເລັດ');
                setTimeout(() => {
                        window.location='./sign-up.php'
                        }, 2000);
                </script>";
            } else {
                echo "<script>
                Notiflix.Notify.Failure('ການດຳເນີນງານບໍ່ສຳເລັດ');
                setTimeout(() => {
                    window.location='./sign-up.php'
                    }, 2000);
            </script>";
            }
        }
    }
    ?>
</body>

</html>