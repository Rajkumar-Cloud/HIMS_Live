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
$store_batchmas_delete = new store_batchmas_delete();

// Run the page
$store_batchmas_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_batchmas_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_batchmasdelete = currentForm = new ew.Form("fstore_batchmasdelete", "delete");

// Form_CustomValidate event
fstore_batchmasdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_batchmasdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_batchmas_delete->showPageHeader(); ?>
<?php
$store_batchmas_delete->showMessage();
?>
<form name="fstore_batchmasdelete" id="fstore_batchmasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_batchmas_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_batchmas_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_batchmas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_batchmas->PRC->Visible) { // PRC ?>
		<th class="<?php echo $store_batchmas->PRC->headerCellClass() ?>"><span id="elh_store_batchmas_PRC" class="store_batchmas_PRC"><?php echo $store_batchmas->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $store_batchmas->BATCHNO->headerCellClass() ?>"><span id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO"><?php echo $store_batchmas->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->OQ->Visible) { // OQ ?>
		<th class="<?php echo $store_batchmas->OQ->headerCellClass() ?>"><span id="elh_store_batchmas_OQ" class="store_batchmas_OQ"><?php echo $store_batchmas->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->RQ->Visible) { // RQ ?>
		<th class="<?php echo $store_batchmas->RQ->headerCellClass() ?>"><span id="elh_store_batchmas_RQ" class="store_batchmas_RQ"><?php echo $store_batchmas->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $store_batchmas->MRQ->headerCellClass() ?>"><span id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ"><?php echo $store_batchmas->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->IQ->Visible) { // IQ ?>
		<th class="<?php echo $store_batchmas->IQ->headerCellClass() ?>"><span id="elh_store_batchmas_IQ" class="store_batchmas_IQ"><?php echo $store_batchmas->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->MRP->Visible) { // MRP ?>
		<th class="<?php echo $store_batchmas->MRP->headerCellClass() ?>"><span id="elh_store_batchmas_MRP" class="store_batchmas_MRP"><?php echo $store_batchmas->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $store_batchmas->EXPDT->headerCellClass() ?>"><span id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT"><?php echo $store_batchmas->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->UR->Visible) { // UR ?>
		<th class="<?php echo $store_batchmas->UR->headerCellClass() ?>"><span id="elh_store_batchmas_UR" class="store_batchmas_UR"><?php echo $store_batchmas->UR->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->RT->Visible) { // RT ?>
		<th class="<?php echo $store_batchmas->RT->headerCellClass() ?>"><span id="elh_store_batchmas_RT" class="store_batchmas_RT"><?php echo $store_batchmas->RT->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PRCODE->Visible) { // PRCODE ?>
		<th class="<?php echo $store_batchmas->PRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE"><?php echo $store_batchmas->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->BATCH->Visible) { // BATCH ?>
		<th class="<?php echo $store_batchmas->BATCH->headerCellClass() ?>"><span id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH"><?php echo $store_batchmas->BATCH->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PC->Visible) { // PC ?>
		<th class="<?php echo $store_batchmas->PC->headerCellClass() ?>"><span id="elh_store_batchmas_PC" class="store_batchmas_PC"><?php echo $store_batchmas->PC->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->OLDRT->Visible) { // OLDRT ?>
		<th class="<?php echo $store_batchmas->OLDRT->headerCellClass() ?>"><span id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT"><?php echo $store_batchmas->OLDRT->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<th class="<?php echo $store_batchmas->TEMPMRQ->headerCellClass() ?>"><span id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ"><?php echo $store_batchmas->TEMPMRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->TAXP->Visible) { // TAXP ?>
		<th class="<?php echo $store_batchmas->TAXP->headerCellClass() ?>"><span id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP"><?php echo $store_batchmas->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->OLDRATE->Visible) { // OLDRATE ?>
		<th class="<?php echo $store_batchmas->OLDRATE->headerCellClass() ?>"><span id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE"><?php echo $store_batchmas->OLDRATE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->NEWRATE->Visible) { // NEWRATE ?>
		<th class="<?php echo $store_batchmas->NEWRATE->headerCellClass() ?>"><span id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE"><?php echo $store_batchmas->NEWRATE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<th class="<?php echo $store_batchmas->OTEMPMRA->headerCellClass() ?>"><span id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA"><?php echo $store_batchmas->OTEMPMRA->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<th class="<?php echo $store_batchmas->ACTIVESTATUS->headerCellClass() ?>"><span id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS"><?php echo $store_batchmas->ACTIVESTATUS->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->id->Visible) { // id ?>
		<th class="<?php echo $store_batchmas->id->headerCellClass() ?>"><span id="elh_store_batchmas_id" class="store_batchmas_id"><?php echo $store_batchmas->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PrName->Visible) { // PrName ?>
		<th class="<?php echo $store_batchmas->PrName->headerCellClass() ?>"><span id="elh_store_batchmas_PrName" class="store_batchmas_PrName"><?php echo $store_batchmas->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $store_batchmas->PSGST->headerCellClass() ?>"><span id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST"><?php echo $store_batchmas->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $store_batchmas->PCGST->headerCellClass() ?>"><span id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST"><?php echo $store_batchmas->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $store_batchmas->SSGST->headerCellClass() ?>"><span id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST"><?php echo $store_batchmas->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $store_batchmas->SCGST->headerCellClass() ?>"><span id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST"><?php echo $store_batchmas->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $store_batchmas->MFRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE"><?php echo $store_batchmas->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $store_batchmas->BRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE"><?php echo $store_batchmas->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->FRQ->Visible) { // FRQ ?>
		<th class="<?php echo $store_batchmas->FRQ->headerCellClass() ?>"><span id="elh_store_batchmas_FRQ" class="store_batchmas_FRQ"><?php echo $store_batchmas->FRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_batchmas->HospID->headerCellClass() ?>"><span id="elh_store_batchmas_HospID" class="store_batchmas_HospID"><?php echo $store_batchmas->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->UM->Visible) { // UM ?>
		<th class="<?php echo $store_batchmas->UM->headerCellClass() ?>"><span id="elh_store_batchmas_UM" class="store_batchmas_UM"><?php echo $store_batchmas->UM->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $store_batchmas->GENNAME->headerCellClass() ?>"><span id="elh_store_batchmas_GENNAME" class="store_batchmas_GENNAME"><?php echo $store_batchmas->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->BILLDATE->Visible) { // BILLDATE ?>
		<th class="<?php echo $store_batchmas->BILLDATE->headerCellClass() ?>"><span id="elh_store_batchmas_BILLDATE" class="store_batchmas_BILLDATE"><?php echo $store_batchmas->BILLDATE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PUnit->Visible) { // PUnit ?>
		<th class="<?php echo $store_batchmas->PUnit->headerCellClass() ?>"><span id="elh_store_batchmas_PUnit" class="store_batchmas_PUnit"><?php echo $store_batchmas->PUnit->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->SUnit->Visible) { // SUnit ?>
		<th class="<?php echo $store_batchmas->SUnit->headerCellClass() ?>"><span id="elh_store_batchmas_SUnit" class="store_batchmas_SUnit"><?php echo $store_batchmas->SUnit->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $store_batchmas->PurValue->headerCellClass() ?>"><span id="elh_store_batchmas_PurValue" class="store_batchmas_PurValue"><?php echo $store_batchmas->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->PurRate->Visible) { // PurRate ?>
		<th class="<?php echo $store_batchmas->PurRate->headerCellClass() ?>"><span id="elh_store_batchmas_PurRate" class="store_batchmas_PurRate"><?php echo $store_batchmas->PurRate->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_batchmas->StoreID->headerCellClass() ?>"><span id="elh_store_batchmas_StoreID" class="store_batchmas_StoreID"><?php echo $store_batchmas->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_batchmas_delete->RecCnt = 0;
$i = 0;
while (!$store_batchmas_delete->Recordset->EOF) {
	$store_batchmas_delete->RecCnt++;
	$store_batchmas_delete->RowCnt++;

	// Set row properties
	$store_batchmas->resetAttributes();
	$store_batchmas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_batchmas_delete->loadRowValues($store_batchmas_delete->Recordset);

	// Render row
	$store_batchmas_delete->renderRow();
?>
	<tr<?php echo $store_batchmas->rowAttributes() ?>>
<?php if ($store_batchmas->PRC->Visible) { // PRC ?>
		<td<?php echo $store_batchmas->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PRC" class="store_batchmas_PRC">
<span<?php echo $store_batchmas->PRC->viewAttributes() ?>>
<?php echo $store_batchmas->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $store_batchmas->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO">
<span<?php echo $store_batchmas->BATCHNO->viewAttributes() ?>>
<?php echo $store_batchmas->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->OQ->Visible) { // OQ ?>
		<td<?php echo $store_batchmas->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_OQ" class="store_batchmas_OQ">
<span<?php echo $store_batchmas->OQ->viewAttributes() ?>>
<?php echo $store_batchmas->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->RQ->Visible) { // RQ ?>
		<td<?php echo $store_batchmas->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_RQ" class="store_batchmas_RQ">
<span<?php echo $store_batchmas->RQ->viewAttributes() ?>>
<?php echo $store_batchmas->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->MRQ->Visible) { // MRQ ?>
		<td<?php echo $store_batchmas->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_MRQ" class="store_batchmas_MRQ">
<span<?php echo $store_batchmas->MRQ->viewAttributes() ?>>
<?php echo $store_batchmas->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->IQ->Visible) { // IQ ?>
		<td<?php echo $store_batchmas->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_IQ" class="store_batchmas_IQ">
<span<?php echo $store_batchmas->IQ->viewAttributes() ?>>
<?php echo $store_batchmas->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->MRP->Visible) { // MRP ?>
		<td<?php echo $store_batchmas->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_MRP" class="store_batchmas_MRP">
<span<?php echo $store_batchmas->MRP->viewAttributes() ?>>
<?php echo $store_batchmas->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $store_batchmas->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_EXPDT" class="store_batchmas_EXPDT">
<span<?php echo $store_batchmas->EXPDT->viewAttributes() ?>>
<?php echo $store_batchmas->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->UR->Visible) { // UR ?>
		<td<?php echo $store_batchmas->UR->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_UR" class="store_batchmas_UR">
<span<?php echo $store_batchmas->UR->viewAttributes() ?>>
<?php echo $store_batchmas->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->RT->Visible) { // RT ?>
		<td<?php echo $store_batchmas->RT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_RT" class="store_batchmas_RT">
<span<?php echo $store_batchmas->RT->viewAttributes() ?>>
<?php echo $store_batchmas->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PRCODE->Visible) { // PRCODE ?>
		<td<?php echo $store_batchmas->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PRCODE" class="store_batchmas_PRCODE">
<span<?php echo $store_batchmas->PRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->BATCH->Visible) { // BATCH ?>
		<td<?php echo $store_batchmas->BATCH->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_BATCH" class="store_batchmas_BATCH">
<span<?php echo $store_batchmas->BATCH->viewAttributes() ?>>
<?php echo $store_batchmas->BATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PC->Visible) { // PC ?>
		<td<?php echo $store_batchmas->PC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PC" class="store_batchmas_PC">
<span<?php echo $store_batchmas->PC->viewAttributes() ?>>
<?php echo $store_batchmas->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->OLDRT->Visible) { // OLDRT ?>
		<td<?php echo $store_batchmas->OLDRT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_OLDRT" class="store_batchmas_OLDRT">
<span<?php echo $store_batchmas->OLDRT->viewAttributes() ?>>
<?php echo $store_batchmas->OLDRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<td<?php echo $store_batchmas->TEMPMRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ">
<span<?php echo $store_batchmas->TEMPMRQ->viewAttributes() ?>>
<?php echo $store_batchmas->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->TAXP->Visible) { // TAXP ?>
		<td<?php echo $store_batchmas->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_TAXP" class="store_batchmas_TAXP">
<span<?php echo $store_batchmas->TAXP->viewAttributes() ?>>
<?php echo $store_batchmas->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->OLDRATE->Visible) { // OLDRATE ?>
		<td<?php echo $store_batchmas->OLDRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE">
<span<?php echo $store_batchmas->OLDRATE->viewAttributes() ?>>
<?php echo $store_batchmas->OLDRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->NEWRATE->Visible) { // NEWRATE ?>
		<td<?php echo $store_batchmas->NEWRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE">
<span<?php echo $store_batchmas->NEWRATE->viewAttributes() ?>>
<?php echo $store_batchmas->NEWRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<td<?php echo $store_batchmas->OTEMPMRA->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA">
<span<?php echo $store_batchmas->OTEMPMRA->viewAttributes() ?>>
<?php echo $store_batchmas->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<td<?php echo $store_batchmas->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS">
<span<?php echo $store_batchmas->ACTIVESTATUS->viewAttributes() ?>>
<?php echo $store_batchmas->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->id->Visible) { // id ?>
		<td<?php echo $store_batchmas->id->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_id" class="store_batchmas_id">
<span<?php echo $store_batchmas->id->viewAttributes() ?>>
<?php echo $store_batchmas->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PrName->Visible) { // PrName ?>
		<td<?php echo $store_batchmas->PrName->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PrName" class="store_batchmas_PrName">
<span<?php echo $store_batchmas->PrName->viewAttributes() ?>>
<?php echo $store_batchmas->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PSGST->Visible) { // PSGST ?>
		<td<?php echo $store_batchmas->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PSGST" class="store_batchmas_PSGST">
<span<?php echo $store_batchmas->PSGST->viewAttributes() ?>>
<?php echo $store_batchmas->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PCGST->Visible) { // PCGST ?>
		<td<?php echo $store_batchmas->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PCGST" class="store_batchmas_PCGST">
<span<?php echo $store_batchmas->PCGST->viewAttributes() ?>>
<?php echo $store_batchmas->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->SSGST->Visible) { // SSGST ?>
		<td<?php echo $store_batchmas->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_SSGST" class="store_batchmas_SSGST">
<span<?php echo $store_batchmas->SSGST->viewAttributes() ?>>
<?php echo $store_batchmas->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->SCGST->Visible) { // SCGST ?>
		<td<?php echo $store_batchmas->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_SCGST" class="store_batchmas_SCGST">
<span<?php echo $store_batchmas->SCGST->viewAttributes() ?>>
<?php echo $store_batchmas->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->MFRCODE->Visible) { // MFRCODE ?>
		<td<?php echo $store_batchmas->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE">
<span<?php echo $store_batchmas->MFRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $store_batchmas->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_BRCODE" class="store_batchmas_BRCODE">
<span<?php echo $store_batchmas->BRCODE->viewAttributes() ?>>
<?php echo $store_batchmas->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->FRQ->Visible) { // FRQ ?>
		<td<?php echo $store_batchmas->FRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_FRQ" class="store_batchmas_FRQ">
<span<?php echo $store_batchmas->FRQ->viewAttributes() ?>>
<?php echo $store_batchmas->FRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->HospID->Visible) { // HospID ?>
		<td<?php echo $store_batchmas->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_HospID" class="store_batchmas_HospID">
<span<?php echo $store_batchmas->HospID->viewAttributes() ?>>
<?php echo $store_batchmas->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->UM->Visible) { // UM ?>
		<td<?php echo $store_batchmas->UM->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_UM" class="store_batchmas_UM">
<span<?php echo $store_batchmas->UM->viewAttributes() ?>>
<?php echo $store_batchmas->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->GENNAME->Visible) { // GENNAME ?>
		<td<?php echo $store_batchmas->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_GENNAME" class="store_batchmas_GENNAME">
<span<?php echo $store_batchmas->GENNAME->viewAttributes() ?>>
<?php echo $store_batchmas->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->BILLDATE->Visible) { // BILLDATE ?>
		<td<?php echo $store_batchmas->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_BILLDATE" class="store_batchmas_BILLDATE">
<span<?php echo $store_batchmas->BILLDATE->viewAttributes() ?>>
<?php echo $store_batchmas->BILLDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PUnit->Visible) { // PUnit ?>
		<td<?php echo $store_batchmas->PUnit->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PUnit" class="store_batchmas_PUnit">
<span<?php echo $store_batchmas->PUnit->viewAttributes() ?>>
<?php echo $store_batchmas->PUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->SUnit->Visible) { // SUnit ?>
		<td<?php echo $store_batchmas->SUnit->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_SUnit" class="store_batchmas_SUnit">
<span<?php echo $store_batchmas->SUnit->viewAttributes() ?>>
<?php echo $store_batchmas->SUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PurValue->Visible) { // PurValue ?>
		<td<?php echo $store_batchmas->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PurValue" class="store_batchmas_PurValue">
<span<?php echo $store_batchmas->PurValue->viewAttributes() ?>>
<?php echo $store_batchmas->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->PurRate->Visible) { // PurRate ?>
		<td<?php echo $store_batchmas->PurRate->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_PurRate" class="store_batchmas_PurRate">
<span<?php echo $store_batchmas->PurRate->viewAttributes() ?>>
<?php echo $store_batchmas->PurRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_batchmas->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCnt ?>_store_batchmas_StoreID" class="store_batchmas_StoreID">
<span<?php echo $store_batchmas->StoreID->viewAttributes() ?>>
<?php echo $store_batchmas->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_batchmas_delete->Recordset->moveNext();
}
$store_batchmas_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_batchmas_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_batchmas_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_batchmas_delete->terminate();
?>