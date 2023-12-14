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
   .head p {
        font-weight: 300;
        color: #fff;
    }
p{
    color:#fff;
}
    .card {
        background-color: #1515bb66;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="container mt-5">
        <?php
    // Retrieve user data from session
    $session = session();
    $userData = $session->get('user_data');
    $userId = isset($userData['userid']) ? $userData['userid'] : null; 
    ?>
          
            <h3 class="text-center mb-2"><b>Profile Details</b></h3>
            <div class="card p-3">
                <?php foreach ($profiles as $profile): ?>
                    <?php if($profile['id'] === $userData['userid']): ?> 
                    <div class="row">
                    <div class="col-lg-6 d-flex justify-content-center mt-2">
                    <div class="image-container" style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%;">
                       <img src="../profileimage/<?php echo $profile['image'] ?>" style="width: 100%; height: 100%; object-fit: cover;">
                         </div>
                      </div>

                        <div class="col-lg-6 mt-3">
                            <div class="row">
                                <div class="col-lg-4 head">
                                <p><b>Name : </b></p>
                                <p><b>Dob : </b></p>
                                <p><b>Mobile : </b></p>
                                <p><b>Gender : </b></p>
                                <p><b>Experience : </b></p>
                                <p><b>Address : </b></p>
                                <p><b>Zipcode : </b></p>
                                </div>
                                <div class="col-lg-8">
                                       <p style="font-weight:600;"> <?= $profile['firstname'] ?><?= $profile['lastname'] ?></p>
                                       <p style="font-weight:600;"> <?= $profile['dob'] ?></p>
                                       <p style="font-weight:600;"> <?= $profile['mobileno'] ?></p>
                                       <p style="font-weight:600;"> <?= $profile['gender'] ?></p>
                                       <p style="font-weight:600;"> <?= $profile['experience'] ?></p>
                                       <p style="font-weight:600;"> <?= $profile['city'] ?>,<?= $profile['state'] ?>,<?= $profile['country'] ?></p>
                                       <p style="font-weight:600;"><?= $profile['zip'] ?></p>
                                    
                                </div>
                            </div>
                           

                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $profile['id'] ?>">Edit Profile</button>
                </div>


                <!-- modal profile upadte -->
                <div class="modal	modal-xl fade" id="exampleModal<?= $profile['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel<?= $profile['id'] ?>">Update Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container mt-5">
            <div class="card p-3">
                <form action="<?= base_url('submitupdates') ?>" method="post" enctype="multipart/form-data">
                <div class="d-none">
                        <div class="mb-3 hidden">
                            <label for="examplename" class="form-label">Id :</label>
                            <input type="text" class="form-control" name="id" id="examplename"
                                aria-describedby="emailHelp"  value="<?= $userId ?>">
                        </div>
                    </div>
                    <!-- above id -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="examplename" class="form-label">FirstName :</label>
                                <input type="text" class="form-control" name="firstname" id="examplename"
                                    aria-describedby="emailHelp"  value="<?= $profile['firstname'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">LastName :</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    aria-describedby="emailHelp" value="<?= $profile['lastname'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="dob" class="form-label">Dob :</label>
                                <input type="date" class="form-control" name="dob" id="dob" aria-describedby="emailHelp"
                                    value="<?= $profile['dob'] ?>">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="mobileno" class="form-label">Mobile No:</label>
                                <input type="text" class="form-control" name="mobileno" id="mobileno"
                                    aria-describedby="emailHelp" value=" <?= $profile['mobileno'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="mobileno" class="form-label">Experience:</label>
                                <input type="text" class="form-control" name="experience" id="mobileno"
                                    aria-describedby="emailHelp" value="<?= $profile['experience'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="exampleGender" class="form-label">Gender:</label>
                                <select class="form-select" name="gender" id="exampleGender">
    <option value="" disabled>Select Gender</option>
    <option value="male" <?= ($profile['gender'] === 'male') ? 'selected' : '' ?>>Male</option>
    <option value="female" <?= ($profile['gender'] === 'female') ? 'selected' : '' ?>>Female</option>
    <option value="other" <?= ($profile['gender'] === 'other') ? 'selected' : '' ?>>Other</option>
</select>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="city" class="form-label">City :</label>
                                <input type="text" class="form-control" name="city" id="city"
                                    aria-describedby="emailHelp" value="<?= $profile['city'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="state" class="form-label">State :</label>
                                <input type="text" class="form-control" name="state" id="state" value="<?= $profile['state'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country :</label>
                                <input type="text" class="form-control" name="country" id="country" value="<?= $profile['country'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="zip" class="form-label">Zip :</label>
                                <input type="text" class="form-control" name="zip" id="zip" value="<?= $profile['zip'] ?>">
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="profile_image" class="custom-button">Profile Image</label>

                                <input type="file" name="image" id="profile_image">
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary mb-3">Save Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
                   <?php endif ?>
      
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- modal profile update -->
<!-- Modal -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
<!-- 
<form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="examplename" class="form-label">FirstName :</label>
                                <input type="text" class="form-control" name="firstname" id="examplename"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">LastName :</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="dob" class="form-label">Dob :</label>
                                <input type="date" class="form-control" name="dob" id="dob"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="mobileno" class="form-label">Mobile No:</label>
                                <input type="text" class="form-control" name="mobileno" id="mobileno"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                    </div>

             
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="exampleGender" class="form-label">Gender:</label>
                                <select class="form-select" name="gender" id="exampleGender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="city" class="form-label">City :</label>
                                <input type="text" class="form-control" name="city" id="city"
                                    aria-describedby="emailHelp" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="state" class="form-label">State :</label>
                                <input type="text" class="form-control" name="state" id="state"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country :</label>
                                <input type="text" class="form-control" name="country" id="country"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="zip" class="form-label">Zip :</label>
                                <input type="text" class="form-control" name="zip" id="zip" required>
                            </div>
                        </div>
                    </div>

               >
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="profile_image" class="custom-button">Profile Image</label>

                                <input type="file" name="image" id="profile_image" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary mb-3">Save Profile</button>
                            </div>
                        </div>
                    </div> 
                </form> -->