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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Mangement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product Mangement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Low running balance -->
    <section class="content" id="lowbalListsection" style="display: none;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
              <button id="closelowbalList" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Low Running Balance!</h5>
                <div id="lowbalList" class="row"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Low running balance -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h3 class="card-title">
                      <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-add"><i class="fas fa-plus"></i> &nbsp;Add Product</button>
                    </h3>
                  </div>
                  <div class="col-6" style="text-align: right;">
                    <strong>Threshold Color Legend:</strong> &nbsp;&nbsp;<span style="color: green; font-weight: bold;">High</span> &nbsp;|&nbsp; <span style="color: blue; font-weight: bold;"> Normal</span> &nbsp;|&nbsp; <span style="color: red; font-weight: bold;">Low</span>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
			  <div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">
               <!--<div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">-->
                  <thead>
                    <tr>
                      <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Description</th>
					  <th>High Threshold</th>
					  <th>Low Threshold</th>
					  <th>Running Balance</th>
                      <th style="width: 40px" class="no-sort">Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataTable">
                    <!-- Query data will be listed here - realtime update -->
                  </tbody>
				  <tfoot>
					<tr>
					  <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Description</th>
					  <th>High Threshold</th>
					  <th>Low Threshold</th>
					  <th>Running Balance</th>
                      <th style="width: 40px" class="no-sort">Action</th>
					</tr>
				  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->


      <!-- Product Gallery Form Modal -->
      <div class="modal fade" id="modal-default-gallery">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="galleryAddForm" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Product Images</h4>
                <button type="button" id="closegalleryAddFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Upload Image (Preview)<span class="req">*</span></label><br/>
                      <sub>(Recommended Size: 500 x 500 pixels)</sub>
                      <img id="uploadImgGal" src="img/default-company.jpg" style="height: 200px; width: 200px; border: 1px solid; object-fit: contain;" />
                      </br></br>
                      <input type="file" id="uploadPhoto" name="uploadPhoto" required /></br>
                      <div id="progressIndicator" class="progress progress-xs" style="display: none;">
                        <div id="indicatorBar" class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                        </div>
                      </div>
                      <br/>
                      <button type="button" id="upload" name="upload" class="btn btn-success">Upload Image</button>
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">

                      <div class="col-12">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h4 class="card-title">Image Gallery</h4>
                          </div>
                          <div class="card-body scrollable-wrapper-gallery">
                            <div class="row" id="imgGallery">
                              <!---- insert image gallery ---->
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
               
              </div>
              <div class="modal-footer justify-content-between">
                <input id="prodID" name="prodID" class="form-control" type="hidden">
                <button type="button" id="closegalleryAddForm" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Product Gallery Form Modal -->

      <!-- QR Code Modal -->
      <div class="modal fade" id="modal-default-qrcode" style="z-index: 9999;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Product QR Code</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div id="qrcode" style="width:120px; height:120px; margin:10px; margin-left: auto; margin-right: auto;"></div>  
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- QR Code Modal -->

      <!-- Add Product Form Modal -->
      <div class="modal fade" id="modal-default-add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="AddForm" action="data/prod_add_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Add Product</h4>
                <button type="button" id="closeAddFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Product Code <span class="req">*</span></label>
                      <div class="row">
                        <div class="col-sm-10"><input type="text" id="addprodCode" name="addprodCode" class="form-control" placeholder="Enter product code" maxlength="10" required></div>
                        <div class="col-sm-2"><button type="button" id="addgenQRCode" name="addgenQRCode" class="btn btn-default" data-toggle="modal" data-target="#modal-default-qrcode">QRCode</button></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Product Name <span class="req">*</span></label>
                      <input type="text" id="addprodName" name="addprodName" class="form-control" placeholder="Enter product name" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Short Description <span class="req">*</span></label>
                      <textarea id="addshortDesc" name="addshortDesc" class="form-control" rows="3" placeholder="Enter short description" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Full Description <span class="req">*</span></label>
                      <textarea id="addfullDesc" name="addfullDesc" class="form-control" rows="3" placeholder="Enter full description"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Classification <span class="req">*</span></label>
                      <select id="addClassification" name="addClassification" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Category <span class="req">*</span></label>
                      <select id="addCategory" name="addCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Sub Category <span class="req">*</span></label>
                      <select id="addsubCategory" name="addsubCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Warehouse <span class="req">*</span></label>
                      <select id="addWarehouse" name="addWarehouse" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Rack <span class="req">*</span></label>
                      <select id="addRack" name="addRack" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Season <span class="req">*</span></label>
                      <select id="addSeason" name="addSeason" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Color <span class="req">*</span></label>
                      <select id="addColor" name="addColor" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Unit of Measure <span class="req">*</span></label>
                      <select id="addUOM" name="addUOM" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>High Threshold <span class="req">*</span></label>
                      <input type="number" id="addhighQty" name="addhighQty" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" class="form-control" placeholder="Enter high threshold" min="0" max="9000000" value="0" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Low Threshold <span class="req">*</span></label>
                      <input type="number" id="addlowQty" name="addlowQty" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" class="form-control" placeholder="Enter low threshold" min="0" max="9000000" value="0" step="1" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Cost / Original Price <span class="req">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="addorigPrice" name="addorigPrice" class="form-control" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" value="0" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Retail / Selling Price <span class="req">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="addsalePrice" name="addsalePrice" class="form-control" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" value="0" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Customer Discounted Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="adddiscountedPrice" name="adddiscountedPrice" class="form-control" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" value="0">
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeAddForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Product</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add Product Form Modal -->

      <!-- Update Product Form Modal -->
      <div class="modal fade" id="modal-default-update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="UpdateForm" action="data/prod_update_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Update Product</h4>
                <button type="button" id="closeUpdateFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Product Code <span class="req">*</span></label>
                      <div class="row">
                        <div class="col-sm-10"><input type="text" id="updateprodCode" name="updateprodCode" class="form-control" placeholder="Update product code" maxlength="10" required></div>
                        <div class="col-sm-2"><button type="button" id="updategenQRCode" name="updategenQRCode" class="btn btn-default" data-toggle="modal" data-target="#modal-default-qrcode">QRCode</button></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Product Name <span class="req">*</span></label>
                      <input type="text" id="updateprodName" name="updateprodName" class="form-control" placeholder="Update product name" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Short Description <span class="req">*</span></label>
                      <textarea id="updateshortDesc" name="updateshortDesc" class="form-control" rows="3" placeholder="Update short description" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Full Description</label>
                      <textarea id="updatefullDesc" name="updatefullDesc" class="form-control" rows="3" placeholder="Update full description"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Classification <span class="req">*</span></label>
                      <select id="updateClassification" name="updateClassification" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Category <span class="req">*</span></label>
                      <select id="updateCategory" name="updateCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Sub Category <span class="req">*</span></label>
                      <select id="updatesubCategory" name="updatesubCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Warehouse <span class="req">*</span></label>
                      <select id="updateWarehouse" name="updateWarehouse" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Rack <span class="req">*</span></label>
                      <select id="updateRack" name="updateRack" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Season <span class="req">*</span></label>
                      <select id="updateSeason" name="updateSeason" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Color <span class="req">*</span></label>
                      <select id="updateColor" name="updateColor" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Unit of Measure <span class="req">*</span></label>
                      <select id="updateUOM" name="updateUOM" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>High Threshold <span class="req">*</span></label>
                      <input type="number" id="updatehighQty" name="updatehighQty" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" class="form-control" placeholder="Enter high quantity" min="0" max="9000000" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Low Threshold <span class="req">*</span></label>
                      <input type="number" id="updatelowQty" name="updatelowQty" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" class="form-control" placeholder="Enter low quantity" min="0" max="9000000" step="1"  required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Running Balance</label>
                      <input type="number" id="updaterunningBal" name="updaterunningBal" class="form-control" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Cost / Original Price <span class="req">*</span></label>
					<br/><sup id="updateLastUpdateOrig" style="color:red;"></sup>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="updateorigPrice" name="updateorigPrice" class="form-control" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" required>
					</div>
                  </div>
                  <div class="col-sm-4">
                    <label>Retail / Selling Price <span class="req">*</span></label>
					<br/><sup id="updateLastUpdateSale" style="color:red;"></sup>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="updatesalePrice" name="updatesalePrice" class="form-control" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)" required>
					</div>
                  </div>
                  <div class="col-sm-4">
                    <label>Customer Discounted Price</label>
					<br/><sup id="updateLastUpdateDiscount" style="color:red;"></sup>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="updatediscountedPrice" name="updatediscountedPrice" class="form-control" minlength="1" maxlength="7" onkeypress="return onlyNumberKey(event)">
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
				<input id="updateID" name="updateID" class="form-control" type="hidden">
				<input id="updateOrigP" name="updateOrigP" class="form-control" type="hidden">
				<input id="updateSaleP" name="updateSaleP" class="form-control" type="hidden">
				<input id="updateDiscountP" name="updateDiscountP" class="form-control" type="hidden">
                <button type="button" id="closeUpdateForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Update Product Form Modal -->


      <!-- View Product Form Modal -->
      <div class="modal fade" id="modal-default-view">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">View Product</h4>
                <button type="button" id="closeViewFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Product Code</label>: <span id="prodCode"></span> &nbsp;&nbsp;<a data-toggle="modal" data-target="#modal-default-qrcode" style="cursor: pointer; color: red; text-decoration: underline;">(QR Code)</a>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Product Name</label>: <span id="prodName"></span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Short Description</label>: <span id="shortDesc"></span>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Full Description</label>: <span id="fullDesc"></span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <!-- select -->
                    <div class="form-group">
                      <label>Classification</label>: <span id="Classification"></span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Category</label>: <span id="Category"></span>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Sub Category</label>: <span id="subCategory"></span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Warehouse</label>: <span id="Warehouse"></span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Rack</label>: <span id="Rack"></span>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Season</label>: <span id="Season"></span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Color</label>: <span id="Color"></span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Unit of Measure</label>: <span id="UOM"></span>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>High Threshold</label>: <span id="highQty"></span>
                     </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Low Threshold</label>: <span id="lowQty"></span>
                     </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Running Balance</label>: <span id="runningBal"></span>
                     </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Cost / Original Price</label>: ₱<span id="origPrice"></span><br/><sup id="viewLastUpdateOrig" style="color:red;"></sup>
                  </div>
                  <div class="col-sm-4">
                    <label>Retail / Selling Price</label>: ₱<span id="salePrice"></span><br/><sup id="viewLastUpdateSale" style="color:red;"></sup>
                  </div>
                  <div class="col-sm-4">
                    <label>Customer Discounted Price</label>: ₱<span id="discountedPrice"></span><br/><sup id="viewLastUpdateDiscount" style="color:red;"></sup>
                  </div>
                </div>
				<br/>
                <div class="row">
                  <div class="col-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4 class="card-title">Image Gallery</h4>
                      </div>
                      <div class="card-body scrollable-wrapper-gallery">
                        <div class="row" id="imgGalleryView">
                          <!---- insert image gallery ---->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeViewForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="viewID" class="btn btn-primary updateItem" data-id="" data-dismiss="modal">Update Product</button>
              </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- View Product Form Modal -->


    </section>
    <!-- /.content -->
 
