<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_lab_services->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_servicesmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($view_lab_services->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_id" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->id->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->id->cellAttributes() ?>>
<script id="tpx_view_lab_services_id" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_id">
<span<?php echo $view_lab_services->id->viewAttributes() ?>>
<?php echo $view_lab_services->id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->SID->Visible) { // SID ?>
		<tr id="r_SID">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_SID" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->SID->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->SID->cellAttributes() ?>>
<script id="tpx_view_lab_services_SID" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_SID">
<span<?php echo $view_lab_services->SID->viewAttributes() ?>>
<?php echo $view_lab_services->SID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_PatientId" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->PatientId->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->PatientId->cellAttributes() ?>>
<script id="tpx_view_lab_services_PatientId" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_PatientId">
<span<?php echo $view_lab_services->PatientId->viewAttributes() ?>>
<?php echo $view_lab_services->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_PatientName" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->PatientName->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->PatientName->cellAttributes() ?>>
<script id="tpx_view_lab_services_PatientName" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_PatientName">
<span<?php echo $view_lab_services->PatientName->viewAttributes() ?>>
<?php echo $view_lab_services->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->Gender->Visible) { // Gender ?>
		<tr id="r_Gender">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_Gender" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->Gender->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->Gender->cellAttributes() ?>>
<script id="tpx_view_lab_services_Gender" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_Gender">
<span<?php echo $view_lab_services->Gender->viewAttributes() ?>>
<?php echo $view_lab_services->Gender->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->Mobile->Visible) { // Mobile ?>
		<tr id="r_Mobile">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_Mobile" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->Mobile->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->Mobile->cellAttributes() ?>>
<script id="tpx_view_lab_services_Mobile" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_Mobile">
<span<?php echo $view_lab_services->Mobile->viewAttributes() ?>>
<?php echo $view_lab_services->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_Doctor" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->Doctor->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->Doctor->cellAttributes() ?>>
<script id="tpx_view_lab_services_Doctor" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_Doctor">
<span<?php echo $view_lab_services->Doctor->viewAttributes() ?>>
<?php echo $view_lab_services->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_ModeofPayment" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->ModeofPayment->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_lab_services_ModeofPayment" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_ModeofPayment">
<span<?php echo $view_lab_services->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_services->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_Amount" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->Amount->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->Amount->cellAttributes() ?>>
<script id="tpx_view_lab_services_Amount" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_Amount">
<span<?php echo $view_lab_services->Amount->viewAttributes() ?>>
<?php echo $view_lab_services->Amount->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_HospID" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->HospID->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_services_HospID" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_HospID">
<span<?php echo $view_lab_services->HospID->viewAttributes() ?>>
<?php echo $view_lab_services->HospID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->RIDNO->Visible) { // RIDNO ?>
		<tr id="r_RIDNO">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_RIDNO" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->RIDNO->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->RIDNO->cellAttributes() ?>>
<script id="tpx_view_lab_services_RIDNO" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_RIDNO">
<span<?php echo $view_lab_services->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_services->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_PartnerName" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->PartnerName->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->PartnerName->cellAttributes() ?>>
<script id="tpx_view_lab_services_PartnerName" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_PartnerName">
<span<?php echo $view_lab_services->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_services->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->PatId->Visible) { // PatId ?>
		<tr id="r_PatId">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_PatId" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->PatId->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->PatId->cellAttributes() ?>>
<script id="tpx_view_lab_services_PatId" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_PatId">
<span<?php echo $view_lab_services->PatId->viewAttributes() ?>>
<?php echo $view_lab_services->PatId->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->DrDepartment->Visible) { // DrDepartment ?>
		<tr id="r_DrDepartment">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_DrDepartment" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->DrDepartment->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_lab_services_DrDepartment" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_DrDepartment">
<span<?php echo $view_lab_services->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_services->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->RefferedBy->Visible) { // RefferedBy ?>
		<tr id="r_RefferedBy">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_RefferedBy" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->RefferedBy->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_lab_services_RefferedBy" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_RefferedBy">
<span<?php echo $view_lab_services->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_services->RefferedBy->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_BillNumber" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->BillNumber->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->BillNumber->cellAttributes() ?>>
<script id="tpx_view_lab_services_BillNumber" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_BillNumber">
<span<?php echo $view_lab_services->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_services->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_services->LabTestReleased->Visible) { // LabTestReleased ?>
		<tr id="r_LabTestReleased">
			<td class="<?php echo $view_lab_services->TableLeftColumnClass ?>"><script id="tpc_view_lab_services_LabTestReleased" class="view_lab_servicesmaster" type="text/html"><span><?php echo $view_lab_services->LabTestReleased->caption() ?></span></script></td>
			<td<?php echo $view_lab_services->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_lab_services_LabTestReleased" class="view_lab_servicesmaster" type="text/html">
<span id="el_view_lab_services_LabTestReleased">
<span<?php echo $view_lab_services->LabTestReleased->viewAttributes() ?>>
<?php echo $view_lab_services->LabTestReleased->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_view_lab_servicesmaster" class="ew-custom-template"></div>
<script id="tpm_view_lab_servicesmaster" type="text/html">
<div id="ct_view_lab_services_master"><style>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_services->Rows) ?> };
ew.applyTemplate("tpd_view_lab_servicesmaster", "tpm_view_lab_servicesmaster", "view_lab_servicesmaster", "<?php echo $view_lab_services->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_servicesmaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>