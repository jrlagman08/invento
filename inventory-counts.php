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
                  <button type="button" id="addinvcntBtn" name="addinvcntBtn" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-add"><i class="fas fa-plus"></i> &nbsp;Add Inventory Counts</button>
                </h3>
              </div>
              <!-- /.card-header -->
               <div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Inventory Date</th>
                      <th>Notes</th>
                      <th>Posted</th>
					  <th>User</th>
                      <th style="width: 40px" class="no-sort">Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataTable">
                    <!-- Query data will be listed here - realtime update -->
                  </tbody>
				  <tfoot>
					<tr>
					  <th>Inventory Date</th>
                      <th>Notes</th>
                      <th>Posted</th>
					  <th>User</th>
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

      <!-- Add Inventory Count Form Modal -->
      <div class="modal fade" id="modal-default-add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="AddForm" action="data/orderlist_add_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Add Inventory Counts</h4>
                <button type="button" id="closeAddFormX" name="closeAddFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
				 <div class="col-sm-6">
                    <div class="form-group">
                      <label>Inventory Date <span class="req">*</span></label>
                      <div class="input-group date" id="addInvDate" name="addInvDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="addInvDateInput" name="addInvDateInput" data-target="#addInvDate" placeholder="Select date & time" required/>
                        <div class="input-group-append" data-target="#addInvDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label>User <span class="req">*</span></label>
                      <select id="addSelectUser" name="addSelectUser" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
					  <label>Notes</label>
                      <textarea id="addNotes" name="addNotes" class="form-control" rows="2" placeholder="Enter notes"></textarea>
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
								<label>Select Product <span class="req">*</span></label>
								<div class="form-group">
								  <select id="addProdItemName" class="form-control select2" style="width: 100%;"></select>
								</div>
							  </div>
							  <div class="col-sm-3">
								<label>System Count <span class="req">*</span></label>
								<div class="form-group">
								  <input type="number" id="addSysCnt" name="addSysCnt" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter system count">
								</div>
							  </div>
							  <div class="col-sm-3">
							    <label>Inventory Count <span class="req">*</span></label>
								<div class="form-group">
								  <input type="number" id="addInvCnt" name="addInvCnt" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter inventory count">
								</div>
							  </div>
							  <div class="col-sm-3">
								<label>&nbsp;</label>
								<div class="form-group">
								  <button type="button" class="btn btn-block btn-success" id="addprodItemBtn" name="addprodItemBtn">Add Product Item</button>
								</div>
							  </div>
							</div>
							
							<div class="scrollable-wrapper">
								<table class="table" id="addprodItemTbl">
								  <thead>
								  <tr>
									 <th>Product Code</th>
									 <th>Product Name</th>
									 <th>System Count</th>
									 <th>Inventory Count</th>
									 <th style="width: 40px">Action</th>
								  </tr>
								  </thead>
								  <tbody id="addprodItemTblBody">
								  </tbody>
								</table>
							</div>

                      </div>
                    </div>
                  </div>
                </div>
				<!---- Add Product Items ---->
				

              </div>
              <div class="modal-footer justify-content-between">
					<div class="row" style="width: 100%;">
						<div class="col-sm-6">
							<input type="hidden" id="addprodList" name="addprodList" />
							<button type="button" id="closeAddForm" name="closeAddForm" class="btn btn-default" data-dismiss="modal">Close</button> &nbsp;&nbsp; <button type="submit" id="addBtn" name="addBtn" class="btn btn-primary">Save</button>
						</div>
						<div class="col-sm-6" style="text-align: right;">		
							<button type="submit" id="addpostBtn" name="addpostBtn" class="btn btn-primary">Post</button> 
						</div>
					</div>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add Inventory Count Form Modal -->

      <!-- Update Inventory Count Form Modal -->
      <div class="modal fade" id="modal-default-update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="UpdateForm" action="data/orderlist_update_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Update Inventory Counts</h4>
                <button type="button" id="closeUpdateFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
				 <div class="col-sm-6">
                    <div class="form-group">
                      <label>Inventory Date <span class="req">*</span></label>
                      <div class="input-group date" id="updateInvDate" name="updateInvDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="updateInvDateInput" name="updateInvDateInput" data-target="#updateInvDate" placeholder="Select date & time" required/>
                        <div class="input-group-append" data-target="#updateInvDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label>User <span class="req">*</span></label>
                      <select id="updateSelectUser" name="updateSelectUser" class="form-control"></select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
					  <label>Notes</label>
                      <textarea id="updateNotes" name="updateNotes" class="form-control" rows="2" placeholder="Enter notes"></textarea>
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
								<label>Select Product <span class="req">*</span></label>
								<div class="form-group">
								  <select id="updateProdItemName" name="updateProdItemName" class="form-control select2" style="width: 100%;"></select>
								</div>
							  </div>
							  <div class="col-sm-3">
								<label>System Count <span class="req">*</span></label>
								<div class="form-group">
								  <input type="number" id="updateSysCnt" name="updateSysCnt" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter system count">
								</div>
							  </div>
							  <div class="col-sm-3">
							    <label>Inventory Count <span class="req">*</span></label>
								<div class="form-group">
								  <input type="number" id="updateInvCnt" name="updateInvCnt" minlength="1" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control"  min="0" max="9000000000" step="1" placeholder="Enter inventory count">
								</div>
							  </div>
							  <div class="col-sm-3">
								<label>&nbsp;</label>
								<div class="form-group">
								  <button type="button" class="btn btn-block btn-success" id="updateprodItemBtn" name="updateprodItemBtn">Add Product Item</button>
								</div>
							  </div>
							</div>
							
							<div class="scrollable-wrapper">
								<table class="table" id="updateprodItemTbl">
								  <thead>
								  <tr>
									<th>Product Code</th>
									 <th>Product Name</th>
									 <th>System Count</th>
									 <th>Inventory Count</th>
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
                </div>
				<!---- Update Product Items ---->

              </div>
			  
			  
			   <div class="modal-footer justify-content-between">
                 <input id="updateID" name="updateID" class="form-control" type="hidden">
                <div class="row" style="width: 100%;">
                  <div class="col-sm-6">
                     <button type="button" id="closeUpdateForm" class="btn btn-default" data-dismiss="modal">Close</button> &nbsp;&nbsp; <button type="submit" id="saveBtn" name="saveBtn" class="btn btn-primary">Save</button>
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
      <!-- Update Inventory Count Form Modal -->


      <!-- View Inventory Count Form Modal -->
      <div class="modal fade" id="modal-default-view">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">View Inventory Counts</h4>
                <button type="button" id="closeViewFormX" class="close" data-dismiss="modal" aria-label="Close">
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

				<!---- View Product Items ---->
				<br/>
                <div class="row">
                  <div class="col-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h4 class="card-title">Product Item(s)</h4>
                      </div>
                      <div class="card-body scrollable-wrapper">
					  
							<table class="table">
							  <thead>
							  <tr>
									<th>Product Code</th>
									 <th>Product Name</th>
									 <th>System Count</th>
									 <th>Inventory Count</th>
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
                <button type="button" id="viewID" class="btn btn-primary updateItem" data-id="" data-dismiss="modal" data-toggle="modal"data-target="#modal-default-update">Update Inventory Counts</button>
              </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- View Inventory Count Form Modal -->


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
	
	let syscnt = "";

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
    $('#addInvDate').datetimepicker({ icons: { time: 'far fa-clock' } });
    $('#updateInvDate').datetimepicker({ icons: { time: 'far fa-clock' } });
	
	//--- Load data to table ---//
	function loadData(){
		$.post( "data/invcount_load_data.php", function(result,status){
			table.clear();
			var postStatus = "";
			var showCTRL = "";
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				if (item.isPosted == true){
					postStatus = "<span style='color: green; font-weight: bold;'>Yes</span>";
					showCTRL = "<div class='btn-group btn-group-sm'><a href='#' class='btn btn-info viewItem' data-id="+item.countID+" data-toggle='modal' data-target='#modal-default-view' title='View'><i class='fas fa-eye'></i></a><a href='#' class='btn btn-danger deleteItem' data-id="+item.countID+" title='Delete'><i class='fas fa-trash'></i></a></div>";
				} else {
					postStatus = "<span style='color: red; font-weight: bold;'>No</span>";
					showCTRL = "<div class='btn-group btn-group-sm'><a href='#' class='btn btn-info viewItem' data-id="+item.countID+" data-toggle='modal' data-target='#modal-default-view' title='View'><i class='fas fa-eye'></i></a><a href='#' class='btn btn-warning updateItem' data-id="+item.countID+" data-toggle='modal' data-target='#modal-default-update' title='Update'><i class='fas fa-pen'></i></a><a href='#' class='btn btn-danger deleteItem' data-id="+item.countID+" title='Delete'><i class='fas fa-trash'></i></a></div>";
				}
				table.row.add([
					new Date(item.countDate).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""), 
					item.notes, 
                    postStatus, 
					item.uname, 
					showCTRL
					])
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
						var totalDiscount = 0;
						if (item.salePrice != "" && item.salePrice != 0) {
							price = parseInt(item.salePrice) * parseInt(item.qty);
						} else {
							errorNotifNoload("Please specify the retail/selling price!");
						}
						
						if (item.discountAmount != "" && item.discountAmount != 0) {
							totalDiscount = parseInt(item.discountAmount) * parseInt(item.qty);
							price = parseInt(price) - parseInt(totalDiscount);
						}
				
					 $("#viewprodItemTblBody").append("<tr><td>" + item.prodCode + "</td><td>" + item.prodName + "</td><td>" + item.origPrice + "</td><td>" + item.salePrice + "</td><td>" + item.qty + "</td><td>" + item.discountAmount + "</td><td>" + totalDiscount + "</td><td>" + price + "</td></tr>");
				});
			});
			
	});
	
	//--- Get Item to Update ---//	
	$(document).delegate(".updateItem", "click", function() {
		
		    var dataID = $(this).attr('data-id'); //get the item ID
			
			// Clear Maps
			updateprodMap.clear();
			// Clear Product Item List
			$("#updateprodItemTblBody").empty();
			//Clear Last Update
			$("#updateLastUpdateOrig").text('');
			$("#updateLastUpdateSale").text('');
			$("#updateLastUpdateDiscount").text('');
			
			// Load Product List Dropdown
			reloadProdItemDD();
			// Load Product List Table
			reloadProdListTable(dataID);
			
			
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
	
	// Load Product List Table
	function reloadProdListTable (dataID) {
		$.post( "data/order_proditem_get_data.php", { itemID: dataID }, function(result,status){
			var obj = JSON.parse(result);
			$("#updateprodItemTblBody").empty();
			obj.forEach(function(item) {
				const values = item.origPrice +"|"+ item.qty + "|" + item.salePrice +"|"+ item.discountAmount +"|"+ item.discountedPrice;
				updateprodMap.set(item.prodID, values);
				
				var price = 0;
				var totalDiscount = 0;
				if (item.salePrice != "" && item.salePrice != 0) {
					price = parseInt(item.salePrice) * parseInt(item.qty);
				} else {
					errorNotifNoload("Please specify the retail/selling price!");
				}
				
				if (item.discountAmount != "" && item.discountAmount != 0) {
					totalDiscount = parseInt(item.discountAmount) * parseInt(item.qty);
					price = parseInt(price) - parseInt(totalDiscount);
				}
				
				$("#updateprodItemTblBody").append("<tr><td>" + item.prodCode + "</td><td>" + item.prodName + "</td><td>" + item.origPrice + "</td><td>" + item.salePrice + "</td><td>" + item.qty + "</td><td>" + item.discountAmount + "</td><td>" + totalDiscount + "</td><td>" + price + "</td><td class='btn-group-sm'><a class='btn btn-danger removeprodItemUpdate' id=" + item.prodID + " data-id=" + item.orderitemID + " data-name=" + item.qty + " data-updatesaleprice=" + price + "><i class='fas fa-trash'></i></a></td></tr>");
			});
		});	
	}
	
	// Load Product List Dropdown
	function reloadProdItemDD () {
		$.post( "data/common_load_data.php", { tblName: "tbl_product", sortName: "prodName", availBal: 1 }, function(result,status){
			var obj = JSON.parse(result);
			$("#updateProdItemName").empty();
			obj.forEach(function(item) {
				//data-id for prodCode
				 $("#updateProdItemName").append("<option title='" + item.runningBal + "' value='" + item.prodID + "' data-id='" + item.prodCode + "' data-name='"+ item.prodName +"'>" + item.prodCode + "</option>");
			});
		});
	}
	
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
			$.post( "data/common_delete_data.php", { tblName: "tbl_order", fieldName: "orderID", notifName: "Order", itemID: dataID, curMod: "orderlist" }, function(result,status){
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
	
	
	//-- Load product item list when clicking Add Inventory count button --//
	$("#addinvcntBtn").click(function(){
		// Clear Maps
		addprodMap.clear();
		// Clear Product Item List
		$("#addprodItemTblBody").empty();
		//Clear Last Update
		$("#addLastUpdateOrig").text('');
		$("#addLastUpdateSale").text('');
		$("#addLastUpdateDiscount").text('');
		
		$.post( "data/common_load_data.php", { tblName: "tbl_product", sortName: "prodName", availBal: 1 }, function(result,status){
			var obj = JSON.parse(result);
			$("#addProdItemName").empty();
			obj.forEach(function(item) {
				//data-id for prodCode
				 $("#addProdItemName").append("<option title='" + item.runningBal + "' value='" + item.prodID + "' data-id='" + item.prodCode + "' data-name='"+ item.prodName +"'>" + item.prodCode + "</option>");
			});
		});
		
	});
	
	
	//-- Insert Product Item in the Table (Add) --//
	$("#addprodItemBtn").click(function(){
	
		var prod = document.getElementById('addProdItemName');
		var selectedIndex = prod.selectedIndex;
		var selectedProd = prod.options[selectedIndex].value;
		var selectedProdText = prod.options[selectedIndex].text;
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
			if(addOrigPrice == "" || addQty == "" || addSalePrice == "" || addDiscountedPrice == "") {
				errorNotifNoload("Please enter value on either group item and quantity fields!");
			} else if (parseInt(runbal) < parseInt(addQty)) {
				errorNotifNoload("Insufficient remaining balance! Product remaining quantity is "+runbal+".");
			} else {
				var runBalTotal = parseInt(runbal) - parseInt(addQty);
				if (addDiscount == "") {
					addDiscount = 0;
				}
				const values = addOrigPrice +"|"+ addQty + "|" + addSalePrice +"|"+ addDiscount +"|"+ addDiscountedPrice +"|"+ runBalTotal;
				addprodMap.set(selectedProd, values);
				
				var price = 0;
				var totalDiscount = 0;
				if (addSalePrice != "" && addSalePrice != 0) {
					price = parseInt(addSalePrice) * parseInt(addQty);
				} else {
					errorNotifNoload("Please specify the retail/selling price!");
				}
				
				if (addDiscount != "" && addDiscount != 0) {
					totalDiscount = parseInt(addDiscount) * parseInt(addQty);
					price = parseInt(price) - parseInt(totalDiscount);
				}
				
				var curTotal = $("#addGrandTotal").val();
				
				$("#addGrandTotal").val(parseInt(price) + parseInt(curTotal));
				
				// Append the new row to the product item table
				var newRow = "<tr><td>" + selProdCode + "</td><td>" + selprodname + "</td><td>" + addOrigPrice + "</td><td>" + addSalePrice + "</td><td>" + addQty + "</td><td>" + addDiscount + "</td><td>" + totalDiscount + "</td><td>" + price + "</td><td class='btn-group-sm'><a class='btn btn-danger removeprodItem' id=" + selectedProd + " data-addsaleprice=" + price + "><i class='fas fa-trash'></i></a></td></tr>";
				$("#addprodItemTbl tbody").append(newRow);
				
				
				// Check and Save if prices are changed
				$.post( "data/update_prices.php", { prodCode: selProdCode, addOrigPrice: addOrigPrice, Oprice: Oprice, addSalePrice: addSalePrice, Sprice: Sprice, addDiscountedPrice: addDiscountedPrice, Dprice: Dprice }, function(result,status){
					if (result == 'Success'){
						//successNotifNoload("success!");
					} 
				});
				
				Oprice = "";
				Sprice = "";
				Dprice = "";
				
				$("#addOrigPrice").val('');
				$("#addQty").val('');
				$("#addSalePrice").val('');
				$("#addDiscount").val('');
				$("#addDiscountedPrice").val('');
				$("#addLastUpdateOrig").text('');
				$("#addLastUpdateSale").text('');
				$("#addLastUpdateDiscount").text('');

				successNotifNoload("Product Item successfully added!");
			}
		}
		
		//console.log([...addprodMap.entries()]);
		
	});
	
	
	
	//-- Insert Product Item in the Table (Update) --//
	$("#updateprodItemBtn").click(function(){
	
		var prod = document.getElementById('updateProdItemName');
		var selectedIndex = prod.selectedIndex;
		var selectedProd = prod.options[selectedIndex].value;
		var selectedProdText = prod.options[selectedIndex].text;
		var runbal = prod.options[selectedIndex].title;
		var addOrigPrice = document.getElementById('updateOrigPrice').value;
		var addQty = document.getElementById('updateQty').value;
		var addSalePrice = document.getElementById('updateSalePrice').value;
		var addDiscount = document.getElementById('updateDiscount').value;
		var addDiscountedPrice = document.getElementById('updateDiscountedPrice').value;
		var selprodname = prod.options[selectedIndex].getAttribute("data-name");
		var selProdCode = prod.options[selectedIndex].getAttribute("data-id");
            	
		if (updateprodMap.has(selectedProd)) {
			errorNotifNoload(selprodname + " has been added already!");
		} else {
			if(addOrigPrice == "" || addQty == "" || addSalePrice == "" || addDiscountedPrice == "") {
				errorNotifNoload("Please enter value on either group item and quantity fields!");
			} else if (parseInt(runbal) < parseInt(addQty)) {
				errorNotifNoload("Insufficient remaining balance! Product remaining quantity is "+runbal+".");
			} else {
				var runBalTotal = parseInt(runbal) - parseInt(addQty);
				if (addDiscount == "") {
					addDiscount = 0;
				}
				const values = addOrigPrice +"|"+ addQty + "|" + addSalePrice +"|"+ addDiscount +"|"+ addDiscountedPrice +"|"+ runBalTotal;
				updateprodMap.set(selectedProd, values);
				
				var price = 0;
				var totalDiscount = 0;
				if (addSalePrice != "" && addSalePrice != 0) {
					price = parseInt(addSalePrice) * parseInt(addQty);
				} else {
					errorNotifNoload("Please specify the retail/selling price!");
				}
				
				if (addDiscount != "" && addDiscount != 0) {
					totalDiscount = parseInt(addDiscount) * parseInt(addQty);
					price = parseInt(price) - parseInt(totalDiscount);
				}
				
				var curTotal = $("#updateGrandTotal").val();
				
				$("#updateGrandTotal").val(parseInt(price) + parseInt(curTotal));
				
				$("#updateBalance").val(parseInt($("#updateGrandTotal").val()) - parseInt($("#updateAmountPaid").val()));
				
				// Append the new row to the product item table
				/*var newRow = "<tr><td>" + selProdCode + "</td><td>" + selprodname + "</td><td>" + addOrigPrice + "</td><td>" + addSalePrice + "</td><td>" + addQty + "</td><td>" + addDiscount + "</td><td>" + totalDiscount + "</td><td>" + price + "</td><td class='btn-group-sm'><a class='btn btn-danger removeprodItemUpdate' id=" + selectedProd + " data-id=" + + " data-name=" + addQty + " data-updatesaleprice=" + price + "><i class='fas fa-trash'></i></a></td></tr>";
				$("#updateprodItemTbl tbody").append(newRow);*/
				
				// Check and Save if prices are changed
				$.post( "data/update_prices.php", { prodCode: selProdCode, addOrigPrice: addOrigPrice, Oprice: Oprice, addSalePrice: addSalePrice, Sprice: Sprice, addDiscountedPrice: addDiscountedPrice, Dprice: Dprice }, function(result,status){
					if (result == 'Success'){
						//successNotifNoload("success!");
					} 
				});
				
				//Save Product Item to DB
				$.post( "data/order_proditem_add_data.php", { orderID: $("#updateID").val(), prodID: selectedProd, origPrice: addOrigPrice, salePrice: addSalePrice, discountedPrice: addDiscountedPrice, discountAmount: addDiscount, qty: addQty, totalprice: price }, function(result,status){
					if (result == 'Success'){
						// Load Product List Dropdown
						reloadProdItemDD();
						// Load Product List Table
						reloadProdListTable($("#updateID").val());
						successNotifNoload("Product Item successfully added!");
					} 
					else {
						errorNotifNoload(result);
					}
				});
				
				Oprice = "";
				Sprice = "";
				Dprice = "";
				
				$("#updateOrigPrice").val('');
				$("#updateQty").val('');
				$("#updateSalePrice").val('');
				$("#updateDiscount").val('');
				$("#updateDiscountedPrice").val('');
				$("#updateLastUpdateOrig").text('');
				$("#updateLastUpdateSale").text('');
				$("#updateLastUpdateDiscount").text('');
				
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
			$("#addGrandTotal").val(parseInt(curTotal) - parseInt($(this).attr('data-addsaleprice')));
			$("#addBalance").val(parseInt($("#addGrandTotal").val()) - parseInt($("#addAmountPaid").val()));
			
		}
			
	});
	
	//--- Remove Product Item on the table (Update) ---//	
	$(document).delegate(".removeprodItemUpdate", "click", function() {
		
		if (confirm("Are you sure you want to delete this product item?")) {
			updateprodMap.delete($(this).attr('id'));
			$(this).parent().parent().remove();
			
			//Delete Product Item to DB
			$.post( "data/order_proditem_delete_data.php", { ordItemID: $(this).attr('data-id'), prodID: $(this).attr('id'), qty: $(this).attr('data-name'), ordID: $("#updateID").val() }, function(result,status){
				if (result == 'Success'){
					// Load Product List Dropdown
					reloadProdItemDD();
					// Load Product List Table
					reloadProdListTable($("#updateID").val());
					successNotifNoload("Product Item successfully deleted!");
				} 
				else {
					errorNotifNoload(result);
				}
			});
			
			var curTotal = $("#updateGrandTotal").val();
			$("#updateGrandTotal").val(parseInt(curTotal) - parseInt($(this).attr('data-updatesaleprice')));
			$("#updateBalance").val(parseInt($("#updateGrandTotal").val()) - parseInt($("#updateAmountPaid").val()));
		}
			
	});
	
	// Add: Compute Amount Paid and Balance
	$("#addAmountPaid").keyup(function(e){
		var gtotal = parseInt($("#addGrandTotal").val());
		if (gtotal != 0){
			if ($(this).val() != "") {
				var total = $("#addGrandTotal").val();
				var amount = $("#addAmountPaid").val();
				$("#addBalance").val(parseInt(total) -  parseInt(amount));
			} else if ($(this).val() == "") {
				$("#addBalance").val("0");
			}
		} else {
			$(this).val("");
			errorNotifNoload("Please add product item first!");
		}
    });
	
	// Update: Compute Amount Paid and Balance
	$("#updateAmountPaid").keyup(function(e){
		var gtotal = parseInt($("#updateGrandTotal").val());
		if (gtotal != 0){
			if ($(this).val() != "") {
				var total = $("#updateGrandTotal").val();
				var amount = $("#updateAmountPaid").val();
				$("#updateBalance").val(parseInt(total) -  parseInt(amount));
			} else if ($(this).val() == "") {
			$("#updateBalance").val("0");
			}
		} else {
			$(this).val("");
			errorNotifNoload("Please add product item first!");
		}
    });
	
	// Add: Prod Item load prices when change select value
	$("#addProdItemName").change(function(){
		$("#addOrigPrice").empty();
		$("#addSalePrice").empty();
		$("#addDiscountedPrice").empty();
		$("#addDiscount").empty();
		$("#addQty").empty();
		$("#addLastUpdateOrig").text('');
		$("#addLastUpdateSale").text('');
		$("#addLastUpdateDiscount").text('');
		var prodSelected = $("#addProdItemName").val();
		$.post( "data/prod_get_data.php", { itemID: prodSelected }, function(result){
			var obj = JSON.parse(result);
			$("#addOrigPrice").val(obj[0].origPrice);
			$("#addSalePrice").val(obj[0].salePrice);
			$("#addDiscountedPrice").val(obj[0].discountedPrice);
			
			Oprice = obj[0].origPrice;
			Sprice = obj[0].salePrice;
			Dprice = obj[0].discountedPrice;
			
			$("#addLastUpdateOrig").text("Last Update: " + new Date(obj[0].lastUpdateOrigPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
			$("#addLastUpdateSale").text("Last Update: " + new Date(obj[0].lastUpdateSalePrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
			$("#addLastUpdateDiscount").text("Last Update: " + new Date(obj[0].lastUpdateDiscountedPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
		});
	});
	
	// Update: Prod Item load prices when change select value
	$("#updateProdItemName").change(function(){
		$("#updateOrigPrice").empty();
		$("#updateSalePrice").empty();
		$("#updateDiscountedPrice").empty();
		$("#updateDiscount").empty();
		$("#updateQty").empty();
		$("#updateLastUpdateOrig").text('');
		$("#updateLastUpdateSale").text('');
		$("#updateLastUpdateDiscount").text('');
		var prodSelected = $("#updateProdItemName").val();
		$.post( "data/prod_get_data.php", { itemID: prodSelected }, function(result){
			var obj = JSON.parse(result);
			$("#updateOrigPrice").val(obj[0].origPrice);
			$("#updateSalePrice").val(obj[0].salePrice);
			$("#updateDiscountedPrice").val(obj[0].discountedPrice);
			
			Oprice = obj[0].origPrice;
			Sprice = obj[0].salePrice;
			Dprice = obj[0].discountedPrice;
			
			$("#updateLastUpdateOrig").text("Last Update: " + new Date(obj[0].lastUpdateOrigPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
			$("#updateLastUpdateSale").text("Last Update: " + new Date(obj[0].lastUpdateSalePrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
			$("#updateLastUpdateDiscount").text("Last Update: " + new Date(obj[0].lastUpdateDiscountedPrice).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""));
		});
	});
	
	
	// Initialize Search Dropdown
	$('.select2').select2();
	
	// Add modal-open class on boday tag
	$("#viewID").click( function(){
		 setTimeout(function() { 
			jQuery("body").addClass("modal-open");
			jQuery("body").css('padding-right', '17px');
		}, 500);
	});
	
});


</script>