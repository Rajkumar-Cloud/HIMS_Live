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
$ip_admission_delete = new ip_admission_delete();

// Run the page
$ip_admission_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ip_admission_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fip_admissiondelete = currentForm = new ew.Form("fip_admissiondelete", "delete");

// Form_CustomValidate event
fip_admissiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fip_admissiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fip_admissiondelete.lists["x_gender"] = <?php echo $ip_admission_delete->gender->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_gender"].options = <?php echo JsonEncode($ip_admission_delete->gender->lookupOptions()) ?>;
fip_admissiondelete.autoSuggests["x_gender"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fip_admissiondelete.lists["x_typeRegsisteration"] = <?php echo $ip_admission_delete->typeRegsisteration->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($ip_admission_delete->typeRegsisteration->lookupOptions()) ?>;
fip_admissiondelete.lists["x_PaymentCategory"] = <?php echo $ip_admission_delete->PaymentCategory->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_PaymentCategory"].options = <?php echo JsonEncode($ip_admission_delete->PaymentCategory->lookupOptions()) ?>;
fip_admissiondelete.lists["x_physician_id"] = <?php echo $ip_admission_delete->physician_id->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_physician_id"].options = <?php echo JsonEncode($ip_admission_delete->physician_id->lookupOptions()) ?>;
fip_admissiondelete.lists["x_admission_consultant_id"] = <?php echo $ip_admission_delete->admission_consultant_id->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_admission_consultant_id"].options = <?php echo JsonEncode($ip_admission_delete->admission_consultant_id->lookupOptions()) ?>;
fip_admissiondelete.lists["x_leading_consultant_id"] = <?php echo $ip_admission_delete->leading_consultant_id->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_leading_consultant_id"].options = <?php echo JsonEncode($ip_admission_delete->leading_consultant_id->lookupOptions()) ?>;
fip_admissiondelete.lists["x_PaymentStatus"] = <?php echo $ip_admission_delete->PaymentStatus->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_PaymentStatus"].options = <?php echo JsonEncode($ip_admission_delete->PaymentStatus->lookupOptions()) ?>;
fip_admissiondelete.lists["x_HospID"] = <?php echo $ip_admission_delete->HospID->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_HospID"].options = <?php echo JsonEncode($ip_admission_delete->HospID->lookupOptions()) ?>;
fip_admissiondelete.lists["x_ReferedByDr"] = <?php echo $ip_admission_delete->ReferedByDr->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_ReferedByDr"].options = <?php echo JsonEncode($ip_admission_delete->ReferedByDr->lookupOptions()) ?>;
fip_admissiondelete.lists["x_ReferA4TreatingConsultant"] = <?php echo $ip_admission_delete->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($ip_admission_delete->ReferA4TreatingConsultant->lookupOptions()) ?>;
fip_admissiondelete.lists["x_patient_id"] = <?php echo $ip_admission_delete->patient_id->Lookup->toClientList() ?>;
fip_admissiondelete.lists["x_patient_id"].options = <?php echo JsonEncode($ip_admission_delete->patient_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ip_admission_delete->showPageHeader(); ?>
<?php
$ip_admission_delete->showMessage();
?>
<form name="fip_admissiondelete" id="fip_admissiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ip_admission_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ip_admission_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ip_admission_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ip_admission->id->Visible) { // id ?>
		<th class="<?php echo $ip_admission->id->headerCellClass() ?>"><span id="elh_ip_admission_id" class="ip_admission_id"><?php echo $ip_admission->id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
		<th class="<?php echo $ip_admission->mrnNo->headerCellClass() ?>"><span id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo"><?php echo $ip_admission->mrnNo->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $ip_admission->PatientID->headerCellClass() ?>"><span id="elh_ip_admission_PatientID" class="ip_admission_PatientID"><?php echo $ip_admission->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
		<th class="<?php echo $ip_admission->patient_name->headerCellClass() ?>"><span id="elh_ip_admission_patient_name" class="ip_admission_patient_name"><?php echo $ip_admission->patient_name->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
		<th class="<?php echo $ip_admission->mobileno->headerCellClass() ?>"><span id="elh_ip_admission_mobileno" class="ip_admission_mobileno"><?php echo $ip_admission->mobileno->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->gender->Visible) { // gender ?>
		<th class="<?php echo $ip_admission->gender->headerCellClass() ?>"><span id="elh_ip_admission_gender" class="ip_admission_gender"><?php echo $ip_admission->gender->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->age->Visible) { // age ?>
		<th class="<?php echo $ip_admission->age->headerCellClass() ?>"><span id="elh_ip_admission_age" class="ip_admission_age"><?php echo $ip_admission->age->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<th class="<?php echo $ip_admission->typeRegsisteration->headerCellClass() ?>"><span id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration"><?php echo $ip_admission->typeRegsisteration->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
		<th class="<?php echo $ip_admission->PaymentCategory->headerCellClass() ?>"><span id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory"><?php echo $ip_admission->PaymentCategory->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
		<th class="<?php echo $ip_admission->physician_id->headerCellClass() ?>"><span id="elh_ip_admission_physician_id" class="ip_admission_physician_id"><?php echo $ip_admission->physician_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<th class="<?php echo $ip_admission->admission_consultant_id->headerCellClass() ?>"><span id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id"><?php echo $ip_admission->admission_consultant_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<th class="<?php echo $ip_admission->leading_consultant_id->headerCellClass() ?>"><span id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id"><?php echo $ip_admission->leading_consultant_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
		<th class="<?php echo $ip_admission->admission_date->headerCellClass() ?>"><span id="elh_ip_admission_admission_date" class="ip_admission_admission_date"><?php echo $ip_admission->admission_date->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->release_date->Visible) { // release_date ?>
		<th class="<?php echo $ip_admission->release_date->headerCellClass() ?>"><span id="elh_ip_admission_release_date" class="ip_admission_release_date"><?php echo $ip_admission->release_date->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $ip_admission->PaymentStatus->headerCellClass() ?>"><span id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus"><?php echo $ip_admission->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ip_admission->createddatetime->headerCellClass() ?>"><span id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime"><?php echo $ip_admission->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $ip_admission->profilePic->headerCellClass() ?>"><span id="elh_ip_admission_profilePic" class="ip_admission_profilePic"><?php echo $ip_admission->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->HospID->Visible) { // HospID ?>
		<th class="<?php echo $ip_admission->HospID->headerCellClass() ?>"><span id="elh_ip_admission_HospID" class="ip_admission_HospID"><?php echo $ip_admission->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<th class="<?php echo $ip_admission->ReferedByDr->headerCellClass() ?>"><span id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr"><?php echo $ip_admission->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
		<th class="<?php echo $ip_admission->ReferClinicname->headerCellClass() ?>"><span id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname"><?php echo $ip_admission->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
		<th class="<?php echo $ip_admission->ReferCity->headerCellClass() ?>"><span id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity"><?php echo $ip_admission->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<th class="<?php echo $ip_admission->ReferMobileNo->headerCellClass() ?>"><span id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo"><?php echo $ip_admission->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<th class="<?php echo $ip_admission->ReferA4TreatingConsultant->headerCellClass() ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant"><?php echo $ip_admission->ReferA4TreatingConsultant->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<th class="<?php echo $ip_admission->PurposreReferredfor->headerCellClass() ?>"><span id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor"><?php echo $ip_admission->PurposreReferredfor->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
		<th class="<?php echo $ip_admission->BillClosing->headerCellClass() ?>"><span id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing"><?php echo $ip_admission->BillClosing->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<th class="<?php echo $ip_admission->BillClosingDate->headerCellClass() ?>"><span id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate"><?php echo $ip_admission->BillClosingDate->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $ip_admission->BillNumber->headerCellClass() ?>"><span id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber"><?php echo $ip_admission->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
		<th class="<?php echo $ip_admission->ClosingAmount->headerCellClass() ?>"><span id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount"><?php echo $ip_admission->ClosingAmount->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
		<th class="<?php echo $ip_admission->ClosingType->headerCellClass() ?>"><span id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType"><?php echo $ip_admission->ClosingType->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
		<th class="<?php echo $ip_admission->BillAmount->headerCellClass() ?>"><span id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount"><?php echo $ip_admission->BillAmount->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
		<th class="<?php echo $ip_admission->billclosedBy->headerCellClass() ?>"><span id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy"><?php echo $ip_admission->billclosedBy->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<th class="<?php echo $ip_admission->bllcloseByDate->headerCellClass() ?>"><span id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate"><?php echo $ip_admission->bllcloseByDate->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $ip_admission->ReportHeader->headerCellClass() ?>"><span id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader"><?php echo $ip_admission->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
		<th class="<?php echo $ip_admission->Procedure->headerCellClass() ?>"><span id="elh_ip_admission_Procedure" class="ip_admission_Procedure"><?php echo $ip_admission->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ip_admission->Consultant->headerCellClass() ?>"><span id="elh_ip_admission_Consultant" class="ip_admission_Consultant"><?php echo $ip_admission->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
		<th class="<?php echo $ip_admission->Anesthetist->headerCellClass() ?>"><span id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist"><?php echo $ip_admission->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->Amound->Visible) { // Amound ?>
		<th class="<?php echo $ip_admission->Amound->headerCellClass() ?>"><span id="elh_ip_admission_Amound" class="ip_admission_Amound"><?php echo $ip_admission->Amound->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->Package->Visible) { // Package ?>
		<th class="<?php echo $ip_admission->Package->headerCellClass() ?>"><span id="elh_ip_admission_Package" class="ip_admission_Package"><?php echo $ip_admission->Package->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $ip_admission->patient_id->headerCellClass() ?>"><span id="elh_ip_admission_patient_id" class="ip_admission_patient_id"><?php echo $ip_admission->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $ip_admission->PartnerID->headerCellClass() ?>"><span id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID"><?php echo $ip_admission->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $ip_admission->PartnerName->headerCellClass() ?>"><span id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName"><?php echo $ip_admission->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $ip_admission->PartnerMobile->headerCellClass() ?>"><span id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile"><?php echo $ip_admission->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->Cid->Visible) { // Cid ?>
		<th class="<?php echo $ip_admission->Cid->headerCellClass() ?>"><span id="elh_ip_admission_Cid" class="ip_admission_Cid"><?php echo $ip_admission->Cid->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->PartId->Visible) { // PartId ?>
		<th class="<?php echo $ip_admission->PartId->headerCellClass() ?>"><span id="elh_ip_admission_PartId" class="ip_admission_PartId"><?php echo $ip_admission->PartId->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
		<th class="<?php echo $ip_admission->IDProof->headerCellClass() ?>"><span id="elh_ip_admission_IDProof" class="ip_admission_IDProof"><?php echo $ip_admission->IDProof->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<th class="<?php echo $ip_admission->AdviceToOtherHospital->headerCellClass() ?>"><span id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital"><?php echo $ip_admission->AdviceToOtherHospital->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ip_admission_delete->RecCnt = 0;
$i = 0;
while (!$ip_admission_delete->Recordset->EOF) {
	$ip_admission_delete->RecCnt++;
	$ip_admission_delete->RowCnt++;

	// Set row properties
	$ip_admission->resetAttributes();
	$ip_admission->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ip_admission_delete->loadRowValues($ip_admission_delete->Recordset);

	// Render row
	$ip_admission_delete->renderRow();
?>
	<tr<?php echo $ip_admission->rowAttributes() ?>>
<?php if ($ip_admission->id->Visible) { // id ?>
		<td<?php echo $ip_admission->id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_id" class="ip_admission_id">
<span<?php echo $ip_admission->id->viewAttributes() ?>>
<?php echo $ip_admission->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
		<td<?php echo $ip_admission->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_mrnNo" class="ip_admission_mrnNo">
<span<?php echo $ip_admission->mrnNo->viewAttributes() ?>>
<?php echo $ip_admission->mrnNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
		<td<?php echo $ip_admission->PatientID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PatientID" class="ip_admission_PatientID">
<span<?php echo $ip_admission->PatientID->viewAttributes() ?>>
<?php echo $ip_admission->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
		<td<?php echo $ip_admission->patient_name->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_patient_name" class="ip_admission_patient_name">
<span<?php echo $ip_admission->patient_name->viewAttributes() ?>>
<?php echo $ip_admission->patient_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
		<td<?php echo $ip_admission->mobileno->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_mobileno" class="ip_admission_mobileno">
<span<?php echo $ip_admission->mobileno->viewAttributes() ?>>
<?php echo $ip_admission->mobileno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->gender->Visible) { // gender ?>
		<td<?php echo $ip_admission->gender->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_gender" class="ip_admission_gender">
<span<?php echo $ip_admission->gender->viewAttributes() ?>>
<?php echo $ip_admission->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->age->Visible) { // age ?>
		<td<?php echo $ip_admission->age->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_age" class="ip_admission_age">
<span<?php echo $ip_admission->age->viewAttributes() ?>>
<?php echo $ip_admission->age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td<?php echo $ip_admission->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration">
<span<?php echo $ip_admission->typeRegsisteration->viewAttributes() ?>>
<?php echo $ip_admission->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
		<td<?php echo $ip_admission->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory">
<span<?php echo $ip_admission->PaymentCategory->viewAttributes() ?>>
<?php echo $ip_admission->PaymentCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
		<td<?php echo $ip_admission->physician_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_physician_id" class="ip_admission_physician_id">
<span<?php echo $ip_admission->physician_id->viewAttributes() ?>>
<?php echo $ip_admission->physician_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td<?php echo $ip_admission->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id">
<span<?php echo $ip_admission->admission_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td<?php echo $ip_admission->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id">
<span<?php echo $ip_admission->leading_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
		<td<?php echo $ip_admission->admission_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_admission_date" class="ip_admission_admission_date">
<span<?php echo $ip_admission->admission_date->viewAttributes() ?>>
<?php echo $ip_admission->admission_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->release_date->Visible) { // release_date ?>
		<td<?php echo $ip_admission->release_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_release_date" class="ip_admission_release_date">
<span<?php echo $ip_admission->release_date->viewAttributes() ?>>
<?php echo $ip_admission->release_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<td<?php echo $ip_admission->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus">
<span<?php echo $ip_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $ip_admission->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $ip_admission->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_createddatetime" class="ip_admission_createddatetime">
<span<?php echo $ip_admission->createddatetime->viewAttributes() ?>>
<?php echo $ip_admission->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
		<td<?php echo $ip_admission->profilePic->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_profilePic" class="ip_admission_profilePic">
<span<?php echo $ip_admission->profilePic->viewAttributes() ?>>
<?php echo $ip_admission->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->HospID->Visible) { // HospID ?>
		<td<?php echo $ip_admission->HospID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_HospID" class="ip_admission_HospID">
<span<?php echo $ip_admission->HospID->viewAttributes() ?>>
<?php echo $ip_admission->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<td<?php echo $ip_admission->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr">
<span<?php echo $ip_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $ip_admission->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
		<td<?php echo $ip_admission->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname">
<span<?php echo $ip_admission->ReferClinicname->viewAttributes() ?>>
<?php echo $ip_admission->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
		<td<?php echo $ip_admission->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ReferCity" class="ip_admission_ReferCity">
<span<?php echo $ip_admission->ReferCity->viewAttributes() ?>>
<?php echo $ip_admission->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td<?php echo $ip_admission->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo">
<span<?php echo $ip_admission->ReferMobileNo->viewAttributes() ?>>
<?php echo $ip_admission->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td<?php echo $ip_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant">
<span<?php echo $ip_admission->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $ip_admission->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td<?php echo $ip_admission->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor">
<span<?php echo $ip_admission->PurposreReferredfor->viewAttributes() ?>>
<?php echo $ip_admission->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
		<td<?php echo $ip_admission->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_BillClosing" class="ip_admission_BillClosing">
<span<?php echo $ip_admission->BillClosing->viewAttributes() ?>>
<?php echo $ip_admission->BillClosing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<td<?php echo $ip_admission->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate">
<span<?php echo $ip_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $ip_admission->BillClosingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $ip_admission->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_BillNumber" class="ip_admission_BillNumber">
<span<?php echo $ip_admission->BillNumber->viewAttributes() ?>>
<?php echo $ip_admission->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
		<td<?php echo $ip_admission->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount">
<span<?php echo $ip_admission->ClosingAmount->viewAttributes() ?>>
<?php echo $ip_admission->ClosingAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
		<td<?php echo $ip_admission->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ClosingType" class="ip_admission_ClosingType">
<span<?php echo $ip_admission->ClosingType->viewAttributes() ?>>
<?php echo $ip_admission->ClosingType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
		<td<?php echo $ip_admission->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_BillAmount" class="ip_admission_BillAmount">
<span<?php echo $ip_admission->BillAmount->viewAttributes() ?>>
<?php echo $ip_admission->BillAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
		<td<?php echo $ip_admission->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_billclosedBy" class="ip_admission_billclosedBy">
<span<?php echo $ip_admission->billclosedBy->viewAttributes() ?>>
<?php echo $ip_admission->billclosedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td<?php echo $ip_admission->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate">
<span<?php echo $ip_admission->bllcloseByDate->viewAttributes() ?>>
<?php echo $ip_admission->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
		<td<?php echo $ip_admission->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_ReportHeader" class="ip_admission_ReportHeader">
<span<?php echo $ip_admission->ReportHeader->viewAttributes() ?>>
<?php echo $ip_admission->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
		<td<?php echo $ip_admission->Procedure->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_Procedure" class="ip_admission_Procedure">
<span<?php echo $ip_admission->Procedure->viewAttributes() ?>>
<?php echo $ip_admission->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
		<td<?php echo $ip_admission->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_Consultant" class="ip_admission_Consultant">
<span<?php echo $ip_admission->Consultant->viewAttributes() ?>>
<?php echo $ip_admission->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
		<td<?php echo $ip_admission->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_Anesthetist" class="ip_admission_Anesthetist">
<span<?php echo $ip_admission->Anesthetist->viewAttributes() ?>>
<?php echo $ip_admission->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->Amound->Visible) { // Amound ?>
		<td<?php echo $ip_admission->Amound->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_Amound" class="ip_admission_Amound">
<span<?php echo $ip_admission->Amound->viewAttributes() ?>>
<?php echo $ip_admission->Amound->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->Package->Visible) { // Package ?>
		<td<?php echo $ip_admission->Package->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_Package" class="ip_admission_Package">
<span<?php echo $ip_admission->Package->viewAttributes() ?>>
<?php echo $ip_admission->Package->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
		<td<?php echo $ip_admission->patient_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_patient_id" class="ip_admission_patient_id">
<span<?php echo $ip_admission->patient_id->viewAttributes() ?>>
<?php echo $ip_admission->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
		<td<?php echo $ip_admission->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PartnerID" class="ip_admission_PartnerID">
<span<?php echo $ip_admission->PartnerID->viewAttributes() ?>>
<?php echo $ip_admission->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $ip_admission->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PartnerName" class="ip_admission_PartnerName">
<span<?php echo $ip_admission->PartnerName->viewAttributes() ?>>
<?php echo $ip_admission->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<td<?php echo $ip_admission->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile">
<span<?php echo $ip_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $ip_admission->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->Cid->Visible) { // Cid ?>
		<td<?php echo $ip_admission->Cid->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_Cid" class="ip_admission_Cid">
<span<?php echo $ip_admission->Cid->viewAttributes() ?>>
<?php echo $ip_admission->Cid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->PartId->Visible) { // PartId ?>
		<td<?php echo $ip_admission->PartId->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_PartId" class="ip_admission_PartId">
<span<?php echo $ip_admission->PartId->viewAttributes() ?>>
<?php echo $ip_admission->PartId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
		<td<?php echo $ip_admission->IDProof->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_IDProof" class="ip_admission_IDProof">
<span<?php echo $ip_admission->IDProof->viewAttributes() ?>>
<?php echo $ip_admission->IDProof->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td<?php echo $ip_admission->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCnt ?>_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital">
<span<?php echo $ip_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $ip_admission->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ip_admission_delete->Recordset->moveNext();
}
$ip_admission_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ip_admission_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ip_admission_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ip_admission_delete->terminate();
?>