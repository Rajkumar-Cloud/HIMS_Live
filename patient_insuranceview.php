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
<?php include_once "header.php" ?>
<?php if (!$patient_insurance->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_insuranceview = currentForm = new ew.Form("fpatient_insuranceview", "view");

// Form_CustomValidate event
fpatient_insuranceview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_insuranceview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_insurance->isExport()) { ?>
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
<?php if ($patient_insurance_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_insurance_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="modal" value="<?php echo (int)$patient_insurance_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_insurance->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_id"><?php echo $patient_insurance->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_insurance->id->cellAttributes() ?>>
<span id="el_patient_insurance_id">
<span<?php echo $patient_insurance->id->viewAttributes() ?>>
<?php echo $patient_insurance->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_Reception"><?php echo $patient_insurance->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $patient_insurance->Reception->cellAttributes() ?>>
<span id="el_patient_insurance_Reception">
<span<?php echo $patient_insurance->Reception->viewAttributes() ?>>
<?php echo $patient_insurance->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PatientId"><?php echo $patient_insurance->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $patient_insurance->PatientId->cellAttributes() ?>>
<span id="el_patient_insurance_PatientId">
<span<?php echo $patient_insurance->PatientId->viewAttributes() ?>>
<?php echo $patient_insurance->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PatientName"><?php echo $patient_insurance->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $patient_insurance->PatientName->cellAttributes() ?>>
<span id="el_patient_insurance_PatientName">
<span<?php echo $patient_insurance->PatientName->viewAttributes() ?>>
<?php echo $patient_insurance->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->Company->Visible) { // Company ?>
	<tr id="r_Company">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_Company"><?php echo $patient_insurance->Company->caption() ?></span></td>
		<td data-name="Company"<?php echo $patient_insurance->Company->cellAttributes() ?>>
<span id="el_patient_insurance_Company">
<span<?php echo $patient_insurance->Company->viewAttributes() ?>>
<?php echo $patient_insurance->Company->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<tr id="r_AddressInsuranceCarierName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_AddressInsuranceCarierName"><?php echo $patient_insurance->AddressInsuranceCarierName->caption() ?></span></td>
		<td data-name="AddressInsuranceCarierName"<?php echo $patient_insurance->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el_patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance->AddressInsuranceCarierName->viewAttributes() ?>>
<?php echo $patient_insurance->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
	<tr id="r_ContactName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ContactName"><?php echo $patient_insurance->ContactName->caption() ?></span></td>
		<td data-name="ContactName"<?php echo $patient_insurance->ContactName->cellAttributes() ?>>
<span id="el_patient_insurance_ContactName">
<span<?php echo $patient_insurance->ContactName->viewAttributes() ?>>
<?php echo $patient_insurance->ContactName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
	<tr id="r_ContactMobile">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ContactMobile"><?php echo $patient_insurance->ContactMobile->caption() ?></span></td>
		<td data-name="ContactMobile"<?php echo $patient_insurance->ContactMobile->cellAttributes() ?>>
<span id="el_patient_insurance_ContactMobile">
<span<?php echo $patient_insurance->ContactMobile->viewAttributes() ?>>
<?php echo $patient_insurance->ContactMobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
	<tr id="r_PolicyType">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyType"><?php echo $patient_insurance->PolicyType->caption() ?></span></td>
		<td data-name="PolicyType"<?php echo $patient_insurance->PolicyType->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyType">
<span<?php echo $patient_insurance->PolicyType->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
	<tr id="r_PolicyName">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyName"><?php echo $patient_insurance->PolicyName->caption() ?></span></td>
		<td data-name="PolicyName"<?php echo $patient_insurance->PolicyName->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyName">
<span<?php echo $patient_insurance->PolicyName->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
	<tr id="r_PolicyNo">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyNo"><?php echo $patient_insurance->PolicyNo->caption() ?></span></td>
		<td data-name="PolicyNo"<?php echo $patient_insurance->PolicyNo->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyNo">
<span<?php echo $patient_insurance->PolicyNo->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
	<tr id="r_PolicyAmount">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyAmount"><?php echo $patient_insurance->PolicyAmount->caption() ?></span></td>
		<td data-name="PolicyAmount"<?php echo $patient_insurance->PolicyAmount->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance->PolicyAmount->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
	<tr id="r_RefLetterNo">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_RefLetterNo"><?php echo $patient_insurance->RefLetterNo->caption() ?></span></td>
		<td data-name="RefLetterNo"<?php echo $patient_insurance->RefLetterNo->cellAttributes() ?>>
<span id="el_patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance->RefLetterNo->viewAttributes() ?>>
<?php echo $patient_insurance->RefLetterNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
	<tr id="r_ReferenceBy">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ReferenceBy"><?php echo $patient_insurance->ReferenceBy->caption() ?></span></td>
		<td data-name="ReferenceBy"<?php echo $patient_insurance->ReferenceBy->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance->ReferenceBy->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
	<tr id="r_ReferenceDate">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ReferenceDate"><?php echo $patient_insurance->ReferenceDate->caption() ?></span></td>
		<td data-name="ReferenceDate"<?php echo $patient_insurance->ReferenceDate->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance->ReferenceDate->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->DocumentAttatch->Visible) { // DocumentAttatch ?>
	<tr id="r_DocumentAttatch">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_DocumentAttatch"><?php echo $patient_insurance->DocumentAttatch->caption() ?></span></td>
		<td data-name="DocumentAttatch"<?php echo $patient_insurance->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<span<?php echo $patient_insurance->DocumentAttatch->viewAttributes() ?>>
<?php echo GetFileViewTag($patient_insurance->DocumentAttatch, $patient_insurance->DocumentAttatch->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_createdby"><?php echo $patient_insurance->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_insurance->createdby->cellAttributes() ?>>
<span id="el_patient_insurance_createdby">
<span<?php echo $patient_insurance->createdby->viewAttributes() ?>>
<?php echo $patient_insurance->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_createddatetime"><?php echo $patient_insurance->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_insurance->createddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_createddatetime">
<span<?php echo $patient_insurance->createddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_modifiedby"><?php echo $patient_insurance->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_insurance->modifiedby->cellAttributes() ?>>
<span id="el_patient_insurance_modifiedby">
<span<?php echo $patient_insurance->modifiedby->viewAttributes() ?>>
<?php echo $patient_insurance->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_modifieddatetime"><?php echo $patient_insurance->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_insurance->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_insurance_view->TableLeftColumnClass ?>"><span id="elh_patient_insurance_mrnno"><?php echo $patient_insurance->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $patient_insurance->mrnno->cellAttributes() ?>>
<span id="el_patient_insurance_mrnno">
<span<?php echo $patient_insurance->mrnno->viewAttributes() ?>>
<?php echo $patient_insurance->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_insurance_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_insurance->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_insurance_view->terminate();
?>