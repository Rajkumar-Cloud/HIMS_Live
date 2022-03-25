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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_servicesview = currentForm = new ew.Form("fpharmacy_servicesview", "view");

// Form_CustomValidate event
fpharmacy_servicesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_servicesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_servicesview.lists["x_pharmacy_id"] = <?php echo $pharmacy_services_view->pharmacy_id->Lookup->toClientList() ?>;
fpharmacy_servicesview.lists["x_pharmacy_id"].options = <?php echo JsonEncode($pharmacy_services_view->pharmacy_id->lookupOptions()) ?>;
fpharmacy_servicesview.lists["x_name"] = <?php echo $pharmacy_services_view->name->Lookup->toClientList() ?>;
fpharmacy_servicesview.lists["x_name"].options = <?php echo JsonEncode($pharmacy_services_view->name->lookupOptions()) ?>;
fpharmacy_servicesview.lists["x_status"] = <?php echo $pharmacy_services_view->status->Lookup->toClientList() ?>;
fpharmacy_servicesview.lists["x_status"].options = <?php echo JsonEncode($pharmacy_services_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_services->isExport()) { ?>
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
<?php if ($pharmacy_services_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_services_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_services_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_services->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_id"><?php echo $pharmacy_services->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_services->id->cellAttributes() ?>>
<span id="el_pharmacy_services_id">
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<?php echo $pharmacy_services->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
	<tr id="r_pharmacy_id">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_pharmacy_id"><?php echo $pharmacy_services->pharmacy_id->caption() ?></span></td>
		<td data-name="pharmacy_id"<?php echo $pharmacy_services->pharmacy_id->cellAttributes() ?>>
<span id="el_pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<?php echo $pharmacy_services->pharmacy_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_patient_id"><?php echo $pharmacy_services->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $pharmacy_services->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<?php echo $pharmacy_services->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_name"><?php echo $pharmacy_services->name->caption() ?></span></td>
		<td data-name="name"<?php echo $pharmacy_services->name->cellAttributes() ?>>
<span id="el_pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<?php echo $pharmacy_services->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_amount"><?php echo $pharmacy_services->amount->caption() ?></span></td>
		<td data-name="amount"<?php echo $pharmacy_services->amount->cellAttributes() ?>>
<span id="el_pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<?php echo $pharmacy_services->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_description"><?php echo $pharmacy_services->description->caption() ?></span></td>
		<td data-name="description"<?php echo $pharmacy_services->description->cellAttributes() ?>>
<span id="el_pharmacy_services_description">
<span<?php echo $pharmacy_services->description->viewAttributes() ?>>
<?php echo $pharmacy_services->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_charged_date"><?php echo $pharmacy_services->charged_date->caption() ?></span></td>
		<td data-name="charged_date"<?php echo $pharmacy_services->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_services_charged_date">
<span<?php echo $pharmacy_services->charged_date->viewAttributes() ?>>
<?php echo $pharmacy_services->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_status"><?php echo $pharmacy_services->status->caption() ?></span></td>
		<td data-name="status"<?php echo $pharmacy_services->status->cellAttributes() ?>>
<span id="el_pharmacy_services_status">
<span<?php echo $pharmacy_services->status->viewAttributes() ?>>
<?php echo $pharmacy_services->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_createdby"><?php echo $pharmacy_services->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $pharmacy_services->createdby->cellAttributes() ?>>
<span id="el_pharmacy_services_createdby">
<span<?php echo $pharmacy_services->createdby->viewAttributes() ?>>
<?php echo $pharmacy_services->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_createddatetime"><?php echo $pharmacy_services->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_services->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_services_createddatetime">
<span<?php echo $pharmacy_services->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_services->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_modifiedby"><?php echo $pharmacy_services->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_services->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_services_modifiedby">
<span<?php echo $pharmacy_services->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_services->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_services_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_services_modifieddatetime"><?php echo $pharmacy_services->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_services->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_services_modifieddatetime">
<span<?php echo $pharmacy_services->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_services->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_services_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_services_view->terminate();
?>