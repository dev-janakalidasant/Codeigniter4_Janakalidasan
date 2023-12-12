<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    label{
        font-weight: 700;
        color: #fff;
    }
    .card{
        background-color: #1515bb66;
    }
    </style>

<body>
<div class="container mt-5">
    <div class="row">
               <div class="col-lg-4">
</div>
<div class="col-lg-4 card">
<form action="/login/loginsuccess"  method="post">
    <h2 class="mt-2 text-center" style="color:#fff;">Login</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email :</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password :</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
  </div>
 
  <button type="submit" class="btn btn-primary mb-3">Login</button>
  <?php
    // Display error message, if any
    if (session()->has('error')) {
        echo '<p style="color: red;">' . session('error') . '</p>';
    }
    ?>
</form>
</div>
<div class="col-lg-4">
</div>
    </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>