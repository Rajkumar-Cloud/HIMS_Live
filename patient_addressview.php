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
$patient_address_view = new patient_address_view();

// Run the page
$patient_address_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_address->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_addressview = currentForm = new ew.Form("fpatient_addressview", "view");

// Form_CustomValidate event
fpatient_addressview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_addressview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_addressview.lists["x_address_type"] = <?php echo $patient_address_view->address_type->Lookup->toClientList() ?>;
fpatient_addressview.lists["x_address_type"].options = <?php echo JsonEncode($patient_address_view->address_type->lookupOptions()) ?>;
fpatient_addressview.lists["x_status"] = <?php echo $patient_address_view->status->Lookup->toClientList() ?>;
fpatient_addressview.lists["x_status"].options = <?php echo JsonEncode($patient_address_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_address->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_address_view->ExportOptions->render("body") ?>
<?php $patient_address_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_address_view->showPageHeader(); ?>
<?php
$patient_address_view->showMessage();
?>
<form name="fpatient_addressview" id="fpatient_addressview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_address_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_address_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_address">
<input type="hidden" name="modal" value="<?php echo (int)$patient_address_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_address->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_id"><?php echo $patient_address->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_address->id->cellAttributes() ?>>
<span id="el_patient_address_id">
<span<?php echo $patient_address->id->viewAttributes() ?>>
<?php echo $patient_address->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_patient_id"><?php echo $patient_address->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $patient_address->patient_id->cellAttributes() ?>>
<span id="el_patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<?php echo $patient_address->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_street"><?php echo $patient_address->street->caption() ?></span></td>
		<td data-name="street"<?php echo $patient_address->street->cellAttributes() ?>>
<span id="el_patient_address_street">
<span<?php echo $patient_address->street->viewAttributes() ?>>
<?php echo $patient_address->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_town"><?php echo $patient_address->town->caption() ?></span></td>
		<td data-name="town"<?php echo $patient_address->town->cellAttributes() ?>>
<span id="el_patient_address_town">
<span<?php echo $patient_address->town->viewAttributes() ?>>
<?php echo $patient_address->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_province"><?php echo $patient_address->province->caption() ?></span></td>
		<td data-name="province"<?php echo $patient_address->province->cellAttributes() ?>>
<span id="el_patient_address_province">
<span<?php echo $patient_address->province->viewAttributes() ?>>
<?php echo $patient_address->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_postal_code"><?php echo $patient_address->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $patient_address->postal_code->cellAttributes() ?>>
<span id="el_patient_address_postal_code">
<span<?php echo $patient_address->postal_code->viewAttributes() ?>>
<?php echo $patient_address->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->address_type->Visible) { // address_type ?>
	<tr id="r_address_type">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_address_type"><?php echo $patient_address->address_type->caption() ?></span></td>
		<td data-name="address_type"<?php echo $patient_address->address_type->cellAttributes() ?>>
<span id="el_patient_address_address_type">
<span<?php echo $patient_address->address_type->viewAttributes() ?>>
<?php echo $patient_address->address_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_status"><?php echo $patient_address->status->caption() ?></span></td>
		<td data-name="status"<?php echo $patient_address->status->cellAttributes() ?>>
<span id="el_patient_address_status">
<span<?php echo $patient_address->status->viewAttributes() ?>>
<?php echo $patient_address->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_createdby"><?php echo $patient_address->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_address->createdby->cellAttributes() ?>>
<span id="el_patient_address_createdby">
<span<?php echo $patient_address->createdby->viewAttributes() ?>>
<?php echo $patient_address->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_createddatetime"><?php echo $patient_address->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_address->createddatetime->cellAttributes() ?>>
<span id="el_patient_address_createddatetime">
<span<?php echo $patient_address->createddatetime->viewAttributes() ?>>
<?php echo $patient_address->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_modifiedby"><?php echo $patient_address->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_address->modifiedby->cellAttributes() ?>>
<span id="el_patient_address_modifiedby">
<span<?php echo $patient_address->modifiedby->viewAttributes() ?>>
<?php echo $patient_address->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_modifieddatetime"><?php echo $patient_address->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_address->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_address_modifieddatetime">
<span<?php echo $patient_address->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_address->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_address_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_address->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_address_view->terminate();
?>