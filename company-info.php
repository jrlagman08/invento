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
            <h1>Company Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Company Info</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="row">
                  <div class="col-sm-3"> 
                    <div class="form-group">
                      <label>Logo</label><br/>
                      <sub>(Recommended Size: 200 x 200 pixels)</sub>
                      <img id="comLogo" src="img/default-company.jpg" style="height: 200px; width: 200px; border: 1px solid; object-fit: contain;" />
                    </div>
                    <div class="form-group">
                      <label>Company Name</label>: <span id="comName"></span>
                    </div>
                  </div>
                  <div class="col-sm-8"> 

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Address 1</label>: <span id="comAddress1"></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address 2</label>: <span id="comAddress2"></span></span>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>City</label>: <span id="comCity"></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Province</label>: <span id="comProvince"></span></span>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Country</label>: <span id="comCountry"></span></span>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Zip Code</label>: <span id="comZip"></span></span>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email Address</label>: <span id="comEmail"></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>: <span id="comPhone"></span></span>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mobile</label>: <span id="comMobile"></span></span>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Website</label>: <span id="comWebsite"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <h3 class="card-title">
                    <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default-update">
                      <i class="fas fa-edit"></i> &nbsp;Update Info
                    </button>
                  </h3>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->

      <!--  Update Company Info  -->
      <div class="modal fade" id="modal-default-update">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">

			<form id="UpdateForm" action="data/company_update_data.php" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <h4 class="modal-title">Update Company Info</h4>
                <button type="button" id="closeFormX" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-sm-3">
                    <label>Logo <span class="req">*</span></label><br/>
                    <sub>(Recommended Size: 200 x 200 pixels)</sub>
                    <img id="updatecomLogo" src="img/default-company.jpg" style="height: 200px; width: 200px; border: 1px solid; object-fit: contain;" />
                    </br></br>
                    <input type="file" id="photo" name="photo" /></br>
                    <div id="progressIndicator" class="progress progress-xs" style="display: none;">
                      <div id="indicatorBar" class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                           aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                      </div>
                    </div>
                    <br/>
                    <button type="button" id="upload" class="btn btn-success">Upload Logo</button>
                    
                  </div>

                  <div class="col-sm-9">
                  
                    <div class="row">
                      <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Company Name <span class="req">*</span></label>
                          <input type="text" id="updatecomName" name="updatecomName" class="form-control" placeholder="Update company name" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Address 1 <span class="req">*</span></label>
                          <input type="text" id="updatecomAddress1" name="updatecomAddress1" class="form-control" placeholder="Update address 1" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Address 2 <span class="req">*</span></label>
                          <input type="text" id="updatecomAddress2" name="updatecomAddress2" class="form-control" placeholder="Update address 2">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                          <label>City <span class="req">*</span></label>
                          <input type="text" id="updatecomCity" name="updatecomCity" class="form-control" placeholder="Update city" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Province <span class="req">*</span></label>
                          <input type="text" id="updatecomProvince" name="updatecomProvince" class="form-control" placeholder="Update province" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Country <span class="req">*</span></label>
                          <input type="text" id="updatecomCountry" name="updatecomCountry" class="form-control" placeholder="Update country" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Zip Code <span class="req">*</span></label>
                          <input type="text" id="updatecomZip" name="updatecomZip" class="form-control" placeholder="Update zip code" minlength="3" maxlength="5" onkeypress="return onlyNumberKey(event)" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Email Address <span class="req">*</span></label>
                          <input type="text" id="updatecomEmail" name="updatecomEmail" class="form-control" placeholder="Update email address" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Phone <span class="req">*</span></label>
                          <input type="text" id="updatecomPhone" name="updatecomPhone" class="form-control" placeholder="Update phone">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Mobile <span class="req">*</span></label>
                          <input type="text" id="updatecomMobile" name="updatecomMobile" class="form-control" placeholder="Update mobile" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Website <span class="req">*</span></label>
                          <input type="text" id="updatecomWebsite" name="updatecomWebsite" class="form-control" placeholder="Update mobile">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" id="closeForm" class="btn btn-default" data-dismiss="modal">Close</button>
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
	
	//--- Load Company Info ---//
	function loadInfo(){
		$.post( "data/company_load_data.php", function(result){
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				 $("#comName").text(item.name);
				 $("#comAddress1").text(item.address);
				 $("#comAddress2").text(item.address2);
				 $("#comCity").text(item.city);
				 $("#comProvince").text(item.province);
				 $("#comCountry").text(item.country);
				 $("#comZip").text(item.zipcode);
				 $("#comEmail").text(item.email);
				 $("#comPhone").text(item.phone);
				 $("#comMobile").text(item.mobile);
				 $("#comWebsite").text(item.website);
				 $("#comLogo").attr("src",item.logo);
				 $("#updatecomLogo").attr("src",item.logo);
				 
				 $("#updatecomName").val(item.name);
				 $("#updatecomAddress1").val(item.address);
				 $("#updatecomAddress2").val(item.address2);
				 $("#updatecomCity").val(item.city);
				 $("#updatecomProvince").val(item.province);
				 $("#updatecomCountry").val(item.country);
				 $("#updatecomZip").val(item.zipcode);
				 $("#updatecomEmail").val(item.email);
				 $("#updatecomPhone").val(item.phone);
				 $("#updatecomMobile").val(item.mobile);
				 $("#updatecomWebsite").val(item.website);
			})
		});
	}
	
	//--- Initial load Company Info ---//
	loadInfo();
	
	//--- Update Profile ---//	
	$("#UpdateForm").submit(function(){

		$.post( $("#UpdateForm").attr("action"), $("#UpdateForm :input").serializeArray(), function(result){
			if (result == 'Success'){
				loadInfo();
				$("#modal-default-update").modal("hide");
				successNotifNoload("Company Info successfully updated!");
			}
			else {
				errorNotifNoload(result);
			}
		});
		
		return false;
	});
	
	//--- Clear form when closed ---//
	$("#closeForm, #closeFormX").click(function(){
		loadInfo();
	});
	
	
	//--- Image Upload ---//
	$("#upload").click(function(){
		if( document.getElementById("photo").files.length == 0 ){
			errorNotifNoload("No files selected! Please try it again.");
		} else {
			var file_data = $("#photo").prop("files")[0]; // Getting the properties of file from file field
			var form_data = new FormData(); // Creating object of FormData class
			form_data.append("file", file_data); // Appending parameter named file with properties of file_field to form_data
			$.ajax({
				url: "data/company_upload_logo.php", // Upload Script
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
					document.getElementById("comLogo").src = JSON.parse(data)[0];
					document.getElementById("updatecomLogo").src = JSON.parse(data)[0];
					document.getElementById("photo").value = "";
					//document.querySelector("#progressIndicator").setAttribute("style", "display: none;");
					successNotifNoload("Company Logo successfully uploaded!");
				},
				error: function(xhr, status, error) {
					errorNotifNoload("Upload failed or invalid file format! Please try it again.");
				}			
			});
		}
	});
	//--- Image Upload ---//
	
});
</script>