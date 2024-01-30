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
               <h4>EMPLOYEE HR INFORMATION </h4>
               {{-- {{ $emp_id }} --}}
           </div>
           <div class="card-body">
               <form method="POST" action="{{ route('emp_hr_info/post') }}">
                   @csrf
                   @method('post')
                   <div class="row">
                       <div class="col-6">
                           <label>Starting Date <span class="required">*</span></label>
                           <input type="date" {{ $readonly }} name="starting_date" class="form-control"
                               aria-label="Starting Date" required aria-label="Starting Date"
                               value="{{ $hrinformation->starting_date ?? '' }}">
                       </div>
                       <div class="col-6">
                           <label>Is Offer Letter Issued:</label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="offer_letter_status" class="form-control">
                                   <option value="" disabled selected>--Select Offer Letter Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->offer_letter_status) && $hrinformation->offer_letter_status === 'yes' ? 'selected' : '' }}>
                                       Yes
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->offer_letter_status) && $hrinformation->offer_letter_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="offer_letter_status" class="form-control" disabled>
                                   <option value="" disabled selected>--Select offer letter Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->offer_letter_status) && $hrinformation->offer_letter_status === 'yes' ? 'selected' : '' }}>
                                       Yes
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->offer_letter_status) && $hrinformation->offer_letter_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @endif
                       </div>

                   </div><br />

                   <div class="row">
                       <div class="col-6">
                           <label>Entry Permit Visa Applied:</label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="permit_visa_status" class="form-control">
                                   <option value="" disabled selected>--Select permit visa Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->permit_visa_status) && $hrinformation->permit_visa_status === 'yes' ? 'selected' : '' }}>
                                       YES
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->permit_visa_status) && $hrinformation->permit_visa_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="permit_visa_status" class="form-control" disabled>
                                   <option value="" disabled selected>--Select Permit Visa Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->permit_visa_status) && $hrinformation->permit_visa_status === 'yes' ? 'selected' : '' }}>
                                       YES
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->permit_visa_status) && $hrinformation->permit_visa_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @endif
                       </div>
                       <div class="col-6">
                           <label>Air Tickets Booked:</label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="air_ticket_status" class="form-control">
                                   <option value="" disabled selected>--Select Air Ticket Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->air_ticket_status) && $hrinformation->air_ticket_status === 'yes' ? 'selected' : '' }}>
                                       YES
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->air_ticket_status) && $hrinformation->air_ticket_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="air_ticket_status" class="form-control" disabled>
                                   <option value="" disabled selected>--Select Air Ticket Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->air_ticket_status) && $hrinformation->air_ticket_status === 'yes' ? 'selected' : '' }}>
                                       YES
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->air_ticket_status) && $hrinformation->air_ticket_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @endif
                       </div>
                   </div>
                   <br />

                   <div class="row">
                       <div class="col-6">
                           <label>Working Days:</label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="working_days" class="form-control">
                                   <option value="" disabled selected>--Working Days--</option>
                                   <option value="10"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '10' ? 'selected' : '' }}>
                                       10
                                   </option>
                                   <option value="15"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '15' ? 'selected' : '' }}>
                                       15
                                   </option>
                                   <option value="20"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '20' ? 'selected' : '' }}>
                                       20
                                   </option>
                                   <option value="25"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '25' ? 'selected' : '' }}>
                                       25
                                   </option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="working_days" class="form-control" disabled>
                                   <option value="working_days" disabled selected>--working Days--</option>
                                   <option value="10"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '10' ? 'selected' : '' }}>
                                       10
                                   </option>
                                   <option value="15"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '15' ? 'selected' : '' }}>
                                       15
                                   </option>
                                   <option value="20"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '20' ? 'selected' : '' }}>
                                       20
                                   </option>
                                   <option value="25"
                                       {{ isset($hrinformation->working_days) && $hrinformation->working_days === '25' ? 'selected' : '' }}>
                                       25
                                   </option>
                               </select>
                           @endif
                       </div>
                       <div class="col-6">
                           <label>Shift Information</label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="shift_information" class="form-control">
                                   <option value="" disabled selected>--Select Shift Information--</option>
                                   <option value="Morning Shift"
                                       {{ isset($hrinformation->shift_information) && $hrinformation->shift_information === 'Morning Shift' ? 'selected' : '' }}>
                                       Morning Shift
                                   </option>
                                   <option value="Afternoon Shift"
                                       {{ isset($hrinformation->shift_information) && $hrinformation->shift_information === 'Afternoon Shift' ? 'selected' : '' }}>
                                       Afternoon Shift
                                   </option>
                                   <option value="Night Shift"
                                       {{ isset($hrinformation->shift_information) && $hrinformation->shift_information === 'Night Shift' ? 'selected' : '' }}>
                                       Night Shift
                                   </option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="shift_information" class="form-control" disabled>
                                   <option value="" disabled selected>--Shift Information--</option>
                                   <option value="Morning Shift"
                                       {{ isset($hrinformation->shift_information) && $hrinformation->shift_information === 'Morning Shift' ? 'selected' : '' }}>
                                       Morning Shift
                                   </option>
                                   <option value="Afternoon Shift"
                                       {{ isset($hrinformation->shift_information) && $hrinformation->shift_information === 'Afternoon Shift' ? 'selected' : '' }}>
                                       Afternoon Shift
                                   </option>
                                   <option value="Night Shift"
                                       {{ isset($hrinformation->shift_information) && $hrinformation->shift_information === 'Night Shift' ? 'selected' : '' }}>
                                       Night Shift
                                   </option>
                               </select>
                           @endif
                       </div>
                   </div>
                   <br />

                   <br />

                   <p>
                   <h4>RESIDENTS ID INFO:</h4>
                   </p>
                   <hr />

                   <div class="row">
                       <div class="col-6">
                           <label>Residence ID Applied:</label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="emirate_id_status" class="form-control">
                                   <option value="" disabled selected>--Select Residence Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->emirate_id_status) && $hrinformation->emirate_id_status === 'yes' ? 'selected' : '' }}>
                                       YES
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->emirate_id_status) && $hrinformation->emirate_id_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="emirate_id_status" class="form-control" disabled>
                                   <option value="" disabled selected>--Select Residence Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->emirate_id_status) && $hrinformation->emirate_id_status === 'yes' ? 'selected' : '' }}>
                                       YES
                                   </option>
                                   <option value="no"
                                       {{ isset($hrinformation->emirate_id_status) && $hrinformation->emirate_id_status === 'no' ? 'selected' : '' }}>
                                       NO
                                   </option>
                               </select>
                           @endif
                       </div>


                       <div class="col-6">
                           <label>Visa Type <span class="required">*</span></label>
                           <input type="text" {{ $readonly }} name="vissa_type" class="form-control"
                               placeholder="Visa Type" required value="{{ $hrinformation->vissa_type ?? '' }}">
                       </div>

                   </div>
                   <br />
                   <div class="row">
                       <div class="col-6">
                           <label>Residence ID No <span class="required">*</span></label>
                           <input type="text" {{ $readonly }} name="emirate_id_num" class="form-control"
                               placeholder="Emirates ID No" required
                               value="{{ $hrinformation->emirate_id_num ?? '' }}">
                       </div>

                       <div class="col-6">
                           <label>Start Date <span class="required">*</span></label>
                           <input type="date" {{ $readonly }} name="emirate_start_date" class="form-control"
                               placeholder="Start Date" required
                               value="{{ $hrinformation->emirate_start_date ?? '' }}">
                       </div>
                   </div>
                   <br />
                   <div class="row">
                       <div class="col-6">
                           <label>End Date <span class="required">*</span></label>
                           <input type="date" {{ $readonly }} name="emirate_end_date" class="form-control"
                               placeholder="End Date" required value="{{ $hrinformation->emirate_end_date ?? '' }}">
                       </div>
                       <div class="col-6">
                           <label>Residence ID Status <span class="required">*</span></label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="residence_status" class="form-control">
                                   <option value="" disabled selected>--Select Visa Status--</option>
                                   <option value="Under Process"
                                       {{ isset($hrinformation->residence_status) && $hrinformation->residence_status === 'Under Process' ? 'selected' : '' }}>
                                       Under Process
                                   </option>
                                   <option value="Received"
                                       {{ isset($hrinformation->residence_status) && $hrinformation->residence_status === 'Received' ? 'selected' : '' }}>
                                       Received
                                   </option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="residence_status" class="form-control" disabled>
                                   <option value="" disabled selected>--Select residence status Status--</option>
                                   <option value="Under Process"
                                       {{ isset($hrinformation->residence_status) && $hrinformation->residence_status === 'Under Process' ? 'selected' : '' }}>
                                       Under Process
                                   </option>
                                   <option value="Received"
                                       {{ isset($hrinformation->residence_status) && $hrinformation->residence_status === 'Received' ? 'selected' : '' }}>
                                       Received
                                   </option>
                               </select>
                           @endif
                       </div>

                   </div>
                   <br />
                   <hr />
                   <div class="row">
                       <div class="col-6">
                           <label class="">SAP Access:</label>
                           @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                               <select name="sap_access" class="form-control">
                                   <option value="" selected>--Select Sap Access Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->sap_access) && $hrinformation->sap_access === 'yes' ? 'selected' : '' }}>
                                       YES</option>
                                   <option value="no"
                                       {{ isset($hrinformation->sap_access) && $hrinformation->sap_access === 'no' ? 'selected' : '' }}>
                                       NO</option>
                               </select>
                           @elseif (Auth::user()->role == 3 || Auth::user()->role == 2)
                               <select name="sap_access" class="form-control" disabled>
                                   <option value="" selected>--Select Sap Access Status--</option>
                                   <option value="yes"
                                       {{ isset($hrinformation->sap_access) && $hrinformation->sap_access === 'yes' ? 'selected' : '' }}>
                                       YES</option>
                                   <option value="no"
                                       {{ isset($hrinformation->sap_access) && $hrinformation->sap_access === 'no' ? 'selected' : '' }}>
                                       NO</option>
                               </select>
                           @endif
                       </div>
                       <div class="col-6">
                           <label>SAP User ID <span class="required">*</span></label>
                           <input type="text" {{ $readonly }} name="sap_user_id" class="form-control"
                               placeholder="SAP User ID" required value="{{ $hrinformation->sap_user_id ?? '' }}">
                       </div>
                   </div> <br />

                   <div class="row">
                       <div class="col-6">
                           <label>Office Phone <span class="required">*</span></label>
                           <input type="text" {{ $readonly }} name="sap_office_phone" class="form-control"
                               placeholder="Office Phone" required
                               value="{{ $hrinformation->sap_office_phone ?? '' }}">
                       </div>
                       <div class="col-6">
                           <label>Extension No <span class="required">*</span></label>
                           <input type="text" {{ $readonly }} name="sap_extension_num" class="form-control"
                               placeholder="Extension No" required
                               value="{{ $hrinformation->sap_extension_num ?? '' }}">
                       </div>
                   </div><br />

                   <div class="row">
                       <div class="col-6">
                           <label>Office Mobile No <span class="required">*</span></label>
                           <input type="text" {{ $readonly }} name="sap_office_mobile" class="form-control"
                               placeholder="Office Mobile No" required
                               value="{{ $hrinformation->sap_office_mobile ?? '' }}">
                       </div>
                       <div class="col-6">
                        <label>Official Mail ID <span class="required">*</span></label>
                        <input type="text" {{ $readonly }} name="official_mail_id" class="form-control"
                            placeholder="Official Mail ID" required
                            value="{{ $hrinformation->official_mail_id ?? '' }}">
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
