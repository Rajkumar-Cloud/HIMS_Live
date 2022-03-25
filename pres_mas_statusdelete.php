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
$pres_mas_status_delete = new pres_mas_status_delete();

// Run the page
$pres_mas_status_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_status_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_mas_statusdelete = currentForm = new ew.Form("fpres_mas_statusdelete", "delete");

// Form_CustomValidate event
fpres_mas_statusdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_statusdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_mas_status_delete->showPageHeader(); ?>
<?php
$pres_mas_status_delete->showMessage();
?>
<form name="fpres_mas_statusdelete" id="fpres_mas_statusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_status_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_status_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_status">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_mas_status_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_mas_status->id->Visible) { // id ?>
		<th class="<?php echo $pres_mas_status->id->headerCellClass() ?>"><span id="elh_pres_mas_status_id" class="pres_mas_status_id"><?php echo $pres_mas_status->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_mas_status->Status->Visible) { // Status ?>
		<th class="<?php echo $pres_mas_status->Status->headerCellClass() ?>"><span id="elh_pres_mas_status_Status" class="pres_mas_status_Status"><?php echo $pres_mas_status->Status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_mas_status_delete->RecCnt = 0;
$i = 0;
while (!$pres_mas_status_delete->Recordset->EOF) {
	$pres_mas_status_delete->RecCnt++;
	$pres_mas_status_delete->RowCnt++;

	// Set row properties
	$pres_mas_status->resetAttributes();
	$pres_mas_status->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_mas_status_delete->loadRowValues($pres_mas_status_delete->Recordset);

	// Render row
	$pres_mas_status_delete->renderRow();
?>
	<tr<?php echo $pres_mas_status->rowAttributes() ?>>
<?php if ($pres_mas_status->id->Visible) { // id ?>
		<td<?php echo $pres_mas_status->id->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_status_delete->RowCnt ?>_pres_mas_status_id" class="pres_mas_status_id">
<span<?php echo $pres_mas_status->id->viewAttributes() ?>>
<?php echo $pres_mas_status->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_mas_status->Status->Visible) { // Status ?>
		<td<?php echo $pres_mas_status->Status->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_status_delete->RowCnt ?>_pres_mas_status_Status" class="pres_mas_status_Status">
<span<?php echo $pres_mas_status->Status->viewAttributes() ?>>
<?php echo $pres_mas_status->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_mas_status_delete->Recordset->moveNext();
}
$pres_mas_status_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_status_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_mas_status_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_mas_status_delete->terminate();
?>