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
$view_pharmacy_pharled_return_delete = new view_pharmacy_pharled_return_delete();

// Run the page
$view_pharmacy_pharled_return_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_pharled_returndelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_pharmacy_pharled_returndelete = currentForm = new ew.Form("fview_pharmacy_pharled_returndelete", "delete");
	loadjs.done("fview_pharmacy_pharled_returndelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_pharled_return_delete->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_delete->showMessage();
?>
<form name="fview_pharmacy_pharled_returndelete" id="fview_pharmacy_pharled_returndelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_pharmacy_pharled_return_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_pharmacy_pharled_return_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->BRCODE->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><?php echo $view_pharmacy_pharled_return_delete->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->PRC->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><?php echo $view_pharmacy_pharled_return_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->SiNo->Visible) { // SiNo ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->SiNo->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><?php echo $view_pharmacy_pharled_return_delete->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->Product->Visible) { // Product ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->Product->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><?php echo $view_pharmacy_pharled_return_delete->Product->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->RT->Visible) { // RT ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->RT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><?php echo $view_pharmacy_pharled_return_delete->RT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->MRQ->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><?php echo $view_pharmacy_pharled_return_delete->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->IQ->Visible) { // IQ ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->IQ->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><?php echo $view_pharmacy_pharled_return_delete->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->DAMT->Visible) { // DAMT ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->DAMT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><?php echo $view_pharmacy_pharled_return_delete->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->BATCHNO->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><?php echo $view_pharmacy_pharled_return_delete->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->EXPDT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><?php echo $view_pharmacy_pharled_return_delete->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->Mfg->Visible) { // Mfg ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->Mfg->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><?php echo $view_pharmacy_pharled_return_delete->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->UR->Visible) { // UR ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->UR->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><?php echo $view_pharmacy_pharled_return_delete->UR->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->_USERID->Visible) { // USERID ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->_USERID->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><?php echo $view_pharmacy_pharled_return_delete->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->id->Visible) { // id ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->id->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><?php echo $view_pharmacy_pharled_return_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->HosoID->Visible) { // HosoID ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->HosoID->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><?php echo $view_pharmacy_pharled_return_delete->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->createdby->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><?php echo $view_pharmacy_pharled_return_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->createddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><?php echo $view_pharmacy_pharled_return_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->modifiedby->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><?php echo $view_pharmacy_pharled_return_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><?php echo $view_pharmacy_pharled_return_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $view_pharmacy_pharled_return_delete->BRNAME->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><?php echo $view_pharmacy_pharled_return_delete->BRNAME->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_pharmacy_pharled_return_delete->RecordCount = 0;
$i = 0;
while (!$view_pharmacy_pharled_return_delete->Recordset->EOF) {
	$view_pharmacy_pharled_return_delete->RecordCount++;
	$view_pharmacy_pharled_return_delete->RowCount++;

	// Set row properties
	$view_pharmacy_pharled_return->resetAttributes();
	$view_pharmacy_pharled_return->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_pharmacy_pharled_return_delete->loadRowValues($view_pharmacy_pharled_return_delete->Recordset);

	// Render row
	$view_pharmacy_pharled_return_delete->renderRow();
?>
	<tr <?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php if ($view_pharmacy_pharled_return_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return_delete->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return_delete->PRC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->SiNo->Visible) { // SiNo ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->SiNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return_delete->SiNo->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->Product->Visible) { // Product ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->Product->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return_delete->Product->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->RT->Visible) { // RT ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return_delete->RT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->MRQ->Visible) { // MRQ ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->MRQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return_delete->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->IQ->Visible) { // IQ ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->IQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return_delete->IQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->DAMT->Visible) { // DAMT ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->DAMT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return_delete->DAMT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->BATCHNO->Visible) { // BATCHNO ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return_delete->BATCHNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->EXPDT->Visible) { // EXPDT ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return_delete->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->Mfg->Visible) { // Mfg ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->Mfg->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return_delete->Mfg->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->UR->Visible) { // UR ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->UR->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return_delete->UR->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->_USERID->Visible) { // USERID ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->_USERID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return_delete->_USERID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->id->Visible) { // id ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return_delete->id->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->HosoID->Visible) { // HosoID ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->HosoID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return_delete->HosoID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return_delete->createdby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return_delete->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return_delete->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return_delete->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_delete->BRNAME->Visible) { // BRNAME ?>
		<td <?php echo $view_pharmacy_pharled_return_delete->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCount ?>_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return_delete->BRNAME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_delete->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_pharmacy_pharled_return_delete->Recordset->moveNext();
}
$view_pharmacy_pharled_return_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_pharled_return_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_pharmacy_pharled_return_delete->showPageFooter();
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
$view_pharmacy_pharled_return_delete->terminate();
?>