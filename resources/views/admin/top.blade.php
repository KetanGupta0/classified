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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    {{-- <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js "></script> --}}
    
    <!-- Template Main CSS File -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/rte_theme_default.css') }}" rel="stylesheet">
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
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('admin/membership') }}">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Membership</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#members-nav" data-bs-toggle="collapse"
                        href="#" aria-expanded="false">
                        <i class="bi bi-person"></i><span>Members</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="members-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                        <li>
                            <a href="{{ url('admin/add-creators') }}">
                                <i class="bi bi-circle"></i><span>Add Creators</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/add-viewers') }}">
                                <i class="bi bi-circle"></i><span>Add Viewers</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{url('admin/transaction')}}">
                        <i class="bi bi-cash-coin"></i>
                        <span>Transactions</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{url('admin/redeem-request')}}">
                        <i class="bi bi-cart-check"></i>
                        <span>Redeem Request</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{url('admin/redeem-history')}}">
                        <i class="bi bi-clock-history"></i>
                        <span>Redeem History</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse"
                        href="#" aria-expanded="false">
                        <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                        <li>
                            <a href="{{url('admin/ads-view-settings')}}">
                                <i class="bi bi-circle"></i><span>Add View Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/redeem-settings')}}">
                                <i class="bi bi-circle"></i><span>Redeem Settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link collapsed" data-bs-target="#user-management-nav" data-bs-toggle="collapse"
                                href="#" aria-expanded="false">
                                <i class="bi bi-person fs-6"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto fs-6"></i>
                            </a>
                            <ul id="user-management-nav" class=" collapse" data-bs-parent="#user-management-nav" style="">
                                <li>
                                    <a href="{{url('admin/create-user')}}">
                                        <i class="bi bi-circle"></i><span>Create User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/manage-rights')}}">
                                        <i class="bi bi-circle"></i><span>Manage Rights</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('admin/reset-password')}}">
                                <i class="bi bi-circle"></i><span>Reset Password</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>


        </ul>

    </aside>

    <!-- Modal -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="chat-modalLabel">
        <div class="offcanvas-header" style="height: 60px;">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Admin Chat Panel</h5>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="overflow: hidden;">
            <div class="container w-100 position-relative" id="viewChat"
                style="height: calc(100vh - 100px); padding-top: 15px; overflow-y:scroll; overflow-x:hidden;">

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
            let totalMsgs = 0;

            function timeCalc(time) {
                let timestamp = new Date(time).getTime();
                let now = Date.now();
                let diff = now - timestamp;

                let seconds = Math.floor(diff / 1000);
                let minutes = Math.floor(seconds / 60);
                let hours = Math.floor(minutes / 60);
                let days = Math.floor(hours / 24);

                let result;

                if (days > 1) {
                    result = `${days} days ago`;
                } else if (days === 1) {
                    result = `1 day ago`;
                } else if (hours > 1) {
                    result = `${hours} hours ago`;
                } else if (hours === 1) {
                    result = `1 hour ago`;
                } else if (minutes > 1) {
                    result = `${minutes} minutes ago`;
                } else if (minutes === 1) {
                    result = `1 minute ago`;
                } else if (seconds > 5) {
                    result = `${seconds} seconds ago`;
                } else {
                    result = `just now`;
                }
                return result;
            }

            function loadChat() {
                $.ajax({
                    url: "{{ url('admin/load-new-chats-count') }}",
                    type: "POST",
                    success: function(res) {
                        totalMsgs = res;
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
                        let count = 0;
                        $.each(res, function(key, value) {
                            count++;
                            $('#chat-msg').append(`
                                <li class="message-item unseen-msg" msg-from='${value.user_id}'>
                                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                            <div class="position-relative w-100">
                                                <div class="" style="right: 0;">
                                                    <span class="badge bg-success badge-number" id="new-msg-notification">${value.msg_count}</span>
                                                </div>
                                                <h4>${value.username}</h4>
                                            </div>
                                        </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            `);
                        });
                        if (totalMsgs >= 1) {
                            $('#new-msg').html(`
                                You have ${totalMsgs} new message from ${count} chat
                            `);
                        } else {
                            $('#new-msg').html(`
                                You have ${totalMsgs} new message from ${count} chat
                            `);
                            $('#chat-msg').html(`
                                <div class="text-center my-3">
                                    No new message
                                </div>
                            `);
                        }
                    }
                });
            });
            let uid = 0;
            $(document).on('click', '.unseen-msg', function() {
                let msgFrom = $(this).attr('msg-from');
                $.ajax({
                    url: "{{ url('admin/open-chat-message') }}",
                    type: "POST",
                    data: {
                        uid: msgFrom,
                    },
                    success: function(res) {
                        console.log(res);
                        $('#viewChat').html(``);
                        $.each(res, function(key, value) {
                            let time = timeCalc(value.seen_time);
                            let seen = '';
                            if (value.seen == 0) {
                                seen = 'sent';
                            } else {
                                seen = 'seen';
                            }
                            if (value.sender != 'admin') {
                                uid = value.uid;
                                $('#viewChat').append(`
                                <div class="media mb-3 float-start">
                                    <div class="media-body text-light" style="padding: 10px 15px 2px 15px; width: 15rem; border-radius: 2px 16px 16px 16px; background-color: #f56969; word-wrap:wrap; overflow-wrap: break-word;">
                                        <h6 class="mt-0">${value.sender}</h6>
                                        <h5>${value.message}</h5>
                                        <p style="font-size: 12px;"><span>${seen}</span> <span>${time}</span></p>
                                    </div>
                                </div>
                                `);
                            } else {
                                $('#viewChat').append(`
                                <div class="media mb-3 float-end">
                                    <div class="media-body text-light" style="padding: 10px 15px 2px 15px; width: 15rem; border-radius: 16px 2px 16px 16px; background-color: #525252; word-wrap:wrap; overflow-wrap: break-word;">
                                        <h6 class="mt-0">You</h6>
                                        <h5>${value.message}</h5>
                                        <p style="font-size: 12px;"><span>${time}</span></p>
                                    </div>
                                </div>
                                `);
                            }
                        });
                        $('#viewChat').append(`
                            <form id="sendReplyFromAdmin" user="${uid}">
                                <div class="input-group mb-3" style="position: sticky; bottom: 0; width: 20rem;">
                                    <input type="text" name="msg" class="form-control msg" placeholder="Type your message here" aria-label="Type your message here" aria-describedby="button-send">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary msg-btn" type="button" id="button-send">Send</button>
                                    </div>
                                </div>
                            </form>
                        `);
                        // scroll to the bottom of the chat box
                        $('#viewChat').animate({
                            scrollTop: $('#viewChat').prop('scrollHeight')
                        }, 1500);
                    }
                });
            });
            $(document).on('keypress', '.msg', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $(this).closest('form').find('.msg-btn').click();
                    // scroll to the bottom of the chat box
                    $('#viewChat').animate({
                        scrollTop: $('#viewChat').prop('scrollHeight')
                    }, 1500);

                }
            });


            $(document).on('click', '.msg-btn', function() {
                let uid = $('#sendReplyFromAdmin').attr('user');
                let msg = $('.msg').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/send-reply-from-admin') }}",
                    data: {
                        uid: uid,
                        msg: msg,
                    },
                    success: function(res) {
                        if (res == 'success') {
                            let msgFrom = uid;
                            $.ajax({
                                url: "{{ url('admin/open-chat-message') }}",
                                type: "POST",
                                data: {
                                    uid: msgFrom,
                                },
                                success: function(res) {
                                    console.log(res);
                                    $('#viewChat').html(``);
                                    $.each(res, function(key, value) {
                                        let time = timeCalc(value.seen_time);
                                        let seen = '';
                                        if (value.seen == 0) {
                                            seen = 'sent';
                                        } else {
                                            seen = 'seen';
                                        }
                                        if (value.sender != 'admin') {
                                            uid = value.uid;
                                            $('#viewChat').append(`
                                                <div class="media mb-3 float-start">
                                                    <div class="media-body text-light" style="padding: 10px 15px 2px 15px; width: 15rem; border-radius: 2px 16px 16px 16px; background-color: #f56969; word-wrap:wrap; overflow-wrap: break-word;">
                                                        <h6 class="mt-0">${value.sender}</h6>
                                                        <h5>${value.message}</h5>
                                                        <p style="font-size: 12px;"><span>${time}</span></p>
                                                    </div>
                                                </div>
                                            `);
                                        } else {
                                            $('#viewChat').append(`
                                                <div class="media mb-3 float-end">
                                                    <div class="media-body text-light" style="padding: 10px 15px 2px 15px; width: 15rem; border-radius: 16px 2px 16px 16px; background-color: #525252; word-wrap:wrap; overflow-wrap: break-word;">
                                                        <h6 class="mt-0">You</h6>
                                                        <h5>${value.message}</h5>
                                                        <p style="font-size: 12px;"><span>${seen}</span> <span>${time}</span></p>
                                                    </div>
                                                </div>
                                            `);
                                        }
                                    });
                                    $('#viewChat').append(`
                                        <form id="sendReplyFromAdmin" user="${uid}">
                                            <div class="input-group mb-3" style="position: sticky; bottom: 0; width: 20rem;">
                                                <input type="text" name="msg" class="form-control msg" placeholder="Type your message here" aria-label="Type your message here" aria-describedby="button-send">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary msg-btn" type="button" id="button-send">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    `);
                                    // scroll to the bottom of the chat box
                                    $('#viewChat').animate({
                                        scrollTop: $('#viewChat').prop(
                                            'scrollHeight')
                                    }, 1500);
                                }
                            });
                        } else {
                            console.log('Error Found');
                        }
                    },
                });
            });

            setInterval(() => {
                loadChat();
            }, 3000);
        });
    </script>
