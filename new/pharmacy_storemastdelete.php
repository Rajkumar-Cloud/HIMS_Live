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
$pharmacy_storemast_delete = new pharmacy_storemast_delete();

// Run the page
$pharmacy_storemast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_storemastdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_storemastdelete = currentForm = new ew.Form("fpharmacy_storemastdelete", "delete");
	loadjs.done("fpharmacy_storemastdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_storemast_delete->showPageHeader(); ?>
<?php
$pharmacy_storemast_delete->showMessage();
?>
<form name="fpharmacy_storemastdelete" id="fpharmacy_storemastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_storemast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_storemast_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_storemast_delete->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE"><?php echo $pharmacy_storemast_delete->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_storemast_delete->PRC->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC"><?php echo $pharmacy_storemast_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->TYPE->Visible) { // TYPE ?>
		<th class="<?php echo $pharmacy_storemast_delete->TYPE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE"><?php echo $pharmacy_storemast_delete->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->DES->Visible) { // DES ?>
		<th class="<?php echo $pharmacy_storemast_delete->DES->headerCellClass() ?>"><span id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES"><?php echo $pharmacy_storemast_delete->DES->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->UM->Visible) { // UM ?>
		<th class="<?php echo $pharmacy_storemast_delete->UM->headerCellClass() ?>"><span id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM"><?php echo $pharmacy_storemast_delete->UM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->RT->Visible) { // RT ?>
		<th class="<?php echo $pharmacy_storemast_delete->RT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT"><?php echo $pharmacy_storemast_delete->RT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $pharmacy_storemast_delete->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO"><?php echo $pharmacy_storemast_delete->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->MRP->Visible) { // MRP ?>
		<th class="<?php echo $pharmacy_storemast_delete->MRP->headerCellClass() ?>"><span id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP"><?php echo $pharmacy_storemast_delete->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $pharmacy_storemast_delete->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT"><?php echo $pharmacy_storemast_delete->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $pharmacy_storemast_delete->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME"><?php echo $pharmacy_storemast_delete->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->CREATEDDT->Visible) { // CREATEDDT ?>
		<th class="<?php echo $pharmacy_storemast_delete->CREATEDDT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT"><?php echo $pharmacy_storemast_delete->CREATEDDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->DRID->Visible) { // DRID ?>
		<th class="<?php echo $pharmacy_storemast_delete->DRID->headerCellClass() ?>"><span id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID"><?php echo $pharmacy_storemast_delete->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $pharmacy_storemast_delete->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE"><?php echo $pharmacy_storemast_delete->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->COMBCODE->Visible) { // COMBCODE ?>
		<th class="<?php echo $pharmacy_storemast_delete->COMBCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE"><?php echo $pharmacy_storemast_delete->COMBCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->GENCODE->Visible) { // GENCODE ?>
		<th class="<?php echo $pharmacy_storemast_delete->GENCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE"><?php echo $pharmacy_storemast_delete->GENCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->STRENGTH->Visible) { // STRENGTH ?>
		<th class="<?php echo $pharmacy_storemast_delete->STRENGTH->headerCellClass() ?>"><span id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH"><?php echo $pharmacy_storemast_delete->STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->UNIT->Visible) { // UNIT ?>
		<th class="<?php echo $pharmacy_storemast_delete->UNIT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT"><?php echo $pharmacy_storemast_delete->UNIT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->FORMULARY->Visible) { // FORMULARY ?>
		<th class="<?php echo $pharmacy_storemast_delete->FORMULARY->headerCellClass() ?>"><span id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY"><?php echo $pharmacy_storemast_delete->FORMULARY->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->COMBNAME->Visible) { // COMBNAME ?>
		<th class="<?php echo $pharmacy_storemast_delete->COMBNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME"><?php echo $pharmacy_storemast_delete->COMBNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->GENERICNAME->Visible) { // GENERICNAME ?>
		<th class="<?php echo $pharmacy_storemast_delete->GENERICNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME"><?php echo $pharmacy_storemast_delete->GENERICNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->REMARK->Visible) { // REMARK ?>
		<th class="<?php echo $pharmacy_storemast_delete->REMARK->headerCellClass() ?>"><span id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK"><?php echo $pharmacy_storemast_delete->REMARK->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->TEMP->Visible) { // TEMP ?>
		<th class="<?php echo $pharmacy_storemast_delete->TEMP->headerCellClass() ?>"><span id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP"><?php echo $pharmacy_storemast_delete->TEMP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_storemast_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id"><?php echo $pharmacy_storemast_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $pharmacy_storemast_delete->PurValue->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue"><?php echo $pharmacy_storemast_delete->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $pharmacy_storemast_delete->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST"><?php echo $pharmacy_storemast_delete->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $pharmacy_storemast_delete->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST"><?php echo $pharmacy_storemast_delete->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SaleValue->Visible) { // SaleValue ?>
		<th class="<?php echo $pharmacy_storemast_delete->SaleValue->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue"><?php echo $pharmacy_storemast_delete->SaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $pharmacy_storemast_delete->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST"><?php echo $pharmacy_storemast_delete->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $pharmacy_storemast_delete->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST"><?php echo $pharmacy_storemast_delete->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SaleRate->Visible) { // SaleRate ?>
		<th class="<?php echo $pharmacy_storemast_delete->SaleRate->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate"><?php echo $pharmacy_storemast_delete->SaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_storemast_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID"><?php echo $pharmacy_storemast_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast_delete->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $pharmacy_storemast_delete->BRNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME"><?php echo $pharmacy_storemast_delete->BRNAME->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_storemast_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_storemast_delete->Recordset->EOF) {
	$pharmacy_storemast_delete->RecordCount++;
	$pharmacy_storemast_delete->RowCount++;

	// Set row properties
	$pharmacy_storemast->resetAttributes();
	$pharmacy_storemast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_storemast_delete->loadRowValues($pharmacy_storemast_delete->Recordset);

	// Render row
	$pharmacy_storemast_delete->renderRow();
?>
	<tr <?php echo $pharmacy_storemast->rowAttributes() ?>>
<?php if ($pharmacy_storemast_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $pharmacy_storemast_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE">
<span<?php echo $pharmacy_storemast_delete->BRCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $pharmacy_storemast_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC">
<span<?php echo $pharmacy_storemast_delete->PRC->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->TYPE->Visible) { // TYPE ?>
		<td <?php echo $pharmacy_storemast_delete->TYPE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE">
<span<?php echo $pharmacy_storemast_delete->TYPE->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->DES->Visible) { // DES ?>
		<td <?php echo $pharmacy_storemast_delete->DES->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_DES" class="pharmacy_storemast_DES">
<span<?php echo $pharmacy_storemast_delete->DES->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->DES->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->UM->Visible) { // UM ?>
		<td <?php echo $pharmacy_storemast_delete->UM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_UM" class="pharmacy_storemast_UM">
<span<?php echo $pharmacy_storemast_delete->UM->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->RT->Visible) { // RT ?>
		<td <?php echo $pharmacy_storemast_delete->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_RT" class="pharmacy_storemast_RT">
<span<?php echo $pharmacy_storemast_delete->RT->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->BATCHNO->Visible) { // BATCHNO ?>
		<td <?php echo $pharmacy_storemast_delete->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO">
<span<?php echo $pharmacy_storemast_delete->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->MRP->Visible) { // MRP ?>
		<td <?php echo $pharmacy_storemast_delete->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP">
<span<?php echo $pharmacy_storemast_delete->MRP->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->EXPDT->Visible) { // EXPDT ?>
		<td <?php echo $pharmacy_storemast_delete->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT">
<span<?php echo $pharmacy_storemast_delete->EXPDT->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->GENNAME->Visible) { // GENNAME ?>
		<td <?php echo $pharmacy_storemast_delete->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME">
<span<?php echo $pharmacy_storemast_delete->GENNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->CREATEDDT->Visible) { // CREATEDDT ?>
		<td <?php echo $pharmacy_storemast_delete->CREATEDDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT">
<span<?php echo $pharmacy_storemast_delete->CREATEDDT->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->CREATEDDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->DRID->Visible) { // DRID ?>
		<td <?php echo $pharmacy_storemast_delete->DRID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID">
<span<?php echo $pharmacy_storemast_delete->DRID->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->MFRCODE->Visible) { // MFRCODE ?>
		<td <?php echo $pharmacy_storemast_delete->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE">
<span<?php echo $pharmacy_storemast_delete->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->COMBCODE->Visible) { // COMBCODE ?>
		<td <?php echo $pharmacy_storemast_delete->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE">
<span<?php echo $pharmacy_storemast_delete->COMBCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->COMBCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->GENCODE->Visible) { // GENCODE ?>
		<td <?php echo $pharmacy_storemast_delete->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE">
<span<?php echo $pharmacy_storemast_delete->GENCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->GENCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->STRENGTH->Visible) { // STRENGTH ?>
		<td <?php echo $pharmacy_storemast_delete->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH">
<span<?php echo $pharmacy_storemast_delete->STRENGTH->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->UNIT->Visible) { // UNIT ?>
		<td <?php echo $pharmacy_storemast_delete->UNIT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT">
<span<?php echo $pharmacy_storemast_delete->UNIT->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->UNIT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->FORMULARY->Visible) { // FORMULARY ?>
		<td <?php echo $pharmacy_storemast_delete->FORMULARY->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY">
<span<?php echo $pharmacy_storemast_delete->FORMULARY->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->FORMULARY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->COMBNAME->Visible) { // COMBNAME ?>
		<td <?php echo $pharmacy_storemast_delete->COMBNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME">
<span<?php echo $pharmacy_storemast_delete->COMBNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->COMBNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->GENERICNAME->Visible) { // GENERICNAME ?>
		<td <?php echo $pharmacy_storemast_delete->GENERICNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME">
<span<?php echo $pharmacy_storemast_delete->GENERICNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->GENERICNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->REMARK->Visible) { // REMARK ?>
		<td <?php echo $pharmacy_storemast_delete->REMARK->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK">
<span<?php echo $pharmacy_storemast_delete->REMARK->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->REMARK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->TEMP->Visible) { // TEMP ?>
		<td <?php echo $pharmacy_storemast_delete->TEMP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP">
<span<?php echo $pharmacy_storemast_delete->TEMP->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->TEMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_storemast_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_id" class="pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast_delete->id->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PurValue->Visible) { // PurValue ?>
		<td <?php echo $pharmacy_storemast_delete->PurValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue">
<span<?php echo $pharmacy_storemast_delete->PurValue->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PSGST->Visible) { // PSGST ?>
		<td <?php echo $pharmacy_storemast_delete->PSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST">
<span<?php echo $pharmacy_storemast_delete->PSGST->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->PCGST->Visible) { // PCGST ?>
		<td <?php echo $pharmacy_storemast_delete->PCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST">
<span<?php echo $pharmacy_storemast_delete->PCGST->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SaleValue->Visible) { // SaleValue ?>
		<td <?php echo $pharmacy_storemast_delete->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue">
<span<?php echo $pharmacy_storemast_delete->SaleValue->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->SaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SSGST->Visible) { // SSGST ?>
		<td <?php echo $pharmacy_storemast_delete->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST">
<span<?php echo $pharmacy_storemast_delete->SSGST->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SCGST->Visible) { // SCGST ?>
		<td <?php echo $pharmacy_storemast_delete->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST">
<span<?php echo $pharmacy_storemast_delete->SCGST->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->SaleRate->Visible) { // SaleRate ?>
		<td <?php echo $pharmacy_storemast_delete->SaleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate">
<span<?php echo $pharmacy_storemast_delete->SaleRate->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->SaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_storemast_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID">
<span<?php echo $pharmacy_storemast_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast_delete->BRNAME->Visible) { // BRNAME ?>
		<td <?php echo $pharmacy_storemast_delete->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCount ?>_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME">
<span<?php echo $pharmacy_storemast_delete->BRNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_delete->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_storemast_delete->Recordset->moveNext();
}
$pharmacy_storemast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_storemast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_storemast_delete->showPageFooter();
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
$pharmacy_storemast_delete->terminate();
?>