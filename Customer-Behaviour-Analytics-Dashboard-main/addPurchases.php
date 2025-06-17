<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Purchase History</title>
    <?php
      include('includes/header.php');
      $users_Qry = "SELECT * FROM tbl_users ORDER BY ID DESC";
      $User_Data = $crud->getData($users_Qry);
    ?>
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
                <h1 class="m-0">Add Purchase History</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Add Purchase History</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addPurchasesForm" id="addPurchasesForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New Purchase History</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Customer Name</label>
                        <select class="form-control form-select" name="cust_id" id="cust_id">
                          <option value="">-- Select Customer --</option>
                          <?php foreach ($User_Data as $row) { ?>
                            <option value="<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Product Category</label>
                        <select class="form-control form-select" name="product_catg" id="product_catg">
                          <option value="">-- Select Product Category --</option>
                          <option value="M">Mobiles</option>
                          <option value="L">Laptops</option>
                          <option value="S">Speakers / Bars</option>
                          <option value="A">Accessories</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Product</label>
                        <input type="text" name="product" class="form-control" id="product">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Date</label>
                        <input type="date" id="date" name="date" class="form-control">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Price</label>
                        <input type="text" id="price" name="price" class="form-control" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode === 8 || event.charCode === 46;">
                      </div>

                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'managePurchases.php'">
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
      <script type="text/javascript" src="js/addPurchases.js"></script>
  </body>
</html>
