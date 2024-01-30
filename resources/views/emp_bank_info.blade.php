
<!-- +Add Bank Account Button -->
@if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addbankmodal">
        +Add Bank Account
    </button>

    <div class="modal fade" id="addbankmodal" tabindex="-1" role="dialog" aria-labelledby="addbankmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addbankmodalLabel">Add Bank Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('emp_bank_info/post') }}">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-6">
                                <label>Bank Name <span class="required">*</span></label>
                                <input type="text" name="bank_name" class="form-control" placeholder="Bank Name"
                                    required>
                            </div>
                            <div class="col-6">
                                <label>Account Name <span class="required">*</span></label>
                                <input type="text" name="account_name" class="form-control"
                                    placeholder="Account Name" required>
                            </div>
                        </div>

                        <br />
                        <div class="row">
                            <div class="col-6">
                                <label>IBAN NO <span class="required">*</span></label>
                                <input type="text" name="iban_num" class="form-control" placeholder="IBAN NO"
                                    required>
                            </div>
                            <div class="col-6">
                                <label>Branch Address <span class="required">*</span></label>
                                <input type="text" name="branch_address" class="form-control"
                                    placeholder="Branch Addres" required>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <label>IFSC Code <span class="required">*</span></label>
                                <input type="text" name="ifsc_code" class="form-control" placeholder="IFSC Code"
                                    required>
                            </div>

                            <div class="col-6">
                                <label>SWIFT Code <span class="required">*</span></label>
                                <input type="text" name="swift_code" class="form-control" placeholder="SWIFT Code"
                                    required>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <label>Country <span class="required">*</span></label>
                                <input type="text" name="country" class="form-control" placeholder="Country"
                                    required>
                            </div>
                        </div>
                        <br />
                        <div class="text-center">
                            <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                            <button type="submit" class="btn btn-success" name="button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div id="" class="card-header text-center">
                <h4>BANK DETAILS</h4>
            </div>
            <div class="card-body">
                <table class="table" id="bank-emp-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bank Name</th>
                            <th>Account Name</th>
                            <th>IBAN NO</th>
                            <th>Branch Address</th>
                            <th>IFSC Code</th>
                            <th>SWIFT Code</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bankdata as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->bank_name }}</td>
                                <td>{{ $data->account_name }}</td>
                                <td>{{ $data->iban_num }}</td>
                                <td>{{ $data->branch_address }}</td>
                                <td>{{ $data->ifsc_code }}</td>
                                <td>{{ $data->swift_code }}</td>
                                <td>{{ $data->country }}</td>
                                <td>
                                    <a href="{{url('edit-bank/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('delete-bank/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#bank-emp-datatable').DataTable();
        });
    </script>
@endpush
