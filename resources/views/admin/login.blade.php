<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <script src="{{ asset('public/admin/sweatalert/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/admin/sweatalert/sweetalert2.min.css') }}">
    <title>Admin Login</title>
    <style>
        .card {
            border: none;
        }

        .loginbtn {
            color: #fff;
            background-color: #7dc855;
            border-color: #7dc855;
        }

        .switch-app input:checked+span {
            background-color: #7dc855;
        }

        .flashmsg {
            border: 1px solid #d50000 !important;
            color: #d50000;
        }

        #errorMsg {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container" style="margin-top:10%;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card p-2">
                    <div class="card-header">
                        <h3 class="mb-3 mt-3">Login</h3>
                        <span style="color:#df6c6e;" id="errorMsg">
                            <div class="flashmsg"></div>
                        </span>
                        <form id="loginForm">
                            <div class="form-group mt-3">
                                <input type="text" id="username" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" id="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="remember" class="css-input switch switch-sm switch-app">
                                    <input type="checkbox" id="remember" name="remember" value="1"><span></span>
                                    Remember me
                                </label>
                            </div>
                            <button id="login" class="btn w-100 loginbtn mt-3 mb-3">Login</button>
                        </form>
                    </div>


                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/jquery.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#login').on('click', function(e) {
                e.preventDefault();
                let username = $('#username').val();
                let password = $('#password').val();

                if (username == "" || password == "") {
                    $('#errorMsg').css('display', 'block');
                    $('.flashmsg').text("");
                    $('.flashmsg').text("Please Enter Username & Password");
                } else {
                    $('#errorMsg').css('display', 'none');
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/check-login') }}",
                        data: {
                            username: username,
                            password: password,
                        },
                        success: function(data) {
                            if (data == 1) {
                                window.location = "{{ url('admin/dashboard') }}";
                            }
                            else{
                                $('#errorMsg').css('display', 'block');
                                $('.flashmsg').text("");
                                $('.flashmsg').text("Invalid Credentials!!");
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
