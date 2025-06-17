<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Customer Interaction</title>
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
                <h1 class="m-0">Add Customer Interaction</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Add Customer Interaction</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="addInteractionsForm" id="addInteractionsForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add New Customer Interaction</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Customer Name</label>
                        <select class="form-control form-select" name="cust_id" id="cust_id" onchange="GenetateProduct(this.value)">
                          <option value="">-- Select Customer --</option>
                          <?php foreach ($User_Data as $row) { ?>
                            <option value="<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Interaction Type</label>
                        <select class="form-control form-select" name="int_type" id="int_type" onchange="FillProduct(this.value)">
                          <option value="">-- Select Interaction Type --</option>
                          <option value="V">Visited</option>
                          <option value="S">General Service</option>
                          <option value="W">Warrenty Claim</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2" id="productsDD">
                        <label for="">Product</label>
                        <select class="form-control form-select" name="product" id="product">
                          <option value="">-- Select Customer First --</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Date</label>
                        <input type="date" id="date" name="date" class="form-control">
                      </div>

                    </div>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageInteractions.php'">
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
      <script type="text/javascript" src="js/addInteractions.js"></script>
  </body>
</html>
