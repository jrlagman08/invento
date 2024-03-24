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
            <h1>Repackage Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Repackage Product</li>
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
                      <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-add"><i class="fas fa-plus"></i> &nbsp;Add Repackage</button>
                    </h3>
                  </div>
                  <div class="col-6" style="text-align: right;">
                    <strong>Threshold Color Legend:</strong> &nbsp;&nbsp;<span style="color: green; font-weight: bold;">High</span> &nbsp;|&nbsp; <span style="color: blue; font-weight: bold;"> Normal</span> &nbsp;|&nbsp; <span style="color: red; font-weight: bold;">Low</span>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="prodmngtTable" class="table table-bordered table-striped">
                  <!-- Query data will be listed here - realtime update -->
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

            <form id="galleryAddForm">
              <div class="modal-header">
                <h4 class="modal-title">Product Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Upload Image</label><br/>
                      <sub>(Recommended Size: 500 x 500 pixels)</sub>
                      <img id="uploadImgGal" src="img/default-company.jpg" style="height: 200px; width: 200px; border: 1px solid; object-fit: contain;" />
                      </br></br>
                      <input type="file" id="photo" /></br>
                      <div id="progressIndicator" class="progress progress-xs" style="display: none;">
                        <div id="indicatorBar" class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                        </div>
                      </div>
                      <br/>
                      <button type="button" id="upload" class="btn btn-success">Upload Image</button>
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">

                      <div class="col-12">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h4 class="card-title">Image Gallery</h4>
                          </div>
                          <div class="card-body">
                            <div class="row" id="insertImages">
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
                <input id="galleryid" class="form-control" type="hidden">
                <button type="button" id="closeFormBtn" class="btn btn-default" data-dismiss="modal">Close</button>
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

            <form id="productAddForm">
              <div class="modal-header">
                <h4 class="modal-title">Add Repackage</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Product Code</label>
                      <div class="row">
                        <div class="col-sm-10"><input type="text" id="addprodCode" class="form-control" placeholder="Enter product code" required></div>
                        <div class="col-sm-2"><button type="button" id="addgenQRCode" class="btn btn-default" data-toggle="modal" data-target="#modal-default-qrcode">QRCode</button></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" id="addprodName" class="form-control" placeholder="Enter product name" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Short Description</label>
                      <textarea id="addshortDesc" class="form-control" rows="3" placeholder="Enter short description" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Full Description</label>
                      <textarea id="addfullDesc" class="form-control" rows="3" placeholder="Enter full description"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Classification</label>
                      <select id="addClassification" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Category</label>
                      <select id="addCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Sub Category</label>
                      <select id="addsubCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Warehouse</label>
                      <select id="addWarehouse" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Rack</label>
                      <select id="addRack" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Season</label>
                      <select id="addSeason" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Color</label>
                      <select id="addColor" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Unit of Measure</label>
                      <select id="addUOM" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>High Threshold</label>
                      <input type="number" id="addhighQty" onKeyPress="if(this.value.length==7) return false;" class="form-control" placeholder="Enter high threshold" min="0" max="100" value="0" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Low Threshold</label>
                      <input type="number" id="addlowQty" onKeyPress="if(this.value.length==7) return false;" class="form-control" placeholder="Enter low threshold" min="0" max="100" value="0" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Running Balance</label>
                      <input type="number" id="addrunningBal" class="form-control" value="0" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Original Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="addorigPrice" class="form-control" onKeyPress="if(this.value.length==7) return false;" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Sale Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="addsalePrice" class="form-control" onKeyPress="if(this.value.length==7) return false;">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Discounted Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="adddiscountedPrice" class="form-control" onKeyPress="if(this.value.length==7) return false;">
                    </div>
                  </div>
                </div>

                <br/>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" id="addstoreVisible" type="checkbox" checked>
                        <label class="form-check-label"><b>Store Visible</b></label>
                      </div>
                    </div>
                  </div>
                </div>

                <br/>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="row"><h4 class="modal-title">Product Item</h4></div>
                        <br/>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <select id="addProdItemName" class="form-control"></select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <input id="addGroup" type="text" class="form-control" placeholder="Enter repack number">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <input id="addQty" type="text" class="form-control" placeholder="Enter quantity">
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <button type="button" class="btn btn-block btn-success" id="addProd">Add/Save Product</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table">
                          <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Repack Group</th>
                            <th>Quantity</th>
                            <th style="text-align: right;">Action</th>
                          </tr>
                          </thead>
                          <tbody id="prodItemList">
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeFormBtn" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Repackage</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add Product Form Modal -->

      <!-- Update Product Form Modal -->
      <div class="modal fade" id="modal-default-edit">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="productUpdateForm">
              <div class="modal-header">
                <h4 class="modal-title">Edit Repackage</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Product Code</label>
                      <div class="row">
                        <div class="col-sm-10"><input type="text" id="updateprodCode" class="form-control" placeholder="Update product code" required></div>
                        <div class="col-sm-2"><button type="button" id="updategenQRCode" class="btn btn-default" data-toggle="modal" data-target="#modal-default-qrcode">QRCode</button></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" id="updateprodName" class="form-control" placeholder="Update product name" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Short Description</label>
                      <textarea id="updateshortDesc" class="form-control" rows="3" placeholder="Update short description" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Full Description</label>
                      <textarea id="updatefullDesc" class="form-control" rows="3" placeholder="Update full description"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Classification</label>
                      <select id="updateClassification" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Category</label>
                      <select id="updateCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Sub Category</label>
                      <select id="updatesubCategory" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Warehouse</label>
                      <select id="updateWarehouse" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Rack</label>
                      <select id="updateRack" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Season</label>
                      <select id="updateSeason" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Color</label>
                      <select id="updateColor" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Unit of Measure</label>
                      <select id="updateUOM" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>High Threshold</label>
                      <input type="number" id="updatehighQty" onKeyPress="if(this.value.length==7) return false;" class="form-control" placeholder="Enter high quantity" min="0" max="100" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Low Threshold</label>
                      <input type="number" id="updatelowQty" onKeyPress="if(this.value.length==7) return false;" class="form-control" placeholder="Enter low quantity" min="0" max="100" step="1"  required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Running Balance</label>
                      <input type="number" id="updaterunningBal" class="form-control" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Original Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="updateorigPrice" class="form-control" onKeyPress="if(this.value.length==7) return false;" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Sale Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="updatesalePrice" class="form-control" onKeyPress="if(this.value.length==7) return false;">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Discounted Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" id="updatediscountedPrice" class="form-control" onKeyPress="if(this.value.length==7) return false;">
                    </div>
                  </div>
                </div>

                <br/>
                <div class="row">
                  <div class="col-sm">
                    <!-- checkbox -->
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" id="updatestoreVisible" type="checkbox" checked>
                        <label class="form-check-label"><b>Store Visible</b></label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Repack Group</th>
                      <th style="text-align: right;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="prodItemListForUpdate">
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <input id="productidupdate" class="form-control" type="hidden">
                <input id="productCodeupdate" class="form-control" type="hidden">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                  <label>Original Price</label>: ₱<span id="origPrice"></span>
                </div>
                <div class="col-sm-4">
                  <label>Sale Price</label>: ₱<span id="salePrice"></span>
                </div>
                <div class="col-sm-4">
                  <label>Discounted Price</label>: ₱<span id="discountedPrice"></span>
                </div>
              </div>

              <br/>
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" id="storeVisible" type="checkbox" onclick="return false;">
                      <label class="form-check-label"><b>Store Visible</b></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title">Image Gallery</h4>
                    </div>
                    <div class="card-body">
                      <div class="row" id="insertImagesView">
                        <!---- insert image gallery ---->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="productidview" class="btn btn-primary updateItem" data-id="" data-toggle="modal" data-target="#modal-default-edit" data-dismiss="modal">Edit Product</button>
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