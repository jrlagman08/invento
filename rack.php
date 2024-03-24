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
            <h1>Rack</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Rack</li>
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
                    <i class="fas fa-plus"></i> &nbsp;Add Rack
                  </button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">
                  <thead>
					<tr>
                      <th>Name</th>
                      <th style="width: 40px" class="no-sort">Action</th>
                    </tr>
                  </thead>
                  <tbody>
						<!-- Query data will be listed here - realtime update -->
                  </tbody>
				  <tfoot>
                    <tr>
                      <th>Name</th>
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
            <form id="AddForm" action="data/common_add_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Add Rack</h4>
                <button type="button" id="closeAddFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input id="addinputName" name="addinputName" class="form-control" type="text" placeholder="Enter rack name" required>
				<input type="hidden" id="addtblName" name="addtblName" value="tbl_rack">
				<input type="hidden" id="addfieldName" name="addfieldName" value="name">
				<input type="hidden" id="addnotifName" name="addnotifName" value="Rack">
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeAddForm" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Rack</button>
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
            <form id="UpdateForm" action="data/common_update_data.php" method="post">
              <div class="modal-header">
                <h4 class="modal-title">Update Rack</h4>
                <button type="button" id="closeUpdateFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input id="updateinputName" name="updateinputName" class="form-control" type="text" placeholder="Update rack name" required>
				<input type="hidden" id="updatetblName" name="updatetblName" value="tbl_rack">
				<input type="hidden" id="updatefieldID" name="updatefieldID" value="rackID">
				<input type="hidden" id="updatefieldName" name="updatefieldName" value="name">
				<input type="hidden" id="updatenotifName" name="updatenotifName" value="Rack">
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
		$.post( "data/common_load_data.php", { tblName: "tbl_rack", sortName: "name" }, function(result,status){
			table.clear();
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				table.row.add([item.name, "<div class='btn-group btn-group-sm'><a href='#' class='btn btn-warning updateItem' data-id="+item.rackID+" data-name="+item.name+" data-toggle='modal' data-target='#modal-default-update' title='Update'><i class='fas fa-pen'></i></a><a href='#' class='btn btn-danger deleteItem' data-id="+item.rackID+" title='Delete'><i class='fas fa-trash'></i></a></div>"])
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
				successNotifNoload("Rack successfully saved!");
			}
			else {
				errorNotifNoload(result);
			}
		});
		
		return false;
	});
	
	//--- Get Item to Update ---//	
	$(document).delegate(".updateItem", "click", function() {

		    var dataID = $(this).attr('data-id'); //get the item ID
			var dataName = $(this).attr('data-name'); //get the item Name
			$("#updateID").val(dataID);
			$("#updateinputName").val(dataName);
			
	});
	
	//--- Update Item ---//	
	$("#UpdateForm").submit(function(){

		$.post( $("#UpdateForm").attr("action"), $("#UpdateForm :input").serializeArray(), function(result){
			if (result == 'Success'){
				loadData();
				document.getElementById("UpdateForm").reset();
				$("#modal-default-update").modal("hide");
				successNotifNoload("Rack successfully updated!");
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
			$.post( "data/common_delete_data.php", { tblName: "tbl_rack", fieldName: "rackID", notifName: "Rack", itemID: dataID }, function(result,status){
				if (result == 'Success'){
					loadData();
					successNotifNoload("Rack successfully deleted!");
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