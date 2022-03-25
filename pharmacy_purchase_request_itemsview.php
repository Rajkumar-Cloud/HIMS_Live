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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_purchase_request_itemsview = currentForm = new ew.Form("fpharmacy_purchase_request_itemsview", "view");

// Form_CustomValidate event
fpharmacy_purchase_request_itemsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchase_request_itemsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchase_request_itemsview.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_view->PrName->Lookup->toClientList() ?>;
fpharmacy_purchase_request_itemsview.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_view->PrName->lookupOptions()) ?>;
fpharmacy_purchase_request_itemsview.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
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
<?php if ($pharmacy_purchase_request_items_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchase_request_items_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_items_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_id"><?php echo $pharmacy_purchase_request_items->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_purchase_request_items->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_PRC"><?php echo $pharmacy_purchase_request_items->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $pharmacy_purchase_request_items->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_PrName"><?php echo $pharmacy_purchase_request_items->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $pharmacy_purchase_request_items->PrName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items->PrName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_Quantity"><?php echo $pharmacy_purchase_request_items->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $pharmacy_purchase_request_items->Quantity->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items->Quantity->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_ApprovedStatus"><?php echo $pharmacy_purchase_request_items->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus"<?php echo $pharmacy_purchase_request_items->ApprovedStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request_items->ApprovedStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_PurchaseStatus"><?php echo $pharmacy_purchase_request_items->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus"<?php echo $pharmacy_purchase_request_items->PurchaseStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request_items->PurchaseStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_HospID"><?php echo $pharmacy_purchase_request_items->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $pharmacy_purchase_request_items->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_createdby"><?php echo $pharmacy_purchase_request_items->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $pharmacy_purchase_request_items->createdby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_createddatetime"><?php echo $pharmacy_purchase_request_items->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_purchase_request_items->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_modifiedby"><?php echo $pharmacy_purchase_request_items->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_purchase_request_items->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_modifieddatetime"><?php echo $pharmacy_purchase_request_items->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_purchase_request_items->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_BRCODE"><?php echo $pharmacy_purchase_request_items->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_purchase_request_items->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
	<tr id="r_prid">
		<td class="<?php echo $pharmacy_purchase_request_items_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_items_prid"><?php echo $pharmacy_purchase_request_items->prid->caption() ?></span></td>
		<td data-name="prid"<?php echo $pharmacy_purchase_request_items->prid->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->prid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_purchase_request_items_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchase_request_items_view->terminate();
?>