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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_storemastdelete = currentForm = new ew.Form("fstore_storemastdelete", "delete");

// Form_CustomValidate event
fstore_storemastdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_storemastdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_storemast_delete->showPageHeader(); ?>
<?php
$store_storemast_delete->showMessage();
?>
<form name="fstore_storemastdelete" id="fstore_storemastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_storemast_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_storemast_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_storemast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_storemast->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $store_storemast->BRCODE->headerCellClass() ?>"><span id="elh_store_storemast_BRCODE" class="store_storemast_BRCODE"><?php echo $store_storemast->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PRC->Visible) { // PRC ?>
		<th class="<?php echo $store_storemast->PRC->headerCellClass() ?>"><span id="elh_store_storemast_PRC" class="store_storemast_PRC"><?php echo $store_storemast->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->TYPE->Visible) { // TYPE ?>
		<th class="<?php echo $store_storemast->TYPE->headerCellClass() ?>"><span id="elh_store_storemast_TYPE" class="store_storemast_TYPE"><?php echo $store_storemast->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->DES->Visible) { // DES ?>
		<th class="<?php echo $store_storemast->DES->headerCellClass() ?>"><span id="elh_store_storemast_DES" class="store_storemast_DES"><?php echo $store_storemast->DES->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->UM->Visible) { // UM ?>
		<th class="<?php echo $store_storemast->UM->headerCellClass() ?>"><span id="elh_store_storemast_UM" class="store_storemast_UM"><?php echo $store_storemast->UM->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->RT->Visible) { // RT ?>
		<th class="<?php echo $store_storemast->RT->headerCellClass() ?>"><span id="elh_store_storemast_RT" class="store_storemast_RT"><?php echo $store_storemast->RT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->UR->Visible) { // UR ?>
		<th class="<?php echo $store_storemast->UR->headerCellClass() ?>"><span id="elh_store_storemast_UR" class="store_storemast_UR"><?php echo $store_storemast->UR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->TAXP->Visible) { // TAXP ?>
		<th class="<?php echo $store_storemast->TAXP->headerCellClass() ?>"><span id="elh_store_storemast_TAXP" class="store_storemast_TAXP"><?php echo $store_storemast->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $store_storemast->BATCHNO->headerCellClass() ?>"><span id="elh_store_storemast_BATCHNO" class="store_storemast_BATCHNO"><?php echo $store_storemast->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->OQ->Visible) { // OQ ?>
		<th class="<?php echo $store_storemast->OQ->headerCellClass() ?>"><span id="elh_store_storemast_OQ" class="store_storemast_OQ"><?php echo $store_storemast->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->RQ->Visible) { // RQ ?>
		<th class="<?php echo $store_storemast->RQ->headerCellClass() ?>"><span id="elh_store_storemast_RQ" class="store_storemast_RQ"><?php echo $store_storemast->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $store_storemast->MRQ->headerCellClass() ?>"><span id="elh_store_storemast_MRQ" class="store_storemast_MRQ"><?php echo $store_storemast->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->IQ->Visible) { // IQ ?>
		<th class="<?php echo $store_storemast->IQ->headerCellClass() ?>"><span id="elh_store_storemast_IQ" class="store_storemast_IQ"><?php echo $store_storemast->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->MRP->Visible) { // MRP ?>
		<th class="<?php echo $store_storemast->MRP->headerCellClass() ?>"><span id="elh_store_storemast_MRP" class="store_storemast_MRP"><?php echo $store_storemast->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $store_storemast->EXPDT->headerCellClass() ?>"><span id="elh_store_storemast_EXPDT" class="store_storemast_EXPDT"><?php echo $store_storemast->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->SALQTY->Visible) { // SALQTY ?>
		<th class="<?php echo $store_storemast->SALQTY->headerCellClass() ?>"><span id="elh_store_storemast_SALQTY" class="store_storemast_SALQTY"><?php echo $store_storemast->SALQTY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
		<th class="<?php echo $store_storemast->LASTPURDT->headerCellClass() ?>"><span id="elh_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT"><?php echo $store_storemast->LASTPURDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
		<th class="<?php echo $store_storemast->LASTSUPP->headerCellClass() ?>"><span id="elh_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP"><?php echo $store_storemast->LASTSUPP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $store_storemast->GENNAME->headerCellClass() ?>"><span id="elh_store_storemast_GENNAME" class="store_storemast_GENNAME"><?php echo $store_storemast->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
		<th class="<?php echo $store_storemast->LASTISSDT->headerCellClass() ?>"><span id="elh_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT"><?php echo $store_storemast->LASTISSDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
		<th class="<?php echo $store_storemast->CREATEDDT->headerCellClass() ?>"><span id="elh_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT"><?php echo $store_storemast->CREATEDDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->OPPRC->Visible) { // OPPRC ?>
		<th class="<?php echo $store_storemast->OPPRC->headerCellClass() ?>"><span id="elh_store_storemast_OPPRC" class="store_storemast_OPPRC"><?php echo $store_storemast->OPPRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->RESTRICT->Visible) { // RESTRICT ?>
		<th class="<?php echo $store_storemast->RESTRICT->headerCellClass() ?>"><span id="elh_store_storemast_RESTRICT" class="store_storemast_RESTRICT"><?php echo $store_storemast->RESTRICT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
		<th class="<?php echo $store_storemast->BAWAPRC->headerCellClass() ?>"><span id="elh_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC"><?php echo $store_storemast->BAWAPRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->STAXPER->Visible) { // STAXPER ?>
		<th class="<?php echo $store_storemast->STAXPER->headerCellClass() ?>"><span id="elh_store_storemast_STAXPER" class="store_storemast_STAXPER"><?php echo $store_storemast->STAXPER->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
		<th class="<?php echo $store_storemast->TAXTYPE->headerCellClass() ?>"><span id="elh_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE"><?php echo $store_storemast->TAXTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
		<th class="<?php echo $store_storemast->OLDTAXP->headerCellClass() ?>"><span id="elh_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP"><?php echo $store_storemast->OLDTAXP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->TAXUPD->Visible) { // TAXUPD ?>
		<th class="<?php echo $store_storemast->TAXUPD->headerCellClass() ?>"><span id="elh_store_storemast_TAXUPD" class="store_storemast_TAXUPD"><?php echo $store_storemast->TAXUPD->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PACKAGE->Visible) { // PACKAGE ?>
		<th class="<?php echo $store_storemast->PACKAGE->headerCellClass() ?>"><span id="elh_store_storemast_PACKAGE" class="store_storemast_PACKAGE"><?php echo $store_storemast->PACKAGE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->NEWRT->Visible) { // NEWRT ?>
		<th class="<?php echo $store_storemast->NEWRT->headerCellClass() ?>"><span id="elh_store_storemast_NEWRT" class="store_storemast_NEWRT"><?php echo $store_storemast->NEWRT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->NEWMRP->Visible) { // NEWMRP ?>
		<th class="<?php echo $store_storemast->NEWMRP->headerCellClass() ?>"><span id="elh_store_storemast_NEWMRP" class="store_storemast_NEWMRP"><?php echo $store_storemast->NEWMRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->NEWUR->Visible) { // NEWUR ?>
		<th class="<?php echo $store_storemast->NEWUR->headerCellClass() ?>"><span id="elh_store_storemast_NEWUR" class="store_storemast_NEWUR"><?php echo $store_storemast->NEWUR->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->STATUS->Visible) { // STATUS ?>
		<th class="<?php echo $store_storemast->STATUS->headerCellClass() ?>"><span id="elh_store_storemast_STATUS" class="store_storemast_STATUS"><?php echo $store_storemast->STATUS->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->RETNQTY->Visible) { // RETNQTY ?>
		<th class="<?php echo $store_storemast->RETNQTY->headerCellClass() ?>"><span id="elh_store_storemast_RETNQTY" class="store_storemast_RETNQTY"><?php echo $store_storemast->RETNQTY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->KEMODISC->Visible) { // KEMODISC ?>
		<th class="<?php echo $store_storemast->KEMODISC->headerCellClass() ?>"><span id="elh_store_storemast_KEMODISC" class="store_storemast_KEMODISC"><?php echo $store_storemast->KEMODISC->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PATSALE->Visible) { // PATSALE ?>
		<th class="<?php echo $store_storemast->PATSALE->headerCellClass() ?>"><span id="elh_store_storemast_PATSALE" class="store_storemast_PATSALE"><?php echo $store_storemast->PATSALE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->ORGAN->Visible) { // ORGAN ?>
		<th class="<?php echo $store_storemast->ORGAN->headerCellClass() ?>"><span id="elh_store_storemast_ORGAN" class="store_storemast_ORGAN"><?php echo $store_storemast->ORGAN->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->OLDRQ->Visible) { // OLDRQ ?>
		<th class="<?php echo $store_storemast->OLDRQ->headerCellClass() ?>"><span id="elh_store_storemast_OLDRQ" class="store_storemast_OLDRQ"><?php echo $store_storemast->OLDRQ->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->DRID->Visible) { // DRID ?>
		<th class="<?php echo $store_storemast->DRID->headerCellClass() ?>"><span id="elh_store_storemast_DRID" class="store_storemast_DRID"><?php echo $store_storemast->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $store_storemast->MFRCODE->headerCellClass() ?>"><span id="elh_store_storemast_MFRCODE" class="store_storemast_MFRCODE"><?php echo $store_storemast->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->COMBCODE->Visible) { // COMBCODE ?>
		<th class="<?php echo $store_storemast->COMBCODE->headerCellClass() ?>"><span id="elh_store_storemast_COMBCODE" class="store_storemast_COMBCODE"><?php echo $store_storemast->COMBCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->GENCODE->Visible) { // GENCODE ?>
		<th class="<?php echo $store_storemast->GENCODE->headerCellClass() ?>"><span id="elh_store_storemast_GENCODE" class="store_storemast_GENCODE"><?php echo $store_storemast->GENCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->STRENGTH->Visible) { // STRENGTH ?>
		<th class="<?php echo $store_storemast->STRENGTH->headerCellClass() ?>"><span id="elh_store_storemast_STRENGTH" class="store_storemast_STRENGTH"><?php echo $store_storemast->STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->UNIT->Visible) { // UNIT ?>
		<th class="<?php echo $store_storemast->UNIT->headerCellClass() ?>"><span id="elh_store_storemast_UNIT" class="store_storemast_UNIT"><?php echo $store_storemast->UNIT->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->FORMULARY->Visible) { // FORMULARY ?>
		<th class="<?php echo $store_storemast->FORMULARY->headerCellClass() ?>"><span id="elh_store_storemast_FORMULARY" class="store_storemast_FORMULARY"><?php echo $store_storemast->FORMULARY->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->STOCK->Visible) { // STOCK ?>
		<th class="<?php echo $store_storemast->STOCK->headerCellClass() ?>"><span id="elh_store_storemast_STOCK" class="store_storemast_STOCK"><?php echo $store_storemast->STOCK->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->RACKNO->Visible) { // RACKNO ?>
		<th class="<?php echo $store_storemast->RACKNO->headerCellClass() ?>"><span id="elh_store_storemast_RACKNO" class="store_storemast_RACKNO"><?php echo $store_storemast->RACKNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
		<th class="<?php echo $store_storemast->SUPPNAME->headerCellClass() ?>"><span id="elh_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME"><?php echo $store_storemast->SUPPNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->COMBNAME->Visible) { // COMBNAME ?>
		<th class="<?php echo $store_storemast->COMBNAME->headerCellClass() ?>"><span id="elh_store_storemast_COMBNAME" class="store_storemast_COMBNAME"><?php echo $store_storemast->COMBNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
		<th class="<?php echo $store_storemast->GENERICNAME->headerCellClass() ?>"><span id="elh_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME"><?php echo $store_storemast->GENERICNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->REMARK->Visible) { // REMARK ?>
		<th class="<?php echo $store_storemast->REMARK->headerCellClass() ?>"><span id="elh_store_storemast_REMARK" class="store_storemast_REMARK"><?php echo $store_storemast->REMARK->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->TEMP->Visible) { // TEMP ?>
		<th class="<?php echo $store_storemast->TEMP->headerCellClass() ?>"><span id="elh_store_storemast_TEMP" class="store_storemast_TEMP"><?php echo $store_storemast->TEMP->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PACKING->Visible) { // PACKING ?>
		<th class="<?php echo $store_storemast->PACKING->headerCellClass() ?>"><span id="elh_store_storemast_PACKING" class="store_storemast_PACKING"><?php echo $store_storemast->PACKING->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PhysQty->Visible) { // PhysQty ?>
		<th class="<?php echo $store_storemast->PhysQty->headerCellClass() ?>"><span id="elh_store_storemast_PhysQty" class="store_storemast_PhysQty"><?php echo $store_storemast->PhysQty->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->LedQty->Visible) { // LedQty ?>
		<th class="<?php echo $store_storemast->LedQty->headerCellClass() ?>"><span id="elh_store_storemast_LedQty" class="store_storemast_LedQty"><?php echo $store_storemast->LedQty->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->id->Visible) { // id ?>
		<th class="<?php echo $store_storemast->id->headerCellClass() ?>"><span id="elh_store_storemast_id" class="store_storemast_id"><?php echo $store_storemast->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $store_storemast->PurValue->headerCellClass() ?>"><span id="elh_store_storemast_PurValue" class="store_storemast_PurValue"><?php echo $store_storemast->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $store_storemast->PSGST->headerCellClass() ?>"><span id="elh_store_storemast_PSGST" class="store_storemast_PSGST"><?php echo $store_storemast->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $store_storemast->PCGST->headerCellClass() ?>"><span id="elh_store_storemast_PCGST" class="store_storemast_PCGST"><?php echo $store_storemast->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->SaleValue->Visible) { // SaleValue ?>
		<th class="<?php echo $store_storemast->SaleValue->headerCellClass() ?>"><span id="elh_store_storemast_SaleValue" class="store_storemast_SaleValue"><?php echo $store_storemast->SaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $store_storemast->SSGST->headerCellClass() ?>"><span id="elh_store_storemast_SSGST" class="store_storemast_SSGST"><?php echo $store_storemast->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $store_storemast->SCGST->headerCellClass() ?>"><span id="elh_store_storemast_SCGST" class="store_storemast_SCGST"><?php echo $store_storemast->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->SaleRate->Visible) { // SaleRate ?>
		<th class="<?php echo $store_storemast->SaleRate->headerCellClass() ?>"><span id="elh_store_storemast_SaleRate" class="store_storemast_SaleRate"><?php echo $store_storemast->SaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_storemast->HospID->headerCellClass() ?>"><span id="elh_store_storemast_HospID" class="store_storemast_HospID"><?php echo $store_storemast->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $store_storemast->BRNAME->headerCellClass() ?>"><span id="elh_store_storemast_BRNAME" class="store_storemast_BRNAME"><?php echo $store_storemast->BRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->OV->Visible) { // OV ?>
		<th class="<?php echo $store_storemast->OV->headerCellClass() ?>"><span id="elh_store_storemast_OV" class="store_storemast_OV"><?php echo $store_storemast->OV->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->LATESTOV->Visible) { // LATESTOV ?>
		<th class="<?php echo $store_storemast->LATESTOV->headerCellClass() ?>"><span id="elh_store_storemast_LATESTOV" class="store_storemast_LATESTOV"><?php echo $store_storemast->LATESTOV->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
		<th class="<?php echo $store_storemast->ITEMTYPE->headerCellClass() ?>"><span id="elh_store_storemast_ITEMTYPE" class="store_storemast_ITEMTYPE"><?php echo $store_storemast->ITEMTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->ROWID->Visible) { // ROWID ?>
		<th class="<?php echo $store_storemast->ROWID->headerCellClass() ?>"><span id="elh_store_storemast_ROWID" class="store_storemast_ROWID"><?php echo $store_storemast->ROWID->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->MOVED->Visible) { // MOVED ?>
		<th class="<?php echo $store_storemast->MOVED->headerCellClass() ?>"><span id="elh_store_storemast_MOVED" class="store_storemast_MOVED"><?php echo $store_storemast->MOVED->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->NEWTAX->Visible) { // NEWTAX ?>
		<th class="<?php echo $store_storemast->NEWTAX->headerCellClass() ?>"><span id="elh_store_storemast_NEWTAX" class="store_storemast_NEWTAX"><?php echo $store_storemast->NEWTAX->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->HSNCODE->Visible) { // HSNCODE ?>
		<th class="<?php echo $store_storemast->HSNCODE->headerCellClass() ?>"><span id="elh_store_storemast_HSNCODE" class="store_storemast_HSNCODE"><?php echo $store_storemast->HSNCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->OLDTAX->Visible) { // OLDTAX ?>
		<th class="<?php echo $store_storemast->OLDTAX->headerCellClass() ?>"><span id="elh_store_storemast_OLDTAX" class="store_storemast_OLDTAX"><?php echo $store_storemast->OLDTAX->caption() ?></span></th>
<?php } ?>
<?php if ($store_storemast->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_storemast->StoreID->headerCellClass() ?>"><span id="elh_store_storemast_StoreID" class="store_storemast_StoreID"><?php echo $store_storemast->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_storemast_delete->RecCnt = 0;
$i = 0;
while (!$store_storemast_delete->Recordset->EOF) {
	$store_storemast_delete->RecCnt++;
	$store_storemast_delete->RowCnt++;

	// Set row properties
	$store_storemast->resetAttributes();
	$store_storemast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_storemast_delete->loadRowValues($store_storemast_delete->Recordset);

	// Render row
	$store_storemast_delete->renderRow();
?>
	<tr<?php echo $store_storemast->rowAttributes() ?>>
<?php if ($store_storemast->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $store_storemast->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_BRCODE" class="store_storemast_BRCODE">
<span<?php echo $store_storemast->BRCODE->viewAttributes() ?>>
<?php echo $store_storemast->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PRC->Visible) { // PRC ?>
		<td<?php echo $store_storemast->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PRC" class="store_storemast_PRC">
<span<?php echo $store_storemast->PRC->viewAttributes() ?>>
<?php echo $store_storemast->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->TYPE->Visible) { // TYPE ?>
		<td<?php echo $store_storemast->TYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_TYPE" class="store_storemast_TYPE">
<span<?php echo $store_storemast->TYPE->viewAttributes() ?>>
<?php echo $store_storemast->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->DES->Visible) { // DES ?>
		<td<?php echo $store_storemast->DES->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_DES" class="store_storemast_DES">
<span<?php echo $store_storemast->DES->viewAttributes() ?>>
<?php echo $store_storemast->DES->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->UM->Visible) { // UM ?>
		<td<?php echo $store_storemast->UM->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_UM" class="store_storemast_UM">
<span<?php echo $store_storemast->UM->viewAttributes() ?>>
<?php echo $store_storemast->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->RT->Visible) { // RT ?>
		<td<?php echo $store_storemast->RT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_RT" class="store_storemast_RT">
<span<?php echo $store_storemast->RT->viewAttributes() ?>>
<?php echo $store_storemast->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->UR->Visible) { // UR ?>
		<td<?php echo $store_storemast->UR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_UR" class="store_storemast_UR">
<span<?php echo $store_storemast->UR->viewAttributes() ?>>
<?php echo $store_storemast->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->TAXP->Visible) { // TAXP ?>
		<td<?php echo $store_storemast->TAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_TAXP" class="store_storemast_TAXP">
<span<?php echo $store_storemast->TAXP->viewAttributes() ?>>
<?php echo $store_storemast->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $store_storemast->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_BATCHNO" class="store_storemast_BATCHNO">
<span<?php echo $store_storemast->BATCHNO->viewAttributes() ?>>
<?php echo $store_storemast->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->OQ->Visible) { // OQ ?>
		<td<?php echo $store_storemast->OQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_OQ" class="store_storemast_OQ">
<span<?php echo $store_storemast->OQ->viewAttributes() ?>>
<?php echo $store_storemast->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->RQ->Visible) { // RQ ?>
		<td<?php echo $store_storemast->RQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_RQ" class="store_storemast_RQ">
<span<?php echo $store_storemast->RQ->viewAttributes() ?>>
<?php echo $store_storemast->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->MRQ->Visible) { // MRQ ?>
		<td<?php echo $store_storemast->MRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_MRQ" class="store_storemast_MRQ">
<span<?php echo $store_storemast->MRQ->viewAttributes() ?>>
<?php echo $store_storemast->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->IQ->Visible) { // IQ ?>
		<td<?php echo $store_storemast->IQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_IQ" class="store_storemast_IQ">
<span<?php echo $store_storemast->IQ->viewAttributes() ?>>
<?php echo $store_storemast->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->MRP->Visible) { // MRP ?>
		<td<?php echo $store_storemast->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_MRP" class="store_storemast_MRP">
<span<?php echo $store_storemast->MRP->viewAttributes() ?>>
<?php echo $store_storemast->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $store_storemast->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_EXPDT" class="store_storemast_EXPDT">
<span<?php echo $store_storemast->EXPDT->viewAttributes() ?>>
<?php echo $store_storemast->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->SALQTY->Visible) { // SALQTY ?>
		<td<?php echo $store_storemast->SALQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_SALQTY" class="store_storemast_SALQTY">
<span<?php echo $store_storemast->SALQTY->viewAttributes() ?>>
<?php echo $store_storemast->SALQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->LASTPURDT->Visible) { // LASTPURDT ?>
		<td<?php echo $store_storemast->LASTPURDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT">
<span<?php echo $store_storemast->LASTPURDT->viewAttributes() ?>>
<?php echo $store_storemast->LASTPURDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->LASTSUPP->Visible) { // LASTSUPP ?>
		<td<?php echo $store_storemast->LASTSUPP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP">
<span<?php echo $store_storemast->LASTSUPP->viewAttributes() ?>>
<?php echo $store_storemast->LASTSUPP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->GENNAME->Visible) { // GENNAME ?>
		<td<?php echo $store_storemast->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_GENNAME" class="store_storemast_GENNAME">
<span<?php echo $store_storemast->GENNAME->viewAttributes() ?>>
<?php echo $store_storemast->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->LASTISSDT->Visible) { // LASTISSDT ?>
		<td<?php echo $store_storemast->LASTISSDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT">
<span<?php echo $store_storemast->LASTISSDT->viewAttributes() ?>>
<?php echo $store_storemast->LASTISSDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
		<td<?php echo $store_storemast->CREATEDDT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT">
<span<?php echo $store_storemast->CREATEDDT->viewAttributes() ?>>
<?php echo $store_storemast->CREATEDDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->OPPRC->Visible) { // OPPRC ?>
		<td<?php echo $store_storemast->OPPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_OPPRC" class="store_storemast_OPPRC">
<span<?php echo $store_storemast->OPPRC->viewAttributes() ?>>
<?php echo $store_storemast->OPPRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->RESTRICT->Visible) { // RESTRICT ?>
		<td<?php echo $store_storemast->RESTRICT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_RESTRICT" class="store_storemast_RESTRICT">
<span<?php echo $store_storemast->RESTRICT->viewAttributes() ?>>
<?php echo $store_storemast->RESTRICT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->BAWAPRC->Visible) { // BAWAPRC ?>
		<td<?php echo $store_storemast->BAWAPRC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC">
<span<?php echo $store_storemast->BAWAPRC->viewAttributes() ?>>
<?php echo $store_storemast->BAWAPRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->STAXPER->Visible) { // STAXPER ?>
		<td<?php echo $store_storemast->STAXPER->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_STAXPER" class="store_storemast_STAXPER">
<span<?php echo $store_storemast->STAXPER->viewAttributes() ?>>
<?php echo $store_storemast->STAXPER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->TAXTYPE->Visible) { // TAXTYPE ?>
		<td<?php echo $store_storemast->TAXTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE">
<span<?php echo $store_storemast->TAXTYPE->viewAttributes() ?>>
<?php echo $store_storemast->TAXTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->OLDTAXP->Visible) { // OLDTAXP ?>
		<td<?php echo $store_storemast->OLDTAXP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP">
<span<?php echo $store_storemast->OLDTAXP->viewAttributes() ?>>
<?php echo $store_storemast->OLDTAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->TAXUPD->Visible) { // TAXUPD ?>
		<td<?php echo $store_storemast->TAXUPD->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_TAXUPD" class="store_storemast_TAXUPD">
<span<?php echo $store_storemast->TAXUPD->viewAttributes() ?>>
<?php echo $store_storemast->TAXUPD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PACKAGE->Visible) { // PACKAGE ?>
		<td<?php echo $store_storemast->PACKAGE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PACKAGE" class="store_storemast_PACKAGE">
<span<?php echo $store_storemast->PACKAGE->viewAttributes() ?>>
<?php echo $store_storemast->PACKAGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->NEWRT->Visible) { // NEWRT ?>
		<td<?php echo $store_storemast->NEWRT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_NEWRT" class="store_storemast_NEWRT">
<span<?php echo $store_storemast->NEWRT->viewAttributes() ?>>
<?php echo $store_storemast->NEWRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->NEWMRP->Visible) { // NEWMRP ?>
		<td<?php echo $store_storemast->NEWMRP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_NEWMRP" class="store_storemast_NEWMRP">
<span<?php echo $store_storemast->NEWMRP->viewAttributes() ?>>
<?php echo $store_storemast->NEWMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->NEWUR->Visible) { // NEWUR ?>
		<td<?php echo $store_storemast->NEWUR->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_NEWUR" class="store_storemast_NEWUR">
<span<?php echo $store_storemast->NEWUR->viewAttributes() ?>>
<?php echo $store_storemast->NEWUR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->STATUS->Visible) { // STATUS ?>
		<td<?php echo $store_storemast->STATUS->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_STATUS" class="store_storemast_STATUS">
<span<?php echo $store_storemast->STATUS->viewAttributes() ?>>
<?php echo $store_storemast->STATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->RETNQTY->Visible) { // RETNQTY ?>
		<td<?php echo $store_storemast->RETNQTY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_RETNQTY" class="store_storemast_RETNQTY">
<span<?php echo $store_storemast->RETNQTY->viewAttributes() ?>>
<?php echo $store_storemast->RETNQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->KEMODISC->Visible) { // KEMODISC ?>
		<td<?php echo $store_storemast->KEMODISC->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_KEMODISC" class="store_storemast_KEMODISC">
<span<?php echo $store_storemast->KEMODISC->viewAttributes() ?>>
<?php echo $store_storemast->KEMODISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PATSALE->Visible) { // PATSALE ?>
		<td<?php echo $store_storemast->PATSALE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PATSALE" class="store_storemast_PATSALE">
<span<?php echo $store_storemast->PATSALE->viewAttributes() ?>>
<?php echo $store_storemast->PATSALE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->ORGAN->Visible) { // ORGAN ?>
		<td<?php echo $store_storemast->ORGAN->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_ORGAN" class="store_storemast_ORGAN">
<span<?php echo $store_storemast->ORGAN->viewAttributes() ?>>
<?php echo $store_storemast->ORGAN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->OLDRQ->Visible) { // OLDRQ ?>
		<td<?php echo $store_storemast->OLDRQ->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_OLDRQ" class="store_storemast_OLDRQ">
<span<?php echo $store_storemast->OLDRQ->viewAttributes() ?>>
<?php echo $store_storemast->OLDRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->DRID->Visible) { // DRID ?>
		<td<?php echo $store_storemast->DRID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_DRID" class="store_storemast_DRID">
<span<?php echo $store_storemast->DRID->viewAttributes() ?>>
<?php echo $store_storemast->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->MFRCODE->Visible) { // MFRCODE ?>
		<td<?php echo $store_storemast->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_MFRCODE" class="store_storemast_MFRCODE">
<span<?php echo $store_storemast->MFRCODE->viewAttributes() ?>>
<?php echo $store_storemast->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->COMBCODE->Visible) { // COMBCODE ?>
		<td<?php echo $store_storemast->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_COMBCODE" class="store_storemast_COMBCODE">
<span<?php echo $store_storemast->COMBCODE->viewAttributes() ?>>
<?php echo $store_storemast->COMBCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->GENCODE->Visible) { // GENCODE ?>
		<td<?php echo $store_storemast->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_GENCODE" class="store_storemast_GENCODE">
<span<?php echo $store_storemast->GENCODE->viewAttributes() ?>>
<?php echo $store_storemast->GENCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->STRENGTH->Visible) { // STRENGTH ?>
		<td<?php echo $store_storemast->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_STRENGTH" class="store_storemast_STRENGTH">
<span<?php echo $store_storemast->STRENGTH->viewAttributes() ?>>
<?php echo $store_storemast->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->UNIT->Visible) { // UNIT ?>
		<td<?php echo $store_storemast->UNIT->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_UNIT" class="store_storemast_UNIT">
<span<?php echo $store_storemast->UNIT->viewAttributes() ?>>
<?php echo $store_storemast->UNIT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->FORMULARY->Visible) { // FORMULARY ?>
		<td<?php echo $store_storemast->FORMULARY->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_FORMULARY" class="store_storemast_FORMULARY">
<span<?php echo $store_storemast->FORMULARY->viewAttributes() ?>>
<?php echo $store_storemast->FORMULARY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->STOCK->Visible) { // STOCK ?>
		<td<?php echo $store_storemast->STOCK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_STOCK" class="store_storemast_STOCK">
<span<?php echo $store_storemast->STOCK->viewAttributes() ?>>
<?php echo $store_storemast->STOCK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->RACKNO->Visible) { // RACKNO ?>
		<td<?php echo $store_storemast->RACKNO->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_RACKNO" class="store_storemast_RACKNO">
<span<?php echo $store_storemast->RACKNO->viewAttributes() ?>>
<?php echo $store_storemast->RACKNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->SUPPNAME->Visible) { // SUPPNAME ?>
		<td<?php echo $store_storemast->SUPPNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME">
<span<?php echo $store_storemast->SUPPNAME->viewAttributes() ?>>
<?php echo $store_storemast->SUPPNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->COMBNAME->Visible) { // COMBNAME ?>
		<td<?php echo $store_storemast->COMBNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_COMBNAME" class="store_storemast_COMBNAME">
<span<?php echo $store_storemast->COMBNAME->viewAttributes() ?>>
<?php echo $store_storemast->COMBNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
		<td<?php echo $store_storemast->GENERICNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME">
<span<?php echo $store_storemast->GENERICNAME->viewAttributes() ?>>
<?php echo $store_storemast->GENERICNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->REMARK->Visible) { // REMARK ?>
		<td<?php echo $store_storemast->REMARK->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_REMARK" class="store_storemast_REMARK">
<span<?php echo $store_storemast->REMARK->viewAttributes() ?>>
<?php echo $store_storemast->REMARK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->TEMP->Visible) { // TEMP ?>
		<td<?php echo $store_storemast->TEMP->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_TEMP" class="store_storemast_TEMP">
<span<?php echo $store_storemast->TEMP->viewAttributes() ?>>
<?php echo $store_storemast->TEMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PACKING->Visible) { // PACKING ?>
		<td<?php echo $store_storemast->PACKING->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PACKING" class="store_storemast_PACKING">
<span<?php echo $store_storemast->PACKING->viewAttributes() ?>>
<?php echo $store_storemast->PACKING->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PhysQty->Visible) { // PhysQty ?>
		<td<?php echo $store_storemast->PhysQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PhysQty" class="store_storemast_PhysQty">
<span<?php echo $store_storemast->PhysQty->viewAttributes() ?>>
<?php echo $store_storemast->PhysQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->LedQty->Visible) { // LedQty ?>
		<td<?php echo $store_storemast->LedQty->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_LedQty" class="store_storemast_LedQty">
<span<?php echo $store_storemast->LedQty->viewAttributes() ?>>
<?php echo $store_storemast->LedQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->id->Visible) { // id ?>
		<td<?php echo $store_storemast->id->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_id" class="store_storemast_id">
<span<?php echo $store_storemast->id->viewAttributes() ?>>
<?php echo $store_storemast->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PurValue->Visible) { // PurValue ?>
		<td<?php echo $store_storemast->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PurValue" class="store_storemast_PurValue">
<span<?php echo $store_storemast->PurValue->viewAttributes() ?>>
<?php echo $store_storemast->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PSGST->Visible) { // PSGST ?>
		<td<?php echo $store_storemast->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PSGST" class="store_storemast_PSGST">
<span<?php echo $store_storemast->PSGST->viewAttributes() ?>>
<?php echo $store_storemast->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->PCGST->Visible) { // PCGST ?>
		<td<?php echo $store_storemast->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_PCGST" class="store_storemast_PCGST">
<span<?php echo $store_storemast->PCGST->viewAttributes() ?>>
<?php echo $store_storemast->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->SaleValue->Visible) { // SaleValue ?>
		<td<?php echo $store_storemast->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_SaleValue" class="store_storemast_SaleValue">
<span<?php echo $store_storemast->SaleValue->viewAttributes() ?>>
<?php echo $store_storemast->SaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->SSGST->Visible) { // SSGST ?>
		<td<?php echo $store_storemast->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_SSGST" class="store_storemast_SSGST">
<span<?php echo $store_storemast->SSGST->viewAttributes() ?>>
<?php echo $store_storemast->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->SCGST->Visible) { // SCGST ?>
		<td<?php echo $store_storemast->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_SCGST" class="store_storemast_SCGST">
<span<?php echo $store_storemast->SCGST->viewAttributes() ?>>
<?php echo $store_storemast->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->SaleRate->Visible) { // SaleRate ?>
		<td<?php echo $store_storemast->SaleRate->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_SaleRate" class="store_storemast_SaleRate">
<span<?php echo $store_storemast->SaleRate->viewAttributes() ?>>
<?php echo $store_storemast->SaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->HospID->Visible) { // HospID ?>
		<td<?php echo $store_storemast->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_HospID" class="store_storemast_HospID">
<span<?php echo $store_storemast->HospID->viewAttributes() ?>>
<?php echo $store_storemast->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->BRNAME->Visible) { // BRNAME ?>
		<td<?php echo $store_storemast->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_BRNAME" class="store_storemast_BRNAME">
<span<?php echo $store_storemast->BRNAME->viewAttributes() ?>>
<?php echo $store_storemast->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->OV->Visible) { // OV ?>
		<td<?php echo $store_storemast->OV->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_OV" class="store_storemast_OV">
<span<?php echo $store_storemast->OV->viewAttributes() ?>>
<?php echo $store_storemast->OV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->LATESTOV->Visible) { // LATESTOV ?>
		<td<?php echo $store_storemast->LATESTOV->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_LATESTOV" class="store_storemast_LATESTOV">
<span<?php echo $store_storemast->LATESTOV->viewAttributes() ?>>
<?php echo $store_storemast->LATESTOV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->ITEMTYPE->Visible) { // ITEMTYPE ?>
		<td<?php echo $store_storemast->ITEMTYPE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_ITEMTYPE" class="store_storemast_ITEMTYPE">
<span<?php echo $store_storemast->ITEMTYPE->viewAttributes() ?>>
<?php echo $store_storemast->ITEMTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->ROWID->Visible) { // ROWID ?>
		<td<?php echo $store_storemast->ROWID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_ROWID" class="store_storemast_ROWID">
<span<?php echo $store_storemast->ROWID->viewAttributes() ?>>
<?php echo $store_storemast->ROWID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->MOVED->Visible) { // MOVED ?>
		<td<?php echo $store_storemast->MOVED->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_MOVED" class="store_storemast_MOVED">
<span<?php echo $store_storemast->MOVED->viewAttributes() ?>>
<?php echo $store_storemast->MOVED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->NEWTAX->Visible) { // NEWTAX ?>
		<td<?php echo $store_storemast->NEWTAX->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_NEWTAX" class="store_storemast_NEWTAX">
<span<?php echo $store_storemast->NEWTAX->viewAttributes() ?>>
<?php echo $store_storemast->NEWTAX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->HSNCODE->Visible) { // HSNCODE ?>
		<td<?php echo $store_storemast->HSNCODE->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_HSNCODE" class="store_storemast_HSNCODE">
<span<?php echo $store_storemast->HSNCODE->viewAttributes() ?>>
<?php echo $store_storemast->HSNCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->OLDTAX->Visible) { // OLDTAX ?>
		<td<?php echo $store_storemast->OLDTAX->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_OLDTAX" class="store_storemast_OLDTAX">
<span<?php echo $store_storemast->OLDTAX->viewAttributes() ?>>
<?php echo $store_storemast->OLDTAX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_storemast->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_storemast->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_storemast_delete->RowCnt ?>_store_storemast_StoreID" class="store_storemast_StoreID">
<span<?php echo $store_storemast->StoreID->viewAttributes() ?>>
<?php echo $store_storemast->StoreID->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_storemast_delete->terminate();
?>