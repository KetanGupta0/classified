<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Membership Plan</h5>
                        <form id="newMembershipForm">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="pname" class="form-label">Plan Name</label>
                                        <input type="text" class="form-control" id="pname" name="pname">
                                        <p class="name text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="pprice" class="form-label">Plan Price</label>
                                        <input type="text" class="form-control" id="pprice" name="pprice">
                                        <p class="price text-danger"></p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="pdays" class="form-label">Number of days</label>
                                        <input type="text" class="form-control" id="pdays" name="pdays">
                                        <p class="days text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="pdescription" class="form-label">Description (Plan Details)</label>
                                        <textarea name="pdescription" id="pdescription"></textarea>
                                        <p class="desc text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <a class="btn btn-primary submit">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="{{ asset('public/admin/richtexteditor/rte.js') }}"></script>
<script src="{{ asset('public/admin/richtexteditor/plugins/all_plugins.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        var editor1 = new RichTextEditor("#pdescription");
        // editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
        $(document).on('click', '.submit', function() {
            let planName = $('#pname').val();
            let planPrice = $('#pprice').val();
            let planDays = $('#pdays').val();
            let planDescription = $('#pdescription').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/add-new-membership-plan') }}",
                type: "POST",
                data: {
                    name: planName,
                    price: planPrice,
                    days: planDays,
                    description: planDescription,
                },
                success: function(res) {
                    if (res == 'success') {
                        document.getElementById("newMembershipForm").reset();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else if(res == 'fail'){
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong ',
                    })
                    }
                },
                error: function(err) {
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: err.responseJSON.message,
                    })
                }
            });
        });
    });
</script>
