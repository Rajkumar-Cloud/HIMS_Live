<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_lab_services_auth->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_services_authmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($view_lab_services_auth->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_id" type="text/html"><?php echo $view_lab_services_auth->id->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->id->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_id" type="text/html"><span id="el_view_lab_services_auth_id">
<span<?php echo $view_lab_services_auth->id->viewAttributes() ?>><?php echo $view_lab_services_auth->id->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->SID->Visible) { // SID ?>
		<tr id="r_SID">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_SID" type="text/html"><?php echo $view_lab_services_auth->SID->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->SID->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_SID" type="text/html"><span id="el_view_lab_services_auth_SID">
<span<?php echo $view_lab_services_auth->SID->viewAttributes() ?>><?php echo $view_lab_services_auth->SID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_PatientId" type="text/html"><?php echo $view_lab_services_auth->PatientId->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->PatientId->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PatientId" type="text/html"><span id="el_view_lab_services_auth_PatientId">
<span<?php echo $view_lab_services_auth->PatientId->viewAttributes() ?>><?php echo $view_lab_services_auth->PatientId->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_PatientName" type="text/html"><?php echo $view_lab_services_auth->PatientName->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->PatientName->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PatientName" type="text/html"><span id="el_view_lab_services_auth_PatientName">
<span<?php echo $view_lab_services_auth->PatientName->viewAttributes() ?>><?php echo $view_lab_services_auth->PatientName->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Gender->Visible) { // Gender ?>
		<tr id="r_Gender">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_Gender" type="text/html"><?php echo $view_lab_services_auth->Gender->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->Gender->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Gender" type="text/html"><span id="el_view_lab_services_auth_Gender">
<span<?php echo $view_lab_services_auth->Gender->viewAttributes() ?>><?php echo $view_lab_services_auth->Gender->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Mobile->Visible) { // Mobile ?>
		<tr id="r_Mobile">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_Mobile" type="text/html"><?php echo $view_lab_services_auth->Mobile->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->Mobile->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Mobile" type="text/html"><span id="el_view_lab_services_auth_Mobile">
<span<?php echo $view_lab_services_auth->Mobile->viewAttributes() ?>><?php echo $view_lab_services_auth->Mobile->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_Doctor" type="text/html"><?php echo $view_lab_services_auth->Doctor->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->Doctor->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Doctor" type="text/html"><span id="el_view_lab_services_auth_Doctor">
<span<?php echo $view_lab_services_auth->Doctor->viewAttributes() ?>><?php echo $view_lab_services_auth->Doctor->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_ModeofPayment" type="text/html"><?php echo $view_lab_services_auth->ModeofPayment->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_ModeofPayment" type="text/html"><span id="el_view_lab_services_auth_ModeofPayment">
<span<?php echo $view_lab_services_auth->ModeofPayment->viewAttributes() ?>><?php echo $view_lab_services_auth->ModeofPayment->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_Amount" type="text/html"><?php echo $view_lab_services_auth->Amount->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->Amount->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Amount" type="text/html"><span id="el_view_lab_services_auth_Amount">
<span<?php echo $view_lab_services_auth->Amount->viewAttributes() ?>><?php echo $view_lab_services_auth->Amount->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_HospID" type="text/html"><?php echo $view_lab_services_auth->HospID->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_HospID" type="text/html"><span id="el_view_lab_services_auth_HospID">
<span<?php echo $view_lab_services_auth->HospID->viewAttributes() ?>><?php echo $view_lab_services_auth->HospID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RIDNO->Visible) { // RIDNO ?>
		<tr id="r_RIDNO">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_RIDNO" type="text/html"><?php echo $view_lab_services_auth->RIDNO->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->RIDNO->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RIDNO" type="text/html"><span id="el_view_lab_services_auth_RIDNO">
<span<?php echo $view_lab_services_auth->RIDNO->viewAttributes() ?>><?php echo $view_lab_services_auth->RIDNO->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_PartnerName" type="text/html"><?php echo $view_lab_services_auth->PartnerName->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->PartnerName->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PartnerName" type="text/html"><span id="el_view_lab_services_auth_PartnerName">
<span<?php echo $view_lab_services_auth->PartnerName->viewAttributes() ?>><?php echo $view_lab_services_auth->PartnerName->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PatId->Visible) { // PatId ?>
		<tr id="r_PatId">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_PatId" type="text/html"><?php echo $view_lab_services_auth->PatId->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->PatId->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PatId" type="text/html"><span id="el_view_lab_services_auth_PatId">
<span<?php echo $view_lab_services_auth->PatId->viewAttributes() ?>><?php echo $view_lab_services_auth->PatId->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->DrDepartment->Visible) { // DrDepartment ?>
		<tr id="r_DrDepartment">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_DrDepartment" type="text/html"><?php echo $view_lab_services_auth->DrDepartment->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_DrDepartment" type="text/html"><span id="el_view_lab_services_auth_DrDepartment">
<span<?php echo $view_lab_services_auth->DrDepartment->viewAttributes() ?>><?php echo $view_lab_services_auth->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RefferedBy->Visible) { // RefferedBy ?>
		<tr id="r_RefferedBy">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_RefferedBy" type="text/html"><?php echo $view_lab_services_auth->RefferedBy->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RefferedBy" type="text/html"><span id="el_view_lab_services_auth_RefferedBy">
<span<?php echo $view_lab_services_auth->RefferedBy->viewAttributes() ?>><?php echo $view_lab_services_auth->RefferedBy->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_BillNumber" type="text/html"><?php echo $view_lab_services_auth->BillNumber->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->BillNumber->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_BillNumber" type="text/html"><span id="el_view_lab_services_auth_BillNumber">
<span<?php echo $view_lab_services_auth->BillNumber->viewAttributes() ?>><?php echo $view_lab_services_auth->BillNumber->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services_auth->LabTestReleased->Visible) { // LabTestReleased ?>
		<tr id="r_LabTestReleased">
			<td class="<?php echo $view_lab_services_auth->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_auth_LabTestReleased" type="text/html"><?php echo $view_lab_services_auth->LabTestReleased->caption() ?></script></td>
			<td <?php echo $view_lab_services_auth->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_LabTestReleased" type="text/html"><span id="el_view_lab_services_auth_LabTestReleased">
<span<?php echo $view_lab_services_auth->LabTestReleased->viewAttributes() ?>><?php echo $view_lab_services_auth->LabTestReleased->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_view_lab_services_authmaster" class="ew-custom-template"></div>
<script id="tpm_view_lab_services_authmaster" type="text/html">
<div id="ct_view_lab_services_auth_master"><style>
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
		<tr><td  style="float:left;">PatientId: {{:PatientId}} </td><td  style="float: right;">Bill No: {{:BillNumber}}</td></tr>
		<tr><td  style="float:left;">Patient Name: {{:PatientName}}</td><td  style="float: right;">Bill Date: {{:createddatetime}}</td></tr>
		<tr><td  style="float:left;"> Age: {{:Age}} </td><td  style="float: right;">Consultant: {{:Doctor}}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: {{:Gender}} </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
</div>
</script>

<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_lab_services_auth->Rows) ?> };
	ew.applyTemplate("tpd_view_lab_services_authmaster", "tpm_view_lab_services_authmaster", "view_lab_services_authmaster", "<?php echo $view_lab_services_auth->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_lab_services_authmaster_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php } ?>