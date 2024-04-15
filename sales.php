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
            <h1>Sales Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Sales Report</li>
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
                <h3 class="card-title" style="margin-top: 8px;">Select Date Range: </h3>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="dtRange">
                        </div>
                    </div>
                    <div class="col-sm-2"><button type="button" id="btnGenReport" name="btnGenReport" class="btn btn-block btn-success btn-sm" style="height: 37px;"><i class="fas fa-print"></i> &nbsp;Generate Report</button></div>
                    <div class="col-sm-2"><button type="button" class="btn btn-block btn-info btn-sm" style="height: 37px;" onClick="window.location.reload();">Reset</button></div>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="loadDataTable" class="table table-bordered table-striped">
			  <!--<div class="card-body p-0">
                <table id="loadDataTable" class="table table-striped">-->
                    <!-- Query data will be listed here - realtime update -->
                    <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Order No.</th>
                            <th>Customer</th>
                            <th>Grand Total</th>
                            <th>Total Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th style="font-weight: bold;">Total:</th>
                            <th></th>
                            <th></th>
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
	  "footerCallback": function ( row, data, start, end, display ) {
			var api = this.api(), data;
 
			// Remove the formatting to get integer data for summation
			var intVal = function ( i ) {
				return typeof i === 'string' ?
					i.replace(/[\$,]/g, '')*1 :
					typeof i === 'number' ?
						i : 0;
			};
 
			// Total over all pages (Grand Total)
			var Gtotal = api
				.column( 3 )
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );
 
			// Total over this page (Grand Total)
			var pageGTotal = api
				.column( 3, { page: 'current'} )
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );
			  
			// Total over all pages (Total Profit)
			var totalP = api
				.column( 4 )
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );
 
			// Total over this page (Total Profit)
			var pageTotalP = api
				.column( 4, { page: 'current'} )
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );

			// Total filtered rows on the selected column (code part added)
			var sumCol4Filtered = display.map(el => data[el][3]).reduce((a, b) => intVal(a) + intVal(b), 0 );
		  
			// Update footer
			$( api.column( 3 ).footer() ).html(Gtotal); //Grand Total
			$( api.column( 4 ).footer() ).html(totalP); //Total Profit
		}
	});
	
	//--- Generate Report ---//	
	$(document).delegate("#btnGenReport", "click", function() {
		$("body").css("cursor", "progress");

		// get date range value
		var startDate =  $("#dtRange").data('daterangepicker').startDate.format('YYYY-MM-DD');
		var endDate =  $("#dtRange").data('daterangepicker').endDate.format('YYYY-MM-DD');
		startDate = new Date(startDate).toISOString().slice(0, 10);
		endDate = new Date(endDate).toISOString().slice(0, 10);
		var dataSet = [];
		var ctr = 0;
	
		table.clear();
		$.post( "data/sales_load_data.php", { startDate: startDate, endDate: endDate }, function(result,status){
			 var obj = JSON.parse(result);
			 if (Object.keys(obj).length != 0){ 
				ctr = 1;
             }
			 obj.forEach(function(item) {
				 table.row.add([
					new Date(item.orderDate).toLocaleDateString('en-us', {month: '2-digit', day: '2-digit', year: 'numeric', hour: 'numeric', minute: '2-digit'}).replace(/,/g, ""),
					item.orderNum,
					item.name,
					item.grandTotal,
					item.profit
				 ]);
			});

			table.draw(false);
			
			if (ctr == 0){
				errorNotifNoload("No result for Generated Report!");
			} else {
				successNotifNoload("Generated Report successfully!");
			}
		});

		$("body").css("cursor", "default");
	
		return false;
	});

	//Date range picker
	$('#dtRange').daterangepicker();
});
</script>