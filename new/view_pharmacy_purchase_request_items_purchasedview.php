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
$view_pharmacy_purchase_request_items_purchased_view = new view_pharmacy_purchase_request_items_purchased_view();

// Run the page
$view_pharmacy_purchase_request_items_purchased_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_purchased_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased_view->isExport()) { ?>
<script>
var fview_pharmacy_purchase_request_items_purchasedview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_pharmacy_purchase_request_items_purchasedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasedview", "view");
	loadjs.done("fview_pharmacy_purchase_request_items_purchasedview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_pharmacy_purchase_request_items_purchased_view->ExportOptions->render("body") ?>
<?php $view_pharmacy_purchase_request_items_purchased_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_pharmacy_purchase_request_items_purchased_view->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_purchased_view->showMessage();
?>
<form name="fview_pharmacy_purchase_request_items_purchasedview" id="fview_pharmacy_purchase_request_items_purchasedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_items_purchased_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacy_purchase_request_items_purchased_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_id"><?php echo $view_pharmacy_purchase_request_items_purchased_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $view_pharmacy_purchase_request_items_purchased_view->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PRC"><?php echo $view_pharmacy_purchase_request_items_purchased_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $view_pharmacy_purchase_request_items_purchased_view->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->PRC->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PrName"><?php echo $view_pharmacy_purchase_request_items_purchased_view->PrName->caption() ?></span></td>
		<td data-name="PrName" <?php echo $view_pharmacy_purchase_request_items_purchased_view->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->PrName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_Quantity"><?php echo $view_pharmacy_purchase_request_items_purchased_view->Quantity->caption() ?></span></td>
		<td data-name="Quantity" <?php echo $view_pharmacy_purchase_request_items_purchased_view->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_items_purchased_view->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus" <?php echo $view_pharmacy_purchase_request_items_purchased_view->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><?php echo $view_pharmacy_purchase_request_items_purchased_view->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus" <?php echo $view_pharmacy_purchase_request_items_purchased_view->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_HospID"><?php echo $view_pharmacy_purchase_request_items_purchased_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $view_pharmacy_purchase_request_items_purchased_view->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->HospID->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_createdby"><?php echo $view_pharmacy_purchase_request_items_purchased_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $view_pharmacy_purchase_request_items_purchased_view->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->createdby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_createddatetime"><?php echo $view_pharmacy_purchase_request_items_purchased_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $view_pharmacy_purchase_request_items_purchased_view->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_modifiedby"><?php echo $view_pharmacy_purchase_request_items_purchased_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $view_pharmacy_purchase_request_items_purchased_view->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_modifieddatetime"><?php echo $view_pharmacy_purchase_request_items_purchased_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_purchase_request_items_purchased_view->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_BRCODE"><?php echo $view_pharmacy_purchase_request_items_purchased_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $view_pharmacy_purchase_request_items_purchased_view->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_view->prid->Visible) { // prid ?>
	<tr id="r_prid">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_prid"><?php echo $view_pharmacy_purchase_request_items_purchased_view->prid->caption() ?></span></td>
		<td data-name="prid" <?php echo $view_pharmacy_purchase_request_items_purchased_view->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_prid">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_view->prid->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_view->prid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacy_purchase_request_items_purchased_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_items_purchased_view->isExport()) { ?>
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
$view_pharmacy_purchase_request_items_purchased_view->terminate();
?>