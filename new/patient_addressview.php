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
<?php include_once "header.php"; ?>
<?php if (!$patient_address_view->isExport()) { ?>
<script>
var fpatient_addressview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_addressview = currentForm = new ew.Form("fpatient_addressview", "view");
	loadjs.done("fpatient_addressview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_address_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_address">
<input type="hidden" name="modal" value="<?php echo (int)$patient_address_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_address_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_id"><?php echo $patient_address_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $patient_address_view->id->cellAttributes() ?>>
<span id="el_patient_address_id">
<span<?php echo $patient_address_view->id->viewAttributes() ?>><?php echo $patient_address_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_patient_id"><?php echo $patient_address_view->patient_id->caption() ?></span></td>
		<td data-name="patient_id" <?php echo $patient_address_view->patient_id->cellAttributes() ?>>
<span id="el_patient_address_patient_id">
<span<?php echo $patient_address_view->patient_id->viewAttributes() ?>><?php echo $patient_address_view->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_street"><?php echo $patient_address_view->street->caption() ?></span></td>
		<td data-name="street" <?php echo $patient_address_view->street->cellAttributes() ?>>
<span id="el_patient_address_street">
<span<?php echo $patient_address_view->street->viewAttributes() ?>><?php echo $patient_address_view->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_town"><?php echo $patient_address_view->town->caption() ?></span></td>
		<td data-name="town" <?php echo $patient_address_view->town->cellAttributes() ?>>
<span id="el_patient_address_town">
<span<?php echo $patient_address_view->town->viewAttributes() ?>><?php echo $patient_address_view->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_province"><?php echo $patient_address_view->province->caption() ?></span></td>
		<td data-name="province" <?php echo $patient_address_view->province->cellAttributes() ?>>
<span id="el_patient_address_province">
<span<?php echo $patient_address_view->province->viewAttributes() ?>><?php echo $patient_address_view->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_postal_code"><?php echo $patient_address_view->postal_code->caption() ?></span></td>
		<td data-name="postal_code" <?php echo $patient_address_view->postal_code->cellAttributes() ?>>
<span id="el_patient_address_postal_code">
<span<?php echo $patient_address_view->postal_code->viewAttributes() ?>><?php echo $patient_address_view->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->address_type->Visible) { // address_type ?>
	<tr id="r_address_type">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_address_type"><?php echo $patient_address_view->address_type->caption() ?></span></td>
		<td data-name="address_type" <?php echo $patient_address_view->address_type->cellAttributes() ?>>
<span id="el_patient_address_address_type">
<span<?php echo $patient_address_view->address_type->viewAttributes() ?>><?php echo $patient_address_view->address_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_status"><?php echo $patient_address_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $patient_address_view->status->cellAttributes() ?>>
<span id="el_patient_address_status">
<span<?php echo $patient_address_view->status->viewAttributes() ?>><?php echo $patient_address_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_createdby"><?php echo $patient_address_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $patient_address_view->createdby->cellAttributes() ?>>
<span id="el_patient_address_createdby">
<span<?php echo $patient_address_view->createdby->viewAttributes() ?>><?php echo $patient_address_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_createddatetime"><?php echo $patient_address_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $patient_address_view->createddatetime->cellAttributes() ?>>
<span id="el_patient_address_createddatetime">
<span<?php echo $patient_address_view->createddatetime->viewAttributes() ?>><?php echo $patient_address_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_modifiedby"><?php echo $patient_address_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $patient_address_view->modifiedby->cellAttributes() ?>>
<span id="el_patient_address_modifiedby">
<span<?php echo $patient_address_view->modifiedby->viewAttributes() ?>><?php echo $patient_address_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_address_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_address_view->TableLeftColumnClass ?>"><span id="elh_patient_address_modifieddatetime"><?php echo $patient_address_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_address_view->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_address_modifieddatetime">
<span<?php echo $patient_address_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_address_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_address_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_address_view->isExport()) { ?>
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
$patient_address_view->terminate();
?>