<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <title>VSR Charitable Trust Admin Panel</title> -->
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;

      $Updates_Qry = "SELECT PUR.*, USR.NAME as NAME FROM tbl_purchases as PUR LEFT JOIN tbl_users as USR ON PUR.CUST_ID = USR.ID WHERE PUR.RANDOM_ID = '".$randomId."'";
      $Updates_Data = $crud->getData($Updates_Qry);

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
                <?php if ($_REQUEST['type'] == 'view') {?>
                  <h1 class="m-0">View Purchase History</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') {?>
                  <h1 class="m-0">Edit Purchase History</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') {?>
                  <li class="breadcrumb-item active">View Purchase History</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') {?>
                  <li class="breadcrumb-item active">Edit Purchase History</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editPurchasesForm" id="editPurchasesForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View Purchase History Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit Purchase History Data</h3>
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
                        <label for="">Product Category</label>
                        <select class="form-control form-select" name="product_catg" id="product_catg" disabled>
                          <option value="">-- Select Product Category --</option>
                          <option value="M" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "M") {echo "selected"; } ?>>Mobiles</option>
                          <option value="L" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "L") {echo "selected"; } ?>>Laptops</option>
                          <option value="S" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "S") {echo "selected"; } ?>>Speakers / Bars</option>
                          <option value="A" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "A") {echo "selected"; } ?>>Accessories</option>
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

                      <div class="col-12 mb-2">
                        <label for="">Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="<?php echo $Updates_Data[0]['PRICE']; ?>" readonly>
                      </div>

                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Customer Name</label>
                        <select class="form-control form-select" name="cust_id" id="cust_id">
                          <option value="">-- Select Customer --</option>
                          <?php foreach ($User_Data as $row) { ?>
                            <option value="<?php echo $row['ID']; ?>" <?php if ($row['ID'] == $Updates_Data[0]['CUST_ID']) {echo "selected"; } ?>><?php echo $row['NAME']; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Product Category</label>
                        <select class="form-control form-select" name="product_catg" id="product_catg">
                          <option value="">-- Select Product Category --</option>
                          <option value="M" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "M") {echo "selected"; } ?>>Mobiles</option>
                          <option value="L" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "L") {echo "selected"; } ?>>Laptops</option>
                          <option value="S" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "S") {echo "selected"; } ?>>Speakers / Bars</option>
                          <option value="A" <?php if ($Updates_Data[0]["PRODUCT_CATG"] == "A") {echo "selected"; } ?>>Accessories</option>
                        </select>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Product</label>
                        <input type="text" name="product" id="product" class="form-control" value="<?php echo $Updates_Data[0]['PRODUCT']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?php echo $Updates_Data[0]['DATE']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="<?php echo $Updates_Data[0]['PRICE']; ?>">
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'managePurchases.php'">
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
      <script type="text/javascript" src="js/editPurchases.js"></script>
  </body>
</html>
