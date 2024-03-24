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
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
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
                  <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-add"><i class="fas fa-plus"></i> &nbsp;Add Customer</button>
                </h3>
              </div>
               <!-- /.card-header -->
               <div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Customer</th>
                      <th>Email</th>
                      <th>Mobile</th>
					  <th>Address</th>
					  <th>Contact</th>
                      <th style="width: 40px" class="no-sort">Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataTable">
                    <!-- Query data will be listed here - realtime update -->
                  </tbody>
				  <tfoot>
					<tr>
					  <th>Customer</th>
                      <th>Email</th>
                      <th>Mobile</th>
					  <th>Address</th>
					  <th>Contact</th>
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

      <!-- Add customer Form Modal -->
      <div class="modal fade" id="modal-default-add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="AddForm" action="data/customers_add_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Add Customer</h4>
                <button type="button" class="close" id="closeAddFormX" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Customer Name <span class="req">*</span></label>
                      <input type="text" id="addcustomerName" name="addcustomerName" class="form-control" placeholder="Enter customer name" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Address 1 <span class="req">*</span></label>
                      <input type="text" id="addAddress1" name="addAddress1" class="form-control" placeholder="Enter address 1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Address 2 <span class="req">*</span></label>
                      <input type="text" id="addAddress2" name="addAddress2" class="form-control" placeholder="Enter address 2" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>City <span class="req">*</span></label>
                      <input type="text" id="addCity" name="addCity" class="form-control" placeholder="Enter city" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Province <span class="req">*</span></label>
                      <input type="text" id="addProvince" name="addProvince" class="form-control" placeholder="Enter province" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Country <span class="req">*</span></label>
                      <input type="text" id="addCountry" name="addCountry" class="form-control" placeholder="Enter country" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Zip Code <span class="req">*</span></label>
                      <input type="text" id="addZip" name="addZip" class="form-control" placeholder="Enter zip code" minlength="3" maxlength="5" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Email Address <span class="req">*</span></label>
                      <input id="addEmailAddress" name="addEmailAddress" type="email" class="form-control" required placeholder="Enter email address" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Phone Number <span class="req">*</span></label>
                      <input type="text" id="addPhoneNumber" name="addPhoneNumber" class="form-control" placeholder="Enter phone number" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Mobile Number <span class="req">*</span></label>
                      <input type="text" id="addMobileNumber" name="addMobileNumber" class="form-control" placeholder="Enter mobile number" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Person <span class="req">*</span></label>
                      <input type="text" id="addContactPerson" name="addContactPerson" class="form-control" placeholder="Enter contact person" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Email Address <span class="req">*</span></label>
                      <input id="addContactEmailAddress" name="addContactEmailAddress" type="email" class="form-control" required placeholder="Enter contact email address" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Mobile Number <span class="req">*</span></label>
                      <input type="text" id="addContactMobileNumber" name="addContactMobileNumber" class="form-control" placeholder="Enter contact mobile number" required>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeAddForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Customer</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add customer Form Modal -->

      <!-- Update customer Form Modal -->
      <div class="modal fade" id="modal-default-update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

            <form id="UpdateForm" action="data/customers_update_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Update Customer</h4>
                <button type="button" id="closeUpdateFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Customer Name <span class="req">*</span></label>
                      <input type="text" id="updatecustomerName" name="updatecustomerName" class="form-control" placeholder="Enter customer name" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Address 1 <span class="req">*</span></label>
                      <input type="text" id="updateAddress1" name="updateAddress1" class="form-control" placeholder="Enter address 1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Address 2 <span class="req">*</span></label>
                      <input type="text" id="updateAddress2" name="updateAddress2" class="form-control" placeholder="Enter address 2" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>City <span class="req">*</span></label>
                      <input type="text" id="updateCity" name="updateCity" class="form-control" placeholder="Enter city" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Province <span class="req">*</span></label>
                      <input type="text" id="updateProvince" name="updateProvince" class="form-control" placeholder="Enter province" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Country <span class="req">*</span></label>
                      <input type="text" id="updateCountry" name="updateCountry" class="form-control" placeholder="Enter country" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Zip Code <span class="req">*</span></label>
                      <input type="text" id="updateZip" name="updateZip" class="form-control" placeholder="Enter zip code" minlength="3" maxlength="5" onkeypress="return onlyNumberKey(event)" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Email Address <span class="req">*</span></label>
                      <input id="updateEmailAddress" name="updateEmailAddress" type="email" class="form-control" required placeholder="Enter email address" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Phone Number <span class="req">*</span></label>
                      <input type="text" id="updatePhoneNumber" name="updatePhoneNumber" class="form-control" placeholder="Enter phone number" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Mobile Number <span class="req">*</span></label>
                      <input type="text" id="updateMobileNumber" name="updateMobileNumber" class="form-control" placeholder="Enter mobile number" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Person <span class="req">*</span></label>
                      <input type="text" id="updateContactPerson" name="updateContactPerson" class="form-control" placeholder="Enter contact person" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Email Address <span class="req">*</span></label>
                      <input id="updateContactEmailAddress" name="updateContactEmailAddress" type="email" class="form-control" required placeholder="Enter contact email address" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Mobile Number <span class="req">*</span></label>
                      <input type="text" id="updateContactMobileNumber" name="updateContactMobileNumber" class="form-control" placeholder="Enter contact mobile number" required>
                    </div>
                  </div>
                </div>

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
      <!-- Update customer Form Modal -->


      <!-- View customer Form Modal -->
      <div class="modal fade" id="modal-default-view">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title">View Customer</h4>
                <button type="button" id="closeViewFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Customer Name</label>: <span id="customerName"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Address 1</label>: <span id="Address1"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Address 2</label>: <span id="Address2"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>City</label>: <span id="City"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Province</label>: <span id="Province"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Country</label>: <span id="Country"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Zip Code</label>: <span id="Zip"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Email Address</label>: <span id="EmailAddress"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Phone Number</label>: <span id="PhoneNumber"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Mobile Number</label>: <span id="MobileNumber"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Person</label>: <span id="ContactPerson"></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Email Address</label>: <span id="ContactEmailAddress"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Contact Mobile Number</label>: <span id="ContactMobileNumber"></span>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeViewForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="viewID" class="btn btn-primary updateItem" data-id="" data-toggle="modal" data-target="#modal-default-update" data-dismiss="modal">Update Customer</button>
              </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- View customer Form Modal -->


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
	
	//--- Load data to table ---//
	function loadData(){
		$.post( "data/customers_load_data.php", function(result,status){
			table.clear();
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				table.row.add([item.name, 
                    item.email, 
                    item.mobile,
                    "Address1: " + item.address + "<br/>Address2: " + item.address2 + "<br/>City: " + item.city + "<br/>Country: " + item.country + "<br/>Zip: " + item.zipcode, 
                    "Contact Person: " + item.econtactPerson + "<br/>Contact Email: " + item.econtactEmail + "<br/>Contact Mobile: " + item.econtactMobile,
					"<div class='btn-group btn-group-sm'><a href='#' class='btn btn-info viewItem' data-id="+item.customerID+" data-toggle='modal' data-target='#modal-default-view' title='View'><i class='fas fa-eye'></i></a><a href='#' class='btn btn-warning updateItem' data-id="+item.customerID+" data-toggle='modal' data-target='#modal-default-update' title='Update'><i class='fas fa-pen'></i></a><a href='#' class='btn btn-danger deleteItem' data-id="+item.customerID+" title='Delete'><i class='fas fa-trash'></i></a></div>"])
			})
			table.draw(false);
		});
	}

	//--- Initial load data to table ---//
	loadData();

	//--- Add Item ---//	
	$("#AddForm").submit(function(){
		
		$.post( $("#AddForm").attr("action"), $("#AddForm :input").serializeArray(), function(result){
				if (result == 'Success'){
					loadData();
					document.getElementById("AddForm").reset();
					$("#modal-default-add").modal("hide");
					successNotifNoload("Customer successfully saved!");
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
			$.post( "data/customers_get_data.php", { itemID: dataID }, function(result){
				var obj = JSON.parse(result);
				$("#customerName").text(obj[0].name);
				$("#Address1").text(obj[0].address);
				$("#Address2").text(obj[0].address2);
				$("#City").text(obj[0].city);
				$("#Province").text(obj[0].province);
				$("#Country").text(obj[0].country);
				$("#Zip").text(obj[0].zipcode);
				$("#EmailAddress").text(obj[0].email);
				$("#PhoneNumber").text(obj[0].phone);
				$("#MobileNumber").text(obj[0].mobile);
				$("#ContactPerson").text(obj[0].econtactPerson);
				$("#ContactEmailAddress").text(obj[0].econtactEmail);
				$("#ContactMobileNumber").text(obj[0].econtactMobile);
				$("#viewID").attr('data-id',dataID);
			});
			
	});
	
	//--- Get Item to Update ---//	
	$(document).delegate(".updateItem", "click", function() {

		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/customers_get_data.php", { itemID: dataID }, function(result){
				var obj = JSON.parse(result);
				$("#updatecustomerName").val(obj[0].name);
				$("#updateAddress1").val(obj[0].address);
				$("#updateAddress2").val(obj[0].address2);
				$("#updateCity").val(obj[0].city);
				$("#updateProvince").val(obj[0].province);
				$("#updateCountry").val(obj[0].country);
				$("#updateZip").val(obj[0].zipcode);
				$("#updateEmailAddress").val(obj[0].email);
				$("#updatePhoneNumber").val(obj[0].phone);
				$("#updateMobileNumber").val(obj[0].mobile);
				$("#updateContactPerson").val(obj[0].econtactPerson);
				$("#updateContactEmailAddress").val(obj[0].econtactEmail);
				$("#updateContactMobileNumber").val(obj[0].econtactMobile);
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
				successNotifNoload("Customer successfully updated!");
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
			$.post( "data/common_delete_data.php", { tblName: "tbl_customer", fieldName: "customerID", notifName: "Customer", itemID: dataID }, function(result,status){
				if (result == 'Success'){
					loadData();
					successNotifNoload("Customer successfully deleted!");
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
	
});
</script>