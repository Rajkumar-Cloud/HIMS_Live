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
$ivf_history_master_delete = new ivf_history_master_delete();

// Run the page
$ivf_history_master_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_history_master_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_history_masterdelete = currentForm = new ew.Form("fivf_history_masterdelete", "delete");

// Form_CustomValidate event
fivf_history_masterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_history_masterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_history_master_delete->showPageHeader(); ?>
<?php
$ivf_history_master_delete->showMessage();
?>
<form name="fivf_history_masterdelete" id="fivf_history_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_history_master_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_history_master_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_history_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_history_master->id->Visible) { // id ?>
		<th class="<?php echo $ivf_history_master->id->headerCellClass() ?>"><span id="elh_ivf_history_master_id" class="ivf_history_master_id"><?php echo $ivf_history_master->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_history_master->History->Visible) { // History ?>
		<th class="<?php echo $ivf_history_master->History->headerCellClass() ?>"><span id="elh_ivf_history_master_History" class="ivf_history_master_History"><?php echo $ivf_history_master->History->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_history_master->HistoryType->Visible) { // HistoryType ?>
		<th class="<?php echo $ivf_history_master->HistoryType->headerCellClass() ?>"><span id="elh_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType"><?php echo $ivf_history_master->HistoryType->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_history_master_delete->RecCnt = 0;
$i = 0;
while (!$ivf_history_master_delete->Recordset->EOF) {
	$ivf_history_master_delete->RecCnt++;
	$ivf_history_master_delete->RowCnt++;

	// Set row properties
	$ivf_history_master->resetAttributes();
	$ivf_history_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_history_master_delete->loadRowValues($ivf_history_master_delete->Recordset);

	// Render row
	$ivf_history_master_delete->renderRow();
?>
	<tr<?php echo $ivf_history_master->rowAttributes() ?>>
<?php if ($ivf_history_master->id->Visible) { // id ?>
		<td<?php echo $ivf_history_master->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_history_master_delete->RowCnt ?>_ivf_history_master_id" class="ivf_history_master_id">
<span<?php echo $ivf_history_master->id->viewAttributes() ?>>
<?php echo $ivf_history_master->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_history_master->History->Visible) { // History ?>
		<td<?php echo $ivf_history_master->History->cellAttributes() ?>>
<span id="el<?php echo $ivf_history_master_delete->RowCnt ?>_ivf_history_master_History" class="ivf_history_master_History">
<span<?php echo $ivf_history_master->History->viewAttributes() ?>>
<?php echo $ivf_history_master->History->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_history_master->HistoryType->Visible) { // HistoryType ?>
		<td<?php echo $ivf_history_master->HistoryType->cellAttributes() ?>>
<span id="el<?php echo $ivf_history_master_delete->RowCnt ?>_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType">
<span<?php echo $ivf_history_master->HistoryType->viewAttributes() ?>>
<?php echo $ivf_history_master->HistoryType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_history_master_delete->Recordset->moveNext();
}
$ivf_history_master_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_history_master_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_history_master_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_history_master_delete->terminate();
?>