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
        <h4>Salary Structure</h4>
    </div>
    <div class="card-body">
      <form >
        <div class="row">
                <div class="col-6">
                    <label for="name">Currency <span class="required">*</span></label>
                    <input type="text"  name="type" class="form-control"  placeholder="Currency" required>
            </div>
            <div class="col-6">
                <label for="name">Basic <span class="required">*</span></label>
                <input type="text"  name="type" class="form-control"  placeholder="Basic" required>
            </div>
        </div>
            
    <br />
        <div class="row">
            <div class="col-6">
                <label for="name">Housing <span class="required">*</span></label>
                <input type="text"  name="type" class="form-control"  placeholder="Housing" required>
            </div>
            <div class="col-6">
                <label for="name">Transportation <span class="required">*</span></label>
                <input type="text"  name="type" class="form-control"  placeholder="Transportation" required>
            </div>
        </div>
    <br />
        <div class="row">
            <div class="col-6">
                <label for="name">Accommodation <span class="required">*</span></label>
                <input type="text"  name="type" class="form-control"  placeholder="Accommodation" required>
            </div>
    
            <div class="col-6">
                <label for="name">Other Allowance <span class="required">*</span></label>
                <input type="text"  name="type" class="form-control"  placeholder="Other Allowance" required>
            </div>
        </div>
    <br />      
            <div class="row">
                <div class="col-6">
                    <label for="name">Gross Salary <span class="required">*</span></label>
                    <input type="text"  name="type" class="form-control"  placeholder="Gross Salary" required>
                </div>
            </div>  
    <br />
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="button">Submit</button>
                </div>
      </form>
    </div>
  </div>
</div>  

</body>
</html>
