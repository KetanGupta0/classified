<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Ads View Settings</h5>
                        </div>
                        @if ($admin == 1)
                            <form class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="minimumTime" class="form-label">Minimum time to earn points</label>
                                        <input type="text" class="form-control" id="minimumTime">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <label for="pointsPerAd" class="form-label">Points per Ad</label>
                                        <input type="text" class="form-control" id="pointsPerAd">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <a class="btn btn-primary cursor-pointer ad-view-submit">Save</a>
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
        getAdsViewSetting();

        function getAdsViewSetting() {
            $.post("{{ url('admin/get-ads-view-setting') }}", {}, function(res) {
                if (res != false) {
                    $('#minimumTime').val(res.minimumTime);
                    $('#pointsPerAd').val(res.pointsPerAd);
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
        $(document).on('click', '.ad-view-submit', function() {
            $.post("{{ url('admin/update-ad-view-setting') }}", {
                minimumTime: $('#minimumTime').val(),
                pointsPerAd: $('#pointsPerAd').val(),
            }, function(res) {
                if (res) {
                    getAdsViewSetting();
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
