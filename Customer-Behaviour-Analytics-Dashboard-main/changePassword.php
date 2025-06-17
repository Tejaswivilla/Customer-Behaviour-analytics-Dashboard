<!DOCTYPE html>
<html lang="en">
  <head>
    <title>VSR Charitable Trust Admin Panel</title>
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
                <h1 class="m-0">Change Password</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Change Password</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Change Password</h3>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-12 mb-2">
                      <label for="">Username</label>
                      <input type="text" id="username" name="username" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>

                    <div class="col-12 mb-2">
                      <label for="">Old Password</label>
                      <input type="password" id="old_password" name="old_password" class="form-control">
                    </div>

                    <div class="col-12 mb-2">
                      <label for="">New Password</label>
                      <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="col-12 mb-2">
                      <label for="">Confirm New Password</label>
                      <input type="password" name="confPassword" class="form-control" id="confPassword">
                    </div>

                  </div>

                  <div class="row mt-4">
                    <div class="col-6">
                      <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'home.php'">
                    </div>
                    <div class="col-6">
                      <input type="button" name="submit" value="Change" class="btn btn-success" style="float: right;" onclick="changePassword()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </section>
      </div>
      <script type="text/javascript" src="js/changePassword.js"></script>
      <?php include('includes/footer.php'); ?>
  </body>
</html>
