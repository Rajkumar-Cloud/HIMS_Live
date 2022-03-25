<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 
?>
<?php include_once "autoload.php" ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ajaxselect = new ajaxselect();

// Run the page
$ajaxselect->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php" ?>
<?php

$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();


$control =  $_POST["control"];

if($control == null)
{
	$control =  $_GET["control"];
}

if($control == "patientProPicture")
{

	$data = $_POST['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$patientId = $item['patientId'];
			$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patientId."';";
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
	}
			$rrr = json_encode($products_arr);
			$kk = $rrr;

	echo json_encode($products_arr);

}
?>
<?php if (DEBUG_ENABLED) echo GetDebugMessage(); ?>
<?php include_once "footer.php" ?>
<?php
$ajaxselect->terminate();
?>