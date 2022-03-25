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
$pharmacy_billing_transfer_view = new pharmacy_billing_transfer_view();

// Run the page
$pharmacy_billing_transfer_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_transfer_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_billing_transfer_view->isExport()) { ?>
<script>
var fpharmacy_billing_transferview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_billing_transferview = currentForm = new ew.Form("fpharmacy_billing_transferview", "view");
	loadjs.done("fpharmacy_billing_transferview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_billing_transfer_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_billing_transfer_view->ExportOptions->render("body") ?>
<?php $pharmacy_billing_transfer_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_billing_transfer_view->showPageHeader(); ?>
<?php
$pharmacy_billing_transfer_view->showMessage();
?>
<form name="fpharmacy_billing_transferview" id="fpharmacy_billing_transferview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_transfer_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($pharmacy_billing_transfer_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_id"><script id="tpc_pharmacy_billing_transfer_id" type="text/html"><?php echo $pharmacy_billing_transfer_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $pharmacy_billing_transfer_view->id->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_id" type="text/html"><span id="el_pharmacy_billing_transfer_id">
<span<?php echo $pharmacy_billing_transfer_view->id->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->PharID->Visible) { // PharID ?>
	<tr id="r_PharID">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_PharID"><script id="tpc_pharmacy_billing_transfer_PharID" type="text/html"><?php echo $pharmacy_billing_transfer_view->PharID->caption() ?></script></span></td>
		<td data-name="PharID" <?php echo $pharmacy_billing_transfer_view->PharID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_PharID" type="text/html"><span id="el_pharmacy_billing_transfer_PharID">
<span<?php echo $pharmacy_billing_transfer_view->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->PharID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->pharmacy->Visible) { // pharmacy ?>
	<tr id="r_pharmacy">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_pharmacy"><script id="tpc_pharmacy_billing_transfer_pharmacy" type="text/html"><?php echo $pharmacy_billing_transfer_view->pharmacy->caption() ?></script></span></td>
		<td data-name="pharmacy" <?php echo $pharmacy_billing_transfer_view->pharmacy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_pharmacy" type="text/html"><span id="el_pharmacy_billing_transfer_pharmacy">
<span<?php echo $pharmacy_billing_transfer_view->pharmacy->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->pharmacy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_Details"><script id="tpc_pharmacy_billing_transfer_Details" type="text/html"><?php echo $pharmacy_billing_transfer_view->Details->caption() ?></script></span></td>
		<td data-name="Details" <?php echo $pharmacy_billing_transfer_view->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_Details" type="text/html"><span id="el_pharmacy_billing_transfer_Details">
<span<?php echo $pharmacy_billing_transfer_view->Details->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->Details->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_createdby"><script id="tpc_pharmacy_billing_transfer_createdby" type="text/html"><?php echo $pharmacy_billing_transfer_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $pharmacy_billing_transfer_view->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_createdby" type="text/html"><span id="el_pharmacy_billing_transfer_createdby">
<span<?php echo $pharmacy_billing_transfer_view->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_createddatetime"><script id="tpc_pharmacy_billing_transfer_createddatetime" type="text/html"><?php echo $pharmacy_billing_transfer_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_billing_transfer_view->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_createddatetime" type="text/html"><span id="el_pharmacy_billing_transfer_createddatetime">
<span<?php echo $pharmacy_billing_transfer_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_modifiedby"><script id="tpc_pharmacy_billing_transfer_modifiedby" type="text/html"><?php echo $pharmacy_billing_transfer_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_billing_transfer_view->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_modifiedby" type="text/html"><span id="el_pharmacy_billing_transfer_modifiedby">
<span<?php echo $pharmacy_billing_transfer_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_modifieddatetime"><script id="tpc_pharmacy_billing_transfer_modifieddatetime" type="text/html"><?php echo $pharmacy_billing_transfer_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_billing_transfer_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_modifieddatetime" type="text/html"><span id="el_pharmacy_billing_transfer_modifieddatetime">
<span<?php echo $pharmacy_billing_transfer_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_HospID"><script id="tpc_pharmacy_billing_transfer_HospID" type="text/html"><?php echo $pharmacy_billing_transfer_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $pharmacy_billing_transfer_view->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_HospID" type="text/html"><span id="el_pharmacy_billing_transfer_HospID">
<span<?php echo $pharmacy_billing_transfer_view->HospID->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_RIDNO"><script id="tpc_pharmacy_billing_transfer_RIDNO" type="text/html"><?php echo $pharmacy_billing_transfer_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $pharmacy_billing_transfer_view->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_RIDNO" type="text/html"><span id="el_pharmacy_billing_transfer_RIDNO">
<span<?php echo $pharmacy_billing_transfer_view->RIDNO->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_TidNo"><script id="tpc_pharmacy_billing_transfer_TidNo" type="text/html"><?php echo $pharmacy_billing_transfer_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $pharmacy_billing_transfer_view->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_TidNo" type="text/html"><span id="el_pharmacy_billing_transfer_TidNo">
<span<?php echo $pharmacy_billing_transfer_view->TidNo->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_CId"><script id="tpc_pharmacy_billing_transfer_CId" type="text/html"><?php echo $pharmacy_billing_transfer_view->CId->caption() ?></script></span></td>
		<td data-name="CId" <?php echo $pharmacy_billing_transfer_view->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_CId" type="text/html"><span id="el_pharmacy_billing_transfer_CId">
<span<?php echo $pharmacy_billing_transfer_view->CId->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->CId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_PatId"><script id="tpc_pharmacy_billing_transfer_PatId" type="text/html"><?php echo $pharmacy_billing_transfer_view->PatId->caption() ?></script></span></td>
		<td data-name="PatId" <?php echo $pharmacy_billing_transfer_view->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_PatId" type="text/html"><span id="el_pharmacy_billing_transfer_PatId">
<span<?php echo $pharmacy_billing_transfer_view->PatId->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->PatId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_DrID"><script id="tpc_pharmacy_billing_transfer_DrID" type="text/html"><?php echo $pharmacy_billing_transfer_view->DrID->caption() ?></script></span></td>
		<td data-name="DrID" <?php echo $pharmacy_billing_transfer_view->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_DrID" type="text/html"><span id="el_pharmacy_billing_transfer_DrID">
<span<?php echo $pharmacy_billing_transfer_view->DrID->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->DrID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_BillStatus"><script id="tpc_pharmacy_billing_transfer_BillStatus" type="text/html"><?php echo $pharmacy_billing_transfer_view->BillStatus->caption() ?></script></span></td>
		<td data-name="BillStatus" <?php echo $pharmacy_billing_transfer_view->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_BillStatus" type="text/html"><span id="el_pharmacy_billing_transfer_BillStatus">
<span<?php echo $pharmacy_billing_transfer_view->BillStatus->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->BillStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->transfer->Visible) { // transfer ?>
	<tr id="r_transfer">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_transfer"><script id="tpc_pharmacy_billing_transfer_transfer" type="text/html"><?php echo $pharmacy_billing_transfer_view->transfer->caption() ?></script></span></td>
		<td data-name="transfer" <?php echo $pharmacy_billing_transfer_view->transfer->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_transfer" type="text/html"><span id="el_pharmacy_billing_transfer_transfer">
<span<?php echo $pharmacy_billing_transfer_view->transfer->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->transfer->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_street"><script id="tpc_pharmacy_billing_transfer_street" type="text/html"><?php echo $pharmacy_billing_transfer_view->street->caption() ?></script></span></td>
		<td data-name="street" <?php echo $pharmacy_billing_transfer_view->street->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_street" type="text/html"><span id="el_pharmacy_billing_transfer_street">
<span<?php echo $pharmacy_billing_transfer_view->street->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->street->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->area->Visible) { // area ?>
	<tr id="r_area">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_area"><script id="tpc_pharmacy_billing_transfer_area" type="text/html"><?php echo $pharmacy_billing_transfer_view->area->caption() ?></script></span></td>
		<td data-name="area" <?php echo $pharmacy_billing_transfer_view->area->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_area" type="text/html"><span id="el_pharmacy_billing_transfer_area">
<span<?php echo $pharmacy_billing_transfer_view->area->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->area->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_town"><script id="tpc_pharmacy_billing_transfer_town" type="text/html"><?php echo $pharmacy_billing_transfer_view->town->caption() ?></script></span></td>
		<td data-name="town" <?php echo $pharmacy_billing_transfer_view->town->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_town" type="text/html"><span id="el_pharmacy_billing_transfer_town">
<span<?php echo $pharmacy_billing_transfer_view->town->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->town->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_province"><script id="tpc_pharmacy_billing_transfer_province" type="text/html"><?php echo $pharmacy_billing_transfer_view->province->caption() ?></script></span></td>
		<td data-name="province" <?php echo $pharmacy_billing_transfer_view->province->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_province" type="text/html"><span id="el_pharmacy_billing_transfer_province">
<span<?php echo $pharmacy_billing_transfer_view->province->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->province->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_postal_code"><script id="tpc_pharmacy_billing_transfer_postal_code" type="text/html"><?php echo $pharmacy_billing_transfer_view->postal_code->caption() ?></script></span></td>
		<td data-name="postal_code" <?php echo $pharmacy_billing_transfer_view->postal_code->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_postal_code" type="text/html"><span id="el_pharmacy_billing_transfer_postal_code">
<span<?php echo $pharmacy_billing_transfer_view->postal_code->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->postal_code->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer_view->phone_no->Visible) { // phone_no ?>
	<tr id="r_phone_no">
		<td class="<?php echo $pharmacy_billing_transfer_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_phone_no"><script id="tpc_pharmacy_billing_transfer_phone_no" type="text/html"><?php echo $pharmacy_billing_transfer_view->phone_no->caption() ?></script></span></td>
		<td data-name="phone_no" <?php echo $pharmacy_billing_transfer_view->phone_no->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_transfer_phone_no" type="text/html"><span id="el_pharmacy_billing_transfer_phone_no">
<span<?php echo $pharmacy_billing_transfer_view->phone_no->viewAttributes() ?>><?php echo $pharmacy_billing_transfer_view->phone_no->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_pharmacy_billing_transferview" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_transferview" type="text/html">
<div id="ct_pharmacy_billing_transfer_view"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
			$invoiceId = $Page->id->CurrentValue;
			$patient_id = $Page->PatientId->CurrentValue;
			$PatId = $Page->PatId->CurrentValue;
			$HospID = $Page->HospID->CurrentValue;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: {{:BillNumber}}</td></tr>
		<tr><td  style="float:left;">Patient Name: {{:PatientName}}</td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: {{:Doctor}}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
		<font size="4" >
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>Description</b></td>
<td><b>Item Code</b></td>
<td><b align="right">Amount</b></td>
</tr>
							 <?php
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Vid='".$invoiceId."'  and TestType != 'ProfileSubTest';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td align="right">Total</td><td align="right">'.$Page->Amount->CurrentValue.'</td></tr>  ';
echo $hhh;
$tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>		
</table> 
<br><br>
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</script>

<?php
	if (in_array("view_pharmacytransfer", explode(",", $pharmacy_billing_transfer->getCurrentDetailTable())) && $view_pharmacytransfer->DetailView) {
?>
<?php if ($pharmacy_billing_transfer->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacytransfer", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacytransfergrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_transfer->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_billing_transferview", "tpm_pharmacy_billing_transferview", "pharmacy_billing_transferview", "<?php echo $pharmacy_billing_transfer->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_billing_transferview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_billing_transfer_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_transfer_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_billing_transfer_view->terminate();
?>