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
$pharmacy_pharled_delete = new pharmacy_pharled_delete();

// Run the page
$pharmacy_pharled_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_pharled_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_pharleddelete = currentForm = new ew.Form("fpharmacy_pharleddelete", "delete");

// Form_CustomValidate event
fpharmacy_pharleddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_pharleddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_pharleddelete.lists["x_SLNO"] = <?php echo $pharmacy_pharled_delete->SLNO->Lookup->toClientList() ?>;
fpharmacy_pharleddelete.lists["x_SLNO"].options = <?php echo JsonEncode($pharmacy_pharled_delete->SLNO->lookupOptions()) ?>;
fpharmacy_pharleddelete.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_pharled_delete->showPageHeader(); ?>
<?php
$pharmacy_pharled_delete->showMessage();
?>
<form name="fpharmacy_pharleddelete" id="fpharmacy_pharleddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_pharled_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_pharled_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_pharled_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
		<th class="<?php echo $pharmacy_pharled->SiNo->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><?php echo $pharmacy_pharled->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
		<th class="<?php echo $pharmacy_pharled->SLNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><?php echo $pharmacy_pharled->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
		<th class="<?php echo $pharmacy_pharled->Product->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><?php echo $pharmacy_pharled->Product->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
		<th class="<?php echo $pharmacy_pharled->RT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><?php echo $pharmacy_pharled->RT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
		<th class="<?php echo $pharmacy_pharled->IQ->headerCellClass() ?>"><span id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><?php echo $pharmacy_pharled->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
		<th class="<?php echo $pharmacy_pharled->DAMT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><?php echo $pharmacy_pharled->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
		<th class="<?php echo $pharmacy_pharled->Mfg->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><?php echo $pharmacy_pharled->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $pharmacy_pharled->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><?php echo $pharmacy_pharled->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $pharmacy_pharled->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><?php echo $pharmacy_pharled->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_pharled->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><?php echo $pharmacy_pharled->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_pharled->PRC->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><?php echo $pharmacy_pharled->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
		<th class="<?php echo $pharmacy_pharled->UR->headerCellClass() ?>"><span id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><?php echo $pharmacy_pharled->UR->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
		<th class="<?php echo $pharmacy_pharled->_USERID->headerCellClass() ?>"><span id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><?php echo $pharmacy_pharled->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_pharled->id->headerCellClass() ?>"><span id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><?php echo $pharmacy_pharled->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
		<th class="<?php echo $pharmacy_pharled->HosoID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><?php echo $pharmacy_pharled->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_pharled->createdby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><?php echo $pharmacy_pharled->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_pharled->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><?php echo $pharmacy_pharled->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_pharled->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><?php echo $pharmacy_pharled->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_pharled->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $pharmacy_pharled->BRNAME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><?php echo $pharmacy_pharled->BRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
		<th class="<?php echo $pharmacy_pharled->baid->headerCellClass() ?>"><span id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid"><?php echo $pharmacy_pharled->baid->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
		<th class="<?php echo $pharmacy_pharled->isdate->headerCellClass() ?>"><span id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate"><?php echo $pharmacy_pharled->isdate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $pharmacy_pharled->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST"><?php echo $pharmacy_pharled->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $pharmacy_pharled->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST"><?php echo $pharmacy_pharled->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $pharmacy_pharled->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST"><?php echo $pharmacy_pharled->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $pharmacy_pharled->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST"><?php echo $pharmacy_pharled->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $pharmacy_pharled->PurValue->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue"><?php echo $pharmacy_pharled->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
		<th class="<?php echo $pharmacy_pharled->PurRate->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate"><?php echo $pharmacy_pharled->PurRate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<th class="<?php echo $pharmacy_pharled->PUnit->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit"><?php echo $pharmacy_pharled->PUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
		<th class="<?php echo $pharmacy_pharled->SUnit->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit"><?php echo $pharmacy_pharled->SUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
		<th class="<?php echo $pharmacy_pharled->HSNCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE"><?php echo $pharmacy_pharled->HSNCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_pharled_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_pharled_delete->Recordset->EOF) {
	$pharmacy_pharled_delete->RecCnt++;
	$pharmacy_pharled_delete->RowCnt++;

	// Set row properties
	$pharmacy_pharled->resetAttributes();
	$pharmacy_pharled->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_pharled_delete->loadRowValues($pharmacy_pharled_delete->Recordset);

	// Render row
	$pharmacy_pharled_delete->renderRow();
?>
	<tr<?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
		<td<?php echo $pharmacy_pharled->SiNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled->SiNo->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
		<td<?php echo $pharmacy_pharled->SLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled->SLNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
		<td<?php echo $pharmacy_pharled->Product->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled->Product->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
		<td<?php echo $pharmacy_pharled->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled->RT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
		<td<?php echo $pharmacy_pharled->IQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled->IQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
		<td<?php echo $pharmacy_pharled->DAMT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled->DAMT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
		<td<?php echo $pharmacy_pharled->Mfg->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled->Mfg->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $pharmacy_pharled->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $pharmacy_pharled->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $pharmacy_pharled->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
		<td<?php echo $pharmacy_pharled->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled->PRC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
		<td<?php echo $pharmacy_pharled->UR->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled->UR->viewAttributes() ?>>
<?php echo $pharmacy_pharled->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
		<td<?php echo $pharmacy_pharled->_USERID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled->_USERID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
		<td<?php echo $pharmacy_pharled->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_id" class="pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<?php echo $pharmacy_pharled->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
		<td<?php echo $pharmacy_pharled->HosoID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled->HosoID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_pharled->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled->createdby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_pharled->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_pharled->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_pharled->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
		<td<?php echo $pharmacy_pharled->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
		<td<?php echo $pharmacy_pharled->baid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_baid" class="pharmacy_pharled_baid">
<span<?php echo $pharmacy_pharled->baid->viewAttributes() ?>>
<?php echo $pharmacy_pharled->baid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
		<td<?php echo $pharmacy_pharled->isdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate">
<span<?php echo $pharmacy_pharled->isdate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->isdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<td<?php echo $pharmacy_pharled->PSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST">
<span<?php echo $pharmacy_pharled->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<td<?php echo $pharmacy_pharled->PCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST">
<span<?php echo $pharmacy_pharled->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<td<?php echo $pharmacy_pharled->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST">
<span<?php echo $pharmacy_pharled->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<td<?php echo $pharmacy_pharled->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST">
<span<?php echo $pharmacy_pharled->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<td<?php echo $pharmacy_pharled->PurValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue">
<span<?php echo $pharmacy_pharled->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
		<td<?php echo $pharmacy_pharled->PurRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate">
<span<?php echo $pharmacy_pharled->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<td<?php echo $pharmacy_pharled->PUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit">
<span<?php echo $pharmacy_pharled->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
		<td<?php echo $pharmacy_pharled->SUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit">
<span<?php echo $pharmacy_pharled->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
		<td<?php echo $pharmacy_pharled->HSNCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCnt ?>_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE">
<span<?php echo $pharmacy_pharled->HSNCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HSNCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_pharled_delete->Recordset->moveNext();
}
$pharmacy_pharled_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_pharled_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_pharled_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

	  document.getElementById("btn-action").innerText = "Return Item";
</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_pharled_delete->terminate();
?>