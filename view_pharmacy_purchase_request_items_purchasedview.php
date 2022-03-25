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
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_pharmacy_purchase_request_items_purchasedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasedview", "view");

// Form_CustomValidate event
fview_pharmacy_purchase_request_items_purchasedview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_items_purchasedview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_items_purchasedview.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_items_purchased_view->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_items_purchasedview.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_purchased_view->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
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
<?php if ($view_pharmacy_purchase_request_items_purchased_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_items_purchased_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_id"><?php echo $view_pharmacy_purchase_request_items_purchased->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_items_purchased->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PRC"><?php echo $view_pharmacy_purchase_request_items_purchased->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PrName"><?php echo $view_pharmacy_purchase_request_items_purchased->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_Quantity"><?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_HospID"><?php echo $view_pharmacy_purchase_request_items_purchased->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_pharmacy_purchase_request_items_purchased->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_createdby"><?php echo $view_pharmacy_purchase_request_items_purchased->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $view_pharmacy_purchase_request_items_purchased->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_createddatetime"><?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_modifiedby"><?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_modifieddatetime"><?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_BRCODE"><?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->prid->Visible) { // prid ?>
	<tr id="r_prid">
		<td class="<?php echo $view_pharmacy_purchase_request_items_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_prid"><?php echo $view_pharmacy_purchase_request_items_purchased->prid->caption() ?></span></td>
		<td data-name="prid"<?php echo $view_pharmacy_purchase_request_items_purchased->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_prid">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->prid->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->prid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacy_purchase_request_items_purchased_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_items_purchased_view->terminate();
?>