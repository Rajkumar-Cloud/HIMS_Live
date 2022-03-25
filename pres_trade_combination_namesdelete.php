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
$pres_trade_combination_names_delete = new pres_trade_combination_names_delete();

// Run the page
$pres_trade_combination_names_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_trade_combination_namesdelete = currentForm = new ew.Form("fpres_trade_combination_namesdelete", "delete");

// Form_CustomValidate event
fpres_trade_combination_namesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_trade_combination_namesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_trade_combination_names_delete->showPageHeader(); ?>
<?php
$pres_trade_combination_names_delete->showMessage();
?>
<form name="fpres_trade_combination_namesdelete" id="fpres_trade_combination_namesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_trade_combination_names_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_trade_combination_names_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_trade_combination_names_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_trade_combination_names->id->Visible) { // id ?>
		<th class="<?php echo $pres_trade_combination_names->id->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_id" class="pres_trade_combination_names_id"><?php echo $pres_trade_combination_names->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names->tradenames_id->Visible) { // tradenames_id ?>
		<th class="<?php echo $pres_trade_combination_names->tradenames_id->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_tradenames_id" class="pres_trade_combination_names_tradenames_id"><?php echo $pres_trade_combination_names->tradenames_id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names->PR_CODE->Visible) { // PR_CODE ?>
		<th class="<?php echo $pres_trade_combination_names->PR_CODE->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_PR_CODE" class="pres_trade_combination_names_PR_CODE"><?php echo $pres_trade_combination_names->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<th class="<?php echo $pres_trade_combination_names->CONTAINER_TYPE->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_CONTAINER_TYPE" class="pres_trade_combination_names_CONTAINER_TYPE"><?php echo $pres_trade_combination_names->CONTAINER_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_trade_combination_names->STRENGTH->Visible) { // STRENGTH ?>
		<th class="<?php echo $pres_trade_combination_names->STRENGTH->headerCellClass() ?>"><span id="elh_pres_trade_combination_names_STRENGTH" class="pres_trade_combination_names_STRENGTH"><?php echo $pres_trade_combination_names->STRENGTH->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_trade_combination_names_delete->RecCnt = 0;
$i = 0;
while (!$pres_trade_combination_names_delete->Recordset->EOF) {
	$pres_trade_combination_names_delete->RecCnt++;
	$pres_trade_combination_names_delete->RowCnt++;

	// Set row properties
	$pres_trade_combination_names->resetAttributes();
	$pres_trade_combination_names->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_trade_combination_names_delete->loadRowValues($pres_trade_combination_names_delete->Recordset);

	// Render row
	$pres_trade_combination_names_delete->renderRow();
?>
	<tr<?php echo $pres_trade_combination_names->rowAttributes() ?>>
<?php if ($pres_trade_combination_names->id->Visible) { // id ?>
		<td<?php echo $pres_trade_combination_names->id->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_delete->RowCnt ?>_pres_trade_combination_names_id" class="pres_trade_combination_names_id">
<span<?php echo $pres_trade_combination_names->id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names->tradenames_id->Visible) { // tradenames_id ?>
		<td<?php echo $pres_trade_combination_names->tradenames_id->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_delete->RowCnt ?>_pres_trade_combination_names_tradenames_id" class="pres_trade_combination_names_tradenames_id">
<span<?php echo $pres_trade_combination_names->tradenames_id->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->tradenames_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names->PR_CODE->Visible) { // PR_CODE ?>
		<td<?php echo $pres_trade_combination_names->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_delete->RowCnt ?>_pres_trade_combination_names_PR_CODE" class="pres_trade_combination_names_PR_CODE">
<span<?php echo $pres_trade_combination_names->PR_CODE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td<?php echo $pres_trade_combination_names->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_delete->RowCnt ?>_pres_trade_combination_names_CONTAINER_TYPE" class="pres_trade_combination_names_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names->CONTAINER_TYPE->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_trade_combination_names->STRENGTH->Visible) { // STRENGTH ?>
		<td<?php echo $pres_trade_combination_names->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pres_trade_combination_names_delete->RowCnt ?>_pres_trade_combination_names_STRENGTH" class="pres_trade_combination_names_STRENGTH">
<span<?php echo $pres_trade_combination_names->STRENGTH->viewAttributes() ?>>
<?php echo $pres_trade_combination_names->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_trade_combination_names_delete->Recordset->moveNext();
}
$pres_trade_combination_names_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_trade_combination_names_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_trade_combination_names_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_trade_combination_names_delete->terminate();
?>