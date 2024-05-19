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
            <h1>Inventory Counts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Inventory Counts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-add"><i class="fas fa-plus"></i> &nbsp;Add Inventory Counts</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="dataTableRec" class="table table-striped">
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

      <!-- Add Inventory Counts Form Modal -->
      <div class="modal fade" id="modal-default-add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="inventorycntAddForm">
              <div class="modal-header">
                <h4 class="modal-title">Add Inventory Counts</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Received Date</label>
                        <div class="input-group date" id="addInventoryDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" id="addInventoryDateInput" data-target="#addInventoryDate" placeholder="Select date & time" required/>
                            <div class="input-group-append" data-target="#addInventoryDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>User</label>
                      <select id="addSelectUser" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea id="addNotes" class="form-control" rows="2" placeholder="Enter notes"></textarea>
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
                              <select id="addProdItemName" class="form-control select2"></select> &nbsp;&nbsp;<a data-toggle="modal" data-target="#modal-default-qrcodeScanner" style="cursor: pointer; color: red; text-decoration: underline;" onclick="return startQRScanner();">Scan QR Code</a>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <input id="addSysCnt" type="text" class="form-control" placeholder="Enter system count">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <input id="addInvCnt" type="text" class="form-control" placeholder="Enter inventory count">
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
                              <th>Product Name/Code</th>
                              <th>System Count</th>
                              <th>Inventory Count</th>
                              <th style="text-align: right;">Action</th>
                            </tr>
                          </thead>
                          <tbody id="addprodItemList">
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
                <div class="row" style="width: 100%;">
                  <div class="col-sm-6">
                    <button type="button" id="closeFormBtn" class="btn btn-default" data-dismiss="modal">Close</button> &nbsp;&nbsp; <button type="submit" name="addBtn" class="btn btn-primary">Save</button>
                  </div>
                  <div class="col-sm-6" style="text-align: right;">
                    <button type="submit" name="addpostBtn" class="btn btn-primary">Post</button> 
                  </div>
                </div>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add Inventory Counts Form Modal -->

      <!-- Update Inventory Counts Form Modal -->
      <div class="modal fade" id="modal-default-edit">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="inventorycntUpdateForm">
              <div class="modal-header">
                <h4 class="modal-title">Edit Inventory Counts</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Received Date</label>
                        <div class="input-group date" id="updateInventoryDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" id="updateInventoryDateInput" data-target="#updateInventoryDate" placeholder="Select date & time" required/>
                            <div class="input-group-append" data-target="#updateInventoryDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>User</label>
                      <select id="updateSelectUser" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Posted</label>
                      <input type="text" id="updatePosted" class="form-control" style="font-weight: bold;" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea id="updateNotes" class="form-control" rows="2" placeholder="Enter notes"></textarea>
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
                              <input type="text" id="updateProdname" class="form-control" placeholder="Enter product code">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <input id="updateSysCnt" type="text" class="form-control" placeholder="Enter system count">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <input id="updateInvCnt" type="text" class="form-control" placeholder="Enter inventory count">
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
                              <th>System Count</th>
                              <th>Inventory Count</th>
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
                <input id="inventorycntidupdate" class="form-control" type="hidden">
                <div class="row" style="width: 100%;">
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> &nbsp;&nbsp; <button type="submit" name="saveBtn" class="btn btn-primary">Save</button>
                  </div>
                  <div class="col-sm-6" style="text-align: right;">
                    <button type="submit" name="savepostBtn" class="btn btn-primary">Post</button>
                  </div>
                </div>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Update Inventory Counts Form Modal -->


      <!-- View Inventory Counts Form Modal -->
      <div class="modal fade" id="modal-default-view">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">View Inventory Counts</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Inventory Date</label>: <span id="inventoryDate"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>User</label>: <span id="viewSelectUser"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Posted</label>: <span id="posted" style="font-weight: bold;"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Notes</label>: <span id="notes"></span>
                    </div>
                  </div>
                </div>

                <br/>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="row"><h4 class="modal-title">Product Item</h4></div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table">
                          <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>System Count</th>
                                <th>Inventory Count</th>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="inventorycntidview" class="btn btn-primary updateItem" data-id="" data-toggle="modal" data-target="#modal-default-edit" data-dismiss="modal">Edit Inventory Counts</button>
              </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- View Item Received Form Modal -->

      <!-- QR Code Scanner Modal -->
      <div class="modal fade" id="modal-default-qrcodeScanner" style="z-index: 9999;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">QR Code Scanner</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div style="width: 300px" id="reader"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- QR Code Scanner -->


    </section>
    <!-- /.content -->
 
<?php
	//Footer
	include_once('includes/footer.php'); 
?> 