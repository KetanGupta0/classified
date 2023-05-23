<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Transactions</h5>
                        </div>
                        @if ($admin == 1)
                            <!-- Table with stripped rows -->
                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                <div class="datatable-container">
                                    <table class="table" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Transaction ID</th>
                                                <th>User Name</th>
                                                <th>Amount</th>
                                                <th>Plan Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="transactionsTableBody">
                                            {{-- List --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Table with stripped rows -->
                        @else
                            <div class="container text-center">
                                <h1>You don't have permission to access this page</h1>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- Buyer Info Modal --}}
<div class="modal fade" id="userInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="userInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="userInfoLabel">User Information</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="userInfoBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        function loadTransactions() {
            $.ajax({
                url: "{{ url('admin/fetch-transactions') }}",
                type: "POST",
                async: false,
                success: function(res) {
                    $('#transactionsTableBody').html('');
                    $.each(res, function(index, transaction) {
                        const statusClass = transaction.status == 1 ? 'text-success' : 'text-danger';
                        const statusText = transaction.status == 1 ? 'Success' : 'Failed';
                        const row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${transaction.trans_id}</td>
                                <td><a class="text-primary user" data="${transaction.buyer_id}" style="cursor:pointer;">${transaction.buyer_name}</a></td>
                                <td>${transaction.tamount}</td>
                                <td>${transaction.m_plan}</td>
                                <td class="${statusClass}">${statusText}</td>
                            </tr>
                        `;
                        $('#transactionsTableBody').append(row);
                    });
                },
            });

        }
        loadTransactions();

        $(document).on('click', '.user', function() {
            let uid = $(this).attr('data');
            $.post("{{ url('admin/fetch-user-info') }}", {
                uid: uid
            }, function(res) {
                $('#userInfoBody').html(`
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="fw-bold mb-2">Name:</h5>
                            <p class="mb-4">${res.name}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">Referral:</h5>
                            <p class="mb-4">${res.ref}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">Phone:</h5>
                            <p class="mb-4">${res.phone}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">Points:</h5>
                            <p class="mb-4">${res.points}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">Ads:</h5>
                            <p class="mb-4">${res.ads}</p>
                        </div>
                    </div>
                `);
            }).fail(function(err) {
                console.log(err);
            });
            $('#userInfo').modal('show');
        });
    });
</script>
