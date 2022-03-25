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
$patient_telephone_view = new patient_telephone_view();

// Run the page
$patient_telephone_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_telephone_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_telephone->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_telephoneview = currentForm = new ew.Form("fpatient_telephoneview", "view");

// Form_CustomValidate event
fpatient_telephoneview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_telephoneview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_telephoneview.lists["x_tele_type"] = <?php echo $patient_telephone_view->tele_type->Lookup->toClientList() ?>;
fpatient_telephoneview.lists["x_tele_type"].options = <?php echo JsonEncode($patient_telephone_view->tele_type->lookupOptions()) ?>;
fpatient_telephoneview.lists["x_telephone_type"] = <?php echo $patient_telephone_view->telephone_type->Lookup->toClientList() ?>;
fpatient_telephoneview.lists["x_telephone_type"].options = <?php echo JsonEncode($patient_telephone_view->telephone_type->lookupOptions()) ?>;
fpatient_telephoneview.lists["x_status"] = <?php echo $patient_telephone_view->status->Lookup->toClientList() ?>;
fpatient_telephoneview.lists["x_status"].options = <?php echo JsonEncode($patient_telephone_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_telephone->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_telephone_view->ExportOptions->render("body") ?>
<?php $patient_telephone_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_telephone_view->showPageHeader(); ?>
<?php
$patient_telephone_view->showMessage();
?>
<form name="fpatient_telephoneview" id="fpatient_telephoneview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_telephone_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_telephone_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_telephone">
<input type="hidden" name="modal" value="<?php echo (int)$patient_telephone_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_telephone->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_id"><?php echo $patient_telephone->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_telephone->id->cellAttributes() ?>>
<span id="el_patient_telephone_id">
<span<?php echo $patient_telephone->id->viewAttributes() ?>>
<?php echo $patient_telephone->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_patient_id"><?php echo $patient_telephone->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $patient_telephone->patient_id->cellAttributes() ?>>
<span id="el_patient_telephone_patient_id">
<span<?php echo $patient_telephone->patient_id->viewAttributes() ?>>
<?php echo $patient_telephone->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->tele_type->Visible) { // tele_type ?>
	<tr id="r_tele_type">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_tele_type"><?php echo $patient_telephone->tele_type->caption() ?></span></td>
		<td data-name="tele_type"<?php echo $patient_telephone->tele_type->cellAttributes() ?>>
<span id="el_patient_telephone_tele_type">
<span<?php echo $patient_telephone->tele_type->viewAttributes() ?>>
<?php echo $patient_telephone->tele_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->telephone->Visible) { // telephone ?>
	<tr id="r_telephone">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_telephone"><?php echo $patient_telephone->telephone->caption() ?></span></td>
		<td data-name="telephone"<?php echo $patient_telephone->telephone->cellAttributes() ?>>
<span id="el_patient_telephone_telephone">
<span<?php echo $patient_telephone->telephone->viewAttributes() ?>>
<?php echo $patient_telephone->telephone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->telephone_type->Visible) { // telephone_type ?>
	<tr id="r_telephone_type">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_telephone_type"><?php echo $patient_telephone->telephone_type->caption() ?></span></td>
		<td data-name="telephone_type"<?php echo $patient_telephone->telephone_type->cellAttributes() ?>>
<span id="el_patient_telephone_telephone_type">
<span<?php echo $patient_telephone->telephone_type->viewAttributes() ?>>
<?php echo $patient_telephone->telephone_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_status"><?php echo $patient_telephone->status->caption() ?></span></td>
		<td data-name="status"<?php echo $patient_telephone->status->cellAttributes() ?>>
<span id="el_patient_telephone_status">
<span<?php echo $patient_telephone->status->viewAttributes() ?>>
<?php echo $patient_telephone->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_createdby"><?php echo $patient_telephone->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_telephone->createdby->cellAttributes() ?>>
<span id="el_patient_telephone_createdby">
<span<?php echo $patient_telephone->createdby->viewAttributes() ?>>
<?php echo $patient_telephone->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_createddatetime"><?php echo $patient_telephone->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_telephone->createddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_createddatetime">
<span<?php echo $patient_telephone->createddatetime->viewAttributes() ?>>
<?php echo $patient_telephone->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_modifiedby"><?php echo $patient_telephone->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_telephone->modifiedby->cellAttributes() ?>>
<span id="el_patient_telephone_modifiedby">
<span<?php echo $patient_telephone->modifiedby->viewAttributes() ?>>
<?php echo $patient_telephone->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_telephone->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_telephone_view->TableLeftColumnClass ?>"><span id="elh_patient_telephone_modifieddatetime"><?php echo $patient_telephone->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_telephone->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_telephone_modifieddatetime">
<span<?php echo $patient_telephone->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_telephone->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_telephone_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_telephone->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_telephone_view->terminate();
?>