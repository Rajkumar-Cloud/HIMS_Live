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
<?php include_once "header.php"; ?>
<script>
var fip_admissiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fip_admissiondelete = currentForm = new ew.Form("fip_admissiondelete", "delete");
	loadjs.done("fip_admissiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ip_admission_delete->showPageHeader(); ?>
<?php
$ip_admission_delete->showMessage();
?>
<form name="fip_admissiondelete" id="fip_admissiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ip_admission_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ip_admission_delete->id->Visible) { // id ?>
		<th class="<?php echo $ip_admission_delete->id->headerCellClass() ?>"><span id="elh_ip_admission_id" class="ip_admission_id"><?php echo $ip_admission_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->mrnNo->Visible) { // mrnNo ?>
		<th class="<?php echo $ip_admission_delete->mrnNo->headerCellClass() ?>"><span id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo"><?php echo $ip_admission_delete->mrnNo->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $ip_admission_delete->PatientID->headerCellClass() ?>"><span id="elh_ip_admission_PatientID" class="ip_admission_PatientID"><?php echo $ip_admission_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->patient_name->Visible) { // patient_name ?>
		<th class="<?php echo $ip_admission_delete->patient_name->headerCellClass() ?>"><span id="elh_ip_admission_patient_name" class="ip_admission_patient_name"><?php echo $ip_admission_delete->patient_name->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->mobileno->Visible) { // mobileno ?>
		<th class="<?php echo $ip_admission_delete->mobileno->headerCellClass() ?>"><span id="elh_ip_admission_mobileno" class="ip_admission_mobileno"><?php echo $ip_admission_delete->mobileno->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->gender->Visible) { // gender ?>
		<th class="<?php echo $ip_admission_delete->gender->headerCellClass() ?>"><span id="elh_ip_admission_gender" class="ip_admission_gender"><?php echo $ip_admission_delete->gender->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->age->Visible) { // age ?>
		<th class="<?php echo $ip_admission_delete->age->headerCellClass() ?>"><span id="elh_ip_admission_age" class="ip_admission_age"><?php echo $ip_admission_delete->age->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<th class="<?php echo $ip_admission_delete->typeRegsisteration->headerCellClass() ?>"><span id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration"><?php echo $ip_admission_delete->typeRegsisteration->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PaymentCategory->Visible) { // PaymentCategory ?>
		<th class="<?php echo $ip_admission_delete->PaymentCategory->headerCellClass() ?>"><span id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory"><?php echo $ip_admission_delete->PaymentCategory->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->physician_id->Visible) { // physician_id ?>
		<th class="<?php echo $ip_admission_delete->physician_id->headerCellClass() ?>"><span id="elh_ip_admission_physician_id" class="ip_admission_physician_id"><?php echo $ip_admission_delete->physician_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<th class="<?php echo $ip_admission_delete->admission_consultant_id->headerCellClass() ?>"><span id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id"><?php echo $ip_admission_delete->admission_consultant_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<th class="<?php echo $ip_admission_delete->leading_consultant_id->headerCellClass() ?>"><span id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id"><?php echo $ip_admission_delete->leading_consultant_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->admission_date->Visible) { // admission_date ?>
		<th class="<?php echo $ip_admission_delete->admission_date->headerCellClass() ?>"><span id="elh_ip_admission_admission_date" class="ip_admission_admission_date"><?php echo $ip_admission_delete->admission_date->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->release_date->Visible) { // release_date ?>
		<th class="<?php echo $ip_admission_delete->release_date->headerCellClass() ?>"><span id="elh_ip_admission_release_date" class="ip_admission_release_date"><?php echo $ip_admission_delete->release_date->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $ip_admission_delete->PaymentStatus->headerCellClass() ?>"><span id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus"><?php echo $ip_admission_delete->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ip_admission_delete->createddatetime->headerCellClass() ?>"><span id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime"><?php echo $ip_admission_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $ip_admission_delete->profilePic->headerCellClass() ?>"><span id="elh_ip_admission_profilePic" class="ip_admission_profilePic"><?php echo $ip_admission_delete->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $ip_admission_delete->HospID->headerCellClass() ?>"><span id="elh_ip_admission_HospID" class="ip_admission_HospID"><?php echo $ip_admission_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ReferedByDr->Visible) { // ReferedByDr ?>
		<th class="<?php echo $ip_admission_delete->ReferedByDr->headerCellClass() ?>"><span id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr"><?php echo $ip_admission_delete->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ReferClinicname->Visible) { // ReferClinicname ?>
		<th class="<?php echo $ip_admission_delete->ReferClinicname->headerCellClass() ?>"><span id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname"><?php echo $ip_admission_delete->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ReferCity->Visible) { // ReferCity ?>
		<th class="<?php echo $ip_admission_delete->ReferCity->headerCellClass() ?>"><span id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity"><?php echo $ip_admission_delete->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<th class="<?php echo $ip_admission_delete->ReferMobileNo->headerCellClass() ?>"><span id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo"><?php echo $ip_admission_delete->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<th class="<?php echo $ip_admission_delete->ReferA4TreatingConsultant->headerCellClass() ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant"><?php echo $ip_admission_delete->ReferA4TreatingConsultant->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<th class="<?php echo $ip_admission_delete->PurposreReferredfor->headerCellClass() ?>"><span id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor"><?php echo $ip_admission_delete->PurposreReferredfor->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->BillClosing->Visible) { // BillClosing ?>
		<th class="<?php echo $ip_admission_delete->BillClosing->headerCellClass() ?>"><span id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing"><?php echo $ip_admission_delete->BillClosing->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->BillClosingDate->Visible) { // BillClosingDate ?>
		<th class="<?php echo $ip_admission_delete->BillClosingDate->headerCellClass() ?>"><span id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate"><?php echo $ip_admission_delete->BillClosingDate->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $ip_admission_delete->BillNumber->headerCellClass() ?>"><span id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber"><?php echo $ip_admission_delete->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ClosingAmount->Visible) { // ClosingAmount ?>
		<th class="<?php echo $ip_admission_delete->ClosingAmount->headerCellClass() ?>"><span id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount"><?php echo $ip_admission_delete->ClosingAmount->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ClosingType->Visible) { // ClosingType ?>
		<th class="<?php echo $ip_admission_delete->ClosingType->headerCellClass() ?>"><span id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType"><?php echo $ip_admission_delete->ClosingType->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->BillAmount->Visible) { // BillAmount ?>
		<th class="<?php echo $ip_admission_delete->BillAmount->headerCellClass() ?>"><span id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount"><?php echo $ip_admission_delete->BillAmount->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->billclosedBy->Visible) { // billclosedBy ?>
		<th class="<?php echo $ip_admission_delete->billclosedBy->headerCellClass() ?>"><span id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy"><?php echo $ip_admission_delete->billclosedBy->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<th class="<?php echo $ip_admission_delete->bllcloseByDate->headerCellClass() ?>"><span id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate"><?php echo $ip_admission_delete->bllcloseByDate->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $ip_admission_delete->ReportHeader->headerCellClass() ?>"><span id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader"><?php echo $ip_admission_delete->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->Procedure->Visible) { // Procedure ?>
		<th class="<?php echo $ip_admission_delete->Procedure->headerCellClass() ?>"><span id="elh_ip_admission_Procedure" class="ip_admission_Procedure"><?php echo $ip_admission_delete->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ip_admission_delete->Consultant->headerCellClass() ?>"><span id="elh_ip_admission_Consultant" class="ip_admission_Consultant"><?php echo $ip_admission_delete->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->Anesthetist->Visible) { // Anesthetist ?>
		<th class="<?php echo $ip_admission_delete->Anesthetist->headerCellClass() ?>"><span id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist"><?php echo $ip_admission_delete->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->Amound->Visible) { // Amound ?>
		<th class="<?php echo $ip_admission_delete->Amound->headerCellClass() ?>"><span id="elh_ip_admission_Amound" class="ip_admission_Amound"><?php echo $ip_admission_delete->Amound->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->Package->Visible) { // Package ?>
		<th class="<?php echo $ip_admission_delete->Package->headerCellClass() ?>"><span id="elh_ip_admission_Package" class="ip_admission_Package"><?php echo $ip_admission_delete->Package->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $ip_admission_delete->patient_id->headerCellClass() ?>"><span id="elh_ip_admission_patient_id" class="ip_admission_patient_id"><?php echo $ip_admission_delete->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $ip_admission_delete->PartnerID->headerCellClass() ?>"><span id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID"><?php echo $ip_admission_delete->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $ip_admission_delete->PartnerName->headerCellClass() ?>"><span id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName"><?php echo $ip_admission_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $ip_admission_delete->PartnerMobile->headerCellClass() ?>"><span id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile"><?php echo $ip_admission_delete->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->Cid->Visible) { // Cid ?>
		<th class="<?php echo $ip_admission_delete->Cid->headerCellClass() ?>"><span id="elh_ip_admission_Cid" class="ip_admission_Cid"><?php echo $ip_admission_delete->Cid->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->PartId->Visible) { // PartId ?>
		<th class="<?php echo $ip_admission_delete->PartId->headerCellClass() ?>"><span id="elh_ip_admission_PartId" class="ip_admission_PartId"><?php echo $ip_admission_delete->PartId->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->IDProof->Visible) { // IDProof ?>
		<th class="<?php echo $ip_admission_delete->IDProof->headerCellClass() ?>"><span id="elh_ip_admission_IDProof" class="ip_admission_IDProof"><?php echo $ip_admission_delete->IDProof->caption() ?></span></th>
<?php } ?>
<?php if ($ip_admission_delete->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<th class="<?php echo $ip_admission_delete->AdviceToOtherHospital->headerCellClass() ?>"><span id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital"><?php echo $ip_admission_delete->AdviceToOtherHospital->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ip_admission_delete->RecordCount = 0;
$i = 0;
while (!$ip_admission_delete->Recordset->EOF) {
	$ip_admission_delete->RecordCount++;
	$ip_admission_delete->RowCount++;

	// Set row properties
	$ip_admission->resetAttributes();
	$ip_admission->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ip_admission_delete->loadRowValues($ip_admission_delete->Recordset);

	// Render row
	$ip_admission_delete->renderRow();
?>
	<tr <?php echo $ip_admission->rowAttributes() ?>>
<?php if ($ip_admission_delete->id->Visible) { // id ?>
		<td <?php echo $ip_admission_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_id" class="ip_admission_id">
<span<?php echo $ip_admission_delete->id->viewAttributes() ?>><?php echo $ip_admission_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->mrnNo->Visible) { // mrnNo ?>
		<td <?php echo $ip_admission_delete->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_mrnNo" class="ip_admission_mrnNo">
<span<?php echo $ip_admission_delete->mrnNo->viewAttributes() ?>><?php echo $ip_admission_delete->mrnNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $ip_admission_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PatientID" class="ip_admission_PatientID">
<span<?php echo $ip_admission_delete->PatientID->viewAttributes() ?>><?php echo $ip_admission_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->patient_name->Visible) { // patient_name ?>
		<td <?php echo $ip_admission_delete->patient_name->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_patient_name" class="ip_admission_patient_name">
<span<?php echo $ip_admission_delete->patient_name->viewAttributes() ?>><?php echo $ip_admission_delete->patient_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->mobileno->Visible) { // mobileno ?>
		<td <?php echo $ip_admission_delete->mobileno->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_mobileno" class="ip_admission_mobileno">
<span<?php echo $ip_admission_delete->mobileno->viewAttributes() ?>><?php echo $ip_admission_delete->mobileno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->gender->Visible) { // gender ?>
		<td <?php echo $ip_admission_delete->gender->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_gender" class="ip_admission_gender">
<span<?php echo $ip_admission_delete->gender->viewAttributes() ?>><?php echo $ip_admission_delete->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->age->Visible) { // age ?>
		<td <?php echo $ip_admission_delete->age->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_age" class="ip_admission_age">
<span<?php echo $ip_admission_delete->age->viewAttributes() ?>><?php echo $ip_admission_delete->age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td <?php echo $ip_admission_delete->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration">
<span<?php echo $ip_admission_delete->typeRegsisteration->viewAttributes() ?>><?php echo $ip_admission_delete->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PaymentCategory->Visible) { // PaymentCategory ?>
		<td <?php echo $ip_admission_delete->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory">
<span<?php echo $ip_admission_delete->PaymentCategory->viewAttributes() ?>><?php echo $ip_admission_delete->PaymentCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->physician_id->Visible) { // physician_id ?>
		<td <?php echo $ip_admission_delete->physician_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_physician_id" class="ip_admission_physician_id">
<span<?php echo $ip_admission_delete->physician_id->viewAttributes() ?>><?php echo $ip_admission_delete->physician_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td <?php echo $ip_admission_delete->admission_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id">
<span<?php echo $ip_admission_delete->admission_consultant_id->viewAttributes() ?>><?php echo $ip_admission_delete->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td <?php echo $ip_admission_delete->leading_consultant_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id">
<span<?php echo $ip_admission_delete->leading_consultant_id->viewAttributes() ?>><?php echo $ip_admission_delete->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->admission_date->Visible) { // admission_date ?>
		<td <?php echo $ip_admission_delete->admission_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_admission_date" class="ip_admission_admission_date">
<span<?php echo $ip_admission_delete->admission_date->viewAttributes() ?>><?php echo $ip_admission_delete->admission_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->release_date->Visible) { // release_date ?>
		<td <?php echo $ip_admission_delete->release_date->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_release_date" class="ip_admission_release_date">
<span<?php echo $ip_admission_delete->release_date->viewAttributes() ?>><?php echo $ip_admission_delete->release_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<td <?php echo $ip_admission_delete->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus">
<span<?php echo $ip_admission_delete->PaymentStatus->viewAttributes() ?>><?php echo $ip_admission_delete->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $ip_admission_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_createddatetime" class="ip_admission_createddatetime">
<span<?php echo $ip_admission_delete->createddatetime->viewAttributes() ?>><?php echo $ip_admission_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->profilePic->Visible) { // profilePic ?>
		<td <?php echo $ip_admission_delete->profilePic->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_profilePic" class="ip_admission_profilePic">
<span<?php echo $ip_admission_delete->profilePic->viewAttributes() ?>><?php echo $ip_admission_delete->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $ip_admission_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_HospID" class="ip_admission_HospID">
<span<?php echo $ip_admission_delete->HospID->viewAttributes() ?>><?php echo $ip_admission_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ReferedByDr->Visible) { // ReferedByDr ?>
		<td <?php echo $ip_admission_delete->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr">
<span<?php echo $ip_admission_delete->ReferedByDr->viewAttributes() ?>><?php echo $ip_admission_delete->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ReferClinicname->Visible) { // ReferClinicname ?>
		<td <?php echo $ip_admission_delete->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname">
<span<?php echo $ip_admission_delete->ReferClinicname->viewAttributes() ?>><?php echo $ip_admission_delete->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ReferCity->Visible) { // ReferCity ?>
		<td <?php echo $ip_admission_delete->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ReferCity" class="ip_admission_ReferCity">
<span<?php echo $ip_admission_delete->ReferCity->viewAttributes() ?>><?php echo $ip_admission_delete->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td <?php echo $ip_admission_delete->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo">
<span<?php echo $ip_admission_delete->ReferMobileNo->viewAttributes() ?>><?php echo $ip_admission_delete->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td <?php echo $ip_admission_delete->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant">
<span<?php echo $ip_admission_delete->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $ip_admission_delete->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td <?php echo $ip_admission_delete->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor">
<span<?php echo $ip_admission_delete->PurposreReferredfor->viewAttributes() ?>><?php echo $ip_admission_delete->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->BillClosing->Visible) { // BillClosing ?>
		<td <?php echo $ip_admission_delete->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_BillClosing" class="ip_admission_BillClosing">
<span<?php echo $ip_admission_delete->BillClosing->viewAttributes() ?>><?php echo $ip_admission_delete->BillClosing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->BillClosingDate->Visible) { // BillClosingDate ?>
		<td <?php echo $ip_admission_delete->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate">
<span<?php echo $ip_admission_delete->BillClosingDate->viewAttributes() ?>><?php echo $ip_admission_delete->BillClosingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->BillNumber->Visible) { // BillNumber ?>
		<td <?php echo $ip_admission_delete->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_BillNumber" class="ip_admission_BillNumber">
<span<?php echo $ip_admission_delete->BillNumber->viewAttributes() ?>><?php echo $ip_admission_delete->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ClosingAmount->Visible) { // ClosingAmount ?>
		<td <?php echo $ip_admission_delete->ClosingAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount">
<span<?php echo $ip_admission_delete->ClosingAmount->viewAttributes() ?>><?php echo $ip_admission_delete->ClosingAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ClosingType->Visible) { // ClosingType ?>
		<td <?php echo $ip_admission_delete->ClosingType->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ClosingType" class="ip_admission_ClosingType">
<span<?php echo $ip_admission_delete->ClosingType->viewAttributes() ?>><?php echo $ip_admission_delete->ClosingType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->BillAmount->Visible) { // BillAmount ?>
		<td <?php echo $ip_admission_delete->BillAmount->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_BillAmount" class="ip_admission_BillAmount">
<span<?php echo $ip_admission_delete->BillAmount->viewAttributes() ?>><?php echo $ip_admission_delete->BillAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->billclosedBy->Visible) { // billclosedBy ?>
		<td <?php echo $ip_admission_delete->billclosedBy->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_billclosedBy" class="ip_admission_billclosedBy">
<span<?php echo $ip_admission_delete->billclosedBy->viewAttributes() ?>><?php echo $ip_admission_delete->billclosedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td <?php echo $ip_admission_delete->bllcloseByDate->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate">
<span<?php echo $ip_admission_delete->bllcloseByDate->viewAttributes() ?>><?php echo $ip_admission_delete->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->ReportHeader->Visible) { // ReportHeader ?>
		<td <?php echo $ip_admission_delete->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_ReportHeader" class="ip_admission_ReportHeader">
<span<?php echo $ip_admission_delete->ReportHeader->viewAttributes() ?>><?php echo $ip_admission_delete->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->Procedure->Visible) { // Procedure ?>
		<td <?php echo $ip_admission_delete->Procedure->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_Procedure" class="ip_admission_Procedure">
<span<?php echo $ip_admission_delete->Procedure->viewAttributes() ?>><?php echo $ip_admission_delete->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->Consultant->Visible) { // Consultant ?>
		<td <?php echo $ip_admission_delete->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_Consultant" class="ip_admission_Consultant">
<span<?php echo $ip_admission_delete->Consultant->viewAttributes() ?>><?php echo $ip_admission_delete->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->Anesthetist->Visible) { // Anesthetist ?>
		<td <?php echo $ip_admission_delete->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_Anesthetist" class="ip_admission_Anesthetist">
<span<?php echo $ip_admission_delete->Anesthetist->viewAttributes() ?>><?php echo $ip_admission_delete->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->Amound->Visible) { // Amound ?>
		<td <?php echo $ip_admission_delete->Amound->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_Amound" class="ip_admission_Amound">
<span<?php echo $ip_admission_delete->Amound->viewAttributes() ?>><?php echo $ip_admission_delete->Amound->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->Package->Visible) { // Package ?>
		<td <?php echo $ip_admission_delete->Package->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_Package" class="ip_admission_Package">
<span<?php echo $ip_admission_delete->Package->viewAttributes() ?>><?php echo $ip_admission_delete->Package->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->patient_id->Visible) { // patient_id ?>
		<td <?php echo $ip_admission_delete->patient_id->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_patient_id" class="ip_admission_patient_id">
<span<?php echo $ip_admission_delete->patient_id->viewAttributes() ?>><?php echo $ip_admission_delete->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PartnerID->Visible) { // PartnerID ?>
		<td <?php echo $ip_admission_delete->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PartnerID" class="ip_admission_PartnerID">
<span<?php echo $ip_admission_delete->PartnerID->viewAttributes() ?>><?php echo $ip_admission_delete->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $ip_admission_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PartnerName" class="ip_admission_PartnerName">
<span<?php echo $ip_admission_delete->PartnerName->viewAttributes() ?>><?php echo $ip_admission_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<td <?php echo $ip_admission_delete->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile">
<span<?php echo $ip_admission_delete->PartnerMobile->viewAttributes() ?>><?php echo $ip_admission_delete->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->Cid->Visible) { // Cid ?>
		<td <?php echo $ip_admission_delete->Cid->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_Cid" class="ip_admission_Cid">
<span<?php echo $ip_admission_delete->Cid->viewAttributes() ?>><?php echo $ip_admission_delete->Cid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->PartId->Visible) { // PartId ?>
		<td <?php echo $ip_admission_delete->PartId->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_PartId" class="ip_admission_PartId">
<span<?php echo $ip_admission_delete->PartId->viewAttributes() ?>><?php echo $ip_admission_delete->PartId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->IDProof->Visible) { // IDProof ?>
		<td <?php echo $ip_admission_delete->IDProof->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_IDProof" class="ip_admission_IDProof">
<span<?php echo $ip_admission_delete->IDProof->viewAttributes() ?>><?php echo $ip_admission_delete->IDProof->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ip_admission_delete->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td <?php echo $ip_admission_delete->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $ip_admission_delete->RowCount ?>_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital">
<span<?php echo $ip_admission_delete->AdviceToOtherHospital->viewAttributes() ?>><?php echo $ip_admission_delete->AdviceToOtherHospital->getViewValue() ?></span>
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
$ip_admission_delete->terminate();
?>