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
$pres_mas_forms_delete = new pres_mas_forms_delete();

// Run the page
$pres_mas_forms_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_forms_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_mas_formsdelete = currentForm = new ew.Form("fpres_mas_formsdelete", "delete");

// Form_CustomValidate event
fpres_mas_formsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_formsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_mas_forms_delete->showPageHeader(); ?>
<?php
$pres_mas_forms_delete->showMessage();
?>
<form name="fpres_mas_formsdelete" id="fpres_mas_formsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_forms_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_forms_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_forms">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_mas_forms_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_mas_forms->id->Visible) { // id ?>
		<th class="<?php echo $pres_mas_forms->id->headerCellClass() ?>"><span id="elh_pres_mas_forms_id" class="pres_mas_forms_id"><?php echo $pres_mas_forms->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_mas_forms->Forms->Visible) { // Forms ?>
		<th class="<?php echo $pres_mas_forms->Forms->headerCellClass() ?>"><span id="elh_pres_mas_forms_Forms" class="pres_mas_forms_Forms"><?php echo $pres_mas_forms->Forms->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_mas_forms_delete->RecCnt = 0;
$i = 0;
while (!$pres_mas_forms_delete->Recordset->EOF) {
	$pres_mas_forms_delete->RecCnt++;
	$pres_mas_forms_delete->RowCnt++;

	// Set row properties
	$pres_mas_forms->resetAttributes();
	$pres_mas_forms->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_mas_forms_delete->loadRowValues($pres_mas_forms_delete->Recordset);

	// Render row
	$pres_mas_forms_delete->renderRow();
?>
	<tr<?php echo $pres_mas_forms->rowAttributes() ?>>
<?php if ($pres_mas_forms->id->Visible) { // id ?>
		<td<?php echo $pres_mas_forms->id->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_forms_delete->RowCnt ?>_pres_mas_forms_id" class="pres_mas_forms_id">
<span<?php echo $pres_mas_forms->id->viewAttributes() ?>>
<?php echo $pres_mas_forms->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_mas_forms->Forms->Visible) { // Forms ?>
		<td<?php echo $pres_mas_forms->Forms->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_forms_delete->RowCnt ?>_pres_mas_forms_Forms" class="pres_mas_forms_Forms">
<span<?php echo $pres_mas_forms->Forms->viewAttributes() ?>>
<?php echo $pres_mas_forms->Forms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_mas_forms_delete->Recordset->moveNext();
}
$pres_mas_forms_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_forms_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_mas_forms_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_mas_forms_delete->terminate();
?>