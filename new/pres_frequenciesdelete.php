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
$pres_frequencies_delete = new pres_frequencies_delete();

// Run the page
$pres_frequencies_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_frequencies_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_frequenciesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_frequenciesdelete = currentForm = new ew.Form("fpres_frequenciesdelete", "delete");
	loadjs.done("fpres_frequenciesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_frequencies_delete->showPageHeader(); ?>
<?php
$pres_frequencies_delete->showMessage();
?>
<form name="fpres_frequenciesdelete" id="fpres_frequenciesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_frequencies">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_frequencies_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_frequencies_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_frequencies_delete->id->headerCellClass() ?>"><span id="elh_pres_frequencies_id" class="pres_frequencies_id"><?php echo $pres_frequencies_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_frequencies_delete->Frequency->Visible) { // Frequency ?>
		<th class="<?php echo $pres_frequencies_delete->Frequency->headerCellClass() ?>"><span id="elh_pres_frequencies_Frequency" class="pres_frequencies_Frequency"><?php echo $pres_frequencies_delete->Frequency->caption() ?></span></th>
<?php } ?>
<?php if ($pres_frequencies_delete->Freq_Exp->Visible) { // Freq_Exp ?>
		<th class="<?php echo $pres_frequencies_delete->Freq_Exp->headerCellClass() ?>"><span id="elh_pres_frequencies_Freq_Exp" class="pres_frequencies_Freq_Exp"><?php echo $pres_frequencies_delete->Freq_Exp->caption() ?></span></th>
<?php } ?>
<?php if ($pres_frequencies_delete->Freq_Count->Visible) { // Freq_Count ?>
		<th class="<?php echo $pres_frequencies_delete->Freq_Count->headerCellClass() ?>"><span id="elh_pres_frequencies_Freq_Count" class="pres_frequencies_Freq_Count"><?php echo $pres_frequencies_delete->Freq_Count->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_frequencies_delete->RecordCount = 0;
$i = 0;
while (!$pres_frequencies_delete->Recordset->EOF) {
	$pres_frequencies_delete->RecordCount++;
	$pres_frequencies_delete->RowCount++;

	// Set row properties
	$pres_frequencies->resetAttributes();
	$pres_frequencies->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_frequencies_delete->loadRowValues($pres_frequencies_delete->Recordset);

	// Render row
	$pres_frequencies_delete->renderRow();
?>
	<tr <?php echo $pres_frequencies->rowAttributes() ?>>
<?php if ($pres_frequencies_delete->id->Visible) { // id ?>
		<td <?php echo $pres_frequencies_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_delete->RowCount ?>_pres_frequencies_id" class="pres_frequencies_id">
<span<?php echo $pres_frequencies_delete->id->viewAttributes() ?>><?php echo $pres_frequencies_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_frequencies_delete->Frequency->Visible) { // Frequency ?>
		<td <?php echo $pres_frequencies_delete->Frequency->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_delete->RowCount ?>_pres_frequencies_Frequency" class="pres_frequencies_Frequency">
<span<?php echo $pres_frequencies_delete->Frequency->viewAttributes() ?>><?php echo $pres_frequencies_delete->Frequency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_frequencies_delete->Freq_Exp->Visible) { // Freq_Exp ?>
		<td <?php echo $pres_frequencies_delete->Freq_Exp->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_delete->RowCount ?>_pres_frequencies_Freq_Exp" class="pres_frequencies_Freq_Exp">
<span<?php echo $pres_frequencies_delete->Freq_Exp->viewAttributes() ?>><?php echo $pres_frequencies_delete->Freq_Exp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_frequencies_delete->Freq_Count->Visible) { // Freq_Count ?>
		<td <?php echo $pres_frequencies_delete->Freq_Count->cellAttributes() ?>>
<span id="el<?php echo $pres_frequencies_delete->RowCount ?>_pres_frequencies_Freq_Count" class="pres_frequencies_Freq_Count">
<span<?php echo $pres_frequencies_delete->Freq_Count->viewAttributes() ?>><?php echo $pres_frequencies_delete->Freq_Count->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_frequencies_delete->Recordset->moveNext();
}
$pres_frequencies_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_frequencies_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_frequencies_delete->showPageFooter();
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
$pres_frequencies_delete->terminate();
?>