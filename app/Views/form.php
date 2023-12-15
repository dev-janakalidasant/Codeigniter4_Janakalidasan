<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sample</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        .file-name {
            margin-top: 10px;
        }
        .profiles{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <?php
            // Retrieve user data from session
            $session = session();
            $userData = $session->get('user_data');
         
            ?>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-lg-9">
                            <h2>DashBoard</h2>
                        </div>
                        <div class="col-lg-3 profiles">
                        <?php if ($userData['profileid'] == '1') : ?>
                                <a class="" href="<?php echo base_url('profiledeatails'); ?>"><button class="btn btn-success">My Profile</button></a></li>
                        <?php endif; ?>
                        <?php if ($userData['profileid'] == '0') : ?>
                            <a class="" href="<?php echo base_url('profilecreate'); ?>"><button class="btn btn-success">Profile
                                                Create</button></a>
                        <?php endif; ?>
                        <a class="ml-3" href="<?php echo base_url('/'); ?>"><button class="btn btn-danger">
                                                Log out</button></a>
                        </div>

                    </div>


                    <!-- <form action="<?= base_url('submit-form') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <h1>User Registration</h1>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div>
                            <label for="profile_image" class="custom-button">Choose Source Image</label>
                        
                            <input type="file" name="profile_image" id="profile_image" required>
                         
                            <div class="file-name" id="file-name"></div>
                         
                            <script>
                                document.getElementById('profile_image').addEventListener('change', function () {
                                    // Display the selected file name
                                    document.getElementById('file-name').textContent = this.files[0].name;
                                });
                            </script>
                        </div>
                        <div class="justify-content-end d-flex">
                            <button type="submit" class="btn btn-primary " href="<?= site_url('user-details') ?>">Submit</button>
                        </div>


                    </form> -->

                </div>
                <br>

                <br>
                <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>IMAGE</th>
                        <th>ACTION</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($forms as $form): ?>
                        <tr>
                            <td>
                                <?= $form['id'] ?>
                            </td>
                            <td>
                                <?= $form['name'] ?>
                            </td>
                            <td>
                                <?= $form['email'] ?>
                            </td>
                            <!-- <td>                      
                                <img src="../images<?php echo ($form['profile_image']) ?>" alt="Profile Image" style="hight:100px">
                            </td> -->
                            <td> <img src="../images/<?php echo $form['profile_image'] ?>" style="height:100px"></td>
                            <td>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?= $form['id'] ?>">Update</button>

                                <a class="btn btn-danger" href="<?= base_url('delete/' . $form['id']) ?>"
                                    onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $form['id'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel<?= $form['id'] ?>">Update
                                            User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('update/' . $form['id']) ?>" method="post"
                                            enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="name<?= $form['id'] ?>" value="<?= $form['name'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="email<?= $form['id'] ?>" value="<?= $form['email'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="password<?= $form['id'] ?>">
                                            </div>
                                            <!-- <div>
                                                <label for="profile_image">Profile Image:</label>
                                                <input type="file" name="profile_image"
                                                    id="profile_image<?= $form['id'] ?>">
                                            </div> -->
                                            <button type="submit" class="btn btn-primary">Save change</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

            </div>
            <div class="col-lg-1"></div>
        </div>

     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>