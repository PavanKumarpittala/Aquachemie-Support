@php
    if (Auth::user()->role == 3 || Auth::user()->role == 2) {
        $readonly = 'readonly';
    } else {
        $readonly = '';
    }
@endphp

<div class="container mt-3">
    <div class="card">
        <div class="card-header text-center">
            <h4>EMPLOYEE  BASIC  INFORMATION</h4>
        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('emp_basic_info/post') }}">
                @csrf
                @method('post')

                <div class="row">
                    <div class="col-6">
                        <label>First Name <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} id="first_name" name="first_name" class="form-control"
                            placeholder="First Name" required value="{{ $user->first_name ?? '' }}"
                            oninput="updateFullName()">
                    </div>
                    <div class="col-6">
                        <label>Last Name <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} id="last_name" name="last_name" class="form-control"
                            placeholder="Last Name" required value="{{ $user->last_name ?? '' }}"
                            oninput="updateFullName()">
                    </div>
                </div><br />
                <div class="row">
                    <div class="col-6">
                        <label>Employee Full Name <span class="required">*</span></label>
                        <input type="text" id="employee_full_name" name="name" class="form-control" placeholder="Employee Full Name"
                            required value="{{ $user->name ?? '' }}" readonly>
                    </div>
                    <div class="col-6">
                        <label>Department <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="department" class="form-control"
                            placeholder="Department" required value="{{ $user->department ?? '' }}">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col-6">
                        <label>Reporting To <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="reporting_to" class="form-control"
                            placeholder="Reporting To" required value="{{ $user->reporting_to ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label>Designation <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="designation" class="form-control"
                            placeholder="Designation" required value="{{ $user->designation ?? '' }}">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col-6">
                        <label>Region <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="region" class="form-control"
                            placeholder="Region" required value="{{ $user->region ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label>Head Quarter <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="head_quarter" class="form-control"
                            placeholder="Head Quarter" required value="{{ $user->head_quarter ?? '' }}">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col-6">
                        <label>Joining Date <span class="required">*</span></label>
                        <input type="date" {{ $readonly }} name="joining_date" class="form-control"
                            placeholder="Joining Date" required value="{{ $user->joining_date ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label>Employeer <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="employeer" class="form-control"
                            placeholder="Employeer" required value="{{ $user->employeer ?? '' }}">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col-6">
                        <label>Personal Email Id <span class="required">*</span></label>
                        <input type="email" {{ $readonly }} name="email" class="form-control"
                            placeholder="Email Id" required value="{{ $user->email ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label>Employee Id <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="employee_id" class="form-control"
                            placeholder="Employee Id" required value="{{ $user->employee_id ?? '' }}">
                    </div>
                </div><br />

                {{-- <div class="row">
                    <div class="col-6">
                        <label for="employee_role" class="required">Employee Role:</label>
                        <select {{ $readonly }} name="employee_role" id="employee_role" class="form-control">
                             <option value="" disabled selected>Select Employee Role</option>
                             <option {{ $user->role== 1 ? 'selected' : null }} value="1">Admin</option>
                             <option {{ $user->role== 3 ? 'selected' : null }} value="3">Employee</option>
                             <option {{ $user->role== 5 ? 'selected' : null }} value="5">HR</option>
                        </select>
                    </div>
                </div><br /> --}}

                <div class="row">
                    <div class="col-6">
                        <label for="employee_role" class="required">Employee Role:</label>
                        <select {{ $readonly }} name="employee_role" id="employee_role" class="form-control" {{ $user->role == 3 || $user->role == 2 ? 'disabled' : '' }}>
                            <option value="" disabled selected>Select Employee Role</option>
                            <option {{ $user->role == 1 ? 'selected' : null }} value="1">Admin</option>
                            <option {{ $user->role == 3 ? 'selected' : null }} value="3">Employee</option>
                            <option {{ $user->role == 5 ? 'selected' : null }} value="5">HR</option>
                            <option {{ $user->role == 2 ? 'selected' : null }} value="5">IT</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label>Blood Group<span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="employee_blood_group" class="form-control"
                            placeholder="Blood Group" required value="{{ $user->employee_blood_group ?? '' }}">
                    </div>
                </div>
                <br />
                

                @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                    <div class="text-center">
                        <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                        <button type="submit" class="btn btn-success" name="button">Submit</button>
                    </div>
                @endif
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTab a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    });
</script>
<script>
    function updateFullName() {
        var firstName = document.getElementById('first_name').value;
        var lastName = document.getElementById('last_name').value;
        var fullName = firstName + ' ' + lastName;

        // Set the value of the 'name' input field to the calculated full name
        document.getElementById('employee_full_name').value = fullName;
    }
</script>
