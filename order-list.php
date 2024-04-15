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
            <h1>Order List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Order List</li>
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
                  <button type="button" id="addOrderBtn" name="addOrderBtn" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-add"><i class="fas fa-plus"></i> &nbsp;Add Order</button>
                </h3>
              </div>
              <!-- /.card-header -->
               <div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Customer</th>
					  <th>Payment Details</th>
					  <th>Grand Total</th>
					  <th>Cashier</th>
                      <th style="width: 40px" class="no-sort">Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataTable">
                    <!-- Query data will be listed here - realtime update -->
                  </tbody>
				  <tfoot>
					<tr>
					  <th>Order Date</th>
                      <th>Order No.</th>
                      <th>Customer</th>
					  <th>Payment Details</th>
					  <th>Grand Total</th>
					  <th>Cashier</th>
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

      <!-- Add Order List Form Modal -->
      <div class="modal fade" id="modal-default-add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="AddForm" action="data/orderlist_add_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Add Order</h4>
                <button type="button" id="closeAddFormX" name="closeAddFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Customer <span class="req">*</span></label>
                      <select id="addCustomer" name="addCustomer" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Order Number <span class="req">*</span></label>
                      <input type="text" id="addOR" name="addOR" class="form-control" placeholder="Enter order number" maxlength="50" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Order Date <span class="req">*</span></label>
                      <div class="input-group date" id="addOrderDate" name="addOrderDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="addOrderDateInput" name="addOrderDateInput" data-target="#addOrderDate" placeholder="Select date & time" required/>
                        <div class="input-group-append" data-target="#addOrderDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Grand Total <span class="req">*</span></label>
                      <input type="number" id="addGrandTotal" name="addGrandTotal" class="form-control" placeholder="0" value="0" readonly>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Payment <span class="req">*</span></label>
                      <select id="addPayment" name="addPayment" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Payment Reference <span class="req">*</span></label>
                      <input type="text" id="addPaymentRef" name="addPaymentRef" class="form-control" placeholder="Enter payment reference" maxlength="50" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Amount Paid <span class="req">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
					  <input type="number" id="addAmountPaid" name="addAmountPaid" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Balance <span class="req">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
					  <input type="number" id="addBalance" name="addBalance" class="form-control" placeholder="0" value="0" readonly>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Cashier <span class="req">*</span></label>
                      <select id="addCashier" name="addCashier" class="form-control"></select>
                    </div>
                  </div>
                </div>
				
				<!---- Add Product Items ---->
				<br/>
                <div class="row">
                  <div class="col-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4 class="card-title">Product Item(s)</h4>
                      </div>
                      <div class="card-body">
					  
							<div class="row">
							  <div class="col-sm-3">
								<div class="form-group">
								  <select id="addProdItemName" class="form-control select2" style="width: 100%;"></select>
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="addOrigPrice" name="addOrigPrice" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter original price">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="addQty" name="addQty" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter quantity">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <button type="button" class="btn btn-block btn-success" id="addprodItemBtn" name="addprodItemBtn">Add Product Item</button>
								</div>
							  </div>
							</div>
							<div class="row">
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="addSalePrice" name="addSalePrice" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter sale price">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="addDiscount" name="addDiscount" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter discount">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="addDiscountedPrice" name="addDiscountedPrice" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter discounted price">
								</div>
							  </div>
							</div>
							<table class="table" id="addprodItemTbl">
							  <thead>
							  <tr>
								 <th>Product Name</th>
								 <th>Original Price</th>
								 <th>Quantity</th>
								 <th>Sale Price</th>
								 <th>Discount</th>
								 <th>Discounted Price</th>
								 <th>Total Price</th>
								 <th style="width: 40px">Action</th>
							  </tr>
							  </thead>
							  <tbody>
							  </tbody>
							</table>

                      </div>
                    </div>
                  </div>
                </div>
				<!---- Add Product Items ---->
				

              </div>
              <div class="modal-footer justify-content-between">
				<input type="hidden" id="addprodList" name="addprodList" />
                <button type="button" id="closeAddForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Order</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add Order Form Modal -->

      <!-- Update Order List Form Modal -->
      <div class="modal fade" id="modal-default-update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="UpdateForm" action="data/orderlist_update_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Update Order</h4>
                <button type="button" id="closeUpdateFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Customer <span class="req">*</span></label>
                      <select id="updateCustomer" name="updateCustomer" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Order Number <span class="req">*</span></label>
					  <input type="text" id="updateOR" name="updateOR" class="form-control" placeholder="Enter order number" maxlength="50" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Order Date <span class="req">*</span></label>
                      <div class="input-group date" id="updateOrderDate" name="updateOrderDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="updateOrderDateInput" name="updateOrderDateInput" data-target="#updateOrderDate" placeholder="Select date & time" required/>
                        <div class="input-group-append" data-target="#updateOrderDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Grand Total <span class="req">*</span></label>
                      <input type="number" id="updateGrandTotal" name="updateGrandTotal" class="form-control" placeholder="0" value="0" readonly>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Payment <span class="req">*</span></label>
                      <select id="updatePayment" name="updatePayment" class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Payment Reference <span class="req">*</span></label>
                      <input type="text" id="updatePaymentRef" name="updatePaymentRef" class="form-control" placeholder="Enter payment reference" maxlength="50" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Amount Paid <span class="req">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
					  <input type="number" id="updateAmountPaid" name="updateAmountPaid" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Balance <span class="req">*</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
					  <input type="number" id="updateBalance" name="updateBalance" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Cashier <span class="req">*</span></label>
                      <select id="updateCashier" name="updateCashier" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <!---- Update Product Items ---->
				<br/>
                <div class="row">
                  <div class="col-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4 class="card-title">Product Item(s)</h4>
                      </div>
                      <div class="card-body">
					  
							<div class="row">
							  <div class="col-sm-3">
								<div class="form-group">
								  <select id="updateProdItemName" class="form-control select2" style="width: 100%;"></select>
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="updateOrigPrice" name="updateOrigPrice" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter original price">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="updateQty" name="updateQty" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter quantity">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <button type="button" class="btn btn-block btn-success" id="updateprodItemBtn" name="updateprodItemBtn">Add Product Item</button>
								</div>
							  </div>
							</div>
							<div class="row">
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="updateSalePrice" name="updateSalePrice" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter sale price">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="updateDiscount" name="updateDiscount" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter discount">
								</div>
							  </div>
							  <div class="col-sm-3">
								<div class="form-group">
								  <input type="number" id="updateDiscountedPrice" name="updateDiscountedPrice" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter discounted price">
								</div>
							  </div>
							</div>
							<table class="table" id="updateprodItemTbl">
							  <thead>
							  <tr>
								 <th>Product Name</th>
								 <th>Original Price</th>
								 <th>Quantity</th>
								 <th>Sale Price</th>
								 <th>Discount</th>
								 <th>Discounted Price</th>
								 <th>Total Price</th>
								 <th style="width: 40px">Action</th>
							  </tr>
							  </thead>
							  <tbody id="updateprodItemTblBody">
							  </tbody>
							</table>

                      </div>
                    </div>
                  </div>
                </div>
				<!---- Update Product Items ---->

              </div>
              <div class="modal-footer justify-content-between">
                <input id="updateID" name="updateID" class="form-control" type="hidden">
                <button type="button" id="closeUpdateForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Update Order Form Modal -->


      <!-- View Order List Form Modal -->
      <div class="modal fade" id="modal-default-view">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">View Order</h4>
                <button type="button" id="closeViewFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Customer</label>: <span id="viewCustomer"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Order Number</label>: <span id="viewOR"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Order Date</label>: <span id="viewOrderDate"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Grand Total</label>: <span id="viewGrandTotal"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Payment</label>: <span id="viewPayment"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Payment Reference</label>: <span id="viewPaymentRef"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Amount Paid</label>: <span id="viewAmountPaid"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Balance</label>: <span id="viewBalance"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Cashier</label>: <span id="viewCashier"></span>
                    </div>
                  </div>
                </div>
				
				<!---- View Product Items ---->
				<br/>
                <div class="row">
                  <div class="col-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4 class="card-title">Product Item(s)</h4>
                      </div>
                      <div class="card-body">
					  
							<table class="table">
							  <thead>
							  <tr>
								  <th>Product Name</th>
								  <th>Original Price</th>
								  <th>Quantity</th>
								  <th>Sale Price</th>
								  <th>Discount</th>
								  <th>Discounted Price</th>
								  <th>Total Price</th>
							  </tr>
							  </thead>
							  <tbody id="viewprodItemTblBody">
							  </tbody>
							</table>

                      </div>
                    </div>
                  </div>
                </div>
				<!---- View Product Items ---->

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeViewForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="viewID" class="btn btn-primary updateItem" data-id="" data-toggle="modal" data-target="#modal-default-update" data-dismiss="modal">Update Order</button>
              </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- View supplier Form Modal -->


    </section>
    <!-- /.content -->
	
