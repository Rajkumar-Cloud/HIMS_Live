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
<?php include_once "header.php"; ?>
<script>
var fivf_history_masterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_history_masterdelete = currentForm = new ew.Form("fivf_history_masterdelete", "delete");
	loadjs.done("fivf_history_masterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_history_master_delete->showPageHeader(); ?>
<?php
$ivf_history_master_delete->showMessage();
?>
<form name="fivf_history_masterdelete" id="fivf_history_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_history_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_history_master_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_history_master_delete->id->headerCellClass() ?>"><span id="elh_ivf_history_master_id" class="ivf_history_master_id"><?php echo $ivf_history_master_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_history_master_delete->History->Visible) { // History ?>
		<th class="<?php echo $ivf_history_master_delete->History->headerCellClass() ?>"><span id="elh_ivf_history_master_History" class="ivf_history_master_History"><?php echo $ivf_history_master_delete->History->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_history_master_delete->HistoryType->Visible) { // HistoryType ?>
		<th class="<?php echo $ivf_history_master_delete->HistoryType->headerCellClass() ?>"><span id="elh_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType"><?php echo $ivf_history_master_delete->HistoryType->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_history_master_delete->RecordCount = 0;
$i = 0;
while (!$ivf_history_master_delete->Recordset->EOF) {
	$ivf_history_master_delete->RecordCount++;
	$ivf_history_master_delete->RowCount++;

	// Set row properties
	$ivf_history_master->resetAttributes();
	$ivf_history_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_history_master_delete->loadRowValues($ivf_history_master_delete->Recordset);

	// Render row
	$ivf_history_master_delete->renderRow();
?>
	<tr <?php echo $ivf_history_master->rowAttributes() ?>>
<?php if ($ivf_history_master_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_history_master_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_history_master_delete->RowCount ?>_ivf_history_master_id" class="ivf_history_master_id">
<span<?php echo $ivf_history_master_delete->id->viewAttributes() ?>><?php echo $ivf_history_master_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_history_master_delete->History->Visible) { // History ?>
		<td <?php echo $ivf_history_master_delete->History->cellAttributes() ?>>
<span id="el<?php echo $ivf_history_master_delete->RowCount ?>_ivf_history_master_History" class="ivf_history_master_History">
<span<?php echo $ivf_history_master_delete->History->viewAttributes() ?>><?php echo $ivf_history_master_delete->History->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_history_master_delete->HistoryType->Visible) { // HistoryType ?>
		<td <?php echo $ivf_history_master_delete->HistoryType->cellAttributes() ?>>
<span id="el<?php echo $ivf_history_master_delete->RowCount ?>_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType">
<span<?php echo $ivf_history_master_delete->HistoryType->viewAttributes() ?>><?php echo $ivf_history_master_delete->HistoryType->getViewValue() ?></span>
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
$ivf_history_master_delete->terminate();
?>