<?php
	//Footer
	include_once('includes/footer.php'); 
?>  


<!-- Custom script -->
<script>
$(document).ready(function() {

	//--- Datatable settings ---//
	table = $("#loadDataTable").DataTable({
	  "iDisplayLength": 25,
	  "responsive": true, 
	  "autoWidth": false,
	  columnDefs: [{
		  orderable: false,
		  targets: "no-sort"
	  }],
	  "dom": 
			"<'row px-3 pt-3'<'col-sm-6'l><'col-sm-6'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row px-3 pb-3'<'col-sm-5'i><'col-sm-7'p>>",
	});
	
	//--- Lightbox ---//
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	  event.preventDefault();
	  $(this).ekkoLightbox({
		alwaysShowClose: true
	  });
	});
	
	//-- QR Code --//
	var qrcode = new QRCode(document.getElementById("qrcode"), {
		width : 120,
		height : 120
	});

	function makeQrCode (prodcodeTxt,qrcodeBtn) {		
		var elText = document.getElementById(prodcodeTxt);

		if (!elText.value) {
		  //alert("Input a text");
		  elText.focus();
		  document.getElementById(qrcodeBtn).disabled = true;
		  return;
		} else {
		  document.getElementById(qrcodeBtn).disabled = false;
		}

		qrcode.makeCode(elText.value);
	}

	function makeQrCodeView (prodcodeTxt) {		
		qrcode.makeCode(prodcodeTxt);
	}
	
	//--- Load data to table ---//
	function loadData(act){
		$.post( "data/prod_load_data.php", function(result,status){
			table.clear();
			var obj = JSON.parse(result);
			var lowrunningbal = "";
			var lowrunningbalNotif = "";
			var lowrunningbalNotifCnt = 0;
			 obj.forEach(function(item) {
				var rB = "";
				if (parseInt(item.runningBal) >= parseInt(item.highQty)){
					rB = "<span style='color: green; font-weight: bold;'>"+item.runningBal+"</span>";
				}
				else if (parseInt(item.runningBal) <= parseInt(item.lowQty)){
					rB = "<span style='color: red; font-weight: bold;'>"+item.runningBal+"</span>";
					lowrunningbal += "<div class='col-3'>&#8226; &nbsp;" + item.prodName + " (" + item.runningBal + ")</div>";
					lowrunningbalNotif += "• " + item.prodName + " (" + item.runningBal + ")\n";
					lowrunningbalNotifCnt = parseInt(lowrunningbalNotifCnt) + 1;
				} else {
					rB = "<span style='color: blue; font-weight: bold;'>"+item.runningBal+"</span>";
				}
				table.row.add([
					item.prodCode, 
                    item.prodName, 
                    "Short Desc: " + item.shortDesc + "<br/>Full Desc: " + item.fullDesc, 
                    "<span style='color: green;'>"+item.highQty+"</span>",
                    "<span style='color: red;'>"+item.lowQty+"</span>", 
                    rB,
					"<div class='btn-group btn-group-sm'><a href='#' class='btn btn-info viewItem' data-id="+item.prodID+" data-toggle='modal' data-target='#modal-default-view' title='View'><i class='fas fa-eye'></i></a><a href='#' class='btn btn-success galleryItem' data-id=\""+item.prodID+"\" data-toggle='modal' data-target='#modal-default-gallery' title='Gallery'><i class='fas fa-image'></i></a><a href='#' class='btn btn-warning updateItem' data-id="+item.prodID+" data-toggle='modal' data-target='#modal-default-update' title='Update'><i class='fas fa-pen'></i></a><a href='#' class='btn btn-danger deleteItem' data-id="+item.prodID+" title='Delete'><i class='fas fa-trash'></i></a></div>"])
			})
			table.draw(false);
			
			//--- Display Low Running Balance ---//
			if(act == "load") {
				if (lowrunningbal){
				  let runballist = document.getElementById("lowbalListsection");
				  runballist.setAttribute ('style', 'display: block !important;');
				  document.getElementById("lowbalList").innerHTML = lowrunningbal;

				 //--- Notif Permission ---//
				 Notification.requestPermission().then(permission => {
					//alert(permission);
					if(permission === 'granted') {
					  let cookienotif = getCookie("pushnotifPM");
					  if (cookienotif != "") {
						//if exist check value then update
						if (parseInt(cookienotif) != parseInt(lowrunningbalNotifCnt)) {
						  setCookie("pushnotifPM", lowrunningbalNotifCnt, 2);
						  pushNotifMsg(lowrunningbalNotif);
						}
					  } else {
						//if not exist then create cookie
						setCookie("pushnotifPM", lowrunningbalNotifCnt, 2);
						pushNotifMsg(lowrunningbalNotif);
					  }
					}
				  });
				}
			}
			//--- End Display Low Running Balance ---//
			
		});
	}
	
	//--- Load Classification data ---//
	function loadClassification(){
		$.post( "data/common_load_data.php", { tblName: "tbl_classification", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addClassification").empty();
			 $("#updateClassification").empty();
			 obj.forEach(function(item) {
				 $("#addClassification").append("<option value='"+item.classificationID+"'>"+item.name+"</option>");
				 $("#updateClassification").append("<option value='"+item.classificationID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load Category data ---//
	function loadCategory(){
		$.post( "data/common_load_data.php", { tblName: "tbl_category", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addCategory").empty();
			 $("#updateCategory").empty();
			 obj.forEach(function(item) {
				 $("#addCategory").append("<option value='"+item.categoryID+"'>"+item.name+"</option>");
				 $("#updateCategory").append("<option value='"+item.categoryID+"'>"+item.name+"</option>");
			});
			loadSubCat($("#addCategory").val());
		});
	}
	
	//--- Load Sub Category data ---//
	function loadSubCat(selCat){
		$.post( "data/common_load_subcat.php", { tblName: "tbl_subcategory", sortName: "name", selCat: selCat }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addsubCategory").empty();
			 $("#updatesubCategory").empty();
			 obj.forEach(function(item) {
				 $("#addsubCategory").append("<option value='"+item.subCategoryID+"'>"+item.name+"</option>");
				 $("#updatesubCategory").append("<option value='"+item.subCategoryID+"'>"+item.name+"</option>");
			});
			$("#addsubCategory").append("<option value='0'>N/A</option>");
			$("#updatesubCategory").append("<option value='0'>N/A</option>");
		});
	}
	
	//--- Set selected Sub Category based on Category ---//
	function setSubCat(selCat,selSubCat){
		$.post( "data/common_load_subcat.php", { tblName: "tbl_subcategory", sortName: "name", selCat: selCat }, function(result,status){
			
			var obj = JSON.parse(result);
			 $("#updatesubCategory").empty();
			 obj.forEach(function(item) {
				 if(selSubCat == item.subCategoryID){
					 $("#updatesubCategory").append("<option value='"+item.subCategoryID+"' selected>"+item.name+"</option>");
				 } else {
					 $("#updatesubCategory").append("<option value='"+item.subCategoryID+"'>"+item.name+"</option>");
				 }
			});
			$("#updatesubCategory").append("<option value='0'>N/A</option>");
		});
	}
	
	//--- Sub Category load when change Category on ADD PRODUCT ---//	
	$("#addCategory").change(function(e) {
		$.post( "data/common_load_subcat.php", { tblName: "tbl_subcategory", sortName: "name", selCat: $("#addCategory").val() }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addsubCategory").empty();
			 obj.forEach(function(item) {
				 $("#addsubCategory").append("<option value='"+item.subCategoryID+"'>"+item.name+"</option>");
			});
			$("#addsubCategory").append("<option value='0'>N/A</option>");
		});
	});
	
	//--- Sub Category load when change Category on UPDATE PRODUCT ---//	
	$("#updateCategory").change(function(e) {
		$.post( "data/common_load_subcat.php", { tblName: "tbl_subcategory", sortName: "name", selCat: $("#updateCategory").val() }, function(result,status){
			var obj = JSON.parse(result);
			 $("#updatesubCategory").empty();
			 obj.forEach(function(item) {
				 $("#updatesubCategory").append("<option value='"+item.subCategoryID+"'>"+item.name+"</option>");
			});
			$("#updatesubCategory").append("<option value='0'>N/A</option>");
		});
	});
	
	//--- Load Warehouse data ---//
	function loadWarehouse(){
		$.post( "data/common_load_data.php", { tblName: "tbl_warehouse", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addWarehouse").empty();
			 $("#updateWarehouse").empty();
			 obj.forEach(function(item) {
				 $("#addWarehouse").append("<option value='"+item.warehouseID+"'>"+item.name+"</option>");
				 $("#updateWarehouse").append("<option value='"+item.warehouseID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load Rack data ---//
	function loadRack(){
		$.post( "data/common_load_data.php", { tblName: "tbl_rack", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addRack").empty();
			 $("#updateRack").empty();
			 obj.forEach(function(item) {
				 $("#addRack").append("<option value='"+item.rackID+"'>"+item.name+"</option>");
				 $("#updateRack").append("<option value='"+item.rackID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load Season data ---//
	function loadSeason(){
		$.post( "data/common_load_data.php", { tblName: "tbl_season", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addSeason").empty();
			 $("#updateSeason").empty();
			 obj.forEach(function(item) {
				 $("#addSeason").append("<option value='"+item.seasonID+"'>"+item.name+"</option>");
				 $("#updateSeason").append("<option value='"+item.seasonID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load Color data ---//
	function loadColor(){
		$.post( "data/common_load_data.php", { tblName: "tbl_color", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addColor").empty();
			 $("#updateColor").empty();
			 obj.forEach(function(item) {
				 $("#addColor").append("<option value='"+item.colorID+"'>"+item.name+"</option>");
				 $("#updateColor").append("<option value='"+item.colorID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load UOM data ---//
	function loadUOM(){
		$.post( "data/common_load_data.php", { tblName: "tbl_uom", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addUOM").empty();
			 $("#updateUOM").empty();
			 obj.forEach(function(item) {
				 $("#addUOM").append("<option value='"+item.uomID+"'>"+item.name+"</option>");
				 $("#updateUOM").append("<option value='"+item.uomID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load Gallery Images ---//
	function loadImgData(IDprod,imgGal){
		$.post( "data/prod_load_image.php", { prodID: IDprod}, function(result,status){
			var imgDiv = document.getElementById(imgGal);
			var concat = "";
			imgDiv.innerHTML = '';
			
			
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				concat += "<div class='col-sm-3 imgGal' style='text-align: center;'><a href='"+item.path+"' data-toggle='lightbox' data-title='Preview' data-gallery='gallery'><img src='"+item.path+"' class='img-fluid mb-2' /></a>";
				if (imgGal == "imgGallery") { 
					concat += "<br/><a data-id='"+item.imgID+"' data-name='"+item.path+"' class='deleteImage'>Removed</a>"; 
				}
				concat += "</div>";
				imgDiv.innerHTML = concat;
			})

		});
	}

	//--- Initial load data to table ---//
	loadData("load");
	
	//--- Make QR ---//
	makeQrCode("addprodCode","addgenQRCode");
	
	//--- Initial load Dropdown data ---//
	loadClassification();
	loadCategory();
	loadWarehouse();
	loadRack();
	loadSeason();
	loadColor();
	loadUOM();

	//--- Add Item ---//	
	$("#AddForm").submit(function(){
		
		$.post( $("#AddForm").attr("action"), $("#AddForm :input").serializeArray(), function(result){
				if (result == 'Success'){
					loadData();
					loadClassification();
					loadCategory();
					loadWarehouse();
					loadRack();
					loadSeason();
					loadColor();
					loadUOM();
					document.getElementById("AddForm").reset();
					$("#modal-default-add").modal("hide");
					successNotifNoload("Product successfully saved!");
				}
				else {
					errorNotifNoload(result);
				}
			});

		return false;
	});
	
	//--- Gallery Image Upload ---//
	$("#upload").click(function(){
		if( document.getElementById("uploadPhoto").files.length == 0 ){
			errorNotifNoload("No files selected! Please try it again.");
		} else {
			var file_data = $("#uploadPhoto").prop("files")[0]; // Getting the properties of file from file field
			var form_data = new FormData(); // Creating object of FormData class
			form_data.append("file", file_data); // Appending parameter named file with properties of file_field to form_data
			form_data.append("prodID", document.getElementById("prodID").value);
			$.ajax({
				url: "data/prod_upload_image.php", // Upload Script
				dataType: 'script',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data, // Setting the data attribute of ajax with file_data
				type: 'post',
				beforeSend : function() {
					//document.querySelector("#progressIndicator").setAttribute("style", "display: flex;");	
				},
				success: function(data) {
					document.getElementById("uploadImgGal").src = "img/default-company.jpg";
					document.getElementById("uploadPhoto").value = "";
					//document.querySelector("#progressIndicator").setAttribute("style", "display: none;");
					successNotifNoload("Product Image successfully uploaded!");
					
					// DISPLAY IMAGES HERE
					loadImgData(document.getElementById("prodID").value,"imgGallery");
				},
				error: function(xhr, status, error) {
					errorNotifNoload("Upload failed or invalid file format! Please try it again.");
				}			
			});
		}
	});
	//--- Gallery Image Upload ---//
	
	//--- Preview Image when selected ---//	
	$("#uploadPhoto").change(function(e) {

		for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
			
			var file = e.originalEvent.srcElement.files[i];
			
			var img = document.getElementById("uploadImgGal");
			var reader = new FileReader();
			reader.onloadend = function() {
				 img.src = reader.result;
			}
			reader.readAsDataURL(file);
		}
		
	});
	
	//--- View Item ---//	
	$(document).delegate(".viewItem", "click", function() {

		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/prod_get_data.php", { itemID: dataID }, function(result){
				var obj = JSON.parse(result);
				$("#prodCode").text(obj[0].prodCode);
				$("#prodName").text(obj[0].prodName);
				$("#shortDesc").text(obj[0].shortDesc);
				$("#fullDesc").text(obj[0].fullDesc);
				$("#Classification").text(obj[0].clas);
				$("#Category").text(obj[0].cat);
				$("#subCategory").text(obj[0].subcat);
				$("#Warehouse").text(obj[0].wrh);
				$("#Rack").text(obj[0].rak);
				$("#Season").text(obj[0].ssn);
				$("#Color").text(obj[0].clr);
				$("#UOM").text(obj[0].uom);
				$("#highQty").text(obj[0].highQty);
				$("#lowQty").text(obj[0].lowQty);
				$("#runningBal").text(obj[0].runningBal);
				$("#origPrice").text(obj[0].origPrice);
				$("#salePrice").text(obj[0].salePrice);
				$("#discountedPrice").text(obj[0].discountedPrice);
				
				$("#viewLastUpdateOrig").text("Last Update: " + new Date(obj[0].lastUpdateOrigPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
				
				$("#viewLastUpdateSale").text("Last Update: " + new Date(obj[0].lastUpdateSalePrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));

				$("#viewLastUpdateDiscount").text("Last Update: " + new Date(obj[0].lastUpdateDiscountedPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
				
				$("#viewID").attr('data-id',dataID);
				makeQrCodeView(obj[0].prodCode);
				loadImgData(dataID,"imgGalleryView");
			});
			
	});
	
	//--- Get Item to Update ---//	
	$(document).delegate(".updateItem", "click", function() {
		
			//Hide Modal
			$("#modal-default-view").modal("hide");
			$("#modal-default-view").on('hidden.bs.modal', () => {$("#modal-default-update").modal();});

		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/prod_get_data.php", { itemID: dataID }, function(result){
				var obj = JSON.parse(result);
				$("#updateprodCode").val(obj[0].prodCode);
				$("#updateprodName").val(obj[0].prodName);
				$("#updateshortDesc").val(obj[0].shortDesc);
				$("#updatefullDesc").val(obj[0].fullDesc);
				$("#updateClassification").val(obj[0].classificationID);
				$("#updateCategory").val(obj[0].categoryID);
				$("#updatesubCategory").val(obj[0].subCategoryID);
				$("#updateWarehouse").val(obj[0].warehouseID);
				$("#updateRack").val(obj[0].rackID);
				$("#updateSeason").val(obj[0].seasonID);
				$("#updateColor").val(obj[0].colorID);
				$("#updateUOM").val(obj[0].uomID);
				$("#updatehighQty").val(obj[0].highQty);
				$("#updatelowQty").val(obj[0].lowQty);
				$("#updaterunningBal").val(obj[0].runningBal);
				$("#updateorigPrice").val(obj[0].origPrice);
				$("#updatesalePrice").val(obj[0].salePrice);
				$("#updatediscountedPrice").val(obj[0].discountedPrice);
				
				$("#updateLastUpdateOrig").text("Last Update: " + new Date(obj[0].lastUpdateOrigPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
				
				$("#updateLastUpdateSale").text("Last Update: " + new Date(obj[0].lastUpdateSalePrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));

				$("#updateLastUpdateDiscount").text("Last Update: " + new Date(obj[0].lastUpdateDiscountedPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
				
				$("#updateOrigP").val(obj[0].origPrice);
				$("#updateSaleP").val(obj[0].salePrice);
				$("#updateDiscountP").val(obj[0].discountedPrice);
				
				$("#updateID").val(dataID);
				setSubCat(obj[0].categoryID,obj[0].subCategoryID);
				makeQrCode("updateprodCode","updategenQRCode");
			});
			
	});
	
	//--- Get Item Gallery ---//	
	$(document).delegate(".galleryItem", "click", function() {
		
		    var dataID = $(this).attr('data-id'); //get the item ID
			$("#prodID").val(dataID);
			document.getElementById("uploadImgGal").src = "img/default-company.jpg";
			loadImgData(dataID,"imgGallery");
			
	});
	
	//--- Update Item ---//	
	$("#UpdateForm").submit(function(){

		$.post( $("#UpdateForm").attr("action"), $("#UpdateForm :input").serializeArray(), function(result){
			if (result == 'Success'){
				loadData();
				document.getElementById("UpdateForm").reset();
				$("#modal-default-update").modal("hide");
				successNotifNoload("Product successfully updated!");
			}
			else {
				errorNotifNoload(result);
			}
		});
		
		return false;
	});
	
	//--- Delete Item ---//	
	$(document).delegate(".deleteItem", "click", function() {

		if (confirm("Are you sure you want to delete this record?")) {
		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/common_delete_data.php", { tblName: "tbl_product", fieldName: "prodID", notifName: "Product", itemID: dataID }, function(result,status){
				if (result == 'Success'){
					loadData();
					successNotifNoload("Product successfully deleted!");
				} 
				else {
					errorNotifNoload(result);
				}
			});
			
		}
		
	});
	
	//--- Delete Image ---//	
	$(document).delegate(".deleteImage", "click", function() {

		if (confirm("Are you sure you want to delete this image?")) {
		    var imgID = $(this).attr('data-id'); //get the image ID
			var imgPath = $(this).attr('data-name'); //get the image path
			$.post( "data/prod_delete_image.php", { tblName: "tbl_image", fieldName: "imgID", notifName: "Image", itemID: imgID, itemPath: imgPath }, function(result,status){
				if (result == 'Success'){
					loadImgData(document.getElementById("prodID").value,"imgGallery");
					successNotifNoload("Image successfully deleted!");
				} 
				else {
					errorNotifNoload(result);
				}
			});
			
		}
		
	});
  
	//--- Clear form when closed ---//
	resetForm("#closeAddForm","#AddForm");
	resetForm("#closeAddFormX","#AddForm");
	resetForm("#closeUpdateForm","#UpdateForm");
	resetForm("#closeUpdateFormX","#UpdateForm");
	resetForm("#closegalleryAddForm","#galleryAddForm");
	resetForm("#closegalleryAddFormX","#galleryAddForm");
	
	
	//--- Generate QR on Add ---//
	$("#addprodCode").on("blur", function () {
		makeQrCode("addprodCode","addgenQRCode");
	}).on("keydown", function (e) {
		if (e.keyCode == 13) {
		  makeQrCode("addprodCode","addgenQRCode");
		}
	});

	//--- Generate QR on Update ---//
	$("#updateprodCode").on("blur", function () {
		makeQrCode("updateprodCode","updategenQRCode");
	}).on("keydown", function (e) {
		if (e.keyCode == 13) {
		  makeQrCode("updateprodCode","updategenQRCode");
		}
	});
	
	//-- Auto close low running balance warning --//
	setTimeout(function(){
		document.getElementById("closelowbalList").click();
	}, 300000);

	//-- Cookie Functions --//
	function setCookie(cname,cvalue,hours) {
		const d = new Date();
		d.setTime(d.getTime() + (hours*60*60*1000));
		let expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function getCookie(cname) {
		let name = cname + "=";
		let decodedCookie = decodeURIComponent(document.cookie);
		let ca = decodedCookie.split(';');
		for(let i = 0; i < ca.length; i++) {
		  let c = ca[i];
		  while (c.charAt(0) == ' ') {
			c = c.substring(1);
		  }
		  if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		  }
		}
		return "";
	}
	//-- Cookie Functions --//
	
	//-- Push Notification Message --//
	function pushNotifMsg(lowrunningbalNotif) {
		/*new Notification("Invento: Low Running Balance!", { 
		  body: lowrunningbalNotif,
		  icon: "../dist/img/InventoLogo.png"
		})*/
		navigator.serviceWorker.ready.then( function( registration ) {
		  registration.showNotification("Invento - Product Management: Low Running Balance!", { 
			body: lowrunningbalNotif,
			icon: "img/InventoLogo.png"
		  });
		});
	}
	
});
</script>