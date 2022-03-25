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
$patient_insurance_view = new patient_insurance_view();

// Run the page
$patient_insurance_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_insurance_view->isExport()) { ?>
<script>
var fpatient_insuranceview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_insuranceview = currentForm = new ew.Form("fpatient_insuranceview", "view");
	loadjs.done("fpatient_insuranceview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_insurance_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_insurance_view->ExportOptions->render("body") ?>
<?php $patient_insurance_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_insurance_view->showPageHeader(); ?>
<?php
$patient_insurance_view->showMessage();
?>
<form name="fpatient_insuranceview" id="fpatient_insuranceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="modal" value="<?php echo (int)$patient_insurance_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_insurance_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_id"><?php echo $patient_insurance_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $patient_insurance_view->id->cellAttributes() ?>>
<span id="el_patient_insurance_id">
<span<?php echo $patient_insurance_view->id->viewAttributes() ?>><?php echo $patient_insurance_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_Reception"><?php echo $patient_insurance_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $patient_insurance_view->Reception->cellAttributes() ?>>
<span id="el_patient_insurance_Reception">
<span<?php echo $patient_insurance_view->Reception->viewAttributes() ?>><?php echo $patient_insurance_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PatientId"><?php echo $patient_insurance_view->PatientId->caption() ?></span></td>
		<td data-name="PatientId" <?php echo $patient_insurance_view->PatientId->cellAttributes() ?>>
<span id="el_patient_insurance_PatientId">
<span<?php echo $patient_insurance_view->PatientId->viewAttributes() ?>><?php echo $patient_insurance_view->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PatientName"><?php echo $patient_insurance_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $patient_insurance_view->PatientName->cellAttributes() ?>>
<span id="el_patient_insurance_PatientName">
<span<?php echo $patient_insurance_view->PatientName->viewAttributes() ?>><?php echo $patient_insurance_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->Company->Visible) { // Company ?>
	<tr id="r_Company">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_Company"><?php echo $patient_insurance_view->Company->caption() ?></span></td>
		<td data-name="Company" <?php echo $patient_insurance_view->Company->cellAttributes() ?>>
<span id="el_patient_insurance_Company">
<span<?php echo $patient_insurance_view->Company->viewAttributes() ?>><?php echo $patient_insurance_view->Company->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<tr id="r_AddressInsuranceCarierName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_AddressInsuranceCarierName"><?php echo $patient_insurance_view->AddressInsuranceCarierName->caption() ?></span></td>
		<td data-name="AddressInsuranceCarierName" <?php echo $patient_insurance_view->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el_patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance_view->AddressInsuranceCarierName->viewAttributes() ?>><?php echo $patient_insurance_view->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->ContactName->Visible) { // ContactName ?>
	<tr id="r_ContactName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ContactName"><?php echo $patient_insurance_view->ContactName->caption() ?></span></td>
		<td data-name="ContactName" <?php echo $patient_insurance_view->ContactName->cellAttributes() ?>>
<span id="el_patient_insurance_ContactName">
<span<?php echo $patient_insurance_view->ContactName->viewAttributes() ?>><?php echo $patient_insurance_view->ContactName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->ContactMobile->Visible) { // ContactMobile ?>
	<tr id="r_ContactMobile">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ContactMobile"><?php echo $patient_insurance_view->ContactMobile->caption() ?></span></td>
		<td data-name="ContactMobile" <?php echo $patient_insurance_view->ContactMobile->cellAttributes() ?>>
<span id="el_patient_insurance_ContactMobile">
<span<?php echo $patient_insurance_view->ContactMobile->viewAttributes() ?>><?php echo $patient_insurance_view->ContactMobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->PolicyType->Visible) { // PolicyType ?>
	<tr id="r_PolicyType">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyType"><?php echo $patient_insurance_view->PolicyType->caption() ?></span></td>
		<td data-name="PolicyType" <?php echo $patient_insurance_view->PolicyType->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyType">
<span<?php echo $patient_insurance_view->PolicyType->viewAttributes() ?>><?php echo $patient_insurance_view->PolicyType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->PolicyName->Visible) { // PolicyName ?>
	<tr id="r_PolicyName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyName"><?php echo $patient_insurance_view->PolicyName->caption() ?></span></td>
		<td data-name="PolicyName" <?php echo $patient_insurance_view->PolicyName->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyName">
<span<?php echo $patient_insurance_view->PolicyName->viewAttributes() ?>><?php echo $patient_insurance_view->PolicyName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->PolicyNo->Visible) { // PolicyNo ?>
	<tr id="r_PolicyNo">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyNo"><?php echo $patient_insurance_view->PolicyNo->caption() ?></span></td>
		<td data-name="PolicyNo" <?php echo $patient_insurance_view->PolicyNo->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyNo">
<span<?php echo $patient_insurance_view->PolicyNo->viewAttributes() ?>><?php echo $patient_insurance_view->PolicyNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->PolicyAmount->Visible) { // PolicyAmount ?>
	<tr id="r_PolicyAmount">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyAmount"><?php echo $patient_insurance_view->PolicyAmount->caption() ?></span></td>
		<td data-name="PolicyAmount" <?php echo $patient_insurance_view->PolicyAmount->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance_view->PolicyAmount->viewAttributes() ?>><?php echo $patient_insurance_view->PolicyAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->RefLetterNo->Visible) { // RefLetterNo ?>
	<tr id="r_RefLetterNo">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_RefLetterNo"><?php echo $patient_insurance_view->RefLetterNo->caption() ?></span></td>
		<td data-name="RefLetterNo" <?php echo $patient_insurance_view->RefLetterNo->cellAttributes() ?>>
<span id="el_patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance_view->RefLetterNo->viewAttributes() ?>><?php echo $patient_insurance_view->RefLetterNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->ReferenceBy->Visible) { // ReferenceBy ?>
	<tr id="r_ReferenceBy">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ReferenceBy"><?php echo $patient_insurance_view->ReferenceBy->caption() ?></span></td>
		<td data-name="ReferenceBy" <?php echo $patient_insurance_view->ReferenceBy->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance_view->ReferenceBy->viewAttributes() ?>><?php echo $patient_insurance_view->ReferenceBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->ReferenceDate->Visible) { // ReferenceDate ?>
	<tr id="r_ReferenceDate">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ReferenceDate"><?php echo $patient_insurance_view->ReferenceDate->caption() ?></span></td>
		<td data-name="ReferenceDate" <?php echo $patient_insurance_view->ReferenceDate->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance_view->ReferenceDate->viewAttributes() ?>><?php echo $patient_insurance_view->ReferenceDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->DocumentAttatch->Visible) { // DocumentAttatch ?>
	<tr id="r_DocumentAttatch">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_DocumentAttatch"><?php echo $patient_insurance_view->DocumentAttatch->caption() ?></span></td>
		<td data-name="DocumentAttatch" <?php echo $patient_insurance_view->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<span<?php echo $patient_insurance_view->DocumentAttatch->viewAttributes() ?>><?php echo GetFileViewTag($patient_insurance_view->DocumentAttatch, $patient_insurance_view->DocumentAttatch->getViewValue(), FALSE) ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_createdby"><?php echo $patient_insurance_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $patient_insurance_view->createdby->cellAttributes() ?>>
<span id="el_patient_insurance_createdby">
<span<?php echo $patient_insurance_view->createdby->viewAttributes() ?>><?php echo $patient_insurance_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_createddatetime"><?php echo $patient_insurance_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $patient_insurance_view->createddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_createddatetime">
<span<?php echo $patient_insurance_view->createddatetime->viewAttributes() ?>><?php echo $patient_insurance_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_modifiedby"><?php echo $patient_insurance_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $patient_insurance_view->modifiedby->cellAttributes() ?>>
<span id="el_patient_insurance_modifiedby">
<span<?php echo $patient_insurance_view->modifiedby->viewAttributes() ?>><?php echo $patient_insurance_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_modifieddatetime"><?php echo $patient_insurance_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_insurance_view->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_insurance_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_mrnno"><?php echo $patient_insurance_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $patient_insurance_view->mrnno->cellAttributes() ?>>
<span id="el_patient_insurance_mrnno">
<span<?php echo $patient_insurance_view->mrnno->viewAttributes() ?>><?php echo $patient_insurance_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_insurance_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_insurance_view->isExport()) { ?>
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
$patient_insurance_view->terminate();
?>