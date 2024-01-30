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
                            <h4>Edit & Update Attachemets
                                <a href="{{ url('emp_edit/' . $data->employee_id) }}"
                                    class="btn btn-danger float-start">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('update-attachements/' . $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="attachement_type">Type:</label>
                                    <select name="attachement_type" id="attachement_type" class="form-control">
                                        <option value="" disabled selected>----Select Type---</option>

                                        <option value="passport" <?php if ($data->attachement_type == 'passport') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Passport</option>
                                        <option value="ID" <?php if ($data->attachement_type == 'ID') {
                                            echo 'selected';
                                        } else {
                                        } ?>>ID</option>
                                        <option value="visa" <?php if ($data->attachement_type == 'visa') {
                                            echo 'selected';
                                        } else {
                                        } ?>>Visa</option>
                                        <option value="certificates" <?php if ($data->attachement_type == 'certificates') {
                                            echo 'selected';
                                        } else {
                                        } ?>>certificates</option>
                                        <option value="offerletter" <?php if ($data->attachement_type == 'offerletter') {
                                            echo 'selected';
                                        } else {
                                        } ?>>offerletter</option>
                                        <option value="CV" <?php if ($data->attachement_type == 'CV') {
                                            echo'selected';
                                        } else {
                                        }?>>CV</option>
                                        <option value="PassportSizePhoto" <?php if ($data->attachement_type == 'PassportSizePhoto') {
                                            echo'selected';
                                        } else {
                                        }?>>Passport Size Photo</option>
                                        <option value="JoiningForm" <?php if ($data->attachement_type == 'JoiningForm') {
                                            echo'selected';
                                        } else {
                                        }?>>Joining Form</option>
                                        <option value="AssetForm" <?php if ($data->attachement_type == 'AssetForm') {
                                            echo'selected';
                                        } else {
                                        }?>>Asset Form</option>
                                        <option value="Medical Insurance" <?php if ($data->attachement_type == 'Medical Insurance') {
                                            echo'selected';
                                        } else {
                                        }?>>Medical Insurance</option>
                                    

                                        <!-- <option value="Web">Web</option> -->
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="certificates">Certificates (PDF/DOC/DOCX): <span
                                            class="required">*</span></label>
                                    <input type="file" name="certificates" class="form-control" id="certificates"
                                        required value="{{ $data->certificates }}">
                                    <br />
                                    {{-- <button type="button" class="btn btn-secondary btn-lg" onclick="viewAttachment()">View Attachment</button> --}}
                                    <span>
                                        <a target="_blank" href="{{ asset('storage/' . $data->certificates) }}">View
                                            Attachment</a>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label for="remark">Remark <span class="required">*</span></label>
                                    <input type="text" name="remark" class="form-control" id="remark"
                                        placeholder="Remark" required value="{{ $data->remark }}">
                                </div>

                                <div class="mb-3">
                                    <label for="expiry_date">Expiray Date <span class="required">*</span></label>
                                    <input type="date" name="expiry_date" class="form-control" id="expiry_date"
                                        placeholder="expiry_date" required value="{{ $data->expiry_date }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Update Attachements</button>
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
<script>
    function viewAttachment() {
        // Get the path to the attachment
        var attachmentPath = "{{ asset('storage/' . $data->certificates) }}";

        // Open the attachment in a new tab or window
        window.open(attachmentPath, '_blank');
    }
</script>
