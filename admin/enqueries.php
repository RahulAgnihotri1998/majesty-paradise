<?php
session_start();

// Check if session variables exist
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
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
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <?php include('sidebar.php') ?>
        <!-- partial -->
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <style>
                                    table.dataTable {
                                        width: 100%;
                                    }
                                </style>


                                <h4 class="card-title">Manage Enqueries</h4>
                                <p class="card-description">
                                    <!-- Add class <code>.table-striped</code> -->
                                </p>


                                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="table-responsive">
        <table class="enquirytable align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <!-- <th>Status</th> -->
                    <th></th> <!-- Empty column for spacing or future use -->
                    <th>Package</th> <!-- Replacing Product URL with Package Name -->
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <?php
                include('./codes/db.php');

                // Query to fetch data from the enquiries table
                $query = "SELECT id, first_name, last_name, mobile, email, status, package_name, created_at 
                          FROM enquiries 
                          ORDER BY id DESC";
                $result = $db->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="even">
                            <!-- Display data in table cells -->
                            <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                            <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
                            <td><?= $row['mobile'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <!-- <td>
                                <select class="form-select form-control enqueries-status-select"
                                        name="enquiries_status"
                                        data-enquiries-id="<?php echo $row['id']; ?>">
                                    <option value="pending" <?= ($row['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="contacted" <?= ($row['status'] == 'contacted') ? 'selected' : ''; ?>>Contacted</option>
                                    <option value="confirmed" <?= ($row['status'] == 'confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                                    <option value="cancelled" <?= ($row['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                                </select>
                            </td> -->
                            <td></td> <!-- Empty column -->
                            <td><?= $row['package_name'] ?></td>
                        </tr>
                        <?php
                    }
                    // Free result set
                    $result->free();
                } else {
                    // Handle the case where no data is found
                    echo "<tr><td colspan='7'>No enquiries found</td></tr>";
                }

                // Close the database connection
                $db->close();
                ?>
            </tbody>
        </table>
    </div>
</div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- page-body-wrapper ends -->
            <script src="./js/datatables/datatables.bundle.js"></script>

            <script>
    var datatable;
    var table = document.getElementById('kt_table_users');

    var handleChangeStatus = () => {
        const statusDropdowns = table.querySelectorAll('[name="enqueries_status"]');

        statusDropdowns.forEach(statusDropdown => {
            statusDropdown.addEventListener('change', function () {
                const enquiryId = this.getAttribute('data-enqueries-id'); // Changed from jQuery to vanilla JS
                const newUserStatus = this.value;
                const previousValue = this.getAttribute('data-previous-value');

                Swal.fire({
                    text: `Are you sure you want to change the status to ${newUserStatus}?`,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, change it!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-success",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: './codes/enquiery.php',
                            method: 'POST',
                            data: {
                                enqueries_id: enquiryId,
                                newUserStatus: newUserStatus
                            },
                            success: function (response) {
                                // Assuming response is JSON
                                const data = typeof response === 'string' ? JSON.parse(response) : response;
                                if (data.success) {
                                    Swal.fire({
                                        text: `Status changed to ${newUserStatus} successfully!`,
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    });
                                    // Update the previous value attribute
                                    statusDropdown.setAttribute('data-previous-value', newUserStatus);
                                } else {
                                    Swal.fire({
                                        text: `Failed to change status: ${data.message}`,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    });
                                    statusDropdown.value = previousValue;
                                }
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    text: `An error occurred while changing the status to ${newUserStatus}.`,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                                statusDropdown.value = previousValue;
                            }
                        });
                    } else {
                        statusDropdown.value = previousValue;
                    }
                });
            });
        });
    }

    // Initialize the status change functionality
    handleChangeStatus();
</script>

            <?php include('inc/footer.php') ?>