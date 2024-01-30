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
                            <h4>Edit & Update Communication Details
                                <a href="{{ url('emp_edit/' . $data->employee_id) }}"
                                    class="btn btn-danger float-start">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('update-communication/' . $data->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <label>Address Type<span class="required">*</span></label>
                                        <select name="adress_type" class="form-control">
                                            <option value="" disabled selected>--Select Address For Communication--</option>
                                            <option value="communication address" <?php if ($data->adress_type == 'communication address'){
                                                    echo 'selected';
                                                } else {
                                                } ?>>Communication Address</option>
                                            <option value="Permanent address" <?php if ($data->adress_type == 'Permanent address'){
                                                    echo 'selected';
                                                } else {}?>>Permanent Address</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Building<span class="required">*</span></label>
                                        <input type="text" name="building" class="form-control" placeholder="Building"
                                            required value="{{ $data->building }}">
                                    </div>
                                </div><br />
                                <div class="row">
                                    <div class="col-6">
                                        <label>Street Name<span class="required">*</span></label>
                                        <input type="text" name="street_name" class="form-control"
                                            placeholder="Reporting To" required value="{{ $data->street_name }}">
                                    </div>

                                    <div class="col-6">
                                        <label>Street No<span class="required">*</span></label>
                                        <input type="text" name="street_no" class="form-control"
                                            placeholder="Street Number" required value="{{ $data->street_no }}">
                                    </div>
                                </div><br />

                                <div class="row">
                                    <div class="col-6">
                                        <label>City <span class="required">*</span></label>
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                            required value="{{ $data->city }}">
                                    </div>

                                    <div class="col-6">
                                        <label>Country <span class="required">*</span></label>
                                        <input type="text" name="country" class="form-control" placeholder="Country"
                                            required value="{{ $data->country }}">
                                    </div>
                                </div><br />

                                <div class="row">

                                    <div class="col-6">
                                        <label>State<span class="required">*</span></label>
                                        <input type="text" name="state" class="form-control" placeholder="State"
                                            required value="{{ $data->state }}">
                                    </div>

                                    <div class="col-6">
                                        <label>Zip Code / PO Box <span class="required">*</span></label>
                                        <input type="text" name="zip_code" class="form-control"
                                            placeholder="Zip Code / PO Box" required value="{{ $data->zip_code }}">
                                    </div>

                                </div><br />

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <br />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
