<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ADMIN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('public/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('public/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendor/bootstrap/css/chat-modal.css') }}" rel="stylesheet">

    {{-- <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js "></script> --}}

    <!-- Template Main CSS File -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('public/admin/sweatalert/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/admin/sweatalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>


    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('public/admin/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" id="open-chat-notification" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number" id="new-msg-notification"></span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages" style="">
                        <li class="dropdown-header" id="new-msg">

                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <div class="" id="chat-msg">
                        </div>



                    </ul><!-- End Messages Dropdown Items -->
                </li>

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('public/admin/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">ADMIN</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-box-arrow-right" style="color: red;font-weight:700;"></i>
                                <span style="color: red;font-weight:700;">Sign Out</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading">
                Apps
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ url('/admin/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>



            <li class="nav-item">
                <a href="{{ url('admin/category') }}" class="nav-link">
                    <i class="bi bi-tag"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/form-fields') }}" class="nav-link">
                    <i class="bi bi-list"></i>
                    <span>Form Fields</span>
                </a>
            </li>


            <li class="nav-heading">
                Management
            </li>


            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse"
                        href="#" aria-expanded="false">
                        <i class="bi bi-image-fill"></i><span>Ads</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                        <li>
                            <a href="{{ url('admin/active-ads') }}">
                                <i class="bi bi-circle"></i><span>Active Ads</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/pending-ads') }}" id="pendingAds">
                                <i class="bi bi-circle"></i><span>Pending Ads</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/hidden-ads') }}">
                                <i class="bi bi-circle"></i><span>Hidden by user</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/resubmitted-ads') }}">
                                <i class="bi bi-circle"></i><span>Resubmitted Ads</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/expired-ads') }}">
                                <i class="bi bi-circle"></i><span>Expired Ads</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/rejected-ads') }}">
                                <i class="bi bi-circle"></i><span>Rejected Ads</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/all-ads') }}">
                                <i class="bi bi-circle"></i><span>All Ads List</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Forms Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse"
                        href="#" aria-expanded="false">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Membership</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="tables-general.html">
                                <i class="bi bi-circle"></i><span>Plans</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-data.html">
                                <i class="bi bi-circle"></i><span>Custom Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-data.html">
                                <i class="bi bi-circle"></i><span>Upgrade</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-data.html">
                                <i class="bi bi-circle"></i><span>Cron Logs</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Tables Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="users-profile.html">
                        <i class="bi bi-person"></i>
                        <span>Taxes</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-faq.html">
                        <i class="bi bi-question-circle"></i>
                        <span>Payment Method</span>
                    </a>
                </li><!-- End F.A.Q Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-contact.html">
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li><!-- End Contact Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-register.html">
                        <i class="bi bi-card-list"></i>
                        <span>Register</span>
                    </a>
                </li><!-- End Register Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-login.html">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Login</span>
                    </a>
                </li><!-- End Login Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-error-404.html">
                        <i class="bi bi-dash-circle"></i>
                        <span>Error 404</span>
                    </a>admin-chat-modal
                </li><!-- End Error 404 Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-blank.html">
                        <i class="bi bi-file-earmark"></i>
                        <span>Blank</span>
                    </a>
                </li><!-- End Blank Page Nav -->

            </ul>


        </ul>

    </aside>

    <!-- Modal -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Admin Chat Panel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container w-100" id='viewChat'>

            </div>
        </div>
    </div>
    <!-- modal -->

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            function loadChat() {
                $.ajax({
                    url: "{{ url('admin/load-new-chats-count') }}",
                    type: "POST",
                    success: function(res) {
                        $('#new-msg-notification').html(res);
                    }
                });
            }
            loadChat();



            $(document).on('click', '#open-chat-notification', function() {
                $('#chat-msg').html(``);
                $.ajax({
                    url: "{{ url('admin/load-chats') }}",
                    type: "POST",
                    success: function(res) {
                        console.log(res);
                        let unseen = 0;

                        console.log(unique);
                        $.each(res, function(key, value) {
                            if (value.sender == 'user') {
                                if (value.status == 'unseen') {
                                    unseen++;
                                    $('#chat-msg').append(`
                                        <li class="message-item unseen-msg" msg-from='${value.userid}' chatid='${value.chatid}'>
                                                <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                                    <div class="position-relative">
                                                        <span class="badge bg-success badge-number" id="new-msg-notification">5</span>
                                                        <h4>${value.username}</h4>
                                                        <p>${value.message}</p>
                                                        <p>4 hrs. ago</p>
                                                    </div>
                                                </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    `);
                                }
                            }
                        });
                        if (unseen <= 1) {
                            $('#new-msg').html(`
                                You have ${unseen} new message
                                <a class="badge rounded-pill bg-primary p-2 ms-2 text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">View all</a>
                            `);
                        } else {
                            $('#new-msg').html(`
                                You have ${unseen} unseen messages
                                <a class="badge rounded-pill bg-primary p-2 ms-2 text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">View all</a>
                            `);
                        }
                    }
                });
            });

            $(document).on('click', '.unseen-msg', function() {
                let msgFrom = $(this).attr('msg-from');
                let chatId = $(this).attr('chatid');
                $.ajax({
                    url: "{{ url('admin/open-chat-message') }}",
                    type: "POST",
                    data: {
                        msg_from: msgFrom,
                        chat_id: chatId,
                    },
                    success: function(res) {
                        $('#viewChat').html(`
                            <div class="container">
                                <h1>${res.username}</h1>
                                <p>${res.message}</p>
                            </div>
                        `);
                        console.log(res);
                    }
                });
            });

            setInterval(() => {
                loadChat();
            }, 1000);
        });
    </script>
