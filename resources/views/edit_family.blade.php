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
                            <h4>Edit & Update Family Details
                                <a href="{{ url('emp_edit/' . $data->employee_id) }}"
                                    class="btn btn-danger float-start">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('update-family/' . $data->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" require
                                        value="{{ $data->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="relation">Relation</label>
                                    <select name="relation" id="relation" class="form-control">
                                        <option value="" disabled selected>Select Relation</option>

                                        <option value="Father" <?php if ($data->relation == 'Father') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Father</option>
                                        <option value="Mother" <?php if ($data->relation == 'Mother') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Mother</option>
                                        <option value="Brother" <?php if ($data->relation == 'Brother') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Brother</option>
                                        <option value="Sister" <?php if ($data->relation == 'Sister') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Sister</option>
                                        <option value="Husband" <?php if ($data->relation == 'Husband') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Husband</option>
                                        <option value="Wife" <?php if ($data->relation == 'Wife') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Wife</option>
                                        <!-- <option value="Web">Web</option> -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male" <?php if ($data->gender == 'Male') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Male</option>
                                        <option value="Female" <?php if ($data->gender == 'Female') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Date Of Birth <span class="required">*</span></label>
                                    <input type="date" name="date_of_birth" class="form-control"
                                        placeholder="Date Of Birth" required value="{{ $data->date_of_birth }}">
                                </div>

                                <div class="form-group">
                                    <label>Place Of Birth <span class="required">*</span></label>
                                    <input type="text" name="place_of_birth" class="form-control"
                                        placeholder="Place Of Birth" required value="{{ $data->place_of_birth }}">
                                </div>

                                <div class="form-group">
                                    <label>Citizenship <span class="required">*</span></label>
                                    <input type="text" name="citizenship" class="form-control" placeholder="Citizenship"
                                        required value="{{ $data->citizenship }}">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number <span class="required">*</span></label>
                                    <input type="number" name="mobile_number" class="form-control"
                                        placeholder="Mobile Number" required value="{{ $data->mobile_number }}">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
