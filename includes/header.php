<?php
	$curpage = basename($_SERVER['PHP_SELF']);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Invento | <?php echo display_title($curpage); ?></title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="img/InventoLogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="css/app.css">
  <!-- QR Code -->
  <script src="js/qrcode.js"></script>

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="PWAGram">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-57x57.png" sizes="57x57">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-60x60.png" sizes="60x60">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-72x72.png" sizes="72x72">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-76x76.png" sizes="76x76">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-114x114.png" sizes="114x114">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-120x120.png" sizes="120x120">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-144x144.png" sizes="144x144">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-152x152.png" sizes="152x152">
  <link rel="apple-touch-icon" href="img/icons/apple-icon-180x180.png" sizes="180x180">
  <meta name="msapplication-TileImage" content="img/icons/app-icon-144x144.png">
  <meta name="msapplication-TileColor" content="#fff">
  <meta name="theme-color" content="#3f51b5">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
  
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="img/InventoLogo.png" alt="Invento Logo" height="60" width="60">
    </div>
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="profile.php" class="nav-link">Profile & Change Password</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a id="logout" href="logout.php" class="nav-link">Logout</a>
        </li>

        <!-- Navbar Search -->
        <!--<li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>-->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="img/InventoLogo.png" alt="Invento Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Invento</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="img/default-avatar.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a id="userName" href="profile.php" class="d-block">Hi, <?php echo $_SESSION['fname']; ?></a>
          </div>
        </div>
  
        <!-- SidebarSearch Form -->
        <!--<div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>-->
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php echo ($curpage =='index.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo ($curpage =='order-list.php' || $curpage =='customers.php') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($curpage =='order-list.php' || $curpage =='customers.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="order-list.php" class="nav-link <?php echo ($curpage =='order-list.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="customers.php" class="nav-link <?php echo ($curpage =='customers.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo ($curpage =='product-management.php' || $curpage =='repackage-product.php') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($curpage =='product-management.php' || $curpage =='repackage-product.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product-management.php" class="nav-link <?php echo ($curpage =='product-management.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="repackage-product.php" class="nav-link <?php echo ($curpage =='repackage-product.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repackage Product</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="user-management.php" class="nav-link <?php echo ($curpage =='suppliers.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Suppliers
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo ($curpage =='inventory-counts.php' || $curpage =='item-received.php') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($curpage =='inventory-counts.php' || $curpage =='item-received.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="inventory-counts.php" class="nav-link <?php echo ($curpage =='inventory-counts.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory Counts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="item-received.php" class="nav-link <?php echo ($curpage =='item-received.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Received</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo ($curpage =='sales.php' || $curpage =='inventory.php') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($curpage =='sales.php' || $curpage =='inventory.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sales.php" class="nav-link <?php echo ($curpage =='sales.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inventory.php" class="nav-link <?php echo ($curpage =='inventory.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="user-management.php" class="nav-link <?php echo ($curpage =='user-management.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User List
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo ($curpage =='company-info.php' || $curpage =='department.php' || $curpage =='classification.php' || $curpage =='color.php' || $curpage =='season.php' || $curpage =='uom.php' || $curpage =='warehouse.php' || $curpage =='rack.php' || $curpage =='categories.php' || $curpage =='sub-categories.php' || $curpage =='payment.php') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($curpage =='company-info.php' || $curpage =='department.php' || $curpage =='classification.php' || $curpage =='color.php' || $curpage =='season.php' || $curpage =='uom.php' || $curpage =='warehouse.php' || $curpage =='rack.php' || $curpage =='categories.php' || $curpage =='sub-categories.php' || $curpage =='payment.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="company-info.php" class="nav-link <?php echo ($curpage =='company-info.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="department.php" class="nav-link <?php echo ($curpage =='department.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="classification.php" class="nav-link <?php echo ($curpage =='classification.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Classification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="color.php" class="nav-link <?php echo ($curpage =='color.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Color</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="season.php" class="nav-link <?php echo ($curpage =='season.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Season</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="uom.php" class="nav-link <?php echo ($curpage =='uom.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit of Measure</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="warehouse.php" class="nav-link <?php echo ($curpage =='warehouse.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warehouse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rack.php" class="nav-link <?php echo ($curpage =='rack.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rack</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="categories.php" class="nav-link <?php echo ($curpage =='categories.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sub-categories.php" class="nav-link <?php echo ($curpage =='sub-categories.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="payment.php" class="nav-link <?php echo ($curpage =='payment.php') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="sync-db.php" class="nav-link <?php echo ($curpage =='sync-db.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Sync Database
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">