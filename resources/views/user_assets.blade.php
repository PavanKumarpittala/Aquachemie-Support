@extends('layouts.app')

@section('content')
    <main class="app-content">
        <div class="container-fluid">
            <div class="col-md-12 user-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="color:#A04000">Assets</h4>

                        <div class="row cust_data_form">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                        id="branch_count">
                                        <option selected="selected">10</option>
                                        <option>25</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"></div>

                            <!-- <div class="col-md-8"></div> -->
                            <div class="col-md-3 margin pull-right no-m-top">
                                <div class="input-group">
                                    <input type="text" class="form-control no-border-right" id="search_user"
                                        placeholder="Search...">
                                    <div class="input-group-addon">
                                        <i class="fa fa-search sear"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 pull-right">
                                @if (Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
                                <button class="btn btn-primary" data-toggle="modal" data-target="#user_domain"
                                    type="submit">Add Asset</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <div>
                                    {{-- <table id="branch_table"
                                        class="table table-striped table-bordered dt-responsive nowrap branch_table"
                                        cellspacing="0" width="100%" data-page-length='10'> --}}
                                    <table id="branch_table" class="table table-striped table-bordered nowrap branch_table"
                                        style="overflow-x: auto;display: block;">
                                        <thead>
                                            <tr>
                                                <th data-orderable="false">S.no</th>
                                                <th data-orderable="false">Type</th>
                                                <th data-orderable="false">Product Name</th>
                                                <th data-orderable="false">Model</th>
                                                <th data-orderable="false">Make</th>
                                                <th data-orderable="false">Serial No</th>
                                                <th data-orderable="false">Location</th>
                                                <th data-orderable="false">Asset Values</th>
                                                <th data-orderable="false">Asset Specs</th>
                                                <th data-orderable="false">Emp Id</th>
                                                <th data-orderable="false">Emp Name</th>
                                                <th data-orderable="false">Warranty Start Date</th>
                                                <th data-orderable="false">Warranty End Date</th>
                                                <th data-orderable="false">Date Of Purchase</th>
                                                <th data-orderable="false">Vendor Name</th>
                                                <th data-orderable="false">Vender Bill No</th>
                                                <th data-orderable="false">Invoice Value</th>
                                                <th data-orderable="false">Parent Asset Code</th>
                                                <th data-orderable="false">Sub Type</th>
                                                @if (Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
                                                    <th data-orderable="false">Actions</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidemenu close divs-->
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="user_domain">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Asset Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="add_asset" action="javascript:void(0)" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group required-field">
                            <label for="type">Type:</label>
                            <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                id="type" name="type">
                                <option value="">Select Type</option>
                                <option value="IT Assets">IT Assets</option>
                                <option value="Motor Vehicle">Motor Vehicle</option>
                                <option value="Furniture and Fixtures">Furniture and Fixtures</option>
                            </select>
                        </div>

                        <div class="form-group required-field">
                            <label for="emp_name">Sub Type:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="sub_type" name="sub_type">
                        </div>

                        <div class="form-group required-field">
                            <label for="product_name">Product Name:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="product_name"
                                name="product_name">
                        </div>
                        <div class="form-group required-field">
                            <label for="model">Model:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="model" name="model">
                        </div>
                        <div class="form-group required-field">
                            <label for="make">Make:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="make" name="make">
                        </div>
                        <div class="form-group required-field">
                            <label for="serial_no">Serial No:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="serial_no" name="serial_no">
                        </div>
                        <div class="form-group required-field">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="location"
                                name="location">
                        </div>
                        <div class="form-group required-field">
                            <label for="asset_value">Asset Value:</label>
                            <input type="number" class="form-control" style="width: 100%;" id="asset_value"
                                name="asset_value">
                        </div>
                        <div class="form-group required-field">
                            <label for="asset_specs">Asset Specs:</label>
                            <textarea class="form-control" style="width: 100%;" id="asset_specs" name="asset_specs"></textarea>
                        </div>
                        <div class="form-group required-field">
                            <label for="emp_id">Employee Id:</label>
                            @if (isset($users))
                                <select name="emp_id" id="emp_id" class="form-control">
                                    <option value="">Select Employee Id</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group required-field">
                            <label for="emp_name">Employee Name:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="emp_name"
                                name="emp_name">
                        </div>
                        <div class="form-group required-field">
                            <label for="warranty_start_date">Warranty Start Date:</label>
                            <input type="date" class="form-control" style="width: 100%;" id="warranty_start_date"
                                name="warranty_start_date">
                        </div>
                        <div class="form-group required-field">
                            <label for="warranty_end_date">Warranty End Date:</label>
                            <input type="date" class="form-control" style="width: 100%;" id="warranty_end_date"
                                name="warranty_end_date">
                        </div>
                        <div class="form-group required-field">
                            <label for="date_of_purchase">Date of Purchase:</label>
                            <input type="date" class="form-control" style="width: 100%;" id="date_of_purchase"
                                name="date_of_purchase">
                        </div>

                        <div class="form-group required-field">
                            <label for="vendor_name">Vendor Name:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="vendor_name"
                                name="vendor_name">
                        </div>
                        <div class="form-group required-field">
                            <label for="vendor_bill_no">Vendor Bill Number:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="vendor_bill_no"
                                name="vendor_bill_no">
                        </div>
                        <div class="form-group required-field">
                            <label for="invoice_value">Invoice Value:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="invoice_value"
                                name="invoice_value">
                        </div>
                        <div class="form-group required-field">
                            <label for="parent_asset_code">Parent Asset Code:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="parent_asset_code"
                                name="parent_asset_code">
                        </div>

                        <div class="form-group required-field">
                            <label for="files">Assets Image Upload: <span class="required">*</span></label>
                            <input class="btn btn-primary" type="file" name="files[]" multiple>
                        </div>

                        <button type="submit" class="btn btn-primary" name="button">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!---------------------------------------------- EDIT FUNCTIONALITY--------------------------------------------------->
    <div class="modal fade" id="update_assets">
        <div class="modal-dialog">
            <div class="modal-content">
                <!------------------- Modal Header ----------------->
                <div class="modal-header">
                    <h4 class="modal-title">Update Assets</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- ------------------------------Modal body----------------------------------------------------------->
                <div class="modal-body">
                    <form id="update_asset" action="javascript:void(0)" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_hidden" id="user_hidden">
                        <div class="form-group required-field">
                            <label for="update_type">Type:</label>
                            <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                id="update_type" name="update_type">
                                <option value="">Select Type</option>
                                <option value="IT Assets">IT Assets</option>
                                <option value="Motor Vehicle">Motor Vehicle</option>
                                <option value="Furniture and Fixtures">Furniture and Fixtures</option>
                            </select>
                        </div>

                        <div class="form-group required-field">
                            <label for="update_sub_type">Sub Type:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_sub_type"
                                name="update_sub_type">
                        </div>

                        <div class="form-group required-field">
                            <label for="update_product_name">Product Name:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_product_name"
                                name="update_product_name">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_model">Model:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_model"
                                name="update_model">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_make">Make:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_make"
                                name="update_make">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_serial_no">Serial No:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_serial_no"
                                name="update_serial_no">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_location">Location:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_location"
                                name="update_location">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_asset_value">Asset Value:</label>
                            <input type="number" class="form-control" style="width: 100%;" id="update_asset_value"
                                name="update_asset_value">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_asset_specs">Asset Specs:</label>
                            <textarea class="form-control" style="width: 100%;" id="update_asset_specs" name="update_asset_specs"></textarea>
                        </div>
                        <div class="form-group required-field">
                            <label for="update_emp_id">Employee Id:</label>
                            @if (isset($users))
                                <select name="update_emp_id" id="update_emp_id" class="form-control">
                                    <option value="">Select Employee Id</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group required-field">
                            <label for="update_emp_name">Employee Name:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_emp_name"
                                name="update_emp_name">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_warranty_start_date">Warranty Start Date:</label>
                            <input type="date" class="form-control" style="width: 100%;"
                                id="update_warranty_start_date" name="update_warranty_start_date">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_warranty_end_date">Warranty End Date:</label>
                            <input type="date" class="form-control" style="width: 100%;"
                                id="update_warranty_end_date" name="update_warranty_end_date">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_date_of_purchase">Date of Purchase:</label>
                            <input type="date" class="form-control" style="width: 100%;" id="update_date_of_purchase"
                                name="update_date_of_purchase">
                        </div>

                        <div class="form-group required-field">
                            <label for="update_vendor_name">Vendor Name:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_vendor_name"
                                name="update_vendor_name">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_vendor_bill_no">Vendor Bill Number:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_vendor_bill_no"
                                name="update_vendor_bill_no">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_invoice_value">Invoice Value:</label>
                            <input type="text" class="form-control" style="width: 100%;" id="update_invoice_value"
                                name="update_invoice_value">
                        </div>
                        <div class="form-group required-field">
                            <label for="update_parent_asset_code">Parent Asset Code:</label>
                            <input type="text" class="form-control" style="width: 100%;"
                                id="update_parent_asset_code" name="update_parent_asset_code">
                        </div>

                        <div class="form-group required-field">
                            <label for="update_files">Asset Images:</label>
                            <input class="btn btn-primary" id="update_files" type="file" name="update_files[]" multiple>
                        </div>
                        <div id="thumbnails-container">
                        </div>
                        <input type="hidden" name="update_all_files" id="update_all_files" value="" />
                        <div class="form-group" style="clear: both">
                            <button type="submit" class="btn btn-primary" name="button">Update</button>
                        </div>

                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var BranchListTable = $('#branch_table').DataTable({
                "dom": '<"html5buttons"B>tp',
                "bServerSide": true,
                "serverSide": true,
                "processing": true,
                "bRetrieve": true,
                "paging": true,
                "ajax": {
                    "url": public_path + '/asset-json',
                    "type": "GET",
                    "data": function(d) {
                        return $.extend({}, d, {
                            'branch_count': $('#branch_count').val() || '',
                            "search_user": $('#search_user').val() || '',
                        });
                    }
                },

                "columns": [{
                        "data": "id",
                        "name": "id",
                        "defaultContent": '-',
                        "orderable": "false",
                    },
                    {
                        "data": "type",
                        "name": "type"
                    },
                    {
                        "data": "product_name",
                        "name": "product_name",
                        "defaultContent": '-'
                    },
                    {
                        "data": "model",
                        "name": "model",
                        "defaultContent": '-'
                    },
                    {
                        "data": "make",
                        "name": "make",
                        "defaultContent": '-'
                    },
                    {
                        "data": "serial_no",
                        "name": "serial_no",
                        "defaultContent": '-'
                    },
                    {
                        "data": "location",
                        "name": "location",
                        "defaultContent": '-'
                    },
                    {
                        "data": "asset_value",
                        "name": "asset_value",
                        "defaultContent": '-'
                    },
                    {
                        "data": "asset_specs",
                        "name": "asset_specs",
                        "defaultContent": '-'
                    },
                    {
                        "data": "emp_id",
                        "name": "emp_id",
                        "defaultContent": '-'
                    },
                    {
                        "data": "emp_name",
                        "name": "emp_name",
                        "defaultContent": '-'
                    },
                    {
                        "data": "warranty_start_date",
                        "name": "warranty_start_date",
                        "defaultContent": '-'
                    },
                    {
                        "data": "warranty_end_date",
                        "name": "warranty_end_date",
                        "defaultContent": '-'
                    },
                    {
                        "data": "date_of_purchase",
                        "name": "date_of_purchase",
                        "defaultContent": '-'
                    },
                    {
                        "data": "vendor_name",
                        "name": "vendor_name",
                        "defaultContent": '-'
                    },
                    {
                        "data": "vendor_bill_no",
                        "name": "vendor_bill_no",
                        "defaultContent": '-'
                    },
                    {
                        "data": "invoice_value",
                        "name": "invoice_value",
                        "defaultContent": '-'
                    },
                    {
                        "data": "parent_asset_code",
                        "name": "parent_asset_code",
                        "defaultContent": '-'
                    },

                    {
                        "data": "sub_type",
                        "name": "sub_type",
                        "defaultContent": '-'
                    },

                    @if (Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
                    {
                        "data": "actions",
                        "name": "actions",
                        "defaultContent": '-'
                    },
                    @endif
                ],

                "order": [
                    [0, "desc"]
                ],

                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    var page = this.fnPagingInfo().iPage;
                    var length = this.fnPagingInfo().iLength;
                    var index = (page * length + (iDisplayIndex + 1));


                    $('td:eq(0)', nRow).html(index);

                    var view_url = public_path + '/assets_view/' + aData['id'];
                    var view_link = '<td><div><a href=' + view_url + '>' + aData['type'] +
                        '</a></div></td>';
                    $('td:eq(1)', nRow).html(view_link);

                    var warranty_start_date = '';
                    if (aData['warranty_start_date']) {
                        const dateObject = new Date(aData['warranty_start_date']);
                        const options = {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        };
                        warranty_start_date =  dateObject.toLocaleString('en-GB', options);
                    }
                    $('td:eq(12)', nRow).html(warranty_start_date);

                    var warranty_end_date = '';
                    if (aData['warranty_end_date']) {
                        const dateObject = new Date(aData['warranty_end_date']);
                        const options = {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        };
                        warranty_end_date =  dateObject.toLocaleString('en-GB', options);
                    }
                    $('td:eq(13)', nRow).html(warranty_end_date);

                    var date_of_purchase = '';
                    if (aData['date_of_purchase']) {
                        const dateObject = new Date(aData['date_of_purchase']);
                        const options = {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        };
                        date_of_purchase =  dateObject.toLocaleString('en-GB', options);
                    }
                    $('td:eq(14)', nRow).html(date_of_purchase);



                    var action1 =
                        '<td class="admin-center"><a  data-toggle="modal" data-target="#update_assets" title="Edit" onclick="editUserDomain(' +
                        aData['id'] +
                        ');"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:22px;text-align:center;color:#c09500;cursor: pointer;"></i></a>&nbsp&nbsp';

                    let statusData = "";

                    if (aData['status'] == "0") {
                        statusData = "Active";
                    } else if ((aData['status'] == "1")) {
                        statusData = "Inactive";
                    } else {
                        statusData = "Active";
                    }

                    action1 += '<a data-toggle="modal" data-target="#delete_assets"  title="' +
                        statusData + '" onclick="deleteAssets(' + aData['id'] + ',' + aData['status'] +
                        ');"><i class="fa fa-trash" aria-hidden="true" style="font-size:22px;text-align:center;color:#d33;cursor: pointer;"></i></a>&nbsp&nbsp';

                    action1 += '</td>';
                    $('td:eq(20)', nRow).html(action1);
                },

            });

            $('#search_user').on('keyup', function() {
                BranchListTable.draw();
            });

            $('#branch_count').change(function() {
                BranchListTable.page.len($('#branch_count').val()).draw();
            });


            $(document).delegate('td>a.edit_branch', 'click', function() {
                var id = $(this).attr('data-branch-id');
                window.location.href = public_path + '/edit_branch/' + id;
            });




            $("#add_asset").validate({
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
                ignore: [],

                /* @validation rules
                ------------------------------------------ */
                rules: {
                    type: {
                        required: true,
                    },
                    product_name: {
                        required: true,
                    },
                    model: {
                        required: true,
                    },
                    make: {
                        required: true,
                    },
                    serial_no: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    asset_value: {
                        required: true,
                    },
                    asset_specs: {
                        required: true,
                    },
                    emp_id: {
                        required: true,
                    },
                    emp_name: {
                        required: true,
                    },
                    warranty_start_date: {
                        required: true,
                    },
                    warranty_end_date: {
                        required: true,
                    },
                    date_of_purchase: {
                        required: true,
                    },
                    vendor_name: {
                        required: true,
                    },
                    vendor_bill_no: {
                        required: true,
                    },
                    invoice_value: {
                        required: true,
                    },
                    parent_asset_code: {
                        required: true,
                    },

                    sub_type: {
                        required: true,
                    },
                },
                /* @validation error messages
                ---------------------------------------------- */

                messages: {
                    type: {
                        required: 'The Field Is Required '
                    },
                    product_name: {
                        required: 'The Field Is Required'
                    },
                    model: {
                        required: 'The Field Is Required'
                    },
                    make: {
                        required: 'The Field Is Required'
                    },
                    serial_no: {
                        required: 'The Field Is Required'
                    },
                    location: {
                        required: 'The Field Is Required'
                    },
                    asset_value: {
                        required: 'The Field Is Required'
                    },
                    asset_specs: {
                        required: 'The Field Is Required'
                    },
                    emp_id: {
                        required: 'The Field Is Required '
                    },
                    emp_name: {
                        required: 'The Field Is Required'
                    },
                    warranty_start_date: {
                        required: 'The Field Is Required'
                    },
                    warranty_end_date: {
                        required: 'The Field Is Required'
                    },
                    date_of_purchase: {
                        required: 'The Field Is Required'
                    },
                    vendor_name: {
                        required: 'The Field Is Required'
                    },
                    vendor_bill_no: {
                        required: 'The Field Is Required'
                    },
                    invoice_value: {
                        required: 'The Field Is Required'
                    },
                    parent_asset_code: {
                        required: 'The Field Is Required'
                    },
                    sub_type: {
                        required: 'The Field Is Required'
                    }


                },
                submitHandler: function(form) {


                    $.ajax({
                        url: public_path + '/add_asset',
                        method: 'post',
                        data: new FormData($("#add_asset")[0]),
                        dataType: 'json',
                        async: false,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            if (result.success == 1) {
                                // alert("Employee Details Added Successfully.!")

                                //      location.reload();
                                Swal.fire({
                                    type: 'success',
                                    title: result.message,
                                    showConfirmButton: true,

                                });
                                location.reload();
                            } else {
                                swal("Error", result.message, "warning");
                            }
                        },
                        error: function(error) {
                            if (error) {
                                var error_status = error.responseText;
                                alert(error_status.message);
                            }
                        }
                    });

                }
            });

            $("#update_asset").validate({
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",
                ignore: [],

                /* @validation rules
                ------------------------------------------ */
                rules: {
                    update_type: {
                        required: true,
                    },
                    update_product_name: {
                        required: true,
                    },
                    update_model: {
                        required: true,
                    },
                    update_make: {
                        required: true,
                    },
                    update_serial_no: {
                        required: true,
                    },
                    update_location: {
                        required: true,
                    },
                    update_asset_value: {
                        required: true,
                    },
                    update_asset_specs: {
                        required: true,
                    },
                    update_emp_id: {
                        required: true,
                    },
                    update_emp_name: {
                        required: true,
                    },
                    update_warranty_start_date: {
                        required: true,
                    },
                    update_warranty_end_date: {
                        required: true,
                    },
                    update_date_of_purchase: {
                        required: true,
                    },
                    update_vendor_name: {
                        required: true,
                    },
                    update_vendor_bill_no: {
                        required: true,
                    },
                    update_invoice_value: {
                        required: true,
                    },
                    update_parent_asset_code: {
                        required: true,
                    },

                    update_sub_type: {
                        required: true,
                    },

                    // update_files: {
                    //     required: true,
                    // },
                },
                /* @validation error messages
                ---------------------------------------------- */

                messages: {
                    update_type: {
                        required: 'The Field Is Required '
                    },
                    update_product_name: {
                        required: 'The Field Is Required'
                    },
                    update_model: {
                        required: 'The Field Is Required'
                    },
                    update_make: {
                        required: 'The Field Is Required'
                    },
                    update_serial_no: {
                        required: 'The Field Is Required'
                    },
                    update_location: {
                        required: 'The Field Is Required'
                    },
                    update_asset_value: {
                        required: 'The Field Is Required'
                    },
                    update_asset_specs: {
                        required: 'The Field Is Required'
                    },
                    update_emp_id: {
                        required: 'The Field Is Required '
                    },
                    update_emp_name: {
                        required: 'The Field Is Required'
                    },
                    update_warranty_start_date: {
                        required: 'The Field Is Required'
                    },
                    update_warranty_end_date: {
                        required: 'The Field Is Required'
                    },
                    update_date_of_purchase: {
                        required: 'The Field Is Required'
                    },
                    update_vendor_name: {
                        required: 'The Field Is Required'
                    },
                    update_vendor_bill_no: {
                        required: 'The Field Is Required'
                    },
                    update_invoice_value: {
                        required: 'The Field Is Required'
                    },
                    update_parent_asset_code: {
                        required: 'The Field Is Required'
                    },
                    update_sub_type: {
                        required: 'The Field Is Required'
                    },

                    // update_files: {
                    //     required: 'The Field Is Required'
                    // }

                },
                submitHandler: function(form) {
                    $.ajax({
                        url: public_path + '/update_asset',
                        method: 'post',
                        data: new FormData($("#update_asset")[0]),
                        dataType: 'json',
                        async: false,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            if (result.success == 1) {
                                // alert("Assets Updated Successfully.!")
                                Swal.fire({
                                    type: 'success',
                                    title: result.message,
                                    showConfirmButton: true,
                                    // timer: 1500
                                });
                                //  location.reload();
                                $('#update_assets').modal('hide');
                                $('#branch_table').DataTable().ajax.reload();

                            } else {
                                swal("Error", result.message, "warning");
                            }
                        },
                        error: function(error) {
                            if (error) {
                                var error_status = error.responseText;
                                alert(error_status.message);
                            }
                        }
                    });

                }
            });


        });

        function editUserDomain(id) {
            // Set the value of the hidden input field 'user_hidden' with the provided 'user_id'
            $('#user_hidden').val(id);
            $.ajax({
                url: public_path + '/get_assets/' + id,
                method: 'get',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(result) {
                    if (result.success == 1) {
                        // Populate form fields with the retrieved data
                        $('#update_type').val(result.user.type);
                        $('#update_sub_type').val(result.user.sub_type);
                        $('#update_product_name').val(result.user.product_name);
                        $('#update_model').val(result.user.model);
                        $('#update_make').val(result.user.make);
                        $('#update_serial_no').val(result.user.serial_no);
                        $('#update_location').val(result.user.location);
                        $('#update_asset_value').val(result.user.asset_value);
                        $('#update_asset_specs').val(result.user.asset_specs);
                        $('#update_emp_id').val(result.user.emp_id);
                        $('#update_emp_name').val(result.user.emp_name);
                        $('#update_warranty_start_date').val(result.user.warranty_start_date);
                        $('#update_warranty_end_date').val(result.user.warranty_end_date);
                        $('#update_date_of_purchase').val(result.user.date_of_purchase);
                        $('#update_vendor_name').val(result.user.vendor_name);
                        $('#update_vendor_bill_no').val(result.user.vendor_bill_no);
                        $('#update_invoice_value').val(result.user.invoice_value);
                        $('#update_parent_asset_code').val(result.user.parent_asset_code);
                        $('#update_files').val('');
                        $('#update_all_files').val(result.user.file_paths);
                        // Handle other form elements if needed

                        var thumbnailsContainer = $('#thumbnails-container');
                        var filePaths = result.user.file_paths;

                        thumbnailsContainer.empty();
                        var parsedFilePaths = JSON.parse(filePaths);

                        if (Array.isArray(parsedFilePaths)) {
                            let i = 1000;
                                parsedFilePaths.forEach(function(filePath) {
                                var imgElement = `<div><img src="${filePath}" class='thumbnail-image' /><br /><input type="checkbox" id=${i} name="removefiles[]" value="${filePath}"><label for=${i}> Remove</label></div>`;
                                thumbnailsContainer.append(imgElement);

                                i++;
                            });
                        }

                    } else {
                        swal("Error", result.message, "warning");
                    }
                },
                error: function(error) {
                    if (error) {
                        var error_status = error.responseText;
                        alert(error_status.message);
                    }
                }
            });
        }

        function deleteAssets(id, status) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to change Status",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5947B2',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.value == true) {

                    $.ajax({
                        url: public_path + '/delete_assets/' + id + '/' + status,
                        method: 'get',
                        data: new FormData($("#delete_assets")[0]),
                        dataType: 'json',
                        async: false,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            if (result.success == 1) {
                                // alert(result.message);
                                Swal.fire({
                                    type: 'warning',
                                    title: result.message,
                                    showConfirmButton: true,
                                    // timer: 1500
                                });
                                $('#branch_table').DataTable().ajax.reload();

                            } else {

                                alert(result.message);
                                //swal("Error", result.message, "warning");
                            }
                        },
                        error: function(error) {
                            if (error) {
                                var error_status = error.responseText;
                                alert(error_status.message);
                            }
                        }
                    });
                }
            })

        }

        function myfunctioin() {
            console.log("hello there how are you!");
        }
    </script>
@endsection
