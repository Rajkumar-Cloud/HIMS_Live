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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_pharmacy_pharled_returndelete = currentForm = new ew.Form("fview_pharmacy_pharled_returndelete", "delete");

// Form_CustomValidate event
fview_pharmacy_pharled_returndelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_pharled_returndelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_pharled_returndelete.lists["x_SLNO"] = <?php echo $view_pharmacy_pharled_return_delete->SLNO->Lookup->toClientList() ?>;
fview_pharmacy_pharled_returndelete.lists["x_SLNO"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_delete->SLNO->lookupOptions()) ?>;
fview_pharmacy_pharled_returndelete.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_pharled_return_delete->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_delete->showMessage();
?>
<form name="fview_pharmacy_pharled_returndelete" id="fview_pharmacy_pharled_returndelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_pharled_return_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_pharled_return_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_pharmacy_pharled_return_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BRCODE->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
		<th class="<?php echo $view_pharmacy_pharled_return->PRC->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
		<th class="<?php echo $view_pharmacy_pharled_return->SiNo->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
		<th class="<?php echo $view_pharmacy_pharled_return->Product->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><?php echo $view_pharmacy_pharled_return->Product->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
		<th class="<?php echo $view_pharmacy_pharled_return->SLNO->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
		<th class="<?php echo $view_pharmacy_pharled_return->RT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
		<th class="<?php echo $view_pharmacy_pharled_return->MRQ->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
		<th class="<?php echo $view_pharmacy_pharled_return->IQ->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
		<th class="<?php echo $view_pharmacy_pharled_return->DAMT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BATCHNO->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
		<th class="<?php echo $view_pharmacy_pharled_return->EXPDT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
		<th class="<?php echo $view_pharmacy_pharled_return->Mfg->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
		<th class="<?php echo $view_pharmacy_pharled_return->UR->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
		<th class="<?php echo $view_pharmacy_pharled_return->_USERID->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
		<th class="<?php echo $view_pharmacy_pharled_return->id->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><?php echo $view_pharmacy_pharled_return->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
		<th class="<?php echo $view_pharmacy_pharled_return->HosoID->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_pharmacy_pharled_return->createdby->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_pharmacy_pharled_return->createddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_pharmacy_pharled_return->modifiedby->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_pharmacy_pharled_return->modifieddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
		<th class="<?php echo $view_pharmacy_pharled_return->BRNAME->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_pharmacy_pharled_return_delete->RecCnt = 0;
$i = 0;
while (!$view_pharmacy_pharled_return_delete->Recordset->EOF) {
	$view_pharmacy_pharled_return_delete->RecCnt++;
	$view_pharmacy_pharled_return_delete->RowCnt++;

	// Set row properties
	$view_pharmacy_pharled_return->resetAttributes();
	$view_pharmacy_pharled_return->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_pharmacy_pharled_return_delete->loadRowValues($view_pharmacy_pharled_return_delete->Recordset);

	// Render row
	$view_pharmacy_pharled_return_delete->renderRow();
?>
	<tr<?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $view_pharmacy_pharled_return->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
		<td<?php echo $view_pharmacy_pharled_return->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
		<td<?php echo $view_pharmacy_pharled_return->SiNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return->SiNo->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
		<td<?php echo $view_pharmacy_pharled_return->Product->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
		<td<?php echo $view_pharmacy_pharled_return->SLNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO">
<span<?php echo $view_pharmacy_pharled_return->SLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
		<td<?php echo $view_pharmacy_pharled_return->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
		<td<?php echo $view_pharmacy_pharled_return->MRQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
		<td<?php echo $view_pharmacy_pharled_return->IQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
		<td<?php echo $view_pharmacy_pharled_return->DAMT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return->DAMT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
		<td<?php echo $view_pharmacy_pharled_return->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return->BATCHNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
		<td<?php echo $view_pharmacy_pharled_return->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
		<td<?php echo $view_pharmacy_pharled_return->Mfg->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return->Mfg->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
		<td<?php echo $view_pharmacy_pharled_return->UR->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return->UR->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
		<td<?php echo $view_pharmacy_pharled_return->_USERID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return->_USERID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
		<td<?php echo $view_pharmacy_pharled_return->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
		<td<?php echo $view_pharmacy_pharled_return->HosoID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return->HosoID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
		<td<?php echo $view_pharmacy_pharled_return->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $view_pharmacy_pharled_return->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $view_pharmacy_pharled_return->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $view_pharmacy_pharled_return->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
		<td<?php echo $view_pharmacy_pharled_return->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_return_delete->RowCnt ?>_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return->BRNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRNAME->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_pharled_return_delete->terminate();
?>