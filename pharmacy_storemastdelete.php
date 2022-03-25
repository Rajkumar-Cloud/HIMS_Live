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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_storemastdelete = currentForm = new ew.Form("fpharmacy_storemastdelete", "delete");

// Form_CustomValidate event
fpharmacy_storemastdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_storemastdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_storemastdelete.lists["x_TYPE"] = <?php echo $pharmacy_storemast_delete->TYPE->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_TYPE"].options = <?php echo JsonEncode($pharmacy_storemast_delete->TYPE->options(FALSE, TRUE)) ?>;
fpharmacy_storemastdelete.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_delete->GENNAME->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_delete->GENNAME->lookupOptions()) ?>;
fpharmacy_storemastdelete.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_storemastdelete.lists["x_DRID"] = <?php echo $pharmacy_storemast_delete->DRID->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_DRID"].options = <?php echo JsonEncode($pharmacy_storemast_delete->DRID->lookupOptions()) ?>;
fpharmacy_storemastdelete.lists["x_MFRCODE"] = <?php echo $pharmacy_storemast_delete->MFRCODE->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_MFRCODE"].options = <?php echo JsonEncode($pharmacy_storemast_delete->MFRCODE->lookupOptions()) ?>;
fpharmacy_storemastdelete.lists["x_COMBCODE"] = <?php echo $pharmacy_storemast_delete->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_storemast_delete->COMBCODE->lookupOptions()) ?>;
fpharmacy_storemastdelete.lists["x_GENCODE"] = <?php echo $pharmacy_storemast_delete->GENCODE->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_storemast_delete->GENCODE->lookupOptions()) ?>;
fpharmacy_storemastdelete.lists["x_UNIT"] = <?php echo $pharmacy_storemast_delete->UNIT->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_UNIT"].options = <?php echo JsonEncode($pharmacy_storemast_delete->UNIT->options(FALSE, TRUE)) ?>;
fpharmacy_storemastdelete.lists["x_FORMULARY"] = <?php echo $pharmacy_storemast_delete->FORMULARY->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_FORMULARY"].options = <?php echo JsonEncode($pharmacy_storemast_delete->FORMULARY->options(FALSE, TRUE)) ?>;
fpharmacy_storemastdelete.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_delete->COMBNAME->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_delete->COMBNAME->lookupOptions()) ?>;
fpharmacy_storemastdelete.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_delete->GENERICNAME->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_delete->GENERICNAME->lookupOptions()) ?>;
fpharmacy_storemastdelete.lists["x_Scheduling"] = <?php echo $pharmacy_storemast_delete->Scheduling->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_Scheduling"].options = <?php echo JsonEncode($pharmacy_storemast_delete->Scheduling->options(FALSE, TRUE)) ?>;
fpharmacy_storemastdelete.lists["x_Schedulingh1"] = <?php echo $pharmacy_storemast_delete->Schedulingh1->Lookup->toClientList() ?>;
fpharmacy_storemastdelete.lists["x_Schedulingh1"].options = <?php echo JsonEncode($pharmacy_storemast_delete->Schedulingh1->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_storemast_delete->showPageHeader(); ?>
<?php
$pharmacy_storemast_delete->showMessage();
?>
<form name="fpharmacy_storemastdelete" id="fpharmacy_storemastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_storemast_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_storemast_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_storemast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_storemast->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE"><?php echo $pharmacy_storemast->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_storemast->PRC->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC"><?php echo $pharmacy_storemast->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
		<th class="<?php echo $pharmacy_storemast->TYPE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE"><?php echo $pharmacy_storemast->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
		<th class="<?php echo $pharmacy_storemast->DES->headerCellClass() ?>"><span id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES"><?php echo $pharmacy_storemast->DES->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
		<th class="<?php echo $pharmacy_storemast->UM->headerCellClass() ?>"><span id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM"><?php echo $pharmacy_storemast->UM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
		<th class="<?php echo $pharmacy_storemast->RT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT"><?php echo $pharmacy_storemast->RT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $pharmacy_storemast->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO"><?php echo $pharmacy_storemast->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
		<th class="<?php echo $pharmacy_storemast->MRP->headerCellClass() ?>"><span id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP"><?php echo $pharmacy_storemast->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $pharmacy_storemast->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT"><?php echo $pharmacy_storemast->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $pharmacy_storemast->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME"><?php echo $pharmacy_storemast->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
		<th class="<?php echo $pharmacy_storemast->CREATEDDT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT"><?php echo $pharmacy_storemast->CREATEDDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
		<th class="<?php echo $pharmacy_storemast->DRID->headerCellClass() ?>"><span id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID"><?php echo $pharmacy_storemast->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $pharmacy_storemast->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE"><?php echo $pharmacy_storemast->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
		<th class="<?php echo $pharmacy_storemast->COMBCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE"><?php echo $pharmacy_storemast->COMBCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
		<th class="<?php echo $pharmacy_storemast->GENCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE"><?php echo $pharmacy_storemast->GENCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
		<th class="<?php echo $pharmacy_storemast->STRENGTH->headerCellClass() ?>"><span id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH"><?php echo $pharmacy_storemast->STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
		<th class="<?php echo $pharmacy_storemast->UNIT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT"><?php echo $pharmacy_storemast->UNIT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
		<th class="<?php echo $pharmacy_storemast->FORMULARY->headerCellClass() ?>"><span id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY"><?php echo $pharmacy_storemast->FORMULARY->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
		<th class="<?php echo $pharmacy_storemast->COMBNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME"><?php echo $pharmacy_storemast->COMBNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
		<th class="<?php echo $pharmacy_storemast->GENERICNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME"><?php echo $pharmacy_storemast->GENERICNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
		<th class="<?php echo $pharmacy_storemast->REMARK->headerCellClass() ?>"><span id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK"><?php echo $pharmacy_storemast->REMARK->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
		<th class="<?php echo $pharmacy_storemast->TEMP->headerCellClass() ?>"><span id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP"><?php echo $pharmacy_storemast->TEMP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_storemast->id->headerCellClass() ?>"><span id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id"><?php echo $pharmacy_storemast->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $pharmacy_storemast->PurValue->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue"><?php echo $pharmacy_storemast->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $pharmacy_storemast->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST"><?php echo $pharmacy_storemast->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $pharmacy_storemast->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST"><?php echo $pharmacy_storemast->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
		<th class="<?php echo $pharmacy_storemast->SaleValue->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue"><?php echo $pharmacy_storemast->SaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $pharmacy_storemast->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST"><?php echo $pharmacy_storemast->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $pharmacy_storemast->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST"><?php echo $pharmacy_storemast->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
		<th class="<?php echo $pharmacy_storemast->SaleRate->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate"><?php echo $pharmacy_storemast->SaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_storemast->HospID->headerCellClass() ?>"><span id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID"><?php echo $pharmacy_storemast->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $pharmacy_storemast->BRNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME"><?php echo $pharmacy_storemast->BRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
		<th class="<?php echo $pharmacy_storemast->Scheduling->headerCellClass() ?>"><span id="elh_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling"><?php echo $pharmacy_storemast->Scheduling->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
		<th class="<?php echo $pharmacy_storemast->Schedulingh1->headerCellClass() ?>"><span id="elh_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1"><?php echo $pharmacy_storemast->Schedulingh1->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_storemast_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_storemast_delete->Recordset->EOF) {
	$pharmacy_storemast_delete->RecCnt++;
	$pharmacy_storemast_delete->RowCnt++;

	// Set row properties
	$pharmacy_storemast->resetAttributes();
	$pharmacy_storemast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_storemast_delete->loadRowValues($pharmacy_storemast_delete->Recordset);

	// Render row
	$pharmacy_storemast_delete->renderRow();
?>
	<tr<?php echo $pharmacy_storemast->rowAttributes() ?>>
<?php if ($pharmacy_storemast->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $pharmacy_storemast->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE">
<span<?php echo $pharmacy_storemast->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->PRC->Visible) { // PRC ?>
		<td<?php echo $pharmacy_storemast->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC">
<span<?php echo $pharmacy_storemast->PRC->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->TYPE->Visible) { // TYPE ?>
		<td<?php echo $pharmacy_storemast->TYPE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE">
<span<?php echo $pharmacy_storemast->TYPE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->DES->Visible) { // DES ?>
		<td<?php echo $pharmacy_storemast->DES->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_DES" class="pharmacy_storemast_DES">
<span<?php echo $pharmacy_storemast->DES->viewAttributes() ?>>
<?php echo $pharmacy_storemast->DES->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->UM->Visible) { // UM ?>
		<td<?php echo $pharmacy_storemast->UM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_UM" class="pharmacy_storemast_UM">
<span<?php echo $pharmacy_storemast->UM->viewAttributes() ?>>
<?php echo $pharmacy_storemast->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->RT->Visible) { // RT ?>
		<td<?php echo $pharmacy_storemast->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_RT" class="pharmacy_storemast_RT">
<span<?php echo $pharmacy_storemast->RT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $pharmacy_storemast->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO">
<span<?php echo $pharmacy_storemast->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->MRP->Visible) { // MRP ?>
		<td<?php echo $pharmacy_storemast->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP">
<span<?php echo $pharmacy_storemast->MRP->viewAttributes() ?>>
<?php echo $pharmacy_storemast->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $pharmacy_storemast->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT">
<span<?php echo $pharmacy_storemast->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->GENNAME->Visible) { // GENNAME ?>
		<td<?php echo $pharmacy_storemast->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME">
<span<?php echo $pharmacy_storemast->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->CREATEDDT->Visible) { // CREATEDDT ?>
		<td<?php echo $pharmacy_storemast->CREATEDDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT">
<span<?php echo $pharmacy_storemast->CREATEDDT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->CREATEDDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->DRID->Visible) { // DRID ?>
		<td<?php echo $pharmacy_storemast->DRID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID">
<span<?php echo $pharmacy_storemast->DRID->viewAttributes() ?>>
<?php echo $pharmacy_storemast->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->MFRCODE->Visible) { // MFRCODE ?>
		<td<?php echo $pharmacy_storemast->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE">
<span<?php echo $pharmacy_storemast->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->COMBCODE->Visible) { // COMBCODE ?>
		<td<?php echo $pharmacy_storemast->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE">
<span<?php echo $pharmacy_storemast->COMBCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->COMBCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->GENCODE->Visible) { // GENCODE ?>
		<td<?php echo $pharmacy_storemast->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE">
<span<?php echo $pharmacy_storemast->GENCODE->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->STRENGTH->Visible) { // STRENGTH ?>
		<td<?php echo $pharmacy_storemast->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH">
<span<?php echo $pharmacy_storemast->STRENGTH->viewAttributes() ?>>
<?php echo $pharmacy_storemast->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->UNIT->Visible) { // UNIT ?>
		<td<?php echo $pharmacy_storemast->UNIT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT">
<span<?php echo $pharmacy_storemast->UNIT->viewAttributes() ?>>
<?php echo $pharmacy_storemast->UNIT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->FORMULARY->Visible) { // FORMULARY ?>
		<td<?php echo $pharmacy_storemast->FORMULARY->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY">
<span<?php echo $pharmacy_storemast->FORMULARY->viewAttributes() ?>>
<?php echo $pharmacy_storemast->FORMULARY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->COMBNAME->Visible) { // COMBNAME ?>
		<td<?php echo $pharmacy_storemast->COMBNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME">
<span<?php echo $pharmacy_storemast->COMBNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->COMBNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->GENERICNAME->Visible) { // GENERICNAME ?>
		<td<?php echo $pharmacy_storemast->GENERICNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME">
<span<?php echo $pharmacy_storemast->GENERICNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->GENERICNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->REMARK->Visible) { // REMARK ?>
		<td<?php echo $pharmacy_storemast->REMARK->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK">
<span<?php echo $pharmacy_storemast->REMARK->viewAttributes() ?>>
<?php echo $pharmacy_storemast->REMARK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->TEMP->Visible) { // TEMP ?>
		<td<?php echo $pharmacy_storemast->TEMP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP">
<span<?php echo $pharmacy_storemast->TEMP->viewAttributes() ?>>
<?php echo $pharmacy_storemast->TEMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->id->Visible) { // id ?>
		<td<?php echo $pharmacy_storemast->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_id" class="pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast->id->viewAttributes() ?>>
<?php echo $pharmacy_storemast->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->PurValue->Visible) { // PurValue ?>
		<td<?php echo $pharmacy_storemast->PurValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue">
<span<?php echo $pharmacy_storemast->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->PSGST->Visible) { // PSGST ?>
		<td<?php echo $pharmacy_storemast->PSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST">
<span<?php echo $pharmacy_storemast->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->PCGST->Visible) { // PCGST ?>
		<td<?php echo $pharmacy_storemast->PCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST">
<span<?php echo $pharmacy_storemast->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->SaleValue->Visible) { // SaleValue ?>
		<td<?php echo $pharmacy_storemast->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue">
<span<?php echo $pharmacy_storemast->SaleValue->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->SSGST->Visible) { // SSGST ?>
		<td<?php echo $pharmacy_storemast->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST">
<span<?php echo $pharmacy_storemast->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->SCGST->Visible) { // SCGST ?>
		<td<?php echo $pharmacy_storemast->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST">
<span<?php echo $pharmacy_storemast->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->SaleRate->Visible) { // SaleRate ?>
		<td<?php echo $pharmacy_storemast->SaleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate">
<span<?php echo $pharmacy_storemast->SaleRate->viewAttributes() ?>>
<?php echo $pharmacy_storemast->SaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_storemast->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID">
<span<?php echo $pharmacy_storemast->HospID->viewAttributes() ?>>
<?php echo $pharmacy_storemast->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->BRNAME->Visible) { // BRNAME ?>
		<td<?php echo $pharmacy_storemast->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME">
<span<?php echo $pharmacy_storemast->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_storemast->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->Scheduling->Visible) { // Scheduling ?>
		<td<?php echo $pharmacy_storemast->Scheduling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling">
<span<?php echo $pharmacy_storemast->Scheduling->viewAttributes() ?>>
<?php echo $pharmacy_storemast->Scheduling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_storemast->Schedulingh1->Visible) { // Schedulingh1 ?>
		<td<?php echo $pharmacy_storemast->Schedulingh1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_delete->RowCnt ?>_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1">
<span<?php echo $pharmacy_storemast->Schedulingh1->viewAttributes() ?>>
<?php echo $pharmacy_storemast->Schedulingh1->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_storemast_delete->terminate();
?>