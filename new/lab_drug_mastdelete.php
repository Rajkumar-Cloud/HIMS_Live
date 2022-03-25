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
$lab_drug_mast_delete = new lab_drug_mast_delete();

// Run the page
$lab_drug_mast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_drug_mast_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_drug_mastdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_drug_mastdelete = currentForm = new ew.Form("flab_drug_mastdelete", "delete");
	loadjs.done("flab_drug_mastdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_drug_mast_delete->showPageHeader(); ?>
<?php
$lab_drug_mast_delete->showMessage();
?>
<form name="flab_drug_mastdelete" id="flab_drug_mastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_drug_mast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_drug_mast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_drug_mast_delete->DrugName->Visible) { // DrugName ?>
		<th class="<?php echo $lab_drug_mast_delete->DrugName->headerCellClass() ?>"><span id="elh_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName"><?php echo $lab_drug_mast_delete->DrugName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->Positive->Visible) { // Positive ?>
		<th class="<?php echo $lab_drug_mast_delete->Positive->headerCellClass() ?>"><span id="elh_lab_drug_mast_Positive" class="lab_drug_mast_Positive"><?php echo $lab_drug_mast_delete->Positive->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->Negative->Visible) { // Negative ?>
		<th class="<?php echo $lab_drug_mast_delete->Negative->headerCellClass() ?>"><span id="elh_lab_drug_mast_Negative" class="lab_drug_mast_Negative"><?php echo $lab_drug_mast_delete->Negative->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->ShortName->Visible) { // ShortName ?>
		<th class="<?php echo $lab_drug_mast_delete->ShortName->headerCellClass() ?>"><span id="elh_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName"><?php echo $lab_drug_mast_delete->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->GroupCD->Visible) { // GroupCD ?>
		<th class="<?php echo $lab_drug_mast_delete->GroupCD->headerCellClass() ?>"><span id="elh_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD"><?php echo $lab_drug_mast_delete->GroupCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->Content->Visible) { // Content ?>
		<th class="<?php echo $lab_drug_mast_delete->Content->headerCellClass() ?>"><span id="elh_lab_drug_mast_Content" class="lab_drug_mast_Content"><?php echo $lab_drug_mast_delete->Content->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $lab_drug_mast_delete->Order->headerCellClass() ?>"><span id="elh_lab_drug_mast_Order" class="lab_drug_mast_Order"><?php echo $lab_drug_mast_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->DrugCD->Visible) { // DrugCD ?>
		<th class="<?php echo $lab_drug_mast_delete->DrugCD->headerCellClass() ?>"><span id="elh_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD"><?php echo $lab_drug_mast_delete->DrugCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_drug_mast_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_drug_mast_delete->id->headerCellClass() ?>"><span id="elh_lab_drug_mast_id" class="lab_drug_mast_id"><?php echo $lab_drug_mast_delete->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_drug_mast_delete->RecordCount = 0;
$i = 0;
while (!$lab_drug_mast_delete->Recordset->EOF) {
	$lab_drug_mast_delete->RecordCount++;
	$lab_drug_mast_delete->RowCount++;

	// Set row properties
	$lab_drug_mast->resetAttributes();
	$lab_drug_mast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_drug_mast_delete->loadRowValues($lab_drug_mast_delete->Recordset);

	// Render row
	$lab_drug_mast_delete->renderRow();
?>
	<tr <?php echo $lab_drug_mast->rowAttributes() ?>>
<?php if ($lab_drug_mast_delete->DrugName->Visible) { // DrugName ?>
		<td <?php echo $lab_drug_mast_delete->DrugName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_DrugName" class="lab_drug_mast_DrugName">
<span<?php echo $lab_drug_mast_delete->DrugName->viewAttributes() ?>><?php echo $lab_drug_mast_delete->DrugName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->Positive->Visible) { // Positive ?>
		<td <?php echo $lab_drug_mast_delete->Positive->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_Positive" class="lab_drug_mast_Positive">
<span<?php echo $lab_drug_mast_delete->Positive->viewAttributes() ?>><?php echo $lab_drug_mast_delete->Positive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->Negative->Visible) { // Negative ?>
		<td <?php echo $lab_drug_mast_delete->Negative->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_Negative" class="lab_drug_mast_Negative">
<span<?php echo $lab_drug_mast_delete->Negative->viewAttributes() ?>><?php echo $lab_drug_mast_delete->Negative->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->ShortName->Visible) { // ShortName ?>
		<td <?php echo $lab_drug_mast_delete->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_ShortName" class="lab_drug_mast_ShortName">
<span<?php echo $lab_drug_mast_delete->ShortName->viewAttributes() ?>><?php echo $lab_drug_mast_delete->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->GroupCD->Visible) { // GroupCD ?>
		<td <?php echo $lab_drug_mast_delete->GroupCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_GroupCD" class="lab_drug_mast_GroupCD">
<span<?php echo $lab_drug_mast_delete->GroupCD->viewAttributes() ?>><?php echo $lab_drug_mast_delete->GroupCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->Content->Visible) { // Content ?>
		<td <?php echo $lab_drug_mast_delete->Content->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_Content" class="lab_drug_mast_Content">
<span<?php echo $lab_drug_mast_delete->Content->viewAttributes() ?>><?php echo $lab_drug_mast_delete->Content->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->Order->Visible) { // Order ?>
		<td <?php echo $lab_drug_mast_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_Order" class="lab_drug_mast_Order">
<span<?php echo $lab_drug_mast_delete->Order->viewAttributes() ?>><?php echo $lab_drug_mast_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->DrugCD->Visible) { // DrugCD ?>
		<td <?php echo $lab_drug_mast_delete->DrugCD->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_DrugCD" class="lab_drug_mast_DrugCD">
<span<?php echo $lab_drug_mast_delete->DrugCD->viewAttributes() ?>><?php echo $lab_drug_mast_delete->DrugCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_drug_mast_delete->id->Visible) { // id ?>
		<td <?php echo $lab_drug_mast_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_drug_mast_delete->RowCount ?>_lab_drug_mast_id" class="lab_drug_mast_id">
<span<?php echo $lab_drug_mast_delete->id->viewAttributes() ?>><?php echo $lab_drug_mast_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_drug_mast_delete->Recordset->moveNext();
}
$lab_drug_mast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_drug_mast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_drug_mast_delete->showPageFooter();
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
$lab_drug_mast_delete->terminate();
?>