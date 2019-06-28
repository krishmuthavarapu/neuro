<?php
include('security.php');
include('db/config.php');


include('includes/header.php'); ?>

<?php include('includes/navbar.php'); ?>

<div class="container">
    <div class="row">
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
        <div class="col-12">
            <h3>Demo Upload</h3>
        </div>
        <div class="col-6">
            <?php

            if (isset($_POST['save'])) {
                $mysqltime = date_create()->format('Y-m-d H:i:s');
                $sql = "INSERT INTO demo_video(demo_name, video_url, date)
VALUES ('" . $_POST["demo_name"] . "','" . $_POST["video_url"] . "', '" . $mysqltime . "')";

                $result = mysqli_query($connection, $sql);

                // header('Location: http://www.neuronoids.com/');
                // echo "<script>window.location.href='http://www.neuronoids.com/'</script>";
            }

            ?>
            <form action="" method="post">
                <div class="md-form">
                    <input type="text" placeholder="video name" name="demo_name" rows="2" class="form-control md-textarea" required>
                    <label for="message">Video Name</label>
                </div>
                <div class="md-form">
                    <input type="text" placeholder="video url" name="video_url" rows="2" class="form-control md-textarea" required>
                    <label for="message">video url</label>
                </div>
                <div class="text-center text-md-left">
                    <button class="btn btn-primary br-90 cus-grad" type="submit" value="send" name="save">Send</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php
        $query = "SELECT * FROM demo_video";
        $query_run = mysqli_query($connection, $query);
        ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Video name</th>
                        <th>Video Url</th>
                        <th>Date</th>
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
                                <td><?php echo $row['demo_name']; ?></td>
                                <td><?php echo $row['video_url']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button class="btn-danger " name="delete_video_url" type="submit">Delete</button>
                                    </form>
                                </td>


                                <!-- <td><button class="btn-success " type="submit">Edit</button></td>
                                                                                <td><button class="btn-danger " type="submit">Delete</button></td> -->


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
<!-- End of Page Wrapper -->
<?php include('includes/scripts.php'); ?>

<?php include('includes/footer.php'); ?>