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
                            <h4>Edit & Update Previous Details
                                <a href="{{ url('emp_edit/' . $data->employee_id) }}"
                                    class="btn btn-danger float-start">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('update-previous/'.$data->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Company <span class="required">*</span></label>
                                    <input type="text" name="company" class="form-control" placeholder="Company" required value="{{$data->company}}">
                                </div>
        
                                <div class="form-group">
                                    <label>Date From <span class="required">*</span></label>
                                    <input type="date" name="date_from" class="form-control" placeholder="Date From"
                                        required value="{{$data->date_from}}">
                                </div>
        
                                <div class="form-group">
                                    <label>Date TO <span class="required">*</span></label>
                                    <input type="date" name="date_to" class="form-control" placeholder="Date To" required value="{{$data->date_to}}">
                                </div>
        
                                <div class="form-group">
                                    <label>Employer <span class="required">*</span></label>
                                    <input type="text" name="employeer" class="form-control" placeholder="Employer" required value="{{$data->employeer}}">
                                </div>
        
                                <div class="form-group">
                                    <label>Position <span class="required">*</span></label>
                                    <input type="text" name="position" class="form-control" placeholder="Position" required value="{{$data->position}}">
                                </div>
        
                                <div class="form-group">
                                    <label>Remark <span class="required">*</span></label>
                                    <input type="text" name="remark" class="form-control" placeholder="Remark" required value="{{$data->remark}}">
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
