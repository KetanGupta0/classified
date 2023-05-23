<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Redeem Requests</h5>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table class="table" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>User Name</th>
                                            <th>Points Requested</th>
                                            <th>Available Points</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="redeemRequestTableBody">
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
    $(document).ready(function() {
        function loadRedeemRequests() {
            $.ajax({
                url: "{{ url('admin/fetch-redeem-requests') }}",
                type: "POST",
                async: false,
                success: function(res) {
                    $('#redeemRequestTableBody').html('');
                    $.each(res, function(key, value) {
                        $('#redeemRequestTableBody').append(`
                            <tr>
                                <td>${key+1}</td>
                                <td>${value.name}</td>
                                <td>${value.reqpoints}</td>
                                <td>${value.avlpoints}</td>
                                <td>
                                    <a class="btn btn-sm btn-success accept" data="${value.reqid}">Accept</a>
                                    <a class="btn btn-sm btn-danger reject" data="${value.reqid}">Reject</a>
                                </td>
                            </tr>
                        `);
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        loadRedeemRequests();
        $(document).on('click', '.accept',function() {
            const reqid = $(this).attr('data');
            $.post("{{ url('admin/redeem-request-response') }}", {
                reqid: reqid,
                action: 1
            }, function(res) {
                if(res){
                    $('#mytable').DataTable().destroy();
                    loadRedeemRequests();
                    $('#mytable').DataTable().draw();
                }
            }).fail(function(err) {
                console.log(err);
            });
        });
        $(document).on('click', '.reject',function() {
            const reqid = $(this).attr('data');
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Reject'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("{{ url('admin/redeem-request-response') }}", {
                        reqid: reqid,
                        action: 2
                    }, function(res) {
                        $('#mytable').DataTable().destroy();
                        loadRedeemRequests();
                        $('#mytable').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Rejected!',
                            text: 'Request rejected successfully!'
                        })
                    }).fail(function(err) {
                        console.log(err);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Canceled!',
                        text: 'Some text here'
                    })
                }
            })
        });
    });
</script>
