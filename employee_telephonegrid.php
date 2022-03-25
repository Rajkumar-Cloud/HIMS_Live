<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($employee_telephone_grid))
	$employee_telephone_grid = new employee_telephone_grid();

// Run the page
$employee_telephone_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_telephone_grid->Page_Render();
?>
<?php if (!$employee_telephone->isExport()) { ?>
<script>

// Form object
var femployee_telephonegrid = new ew.Form("femployee_telephonegrid", "grid");
femployee_telephonegrid.formKeyCountName = '<?php echo $employee_telephone_grid->FormKeyCountName ?>';

// Validate form
femployee_telephonegrid.validate = function() {
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
		<?php if ($employee_telephone_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->id->caption(), $employee_telephone->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_grid->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->employee_id->caption(), $employee_telephone->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_telephone->employee_id->errorMessage()) ?>");
		<?php if ($employee_telephone_grid->tele_type->Required) { ?>
			elm = this.getElements("x" + infix + "_tele_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->tele_type->caption(), $employee_telephone->tele_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_grid->telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->telephone->caption(), $employee_telephone->telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_grid->telephone_type->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->telephone_type->caption(), $employee_telephone->telephone_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->status->caption(), $employee_telephone->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_telephone_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_telephone->HospID->caption(), $employee_telephone->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_telephone->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
femployee_telephonegrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "tele_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "telephone", false)) return false;
	if (ew.valueChanged(fobj, infix, "telephone_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_telephonegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_telephonegrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_telephonegrid.lists["x_tele_type"] = <?php echo $employee_telephone_grid->tele_type->Lookup->toClientList() ?>;
femployee_telephonegrid.lists["x_tele_type"].options = <?php echo JsonEncode($employee_telephone_grid->tele_type->lookupOptions()) ?>;
femployee_telephonegrid.lists["x_telephone_type"] = <?php echo $employee_telephone_grid->telephone_type->Lookup->toClientList() ?>;
femployee_telephonegrid.lists["x_telephone_type"].options = <?php echo JsonEncode($employee_telephone_grid->telephone_type->lookupOptions()) ?>;
femployee_telephonegrid.lists["x_status"] = <?php echo $employee_telephone_grid->status->Lookup->toClientList() ?>;
femployee_telephonegrid.lists["x_status"].options = <?php echo JsonEncode($employee_telephone_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$employee_telephone_grid->renderOtherOptions();
?>
<?php $employee_telephone_grid->showPageHeader(); ?>
<?php
$employee_telephone_grid->showMessage();
?>
<?php if ($employee_telephone_grid->TotalRecs > 0 || $employee_telephone->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_telephone_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_telephone">
<?php if ($employee_telephone_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $employee_telephone_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_telephonegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_telephone" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_telephonegrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_telephone_grid->RowType = ROWTYPE_HEADER;

// Render list options
$employee_telephone_grid->renderListOptions();

// Render list options (header, left)
$employee_telephone_grid->ListOptions->render("header", "left");
?>
<?php if ($employee_telephone->id->Visible) { // id ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_telephone->id->headerCellClass() ?>"><div id="elh_employee_telephone_id" class="employee_telephone_id"><div class="ew-table-header-caption"><?php echo $employee_telephone->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_telephone->id->headerCellClass() ?>"><div><div id="elh_employee_telephone_id" class="employee_telephone_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_telephone->employee_id->headerCellClass() ?>"><div id="elh_employee_telephone_employee_id" class="employee_telephone_employee_id"><div class="ew-table-header-caption"><?php echo $employee_telephone->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_telephone->employee_id->headerCellClass() ?>"><div><div id="elh_employee_telephone_employee_id" class="employee_telephone_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->tele_type) == "") { ?>
		<th data-name="tele_type" class="<?php echo $employee_telephone->tele_type->headerCellClass() ?>"><div id="elh_employee_telephone_tele_type" class="employee_telephone_tele_type"><div class="ew-table-header-caption"><?php echo $employee_telephone->tele_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tele_type" class="<?php echo $employee_telephone->tele_type->headerCellClass() ?>"><div><div id="elh_employee_telephone_tele_type" class="employee_telephone_tele_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->tele_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->tele_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->tele_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $employee_telephone->telephone->headerCellClass() ?>"><div id="elh_employee_telephone_telephone" class="employee_telephone_telephone"><div class="ew-table-header-caption"><?php echo $employee_telephone->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $employee_telephone->telephone->headerCellClass() ?>"><div><div id="elh_employee_telephone_telephone" class="employee_telephone_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->telephone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->telephone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->telephone_type) == "") { ?>
		<th data-name="telephone_type" class="<?php echo $employee_telephone->telephone_type->headerCellClass() ?>"><div id="elh_employee_telephone_telephone_type" class="employee_telephone_telephone_type"><div class="ew-table-header-caption"><?php echo $employee_telephone->telephone_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone_type" class="<?php echo $employee_telephone->telephone_type->headerCellClass() ?>"><div><div id="elh_employee_telephone_telephone_type" class="employee_telephone_telephone_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->telephone_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->telephone_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->telephone_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->status->Visible) { // status ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_telephone->status->headerCellClass() ?>"><div id="elh_employee_telephone_status" class="employee_telephone_status"><div class="ew-table-header-caption"><?php echo $employee_telephone->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_telephone->status->headerCellClass() ?>"><div><div id="elh_employee_telephone_status" class="employee_telephone_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
	<?php if ($employee_telephone->sortUrl($employee_telephone->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_telephone->HospID->headerCellClass() ?>"><div id="elh_employee_telephone_HospID" class="employee_telephone_HospID"><div class="ew-table-header-caption"><?php echo $employee_telephone->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_telephone->HospID->headerCellClass() ?>"><div><div id="elh_employee_telephone_HospID" class="employee_telephone_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_telephone->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_telephone->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_telephone->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_telephone_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$employee_telephone_grid->StartRec = 1;
$employee_telephone_grid->StopRec = $employee_telephone_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $employee_telephone_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_telephone_grid->FormKeyCountName) && ($employee_telephone->isGridAdd() || $employee_telephone->isGridEdit() || $employee_telephone->isConfirm())) {
		$employee_telephone_grid->KeyCount = $CurrentForm->getValue($employee_telephone_grid->FormKeyCountName);
		$employee_telephone_grid->StopRec = $employee_telephone_grid->StartRec + $employee_telephone_grid->KeyCount - 1;
	}
}
$employee_telephone_grid->RecCnt = $employee_telephone_grid->StartRec - 1;
if ($employee_telephone_grid->Recordset && !$employee_telephone_grid->Recordset->EOF) {
	$employee_telephone_grid->Recordset->moveFirst();
	$selectLimit = $employee_telephone_grid->UseSelectLimit;
	if (!$selectLimit && $employee_telephone_grid->StartRec > 1)
		$employee_telephone_grid->Recordset->move($employee_telephone_grid->StartRec - 1);
} elseif (!$employee_telephone->AllowAddDeleteRow && $employee_telephone_grid->StopRec == 0) {
	$employee_telephone_grid->StopRec = $employee_telephone->GridAddRowCount;
}

// Initialize aggregate
$employee_telephone->RowType = ROWTYPE_AGGREGATEINIT;
$employee_telephone->resetAttributes();
$employee_telephone_grid->renderRow();
if ($employee_telephone->isGridAdd())
	$employee_telephone_grid->RowIndex = 0;
if ($employee_telephone->isGridEdit())
	$employee_telephone_grid->RowIndex = 0;
while ($employee_telephone_grid->RecCnt < $employee_telephone_grid->StopRec) {
	$employee_telephone_grid->RecCnt++;
	if ($employee_telephone_grid->RecCnt >= $employee_telephone_grid->StartRec) {
		$employee_telephone_grid->RowCnt++;
		if ($employee_telephone->isGridAdd() || $employee_telephone->isGridEdit() || $employee_telephone->isConfirm()) {
			$employee_telephone_grid->RowIndex++;
			$CurrentForm->Index = $employee_telephone_grid->RowIndex;
			if ($CurrentForm->hasValue($employee_telephone_grid->FormActionName) && $employee_telephone_grid->EventCancelled)
				$employee_telephone_grid->RowAction = strval($CurrentForm->getValue($employee_telephone_grid->FormActionName));
			elseif ($employee_telephone->isGridAdd())
				$employee_telephone_grid->RowAction = "insert";
			else
				$employee_telephone_grid->RowAction = "";
		}

		// Set up key count
		$employee_telephone_grid->KeyCount = $employee_telephone_grid->RowIndex;

		// Init row class and style
		$employee_telephone->resetAttributes();
		$employee_telephone->CssClass = "";
		if ($employee_telephone->isGridAdd()) {
			if ($employee_telephone->CurrentMode == "copy") {
				$employee_telephone_grid->loadRowValues($employee_telephone_grid->Recordset); // Load row values
				$employee_telephone_grid->setRecordKey($employee_telephone_grid->RowOldKey, $employee_telephone_grid->Recordset); // Set old record key
			} else {
				$employee_telephone_grid->loadRowValues(); // Load default values
				$employee_telephone_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$employee_telephone_grid->loadRowValues($employee_telephone_grid->Recordset); // Load row values
		}
		$employee_telephone->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_telephone->isGridAdd()) // Grid add
			$employee_telephone->RowType = ROWTYPE_ADD; // Render add
		if ($employee_telephone->isGridAdd() && $employee_telephone->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_telephone_grid->restoreCurrentRowFormValues($employee_telephone_grid->RowIndex); // Restore form values
		if ($employee_telephone->isGridEdit()) { // Grid edit
			if ($employee_telephone->EventCancelled)
				$employee_telephone_grid->restoreCurrentRowFormValues($employee_telephone_grid->RowIndex); // Restore form values
			if ($employee_telephone_grid->RowAction == "insert")
				$employee_telephone->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_telephone->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_telephone->isGridEdit() && ($employee_telephone->RowType == ROWTYPE_EDIT || $employee_telephone->RowType == ROWTYPE_ADD) && $employee_telephone->EventCancelled) // Update failed
			$employee_telephone_grid->restoreCurrentRowFormValues($employee_telephone_grid->RowIndex); // Restore form values
		if ($employee_telephone->RowType == ROWTYPE_EDIT) // Edit row
			$employee_telephone_grid->EditRowCnt++;
		if ($employee_telephone->isConfirm()) // Confirm row
			$employee_telephone_grid->restoreCurrentRowFormValues($employee_telephone_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$employee_telephone->RowAttrs = array_merge($employee_telephone->RowAttrs, array('data-rowindex'=>$employee_telephone_grid->RowCnt, 'id'=>'r' . $employee_telephone_grid->RowCnt . '_employee_telephone', 'data-rowtype'=>$employee_telephone->RowType));

		// Render row
		$employee_telephone_grid->renderRow();

		// Render list options
		$employee_telephone_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_telephone_grid->RowAction <> "delete" && $employee_telephone_grid->RowAction <> "insertdelete" && !($employee_telephone_grid->RowAction == "insert" && $employee_telephone->isConfirm() && $employee_telephone_grid->emptyRow())) {
?>
	<tr<?php echo $employee_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_telephone_grid->ListOptions->render("body", "left", $employee_telephone_grid->RowCnt);
?>
	<?php if ($employee_telephone->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_telephone->id->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="o<?php echo $employee_telephone_grid->RowIndex ?>_id" id="o<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_id" class="form-group employee_telephone_id">
<span<?php echo $employee_telephone->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_id" class="employee_telephone_id">
<span<?php echo $employee_telephone->id->viewAttributes() ?>>
<?php echo $employee_telephone->id->getViewValue() ?></span>
</span>
<?php if (!$employee_telephone->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="o<?php echo $employee_telephone_grid->RowIndex ?>_id" id="o<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_id" id="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_id" id="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_telephone->employee_id->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_telephone->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="text" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->employee_id->EditValue ?>"<?php echo $employee_telephone->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_telephone->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="text" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->employee_id->EditValue ?>"<?php echo $employee_telephone->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_employee_id" class="employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<?php echo $employee_telephone->employee_id->getViewValue() ?></span>
</span>
<?php if (!$employee_telephone->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
		<td data-name="tele_type"<?php echo $employee_telephone->tele_type->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_tele_type" data-value-separator="<?php echo $employee_telephone->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type"<?php echo $employee_telephone->tele_type->editAttributes() ?>>
		<?php echo $employee_telephone->tele_type->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$employee_telephone->tele_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->tele_type->caption() ?>" data-title="<?php echo $employee_telephone->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type',url:'sys_tele_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->tele_type->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_tele_type") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" id="o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_tele_type" data-value-separator="<?php echo $employee_telephone->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type"<?php echo $employee_telephone->tele_type->editAttributes() ?>>
		<?php echo $employee_telephone->tele_type->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$employee_telephone->tele_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->tele_type->caption() ?>" data-title="<?php echo $employee_telephone->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type',url:'sys_tele_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->tele_type->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_tele_type") ?>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_tele_type" class="employee_telephone_tele_type">
<span<?php echo $employee_telephone->tele_type->viewAttributes() ?>>
<?php echo $employee_telephone->tele_type->getViewValue() ?></span>
</span>
<?php if (!$employee_telephone->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" id="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" id="o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" id="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" id="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
		<td data-name="telephone"<?php echo $employee_telephone->telephone->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="text" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_telephone->telephone->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->telephone->EditValue ?>"<?php echo $employee_telephone->telephone->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="text" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_telephone->telephone->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->telephone->EditValue ?>"<?php echo $employee_telephone->telephone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_telephone" class="employee_telephone_telephone">
<span<?php echo $employee_telephone->telephone->viewAttributes() ?>>
<?php echo $employee_telephone->telephone->getViewValue() ?></span>
</span>
<?php if (!$employee_telephone->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
		<td data-name="telephone_type"<?php echo $employee_telephone->telephone_type->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $employee_telephone->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type"<?php echo $employee_telephone->telephone_type->editAttributes() ?>>
		<?php echo $employee_telephone->telephone_type->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$employee_telephone->telephone_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->telephone_type->caption() ?>" data-title="<?php echo $employee_telephone->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type',url:'sys_telephone_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->telephone_type->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_telephone_type") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" id="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $employee_telephone->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type"<?php echo $employee_telephone->telephone_type->editAttributes() ?>>
		<?php echo $employee_telephone->telephone_type->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$employee_telephone->telephone_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->telephone_type->caption() ?>" data-title="<?php echo $employee_telephone->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type',url:'sys_telephone_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->telephone_type->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_telephone_type") ?>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_telephone_type" class="employee_telephone_telephone_type">
<span<?php echo $employee_telephone->telephone_type->viewAttributes() ?>>
<?php echo $employee_telephone->telephone_type->getViewValue() ?></span>
</span>
<?php if (!$employee_telephone->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" id="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" id="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" id="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_telephone->status->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_status" class="form-group employee_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_status" data-value-separator="<?php echo $employee_telephone->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_status" name="x<?php echo $employee_telephone_grid->RowIndex ?>_status"<?php echo $employee_telephone->status->editAttributes() ?>>
		<?php echo $employee_telephone->status->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_telephone->status->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="o<?php echo $employee_telephone_grid->RowIndex ?>_status" id="o<?php echo $employee_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_status" class="form-group employee_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_status" data-value-separator="<?php echo $employee_telephone->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_status" name="x<?php echo $employee_telephone_grid->RowIndex ?>_status"<?php echo $employee_telephone->status->editAttributes() ?>>
		<?php echo $employee_telephone->status->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_telephone->status->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_status" class="employee_telephone_status">
<span<?php echo $employee_telephone->status->viewAttributes() ?>>
<?php echo $employee_telephone->status->getViewValue() ?></span>
</span>
<?php if (!$employee_telephone->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="x<?php echo $employee_telephone_grid->RowIndex ?>_status" id="x<?php echo $employee_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="o<?php echo $employee_telephone_grid->RowIndex ?>_status" id="o<?php echo $employee_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_status" id="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_status" id="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_telephone->HospID->cellAttributes() ?>>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="text" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->HospID->EditValue ?>"<?php echo $employee_telephone->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="text" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->HospID->EditValue ?>"<?php echo $employee_telephone->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_telephone_grid->RowCnt ?>_employee_telephone_HospID" class="employee_telephone_HospID">
<span<?php echo $employee_telephone->HospID->viewAttributes() ?>>
<?php echo $employee_telephone->HospID->getViewValue() ?></span>
</span>
<?php if (!$employee_telephone->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="femployee_telephonegrid$x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="femployee_telephonegrid$o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_telephone_grid->ListOptions->render("body", "right", $employee_telephone_grid->RowCnt);
?>
	</tr>
<?php if ($employee_telephone->RowType == ROWTYPE_ADD || $employee_telephone->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_telephonegrid.updateLists(<?php echo $employee_telephone_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_telephone->isGridAdd() || $employee_telephone->CurrentMode == "copy")
		if (!$employee_telephone_grid->Recordset->EOF)
			$employee_telephone_grid->Recordset->moveNext();
}
?>
<?php
	if ($employee_telephone->CurrentMode == "add" || $employee_telephone->CurrentMode == "copy" || $employee_telephone->CurrentMode == "edit") {
		$employee_telephone_grid->RowIndex = '$rowindex$';
		$employee_telephone_grid->loadRowValues();

		// Set row properties
		$employee_telephone->resetAttributes();
		$employee_telephone->RowAttrs = array_merge($employee_telephone->RowAttrs, array('data-rowindex'=>$employee_telephone_grid->RowIndex, 'id'=>'r0_employee_telephone', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_telephone->RowAttrs["class"], "ew-template");
		$employee_telephone->RowType = ROWTYPE_ADD;

		// Render row
		$employee_telephone_grid->renderRow();

		// Render list options
		$employee_telephone_grid->renderListOptions();
		$employee_telephone_grid->StartRowCnt = 0;
?>
	<tr<?php echo $employee_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_telephone_grid->ListOptions->render("body", "left", $employee_telephone_grid->RowIndex);
?>
	<?php if ($employee_telephone->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$employee_telephone->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_id" class="form-group employee_telephone_id">
<span<?php echo $employee_telephone->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_id" name="o<?php echo $employee_telephone_grid->RowIndex ?>_id" id="o<?php echo $employee_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_telephone->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if (!$employee_telephone->isConfirm()) { ?>
<?php if ($employee_telephone->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="text" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->employee_id->EditValue ?>"<?php echo $employee_telephone->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?php echo $employee_telephone->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" name="o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_telephone_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_telephone->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->tele_type->Visible) { // tele_type ?>
		<td data-name="tele_type">
<?php if (!$employee_telephone->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_tele_type" data-value-separator="<?php echo $employee_telephone->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type"<?php echo $employee_telephone->tele_type->editAttributes() ?>>
		<?php echo $employee_telephone->tele_type->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$employee_telephone->tele_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->tele_type->caption() ?>" data-title="<?php echo $employee_telephone->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type',url:'sys_tele_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->tele_type->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_tele_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<span<?php echo $employee_telephone->tele_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->tele_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" id="x<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" name="o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" id="o<?php echo $employee_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($employee_telephone->tele_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone->Visible) { // telephone ?>
		<td data-name="telephone">
<?php if (!$employee_telephone->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="text" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($employee_telephone->telephone->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->telephone->EditValue ?>"<?php echo $employee_telephone->telephone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<span<?php echo $employee_telephone->telephone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->telephone->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" name="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" id="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($employee_telephone->telephone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->telephone_type->Visible) { // telephone_type ?>
		<td data-name="telephone_type">
<?php if (!$employee_telephone->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $employee_telephone->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type"<?php echo $employee_telephone->telephone_type->editAttributes() ?>>
		<?php echo $employee_telephone->telephone_type->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$employee_telephone->telephone_type->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_telephone->telephone_type->caption() ?>" data-title="<?php echo $employee_telephone->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type',url:'sys_telephone_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_telephone->telephone_type->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_telephone_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<span<?php echo $employee_telephone->telephone_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->telephone_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" id="x<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" name="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" id="o<?php echo $employee_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($employee_telephone->telephone_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$employee_telephone->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_status" class="form-group employee_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_telephone" data-field="x_status" data-value-separator="<?php echo $employee_telephone->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_telephone_grid->RowIndex ?>_status" name="x<?php echo $employee_telephone_grid->RowIndex ?>_status"<?php echo $employee_telephone->status->editAttributes() ?>>
		<?php echo $employee_telephone->status->selectOptionListHtml("x<?php echo $employee_telephone_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_telephone->status->Lookup->getParamTag("p_x" . $employee_telephone_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_status" class="form-group employee_telephone_status">
<span<?php echo $employee_telephone->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="x<?php echo $employee_telephone_grid->RowIndex ?>_status" id="x<?php echo $employee_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_status" name="o<?php echo $employee_telephone_grid->RowIndex ?>_status" id="o<?php echo $employee_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_telephone->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_telephone->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$employee_telephone->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="text" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_telephone->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_telephone->HospID->EditValue ?>"<?php echo $employee_telephone->HospID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<span<?php echo $employee_telephone->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_telephone->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="x<?php echo $employee_telephone_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" name="o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" id="o<?php echo $employee_telephone_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_telephone->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_telephone_grid->ListOptions->render("body", "right", $employee_telephone_grid->RowIndex);
?>
<script>
femployee_telephonegrid.updateLists(<?php echo $employee_telephone_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($employee_telephone->CurrentMode == "add" || $employee_telephone->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $employee_telephone_grid->FormKeyCountName ?>" id="<?php echo $employee_telephone_grid->FormKeyCountName ?>" value="<?php echo $employee_telephone_grid->KeyCount ?>">
<?php echo $employee_telephone_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_telephone->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $employee_telephone_grid->FormKeyCountName ?>" id="<?php echo $employee_telephone_grid->FormKeyCountName ?>" value="<?php echo $employee_telephone_grid->KeyCount ?>">
<?php echo $employee_telephone_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_telephone->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="femployee_telephonegrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($employee_telephone_grid->Recordset)
	$employee_telephone_grid->Recordset->Close();
?>
</div>
<?php if ($employee_telephone_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $employee_telephone_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_telephone_grid->TotalRecs == 0 && !$employee_telephone->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_telephone_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_telephone_grid->terminate();
?>
<?php if (!$employee_telephone->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_telephone", "95%", "");
</script>
<?php } ?>