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
<?php include_once "header.php"; ?>
<?php if (!$patient_emergency_contact_view->isExport()) { ?>
<script>
var fpatient_emergency_contactview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_emergency_contactview = currentForm = new ew.Form("fpatient_emergency_contactview", "view");
	loadjs.done("fpatient_emergency_contactview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_emergency_contact_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<input type="hidden" name="modal" value="<?php echo (int)$patient_emergency_contact_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_emergency_contact_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_id"><?php echo $patient_emergency_contact_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $patient_emergency_contact_view->id->cellAttributes() ?>>
<span id="el_patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact_view->id->viewAttributes() ?>><?php echo $patient_emergency_contact_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_patient_id"><?php echo $patient_emergency_contact_view->patient_id->caption() ?></span></td>
		<td data-name="patient_id" <?php echo $patient_emergency_contact_view->patient_id->cellAttributes() ?>>
<span id="el_patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact_view->patient_id->viewAttributes() ?>><?php echo $patient_emergency_contact_view->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_name"><?php echo $patient_emergency_contact_view->name->caption() ?></span></td>
		<td data-name="name" <?php echo $patient_emergency_contact_view->name->cellAttributes() ?>>
<span id="el_patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact_view->name->viewAttributes() ?>><?php echo $patient_emergency_contact_view->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->relationship->Visible) { // relationship ?>
	<tr id="r_relationship">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_relationship"><?php echo $patient_emergency_contact_view->relationship->caption() ?></span></td>
		<td data-name="relationship" <?php echo $patient_emergency_contact_view->relationship->cellAttributes() ?>>
<span id="el_patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact_view->relationship->viewAttributes() ?>><?php echo $patient_emergency_contact_view->relationship->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->telephone->Visible) { // telephone ?>
	<tr id="r_telephone">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_telephone"><?php echo $patient_emergency_contact_view->telephone->caption() ?></span></td>
		<td data-name="telephone" <?php echo $patient_emergency_contact_view->telephone->cellAttributes() ?>>
<span id="el_patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact_view->telephone->viewAttributes() ?>><?php echo $patient_emergency_contact_view->telephone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->address->Visible) { // address ?>
	<tr id="r_address">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_address"><?php echo $patient_emergency_contact_view->address->caption() ?></span></td>
		<td data-name="address" <?php echo $patient_emergency_contact_view->address->cellAttributes() ?>>
<span id="el_patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact_view->address->viewAttributes() ?>><?php echo $patient_emergency_contact_view->address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_status"><?php echo $patient_emergency_contact_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $patient_emergency_contact_view->status->cellAttributes() ?>>
<span id="el_patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact_view->status->viewAttributes() ?>><?php echo $patient_emergency_contact_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_createdby"><?php echo $patient_emergency_contact_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $patient_emergency_contact_view->createdby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createdby">
<span<?php echo $patient_emergency_contact_view->createdby->viewAttributes() ?>><?php echo $patient_emergency_contact_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_createddatetime"><?php echo $patient_emergency_contact_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $patient_emergency_contact_view->createddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_createddatetime">
<span<?php echo $patient_emergency_contact_view->createddatetime->viewAttributes() ?>><?php echo $patient_emergency_contact_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_modifiedby"><?php echo $patient_emergency_contact_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $patient_emergency_contact_view->modifiedby->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifiedby">
<span<?php echo $patient_emergency_contact_view->modifiedby->viewAttributes() ?>><?php echo $patient_emergency_contact_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_emergency_contact_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_emergency_contact_view->TableLeftColumnClass ?>"><span id="elh_patient_emergency_contact_modifieddatetime"><?php echo $patient_emergency_contact_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_emergency_contact_view->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_emergency_contact_modifieddatetime">
<span<?php echo $patient_emergency_contact_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_emergency_contact_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_emergency_contact_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_emergency_contact_view->isExport()) { ?>
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
$patient_emergency_contact_view->terminate();
?>