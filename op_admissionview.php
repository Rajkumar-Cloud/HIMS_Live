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
$op_admission_view = new op_admission_view();

// Run the page
$op_admission_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$op_admission_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$op_admission->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fop_admissionview = currentForm = new ew.Form("fop_admissionview", "view");

// Form_CustomValidate event
fop_admissionview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fop_admissionview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fop_admissionview.lists["x_patient_id"] = <?php echo $op_admission_view->patient_id->Lookup->toClientList() ?>;
fop_admissionview.lists["x_patient_id"].options = <?php echo JsonEncode($op_admission_view->patient_id->lookupOptions()) ?>;
fop_admissionview.lists["x_physician_id"] = <?php echo $op_admission_view->physician_id->Lookup->toClientList() ?>;
fop_admissionview.lists["x_physician_id"].options = <?php echo JsonEncode($op_admission_view->physician_id->lookupOptions()) ?>;
fop_admissionview.lists["x_status"] = <?php echo $op_admission_view->status->Lookup->toClientList() ?>;
fop_admissionview.lists["x_status"].options = <?php echo JsonEncode($op_admission_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$op_admission->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $op_admission_view->ExportOptions->render("body") ?>
<?php $op_admission_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $op_admission_view->showPageHeader(); ?>
<?php
$op_admission_view->showMessage();
?>
<form name="fop_admissionview" id="fop_admissionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($op_admission_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $op_admission_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="op_admission">
<input type="hidden" name="modal" value="<?php echo (int)$op_admission_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($op_admission->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_id"><?php echo $op_admission->id->caption() ?></span></td>
		<td data-name="id"<?php echo $op_admission->id->cellAttributes() ?>>
<span id="el_op_admission_id">
<span<?php echo $op_admission->id->viewAttributes() ?>>
<?php echo $op_admission->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_patient_id"><?php echo $op_admission->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $op_admission->patient_id->cellAttributes() ?>>
<span id="el_op_admission_patient_id">
<span<?php echo $op_admission->patient_id->viewAttributes() ?>>
<?php echo $op_admission->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_physician_id"><?php echo $op_admission->physician_id->caption() ?></span></td>
		<td data-name="physician_id"<?php echo $op_admission->physician_id->cellAttributes() ?>>
<span id="el_op_admission_physician_id">
<span<?php echo $op_admission->physician_id->viewAttributes() ?>>
<?php echo $op_admission->physician_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_cause"><?php echo $op_admission->cause->caption() ?></span></td>
		<td data-name="cause"<?php echo $op_admission->cause->cellAttributes() ?>>
<span id="el_op_admission_cause">
<span<?php echo $op_admission->cause->viewAttributes() ?>>
<?php echo $op_admission->cause->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_status"><?php echo $op_admission->status->caption() ?></span></td>
		<td data-name="status"<?php echo $op_admission->status->cellAttributes() ?>>
<span id="el_op_admission_status">
<span<?php echo $op_admission->status->viewAttributes() ?>>
<?php echo $op_admission->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_createdby"><?php echo $op_admission->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $op_admission->createdby->cellAttributes() ?>>
<span id="el_op_admission_createdby">
<span<?php echo $op_admission->createdby->viewAttributes() ?>>
<?php echo $op_admission->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_createddatetime"><?php echo $op_admission->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $op_admission->createddatetime->cellAttributes() ?>>
<span id="el_op_admission_createddatetime">
<span<?php echo $op_admission->createddatetime->viewAttributes() ?>>
<?php echo $op_admission->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_modifiedby"><?php echo $op_admission->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $op_admission->modifiedby->cellAttributes() ?>>
<span id="el_op_admission_modifiedby">
<span<?php echo $op_admission->modifiedby->viewAttributes() ?>>
<?php echo $op_admission->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($op_admission->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $op_admission_view->TableLeftColumnClass ?>"><span id="elh_op_admission_modifieddatetime"><?php echo $op_admission->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $op_admission->modifieddatetime->cellAttributes() ?>>
<span id="el_op_admission_modifieddatetime">
<span<?php echo $op_admission->modifieddatetime->viewAttributes() ?>>
<?php echo $op_admission->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("patient_services", explode(",", $op_admission->getCurrentDetailTable())) && $patient_services->DetailView) {
?>
<?php if ($op_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_servicesgrid.php" ?>
<?php } ?>
</form>
<?php
$op_admission_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$op_admission->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$op_admission_view->terminate();
?>