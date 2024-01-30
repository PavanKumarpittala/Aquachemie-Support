
<div class="container mt-4">

    {{-- -------------------------Check if the user's role is 5 ---------------------------- --}}
    <div class="card">
        <div class="card-header text-center">
            <h4>PERSONAL INFORMATION</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('emp_personal_info/post') }}">
                @csrf
                @method('post')
                {{-- @if ($personal = $personal->first()) --}}

                <div class="row">
                    <div class="col-6">
                        <label>Gender <span class="required">*</span></label>
                        @if (isset($personal->gender))
                            <select name="gender" class="form-control">
                                <option value="" selected>--Select gender--</option>
                                <option value="Male"{{ $personal->gender === 'Male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="Female" {{ $personal->gender === 'Female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        @else
                            <select name="gender" class="form-control">
                                <option value="" selected>--Select gender--</option>
                                <option value="Male">Male
                                </option>
                                <option value="Female">Female
                                </option>
                            </select>
                        @endif
                    </div>
                    <div class="col-6">
                        <label>Date of Birth <span class="required">*</span></label>
                        <input type="date" name="date_of_birth" class="form-control" placeholder="Date Of Birth"
                            required value="{{ $personal->date_of_birth ?? '' }}">
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-6">
                        <label>Place Of Birth <span class="required">*</span></label>
                        <input type="text" name="place_of_birth" class="form-control" placeholder="Place Of Birth"
                            required value="{{ $personal->place_of_birth ?? '' }}">
                    </div>
                    
                    <div class="col-6">
                        <label>Country Of Birth <span class="required">*</span></label>
                        <select name="country_of_birth" class="form-control" required>
                            <option value="" disabled selected>-- Select Country --</option>
                            @foreach($countries as $countryId => $countryName)
                            <option value="{{ $countryId }}" {{ isset($personal->country_of_birth) && $personal->country_of_birth == $countryId ? 'selected' : '' }}>
                                {{ $countryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <br />
                <div class="row">
                    <div class="col-6">
                        <label>Citizenship <span class="required">*</span></label>
                        <select name="citizenship" class="form-control" required>
                            <option value="" disabled selected>-- Select Citizenship --</option>
                            @foreach($countries as $countryId => $countryName)
                                <option value="{{ $countryId }}" {{ isset($personal->citizenship) && $personal->citizenship == $countryId ? 'selected' : '' }}>
                                    {{ $countryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label>Marital Status <span class="required">*</span></label>
                        @if (isset($personal->marital_status))
                            <select name="marital_status" class="form-control">
                                <option value="" selected>--Select gender--</option>
                                <option value="Married" {{ $personal->marital_status === 'Married' ? 'selected' : '' }}>
                                    Married</option>
                                <option value="Single" {{ $personal->marital_status === 'Single' ? 'selected' : '' }}>
                                    Single</option>
                                <option value="Divorced"
                                    {{ $personal->marital_status === 'Divorced' ? 'selected' : '' }}>
                                    Divorced</option>
                            </select>
                        @else
                            <select name="marital_status" class="form-control">
                                <option value="" selected>--Select gender--</option>
                                <option value="Married">
                                    Married</option>
                                <option value="Single">
                                    Single</option>
                                <option value="Divorced">
                                    Divorced</option>
                            </select>
                        @endif
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-6">
                        <label>Number Of Children <span class="required">*</span></label>
                        <input type="number" name="number_of_children" class="form-control"
                            placeholder="Number Of Children" required
                            value="{{ $personal->number_of_children ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label>Passport No <span class="required">*</span></label>
                        <input type="text" name="passport_num" class="form-control" placeholder="Passport Number"
                            required value="{{ $personal->passport_num ?? '' }}">
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-6">
                        <label>Passport Issue Date <span class="required">*</span></label>
                        <input type="date" name="passport_issue_date" class="form-control"
                            placeholder="Passport Issue Date" required
                            value="{{ $personal->passport_issue_date ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label>Passport Expiry Date <span class="required">*</span></label>
                        <input type="date" name="passport_expiry_date" class="form-control"
                            placeholder="Passport Expiry Date" required
                            value="{{ $personal->passport_expiry_date ?? '' }}">
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-6">
                        <label>Country Of Issue <span class="required">*</span></label>
                        <select name="country_of_issue" class="form-control" required>
                            <option value="" disabled selected>-- Select Country --</option>
                            @foreach($countries as $countryId => $countryName)
                                <option value="{{ $countryId }}" {{ isset($personal->country_of_issue) && $personal->country_of_issue == $countryId ? 'selected' : '' }}>
                                    {{ $countryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Place Of Issue <span class="required">*</span></label>
                        <input type="text" name="place_of_issue" class="form-control"
                            placeholder="Place Of Issue" required value="{{ $personal->place_of_issue ?? '' }}">
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-6">
                        <label>Personal Mobile NO <span class="required">*</span></label>
                        <input type="number" name="personal_mobile_num" class="form-control"
                            placeholder="Personal Mobile NO" required
                            value="{{ $personal->personal_mobile_num ?? '' }}">
                    </div>
                    <div class="col-6">
                        <label>WhatsApp No <span class="required">*</span></label>
                        <input type="number" name="whatsapp_num" class="form-control" placeholder="WhatsApp No"
                            required value="{{ $personal->whatsapp_num ?? '' }}">
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-6">
                        <label>Persoanl Mail ID <span class="required">*</span></label>
                        <input type="text" name="personal_email_id" class="form-control"
                            placeholder="Persoanl Mail ID" required value="{{ $personal->personal_email_id ?? '' }}">
                    </div>
                </div>
                <br />

                <h4>EMERENCY CONTACT DETAILS:</h4>
                <hr />

                <div class="row">
                    <div class="col-6">
                        <label>Contact Name<span class="required">*</span></label>
                        <input type="text" name="contact_name" class="form-control" placeholder="Contact Name"
                            required value="{{ $personal->contact_name ?? '' }}">
                    </div>

                    <div class="col-6">
                        <label>Relation<span class="required">*</span></label>
                        <input type="text" name="relation" class="form-control" placeholder="Relation Name"
                            required value="{{ $personal->relation ?? '' }}">
                    </div>
                </div>
<br />
                <div class="row">
                    <div class="col-6">
                        <label>Mobile No<span class="required">*</span></label>
                        <input type="number" name="mobile_no" class="form-control" placeholder="Mobile Number"
                            required value="{{ $personal->mobile_no ?? '' }}">
                    </div>

                    <div class="col-6">
                        <label>Email Id<span class="required">*</span></label>
                        <input type="text" name="email_id" class="form-control" placeholder="Email id"
                            required value="{{ $personal->email_id ?? '' }}">
                    </div>
                </div>
<br />
                <div class="text-center">
                    <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                    <button type="submit" class="btn btn-success" name="button">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
