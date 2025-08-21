<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= esc($title ?? 'Default') ?></title>
    <!-- loader-->
    <link href="<?= base_url('template/assets/css/pace.min.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('template/assets/js/pace.min.js') ?>"></script>
    <!--favicon-->
    <link rel="icon" href="<?= base_url('template/assets/images/quantura.png') ?>" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="<?= base_url('template/assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="<?= base_url('template/assets/css/animate.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="<?= base_url('template/assets/css/icons.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="<?= base_url('template/assets/css/app-style.css') ?>" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme2">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-1">
                    <!-- <div class="text-center">
                        <img src="<?= base_url('template/assets/images/quantura.png') ?>" alt="logo icon">
                    </div> -->
                    <div class="card-title text-uppercase text-center py-3">Quantura</div>
                    <form action="<?= base_url('auth/login') ?>" method="post" novalidate>
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" name="username" class="form-control input-shadow" placeholder="Masukan Username" required value="<?= old('username') ?>">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Masukkan Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <div class="icheck-material-white">
                                    <input type="checkbox" id="user-checkbox" checked="" />
                                    <label for="user-checkbox">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light btn-block">Sign In</button>
                    </form>
                </div>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="<?= base_url('template/javaScript:void();') ?>" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--start color switcher-->
        <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher-->

    </div><!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('template/assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('template/assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('template/assets/js/bootstrap.min.js') ?>"></script>

    <!-- sidebar-menu js -->
    <script src="<?= base_url('template/assets/js/sidebar-menu.js') ?>"></script>

    <!-- Custom scripts -->
    <script src="<?= base_url('template/assets/js/app-script.js') ?>"></script>

    <script>
        Swal.fire({
            title: "Opps...",
            text: "Login Gagal",
            icon: "error"
        });
    </script>
</body>

</html>