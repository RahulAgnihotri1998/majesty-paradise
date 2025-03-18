        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 MLA group<a
                href="https://www.bootstrapdash.com/" target="_blank"></a> </span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span> -->
          </div>

        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- Select2 JavaScript -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="
https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
   $('.ui.fluid.dropdown')
	            .dropdown({
	              
	            });
</script>


<script>
  $(document).ready(function() {
    // Initialize DataTables
    $('.producttable').DataTable({
      "searching": true,
      "order": [[ 3, "desc" ]]  // Enable search functionality
    });
  });
</script>
<script>
  $(document).ready(function() {
    // Initialize DataTables
    $('.brandtable').DataTable({
      "searching": true ,
      "order": [[ 3, "desc" ]] // Enable search functionality
    });
  });
</script>
<script>
  $(document).ready(function() {
    // Initialize DataTables
    $('.enquirytable').DataTable({
      "searching": true,
      "order": [[ 0, "desc" ]] 
       // Enable search functionality
    });
  });
</script>


<script>
    // Get all anchor tags with class 'delete-product'
    var deleteLinks = document.querySelectorAll('.delete-product');

    // Attach click event listener to each delete link
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default click action

            var productId = this.getAttribute('data-id'); // Get the product ID from the data-id attribute

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms deletion, redirect to delete-product.php with the product ID as query parameter
                    window.location.href = 'delete-product.php?id=' + productId;
                }
            });
        });
    });
</script>

<script>
    // Get all anchor tags with class 'delete-brand'
    var deleteBrandLinks = document.querySelectorAll('.delete-brand');

    // Attach click event listener to each delete brand link
    deleteBrandLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default click action

            var brandId = this.getAttribute('data-id'); // Get the brand ID from the data-id attribute

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms deletion, redirect to delete-brand.php with the brand ID as query parameter
                    window.location.href = 'delete-brand.php?id=' + brandId;
                }
            });
        });
    });
</script>
  <!-- End custom js for this page-->
</body>

</html>