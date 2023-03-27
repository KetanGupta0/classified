<main id="main" class="main">



    <section class="section dashboard">
        <div class="row">

            <div class="col-md-12">
                <div class="card p-2">
                    <h3 class="mt-2 mb-3">Categories</h3>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <h3 class="text-light"
                                style="font-size:15px;padding:10px 10px;border:1px solid #e8ebf0;border-radius:4px;margin-bottom:6px;background:#08c;border-color:#08c;">
                                All Categories</h3>

                            <div class="card p-2 mt-2" style="border:1px solid #e8ebf0; border-radius:4px;">
                                <div class="row ml-2" id="dataRow">



                                </div>
                            </div>

                            <button type="button" class="btn btn-outline-success w-100 popovers" data-bs-container="body"
                                data-toggle="popover" data-bs-placement="bottom" id="over">
                                New Category
                            </button>

                            <div id="PopoverContent" class="d-none">
                                <form class="categoryForm">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="hidden" name="id" class="form-control" value="0">
                                        <input type="hidden" name="ccid" class="form-control cid" value="0">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" class="form-control" required>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="">Icon Class For Category</label>
                                        <input type="text" name="icon" class="form-control" required>
                                    </div>
                                    <div class="form-group hide">
                                        <label for="">Picture url</label>
                                        <input type="text" name="purl" class="form-control">
                                    </div>

                                    <div class="text-end mt-2">
                                        <button class="btn btn-success" type="submit">Save</button>
                                        <button type="button" class="closepop btn btn-light"
                                            style="border:1px solid #d9dee4;">Cancel</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="card p-2">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="text-dark">All Categories</h5>
                                    </div>
                                    <div class="col-md-6 text-end addsub" style="display:none;" id="">
                                        
                                        
                                         <button type="button" class="btn btn-outline-success w-100 popovers2" data-bs-container="body"
                                data-toggle="popover" data-bs-placement="bottom" id="over" data-cid="0">
                                 <i class="fa-sharp fa-solid fa-plus"></i> Add Sub-Category
                            </button>
                                    </div>
                                </div>
                                 <div class="row" id="dataRow2">
                                     </div>
                                <h5 class="mt-4 nosub text-center">No sub category found.</h5>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
