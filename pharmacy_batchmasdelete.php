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
$pharmacy_batchmas_delete = new pharmacy_batchmas_delete();

// Run the page
$pharmacy_batchmas_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_batchmas_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_batchmasdelete = currentForm = new ew.Form("fpharmacy_batchmasdelete", "delete");

// Form_CustomValidate event
fpharmacy_batchmasdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_batchmasdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_batchmasdelete.lists["x_PrName"] = <?php echo $pharmacy_batchmas_delete->PrName->Lookup->toClientList() ?>;
fpharmacy_batchmasdelete.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_delete->PrName->lookupOptions()) ?>;
fpharmacy_batchmasdelete.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_batchmasdelete.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_delete->BRCODE->Lookup->toClientList() ?>;
fpharmacy_batchmasdelete.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_delete->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_batchmas_delete->showPageHeader(); ?>
<?php
$pharmacy_batchmas_delete->showMessage();
?>
<form name="fpharmacy_batchmasdelete" id="fpharmacy_batchmasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_batchmas_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_batchmas_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_batchmas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_batchmas->PRC->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC"><?php echo $pharmacy_batchmas->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
		<th class="<?php echo $pharmacy_batchmas->PrName->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName"><?php echo $pharmacy_batchmas->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $pharmacy_batchmas->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO"><?php echo $pharmacy_batchmas->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $pharmacy_batchmas->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE"><?php echo $pharmacy_batchmas->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $pharmacy_batchmas->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT"><?php echo $pharmacy_batchmas->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
		<th class="<?php echo $pharmacy_batchmas->PRCODE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE"><?php echo $pharmacy_batchmas->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
		<th class="<?php echo $pharmacy_batchmas->OQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ"><?php echo $pharmacy_batchmas->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
		<th class="<?php echo $pharmacy_batchmas->RQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ"><?php echo $pharmacy_batchmas->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
		<th class="<?php echo $pharmacy_batchmas->FRQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ"><?php echo $pharmacy_batchmas->FRQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
		<th class="<?php echo $pharmacy_batchmas->IQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ"><?php echo $pharmacy_batchmas->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $pharmacy_batchmas->MRQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ"><?php echo $pharmacy_batchmas->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
		<th class="<?php echo $pharmacy_batchmas->MRP->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP"><?php echo $pharmacy_batchmas->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
		<th class="<?php echo $pharmacy_batchmas->UR->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR"><?php echo $pharmacy_batchmas->UR->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $pharmacy_batchmas->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST"><?php echo $pharmacy_batchmas->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $pharmacy_batchmas->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST"><?php echo $pharmacy_batchmas->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
		<th class="<?php echo $pharmacy_batchmas->RT->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT"><?php echo $pharmacy_batchmas->RT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_batchmas->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE"><?php echo $pharmacy_batchmas->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_batchmas->HospID->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID"><?php echo $pharmacy_batchmas->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
		<th class="<?php echo $pharmacy_batchmas->UM->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM"><?php echo $pharmacy_batchmas->UM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $pharmacy_batchmas->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME"><?php echo $pharmacy_batchmas->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
		<th class="<?php echo $pharmacy_batchmas->BILLDATE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE"><?php echo $pharmacy_batchmas->BILLDATE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
		<th class="<?php echo $pharmacy_batchmas->PUnit->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PUnit" class="pharmacy_batchmas_PUnit"><?php echo $pharmacy_batchmas->PUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
		<th class="<?php echo $pharmacy_batchmas->SUnit->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_SUnit" class="pharmacy_batchmas_SUnit"><?php echo $pharmacy_batchmas->SUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $pharmacy_batchmas->PurValue->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PurValue" class="pharmacy_batchmas_PurValue"><?php echo $pharmacy_batchmas->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
		<th class="<?php echo $pharmacy_batchmas->PurRate->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PurRate" class="pharmacy_batchmas_PurRate"><?php echo $pharmacy_batchmas->PurRate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_batchmas_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_batchmas_delete->Recordset->EOF) {
	$pharmacy_batchmas_delete->RecCnt++;
	$pharmacy_batchmas_delete->RowCnt++;

	// Set row properties
	$pharmacy_batchmas->resetAttributes();
	$pharmacy_batchmas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_batchmas_delete->loadRowValues($pharmacy_batchmas_delete->Recordset);

	// Render row
	$pharmacy_batchmas_delete->renderRow();
?>
	<tr<?php echo $pharmacy_batchmas->rowAttributes() ?>>
<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
		<td<?php echo $pharmacy_batchmas->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC">
<span<?php echo $pharmacy_batchmas->PRC->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
		<td<?php echo $pharmacy_batchmas->PrName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName">
<span<?php echo $pharmacy_batchmas->PrName->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $pharmacy_batchmas->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO">
<span<?php echo $pharmacy_batchmas->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
		<td<?php echo $pharmacy_batchmas->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE">
<span<?php echo $pharmacy_batchmas->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $pharmacy_batchmas->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT">
<span<?php echo $pharmacy_batchmas->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
		<td<?php echo $pharmacy_batchmas->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE">
<span<?php echo $pharmacy_batchmas->PRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
		<td<?php echo $pharmacy_batchmas->OQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ">
<span<?php echo $pharmacy_batchmas->OQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
		<td<?php echo $pharmacy_batchmas->RQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ">
<span<?php echo $pharmacy_batchmas->RQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
		<td<?php echo $pharmacy_batchmas->FRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ">
<span<?php echo $pharmacy_batchmas->FRQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->FRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
		<td<?php echo $pharmacy_batchmas->IQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ">
<span<?php echo $pharmacy_batchmas->IQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
		<td<?php echo $pharmacy_batchmas->MRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ">
<span<?php echo $pharmacy_batchmas->MRQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
		<td<?php echo $pharmacy_batchmas->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP">
<span<?php echo $pharmacy_batchmas->MRP->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
		<td<?php echo $pharmacy_batchmas->UR->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR">
<span<?php echo $pharmacy_batchmas->UR->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
		<td<?php echo $pharmacy_batchmas->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST">
<span<?php echo $pharmacy_batchmas->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
		<td<?php echo $pharmacy_batchmas->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST">
<span<?php echo $pharmacy_batchmas->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
		<td<?php echo $pharmacy_batchmas->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT">
<span<?php echo $pharmacy_batchmas->RT->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $pharmacy_batchmas->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE">
<span<?php echo $pharmacy_batchmas->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_batchmas->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID">
<span<?php echo $pharmacy_batchmas->HospID->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
		<td<?php echo $pharmacy_batchmas->UM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM">
<span<?php echo $pharmacy_batchmas->UM->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
		<td<?php echo $pharmacy_batchmas->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME">
<span<?php echo $pharmacy_batchmas->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
		<td<?php echo $pharmacy_batchmas->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE">
<span<?php echo $pharmacy_batchmas->BILLDATE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BILLDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
		<td<?php echo $pharmacy_batchmas->PUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_PUnit" class="pharmacy_batchmas_PUnit">
<span<?php echo $pharmacy_batchmas->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
		<td<?php echo $pharmacy_batchmas->SUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_SUnit" class="pharmacy_batchmas_SUnit">
<span<?php echo $pharmacy_batchmas->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
		<td<?php echo $pharmacy_batchmas->PurValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_PurValue" class="pharmacy_batchmas_PurValue">
<span<?php echo $pharmacy_batchmas->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
		<td<?php echo $pharmacy_batchmas->PurRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCnt ?>_pharmacy_batchmas_PurRate" class="pharmacy_batchmas_PurRate">
<span<?php echo $pharmacy_batchmas->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PurRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_batchmas_delete->Recordset->moveNext();
}
$pharmacy_batchmas_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_batchmas_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_batchmas_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_batchmas_delete->terminate();
?>