{{-- @if (session()->has('success'))
    <h6 class="alert alert-success">{{ session('success') }}</h6>
@endif --}}
{{-- --------------------------------Family Information and Role  discription----------------------------- --}}
@if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
    <div class="mt-3">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addfamilymodal">+Add Family
        </button>
    </div>
    <!-------Button End------->
    {{-- ------------------- Modal Box  ---------------------- --}}
    <div class="modal fade" id="addfamilymodal" tabindex="-1" role="dialog" aria-labelledby="addfamilymodalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addfamilymodalLabel">Add Family Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('emp_family_info/post') }}">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label>Name <span class="required">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <label>Relation <span class="required">*</span></label>
                            <select name="relation" class="form-control">
                                <option value="" disabled selected>--Select Relation--</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Brother">Brother</option>
                                <option value="Sister">Sister</option>
                                <option value="Husband">Husband</option>
                                <option value="Wife">Wife</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Gender <span class="required">*</span></label>
                            <select name="gender" class="form-control">
                                <option value="" disabled selected>--Select Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date Of Birth <span class="required">*</span></label>
                            <input type="date" name="date_of_birth" class="form-control" placeholder="Date Of Birth"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Place Of Birth <span class="required">*</span></label>
                            <input type="text" name="place_of_birth" class="form-control"
                                placeholder="Place Of Birth" required>
                        </div>

                        <div class="form-group">
                            <label>Citizenship <span class="required">*</span></label>
                            <input type="text" name="citizenship" class="form-control" placeholder="Citizenship"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number <span class="required">*</span></label>
                            <input type="number" name="mobile_number" class="form-control" placeholder="Mobile Number"
                                required>
                        </div>
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
                <h4>FAMILY INFORMATION DETAILS</h4>
            </div>
            <div class="card-body">
                <table class="table" id="family-emp-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Relation</th>
                            <th>Date of Birth</th>
                            <th>Place of Address</th>
                            <th>Mobile number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($familyInfoData as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->relation }}</td>
                                <td>{{ $data->date_of_birth }}</td>
                                <td>{{ $data->place_of_birth }}</td>
                                <td>{{ $data->mobile_number }}</td>
                                <td>
                                    <a href="{{ url('edit-family/' . $data->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('delete-family/' . $data->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
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
            $('#family-emp-datatable').DataTable();
        });
    </script>
@endpush
