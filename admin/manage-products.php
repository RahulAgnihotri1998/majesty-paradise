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
                <h4 class="card-title">Manage Products</h4>
                <p class="card-description">
                  <!-- Add class <code>.table-striped</code> -->
                </p>

                <?php
                // Assuming you have already established a database connection
                include('./codes/db.php');
                // SQL query to select data from the product table
               $sql = "SELECT * FROM products";

                // Execute the query
                $result = $db->query($sql);

                ?>
 <style>
                                        .producttable{
                                            width: 100%;
                                        }
                                    </style>
<div class="table-responsive">
  <table class="producttable table-striped">
    <thead>
      <tr>
        <th>Product Image</th>
        <th>Title</th>
        <th>Status</th>
        <th>Published at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result) {
        while ($row = $result->fetch_assoc()) {
          $productImage = $row['main_image'];
          $title = $row['title'];
          $status = $row['status'];
          $publishedAt = $row['created_at'];
          $badgeColor = ($status == 'Published') ? 'success' : 'danger';
      ?>
          <tr>
            <td class="py-1">
              <img src="./codes/<?php echo $productImage; ?>" alt="image"  style="height: 100px;width: 100px;"/>
            </td>
            <td><?php echo $title; ?></td>
            <td>
              <label class="badge badge-<?php echo $badgeColor; ?>"><?php echo $status; ?></label>
            </td>
            <td><?php echo $publishedAt; ?></td>
            <td>
              <a href="edit-product.php?id=<?php echo $row['id']; ?>">
                <i style="font-size: 19px; color: #4b49ac;" class="mdi mdi-pencil"></i>
              </a>
              <a href="#" class="delete-product" data-id="<?php echo $row['id']; ?>">
    <i style="font-size: 19px; color: #FF4747;" class="mdi mdi-delete"></i>
</a>
            </td>
          </tr>
      <?php
        }
      } else {
        echo "Error executing SQL query: " . $db->error;
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


      <?php include('inc/footer.php') ?>