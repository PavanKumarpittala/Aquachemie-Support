<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.11.0/dist/css/bootstrap-datepicker.min.css">
    <title>AQUACHEMIE SUPPORT</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }} ">

  </head>
  <style>
    .required {
        color: red;
    }

    /* .card {
      border: 1px solid #ccc;
      padding: 20px;
    }

    /* Add some margin between form groups (fields) 
    .col-4 {
      margin-bottom: 10px;
    } */

</style>
  <body> 
    {{-- <div class="text-center">
        <h4 class="modal-title">Personal Information</h4>
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> 
      </div> --}}
      <div class="container mt-4">
      <div class="card">
        <div class="card-header text-center">
          <h4>Personal Information</h4>
      </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                        <label for="name">Gender <span class="required">*</span></label>
                        <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                </div>
                <div class="col-4">
                    <label for="name">Date of Birth <span class="required">*</span></label>
                    <input type="text"  name="dob" class="form-control" placeholder="Date Of Birth" required>
                </div>
            </div>   
<br />
        <div class="row">
              <div class="col-4">
                <label for="name">Place Of Birth <span class="required">*</span></label>
                <input type="text"  name="pob" class="form-control" placeholder="Place Of Birth" required>
            </div>
          <div class="col-4">
            <label for="name">Country Of Birth <span class="required">*</span></label>
            <input type="text" name="cob" class="form-control" placeholder="Country Of Birth" required>
          </div>
        </div>
<br />
           <div class="row">
                <div class="col-4">
                    <label for="name">Citizenship <span class="required">*</span></label>
                    <input type="text" name="citizenship" class="form-control" placeholder="Citizenship" required>
                </div>
              <div class="col-4">
                  <label for="name">Marital Status <span class="required">*</span></label>
                  <input type="text" name="maritalstatus" class="form-control" placeholder="Marital Status" required>
              </div>
          </div>
<br />
    <div class="row">
        <div class="col-4">
            <label for="name">Number Of Children <span class="required">*</span></label>
            <input type="text" name="noc" class="form-control" placeholder="Number Of Children" required>
        </div>
          <div class="col-4">
              <label for="name">Passport No <span class="required">*</span></label>
              <input type="text" name="passportNumber" class="form-control" placeholder="Passport Number" required>
          </div>
    </div>
<br />
                  <div class="row">
                        <div class="col-4">
                          <label for="name">Passport Issue Date <span class="required">*</span></label>
                          <input type="date" id="date" name="passportissuedate" class="form-control" placeholder="Passport Issue Date" required>
                        </div>
                        <div class="col-4">
                              <label for="name">Passport Expiry Date <span class="required">*</span></label>
                              <input type="date" id="date"  name="passportexpirydate" class="form-control" placeholder="Passport Expiry Date" required>
                        </div>
                  </div>
              <br />
              <div class="row">
                    <div class="col-4">
                      <label for="name">Country Of Issue <span class="required">*</span></label>
                      <input type="text" name="countryofissue" class="form-control" placeholder="Country Of Issue" required>
                  </div>
                  <div class="col-4">
                            <label for="name">Place Of Issue <span class="required">*</span></label>
                            <input type="text" name="placeofissue" class="form-control" placeholder="Place Of Issue" required>
                  </div>
              </div>
<br />
            <div class="row">
                  <div class="col-4">
                      <label for="name">Personal Mobile NO <span class="required">*</span></label>
                      <input type="text" name="personalmobileno" class="form-control" placeholder="Personal Mobile NO" required>
                </div>
                <div class="col-4">
                  <label for="name">WhatsApp No <span class="required">*</span></label>
                  <input type="text" name="whatsappnumber" class="form-control" placeholder="WhatsApp No" required>
                </div>
            </div>
<br />    
            <div class="row">
                <div class="col-4">
                    <label for="name">Persoanl Mail ID <span class="required">*</span></label>
                    <input type="text" name="personalmailid" class="form-control" placeholder="Persoanl Mail ID" required>
                </div>
            </div>
<br />
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="button">Submit</button>
                </div>

          </div>
        </div>
      </div>
      {{-- <div class="text-center">
      <button type="submit" class="btn btn-primary" name="button">Submit</button>
      </div> --}}
      <!-- Modal footer -->
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> --}}
      </div>

<script>
  $(document).ready(function() {
    $('#date').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
        autoclose: true      
    });

  });
</script>

  </body>
</html>