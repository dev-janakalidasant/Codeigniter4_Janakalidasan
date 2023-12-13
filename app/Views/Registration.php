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
  label {
    font-weight: 700;
    color: #fff;
  }

  .card {
    background-color: #1515bb66;
  }
</style>

<body>
<div class="container-fluid">
<div class="container">
    <div class="row">
      <div class="col-lg-4">
      </div>
      <div class="col-lg-4 card mt-5">
        <form action="<?= base_url('submit') ?>" method="post">
          <h2 class="mt-2 text-center" style="color:#000;">Registration</h2>
          <div class="mb-3">
            <label for="examplename" class="form-label">Name :</label>
            <input type="text" class="form-control" name="name" id="examplename" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="examplename" class="form-label">Dob :</label>
            <input type="date" class="form-control" name="dob" id="examplename" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email :</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
              required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password :</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
      </div>
      <div class="col-lg-4">
      </div>
    </div>

  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>