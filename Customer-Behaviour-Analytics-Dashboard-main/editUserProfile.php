<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <title>VSR Charitable Trust Admin Panel</title> -->
    <?php
      include('includes/header.php');

      $randomId = $_REQUEST['randomId'] && $_REQUEST['randomId'] != '' ? $_REQUEST['randomId'] : 0;
      $users_Qry = "SELECT * FROM tbl_users WHERE RANDOM_ID = '".$randomId."'";
      $User_Data = $crud->getData($users_Qry);

      $Cust_ID = $User_Data[0]["ID"];

      $Purchase_Pridiction = "SELECT PRODUCT_CATG, COUNT(*) AS product_count FROM `tbl_purchases` WHERE CUST_ID = '".$Cust_ID."' GROUP BY PRODUCT_CATG ORDER by product_count DESC";
      $Pridiction_Data = $crud->getData($Purchase_Pridiction);

      // echo $Cust_ID;
      // exit;
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
                <?php if ($_REQUEST['type'] == 'view') { ?>
                  <h1 class="m-0">View User Profile</h1>
                <?php } ?>
                <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <h1 class="m-0">Edit User Profile</h1>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <?php if ($_REQUEST['type'] == 'view') { ?>
                  <li class="breadcrumb-item active">View User Profile</li>
                  <?php } ?>
                  <?php if ($_REQUEST['type'] == 'edit') { ?>
                  <li class="breadcrumb-item active">Edit User Profile</li>
                  <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <form name="editUserForm" id="editUserForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <h3 class="card-title">View User Profile Data</h3>
                    <?php } ?>
                    <?php if ($_REQUEST['type'] == 'edit') { ?>
                    <h3 class="card-title">Edit User Profile Data</h3>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <?php if ($_REQUEST['type'] == 'view') { ?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Customer Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $User_Data[0]['NAME']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $User_Data[0]['PHONE']; ?>" readonly>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address" readonly><?php echo $User_Data[0]['ADDRESS']; ?></textarea>
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Profile Image</label><br>
                        <img src="<?php echo str_replace('../', '', $User_Data[0]['IMAGE']); ?>" height="100">
                      </div>

                      <div class="col-6 mb-2">
                        <label for="">Predictive Analytics</label><br>
                        <?php
                          if($Pridiction_Data[0]['PRODUCT_CATG'] === 'M') { 
                            $Pridiction_Value = 'Mobiles';
                          }else 
                          if($Pridiction_Data[0]['PRODUCT_CATG'] === 'L'){
                            $Pridiction_Value = 'Laptops';
                          }else
                          if($Pridiction_Data[0]['PRODUCT_CATG'] === 'S'){
                            $Pridiction_Value = 'Speakers / Bars';
                          }else
                          if($Pridiction_Data[0]['PRODUCT_CATG'] === 'A'){
                            $Pridiction_Value = 'Accessories';
                          }else{
                            $Pridiction_Value = 'No Purchases Yet...!';
                          }
                        ?>
                        <p><?php echo $User_Data[0]['NAME']." May Buy <span class='h4'>".$Pridiction_Value."</span> based on his purchase history."; ?></p>
                      </div>

                    </div>
                    <?php } ?>

                    <?php if ($_REQUEST['type'] == 'edit') {?>
                    <div class="row">

                      <div class="col-12 mb-2">
                        <label for="">Customer Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $User_Data[0]['NAME']; ?>">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $User_Data[0]['PHONE']; ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode === 8 || event.charCode === 46;" maxlength="10">
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address"><?php echo $User_Data[0]['ADDRESS']; ?></textarea>
                      </div>

                      <div class="col-12 mb-2">
                        <label for="">Profile Image</label>
                        <input type="file" name="image" class="form-control" id="image"><br>
                        <img src="<?php echo str_replace('../', '', $User_Data[0]['IMAGE']); ?>" height="100">
                        <input type="hidden" name="old_image" id="old_image" value="<?php echo $User_Data[0]['IMAGE']; ?>">
                      </div>

                    </div>
                    <?php } ?>

                    <div class="row mt-4">
                      <div class="col-6">
                        <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageUserProfiles.php'">
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
      <script type="text/javascript" src="js/editUserProfile.js"></script>
  </body>
</html>
