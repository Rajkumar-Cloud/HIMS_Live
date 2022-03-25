<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$patient_address_grid->isExport()) { ?>
<script>
var fpatient_addressgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_addressgrid = new ew.Form("fpatient_addressgrid", "grid");
	fpatient_addressgrid.formKeyCountName = '<?php echo $patient_address_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_addressgrid.validate = function() {
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
			<?php if ($patient_address_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->id->caption(), $patient_address_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_grid->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->patient_id->caption(), $patient_address_grid->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_grid->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->street->caption(), $patient_address_grid->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_grid->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->town->caption(), $patient_address_grid->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_grid->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->province->caption(), $patient_address_grid->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_grid->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->postal_code->caption(), $patient_address_grid->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_grid->address_type->Required) { ?>
				elm = this.getElements("x" + infix + "_address_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->address_type->caption(), $patient_address_grid->address_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_address_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_address_grid->status->caption(), $patient_address_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_addressgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_addressgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_addressgrid.lists["x_address_type"] = <?php echo $patient_address_grid->address_type->Lookup->toClientList($patient_address_grid) ?>;
	fpatient_addressgrid.lists["x_address_type"].options = <?php echo JsonEncode($patient_address_grid->address_type->lookupOptions()) ?>;
	fpatient_addressgrid.lists["x_status"] = <?php echo $patient_address_grid->status->Lookup->toClientList($patient_address_grid) ?>;
	fpatient_addressgrid.lists["x_status"].options = <?php echo JsonEncode($patient_address_grid->status->lookupOptions()) ?>;
	loadjs.done("fpatient_addressgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_address_grid->renderOtherOptions();
?>
<?php if ($patient_address_grid->TotalRecords > 0 || $patient_address->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_address_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_address">
<?php if ($patient_address_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_address_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_addressgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_address" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_addressgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_address->RowType = ROWTYPE_HEADER;

// Render list options
$patient_address_grid->renderListOptions();

// Render list options (header, left)
$patient_address_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_address_grid->id->Visible) { // id ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_address_grid->id->headerCellClass() ?>"><div id="elh_patient_address_id" class="patient_address_id"><div class="ew-table-header-caption"><?php echo $patient_address_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_address_grid->id->headerCellClass() ?>"><div><div id="elh_patient_address_id" class="patient_address_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_grid->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_address_grid->patient_id->headerCellClass() ?>"><div id="elh_patient_address_patient_id" class="patient_address_patient_id"><div class="ew-table-header-caption"><?php echo $patient_address_grid->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_address_grid->patient_id->headerCellClass() ?>"><div><div id="elh_patient_address_patient_id" class="patient_address_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_grid->street->Visible) { // street ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->street) == "") { ?>
		<th data-name="street" class="<?php echo $patient_address_grid->street->headerCellClass() ?>"><div id="elh_patient_address_street" class="patient_address_street"><div class="ew-table-header-caption"><?php echo $patient_address_grid->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $patient_address_grid->street->headerCellClass() ?>"><div><div id="elh_patient_address_street" class="patient_address_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->street->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_grid->town->Visible) { // town ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->town) == "") { ?>
		<th data-name="town" class="<?php echo $patient_address_grid->town->headerCellClass() ?>"><div id="elh_patient_address_town" class="patient_address_town"><div class="ew-table-header-caption"><?php echo $patient_address_grid->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $patient_address_grid->town->headerCellClass() ?>"><div><div id="elh_patient_address_town" class="patient_address_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->town->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_grid->province->Visible) { // province ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->province) == "") { ?>
		<th data-name="province" class="<?php echo $patient_address_grid->province->headerCellClass() ?>"><div id="elh_patient_address_province" class="patient_address_province"><div class="ew-table-header-caption"><?php echo $patient_address_grid->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $patient_address_grid->province->headerCellClass() ?>"><div><div id="elh_patient_address_province" class="patient_address_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_grid->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $patient_address_grid->postal_code->headerCellClass() ?>"><div id="elh_patient_address_postal_code" class="patient_address_postal_code"><div class="ew-table-header-caption"><?php echo $patient_address_grid->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $patient_address_grid->postal_code->headerCellClass() ?>"><div><div id="elh_patient_address_postal_code" class="patient_address_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->postal_code->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_grid->address_type->Visible) { // address_type ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->address_type) == "") { ?>
		<th data-name="address_type" class="<?php echo $patient_address_grid->address_type->headerCellClass() ?>"><div id="elh_patient_address_address_type" class="patient_address_address_type"><div class="ew-table-header-caption"><?php echo $patient_address_grid->address_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address_type" class="<?php echo $patient_address_grid->address_type->headerCellClass() ?>"><div><div id="elh_patient_address_address_type" class="patient_address_address_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->address_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->address_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_address_grid->status->Visible) { // status ?>
	<?php if ($patient_address_grid->SortUrl($patient_address_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_address_grid->status->headerCellClass() ?>"><div id="elh_patient_address_status" class="patient_address_status"><div class="ew-table-header-caption"><?php echo $patient_address_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_address_grid->status->headerCellClass() ?>"><div><div id="elh_patient_address_status" class="patient_address_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_address_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_address_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_address_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$patient_address_grid->StartRecord = 1;
$patient_address_grid->StopRecord = $patient_address_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_address->isConfirm() || $patient_address_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_address_grid->FormKeyCountName) && ($patient_address_grid->isGridAdd() || $patient_address_grid->isGridEdit() || $patient_address->isConfirm())) {
		$patient_address_grid->KeyCount = $CurrentForm->getValue($patient_address_grid->FormKeyCountName);
		$patient_address_grid->StopRecord = $patient_address_grid->StartRecord + $patient_address_grid->KeyCount - 1;
	}
}
$patient_address_grid->RecordCount = $patient_address_grid->StartRecord - 1;
if ($patient_address_grid->Recordset && !$patient_address_grid->Recordset->EOF) {
	$patient_address_grid->Recordset->moveFirst();
	$selectLimit = $patient_address_grid->UseSelectLimit;
	if (!$selectLimit && $patient_address_grid->StartRecord > 1)
		$patient_address_grid->Recordset->move($patient_address_grid->StartRecord - 1);
} elseif (!$patient_address->AllowAddDeleteRow && $patient_address_grid->StopRecord == 0) {
	$patient_address_grid->StopRecord = $patient_address->GridAddRowCount;
}

// Initialize aggregate
$patient_address->RowType = ROWTYPE_AGGREGATEINIT;
$patient_address->resetAttributes();
$patient_address_grid->renderRow();
if ($patient_address_grid->isGridAdd())
	$patient_address_grid->RowIndex = 0;
if ($patient_address_grid->isGridEdit())
	$patient_address_grid->RowIndex = 0;
while ($patient_address_grid->RecordCount < $patient_address_grid->StopRecord) {
	$patient_address_grid->RecordCount++;
	if ($patient_address_grid->RecordCount >= $patient_address_grid->StartRecord) {
		$patient_address_grid->RowCount++;
		if ($patient_address_grid->isGridAdd() || $patient_address_grid->isGridEdit() || $patient_address->isConfirm()) {
			$patient_address_grid->RowIndex++;
			$CurrentForm->Index = $patient_address_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_address_grid->FormActionName) && ($patient_address->isConfirm() || $patient_address_grid->EventCancelled))
				$patient_address_grid->RowAction = strval($CurrentForm->getValue($patient_address_grid->FormActionName));
			elseif ($patient_address_grid->isGridAdd())
				$patient_address_grid->RowAction = "insert";
			else
				$patient_address_grid->RowAction = "";
		}

		// Set up key count
		$patient_address_grid->KeyCount = $patient_address_grid->RowIndex;

		// Init row class and style
		$patient_address->resetAttributes();
		$patient_address->CssClass = "";
		if ($patient_address_grid->isGridAdd()) {
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
		if ($patient_address_grid->isGridAdd()) // Grid add
			$patient_address->RowType = ROWTYPE_ADD; // Render add
		if ($patient_address_grid->isGridAdd() && $patient_address->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values
		if ($patient_address_grid->isGridEdit()) { // Grid edit
			if ($patient_address->EventCancelled)
				$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values
			if ($patient_address_grid->RowAction == "insert")
				$patient_address->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_address->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_address_grid->isGridEdit() && ($patient_address->RowType == ROWTYPE_EDIT || $patient_address->RowType == ROWTYPE_ADD) && $patient_address->EventCancelled) // Update failed
			$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values
		if ($patient_address->RowType == ROWTYPE_EDIT) // Edit row
			$patient_address_grid->EditRowCount++;
		if ($patient_address->isConfirm()) // Confirm row
			$patient_address_grid->restoreCurrentRowFormValues($patient_address_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_address->RowAttrs->merge(["data-rowindex" => $patient_address_grid->RowCount, "id" => "r" . $patient_address_grid->RowCount . "_patient_address", "data-rowtype" => $patient_address->RowType]);

		// Render row
		$patient_address_grid->renderRow();

		// Render list options
		$patient_address_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_address_grid->RowAction != "delete" && $patient_address_grid->RowAction != "insertdelete" && !($patient_address_grid->RowAction == "insert" && $patient_address->isConfirm() && $patient_address_grid->emptyRow())) {
?>
	<tr <?php echo $patient_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_grid->ListOptions->render("body", "left", $patient_address_grid->RowCount);
?>
	<?php if ($patient_address_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_address_grid->id->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_id" class="form-group"></span>
<input type="hidden" data-table="patient_address" data-field="x_id" name="o<?php echo $patient_address_grid->RowIndex ?>_id" id="o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_id" class="form-group">
<span<?php echo $patient_address_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_id" name="x<?php echo $patient_address_grid->RowIndex ?>_id" id="x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_id">
<span<?php echo $patient_address_grid->id->viewAttributes() ?>><?php echo $patient_address_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_id" name="x<?php echo $patient_address_grid->RowIndex ?>_id" id="x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_id" name="o<?php echo $patient_address_grid->RowIndex ?>_id" id="o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_id" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_id" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_id" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_id" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address_grid->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_address_grid->patient_id->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_address_grid->patient_id->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_patient_id" class="form-group">
<span<?php echo $patient_address_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_patient_id" class="form-group">
<input type="text" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_address_grid->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->patient_id->EditValue ?>"<?php echo $patient_address_grid->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_patient_id" class="form-group">
<span<?php echo $patient_address_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->patient_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_patient_id">
<span<?php echo $patient_address_grid->patient_id->viewAttributes() ?>><?php echo $patient_address_grid->patient_id->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address_grid->street->Visible) { // street ?>
		<td data-name="street" <?php echo $patient_address_grid->street->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_street" class="form-group">
<input type="text" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address_grid->street->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->street->EditValue ?>"<?php echo $patient_address_grid->street->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_street" name="o<?php echo $patient_address_grid->RowIndex ?>_street" id="o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address_grid->street->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_street" class="form-group">
<input type="text" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address_grid->street->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->street->EditValue ?>"<?php echo $patient_address_grid->street->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_street">
<span<?php echo $patient_address_grid->street->viewAttributes() ?>><?php echo $patient_address_grid->street->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address_grid->street->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_street" name="o<?php echo $patient_address_grid->RowIndex ?>_street" id="o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address_grid->street->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_street" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_street" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address_grid->street->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_street" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_street" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address_grid->street->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address_grid->town->Visible) { // town ?>
		<td data-name="town" <?php echo $patient_address_grid->town->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_town" class="form-group">
<input type="text" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->town->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->town->EditValue ?>"<?php echo $patient_address_grid->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_town" name="o<?php echo $patient_address_grid->RowIndex ?>_town" id="o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address_grid->town->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_town" class="form-group">
<input type="text" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->town->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->town->EditValue ?>"<?php echo $patient_address_grid->town->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_town">
<span<?php echo $patient_address_grid->town->viewAttributes() ?>><?php echo $patient_address_grid->town->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address_grid->town->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_town" name="o<?php echo $patient_address_grid->RowIndex ?>_town" id="o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address_grid->town->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_town" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_town" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address_grid->town->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_town" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_town" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address_grid->town->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address_grid->province->Visible) { // province ?>
		<td data-name="province" <?php echo $patient_address_grid->province->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_province" class="form-group">
<input type="text" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->province->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->province->EditValue ?>"<?php echo $patient_address_grid->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_province" name="o<?php echo $patient_address_grid->RowIndex ?>_province" id="o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address_grid->province->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_province" class="form-group">
<input type="text" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->province->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->province->EditValue ?>"<?php echo $patient_address_grid->province->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_province">
<span<?php echo $patient_address_grid->province->viewAttributes() ?>><?php echo $patient_address_grid->province->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address_grid->province->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_province" name="o<?php echo $patient_address_grid->RowIndex ?>_province" id="o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address_grid->province->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_province" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_province" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address_grid->province->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_province" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_province" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address_grid->province->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address_grid->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $patient_address_grid->postal_code->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_postal_code" class="form-group">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->postal_code->EditValue ?>"<?php echo $patient_address_grid->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address_grid->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_postal_code" class="form-group">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->postal_code->EditValue ?>"<?php echo $patient_address_grid->postal_code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_postal_code">
<span<?php echo $patient_address_grid->postal_code->viewAttributes() ?>><?php echo $patient_address_grid->postal_code->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address_grid->postal_code->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address_grid->postal_code->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address_grid->postal_code->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address_grid->postal_code->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address_grid->address_type->Visible) { // address_type ?>
		<td data-name="address_type" <?php echo $patient_address_grid->address_type->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_address_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address_grid->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type"<?php echo $patient_address_grid->address_type->editAttributes() ?>>
			<?php echo $patient_address_grid->address_type->selectOptionListHtml("x{$patient_address_grid->RowIndex}_address_type") ?>
		</select>
</div>
<?php echo $patient_address_grid->address_type->Lookup->getParamTag($patient_address_grid, "p_x" . $patient_address_grid->RowIndex . "_address_type") ?>
</span>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address_grid->address_type->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_address_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address_grid->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type"<?php echo $patient_address_grid->address_type->editAttributes() ?>>
			<?php echo $patient_address_grid->address_type->selectOptionListHtml("x{$patient_address_grid->RowIndex}_address_type") ?>
		</select>
</div>
<?php echo $patient_address_grid->address_type->Lookup->getParamTag($patient_address_grid, "p_x" . $patient_address_grid->RowIndex . "_address_type") ?>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_address_type">
<span<?php echo $patient_address_grid->address_type->viewAttributes() ?>><?php echo $patient_address_grid->address_type->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address_grid->address_type->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address_grid->address_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_address_type" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address_grid->address_type->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address_grid->address_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_address_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_address_grid->status->cellAttributes() ?>>
<?php if ($patient_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status"<?php echo $patient_address_grid->status->editAttributes() ?>>
			<?php echo $patient_address_grid->status->selectOptionListHtml("x{$patient_address_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_address_grid->status->Lookup->getParamTag($patient_address_grid, "p_x" . $patient_address_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_address" data-field="x_status" name="o<?php echo $patient_address_grid->RowIndex ?>_status" id="o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status"<?php echo $patient_address_grid->status->editAttributes() ?>>
			<?php echo $patient_address_grid->status->selectOptionListHtml("x{$patient_address_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_address_grid->status->Lookup->getParamTag($patient_address_grid, "p_x" . $patient_address_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_address_grid->RowCount ?>_patient_address_status">
<span<?php echo $patient_address_grid->status->viewAttributes() ?>><?php echo $patient_address_grid->status->getViewValue() ?></span>
</span>
<?php if (!$patient_address->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status" id="x<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_status" name="o<?php echo $patient_address_grid->RowIndex ?>_status" id="o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_address" data-field="x_status" name="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_status" id="fpatient_addressgrid$x<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_status" name="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_status" id="fpatient_addressgrid$o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_address_grid->ListOptions->render("body", "right", $patient_address_grid->RowCount);
?>
	</tr>
<?php if ($patient_address->RowType == ROWTYPE_ADD || $patient_address->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_addressgrid", "load"], function() {
	fpatient_addressgrid.updateLists(<?php echo $patient_address_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_address_grid->isGridAdd() || $patient_address->CurrentMode == "copy")
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
		$patient_address->RowAttrs->merge(["data-rowindex" => $patient_address_grid->RowIndex, "id" => "r0_patient_address", "data-rowtype" => ROWTYPE_ADD]);
		$patient_address->RowAttrs->appendClass("ew-template");
		$patient_address->RowType = ROWTYPE_ADD;

		// Render row
		$patient_address_grid->renderRow();

		// Render list options
		$patient_address_grid->renderListOptions();
		$patient_address_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_address_grid->ListOptions->render("body", "left", $patient_address_grid->RowIndex);
?>
	<?php if ($patient_address_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_id" class="form-group patient_address_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_id" class="form-group patient_address_id">
<span<?php echo $patient_address_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_id" name="x<?php echo $patient_address_grid->RowIndex ?>_id" id="x<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_id" name="o<?php echo $patient_address_grid->RowIndex ?>_id" id="o<?php echo $patient_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_address_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address_grid->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$patient_address->isConfirm()) { ?>
<?php if ($patient_address_grid->patient_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?php echo $patient_address_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<input type="text" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_address_grid->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->patient_id->EditValue ?>"<?php echo $patient_address_grid->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?php echo $patient_address_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" name="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_address_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_address_grid->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address_grid->street->Visible) { // street ?>
		<td data-name="street">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_street" class="form-group patient_address_street">
<input type="text" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_address_grid->street->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->street->EditValue ?>"<?php echo $patient_address_grid->street->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_street" class="form-group patient_address_street">
<span<?php echo $patient_address_grid->street->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->street->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_street" name="x<?php echo $patient_address_grid->RowIndex ?>_street" id="x<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address_grid->street->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_street" name="o<?php echo $patient_address_grid->RowIndex ?>_street" id="o<?php echo $patient_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($patient_address_grid->street->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address_grid->town->Visible) { // town ?>
		<td data-name="town">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_town" class="form-group patient_address_town">
<input type="text" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->town->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->town->EditValue ?>"<?php echo $patient_address_grid->town->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_town" class="form-group patient_address_town">
<span<?php echo $patient_address_grid->town->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->town->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_town" name="x<?php echo $patient_address_grid->RowIndex ?>_town" id="x<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address_grid->town->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_town" name="o<?php echo $patient_address_grid->RowIndex ?>_town" id="o<?php echo $patient_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($patient_address_grid->town->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address_grid->province->Visible) { // province ?>
		<td data-name="province">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_province" class="form-group patient_address_province">
<input type="text" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->province->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->province->EditValue ?>"<?php echo $patient_address_grid->province->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_province" class="form-group patient_address_province">
<span<?php echo $patient_address_grid->province->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->province->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_province" name="x<?php echo $patient_address_grid->RowIndex ?>_province" id="x<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address_grid->province->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_province" name="o<?php echo $patient_address_grid->RowIndex ?>_province" id="o<?php echo $patient_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($patient_address_grid->province->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address_grid->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_postal_code" class="form-group patient_address_postal_code">
<input type="text" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_address_grid->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_address_grid->postal_code->EditValue ?>"<?php echo $patient_address_grid->postal_code->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_postal_code" class="form-group patient_address_postal_code">
<span<?php echo $patient_address_grid->postal_code->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->postal_code->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="x<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address_grid->postal_code->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" name="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" id="o<?php echo $patient_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($patient_address_grid->postal_code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address_grid->address_type->Visible) { // address_type ?>
		<td data-name="address_type">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_address_type" class="form-group patient_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_address_type" data-value-separator="<?php echo $patient_address_grid->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type"<?php echo $patient_address_grid->address_type->editAttributes() ?>>
			<?php echo $patient_address_grid->address_type->selectOptionListHtml("x{$patient_address_grid->RowIndex}_address_type") ?>
		</select>
</div>
<?php echo $patient_address_grid->address_type->Lookup->getParamTag($patient_address_grid, "p_x" . $patient_address_grid->RowIndex . "_address_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_address_type" class="form-group patient_address_address_type">
<span<?php echo $patient_address_grid->address_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->address_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="x<?php echo $patient_address_grid->RowIndex ?>_address_type" id="x<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address_grid->address_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" name="o<?php echo $patient_address_grid->RowIndex ?>_address_type" id="o<?php echo $patient_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($patient_address_grid->address_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_address_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_address->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_status" class="form-group patient_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_address" data-field="x_status" data-value-separator="<?php echo $patient_address_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_address_grid->RowIndex ?>_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status"<?php echo $patient_address_grid->status->editAttributes() ?>>
			<?php echo $patient_address_grid->status->selectOptionListHtml("x{$patient_address_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_address_grid->status->Lookup->getParamTag($patient_address_grid, "p_x" . $patient_address_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_status" class="form-group patient_address_status">
<span<?php echo $patient_address_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_address_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_status" name="x<?php echo $patient_address_grid->RowIndex ?>_status" id="x<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_status" name="o<?php echo $patient_address_grid->RowIndex ?>_status" id="o<?php echo $patient_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_address_grid->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_address_grid->ListOptions->render("body", "right", $patient_address_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_addressgrid", "load"], function() {
	fpatient_addressgrid.updateLists(<?php echo $patient_address_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_address_grid->Recordset)
	$patient_address_grid->Recordset->Close();
?>
<?php if ($patient_address_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_address_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_address_grid->TotalRecords == 0 && !$patient_address->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_address_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_address_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_address->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_address",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_address_grid->terminate();
?>