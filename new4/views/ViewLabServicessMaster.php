<?php

namespace PHPMaker2021\HIMS;

// Table
$view_lab_servicess = Container("view_lab_servicess");
?>
<?php if ($view_lab_servicess->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_servicessmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($view_lab_servicess->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_id"><?= $view_lab_servicess->id->caption() ?></template></td>
            <td <?= $view_lab_servicess->id->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_id"><span id="el_view_lab_servicess_id">
<span<?= $view_lab_servicess->id->viewAttributes() ?>>
<?= $view_lab_servicess->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->SID->Visible) { // SID ?>
        <tr id="r_SID">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_SID"><?= $view_lab_servicess->SID->caption() ?></template></td>
            <td <?= $view_lab_servicess->SID->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_SID"><span id="el_view_lab_servicess_SID">
<span<?= $view_lab_servicess->SID->viewAttributes() ?>>
<?= $view_lab_servicess->SID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_PatientId"><?= $view_lab_servicess->PatientId->caption() ?></template></td>
            <td <?= $view_lab_servicess->PatientId->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_PatientId"><span id="el_view_lab_servicess_PatientId">
<span<?= $view_lab_servicess->PatientId->viewAttributes() ?>>
<?= $view_lab_servicess->PatientId->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_PatientName"><?= $view_lab_servicess->PatientName->caption() ?></template></td>
            <td <?= $view_lab_servicess->PatientName->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_PatientName"><span id="el_view_lab_servicess_PatientName">
<span<?= $view_lab_servicess->PatientName->viewAttributes() ?>>
<?= $view_lab_servicess->PatientName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->Gender->Visible) { // Gender ?>
        <tr id="r_Gender">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_Gender"><?= $view_lab_servicess->Gender->caption() ?></template></td>
            <td <?= $view_lab_servicess->Gender->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_Gender"><span id="el_view_lab_servicess_Gender">
<span<?= $view_lab_servicess->Gender->viewAttributes() ?>>
<?= $view_lab_servicess->Gender->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->Mobile->Visible) { // Mobile ?>
        <tr id="r_Mobile">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_Mobile"><?= $view_lab_servicess->Mobile->caption() ?></template></td>
            <td <?= $view_lab_servicess->Mobile->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_Mobile"><span id="el_view_lab_servicess_Mobile">
<span<?= $view_lab_servicess->Mobile->viewAttributes() ?>>
<?= $view_lab_servicess->Mobile->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_Doctor"><?= $view_lab_servicess->Doctor->caption() ?></template></td>
            <td <?= $view_lab_servicess->Doctor->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_Doctor"><span id="el_view_lab_servicess_Doctor">
<span<?= $view_lab_servicess->Doctor->viewAttributes() ?>>
<?= $view_lab_servicess->Doctor->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_ModeofPayment"><?= $view_lab_servicess->ModeofPayment->caption() ?></template></td>
            <td <?= $view_lab_servicess->ModeofPayment->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_ModeofPayment"><span id="el_view_lab_servicess_ModeofPayment">
<span<?= $view_lab_servicess->ModeofPayment->viewAttributes() ?>>
<?= $view_lab_servicess->ModeofPayment->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_Amount"><?= $view_lab_servicess->Amount->caption() ?></template></td>
            <td <?= $view_lab_servicess->Amount->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_Amount"><span id="el_view_lab_servicess_Amount">
<span<?= $view_lab_servicess->Amount->viewAttributes() ?>>
<?= $view_lab_servicess->Amount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_HospID"><?= $view_lab_servicess->HospID->caption() ?></template></td>
            <td <?= $view_lab_servicess->HospID->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_HospID"><span id="el_view_lab_servicess_HospID">
<span<?= $view_lab_servicess->HospID->viewAttributes() ?>>
<?= $view_lab_servicess->HospID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->RIDNO->Visible) { // RIDNO ?>
        <tr id="r_RIDNO">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_RIDNO"><?= $view_lab_servicess->RIDNO->caption() ?></template></td>
            <td <?= $view_lab_servicess->RIDNO->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_RIDNO"><span id="el_view_lab_servicess_RIDNO">
<span<?= $view_lab_servicess->RIDNO->viewAttributes() ?>>
<?= $view_lab_servicess->RIDNO->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->PartnerName->Visible) { // PartnerName ?>
        <tr id="r_PartnerName">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_PartnerName"><?= $view_lab_servicess->PartnerName->caption() ?></template></td>
            <td <?= $view_lab_servicess->PartnerName->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_PartnerName"><span id="el_view_lab_servicess_PartnerName">
<span<?= $view_lab_servicess->PartnerName->viewAttributes() ?>>
<?= $view_lab_servicess->PartnerName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->PatId->Visible) { // PatId ?>
        <tr id="r_PatId">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_PatId"><?= $view_lab_servicess->PatId->caption() ?></template></td>
            <td <?= $view_lab_servicess->PatId->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_PatId"><span id="el_view_lab_servicess_PatId">
<span<?= $view_lab_servicess->PatId->viewAttributes() ?>>
<?= $view_lab_servicess->PatId->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->DrDepartment->Visible) { // DrDepartment ?>
        <tr id="r_DrDepartment">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_DrDepartment"><?= $view_lab_servicess->DrDepartment->caption() ?></template></td>
            <td <?= $view_lab_servicess->DrDepartment->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_DrDepartment"><span id="el_view_lab_servicess_DrDepartment">
<span<?= $view_lab_servicess->DrDepartment->viewAttributes() ?>>
<?= $view_lab_servicess->DrDepartment->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->RefferedBy->Visible) { // RefferedBy ?>
        <tr id="r_RefferedBy">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_RefferedBy"><?= $view_lab_servicess->RefferedBy->caption() ?></template></td>
            <td <?= $view_lab_servicess->RefferedBy->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_RefferedBy"><span id="el_view_lab_servicess_RefferedBy">
<span<?= $view_lab_servicess->RefferedBy->viewAttributes() ?>>
<?= $view_lab_servicess->RefferedBy->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_BillNumber"><?= $view_lab_servicess->BillNumber->caption() ?></template></td>
            <td <?= $view_lab_servicess->BillNumber->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_BillNumber"><span id="el_view_lab_servicess_BillNumber">
<span<?= $view_lab_servicess->BillNumber->viewAttributes() ?>>
<?= $view_lab_servicess->BillNumber->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_lab_servicess->LabTestReleased->Visible) { // LabTestReleased ?>
        <tr id="r_LabTestReleased">
            <td class="<?= $view_lab_servicess->TableLeftColumnClass ?>"><template id="tpc_view_lab_servicess_LabTestReleased"><?= $view_lab_servicess->LabTestReleased->caption() ?></template></td>
            <td <?= $view_lab_servicess->LabTestReleased->cellAttributes() ?>>
<template id="tpx_view_lab_servicess_LabTestReleased"><span id="el_view_lab_servicess_LabTestReleased">
<span<?= $view_lab_servicess->LabTestReleased->viewAttributes() ?>>
<?= $view_lab_servicess->LabTestReleased->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_view_lab_servicessmaster" class="ew-custom-template"></div>
<template id="tpm_view_lab_servicessmaster">
<div id="ct_ViewLabServicessMaster"><style>
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
 ?>
<h2 align="center">Patient Report Entry</h2>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">PatientId: {{: PatientId }} </td><td  style="float: right;">Bill No: {{: BillNumber }}</td></tr>
		<tr><td  style="float:left;">Patient Name: {{: PatientName }}</td><td  style="float: right;">Bill Date: {{: createddatetime }}</td></tr>
		<tr><td  style="float:left;"> Age: {{: Age }} </td><td  style="float: right;">Consultant: {{: Doctor }}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: {{: Gender }} </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($view_lab_servicess->Rows) ?> };
    ew.applyTemplate("tpd_view_lab_servicessmaster", "tpm_view_lab_servicessmaster", "view_lab_servicessmaster", "<?= $view_lab_servicess->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
