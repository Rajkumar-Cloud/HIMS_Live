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
$pharmacy_stock_movement_view = new pharmacy_stock_movement_view();

// Run the page
$pharmacy_stock_movement_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_stock_movement_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_stock_movementview = currentForm = new ew.Form("fpharmacy_stock_movementview", "view");

// Form_CustomValidate event
fpharmacy_stock_movementview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_stock_movementview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_stock_movement_view->ExportOptions->render("body") ?>
<?php $pharmacy_stock_movement_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_stock_movement_view->showPageHeader(); ?>
<?php
$pharmacy_stock_movement_view->showMessage();
?>
<form name="fpharmacy_stock_movementview" id="fpharmacy_stock_movementview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_stock_movement_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_stock_movement_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_stock_movement">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_stock_movement_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_stock_movement->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_id"><?php echo $pharmacy_stock_movement->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_stock_movement->id->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_id">
<span<?php echo $pharmacy_stock_movement->id->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PRC"><?php echo $pharmacy_stock_movement->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $pharmacy_stock_movement->PRC->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PRC">
<span<?php echo $pharmacy_stock_movement->PRC->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PrName"><?php echo $pharmacy_stock_movement->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $pharmacy_stock_movement->PrName->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PrName">
<span<?php echo $pharmacy_stock_movement->PrName->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
	<tr id="r_BATCHNO">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_BATCHNO"><?php echo $pharmacy_stock_movement->BATCHNO->caption() ?></span></td>
		<td data-name="BATCHNO"<?php echo $pharmacy_stock_movement->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BATCHNO">
<span<?php echo $pharmacy_stock_movement->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BATCHNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
	<tr id="r_OpeningStk">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_OpeningStk"><?php echo $pharmacy_stock_movement->OpeningStk->caption() ?></span></td>
		<td data-name="OpeningStk"<?php echo $pharmacy_stock_movement->OpeningStk->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OpeningStk">
<span<?php echo $pharmacy_stock_movement->OpeningStk->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OpeningStk->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
	<tr id="r_PurchaseQty">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PurchaseQty"><?php echo $pharmacy_stock_movement->PurchaseQty->caption() ?></span></td>
		<td data-name="PurchaseQty"<?php echo $pharmacy_stock_movement->PurchaseQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PurchaseQty">
<span<?php echo $pharmacy_stock_movement->PurchaseQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PurchaseQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
	<tr id="r_SalesQty">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_SalesQty"><?php echo $pharmacy_stock_movement->SalesQty->caption() ?></span></td>
		<td data-name="SalesQty"<?php echo $pharmacy_stock_movement->SalesQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_SalesQty">
<span<?php echo $pharmacy_stock_movement->SalesQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SalesQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
	<tr id="r_ClosingStk">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_ClosingStk"><?php echo $pharmacy_stock_movement->ClosingStk->caption() ?></span></td>
		<td data-name="ClosingStk"<?php echo $pharmacy_stock_movement->ClosingStk->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_ClosingStk">
<span<?php echo $pharmacy_stock_movement->ClosingStk->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->ClosingStk->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
	<tr id="r_PurchasefreeQty">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PurchasefreeQty"><?php echo $pharmacy_stock_movement->PurchasefreeQty->caption() ?></span></td>
		<td data-name="PurchasefreeQty"<?php echo $pharmacy_stock_movement->PurchasefreeQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PurchasefreeQty">
<span<?php echo $pharmacy_stock_movement->PurchasefreeQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PurchasefreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
	<tr id="r_TransferingQty">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_TransferingQty"><?php echo $pharmacy_stock_movement->TransferingQty->caption() ?></span></td>
		<td data-name="TransferingQty"<?php echo $pharmacy_stock_movement->TransferingQty->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_TransferingQty">
<span<?php echo $pharmacy_stock_movement->TransferingQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TransferingQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
	<tr id="r_UnitPurchaseRate">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_UnitPurchaseRate"><?php echo $pharmacy_stock_movement->UnitPurchaseRate->caption() ?></span></td>
		<td data-name="UnitPurchaseRate"<?php echo $pharmacy_stock_movement->UnitPurchaseRate->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UnitPurchaseRate">
<span<?php echo $pharmacy_stock_movement->UnitPurchaseRate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UnitPurchaseRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
	<tr id="r_UnitSaleRate">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_UnitSaleRate"><?php echo $pharmacy_stock_movement->UnitSaleRate->caption() ?></span></td>
		<td data-name="UnitSaleRate"<?php echo $pharmacy_stock_movement->UnitSaleRate->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UnitSaleRate">
<span<?php echo $pharmacy_stock_movement->UnitSaleRate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UnitSaleRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
	<tr id="r_CreatedDate">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_CreatedDate"><?php echo $pharmacy_stock_movement->CreatedDate->caption() ?></span></td>
		<td data-name="CreatedDate"<?php echo $pharmacy_stock_movement->CreatedDate->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_CreatedDate">
