<?php
include('security.php');
include('db/config.php');
include('includes/header.php'); ?>

<?php include('includes/navbar.php'); ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" method="POST" action="code.php">

                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="username" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" name="confirmpassword" placeholder="Repeat Password">
                        </div>
                    </div>
                    <hr>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add new user
        </button>
    </div>
    <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h4>' . $_SESSION['success'] . '</h4>';
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h4 class="bg-warning">' . $_SESSION['status'] . '</h4>';
        unset($_SESSION['status']);
    }
    ?>
    <div class="row">
        <?php
        
        $query = "SELECT * FROM register";
        $query_run = mysqli_query($connection, $query);
        ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                
                                <td><form action="register_edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button class="btn-success " name="edit_btn" type="submit">Edit</button>
                                    </form>
                                </td>
                                <td>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                                    <button class="btn-danger " name="deletebtn" type="submit">Delete</button>
                                    </form>
                                </td>


                            </tr>
                        <?php
                    }
                } else {
                    echo "No record found";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
<div>
    <!-- End of Page Wrapper -->
    <?php include('includes/scripts.php'); ?>

    <?php include('includes/footer.php'); ?>