<?php
	//Footer
	include_once('includes/footer.php'); 
?>   


<!-- Custom script -->
<script>
$(document).ready(function() {
	
	const addprodMap = new Map();
	const updateprodMap = new Map();

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
	
	//Date and time picker
    $('#addOrderDate').datetimepicker({ icons: { time: 'far fa-clock' } });
    $('#updateOrderDate').datetimepicker({ icons: { time: 'far fa-clock' } });
	
	//--- Load data to table ---//
	function loadData(){
		$.post( "data/orderlist_load_data.php", function(result,status){
			table.clear();
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				table.row.add([
					new Date(item.orderDate).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""), 
					item.orderNum, 
                    item.cname, 
					item.pname, 
                    item.grandTotal,
					item.cashier,
					"<div class='btn-group btn-group-sm'><a href='#' class='btn btn-info viewItem' data-id="+item.orderID+" data-toggle='modal' data-target='#modal-default-view' title='View'><i class='fas fa-eye'></i></a><a href='#' class='btn btn-warning updateItem' data-id="+item.orderID+" data-toggle='modal' data-target='#modal-default-update' title='Update'><i class='fas fa-pen'></i></a><a href='#' class='btn btn-danger deleteItem' data-id="+item.orderID+" title='Delete'><i class='fas fa-trash'></i></a></div>"])
			})
			table.draw(false);
		});
	}
	
	//--- Load Customer data ---//
	function loadCustomer(){
		$.post( "data/common_load_data.php", { tblName: "tbl_customer", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addCustomer").empty();
			 $("#updateCustomer").empty();
			 obj.forEach(function(item) {
				 $("#addCustomer").append("<option value='"+item.customerID+"'>"+item.name+"</option>");
				 $("#updateCustomer").append("<option value='"+item.customerID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load Paymemt data ---//
	function loadPayment(){
		$.post( "data/common_load_data.php", { tblName: "tbl_payment", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addPayment").empty();
			 $("#updatePayment").empty();
			 obj.forEach(function(item) {
				 $("#addPayment").append("<option value='"+item.paymentID+"'>"+item.name+"</option>");
				 $("#updatePayment").append("<option value='"+item.paymentID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Load Cashier data ---//
	function loadCashier(){
		$.post( "data/common_load_data.php", { tblName: "tbl_user", sortName: "fname" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addCashier").empty();
			 $("#updateCashier").empty();
			 obj.forEach(function(item) {
				 $("#addCashier").append("<option value='"+item.userID+"'>"+item.fname +" "+item.lname+"</option>");
				 $("#updateCashier").append("<option value='"+item.userID+"'>"+item.fname +" "+item.lname+"</option>");
			})
		});
	}

	//--- Initial load data to table ---//
	loadData();
	
	//--- Initial load Dropdown data ---//
	loadCustomer();
	loadPayment();
	loadCashier();

	//--- Add Item ---//	
	$("#AddForm").submit(function(){
		
		const addprodListStr = JSON.stringify(Array.from(addprodMap.entries()));
		document.getElementById("addprodList").value = addprodListStr;
		
		$.post( $("#AddForm").attr("action"), $("#AddForm :input").serializeArray(), function(result){
				if (result == 'Success'){
					loadData();
					loadCustomer();
					loadPayment();
					loadCashier();
					document.getElementById("AddForm").reset();
					$("#modal-default-add").modal("hide");
					successNotifNoload("Order successfully saved!");
				}
				else {
					errorNotifNoload(result);
				}
			});

		return false;
	});
	
	//--- View Item ---//	
	$(document).delegate(".viewItem", "click", function() {

		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/orderlist_get_data.php", { itemID: dataID }, function(result){
				var obj = JSON.parse(result);
				$("#viewCustomer").text(obj[0].cname);
				$("#viewOR").text(obj[0].orderNum);
				$("#viewOrderDate").text(new Date(obj[0].orderDate).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
				$("#viewGrandTotal").text(obj[0].grandTotal);
				$("#viewPayment").text(obj[0].pname);
				$("#viewPaymentRef").text(obj[0].paymentref);
				$("#viewAmountPaid").text(obj[0].amountPaid);
				$("#viewBalance").text(obj[0].balance);
				$("#viewCashier").text(obj[0].cashier);
				$("#viewID").attr('data-id',dataID);
			});
			
			$.post( "data/order_proditem_get_data.php", { itemID: dataID }, function(result,status){
				var obj = JSON.parse(result);
				$("#viewprodItemTblBody").empty();
				obj.forEach(function(item) {
						var price = 0;
						if (item.salePrice != "" && item.salePrice != 0) {
							price = parseInt(item.salePrice) * parseInt(item.qty);
						} else {
							price = parseInt(item.origPrice) * parseInt(item.qty);
						}
					 $("#viewprodItemTblBody").append("<tr><td>" + item.prodName + "</td><td>" + item.origPrice + "</td><td>" + item.qty + "</td><td>" + item.salePrice + "</td><td>" + item.discountAmount + "</td><td>" + item.discountedPrice + "</td><td>" + price + "</td></tr>");
				});
			});
			
	});
	
	//--- Get Item to Update ---//	
	$(document).delegate(".updateItem", "click", function() {

		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/orderlist_get_data.php", { itemID: dataID }, function(result){
				var obj = JSON.parse(result);
				$("#updateCustomer").val(obj[0].customerID);
				$("#updateOR").val(obj[0].orderNum);
				$("#updateOrderDateInput").val(new Date(obj[0].orderDate).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
				$("#updateGrandTotal").val(obj[0].grandTotal);
				$("#updatePayment").val(obj[0].paymentID);
				$("#updatePaymentRef").val(obj[0].paymentref);
				$("#updateAmountPaid").val(obj[0].amountPaid);
				$("#updateBalance").val(obj[0].balance);
				$("#updateCashier").val(obj[0].userID);
				$("#updateID").val(dataID);
			});
			
	});
	
	//--- Update Item ---//	
	$("#UpdateForm").submit(function(){

		$.post( $("#UpdateForm").attr("action"), $("#UpdateForm :input").serializeArray(), function(result){
			if (result == 'Success'){
				loadData();
				document.getElementById("UpdateForm").reset();
				$("#modal-default-update").modal("hide");
				successNotifNoload("Order successfully updated!");
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
			$.post( "data/common_delete_data.php", { tblName: "tbl_order", fieldName: "orderID", notifName: "Order", itemID: dataID }, function(result,status){
				if (result == 'Success'){
					loadData();
					successNotifNoload("Order successfully deleted!");
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
	
	
	//-- Load product item list when clicking Add Repackage button --//
	$("#addOrderBtn").click(function(){
		// Clear Maps
		addprodMap.clear();
		
		$.post( "data/common_load_data.php", { tblName: "tbl_product", sortName: "prodName", availBal: 1 }, function(result,status){
			var obj = JSON.parse(result);
			$("#addProdItemName").empty();
			obj.forEach(function(item) {
				//data-id for prodCode
				 $("#addProdItemName").append("<option title='" + item.runningBal + "' value='" + item.prodID + "' data-id='" + item.prodCode + "' data-name='"+ item.prodName +"'>" + item.prodName +"  ("+ item.runningBal +")" + "</option>");
			});
		});
		
	});
	
	
	//-- Insert Product Item in the Table (Add) --//
	$("#addprodItemBtn").click(function(){
	
		var prod = document.getElementById('addProdItemName');
		var selectedIndex = prod.selectedIndex;
		var selectedProd = prod.options[selectedIndex].value;
		var runbal = prod.options[selectedIndex].title;
		var addOrigPrice = document.getElementById('addOrigPrice').value;
		var addQty = document.getElementById('addQty').value;
		var addSalePrice = document.getElementById('addSalePrice').value;
		var addDiscount = document.getElementById('addDiscount').value;
		var addDiscountedPrice = document.getElementById('addDiscountedPrice').value;
		var selprodname = prod.options[selectedIndex].getAttribute("data-name");
		var selProdCode = prod.options[selectedIndex].getAttribute("data-id");
            	
		if (addprodMap.has(selectedProd)) {
			errorNotifNoload(selprodname + " has been added already!");
		} else {
			if(addOrigPrice == "" || addQty == "" || addSalePrice == "" || addDiscount == "" || addDiscountedPrice == "") {
				errorNotifNoload("Please enter value on either group item and quantity fields!");
			} else if (parseInt(runbal) < parseInt(addQty)) {
				errorNotifNoload("Insufficient remaining balance! Product remaining quantity is "+runbal+".");
			} else {
				var runBalTotal = parseInt(runbal) - parseInt(addQty);
				const values = addOrigPrice +"|"+ addQty + "|" + addSalePrice +"|"+ addDiscount +"|"+ addDiscountedPrice +"|"+ runBalTotal;
				addprodMap.set(selectedProd, values);
				
				var price = 0;
				if (addSalePrice != "" && addSalePrice != 0) {
					price = parseInt(addSalePrice) * parseInt(addQty);
				} else {
					price = parseInt(addOrigPrice) * parseInt(addQty);
				}
				
				var curTotal = $("#addGrandTotal").val();
				
				$("#addGrandTotal").val(parseInt(price) + parseInt(curTotal));
				
				// Append the new row to the product item table
				var newRow = "<tr><td>" + selprodname + "</td><td>" + addOrigPrice + "</td><td>" + addQty + "</td><td>" + addSalePrice + "</td><td>" + addDiscount + "</td><td>" + addDiscountedPrice + "</td><td>" + price + "</td><td class='btn-group-sm'><a class='btn btn-danger removeprodItem' id=" + selectedProd + " data-name=" + price + "><i class='fas fa-trash'></i></a></td></tr>";
				$("#addprodItemTbl tbody").append(newRow);
				
				$("#addOrigPrice").val('');
				$("#addQty").val('');
				$("#addSalePrice").val('');
				$("#addDiscount").val('');
				$("#addDiscountedPrice").val('');

				successNotifNoload("Product Item successfully added!");
			}
		}
		
		//console.log([...addprodMap.entries()]);
		
	});
	
	
	//--- Remove Product Item on the table (Add) ---//	
	$(document).delegate(".removeprodItem", "click", function() {
		
		if (confirm("Are you sure you want to delete this product item?")) {
			addprodMap.delete($(this).attr('id'));
			$(this).parent().parent().remove();
			successNotifNoload("Product Item successfully deleted!");
			//console.log([...addprodMap.entries()]);
			
			var curTotal = $("#addGrandTotal").val();
			$("#addGrandTotal").val(parseInt(curTotal) - parseInt($(this).attr('data-name')));
			
		}
			
	});
	
	// Compute Amount Paid and Balance
	$("#addAmountPaid").keyup(function(e){
		if ($(this).val() != "") {
			var total = $("#addGrandTotal").val();
			var amount = $("#addAmountPaid").val();
			$("#addBalance").val(parseInt(total) -  parseInt(amount));
		} else if ($(this).val() == "") {
			$("#addBalance").val("0");
		}
    });
	
	// Initialize Search Dropdown
	$('.select2').select2();
	
});
</script>