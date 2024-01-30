
@if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
    <!-- +Add  Previous Button -->
    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addemployeemodal">
        +Add Previous Employee Details
    </button>
    <!-- Previous Modal -->
    <div class="modal fade" id="addemployeemodal" tabindex="-1" role="dialog" aria-labelledby="addemployeemodalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addemployeemodalLabel">Previous Employee Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('emp_previous_info/post') }}">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label>Company <span class="required">*</span></label>
                            <input type="text" name="company" class="form-control" placeholder="Company" required>
                        </div>

                        <div class="form-group">
                            <label>Date From <span class="required">*</span></label>
                            <input type="date" name="date_from" class="form-control" placeholder="Date From"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Date TO <span class="required">*</span></label>
                            <input type="date" name="date_to" class="form-control" placeholder="Date To" required>
                        </div>

                        <div class="form-group">
                            <label>Employer <span class="required">*</span></label>
                            <input type="text" name="employeer" class="form-control" placeholder="Employer" required>
                        </div>

                        <div class="form-group">
                            <label>Position <span class="required">*</span></label>
                            <input type="text" name="position" class="form-control" placeholder="Position" required>
                        </div>

                        <div class="form-group">
                            <label>Remark <span class="required">*</span></label>
                            <input type="text" name="remark" class="form-control" placeholder="Remark" required>
                        </div>
                        <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>EMPLOYEE PREVIOUS DETAILS</h4>
            </div>
            <div class="card-body">
                <table class="table" id="prev-emp-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Employee </th>
                            <th>Position</th>
                            <th>Remark</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through your previous information data and display in the table -->
                        @foreach ($previous as $data)

                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->company }}</td>
                                <td>{{ $data->date_from }}</td>
                                <td>{{ $data->date_to }}</td>
                                <td>{{ $data->employeer }}</td>
                                <td>{{ $data->position }}</td>
                                <td>{{ $data->remark }}</td>
                                <td>
                                    <a href="{{url('edit-previous/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('delete-previous/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
            $('#prev-emp-datatable').DataTable();
        });
    </script>
@endpush
