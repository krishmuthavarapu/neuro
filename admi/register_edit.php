<?php
include('security.php');
include('db/config.php');

include('includes/header.php'); ?>

<?php include('includes/navbar.php'); ?>


<div class="container">
    <div class="row">
        <h4 class="pl-2">Edit Details</h4>
    </div>
    <div class="row pt-4 pl-2">
        <div class="col">
            <?php
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM register WHERE id='$id'";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $row) 
                {
                    ?>
                    <form method="POST" action="code.php">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" value="<?php echo $row['username']?>" name="edit_username" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" value="<?php echo $row['email']?>" name="edit_email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" value="<?php echo $row['password'] ?>" name="edit_password" placeholder="Password">

                    </div>
                    <a href="register.php" class="btn btn-danger">Cancel</a>
                    <button class="btn btn-primary" type="submit" name="updatebtn">Update</button>
                </form>
                <?php
                }
            }
        ?>
        </div>

    </div>

</div>


<!-- End of Page Wrapper -->
<?php include('includes/scripts.php'); ?>

<?php include('includes/footer.php'); ?>