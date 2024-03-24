<?php
	//Declaration of all includes including header
	require_once('includes/session.php');
	include_once('includes/connection.php'); 
	include_once('includes/functions.php'); 
	include_once('includes/header.php');
	//Check if user logged in
	confirm_logged_in(); 
	
	//Get user info
	$userinfo=get_user_byID($_SESSION['userID']);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="img/default-profile-img.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center" id="userNameHeader"></h3>

                <!--<p class="text-muted text-center">Administrator</p>-->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right" id="userFullName"></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right" id="userEmail"></a>
                  </li>
                </ul>
                <div class="row">
                  <div class="col-md-6"><a ref="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default-update"><b>Update Profile</b></a></div>
                  <div class="col-md-6"><a id="logout" href="logout.php" class="btn btn-primary btn-block"><b>Logout</b></a></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Update Profile Modal -->
            <div class="modal fade" id="modal-default-update">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form id="UpdateForm" action="data/profile_update_data.php" method="post">
                    <div class="modal-header">
                      <h4 class="modal-title">Update Profile</h4>
                      <button type="button" id="closeFormX" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="updateFname">Firstname <span class="req">*</span></label>
                        <input id="updateFname" name="updateFname" class="form-control" type="text" placeholder="Update Firstname" value="" required>
                      </div>
                      <div class="form-group">
                        <label for="updateLname">Lastname <span class="req">*</span></label>
                        <input id="updateLname" name="updateLname" class="form-control" type="text" placeholder="Update Lastname" value="" required>
						<input id="updateID" name="updateID" class="form-control" type="hidden" value="">
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <input id="uid" class="form-control" type="hidden">
                      <input id="email" class="form-control" type="hidden">
                      <button type="button" id="closeForm" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
             <!-- Update Profile Modal -->

          </div>
          <!-- /.col -->
          <div class="col-md-6">

            <!-- Change Password -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="changePasswordForm" action="data/profile_update_password.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="pword">New Password <span class="req">*</span></label>
                    <input type="password" class="form-control" id="pword" name="pword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label for="cpword">Confirm Password <span class="req">*</span></label>
                    <input type="password" class="form-control" id="cpword" name="cpword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Confirm Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	
<?php
	//Footer
	include_once('includes/footer.php'); 
?>  


<!-- Custom script -->
<script>
$(document).ready(function() {
	
	//--- Load Profile data ---//
	function loadProfile(){
		$.post( "data/profile_load_data.php", { userID: '<?php echo $userinfo['userID']; ?>' }, function(result){
			var obj = JSON.parse(result);
			 obj.forEach(function(item) {
				 $("#userFullName").text(item.fname + " " +item.lname);
				 $("#userEmail").text(item.email);
				 $("#updateFname").val(item.fname);
				 $("#updateLname").val(item.lname);
				 $("#userName").text("Hi, "+item.fname);
				 $("#updateID").val(item.userID);
			})
		});
	}
	
	//--- Initial load profile data ---//
	loadProfile();
	
	//--- Update Profile ---//	
	$("#UpdateForm").submit(function(){

		$.post( $("#UpdateForm").attr("action"), $("#UpdateForm :input").serializeArray(), function(result){
			if (result == 'Success'){
				loadProfile();
				$("#modal-default-update").modal("hide");
				successNotifNoload("Profile successfully updated!");
			}
			else {
				errorNotifNoload(result);
			}
		});
		
		return false;
	});
	
	//--- Change Password ---//	
	$("#changePasswordForm").submit(function(){
		
		var p = $("#pword").val();
		var pw = $("#cpword").val();
		if (p == pw) {
			
			$.post( $("#changePasswordForm").attr("action"), { userID: '<?php echo $userinfo['userID']; ?>', pword: p }, function(result){
				if (result == 'Success'){
					$("#pword").val("");
					$("#cpword").val("");
					successNotifNoload("Password successfully changed!");
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
	
	//--- Clear form when closed ---//
	$("#closeForm, #closeFormX").click(function(){
		loadProfile();
	});
	
});
</script>