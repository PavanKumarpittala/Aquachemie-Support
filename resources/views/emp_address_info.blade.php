@if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
    <!-- +Add Address Button -->
    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addaddressLabel">
        +Add Address For Communication
    </button>

    <div class="modal fade" id="addaddressLabel" tabindex="-1" role="dialog" aria-labelledby="addaddressLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addaddressLabel">Address Details For Communication</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mt-4">
                    <form method="POST" action="{{ route('emp_address_info/post') }}">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-6">
                                <label>Address Type<span class="required">*</span></label>
                                @if (isset($address->adress_type))
                                    <select name="adress_type" class="form-control">
                                        <option value="" selected>--Select Address For Communication--</option>
                                        <option value="communication address"
                                            {{ $address->adress_type === 'communication address' ? 'selected' : '' }}>
                                            Communication Address</option>
                                        <option value="Permanent address"
                                            {{ $address->adress_type === 'Permanent address' ? 'selected' : '' }}>
                                            Permanent Address</option>
                                    </select>
                                @else
                                    <select name="adress_type" class="form-control">
                                        <option value="" selected>--Select Address For Communication--</option>
                                        <option value="communication address">
                                            Communication Address</option>
                                        <option value="Permanent address">
                                            Permanent Address</option>
                                    </select>
                                @endif
                            </div>

                            <div class="col-6">
                                <label>Building<span class="required">*</span></label>
                                <input type="text" name="building" class="form-control" placeholder="Building"
                                    required>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-6">
                                <label>Street Name<span class="required">*</span></label>
                                <input type="text" name="street_name" class="form-control" placeholder="Reporting To"
                                    required >
                            </div>

                            <div class="col-6">
                                <label>Street No<span class="required">*</span></label>
                                <input type="text" name="street_no" class="form-control" placeholder="Street Number"
                                    required >
                            </div>
                        </div><br />

                        <div class="row">
                            <div class="col-6">
                                <label>City <span class="required">*</span></label>
                                <input type="text" name="city" class="form-control" placeholder="City" required
                                    >
                            </div>

                            <div class="col-6">
                                <label>Country <span class="required">*</span></label>
                                <input type="text" name="country" class="form-control" placeholder="Country" required
                                    >
                            </div>
                        </div><br />

                        <div class="row">

                            <div class="col-6">
                                <label>State<span class="required">*</span></label>
                                <input type="text" name="state" class="form-control" placeholder="State" required>
                            </div>

                            <div class="col-6">
                                <label>Zip Code / PO Box <span class="required">*</span></label>
                                <input type="text" name="zip_code" class="form-control"
                                    placeholder="Zip Code / PO Box" required>
                            </div>

                        </div><br />

                        <div class="text-center">
                            <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                            <button type="submit" class="btn btn-success" name="button">Submit</button>
                        </div>
                        <br />
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>ADDRESS DETAILS FOR COMMUNICATION</h4>
            </div>
            <div class="card-body">
                <table class="table" id="address-emp-datatable">
                    @csrf
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Address Type</th>
                            <th>Building</th>
                            <th>Street Name</th>
                            <th>Street No</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>Zip Code / PO Box </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($address as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->adress_type }}</td>
                                <td>{{ $data->building }}</td>
                                <td>{{ $data->street_name }}</td>
                                <td>{{ $data->street_no }}</td>
                                <td>{{ $data->city }}</td>
                                <td>{{ $data->country }}</td>
                                <td>{{ $data->state }}</td>
                                <td>{{ $data->zip_code }}</td>
                                <td>
                                    <a href="{{url('edit-communication/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('delete-communication/' .$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
            $('#address-emp-datatable').DataTable();
        });
    </script>
@endpush



