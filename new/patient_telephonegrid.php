<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_telephone_grid))
	$patient_telephone_grid = new patient_telephone_grid();

// Run the page
$patient_telephone_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_telephone_grid->Page_Render();
?>
<?php if (!$patient_telephone_grid->isExport()) { ?>
<script>
var fpatient_telephonegrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_telephonegrid = new ew.Form("fpatient_telephonegrid", "grid");
	fpatient_telephonegrid.formKeyCountName = '<?php echo $patient_telephone_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_telephonegrid.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
			<?php if ($patient_telephone_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_grid->id->caption(), $patient_telephone_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_grid->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_grid->patient_id->caption(), $patient_telephone_grid->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_grid->tele_type->Required) { ?>
				elm = this.getElements("x" + infix + "_tele_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_grid->tele_type->caption(), $patient_telephone_grid->tele_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_grid->telephone->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_grid->telephone->caption(), $patient_telephone_grid->telephone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_grid->telephone_type->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_grid->telephone_type->caption(), $patient_telephone_grid->telephone_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_telephone_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_telephone_grid->status->caption(), $patient_telephone_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpatient_telephonegrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "patient_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "tele_type", false)) return false;
		if (ew.valueChanged(fobj, infix, "telephone", false)) return false;
		if (ew.valueChanged(fobj, infix, "telephone_type", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_telephonegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_telephonegrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_telephonegrid.lists["x_tele_type"] = <?php echo $patient_telephone_grid->tele_type->Lookup->toClientList($patient_telephone_grid) ?>;
	fpatient_telephonegrid.lists["x_tele_type"].options = <?php echo JsonEncode($patient_telephone_grid->tele_type->lookupOptions()) ?>;
	fpatient_telephonegrid.lists["x_telephone_type"] = <?php echo $patient_telephone_grid->telephone_type->Lookup->toClientList($patient_telephone_grid) ?>;
	fpatient_telephonegrid.lists["x_telephone_type"].options = <?php echo JsonEncode($patient_telephone_grid->telephone_type->lookupOptions()) ?>;
	fpatient_telephonegrid.lists["x_status"] = <?php echo $patient_telephone_grid->status->Lookup->toClientList($patient_telephone_grid) ?>;
	fpatient_telephonegrid.lists["x_status"].options = <?php echo JsonEncode($patient_telephone_grid->status->lookupOptions()) ?>;
	loadjs.done("fpatient_telephonegrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_telephone_grid->renderOtherOptions();
?>
<?php if ($patient_telephone_grid->TotalRecords > 0 || $patient_telephone->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_telephone_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_telephone">
<?php if ($patient_telephone_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_telephone_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_telephonegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_telephone" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_telephonegrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_telephone->RowType = ROWTYPE_HEADER;

// Render list options
$patient_telephone_grid->renderListOptions();

// Render list options (header, left)
$patient_telephone_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_telephone_grid->id->Visible) { // id ?>
	<?php if ($patient_telephone_grid->SortUrl($patient_telephone_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_telephone_grid->id->headerCellClass() ?>"><div id="elh_patient_telephone_id" class="patient_telephone_id"><div class="ew-table-header-caption"><?php echo $patient_telephone_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_telephone_grid->id->headerCellClass() ?>"><div><div id="elh_patient_telephone_id" class="patient_telephone_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_grid->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_telephone_grid->SortUrl($patient_telephone_grid->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_telephone_grid->patient_id->headerCellClass() ?>"><div id="elh_patient_telephone_patient_id" class="patient_telephone_patient_id"><div class="ew-table-header-caption"><?php echo $patient_telephone_grid->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_telephone_grid->patient_id->headerCellClass() ?>"><div><div id="elh_patient_telephone_patient_id" class="patient_telephone_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_grid->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_grid->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_grid->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_grid->tele_type->Visible) { // tele_type ?>
	<?php if ($patient_telephone_grid->SortUrl($patient_telephone_grid->tele_type) == "") { ?>
		<th data-name="tele_type" class="<?php echo $patient_telephone_grid->tele_type->headerCellClass() ?>"><div id="elh_patient_telephone_tele_type" class="patient_telephone_tele_type"><div class="ew-table-header-caption"><?php echo $patient_telephone_grid->tele_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tele_type" class="<?php echo $patient_telephone_grid->tele_type->headerCellClass() ?>"><div><div id="elh_patient_telephone_tele_type" class="patient_telephone_tele_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_grid->tele_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_grid->tele_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_grid->tele_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_grid->telephone->Visible) { // telephone ?>
	<?php if ($patient_telephone_grid->SortUrl($patient_telephone_grid->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $patient_telephone_grid->telephone->headerCellClass() ?>"><div id="elh_patient_telephone_telephone" class="patient_telephone_telephone"><div class="ew-table-header-caption"><?php echo $patient_telephone_grid->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $patient_telephone_grid->telephone->headerCellClass() ?>"><div><div id="elh_patient_telephone_telephone" class="patient_telephone_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_grid->telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_grid->telephone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_grid->telephone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_grid->telephone_type->Visible) { // telephone_type ?>
	<?php if ($patient_telephone_grid->SortUrl($patient_telephone_grid->telephone_type) == "") { ?>
		<th data-name="telephone_type" class="<?php echo $patient_telephone_grid->telephone_type->headerCellClass() ?>"><div id="elh_patient_telephone_telephone_type" class="patient_telephone_telephone_type"><div class="ew-table-header-caption"><?php echo $patient_telephone_grid->telephone_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone_type" class="<?php echo $patient_telephone_grid->telephone_type->headerCellClass() ?>"><div><div id="elh_patient_telephone_telephone_type" class="patient_telephone_telephone_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_grid->telephone_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_grid->telephone_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_grid->telephone_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_telephone_grid->status->Visible) { // status ?>
	<?php if ($patient_telephone_grid->SortUrl($patient_telephone_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_telephone_grid->status->headerCellClass() ?>"><div id="elh_patient_telephone_status" class="patient_telephone_status"><div class="ew-table-header-caption"><?php echo $patient_telephone_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_telephone_grid->status->headerCellClass() ?>"><div><div id="elh_patient_telephone_status" class="patient_telephone_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_telephone_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_telephone_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_telephone_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_telephone_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_telephone_grid->StartRecord = 1;
$patient_telephone_grid->StopRecord = $patient_telephone_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_telephone->isConfirm() || $patient_telephone_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_telephone_grid->FormKeyCountName) && ($patient_telephone_grid->isGridAdd() || $patient_telephone_grid->isGridEdit() || $patient_telephone->isConfirm())) {
		$patient_telephone_grid->KeyCount = $CurrentForm->getValue($patient_telephone_grid->FormKeyCountName);
		$patient_telephone_grid->StopRecord = $patient_telephone_grid->StartRecord + $patient_telephone_grid->KeyCount - 1;
	}
}
$patient_telephone_grid->RecordCount = $patient_telephone_grid->StartRecord - 1;
if ($patient_telephone_grid->Recordset && !$patient_telephone_grid->Recordset->EOF) {
	$patient_telephone_grid->Recordset->moveFirst();
	$selectLimit = $patient_telephone_grid->UseSelectLimit;
	if (!$selectLimit && $patient_telephone_grid->StartRecord > 1)
		$patient_telephone_grid->Recordset->move($patient_telephone_grid->StartRecord - 1);
} elseif (!$patient_telephone->AllowAddDeleteRow && $patient_telephone_grid->StopRecord == 0) {
	$patient_telephone_grid->StopRecord = $patient_telephone->GridAddRowCount;
}

// Initialize aggregate
$patient_telephone->RowType = ROWTYPE_AGGREGATEINIT;
$patient_telephone->resetAttributes();
$patient_telephone_grid->renderRow();
if ($patient_telephone_grid->isGridAdd())
	$patient_telephone_grid->RowIndex = 0;
if ($patient_telephone_grid->isGridEdit())
	$patient_telephone_grid->RowIndex = 0;
while ($patient_telephone_grid->RecordCount < $patient_telephone_grid->StopRecord) {
	$patient_telephone_grid->RecordCount++;
	if ($patient_telephone_grid->RecordCount >= $patient_telephone_grid->StartRecord) {
		$patient_telephone_grid->RowCount++;
		if ($patient_telephone_grid->isGridAdd() || $patient_telephone_grid->isGridEdit() || $patient_telephone->isConfirm()) {
			$patient_telephone_grid->RowIndex++;
			$CurrentForm->Index = $patient_telephone_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_telephone_grid->FormActionName) && ($patient_telephone->isConfirm() || $patient_telephone_grid->EventCancelled))
				$patient_telephone_grid->RowAction = strval($CurrentForm->getValue($patient_telephone_grid->FormActionName));
			elseif ($patient_telephone_grid->isGridAdd())
				$patient_telephone_grid->RowAction = "insert";
			else
				$patient_telephone_grid->RowAction = "";
		}

		// Set up key count
		$patient_telephone_grid->KeyCount = $patient_telephone_grid->RowIndex;

		// Init row class and style
		$patient_telephone->resetAttributes();
		$patient_telephone->CssClass = "";
		if ($patient_telephone_grid->isGridAdd()) {
			if ($patient_telephone->CurrentMode == "copy") {
				$patient_telephone_grid->loadRowValues($patient_telephone_grid->Recordset); // Load row values
				$patient_telephone_grid->setRecordKey($patient_telephone_grid->RowOldKey, $patient_telephone_grid->Recordset); // Set old record key
			} else {
				$patient_telephone_grid->loadRowValues(); // Load default values
				$patient_telephone_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_telephone_grid->loadRowValues($patient_telephone_grid->Recordset); // Load row values
		}
		$patient_telephone->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_telephone_grid->isGridAdd()) // Grid add
			$patient_telephone->RowType = ROWTYPE_ADD; // Render add
		if ($patient_telephone_grid->isGridAdd() && $patient_telephone->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_telephone_grid->restoreCurrentRowFormValues($patient_telephone_grid->RowIndex); // Restore form values
		if ($patient_telephone_grid->isGridEdit()) { // Grid edit
			if ($patient_telephone->EventCancelled)
				$patient_telephone_grid->restoreCurrentRowFormValues($patient_telephone_grid->RowIndex); // Restore form values
			if ($patient_telephone_grid->RowAction == "insert")
				$patient_telephone->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_telephone->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_telephone_grid->isGridEdit() && ($patient_telephone->RowType == ROWTYPE_EDIT || $patient_telephone->RowType == ROWTYPE_ADD) && $patient_telephone->EventCancelled) // Update failed
			$patient_telephone_grid->restoreCurrentRowFormValues($patient_telephone_grid->RowIndex); // Restore form values
		if ($patient_telephone->RowType == ROWTYPE_EDIT) // Edit row
			$patient_telephone_grid->EditRowCount++;
		if ($patient_telephone->isConfirm()) // Confirm row
			$patient_telephone_grid->restoreCurrentRowFormValues($patient_telephone_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_telephone->RowAttrs->merge(["data-rowindex" => $patient_telephone_grid->RowCount, "id" => "r" . $patient_telephone_grid->RowCount . "_patient_telephone", "data-rowtype" => $patient_telephone->RowType]);

		// Render row
		$patient_telephone_grid->renderRow();

		// Render list options
		$patient_telephone_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_telephone_grid->RowAction != "delete" && $patient_telephone_grid->RowAction != "insertdelete" && !($patient_telephone_grid->RowAction == "insert" && $patient_telephone->isConfirm() && $patient_telephone_grid->emptyRow())) {
?>
	<tr <?php echo $patient_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_telephone_grid->ListOptions->render("body", "left", $patient_telephone_grid->RowCount);
?>
	<?php if ($patient_telephone_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_telephone_grid->id->cellAttributes() ?>>
<?php if ($patient_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_id" class="form-group"></span>
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="o<?php echo $patient_telephone_grid->RowIndex ?>_id" id="o<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_id" class="form-group">
<span<?php echo $patient_telephone_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_id">
<span<?php echo $patient_telephone_grid->id->viewAttributes() ?>><?php echo $patient_telephone_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_telephone->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="o<?php echo $patient_telephone_grid->RowIndex ?>_id" id="o<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_id" id="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_id" id="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_telephone_grid->patient_id->cellAttributes() ?>>
<?php if ($patient_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_telephone_grid->patient_id->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_patient_id" class="form-group">
<span<?php echo $patient_telephone_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_patient_id" class="form-group">
<input type="text" data-table="patient_telephone" data-field="x_patient_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_telephone_grid->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_grid->patient_id->EditValue ?>"<?php echo $patient_telephone_grid->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_patient_id" class="form-group">
<span<?php echo $patient_telephone_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->patient_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_patient_id">
<span<?php echo $patient_telephone_grid->patient_id->viewAttributes() ?>><?php echo $patient_telephone_grid->patient_id->getViewValue() ?></span>
</span>
<?php if (!$patient_telephone->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->tele_type->Visible) { // tele_type ?>
		<td data-name="tele_type" <?php echo $patient_telephone_grid->tele_type->cellAttributes() ?>>
<?php if ($patient_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_tele_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_tele_type" data-value-separator="<?php echo $patient_telephone_grid->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type"<?php echo $patient_telephone_grid->tele_type->editAttributes() ?>>
			<?php echo $patient_telephone_grid->tele_type->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_tele_type") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->tele_type->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_tele_type") ?>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" name="o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" id="o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($patient_telephone_grid->tele_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_tele_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_tele_type" data-value-separator="<?php echo $patient_telephone_grid->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type"<?php echo $patient_telephone_grid->tele_type->editAttributes() ?>>
			<?php echo $patient_telephone_grid->tele_type->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_tele_type") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->tele_type->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_tele_type") ?>
</span>
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_tele_type">
<span<?php echo $patient_telephone_grid->tele_type->viewAttributes() ?>><?php echo $patient_telephone_grid->tele_type->getViewValue() ?></span>
</span>
<?php if (!$patient_telephone->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" id="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($patient_telephone_grid->tele_type->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" name="o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" id="o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($patient_telephone_grid->tele_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" name="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" id="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($patient_telephone_grid->tele_type->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" name="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" id="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($patient_telephone_grid->tele_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->telephone->Visible) { // telephone ?>
		<td data-name="telephone" <?php echo $patient_telephone_grid->telephone->cellAttributes() ?>>
<?php if ($patient_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_telephone" class="form-group">
<input type="text" data-table="patient_telephone" data-field="x_telephone" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_telephone_grid->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_grid->telephone->EditValue ?>"<?php echo $patient_telephone_grid->telephone->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" name="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_telephone_grid->telephone->OldValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_telephone" class="form-group">
<input type="text" data-table="patient_telephone" data-field="x_telephone" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_telephone_grid->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_grid->telephone->EditValue ?>"<?php echo $patient_telephone_grid->telephone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_telephone">
<span<?php echo $patient_telephone_grid->telephone->viewAttributes() ?>><?php echo $patient_telephone_grid->telephone->getViewValue() ?></span>
</span>
<?php if (!$patient_telephone->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_telephone_grid->telephone->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" name="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_telephone_grid->telephone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" name="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_telephone_grid->telephone->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" name="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_telephone_grid->telephone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->telephone_type->Visible) { // telephone_type ?>
		<td data-name="telephone_type" <?php echo $patient_telephone_grid->telephone_type->cellAttributes() ?>>
<?php if ($patient_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_telephone_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $patient_telephone_grid->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type"<?php echo $patient_telephone_grid->telephone_type->editAttributes() ?>>
			<?php echo $patient_telephone_grid->telephone_type->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_telephone_type") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->telephone_type->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_telephone_type") ?>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" name="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" id="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($patient_telephone_grid->telephone_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_telephone_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $patient_telephone_grid->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type"<?php echo $patient_telephone_grid->telephone_type->editAttributes() ?>>
			<?php echo $patient_telephone_grid->telephone_type->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_telephone_type") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->telephone_type->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_telephone_type") ?>
</span>
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_telephone_type">
<span<?php echo $patient_telephone_grid->telephone_type->viewAttributes() ?>><?php echo $patient_telephone_grid->telephone_type->getViewValue() ?></span>
</span>
<?php if (!$patient_telephone->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($patient_telephone_grid->telephone_type->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" name="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" id="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($patient_telephone_grid->telephone_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" name="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" id="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($patient_telephone_grid->telephone_type->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" name="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" id="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($patient_telephone_grid->telephone_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_telephone_grid->status->cellAttributes() ?>>
<?php if ($patient_telephone->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_status" data-value-separator="<?php echo $patient_telephone_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_status" name="x<?php echo $patient_telephone_grid->RowIndex ?>_status"<?php echo $patient_telephone_grid->status->editAttributes() ?>>
			<?php echo $patient_telephone_grid->status->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->status->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_status" name="o<?php echo $patient_telephone_grid->RowIndex ?>_status" id="o<?php echo $patient_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_telephone_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_status" data-value-separator="<?php echo $patient_telephone_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_status" name="x<?php echo $patient_telephone_grid->RowIndex ?>_status"<?php echo $patient_telephone_grid->status->editAttributes() ?>>
			<?php echo $patient_telephone_grid->status->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->status->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_telephone->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_telephone_grid->RowCount ?>_patient_telephone_status">
<span<?php echo $patient_telephone_grid->status->viewAttributes() ?>><?php echo $patient_telephone_grid->status->getViewValue() ?></span>
</span>
<?php if (!$patient_telephone->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_status" name="x<?php echo $patient_telephone_grid->RowIndex ?>_status" id="x<?php echo $patient_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_telephone_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_status" name="o<?php echo $patient_telephone_grid->RowIndex ?>_status" id="o<?php echo $patient_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_telephone_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_status" name="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_status" id="fpatient_telephonegrid$x<?php echo $patient_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_telephone_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_status" name="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_status" id="fpatient_telephonegrid$o<?php echo $patient_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_telephone_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_telephone_grid->ListOptions->render("body", "right", $patient_telephone_grid->RowCount);
?>
	</tr>
<?php if ($patient_telephone->RowType == ROWTYPE_ADD || $patient_telephone->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_telephonegrid", "load"], function() {
	fpatient_telephonegrid.updateLists(<?php echo $patient_telephone_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_telephone_grid->isGridAdd() || $patient_telephone->CurrentMode == "copy")
		if (!$patient_telephone_grid->Recordset->EOF)
			$patient_telephone_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_telephone->CurrentMode == "add" || $patient_telephone->CurrentMode == "copy" || $patient_telephone->CurrentMode == "edit") {
		$patient_telephone_grid->RowIndex = '$rowindex$';
		$patient_telephone_grid->loadRowValues();

		// Set row properties
		$patient_telephone->resetAttributes();
		$patient_telephone->RowAttrs->merge(["data-rowindex" => $patient_telephone_grid->RowIndex, "id" => "r0_patient_telephone", "data-rowtype" => ROWTYPE_ADD]);
		$patient_telephone->RowAttrs->appendClass("ew-template");
		$patient_telephone->RowType = ROWTYPE_ADD;

		// Render row
		$patient_telephone_grid->renderRow();

		// Render list options
		$patient_telephone_grid->renderListOptions();
		$patient_telephone_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_telephone->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_telephone_grid->ListOptions->render("body", "left", $patient_telephone_grid->RowIndex);
?>
	<?php if ($patient_telephone_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_telephone->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_id" class="form-group patient_telephone_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_id" class="form-group patient_telephone_id">
<span<?php echo $patient_telephone_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_id" name="o<?php echo $patient_telephone_grid->RowIndex ?>_id" id="o<?php echo $patient_telephone_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_telephone_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$patient_telephone->isConfirm()) { ?>
<?php if ($patient_telephone_grid->patient_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_telephone_patient_id" class="form-group patient_telephone_patient_id">
<span<?php echo $patient_telephone_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_patient_id" class="form-group patient_telephone_patient_id">
<input type="text" data-table="patient_telephone" data-field="x_patient_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_telephone_grid->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_grid->patient_id->EditValue ?>"<?php echo $patient_telephone_grid->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_patient_id" class="form-group patient_telephone_patient_id">
<span<?php echo $patient_telephone_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" name="o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_telephone_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_telephone_grid->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->tele_type->Visible) { // tele_type ?>
		<td data-name="tele_type">
<?php if (!$patient_telephone->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_tele_type" class="form-group patient_telephone_tele_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_tele_type" data-value-separator="<?php echo $patient_telephone_grid->tele_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type"<?php echo $patient_telephone_grid->tele_type->editAttributes() ?>>
			<?php echo $patient_telephone_grid->tele_type->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_tele_type") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->tele_type->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_tele_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_tele_type" class="form-group patient_telephone_tele_type">
<span<?php echo $patient_telephone_grid->tele_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->tele_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" id="x<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($patient_telephone_grid->tele_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" name="o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" id="o<?php echo $patient_telephone_grid->RowIndex ?>_tele_type" value="<?php echo HtmlEncode($patient_telephone_grid->tele_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->telephone->Visible) { // telephone ?>
		<td data-name="telephone">
<?php if (!$patient_telephone->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_telephone" class="form-group patient_telephone_telephone">
<input type="text" data-table="patient_telephone" data-field="x_telephone" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_telephone_grid->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_telephone_grid->telephone->EditValue ?>"<?php echo $patient_telephone_grid->telephone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_telephone" class="form-group patient_telephone_telephone">
<span<?php echo $patient_telephone_grid->telephone->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->telephone->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_telephone_grid->telephone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" name="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" id="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_telephone_grid->telephone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->telephone_type->Visible) { // telephone_type ?>
		<td data-name="telephone_type">
<?php if (!$patient_telephone->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_telephone_type" class="form-group patient_telephone_telephone_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_telephone_type" data-value-separator="<?php echo $patient_telephone_grid->telephone_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type"<?php echo $patient_telephone_grid->telephone_type->editAttributes() ?>>
			<?php echo $patient_telephone_grid->telephone_type->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_telephone_type") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->telephone_type->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_telephone_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_telephone_type" class="form-group patient_telephone_telephone_type">
<span<?php echo $patient_telephone_grid->telephone_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->telephone_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" name="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" id="x<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($patient_telephone_grid->telephone_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" name="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" id="o<?php echo $patient_telephone_grid->RowIndex ?>_telephone_type" value="<?php echo HtmlEncode($patient_telephone_grid->telephone_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_telephone_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_telephone->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_status" class="form-group patient_telephone_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_telephone" data-field="x_status" data-value-separator="<?php echo $patient_telephone_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_telephone_grid->RowIndex ?>_status" name="x<?php echo $patient_telephone_grid->RowIndex ?>_status"<?php echo $patient_telephone_grid->status->editAttributes() ?>>
			<?php echo $patient_telephone_grid->status->selectOptionListHtml("x{$patient_telephone_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_telephone_grid->status->Lookup->getParamTag($patient_telephone_grid, "p_x" . $patient_telephone_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_status" class="form-group patient_telephone_status">
<span<?php echo $patient_telephone_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_telephone_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_status" name="x<?php echo $patient_telephone_grid->RowIndex ?>_status" id="x<?php echo $patient_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_telephone_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_status" name="o<?php echo $patient_telephone_grid->RowIndex ?>_status" id="o<?php echo $patient_telephone_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_telephone_grid->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_telephone_grid->ListOptions->render("body", "right", $patient_telephone_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_telephonegrid", "load"], function() {
	fpatient_telephonegrid.updateLists(<?php echo $patient_telephone_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_telephone->CurrentMode == "add" || $patient_telephone->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_telephone_grid->FormKeyCountName ?>" id="<?php echo $patient_telephone_grid->FormKeyCountName ?>" value="<?php echo $patient_telephone_grid->KeyCount ?>">
<?php echo $patient_telephone_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_telephone->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_telephone_grid->FormKeyCountName ?>" id="<?php echo $patient_telephone_grid->FormKeyCountName ?>" value="<?php echo $patient_telephone_grid->KeyCount ?>">
<?php echo $patient_telephone_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_telephone->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_telephonegrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_telephone_grid->Recordset)
	$patient_telephone_grid->Recordset->Close();
?>
<?php if ($patient_telephone_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_telephone_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_telephone_grid->TotalRecords == 0 && !$patient_telephone->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_telephone_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_telephone_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_telephone->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_telephone",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_telephone_grid->terminate();
?>