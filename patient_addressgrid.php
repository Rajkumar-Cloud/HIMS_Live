<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_address_grid))
	$patient_address_grid = new patient_address_grid();

// Run the page
$patient_address_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_address_grid->Page_Render();
?>
<?php if (!$patient_address->isExport()) { ?>
<script>

// Form object
var fpatient_addressgrid = new ew.Form("fpatient_addressgrid", "grid");
fpatient_addressgrid.formKeyCountName = '<?php echo $patient_address_grid->FormKeyCountName ?>';

// Validate form
fpatient_addressgrid.validate = function() {
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
		<?php if ($patient_address_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->id->caption(), $patient_address->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_grid->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->patient_id->caption(), $patient_address->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_grid->street->Required) { ?>
			elm = this.getElements("x" + infix + "_street");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->street->caption(), $patient_address->street->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_grid->town->Required) { ?>
			elm = this.getElements("x" + infix + "_town");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->town->caption(), $patient_address->town->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_grid->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->province->caption(), $patient_address->province->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_grid->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->postal_code->caption(), $patient_address->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_grid->address_type->Required) { ?>
			elm = this.getElements("x" + infix + "_address_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->address_type->caption(), $patient_address->address_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_address_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address->status->caption(), $patient_address->status->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_addressgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "patient_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "street", false)) return false;
	if (ew.valueChanged(fobj, infix, "town", false)) return false;
	if (ew.valueChanged(fobj, infix, "province", false)) return false;
	if (ew.valueChanged(fobj, infix, "postal_code", false)) return false;
	if (ew.valueChanged(fobj, infix, "address_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_addressgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_addressgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_addressgrid.lists["x_address_type"] = <?php echo $patient_address_grid->address_type->Lookup->toClientList() ?>;
fpatient_addressgrid.lists["x_address_type"].options = <?php echo JsonEncode($patient_address_grid->address_type->lookupOptions()) ?>;
fpatient_addressgrid.lists["x_status"] = <?php echo $patient_address_grid->status->Lookup->toClientList() ?>;
fpatient_addressgrid.lists["x_status"].options = <?php echo JsonEncode($patient_address_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_address_grid->renderOtherOptions();
?>
<?php $patient_address_grid->showPageHeader(); ?>
<?php
$patient_address_grid->showMessage();
?>
<?php if ($patient_address_grid->TotalRecs > 0 || $patient_address->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_address_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_address">
<?php if ($patient_address_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_address_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_addressgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_address" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_addressgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_address_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_address_grid->renderListOptions();

// Render list options (header, left)
$patient_address_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_address->id->Visible) { // id ?>
	<?php if ($patient_address->sortUrl($patient_address->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_address->id->headerCellClass() ?>"><div id="elh_patient_address_id" class="patient_address_id"><div class="ew-table-header-caption"><?php echo $patient_address->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_address->id->headerCellClass() ?>"><div><div id="elh_patient_address_id" class="patient_address_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_address->sortUrl($patient_address->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_address->patient_id->headerCellClass() ?>"><div id="elh_patient_address_patient_id" class="patient_address_patient_id"><div class="ew-table-header-caption"><?php echo $patient_address->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_address->patient_id->headerCellClass() ?>"><div><div id="elh_patient_address_patient_id" class="patient_address_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->street->Visible) { // street ?>
	<?php if ($patient_address->sortUrl($patient_address->street) == "") { ?>
		<th data-name="street" class="<?php echo $patient_address->street->headerCellClass() ?>"><div id="elh_patient_address_street" class="patient_address_street"><div class="ew-table-header-caption"><?php echo $patient_address->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $patient_address->street->headerCellClass() ?>"><div><div id="elh_patient_address_street" class="patient_address_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->street->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->town->Visible) { // town ?>
	<?php if ($patient_address->sortUrl($patient_address->town) == "") { ?>
		<th data-name="town" class="<?php echo $patient_address->town->headerCellClass() ?>"><div id="elh_patient_address_town" class="patient_address_town"><div class="ew-table-header-caption"><?php echo $patient_address->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $patient_address->town->headerCellClass() ?>"><div><div id="elh_patient_address_town" class="patient_address_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->town->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->province->Visible) { // province ?>
	<?php if ($patient_address->sortUrl($patient_address->province) == "") { ?>
		<th data-name="province" class="<?php echo $patient_address->province->headerCellClass() ?>"><div id="elh_patient_address_province" class="patient_address_province"><div class="ew-table-header-caption"><?php echo $patient_address->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $patient_address->province->headerCellClass() ?>"><div><div id="elh_patient_address_province" class="patient_address_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_address->sortUrl($patient_address->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $patient_address->postal_code->headerCellClass() ?>"><div id="elh_patient_address_postal_code" class="patient_address_postal_code"><div class="ew-table-header-caption"><?php echo $patient_address->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $patient_address->postal_code->headerCellClass() ?>"><div><div id="elh_patient_address_postal_code" class="patient_address_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->postal_code->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->address_type->Visible) { // address_type ?>
	<?php if ($patient_address->sortUrl($patient_address->address_type) == "") { ?>
		<th data-name="address_type" class="<?php echo $patient_address->address_type->headerCellClass() ?>"><div id="elh_patient_address_address_type" class="patient_address_address_type"><div class="ew-table-header-caption"><?php echo $patient_address->address_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address_type" class="<?php echo $patient_address->address_type->headerCellClass() ?>"><div><div id="elh_patient_address_address_type" class="patient_address_address_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->address_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->address_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address->status->Visible) { // status ?>
	<?php if ($patient_address->sortUrl($patient_address->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_address->status->headerCellClass() ?>"><div id="elh_patient_address_status" class="patient_address_status"><div class="ew-table-header-caption"><?php echo $patient_address->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_address->status->headerCellClass() ?>"><div><div id="elh_patient_address_status" class="patient_address_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_address->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_address_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_address_grid->StartRec = 1;
$patient_address_grid->StopRec = $patient_address_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_address_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_address_grid->FormKeyCountName) && ($patient_address->isGridAdd() || $patient_address->isGridEdit() || $patient_address->isConfirm())) {
		$patient_address_grid->KeyCount = $CurrentForm->getValue($patient_address_grid->FormKeyCountName);
		$patient_address_grid->StopRec = $patient_address_grid->StartRec + $patient_address_grid->KeyCount - 1;
	}
}
$patient_address_grid->RecCnt = $patient_address_grid->StartRec - 1;
if ($patient_address_grid->Recordset && !$patient_address_grid->Recordset->EOF) {
	$patient_address_grid->Recordset->moveFirst();
	$selectLimit = $patient_address_grid->UseSelectLimit;
	if (!$selectLimit && $patient_address_grid->StartRec > 1)
		$patient_address_grid->Recordset->move($patient_address_grid->StartRec - 1);
} elseif (!$patient_address->AllowAddDeleteRow && $patient_address_grid->StopRec == 0) {
	$patient_address_grid->StopRec = $patient_address->GridAddRowCount;
}

// Initialize aggregate
$patient_address->RowType = ROWTYPE_AGGREGATEINIT;
$patient_address->resetAttributes();
$patient_address_grid->renderRow();
if ($patient_address->isGridAdd())
	$patient_address_grid->RowIndex = 0;
if ($patient_address->isGridEdit())
	$patient_address_grid->RowIndex = 0;
while ($patient_address_grid->RecCnt < $patient_address_grid->StopRec) {
	$patient_address_grid->RecCnt++;
	if ($patient_address_grid->RecCnt >= $patient_address_grid->StartRec) {
		$patient_address_grid->RowCnt++;
		if ($patient_address->isGridAdd() || $patient_address->isGridEdit() || $patient_address->isConfirm()) {
			$patient_address_grid->RowIndex++;
			$CurrentForm->Index = $patient_address_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_address_grid->FormActionName) && $patient_address_grid->EventCancelled)
				$patient_address_grid->RowAction = strval($CurrentForm->getValue($patient_address_grid->FormActionName));
			elseif ($patient_address->isGridAdd())
				$patient_address_grid->RowAction = "insert";
			else
				$patient_address_grid->RowAction = "";
		}

		// Set up key count
		$patient_address_grid->KeyCount = $patient_address_grid->RowIndex;

		// Init row class and style
		$patient_address->resetAttributes();
		$patient_address->CssClass = "";
		if ($patient_address->isGridAdd()) {
			if ($patient_address->CurrentMode == "copy") {
				$patient_address_grid->loadRowValues($patient_address_grid->Recordset); // Load row values
				$patient_address_grid->setRecordKey($patient_address_grid->RowOldKey, $patient_address_grid->Recordset); // Set old record key
			} else {
				$patient_address_grid->loadRowValues(); // Load default values
				$patient_address_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_address_grid->loadRowValues($patient_address_grid->Recordset); // Load row values
		}
		$patient_address->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_address->isGridAdd()) // Grid add
			$patient_address->RowType = ROWTYPE_ADD; // Render add
		if ($patient_address->isGridAdd() && $patient_address->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values
		if ($patient_address->isGridEdit()) { // Grid edit
			if ($patient_address->EventCancelled)
				$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values
			if ($patient_address_grid->RowAction == "insert")
				$patient_address->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_address->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_address->isGridEdit() && ($patient_address->RowType == ROWTYPE_EDIT || $patient_address->RowType == ROWTYPE_ADD) && $patient_address->EventCancelled) // Update failed
			$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values
		if ($patient_address->RowType == ROWTYPE_EDIT) // Edit row
			$patient_address_grid->EditRowCnt++;
		if ($patient_address->isConfirm()) // Confirm row
			$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_address->RowAttrs = array_merge($patient_address->RowAttrs, array('data-rowindex'=>$patient_address_grid->RowCnt, 'id'=>'r' . $patient_address_grid->RowCnt . '_patient_address', 'data-rowtype'=>$patient_address->RowType));

		// Render row
		$patient_address_grid->renderRow();

		// Render list options
		$patient_address_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_address_grid->RowAction <> "delete" && $patient_address_grid->RowAction <> "insertdelete" && !($patient_address_grid->RowAction == "insert" && $patient_address->isConfirm() && $patient_address_grid->emptyRow())) {
?>
	<tr<?php echo $patient_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_grid->ListOptions->render("body", "left", $patient_address_grid->RowCnt);
?>
	<?php if ($patient_address->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_address->id->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_address" data-field="x_id" name="o<?php echo $patient_address_grid->RowIndex ?>_id" id="o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_id" class="form-group patient_address_id">
<span<?php echo $patient_address->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_id" name="x<?php echo $patient_address_grid->RowIndex ?>_id" id="x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_id" class="patient_address_id">
<span<?php echo $patient_address->id->viewAttributes() ?>>
<?php echo $patient_address->id->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_id" name="x<?php echo $patient_address_grid->RowIndex ?>_id" id="x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_id" name="o<?php echo $patient_address_grid->RowIndex ?>_id" id="o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_id" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_id" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_id" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_id" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_address->patient_id->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_address->patient_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_patient_id" class="form-group patient_address_patient_id">
<input type="text" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_address->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_address->patient_id->EditValue ?>"<?php echo $patient_address->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->patient_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_patient_id" class="patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<?php echo $patient_address->patient_id->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address->street->Visible) { // street ?>
		<td data-name="street"<?php echo $patient_address->street->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_street" class="form-group patient_address_street">
<input type="text" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address->street->getPlaceHolder()) ?>" value="<?php echo $patient_address->street->EditValue ?>"<?php echo $patient_address->street->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_street" name="o<?php echo $patient_address_grid->RowIndex ?>_street" id="o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address->street->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_street" class="form-group patient_address_street">
<input type="text" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address->street->getPlaceHolder()) ?>" value="<?php echo $patient_address->street->EditValue ?>"<?php echo $patient_address->street->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_street" class="patient_address_street">
<span<?php echo $patient_address->street->viewAttributes() ?>>
<?php echo $patient_address->street->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address->street->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_street" name="o<?php echo $patient_address_grid->RowIndex ?>_street" id="o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address->street->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_street" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_street" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address->street->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_street" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_street" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address->street->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address->town->Visible) { // town ?>
		<td data-name="town"<?php echo $patient_address->town->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_town" class="form-group patient_address_town">
<input type="text" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->town->getPlaceHolder()) ?>" value="<?php echo $patient_address->town->EditValue ?>"<?php echo $patient_address->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_town" name="o<?php echo $patient_address_grid->RowIndex ?>_town" id="o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address->town->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_town" class="form-group patient_address_town">
<input type="text" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->town->getPlaceHolder()) ?>" value="<?php echo $patient_address->town->EditValue ?>"<?php echo $patient_address->town->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_town" class="patient_address_town">
<span<?php echo $patient_address->town->viewAttributes() ?>>
<?php echo $patient_address->town->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address->town->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_town" name="o<?php echo $patient_address_grid->RowIndex ?>_town" id="o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address->town->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_town" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_town" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address->town->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_town" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_town" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address->town->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address->province->Visible) { // province ?>
		<td data-name="province"<?php echo $patient_address->province->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_province" class="form-group patient_address_province">
<input type="text" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->province->getPlaceHolder()) ?>" value="<?php echo $patient_address->province->EditValue ?>"<?php echo $patient_address->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_province" name="o<?php echo $patient_address_grid->RowIndex ?>_province" id="o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address->province->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_province" class="form-group patient_address_province">
<input type="text" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->province->getPlaceHolder()) ?>" value="<?php echo $patient_address->province->EditValue ?>"<?php echo $patient_address->province->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_province" class="patient_address_province">
<span<?php echo $patient_address->province->viewAttributes() ?>>
<?php echo $patient_address->province->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address->province->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_province" name="o<?php echo $patient_address_grid->RowIndex ?>_province" id="o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address->province->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_province" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_province" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address->province->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_province" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_province" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address->province->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $patient_address->postal_code->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_postal_code" class="form-group patient_address_postal_code">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address->postal_code->EditValue ?>"<?php echo $patient_address->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_postal_code" class="form-group patient_address_postal_code">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address->postal_code->EditValue ?>"<?php echo $patient_address->postal_code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_postal_code" class="patient_address_postal_code">
<span<?php echo $patient_address->postal_code->viewAttributes() ?>>
<?php echo $patient_address->postal_code->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address->postal_code->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address->postal_code->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address->postal_code->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address->postal_code->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address->address_type->Visible) { // address_type ?>
		<td data-name="address_type"<?php echo $patient_address->address_type->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_address_type" class="form-group patient_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type"<?php echo $patient_address->address_type->editAttributes() ?>>
		<?php echo $patient_address->address_type->selectOptionListHtml("x<?php echo $patient_address_grid->RowIndex ?>_address_type") ?>
	</select>
</div>
<?php echo $patient_address->address_type->Lookup->getParamTag("p_x" . $patient_address_grid->RowIndex . "_address_type") ?>
</span>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address->address_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_address_type" class="form-group patient_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type"<?php echo $patient_address->address_type->editAttributes() ?>>
		<?php echo $patient_address->address_type->selectOptionListHtml("x<?php echo $patient_address_grid->RowIndex ?>_address_type") ?>
	</select>
</div>
<?php echo $patient_address->address_type->Lookup->getParamTag("p_x" . $patient_address_grid->RowIndex . "_address_type") ?>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_address_type" class="patient_address_address_type">
<span<?php echo $patient_address->address_type->viewAttributes() ?>>
<?php echo $patient_address->address_type->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address->address_type->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address->address_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_address_type" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address->address_type->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address->address_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_address->status->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_status" class="form-group patient_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status"<?php echo $patient_address->status->editAttributes() ?>>
		<?php echo $patient_address->status->selectOptionListHtml("x<?php echo $patient_address_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_address->status->Lookup->getParamTag("p_x" . $patient_address_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_address" data-field="x_status" name="o<?php echo $patient_address_grid->RowIndex ?>_status" id="o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_status" class="form-group patient_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status"<?php echo $patient_address->status->editAttributes() ?>>
		<?php echo $patient_address->status->selectOptionListHtml("x<?php echo $patient_address_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_address->status->Lookup->getParamTag("p_x" . $patient_address_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCnt ?>_patient_address_status" class="patient_address_status">
<span<?php echo $patient_address->status->viewAttributes() ?>>
<?php echo $patient_address->status->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status" id="x<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address->status->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_status" name="o<?php echo $patient_address_grid->RowIndex ?>_status" id="o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_status" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_status" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address->status->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_status" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_status" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_address_grid->ListOptions->render("body", "right", $patient_address_grid->RowCnt);
?>
	</tr>
<?php if ($patient_address->RowType == ROWTYPE_ADD || $patient_address->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_addressgrid.updateLists(<?php echo $patient_address_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_address->isGridAdd() || $patient_address->CurrentMode == "copy")
		if (!$patient_address_grid->Recordset->EOF)
			$patient_address_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_address->CurrentMode == "add" || $patient_address->CurrentMode == "copy" || $patient_address->CurrentMode == "edit") {
		$patient_address_grid->RowIndex = '$rowindex$';
		$patient_address_grid->loadRowValues();

		// Set row properties
		$patient_address->resetAttributes();
		$patient_address->RowAttrs = array_merge($patient_address->RowAttrs, array('data-rowindex'=>$patient_address_grid->RowIndex, 'id'=>'r0_patient_address', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_address->RowAttrs["class"], "ew-template");
		$patient_address->RowType = ROWTYPE_ADD;

		// Render row
		$patient_address_grid->renderRow();

		// Render list options
		$patient_address_grid->renderListOptions();
		$patient_address_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_grid->ListOptions->render("body", "left", $patient_address_grid->RowIndex);
?>
	<?php if ($patient_address->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_address->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_address_id" class="form-group patient_address_id">
<span<?php echo $patient_address->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_id" name="x<?php echo $patient_address_grid->RowIndex ?>_id" id="x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_id" name="o<?php echo $patient_address_grid->RowIndex ?>_id" id="o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$patient_address->isConfirm()) { ?>
<?php if ($patient_address->patient_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<input type="text" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_address->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_address->patient_id->EditValue ?>"<?php echo $patient_address->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?php echo $patient_address->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address->street->Visible) { // street ?>
		<td data-name="street">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_street" class="form-group patient_address_street">
<input type="text" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address->street->getPlaceHolder()) ?>" value="<?php echo $patient_address->street->EditValue ?>"<?php echo $patient_address->street->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_street" class="form-group patient_address_street">
<span<?php echo $patient_address->street->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->street->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address->street->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_street" name="o<?php echo $patient_address_grid->RowIndex ?>_street" id="o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address->street->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address->town->Visible) { // town ?>
		<td data-name="town">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_town" class="form-group patient_address_town">
<input type="text" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->town->getPlaceHolder()) ?>" value="<?php echo $patient_address->town->EditValue ?>"<?php echo $patient_address->town->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_town" class="form-group patient_address_town">
<span<?php echo $patient_address->town->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->town->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address->town->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_town" name="o<?php echo $patient_address_grid->RowIndex ?>_town" id="o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address->town->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address->province->Visible) { // province ?>
		<td data-name="province">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_province" class="form-group patient_address_province">
<input type="text" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->province->getPlaceHolder()) ?>" value="<?php echo $patient_address->province->EditValue ?>"<?php echo $patient_address->province->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_province" class="form-group patient_address_province">
<span<?php echo $patient_address->province->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->province->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address->province->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_province" name="o<?php echo $patient_address_grid->RowIndex ?>_province" id="o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address->province->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_postal_code" class="form-group patient_address_postal_code">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address->postal_code->EditValue ?>"<?php echo $patient_address->postal_code->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_postal_code" class="form-group patient_address_postal_code">
<span<?php echo $patient_address->postal_code->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->postal_code->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address->postal_code->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address->postal_code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address->address_type->Visible) { // address_type ?>
		<td data-name="address_type">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_address_type" class="form-group patient_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type"<?php echo $patient_address->address_type->editAttributes() ?>>
		<?php echo $patient_address->address_type->selectOptionListHtml("x<?php echo $patient_address_grid->RowIndex ?>_address_type") ?>
	</select>
</div>
<?php echo $patient_address->address_type->Lookup->getParamTag("p_x" . $patient_address_grid->RowIndex . "_address_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_address_type" class="form-group patient_address_address_type">
<span<?php echo $patient_address->address_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->address_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address->address_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address->address_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_status" class="form-group patient_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status"<?php echo $patient_address->status->editAttributes() ?>>
		<?php echo $patient_address->status->selectOptionListHtml("x<?php echo $patient_address_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_address->status->Lookup->getParamTag("p_x" . $patient_address_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_status" class="form-group patient_address_status">
<span<?php echo $patient_address->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_address->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status" id="x<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_status" name="o<?php echo $patient_address_grid->RowIndex ?>_status" id="o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_address_grid->ListOptions->render("body", "right", $patient_address_grid->RowIndex);
?>
<script>
fpatient_addressgrid.updateLists(<?php echo $patient_address_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_address->CurrentMode == "add" || $patient_address->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_address_grid->FormKeyCountName ?>" id="<?php echo $patient_address_grid->FormKeyCountName ?>" value="<?php echo $patient_address_grid->KeyCount ?>">
<?php echo $patient_address_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_address->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_address_grid->FormKeyCountName ?>" id="<?php echo $patient_address_grid->FormKeyCountName ?>" value="<?php echo $patient_address_grid->KeyCount ?>">
<?php echo $patient_address_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_address->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_addressgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_address_grid->Recordset)
	$patient_address_grid->Recordset->Close();
?>
</div>
<?php if ($patient_address_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_address_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_address_grid->TotalRecs == 0 && !$patient_address->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_address_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_address_grid->terminate();
?>
<?php if (!$patient_address->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_address", "95%", "");
</script>
<?php } ?>