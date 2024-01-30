<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Residential Visa Expiry Reminder</title>
</head>
<body>
    <p>Hello {{ $name }},</p>

     <p>Your Residential Visa will be expired on {{ date('d-m-Y', strtotime($expdate)) }}</p>
   <p>Thank you </p>

</body>
</html>
