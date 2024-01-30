
@php
    if (Auth::user()->role == 3  || Auth::user()->role == 2) {
        $readonly = 'readonly';
    } else {
        $readonly = '';
    }
@endphp

<div class="container mt-4">
    <div class="border rounded p-4">
        <h4 class="text-center mb-4">SALARY STRUCTURE</h4>
        <hr />
        <form method="POST" action="{{ route('emp_salary_info/post') }}">
            @csrf
            @method('post')
            <div class="row mb-3">
                <div class="col-6">
                    <label>Currency <span class="required">*</span></label>
                    <input type="text" {{ $readonly }} name="currency" class="form-control" placeholder="Currency"
                        aria-labelledby="currency" required value="{{ $salary->currency ?? '' }}">
                </div>
                <div class="col-6">
                    <label>Basic Salary <span class="required">*</span></label>
                    <input type="number" {{ $readonly }} name="basic_salary" class="form-control"
                        placeholder="Basic Salary" aria-label="Basic Salary" required
                        value="{{ $salary->basic_salary ?? '' }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label>Housing <span class="required">*</span></label>
                    <input type="number" {{ $readonly }} name="housing" class="form-control" placeholder="Housing"
                        required value="{{ $salary->housing ?? '' }}">
                </div>
                <div class="col-6">
                    <label>Transportation <span class="required">*</span></label>
                    <input type="number" {{ $readonly }} name="transportation" class="form-control"
                        placeholder="Transportation" required value="{{ $salary->transportation ?? '' }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label>Accommodation <span class="required">*</span></label>
                    <input type="number" {{ $readonly }} name="accommodation" class="form-control"
                        placeholder="Accommodation" required value="{{ $salary->accommodation ?? '' }}">
                </div>

                <div class="col-6">
                    <label>Other Allowance <span class="required">*</span></label>
                    <input type="number" {{ $readonly }} name="other_allowance" class="form-control"
                        placeholder="Other Allowance" required value="{{ $salary->other_allowance ?? '' }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label>Gross Salary <span class="required">*</span></label>
                    <input type="number" {{ $readonly }} name="gross_salary" class="form-control"
                        placeholder="Gross Salary" required value="{{ $salary->gross_salary ?? '' }}">
                </div>
            </div>
            @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                <div class="text-center">
                    <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                    <button type="submit" class="btn btn-success" name="button">Submit</button>
                </div>
            @endif
        </form>
    </div>
</div>
