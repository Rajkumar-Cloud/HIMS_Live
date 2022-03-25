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
$view_pharmacy_purchase_request_items_approved_view = new view_pharmacy_purchase_request_items_approved_view();

// Run the page
$view_pharmacy_purchase_request_items_approved_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_approved_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_purchase_request_items_approved_view->isExport()) { ?>
<script>
var fview_pharmacy_purchase_request_items_approvedview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_pharmacy_purchase_request_items_approvedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_approvedview", "view");
	loadjs.done("fview_pharmacy_purchase_request_items_approvedview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_approved_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_pharmacy_purchase_request_items_approved_view->ExportOptions->render("body") ?>
<?php $view_pharmacy_purchase_request_items_approved_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_pharmacy_purchase_request_items_approved_view->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_approved_view->showMessage();
?>
<form name="fview_pharmacy_purchase_request_items_approvedview" id="fview_pharmacy_purchase_request_items_approvedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_items_approved_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacy_purchase_request_items_approved_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_id"><?php echo $view_pharmacy_purchase_request_items_approved_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $view_pharmacy_purchase_request_items_approved_view->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_id">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PRC"><?php echo $view_pharmacy_purchase_request_items_approved_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $view_pharmacy_purchase_request_items_approved_view->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->PRC->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PrName"><?php echo $view_pharmacy_purchase_request_items_approved_view->PrName->caption() ?></span></td>
		<td data-name="PrName" <?php echo $view_pharmacy_purchase_request_items_approved_view->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->PrName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_Quantity"><?php echo $view_pharmacy_purchase_request_items_approved_view->Quantity->caption() ?></span></td>
		<td data-name="Quantity" <?php echo $view_pharmacy_purchase_request_items_approved_view->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_items_approved_view->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus" <?php echo $view_pharmacy_purchase_request_items_approved_view->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PurchaseStatus"><?php echo $view_pharmacy_purchase_request_items_approved_view->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus" <?php echo $view_pharmacy_purchase_request_items_approved_view->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_HospID"><?php echo $view_pharmacy_purchase_request_items_approved_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $view_pharmacy_purchase_request_items_approved_view->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_HospID">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->HospID->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_createdby"><?php echo $view_pharmacy_purchase_request_items_approved_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $view_pharmacy_purchase_request_items_approved_view->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_createdby">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->createdby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_createddatetime"><?php echo $view_pharmacy_purchase_request_items_approved_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $view_pharmacy_purchase_request_items_approved_view->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_modifiedby"><?php echo $view_pharmacy_purchase_request_items_approved_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $view_pharmacy_purchase_request_items_approved_view->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_modifieddatetime"><?php echo $view_pharmacy_purchase_request_items_approved_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_purchase_request_items_approved_view->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_BRCODE"><?php echo $view_pharmacy_purchase_request_items_approved_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $view_pharmacy_purchase_request_items_approved_view->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_view->prid->Visible) { // prid ?>
	<tr id="r_prid">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_prid"><?php echo $view_pharmacy_purchase_request_items_approved_view->prid->caption() ?></span></td>
		<td data-name="prid" <?php echo $view_pharmacy_purchase_request_items_approved_view->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_prid">
<span<?php echo $view_pharmacy_purchase_request_items_approved_view->prid->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_view->prid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacy_purchase_request_items_approved_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_items_approved_view->isExport()) { ?>
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
$view_pharmacy_purchase_request_items_approved_view->terminate();
?>