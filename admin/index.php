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
    <div class="theme-setting-wrapper">
      <div id="settings-trigger"><i class="ti-settings"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default"></div>
        </div>
      </div>
    </div>
    <div id="right-sidebar" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
        </li>
      </ul>
      <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
          <div class="add-items d-flex px-3 mb-0">
            <form class="form w-100">
              <div class="form-group d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
              </div>
            </form>
          </div>
          <div class="list-wrapper px-3">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Team review meeting at 3.00 PM
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Prepare for presentation
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Resolve all the low priority tickets due today
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Schedule meeting for next week
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Project review
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
            </ul>
          </div>
          <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary mr-2"></i>
              <span>Feb 11 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
            <p class="text-gray mb-0">The total number of sessions</p>
          </div>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="ti-control-record text-primary mr-2"></i>
              <span>Feb 7 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
            <p class="text-gray mb-0 ">Call Sarah Graves</p>
          </div>
        </div>
        <!-- To do section tab ends -->

        <!-- chat tab ends -->
      </div>
    </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <!-- partial:partials/_sidebar.php -->
   <?php include('sidebar.php') ?>
    <!-- partial -->
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome Admin</h3>
                <h6 class="font-weight-normal mb-0">Product listing and enquiry management. <span class="text-primary">3 new enqueries!</span></h6>
              </div>
              <!-- <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div> -->
            </div>
          </div>
        </div>
        <div class="row">

          <style>
            .transparents .card-body p {
              margin-bottom: 0;
            }

            .transparents .card-body {
              flex-wrap: wrap;
              padding: 13px;
              align-items: center;
              justify-content: space-between;
            }
          </style>

          <div class="col-md-12 grid-margin transparent transparents">

            <div class="row">
              <div class="col-md-2 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                  <div class="card-body d-flex">
                    <p class="">New </p>
                    <p class="fs-30 ">10</p>

                  </div>
                </div>
              </div>
              <div class="col-md-2 stretch-card transparent">
                <div class="card card-light-danger">
                  <div class="card-body d-flex">
                    <p class="">Contacted </p>
                    <p class="fs-30 ">100</p>

                  </div>
                </div>
              </div>
              <div class="col-md-2 stretch-card transparent">
                <div class="card card card-tale">
                  <div class="card-body d-flex">
                    <p class="">Converted </p>
                    <p class="fs-30 ">100</p>

                  </div>
                </div>
              </div>
              <div class="col-md-2 stretch-card transparent">
                <div class="card" style="background: #9359f4; color:#fff;">
                  <div class="card-body d-flex">
                    <p class="">Interested </p>
                    <p class="fs-30 ">100</p>

                  </div>
                </div>
              </div>
              <div class="col-md-2 stretch-card transparent">
                <div class="card card-light-blue">
                  <div class="card-body d-flex">
                    <p class="">Not interested </p>
                    <p class="fs-30 ">100</p>

                  </div>
                </div>
              </div>
              <div class="col-md-2 stretch-card transparent">
                <div class="card card-light-danger" style="background: #48edb6;">
                  <div class="card-body d-flex">
                    <p class="">Lost </p>
                    <p class="fs-30 ">100</p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Inquery</h5>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button> -->
              </div>
              <div class="modal-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Name</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Product name</label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Product Name">
                  </div>

                  <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button> -->
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->

        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h4 class="card-title">Manage Inqueries</h4>
                  <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary btn-icon-text">
                    <i class="mdi mdi-library-plus"></i>
                    Add Inquery
                  </button>
                </div>


                <p class="card-description">
                  <!-- Add class <code>.table-striped</code> -->
                </p>
                <div class="table-responsive">
                  <table class="table table-striped table-borderless">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Source</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                        <th>Product Name</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John D</td>
                        <td>Website</td>
                        <td class="font-weight-bold">+8484848994</td>
                        <td>info@comapny.com</td>
                        <td>
                          <div class="form-group w-100">
                            <div class="input-group">
                              <select name="" class="form-control" id="">
                                <option value="Contacted">Contacted</option>
                              </select>
                              <!-- <div class="input-group-append">
                                  <button class="btn btn-sm btn-primary" type="button">Save</button>
                                </div> -->
                            </div>
                          </div>
                        </td>
                        <td><a href="">Silicate</a></td>
                        <td class="font-weight-medium">
                          <div class="badge badge-success">Contacted</div>
                        </td>
                      </tr>
                      <tr>
                        <td>John D</td>
                        <td>Other</td>
                        <td class="font-weight-bold">+8484848994</td>
                        <td>info@comapny.com</td>
                        <td>
                          <div class="form-group w-100">
                            <div class="input-group">
                              <select name="" class="form-control" id="">
                                <option value="Contacted">Contacted</option>
                              </select>
                              <!-- <div class="input-group-append">
                                  <button class="btn btn-sm btn-primary" type="button">Save</button>
                                </div> -->
                            </div>
                          </div>
                        </td>
                        <td><a href="">Silicate</a></td>
                        <td class="font-weight-medium">
                          <div class="badge badge-danger">Not interested</div>
                        </td>
                      </tr>
                      <tr>
                        <td>Other</td>
                        <td>John D</td>
                        <td class="font-weight-bold">+8484848994</td>
                        <td>info@comapny.com</td>
                        <td>
                          <div class="form-group w-100">
                            <div class="input-group">
                              <select name="" class="form-control" id="">
                                <option value="Contacted">Contacted</option>
                              </select>
                              <!-- <div class="input-group-append">
                                  <button class="btn btn-sm btn-primary" type="button">Save</button>
                                </div> -->
                            </div>
                          </div>
                        </td>
                        <td><a href="">Silicate</a></td>
                        <td class="font-weight-medium">
                          <div class="badge badge-primary">Converted</div>
                        </td>
                      </tr>
                      <!-- <tr>
                        <td>John D</td>
                        <td class="font-weight-bold">+8484848994</td>
                        <td>info@comapny.com</td>
                        <td class="font-weight-medium"><div class="badge badge-success">Contacted</div></td>
                      </tr> -->
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

      <!-- page-body-wrapper ends -->



      <?php include('inc/footer.php') ?>