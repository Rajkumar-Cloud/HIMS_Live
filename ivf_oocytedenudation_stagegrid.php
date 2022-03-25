<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_oocytedenudation_stage_grid))
	$ivf_oocytedenudation_stage_grid = new ivf_oocytedenudation_stage_grid();

// Run the page
$ivf_oocytedenudation_stage_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_stage_grid->Page_Render();
?>
<?php if (!$ivf_oocytedenudation_stage->isExport()) { ?>
<script>

// Form object
var fivf_oocytedenudation_stagegrid = new ew.Form("fivf_oocytedenudation_stagegrid", "grid");
fivf_oocytedenudation_stagegrid.formKeyCountName = '<?php echo $ivf_oocytedenudation_stage_grid->FormKeyCountName ?>';

// Validate form
fivf_oocytedenudation_stagegrid.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($ivf_oocytedenudation_stage_grid->OocyteNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage->OocyteNo->caption(), $ivf_oocytedenudation_stage->OocyteNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_stage_grid->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage->Stage->caption(), $ivf_oocytedenudation_stage->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_stage_grid->ReMarks->Required) { ?>
			elm = this.getElements("x" + infix + "_ReMarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_stage->ReMarks->caption(), $ivf_oocytedenudation_stage->ReMarks->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_oocytedenudation_stagegrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "OocyteNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Stage", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReMarks", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_oocytedenudation_stagegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudation_stagegrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudation_stagegrid.lists["x_Stage"] = <?php echo $ivf_oocytedenudation_stage_grid->Stage->Lookup->toClientList() ?>;
fivf_oocytedenudation_stagegrid.lists["x_Stage"].options = <?php echo JsonEncode($ivf_oocytedenudation_stage_grid->Stage->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$ivf_oocytedenudation_stage_grid->renderOtherOptions();
?>
<?php $ivf_oocytedenudation_stage_grid->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_stage_grid->showMessage();
?>
<?php if ($ivf_oocytedenudation_stage_grid->TotalRecs > 0 || $ivf_oocytedenudation_stage->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_oocytedenudation_stage_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation_stage">
<?php if ($ivf_oocytedenudation_stage_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_oocytedenudation_stage_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_oocytedenudation_stagegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_oocytedenudation_stage" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_oocytedenudation_stagegrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_oocytedenudation_stage_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_oocytedenudation_stage_grid->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_stage_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
	<?php if ($ivf_oocytedenudation_stage->sortUrl($ivf_oocytedenudation_stage->OocyteNo) == "") { ?>
		<th data-name="OocyteNo" class="<?php echo $ivf_oocytedenudation_stage->OocyteNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteNo" class="<?php echo $ivf_oocytedenudation_stage->OocyteNo->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->OocyteNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage->OocyteNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_stage->OocyteNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
	<?php if ($ivf_oocytedenudation_stage->sortUrl($ivf_oocytedenudation_stage->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $ivf_oocytedenudation_stage->Stage->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $ivf_oocytedenudation_stage->Stage->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->Stage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage->Stage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_stage->Stage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
	<?php if ($ivf_oocytedenudation_stage->sortUrl($ivf_oocytedenudation_stage->ReMarks) == "") { ?>
		<th data-name="ReMarks" class="<?php echo $ivf_oocytedenudation_stage->ReMarks->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReMarks" class="<?php echo $ivf_oocytedenudation_stage->ReMarks->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_stage->ReMarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_stage->ReMarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_stage->ReMarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_oocytedenudation_stage_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_oocytedenudation_stage_grid->StartRec = 1;
$ivf_oocytedenudation_stage_grid->StopRec = $ivf_oocytedenudation_stage_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_oocytedenudation_stage_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_oocytedenudation_stage_grid->FormKeyCountName) && ($ivf_oocytedenudation_stage->isGridAdd() || $ivf_oocytedenudation_stage->isGridEdit() || $ivf_oocytedenudation_stage->isConfirm())) {
		$ivf_oocytedenudation_stage_grid->KeyCount = $CurrentForm->getValue($ivf_oocytedenudation_stage_grid->FormKeyCountName);
		$ivf_oocytedenudation_stage_grid->StopRec = $ivf_oocytedenudation_stage_grid->StartRec + $ivf_oocytedenudation_stage_grid->KeyCount - 1;
	}
}
$ivf_oocytedenudation_stage_grid->RecCnt = $ivf_oocytedenudation_stage_grid->StartRec - 1;
if ($ivf_oocytedenudation_stage_grid->Recordset && !$ivf_oocytedenudation_stage_grid->Recordset->EOF) {
	$ivf_oocytedenudation_stage_grid->Recordset->moveFirst();
	$selectLimit = $ivf_oocytedenudation_stage_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_oocytedenudation_stage_grid->StartRec > 1)
		$ivf_oocytedenudation_stage_grid->Recordset->move($ivf_oocytedenudation_stage_grid->StartRec - 1);
} elseif (!$ivf_oocytedenudation_stage->AllowAddDeleteRow && $ivf_oocytedenudation_stage_grid->StopRec == 0) {
	$ivf_oocytedenudation_stage_grid->StopRec = $ivf_oocytedenudation_stage->GridAddRowCount;
}

// Initialize aggregate
$ivf_oocytedenudation_stage->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_oocytedenudation_stage->resetAttributes();
$ivf_oocytedenudation_stage_grid->renderRow();
if ($ivf_oocytedenudation_stage->isGridAdd())
	$ivf_oocytedenudation_stage_grid->RowIndex = 0;
if ($ivf_oocytedenudation_stage->isGridEdit())
	$ivf_oocytedenudation_stage_grid->RowIndex = 0;
while ($ivf_oocytedenudation_stage_grid->RecCnt < $ivf_oocytedenudation_stage_grid->StopRec) {
	$ivf_oocytedenudation_stage_grid->RecCnt++;
	if ($ivf_oocytedenudation_stage_grid->RecCnt >= $ivf_oocytedenudation_stage_grid->StartRec) {
		$ivf_oocytedenudation_stage_grid->RowCnt++;
		if ($ivf_oocytedenudation_stage->isGridAdd() || $ivf_oocytedenudation_stage->isGridEdit() || $ivf_oocytedenudation_stage->isConfirm()) {
			$ivf_oocytedenudation_stage_grid->RowIndex++;
			$CurrentForm->Index = $ivf_oocytedenudation_stage_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_oocytedenudation_stage_grid->FormActionName) && $ivf_oocytedenudation_stage_grid->EventCancelled)
				$ivf_oocytedenudation_stage_grid->RowAction = strval($CurrentForm->getValue($ivf_oocytedenudation_stage_grid->FormActionName));
			elseif ($ivf_oocytedenudation_stage->isGridAdd())
				$ivf_oocytedenudation_stage_grid->RowAction = "insert";
			else
				$ivf_oocytedenudation_stage_grid->RowAction = "";
		}

		// Set up key count
		$ivf_oocytedenudation_stage_grid->KeyCount = $ivf_oocytedenudation_stage_grid->RowIndex;

		// Init row class and style
		$ivf_oocytedenudation_stage->resetAttributes();
		$ivf_oocytedenudation_stage->CssClass = "";
		if ($ivf_oocytedenudation_stage->isGridAdd()) {
			if ($ivf_oocytedenudation_stage->CurrentMode == "copy") {
				$ivf_oocytedenudation_stage_grid->loadRowValues($ivf_oocytedenudation_stage_grid->Recordset); // Load row values
				$ivf_oocytedenudation_stage_grid->setRecordKey($ivf_oocytedenudation_stage_grid->RowOldKey, $ivf_oocytedenudation_stage_grid->Recordset); // Set old record key
			} else {
				$ivf_oocytedenudation_stage_grid->loadRowValues(); // Load default values
				$ivf_oocytedenudation_stage_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_oocytedenudation_stage_grid->loadRowValues($ivf_oocytedenudation_stage_grid->Recordset); // Load row values
		}
		$ivf_oocytedenudation_stage->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_oocytedenudation_stage->isGridAdd()) // Grid add
			$ivf_oocytedenudation_stage->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_oocytedenudation_stage->isGridAdd() && $ivf_oocytedenudation_stage->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_oocytedenudation_stage_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_stage_grid->RowIndex); // Restore form values
		if ($ivf_oocytedenudation_stage->isGridEdit()) { // Grid edit
			if ($ivf_oocytedenudation_stage->EventCancelled)
				$ivf_oocytedenudation_stage_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_stage_grid->RowIndex); // Restore form values
			if ($ivf_oocytedenudation_stage_grid->RowAction == "insert")
				$ivf_oocytedenudation_stage->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_oocytedenudation_stage->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_oocytedenudation_stage->isGridEdit() && ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT || $ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) && $ivf_oocytedenudation_stage->EventCancelled) // Update failed
			$ivf_oocytedenudation_stage_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_stage_grid->RowIndex); // Restore form values
		if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_oocytedenudation_stage_grid->EditRowCnt++;
		if ($ivf_oocytedenudation_stage->isConfirm()) // Confirm row
			$ivf_oocytedenudation_stage_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_stage_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_oocytedenudation_stage->RowAttrs = array_merge($ivf_oocytedenudation_stage->RowAttrs, array('data-rowindex'=>$ivf_oocytedenudation_stage_grid->RowCnt, 'id'=>'r' . $ivf_oocytedenudation_stage_grid->RowCnt . '_ivf_oocytedenudation_stage', 'data-rowtype'=>$ivf_oocytedenudation_stage->RowType));

		// Render row
		$ivf_oocytedenudation_stage_grid->renderRow();

		// Render list options
		$ivf_oocytedenudation_stage_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_oocytedenudation_stage_grid->RowAction <> "delete" && $ivf_oocytedenudation_stage_grid->RowAction <> "insertdelete" && !($ivf_oocytedenudation_stage_grid->RowAction == "insert" && $ivf_oocytedenudation_stage->isConfirm() && $ivf_oocytedenudation_stage_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_oocytedenudation_stage->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_stage_grid->ListOptions->render("body", "left", $ivf_oocytedenudation_stage_grid->RowCnt);
?>
	<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo"<?php echo $ivf_oocytedenudation_stage->OocyteNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->OocyteNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->OocyteNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo">
<span<?php echo $ivf_oocytedenudation_stage->OocyteNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->OocyteNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation_stage->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="fivf_oocytedenudation_stagegrid$x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="fivf_oocytedenudation_stagegrid$x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="fivf_oocytedenudation_stagegrid$o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="fivf_oocytedenudation_stagegrid$o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT || $ivf_oocytedenudation_stage->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
		<td data-name="Stage"<?php echo $ivf_oocytedenudation_stage->Stage->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage"<?php echo $ivf_oocytedenudation_stage->Stage->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation_stage->Stage->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage"<?php echo $ivf_oocytedenudation_stage->Stage->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation_stage->Stage->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage">
<span<?php echo $ivf_oocytedenudation_stage->Stage->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->Stage->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation_stage->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="fivf_oocytedenudation_stagegrid$x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" id="fivf_oocytedenudation_stagegrid$x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="fivf_oocytedenudation_stagegrid$o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" id="fivf_oocytedenudation_stagegrid$o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
		<td data-name="ReMarks"<?php echo $ivf_oocytedenudation_stage->ReMarks->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->ReMarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->ReMarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_stage_grid->RowCnt ?>_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks">
<span<?php echo $ivf_oocytedenudation_stage->ReMarks->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation_stage->ReMarks->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation_stage->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="fivf_oocytedenudation_stagegrid$x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="fivf_oocytedenudation_stagegrid$x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="fivf_oocytedenudation_stagegrid$o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="fivf_oocytedenudation_stagegrid$o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_stage_grid->ListOptions->render("body", "right", $ivf_oocytedenudation_stage_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_oocytedenudation_stage->RowType == ROWTYPE_ADD || $ivf_oocytedenudation_stage->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_oocytedenudation_stagegrid.updateLists(<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_oocytedenudation_stage->isGridAdd() || $ivf_oocytedenudation_stage->CurrentMode == "copy")
		if (!$ivf_oocytedenudation_stage_grid->Recordset->EOF)
			$ivf_oocytedenudation_stage_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_oocytedenudation_stage->CurrentMode == "add" || $ivf_oocytedenudation_stage->CurrentMode == "copy" || $ivf_oocytedenudation_stage->CurrentMode == "edit") {
		$ivf_oocytedenudation_stage_grid->RowIndex = '$rowindex$';
		$ivf_oocytedenudation_stage_grid->loadRowValues();

		// Set row properties
		$ivf_oocytedenudation_stage->resetAttributes();
		$ivf_oocytedenudation_stage->RowAttrs = array_merge($ivf_oocytedenudation_stage->RowAttrs, array('data-rowindex'=>$ivf_oocytedenudation_stage_grid->RowIndex, 'id'=>'r0_ivf_oocytedenudation_stage', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_oocytedenudation_stage->RowAttrs["class"], "ew-template");
		$ivf_oocytedenudation_stage->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_oocytedenudation_stage_grid->renderRow();

		// Render list options
		$ivf_oocytedenudation_stage_grid->renderListOptions();
		$ivf_oocytedenudation_stage_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_oocytedenudation_stage->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_stage_grid->ListOptions->render("body", "left", $ivf_oocytedenudation_stage_grid->RowIndex);
?>
	<?php if ($ivf_oocytedenudation_stage->OocyteNo->Visible) { // OocyteNo ?>
		<td data-name="OocyteNo">
<?php if (!$ivf_oocytedenudation_stage->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->OocyteNo->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->OocyteNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_stage_OocyteNo" class="form-group ivf_oocytedenudation_stage_OocyteNo">
<span<?php echo $ivf_oocytedenudation_stage->OocyteNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation_stage->OocyteNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_OocyteNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->OocyteNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<?php if (!$ivf_oocytedenudation_stage->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" data-value-separator="<?php echo $ivf_oocytedenudation_stage->Stage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage"<?php echo $ivf_oocytedenudation_stage->Stage->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation_stage->Stage->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_stage_Stage" class="form-group ivf_oocytedenudation_stage_Stage">
<span<?php echo $ivf_oocytedenudation_stage->Stage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation_stage->Stage->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_Stage" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->Stage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_stage->ReMarks->Visible) { // ReMarks ?>
		<td data-name="ReMarks">
<?php if (!$ivf_oocytedenudation_stage->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<input type="text" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_stage->ReMarks->EditValue ?>"<?php echo $ivf_oocytedenudation_stage->ReMarks->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_stage_ReMarks" class="form-group ivf_oocytedenudation_stage_ReMarks">
<span<?php echo $ivf_oocytedenudation_stage->ReMarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation_stage->ReMarks->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="x<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" id="o<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>_ReMarks" value="<?php echo HtmlEncode($ivf_oocytedenudation_stage->ReMarks->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_stage_grid->ListOptions->render("body", "right", $ivf_oocytedenudation_stage_grid->RowIndex);
?>
<script>
fivf_oocytedenudation_stagegrid.updateLists(<?php echo $ivf_oocytedenudation_stage_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_oocytedenudation_stage->CurrentMode == "add" || $ivf_oocytedenudation_stage->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_oocytedenudation_stage_grid->FormKeyCountName ?>" id="<?php echo $ivf_oocytedenudation_stage_grid->FormKeyCountName ?>" value="<?php echo $ivf_oocytedenudation_stage_grid->KeyCount ?>">
<?php echo $ivf_oocytedenudation_stage_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_oocytedenudation_stage_grid->FormKeyCountName ?>" id="<?php echo $ivf_oocytedenudation_stage_grid->FormKeyCountName ?>" value="<?php echo $ivf_oocytedenudation_stage_grid->KeyCount ?>">
<?php echo $ivf_oocytedenudation_stage_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_stage->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_oocytedenudation_stagegrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_oocytedenudation_stage_grid->Recordset)
	$ivf_oocytedenudation_stage_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_oocytedenudation_stage_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_oocytedenudation_stage_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_oocytedenudation_stage_grid->TotalRecs == 0 && !$ivf_oocytedenudation_stage->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_stage_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_oocytedenudation_stage_grid->terminate();
?>