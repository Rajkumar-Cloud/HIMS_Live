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
$qaqcrecord_andrology_delete = new qaqcrecord_andrology_delete();

// Run the page
$qaqcrecord_andrology_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$qaqcrecord_andrology_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fqaqcrecord_andrologydelete = currentForm = new ew.Form("fqaqcrecord_andrologydelete", "delete");

// Form_CustomValidate event
fqaqcrecord_andrologydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fqaqcrecord_andrologydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fqaqcrecord_andrologydelete.lists["x_LN2_Checked[]"] = <?php echo $qaqcrecord_andrology_delete->LN2_Checked->Lookup->toClientList() ?>;
fqaqcrecord_andrologydelete.lists["x_LN2_Checked[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_delete->LN2_Checked->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologydelete.lists["x_Incubator_Cleaned[]"] = <?php echo $qaqcrecord_andrology_delete->Incubator_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologydelete.lists["x_Incubator_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_delete->Incubator_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologydelete.lists["x_LAF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_delete->LAF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologydelete.lists["x_LAF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_delete->LAF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologydelete.lists["x_REF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_delete->REF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologydelete.lists["x_REF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_delete->REF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologydelete.lists["x_Heating_Cleaned[]"] = <?php echo $qaqcrecord_andrology_delete->Heating_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologydelete.lists["x_Heating_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_delete->Heating_Cleaned->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $qaqcrecord_andrology_delete->showPageHeader(); ?>
<?php
$qaqcrecord_andrology_delete->showMessage();
?>
<form name="fqaqcrecord_andrologydelete" id="fqaqcrecord_andrologydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($qaqcrecord_andrology_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $qaqcrecord_andrology_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($qaqcrecord_andrology_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($qaqcrecord_andrology->id->Visible) { // id ?>
		<th class="<?php echo $qaqcrecord_andrology->id->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id"><?php echo $qaqcrecord_andrology->id->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
		<th class="<?php echo $qaqcrecord_andrology->Date->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date"><?php echo $qaqcrecord_andrology->Date->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
		<th class="<?php echo $qaqcrecord_andrology->LN2_Level->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level"><?php echo $qaqcrecord_andrology->LN2_Level->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
		<th class="<?php echo $qaqcrecord_andrology->LN2_Checked->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked"><?php echo $qaqcrecord_andrology->LN2_Checked->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
		<th class="<?php echo $qaqcrecord_andrology->Incubator_Temp->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp"><?php echo $qaqcrecord_andrology->Incubator_Temp->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
		<th class="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned"><?php echo $qaqcrecord_andrology->Incubator_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
		<th class="<?php echo $qaqcrecord_andrology->LAF_MG->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG"><?php echo $qaqcrecord_andrology->LAF_MG->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
		<th class="<?php echo $qaqcrecord_andrology->LAF_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned"><?php echo $qaqcrecord_andrology->LAF_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
		<th class="<?php echo $qaqcrecord_andrology->REF_Temp->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp"><?php echo $qaqcrecord_andrology->REF_Temp->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
		<th class="<?php echo $qaqcrecord_andrology->REF_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned"><?php echo $qaqcrecord_andrology->REF_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
		<th class="<?php echo $qaqcrecord_andrology->Heating_Temp->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp"><?php echo $qaqcrecord_andrology->Heating_Temp->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
		<th class="<?php echo $qaqcrecord_andrology->Heating_Cleaned->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned"><?php echo $qaqcrecord_andrology->Heating_Cleaned->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->Createdby->Visible) { // Createdby ?>
		<th class="<?php echo $qaqcrecord_andrology->Createdby->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby"><?php echo $qaqcrecord_andrology->Createdby->caption() ?></span></th>
<?php } ?>
<?php if ($qaqcrecord_andrology->CreatedDate->Visible) { // CreatedDate ?>
		<th class="<?php echo $qaqcrecord_andrology->CreatedDate->headerCellClass() ?>"><span id="elh_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate"><?php echo $qaqcrecord_andrology->CreatedDate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$qaqcrecord_andrology_delete->RecCnt = 0;
$i = 0;
while (!$qaqcrecord_andrology_delete->Recordset->EOF) {
	$qaqcrecord_andrology_delete->RecCnt++;
	$qaqcrecord_andrology_delete->RowCnt++;

	// Set row properties
	$qaqcrecord_andrology->resetAttributes();
	$qaqcrecord_andrology->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$qaqcrecord_andrology_delete->loadRowValues($qaqcrecord_andrology_delete->Recordset);

	// Render row
	$qaqcrecord_andrology_delete->renderRow();
?>
	<tr<?php echo $qaqcrecord_andrology->rowAttributes() ?>>
<?php if ($qaqcrecord_andrology->id->Visible) { // id ?>
		<td<?php echo $qaqcrecord_andrology->id->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id">
<span<?php echo $qaqcrecord_andrology->id->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
		<td<?php echo $qaqcrecord_andrology->Date->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date">
<span<?php echo $qaqcrecord_andrology->Date->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
		<td<?php echo $qaqcrecord_andrology->LN2_Level->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level">
<span<?php echo $qaqcrecord_andrology->LN2_Level->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LN2_Level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
		<td<?php echo $qaqcrecord_andrology->LN2_Checked->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked">
<span<?php echo $qaqcrecord_andrology->LN2_Checked->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LN2_Checked->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
		<td<?php echo $qaqcrecord_andrology->Incubator_Temp->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp">
<span<?php echo $qaqcrecord_andrology->Incubator_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Incubator_Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
		<td<?php echo $qaqcrecord_andrology->Incubator_Cleaned->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned">
<span<?php echo $qaqcrecord_andrology->Incubator_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
		<td<?php echo $qaqcrecord_andrology->LAF_MG->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG">
<span<?php echo $qaqcrecord_andrology->LAF_MG->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LAF_MG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
		<td<?php echo $qaqcrecord_andrology->LAF_Cleaned->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned">
<span<?php echo $qaqcrecord_andrology->LAF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
		<td<?php echo $qaqcrecord_andrology->REF_Temp->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp">
<span<?php echo $qaqcrecord_andrology->REF_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->REF_Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
		<td<?php echo $qaqcrecord_andrology->REF_Cleaned->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned">
<span<?php echo $qaqcrecord_andrology->REF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->REF_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
		<td<?php echo $qaqcrecord_andrology->Heating_Temp->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp">
<span<?php echo $qaqcrecord_andrology->Heating_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Heating_Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
		<td<?php echo $qaqcrecord_andrology->Heating_Cleaned->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned">
<span<?php echo $qaqcrecord_andrology->Heating_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->Createdby->Visible) { // Createdby ?>
		<td<?php echo $qaqcrecord_andrology->Createdby->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby">
<span<?php echo $qaqcrecord_andrology->Createdby->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($qaqcrecord_andrology->CreatedDate->Visible) { // CreatedDate ?>
		<td<?php echo $qaqcrecord_andrology->CreatedDate->cellAttributes() ?>>
<span id="el<?php echo $qaqcrecord_andrology_delete->RowCnt ?>_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate">
<span<?php echo $qaqcrecord_andrology->CreatedDate->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->CreatedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$qaqcrecord_andrology_delete->Recordset->moveNext();
}
$qaqcrecord_andrology_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $qaqcrecord_andrology_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$qaqcrecord_andrology_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$qaqcrecord_andrology_delete->terminate();
?>