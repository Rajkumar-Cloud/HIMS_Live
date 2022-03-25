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
$patient_emergency_contact_view = new patient_emergency_contact_view();

// Run the page
$patient_emergency_contact_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_emergency_contactview = currentForm = new ew.Form("fpatient_emergency_contactview", "view");

// Form_CustomValidate event
fpatient_emergency_contactview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emergency_contactview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emergency_contactview.lists["x_status"] = <?php echo $patient_emergency_contact_view->status->Lookup->toClientList() ?>;
fpatient_emergency_contactview.lists["x_status"].options = <?php echo JsonEncode($patient_emergency_contact_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_emergency_contact_view->ExportOptions->render("body") ?>
<?php $patient_emergency_contact_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_emergency_contact_view->showPageHeader(); ?>
<?php
$patient_emergency_contact_view->showMessage();
?>
<form name="fpatient_emergency_contactview" id="fpatient_emergency_contactview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_emergency_contact_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_emergency_contact_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<input type="hidden" name="modal" value="<?php echo (int)$patient_emergency_contact_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_id"><?php echo $patient_emergency_contact->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_emergency_contact->id->cellAttributes() ?>>
<span id="el_patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_patient_id"><?php echo $patient_emergency_contact->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $patient_emergency_contact->patient_id->cellAttributes() ?>>
<span id="el_patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_name"><?php echo $patient_emergency_contact->name->caption() ?></span></td>
		<td data-name="name"<?php echo $patient_emergency_contact->name->cellAttributes() ?>>
<span id="el_patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact->name->viewAttributes() ?>>
<?php echo $patient_emergency_contact->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
	<tr id="r_relationship">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_relationship"><?php echo $patient_emergency_contact->relationship->caption() ?></span></td>
		<td data-name="relationship"<?php echo $patient_emergency_contact->relationship->cellAttributes() ?>>
<span id="el_patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact->relationship->viewAttributes() ?>>
<?php echo $patient_emergency_contact->relationship->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
	<tr id="r_telephone">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_telephone"><?php echo $patient_emergency_contact->telephone->caption() ?></span></td>
		<td data-name="telephone"<?php echo $patient_emergency_contact->telephone->cellAttributes() ?>>
<span id="el_patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact->telephone->viewAttributes() ?>>
<?php echo $patient_emergency_contact->telephone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
	<tr id="r_address">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_address"><?php echo $patient_emergency_contact->address->caption() ?></span></td>
		<td data-name="address"<?php echo $patient_emergency_contact->address->cellAttributes() ?>>
<span id="el_patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact->address->viewAttributes() ?>>
<?php echo $patient_emergency_contact->address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_status"><?php echo $patient_emergency_contact->status->caption() ?></span></td>
		<td data-name="status"<?php echo $patient_emergency_contact->status->cellAttributes() ?>>
<span id="el_patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact->status->viewAttributes() ?>>
<?php echo $patient_emergency_contact->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_createdby"><?php echo $patient_emergency_contact->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_emergency_contact->createdby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createdby">
<span<?php echo $patient_emergency_contact->createdby->viewAttributes() ?>>
<?php echo $patient_emergency_contact->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_createddatetime"><?php echo $patient_emergency_contact->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_emergency_contact->createddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createddatetime">
<span<?php echo $patient_emergency_contact->createddatetime->viewAttributes() ?>>
<?php echo $patient_emergency_contact->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_modifiedby"><?php echo $patient_emergency_contact->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_emergency_contact->modifiedby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifiedby">
<span<?php echo $patient_emergency_contact->modifiedby->viewAttributes() ?>>
<?php echo $patient_emergency_contact->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_modifieddatetime"><?php echo $patient_emergency_contact->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_emergency_contact->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifieddatetime">
<span<?php echo $patient_emergency_contact->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_emergency_contact->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_emergency_contact_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_emergency_contact_view->terminate();
?>