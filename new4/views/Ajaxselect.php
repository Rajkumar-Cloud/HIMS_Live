<?php

namespace PHPMaker2021\HIMS;

// Page object
$Ajaxselect = &$Page;
?>
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

<?= GetDebugMessage() ?>
