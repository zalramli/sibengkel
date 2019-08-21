<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">

                    <li class="<?php 
                    if ($_GET['halaman'] == "dashboard") {echo 'active';}
                    ?>">
                        <a href="admin.php?halaman=dashboard"><i class="notika-icon notika-house"></i> Dashboard</a>
                    </li>

                    <li class="<?php 
                    if ($_GET['halaman'] == "v_penggajian") {echo 'active';}
                    if ($_GET['halaman'] == "add_penggajian") {echo 'active';}
                    ?>">
                        <a href="admin.php?halaman=v_penggajian"><i class="notika-icon notika-bar-chart"></i> Penggajian</a>
                    </li>

                    <li class="<?php 
                    if ($_GET['halaman'] == "v_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "add_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "edit_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "v_jenis_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "add_jenis_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "edit_jenis_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "v_mekanik") {echo 'active';}
                    if ($_GET['halaman'] == "add_mekanik") {echo 'active';}
                    if ($_GET['halaman'] == "edit_mekanik") {echo 'active';}
                    ?>">
                        <a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> Data Pegawai</a>
                    </li>

                    <li class="<?php 
                    if ($_GET['halaman'] == "laporan_transaksi") {echo 'active';}
                    ?>">
                        <a href="?halaman=laporan_transaksi"><i class="notika-icon notika-bar-chart"></i> Laporan</a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX
                    <?php 
                    if ($_GET['halaman'] == "v_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "add_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "edit_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "v_jenis_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "add_jenis_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "edit_jenis_pegawai") {echo 'active';}
                    if ($_GET['halaman'] == "v_mekanik") {echo 'active';}
                    if ($_GET['halaman'] == "add_mekanik") {echo 'active';}
                    if ($_GET['halaman'] == "edit_mekanik") {echo 'active';}

                    ?>">
                        <ul class="notika-main-menu-dropdown">

                            <li><a href="admin.php?halaman=v_pegawai">Pegawai</a>
                            </li>

                            <li><a href="admin.php?halaman=v_jenis_pegawai">Jenis Pegawai</a>
                            </li>

                            <li><a href="admin.php?halaman=v_mekanik">Mekanik</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>