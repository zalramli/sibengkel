<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="assets/template2/img/logo/logo.png" alt="" /></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle"><span><?= $_SESSION['username'] ?> : <?= $_SESSION['akses'] ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link dropdown-toggle">logout <span><i class="notika-icon notika-next"></i></span></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>