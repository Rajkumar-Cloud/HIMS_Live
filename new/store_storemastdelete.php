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
$store_storemast_delete = new store_storemast_delete();

// Run the page
$store_storemast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_storemast_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstore_storemastdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fstore_storemastdelete = currentForm = new ew.Form("fstore_storemastdelete", "delete");
	loadjs.done("fstore_storemastdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_storemast_delete->showPageHeader(); ?>
<?php
$store_storemast_delete->showMessage();
?>
<form name="fstore_storemastdelete" id="fstore_storemastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_storemast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_storemast_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $store_storemast_delete->BRCODE->headerCellClass() ?>"><span id="elh_store_storemast_BRCODE" class="store_storemast_BRCODE"><?php echo $store_storemast_delete->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $store_storemast_delete->PRC->headerCellClass() ?>"><span id="elh_store_storemast_PRC" class="store_storemast_PRC"><?php echo $store_storemast_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->TYPE->Visible) { // TYPE ?>
		<th class="<?php echo $store_storemast_delete->TYPE->headerCellClass() ?>"><span id="elh_store_storemast_TYPE" class="store_storemast_TYPE"><?php echo $store_storemast_delete->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->DES->Visible) { // DES ?>
		<th class="<?php echo $store_storemast_delete->DES->headerCellClass() ?>"><span id="elh_store_storemast_DES" class="store_storemast_DES"><?php echo $store_storemast_delete->DES->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->UM->Visible) { // UM ?>
		<th class="<?php echo $store_storemast_delete->UM->headerCellClass() ?>"><span id="elh_store_storemast_UM" class="store_storemast_UM"><?php echo $store_storemast_delete->UM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->RT->Visible) { // RT ?>
		<th class="<?php echo $store_storemast_delete->RT->headerCellClass() ?>"><span id="elh_store_storemast_RT" class="store_storemast_RT"><?php echo $store_storemast_delete->RT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->UR->Visible) { // UR ?>
		<th class="<?php echo $store_storemast_delete->UR->headerCellClass() ?>"><span id="elh_store_storemast_UR" class="store_storemast_UR"><?php echo $store_storemast_delete->UR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->TAXP->Visible) { // TAXP ?>
		<th class="<?php echo $store_storemast_delete->TAXP->headerCellClass() ?>"><span id="elh_store_storemast_TAXP" class="store_storemast_TAXP"><?php echo $store_storemast_delete->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $store_storemast_delete->BATCHNO->headerCellClass() ?>"><span id="elh_store_storemast_BATCHNO" class="store_storemast_BATCHNO"><?php echo $store_storemast_delete->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->OQ->Visible) { // OQ ?>
		<th class="<?php echo $store_storemast_delete->OQ->headerCellClass() ?>"><span id="elh_store_storemast_OQ" class="store_storemast_OQ"><?php echo $store_storemast_delete->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->RQ->Visible) { // RQ ?>
		<th class="<?php echo $store_storemast_delete->RQ->headerCellClass() ?>"><span id="elh_store_storemast_RQ" class="store_storemast_RQ"><?php echo $store_storemast_delete->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $store_storemast_delete->MRQ->headerCellClass() ?>"><span id="elh_store_storemast_MRQ" class="store_storemast_MRQ"><?php echo $store_storemast_delete->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->IQ->Visible) { // IQ ?>
		<th class="<?php echo $store_storemast_delete->IQ->headerCellClass() ?>"><span id="elh_store_storemast_IQ" class="store_storemast_IQ"><?php echo $store_storemast_delete->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->MRP->Visible) { // MRP ?>
		<th class="<?php echo $store_storemast_delete->MRP->headerCellClass() ?>"><span id="elh_store_storemast_MRP" class="store_storemast_MRP"><?php echo $store_storemast_delete->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $store_storemast_delete->EXPDT->headerCellClass() ?>"><span id="elh_store_storemast_EXPDT" class="store_storemast_EXPDT"><?php echo $store_storemast_delete->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->SALQTY->Visible) { // SALQTY ?>
		<th class="<?php echo $store_storemast_delete->SALQTY->headerCellClass() ?>"><span id="elh_store_storemast_SALQTY" class="store_storemast_SALQTY"><?php echo $store_storemast_delete->SALQTY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->LASTPURDT->Visible) { // LASTPURDT ?>
		<th class="<?php echo $store_storemast_delete->LASTPURDT->headerCellClass() ?>"><span id="elh_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT"><?php echo $store_storemast_delete->LASTPURDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->LASTSUPP->Visible) { // LASTSUPP ?>
		<th class="<?php echo $store_storemast_delete->LASTSUPP->headerCellClass() ?>"><span id="elh_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP"><?php echo $store_storemast_delete->LASTSUPP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $store_storemast_delete->GENNAME->headerCellClass() ?>"><span id="elh_store_storemast_GENNAME" class="store_storemast_GENNAME"><?php echo $store_storemast_delete->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->LASTISSDT->Visible) { // LASTISSDT ?>
		<th class="<?php echo $store_storemast_delete->LASTISSDT->headerCellClass() ?>"><span id="elh_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT"><?php echo $store_storemast_delete->LASTISSDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->CREATEDDT->Visible) { // CREATEDDT ?>
		<th class="<?php echo $store_storemast_delete->CREATEDDT->headerCellClass() ?>"><span id="elh_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT"><?php echo $store_storemast_delete->CREATEDDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->OPPRC->Visible) { // OPPRC ?>
		<th class="<?php echo $store_storemast_delete->OPPRC->headerCellClass() ?>"><span id="elh_store_storemast_OPPRC" class="store_storemast_OPPRC"><?php echo $store_storemast_delete->OPPRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->RESTRICT->Visible) { // RESTRICT ?>
		<th class="<?php echo $store_storemast_delete->RESTRICT->headerCellClass() ?>"><span id="elh_store_storemast_RESTRICT" class="store_storemast_RESTRICT"><?php echo $store_storemast_delete->RESTRICT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->BAWAPRC->Visible) { // BAWAPRC ?>
		<th class="<?php echo $store_storemast_delete->BAWAPRC->headerCellClass() ?>"><span id="elh_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC"><?php echo $store_storemast_delete->BAWAPRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->STAXPER->Visible) { // STAXPER ?>
		<th class="<?php echo $store_storemast_delete->STAXPER->headerCellClass() ?>"><span id="elh_store_storemast_STAXPER" class="store_storemast_STAXPER"><?php echo $store_storemast_delete->STAXPER->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->TAXTYPE->Visible) { // TAXTYPE ?>
		<th class="<?php echo $store_storemast_delete->TAXTYPE->headerCellClass() ?>"><span id="elh_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE"><?php echo $store_storemast_delete->TAXTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->OLDTAXP->Visible) { // OLDTAXP ?>
		<th class="<?php echo $store_storemast_delete->OLDTAXP->headerCellClass() ?>"><span id="elh_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP"><?php echo $store_storemast_delete->OLDTAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->TAXUPD->Visible) { // TAXUPD ?>
		<th class="<?php echo $store_storemast_delete->TAXUPD->headerCellClass() ?>"><span id="elh_store_storemast_TAXUPD" class="store_storemast_TAXUPD"><?php echo $store_storemast_delete->TAXUPD->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PACKAGE->Visible) { // PACKAGE ?>
		<th class="<?php echo $store_storemast_delete->PACKAGE->headerCellClass() ?>"><span id="elh_store_storemast_PACKAGE" class="store_storemast_PACKAGE"><?php echo $store_storemast_delete->PACKAGE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->NEWRT->Visible) { // NEWRT ?>
		<th class="<?php echo $store_storemast_delete->NEWRT->headerCellClass() ?>"><span id="elh_store_storemast_NEWRT" class="store_storemast_NEWRT"><?php echo $store_storemast_delete->NEWRT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->NEWMRP->Visible) { // NEWMRP ?>
		<th class="<?php echo $store_storemast_delete->NEWMRP->headerCellClass() ?>"><span id="elh_store_storemast_NEWMRP" class="store_storemast_NEWMRP"><?php echo $store_storemast_delete->NEWMRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->NEWUR->Visible) { // NEWUR ?>
		<th class="<?php echo $store_storemast_delete->NEWUR->headerCellClass() ?>"><span id="elh_store_storemast_NEWUR" class="store_storemast_NEWUR"><?php echo $store_storemast_delete->NEWUR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->STATUS->Visible) { // STATUS ?>
		<th class="<?php echo $store_storemast_delete->STATUS->headerCellClass() ?>"><span id="elh_store_storemast_STATUS" class="store_storemast_STATUS"><?php echo $store_storemast_delete->STATUS->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->RETNQTY->Visible) { // RETNQTY ?>
		<th class="<?php echo $store_storemast_delete->RETNQTY->headerCellClass() ?>"><span id="elh_store_storemast_RETNQTY" class="store_storemast_RETNQTY"><?php echo $store_storemast_delete->RETNQTY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->KEMODISC->Visible) { // KEMODISC ?>
		<th class="<?php echo $store_storemast_delete->KEMODISC->headerCellClass() ?>"><span id="elh_store_storemast_KEMODISC" class="store_storemast_KEMODISC"><?php echo $store_storemast_delete->KEMODISC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PATSALE->Visible) { // PATSALE ?>
		<th class="<?php echo $store_storemast_delete->PATSALE->headerCellClass() ?>"><span id="elh_store_storemast_PATSALE" class="store_storemast_PATSALE"><?php echo $store_storemast_delete->PATSALE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->ORGAN->Visible) { // ORGAN ?>
		<th class="<?php echo $store_storemast_delete->ORGAN->headerCellClass() ?>"><span id="elh_store_storemast_ORGAN" class="store_storemast_ORGAN"><?php echo $store_storemast_delete->ORGAN->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->OLDRQ->Visible) { // OLDRQ ?>
		<th class="<?php echo $store_storemast_delete->OLDRQ->headerCellClass() ?>"><span id="elh_store_storemast_OLDRQ" class="store_storemast_OLDRQ"><?php echo $store_storemast_delete->OLDRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->DRID->Visible) { // DRID ?>
		<th class="<?php echo $store_storemast_delete->DRID->headerCellClass() ?>"><span id="elh_store_storemast_DRID" class="store_storemast_DRID"><?php echo $store_storemast_delete->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $store_storemast_delete->MFRCODE->headerCellClass() ?>"><span id="elh_store_storemast_MFRCODE" class="store_storemast_MFRCODE"><?php echo $store_storemast_delete->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->COMBCODE->Visible) { // COMBCODE ?>
		<th class="<?php echo $store_storemast_delete->COMBCODE->headerCellClass() ?>"><span id="elh_store_storemast_COMBCODE" class="store_storemast_COMBCODE"><?php echo $store_storemast_delete->COMBCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->GENCODE->Visible) { // GENCODE ?>
		<th class="<?php echo $store_storemast_delete->GENCODE->headerCellClass() ?>"><span id="elh_store_storemast_GENCODE" class="store_storemast_GENCODE"><?php echo $store_storemast_delete->GENCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->STRENGTH->Visible) { // STRENGTH ?>
		<th class="<?php echo $store_storemast_delete->STRENGTH->headerCellClass() ?>"><span id="elh_store_storemast_STRENGTH" class="store_storemast_STRENGTH"><?php echo $store_storemast_delete->STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->UNIT->Visible) { // UNIT ?>
		<th class="<?php echo $store_storemast_delete->UNIT->headerCellClass() ?>"><span id="elh_store_storemast_UNIT" class="store_storemast_UNIT"><?php echo $store_storemast_delete->UNIT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->FORMULARY->Visible) { // FORMULARY ?>
		<th class="<?php echo $store_storemast_delete->FORMULARY->headerCellClass() ?>"><span id="elh_store_storemast_FORMULARY" class="store_storemast_FORMULARY"><?php echo $store_storemast_delete->FORMULARY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->STOCK->Visible) { // STOCK ?>
		<th class="<?php echo $store_storemast_delete->STOCK->headerCellClass() ?>"><span id="elh_store_storemast_STOCK" class="store_storemast_STOCK"><?php echo $store_storemast_delete->STOCK->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->RACKNO->Visible) { // RACKNO ?>
		<th class="<?php echo $store_storemast_delete->RACKNO->headerCellClass() ?>"><span id="elh_store_storemast_RACKNO" class="store_storemast_RACKNO"><?php echo $store_storemast_delete->RACKNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->SUPPNAME->Visible) { // SUPPNAME ?>
		<th class="<?php echo $store_storemast_delete->SUPPNAME->headerCellClass() ?>"><span id="elh_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME"><?php echo $store_storemast_delete->SUPPNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->COMBNAME->Visible) { // COMBNAME ?>
		<th class="<?php echo $store_storemast_delete->COMBNAME->headerCellClass() ?>"><span id="elh_store_storemast_COMBNAME" class="store_storemast_COMBNAME"><?php echo $store_storemast_delete->COMBNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->GENERICNAME->Visible) { // GENERICNAME ?>
		<th class="<?php echo $store_storemast_delete->GENERICNAME->headerCellClass() ?>"><span id="elh_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME"><?php echo $store_storemast_delete->GENERICNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->REMARK->Visible) { // REMARK ?>
		<th class="<?php echo $store_storemast_delete->REMARK->headerCellClass() ?>"><span id="elh_store_storemast_REMARK" class="store_storemast_REMARK"><?php echo $store_storemast_delete->REMARK->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->TEMP->Visible) { // TEMP ?>
		<th class="<?php echo $store_storemast_delete->TEMP->headerCellClass() ?>"><span id="elh_store_storemast_TEMP" class="store_storemast_TEMP"><?php echo $store_storemast_delete->TEMP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PACKING->Visible) { // PACKING ?>
		<th class="<?php echo $store_storemast_delete->PACKING->headerCellClass() ?>"><span id="elh_store_storemast_PACKING" class="store_storemast_PACKING"><?php echo $store_storemast_delete->PACKING->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PhysQty->Visible) { // PhysQty ?>
		<th class="<?php echo $store_storemast_delete->PhysQty->headerCellClass() ?>"><span id="elh_store_storemast_PhysQty" class="store_storemast_PhysQty"><?php echo $store_storemast_delete->PhysQty->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->LedQty->Visible) { // LedQty ?>
		<th class="<?php echo $store_storemast_delete->LedQty->headerCellClass() ?>"><span id="elh_store_storemast_LedQty" class="store_storemast_LedQty"><?php echo $store_storemast_delete->LedQty->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->id->Visible) { // id ?>
		<th class="<?php echo $store_storemast_delete->id->headerCellClass() ?>"><span id="elh_store_storemast_id" class="store_storemast_id"><?php echo $store_storemast_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $store_storemast_delete->PurValue->headerCellClass() ?>"><span id="elh_store_storemast_PurValue" class="store_storemast_PurValue"><?php echo $store_storemast_delete->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $store_storemast_delete->PSGST->headerCellClass() ?>"><span id="elh_store_storemast_PSGST" class="store_storemast_PSGST"><?php echo $store_storemast_delete->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $store_storemast_delete->PCGST->headerCellClass() ?>"><span id="elh_store_storemast_PCGST" class="store_storemast_PCGST"><?php echo $store_storemast_delete->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->SaleValue->Visible) { // SaleValue ?>
		<th class="<?php echo $store_storemast_delete->SaleValue->headerCellClass() ?>"><span id="elh_store_storemast_SaleValue" class="store_storemast_SaleValue"><?php echo $store_storemast_delete->SaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $store_storemast_delete->SSGST->headerCellClass() ?>"><span id="elh_store_storemast_SSGST" class="store_storemast_SSGST"><?php echo $store_storemast_delete->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $store_storemast_delete->SCGST->headerCellClass() ?>"><span id="elh_store_storemast_SCGST" class="store_storemast_SCGST"><?php echo $store_storemast_delete->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->SaleRate->Visible) { // SaleRate ?>
		<th class="<?php echo $store_storemast_delete->SaleRate->headerCellClass() ?>"><span id="elh_store_storemast_SaleRate" class="store_storemast_SaleRate"><?php echo $store_storemast_delete->SaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_storemast_delete->HospID->headerCellClass() ?>"><span id="elh_store_storemast_HospID" class="store_storemast_HospID"><?php echo $store_storemast_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast_delete->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $store_storemast_delete->BRNAME->headerCellClass() ?>"><span id="elh_store_storemast_BRNAME" class="store_storemast_BRNAME"><?php echo $store_storemast_delete->BRNAME->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_storemast_delete->RecordCount = 0;
$i = 0;
while (!$store_storemast_delete->Recordset->EOF) {
	$store_storemast_delete->RecordCount++;
	$store_storemast_delete->RowCount++;

	// Set row properties
	$store_storemast->resetAttributes();
	$store_storemast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_storemast_delete->loadRowValues($store_storemast_delete->Recordset);

	// Render row
	$store_storemast_delete->renderRow();
?>
	<tr <?php echo $store_storemast->rowAttributes() ?>>
<?php if ($store_storemast_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $store_storemast_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_BRCODE" class="store_storemast_BRCODE">
<span<?php echo $store_storemast_delete->BRCODE->viewAttributes() ?>><?php echo $store_storemast_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $store_storemast_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PRC" class="store_storemast_PRC">
<span<?php echo $store_storemast_delete->PRC->viewAttributes() ?>><?php echo $store_storemast_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->TYPE->Visible) { // TYPE ?>
		<td <?php echo $store_storemast_delete->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_TYPE" class="store_storemast_TYPE">
<span<?php echo $store_storemast_delete->TYPE->viewAttributes() ?>><?php echo $store_storemast_delete->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->DES->Visible) { // DES ?>
		<td <?php echo $store_storemast_delete->DES->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_DES" class="store_storemast_DES">
<span<?php echo $store_storemast_delete->DES->viewAttributes() ?>><?php echo $store_storemast_delete->DES->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->UM->Visible) { // UM ?>
		<td <?php echo $store_storemast_delete->UM->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_UM" class="store_storemast_UM">
<span<?php echo $store_storemast_delete->UM->viewAttributes() ?>><?php echo $store_storemast_delete->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->RT->Visible) { // RT ?>
		<td <?php echo $store_storemast_delete->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_RT" class="store_storemast_RT">
<span<?php echo $store_storemast_delete->RT->viewAttributes() ?>><?php echo $store_storemast_delete->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->UR->Visible) { // UR ?>
		<td <?php echo $store_storemast_delete->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_UR" class="store_storemast_UR">
<span<?php echo $store_storemast_delete->UR->viewAttributes() ?>><?php echo $store_storemast_delete->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->TAXP->Visible) { // TAXP ?>
		<td <?php echo $store_storemast_delete->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_TAXP" class="store_storemast_TAXP">
<span<?php echo $store_storemast_delete->TAXP->viewAttributes() ?>><?php echo $store_storemast_delete->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->BATCHNO->Visible) { // BATCHNO ?>
		<td <?php echo $store_storemast_delete->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_BATCHNO" class="store_storemast_BATCHNO">
<span<?php echo $store_storemast_delete->BATCHNO->viewAttributes() ?>><?php echo $store_storemast_delete->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->OQ->Visible) { // OQ ?>
		<td <?php echo $store_storemast_delete->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_OQ" class="store_storemast_OQ">
<span<?php echo $store_storemast_delete->OQ->viewAttributes() ?>><?php echo $store_storemast_delete->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->RQ->Visible) { // RQ ?>
		<td <?php echo $store_storemast_delete->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_RQ" class="store_storemast_RQ">
<span<?php echo $store_storemast_delete->RQ->viewAttributes() ?>><?php echo $store_storemast_delete->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->MRQ->Visible) { // MRQ ?>
		<td <?php echo $store_storemast_delete->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_MRQ" class="store_storemast_MRQ">
<span<?php echo $store_storemast_delete->MRQ->viewAttributes() ?>><?php echo $store_storemast_delete->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->IQ->Visible) { // IQ ?>
		<td <?php echo $store_storemast_delete->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_IQ" class="store_storemast_IQ">
<span<?php echo $store_storemast_delete->IQ->viewAttributes() ?>><?php echo $store_storemast_delete->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->MRP->Visible) { // MRP ?>
		<td <?php echo $store_storemast_delete->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_MRP" class="store_storemast_MRP">
<span<?php echo $store_storemast_delete->MRP->viewAttributes() ?>><?php echo $store_storemast_delete->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->EXPDT->Visible) { // EXPDT ?>
		<td <?php echo $store_storemast_delete->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_EXPDT" class="store_storemast_EXPDT">
<span<?php echo $store_storemast_delete->EXPDT->viewAttributes() ?>><?php echo $store_storemast_delete->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->SALQTY->Visible) { // SALQTY ?>
		<td <?php echo $store_storemast_delete->SALQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_SALQTY" class="store_storemast_SALQTY">
<span<?php echo $store_storemast_delete->SALQTY->viewAttributes() ?>><?php echo $store_storemast_delete->SALQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->LASTPURDT->Visible) { // LASTPURDT ?>
		<td <?php echo $store_storemast_delete->LASTPURDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT">
<span<?php echo $store_storemast_delete->LASTPURDT->viewAttributes() ?>><?php echo $store_storemast_delete->LASTPURDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->LASTSUPP->Visible) { // LASTSUPP ?>
		<td <?php echo $store_storemast_delete->LASTSUPP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP">
<span<?php echo $store_storemast_delete->LASTSUPP->viewAttributes() ?>><?php echo $store_storemast_delete->LASTSUPP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->GENNAME->Visible) { // GENNAME ?>
		<td <?php echo $store_storemast_delete->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_GENNAME" class="store_storemast_GENNAME">
<span<?php echo $store_storemast_delete->GENNAME->viewAttributes() ?>><?php echo $store_storemast_delete->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->LASTISSDT->Visible) { // LASTISSDT ?>
		<td <?php echo $store_storemast_delete->LASTISSDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT">
<span<?php echo $store_storemast_delete->LASTISSDT->viewAttributes() ?>><?php echo $store_storemast_delete->LASTISSDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->CREATEDDT->Visible) { // CREATEDDT ?>
		<td <?php echo $store_storemast_delete->CREATEDDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT">
<span<?php echo $store_storemast_delete->CREATEDDT->viewAttributes() ?>><?php echo $store_storemast_delete->CREATEDDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->OPPRC->Visible) { // OPPRC ?>
		<td <?php echo $store_storemast_delete->OPPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_OPPRC" class="store_storemast_OPPRC">
<span<?php echo $store_storemast_delete->OPPRC->viewAttributes() ?>><?php echo $store_storemast_delete->OPPRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->RESTRICT->Visible) { // RESTRICT ?>
		<td <?php echo $store_storemast_delete->RESTRICT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_RESTRICT" class="store_storemast_RESTRICT">
<span<?php echo $store_storemast_delete->RESTRICT->viewAttributes() ?>><?php echo $store_storemast_delete->RESTRICT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->BAWAPRC->Visible) { // BAWAPRC ?>
		<td <?php echo $store_storemast_delete->BAWAPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC">
<span<?php echo $store_storemast_delete->BAWAPRC->viewAttributes() ?>><?php echo $store_storemast_delete->BAWAPRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->STAXPER->Visible) { // STAXPER ?>
		<td <?php echo $store_storemast_delete->STAXPER->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_STAXPER" class="store_storemast_STAXPER">
<span<?php echo $store_storemast_delete->STAXPER->viewAttributes() ?>><?php echo $store_storemast_delete->STAXPER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->TAXTYPE->Visible) { // TAXTYPE ?>
		<td <?php echo $store_storemast_delete->TAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE">
<span<?php echo $store_storemast_delete->TAXTYPE->viewAttributes() ?>><?php echo $store_storemast_delete->TAXTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->OLDTAXP->Visible) { // OLDTAXP ?>
		<td <?php echo $store_storemast_delete->OLDTAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP">
<span<?php echo $store_storemast_delete->OLDTAXP->viewAttributes() ?>><?php echo $store_storemast_delete->OLDTAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->TAXUPD->Visible) { // TAXUPD ?>
		<td <?php echo $store_storemast_delete->TAXUPD->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_TAXUPD" class="store_storemast_TAXUPD">
<span<?php echo $store_storemast_delete->TAXUPD->viewAttributes() ?>><?php echo $store_storemast_delete->TAXUPD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PACKAGE->Visible) { // PACKAGE ?>
		<td <?php echo $store_storemast_delete->PACKAGE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PACKAGE" class="store_storemast_PACKAGE">
<span<?php echo $store_storemast_delete->PACKAGE->viewAttributes() ?>><?php echo $store_storemast_delete->PACKAGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->NEWRT->Visible) { // NEWRT ?>
		<td <?php echo $store_storemast_delete->NEWRT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_NEWRT" class="store_storemast_NEWRT">
<span<?php echo $store_storemast_delete->NEWRT->viewAttributes() ?>><?php echo $store_storemast_delete->NEWRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->NEWMRP->Visible) { // NEWMRP ?>
		<td <?php echo $store_storemast_delete->NEWMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_NEWMRP" class="store_storemast_NEWMRP">
<span<?php echo $store_storemast_delete->NEWMRP->viewAttributes() ?>><?php echo $store_storemast_delete->NEWMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->NEWUR->Visible) { // NEWUR ?>
		<td <?php echo $store_storemast_delete->NEWUR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_NEWUR" class="store_storemast_NEWUR">
<span<?php echo $store_storemast_delete->NEWUR->viewAttributes() ?>><?php echo $store_storemast_delete->NEWUR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->STATUS->Visible) { // STATUS ?>
		<td <?php echo $store_storemast_delete->STATUS->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_STATUS" class="store_storemast_STATUS">
<span<?php echo $store_storemast_delete->STATUS->viewAttributes() ?>><?php echo $store_storemast_delete->STATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->RETNQTY->Visible) { // RETNQTY ?>
		<td <?php echo $store_storemast_delete->RETNQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_RETNQTY" class="store_storemast_RETNQTY">
<span<?php echo $store_storemast_delete->RETNQTY->viewAttributes() ?>><?php echo $store_storemast_delete->RETNQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->KEMODISC->Visible) { // KEMODISC ?>
		<td <?php echo $store_storemast_delete->KEMODISC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_KEMODISC" class="store_storemast_KEMODISC">
<span<?php echo $store_storemast_delete->KEMODISC->viewAttributes() ?>><?php echo $store_storemast_delete->KEMODISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PATSALE->Visible) { // PATSALE ?>
		<td <?php echo $store_storemast_delete->PATSALE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PATSALE" class="store_storemast_PATSALE">
<span<?php echo $store_storemast_delete->PATSALE->viewAttributes() ?>><?php echo $store_storemast_delete->PATSALE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->ORGAN->Visible) { // ORGAN ?>
		<td <?php echo $store_storemast_delete->ORGAN->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_ORGAN" class="store_storemast_ORGAN">
<span<?php echo $store_storemast_delete->ORGAN->viewAttributes() ?>><?php echo $store_storemast_delete->ORGAN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->OLDRQ->Visible) { // OLDRQ ?>
		<td <?php echo $store_storemast_delete->OLDRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_OLDRQ" class="store_storemast_OLDRQ">
<span<?php echo $store_storemast_delete->OLDRQ->viewAttributes() ?>><?php echo $store_storemast_delete->OLDRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->DRID->Visible) { // DRID ?>
		<td <?php echo $store_storemast_delete->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_DRID" class="store_storemast_DRID">
<span<?php echo $store_storemast_delete->DRID->viewAttributes() ?>><?php echo $store_storemast_delete->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->MFRCODE->Visible) { // MFRCODE ?>
		<td <?php echo $store_storemast_delete->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_MFRCODE" class="store_storemast_MFRCODE">
<span<?php echo $store_storemast_delete->MFRCODE->viewAttributes() ?>><?php echo $store_storemast_delete->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->COMBCODE->Visible) { // COMBCODE ?>
		<td <?php echo $store_storemast_delete->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_COMBCODE" class="store_storemast_COMBCODE">
<span<?php echo $store_storemast_delete->COMBCODE->viewAttributes() ?>><?php echo $store_storemast_delete->COMBCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->GENCODE->Visible) { // GENCODE ?>
		<td <?php echo $store_storemast_delete->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_GENCODE" class="store_storemast_GENCODE">
<span<?php echo $store_storemast_delete->GENCODE->viewAttributes() ?>><?php echo $store_storemast_delete->GENCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->STRENGTH->Visible) { // STRENGTH ?>
		<td <?php echo $store_storemast_delete->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_STRENGTH" class="store_storemast_STRENGTH">
<span<?php echo $store_storemast_delete->STRENGTH->viewAttributes() ?>><?php echo $store_storemast_delete->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->UNIT->Visible) { // UNIT ?>
		<td <?php echo $store_storemast_delete->UNIT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_UNIT" class="store_storemast_UNIT">
<span<?php echo $store_storemast_delete->UNIT->viewAttributes() ?>><?php echo $store_storemast_delete->UNIT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->FORMULARY->Visible) { // FORMULARY ?>
		<td <?php echo $store_storemast_delete->FORMULARY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_FORMULARY" class="store_storemast_FORMULARY">
<span<?php echo $store_storemast_delete->FORMULARY->viewAttributes() ?>><?php echo $store_storemast_delete->FORMULARY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->STOCK->Visible) { // STOCK ?>
		<td <?php echo $store_storemast_delete->STOCK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_STOCK" class="store_storemast_STOCK">
<span<?php echo $store_storemast_delete->STOCK->viewAttributes() ?>><?php echo $store_storemast_delete->STOCK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->RACKNO->Visible) { // RACKNO ?>
		<td <?php echo $store_storemast_delete->RACKNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_RACKNO" class="store_storemast_RACKNO">
<span<?php echo $store_storemast_delete->RACKNO->viewAttributes() ?>><?php echo $store_storemast_delete->RACKNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->SUPPNAME->Visible) { // SUPPNAME ?>
		<td <?php echo $store_storemast_delete->SUPPNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME">
<span<?php echo $store_storemast_delete->SUPPNAME->viewAttributes() ?>><?php echo $store_storemast_delete->SUPPNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->COMBNAME->Visible) { // COMBNAME ?>
		<td <?php echo $store_storemast_delete->COMBNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_COMBNAME" class="store_storemast_COMBNAME">
<span<?php echo $store_storemast_delete->COMBNAME->viewAttributes() ?>><?php echo $store_storemast_delete->COMBNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->GENERICNAME->Visible) { // GENERICNAME ?>
		<td <?php echo $store_storemast_delete->GENERICNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME">
<span<?php echo $store_storemast_delete->GENERICNAME->viewAttributes() ?>><?php echo $store_storemast_delete->GENERICNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->REMARK->Visible) { // REMARK ?>
		<td <?php echo $store_storemast_delete->REMARK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_REMARK" class="store_storemast_REMARK">
<span<?php echo $store_storemast_delete->REMARK->viewAttributes() ?>><?php echo $store_storemast_delete->REMARK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->TEMP->Visible) { // TEMP ?>
		<td <?php echo $store_storemast_delete->TEMP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_TEMP" class="store_storemast_TEMP">
<span<?php echo $store_storemast_delete->TEMP->viewAttributes() ?>><?php echo $store_storemast_delete->TEMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PACKING->Visible) { // PACKING ?>
		<td <?php echo $store_storemast_delete->PACKING->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PACKING" class="store_storemast_PACKING">
<span<?php echo $store_storemast_delete->PACKING->viewAttributes() ?>><?php echo $store_storemast_delete->PACKING->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PhysQty->Visible) { // PhysQty ?>
		<td <?php echo $store_storemast_delete->PhysQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PhysQty" class="store_storemast_PhysQty">
<span<?php echo $store_storemast_delete->PhysQty->viewAttributes() ?>><?php echo $store_storemast_delete->PhysQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->LedQty->Visible) { // LedQty ?>
		<td <?php echo $store_storemast_delete->LedQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_LedQty" class="store_storemast_LedQty">
<span<?php echo $store_storemast_delete->LedQty->viewAttributes() ?>><?php echo $store_storemast_delete->LedQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->id->Visible) { // id ?>
		<td <?php echo $store_storemast_delete->id->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_id" class="store_storemast_id">
<span<?php echo $store_storemast_delete->id->viewAttributes() ?>><?php echo $store_storemast_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PurValue->Visible) { // PurValue ?>
		<td <?php echo $store_storemast_delete->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PurValue" class="store_storemast_PurValue">
<span<?php echo $store_storemast_delete->PurValue->viewAttributes() ?>><?php echo $store_storemast_delete->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PSGST->Visible) { // PSGST ?>
		<td <?php echo $store_storemast_delete->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PSGST" class="store_storemast_PSGST">
<span<?php echo $store_storemast_delete->PSGST->viewAttributes() ?>><?php echo $store_storemast_delete->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->PCGST->Visible) { // PCGST ?>
		<td <?php echo $store_storemast_delete->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_PCGST" class="store_storemast_PCGST">
<span<?php echo $store_storemast_delete->PCGST->viewAttributes() ?>><?php echo $store_storemast_delete->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->SaleValue->Visible) { // SaleValue ?>
		<td <?php echo $store_storemast_delete->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_SaleValue" class="store_storemast_SaleValue">
<span<?php echo $store_storemast_delete->SaleValue->viewAttributes() ?>><?php echo $store_storemast_delete->SaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->SSGST->Visible) { // SSGST ?>
		<td <?php echo $store_storemast_delete->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_SSGST" class="store_storemast_SSGST">
<span<?php echo $store_storemast_delete->SSGST->viewAttributes() ?>><?php echo $store_storemast_delete->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->SCGST->Visible) { // SCGST ?>
		<td <?php echo $store_storemast_delete->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_SCGST" class="store_storemast_SCGST">
<span<?php echo $store_storemast_delete->SCGST->viewAttributes() ?>><?php echo $store_storemast_delete->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->SaleRate->Visible) { // SaleRate ?>
		<td <?php echo $store_storemast_delete->SaleRate->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_SaleRate" class="store_storemast_SaleRate">
<span<?php echo $store_storemast_delete->SaleRate->viewAttributes() ?>><?php echo $store_storemast_delete->SaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $store_storemast_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_HospID" class="store_storemast_HospID">
<span<?php echo $store_storemast_delete->HospID->viewAttributes() ?>><?php echo $store_storemast_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast_delete->BRNAME->Visible) { // BRNAME ?>
		<td <?php echo $store_storemast_delete->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCount ?>_store_storemast_BRNAME" class="store_storemast_BRNAME">
<span<?php echo $store_storemast_delete->BRNAME->viewAttributes() ?>><?php echo $store_storemast_delete->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_storemast_delete->Recordset->moveNext();
}
$store_storemast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_storemast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_storemast_delete->showPageFooter();
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
$store_storemast_delete->terminate();
?>