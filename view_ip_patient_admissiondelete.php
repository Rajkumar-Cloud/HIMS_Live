<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_ip_patient_admissiondelete = currentForm = new ew.Form("fview_ip_patient_admissiondelete", "delete");

// Form_CustomValidate event
fview_ip_patient_admissiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_patient_admissiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_patient_admissiondelete.lists["x_PaymentStatus"] = <?php echo $view_ip_patient_admission_delete->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->PaymentStatus->lookupOptions()) ?>;
fview_ip_patient_admissiondelete.lists["x_HospID"] = <?php echo $view_ip_patient_admission_delete->HospID->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_HospID"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->HospID->lookupOptions()) ?>;
fview_ip_patient_admissiondelete.lists["x_ReferedByDr"] = <?php echo $view_ip_patient_admission_delete->ReferedByDr->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_ReferedByDr"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->ReferedByDr->lookupOptions()) ?>;
fview_ip_patient_admissiondelete.lists["x_BillClosing[]"] = <?php echo $view_ip_patient_admission_delete->BillClosing->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissiondelete.lists["x_Procedure"] = <?php echo $view_ip_patient_admission_delete->Procedure->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->Procedure->lookupOptions()) ?>;
fview_ip_patient_admissiondelete.lists["x_Consultant"] = <?php echo $view_ip_patient_admission_delete->Consultant->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_Consultant"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->Consultant->lookupOptions()) ?>;
fview_ip_patient_admissiondelete.lists["x_Anesthetist"] = <?php echo $view_ip_patient_admission_delete->Anesthetist->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_Anesthetist"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->Anesthetist->lookupOptions()) ?>;
fview_ip_patient_admissiondelete.lists["x_Cid"] = <?php echo $view_ip_patient_admission_delete->Cid->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_Cid"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->Cid->lookupOptions()) ?>;
fview_ip_patient_admissiondelete.lists["x_AdviceToOtherHospital[]"] = <?php echo $view_ip_patient_admission_delete->AdviceToOtherHospital->Lookup->toClientList() ?>;
fview_ip_patient_admissiondelete.lists["x_AdviceToOtherHospital[]"].options = <?php echo JsonEncode($view_ip_patient_admission_delete->AdviceToOtherHospital->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ip_patient_admission_delete->showPageHeader(); ?>
<?php
$view_ip_patient_admission_delete->showMessage();
?>
<form name="fview_ip_patient_admissiondelete" id="fview_ip_patient_admissiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_patient_admission_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_patient_admission_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_ip_patient_admission_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_ip_patient_admission->id->Visible) { // id ?>
		<th class="<?php echo $view_ip_patient_admission->id->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id"><?php echo $view_ip_patient_admission->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
		<th class="<?php echo $view_ip_patient_admission->mrnNo->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo"><?php echo $view_ip_patient_admission->mrnNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $view_ip_patient_admission->PatientID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID"><?php echo $view_ip_patient_admission->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
		<th class="<?php echo $view_ip_patient_admission->patient_name->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name"><?php echo $view_ip_patient_admission->patient_name->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
		<th class="<?php echo $view_ip_patient_admission->mobileno->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno"><?php echo $view_ip_patient_admission->mobileno->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_date->Visible) { // admission_date ?>
		<th class="<?php echo $view_ip_patient_admission->admission_date->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date"><?php echo $view_ip_patient_admission->admission_date->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->release_date->Visible) { // release_date ?>
		<th class="<?php echo $view_ip_patient_admission->release_date->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date"><?php echo $view_ip_patient_admission->release_date->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $view_ip_patient_admission->PaymentStatus->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus"><?php echo $view_ip_patient_admission->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_ip_patient_admission->HospID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID"><?php echo $view_ip_patient_admission->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<th class="<?php echo $view_ip_patient_admission->ReferedByDr->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr"><?php echo $view_ip_patient_admission->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosing->Visible) { // BillClosing ?>
		<th class="<?php echo $view_ip_patient_admission->BillClosing->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing"><?php echo $view_ip_patient_admission->BillClosing->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<th class="<?php echo $view_ip_patient_admission->BillClosingDate->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate"><?php echo $view_ip_patient_admission->BillClosingDate->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $view_ip_patient_admission->BillNumber->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber"><?php echo $view_ip_patient_admission->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->Procedure->Visible) { // Procedure ?>
		<th class="<?php echo $view_ip_patient_admission->Procedure->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure"><?php echo $view_ip_patient_admission->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $view_ip_patient_admission->Consultant->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant"><?php echo $view_ip_patient_admission->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->Anesthetist->Visible) { // Anesthetist ?>
		<th class="<?php echo $view_ip_patient_admission->Anesthetist->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist"><?php echo $view_ip_patient_admission->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->Amound->Visible) { // Amound ?>
		<th class="<?php echo $view_ip_patient_admission->Amound->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound"><?php echo $view_ip_patient_admission->Amound->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $view_ip_patient_admission->PartnerID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID"><?php echo $view_ip_patient_admission->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $view_ip_patient_admission->PartnerName->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName"><?php echo $view_ip_patient_admission->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $view_ip_patient_admission->PartnerMobile->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile"><?php echo $view_ip_patient_admission->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->Cid->Visible) { // Cid ?>
		<th class="<?php echo $view_ip_patient_admission->Cid->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid"><?php echo $view_ip_patient_admission->Cid->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->PartId->Visible) { // PartId ?>
		<th class="<?php echo $view_ip_patient_admission->PartId->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId"><?php echo $view_ip_patient_admission->PartId->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->IDProof->Visible) { // IDProof ?>
		<th class="<?php echo $view_ip_patient_admission->IDProof->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof"><?php echo $view_ip_patient_admission->IDProof->caption() ?></span></th>
<?php } ?>
<?php if ($view_ip_patient_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<th class="<?php echo $view_ip_patient_admission->AdviceToOtherHospital->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital"><?php echo $view_ip_patient_admission->AdviceToOtherHospital->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_ip_patient_admission_delete->RecCnt = 0;
$i = 0;
while (!$view_ip_patient_admission_delete->Recordset->EOF) {
	$view_ip_patient_admission_delete->RecCnt++;
	$view_ip_patient_admission_delete->RowCnt++;

	// Set row properties
	$view_ip_patient_admission->resetAttributes();
	$view_ip_patient_admission->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_ip_patient_admission_delete->loadRowValues($view_ip_patient_admission_delete->Recordset);

	// Render row
	$view_ip_patient_admission_delete->renderRow();
?>
	<tr<?php echo $view_ip_patient_admission->rowAttributes() ?>>
<?php if ($view_ip_patient_admission->id->Visible) { // id ?>
		<td<?php echo $view_ip_patient_admission->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_id" class="view_ip_patient_admission_id">
<span<?php echo $view_ip_patient_admission->id->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
		<td<?php echo $view_ip_patient_admission->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo">
<span<?php echo $view_ip_patient_admission->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->mrnNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
		<td<?php echo $view_ip_patient_admission->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID">
<span<?php echo $view_ip_patient_admission->PatientID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
		<td<?php echo $view_ip_patient_admission->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name">
<span<?php echo $view_ip_patient_admission->patient_name->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->patient_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
		<td<?php echo $view_ip_patient_admission->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno">
<span<?php echo $view_ip_patient_admission->mobileno->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->mobileno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_date->Visible) { // admission_date ?>
		<td<?php echo $view_ip_patient_admission->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date">
<span<?php echo $view_ip_patient_admission->admission_date->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->admission_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->release_date->Visible) { // release_date ?>
		<td<?php echo $view_ip_patient_admission->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date">
<span<?php echo $view_ip_patient_admission->release_date->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->release_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<td<?php echo $view_ip_patient_admission->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus">
<span<?php echo $view_ip_patient_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->HospID->Visible) { // HospID ?>
		<td<?php echo $view_ip_patient_admission->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID">
<span<?php echo $view_ip_patient_admission->HospID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<td<?php echo $view_ip_patient_admission->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr">
<span<?php echo $view_ip_patient_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosing->Visible) { // BillClosing ?>
		<td<?php echo $view_ip_patient_admission->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing">
<span<?php echo $view_ip_patient_admission->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillClosing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<td<?php echo $view_ip_patient_admission->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate">
<span<?php echo $view_ip_patient_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillClosingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $view_ip_patient_admission->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber">
<span<?php echo $view_ip_patient_admission->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->Procedure->Visible) { // Procedure ?>
		<td<?php echo $view_ip_patient_admission->Procedure->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure">
<span<?php echo $view_ip_patient_admission->Procedure->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->Consultant->Visible) { // Consultant ?>
		<td<?php echo $view_ip_patient_admission->Consultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant">
<span<?php echo $view_ip_patient_admission->Consultant->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->Anesthetist->Visible) { // Anesthetist ?>
		<td<?php echo $view_ip_patient_admission->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist">
<span<?php echo $view_ip_patient_admission->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->Amound->Visible) { // Amound ?>
		<td<?php echo $view_ip_patient_admission->Amound->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound">
<span<?php echo $view_ip_patient_admission->Amound->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Amound->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerID->Visible) { // PartnerID ?>
		<td<?php echo $view_ip_patient_admission->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID">
<span<?php echo $view_ip_patient_admission->PartnerID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $view_ip_patient_admission->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName">
<span<?php echo $view_ip_patient_admission->PartnerName->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<td<?php echo $view_ip_patient_admission->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile">
<span<?php echo $view_ip_patient_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->Cid->Visible) { // Cid ?>
		<td<?php echo $view_ip_patient_admission->Cid->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid">
<span<?php echo $view_ip_patient_admission->Cid->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Cid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->PartId->Visible) { // PartId ?>
		<td<?php echo $view_ip_patient_admission->PartId->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId">
<span<?php echo $view_ip_patient_admission->PartId->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->IDProof->Visible) { // IDProof ?>
		<td<?php echo $view_ip_patient_admission->IDProof->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof">
<span<?php echo $view_ip_patient_admission->IDProof->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->IDProof->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_ip_patient_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td<?php echo $view_ip_patient_admission->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_delete->RowCnt ?>_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital">
<span<?php echo $view_ip_patient_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->AdviceToOtherHospital->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_ip_patient_admission_delete->terminate();
?>