<style>
    table {
        border-collapse: separate;
    }

    td {
        width: 33.33%;
    }
</style>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-3 my-3">
                            <h5 class="fw-bold">Manage Rights</h5>
                        </div>
                        @if ($admin == 1)
                            <div class="container">
                                <select class="w-100" id="mySelect"></select>
                            </div>
                            <form id="rights">
                                <div class="container-fluid">
                                    <table class="w-100 p-3">
                                        <tr>
                                            <td><strong>General Permissions Management: </strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Ads Category</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="1"> Select
                                                All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-1" data="1" ptype="category"
                                                    paction="view"> View
                                                Category</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-1" data="1" ptype="category"
                                                    paction="add"> Add
                                                Category</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-1" data="1" ptype="category"
                                                    paction="edit"> Edit
                                                Category</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-1" data="1" ptype="category"
                                                    paction="delete"> Delete
                                                Category</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Form Fields</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="2"> Select
                                                All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-2" data="2" ptype="form_field"
                                                    paction="view"> View Form
                                                Fields</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-2" data="2" ptype="form_field"
                                                    paction="add"> Add Form
                                                Fields</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-2" data="2" ptype="form_field"
                                                    paction="edit"> Edit Form
                                                Fields</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-2" data="2" ptype="form_field"
                                                    paction="delete"> Delete
                                                Form Fields</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Membership</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="3"> Select
                                                All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-3" data="3" ptype="membership"
                                                    paction="view"> View
                                                Membership</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-3" data="3" ptype="membership"
                                                    paction="add"> Add
                                                Membership</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-3" data="3" ptype="membership"
                                                    paction="edit"> Edit
                                                Membership</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-3" data="3" ptype="membership"
                                                    paction="delete"> Delete
                                                Membership</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Redeem Request</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="4"> Select
                                                All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-4" data="4" ptype="redeem_request"
                                                    paction="view"> View
                                                Redeem Request</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-4" data="4" ptype="redeem_request"
                                                    paction="edit"> Approve /
                                                Reject Redeem Request</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Redeem History</strong></td>
                                            <td><input type="checkbox" name="" id="" class="child"
                                                    data="5" ptype="redeem_history" paction="view"> View
                                                Redeem History</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Transactions</strong></td>
                                            <td><input type="checkbox" name="" id="" class="child"
                                                    data="6" ptype="transatctions" paction="view"> View
                                                Transactions</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Settings</strong></td>
                                            <td><input type="checkbox" name="" id="" class="child"
                                                    data="7" ptype="settings" paction="change"> Change Settings
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <table class="w-100 p-3 mt-3">
                                        <tr>
                                            <td><strong>Ads Permission Management:</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Active Ads</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="8">
                                                Select All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-8" data="8" ptype="active"
                                                    paction="view">
                                                View
                                                Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-8" data="8" ptype="active"
                                                    paction="expire"> Expire
                                                Ad</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Expired Ads</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="9">
                                                Select All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-9" data="9" ptype="expired"
                                                    paction="view">
                                                View
                                                Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-9" data="9" ptype="expired"
                                                    paction="approve">
                                                Approve Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-9" data="9" ptype="expired"
                                                    paction="delete"> Delete
                                                Ad</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Hidden by user Ads</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="10">
                                                Select All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-10" data="10" ptype="hidden"
                                                    paction="view">
                                                View
                                                Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-10" data="10" ptype="hidden"
                                                    paction="unhide">
                                                Unhide Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-10" data="10" ptype="hidden"
                                                    paction="expire">
                                                Expire Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-10" data="10" ptype="hidden"
                                                    paction="delete">
                                                Delete Ad</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Pending Ads</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="11">
                                                Select All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-11" data="11" ptype="pending"
                                                    paction="view"> View
                                                Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-11" data="11" ptype="pending"
                                                    paction="approve">
                                                Approve Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-11" data="11" ptype="pending"
                                                    paction="reject">
                                                Reject Ad</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Rejected Ads</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="12">
                                                Select All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-12" data="12" ptype="rejected"
                                                    paction="view"> View
                                                Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-12" data="12" ptype="rejected"
                                                    paction="approve">
                                                Approve Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-12" data="12" ptype="rejected"
                                                    paction="delete">
                                                Delete Ad</td>
                                        </tr>
                                    </table>
                                    <table class="w-100 border p-3">
                                        <tr>
                                            <td><strong>Resubmitted Ads</strong></td>
                                            <td><input type="checkbox" name="" id="" class="parent"
                                                    data="13">
                                                Select All</td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-13" data="13" ptype="resubmitted"
                                                    paction="view"> View
                                                Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-13" data="13" ptype="resubmitted"
                                                    paction="approve">
                                                Approve Ad</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="" id=""
                                                    class="child child-13" data="13" ptype="resubmitted"
                                                    paction="reject">
                                                Reject Ad</td>
                                        </tr>
                                    </table>
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
        $('#mySelect').select2({
            placeholder: 'Select a user',
            allowClear: true
        });
        $.post("{{ url('admin/fetch-admins') }}", {}, function(res) {
            $('#mySelect').html(`<option value="">Select a user</option>`);
            $.each(res, function(key, value) {
                $('#mySelect').append(
                    `<option value="${value.admin_id}">${value.name}</option>`);
            });
        });
        $(document).on('change', '#mySelect', function() {
            let adminID = $(this).val();
            if (adminID != "") {
                $.post("{{ url('admin/fetch-admin-current-permissions') }}", {
                    admin_id: adminID
                }, function(res) {
                    $.each(res, function(key, value) {
                        $('.child').filter(function() {
                            if ($(this).attr('ptype') == value.type && $(this)
                                .attr(
                                    'paction') == value.action) {
                                if (value.permission == 1) {
                                    $(this).prop('checked', true);

                                } else {
                                    $(this).prop('checked', false);
                                }
                                var parentCheckbox = $(this).closest('table')
                                    .find('.parent');
                                var allSelected = parentCheckbox.closest(
                                        'table').find('.child[data="' +
                                        parentCheckbox.attr('data') + '"]')
                                    .filter(function() {
                                        return !this.checked;
                                    }).length === 0;
                                parentCheckbox.prop('checked', allSelected);
                            }
                        });
                    });
                });
            } else {
                $('.child').prop('checked', false);
                $('.parent').prop('checked', false);
            }
        });
        $('.parent').change(function() {
            let admin_id = $('#mySelect').val();
            var parentData = $(this).attr('data');
            if ($(this).is(':checked')) {
                $('.child-' + parentData).prop('checked', true);
                let type = $('.child').filter(function() {
                    if (parentData == $(this).attr('data')) {
                        if (admin_id != '') {
                            $.post("{{ url('admin/grant-permission') }}", {
                                type: $(this).attr('ptype'),
                                action: $(this).attr('paction'),
                                admin_id: admin_id
                            }, function(res) {
                                if (!res) {
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
                                    text: err.responseJSON.message
                                })
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Please select a user'
                            })
                            $('.mySelect').focus();
                        }
                    }
                });

            } else {
                $('.child-' + parentData).prop('checked', false);
                let type = $('.child').filter(function() {
                    if (parentData == $(this).attr('data')) {
                        if (admin_id != '') {
                            $.post("{{ url('admin/revoke-permission') }}", {
                                type: $(this).attr('ptype'),
                                action: $(this).attr('paction'),
                                admin_id: admin_id
                            }, function(res) {
                                if (!res) {
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
                                    text: err.responseJSON.message
                                })
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Please select a user'
                            })
                            $('.mySelect').focus();
                        }
                    }
                });
            }
        });

        $('.child').change(function() {
            var data = $(this).attr('data');
            var desiredParent = $('.parent').filter(function() {
                if ($(this).attr('data') == data) {
                    $(this).prop('checked', false);
                }
            });
        });

        $('.child').on('change', function() {
            var parentCheckbox = $(this).closest('table').find('.parent');
            var allSelected = parentCheckbox.closest('table').find('.child[data="' + parentCheckbox
                .attr('data') + '"]').filter(function() {
                return !this.checked;
            }).length === 0;
            parentCheckbox.prop('checked', allSelected);
        });

        $(document).on('click', '.child', function() {
            let type = $(this).attr('ptype');
            let action = $(this).attr('paction');
            let admin_id = $('#mySelect').val();
            if (admin_id != '') {
                if ($(this).prop('checked')) {
                    $.post("{{ url('admin/grant-permission') }}", {
                        type: type,
                        action: action,
                        admin_id: admin_id
                    }, function(res) {
                        if (!res) {
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
                            text: err.responseJSON.message
                        })
                    });
                } else {
                    $.post("{{ url('admin/revoke-permission') }}", {
                        type: type,
                        action: action,
                        admin_id: admin_id
                    }, function(res) {
                        if (!res) {
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
                            text: err.responseJSON.message
                        })
                    });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please select a user'
                })
                $('.mySelect').focus();
            }
        });
    });
</script>
