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
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">User Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-add">
                    <i class="fas fa-plus"></i> &nbsp;Add User
                  </button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Email</th>
					  <th>Department</th>
                      <th style="width: 40px" class="no-sort">Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataTable">
                    <!-- Query data will be listed here - realtime update -->
                  </tbody>
				  <tfoot>
					<tr>
					  <th>First name</th>
                      <th>Last name</th>
                      <th>Email</th>
					  <th>Department</th>
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
        
      </div><!-- /.container-fluid -->

      <div class="modal fade" id="modal-default-add">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="AddForm" action="data/users_add_data.php" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" id="closeAddFormX" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			  <div class="form-group">
				<label>Department <span class="req">*</span></label>
				<select id="addDepartment" name="addDepartment" class="form-control"></select>
			  </div>
              <div class="form-group">
                <label>First Name <span class="req">*</span></label>
                <input id="fname" name="fname" type="text" class="form-control" placeholder="First name" required>
              </div>
              <div class="form-group">
                <label>Last Name <span class="req">*</span></label>
                <input id="lname" name="lname" type="text" class="form-control" placeholder="Last name" required>
              </div>
              <div class="form-group">
                <label>Email <span class="req">*</span></label>
                <input id="email" name="email" type="email" class="form-control" required placeholder="Email" required>
              </div>
              <div class="form-group">
                <label>Password <span class="req">*</span></label>
                <input id="pword" name="pword" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Password">
              </div>
              <div class="form-group">
                <label>Confirm Password <span class="req">*</span></label>
                <input id="cpword" name="cpword" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Confirm password">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" id="closeAddForm" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add User</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-default-update">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="UpdateForm" action="data/users_update_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Update User Management</h4>
                <button type="button" id="closeUpdateFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<div class="form-group">
					<label>Department <span class="req">*</span></label>
					<select id="updateDepartment" name="updateDepartment" class="form-control"></select>
				</div>
                <div class="form-group">
                  <label>First Name <span class="req">*</span></label>
                  <input id="fnameupdate" name="fnameupdate" type="text" class="form-control" placeholder="Update First name" required>
                </div>
                <div class="form-group">
                  <label>Last Name <span class="req">*</span></label>
                  <input id="lnameupdate" name="lnameupdate" type="text" class="form-control" placeholder="Update Last name" required>
                </div>
				<div class="form-group">
					<label>Email <span class="req">*</span></label>
					<input id="emailupdate" name="emailupdate" type="email" class="form-control" required placeholder="Update Email" required>
				</div>
                <div class="form-group">
                  <label>New Password</label>
                  <input id="pwordupdate" name="pwordupdate" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password">
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input id="cpwordupdate" name="cpwordupdate" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm password">
                </div>
                <input id="updateID" name="updateID" class="form-control" type="hidden">
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeUpdateForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
		$.post( "data/users_load_data.php", function(result,status){
			table.clear();
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				table.row.add([item.fname, item.lname, item.email, item.name, "<div class='btn-group btn-group-sm'><a href='#' class='btn btn-warning updateItem' data-id="+item.userID+" data-toggle='modal' data-target='#modal-default-update' title='Update'><i class='fas fa-pen'></i></a><a href='#' class='btn btn-danger deleteItem' data-id="+item.userID+" title='Delete'><i class='fas fa-trash'></i></a></div>"])
			})
			table.draw(false);
		});
	}
	
	//--- Load Department data ---//
	function loadDepartment(){
		$.post( "data/common_load_data.php", { tblName: "tbl_department", sortName: "name" }, function(result,status){
			var obj = JSON.parse(result);
			 $("#addDepartment").empty();
			 $("#updateDepartment").empty();
			 obj.forEach(function(item) {
				 $("#addDepartment").append("<option value='"+item.departmentID+"'>"+item.name+"</option>");
				 $("#updateDepartment").append("<option value='"+item.departmentID+"'>"+item.name+"</option>");
			})
		});
	}
	
	//--- Initial load data to table ---//
	loadData();
	
	//--- Initial load Department data ---//
	loadDepartment();

	//--- Add Item ---//	
	$("#AddForm").submit(function(){
		
		var p = $("#pword").val();
		var pw = $("#cpword").val();
		if (p == pw) {
			$.post( $("#AddForm").attr("action"), $("#AddForm :input").serializeArray(), function(result){
				if (result == 'Success'){
					loadData();
					loadDepartment();
					document.getElementById("AddForm").reset();
					$("#modal-default-add").modal("hide");
					successNotifNoload("User successfully saved!");
				}
				else {
					errorNotifNoload(result);
				}
			});
		} else {
			errorNotifNoload("Password did not match! Please try again.");
		}

		return false;
	});
	
	//--- Get Item to Update ---//	
	$(document).delegate(".updateItem", "click", function() {

		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/users_get_data.php", { itemID: dataID }, function(result){
				var obj = JSON.parse(result);
				$("#updateDepartment").val(obj[0].departmentID);
				$("#fnameupdate").val(obj[0].fname);
				$("#lnameupdate").val(obj[0].lname);
				$("#emailupdate").val(obj[0].email);
				$("#updateID").val(obj[0].userID);
			});
			
	});
	
	//--- Update Item ---//	
	$("#UpdateForm").submit(function(){

		var p = $("#pwordupdate").val();
		var pw = $("#cpwordupdate").val();
		if (p == pw) {
			$.post( $("#UpdateForm").attr("action"), $("#UpdateForm :input").serializeArray(), function(result){
				if (result == 'Success'){
					loadData();
					document.getElementById("UpdateForm").reset();
					$("#modal-default-update").modal("hide");
					successNotifNoload("User successfully updated!");
				}
				else {
					errorNotifNoload(result);
				}
			});
		} else {
			errorNotifNoload("Password did not match! Please try again.");
		}
		
		return false;
	});
	
	//--- Delete Item ---//	
	$(document).delegate(".deleteItem", "click", function() {

		if (confirm("Are you sure you want to delete this record?")) {
		    var dataID = $(this).attr('data-id'); //get the item ID
			$.post( "data/common_delete_data.php", { tblName: "tbl_user", fieldName: "userID", notifName: "User", itemID: dataID }, function(result,status){
				if (result == 'Success'){
					loadData();
					successNotifNoload("User successfully deleted!");
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