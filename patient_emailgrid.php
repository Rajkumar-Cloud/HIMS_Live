<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_email_grid))
	$patient_email_grid = new patient_email_grid();

// Run the page
$patient_email_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_grid->Page_Render();
?>
<?php if (!$patient_email->isExport()) { ?>
<script>

// Form object
var fpatient_emailgrid = new ew.Form("fpatient_emailgrid", "grid");
fpatient_emailgrid.formKeyCountName = '<?php echo $patient_email_grid->FormKeyCountName ?>';

// Validate form
fpatient_emailgrid.validate = function() {
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
		<?php if ($patient_email_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->id->caption(), $patient_email->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_grid->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->patient_id->caption(), $patient_email->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_grid->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->_email->caption(), $patient_email->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_grid->email_type->Required) { ?>
			elm = this.getElements("x" + infix + "_email_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->email_type->caption(), $patient_email->email_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_email_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_email->status->caption(), $patient_email->status->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_emailgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "patient_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "_email", false)) return false;
	if (ew.valueChanged(fobj, infix, "email_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_emailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emailgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emailgrid.lists["x_email_type"] = <?php echo $patient_email_grid->email_type->Lookup->toClientList() ?>;
fpatient_emailgrid.lists["x_email_type"].options = <?php echo JsonEncode($patient_email_grid->email_type->lookupOptions()) ?>;
fpatient_emailgrid.lists["x_status"] = <?php echo $patient_email_grid->status->Lookup->toClientList() ?>;
fpatient_emailgrid.lists["x_status"].options = <?php echo JsonEncode($patient_email_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_email_grid->renderOtherOptions();
?>
<?php $patient_email_grid->showPageHeader(); ?>
<?php
$patient_email_grid->showMessage();
?>
<?php if ($patient_email_grid->TotalRecs > 0 || $patient_email->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_email_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_email">
<?php if ($patient_email_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_email_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_emailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_email" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_emailgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_email_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_email_grid->renderListOptions();

// Render list options (header, left)
$patient_email_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_email->id->Visible) { // id ?>
	<?php if ($patient_email->sortUrl($patient_email->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_email->id->headerCellClass() ?>"><div id="elh_patient_email_id" class="patient_email_id"><div class="ew-table-header-caption"><?php echo $patient_email->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_email->id->headerCellClass() ?>"><div><div id="elh_patient_email_id" class="patient_email_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_email->sortUrl($patient_email->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_email->patient_id->headerCellClass() ?>"><div id="elh_patient_email_patient_id" class="patient_email_patient_id"><div class="ew-table-header-caption"><?php echo $patient_email->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_email->patient_id->headerCellClass() ?>"><div><div id="elh_patient_email_patient_id" class="patient_email_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->_email->Visible) { // email ?>
	<?php if ($patient_email->sortUrl($patient_email->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $patient_email->_email->headerCellClass() ?>"><div id="elh_patient_email__email" class="patient_email__email"><div class="ew-table-header-caption"><?php echo $patient_email->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $patient_email->_email->headerCellClass() ?>"><div><div id="elh_patient_email__email" class="patient_email__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->_email->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->email_type->Visible) { // email_type ?>
	<?php if ($patient_email->sortUrl($patient_email->email_type) == "") { ?>
		<th data-name="email_type" class="<?php echo $patient_email->email_type->headerCellClass() ?>"><div id="elh_patient_email_email_type" class="patient_email_email_type"><div class="ew-table-header-caption"><?php echo $patient_email->email_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_type" class="<?php echo $patient_email->email_type->headerCellClass() ?>"><div><div id="elh_patient_email_email_type" class="patient_email_email_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->email_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->email_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email->status->Visible) { // status ?>
	<?php if ($patient_email->sortUrl($patient_email->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_email->status->headerCellClass() ?>"><div id="elh_patient_email_status" class="patient_email_status"><div class="ew-table-header-caption"><?php echo $patient_email->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_email->status->headerCellClass() ?>"><div><div id="elh_patient_email_status" class="patient_email_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_email->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_email_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_email_grid->StartRec = 1;
$patient_email_grid->StopRec = $patient_email_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_email_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_email_grid->FormKeyCountName) && ($patient_email->isGridAdd() || $patient_email->isGridEdit() || $patient_email->isConfirm())) {
		$patient_email_grid->KeyCount = $CurrentForm->getValue($patient_email_grid->FormKeyCountName);
		$patient_email_grid->StopRec = $patient_email_grid->StartRec + $patient_email_grid->KeyCount - 1;
	}
}
$patient_email_grid->RecCnt = $patient_email_grid->StartRec - 1;
if ($patient_email_grid->Recordset && !$patient_email_grid->Recordset->EOF) {
	$patient_email_grid->Recordset->moveFirst();
	$selectLimit = $patient_email_grid->UseSelectLimit;
	if (!$selectLimit && $patient_email_grid->StartRec > 1)
		$patient_email_grid->Recordset->move($patient_email_grid->StartRec - 1);
} elseif (!$patient_email->AllowAddDeleteRow && $patient_email_grid->StopRec == 0) {
	$patient_email_grid->StopRec = $patient_email->GridAddRowCount;
}

// Initialize aggregate
$patient_email->RowType = ROWTYPE_AGGREGATEINIT;
$patient_email->resetAttributes();
$patient_email_grid->renderRow();
if ($patient_email->isGridAdd())
	$patient_email_grid->RowIndex = 0;
if ($patient_email->isGridEdit())
	$patient_email_grid->RowIndex = 0;
while ($patient_email_grid->RecCnt < $patient_email_grid->StopRec) {
	$patient_email_grid->RecCnt++;
	if ($patient_email_grid->RecCnt >= $patient_email_grid->StartRec) {
		$patient_email_grid->RowCnt++;
		if ($patient_email->isGridAdd() || $patient_email->isGridEdit() || $patient_email->isConfirm()) {
			$patient_email_grid->RowIndex++;
			$CurrentForm->Index = $patient_email_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_email_grid->FormActionName) && $patient_email_grid->EventCancelled)
				$patient_email_grid->RowAction = strval($CurrentForm->getValue($patient_email_grid->FormActionName));
			elseif ($patient_email->isGridAdd())
				$patient_email_grid->RowAction = "insert";
			else
				$patient_email_grid->RowAction = "";
		}

		// Set up key count
		$patient_email_grid->KeyCount = $patient_email_grid->RowIndex;

		// Init row class and style
		$patient_email->resetAttributes();
		$patient_email->CssClass = "";
		if ($patient_email->isGridAdd()) {
			if ($patient_email->CurrentMode == "copy") {
				$patient_email_grid->loadRowValues($patient_email_grid->Recordset); // Load row values
				$patient_email_grid->setRecordKey($patient_email_grid->RowOldKey, $patient_email_grid->Recordset); // Set old record key
			} else {
				$patient_email_grid->loadRowValues(); // Load default values
				$patient_email_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_email_grid->loadRowValues($patient_email_grid->Recordset); // Load row values
		}
		$patient_email->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_email->isGridAdd()) // Grid add
			$patient_email->RowType = ROWTYPE_ADD; // Render add
		if ($patient_email->isGridAdd() && $patient_email->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_email_grid->restoreCurrentRowFormValues($patient_email_grid->RowIndex); // Restore form values
		if ($patient_email->isGridEdit()) { // Grid edit
			if ($patient_email->EventCancelled)
				$patient_email_grid->restoreCurrentRowFormValues($patient_email_grid->RowIndex); // Restore form values
			if ($patient_email_grid->RowAction == "insert")
				$patient_email->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_email->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_email->isGridEdit() && ($patient_email->RowType == ROWTYPE_EDIT || $patient_email->RowType == ROWTYPE_ADD) && $patient_email->EventCancelled) // Update failed
			$patient_email_grid->restoreCurrentRowFormValues($patient_email_grid->RowIndex); // Restore form values
		if ($patient_email->RowType == ROWTYPE_EDIT) // Edit row
			$patient_email_grid->EditRowCnt++;
		if ($patient_email->isConfirm()) // Confirm row
			$patient_email_grid->restoreCurrentRowFormValues($patient_email_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_email->RowAttrs = array_merge($patient_email->RowAttrs, array('data-rowindex'=>$patient_email_grid->RowCnt, 'id'=>'r' . $patient_email_grid->RowCnt . '_patient_email', 'data-rowtype'=>$patient_email->RowType));

		// Render row
		$patient_email_grid->renderRow();

		// Render list options
		$patient_email_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_email_grid->RowAction <> "delete" && $patient_email_grid->RowAction <> "insertdelete" && !($patient_email_grid->RowAction == "insert" && $patient_email->isConfirm() && $patient_email_grid->emptyRow())) {
?>
	<tr<?php echo $patient_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_email_grid->ListOptions->render("body", "left", $patient_email_grid->RowCnt);
?>
	<?php if ($patient_email->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_email->id->cellAttributes() ?>>
<?php if ($patient_email->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_email" data-field="x_id" name="o<?php echo $patient_email_grid->RowIndex ?>_id" id="o<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_id" class="form-group patient_email_id">
<span<?php echo $patient_email->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_id" name="x<?php echo $patient_email_grid->RowIndex ?>_id" id="x<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_id" class="patient_email_id">
<span<?php echo $patient_email->id->viewAttributes() ?>>
<?php echo $patient_email->id->getViewValue() ?></span>
</span>
<?php if (!$patient_email->isConfirm()) { ?>
<input type="hidden" data-table="patient_email" data-field="x_id" name="x<?php echo $patient_email_grid->RowIndex ?>_id" id="x<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_id" name="o<?php echo $patient_email_grid->RowIndex ?>_id" id="o<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_email" data-field="x_id" name="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_id" id="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_id" name="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_id" id="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_email->patient_id->cellAttributes() ?>>
<?php if ($patient_email->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_email->patient_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_patient_id" class="form-group patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_patient_id" class="form-group patient_email_patient_id">
<input type="text" data-table="patient_email" data-field="x_patient_id" name="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_email->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_email->patient_id->EditValue ?>"<?php echo $patient_email->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="o<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_patient_id" class="form-group patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->patient_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_patient_id" class="patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<?php echo $patient_email->patient_id->getViewValue() ?></span>
</span>
<?php if (!$patient_email->isConfirm()) { ?>
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="o<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_email->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $patient_email->_email->cellAttributes() ?>>
<?php if ($patient_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email__email" class="form-group patient_email__email">
<input type="text" data-table="patient_email" data-field="x__email" name="x<?php echo $patient_email_grid->RowIndex ?>__email" id="x<?php echo $patient_email_grid->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_email->_email->getPlaceHolder()) ?>" value="<?php echo $patient_email->_email->EditValue ?>"<?php echo $patient_email->_email->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_email" data-field="x__email" name="o<?php echo $patient_email_grid->RowIndex ?>__email" id="o<?php echo $patient_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($patient_email->_email->OldValue) ?>">
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email__email" class="form-group patient_email__email">
<input type="text" data-table="patient_email" data-field="x__email" name="x<?php echo $patient_email_grid->RowIndex ?>__email" id="x<?php echo $patient_email_grid->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_email->_email->getPlaceHolder()) ?>" value="<?php echo $patient_email->_email->EditValue ?>"<?php echo $patient_email->_email->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email__email" class="patient_email__email">
<span<?php echo $patient_email->_email->viewAttributes() ?>>
<?php echo $patient_email->_email->getViewValue() ?></span>
</span>
<?php if (!$patient_email->isConfirm()) { ?>
<input type="hidden" data-table="patient_email" data-field="x__email" name="x<?php echo $patient_email_grid->RowIndex ?>__email" id="x<?php echo $patient_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($patient_email->_email->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x__email" name="o<?php echo $patient_email_grid->RowIndex ?>__email" id="o<?php echo $patient_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($patient_email->_email->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_email" data-field="x__email" name="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>__email" id="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($patient_email->_email->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x__email" name="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>__email" id="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($patient_email->_email->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_email->email_type->Visible) { // email_type ?>
		<td data-name="email_type"<?php echo $patient_email->email_type->cellAttributes() ?>>
<?php if ($patient_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_email_type" class="form-group patient_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_email_type" data-value-separator="<?php echo $patient_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_email_grid->RowIndex ?>_email_type" name="x<?php echo $patient_email_grid->RowIndex ?>_email_type"<?php echo $patient_email->email_type->editAttributes() ?>>
		<?php echo $patient_email->email_type->selectOptionListHtml("x<?php echo $patient_email_grid->RowIndex ?>_email_type") ?>
	</select>
</div>
<?php echo $patient_email->email_type->Lookup->getParamTag("p_x" . $patient_email_grid->RowIndex . "_email_type") ?>
</span>
<input type="hidden" data-table="patient_email" data-field="x_email_type" name="o<?php echo $patient_email_grid->RowIndex ?>_email_type" id="o<?php echo $patient_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($patient_email->email_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_email_type" class="form-group patient_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_email_type" data-value-separator="<?php echo $patient_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_email_grid->RowIndex ?>_email_type" name="x<?php echo $patient_email_grid->RowIndex ?>_email_type"<?php echo $patient_email->email_type->editAttributes() ?>>
		<?php echo $patient_email->email_type->selectOptionListHtml("x<?php echo $patient_email_grid->RowIndex ?>_email_type") ?>
	</select>
</div>
<?php echo $patient_email->email_type->Lookup->getParamTag("p_x" . $patient_email_grid->RowIndex . "_email_type") ?>
</span>
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_email_type" class="patient_email_email_type">
<span<?php echo $patient_email->email_type->viewAttributes() ?>>
<?php echo $patient_email->email_type->getViewValue() ?></span>
</span>
<?php if (!$patient_email->isConfirm()) { ?>
<input type="hidden" data-table="patient_email" data-field="x_email_type" name="x<?php echo $patient_email_grid->RowIndex ?>_email_type" id="x<?php echo $patient_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($patient_email->email_type->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_email_type" name="o<?php echo $patient_email_grid->RowIndex ?>_email_type" id="o<?php echo $patient_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($patient_email->email_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_email" data-field="x_email_type" name="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_email_type" id="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($patient_email->email_type->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_email_type" name="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_email_type" id="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($patient_email->email_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_email->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_email->status->cellAttributes() ?>>
<?php if ($patient_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_status" class="form-group patient_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_status" data-value-separator="<?php echo $patient_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_email_grid->RowIndex ?>_status" name="x<?php echo $patient_email_grid->RowIndex ?>_status"<?php echo $patient_email->status->editAttributes() ?>>
		<?php echo $patient_email->status->selectOptionListHtml("x<?php echo $patient_email_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_email->status->Lookup->getParamTag("p_x" . $patient_email_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_email" data-field="x_status" name="o<?php echo $patient_email_grid->RowIndex ?>_status" id="o<?php echo $patient_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_email->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_status" class="form-group patient_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_status" data-value-separator="<?php echo $patient_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_email_grid->RowIndex ?>_status" name="x<?php echo $patient_email_grid->RowIndex ?>_status"<?php echo $patient_email->status->editAttributes() ?>>
		<?php echo $patient_email->status->selectOptionListHtml("x<?php echo $patient_email_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_email->status->Lookup->getParamTag("p_x" . $patient_email_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_email_grid->RowCnt ?>_patient_email_status" class="patient_email_status">
<span<?php echo $patient_email->status->viewAttributes() ?>>
<?php echo $patient_email->status->getViewValue() ?></span>
</span>
<?php if (!$patient_email->isConfirm()) { ?>
<input type="hidden" data-table="patient_email" data-field="x_status" name="x<?php echo $patient_email_grid->RowIndex ?>_status" id="x<?php echo $patient_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_email->status->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_status" name="o<?php echo $patient_email_grid->RowIndex ?>_status" id="o<?php echo $patient_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_email->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_email" data-field="x_status" name="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_status" id="fpatient_emailgrid$x<?php echo $patient_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_email->status->FormValue) ?>">
<input type="hidden" data-table="patient_email" data-field="x_status" name="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_status" id="fpatient_emailgrid$o<?php echo $patient_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_email->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_email_grid->ListOptions->render("body", "right", $patient_email_grid->RowCnt);
?>
	</tr>
<?php if ($patient_email->RowType == ROWTYPE_ADD || $patient_email->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_emailgrid.updateLists(<?php echo $patient_email_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_email->isGridAdd() || $patient_email->CurrentMode == "copy")
		if (!$patient_email_grid->Recordset->EOF)
			$patient_email_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_email->CurrentMode == "add" || $patient_email->CurrentMode == "copy" || $patient_email->CurrentMode == "edit") {
		$patient_email_grid->RowIndex = '$rowindex$';
		$patient_email_grid->loadRowValues();

		// Set row properties
		$patient_email->resetAttributes();
		$patient_email->RowAttrs = array_merge($patient_email->RowAttrs, array('data-rowindex'=>$patient_email_grid->RowIndex, 'id'=>'r0_patient_email', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_email->RowAttrs["class"], "ew-template");
		$patient_email->RowType = ROWTYPE_ADD;

		// Render row
		$patient_email_grid->renderRow();

		// Render list options
		$patient_email_grid->renderListOptions();
		$patient_email_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_email_grid->ListOptions->render("body", "left", $patient_email_grid->RowIndex);
?>
	<?php if ($patient_email->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_email->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_email_id" class="form-group patient_email_id">
<span<?php echo $patient_email->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_id" name="x<?php echo $patient_email_grid->RowIndex ?>_id" id="x<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_email" data-field="x_id" name="o<?php echo $patient_email_grid->RowIndex ?>_id" id="o<?php echo $patient_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_email->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_email->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$patient_email->isConfirm()) { ?>
<?php if ($patient_email->patient_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_email_patient_id" class="form-group patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_email_patient_id" class="form-group patient_email_patient_id">
<input type="text" data-table="patient_email" data-field="x_patient_id" name="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_email->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_email->patient_id->EditValue ?>"<?php echo $patient_email->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_email_patient_id" class="form-group patient_email_patient_id">
<span<?php echo $patient_email->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_email" data-field="x_patient_id" name="o<?php echo $patient_email_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_email_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_email->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_email->_email->Visible) { // email ?>
		<td data-name="_email">
<?php if (!$patient_email->isConfirm()) { ?>
<span id="el$rowindex$_patient_email__email" class="form-group patient_email__email">
<input type="text" data-table="patient_email" data-field="x__email" name="x<?php echo $patient_email_grid->RowIndex ?>__email" id="x<?php echo $patient_email_grid->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_email->_email->getPlaceHolder()) ?>" value="<?php echo $patient_email->_email->EditValue ?>"<?php echo $patient_email->_email->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_email__email" class="form-group patient_email__email">
<span<?php echo $patient_email->_email->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->_email->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x__email" name="x<?php echo $patient_email_grid->RowIndex ?>__email" id="x<?php echo $patient_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($patient_email->_email->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_email" data-field="x__email" name="o<?php echo $patient_email_grid->RowIndex ?>__email" id="o<?php echo $patient_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($patient_email->_email->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_email->email_type->Visible) { // email_type ?>
		<td data-name="email_type">
<?php if (!$patient_email->isConfirm()) { ?>
<span id="el$rowindex$_patient_email_email_type" class="form-group patient_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_email_type" data-value-separator="<?php echo $patient_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_email_grid->RowIndex ?>_email_type" name="x<?php echo $patient_email_grid->RowIndex ?>_email_type"<?php echo $patient_email->email_type->editAttributes() ?>>
		<?php echo $patient_email->email_type->selectOptionListHtml("x<?php echo $patient_email_grid->RowIndex ?>_email_type") ?>
	</select>
</div>
<?php echo $patient_email->email_type->Lookup->getParamTag("p_x" . $patient_email_grid->RowIndex . "_email_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_email_email_type" class="form-group patient_email_email_type">
<span<?php echo $patient_email->email_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->email_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_email_type" name="x<?php echo $patient_email_grid->RowIndex ?>_email_type" id="x<?php echo $patient_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($patient_email->email_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_email" data-field="x_email_type" name="o<?php echo $patient_email_grid->RowIndex ?>_email_type" id="o<?php echo $patient_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($patient_email->email_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_email->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_email->isConfirm()) { ?>
<span id="el$rowindex$_patient_email_status" class="form-group patient_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_email" data-field="x_status" data-value-separator="<?php echo $patient_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_email_grid->RowIndex ?>_status" name="x<?php echo $patient_email_grid->RowIndex ?>_status"<?php echo $patient_email->status->editAttributes() ?>>
		<?php echo $patient_email->status->selectOptionListHtml("x<?php echo $patient_email_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_email->status->Lookup->getParamTag("p_x" . $patient_email_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_email_status" class="form-group patient_email_status">
<span<?php echo $patient_email->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_email->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_email" data-field="x_status" name="x<?php echo $patient_email_grid->RowIndex ?>_status" id="x<?php echo $patient_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_email->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_email" data-field="x_status" name="o<?php echo $patient_email_grid->RowIndex ?>_status" id="o<?php echo $patient_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_email->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_email_grid->ListOptions->render("body", "right", $patient_email_grid->RowIndex);
?>
<script>
fpatient_emailgrid.updateLists(<?php echo $patient_email_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_email->CurrentMode == "add" || $patient_email->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_email_grid->FormKeyCountName ?>" id="<?php echo $patient_email_grid->FormKeyCountName ?>" value="<?php echo $patient_email_grid->KeyCount ?>">
<?php echo $patient_email_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_email->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_email_grid->FormKeyCountName ?>" id="<?php echo $patient_email_grid->FormKeyCountName ?>" value="<?php echo $patient_email_grid->KeyCount ?>">
<?php echo $patient_email_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_email->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_emailgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_email_grid->Recordset)
	$patient_email_grid->Recordset->Close();
?>
</div>
<?php if ($patient_email_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_email_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_email_grid->TotalRecs == 0 && !$patient_email->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_email_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_email_grid->terminate();
?>
<?php if (!$patient_email->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_email", "95%", "");
</script>
<?php } ?>