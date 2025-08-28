<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title></title>

    <!-- Site favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="<?= base_url('assets/master/vendors/images/apple-touch-icon.png') ?>" />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="<?= base_url('assets/master/vendors/images/favicon-32x32.png') ?>" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="<?= base_url('assets/master/vendors/images/favicon-16x16.png') ?>" />

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
    <link
        rel="stylesheet"
        type="text/css"
        href="<?= base_url('assets/master/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>" />
    <link
        rel="stylesheet"
        type="text/css"
        href="<?= base_url('assets/master/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>" />
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

<body>
    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div
                class="search-toggle-icon bi bi-search"
                data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input
                            type="text"
                            class="form-control search-input"
                            placeholder="Search Here" />
                        <div class="dropdown">
                            <a
                                class="dropdown-toggle no-arrow"
                                href="#"
                                role="button"
                                data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input
                                            class="form-control form-control-sm form-control-line"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input
                                            class="form-control form-control-sm form-control-line"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input
                                            class="form-control form-control-sm form-control-line"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a
                        class="dropdown-toggle no-arrow"
                        href="javascript:;"
                        data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a
                        class="dropdown-toggle no-arrow"
                        href="#"
                        role="button"
                        data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/img.jpg" alt="" />
                                        <h3>John Doe</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo1.jpg" alt="" />
                                        <h3>Lea R. Frith</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo2.jpg" alt="" />
                                        <h3>Erik L. Richards</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo3.jpg" alt="" />
                                        <h3>John Doe</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo4.jpg" alt="" />
                                        <h3>Renee I. Hansen</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/img.jpg" alt="" />
                                        <h3>Vicki M. Coleman</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a
                        class="dropdown-toggle"
                        href="#"
                        role="button"
                        data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="vendors/images/photo1.jpg" alt="" />
                        </span>
                        <span class="user-name">Ross C. Lopez</span>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="<?= base_url('/logout') ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a
                        href="javascript:void(0);"
                        class="btn btn-outline-primary header-white active">White</a>
                    <a
                        href="javascript:void(0);"
                        class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a
                        href="javascript:void(0);"
                        class="btn btn-outline-primary sidebar-light">White</a>
                    <a
                        href="javascript:void(0);"
                        class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebaricon-1"
                            name="menu-dropdown-icon"
                            class="custom-control-input"
                            value="icon-style-1"
                            checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebaricon-2"
                            name="menu-dropdown-icon"
                            class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebaricon-3"
                            name="menu-dropdown-icon"
                            class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebariconlist-1"
                            name="menu-list-icon"
                            class="custom-control-input"
                            value="icon-list-style-1"
                            checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebariconlist-2"
                            name="menu-list-icon"
                            class="custom-control-input"
                            value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebariconlist-3"
                            name="menu-list-icon"
                            class="custom-control-input"
                            value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebariconlist-4"
                            name="menu-list-icon"
                            class="custom-control-input"
                            value="icon-list-style-4"
                            checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebariconlist-5"
                            name="menu-list-icon"
                            class="custom-control-input"
                            value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="sidebariconlist-6"
                            name="menu-list-icon"
                            class="custom-control-input"
                            value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <!-- <a href="index.html">
                <img src="<?= base_url('assets/master/vendors/images/deskapp-logo.svg') ?>" alt="" class="dark-logo" />
                <img
                    src=" <?= base_url('assets/master/vendors/images/deskapp-logo-white.svg') ?>"
                    alt=""
                    class="light-logo" />
            </a> -->
            <!-- <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div> -->
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="<?= base_url('konten/dashboard') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/product') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Kategori Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Gudang</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Pegerakan Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-receipt-cutoff"></span><span class="mtext">Penjualan/Invoice</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-user-circle"></span><span class="mtext">Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <a href="<?= base_url('/logout') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-logout"></span><span class="mtext">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Dashboard</h2>
            </div>
            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">75</div>
                                <div class="font-14 text-secondary weight-500">
                                    Appointment
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy dw dw-calendar1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">124,551</div>
                                <div class="font-14 text-secondary weight-500">
                                    Total Patient
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <span class="icon-copy ti-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">400+</div>
                                <div class="font-14 text-secondary weight-500">
                                    Total Doctor
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon">
                                    <i
                                        class="icon-copy fa fa-stethoscope"
                                        aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">$50,000</div>
                                <div class="font-14 text-secondary weight-500">Earning</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#09cc06">
                                    <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Chat with AI
                        </div>

                        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                            <!-- Chat Bubble: User -->
                            <div class="direct-chat-messages" id="chat-box">
                                <!-- Pesan chat akan muncul di sini -->
                            </div>
                        </div>

                        <div class="card-footer">
                            <form onsubmit="return false;">
                                <div class="input-group">
                                    <input type="text" id="chat-input" placeholder="Ask Anything" class="form-control" />
                                    <span class="input-group-append">
                                        <button type="button" id="chat-send" class="btn btn-primary">Kirim</button>
                                    </span>
                                </div>
                            </form>
                        </div>
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
    <script src="<?= base_url('assets/master/src/plugins/apexcharts/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/master/src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/master/src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/master/src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('assets/master/src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
    <!-- <script src="<?= base_url('assets/master/vendors/scripts/dashboard3.js') ?>"></script> -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
            height="0"
            width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatBox = document.getElementById('chat-box');
            const input = document.getElementById('chat-input');
            const button = document.getElementById('chat-send');

            function escapeHtml(unsafe) {
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            function appendMessage(text, sender = 'user', isLoading = false) {
                const time = new Date().toLocaleTimeString();
                const name = sender === 'user' ? 'Saya' : 'AI';

                let safeText = escapeHtml(text);
                safeText = safeText.replace(/\n/g, '<br>');
                safeText = safeText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

                const loadingHtml = isLoading ? '<em>Sedang Mengetik.....</em>' : '';
                const loadingIdAttr = isLoading ? `id="loading-msg"` : '';

                const bubbleWrapper = document.createElement('div');
                bubbleWrapper.setAttribute('style', `
        display: flex;
        justify-content: ${sender === 'user' ? 'flex-end' : 'flex-start'};
        margin-bottom: 10px;
    `);
                if (isLoading) bubbleWrapper.id = "loading-msg";

                const bubble = document.createElement('div');
                bubble.setAttribute('style', `
        background-color: ${sender === 'user' ? '#007bff' : '#e5e5ea'};
        color: ${sender === 'user' ? 'white' : 'black'};
        padding: 10px;
        border-radius: 10px;
        max-width: 70%;
        white-space: pre-wrap;
        font-size: 14px;
    `);

                const meta = document.createElement('div');
                meta.setAttribute('style', 'font-size: 12px; opacity: 0.6; margin-bottom: 5px;');
                meta.textContent = `${name} • ${time}`;

                const message = document.createElement('div');
                message.innerHTML = safeText + (isLoading ? loadingHtml : '');

                bubble.appendChild(meta);
                bubble.appendChild(message);
                bubbleWrapper.appendChild(bubble);
                chatBox.appendChild(bubbleWrapper);

                chatBox.scrollTop = chatBox.scrollHeight;
            }


            // Hapus elemen loading saat AI sudah selesai menjawab
            function removeLoading() {
                const loadingMsg = document.getElementById('loading-msg');
                if (loadingMsg) {
                    loadingMsg.remove();
                }
            }

            button.addEventListener('click', function() {
                const message = input.value.trim();
                if (message === '') return;

                appendMessage(message, 'user');
                appendMessage('', 'Quantura AI', true);

                fetch('/index.php/chat/ask', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'message=' + encodeURIComponent(message)
                    })
                    .then(res => res.json())
                    .then(data => {
                        removeLoading();
                        appendMessage(data.reply || 'Tidak ada jawaban.', 'ai');
                        input.value = '';
                    })
                    .catch(err => {
                        removeLoading();
                        appendMessage('Gagal menghubungi server: ' + err.message, 'ai');
                    });
            });


            // -----------------------------------------//
            // Mengambil sebuah data
            // button.addEventListener('click', function() {
            //     const message = input.value.trim();
            //     if (message === '') return;

            //     appendMessage(message, 'user');

            //     // Tampilkan loading dulu
            //     appendMessage('', 'ai', true);

            //     fetch('/index.php/chat/ask', {
            //             method: 'GET',
            //             headers: {
            //                 'Content-Type': 'application/x-www-form-urlencoded'
            //             },
            //             body: 'message=' + encodeURIComponent(message)
            //         })
            //         .then(res => res.json())
            //         .then(data => {
            //             removeLoading();
            //             appendMessage(data.reply || 'Tidak ada jawaban.', 'ai');
            //             input.value = '';
            //         })
            //         .catch(err => {
            //             removeLoading();
            //             appendMessage('Gagal menghubungi server: ' + err.message, 'ai');
            //         });
            // });


            // -----------------------------------------//
            // Menghapus Sebuah Data
            // button.addEventListener('click', function() {
            //     const message = input.value.trim();
            //     if (message === '') return;

            //     appendMessage(message, 'user');

            //     // Tampilkan loading dulu
            //     appendMessage('', 'ai', true);

            //     fetch('/index.php/chat/ask', {
            //             method: 'DELETE',
            //             headers: {
            //                 'Content-Type': 'application/x-www-form-urlencoded'
            //             },
            //             body: 'message=' + encodeURIComponent(message)
            //         })
            //         .then(res => res.json())
            //         .then(data => {
            //             removeLoading();
            //             appendMessage(data.reply || 'Tidak ada jawaban.', 'ai');
            //             input.value = '';
            //         })
            //         .catch(err => {
            //             removeLoading();
            //             appendMessage('Gagal menghubungi server: ' + err.message, 'ai');
            //         });
            // });

            // Kirim saat Enter ditekan
            input.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') {
                    button.click();
                }
            });
        });
    </script>
</body>

</html>