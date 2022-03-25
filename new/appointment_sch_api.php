<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$appointment_sch_api = new appointment_sch_api();

// Run the page
$appointment_sch_api->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>


<?php

$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.appointment_scheduler where start_date between '".$fromdt."' and '".$todate."' and DoctorID='".$Drid."';";
$rs = $dbhelper->LoadRecordset($sql);
$products_arr["data"]=array();
while (!$rs->EOF) {
	$row = &$rs->fields;



		$product_item=array(
		   "id" => $row["id"],
		   "start_date" => $row["start_date"] ,

			"end_date" => $row["end_date"] ,
"text" => $row["patientName"] ,
"details" => $row["DoctorName"] );
		array_push($products_arr["data"], $product_item);
$rs->MoveNext();
}

$rrr = json_encode($products_arr);

$kk = $rrr;

echo json_encode($products_arr);

?>


<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$appointment_sch_api->terminate();
?>