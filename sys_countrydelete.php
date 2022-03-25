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
$sys_country_delete = new sys_country_delete();

// Run the page
$sys_country_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_country_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_countrydelete = currentForm = new ew.Form("fsys_countrydelete", "delete");

// Form_CustomValidate event
fsys_countrydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_countrydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_country_delete->showPageHeader(); ?>
<?php
$sys_country_delete->showMessage();
?>
<form name="fsys_countrydelete" id="fsys_countrydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_country_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_country_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_country">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_country_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_country->id->Visible) { // id ?>
		<th class="<?php echo $sys_country->id->headerCellClass() ?>"><span id="elh_sys_country_id" class="sys_country_id"><?php echo $sys_country->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_country->code->Visible) { // code ?>
		<th class="<?php echo $sys_country->code->headerCellClass() ?>"><span id="elh_sys_country_code" class="sys_country_code"><?php echo $sys_country->code->caption() ?></span></th>
<?php } ?>
<?php if ($sys_country->namecap->Visible) { // namecap ?>
		<th class="<?php echo $sys_country->namecap->headerCellClass() ?>"><span id="elh_sys_country_namecap" class="sys_country_namecap"><?php echo $sys_country->namecap->caption() ?></span></th>
<?php } ?>
<?php if ($sys_country->name->Visible) { // name ?>
		<th class="<?php echo $sys_country->name->headerCellClass() ?>"><span id="elh_sys_country_name" class="sys_country_name"><?php echo $sys_country->name->caption() ?></span></th>
<?php } ?>
<?php if ($sys_country->iso3->Visible) { // iso3 ?>
		<th class="<?php echo $sys_country->iso3->headerCellClass() ?>"><span id="elh_sys_country_iso3" class="sys_country_iso3"><?php echo $sys_country->iso3->caption() ?></span></th>
<?php } ?>
<?php if ($sys_country->numcode->Visible) { // numcode ?>
		<th class="<?php echo $sys_country->numcode->headerCellClass() ?>"><span id="elh_sys_country_numcode" class="sys_country_numcode"><?php echo $sys_country->numcode->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_country_delete->RecCnt = 0;
$i = 0;
while (!$sys_country_delete->Recordset->EOF) {
	$sys_country_delete->RecCnt++;
	$sys_country_delete->RowCnt++;

	// Set row properties
	$sys_country->resetAttributes();
	$sys_country->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_country_delete->loadRowValues($sys_country_delete->Recordset);

	// Render row
	$sys_country_delete->renderRow();
?>
	<tr<?php echo $sys_country->rowAttributes() ?>>
<?php if ($sys_country->id->Visible) { // id ?>
		<td<?php echo $sys_country->id->cellAttributes() ?>>
<span id="el<?php echo $sys_country_delete->RowCnt ?>_sys_country_id" class="sys_country_id">
<span<?php echo $sys_country->id->viewAttributes() ?>>
<?php echo $sys_country->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_country->code->Visible) { // code ?>
		<td<?php echo $sys_country->code->cellAttributes() ?>>
<span id="el<?php echo $sys_country_delete->RowCnt ?>_sys_country_code" class="sys_country_code">
<span<?php echo $sys_country->code->viewAttributes() ?>>
<?php echo $sys_country->code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_country->namecap->Visible) { // namecap ?>
		<td<?php echo $sys_country->namecap->cellAttributes() ?>>
<span id="el<?php echo $sys_country_delete->RowCnt ?>_sys_country_namecap" class="sys_country_namecap">
<span<?php echo $sys_country->namecap->viewAttributes() ?>>
<?php echo $sys_country->namecap->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_country->name->Visible) { // name ?>
		<td<?php echo $sys_country->name->cellAttributes() ?>>
<span id="el<?php echo $sys_country_delete->RowCnt ?>_sys_country_name" class="sys_country_name">
<span<?php echo $sys_country->name->viewAttributes() ?>>
<?php echo $sys_country->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_country->iso3->Visible) { // iso3 ?>
		<td<?php echo $sys_country->iso3->cellAttributes() ?>>
<span id="el<?php echo $sys_country_delete->RowCnt ?>_sys_country_iso3" class="sys_country_iso3">
<span<?php echo $sys_country->iso3->viewAttributes() ?>>
<?php echo $sys_country->iso3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_country->numcode->Visible) { // numcode ?>
		<td<?php echo $sys_country->numcode->cellAttributes() ?>>
<span id="el<?php echo $sys_country_delete->RowCnt ?>_sys_country_numcode" class="sys_country_numcode">
<span<?php echo $sys_country->numcode->viewAttributes() ?>>
<?php echo $sys_country->numcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_country_delete->Recordset->moveNext();
}
$sys_country_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_country_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_country_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_country_delete->terminate();
?>