<script src="{{ asset('public/admin/js/jquery.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
       

    $(function() {
        $('[data-toggle="popover"]').popover({
            container: 'body',
            html: true,
            placement: 'bottom',
            sanitize: false,
            content: function() {
                $('.categoryForm').attr('id', 'categoryForm');
                return $("#PopoverContent").html();
            }
        });
    })

    $('body').on('click', function(e) {
        $('[data-toggle=popover]').each(function() {
            // hide any open popovers when the anywhere else in the body is clicked
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e
                    .target).length === 0) {
                $(this).popover('hide');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $(".btn-light:eq(1)").click(function() {
            $("[data-toggle='popover']").popover('hide');
        });

        fetchCategoryData();

        function fetchCategoryData() {
            $.ajax({
                'type': "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                'url': "{{ url('admin/fetch-category-data') }}",
                success: function(data) {
                    $('#dataRow').html("");
           
                    $.each(data, function(key, value) {
                        $('#dataRow').append(`<div class="row mb-2 p-2 border border-secondary"><div class="col-md-1 col-2 full" data="${value.cid}">
                                        <i class="fa-solid fa-bars" value="${value.cid}" id="info"></i>
                                    </div>

                                    <div class="col-md-8 col-7 full" style="white-space: nowrap;" data="${value.cid}">
                                        ${value.title}
                                    </div>


                                    

                                    <div class="col-md-3 col-3">

                                        <div class="text-end" style="white-space: nowrap;">
                                        <i class="fa-solid fa-pen-to-square text-primary editData" style="font-size: 20px;cursor:pointer;" title="Edit" id="${value.cid}"></i>

                                        <i class="fa-solid fa-language text-success" style="font-size: 20px;cursor:pointer;"
                                            title="edit-language" value="${value.cid}" id="editlan"></i>

                                            
                                        <i class="fa-solid fa-trash text-danger" style="font-size: 20px;cursor:pointer;"
                                            title="Delete" value="${value.cid}" id="delete"></i>
                                        </div>

                                        
                                    </div>

                                    <div class="col-md-12 mt-2 mb-2 editClass" id="div${value.cid}" style="display:none;">

                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" id="utitle" class="form-control" value="${value.title}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Slug</label>
                                            <input type="text" id="uslug" class="form-control" value="${value.slug}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Icon Class For Category</label>
                                            <input type="text" id="uicon" class="form-control" value='${value.icon}' required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Picture url</label>
                                            <input type="text" id="upurl" class="form-control" value="${value.purl}">
                                        </div>

                                        <div class="text-end mt-2">
                                            <button class="btn btn-success updateSave" data="${value.cid}">Update</button>
                                            <button type="button" class="btn btn-light close"
                                                style="border:1px solid #d9dee4;">Cancel</button>

                                        </div>
                                    </div>
                                    </div>`);
                    });
                }
            });
        }


        $(document).on('submit', '.categoryForm:eq(1)', function(e) {
            e.preventDefault();
            let formData = new FormData($('.categoryForm:eq(1)')[0]);
            $.ajax({
                'type': "POST",
                'url': "{{ url('admin/save-category') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == true) {
                        fetchCategoryData();
                        $("#over").popover('hide');
                        $('.categoryForm:eq(1)').each(function() {
                            this.reset();
                        });
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Category Added!!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
        });

        $(document).on('click', '.editData', function() {
            let cid = $(this).attr('id');
             $('.editClass').hide();
            $('#div'+cid).show();
           
        });
        
        $(document).on('click', '.close', function() {
             $('.editClass').hide();
        });
        
        $(document).on('click', '.closepop', function() {
             $('.popovers').click();
        });
        
        
        
        
         $(document).on('click', '.full', function() {
             let cid = $(this).attr('data');
             fetchCategoryData2(cid);
              $(".popovers2").attr('data-cid', cid);
        });
        
        $(document).on('click', '.popovers', function() {
               
            $('.hide').show();
        });
        
        $(document).on('click', '.popovers2', function() {
            let cid = $(this).attr('data-cid');
            console.log(cid);
            $('.cid').val(cid);
           $('.hide').hide();  
        });
        
        $(document).on('click', '.updateSave', function() {
             let cid = $(this).attr('data');
             var title = $('#div'+cid+' #utitle').val();
             var slug = $('#div'+cid+' #uslug').val();
             var icon = $('#div'+cid+' #uicon').val();
             var url = $('#div'+cid+' #purl').val();
             var parent = $('#div'+cid+' #parent').val();
             
              $.ajax({
                'type': "POST",
                'url': "{{ url('admin/update-category') }}",
                data: {cid:cid,
                      title:title,
                       slug:slug,
                       icon:icon,
                       url:url
                },
                success: function(response) {
                    if (response == true) {
                        fetchCategoryData();
                        if(icon+url == 'nullundefined'){
                          fetchCategoryData2(parent);
                        }
                        $('.editClass').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Category Updated!!',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            });
             
              
        });
        
        function fetchCategoryData2(parent){
            var cid = parent;
             $.ajax({
                'type': "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                'url': "{{ url('admin/fetch-subcategory-data') }}",
                data: {cid:cid},
                success: function(data) {
                    if(data.length > 0){
                        $('.nosub').hide();
                        $('.addsub').show();
                    }
                    else{
                       $('.nosub').show();
                        $('.addsub').show(); 
                    }
                    $('#dataRow2').html("");
           
                    $.each(data, function(key, value) {
                        $('#dataRow2').append(`<div class="row mb-2 p-2 border border-secondary"><div class="col-md-1 col-2 full" data="${value.cid}">
                                        <i class="fa-solid fa-bars" value="${value.cid}" id="info"></i>
                                    </div>

                                    <div class="col-md-8 col-7 full" style="white-space: nowrap;" data="${value.cid}">
                                        ${value.title}
                                    </div>


                                    

                                    <div class="col-md-3 col-3">

                                        <div class="text-end" style="white-space: nowrap;">
                                        <i class="fa-solid fa-pen-to-square text-primary editData" style="font-size: 20px;cursor:pointer;" title="Edit" id="${value.cid}"></i>

                                        <i class="fa-solid fa-language text-success" style="font-size: 20px;cursor:pointer;"
                                            title="edit-language" value="${value.cid}" id="editlan"></i>

                                            
                                        <i class="fa-solid fa-trash text-danger" style="font-size: 20px;cursor:pointer;"
                                            title="Delete" value="${value.cid}" id="delete"></i>
                                        </div>

                                        
                                    </div>

                                    <div class="col-md-12 mt-2 mb-2 editClass" id="div${value.cid}" style="display:none;">

                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" id="utitle" class="form-control" value="${value.title}" required>
                                            <input type="hidden" id="uslug" class="form-control" value="${value.slug}" required>
                                            <input type="hidden" id="uicon" class="form-control" value='${value.icon}' required>
                                            <input type="hidden" id="upurl" class="form-control" value="${value.purl}">
                                            <input type="hidden" id="parent" class="form-control" value="${value.parent}">
                                        </div>
                                        <div class="text-end mt-2">
                                            <button class="btn btn-success updateSave" data="${value.cid}">Update</button>
                                            <button type="button" class="btn btn-light close"
                                                style="border:1px solid #d9dee4;">Cancel</button>

                                        </div>
                                    </div>
                                    </div>`);
                    });
                }
            });
        }



    });
</script>
<style>
    #dataRow,#dataRow2{
        margin-left: 0.7rem !important;
    }
</style>
