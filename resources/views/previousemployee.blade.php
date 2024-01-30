<!DOCTYPE html>
<html lang="en">
<head>
  <title>AQUACHEMIE SUPPORT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.11.0/dist/css/bootstrap-datepicker.min.css">
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
        <h4>Previous Employement</h4>
    </div>
    <div class="card-body">
      <form >
        <div class="form-group">
          <label for="name">Date From <span class="required">*</span></label>
          <input type="date"  name="name" class="form-control"  placeholder="Date From" required>
        </div>

        <div class="form-group">
          <label for="phone">Date TO <span class="required">*</span></label>
          <input type="date" name="phone" class="form-control"  placeholder="Date To" required>
        </div>

        <div class="form-group">
          <label for="amount">Employer <span class="required">*</span></label>
          <input type="number"  name="amount" class="form-control" placeholder="Employer" required>
        </div>

        <div class="form-group">
          <label for="customer_id">Position <span class="required">*</span></label>
          <input type="text"  name="customer_id" class="form-control"  placeholder="Position" required>
        </div>

<div class="form-group">
          <label for="customer_id">Remark <span class="required">*</span></label>
          <input type="text"  name="customer_id" class="form-control"  placeholder="Remark" required>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
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
