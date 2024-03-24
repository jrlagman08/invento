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
            <h1>Synchronizing Database</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Sync Database</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">


                <h3 id="box" class="profile-username text-center" id="userNameHeader"></h3>
				<!--<center><div id="box"></div></center>-->
                <div class="row">
				   <div class="col-md-3"></div>
                  <div class="col-md-6"><a ref="#" id="syncbtn" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default-update"><b>Sync Database</b></a></div>
				   <div class="col-md-3"></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
	
	
	//--- Update Profile ---//	
	$("#syncbtn").click(function(){

		var duration = 1000; // it should finish in 5 seconds !
         var max = 100;
         var i = 0 ;
         var interval = setInterval(function(){
            i++;
            offset  = (max*i)/duration;
            console.log(offset);
            //$("#box").css("width", offset + "px");
            $("#box").text(parseInt(offset) + "%");
            if(i>=duration){
                //alert("Database Synced Successfully!");
				successNotifNoload("Database Synced Successfully!");
                clearInterval(interval);
            }
        }, 1);
		
		return false;
	});

});
</script>