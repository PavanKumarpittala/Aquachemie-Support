
@if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2) 
    <!-- +Add Attachements Button -->
    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#residentialLabel">
        +Add Residential Attachements
    </button>
    <!-----------------------ATTACHEMENTS MODAL ------------------------------------------------- -->
    <div class="modal fade" id="residentialLabel" tabindex="-1" role="dialog" aria-labelledby="residentialLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="residentialLabel">Add Residential Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mt-4">
                    <form action="{{ route('emp_residential_info/post') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="col">
                            <label>Is Resident Visa Applied:</label>
                            <select name="resident_visa_status" class="form-control" id="residentVisaStatus">
                                <option value="" disabled selected>Select Status</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <br />
                        <div id="visaDetails" style="display: none;">

                            <div class="col">
                                <label>Visa Status <span class="required">*</span></label>
                                <select name="visa_status" class="form-control">
                                    <option value="" disabled selected>--Select Visa Status--</option>
                                    <option value="Under Process">Under Process</option>
                                    <option value="Received">Received</option>
                                </select>
                            </div>
                            <br />
                            <div class="col">
                                <label>Sponsor Name<span class="required">*</span></label>
                                <input type="text" name="sponsor_name" class="form-control"
                                    placeholder="Sponsor Name" required>
                            </div>
                            <br />
                            <div class="col">
                                <label for="visa_num">Visa No <span class="required">*</span></label>
                                <input type="text" name="visa_num" class="form-control" placeholder="Visa No"
                                    required>
                            </div>
                            <br />
                            <div class="col">
                                <label for="visa_start_date">Start Date <span class="required">*</span></label>
                                <input type="date" name="visa_start_date" class="form-control"
                                    placeholder="Start Date" required>
                            </div>
                            <br />
                            <div class="col">
                                <label for="visa_end_date">End Date <span class="required">*</span></label>
                                <input type="date" name="visa_end_date" class="form-control" placeholder="End Date"
                                    required>
                            </div>
                            <br />

                            <br />
                            <div class="text-center">
                                <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                            <br />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>RESIDENTIAL VISA ATTACHEMENT DETAILS</h4>
            </div>
            <div class="card-body">
                <table class="table" id="resident-emp-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Visa Status</th>
                            <th>Sponser Name</th>
                            <th>Resident Visa Status</th>
                            <th>Visa Number</th>
                            <th>Visa Starting Date</th>
                            <th>Visa End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visattachements as $form)
                            <tr>
                                <td>{{ $form->id }}</td>
                                <td>{{ $form->visa_status }}</td>
                                <td>{{ $form->sponsor_name }}</td>
                                <td>{{ $form->resident_visa_status }}</td>
                                <td>{{ $form->visa_num }}</td>
                                <td>{{ $form->visa_start_date }}</td>
                                <td>{{ $form->visa_end_date }}</td>
                                <td>
                                    <a href="{{url('edit-residential/'.$form->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('delete-residential/'.$form->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
            $('#resident-emp-datatable').DataTable();
        });
    </script>
@endpush

<script>
    $(document).ready(function() {
        // Handle change event of the dropdown
        $('#residentVisaStatus').change(function() {
            // Check if the selected value is 'yes'
            if ($(this).val() === 'yes') {
                // Show the visa details section
                $('#visaDetails').show();
            } else {
                // Hide the visa details section
                $('#visaDetails').hide();
            }
        });
    });
</script>
