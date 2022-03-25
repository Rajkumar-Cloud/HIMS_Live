<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($employee_email_grid))
	$employee_email_grid = new employee_email_grid();

// Run the page
$employee_email_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_email_grid->Page_Render();
?>
<?php if (!$employee_email->isExport()) { ?>
<script>

// Form object
var femployee_emailgrid = new ew.Form("femployee_emailgrid", "grid");
femployee_emailgrid.formKeyCountName = '<?php echo $employee_email_grid->FormKeyCountName ?>';

// Validate form
femployee_emailgrid.validate = function() {
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
		<?php if ($employee_email_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->id->caption(), $employee_email->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_grid->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->employee_id->caption(), $employee_email->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->employee_id->errorMessage()) ?>");
		<?php if ($employee_email_grid->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->_email->caption(), $employee_email->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_grid->email_type->Required) { ?>
			elm = this.getElements("x" + infix + "_email_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->email_type->caption(), $employee_email->email_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->status->caption(), $employee_email->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_email_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email->HospID->caption(), $employee_email->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_email->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
femployee_emailgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "_email", false)) return false;
	if (ew.valueChanged(fobj, infix, "email_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_emailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emailgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_emailgrid.lists["x_email_type"] = <?php echo $employee_email_grid->email_type->Lookup->toClientList() ?>;
femployee_emailgrid.lists["x_email_type"].options = <?php echo JsonEncode($employee_email_grid->email_type->lookupOptions()) ?>;
femployee_emailgrid.lists["x_status"] = <?php echo $employee_email_grid->status->Lookup->toClientList() ?>;
femployee_emailgrid.lists["x_status"].options = <?php echo JsonEncode($employee_email_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$employee_email_grid->renderOtherOptions();
?>
<?php $employee_email_grid->showPageHeader(); ?>
<?php
$employee_email_grid->showMessage();
?>
<?php if ($employee_email_grid->TotalRecs > 0 || $employee_email->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_email_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_email">
<?php if ($employee_email_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $employee_email_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_emailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_email" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_emailgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_email_grid->RowType = ROWTYPE_HEADER;

// Render list options
$employee_email_grid->renderListOptions();

// Render list options (header, left)
$employee_email_grid->ListOptions->render("header", "left");
?>
<?php if ($employee_email->id->Visible) { // id ?>
	<?php if ($employee_email->sortUrl($employee_email->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_email->id->headerCellClass() ?>"><div id="elh_employee_email_id" class="employee_email_id"><div class="ew-table-header-caption"><?php echo $employee_email->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_email->id->headerCellClass() ?>"><div><div id="elh_employee_email_id" class="employee_email_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_email->sortUrl($employee_email->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_email->employee_id->headerCellClass() ?>"><div id="elh_employee_email_employee_id" class="employee_email_employee_id"><div class="ew-table-header-caption"><?php echo $employee_email->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_email->employee_id->headerCellClass() ?>"><div><div id="elh_employee_email_employee_id" class="employee_email_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->_email->Visible) { // email ?>
	<?php if ($employee_email->sortUrl($employee_email->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $employee_email->_email->headerCellClass() ?>"><div id="elh_employee_email__email" class="employee_email__email"><div class="ew-table-header-caption"><?php echo $employee_email->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $employee_email->_email->headerCellClass() ?>"><div><div id="elh_employee_email__email" class="employee_email__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->_email->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
	<?php if ($employee_email->sortUrl($employee_email->email_type) == "") { ?>
		<th data-name="email_type" class="<?php echo $employee_email->email_type->headerCellClass() ?>"><div id="elh_employee_email_email_type" class="employee_email_email_type"><div class="ew-table-header-caption"><?php echo $employee_email->email_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_type" class="<?php echo $employee_email->email_type->headerCellClass() ?>"><div><div id="elh_employee_email_email_type" class="employee_email_email_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->email_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->email_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->status->Visible) { // status ?>
	<?php if ($employee_email->sortUrl($employee_email->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_email->status->headerCellClass() ?>"><div id="elh_employee_email_status" class="employee_email_status"><div class="ew-table-header-caption"><?php echo $employee_email->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_email->status->headerCellClass() ?>"><div><div id="elh_employee_email_status" class="employee_email_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
	<?php if ($employee_email->sortUrl($employee_email->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_email->HospID->headerCellClass() ?>"><div id="elh_employee_email_HospID" class="employee_email_HospID"><div class="ew-table-header-caption"><?php echo $employee_email->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_email->HospID->headerCellClass() ?>"><div><div id="elh_employee_email_HospID" class="employee_email_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_email->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_email_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$employee_email_grid->StartRec = 1;
$employee_email_grid->StopRec = $employee_email_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $employee_email_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_email_grid->FormKeyCountName) && ($employee_email->isGridAdd() || $employee_email->isGridEdit() || $employee_email->isConfirm())) {
		$employee_email_grid->KeyCount = $CurrentForm->getValue($employee_email_grid->FormKeyCountName);
		$employee_email_grid->StopRec = $employee_email_grid->StartRec + $employee_email_grid->KeyCount - 1;
	}
}
$employee_email_grid->RecCnt = $employee_email_grid->StartRec - 1;
if ($employee_email_grid->Recordset && !$employee_email_grid->Recordset->EOF) {
	$employee_email_grid->Recordset->moveFirst();
	$selectLimit = $employee_email_grid->UseSelectLimit;
	if (!$selectLimit && $employee_email_grid->StartRec > 1)
		$employee_email_grid->Recordset->move($employee_email_grid->StartRec - 1);
} elseif (!$employee_email->AllowAddDeleteRow && $employee_email_grid->StopRec == 0) {
	$employee_email_grid->StopRec = $employee_email->GridAddRowCount;
}

// Initialize aggregate
$employee_email->RowType = ROWTYPE_AGGREGATEINIT;
$employee_email->resetAttributes();
$employee_email_grid->renderRow();
if ($employee_email->isGridAdd())
	$employee_email_grid->RowIndex = 0;
if ($employee_email->isGridEdit())
	$employee_email_grid->RowIndex = 0;
while ($employee_email_grid->RecCnt < $employee_email_grid->StopRec) {
	$employee_email_grid->RecCnt++;
	if ($employee_email_grid->RecCnt >= $employee_email_grid->StartRec) {
		$employee_email_grid->RowCnt++;
		if ($employee_email->isGridAdd() || $employee_email->isGridEdit() || $employee_email->isConfirm()) {
			$employee_email_grid->RowIndex++;
			$CurrentForm->Index = $employee_email_grid->RowIndex;
			if ($CurrentForm->hasValue($employee_email_grid->FormActionName) && $employee_email_grid->EventCancelled)
				$employee_email_grid->RowAction = strval($CurrentForm->getValue($employee_email_grid->FormActionName));
			elseif ($employee_email->isGridAdd())
				$employee_email_grid->RowAction = "insert";
			else
				$employee_email_grid->RowAction = "";
		}

		// Set up key count
		$employee_email_grid->KeyCount = $employee_email_grid->RowIndex;

		// Init row class and style
		$employee_email->resetAttributes();
		$employee_email->CssClass = "";
		if ($employee_email->isGridAdd()) {
			if ($employee_email->CurrentMode == "copy") {
				$employee_email_grid->loadRowValues($employee_email_grid->Recordset); // Load row values
				$employee_email_grid->setRecordKey($employee_email_grid->RowOldKey, $employee_email_grid->Recordset); // Set old record key
			} else {
				$employee_email_grid->loadRowValues(); // Load default values
				$employee_email_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$employee_email_grid->loadRowValues($employee_email_grid->Recordset); // Load row values
		}
		$employee_email->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_email->isGridAdd()) // Grid add
			$employee_email->RowType = ROWTYPE_ADD; // Render add
		if ($employee_email->isGridAdd() && $employee_email->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_email_grid->restoreCurrentRowFormValues($employee_email_grid->RowIndex); // Restore form values
		if ($employee_email->isGridEdit()) { // Grid edit
			if ($employee_email->EventCancelled)
				$employee_email_grid->restoreCurrentRowFormValues($employee_email_grid->RowIndex); // Restore form values
			if ($employee_email_grid->RowAction == "insert")
				$employee_email->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_email->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_email->isGridEdit() && ($employee_email->RowType == ROWTYPE_EDIT || $employee_email->RowType == ROWTYPE_ADD) && $employee_email->EventCancelled) // Update failed
			$employee_email_grid->restoreCurrentRowFormValues($employee_email_grid->RowIndex); // Restore form values
		if ($employee_email->RowType == ROWTYPE_EDIT) // Edit row
			$employee_email_grid->EditRowCnt++;
		if ($employee_email->isConfirm()) // Confirm row
			$employee_email_grid->restoreCurrentRowFormValues($employee_email_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$employee_email->RowAttrs = array_merge($employee_email->RowAttrs, array('data-rowindex'=>$employee_email_grid->RowCnt, 'id'=>'r' . $employee_email_grid->RowCnt . '_employee_email', 'data-rowtype'=>$employee_email->RowType));

		// Render row
		$employee_email_grid->renderRow();

		// Render list options
		$employee_email_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_email_grid->RowAction <> "delete" && $employee_email_grid->RowAction <> "insertdelete" && !($employee_email_grid->RowAction == "insert" && $employee_email->isConfirm() && $employee_email_grid->emptyRow())) {
?>
	<tr<?php echo $employee_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_grid->ListOptions->render("body", "left", $employee_email_grid->RowCnt);
?>
	<?php if ($employee_email->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_email->id->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_email" data-field="x_id" name="o<?php echo $employee_email_grid->RowIndex ?>_id" id="o<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_id" class="form-group employee_email_id">
<span<?php echo $employee_email->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="x<?php echo $employee_email_grid->RowIndex ?>_id" id="x<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_id" class="employee_email_id">
<span<?php echo $employee_email->id->viewAttributes() ?>>
<?php echo $employee_email->id->getViewValue() ?></span>
</span>
<?php if (!$employee_email->isConfirm()) { ?>
<input type="hidden" data-table="employee_email" data-field="x_id" name="x<?php echo $employee_email_grid->RowIndex ?>_id" id="x<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_id" name="o<?php echo $employee_email_grid->RowIndex ?>_id" id="o<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_email" data-field="x_id" name="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_id" id="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_id" name="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_id" id="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_email->employee_id->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_email->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<input type="text" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_email->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_email->employee_id->EditValue ?>"<?php echo $employee_email->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="o<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_email->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_employee_id" class="form-group employee_email_employee_id">
<input type="text" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_email->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_email->employee_id->EditValue ?>"<?php echo $employee_email->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_employee_id" class="employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<?php echo $employee_email->employee_id->getViewValue() ?></span>
</span>
<?php if (!$employee_email->isConfirm()) { ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="o<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $employee_email->_email->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email__email" class="form-group employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_grid->RowIndex ?>__email" id="x<?php echo $employee_email_grid->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x__email" name="o<?php echo $employee_email_grid->RowIndex ?>__email" id="o<?php echo $employee_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email__email" class="form-group employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_grid->RowIndex ?>__email" id="x<?php echo $employee_email_grid->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email__email" class="employee_email__email">
<span<?php echo $employee_email->_email->viewAttributes() ?>>
<?php echo $employee_email->_email->getViewValue() ?></span>
</span>
<?php if (!$employee_email->isConfirm()) { ?>
<input type="hidden" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_grid->RowIndex ?>__email" id="x<?php echo $employee_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x__email" name="o<?php echo $employee_email_grid->RowIndex ?>__email" id="o<?php echo $employee_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_email" data-field="x__email" name="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>__email" id="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x__email" name="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>__email" id="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->email_type->Visible) { // email_type ?>
		<td data-name="email_type"<?php echo $employee_email->email_type->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_email_type" class="form-group employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_grid->RowIndex ?>_email_type" name="x<?php echo $employee_email_grid->RowIndex ?>_email_type"<?php echo $employee_email->email_type->editAttributes() ?>>
		<?php echo $employee_email->email_type->selectOptionListHtml("x<?php echo $employee_email_grid->RowIndex ?>_email_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email->email_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_grid->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email->email_type->caption() ?>" data-title="<?php echo $employee_email->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_grid->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_email->email_type->Lookup->getParamTag("p_x" . $employee_email_grid->RowIndex . "_email_type") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="o<?php echo $employee_email_grid->RowIndex ?>_email_type" id="o<?php echo $employee_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_email_type" class="form-group employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_grid->RowIndex ?>_email_type" name="x<?php echo $employee_email_grid->RowIndex ?>_email_type"<?php echo $employee_email->email_type->editAttributes() ?>>
		<?php echo $employee_email->email_type->selectOptionListHtml("x<?php echo $employee_email_grid->RowIndex ?>_email_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email->email_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_grid->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email->email_type->caption() ?>" data-title="<?php echo $employee_email->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_grid->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_email->email_type->Lookup->getParamTag("p_x" . $employee_email_grid->RowIndex . "_email_type") ?>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_email_type" class="employee_email_email_type">
<span<?php echo $employee_email->email_type->viewAttributes() ?>>
<?php echo $employee_email->email_type->getViewValue() ?></span>
</span>
<?php if (!$employee_email->isConfirm()) { ?>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="x<?php echo $employee_email_grid->RowIndex ?>_email_type" id="x<?php echo $employee_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="o<?php echo $employee_email_grid->RowIndex ?>_email_type" id="o<?php echo $employee_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_email_type" id="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_email_type" id="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_email->status->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_status" class="form-group employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_grid->RowIndex ?>_status" name="x<?php echo $employee_email_grid->RowIndex ?>_status"<?php echo $employee_email->status->editAttributes() ?>>
		<?php echo $employee_email->status->selectOptionListHtml("x<?php echo $employee_email_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_email->status->Lookup->getParamTag("p_x" . $employee_email_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_status" name="o<?php echo $employee_email_grid->RowIndex ?>_status" id="o<?php echo $employee_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_status" class="form-group employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_grid->RowIndex ?>_status" name="x<?php echo $employee_email_grid->RowIndex ?>_status"<?php echo $employee_email->status->editAttributes() ?>>
		<?php echo $employee_email->status->selectOptionListHtml("x<?php echo $employee_email_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_email->status->Lookup->getParamTag("p_x" . $employee_email_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_status" class="employee_email_status">
<span<?php echo $employee_email->status->viewAttributes() ?>>
<?php echo $employee_email->status->getViewValue() ?></span>
</span>
<?php if (!$employee_email->isConfirm()) { ?>
<input type="hidden" data-table="employee_email" data-field="x_status" name="x<?php echo $employee_email_grid->RowIndex ?>_status" id="x<?php echo $employee_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_status" name="o<?php echo $employee_email_grid->RowIndex ?>_status" id="o<?php echo $employee_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_email" data-field="x_status" name="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_status" id="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_status" name="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_status" id="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_email->HospID->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_HospID" class="form-group employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_grid->RowIndex ?>_HospID" id="x<?php echo $employee_email_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="o<?php echo $employee_email_grid->RowIndex ?>_HospID" id="o<?php echo $employee_email_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_HospID" class="form-group employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_grid->RowIndex ?>_HospID" id="x<?php echo $employee_email_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_grid->RowCnt ?>_employee_email_HospID" class="employee_email_HospID">
<span<?php echo $employee_email->HospID->viewAttributes() ?>>
<?php echo $employee_email->HospID->getViewValue() ?></span>
</span>
<?php if (!$employee_email->isConfirm()) { ?>
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_grid->RowIndex ?>_HospID" id="x<?php echo $employee_email_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="o<?php echo $employee_email_grid->RowIndex ?>_HospID" id="o<?php echo $employee_email_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_HospID" id="femployee_emailgrid$x<?php echo $employee_email_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_HospID" id="femployee_emailgrid$o<?php echo $employee_email_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_email_grid->ListOptions->render("body", "right", $employee_email_grid->RowCnt);
?>
	</tr>
<?php if ($employee_email->RowType == ROWTYPE_ADD || $employee_email->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_emailgrid.updateLists(<?php echo $employee_email_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_email->isGridAdd() || $employee_email->CurrentMode == "copy")
		if (!$employee_email_grid->Recordset->EOF)
			$employee_email_grid->Recordset->moveNext();
}
?>
<?php
	if ($employee_email->CurrentMode == "add" || $employee_email->CurrentMode == "copy" || $employee_email->CurrentMode == "edit") {
		$employee_email_grid->RowIndex = '$rowindex$';
		$employee_email_grid->loadRowValues();

		// Set row properties
		$employee_email->resetAttributes();
		$employee_email->RowAttrs = array_merge($employee_email->RowAttrs, array('data-rowindex'=>$employee_email_grid->RowIndex, 'id'=>'r0_employee_email', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_email->RowAttrs["class"], "ew-template");
		$employee_email->RowType = ROWTYPE_ADD;

		// Render row
		$employee_email_grid->renderRow();

		// Render list options
		$employee_email_grid->renderListOptions();
		$employee_email_grid->StartRowCnt = 0;
?>
	<tr<?php echo $employee_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_grid->ListOptions->render("body", "left", $employee_email_grid->RowIndex);
?>
	<?php if ($employee_email->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$employee_email->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_email_id" class="form-group employee_email_id">
<span<?php echo $employee_email->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="x<?php echo $employee_email_grid->RowIndex ?>_id" id="x<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_id" name="o<?php echo $employee_email_grid->RowIndex ?>_id" id="o<?php echo $employee_email_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if (!$employee_email->isConfirm()) { ?>
<?php if ($employee_email->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_email_employee_id" class="form-group employee_email_employee_id">
<input type="text" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_email->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_email->employee_id->EditValue ?>"<?php echo $employee_email->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="o<?php echo $employee_email_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_email_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->_email->Visible) { // email ?>
		<td data-name="_email">
<?php if (!$employee_email->isConfirm()) { ?>
<span id="el$rowindex$_employee_email__email" class="form-group employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_grid->RowIndex ?>__email" id="x<?php echo $employee_email_grid->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email->_email->EditValue ?>"<?php echo $employee_email->_email->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_email__email" class="form-group employee_email__email">
<span<?php echo $employee_email->_email->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->_email->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_grid->RowIndex ?>__email" id="x<?php echo $employee_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x__email" name="o<?php echo $employee_email_grid->RowIndex ?>__email" id="o<?php echo $employee_email_grid->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email->_email->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->email_type->Visible) { // email_type ?>
		<td data-name="email_type">
<?php if (!$employee_email->isConfirm()) { ?>
<span id="el$rowindex$_employee_email_email_type" class="form-group employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_grid->RowIndex ?>_email_type" name="x<?php echo $employee_email_grid->RowIndex ?>_email_type"<?php echo $employee_email->email_type->editAttributes() ?>>
		<?php echo $employee_email->email_type->selectOptionListHtml("x<?php echo $employee_email_grid->RowIndex ?>_email_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email->email_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_grid->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email->email_type->caption() ?>" data-title="<?php echo $employee_email->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_grid->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_email->email_type->Lookup->getParamTag("p_x" . $employee_email_grid->RowIndex . "_email_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_email_email_type" class="form-group employee_email_email_type">
<span<?php echo $employee_email->email_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->email_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="x<?php echo $employee_email_grid->RowIndex ?>_email_type" id="x<?php echo $employee_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="o<?php echo $employee_email_grid->RowIndex ?>_email_type" id="o<?php echo $employee_email_grid->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email->email_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$employee_email->isConfirm()) { ?>
<span id="el$rowindex$_employee_email_status" class="form-group employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_grid->RowIndex ?>_status" name="x<?php echo $employee_email_grid->RowIndex ?>_status"<?php echo $employee_email->status->editAttributes() ?>>
		<?php echo $employee_email->status->selectOptionListHtml("x<?php echo $employee_email_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_email->status->Lookup->getParamTag("p_x" . $employee_email_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_email_status" class="form-group employee_email_status">
<span<?php echo $employee_email->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_status" name="x<?php echo $employee_email_grid->RowIndex ?>_status" id="x<?php echo $employee_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_status" name="o<?php echo $employee_email_grid->RowIndex ?>_status" id="o<?php echo $employee_email_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$employee_email->isConfirm()) { ?>
<span id="el$rowindex$_employee_email_HospID" class="form-group employee_email_HospID">
<input type="text" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_grid->RowIndex ?>_HospID" id="x<?php echo $employee_email_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_email->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_email->HospID->EditValue ?>"<?php echo $employee_email->HospID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_email_HospID" class="form-group employee_email_HospID">
<span<?php echo $employee_email->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_email->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="x<?php echo $employee_email_grid->RowIndex ?>_HospID" id="x<?php echo $employee_email_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_HospID" name="o<?php echo $employee_email_grid->RowIndex ?>_HospID" id="o<?php echo $employee_email_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_email->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_email_grid->ListOptions->render("body", "right", $employee_email_grid->RowIndex);
?>
<script>
femployee_emailgrid.updateLists(<?php echo $employee_email_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($employee_email->CurrentMode == "add" || $employee_email->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $employee_email_grid->FormKeyCountName ?>" id="<?php echo $employee_email_grid->FormKeyCountName ?>" value="<?php echo $employee_email_grid->KeyCount ?>">
<?php echo $employee_email_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_email->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $employee_email_grid->FormKeyCountName ?>" id="<?php echo $employee_email_grid->FormKeyCountName ?>" value="<?php echo $employee_email_grid->KeyCount ?>">
<?php echo $employee_email_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_email->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="femployee_emailgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($employee_email_grid->Recordset)
	$employee_email_grid->Recordset->Close();
?>
</div>
<?php if ($employee_email_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $employee_email_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_email_grid->TotalRecs == 0 && !$employee_email->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_email_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_email_grid->terminate();
?>
<?php if (!$employee_email->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_email", "95%", "");
</script>
<?php } ?>