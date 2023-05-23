<style>
    .pass {
        box-shadow: none !important;
    }
</style>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Reset Password</h5>
                        </div>
                        <form id="resetPasswordForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 pass" id="currentPassword">
                                        <button class="btn border border-start-0 pass" type="button"
                                            onclick="togglePasswordVisibility('currentPassword')"><i
                                                class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                    <div class="error current-password-error text-danger"></div>
                                    <div class="success current-password-success text-success"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 pass" id="newPassword">
                                        <button class="btn border border-start-0 pass" type="button"
                                            onclick="togglePasswordVisibility('newPassword')"><i
                                                class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                    <div class="error new-password-error text-danger"></div>
                                    <div class="success new-password-success text-success"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 pass" id="confirmPassword">
                                        <button class="btn border border-start-0 pass" type="button"
                                            onclick="togglePasswordVisibility('confirmPassword')"><i
                                                class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                    <div class="error confirm-password-error text-danger"></div>
                                    <div class="success confirm-password-success text-success"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 my-3">
                                    <a class="btn btn-primary cursor-pointer save-btn">Save</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const button = input.nextElementSibling;

        if (input.type === "password") {
            input.type = "text";
            button.innerHTML = `<i class="bi bi-eye-fill"></i>`;
        } else {
            input.type = "password";
            button.innerHTML = `<i class="bi bi-eye-slash-fill"></i>`;
        }
    }
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(document).on('click','.save-btn',function(){
            $.post("{{url('admin/update-current-password')}}",{
                currentPassword: $('#currentPassword').val(),
                newPassword: $('#newPassword').val(),
                confirmPassword: $('#confirmPassword').val()
            },function(res){
                if(res){
                    $('.error').html('');
                    $('#resetPasswordForm')[0].reset();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Password updated successfully!',
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
            }).fail(function(err){
                $('.error').html('');
                if(err.responseJSON.errors.currentPassword){
                    $('.current-password-error').html(err.responseJSON.errors.currentPassword[0]);
                }
                if (err.responseJSON.errors.newPassword){
                    $('.new-password-error').html(err.responseJSON.errors.newPassword[0]);
                }
                if (err.responseJSON.errors.confirmPassword){
                    $('.confirm-password-error').html(err.responseJSON.errors.confirmPassword[0]);
                }
            });
        })
    });
</script>
