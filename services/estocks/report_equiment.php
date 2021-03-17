<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <?php _active('.equiment')?>
    <style>
    @media print {
        .table {
            boder: 1px solid #ccc !important
        }
    }
    </style>
</head>

<body ng-app="app" ng-controller="controller" ng-init="_callOrder();_barcallOrder();">
    <!-- Page wrapper start -->
    <div class="page-wrapper pinned">
        <?php 
        include('../../components/layout/side-bar.php')
         ?>
        <!-- Page content start  -->
        <div class="page-content">
            <?php include_once('../../components/layout/heading.php') ?>
            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" onclick="window.location='../home/'">ໜ້າຫຼັກ</li>
                    <li class="breadcrumb-item active">ລາຍງານອຸປະກອນທັງໝົດໃນສາງ</li>
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
                <div class="row no-gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-1">
                        <!-- Row start -->
                        <div class="table-container">
                            <div class="t-header h5">
                                <i class="icon-list"></i> ລາຍງານອຸປະກອນທັງໝົດໃນສາງ
                                <div class="float-right">
                                    <!-- <a href="#" class="btn btn-success m-1">
                                        <ion-icon name="document-outline" style="margin-bottom:-3px"></ion-icon> Export
                                        Excel
                                    </a> -->
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <table width="100%">
                                    <tr>
                                        <td style="text-align:right;width:150px">
                                            <a href="#" id="printEstock" class="btn btn-warning btn-block p-2 m-1"
                                                style="width:130px">
                                                <ion-icon name="print-outline" style="margin-bottom:-3px"></ion-icon>
                                                ພິມລາຍງານ
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div id="reportEstock" class="table-responsive">
                                <div class="lablesContainerScroll p-2">
                                    <table class="table table-sm table-bordered"
                                        style="width:100%!important;font-size:11px">
                                        <tr>
                                            <th style="text-align:center" width='90'>ລຳດັບ</th>
                                            <th style="text-align:center">ລາຍການ(ລາວ)</th>
                                            <th style="text-align:center">ລາຍການ(ອັງກິດ)</th>
                                            <th style="text-align:center">ຫົວໜ່ວຍ</th>
                                            <th style="text-align:center">ຂະໜາດ</th>
                                            <th style="text-align:center">ຈຳນວນ</th>
                                            <th style="text-align:center">ລາຄາຊື້</th>
                                            <th style="text-align:center">ເວລາ</th>
                                            <th style="text-align:center">ຜູ້ຮັບຜິດຊອບ</th>
                                            <th style="text-align:center">ໝາຍເຫດ</th>
                                        </tr>
                                        <?php  
                                            $callCate=$_SQL($con,"SELECT
                                                spa_estock.*, 
                                                spa_etype.etype_name_l, 
                                                spa_etype.etype_name_e, 
                                                spa_equiment.e_cate_id,spa_etype.etype_id FROM
                                                spa_estock LEFT JOIN spa_equiment ON spa_estock.est_equiment=spa_equiment.e_id
                                                LEFT JOIN spa_etype ON spa_equiment.e_cate_id=spa_etype.etype_id");
                                            foreach ($callCate as $res) {
                                    ?>
                                        <tr style="background-color:#d3f9d8" id='row'>
                                            <td colspan='10'>&nbsp; ໝວດໝູ່: <?php echo $res['etype_name_l'] ?></td>
                                        </tr>
                                        <?php
                                            $etype=$res['etype_id'];
                                            $i=1;
                                            $callOrderAll =$_SQL($con, "SELECT
                                            spa_estock.*, 
                                            spa_equiment.e_cate_id, 
                                            spa_equiment.e_name_l, 
                                            spa_equiment.e_name_e, 
                                            spa_equiment.e_type, 
                                            spa_equiment.e_size, 
                                            spa_equiment.e_Bprice, 
                                            spa_equiment.e_status, 
                                            spa_equiment.e_img, 
                                            spa_equiment.e_note, 
                                            spa_equiment.e_createdAt, 
                                            spa_equiment.e_createdBy
                                        FROM
                                            spa_estock LEFT JOIN spa_equiment ON spa_estock.est_equiment=spa_equiment.e_id WHERE spa_equiment.e_cate_id='$etype'");
                                            foreach ($callOrderAll as $key){
                                        ?>
                                        <tr style="background-color:#f1f1f1" id="row">
                                            <td style="text-align:center"><?php echo $i ;?></td>
                                            <td><?php echo $key['e_name_l']?></td>
                                            <td><?php echo $key['e_name_e']?></td>
                                            <td style="text-align:center"><?php echo $key['e_type']?>
                                            </td>
                                            <td style="text-align:center"><?php echo $key['e_size']?>
                                            </td>
                                            <td style="text-align:center">
                                                <?php echo @number_format($key['est_qty'])?></td>
                                            <td style="text-align:right">
                                                <?php echo @number_format($key['e_Bprice'])?></td>
                                            <td style="text-align:center"><?php echo $key['e_createdAt']?>
                                            </td>
                                            <td style="text-align:center"><?php _renderUserName($key['e_createdBy']) ?>
                                            </td>
                                            <td><?php echo $key['e_note']?></td>
                                        </tr>

                                        <?php $i++; }} ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Main container end -->
        </div>


        <!-- Page content end -->
    </div>
    <!-- Page wrapper end -->
    <?php include('../../components/lib/script.php') ?>
    <script src="app.js"></script>
</body>

</html>