<span<?php echo $pharmacy_stock_movement->CreatedDate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->CreatedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->OQ->Visible) { // OQ ?>
	<tr id="r_OQ">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_OQ"><?php echo $pharmacy_stock_movement->OQ->caption() ?></span></td>
		<td data-name="OQ"<?php echo $pharmacy_stock_movement->OQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OQ">
<span<?php echo $pharmacy_stock_movement->OQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->RQ->Visible) { // RQ ?>
	<tr id="r_RQ">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_RQ"><?php echo $pharmacy_stock_movement->RQ->caption() ?></span></td>
		<td data-name="RQ"<?php echo $pharmacy_stock_movement->RQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_RQ">
<span<?php echo $pharmacy_stock_movement->RQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->RQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRQ->Visible) { // MRQ ?>
	<tr id="r_MRQ">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_MRQ"><?php echo $pharmacy_stock_movement->MRQ->caption() ?></span></td>
		<td data-name="MRQ"<?php echo $pharmacy_stock_movement->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_MRQ">
<span<?php echo $pharmacy_stock_movement->MRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->IQ->Visible) { // IQ ?>
	<tr id="r_IQ">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_IQ"><?php echo $pharmacy_stock_movement->IQ->caption() ?></span></td>
		<td data-name="IQ"<?php echo $pharmacy_stock_movement->IQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_IQ">
<span<?php echo $pharmacy_stock_movement->IQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->IQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_MRP"><?php echo $pharmacy_stock_movement->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $pharmacy_stock_movement->MRP->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_MRP">
<span<?php echo $pharmacy_stock_movement->MRP->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->EXPDT->Visible) { // EXPDT ?>
	<tr id="r_EXPDT">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_EXPDT"><?php echo $pharmacy_stock_movement->EXPDT->caption() ?></span></td>
		<td data-name="EXPDT"<?php echo $pharmacy_stock_movement->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_EXPDT">
<span<?php echo $pharmacy_stock_movement->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->EXPDT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->UR->Visible) { // UR ?>
	<tr id="r_UR">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_UR"><?php echo $pharmacy_stock_movement->UR->caption() ?></span></td>
		<td data-name="UR"<?php echo $pharmacy_stock_movement->UR->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UR">
<span<?php echo $pharmacy_stock_movement->UR->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UR->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->RT->Visible) { // RT ?>
	<tr id="r_RT">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_RT"><?php echo $pharmacy_stock_movement->RT->caption() ?></span></td>
		<td data-name="RT"<?php echo $pharmacy_stock_movement->RT->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_RT">
<span<?php echo $pharmacy_stock_movement->RT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->RT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRCODE->Visible) { // PRCODE ?>
	<tr id="r_PRCODE">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PRCODE"><?php echo $pharmacy_stock_movement->PRCODE->caption() ?></span></td>
		<td data-name="PRCODE"<?php echo $pharmacy_stock_movement->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PRCODE">
<span<?php echo $pharmacy_stock_movement->PRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCH->Visible) { // BATCH ?>
	<tr id="r_BATCH">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_BATCH"><?php echo $pharmacy_stock_movement->BATCH->caption() ?></span></td>
		<td data-name="BATCH"<?php echo $pharmacy_stock_movement->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BATCH">
<span<?php echo $pharmacy_stock_movement->BATCH->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BATCH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PC"><?php echo $pharmacy_stock_movement->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $pharmacy_stock_movement->PC->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PC">
<span<?php echo $pharmacy_stock_movement->PC->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRT->Visible) { // OLDRT ?>
	<tr id="r_OLDRT">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_OLDRT"><?php echo $pharmacy_stock_movement->OLDRT->caption() ?></span></td>
		<td data-name="OLDRT"<?php echo $pharmacy_stock_movement->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OLDRT">
<span<?php echo $pharmacy_stock_movement->OLDRT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OLDRT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->TEMPMRQ->Visible) { // TEMPMRQ ?>
	<tr id="r_TEMPMRQ">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_TEMPMRQ"><?php echo $pharmacy_stock_movement->TEMPMRQ->caption() ?></span></td>
		<td data-name="TEMPMRQ"<?php echo $pharmacy_stock_movement->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_TEMPMRQ">
<span<?php echo $pharmacy_stock_movement->TEMPMRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->TAXP->Visible) { // TAXP ?>
	<tr id="r_TAXP">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_TAXP"><?php echo $pharmacy_stock_movement->TAXP->caption() ?></span></td>
		<td data-name="TAXP"<?php echo $pharmacy_stock_movement->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_TAXP">
<span<?php echo $pharmacy_stock_movement->TAXP->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TAXP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRATE->Visible) { // OLDRATE ?>
	<tr id="r_OLDRATE">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_OLDRATE"><?php echo $pharmacy_stock_movement->OLDRATE->caption() ?></span></td>
		<td data-name="OLDRATE"<?php echo $pharmacy_stock_movement->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OLDRATE">
<span<?php echo $pharmacy_stock_movement->OLDRATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OLDRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->NEWRATE->Visible) { // NEWRATE ?>
	<tr id="r_NEWRATE">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_NEWRATE"><?php echo $pharmacy_stock_movement->NEWRATE->caption() ?></span></td>
		<td data-name="NEWRATE"<?php echo $pharmacy_stock_movement->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_NEWRATE">
<span<?php echo $pharmacy_stock_movement->NEWRATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->NEWRATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->OTEMPMRA->Visible) { // OTEMPMRA ?>
	<tr id="r_OTEMPMRA">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_OTEMPMRA"><?php echo $pharmacy_stock_movement->OTEMPMRA->caption() ?></span></td>
		<td data-name="OTEMPMRA"<?php echo $pharmacy_stock_movement->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_OTEMPMRA">
<span<?php echo $pharmacy_stock_movement->OTEMPMRA->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
	<tr id="r_ACTIVESTATUS">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_ACTIVESTATUS"><?php echo $pharmacy_stock_movement->ACTIVESTATUS->caption() ?></span></td>
		<td data-name="ACTIVESTATUS"<?php echo $pharmacy_stock_movement->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_ACTIVESTATUS">
<span<?php echo $pharmacy_stock_movement->ACTIVESTATUS->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PSGST"><?php echo $pharmacy_stock_movement->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $pharmacy_stock_movement->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PSGST">
<span<?php echo $pharmacy_stock_movement->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_PCGST"><?php echo $pharmacy_stock_movement->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $pharmacy_stock_movement->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_PCGST">
<span<?php echo $pharmacy_stock_movement->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_SSGST"><?php echo $pharmacy_stock_movement->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $pharmacy_stock_movement->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_SSGST">
<span<?php echo $pharmacy_stock_movement->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_SCGST"><?php echo $pharmacy_stock_movement->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $pharmacy_stock_movement->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_SCGST">
<span<?php echo $pharmacy_stock_movement->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_MFRCODE"><?php echo $pharmacy_stock_movement->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $pharmacy_stock_movement->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_MFRCODE">
<span<?php echo $pharmacy_stock_movement->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_BRCODE"><?php echo $pharmacy_stock_movement->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_stock_movement->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BRCODE">
<span<?php echo $pharmacy_stock_movement->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->FRQ->Visible) { // FRQ ?>
	<tr id="r_FRQ">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_FRQ"><?php echo $pharmacy_stock_movement->FRQ->caption() ?></span></td>
		<td data-name="FRQ"<?php echo $pharmacy_stock_movement->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_FRQ">
<span<?php echo $pharmacy_stock_movement->FRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->FRQ->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_HospID"><?php echo $pharmacy_stock_movement->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $pharmacy_stock_movement->HospID->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_HospID">
<span<?php echo $pharmacy_stock_movement->HospID->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->UM->Visible) { // UM ?>
	<tr id="r_UM">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_UM"><?php echo $pharmacy_stock_movement->UM->caption() ?></span></td>
		<td data-name="UM"<?php echo $pharmacy_stock_movement->UM->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_UM">
<span<?php echo $pharmacy_stock_movement->UM->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_GENNAME"><?php echo $pharmacy_stock_movement->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME"<?php echo $pharmacy_stock_movement->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_GENNAME">
<span<?php echo $pharmacy_stock_movement->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->BILLDATE->Visible) { // BILLDATE ?>
	<tr id="r_BILLDATE">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_BILLDATE"><?php echo $pharmacy_stock_movement->BILLDATE->caption() ?></span></td>
		<td data-name="BILLDATE"<?php echo $pharmacy_stock_movement->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_BILLDATE">
<span<?php echo $pharmacy_stock_movement->BILLDATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BILLDATE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_CreatedDateTime"><?php echo $pharmacy_stock_movement->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $pharmacy_stock_movement->CreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_CreatedDateTime">
<span<?php echo $pharmacy_stock_movement->CreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_stock_movement->baid->Visible) { // baid ?>
	<tr id="r_baid">
		<td class="<?php echo $pharmacy_stock_movement_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_stock_movement_baid"><?php echo $pharmacy_stock_movement->baid->caption() ?></span></td>
		<td data-name="baid"<?php echo $pharmacy_stock_movement->baid->cellAttributes() ?>>
<span id="el_pharmacy_stock_movement_baid">
<span<?php echo $pharmacy_stock_movement->baid->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->baid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_stock_movement_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_stock_movement->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_stock_movement_view->terminate();
?>