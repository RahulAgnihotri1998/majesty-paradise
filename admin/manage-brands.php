<?php
session_start();

// Check if session variables exist
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    // Session variables exist, user is logged in
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];

    // You can use $user_id and $email in your code as needed
} else {
    // Session variables don't exist, user is not logged in
    // Redirect to login page or handle accordingly
    header("Location: login.php");
    exit; // Ensure script execution stops after redirection
}
include('inc/header.php') ?>




<div class="container-scroller">

    <?php include('inc/nav.php') ?>
    <!-- partial -->

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
           <?php include('sidebar.php') ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Brands</h4>
                                    <p class="card-description">
                                        <!-- Add class <code>.table-striped</code> -->
                                    </p>
                                    <style>
                                        .brandtable{
                                            width: 100%;
                                        }
                                    </style>

                                    <div class="table-responsive">
                                        <table class="brandtable table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include('./codes/db.php');
                                                // Perform a query to fetch data from your database
                                                $query = "SELECT id, name, status, logo FROM brand ORDER BY id DESC"; 
                                                $result = $db->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td class="py-1">
                                                                <img src="./codes/<?php echo $row['logo']; ?> " alt="Brand Image"  style="height: 100px;width: 100px;"/>
                                                            </td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td>
                                                                <label class="badge badge-success"><?php echo $row['status']; ?></label>
                                                            </td>
                                                            <td>
                                                                <a href="edit-brand.php?id=<?php echo $row['id']; ?>">
                                                                    <i style="font-size: 19px; color: #4b49ac;" class="mdi mdi-pencil"></i>
                                                                </a>
                                                                <a href="#" class="delete-brand" data-id="<?php echo $row['id']; ?>">
                                                                        <i style="font-size: 19px; color: #FF4747;" class="mdi mdi-delete"></i>
                                                                    </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->

                <!-- partial -->

                <!-- page-body-wrapper ends -->



                <?php include('inc/footer.php') ?>