<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($lab_agerange_grid))
	$lab_agerange_grid = new lab_agerange_grid();

// Run the page
$lab_agerange_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_agerange_grid->Page_Render();
?>
<?php if (!$lab_agerange->isExport()) { ?>
<script>

// Form object
var flab_agerangegrid = new ew.Form("flab_agerangegrid", "grid");
flab_agerangegrid.formKeyCountName = '<?php echo $lab_agerange_grid->FormKeyCountName ?>';

// Validate form
flab_agerangegrid.validate = function() {
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
		<?php if ($lab_agerange_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->id->caption(), $lab_agerange->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->Gender->caption(), $lab_agerange->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_grid->MinAge->Required) { ?>
			elm = this.getElements("x" + infix + "_MinAge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MinAge->caption(), $lab_agerange->MinAge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MinAge");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_agerange->MinAge->errorMessage()) ?>");
		<?php if ($lab_agerange_grid->MinAgeType->Required) { ?>
			elm = this.getElements("x" + infix + "_MinAgeType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MinAgeType->caption(), $lab_agerange->MinAgeType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_grid->MaxAge->Required) { ?>
			elm = this.getElements("x" + infix + "_MaxAge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MaxAge->caption(), $lab_agerange->MaxAge->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MaxAge");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_agerange->MaxAge->errorMessage()) ?>");
		<?php if ($lab_agerange_grid->MaxAgeType->Required) { ?>
			elm = this.getElements("x" + infix + "_MaxAgeType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->MaxAgeType->caption(), $lab_agerange->MaxAgeType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_agerange_grid->Value->Required) { ?>
			elm = this.getElements("x" + infix + "_Value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_agerange->Value->caption(), $lab_agerange->Value->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
flab_agerangegrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "MinAge", false)) return false;
	if (ew.valueChanged(fobj, infix, "MinAgeType", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaxAge", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaxAgeType", false)) return false;
	if (ew.valueChanged(fobj, infix, "Value", false)) return false;
	return true;
}

// Form_CustomValidate event
flab_agerangegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_agerangegrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_agerangegrid.lists["x_Gender"] = <?php echo $lab_agerange_grid->Gender->Lookup->toClientList() ?>;
flab_agerangegrid.lists["x_Gender"].options = <?php echo JsonEncode($lab_agerange_grid->Gender->lookupOptions()) ?>;
flab_agerangegrid.lists["x_MinAgeType"] = <?php echo $lab_agerange_grid->MinAgeType->Lookup->toClientList() ?>;
flab_agerangegrid.lists["x_MinAgeType"].options = <?php echo JsonEncode($lab_agerange_grid->MinAgeType->options(FALSE, TRUE)) ?>;
flab_agerangegrid.lists["x_MaxAgeType"] = <?php echo $lab_agerange_grid->MaxAgeType->Lookup->toClientList() ?>;
flab_agerangegrid.lists["x_MaxAgeType"].options = <?php echo JsonEncode($lab_agerange_grid->MaxAgeType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$lab_agerange_grid->renderOtherOptions();
?>
<?php $lab_agerange_grid->showPageHeader(); ?>
<?php
$lab_agerange_grid->showMessage();
?>
<?php if ($lab_agerange_grid->TotalRecs > 0 || $lab_agerange->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_agerange_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_agerange">
<?php if ($lab_agerange_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $lab_agerange_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="flab_agerangegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_lab_agerange" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_lab_agerangegrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_agerange_grid->RowType = ROWTYPE_HEADER;

// Render list options
$lab_agerange_grid->renderListOptions();

// Render list options (header, left)
$lab_agerange_grid->ListOptions->render("header", "left");
?>
<?php if ($lab_agerange->id->Visible) { // id ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_agerange->id->headerCellClass() ?>"><div id="elh_lab_agerange_id" class="lab_agerange_id"><div class="ew-table-header-caption"><?php echo $lab_agerange->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_agerange->id->headerCellClass() ?>"><div><div id="elh_lab_agerange_id" class="lab_agerange_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $lab_agerange->Gender->headerCellClass() ?>"><div id="elh_lab_agerange_Gender" class="lab_agerange_Gender"><div class="ew-table-header-caption"><?php echo $lab_agerange->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $lab_agerange->Gender->headerCellClass() ?>"><div><div id="elh_lab_agerange_Gender" class="lab_agerange_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MinAge) == "") { ?>
		<th data-name="MinAge" class="<?php echo $lab_agerange->MinAge->headerCellClass() ?>"><div id="elh_lab_agerange_MinAge" class="lab_agerange_MinAge"><div class="ew-table-header-caption"><?php echo $lab_agerange->MinAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinAge" class="<?php echo $lab_agerange->MinAge->headerCellClass() ?>"><div><div id="elh_lab_agerange_MinAge" class="lab_agerange_MinAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MinAge->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MinAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MinAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MinAgeType) == "") { ?>
		<th data-name="MinAgeType" class="<?php echo $lab_agerange->MinAgeType->headerCellClass() ?>"><div id="elh_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType"><div class="ew-table-header-caption"><?php echo $lab_agerange->MinAgeType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinAgeType" class="<?php echo $lab_agerange->MinAgeType->headerCellClass() ?>"><div><div id="elh_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MinAgeType->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MinAgeType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MinAgeType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MaxAge) == "") { ?>
		<th data-name="MaxAge" class="<?php echo $lab_agerange->MaxAge->headerCellClass() ?>"><div id="elh_lab_agerange_MaxAge" class="lab_agerange_MaxAge"><div class="ew-table-header-caption"><?php echo $lab_agerange->MaxAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaxAge" class="<?php echo $lab_agerange->MaxAge->headerCellClass() ?>"><div><div id="elh_lab_agerange_MaxAge" class="lab_agerange_MaxAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MaxAge->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MaxAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MaxAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->MaxAgeType) == "") { ?>
		<th data-name="MaxAgeType" class="<?php echo $lab_agerange->MaxAgeType->headerCellClass() ?>"><div id="elh_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType"><div class="ew-table-header-caption"><?php echo $lab_agerange->MaxAgeType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaxAgeType" class="<?php echo $lab_agerange->MaxAgeType->headerCellClass() ?>"><div><div id="elh_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->MaxAgeType->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->MaxAgeType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->MaxAgeType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_agerange->Value->Visible) { // Value ?>
	<?php if ($lab_agerange->sortUrl($lab_agerange->Value) == "") { ?>
		<th data-name="Value" class="<?php echo $lab_agerange->Value->headerCellClass() ?>"><div id="elh_lab_agerange_Value" class="lab_agerange_Value"><div class="ew-table-header-caption"><?php echo $lab_agerange->Value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Value" class="<?php echo $lab_agerange->Value->headerCellClass() ?>"><div><div id="elh_lab_agerange_Value" class="lab_agerange_Value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_agerange->Value->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_agerange->Value->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_agerange->Value->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_agerange_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$lab_agerange_grid->StartRec = 1;
$lab_agerange_grid->StopRec = $lab_agerange_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $lab_agerange_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_agerange_grid->FormKeyCountName) && ($lab_agerange->isGridAdd() || $lab_agerange->isGridEdit() || $lab_agerange->isConfirm())) {
		$lab_agerange_grid->KeyCount = $CurrentForm->getValue($lab_agerange_grid->FormKeyCountName);
		$lab_agerange_grid->StopRec = $lab_agerange_grid->StartRec + $lab_agerange_grid->KeyCount - 1;
	}
}
$lab_agerange_grid->RecCnt = $lab_agerange_grid->StartRec - 1;
if ($lab_agerange_grid->Recordset && !$lab_agerange_grid->Recordset->EOF) {
	$lab_agerange_grid->Recordset->moveFirst();
	$selectLimit = $lab_agerange_grid->UseSelectLimit;
	if (!$selectLimit && $lab_agerange_grid->StartRec > 1)
		$lab_agerange_grid->Recordset->move($lab_agerange_grid->StartRec - 1);
} elseif (!$lab_agerange->AllowAddDeleteRow && $lab_agerange_grid->StopRec == 0) {
	$lab_agerange_grid->StopRec = $lab_agerange->GridAddRowCount;
}

// Initialize aggregate
$lab_agerange->RowType = ROWTYPE_AGGREGATEINIT;
$lab_agerange->resetAttributes();
$lab_agerange_grid->renderRow();
if ($lab_agerange->isGridAdd())
	$lab_agerange_grid->RowIndex = 0;
if ($lab_agerange->isGridEdit())
	$lab_agerange_grid->RowIndex = 0;
while ($lab_agerange_grid->RecCnt < $lab_agerange_grid->StopRec) {
	$lab_agerange_grid->RecCnt++;
	if ($lab_agerange_grid->RecCnt >= $lab_agerange_grid->StartRec) {
		$lab_agerange_grid->RowCnt++;
		if ($lab_agerange->isGridAdd() || $lab_agerange->isGridEdit() || $lab_agerange->isConfirm()) {
			$lab_agerange_grid->RowIndex++;
			$CurrentForm->Index = $lab_agerange_grid->RowIndex;
			if ($CurrentForm->hasValue($lab_agerange_grid->FormActionName) && $lab_agerange_grid->EventCancelled)
				$lab_agerange_grid->RowAction = strval($CurrentForm->getValue($lab_agerange_grid->FormActionName));
			elseif ($lab_agerange->isGridAdd())
				$lab_agerange_grid->RowAction = "insert";
			else
				$lab_agerange_grid->RowAction = "";
		}

		// Set up key count
		$lab_agerange_grid->KeyCount = $lab_agerange_grid->RowIndex;

		// Init row class and style
		$lab_agerange->resetAttributes();
		$lab_agerange->CssClass = "";
		if ($lab_agerange->isGridAdd()) {
			if ($lab_agerange->CurrentMode == "copy") {
				$lab_agerange_grid->loadRowValues($lab_agerange_grid->Recordset); // Load row values
				$lab_agerange_grid->setRecordKey($lab_agerange_grid->RowOldKey, $lab_agerange_grid->Recordset); // Set old record key
			} else {
				$lab_agerange_grid->loadRowValues(); // Load default values
				$lab_agerange_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$lab_agerange_grid->loadRowValues($lab_agerange_grid->Recordset); // Load row values
		}
		$lab_agerange->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_agerange->isGridAdd()) // Grid add
			$lab_agerange->RowType = ROWTYPE_ADD; // Render add
		if ($lab_agerange->isGridAdd() && $lab_agerange->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_agerange_grid->restoreCurrentRowFormValues($lab_agerange_grid->RowIndex); // Restore form values
		if ($lab_agerange->isGridEdit()) { // Grid edit
			if ($lab_agerange->EventCancelled)
				$lab_agerange_grid->restoreCurrentRowFormValues($lab_agerange_grid->RowIndex); // Restore form values
			if ($lab_agerange_grid->RowAction == "insert")
				$lab_agerange->RowType = ROWTYPE_ADD; // Render add
			else
				$lab_agerange->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($lab_agerange->isGridEdit() && ($lab_agerange->RowType == ROWTYPE_EDIT || $lab_agerange->RowType == ROWTYPE_ADD) && $lab_agerange->EventCancelled) // Update failed
			$lab_agerange_grid->restoreCurrentRowFormValues($lab_agerange_grid->RowIndex); // Restore form values
		if ($lab_agerange->RowType == ROWTYPE_EDIT) // Edit row
			$lab_agerange_grid->EditRowCnt++;
		if ($lab_agerange->isConfirm()) // Confirm row
			$lab_agerange_grid->restoreCurrentRowFormValues($lab_agerange_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$lab_agerange->RowAttrs = array_merge($lab_agerange->RowAttrs, array('data-rowindex'=>$lab_agerange_grid->RowCnt, 'id'=>'r' . $lab_agerange_grid->RowCnt . '_lab_agerange', 'data-rowtype'=>$lab_agerange->RowType));

		// Render row
		$lab_agerange_grid->renderRow();

		// Render list options
		$lab_agerange_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_agerange_grid->RowAction <> "delete" && $lab_agerange_grid->RowAction <> "insertdelete" && !($lab_agerange_grid->RowAction == "insert" && $lab_agerange->isConfirm() && $lab_agerange_grid->emptyRow())) {
?>
	<tr<?php echo $lab_agerange->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_agerange_grid->ListOptions->render("body", "left", $lab_agerange_grid->RowCnt);
?>
	<?php if ($lab_agerange->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_agerange->id->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="o<?php echo $lab_agerange_grid->RowIndex ?>_id" id="o<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_id" class="form-group lab_agerange_id">
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="x<?php echo $lab_agerange_grid->RowIndex ?>_id" id="x<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->CurrentValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_id" class="lab_agerange_id">
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<?php echo $lab_agerange->id->getViewValue() ?></span>
</span>
<?php if (!$lab_agerange->isConfirm()) { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="x<?php echo $lab_agerange_grid->RowIndex ?>_id" id="x<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="o<?php echo $lab_agerange_grid->RowIndex ?>_id" id="o<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_id" id="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_id" id="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $lab_agerange->Gender->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_Gender" class="form-group lab_agerange_Gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_Gender" data-value-separator="<?php echo $lab_agerange->Gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender"<?php echo $lab_agerange->Gender->editAttributes() ?>>
		<?php echo $lab_agerange->Gender->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_Gender") ?>
	</select>
</div>
<?php echo $lab_agerange->Gender->Lookup->getParamTag("p_x" . $lab_agerange_grid->RowIndex . "_Gender") ?>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" id="o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_Gender" class="form-group lab_agerange_Gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_Gender" data-value-separator="<?php echo $lab_agerange->Gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender"<?php echo $lab_agerange->Gender->editAttributes() ?>>
		<?php echo $lab_agerange->Gender->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_Gender") ?>
	</select>
</div>
<?php echo $lab_agerange->Gender->Lookup->getParamTag("p_x" . $lab_agerange_grid->RowIndex . "_Gender") ?>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_Gender" class="lab_agerange_Gender">
<span<?php echo $lab_agerange->Gender->viewAttributes() ?>>
<?php echo $lab_agerange->Gender->getViewValue() ?></span>
</span>
<?php if (!$lab_agerange->isConfirm()) { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" id="o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" id="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" id="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
		<td data-name="MinAge"<?php echo $lab_agerange->MinAge->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MinAge" class="form-group lab_agerange_MinAge">
<input type="text" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MinAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MinAge->EditValue ?>"<?php echo $lab_agerange->MinAge->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MinAge" class="form-group lab_agerange_MinAge">
<input type="text" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MinAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MinAge->EditValue ?>"<?php echo $lab_agerange->MinAge->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MinAge" class="lab_agerange_MinAge">
<span<?php echo $lab_agerange->MinAge->viewAttributes() ?>>
<?php echo $lab_agerange->MinAge->getViewValue() ?></span>
</span>
<?php if (!$lab_agerange->isConfirm()) { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
		<td data-name="MinAgeType"<?php echo $lab_agerange->MinAgeType->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MinAgeType" class="form-group lab_agerange_MinAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MinAgeType" data-value-separator="<?php echo $lab_agerange->MinAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType"<?php echo $lab_agerange->MinAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MinAgeType->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MinAgeType" class="form-group lab_agerange_MinAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MinAgeType" data-value-separator="<?php echo $lab_agerange->MinAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType"<?php echo $lab_agerange->MinAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MinAgeType->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MinAgeType" class="lab_agerange_MinAgeType">
<span<?php echo $lab_agerange->MinAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MinAgeType->getViewValue() ?></span>
</span>
<?php if (!$lab_agerange->isConfirm()) { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" id="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" id="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
		<td data-name="MaxAge"<?php echo $lab_agerange->MaxAge->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MaxAge" class="form-group lab_agerange_MaxAge">
<input type="text" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MaxAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MaxAge->EditValue ?>"<?php echo $lab_agerange->MaxAge->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MaxAge" class="form-group lab_agerange_MaxAge">
<input type="text" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MaxAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MaxAge->EditValue ?>"<?php echo $lab_agerange->MaxAge->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MaxAge" class="lab_agerange_MaxAge">
<span<?php echo $lab_agerange->MaxAge->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAge->getViewValue() ?></span>
</span>
<?php if (!$lab_agerange->isConfirm()) { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
		<td data-name="MaxAgeType"<?php echo $lab_agerange->MaxAgeType->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MaxAgeType" class="form-group lab_agerange_MaxAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MaxAgeType" data-value-separator="<?php echo $lab_agerange->MaxAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType"<?php echo $lab_agerange->MaxAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MaxAgeType->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MaxAgeType" class="form-group lab_agerange_MaxAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MaxAgeType" data-value-separator="<?php echo $lab_agerange->MaxAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType"<?php echo $lab_agerange->MaxAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MaxAgeType->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_MaxAgeType" class="lab_agerange_MaxAgeType">
<span<?php echo $lab_agerange->MaxAgeType->viewAttributes() ?>>
<?php echo $lab_agerange->MaxAgeType->getViewValue() ?></span>
</span>
<?php if (!$lab_agerange->isConfirm()) { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" id="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" id="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_agerange->Value->Visible) { // Value ?>
		<td data-name="Value"<?php echo $lab_agerange->Value->cellAttributes() ?>>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_Value" class="form-group lab_agerange_Value">
<input type="text" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->Value->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->Value->EditValue ?>"<?php echo $lab_agerange->Value->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="o<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="o<?php echo $lab_agerange_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->OldValue) ?>">
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_Value" class="form-group lab_agerange_Value">
<input type="text" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->Value->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->Value->EditValue ?>"<?php echo $lab_agerange->Value->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_agerange->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_agerange_grid->RowCnt ?>_lab_agerange_Value" class="lab_agerange_Value">
<span<?php echo $lab_agerange->Value->viewAttributes() ?>>
<?php echo $lab_agerange->Value->getViewValue() ?></span>
</span>
<?php if (!$lab_agerange->isConfirm()) { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="o<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="o<?php echo $lab_agerange_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="flab_agerangegrid$x<?php echo $lab_agerange_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->FormValue) ?>">
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="flab_agerangegrid$o<?php echo $lab_agerange_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_agerange_grid->ListOptions->render("body", "right", $lab_agerange_grid->RowCnt);
?>
	</tr>
<?php if ($lab_agerange->RowType == ROWTYPE_ADD || $lab_agerange->RowType == ROWTYPE_EDIT) { ?>
<script>
flab_agerangegrid.updateLists(<?php echo $lab_agerange_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_agerange->isGridAdd() || $lab_agerange->CurrentMode == "copy")
		if (!$lab_agerange_grid->Recordset->EOF)
			$lab_agerange_grid->Recordset->moveNext();
}
?>
<?php
	if ($lab_agerange->CurrentMode == "add" || $lab_agerange->CurrentMode == "copy" || $lab_agerange->CurrentMode == "edit") {
		$lab_agerange_grid->RowIndex = '$rowindex$';
		$lab_agerange_grid->loadRowValues();

		// Set row properties
		$lab_agerange->resetAttributes();
		$lab_agerange->RowAttrs = array_merge($lab_agerange->RowAttrs, array('data-rowindex'=>$lab_agerange_grid->RowIndex, 'id'=>'r0_lab_agerange', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($lab_agerange->RowAttrs["class"], "ew-template");
		$lab_agerange->RowType = ROWTYPE_ADD;

		// Render row
		$lab_agerange_grid->renderRow();

		// Render list options
		$lab_agerange_grid->renderListOptions();
		$lab_agerange_grid->StartRowCnt = 0;
?>
	<tr<?php echo $lab_agerange->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_agerange_grid->ListOptions->render("body", "left", $lab_agerange_grid->RowIndex);
?>
	<?php if ($lab_agerange->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$lab_agerange->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_lab_agerange_id" class="form-group lab_agerange_id">
<span<?php echo $lab_agerange->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="x<?php echo $lab_agerange_grid->RowIndex ?>_id" id="x<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_agerange" data-field="x_id" name="o<?php echo $lab_agerange_grid->RowIndex ?>_id" id="o<?php echo $lab_agerange_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_agerange->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$lab_agerange->isConfirm()) { ?>
<span id="el$rowindex$_lab_agerange_Gender" class="form-group lab_agerange_Gender">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_Gender" data-value-separator="<?php echo $lab_agerange->Gender->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender"<?php echo $lab_agerange->Gender->editAttributes() ?>>
		<?php echo $lab_agerange->Gender->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_Gender") ?>
	</select>
</div>
<?php echo $lab_agerange->Gender->Lookup->getParamTag("p_x" . $lab_agerange_grid->RowIndex . "_Gender") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_agerange_Gender" class="form-group lab_agerange_Gender">
<span<?php echo $lab_agerange->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_agerange" data-field="x_Gender" name="o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" id="o<?php echo $lab_agerange_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($lab_agerange->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAge->Visible) { // MinAge ?>
		<td data-name="MinAge">
<?php if (!$lab_agerange->isConfirm()) { ?>
<span id="el$rowindex$_lab_agerange_MinAge" class="form-group lab_agerange_MinAge">
<input type="text" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MinAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MinAge->EditValue ?>"<?php echo $lab_agerange->MinAge->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_agerange_MinAge" class="form-group lab_agerange_MinAge">
<span<?php echo $lab_agerange->MinAge->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->MinAge->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAge" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAge" value="<?php echo HtmlEncode($lab_agerange->MinAge->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MinAgeType->Visible) { // MinAgeType ?>
		<td data-name="MinAgeType">
<?php if (!$lab_agerange->isConfirm()) { ?>
<span id="el$rowindex$_lab_agerange_MinAgeType" class="form-group lab_agerange_MinAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MinAgeType" data-value-separator="<?php echo $lab_agerange->MinAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType"<?php echo $lab_agerange->MinAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MinAgeType->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_agerange_MinAgeType" class="form-group lab_agerange_MinAgeType">
<span<?php echo $lab_agerange->MinAgeType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->MinAgeType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MinAgeType" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MinAgeType" value="<?php echo HtmlEncode($lab_agerange->MinAgeType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAge->Visible) { // MaxAge ?>
		<td data-name="MaxAge">
<?php if (!$lab_agerange->isConfirm()) { ?>
<span id="el$rowindex$_lab_agerange_MaxAge" class="form-group lab_agerange_MaxAge">
<input type="text" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($lab_agerange->MaxAge->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->MaxAge->EditValue ?>"<?php echo $lab_agerange->MaxAge->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_agerange_MaxAge" class="form-group lab_agerange_MaxAge">
<span<?php echo $lab_agerange->MaxAge->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->MaxAge->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAge" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAge" value="<?php echo HtmlEncode($lab_agerange->MaxAge->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->MaxAgeType->Visible) { // MaxAgeType ?>
		<td data-name="MaxAgeType">
<?php if (!$lab_agerange->isConfirm()) { ?>
<span id="el$rowindex$_lab_agerange_MaxAgeType" class="form-group lab_agerange_MaxAgeType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_agerange" data-field="x_MaxAgeType" data-value-separator="<?php echo $lab_agerange->MaxAgeType->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType"<?php echo $lab_agerange->MaxAgeType->editAttributes() ?>>
		<?php echo $lab_agerange->MaxAgeType->selectOptionListHtml("x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_agerange_MaxAgeType" class="form-group lab_agerange_MaxAgeType">
<span<?php echo $lab_agerange->MaxAgeType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->MaxAgeType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" id="x<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_agerange" data-field="x_MaxAgeType" name="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" id="o<?php echo $lab_agerange_grid->RowIndex ?>_MaxAgeType" value="<?php echo HtmlEncode($lab_agerange->MaxAgeType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_agerange->Value->Visible) { // Value ?>
		<td data-name="Value">
<?php if (!$lab_agerange->isConfirm()) { ?>
<span id="el$rowindex$_lab_agerange_Value" class="form-group lab_agerange_Value">
<input type="text" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_agerange->Value->getPlaceHolder()) ?>" value="<?php echo $lab_agerange->Value->EditValue ?>"<?php echo $lab_agerange->Value->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_agerange_Value" class="form-group lab_agerange_Value">
<span<?php echo $lab_agerange->Value->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_agerange->Value->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="x<?php echo $lab_agerange_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_agerange" data-field="x_Value" name="o<?php echo $lab_agerange_grid->RowIndex ?>_Value" id="o<?php echo $lab_agerange_grid->RowIndex ?>_Value" value="<?php echo HtmlEncode($lab_agerange->Value->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_agerange_grid->ListOptions->render("body", "right", $lab_agerange_grid->RowIndex);
?>
<script>
flab_agerangegrid.updateLists(<?php echo $lab_agerange_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($lab_agerange->CurrentMode == "add" || $lab_agerange->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $lab_agerange_grid->FormKeyCountName ?>" id="<?php echo $lab_agerange_grid->FormKeyCountName ?>" value="<?php echo $lab_agerange_grid->KeyCount ?>">
<?php echo $lab_agerange_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_agerange->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $lab_agerange_grid->FormKeyCountName ?>" id="<?php echo $lab_agerange_grid->FormKeyCountName ?>" value="<?php echo $lab_agerange_grid->KeyCount ?>">
<?php echo $lab_agerange_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_agerange->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="flab_agerangegrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($lab_agerange_grid->Recordset)
	$lab_agerange_grid->Recordset->Close();
?>
</div>
<?php if ($lab_agerange_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $lab_agerange_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_agerange_grid->TotalRecs == 0 && !$lab_agerange->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_agerange_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_agerange_grid->terminate();
?>
<?php if (!$lab_agerange->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_agerange", "95%", "");
</script>
<?php } ?>