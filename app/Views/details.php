<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

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
                                        <form action="<?= base_url('update/' . $form['id']) ?>" method="post" enctype="multipart/form-data">
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
                                            <div>
                                                <label for="profile_image">Profile Image:</label>
                                                <input type="file" name="profile_image" id="profile_image<?= $form['id'] ?>">
                                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>