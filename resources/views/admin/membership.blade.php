<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Membership</h5>
                            <a class="btn btn-primary btn-lg me-3" href="{{ url('admin/add-membership-plan') }}"><i
                                    class="bi bi-plus-circle-fill"></i>
                                Add New</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table class="table" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Plan Name</th>
                                            <th>Price</th>
                                            <th>No. of Days</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="membershipTableBody">
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
    <!-- View Modal -->
    <div class="modal fade" id="viewPlan" tabindex="-1" aria-labelledby="viewPlanLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewPlanLabel">Membership Plan Viewer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body viewPlanBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End View Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="editPlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editPlanLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editPlanLabel">Membership Plan Editor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body editPlanBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary editMembership-submit">Update</button>
                    <button type="button" class="btn btn-secondary editMembership-close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->
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

        function loadMembership() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/fetch-membership-data') }}",
                type: "POST",
                async: false,
                success: function(res) {
                    $('#membershipTableBody').html(``);
                    $.each(res, function(key, value) {
                        $('#membershipTableBody').append(`
                            <tr>
                                <td>${key+1}</td>
                                <td>${value.m_plan}</td>
                                <td>${value.m_price}</td>
                                <td>${value.m_days}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary view" data="${value.mid}">View</a>
                                    <a class="btn btn-sm btn-info edit text-light" data="${value.mid}">Edit</a>
                                    <a class="btn btn-sm btn-danger delete" data="${value.mid}">Delete</a>
                                </td>
                            </tr>
                        `);
                    });
                },
            });
        }
        loadMembership();

        $(document).on('click', '.view', function() {
            let mid = $(this).attr('data');
            $.post("{{ url('admin/fetch-membership-plan-details') }}", {
                mid: mid
            }, function(res) {
                console.log(res);
                let created = timeCalc(res.created_at);
                let updated = timeCalc(res.updated_at);
                $('.viewPlanBody').html(``);
                $('.viewPlanBody').html(`
                    <table class="table table-striped table-hover text-center">
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>No. of Days</th>
                        </tr>
                        <tr>
                            <td>${res.m_plan}</td>
                            <td>${res.m_price}</td>
                            <td>${res.m_days}</td>
                        </tr>
                    </table>
                    <table class="table table-striped table-hover text-center">
                        <tr>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>${res.m_desc}</td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between">
                        <span><strong>Created: </strong>${created}</span>
                        <span><strong>Modified: </strong>${updated}</span>
                    </div>
                `);
                $('#viewPlan').modal('show');
            });
        });

        $(document).on('click', '.edit', function() {
            let mid = $(this).attr('data');
            $.post("{{ url('admin/fetch-membership-plan-details') }}", {
                mid: mid
            }, function(res) {
                $('.editPlanBody').html(``);
                $('.editPlanBody').html(`
                    <form id="editMembershipForm">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pname" class="form-label">Plan Name</label>
                                    <input type="text" class="form-control" id="pname" name="pname" value="${res.m_plan}">
                                    <p class="name text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pprice" class="form-label">Plan Price</label>
                                    <input type="text" class="form-control" id="pprice" name="pprice" value="${res.m_price}">
                                    <p class="price text-danger"></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pdays" class="form-label">Number of days</label>
                                    <input type="text" class="form-control" id="pdays" name="pdays" value="${res.m_days}">
                                    <p class="days text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pdescription" class="form-label">Description (Plan Details)</label>
                                    <textarea name="pdescription" id="pdescription">${res.m_desc}</textarea>
                                    <p class="desc text-danger"></p>
                                </div>
                            </div>
                        </div>
                    </form>
                `);
                var editor1 = new RichTextEditor("#pdescription");
                $('#editMembershipForm').attr('data', res.mid)
            });
            $('#editPlan').modal('show');
        });

        $(document).on('click', '.editMembership-submit', function() {
            let mid = $('#editMembershipForm').attr('data');
            let pname = $('#pname').val();
            let pprice = $('#pprice').val();
            let pdays = $('#pdays').val();
            let pdescription = $('#pdescription').val();
            console.log(pname + ' ' + pprice + ' ' + pdays + ' ' + pdescription);
            $.post("{{ url('admin/update-membership-plan') }}", {
                mid: mid,
                pname: pname,
                pprice: pprice,
                pdays: pdays,
                pdescription: pdescription
            }, function(res) {
                console.log(res);
                if (res) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#editPlan').modal('hide');
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
                console.log(err.responseJSON.message);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.responseJSON.message,
                })
            });
        });

        $(document).on('click','.editMembership-close',function(){
            $('#editMembershipForm')[0].reset();
            $('rte-floatpanel').hide();
        });

        $(document).on('click', '.delete', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    let mid = $(this).attr('data');
                    $.ajax({
                        url: "{{ url('admin/delete-membership') }}",
                        type: "POST",
                        data: {
                            mid: mid
                        },
                        success: function(res) {
                            if (res == 'success') {
                                $('#mytable').DataTable().destroy();
                                loadMembership();
                                $('#mytable').DataTable().draw();
                                Swal.fire(
                                    'Deleted!',
                                    'Membership deleted.',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Membership not deleted.',
                                    'fail'
                                )
                            }
                        }
                    });
                }
            })
        });
    });
</script>
