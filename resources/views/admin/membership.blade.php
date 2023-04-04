<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Membership</h5>
                            <a class="btn btn-primary btn-lg me-3" href="{{url('admin/add-membership-plan')}}"><i class="bi bi-plus-circle-fill"></i>
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
</main>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        

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
                                    <a class="btn btn-sm btn-info edit" data="${value.mid}">Edit</a>
                                    <a class="btn btn-sm btn-danger delete" data="${value.mid}">Delete</a>
                                </td>
                            </tr>
                        `);
                    });
                },
            });
        }
        loadMembership();

        $(document).on('click', '.addMembership', function() {
            // 
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
