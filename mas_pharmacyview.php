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
$mas_pharmacy_view = new mas_pharmacy_view();

// Run the page
$mas_pharmacy_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_pharmacy_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_pharmacy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_pharmacyview = currentForm = new ew.Form("fmas_pharmacyview", "view");

// Form_CustomValidate event
fmas_pharmacyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_pharmacyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_pharmacyview.lists["x_status"] = <?php echo $mas_pharmacy_view->status->Lookup->toClientList() ?>;
fmas_pharmacyview.lists["x_status"].options = <?php echo JsonEncode($mas_pharmacy_view->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_pharmacy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_pharmacy_view->ExportOptions->render("body") ?>
<?php $mas_pharmacy_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_pharmacy_view->showPageHeader(); ?>
<?php
$mas_pharmacy_view->showMessage();
?>
<form name="fmas_pharmacyview" id="fmas_pharmacyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_pharmacy_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_pharmacy_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_pharmacy">
<input type="hidden" name="modal" value="<?php echo (int)$mas_pharmacy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_pharmacy->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_id"><?php echo $mas_pharmacy->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_pharmacy->id->cellAttributes() ?>>
<span id="el_mas_pharmacy_id">
<span<?php echo $mas_pharmacy->id->viewAttributes() ?>>
<?php echo $mas_pharmacy->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_name"><?php echo $mas_pharmacy->name->caption() ?></span></td>
		<td data-name="name"<?php echo $mas_pharmacy->name->cellAttributes() ?>>
<span id="el_mas_pharmacy_name">
<span<?php echo $mas_pharmacy->name->viewAttributes() ?>>
<?php echo $mas_pharmacy->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_amount"><?php echo $mas_pharmacy->amount->caption() ?></span></td>
		<td data-name="amount"<?php echo $mas_pharmacy->amount->cellAttributes() ?>>
<span id="el_mas_pharmacy_amount">
<span<?php echo $mas_pharmacy->amount->viewAttributes() ?>>
<?php echo $mas_pharmacy->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_description"><?php echo $mas_pharmacy->description->caption() ?></span></td>
		<td data-name="description"<?php echo $mas_pharmacy->description->cellAttributes() ?>>
<span id="el_mas_pharmacy_description">
<span<?php echo $mas_pharmacy->description->viewAttributes() ?>>
<?php echo $mas_pharmacy->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_charged_date"><?php echo $mas_pharmacy->charged_date->caption() ?></span></td>
		<td data-name="charged_date"<?php echo $mas_pharmacy->charged_date->cellAttributes() ?>>
<span id="el_mas_pharmacy_charged_date">
<span<?php echo $mas_pharmacy->charged_date->viewAttributes() ?>>
<?php echo $mas_pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_status"><?php echo $mas_pharmacy->status->caption() ?></span></td>
		<td data-name="status"<?php echo $mas_pharmacy->status->cellAttributes() ?>>
<span id="el_mas_pharmacy_status">
<span<?php echo $mas_pharmacy->status->viewAttributes() ?>>
<?php echo $mas_pharmacy->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_createdby"><?php echo $mas_pharmacy->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $mas_pharmacy->createdby->cellAttributes() ?>>
<span id="el_mas_pharmacy_createdby">
<span<?php echo $mas_pharmacy->createdby->viewAttributes() ?>>
<?php echo $mas_pharmacy->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_createddatetime"><?php echo $mas_pharmacy->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $mas_pharmacy->createddatetime->cellAttributes() ?>>
<span id="el_mas_pharmacy_createddatetime">
<span<?php echo $mas_pharmacy->createddatetime->viewAttributes() ?>>
<?php echo $mas_pharmacy->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_modifiedby"><?php echo $mas_pharmacy->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $mas_pharmacy->modifiedby->cellAttributes() ?>>
<span id="el_mas_pharmacy_modifiedby">
<span<?php echo $mas_pharmacy->modifiedby->viewAttributes() ?>>
<?php echo $mas_pharmacy->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_modifieddatetime"><?php echo $mas_pharmacy->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $mas_pharmacy->modifieddatetime->cellAttributes() ?>>
<span id="el_mas_pharmacy_modifieddatetime">
<span<?php echo $mas_pharmacy->modifieddatetime->viewAttributes() ?>>
<?php echo $mas_pharmacy->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_services", explode(",", $mas_pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailView) {
?>
<?php if ($mas_pharmacy->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_servicesgrid.php" ?>
<?php } ?>
</form>
<?php
$mas_pharmacy_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_pharmacy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_pharmacy_view->terminate();
?>