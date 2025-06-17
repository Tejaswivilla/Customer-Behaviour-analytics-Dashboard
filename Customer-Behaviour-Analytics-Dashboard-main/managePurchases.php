<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Manage Purchase History</title>
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
              <div class="col-sm-6">
                <h1 class="m-0">Purchase History Data</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Purchase History Data</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class = "col-12">
                <div class = "card">
                  <div class="card-header" style="background: #007bff;color: #fff;padding: 5px 15px;">
                    <div class = "row">
                      <div class = "col-6">
                        <h3 style="line-height: 20px;" class="card-title p-2">Purchase History Data</h3>
                      </div>
                      <div class = "col-6">
                        <a href="addPurchases.php" class="btn btn-default" style="float: right;"><i class="fa-solid fa-plus"></i></a>
                      </div>
                    </div>
                  </div>
                     
                  <div class="card-body">
                    <div class = row>
                      <div class = "col-12 table-responsive">

                        <table width="100%" align="center" id="PurchasesTable" class="table table-striped">
                          <thead>
                            <tr>
                              <th align="center">S.No</th>
                              <th>Customer</th>
                              <th>Product Purchased</th>
                              <th>Date</th>
                              <th>Price</th>                                    
                              <th align="center">Action</th>
                            </tr>
                          </thead>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('includes/footer.php'); ?>
      <script type="text/javascript" src="js/purchases.js"></script>
  </body>
</html>
