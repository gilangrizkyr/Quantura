<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title><?= esc($title ?? 'default') ?></title>

    <!-- Site favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="<?= base_url('assets/vendors/images/apple-touch-icon.png') ?>" />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="<?= base_url('assets/vendors/images/favicon-32x32.png') ?>" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="<?= base_url('assets/vendors/images/favicon-16x16.png') ?>" />

    <!-- Mobile Specific Metas -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/master/vendors/styles/core.css') ?>" />
    <link
        rel="stylesheet"
        type="text/css"
        href="<?= base_url('assets/master/vendors/styles/icon-font.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/master/vendors/styles/style.css') ?>" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
        async
        src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script
        async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
        crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>

<body class="login-page">
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url('assets/master/vendors/images/login-page-img.png') ?>" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login</h2>
                        </div>
                        <form action="<?= base_url('auth/login') ?>" method="post" novalidate>
                            <div class="input-group custom">
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control form-control-lg"
                                    placeholder="Username"
                                    required
                                    value="<?= old('username') ?>" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control form-control-lg"
                                    placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"> Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?= base_url('assets/master/vendors/scripts/core.js') ?>"></script>
    <script src="<?= base_url('assets/master/vendors/scripts/script.min.js') ?>"></script>
    <script src="<?= base_url('assets/master/vendors/scripts/process.js') ?>"></script>
    <script src="<?= base_url('assets/master/vendors/scripts/layout-settings.js') ?>"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
            height="0"
            width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>