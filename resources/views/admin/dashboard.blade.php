<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-3 col-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mt-3">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-sharp fa-solid fa-circle-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5>Active Ads</h5>
                                        <h6 class="active-ads-count">0</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mt-3">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5>Pending Ads</h5>
                                        <h6 class="pending-ads-count">0</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mt-3">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5>Expired Ads</h5>
                                        <h6 class="expired-ads-count">0</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mt-3">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5>Users</h5>
                                        <h6 class="users-count">0</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    $(document).ready(function(){
        $.get("{{url('admin/dashboard-infos')}}",function(res){
            $('.active-ads-count').html(res.active);
            $('.pending-ads-count').html(res.pending);
            $('.expired-ads-count').html(res.expired);
            $('.users-count').html(res.users);
        });
    });
</script>

