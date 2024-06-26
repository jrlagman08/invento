<?php
	//Declaration of all includes including header
	require_once('includes/session.php');
	include_once('includes/connection.php'); 
	include_once('includes/functions.php'); 
	include_once('includes/header.php');
	//Check if user logged in
	confirm_logged_in();  
?>
 
	<!-- Content Header (Page header) -->
	<div class="content-header">
	<div class="container-fluid">
	  <div class="row mb-2">
		<div class="col-sm-6">
		  <h1 class="m-0">Dashboard</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		  <ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active">Dashboard</li>
		  </ol>
		</div><!-- /.col -->
	  </div><!-- /.row -->
	</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	<div class="container-fluid">
	
		<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $count = displayCount("tbl_product","prodID");?></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-shopping-bag"></i>
              </div>
              <a href="product-management.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $count = displayCount("tbl_order","orderID");?></h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-cubes"></i>
              </div>
              <a href="order-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $count = displayCount("tbl_customer","customerID");?></h3>

                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users"></i>
              </div>
              <a href="customers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $count = displayCount("tbl_supplier","supplierID");?></h3>

                <p>Suppliers</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-cart-plus"></i>
              </div>
              <a href="suppliers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

	</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->

<?php
	//Footer
	include_once('includes/footer.php'); 
?> 