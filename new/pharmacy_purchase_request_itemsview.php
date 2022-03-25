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
$pharmacy_purchase_request_items_view = new pharmacy_purchase_request_items_view();

// Run the page
$pharmacy_purchase_request_items_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_purchase_request_items_view->isExport()) { ?>
<script>
var fpharmacy_purchase_request_itemsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_purchase_request_itemsview = currentForm = new ew.Form("fpharmacy_purchase_request_itemsview", "view");
	loadjs.done("fpharmacy_purchase_request_itemsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_purchase_request_items_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_purchase_request_items_view->ExportOptions->render("body") ?>
<?php $pharmacy_purchase_request_items_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_purchase_request_items_view->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_view->showMessage();
?>
<form name="fpharmacy_purchase_request_itemsview" id="fpharmacy_purchase_request_itemsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_items_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_purchase_request_items_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_id"><?php echo $pharmacy_purchase_request_items_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_purchase_request_items_view->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items_view->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_PRC"><?php echo $pharmacy_purchase_request_items_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $pharmacy_purchase_request_items_view->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items_view->PRC->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_PrName"><?php echo $pharmacy_purchase_request_items_view->PrName->caption() ?></span></td>
		<td data-name="PrName" <?php echo $pharmacy_purchase_request_items_view->PrName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items_view->PrName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_Quantity"><?php echo $pharmacy_purchase_request_items_view->Quantity->caption() ?></span></td>
		<td data-name="Quantity" <?php echo $pharmacy_purchase_request_items_view->Quantity->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items_view->Quantity->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_ApprovedStatus"><?php echo $pharmacy_purchase_request_items_view->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus" <?php echo $pharmacy_purchase_request_items_view->ApprovedStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request_items_view->ApprovedStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_PurchaseStatus"><?php echo $pharmacy_purchase_request_items_view->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus" <?php echo $pharmacy_purchase_request_items_view->PurchaseStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request_items_view->PurchaseStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_HospID"><?php echo $pharmacy_purchase_request_items_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $pharmacy_purchase_request_items_view->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items_view->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_createdby"><?php echo $pharmacy_purchase_request_items_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $pharmacy_purchase_request_items_view->createdby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items_view->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_createddatetime"><?php echo $pharmacy_purchase_request_items_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_purchase_request_items_view->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_modifiedby"><?php echo $pharmacy_purchase_request_items_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_purchase_request_items_view->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_modifieddatetime"><?php echo $pharmacy_purchase_request_items_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_purchase_request_items_view->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_BRCODE"><?php echo $pharmacy_purchase_request_items_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_purchase_request_items_view->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_view->prid->Visible) { // prid ?>
	<tr id="r_prid">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_prid"><?php echo $pharmacy_purchase_request_items_view->prid->caption() ?></span></td>
		<td data-name="prid" <?php echo $pharmacy_purchase_request_items_view->prid->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_view->prid->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_view->prid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_purchase_request_items_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request_items_view->isExport()) { ?>
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
$pharmacy_purchase_request_items_view->terminate();
?>