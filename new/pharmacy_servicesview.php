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
$pharmacy_services_view = new pharmacy_services_view();

// Run the page
$pharmacy_services_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_services_view->isExport()) { ?>
<script>
var fpharmacy_servicesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_servicesview = currentForm = new ew.Form("fpharmacy_servicesview", "view");
	loadjs.done("fpharmacy_servicesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_services_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_services_view->ExportOptions->render("body") ?>
<?php $pharmacy_services_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_services_view->showPageHeader(); ?>
<?php
$pharmacy_services_view->showMessage();
?>
<form name="fpharmacy_servicesview" id="fpharmacy_servicesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_services_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_services_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_id"><?php echo $pharmacy_services_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_services_view->id->cellAttributes() ?>>
<span id="el_pharmacy_services_id">
<span<?php echo $pharmacy_services_view->id->viewAttributes() ?>><?php echo $pharmacy_services_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->pharmacy_id->Visible) { // pharmacy_id ?>
	<tr id="r_pharmacy_id">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_pharmacy_id"><?php echo $pharmacy_services_view->pharmacy_id->caption() ?></span></td>
		<td data-name="pharmacy_id" <?php echo $pharmacy_services_view->pharmacy_id->cellAttributes() ?>>
<span id="el_pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services_view->pharmacy_id->viewAttributes() ?>><?php echo $pharmacy_services_view->pharmacy_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_patient_id"><?php echo $pharmacy_services_view->patient_id->caption() ?></span></td>
		<td data-name="patient_id" <?php echo $pharmacy_services_view->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_services_patient_id">
<span<?php echo $pharmacy_services_view->patient_id->viewAttributes() ?>><?php echo $pharmacy_services_view->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_name"><?php echo $pharmacy_services_view->name->caption() ?></span></td>
		<td data-name="name" <?php echo $pharmacy_services_view->name->cellAttributes() ?>>
<span id="el_pharmacy_services_name">
<span<?php echo $pharmacy_services_view->name->viewAttributes() ?>><?php echo $pharmacy_services_view->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_amount"><?php echo $pharmacy_services_view->amount->caption() ?></span></td>
		<td data-name="amount" <?php echo $pharmacy_services_view->amount->cellAttributes() ?>>
<span id="el_pharmacy_services_amount">
<span<?php echo $pharmacy_services_view->amount->viewAttributes() ?>><?php echo $pharmacy_services_view->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_description"><?php echo $pharmacy_services_view->description->caption() ?></span></td>
		<td data-name="description" <?php echo $pharmacy_services_view->description->cellAttributes() ?>>
<span id="el_pharmacy_services_description">
<span<?php echo $pharmacy_services_view->description->viewAttributes() ?>><?php echo $pharmacy_services_view->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_charged_date"><?php echo $pharmacy_services_view->charged_date->caption() ?></span></td>
		<td data-name="charged_date" <?php echo $pharmacy_services_view->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_services_charged_date">
<span<?php echo $pharmacy_services_view->charged_date->viewAttributes() ?>><?php echo $pharmacy_services_view->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_status"><?php echo $pharmacy_services_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $pharmacy_services_view->status->cellAttributes() ?>>
<span id="el_pharmacy_services_status">
<span<?php echo $pharmacy_services_view->status->viewAttributes() ?>><?php echo $pharmacy_services_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_createdby"><?php echo $pharmacy_services_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $pharmacy_services_view->createdby->cellAttributes() ?>>
<span id="el_pharmacy_services_createdby">
<span<?php echo $pharmacy_services_view->createdby->viewAttributes() ?>><?php echo $pharmacy_services_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_createddatetime"><?php echo $pharmacy_services_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_services_view->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_services_createddatetime">
<span<?php echo $pharmacy_services_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_services_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_modifiedby"><?php echo $pharmacy_services_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_services_view->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_services_modifiedby">
<span<?php echo $pharmacy_services_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_services_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_modifieddatetime"><?php echo $pharmacy_services_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_services_view->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_services_modifieddatetime">
<span<?php echo $pharmacy_services_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_services_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_services_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_services_view->isExport()) { ?>
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
$pharmacy_services_view->terminate();
?>