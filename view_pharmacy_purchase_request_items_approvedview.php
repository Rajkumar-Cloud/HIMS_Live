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
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_purchase_request_items_approved->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_pharmacy_purchase_request_items_approvedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_approvedview", "view");

// Form_CustomValidate event
fview_pharmacy_purchase_request_items_approvedview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_items_approvedview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_items_approvedview.lists["x_ApprovedStatus"] = <?php echo $view_pharmacy_purchase_request_items_approved_view->ApprovedStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_items_approvedview.lists["x_ApprovedStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_approved_view->ApprovedStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_approved->isExport()) { ?>
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
<?php if ($view_pharmacy_purchase_request_items_approved_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_items_approved_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacy_purchase_request_items_approved->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_id"><?php echo $view_pharmacy_purchase_request_items_approved->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_items_approved->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_id">
<span<?php echo $view_pharmacy_purchase_request_items_approved->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PRC"><?php echo $view_pharmacy_purchase_request_items_approved->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_pharmacy_purchase_request_items_approved->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PrName"><?php echo $view_pharmacy_purchase_request_items_approved->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $view_pharmacy_purchase_request_items_approved->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_Quantity"><?php echo $view_pharmacy_purchase_request_items_approved->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PurchaseStatus"><?php echo $view_pharmacy_purchase_request_items_approved->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_approved->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_HospID"><?php echo $view_pharmacy_purchase_request_items_approved->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_pharmacy_purchase_request_items_approved->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_HospID">
<span<?php echo $view_pharmacy_purchase_request_items_approved->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_createdby"><?php echo $view_pharmacy_purchase_request_items_approved->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $view_pharmacy_purchase_request_items_approved->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_createdby">
<span<?php echo $view_pharmacy_purchase_request_items_approved->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_createddatetime"><?php echo $view_pharmacy_purchase_request_items_approved->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $view_pharmacy_purchase_request_items_approved->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_approved->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_modifiedby"><?php echo $view_pharmacy_purchase_request_items_approved->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $view_pharmacy_purchase_request_items_approved->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_items_approved->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_modifieddatetime"><?php echo $view_pharmacy_purchase_request_items_approved->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_purchase_request_items_approved->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_items_approved->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_BRCODE"><?php echo $view_pharmacy_purchase_request_items_approved->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_pharmacy_purchase_request_items_approved->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_items_approved->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->prid->Visible) { // prid ?>
	<tr id="r_prid">
		<td class="<?php echo $view_pharmacy_purchase_request_items_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_prid"><?php echo $view_pharmacy_purchase_request_items_approved->prid->caption() ?></span></td>
		<td data-name="prid"<?php echo $view_pharmacy_purchase_request_items_approved->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_approved_prid">
<span<?php echo $view_pharmacy_purchase_request_items_approved->prid->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->prid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacy_purchase_request_items_approved_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_items_approved->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_items_approved_view->terminate();
?>