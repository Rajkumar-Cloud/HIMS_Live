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
$pres_restricteddruglist_delete = new pres_restricteddruglist_delete();

// Run the page
$pres_restricteddruglist_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_restricteddruglist_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_restricteddruglistdelete = currentForm = new ew.Form("fpres_restricteddruglistdelete", "delete");

// Form_CustomValidate event
fpres_restricteddruglistdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_restricteddruglistdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_restricteddruglist_delete->showPageHeader(); ?>
<?php
$pres_restricteddruglist_delete->showMessage();
?>
<form name="fpres_restricteddruglistdelete" id="fpres_restricteddruglistdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_restricteddruglist_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_restricteddruglist_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_restricteddruglist_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_restricteddruglist->id->Visible) { // id ?>
		<th class="<?php echo $pres_restricteddruglist->id->headerCellClass() ?>"><span id="elh_pres_restricteddruglist_id" class="pres_restricteddruglist_id"><?php echo $pres_restricteddruglist->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_restricteddruglist->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_restricteddruglist->Genericname->headerCellClass() ?>"><span id="elh_pres_restricteddruglist_Genericname" class="pres_restricteddruglist_Genericname"><?php echo $pres_restricteddruglist->Genericname->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_restricteddruglist_delete->RecCnt = 0;
$i = 0;
while (!$pres_restricteddruglist_delete->Recordset->EOF) {
	$pres_restricteddruglist_delete->RecCnt++;
	$pres_restricteddruglist_delete->RowCnt++;

	// Set row properties
	$pres_restricteddruglist->resetAttributes();
	$pres_restricteddruglist->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_restricteddruglist_delete->loadRowValues($pres_restricteddruglist_delete->Recordset);

	// Render row
	$pres_restricteddruglist_delete->renderRow();
?>
	<tr<?php echo $pres_restricteddruglist->rowAttributes() ?>>
<?php if ($pres_restricteddruglist->id->Visible) { // id ?>
		<td<?php echo $pres_restricteddruglist->id->cellAttributes() ?>>
<span id="el<?php echo $pres_restricteddruglist_delete->RowCnt ?>_pres_restricteddruglist_id" class="pres_restricteddruglist_id">
<span<?php echo $pres_restricteddruglist->id->viewAttributes() ?>>
<?php echo $pres_restricteddruglist->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_restricteddruglist->Genericname->Visible) { // Genericname ?>
		<td<?php echo $pres_restricteddruglist->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_restricteddruglist_delete->RowCnt ?>_pres_restricteddruglist_Genericname" class="pres_restricteddruglist_Genericname">
<span<?php echo $pres_restricteddruglist->Genericname->viewAttributes() ?>>
<?php echo $pres_restricteddruglist->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_restricteddruglist_delete->Recordset->moveNext();
}
$pres_restricteddruglist_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_restricteddruglist_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_restricteddruglist_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_restricteddruglist_delete->terminate();
?>