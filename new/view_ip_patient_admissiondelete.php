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
$view_ip_patient_admission_delete = new view_ip_patient_admission_delete();

// Run the page
$view_ip_patient_admission_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_patient_admission_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_ip_patient_admissiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_ip_patient_admissiondelete = currentForm = new ew.Form("fview_ip_patient_admissiondelete", "delete");
	loadjs.done("fview_ip_patient_admissiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ip_patient_admission_delete->showPageHeader(); ?>
<?php
$view_ip_patient_admission_delete->showMessage();
?>
<form name="fview_ip_patient_admissiondelete" id="fview_ip_patient_admissiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_ip_patient_admission_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_ip_patient_admission_delete->id->Visible) { // id ?>
		<th class="<?php echo $view_ip_patient_admission_delete->id->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id"><?php echo $view_ip_patient_admission_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->mrnNo->Visible) { // mrnNo ?>
		<th class="<?php echo $view_ip_patient_admission_delete->mrnNo->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo"><?php echo $view_ip_patient_admission_delete->mrnNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $view_ip_patient_admission_delete->PatientID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID"><?php echo $view_ip_patient_admission_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->patient_name->Visible) { // patient_name ?>
		<th class="<?php echo $view_ip_patient_admission_delete->patient_name->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name"><?php echo $view_ip_patient_admission_delete->patient_name->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->mobileno->Visible) { // mobileno ?>
		<th class="<?php echo $view_ip_patient_admission_delete->mobileno->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno"><?php echo $view_ip_patient_admission_delete->mobileno->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->admission_date->Visible) { // admission_date ?>
		<th class="<?php echo $view_ip_patient_admission_delete->admission_date->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date"><?php echo $view_ip_patient_admission_delete->admission_date->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->release_date->Visible) { // release_date ?>
		<th class="<?php echo $view_ip_patient_admission_delete->release_date->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date"><?php echo $view_ip_patient_admission_delete->release_date->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $view_ip_patient_admission_delete->PaymentStatus->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus"><?php echo $view_ip_patient_admission_delete->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_ip_patient_admission_delete->HospID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID"><?php echo $view_ip_patient_admission_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->ReferedByDr->Visible) { // ReferedByDr ?>
		<th class="<?php echo $view_ip_patient_admission_delete->ReferedByDr->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr"><?php echo $view_ip_patient_admission_delete->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->BillClosing->Visible) { // BillClosing ?>
		<th class="<?php echo $view_ip_patient_admission_delete->BillClosing->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing"><?php echo $view_ip_patient_admission_delete->BillClosing->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->BillClosingDate->Visible) { // BillClosingDate ?>
		<th class="<?php echo $view_ip_patient_admission_delete->BillClosingDate->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate"><?php echo $view_ip_patient_admission_delete->BillClosingDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $view_ip_patient_admission_delete->BillNumber->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber"><?php echo $view_ip_patient_admission_delete->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Procedure->Visible) { // Procedure ?>
		<th class="<?php echo $view_ip_patient_admission_delete->Procedure->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure"><?php echo $view_ip_patient_admission_delete->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $view_ip_patient_admission_delete->Consultant->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant"><?php echo $view_ip_patient_admission_delete->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Anesthetist->Visible) { // Anesthetist ?>
		<th class="<?php echo $view_ip_patient_admission_delete->Anesthetist->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist"><?php echo $view_ip_patient_admission_delete->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Amound->Visible) { // Amound ?>
		<th class="<?php echo $view_ip_patient_admission_delete->Amound->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound"><?php echo $view_ip_patient_admission_delete->Amound->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_ip_patient_admission_delete->PartnerID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID"><?php echo $view_ip_patient_admission_delete->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_ip_patient_admission_delete->PartnerName->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName"><?php echo $view_ip_patient_admission_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $view_ip_patient_admission_delete->PartnerMobile->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile"><?php echo $view_ip_patient_admission_delete->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Cid->Visible) { // Cid ?>
		<th class="<?php echo $view_ip_patient_admission_delete->Cid->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid"><?php echo $view_ip_patient_admission_delete->Cid->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartId->Visible) { // PartId ?>
		<th class="<?php echo $view_ip_patient_admission_delete->PartId->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId"><?php echo $view_ip_patient_admission_delete->PartId->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->IDProof->Visible) { // IDProof ?>
		<th class="<?php echo $view_ip_patient_admission_delete->IDProof->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof"><?php echo $view_ip_patient_admission_delete->IDProof->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<th class="<?php echo $view_ip_patient_admission_delete->AdviceToOtherHospital->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital"><?php echo $view_ip_patient_admission_delete->AdviceToOtherHospital->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_ip_patient_admission_delete->RecordCount = 0;
$i = 0;
while (!$view_ip_patient_admission_delete->Recordset->EOF) {
	$view_ip_patient_admission_delete->RecordCount++;
	$view_ip_patient_admission_delete->RowCount++;

	// Set row properties
	$view_ip_patient_admission->resetAttributes();
	$view_ip_patient_admission->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_ip_patient_admission_delete->loadRowValues($view_ip_patient_admission_delete->Recordset);

	// Render row
	$view_ip_patient_admission_delete->renderRow();
?>
	<tr <?php echo $view_ip_patient_admission->rowAttributes() ?>>
<?php if ($view_ip_patient_admission_delete->id->Visible) { // id ?>
		<td <?php echo $view_ip_patient_admission_delete->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_id" class="view_ip_patient_admission_id">
<span<?php echo $view_ip_patient_admission_delete->id->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->mrnNo->Visible) { // mrnNo ?>
		<td <?php echo $view_ip_patient_admission_delete->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo">
<span<?php echo $view_ip_patient_admission_delete->mrnNo->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->mrnNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $view_ip_patient_admission_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID">
<span<?php echo $view_ip_patient_admission_delete->PatientID->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->patient_name->Visible) { // patient_name ?>
		<td <?php echo $view_ip_patient_admission_delete->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name">
<span<?php echo $view_ip_patient_admission_delete->patient_name->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->patient_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->mobileno->Visible) { // mobileno ?>
		<td <?php echo $view_ip_patient_admission_delete->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno">
<span<?php echo $view_ip_patient_admission_delete->mobileno->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->mobileno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->admission_date->Visible) { // admission_date ?>
		<td <?php echo $view_ip_patient_admission_delete->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date">
<span<?php echo $view_ip_patient_admission_delete->admission_date->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->admission_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->release_date->Visible) { // release_date ?>
		<td <?php echo $view_ip_patient_admission_delete->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date">
<span<?php echo $view_ip_patient_admission_delete->release_date->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->release_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<td <?php echo $view_ip_patient_admission_delete->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus">
<span<?php echo $view_ip_patient_admission_delete->PaymentStatus->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $view_ip_patient_admission_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID">
<span<?php echo $view_ip_patient_admission_delete->HospID->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->ReferedByDr->Visible) { // ReferedByDr ?>
		<td <?php echo $view_ip_patient_admission_delete->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr">
<span<?php echo $view_ip_patient_admission_delete->ReferedByDr->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->BillClosing->Visible) { // BillClosing ?>
		<td <?php echo $view_ip_patient_admission_delete->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing">
<span<?php echo $view_ip_patient_admission_delete->BillClosing->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->BillClosing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->BillClosingDate->Visible) { // BillClosingDate ?>
		<td <?php echo $view_ip_patient_admission_delete->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate">
<span<?php echo $view_ip_patient_admission_delete->BillClosingDate->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->BillClosingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->BillNumber->Visible) { // BillNumber ?>
		<td <?php echo $view_ip_patient_admission_delete->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber">
<span<?php echo $view_ip_patient_admission_delete->BillNumber->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Procedure->Visible) { // Procedure ?>
		<td <?php echo $view_ip_patient_admission_delete->Procedure->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure">
<span<?php echo $view_ip_patient_admission_delete->Procedure->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Consultant->Visible) { // Consultant ?>
		<td <?php echo $view_ip_patient_admission_delete->Consultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant">
<span<?php echo $view_ip_patient_admission_delete->Consultant->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Anesthetist->Visible) { // Anesthetist ?>
		<td <?php echo $view_ip_patient_admission_delete->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist">
<span<?php echo $view_ip_patient_admission_delete->Anesthetist->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Amound->Visible) { // Amound ?>
		<td <?php echo $view_ip_patient_admission_delete->Amound->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound">
<span<?php echo $view_ip_patient_admission_delete->Amound->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->Amound->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartnerID->Visible) { // PartnerID ?>
		<td <?php echo $view_ip_patient_admission_delete->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID">
<span<?php echo $view_ip_patient_admission_delete->PartnerID->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $view_ip_patient_admission_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName">
<span<?php echo $view_ip_patient_admission_delete->PartnerName->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<td <?php echo $view_ip_patient_admission_delete->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile">
<span<?php echo $view_ip_patient_admission_delete->PartnerMobile->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->Cid->Visible) { // Cid ?>
		<td <?php echo $view_ip_patient_admission_delete->Cid->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid">
<span<?php echo $view_ip_patient_admission_delete->Cid->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->Cid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->PartId->Visible) { // PartId ?>
		<td <?php echo $view_ip_patient_admission_delete->PartId->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId">
<span<?php echo $view_ip_patient_admission_delete->PartId->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->PartId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->IDProof->Visible) { // IDProof ?>
		<td <?php echo $view_ip_patient_admission_delete->IDProof->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof">
<span<?php echo $view_ip_patient_admission_delete->IDProof->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->IDProof->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission_delete->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td <?php echo $view_ip_patient_admission_delete->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCount ?>_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital">
<span<?php echo $view_ip_patient_admission_delete->AdviceToOtherHospital->viewAttributes() ?>><?php echo $view_ip_patient_admission_delete->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_ip_patient_admission_delete->Recordset->moveNext();
}
$view_ip_patient_admission_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_patient_admission_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_ip_patient_admission_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_ip_patient_admission_delete->terminate();
?>