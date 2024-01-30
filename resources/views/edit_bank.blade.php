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
                            <h4>Edit & Update Bank
                                <a href="{{ url('emp_edit/' . $data->employee_id) }}"
                                    class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('update-bank/' . $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6">
                                        <label>Bank Name <span class="required">*</span></label>
                                        <input type="text" name="bank_name" class="form-control" placeholder="Bank Name"
                                            required value="{{ $data->bank_name }}">
                                    </div>
                                    <div class="col-6">
                                        <label>Account Name <span class="required">*</span></label>
                                        <input type="text" name="account_name" class="form-control"
                                            placeholder="Account Name" required value="{{ $data->account_name }}">
                                    </div>
                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-6">
                                        <label>IBAN NO <span class="required">*</span></label>
                                        <input type="text" name="iban_num" class="form-control" placeholder="IBAN NO"
                                            required value="{{ $data->iban_num }}">
                                    </div>
                                    <div class="col-6">
                                        <label>Branch Address <span class="required">*</span></label>
                                        <input type="text" name="branch_address" class="form-control"
                                            placeholder="Branch Addres" required value="{{ $data->branch_address }}">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-6">
                                        <label>IFSC Code <span class="required">*</span></label>
                                        <input type="text" name="ifsc_code" class="form-control" placeholder="IFSC Code"
                                            required value="{{ $data->ifsc_code }}">
                                    </div>

                                    <div class="col-6">
                                        <label>SWIFT Code <span class="required">*</span></label>
                                        <input type="text" name="swift_code" class="form-control"
                                            placeholder="SWIFT Code" required value="{{ $data->swift_code }}">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-6">
                                        <label>Country <span class="required">*</span></label>
                                        <input type="text" name="country" class="form-control" placeholder="Country"
                                            required value="{{ $data->country }}">
                                    </div>
                                </div>
                                <br />
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Update Bank</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
