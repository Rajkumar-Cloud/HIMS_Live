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
$pharmacy_stock_movement_delete = new pharmacy_stock_movement_delete();

// Run the page
$pharmacy_stock_movement_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_stock_movement_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_stock_movementdelete = currentForm = new ew.Form("fpharmacy_stock_movementdelete", "delete");

// Form_CustomValidate event
fpharmacy_stock_movementdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_stock_movementdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_stock_movement_delete->showPageHeader(); ?>
<?php
$pharmacy_stock_movement_delete->showMessage();
?>
<form name="fpharmacy_stock_movementdelete" id="fpharmacy_stock_movementdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_stock_movement_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_stock_movement_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_stock_movement">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_stock_movement_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_stock_movement->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_stock_movement->id->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id"><?php echo $pharmacy_stock_movement->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_stock_movement->PRC->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC"><?php echo $pharmacy_stock_movement->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PrName->Visible) { // PrName ?>
		<th class="<?php echo $pharmacy_stock_movement->PrName->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName"><?php echo $pharmacy_stock_movement->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $pharmacy_stock_movement->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO"><?php echo $pharmacy_stock_movement->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
		<th class="<?php echo $pharmacy_stock_movement->OpeningStk->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk"><?php echo $pharmacy_stock_movement->OpeningStk->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
		<th class="<?php echo $pharmacy_stock_movement->PurchaseQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty"><?php echo $pharmacy_stock_movement->PurchaseQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
		<th class="<?php echo $pharmacy_stock_movement->SalesQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty"><?php echo $pharmacy_stock_movement->SalesQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
		<th class="<?php echo $pharmacy_stock_movement->ClosingStk->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk"><?php echo $pharmacy_stock_movement->ClosingStk->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
		<th class="<?php echo $pharmacy_stock_movement->PurchasefreeQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty"><?php echo $pharmacy_stock_movement->PurchasefreeQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
		<th class="<?php echo $pharmacy_stock_movement->TransferingQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty"><?php echo $pharmacy_stock_movement->TransferingQty->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
		<th class="<?php echo $pharmacy_stock_movement->UnitPurchaseRate->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate"><?php echo $pharmacy_stock_movement->UnitPurchaseRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
		<th class="<?php echo $pharmacy_stock_movement->UnitSaleRate->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate"><?php echo $pharmacy_stock_movement->UnitSaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
		<th class="<?php echo $pharmacy_stock_movement->CreatedDate->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate"><?php echo $pharmacy_stock_movement->CreatedDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->OQ->Visible) { // OQ ?>
		<th class="<?php echo $pharmacy_stock_movement->OQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ"><?php echo $pharmacy_stock_movement->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->RQ->Visible) { // RQ ?>
		<th class="<?php echo $pharmacy_stock_movement->RQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ"><?php echo $pharmacy_stock_movement->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $pharmacy_stock_movement->MRQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ"><?php echo $pharmacy_stock_movement->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->IQ->Visible) { // IQ ?>
		<th class="<?php echo $pharmacy_stock_movement->IQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ"><?php echo $pharmacy_stock_movement->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRP->Visible) { // MRP ?>
		<th class="<?php echo $pharmacy_stock_movement->MRP->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP"><?php echo $pharmacy_stock_movement->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $pharmacy_stock_movement->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT"><?php echo $pharmacy_stock_movement->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->UR->Visible) { // UR ?>
		<th class="<?php echo $pharmacy_stock_movement->UR->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR"><?php echo $pharmacy_stock_movement->UR->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->RT->Visible) { // RT ?>
		<th class="<?php echo $pharmacy_stock_movement->RT->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT"><?php echo $pharmacy_stock_movement->RT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRCODE->Visible) { // PRCODE ?>
		<th class="<?php echo $pharmacy_stock_movement->PRCODE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE"><?php echo $pharmacy_stock_movement->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCH->Visible) { // BATCH ?>
		<th class="<?php echo $pharmacy_stock_movement->BATCH->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH"><?php echo $pharmacy_stock_movement->BATCH->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PC->Visible) { // PC ?>
		<th class="<?php echo $pharmacy_stock_movement->PC->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC"><?php echo $pharmacy_stock_movement->PC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRT->Visible) { // OLDRT ?>
		<th class="<?php echo $pharmacy_stock_movement->OLDRT->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT"><?php echo $pharmacy_stock_movement->OLDRT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<th class="<?php echo $pharmacy_stock_movement->TEMPMRQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ"><?php echo $pharmacy_stock_movement->TEMPMRQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->TAXP->Visible) { // TAXP ?>
		<th class="<?php echo $pharmacy_stock_movement->TAXP->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP"><?php echo $pharmacy_stock_movement->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRATE->Visible) { // OLDRATE ?>
		<th class="<?php echo $pharmacy_stock_movement->OLDRATE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE"><?php echo $pharmacy_stock_movement->OLDRATE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->NEWRATE->Visible) { // NEWRATE ?>
		<th class="<?php echo $pharmacy_stock_movement->NEWRATE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE"><?php echo $pharmacy_stock_movement->NEWRATE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<th class="<?php echo $pharmacy_stock_movement->OTEMPMRA->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA"><?php echo $pharmacy_stock_movement->OTEMPMRA->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<th class="<?php echo $pharmacy_stock_movement->ACTIVESTATUS->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS"><?php echo $pharmacy_stock_movement->ACTIVESTATUS->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $pharmacy_stock_movement->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST"><?php echo $pharmacy_stock_movement->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $pharmacy_stock_movement->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST"><?php echo $pharmacy_stock_movement->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $pharmacy_stock_movement->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST"><?php echo $pharmacy_stock_movement->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $pharmacy_stock_movement->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST"><?php echo $pharmacy_stock_movement->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $pharmacy_stock_movement->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE"><?php echo $pharmacy_stock_movement->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_stock_movement->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE"><?php echo $pharmacy_stock_movement->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->FRQ->Visible) { // FRQ ?>
		<th class="<?php echo $pharmacy_stock_movement->FRQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ"><?php echo $pharmacy_stock_movement->FRQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_stock_movement->HospID->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID"><?php echo $pharmacy_stock_movement->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->UM->Visible) { // UM ?>
		<th class="<?php echo $pharmacy_stock_movement->UM->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM"><?php echo $pharmacy_stock_movement->UM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $pharmacy_stock_movement->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME"><?php echo $pharmacy_stock_movement->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->BILLDATE->Visible) { // BILLDATE ?>
		<th class="<?php echo $pharmacy_stock_movement->BILLDATE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE"><?php echo $pharmacy_stock_movement->BILLDATE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $pharmacy_stock_movement->CreatedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime"><?php echo $pharmacy_stock_movement->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_stock_movement->baid->Visible) { // baid ?>
		<th class="<?php echo $pharmacy_stock_movement->baid->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid"><?php echo $pharmacy_stock_movement->baid->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_stock_movement_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_stock_movement_delete->Recordset->EOF) {
	$pharmacy_stock_movement_delete->RecCnt++;
	$pharmacy_stock_movement_delete->RowCnt++;

	// Set row properties
	$pharmacy_stock_movement->resetAttributes();
	$pharmacy_stock_movement->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_stock_movement_delete->loadRowValues($pharmacy_stock_movement_delete->Recordset);

	// Render row
	$pharmacy_stock_movement_delete->renderRow();
?>
	<tr<?php echo $pharmacy_stock_movement->rowAttributes() ?>>
<?php if ($pharmacy_stock_movement->id->Visible) { // id ?>
		<td<?php echo $pharmacy_stock_movement->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id">
<span<?php echo $pharmacy_stock_movement->id->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRC->Visible) { // PRC ?>
		<td<?php echo $pharmacy_stock_movement->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC">
<span<?php echo $pharmacy_stock_movement->PRC->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PrName->Visible) { // PrName ?>
		<td<?php echo $pharmacy_stock_movement->PrName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName">
<span<?php echo $pharmacy_stock_movement->PrName->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $pharmacy_stock_movement->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO">
<span<?php echo $pharmacy_stock_movement->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
		<td<?php echo $pharmacy_stock_movement->OpeningStk->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk">
<span<?php echo $pharmacy_stock_movement->OpeningStk->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OpeningStk->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
		<td<?php echo $pharmacy_stock_movement->PurchaseQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty">
<span<?php echo $pharmacy_stock_movement->PurchaseQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PurchaseQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
		<td<?php echo $pharmacy_stock_movement->SalesQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty">
<span<?php echo $pharmacy_stock_movement->SalesQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SalesQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
		<td<?php echo $pharmacy_stock_movement->ClosingStk->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk">
<span<?php echo $pharmacy_stock_movement->ClosingStk->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->ClosingStk->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
		<td<?php echo $pharmacy_stock_movement->PurchasefreeQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty">
<span<?php echo $pharmacy_stock_movement->PurchasefreeQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PurchasefreeQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
		<td<?php echo $pharmacy_stock_movement->TransferingQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty">
<span<?php echo $pharmacy_stock_movement->TransferingQty->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TransferingQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
		<td<?php echo $pharmacy_stock_movement->UnitPurchaseRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate">
<span<?php echo $pharmacy_stock_movement->UnitPurchaseRate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UnitPurchaseRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
		<td<?php echo $pharmacy_stock_movement->UnitSaleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate">
<span<?php echo $pharmacy_stock_movement->UnitSaleRate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UnitSaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
		<td<?php echo $pharmacy_stock_movement->CreatedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate">
<span<?php echo $pharmacy_stock_movement->CreatedDate->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->CreatedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->OQ->Visible) { // OQ ?>
		<td<?php echo $pharmacy_stock_movement->OQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ">
<span<?php echo $pharmacy_stock_movement->OQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->RQ->Visible) { // RQ ?>
		<td<?php echo $pharmacy_stock_movement->RQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ">
<span<?php echo $pharmacy_stock_movement->RQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRQ->Visible) { // MRQ ?>
		<td<?php echo $pharmacy_stock_movement->MRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ">
<span<?php echo $pharmacy_stock_movement->MRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->IQ->Visible) { // IQ ?>
		<td<?php echo $pharmacy_stock_movement->IQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ">
<span<?php echo $pharmacy_stock_movement->IQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->MRP->Visible) { // MRP ?>
		<td<?php echo $pharmacy_stock_movement->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP">
<span<?php echo $pharmacy_stock_movement->MRP->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $pharmacy_stock_movement->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT">
<span<?php echo $pharmacy_stock_movement->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->UR->Visible) { // UR ?>
		<td<?php echo $pharmacy_stock_movement->UR->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR">
<span<?php echo $pharmacy_stock_movement->UR->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->RT->Visible) { // RT ?>
		<td<?php echo $pharmacy_stock_movement->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT">
<span<?php echo $pharmacy_stock_movement->RT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PRCODE->Visible) { // PRCODE ?>
		<td<?php echo $pharmacy_stock_movement->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE">
<span<?php echo $pharmacy_stock_movement->PRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->BATCH->Visible) { // BATCH ?>
		<td<?php echo $pharmacy_stock_movement->BATCH->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH">
<span<?php echo $pharmacy_stock_movement->BATCH->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PC->Visible) { // PC ?>
		<td<?php echo $pharmacy_stock_movement->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC">
<span<?php echo $pharmacy_stock_movement->PC->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRT->Visible) { // OLDRT ?>
		<td<?php echo $pharmacy_stock_movement->OLDRT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT">
<span<?php echo $pharmacy_stock_movement->OLDRT->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OLDRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<td<?php echo $pharmacy_stock_movement->TEMPMRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ">
<span<?php echo $pharmacy_stock_movement->TEMPMRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->TAXP->Visible) { // TAXP ?>
		<td<?php echo $pharmacy_stock_movement->TAXP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP">
<span<?php echo $pharmacy_stock_movement->TAXP->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->OLDRATE->Visible) { // OLDRATE ?>
		<td<?php echo $pharmacy_stock_movement->OLDRATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE">
<span<?php echo $pharmacy_stock_movement->OLDRATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OLDRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->NEWRATE->Visible) { // NEWRATE ?>
		<td<?php echo $pharmacy_stock_movement->NEWRATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE">
<span<?php echo $pharmacy_stock_movement->NEWRATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->NEWRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<td<?php echo $pharmacy_stock_movement->OTEMPMRA->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA">
<span<?php echo $pharmacy_stock_movement->OTEMPMRA->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<td<?php echo $pharmacy_stock_movement->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS">
<span<?php echo $pharmacy_stock_movement->ACTIVESTATUS->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PSGST->Visible) { // PSGST ?>
		<td<?php echo $pharmacy_stock_movement->PSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST">
<span<?php echo $pharmacy_stock_movement->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->PCGST->Visible) { // PCGST ?>
		<td<?php echo $pharmacy_stock_movement->PCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST">
<span<?php echo $pharmacy_stock_movement->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->SSGST->Visible) { // SSGST ?>
		<td<?php echo $pharmacy_stock_movement->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST">
<span<?php echo $pharmacy_stock_movement->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->SCGST->Visible) { // SCGST ?>
		<td<?php echo $pharmacy_stock_movement->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST">
<span<?php echo $pharmacy_stock_movement->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->MFRCODE->Visible) { // MFRCODE ?>
		<td<?php echo $pharmacy_stock_movement->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE">
<span<?php echo $pharmacy_stock_movement->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $pharmacy_stock_movement->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE">
<span<?php echo $pharmacy_stock_movement->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->FRQ->Visible) { // FRQ ?>
		<td<?php echo $pharmacy_stock_movement->FRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ">
<span<?php echo $pharmacy_stock_movement->FRQ->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->FRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_stock_movement->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID">
<span<?php echo $pharmacy_stock_movement->HospID->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->UM->Visible) { // UM ?>
		<td<?php echo $pharmacy_stock_movement->UM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM">
<span<?php echo $pharmacy_stock_movement->UM->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->GENNAME->Visible) { // GENNAME ?>
		<td<?php echo $pharmacy_stock_movement->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME">
<span<?php echo $pharmacy_stock_movement->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->BILLDATE->Visible) { // BILLDATE ?>
		<td<?php echo $pharmacy_stock_movement->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE">
<span<?php echo $pharmacy_stock_movement->BILLDATE->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->BILLDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td<?php echo $pharmacy_stock_movement->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime">
<span<?php echo $pharmacy_stock_movement->CreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_stock_movement->baid->Visible) { // baid ?>
		<td<?php echo $pharmacy_stock_movement->baid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_stock_movement_delete->RowCnt ?>_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid">
<span<?php echo $pharmacy_stock_movement->baid->viewAttributes() ?>>
<?php echo $pharmacy_stock_movement->baid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_stock_movement_delete->Recordset->moveNext();
}
$pharmacy_stock_movement_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_stock_movement_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_stock_movement_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_stock_movement_delete->terminate();
?>