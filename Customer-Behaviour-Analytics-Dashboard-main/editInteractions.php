<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <title>VSR Charitable Trust Admin Panel</title> -->
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $Updates_Qry = "SELECT INTR.*, USR.NAME as NAME FROM tbl_interactions as INTR LEFT JOIN tbl_users as USR ON INTR.CUST_ID = USR.ID WHERE INTR.RANDOM_ID = '".$randomId."'";
      $Updates_Data = $crud->getData($Updates_Qry);

      $users_Qry = "SELECT * FROM tbl_users ORDER BY ID DESC";
      $User_Data = $crud->getData($users_Qry);

      $Product_Qry = "SELECT * FROM tbl_purchases WHERE CUST_ID = '".$Updates_Data[0]['CUST_ID']."' ORDER BY ID DESC";
      $Product_Data = $crud->getData($Product_Qry);
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
                <?php if ($_REQUEST['type'] == 'view') {?>
                  <h1 class="m-0">View Customer Interaction</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') {?>
                  <h1 class="m-0">Edit Customer Interaction</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') {?>
                  <li class="breadcrumb-item active">View Customer Interaction</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') {?>
                  <li class="breadcrumb-item active">Edit Customer Interaction</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editInteractionsForm" id="editInteractionsForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Customer Interaction Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Customer Interaction Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Customer Name</label>
                        <input type="text" id="cust_id" name="cust_id" class="form-control" value="<?php echo $Updates_Data[0]['NAME']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Interaction Type</label>
                        <select class="form-control form-select" name="int_type" id="int_type" disabled>
                          <option value="">-- Select Product Category --</option>
                          <option value="V" <?php if ($Updates_Data[0]["INT_TYPE"] == "V") {echo "selected"; } ?>>Visited</option>
                          <option value="S" <?php if ($Updates_Data[0]["INT_TYPE"] == "S") {echo "selected"; } ?>>General Service</option>
                          <option value="W" <?php if ($Updates_Data[0]["INT_TYPE"] == "W") {echo "selected"; } ?>>Warrenty Claim</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Product</label>
                        <input type="text" name="product" id="product" class="form-control" value="<?php echo $Updates_Data[0]['PRODUCT']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?php echo $Updates_Data[0]['DATE']; ?>" readonly>
                      </div>

                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Customer Name</label>
                        <select class="form-control form-select" name="cust_id" id="cust_id" onchange="GenetateProduct(this.value)">
                          <option value="">-- Select Customer --</option>
                          <?php foreach ($User_Data as $row) { ?>
                            <option value="<?php echo $row['ID']; ?>" <?php if ($row['ID'] == $Updates_Data[0]['CUST_ID']) {echo "selected"; } ?>><?php echo $row['NAME']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Interaction Type</label>
                        <select class="form-control form-select" name="int_type" id="int_type" onchange="FillProduct(this.value)">
                          <option value="">-- Select Interaction Type --</option>
                          <option value="V" <?php if ($Updates_Data[0]["INT_TYPE"] == "V") {echo "selected"; } ?>>Visited</option>
                          <option value="S" <?php if ($Updates_Data[0]["INT_TYPE"] == "S") {echo "selected"; } ?>>General Service</option>
                          <option value="W" <?php if ($Updates_Data[0]["INT_TYPE"] == "W") {echo "selected"; } ?>>Warrenty Claim</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2" id="productsDD">
                        <label for="">Product</label>
                        <select class="form-control form-select" name="product" id="product">
                          <option value="">-- Select Product --</option>
                          <?php foreach ($Product_Data as $row) { ?>
                            <option value="<?php echo $row['PRODUCT']; ?>" <?php if ($row['PRODUCT'] == $Updates_Data[0]['PRODUCT']) {echo "selected"; } ?>><?php echo $row['PRODUCT']; ?></option>
                          <?php } ?>
                          <option value="OTHER" <?php if ($Updates_Data[0]["PRODUCT"] == "OTHER") {echo "selected"; } ?>>Others</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?php echo $Updates_Data[0]['DATE']; ?>">
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageInteractions.php'">
                      </div>
                      <div class="col-6">
                        <?php if($_REQUEST['type'] == 'edit'){ ?>
                        <input type="hidden" name="hdn_id" id="hdn_id" value="<?php echo $randomId; ?>">
                        <input type="submit" name="submit" value="Update" class="btn btn-success" style="float: right;">
                        <?php } ?>
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
      <script type="text/javascript" src="js/editInteractions.js"></script>
  </body>
</html>
