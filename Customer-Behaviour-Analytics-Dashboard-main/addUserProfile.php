<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add User Profile</title>
    <?php include('includes/header.php'); ?>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-md-6">
                <h1 class="m-0">Add User Profile</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Add User Profile</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addUserForm" id="addUserForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New User Profile</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Cusomer Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" maxlength="10" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode === 8 || event.charCode === 46;">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Profile Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                      </div>

                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageUserProfiles.php'">
                      </div>
                      <div class="col-6">
                        <input type="submit" name="submit" value="Save" class="btn btn-success" style="float: right;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2"></div>
            </div>
          </form>
        </section>
      </div>
      <?php include('includes/footer.php'); ?>
      <script type="text/javascript" src="js/addUserProfile.js"></script>
  </body>
</html>
