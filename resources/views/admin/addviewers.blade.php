<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Viewers</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table class="table" id="mytable">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">S.No.</th>
                                            <th style="width: 25%;">Username</th>
                                            <th style="width: 20%;">Phone No.</th>
                                            <th style="width: 15%;">Referral code</th>
                                            <th style="width: 10%;">Points</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-creators-list">
                                        {{-- List --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Referred By Modal -->
    <div class="modal fade" id="refferedBy" tabindex="-1" aria-labelledby="refferedByLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="refferedByLabel">Reffered By</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="reference-user-info">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Modal -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="chat-modal" aria-labelledby="chat-modalLabel">
        <div class="offcanvas-header" style="height: 60px;">
            <h5 class="offcanvas-title" id="chat-modalLabel">Admin Chat Panel</h5>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="overflow: hidden;">
            <div class="container w-100 position-relative" id="viewChat2"
                style="height: calc(100vh - 100px); padding-top: 15px; overflow-y:scroll; overflow-x:hidden;">

            </div>
        </div>
    </div>

    <!-- Referral User List Modal -->
    <div class="modal fade" id="refferal-list" tabindex="-1" aria-labelledby="refferal-list-Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="refferal-list-Label">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="refferal-list-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Points History Modal -->
    <div class="modal fade" id="pointsHostory" tabindex="-1" aria-labelledby="pointsHostoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pointsHostoryLabel">Points History</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="pointsHostoryBody">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</main>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
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

        function loadViewersList() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/fetch-viewers-list') }}",
                type: "POST",
                async: false,
                success: function(res) {
                    $('#add-creators-list').html(``);
                    if (res.length >= 1) {
                        $.each(res, function(key, value) {
                            let ref = '';
                            if (value.reference == '') {
                                ref = 'N/A';
                            } else {
                                ref =
                                    `<a class="btn btn-sm btn-outline-primary reffered-by" data="${value.refferedby}" data-bs-toggle="modal" data-bs-target="#refferedBy">${value.reference}</a>`;
                            }
                            if (value.user_status == 'blocked') {
                                $('#add-creators-list').append(`
                                <tr>
                                    <td>${key+1}</td>
                                    <td>${value.user_name}</td>
                                    <td>+${value.phonecode} ${value.user_mob}</td>
                                    <td>${ref}</td>
                                    <td><a class="btn btn-outline-primary btn-sm pointsHistory" data="${value.user_id}" data-bs-toggle="modal" data-bs-target="#pointsHostory">${value.points}</a></td>
                                    <td>
                                        <a class="btn btn-sm btn-success unblock" data="${value.user_id}">Unblock</a>
                                        <a class="btn btn-sm btn-primary chat" data="${value.user_id}" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-modal" aria-controls="chat-modal">Chat</a>
                                    </td>
                                </tr>
                                `);
                            } else {
                                $('#add-creators-list').append(`
                                <tr>
                                    <td>${key+1}</td>
                                    <td>${value.user_name}</td>
                                    <td>+${value.phonecode} ${value.user_mob}</td>
                                    <td>${ref}</td>
                                    <td><a class="btn btn-outline-primary btn-sm pointsHistory" data="${value.user_id}" data-bs-toggle="modal" data-bs-target="#pointsHostory">${value.points}</a></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger block" data="${value.user_id}">Block</a>
                                        <a class="btn btn-sm btn-primary chat" data="${value.user_id}" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-modal" aria-controls="chat-modal">Chat</a>
                                    </td>
                                </tr>
                                `);
                            }
                        });
                    }
                },
                error: function(err) {
                    console.log(err.responseJSON);
                }
            });
        }
        loadViewersList();
        $(document).on('click', '.pointsHistory', function() {
            let uid = $(this).attr('data');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/fetch-points-history') }}",
                type: "POST",
                data: {
                    uid: uid,
                },
                success: function(res) {
                    $('#pointsHostoryBody').html(`
                        <div class="d-flex justify-content-between my-3">
                            <div><strong>Name: </strong>${res.username}</div>
                            <div><strong>Points: </strong>${res.totalPoints}</div>
                        </div>
                        <hr>
                    `);
                    if(res.history.length == 0){
                        $('#pointsHostoryBody').append(`
                            <div class="text-center my-3">
                                <p>No History</p>
                            </div>
                        `);
                    } else {
                        $.each(res.history, function(key, value) {
                            if (value.credited_points > 0 && value.deducted_points == 0) {
                                $('#pointsHostoryBody').append(`
                                    <div class="d-flex justify-content-between my-3">
                                        <div>${value.points_for}</div>
                                        <div>+${value.credited_points}</div>
                                    </div>
                                `);
                            } else if (value.credited_points == 0 && value.deducted_points > 0) {
                                $('#pointsHostoryBody').append(`
                                    <div class="d-flex justify-content-between my-3">
                                        <div>${value.points_for}</div>
                                        <div>-${value.deducted_points}</div>
                                    </div>
                                `);
                            }
                        });
                    }
                },
            });
        });
        $(document).on('click', '.chat', function() {
            let uid = $(this).attr('data');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/load-admin-user-chat') }}",
                type: "POST",
                data: {
                    uid: uid
                },
                success: function(res) {
                    $('#viewChat2').html('');
                    $('#chat-modalLabel').html(res.username);
                    $.each(res.chats, function(key, value) {
                        let time = timeCalc(value.time);
                        let seen = '';
                        if (value.seen == 0) {
                            seen = 'sent';
                        } else {
                            seen = 'seen';
                        }
                        if (value.sender == 'user') {
                            $('#viewChat2').append(`
                            <div class="media mb-3 float-start">
                                <div class="media-body text-light" style="padding: 10px 15px 2px 15px; width: 15rem; border-radius: 2px 16px 16px 16px; background-color: #f56969; word-wrap:wrap; overflow-wrap: break-word;">
                                    <h6 class="mt-0">${value.sender}</h6>
                                    <h5>${value.message}</h5>
                                    <p style="font-size: 12px;"><span>${time}</span></p>
                                </div>
                            </div>
                            `);
                        } else {
                            $('#viewChat2').append(`
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
                    $('#viewChat2').append(`
                        <form id="sendReplyFromAdmin" user="${uid}">
                            <div class="input-group mb-3" style="position: sticky; bottom: 0; width: 21rem;">
                                <input type="text" name="msg" class="form-control send-msg" placeholder="Type your message here" aria-label="Type your message here" aria-describedby="button-send">
                                <div class="input-group-append">
                                    <button class="btn btn-primary send-msg-btn" type="button" id="button-send">Send</button>
                                </div>
                            </div>
                        </form>
                    `);
                    $('#viewChat2').animate({scrollTop: $('#viewChat2').prop('scrollHeight')}, 1500);
                }
            });
        });
        $(document).on('click', '.send-msg-btn', function() {
            let uid = $('#sendReplyFromAdmin').attr('user');
            let msg = $('.send-msg').val();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/send-reply-from-admin') }}",
                data: {
                    uid: uid,
                    msg: msg,
                },
                success: function(res) {
                    if (res == 'success') {
                        $.ajax({
                            url: "{{ url('admin/load-admin-user-chat') }}",
                            type: "POST",
                            data: {
                                uid: uid,
                            },
                            success: function(res) {
                                $('#viewChat2').html('');
                                $('#chat-modalLabel').html(res.username);
                                $.each(res.chats, function(key, value) {
                                    let time = timeCalc(value.time);
                                    let seen = '';
                                    if (value.seen == 0) {
                                        seen = 'sent';
                                    } else {
                                        seen = 'seen';
                                    }
                                    if (value.sender == 'user') {
                                        $('#viewChat2').append(`
                                            <div class="media mb-3 float-start">
                                                <div class="media-body text-light" style="padding: 10px 15px 2px 15px; width: 15rem; border-radius: 2px 16px 16px 16px; background-color: #f56969; word-wrap:wrap; overflow-wrap: break-word;">
                                                    <h6 class="mt-0">${value.sender}</h6>
                                                    <h5>${value.message}</h5>
                                                    <p style="font-size: 12px;"><span>${time}</span></p>
                                                </div>
                                            </div>
                                        `);
                                    } else {
                                        $('#viewChat2').append(`
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
                                $('#viewChat2').append(`
                                    <form id="sendReplyFromAdmin" user="${uid}">
                                        <div class="input-group mb-3" style="position: sticky; bottom: 0; width: 21rem;">
                                            <input type="text" name="msg" class="form-control send-msg" placeholder="Type your message here" aria-label="Type your message here" aria-describedby="button-send">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary send-msg-btn" type="button" id="button-send">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                `);
                                $('#viewChat2').animate({scrollTop: $('#viewChat2').prop('scrollHeight')}, 1500);
                            }
                        });
                    } else {
                        console.log('Error Found');
                    }
                },
            });
        });
        $(document).on('click', '.unblock', function() {
            let uid = $(this).attr('data');
            Swal.fire({
                title: 'Are you sure?',
                text: "This user can now have all access!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Unblock'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('admin/unblock-user') }}",
                        type: "POST",
                        data: {
                            uid: uid
                        },
                        success: function(res) {
                            if (res == 'success') {
                                $('#mytable').DataTable().destroy();
                                loadViewersList();
                                $('#mytable').DataTable().draw();
                                Swal.fire(
                                    'Unblocked!',
                                    'The user has been unblocked.',
                                    'success'
                                )
                            } else if (res == 'already-unblocked') {
                                Swal.fire(
                                    'Failed!',
                                    'User is already unblocked.',
                                    'error'
                                )
                            } else if (res == 'nouser') {
                                Swal.fire(
                                    'Failed!',
                                    'User not found.',
                                    'error'
                                )
                            } else if (res == 'fail') {
                                Swal.fire(
                                    'Failed!',
                                    'Something went wrong.',
                                    'error'
                                )
                            }
                        },
                        error: function(err) {}
                    });
                }
            })
        });
        $(document).on('keypress', '.send-msg', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $(this).closest('form').find('.send-msg-btn').click();
                    // scroll to the bottom of the chat box
                    $('#viewChat2').animate({
                        scrollTop: $('#viewChat2').prop('scrollHeight')
                    }, 1500);

                }
            });
        $(document).on('click', '.reffered-by', function() {
            let uid = $(this).attr('data');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/fetch-reffered-by') }}",
                type: "POST",
                data: {
                    uid: uid,
                },
                success: function(res) {
                    $('#reference-user-info').html(`
                        <div class="">
                            <div><strong>Name - </strong>${res.user_name}</div>
                            <div><strong>Phone No. - </strong>${res.phone}</div>
                            <div><strong>No. of Referrels - </strong><a type="button" class="btn btn-outline-primary btn-sm showUserRefferedList" data-bs-toggle="modal" data-bs-target="#refferal-list" user="${uid}">${res.total_ref}</a></div>
                        </div>
                    `);
                }
            });
        });

        $(document).on('click', '.showUserRefferedList', function() {
            let uid = $(this).attr('user');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/fetch-user-reffereal-list') }}",
                type: "POST",
                data: {
                    uid: uid,
                },
                success: function(res) {
                    $('#refferal-list-body').html(``);
                    let username = res.mainuser.user_name;
                    let phone = '+' + res.mainuser.phonecode + ' ' + res.mainuser.user_mob;
                    let totalRef = res.reffered.length;
                    $('#refferal-list-Label').html(username);
                    $('#refferal-list-body').html(`
                        <div class="container-fluid my-3 d-flex justify-content-between">
                            <div><strong>Phone no. : </strong>${phone}</div>
                            <div><strong>No. of Referrals : </strong>${totalRef}</div>
                        </div>
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns my-3">
                            <div class="datatable-container">
                                <table class="table" id="refferedUsersTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">S.No.</th>
                                            <th style="width: 50%;">Username</th>
                                            <th style="width: 40%;">Phone No.</th>
                                        </tr>
                                    </thead>
                                    <tbody id="refferedUsersList">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    `);
                    $('#refferedUsersList').html(``);
                    $.each(res.reffered, function(key, value) {
                        $('#refferedUsersList').append(`
                            <tr>
                                <td>${key+1}</td>
                                <td>${value.user_name}</td>
                                <td>+${value.phonecode} ${value.user_mob}</td>
                            </tr>
                        `);
                    });
                    $('#refferedUsersTable').DataTable();
                },
            });
        });

        $(document).on('click', '.block', function() {
            let uid = $(this).attr("data");
            Swal.fire({
                title: 'Are you sure?',
                text: "This action will restrict user from login!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Block'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('admin/block-user') }}",
                        type: "POST",
                        data: {
                            uid: uid
                        },
                        success: function(res) {
                            if (res == 'success') {
                                $('#mytable').DataTable().destroy();
                                loadViewersList();
                                $('#mytable').DataTable().draw();
                                Swal.fire(
                                    'Blocked!',
                                    'The user has been blocked.',
                                    'success'
                                )
                            } else if (res == 'already-blocked') {
                                Swal.fire(
                                    'Failed!',
                                    'User is already blocked.',
                                    'error'
                                )
                            } else if (res == 'nouser') {
                                Swal.fire(
                                    'Failed!',
                                    'User not found.',
                                    'error'
                                )
                            } else if (res == 'fail') {
                                Swal.fire(
                                    'Failed!',
                                    'Something went wrong.',
                                    'error'
                                )
                            }
                        },
                        error: function(err) {
                            console.log(err.responseJSON);
                        }
                    });
                }
            })
        });
    });
</script>
