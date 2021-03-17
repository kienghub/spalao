<!-- Sidebar wrapper start -->
<nav id="sidebar" class="sidebar-wrapper">
    <!-- Sidebar brand start  -->
    <div class="sidebar-brand">
        <a href="../../services/home/" class="logo" style="margin-left:-5px">
            <img src="../../img/../img/<?php if($_profile['p_logo']){echo $_profile['p_logo'];}else{echo 'app-logo.png';}?>"
                alt="">
            &nbsp;&nbsp;<h2 class="mt-2 text-white">S<span style="color:yellow">PA</span></h2>
        </a>
    </div>
    <!-- Sidebar brand end  -->
    <!-- Sidebar content start -->
    <div class="sidebar-content">
        <!-- sidebar menu start -->
        <div class="sidebar-menu">
            <ul>
                <li class="home">
                    <a href="../../services/home/">
                        <i class="icon-home"></i>
                        <span class="menu-text">ໜ້າຫຼັກ</span>
                    </a>
                </li>

                <li class="sale">
                    <a href="../../services/sale/">
                        <i class="icon-airplay"></i>
                        <span class="menu-text">ໜ້າຂາຍ</span>
                    </a>
                </li>
                <li class="apointment">
                    <a href="../../services/sale/">
                        <i class="icon-edit1"></i>
                        <span class="menu-text">ການຈັດໝາຍ</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="equiment">
                        <i class="icon-archive1"></i>
                        <span class="menu-text">ຈັດການອຸປະກອນ</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="../../services/typeequiment/">ປະເພດອຸປະກອນ</a>
                            </li>
                            <li>
                                <a href="../../services/equiment/">ເພີ່ມອຸປະກອນ</a>
                            </li>
                            <li>
                                <a href="../../services/estocks/?all=true">ອຸປະກອນໃນສາງທັງໝົດ</a>
                            </li>
                            <li>
                                <a href="../../services/estocks/report_equiment.php">ລາຍງານອຸປະກອນທັງໝົດ</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-line-chart"></i>
                        <span class="menu-text">ສະຫຼຸບການຂາຍ</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">ສະຫຼຸບປະຈຳວັນ</a>
                            </li>
                            <li>
                                <a href="#">ສະຫຼຸບປະຈຳເດືອນ</a>
                            </li>
                            <li>
                                <a href="#">ສະຫຼຸບປະຈຳປີ</a>
                            </li>
                            <li>
                                <a href="#">ສະຫຼຸບໜີ້</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end -->

    </div>
    <!-- Sidebar content end -->

</nav>
<!-- Sidebar wrapper end -->