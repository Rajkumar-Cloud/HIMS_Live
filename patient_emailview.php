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
$patient_email_view = new patient_email_view();

// Run the page
$patient_email_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_email->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_emailview = currentForm = new ew.Form("fpatient_emailview", "view");

// Form_CustomValidate event
fpatient_emailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emailview.lists["x_email_type"] = <?php echo $patient_email_view->email_type->Lookup->toClientList() ?>;
fpatient_emailview.lists["x_email_type"].options = <?php echo JsonEncode($patient_email_view->email_type->lookupOptions()) ?>;
fpatient_emailview.lists["x_status"] = <?php echo $patient_email_view->status->Lookup->toClientList() ?>;
fpatient_emailview.lists["x_status"].options = <?php echo JsonEncode($patient_email_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_email->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_email_view->ExportOptions->render("body") ?>
<?php $patient_email_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_email_view->showPageHeader(); ?>
<?php
$patient_email_view->showMessage();
?>
<form name="fpatient_emailview" id="fpatient_emailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_email_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_email_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_email">
<input type="hidden" name="modal" value="<?php echo (int)$patient_email_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_email->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_id"><?php echo $patient_email->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_email->id->cellAttributes() ?>>
<span id="el_patient_email_id">
<span<?php echo $patient_email->id->viewAttributes() ?>>
<?php echo $patient_email->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_patient_id"><?php echo $patient_email->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $patient_email->patient_id->cellAttributes() ?>>
<span id="el_patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<?php echo $patient_email->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->_email->Visible) { // email ?>
	<tr id="r__email">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email__email"><?php echo $patient_email->_email->caption() ?></span></td>
		<td data-name="_email"<?php echo $patient_email->_email->cellAttributes() ?>>
<span id="el_patient_email__email">
<span<?php echo $patient_email->_email->viewAttributes() ?>>
<?php echo $patient_email->_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->email_type->Visible) { // email_type ?>
	<tr id="r_email_type">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_email_type"><?php echo $patient_email->email_type->caption() ?></span></td>
		<td data-name="email_type"<?php echo $patient_email->email_type->cellAttributes() ?>>
<span id="el_patient_email_email_type">
<span<?php echo $patient_email->email_type->viewAttributes() ?>>
<?php echo $patient_email->email_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_status"><?php echo $patient_email->status->caption() ?></span></td>
		<td data-name="status"<?php echo $patient_email->status->cellAttributes() ?>>
<span id="el_patient_email_status">
<span<?php echo $patient_email->status->viewAttributes() ?>>
<?php echo $patient_email->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_createdby"><?php echo $patient_email->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_email->createdby->cellAttributes() ?>>
<span id="el_patient_email_createdby">
<span<?php echo $patient_email->createdby->viewAttributes() ?>>
<?php echo $patient_email->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_createddatetime"><?php echo $patient_email->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_email->createddatetime->cellAttributes() ?>>
<span id="el_patient_email_createddatetime">
<span<?php echo $patient_email->createddatetime->viewAttributes() ?>>
<?php echo $patient_email->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_modifiedby"><?php echo $patient_email->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_email->modifiedby->cellAttributes() ?>>
<span id="el_patient_email_modifiedby">
<span<?php echo $patient_email->modifiedby->viewAttributes() ?>>
<?php echo $patient_email->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_email->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_email_view->TableLeftColumnClass ?>"><span id="elh_patient_email_modifieddatetime"><?php echo $patient_email->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_email->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_email_modifieddatetime">
<span<?php echo $patient_email->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_email->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_email_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_email->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_email_view->terminate();
?>