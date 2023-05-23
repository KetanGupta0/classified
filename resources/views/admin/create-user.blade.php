<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if ($admin == 1)
                            <div class="d-flex justify-content-between p-3 my-3">
                                <h5 class="fw-bold">User Management</h5>
                                <a class="btn btn-primary btn-lg me-3 add-user-btn" href="#"><i
                                        class="bi bi-plus-circle-fill"></i>
                                    Add New</a>
                            </div>
                            <!-- Table with stripped rows -->
                            <div
                                class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                <div class="datatable-container">
                                    <table class="table" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Phone No.</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userManagementTableBody">
                                            {{-- List --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Table with stripped rows -->
                        @else
                            <div class="d-flex justify-content-between p-3 my-3">
                                <h5 class="fw-bold">User Management</h5>
                            </div>
                            <div class="container text-center">
                                <h1>You don't have permission to change settings</h1>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Create User Modal -->
<div class="modal fade" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createUserLabel">Add New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body createUserBody">
                <form id="userCreatorForm">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter user username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="password" class="form-label">Create Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Create password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary create-user-submit">Save</button>
                <button type="button" class="btn btn-secondary create-user-close">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Create User Modal -->
<!-- Edit User Modal -->
<div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserLabel">Edit User Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body editUserBody">
                <form id="userEditForm">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="newname" class="form-label">Name</label>
                            <input type="text" class="form-control" id="newname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="newusername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="newusername">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="newemail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="newemail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="newphone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="newphone">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary edit-user-submit">Save</button>
                <button type="button" class="btn btn-secondary edit-user-close">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit User Modal -->
<script>
    $(document).ready(function() {
        $(document).on('click', '.add-user-btn', function() {
            $('#createUser').modal('show');
        });
        loadAdminList();

        function loadAdminList() {
            $.post("{{ url('admin/fetch-admins-list') }}", {}, function(res) {
                if (res.length != 0) {
                    $('#userManagementTableBody').html('');
                    let counter = 1;
                    $.each(res, function(key, value) {
                        if (value.admin_id != "{{ Session::get('adminloginid') }}") {
                            $('#userManagementTableBody').append(`
                                <tr>
                                    <td>${counter}</td>
                                    <td>${value.name}</td>
                                    <td>+965 ${value.phone}</td>
                                    <td>${value.username}</td>
                                    <td>${value.email}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary view-user" data="${value.admin_id}">View</a>
                                        <a class="btn btn-sm btn-success edit-user" data="${value.admin_id}">Edit</a>
                                        <a class="btn btn-sm btn-danger delete-user" data="${value.admin_id}">Delete</a>
                                    </td>
                                </tr>
                            `);
                            counter++;
                        }
                    });
                } else {
                    $('#userManagementTableBody').html('');
                }
            }).fail(function(err) {
                console.log(err);
            });
        }
        $(document).on('click', '.create-user-submit', function() {
            $.post("{{ url('admin/create-new-user') }}", {
                name: $('#name').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                password: $('#password').val()
            }, function(res) {
                console.log(res);
                if (res) {
                    loadAdminList();
                    $('#userCreatorForm')[0].reset();
                    $('#createUser').modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'User created!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }).fail(function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            });
        });
        $(document).on('click', '.create-user-close', function() {
            $('#userCreatorForm')[0].reset();
            $('#createUser').modal('hide');
        });
        $(document).on('click', '.delete-user', function() {
            console.log("Admin ID: " + $(this).attr("data"));
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("{{ url('admin/delete-admin-info') }}", {
                        admin_id: $(this).attr('data')
                    }, function(res) {
                        if (res) {
                            loadAdminList();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'User deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Something went wrong!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }).fail(function(err) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.responseJSON.message,
                            showConfirmButton: true,
                        })
                    });
                }
            })
        });
        $(document).on('click', '.edit-user', function() {
            $.post("{{ url('admin/fetch-admin-info') }}", {
                admin_id: $(this).attr('data')
            }, function(res) {
                $('#newname').val(res.name);
                $('#newusername').val(res.username);
                $('#newemail').val(res.email);
                $('#newphone').val(res.phone);
                $('.edit-user-submit').attr('data', res.admin_id);
                $('#editUser').modal('show');
            });
        });
        $(document).on('click', '.edit-user-submit', function() {
            $.post("{{ url('admin/edit-admin-info-submit') }}", {
                newname: $('#newname').val(),
                newusername: $('#newusername').val(),
                newemail: $('#newemail').val(),
                newphone: $('#newphone').val(),
                admin_id: $(this).attr('data'),
            }, function(res) {
                if (res) {
                    loadAdminList();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Updated!',
                        text: 'User information updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#editUser').modal('hide');
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }).fail(function(err) {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            });
        });
        $(document).on('click', '.edit-user-close', function() {
            $('#userEditForm')[0].reset();
            $('#editUser').modal('hide');
        });
    });
</script>
