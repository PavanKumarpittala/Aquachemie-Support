@if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 2)
    <!-- +Add Attachements Button --> 
    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#addattachementLabel">
        +Add Attachements
    </button>

    <!-----------------------ATTACHEMENTS MODAL ------------------------------------------------- -->
    <div class="modal fade" id="addattachementLabel" tabindex="-1" role="dialog" aria-labelledby="addattachementLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addattachementLabel">Attachement DetaiEls</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container mt-4">
                    <form action="{{ route('emp_attachements_info/post') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="attachement_type">Type <span class="required">*</span></label>
                            <select name="attachement_type" class="form-control" id="attachement_type">
                                <option value="" disabled selected>--Select Type--</option>
                                <option value="passport">Passport</option>
                                <option value="ID">ID</option>
                                <option value="visa">Visa</option>
                                <option value="certificates">Certificates</option>
                                <option value="offerletter">Offer Letter</option>
                                <option value="CV">CV</option>
                                <option value="PassportSizePhoto">Passport Size Photo</option>
                                <option value="JoiningForm">Joining Form</option>
                                <option value="AssetForm">Asset Form</option>
                                <option value="Medical Insurance">Medical Insurance</option>                               
                                <option value="Others">Others</option>
                            
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="certificates">Certificates (PDF/DOC/DOCX): <span
                                    class="required">*</span></label>
                            <input type="file" name="certificates" class="form-control" id="certificates" required>
                        </div>

                        <div class="mb-3">
                            <label for="remark">Remark <span class="required">*</span></label>
                            <input type="text" name="remark" class="form-control" id="remark"
                                placeholder="Remark" required>
                        </div>

                        <div class="mb-3">
                            <label for="expiry_date">Expiray Date <span class="required">*</span></label>
                            <input type="date" name="expiry_date" class="form-control" id="expiry_date"
                                placeholder="expiry_date" required>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="emp_id" value="{{ $emp_id }}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <br />
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>ATTACHEMENT DETAILS</h4>
            </div>
            <div class="card-body">
                <table class="table" id="attachement-emp-datatable">
                    @csrf
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Attachement Type</th>
                            <th>Certificates</th>
                            <th>Remarks</th>
                            <th>Expiry Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attachments as $data)
                            <tr>bv
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->attachement_type }}</td>
                                <td><a target="_blank" href="{{ asset('storage/' . $data->certificates) }}">View
                                        Attachment</a> </td>
                                <td>{{ $data->remark }}</td>
                                <td>{{ $data->expiry_date }}</td>
                                <td>
                                    <a href="{{url('edit-attachements/'.$data->id )}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('delete-attachements/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#attachement-emp-datatable').DataTable();
        });
    </script>
@endpush
