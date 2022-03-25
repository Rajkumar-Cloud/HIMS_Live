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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_batchmasdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_batchmasdelete = currentForm = new ew.Form("fpharmacy_batchmasdelete", "delete");
	loadjs.done("fpharmacy_batchmasdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_batchmas_delete->showPageHeader(); ?>
<?php
$pharmacy_batchmas_delete->showMessage();
?>
<form name="fpharmacy_batchmasdelete" id="fpharmacy_batchmasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_batchmas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_batchmas_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_batchmas_delete->PRC->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC"><?php echo $pharmacy_batchmas_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->PrName->Visible) { // PrName ?>
		<th class="<?php echo $pharmacy_batchmas_delete->PrName->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName"><?php echo $pharmacy_batchmas_delete->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $pharmacy_batchmas_delete->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO"><?php echo $pharmacy_batchmas_delete->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $pharmacy_batchmas_delete->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE"><?php echo $pharmacy_batchmas_delete->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $pharmacy_batchmas_delete->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT"><?php echo $pharmacy_batchmas_delete->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->PRCODE->Visible) { // PRCODE ?>
		<th class="<?php echo $pharmacy_batchmas_delete->PRCODE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE"><?php echo $pharmacy_batchmas_delete->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->OQ->Visible) { // OQ ?>
		<th class="<?php echo $pharmacy_batchmas_delete->OQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ"><?php echo $pharmacy_batchmas_delete->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->RQ->Visible) { // RQ ?>
		<th class="<?php echo $pharmacy_batchmas_delete->RQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ"><?php echo $pharmacy_batchmas_delete->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->FRQ->Visible) { // FRQ ?>
		<th class="<?php echo $pharmacy_batchmas_delete->FRQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ"><?php echo $pharmacy_batchmas_delete->FRQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->IQ->Visible) { // IQ ?>
		<th class="<?php echo $pharmacy_batchmas_delete->IQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ"><?php echo $pharmacy_batchmas_delete->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $pharmacy_batchmas_delete->MRQ->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ"><?php echo $pharmacy_batchmas_delete->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->MRP->Visible) { // MRP ?>
		<th class="<?php echo $pharmacy_batchmas_delete->MRP->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP"><?php echo $pharmacy_batchmas_delete->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->UR->Visible) { // UR ?>
		<th class="<?php echo $pharmacy_batchmas_delete->UR->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR"><?php echo $pharmacy_batchmas_delete->UR->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $pharmacy_batchmas_delete->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST"><?php echo $pharmacy_batchmas_delete->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $pharmacy_batchmas_delete->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST"><?php echo $pharmacy_batchmas_delete->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->RT->Visible) { // RT ?>
		<th class="<?php echo $pharmacy_batchmas_delete->RT->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT"><?php echo $pharmacy_batchmas_delete->RT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_batchmas_delete->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE"><?php echo $pharmacy_batchmas_delete->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_batchmas_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID"><?php echo $pharmacy_batchmas_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->UM->Visible) { // UM ?>
		<th class="<?php echo $pharmacy_batchmas_delete->UM->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM"><?php echo $pharmacy_batchmas_delete->UM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $pharmacy_batchmas_delete->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME"><?php echo $pharmacy_batchmas_delete->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->BILLDATE->Visible) { // BILLDATE ?>
		<th class="<?php echo $pharmacy_batchmas_delete->BILLDATE->headerCellClass() ?>"><span id="elh_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE"><?php echo $pharmacy_batchmas_delete->BILLDATE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_batchmas_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_batchmas_delete->Recordset->EOF) {
	$pharmacy_batchmas_delete->RecordCount++;
	$pharmacy_batchmas_delete->RowCount++;

	// Set row properties
	$pharmacy_batchmas->resetAttributes();
	$pharmacy_batchmas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_batchmas_delete->loadRowValues($pharmacy_batchmas_delete->Recordset);

	// Render row
	$pharmacy_batchmas_delete->renderRow();
?>
	<tr <?php echo $pharmacy_batchmas->rowAttributes() ?>>
<?php if ($pharmacy_batchmas_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $pharmacy_batchmas_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC">
<span<?php echo $pharmacy_batchmas_delete->PRC->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->PrName->Visible) { // PrName ?>
		<td <?php echo $pharmacy_batchmas_delete->PrName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName">
<span<?php echo $pharmacy_batchmas_delete->PrName->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->BATCHNO->Visible) { // BATCHNO ?>
		<td <?php echo $pharmacy_batchmas_delete->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO">
<span<?php echo $pharmacy_batchmas_delete->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->MFRCODE->Visible) { // MFRCODE ?>
		<td <?php echo $pharmacy_batchmas_delete->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE">
<span<?php echo $pharmacy_batchmas_delete->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->EXPDT->Visible) { // EXPDT ?>
		<td <?php echo $pharmacy_batchmas_delete->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT">
<span<?php echo $pharmacy_batchmas_delete->EXPDT->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->PRCODE->Visible) { // PRCODE ?>
		<td <?php echo $pharmacy_batchmas_delete->PRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE">
<span<?php echo $pharmacy_batchmas_delete->PRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->OQ->Visible) { // OQ ?>
		<td <?php echo $pharmacy_batchmas_delete->OQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ">
<span<?php echo $pharmacy_batchmas_delete->OQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->RQ->Visible) { // RQ ?>
		<td <?php echo $pharmacy_batchmas_delete->RQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ">
<span<?php echo $pharmacy_batchmas_delete->RQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->FRQ->Visible) { // FRQ ?>
		<td <?php echo $pharmacy_batchmas_delete->FRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ">
<span<?php echo $pharmacy_batchmas_delete->FRQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->FRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->IQ->Visible) { // IQ ?>
		<td <?php echo $pharmacy_batchmas_delete->IQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ">
<span<?php echo $pharmacy_batchmas_delete->IQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->MRQ->Visible) { // MRQ ?>
		<td <?php echo $pharmacy_batchmas_delete->MRQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ">
<span<?php echo $pharmacy_batchmas_delete->MRQ->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->MRP->Visible) { // MRP ?>
		<td <?php echo $pharmacy_batchmas_delete->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP">
<span<?php echo $pharmacy_batchmas_delete->MRP->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->UR->Visible) { // UR ?>
		<td <?php echo $pharmacy_batchmas_delete->UR->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR">
<span<?php echo $pharmacy_batchmas_delete->UR->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->SSGST->Visible) { // SSGST ?>
		<td <?php echo $pharmacy_batchmas_delete->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST">
<span<?php echo $pharmacy_batchmas_delete->SSGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->SCGST->Visible) { // SCGST ?>
		<td <?php echo $pharmacy_batchmas_delete->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST">
<span<?php echo $pharmacy_batchmas_delete->SCGST->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->RT->Visible) { // RT ?>
		<td <?php echo $pharmacy_batchmas_delete->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT">
<span<?php echo $pharmacy_batchmas_delete->RT->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $pharmacy_batchmas_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE">
<span<?php echo $pharmacy_batchmas_delete->BRCODE->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_batchmas_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID">
<span<?php echo $pharmacy_batchmas_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->UM->Visible) { // UM ?>
		<td <?php echo $pharmacy_batchmas_delete->UM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM">
<span<?php echo $pharmacy_batchmas_delete->UM->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->GENNAME->Visible) { // GENNAME ?>
		<td <?php echo $pharmacy_batchmas_delete->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME">
<span<?php echo $pharmacy_batchmas_delete->GENNAME->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_batchmas_delete->BILLDATE->Visible) { // BILLDATE ?>
		<td <?php echo $pharmacy_batchmas_delete->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_batchmas_delete->RowCount ?>_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE">
<span<?php echo $pharmacy_batchmas_delete->BILLDATE->viewAttributes() ?>><?php echo $pharmacy_batchmas_delete->BILLDATE->getViewValue() ?></span>
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
$pharmacy_batchmas_delete->terminate();
?>