<?php
	//----------general Function----------------------//

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysqli_connect_error());
		}
	}
	//-----------------end of general function---------------//


	//Display Page Title
	function display_title($curpage){
		$pagetitle = "";
	    switch ($curpage) {
			case "index.php":
				$pagetitle = "Dashboard";
				break;
			case "sync-db.php":
				$pagetitle = "Synchronizing Database";
				break;
			case "categories.php":
				$pagetitle = "Categories";
				break;
			case "classification.php":
				$pagetitle = "Classification";
				break;
			case "color.php":
				$pagetitle = "Color";
				break;
			case "company-info.php":
				$pagetitle = "Company Info";
				break;
			case "customers.php":
				$pagetitle = "Customers";
				break;
			case "department.php":
				$pagetitle = "Department";
				break;
			case "inventory.php":
				$pagetitle = "Inventory Report";
				break;
			case "inventory-counts.php":
				$pagetitle = "Inventory Counts";
				break;
			case "item-received.php":
				$pagetitle = "Item Received";
				break;
			case "order-list.php":
				$pagetitle = "Order List";
				break;
			case "payment.php":
				$pagetitle = "Payment";
				break;
			case "product-management.php":
				$pagetitle = "Product Management";
				break;
			case "profile.php":
				$pagetitle = "Profile";
				break;
			case "rack.php":
				$pagetitle = "Rack";
				break;
			case "rack.php":
				$pagetitle = "Rack";
				break;
			case "repackage-product.php":
				$pagetitle = "Repackage Product";
				break;
			case "sales.php":
				$pagetitle = "Sales Report";
				break;
			case "season.php":
				$pagetitle = "Season";
				break;
			case "sub-categories.php":
				$pagetitle = "Sub Categories";
				break;
			case "suppliers.php":
				$pagetitle = "Suppliers";
				break;
			case "uom.php":
				$pagetitle = "Unit of Measure";
				break;
			case "user-management.php":
				$pagetitle = "User Management";
				break;
			case "warehouse.php":
				$pagetitle = "Warehouse";
				break;
		}
		return $pagetitle;
	}
	
	//Get user by userID
	function get_user_byID($userID){
		global $connection;
		$query = "SELECT * FROM tbl_user WHERE userID='{$userID}'";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		$data = mysqli_fetch_array($result);
		return $data;
	}
	
	//Common get all data with parameter
	function getData($tbl,$sort){
	    global $connection;
		$query="SELECT * FROM {$tbl} ORDER BY {$sort} ASC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//Count Customers
	function displayCount($tbl,$fn){
		global $connection;
		$query = "SELECT count({$fn}) AS count FROM {$tbl}";
		$result = mysqli_query($connection, $query) ;
		$data=mysqli_fetch_assoc($result);
		confirm_query($result);
		return $data['count'];
	}
	
	
	
























	//get user function (specific)
	function get_data_user(){
		global $connection;
		$query="SELECT EmployeeID,EmpSalt,EmpLName,EmpFName,EmpMI,EmpTitle,EmpDepartment,Online,UserLevel FROM employee where Status='Active' ORDER BY EmployeeID ASC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	//get user function (all)
	function get_all_user(){
		global $connection;
		$query="SELECT * FROM employee ORDER BY EmployeeID ASC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get position for new employee
	function get_position(){
	    global $connection;
		$query="SELECT * FROM position ORDER BY billrate DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get year distinct
	function get_year_distinct(){
	    global $connection;
		$query="SELECT DISTINCT YEAR(TEDate) as yr FROM timeentry ORDER BY yr DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get position for  timebudget tagging
	function get_position_name(){
	    global $connection;
		$query="SELECT position_name, position_id FROM position ORDER BY billrate DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get all department
	function get_department(){
	    global $connection;
		$query="SELECT * FROM department ORDER BY department_name ASC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get position by name
	function get_posiition_by_name($position){
	    global $connection;
		$query="SELECT * FROM position where position_id='{$position}' limit 1";
		$result = mysqli_query($connection, $query);
		confirm_query( $result);
		$result_set=mysqli_fetch_array($result);
		return $result_set;
	}

	//AUDIT TRAILS
	function audit_trail($var,$var2,$dt){
		global $connection;
		mysqli_query($connection, "INSERT INTO audittrail (empID,activity,module,dt) VALUES('{$_SESSION['EmployeeID']}','{$var}','{$var2}','{$dt}')");
	}
	
	//get audit trail
	function get_audittrail($dt){
	    global $connection;
		$query="SELECT * FROM audittrail WHERE date(dt)='{$dt}' ORDER BY dt DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	//get audit trail date filter
	function get_audittrail_by_date($start,$end){
		global $connection;
		$query="SELECT * FROM audittrail WHERE DATE(dt) BETWEEN '{$start}' AND '{$end}' ORDER BY dt DESC";
		$result = mysqli_query($connection, $query);
		confirm_query( $result);
		return $result;

	}
	
	
	//get department by name
	function get_department_by_name($dept){
	    global $connection;
		$query="SELECT * FROM department where department_id='{$dept}' limit 1";
		$result = mysqli_query($connection, $query);
		confirm_query( $result);
		$result_set=mysqli_fetch_array($result);
		return $result_set;
	}
	
	//get memo
	function get_memo(){
	    global $connection;
		$query="SELECT * FROM memo ORDER BY dt DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get today memo
	function get_memo_today($dt){
	    global $connection;
		$query="SELECT empID, title, message, dt, EmpFName, EmpLName, EmpMI FROM memo INNER JOIN employee on memo.empID = employee.EmployeeID WHERE date(dt) = '{$dt}' ORDER BY dt DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get top 30 old memo
	function get_memo_top30($dt){
	    global $connection;
		$query="SELECT empID, title, message, dt, EmpFName, EmpLName, EmpMI FROM memo INNER JOIN employee on memo.empID = employee.EmployeeID WHERE date(dt) < '{$dt}' ORDER BY dt DESC LIMIT 30";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}

	//Count Accomplished Task
	function get_total_accomp_all($dt){
		global $connection;
		$query = "SELECT count(TEEndTime) as total FROM timeentry WHERE TEEndTime IS NOT NULL AND date(TEDate) = '{$dt}'";
		$result = mysqli_query($connection, $query) ;
		$data=mysqli_fetch_assoc($result);
		confirm_query( $result);
		return $data['total'];
	}
		 
	// Count User Online
	function count_online_user(){
		global $connection;
		$sql = "SELECT count(Online) AS count FROM employee WHERE Online=1";
		$result = mysqli_query($connection, $sql) ;
		$data=mysqli_fetch_assoc($result);
		confirm_query($result);
		return $data['count'];
	}

	// Count Current Task
	function count_current_task($dt){
		global $connection;
		$query = "SELECT count(TEEndTime IS NULL) AS count FROM timeentry WHERE TEEndTime IS NULL AND date(TEDate) = '{$dt}'";
		$result = mysqli_query($connection, $query) ;
		$data=mysqli_fetch_assoc($result);
		confirm_query($result);
		return $data['count'];
	}
	
	//GET HOURS OF WORK
	function get_hours_work($dt1,$dt2){
	    global $connection;
		$query="SELECT SUM(CASE WHEN TEBill ='0' THEN aHours END) AS nonbill, SUM(CASE WHEN TEBill ='-1' THEN aHours END) AS bill,EmployeeID, EmpTitle, COUNT(TEEndTime) As Accomp, TEBillRate, SUM(aHours) As AHours, SUM(CASE WHEN TEBill ='-1' THEN TEBillRate * aHours END) AS total FROM (SELECT timeentry.EmployeeID,employee.EmpTitle,timeentry.TEBillRate,timeentry.aHours,timeentry.TEStartTime,timeentry.TEEndTime,timeentry.TEBill FROM timeentry INNER JOIN employee ON timeentry.EmployeeID = employee.EmployeeID WHERE timeentry.TEEndTIme IS NOT NULL AND DATE(timeentry.TEDate) BETWEEN '{$dt1}' AND '{$dt2}') AS res GROUP BY EmployeeID";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//GET ALL ONLINE AND ACTIVE EMPLOYEE for admin
	function get_all_employee_active(){
	    global $connection;
		$query="SELECT EmployeeID,EmpSalt,EmpFName,EmpMI,EmpLName,EmpTitle,EmpDepartment,Online FROM employee WHERE Status='Active' ORDER BY EmployeeID ASC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}

		//GET ALL ONLINE AND ACTIVE EMPLOYEE for team leader
	function get_all_employee_active_teamleader(){
	    global $connection;
		$query="SELECT EmployeeID,EmpSalt,EmpFName,EmpMI,EmpLName,EmpTitle,EmpDepartment,Online FROM employee WHERE Status='Active' and EmployeeID in(SELECT EmployeeID from employeetagging where Parenttag='{$_SESSION['EmployeeID']}') ORDER BY EmployeeID ASC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//get employee current activity
	function get_employee_current_activity($empid,$dt){
	    global $connection;
		$query="SELECT ActivityID,TEDescription FROM timeentry WHERE EmployeeID = '{$empid}' AND date(TEDate) = '{$dt}' AND TEEndTime IS NULL ORDER BY TEDate DESC, TEStartTime DESC LIMIT 1";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		$result_set=mysqli_fetch_assoc($result);
		return $result_set;
	}

	//get activity by activityID
	function get_activity_by_ID($id){
		   global $connection;
		$query="SELECT * FROM activity where ActivityID='{$id}' limit 1";
		$result = mysqli_query($connection, $query);
		confirm_query( $result);
		$result_set=mysqli_fetch_array($result);
		return $result_set;
	}
	
	//GET WORKING ON ACTIVITY
	function get_work_on_activity($act,$dt1,$dt2){
	    global $connection;
		$query="SELECT EmployeeID,ProjectID,ProjectName,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEDate FROM timeentry WHERE ActivityID = '{$act}' AND DATE(TEDate) BETWEEN '{$dt1}' AND '{$dt2}'";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
   //GET CLIENT ID
   function get_clientID(){
   	global $connection;
   	$query="SELECT ClientID from client ORDER BY clientID asc";
   	$result = mysqli_query($connection, $query) ;
    confirm_query( $result);
    return $result;
	}
	
    //GET ACTIVITY
   function get_activity(){
	global $connection;
	$query="SELECT * from activity";
	$result=mysqli_query($connection, $query);
	return $result;
   }
   
   //GET CLIENTS
   function get_client(){
	global $connection;
	$query="SELECT * from client";
	$result=mysqli_query($connection, $query);
	return $result;
   }
   
  //GET CLIENT BY CLIENTID
   function get_client_by_ID($id){
    global $connection;
    $query="SELECT * FROM client where ClientID='{$id}' limit 1";
	$result = mysqli_query($connection, $query);
	confirm_query( $result);
	$result_set=mysqli_fetch_array($result);
	return $result_set;
	}

   //get project all
   function get_project(){
    global $connection;
    $query="SELECT ProjectID,ProjectCode,ProjectPhase,ProjectName,ProjectStartDate,ProjectStatus from project";
    $result=mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
    }
	
   //get project by project id
   function get_project_by_id($id){
   	global $connection;
   	$query="SELECT * from project where ProjectID='{$id}'";
   	$result = mysqli_query($connection, $query);
   	confirm_query($result);
   	$result_set=mysqli_fetch_array($result);
   	return $result_set;
   }
   //get project for time entries
      function get_project_for_timeEntries(){
   	global $connection;
   	$query="SELECT ProjectID,ProjectName from project where ProjectStatus='Active' ORDER BY ProjectID asc";
   	$result = mysqli_query($connection, $query);
   	confirm_query($result);
   	return $result;
   }
   
   //GET PROJECT OF ACTIVITY BY ID
   function get_project_activity_id($id){
    global $connection;
    $query="SELECT ProjectID,ProjectCode,ProjectPhase,ProjectName,ProjectCountry,ProjectStatus,ProjectStartDate,EmployeeID FROM project WHERE ClientID='{$id}'";
    $result=mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
    }

    //get activity for time entries
    function get_activity_for_timeEntries(){
   	global $connection;
   	$query="SELECT ActivityID,ActivityDescription from activity ORDER BY ActivityID asc";
   	$result = mysqli_query($connection, $query);
   	confirm_query($result);
   	return $result;
    }
	
	//GET TOP AND LOSER REVENUE
	function get_top_loser_revenue(){
	    global $connection;
		$query="SELECT SUM(CASE WHEN TEBill ='0' THEN aHours END) AS nonbill, SUM(CASE WHEN TEBill ='-1' THEN aHours END) AS bill,ProjectID, ProjectName, COUNT(TEEndTime) AS Accomp, SUM(aHours) AS AHours, SUM(CASE WHEN TEBill ='-1' THEN TEBillRate * aHours END) AS total FROM (SELECT timeentry.ProjectID,project.ProjectName,timeentry.TEBillRate,timeentry.aHours,timeentry.TEStartTime,timeentry.TEEndTime,timeentry.TEBill FROM timeentry INNER JOIN project ON timeentry.ProjectID = project.ProjectID WHERE timeentry.TEEndTIme IS NOT NULL) AS res GROUP BY ProjectID ORDER BY total DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//CONVERT DECIMAL TO TIME
	function decimal_to_time($decimal) {
	// start by converting to seconds
    $seconds = ($decimal * 6000);
	$hour = floor($seconds / 3600);
	$min = ($seconds / 60) % 60;
    return $hour.":".$min;
	}
	
	//GET ON GOING PROJECT for admin
	function get_ongoing_project($dt){
	    global $connection;
		$query="SELECT ProjectID,ProjectName,COUNT(ActivityID) AS countAct,SUM(CASE WHEN TEBill ='0' THEN 1 END) AS numnonbill, SUM(CASE WHEN TEBill ='-1' THEN 1 END) AS numbill FROM timeentry WHERE date(TEDate) = '{$dt}' GROUP BY ProjectID";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
		//GET ON GOING PROJECT for team leader
	function get_ongoing_project_teamleader($dt){
	    global $connection;
		$query="SELECT ProjectID,ProjectName,COUNT(ActivityID) AS countAct,SUM(CASE WHEN TEBill ='0' THEN 1 END) AS numnonbill, SUM(CASE WHEN TEBill ='-1' THEN 1 END) AS numbill FROM timeentry WHERE date(TEDate) = '{$dt}' and EmployeeID in(SELECT EmployeeID from employeetagging where Parenttag='{$_SESSION['EmployeeID']}') and ProjectID in(SELECT ProjectID from projecttagging where EmployeeID='{$_SESSION['EmployeeID']}') GROUP BY ProjectID";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//GET ON GOING PROJECT BY ID
	function get_ongoing_project_by_id($id,$dt){
	    global $connection;
		$query="SELECT ActivityID,TEDescription,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE ProjectID='{$id}' AND date(TEDate) = '{$dt}' ORDER BY TEStartTime DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	//for on going project teamleader
	function get_ongoing_view_teamleader($id,$dt){
	    global $connection;
		$query="SELECT ActivityID,TEDescription,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE ProjectID='{$id}' AND date(TEDate) = '{$dt}' and EmployeeID in(SELECT EmployeeID from employeetagging where Parenttag='{$_SESSION['EmployeeID']}') ORDER BY TEStartTime DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//GET ON GOING PROJECT BY EMPLOYEE ID
	function get_ongoing_project_by_empid($id,$dt){
	    global $connection;
		$query="SELECT ActivityID,TEDescription,ProjectID, ProjectName,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE EmployeeID='{$id}' AND date(TEDate) = '{$dt}' ORDER BY TEStartTime DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	//on going project team leader
		function get_ongoing_project_empid_teamleader($id,$dt){
	    global $connection;
		$query="SELECT ActivityID,TEDescription,ProjectID, ProjectName,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE EmployeeID='{$id}' AND date(TEDate) = '{$dt}' and ProjectID in(SELECT ProjectID from projecttagging where EmployeeID='{$_SESSION['EmployeeID']}') ORDER BY TEStartTime DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//GET TRANSACTION HISTORY OF PROJECT BY ID
	function get_transaction_history_byprojectid($id){
	    global $connection;
		$query="SELECT Transactions,TEDate,ActivityID,TEDescription,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE ProjectID='{$id}' ORDER BY TEStartTime DESC, TEDate DESC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//CHECK NUMNER IF WHOLE
	function is_whole_number($var){
		return (is_numeric($var)&&(intval($var)==floatval($var)));
	}
	
	//for table time entry
	function get_timelog($id,$dt){
		global $connection;
		$query="SELECT aHours,id,ProjectID,ActivityID,TEBill,TEMemo,TEStartTime,TEEndTime,Transactions from timeentry where EmployeeID='{$id}' and date(TEDate)='{$dt}' ORDER BY TEStartTime DESC";
		$result=mysqli_query($connection, $query);
		confirm_query($result);
		return $result;
	}
	  
	//for time entry history by date
	function get_time_history_bydate($id,$start,$end){
	  global $connection;
	  $query="SELECT aHours,ProjectID,ActivityID,Transactions,TEBill,TEMemo,TEStartTime,TEEndTime,TEDate from timeentry where EmployeeID='{$id}' and  date(TEDate) BETWEEN '{$start}' AND '{$end}' ORDER BY TEEndTime DESC, TEDate desc";
	  $result=mysqli_query($connection, $query);
	  confirm_query( $result);
	  return $result;
	}
	
	//for time entry history by id
	function get_time_history_byid($id,$dt){
	  global $connection;
	  $query="SELECT aHours,ProjectID,ActivityID,Transactions,TEBill,TEMemo,TEStartTime,TEEndTime,TEDate from timeentry where EmployeeID='{$id}' AND date(TEDate) = '{$dt}' AND TEEndTime is not null ORDER BY TEEndTime DESC, TEDate desc";
	  $result=mysqli_query($connection, $query);
	  confirm_query( $result);
	  return $result;
	}
	
	//GET ALL TIME ENTRIES HISTORY
	function get_all_time_history_today($dt){
	  global $connection;
	  $query="SELECT EmployeeID,aHours,ProjectID,ActivityID,Transactions,TEBill,TEMemo,TEStartTime,TEEndTime,TEDate from timeentry WHERE date(TEDate) = '{$dt}' ORDER BY TEEndTime DESC, TEDate desc";
	  $result=mysqli_query($connection, $query);
	  confirm_query( $result);
	  return $result;
	}
	
	//GET ALL TIME ENTRIES HISTORY BY DATE
	function get_all_time_history_bydate($start,$end){
	  global $connection;
	  $query="SELECT EmployeeID,aHours,ProjectID,ActivityID,Transactions,TEBill,TEMemo,TEStartTime,TEEndTime,TEDate from timeentry where date(TEDate) BETWEEN '{$start}' AND '{$end}' ORDER BY TEEndTime DESC, TEDate desc";
	  $result=mysqli_query($connection, $query);
	  confirm_query( $result);
	  return $result;
	}
	//for the time entry count number of on going project
	function time_entry_ongoing($id,$dt){
	  global $connection;
	  $query = "SELECT count(id) as c FROM timeentry WHERE TEEndTime is null  AND date(TEDate) = '{$dt}' and EmployeeID='{$id}'";
	  $result = mysqli_query($connection, $query) ;
	  $data=mysqli_fetch_assoc($result);
	  confirm_query( $result);
	  return $data['c'];
	}

	//get all entries of employee in time entries
    function get_all_entries($dt){
      global $connection;
      $query="SELECT id,EmployeeID,TEDate,ProjectID,ActivityID,TEStartTime,TEEndTime,aHours from timeentry where TEEndTime is not null and  DATE(TEDate) = '{$dt}' order by TEDate desc";
      $result=mysqli_query($connection, $query);
      confirm_query($result);
      return $result;
      }
      //get all entries within date inputed
      function get_all_entries_by_date($start,$end){
      global $connection;
      $query="SELECT id,EmployeeID,TEDate,ProjectID,ActivityID,TEStartTime,TEEndTime,aHours from timeentry where TEEndTime is not null and date(TEDate) BETWEEN '{$start}' AND '{$end}' order by TEDate desc";
      $result=mysqli_query($connection, $query);
      confirm_query($result);
      return $result;
      }
    //for edit time entries
    function edit_time_entries($id){
      global $connection;
      $query="SELECT ProjectID, EmployeeID, ActivityID,TEBill, Transactions,TEStartTime,TEEndTime,TEDate FROM timeentry where id='{$id}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data;
     }

   //for time budget table
    function get_timeBudget_table(){
      global $connection;
      $query="SELECT ProjectID, ActivityID, TimeBudget, TBDate, id,TBStartDate,TBEndDate,position_name from timebudget";
      $result=mysqli_query($connection, $query);
      confirm_query($result);
      return $result;
      }

      //get time budget by id
    function get_timebudget_id($id){
      global $connection;
      $query="SELECT ProjectID, ActivityID, TimeBudget,TBStartDate,TBEndDate,position_id FROM timebudget where id='{$id}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data;
     }
	 
	 //GET TRANSACTION HISTORY BY FILTER
	function get_transaction_history_byfilter($projID,$actID,$dt1,$dt2){
	    global $connection;
		if($projID =='All' && $actID =='All'){
			//sql all
			$query="SELECT ProjectID,Transactions,TEDate,ActivityID,TEDescription,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE DATE(TEDate) BETWEEN '{$dt1}' AND '{$dt2}' ORDER BY TEStartTime DESC, TEDate DESC";
		}
		elseif($projID =='All' && $actID <>'All'){
			//pro all //act not all
			$query="SELECT ProjectID,Transactions,TEDate,ActivityID,TEDescription,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE ActivityID='{$actID}' AND DATE(TEDate) BETWEEN '{$dt1}' AND '{$dt2}' ORDER BY TEStartTime DESC, TEDate DESC";
		}
		elseif($projID <>'All' && $actID =='All'){
			//pro not all //act all
			$query="SELECT ProjectID,Transactions,TEDate,ActivityID,TEDescription,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE ProjectID='{$projID}' AND DATE(TEDate) BETWEEN '{$dt1}' AND '{$dt2}' ORDER BY TEStartTime DESC, TEDate DESC";
		}
		else{
			//pro & act not all
			$query="SELECT ProjectID,Transactions,TEDate,ActivityID,TEDescription,TEMemo,TEBill,aHours,TEStartTime,TEEndTime,TEBillRate,EmployeeID,(TEBillRate * aHours) AS total FROM timeentry WHERE ProjectID='{$projID}' AND ActivityID='{$actID}' AND DATE(TEDate) BETWEEN '{$dt1}' AND '{$dt2}' ORDER BY TEStartTime DESC, TEDate DESC";
		}
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	
	//GET TOTAL BY MONTH FOR BILLABLE GRAPH
    function get_total_bymonth_graph($mon,$dt){
      global $connection;
      $query="SELECT SUM(CASE WHEN TEBill ='-1' THEN TEBillRate * aHours END) AS total FROM timeentry WHERE YEAR(TEDate) = YEAR('{$dt}') AND monthname(TEDate) = '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }
	 
	 //GET TOTAL BY MONTH FOR NON BILLABLE GRAPH
    function get_total_bymonth_nonbill_graph($mon,$dt){
      global $connection;
      $query="SELECT SUM(CASE WHEN TEBill ='0' THEN TEBillRate * aHours END) AS total FROM timeentry WHERE YEAR(TEDate) = YEAR('{$dt}') AND monthname(TEDate) = '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }
	 
	 //GET TOTAL BY MONTH FOR BILLABLE GRAPH COMPARISON
    function get_total_bymonth_graph_comp($mon,$yr){
      global $connection;
      $query="SELECT SUM(CASE WHEN TEBill ='-1' THEN TEBillRate * aHours END) AS total FROM timeentry WHERE YEAR(TEDate) = '{$yr}' AND monthname(TEDate) = '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }
	 
	 //GET TOTAL BY MONTH FOR NON BILLABLE GRAPH COMPARISON
    function get_total_bymonth_nonbill_graph_comp($mon,$yr){
      global $connection;
      $query="SELECT SUM(CASE WHEN TEBill ='0' THEN TEBillRate * aHours END) AS total FROM timeentry WHERE YEAR(TEDate) = '{$yr}' AND monthname(TEDate) = '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }
	 
	 //GET TOTAL BILLABLE BAR GRAPH
    function get_total_bill_bar_graph($mon,$dt){
      global $connection;
      $query="SELECT IFNULL(SUM(CASE WHEN TEBill ='-1' THEN 1 END),0) AS total FROM timeentry WHERE YEAR(TEDate) = YEAR('{$dt}') AND monthname(TEDate)= '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }
	 
	//GET TOTAL NON BILLABLE BAR GRAPH
    function get_total_nonbill_bar_graph($mon,$dt){
      global $connection;
      $query="SELECT IFNULL(SUM(CASE WHEN TEBill ='0' THEN 1 END),0) AS total FROM timeentry WHERE YEAR(TEDate) = YEAR('{$dt}') AND monthname(TEDate)= '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }
	 
	 //GET TOTAL BILLABLE BAR GRAPH COMPARISON
    function get_total_bill_bar_graph_comp($mon,$yr){
      global $connection;
      $query="SELECT IFNULL(SUM(CASE WHEN TEBill ='-1' THEN 1 END),0) AS total FROM timeentry WHERE YEAR(TEDate) = '{$yr}' AND monthname(TEDate)= '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }
	 
	//GET TOTAL NON BILLABLE BAR GRAPH COMPARISON
    function get_total_nonbill_bar_graph_comp($mon,$yr){
      global $connection;
      $query="SELECT IFNULL(SUM(CASE WHEN TEBill ='0' THEN 1 END),0) AS total FROM timeentry WHERE YEAR(TEDate) = '{$yr}' AND monthname(TEDate)= '{$mon}'";
      $result=mysqli_query($connection, $query);
      $data=mysqli_fetch_assoc($result);
	  confirm_query( $data);
      return $data['total'];
     }

    //for ahours computation
	function compute_ahours($strStart,$strEnd){
     global $connection;
     $dteStart = new DateTime($strStart); 
     $dteEnd   = new DateTime($strEnd); 
     $dteDiff  = $dteStart->diff($dteEnd); 
     $duration = $dteDiff->format("%h:%I:%S"); 
     $result_set= explode(":",$duration);
     $hours=$result_set['0']*3600;
     $mins= $result_set['1']*60;
     $total=$hours+$mins+ $result_set['2'];
     $r1=number_format($total, 2, '.', '');
     $r2=$r1/60;
     $r3=$r2/60;
     $ahours= round($r3,2);
    return $ahours;
   }

   //for time and actual budget
   function get_project_in_timeentry(){
   	global $connection;
   	$query="SELECT ProjectName,ProjectID from timeentry GROUP BY ProjectName ORDER BY ProjectID ASC";
    $result=mysqli_query($connection, $query);
    confirm_query($result);
    return $result;
    }

   function get_timeentry($name,$dt1,$dt2){
	   	global $connection;
	   	$query="SELECT distinct ActivityID,TEDescription from timeentry where ProjectName='{$name}' AND DATE(TEDate) BETWEEN '{$dt1}' AND '{$dt2}' ";
	    $result=mysqli_query($connection, $query);
	    confirm_query($result);
	    return $result;
    }
	
    function get_date_in_timeBudget($name){
	   	global $connection;
	   	$query="SELECT TBStartDate, TBEndDate,id from timebudget where ProjectName='{$name}'";
	    $result=mysqli_query($connection, $query);
	    confirm_query($result);
	    return $result;
    }
	
   function get_timeentry_name($name,$dt1,$dt2){
	   	global $connection;
	   	$query="SELECT distinct EmployeeID from timeentry where ProjectName='{$name}' AND DATE(TEDate) BETWEEN '{$dt1}' AND '{$dt2}' ";
	    $result=mysqli_query($connection, $query);
	    confirm_query($result);
	    return $result;
    }

    //get employee by employeeID
	function get_employee_name_only($empid){
	global $connection;
		$query="SELECT EmpFName,EmpMI,EmpLName FROM employee where EmployeeID='{$empid}'";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		$result_set=mysqli_fetch_assoc($result);
		return $result_set;
	}
	
	function get_employee_dropdown(){
		global $connection;
		$query="SELECT EmpFName,EmpMI,EmpLName,EmployeeID,id FROM employee where Status='Active' order by EmployeeID";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		return $result;
	}
	
	//get team leader
	function get_tl($id){
		global $connection;
		$query="SELECT * FROM employeetagging where EmployeeID='$id' order by EmployeeID";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		return $result;
	}

	//get online with idle time
	function get_all_employee_idle($dt){
	    global $connection;
		$query="SELECT tbl1.EmployeeID,tbl1.EmpSalt,tbl1.EmpFName,tbl1.EmpMI,tbl1.EmpLName,tbl1.EmpTitle,tbl1.EmpDepartment,tbl1.Online FROM employee tbl1 WHERE tbl1.Status='Active' and Online='1' and NOT EXISTS (SELECT tbl2.EmployeeID from timeentry tbl2 WHERE tbl2.TEEndTime IS NULL AND date(tbl2.TEDate) = '{$dt}') ORDER BY tbl1.EmployeeID ASC";
		$result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		return $result;
	}
	//get available time
	function get_available_time($id,$dt){
		global $connection;
		$query="SELECT 8-SUM(aHours) AS t from timeentry WHERE TEEndTime IS NOT NULL AND date(TEDate) = '{$dt}' and EmployeeID='{$id}' ORDER BY EmployeeID ASC";
	    $result = mysqli_query($connection, $query) ;
		confirm_query( $result);
		$result_set=mysqli_fetch_assoc($result);
		return $result_set['t'];
	}
	
	//get project tagging
	function get_project_tagging(){
		global $connection;
		$query="SELECT * FROM projecttagging  order by ProjectName";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		return $result;
	}

	//for viewing project tagging list
    function get_project_in_timeentry_year($year,$month){
        global $connection;
        $query="SELECT distinct ProjectName, ProjectID from timebudget where YEAR(TBEndDate)='{$year}' and monthname(TBEndDate)='{$month}' order by ProjectName desc";
         $result=mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }
	
    function get_project_in_timeentry_table($year,$month,$project){
        global $connection;
        $query="SELECT distinct ProjectID,ProjectName,ActivityID,ActivityDescription,position_name,TimeBudget,TBStartDate,TBEndDate,TBDate from timebudget where YEAR(TBEndDate)='{$year}' and monthname(TBEndDate)='{$month}' and ProjectID='{$project}' order by TBEndDate desc";
         $result=mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function get_project_in_timeentry_curdate($dt){
        global $connection;
        $query="SELECT distinct id,ProjectID,ProjectName,ActivityID,ActivityDescription,position_name,TimeBudget,TBStartDate,TBEndDate,TBDate from timebudget where DATE(TBDate) = '{$dt}' order by TBDate desc";
         $result=mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

	//TIME VS ACTUAL BUDGET GET ACTIVITY
	function tabudget_getactivity($project,$month,$year){
        global $connection;
        $query="SELECT DISTINCT(ActivityID),TEDescription FROM timeentry WHERE YEAR(TEDate)='{$year}' AND monthname(TEDate)='{$month}' AND ProjectID='{$project}' ORDER BY ActivityID ASC";
        $result=mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }
	
	//TIME VS ACTUAL BUDGET GET ACTIVITY MEMO
	function tabudget_getactivitymemo($act,$project,$month,$year){
        global $connection;
        $query="SELECT DISTINCT(TEMemo) FROM timeentry WHERE YEAR(TEDate)='{$year}' AND monthname(TEDate)='{$month}' AND ProjectID='{$project}' AND ActivityID='{$act}' ORDER BY TEMemo ASC";
        $result=mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }
	
	//TIME VS ACTUAL BUDGET GET EMPLOYEE
	function tabudget_getactivityemp($project,$month,$year){
        global $connection;
        $query="SELECT DISTINCT(timeentry.EmployeeID),EmpLName,EmpMI,EmpFName,EmpTitle FROM timeentry INNER JOIN employee ON timeentry.EmployeeID=employee.EmployeeID WHERE YEAR(TEDate)='{$year}' AND monthname(TEDate)='{$month}' AND ProjectID='{$project}' ORDER BY timeentry.EmployeeID ASC";
        $result=mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }
	
	//TIME VS ACTUAL BUDGET GET EMPLOYEE
	function tabudget_getactivityemptime($memo,$empid,$act,$project,$month,$year){
		global $connection;
		$query="SELECT SUM(aHours) as cnt FROM timeentry WHERE YEAR(TEDate)='{$year}' AND monthname(TEDate)='{$month}' AND ProjectID='{$project}' AND ActivityID='{$act}' AND EmployeeID='{$empid}' AND TEMemo='{$memo}'";
		$result = mysqli_query($connection, $query) ;
		$data=mysqli_fetch_assoc($result);
		confirm_query( $result);
		return $data['cnt'];
    }
	
	//TIME VS ACTUAL BUDGET COMPUTE TOTAL PER EMPLOYEE
	function tabudget_computeperemp($empid,$project,$month,$year){
		global $connection;
		$query="SELECT SUM(aHours) as cnt FROM timeentry WHERE YEAR(TEDate)='{$year}' AND monthname(TEDate)='{$month}' AND ProjectID='{$project}' AND EmployeeID='{$empid}'";
		$result = mysqli_query($connection, $query) ;
		$data=mysqli_fetch_assoc($result);
		confirm_query( $result);
		return $data['cnt'];
    }
	

?>