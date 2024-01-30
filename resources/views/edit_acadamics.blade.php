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
                            <h4>Edit & Update Acadamic
                                <a href="{{ url('emp_edit/' . $data->employee_id) }}"
                                    class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('update-acadamics/'.$data->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <div class="col">
                                        <label>From Year <span class="required">*</span></label>
                                        <input type="text" name="from_year" class="form-control" placeholder="From Year"
                                            aria-labelledby="From Year" required value="{{$data->from_year}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label>To Year <span class="required">*</span></label>
                                        <input type="text" name="to_year" class="form-control" placeholder="To Year"
                                            aria-labelledby="To Year" required value="{{$data->to_year}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label>Board / University <span class="required">*</span></label>
                                        <input type="text" name="board_university" class="form-control"
                                            placeholder="Board / University" aria-labelledby="University" required value="{{$data->board_university}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label>Instuite Name <span class="required">*</span></label>
                                        <input type="text" name="institute_name" class="form-control"
                                            placeholder="Institute Name" aria-labelledby="Institute name" required value="{{$data->institute_name}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label>Education Type <span class="required">*</span></label>
                                        <input type="text" name="education_type" class="form-control"
                                            placeholder="Education Type" aria-labelledby="Education Type" required value="{{$data->education_type}}">
                                    </div>
                                </div>
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
