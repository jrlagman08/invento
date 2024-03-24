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
            <h1>Inventory Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Inventory Report</li>
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
                <div class="row">
                    <div class="col-sm-4">
                        <label>Select Product:</label>
                        <select id="ProdItem" class="form-control select2"></select>
                    </div>
                    <div class="col-sm-4">
                        <label>Select Date Range:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="dtRange">
                        </div>
                    </div>
                    <div class="col-sm-2"><label>&nbsp;</label><button type="button" id="btnGenReport" class="btn btn-block btn-success btn-sm" style="height: 37px;"><i class="fas fa-print"></i> &nbsp;Generate Report</button></div>
                    <div class="col-sm-2"><label>&nbsp;</label><button type="button" class="btn btn-block btn-info btn-sm" style="height: 37px;" onClick="window.location.reload();">Reset</button></div>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTableRec" class="table table-bordered table-striped">
                    <!-- Query data will be listed here - realtime update -->
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Particular</th>
                            <th>Reference</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <!--<tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th style="font-weight: bold;">Total:</th>
                            <th></th>
                        </tr>
                    </tfoot>-->
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

    </section>
    <!-- /.content -->

<?php
	//Footer
	include_once('includes/footer.php'); 
?> 


<!-- Custom script -->
<script>
$(document).ready(function() {

});
</script>