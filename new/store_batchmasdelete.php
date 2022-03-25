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
<?php include_once "header.php"; ?>
<script>
var fstore_batchmasdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fstore_batchmasdelete = currentForm = new ew.Form("fstore_batchmasdelete", "delete");
	loadjs.done("fstore_batchmasdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_batchmas_delete->showPageHeader(); ?>
<?php
$store_batchmas_delete->showMessage();
?>
<form name="fstore_batchmasdelete" id="fstore_batchmasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_batchmas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_batchmas_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $store_batchmas_delete->PRC->headerCellClass() ?>"><span id="elh_store_batchmas_PRC" class="store_batchmas_PRC"><?php echo $store_batchmas_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $store_batchmas_delete->BATCHNO->headerCellClass() ?>"><span id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO"><?php echo $store_batchmas_delete->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->OQ->Visible) { // OQ ?>
		<th class="<?php echo $store_batchmas_delete->OQ->headerCellClass() ?>"><span id="elh_store_batchmas_OQ" class="store_batchmas_OQ"><?php echo $store_batchmas_delete->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->RQ->Visible) { // RQ ?>
		<th class="<?php echo $store_batchmas_delete->RQ->headerCellClass() ?>"><span id="elh_store_batchmas_RQ" class="store_batchmas_RQ"><?php echo $store_batchmas_delete->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $store_batchmas_delete->MRQ->headerCellClass() ?>"><span id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ"><?php echo $store_batchmas_delete->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->IQ->Visible) { // IQ ?>
		<th class="<?php echo $store_batchmas_delete->IQ->headerCellClass() ?>"><span id="elh_store_batchmas_IQ" class="store_batchmas_IQ"><?php echo $store_batchmas_delete->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->MRP->Visible) { // MRP ?>
		<th class="<?php echo $store_batchmas_delete->MRP->headerCellClass() ?>"><span id="elh_store_batchmas_MRP" class="store_batchmas_MRP"><?php echo $store_batchmas_delete->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $store_batchmas_delete->EXPDT->headerCellClass() ?>"><span id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT"><?php echo $store_batchmas_delete->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->UR->Visible) { // UR ?>
		<th class="<?php echo $store_batchmas_delete->UR->headerCellClass() ?>"><span id="elh_store_batchmas_UR" class="store_batchmas_UR"><?php echo $store_batchmas_delete->UR->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->RT->Visible) { // RT ?>
		<th class="<?php echo $store_batchmas_delete->RT->headerCellClass() ?>"><span id="elh_store_batchmas_RT" class="store_batchmas_RT"><?php echo $store_batchmas_delete->RT->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->PRCODE->Visible) { // PRCODE ?>
		<th class="<?php echo $store_batchmas_delete->PRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE"><?php echo $store_batchmas_delete->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->BATCH->Visible) { // BATCH ?>
		<th class="<?php echo $store_batchmas_delete->BATCH->headerCellClass() ?>"><span id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH"><?php echo $store_batchmas_delete->BATCH->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->PC->Visible) { // PC ?>
		<th class="<?php echo $store_batchmas_delete->PC->headerCellClass() ?>"><span id="elh_store_batchmas_PC" class="store_batchmas_PC"><?php echo $store_batchmas_delete->PC->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->OLDRT->Visible) { // OLDRT ?>
		<th class="<?php echo $store_batchmas_delete->OLDRT->headerCellClass() ?>"><span id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT"><?php echo $store_batchmas_delete->OLDRT->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<th class="<?php echo $store_batchmas_delete->TEMPMRQ->headerCellClass() ?>"><span id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ"><?php echo $store_batchmas_delete->TEMPMRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->TAXP->Visible) { // TAXP ?>
		<th class="<?php echo $store_batchmas_delete->TAXP->headerCellClass() ?>"><span id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP"><?php echo $store_batchmas_delete->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->OLDRATE->Visible) { // OLDRATE ?>
		<th class="<?php echo $store_batchmas_delete->OLDRATE->headerCellClass() ?>"><span id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE"><?php echo $store_batchmas_delete->OLDRATE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->NEWRATE->Visible) { // NEWRATE ?>
		<th class="<?php echo $store_batchmas_delete->NEWRATE->headerCellClass() ?>"><span id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE"><?php echo $store_batchmas_delete->NEWRATE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<th class="<?php echo $store_batchmas_delete->OTEMPMRA->headerCellClass() ?>"><span id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA"><?php echo $store_batchmas_delete->OTEMPMRA->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<th class="<?php echo $store_batchmas_delete->ACTIVESTATUS->headerCellClass() ?>"><span id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS"><?php echo $store_batchmas_delete->ACTIVESTATUS->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->id->Visible) { // id ?>
		<th class="<?php echo $store_batchmas_delete->id->headerCellClass() ?>"><span id="elh_store_batchmas_id" class="store_batchmas_id"><?php echo $store_batchmas_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->PrName->Visible) { // PrName ?>
		<th class="<?php echo $store_batchmas_delete->PrName->headerCellClass() ?>"><span id="elh_store_batchmas_PrName" class="store_batchmas_PrName"><?php echo $store_batchmas_delete->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $store_batchmas_delete->PSGST->headerCellClass() ?>"><span id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST"><?php echo $store_batchmas_delete->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $store_batchmas_delete->PCGST->headerCellClass() ?>"><span id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST"><?php echo $store_batchmas_delete->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $store_batchmas_delete->SSGST->headerCellClass() ?>"><span id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST"><?php echo $store_batchmas_delete->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $store_batchmas_delete->SCGST->headerCellClass() ?>"><span id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST"><?php echo $store_batchmas_delete->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $store_batchmas_delete->MFRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE"><?php echo $store_batchmas_delete->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_batchmas_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $store_batchmas_delete->BRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE"><?php echo $store_batchmas_delete->BRCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_batchmas_delete->RecordCount = 0;
$i = 0;
while (!$store_batchmas_delete->Recordset->EOF) {
	$store_batchmas_delete->RecordCount++;
	$store_batchmas_delete->RowCount++;

	// Set row properties
	$store_batchmas->resetAttributes();
	$store_batchmas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_batchmas_delete->loadRowValues($store_batchmas_delete->Recordset);

	// Render row
	$store_batchmas_delete->renderRow();
?>
	<tr <?php echo $store_batchmas->rowAttributes() ?>>
<?php if ($store_batchmas_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $store_batchmas_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_PRC" class="store_batchmas_PRC">
<span<?php echo $store_batchmas_delete->PRC->viewAttributes() ?>><?php echo $store_batchmas_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->BATCHNO->Visible) { // BATCHNO ?>
		<td <?php echo $store_batchmas_delete->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO">
<span<?php echo $store_batchmas_delete->BATCHNO->viewAttributes() ?>><?php echo $store_batchmas_delete->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->OQ->Visible) { // OQ ?>
		<td <?php echo $store_batchmas_delete->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_OQ" class="store_batchmas_OQ">
<span<?php echo $store_batchmas_delete->OQ->viewAttributes() ?>><?php echo $store_batchmas_delete->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->RQ->Visible) { // RQ ?>
		<td <?php echo $store_batchmas_delete->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_RQ" class="store_batchmas_RQ">
<span<?php echo $store_batchmas_delete->RQ->viewAttributes() ?>><?php echo $store_batchmas_delete->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->MRQ->Visible) { // MRQ ?>
		<td <?php echo $store_batchmas_delete->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_MRQ" class="store_batchmas_MRQ">
<span<?php echo $store_batchmas_delete->MRQ->viewAttributes() ?>><?php echo $store_batchmas_delete->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->IQ->Visible) { // IQ ?>
		<td <?php echo $store_batchmas_delete->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_IQ" class="store_batchmas_IQ">
<span<?php echo $store_batchmas_delete->IQ->viewAttributes() ?>><?php echo $store_batchmas_delete->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->MRP->Visible) { // MRP ?>
		<td <?php echo $store_batchmas_delete->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_MRP" class="store_batchmas_MRP">
<span<?php echo $store_batchmas_delete->MRP->viewAttributes() ?>><?php echo $store_batchmas_delete->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->EXPDT->Visible) { // EXPDT ?>
		<td <?php echo $store_batchmas_delete->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_EXPDT" class="store_batchmas_EXPDT">
<span<?php echo $store_batchmas_delete->EXPDT->viewAttributes() ?>><?php echo $store_batchmas_delete->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->UR->Visible) { // UR ?>
		<td <?php echo $store_batchmas_delete->UR->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_UR" class="store_batchmas_UR">
<span<?php echo $store_batchmas_delete->UR->viewAttributes() ?>><?php echo $store_batchmas_delete->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->RT->Visible) { // RT ?>
		<td <?php echo $store_batchmas_delete->RT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_RT" class="store_batchmas_RT">
<span<?php echo $store_batchmas_delete->RT->viewAttributes() ?>><?php echo $store_batchmas_delete->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->PRCODE->Visible) { // PRCODE ?>
		<td <?php echo $store_batchmas_delete->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_PRCODE" class="store_batchmas_PRCODE">
<span<?php echo $store_batchmas_delete->PRCODE->viewAttributes() ?>><?php echo $store_batchmas_delete->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->BATCH->Visible) { // BATCH ?>
		<td <?php echo $store_batchmas_delete->BATCH->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_BATCH" class="store_batchmas_BATCH">
<span<?php echo $store_batchmas_delete->BATCH->viewAttributes() ?>><?php echo $store_batchmas_delete->BATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->PC->Visible) { // PC ?>
		<td <?php echo $store_batchmas_delete->PC->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_PC" class="store_batchmas_PC">
<span<?php echo $store_batchmas_delete->PC->viewAttributes() ?>><?php echo $store_batchmas_delete->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->OLDRT->Visible) { // OLDRT ?>
		<td <?php echo $store_batchmas_delete->OLDRT->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_OLDRT" class="store_batchmas_OLDRT">
<span<?php echo $store_batchmas_delete->OLDRT->viewAttributes() ?>><?php echo $store_batchmas_delete->OLDRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->TEMPMRQ->Visible) { // TEMPMRQ ?>
		<td <?php echo $store_batchmas_delete->TEMPMRQ->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ">
<span<?php echo $store_batchmas_delete->TEMPMRQ->viewAttributes() ?>><?php echo $store_batchmas_delete->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->TAXP->Visible) { // TAXP ?>
		<td <?php echo $store_batchmas_delete->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_TAXP" class="store_batchmas_TAXP">
<span<?php echo $store_batchmas_delete->TAXP->viewAttributes() ?>><?php echo $store_batchmas_delete->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->OLDRATE->Visible) { // OLDRATE ?>
		<td <?php echo $store_batchmas_delete->OLDRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE">
<span<?php echo $store_batchmas_delete->OLDRATE->viewAttributes() ?>><?php echo $store_batchmas_delete->OLDRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->NEWRATE->Visible) { // NEWRATE ?>
		<td <?php echo $store_batchmas_delete->NEWRATE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE">
<span<?php echo $store_batchmas_delete->NEWRATE->viewAttributes() ?>><?php echo $store_batchmas_delete->NEWRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->OTEMPMRA->Visible) { // OTEMPMRA ?>
		<td <?php echo $store_batchmas_delete->OTEMPMRA->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA">
<span<?php echo $store_batchmas_delete->OTEMPMRA->viewAttributes() ?>><?php echo $store_batchmas_delete->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
		<td <?php echo $store_batchmas_delete->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS">
<span<?php echo $store_batchmas_delete->ACTIVESTATUS->viewAttributes() ?>><?php echo $store_batchmas_delete->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->id->Visible) { // id ?>
		<td <?php echo $store_batchmas_delete->id->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_id" class="store_batchmas_id">
<span<?php echo $store_batchmas_delete->id->viewAttributes() ?>><?php echo $store_batchmas_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->PrName->Visible) { // PrName ?>
		<td <?php echo $store_batchmas_delete->PrName->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_PrName" class="store_batchmas_PrName">
<span<?php echo $store_batchmas_delete->PrName->viewAttributes() ?>><?php echo $store_batchmas_delete->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->PSGST->Visible) { // PSGST ?>
		<td <?php echo $store_batchmas_delete->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_PSGST" class="store_batchmas_PSGST">
<span<?php echo $store_batchmas_delete->PSGST->viewAttributes() ?>><?php echo $store_batchmas_delete->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->PCGST->Visible) { // PCGST ?>
		<td <?php echo $store_batchmas_delete->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_PCGST" class="store_batchmas_PCGST">
<span<?php echo $store_batchmas_delete->PCGST->viewAttributes() ?>><?php echo $store_batchmas_delete->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->SSGST->Visible) { // SSGST ?>
		<td <?php echo $store_batchmas_delete->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_SSGST" class="store_batchmas_SSGST">
<span<?php echo $store_batchmas_delete->SSGST->viewAttributes() ?>><?php echo $store_batchmas_delete->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->SCGST->Visible) { // SCGST ?>
		<td <?php echo $store_batchmas_delete->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_SCGST" class="store_batchmas_SCGST">
<span<?php echo $store_batchmas_delete->SCGST->viewAttributes() ?>><?php echo $store_batchmas_delete->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->MFRCODE->Visible) { // MFRCODE ?>
		<td <?php echo $store_batchmas_delete->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE">
<span<?php echo $store_batchmas_delete->MFRCODE->viewAttributes() ?>><?php echo $store_batchmas_delete->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_batchmas_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $store_batchmas_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_batchmas_delete->RowCount ?>_store_batchmas_BRCODE" class="store_batchmas_BRCODE">
<span<?php echo $store_batchmas_delete->BRCODE->viewAttributes() ?>><?php echo $store_batchmas_delete->BRCODE->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$store_batchmas_delete->terminate();
?>