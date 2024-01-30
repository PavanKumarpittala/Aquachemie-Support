
@if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addacadamicLabel">
        +Add Acadamic
    </button>
    <!-----------------------ACADAMIC MODAL ------------------------------------------------- -->
    <div class="modal fade" id="addacadamicLabel" tabindex="-1" role="dialog" aria-labelledby="addacadamicLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addacadamicLabel">Acadamic Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mt-4">
                    <form method="POST" action="{{ route('emp_acadamic_info/post') }}">
                        @csrf
                        @method('post')

                        <div class="row mb-3">
                            <div class="col">
                                <label>From Year <span class="required">*</span></label>
                                <input type="text" name="from_year" class="form-control" placeholder="From Year"
                                    aria-labelledby="From Year" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label>To Year <span class="required">*</span></label>
                                <input type="text" name="to_year" class="form-control" placeholder="To Year"
                                    aria-labelledby="To Year" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label>Board / University <span class="required">*</span></label>
                                <input type="text" name="board_university" class="form-control"
                                    placeholder="Board / University" aria-labelledby="University" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label>Instuite Name <span class="required">*</span></label>
                                <input type="text" name="institute_name" class="form-control"
                                    placeholder="Institute Name" aria-labelledby="Institute name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label>Education Type <span class="required">*</span></label>
                                <input type="text" name="education_type" class="form-control"
                                    placeholder="Education Type" aria-labelledby="Education Type" required>
                            </div>
                        </div>
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
                <h4>ACADAMIC DETAILS</h4>
            </div>
            <div class="card-body">
                <table class="table" id="acadamic-emp-datatable">
                    @csrf
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>From Year</th>
                            <th>To Year</th>
                            <th>Board / University</th>
                            <th>Instuite Name </th>
                            <th>Education Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acadamics as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->from_year }}</td>
                                <td>{{ $data->to_year }}</td>
                                <td>{{ $data->board_university }}</td>
                                <td>{{ $data->institute_name }}</td>
                                <td>{{ $data->education_type }}</td>
                                <td>
                                    <a href="{{url('edit-acadamics/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('delete-acadamics/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
            $('#acadamic-emp-datatable').DataTable();
        });
    </script>
@endpush
