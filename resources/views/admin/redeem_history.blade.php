<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Redeem History</h5>
                        </div>
                        @if ($admin == 1)
                            <!-- Table with stripped rows -->
                            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                <div class="datatable-container">
                                    <table class="table" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>User ID</th>
                                                <th>Points Requested</th>
                                                <th>Available Points</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="membershipTableBody">
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
