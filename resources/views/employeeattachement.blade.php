<!DOCTYPE html>
<html lang="en">
<head>
  <title>AQUACHEMIE SUPPORT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }} ">
</head>

<style>
    .required {
        color: red;
    }
    </style>
<body>

<div class="container mt-4">
  <div class="card">
    <div class="card-header text-center">
        <h4>Employee Attachements</h4>
    </div>
    <div class="card-body">
        <p>Name Of Attachements:</p>
        <hr />
      <form >
        <div class="row">
            <div class="col-4">
          <label for="name">Type <span class="required">*</span></label>
          <input type="text"  name="type" class="form-control"  placeholder="Type" required>
            </div>

        <div class="col-4">
                <label for="passport">Passport<span class="required">*</span></label>
                <input type="text" name="passport" class="form-control" placeholder="passport" required>
        </div>
        </div>
<br />
        <div class="row">
            <div class="col-4">
                <label for="phone">ID <span class="required">*</span></label>
                <input type="text" name="id" class="form-control"  placeholder="ID" required>
            </div>
            <div class="col-4">
                <label for="phone">Visa <span class="required">*</span></label>
                <input type="text" name="visa" class="form-control"  placeholder="visa" required>
            </div>
        </div>
<br />

        <div class="row">
            <div class="col-4">
                <label for="amount">Certificates <span class="required">*</span></label>
                <input type="text"  name="certificates" class="form-control" placeholder="certificates" required>
            </div>
            <div class="col-4">
                <label for="">Offer Letter <span class="required">*</span></label>
                <input type="text"  name="offerletter" class="form-control" placeholder="offerletter" required>
            </div>
        </div>
        <br />

        <div class="row">
            <div class="col-4">
                <label for="customer_id">Address <span class="required">*</span></label>
                <textarea type="textarea"  name="address" class="form-control"  placeholder="Address For Communication" required></textarea>
            </div>
          <div class="col-4">
            <label for="">House No <span class="required">*</span></label>
                <input type="text"  name="house" class="form-control" placeholder="House/Flat/Door No" required>
          </div>
        </div>
               <br />     
     <div class="row">
             <div class="col-4">
                <label for="">Building Name <span class="required">*</span></label>
                <input type="text"  name="building" class="form-control" placeholder="Building Name" required>
            </div>
            <div class="col-4">
                <label for="">Block <span class="required">*</span></label>
                <input type="text"  name="block" class="form-control" placeholder="Block" required>
            </div>
     </div>
        <br />
     <div class="row">
        <div class="col-4">
            <label for="">Street <span class="required">*</span></label>
            <input type="text"  name="street" class="form-control" placeholder="Street" required>
        </div>
        <div class="col-4">
            <label for="">City <span class="required">*</span></label>
            <input type="text"  name="city" class="form-control" placeholder="City" required>
        </div>
     </div>
                <br />

        <div class="row">
            <div class="col-4">
                <label for="">State <span class="required">*</span></label>
                <input type="text"  name="State" class="form-control" placeholder="State" required>
            </div>
            <div class="col-4">
                <label for="">Zip Code <span class="required">*</span></label>
                <input type="text"  name="street" class="form-control" placeholder="Zip Code" required>
            </div>
        </div>
                <br />

        <div class="row">
            <div class="col-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">CheckBox</label>
                    <textarea type="textarea"  name="address" class="form-control"  placeholder="Address For Communication" required></textarea>
                  </div>
            </div>
                <div class="col-4">
                    <label for="">Country <span class="required">*</span></label>
                    <input type="text"  name="street" class="form-control" placeholder="Country" required>
                </div>
        </div>
        <br />

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>  

</body>
</html>
