<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Redeem Settings</h5>
                        </div>
                        @if ($admin == 1)
                            <form class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="minimumPoints" class="form-label">Minimum points to redeem</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control me-3" id="minimumPoints">
                                            <a class="btn btn-primary cursor-pointer save-redeem-point-setting">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="mt-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="points currency" class="form-label">Points Currency
                                            Conversion</label>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <input type="text" class="form-control me-3" id="points"
                                                placeholder="Enter Points">
                                            <div style="min-width: fit-content;" class="me-3">Points =</div>
                                            <input type="text" class="form-control me-3" id="currency"
                                                placeholder="Enter Currency">
                                            <div>KWD</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <a class="btn btn-primary cursor-pointer save-redeem-currency-setting">Save</a>
                                    </div>
                                </div>
                            </form>
                        @else
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
<script>
    $(document).ready(function() {
        fetchRedeemSettings();

        function fetchRedeemSettings() {
            $.post("{{ url('admin/get-minimum-redeem-points') }}", {}, function(res) {
                if (res != false) {
                    $('#minimumPoints').val(res.minimumPoints);
                } else {
                    $('#minimumPoints').val(0);
                }
            }).fail(function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            });
            $.post("{{ url('admin/get-points-currency-conversion') }}", {}, function(res) {
                if (res != false) {
                    $('#points').val(res.points);
                    $('#currency').val(res.currency);
                } else {
                    $('#points').val(0),
                        $('#currency').val(0)
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
        $(document).on('click', '.save-redeem-point-setting', function() {
            $.post("{{ url('admin/update-minimum-redeem-points') }}", {
                minimumPoints: $('#minimumPoints').val()
            }, function(res) {
                if (res) {
                    fetchRedeemSettings();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Record updated successfully!',
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
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            });
        });
        $(document).on('click', '.save-redeem-currency-setting', function() {
            $.post("{{ url('admin/update-points-currency-conversion') }}", {
                points: $('#points').val(),
                currency: $('#currency').val()
            }, function(res) {
                if (res) {
                    fetchRedeemSettings();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Record updated successfully!',
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
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            });
        });
    });
</script>
