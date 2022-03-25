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
<?php include_once "header.php"; ?>
<?php if (!$mas_pharmacy_view->isExport()) { ?>
<script>
var fmas_pharmacyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_pharmacyview = currentForm = new ew.Form("fmas_pharmacyview", "view");
	loadjs.done("fmas_pharmacyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_pharmacy_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_pharmacy">
<input type="hidden" name="modal" value="<?php echo (int)$mas_pharmacy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_pharmacy_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_id"><?php echo $mas_pharmacy_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_pharmacy_view->id->cellAttributes() ?>>
<span id="el_mas_pharmacy_id">
<span<?php echo $mas_pharmacy_view->id->viewAttributes() ?>><?php echo $mas_pharmacy_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_name"><?php echo $mas_pharmacy_view->name->caption() ?></span></td>
		<td data-name="name" <?php echo $mas_pharmacy_view->name->cellAttributes() ?>>
<span id="el_mas_pharmacy_name">
<span<?php echo $mas_pharmacy_view->name->viewAttributes() ?>><?php echo $mas_pharmacy_view->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_amount"><?php echo $mas_pharmacy_view->amount->caption() ?></span></td>
		<td data-name="amount" <?php echo $mas_pharmacy_view->amount->cellAttributes() ?>>
<span id="el_mas_pharmacy_amount">
<span<?php echo $mas_pharmacy_view->amount->viewAttributes() ?>><?php echo $mas_pharmacy_view->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_description"><?php echo $mas_pharmacy_view->description->caption() ?></span></td>
		<td data-name="description" <?php echo $mas_pharmacy_view->description->cellAttributes() ?>>
<span id="el_mas_pharmacy_description">
<span<?php echo $mas_pharmacy_view->description->viewAttributes() ?>><?php echo $mas_pharmacy_view->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_charged_date"><?php echo $mas_pharmacy_view->charged_date->caption() ?></span></td>
		<td data-name="charged_date" <?php echo $mas_pharmacy_view->charged_date->cellAttributes() ?>>
<span id="el_mas_pharmacy_charged_date">
<span<?php echo $mas_pharmacy_view->charged_date->viewAttributes() ?>><?php echo $mas_pharmacy_view->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_status"><?php echo $mas_pharmacy_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $mas_pharmacy_view->status->cellAttributes() ?>>
<span id="el_mas_pharmacy_status">
<span<?php echo $mas_pharmacy_view->status->viewAttributes() ?>><?php echo $mas_pharmacy_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_createdby"><?php echo $mas_pharmacy_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $mas_pharmacy_view->createdby->cellAttributes() ?>>
<span id="el_mas_pharmacy_createdby">
<span<?php echo $mas_pharmacy_view->createdby->viewAttributes() ?>><?php echo $mas_pharmacy_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_createddatetime"><?php echo $mas_pharmacy_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $mas_pharmacy_view->createddatetime->cellAttributes() ?>>
<span id="el_mas_pharmacy_createddatetime">
<span<?php echo $mas_pharmacy_view->createddatetime->viewAttributes() ?>><?php echo $mas_pharmacy_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_modifiedby"><?php echo $mas_pharmacy_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $mas_pharmacy_view->modifiedby->cellAttributes() ?>>
<span id="el_mas_pharmacy_modifiedby">
<span<?php echo $mas_pharmacy_view->modifiedby->viewAttributes() ?>><?php echo $mas_pharmacy_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_pharmacy_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $mas_pharmacy_view->TableLeftColumnClass ?>"><span id="elh_mas_pharmacy_modifieddatetime"><?php echo $mas_pharmacy_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $mas_pharmacy_view->modifieddatetime->cellAttributes() ?>>
<span id="el_mas_pharmacy_modifieddatetime">
<span<?php echo $mas_pharmacy_view->modifieddatetime->viewAttributes() ?>><?php echo $mas_pharmacy_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_services", explode(",", $mas_pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailView) {
?>
<?php if ($mas_pharmacy->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_servicesgrid.php" ?>
<?php } ?>
</form>
<?php
$mas_pharmacy_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_pharmacy_view->isExport()) { ?>
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
$mas_pharmacy_view->terminate();
?>