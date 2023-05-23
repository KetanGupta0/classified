<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Active Ads</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table class="table" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Username</th>
                                            <th>Add Category</th>
                                            <th>Posted</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="activeAdsList">
                                        {{-- List --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Table with stripped rows -->
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content" id="ads-view-modal">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span
                                                id="ads-owner-name">Unknown</span></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="ads-viewer">
                                        <div class="container-fluid">
                                            <h2 id="ads-title">Add Title</h2>
                                        </div>
                                        <div class="container-fluid d-flex flex-wrap mt-3" id="ads-images">
                                            <img class="img-thumbnail" style="width: 88px; height: auto;"
                                                alt="...">
                                        </div>
                                        <div class="container-fluid mt-4" id="ads-location">
                                            <span><i class="bi bi-geo-alt"></i> </span>
                                        </div>
                                        <div class="container-fluid mt-3" id="ads-description">

                                        </div>
                                        <div class="container-fluid mt-3">
                                            <div class="row-3" id="ads-main-info">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
    $(document).ready(function() {

        refreshActiveAdsList();

        function refreshActiveAdsList() {
            $.ajax({
                url: "{{ url('admin/fetchActiveAds') }}",
                type: "POST",
                async: false,
                success: function(add) {
                    console.log(add);
                    $('#activeAdsList').html(``);
                    if (add.length > 0) {
                        add.forEach(data => {
                            $('#activeAdsList').append(`
                                <tr>
                                <td>${data.add_title}</td>
                                <td>${data.user_name}</td>
                                <td>${data.mainCat}</td>
                                <td>${data.timestamp}</td>
                                <td style="text-transform: capitalize;">${data.add_status}</td>
                                <td>
                                    <button type="button" class="ads-view btn btn-primary btn-sm" data="${data.add_id}">
                                        <i class="bi bi-binoculars-fill"></i> View
                                    </button>
                                    <button class="expire btn btn-warning btn-sm text-white" data="${data.add_id}" href=""><i class="bi bi-bag-x"></i> Expire</button>
                                </td>
                                </tr>
                            `);
                        });
                    }
                }
            });
        }
        $(document).on('click', '.expire', function(e) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes! Expire'
            }).then((result) => {
                if (result.isConfirmed) {
                    let aid = $(this).attr('data');
                    $.ajax({
                        url: "{{ url('admin/expire-active-add') }}",
                        type: "POST",
                        data: {
                            add_id: aid
                        },
                        success: function(add) {
                            $('#mytable').DataTable().destroy();
                            refreshActiveAdsList();
                            $('#mytable').DataTable().draw();
                            Swal.fire(
                                'Expired!',
                                'The add has been marked as expired.',
                                'success'
                            )
                        },
                        error: function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: err.responseJSON.message
                            })
                        }
                    });
                }
            })
        });
        $(document).on('click', '.ads-view', function(e) {
            let aid = $(this).attr('data');
            $.ajax({
                url: "{{ url('admin/fetch-active-ads-view') }}",
                type: 'POST',
                data: {
                    aid: aid
                },
                success: function(res) {
                    console.log(res);
                    $('#ads-owner-name').html(res.username);
                    $('#ads-title').html(res.title);
                    $('#ads-images').html(``);
                    $.each(res.image, function(key, result) {
                        $('#ads-images').append(`
                        <img src="{{ 'https://specbits.com/class2/fab/${result.image_name}' }}" class="img-thumbnail" style="width: 88px; height: auto;" alt="...">
                        `)
                    });
                    $('#ads-location').html(
                        `<span><i class="bi bi-geo-alt"></i> ${res.location.country}, ${res.location.state}, ${res.location.city}</span>`
                    );
                    $('#ads-description').html(res.description);
                    $('#ads-main-info').html(``);
                    $.each(res.data, function(key, result) {
                        $('#ads-main-info').append(`
                            <div class="col-6"><strong>${result.label}: </strong>${result.value}</div>
                        `);
                    });
                    $('#staticBackdrop').modal('show');
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: err.responseJSON.message
                    })
                }
            });
        });
    });
</script>
