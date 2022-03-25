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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_pharleddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_pharleddelete = currentForm = new ew.Form("fpharmacy_pharleddelete", "delete");
	loadjs.done("fpharmacy_pharleddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_pharled_delete->showPageHeader(); ?>
<?php
$pharmacy_pharled_delete->showMessage();
?>
<form name="fpharmacy_pharleddelete" id="fpharmacy_pharleddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_pharled_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_pharled_delete->SiNo->Visible) { // SiNo ?>
		<th class="<?php echo $pharmacy_pharled_delete->SiNo->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><?php echo $pharmacy_pharled_delete->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->SLNO->Visible) { // SLNO ?>
		<th class="<?php echo $pharmacy_pharled_delete->SLNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><?php echo $pharmacy_pharled_delete->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->Product->Visible) { // Product ?>
		<th class="<?php echo $pharmacy_pharled_delete->Product->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><?php echo $pharmacy_pharled_delete->Product->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->RT->Visible) { // RT ?>
		<th class="<?php echo $pharmacy_pharled_delete->RT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><?php echo $pharmacy_pharled_delete->RT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->IQ->Visible) { // IQ ?>
		<th class="<?php echo $pharmacy_pharled_delete->IQ->headerCellClass() ?>"><span id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><?php echo $pharmacy_pharled_delete->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->DAMT->Visible) { // DAMT ?>
		<th class="<?php echo $pharmacy_pharled_delete->DAMT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><?php echo $pharmacy_pharled_delete->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->Mfg->Visible) { // Mfg ?>
		<th class="<?php echo $pharmacy_pharled_delete->Mfg->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><?php echo $pharmacy_pharled_delete->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $pharmacy_pharled_delete->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><?php echo $pharmacy_pharled_delete->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $pharmacy_pharled_delete->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><?php echo $pharmacy_pharled_delete->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_pharled_delete->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><?php echo $pharmacy_pharled_delete->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_pharled_delete->PRC->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><?php echo $pharmacy_pharled_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->UR->Visible) { // UR ?>
		<th class="<?php echo $pharmacy_pharled_delete->UR->headerCellClass() ?>"><span id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><?php echo $pharmacy_pharled_delete->UR->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->_USERID->Visible) { // USERID ?>
		<th class="<?php echo $pharmacy_pharled_delete->_USERID->headerCellClass() ?>"><span id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><?php echo $pharmacy_pharled_delete->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_pharled_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><?php echo $pharmacy_pharled_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->HosoID->Visible) { // HosoID ?>
		<th class="<?php echo $pharmacy_pharled_delete->HosoID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><?php echo $pharmacy_pharled_delete->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_pharled_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><?php echo $pharmacy_pharled_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_pharled_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><?php echo $pharmacy_pharled_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_pharled_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><?php echo $pharmacy_pharled_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_pharled_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><?php echo $pharmacy_pharled_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_pharled_delete->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $pharmacy_pharled_delete->BRNAME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><?php echo $pharmacy_pharled_delete->BRNAME->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_pharled_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_pharled_delete->Recordset->EOF) {
	$pharmacy_pharled_delete->RecordCount++;
	$pharmacy_pharled_delete->RowCount++;

	// Set row properties
	$pharmacy_pharled->resetAttributes();
	$pharmacy_pharled->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_pharled_delete->loadRowValues($pharmacy_pharled_delete->Recordset);

	// Render row
	$pharmacy_pharled_delete->renderRow();
?>
	<tr <?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php if ($pharmacy_pharled_delete->SiNo->Visible) { // SiNo ?>
		<td <?php echo $pharmacy_pharled_delete->SiNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled_delete->SiNo->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->SLNO->Visible) { // SLNO ?>
		<td <?php echo $pharmacy_pharled_delete->SLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled_delete->SLNO->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->Product->Visible) { // Product ?>
		<td <?php echo $pharmacy_pharled_delete->Product->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled_delete->Product->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->RT->Visible) { // RT ?>
		<td <?php echo $pharmacy_pharled_delete->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled_delete->RT->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->IQ->Visible) { // IQ ?>
		<td <?php echo $pharmacy_pharled_delete->IQ->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled_delete->IQ->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->DAMT->Visible) { // DAMT ?>
		<td <?php echo $pharmacy_pharled_delete->DAMT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled_delete->DAMT->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->Mfg->Visible) { // Mfg ?>
		<td <?php echo $pharmacy_pharled_delete->Mfg->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled_delete->Mfg->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->EXPDT->Visible) { // EXPDT ?>
		<td <?php echo $pharmacy_pharled_delete->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled_delete->EXPDT->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->BATCHNO->Visible) { // BATCHNO ?>
		<td <?php echo $pharmacy_pharled_delete->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled_delete->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $pharmacy_pharled_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled_delete->BRCODE->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $pharmacy_pharled_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled_delete->PRC->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->UR->Visible) { // UR ?>
		<td <?php echo $pharmacy_pharled_delete->UR->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled_delete->UR->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->_USERID->Visible) { // USERID ?>
		<td <?php echo $pharmacy_pharled_delete->_USERID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled_delete->_USERID->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_pharled_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_id" class="pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled_delete->id->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->HosoID->Visible) { // HosoID ?>
		<td <?php echo $pharmacy_pharled_delete->HosoID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled_delete->HosoID->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_pharled_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_pharled_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_pharled_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_pharled_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_pharled_delete->BRNAME->Visible) { // BRNAME ?>
		<td <?php echo $pharmacy_pharled_delete->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_pharled_delete->RowCount ?>_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled_delete->BRNAME->viewAttributes() ?>><?php echo $pharmacy_pharled_delete->BRNAME->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("btn-action").innerText="Return Item";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_pharled_delete->terminate();
?>