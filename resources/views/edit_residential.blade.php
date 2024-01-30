@extends('layouts.app')

@section('content')
    <main class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit & Update Residential Details
                                <a href="{{ url('emp_edit/' . $form->employee_id) }}"
                                    class="btn btn-danger float-start">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('update-residential/' . $form->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col">
                                    <label for="resident_visa_status">Is Resident Visa Applied:</label>
                                    <select name="resident_visa_status" class="form-control" id="residentVisaStatus">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="yes" <?php if ($form->resident_visa_status == 'yes') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Yes</option>
                                        <option value="no" <?php if ($form->resident_visa_status == 'no') {
                                            echo 'selected';
                                        } else {
                                        } ?>>No</option>
                                    </select>
                                </div>
                                <br />
                                {{-- <div id="visaDetails" style="display: none;"> --}}

                                    <div class="col">
                                        <label>Visa Status <span class="required">*</span></label>
                                        <select name="visa_status" class="form-control">
                                            <option value="" disabled selected>--Select Visa Status--</option>
                                            <option value="Under Process" <?php if ($form->visa_status == 'Under Process') {
                                                echo 'selected';
                                            } else {
                                            } ?>>Under Process</option>
                                            <option value="Received" <?php if ($form->visa_status == 'Received') {
                                                echo 'selected';
                                            } else {
                                            } ?>>Received</option>
                                        </select>
                                    </div>
                                    <br />
                                    <div class="col">
                                        <label>Sponsor Name<span class="required">*</span></label>
                                        <input type="text" name="sponsor_name" class="form-control"
                                            placeholder="Sponsor Name" required value="{{$form->sponsor_name}}">
                                    </div>
                                    <br />
                                    <div class="col">
                                        <label for="visa_num">Visa No <span class="required">*</span></label>
                                        <input type="text" name="visa_num" class="form-control" placeholder="Visa No"
                                            required value="{{$form->visa_num}}">
                                    </div>
                                    <br />
                                    <div class="col">
                                        <label for="visa_start_date">Start Date <span class="required">*</span></label>
                                        <input type="date" name="visa_start_date" class="form-control"
                                            placeholder="Start Date" required value="{{$form->visa_start_date}}">
                                    </div>
                                    <br />
                                    <div class="col">
                                        <label for="visa_end_date">End Date <span class="required">*</span></label>
                                        <input type="date" name="visa_end_date" class="form-control"
                                            placeholder="End Date" required value="{{$form->visa_end_date}}">
                                    </div>
                                    <br />

                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                                    <br />
                                {{-- </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
{{-- 
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
</script> --}}
