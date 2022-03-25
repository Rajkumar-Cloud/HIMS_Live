<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_emergency_contact_grid))
	$patient_emergency_contact_grid = new patient_emergency_contact_grid();

// Run the page
$patient_emergency_contact_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_grid->Page_Render();
?>
<?php if (!$patient_emergency_contact_grid->isExport()) { ?>
<script>
var fpatient_emergency_contactgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_emergency_contactgrid = new ew.Form("fpatient_emergency_contactgrid", "grid");
	fpatient_emergency_contactgrid.formKeyCountName = '<?php echo $patient_emergency_contact_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_emergency_contactgrid.validate = function() {
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
			<?php if ($patient_emergency_contact_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_grid->id->caption(), $patient_emergency_contact_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_grid->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_grid->patient_id->caption(), $patient_emergency_contact_grid->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_grid->name->Required) { ?>
				elm = this.getElements("x" + infix + "_name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_grid->name->caption(), $patient_emergency_contact_grid->name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_grid->relationship->Required) { ?>
				elm = this.getElements("x" + infix + "_relationship");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_grid->relationship->caption(), $patient_emergency_contact_grid->relationship->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_grid->telephone->Required) { ?>
				elm = this.getElements("x" + infix + "_telephone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_grid->telephone->caption(), $patient_emergency_contact_grid->telephone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_grid->address->Required) { ?>
				elm = this.getElements("x" + infix + "_address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_grid->address->caption(), $patient_emergency_contact_grid->address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_emergency_contact_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact_grid->status->caption(), $patient_emergency_contact_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpatient_emergency_contactgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "patient_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "name", false)) return false;
		if (ew.valueChanged(fobj, infix, "relationship", false)) return false;
		if (ew.valueChanged(fobj, infix, "telephone", false)) return false;
		if (ew.valueChanged(fobj, infix, "address", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_emergency_contactgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_emergency_contactgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_emergency_contactgrid.lists["x_status"] = <?php echo $patient_emergency_contact_grid->status->Lookup->toClientList($patient_emergency_contact_grid) ?>;
	fpatient_emergency_contactgrid.lists["x_status"].options = <?php echo JsonEncode($patient_emergency_contact_grid->status->lookupOptions()) ?>;
	loadjs.done("fpatient_emergency_contactgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_emergency_contact_grid->renderOtherOptions();
?>
<?php if ($patient_emergency_contact_grid->TotalRecords > 0 || $patient_emergency_contact->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_emergency_contact_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_emergency_contact">
<?php if ($patient_emergency_contact_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_emergency_contact_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_emergency_contactgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_emergency_contact" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_emergency_contactgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_emergency_contact->RowType = ROWTYPE_HEADER;

// Render list options
$patient_emergency_contact_grid->renderListOptions();

// Render list options (header, left)
$patient_emergency_contact_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_emergency_contact_grid->id->Visible) { // id ?>
	<?php if ($patient_emergency_contact_grid->SortUrl($patient_emergency_contact_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact_grid->id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact_grid->id->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_grid->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_emergency_contact_grid->SortUrl($patient_emergency_contact_grid->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact_grid->patient_id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact_grid->patient_id->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_grid->patient_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_grid->patient_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_grid->name->Visible) { // name ?>
	<?php if ($patient_emergency_contact_grid->SortUrl($patient_emergency_contact_grid->name) == "") { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact_grid->name->headerCellClass() ?>"><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact_grid->name->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_grid->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_grid->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_grid->relationship->Visible) { // relationship ?>
	<?php if ($patient_emergency_contact_grid->SortUrl($patient_emergency_contact_grid->relationship) == "") { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact_grid->relationship->headerCellClass() ?>"><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact_grid->relationship->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->relationship->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_grid->relationship->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_grid->relationship->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_grid->telephone->Visible) { // telephone ?>
	<?php if ($patient_emergency_contact_grid->SortUrl($patient_emergency_contact_grid->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact_grid->telephone->headerCellClass() ?>"><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact_grid->telephone->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_grid->telephone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_grid->telephone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_grid->address->Visible) { // address ?>
	<?php if ($patient_emergency_contact_grid->SortUrl($patient_emergency_contact_grid->address) == "") { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact_grid->address->headerCellClass() ?>"><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact_grid->address->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->address->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_grid->address->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_grid->address->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_grid->status->Visible) { // status ?>
	<?php if ($patient_emergency_contact_grid->SortUrl($patient_emergency_contact_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact_grid->status->headerCellClass() ?>"><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact_grid->status->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_emergency_contact_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_emergency_contact_grid->StartRecord = 1;
$patient_emergency_contact_grid->StopRecord = $patient_emergency_contact_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_emergency_contact->isConfirm() || $patient_emergency_contact_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_emergency_contact_grid->FormKeyCountName) && ($patient_emergency_contact_grid->isGridAdd() || $patient_emergency_contact_grid->isGridEdit() || $patient_emergency_contact->isConfirm())) {
		$patient_emergency_contact_grid->KeyCount = $CurrentForm->getValue($patient_emergency_contact_grid->FormKeyCountName);
		$patient_emergency_contact_grid->StopRecord = $patient_emergency_contact_grid->StartRecord + $patient_emergency_contact_grid->KeyCount - 1;
	}
}
$patient_emergency_contact_grid->RecordCount = $patient_emergency_contact_grid->StartRecord - 1;
if ($patient_emergency_contact_grid->Recordset && !$patient_emergency_contact_grid->Recordset->EOF) {
	$patient_emergency_contact_grid->Recordset->moveFirst();
	$selectLimit = $patient_emergency_contact_grid->UseSelectLimit;
	if (!$selectLimit && $patient_emergency_contact_grid->StartRecord > 1)
		$patient_emergency_contact_grid->Recordset->move($patient_emergency_contact_grid->StartRecord - 1);
} elseif (!$patient_emergency_contact->AllowAddDeleteRow && $patient_emergency_contact_grid->StopRecord == 0) {
	$patient_emergency_contact_grid->StopRecord = $patient_emergency_contact->GridAddRowCount;
}

// Initialize aggregate
$patient_emergency_contact->RowType = ROWTYPE_AGGREGATEINIT;
$patient_emergency_contact->resetAttributes();
$patient_emergency_contact_grid->renderRow();
if ($patient_emergency_contact_grid->isGridAdd())
	$patient_emergency_contact_grid->RowIndex = 0;
if ($patient_emergency_contact_grid->isGridEdit())
	$patient_emergency_contact_grid->RowIndex = 0;
while ($patient_emergency_contact_grid->RecordCount < $patient_emergency_contact_grid->StopRecord) {
	$patient_emergency_contact_grid->RecordCount++;
	if ($patient_emergency_contact_grid->RecordCount >= $patient_emergency_contact_grid->StartRecord) {
		$patient_emergency_contact_grid->RowCount++;
		if ($patient_emergency_contact_grid->isGridAdd() || $patient_emergency_contact_grid->isGridEdit() || $patient_emergency_contact->isConfirm()) {
			$patient_emergency_contact_grid->RowIndex++;
			$CurrentForm->Index = $patient_emergency_contact_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_emergency_contact_grid->FormActionName) && ($patient_emergency_contact->isConfirm() || $patient_emergency_contact_grid->EventCancelled))
				$patient_emergency_contact_grid->RowAction = strval($CurrentForm->getValue($patient_emergency_contact_grid->FormActionName));
			elseif ($patient_emergency_contact_grid->isGridAdd())
				$patient_emergency_contact_grid->RowAction = "insert";
			else
				$patient_emergency_contact_grid->RowAction = "";
		}

		// Set up key count
		$patient_emergency_contact_grid->KeyCount = $patient_emergency_contact_grid->RowIndex;

		// Init row class and style
		$patient_emergency_contact->resetAttributes();
		$patient_emergency_contact->CssClass = "";
		if ($patient_emergency_contact_grid->isGridAdd()) {
			if ($patient_emergency_contact->CurrentMode == "copy") {
				$patient_emergency_contact_grid->loadRowValues($patient_emergency_contact_grid->Recordset); // Load row values
				$patient_emergency_contact_grid->setRecordKey($patient_emergency_contact_grid->RowOldKey, $patient_emergency_contact_grid->Recordset); // Set old record key
			} else {
				$patient_emergency_contact_grid->loadRowValues(); // Load default values
				$patient_emergency_contact_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_emergency_contact_grid->loadRowValues($patient_emergency_contact_grid->Recordset); // Load row values
		}
		$patient_emergency_contact->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_emergency_contact_grid->isGridAdd()) // Grid add
			$patient_emergency_contact->RowType = ROWTYPE_ADD; // Render add
		if ($patient_emergency_contact_grid->isGridAdd() && $patient_emergency_contact->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values
		if ($patient_emergency_contact_grid->isGridEdit()) { // Grid edit
			if ($patient_emergency_contact->EventCancelled)
				$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values
			if ($patient_emergency_contact_grid->RowAction == "insert")
				$patient_emergency_contact->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_emergency_contact->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_emergency_contact_grid->isGridEdit() && ($patient_emergency_contact->RowType == ROWTYPE_EDIT || $patient_emergency_contact->RowType == ROWTYPE_ADD) && $patient_emergency_contact->EventCancelled) // Update failed
			$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values
		if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) // Edit row
			$patient_emergency_contact_grid->EditRowCount++;
		if ($patient_emergency_contact->isConfirm()) // Confirm row
			$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_emergency_contact->RowAttrs->merge(["data-rowindex" => $patient_emergency_contact_grid->RowCount, "id" => "r" . $patient_emergency_contact_grid->RowCount . "_patient_emergency_contact", "data-rowtype" => $patient_emergency_contact->RowType]);

		// Render row
		$patient_emergency_contact_grid->renderRow();

		// Render list options
		$patient_emergency_contact_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_emergency_contact_grid->RowAction != "delete" && $patient_emergency_contact_grid->RowAction != "insertdelete" && !($patient_emergency_contact_grid->RowAction == "insert" && $patient_emergency_contact->isConfirm() && $patient_emergency_contact_grid->emptyRow())) {
?>
	<tr <?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_grid->ListOptions->render("body", "left", $patient_emergency_contact_grid->RowCount);
?>
	<?php if ($patient_emergency_contact_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_emergency_contact_grid->id->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_id" class="form-group"></span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_id" class="form-group">
<span<?php echo $patient_emergency_contact_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact_grid->id->viewAttributes() ?>><?php echo $patient_emergency_contact_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id" <?php echo $patient_emergency_contact_grid->patient_id->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_emergency_contact_grid->patient_id->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_patient_id" class="form-group">
<span<?php echo $patient_emergency_contact_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_patient_id" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->patient_id->EditValue ?>"<?php echo $patient_emergency_contact_grid->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_patient_id" class="form-group">
<span<?php echo $patient_emergency_contact_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->patient_id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact_grid->patient_id->viewAttributes() ?>><?php echo $patient_emergency_contact_grid->patient_id->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->name->Visible) { // name ?>
		<td data-name="name" <?php echo $patient_emergency_contact_grid->name->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_name" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->name->EditValue ?>"<?php echo $patient_emergency_contact_grid->name->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact_grid->name->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_name" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->name->EditValue ?>"<?php echo $patient_emergency_contact_grid->name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact_grid->name->viewAttributes() ?>><?php echo $patient_emergency_contact_grid->name->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact_grid->name->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact_grid->name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact_grid->name->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact_grid->name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->relationship->Visible) { // relationship ?>
		<td data-name="relationship" <?php echo $patient_emergency_contact_grid->relationship->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_relationship" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->relationship->EditValue ?>"<?php echo $patient_emergency_contact_grid->relationship->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_relationship" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->relationship->EditValue ?>"<?php echo $patient_emergency_contact_grid->relationship->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact_grid->relationship->viewAttributes() ?>><?php echo $patient_emergency_contact_grid->relationship->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->telephone->Visible) { // telephone ?>
		<td data-name="telephone" <?php echo $patient_emergency_contact_grid->telephone->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_telephone" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->telephone->EditValue ?>"<?php echo $patient_emergency_contact_grid->telephone->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_telephone" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->telephone->EditValue ?>"<?php echo $patient_emergency_contact_grid->telephone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact_grid->telephone->viewAttributes() ?>><?php echo $patient_emergency_contact_grid->telephone->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->address->Visible) { // address ?>
		<td data-name="address" <?php echo $patient_emergency_contact_grid->address->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_address" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->address->EditValue ?>"<?php echo $patient_emergency_contact_grid->address->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact_grid->address->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_address" class="form-group">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->address->EditValue ?>"<?php echo $patient_emergency_contact_grid->address->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact_grid->address->viewAttributes() ?>><?php echo $patient_emergency_contact_grid->address->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact_grid->address->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact_grid->address->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact_grid->address->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact_grid->address->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_emergency_contact_grid->status->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status"<?php echo $patient_emergency_contact_grid->status->editAttributes() ?>>
			<?php echo $patient_emergency_contact_grid->status->selectOptionListHtml("x{$patient_emergency_contact_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_emergency_contact_grid->status->Lookup->getParamTag($patient_emergency_contact_grid, "p_x" . $patient_emergency_contact_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status"<?php echo $patient_emergency_contact_grid->status->editAttributes() ?>>
			<?php echo $patient_emergency_contact_grid->status->selectOptionListHtml("x{$patient_emergency_contact_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_emergency_contact_grid->status->Lookup->getParamTag($patient_emergency_contact_grid, "p_x" . $patient_emergency_contact_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCount ?>_patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact_grid->status->viewAttributes() ?>><?php echo $patient_emergency_contact_grid->status->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_grid->ListOptions->render("body", "right", $patient_emergency_contact_grid->RowCount);
?>
	</tr>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD || $patient_emergency_contact->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_emergency_contactgrid", "load"], function() {
	fpatient_emergency_contactgrid.updateLists(<?php echo $patient_emergency_contact_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_emergency_contact_grid->isGridAdd() || $patient_emergency_contact->CurrentMode == "copy")
		if (!$patient_emergency_contact_grid->Recordset->EOF)
			$patient_emergency_contact_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_emergency_contact->CurrentMode == "add" || $patient_emergency_contact->CurrentMode == "copy" || $patient_emergency_contact->CurrentMode == "edit") {
		$patient_emergency_contact_grid->RowIndex = '$rowindex$';
		$patient_emergency_contact_grid->loadRowValues();

		// Set row properties
		$patient_emergency_contact->resetAttributes();
		$patient_emergency_contact->RowAttrs->merge(["data-rowindex" => $patient_emergency_contact_grid->RowIndex, "id" => "r0_patient_emergency_contact", "data-rowtype" => ROWTYPE_ADD]);
		$patient_emergency_contact->RowAttrs->appendClass("ew-template");
		$patient_emergency_contact->RowType = ROWTYPE_ADD;

		// Render row
		$patient_emergency_contact_grid->renderRow();

		// Render list options
		$patient_emergency_contact_grid->renderListOptions();
		$patient_emergency_contact_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_grid->ListOptions->render("body", "left", $patient_emergency_contact_grid->RowIndex);
?>
	<?php if ($patient_emergency_contact_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_id" class="form-group patient_emergency_contact_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_id" class="form-group patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<?php if ($patient_emergency_contact_grid->patient_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<input type="text" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->patient_id->EditValue ?>"<?php echo $patient_emergency_contact_grid->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact_grid->patient_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->patient_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact_grid->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->name->Visible) { // name ?>
		<td data-name="name">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_name" class="form-group patient_emergency_contact_name">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->name->EditValue ?>"<?php echo $patient_emergency_contact_grid->name->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_name" class="form-group patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact_grid->name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->name->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact_grid->name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact_grid->name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->relationship->Visible) { // relationship ?>
		<td data-name="relationship">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_relationship" class="form-group patient_emergency_contact_relationship">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->relationship->EditValue ?>"<?php echo $patient_emergency_contact_grid->relationship->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_relationship" class="form-group patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact_grid->relationship->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->relationship->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact_grid->relationship->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->telephone->Visible) { // telephone ?>
		<td data-name="telephone">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_telephone" class="form-group patient_emergency_contact_telephone">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->telephone->EditValue ?>"<?php echo $patient_emergency_contact_grid->telephone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_telephone" class="form-group patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact_grid->telephone->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->telephone->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact_grid->telephone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->address->Visible) { // address ?>
		<td data-name="address">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_address" class="form-group patient_emergency_contact_address">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact_grid->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact_grid->address->EditValue ?>"<?php echo $patient_emergency_contact_grid->address->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_address" class="form-group patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact_grid->address->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->address->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact_grid->address->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact_grid->address->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_status" class="form-group patient_emergency_contact_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status"<?php echo $patient_emergency_contact_grid->status->editAttributes() ?>>
			<?php echo $patient_emergency_contact_grid->status->selectOptionListHtml("x{$patient_emergency_contact_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_emergency_contact_grid->status->Lookup->getParamTag($patient_emergency_contact_grid, "p_x" . $patient_emergency_contact_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_status" class="form-group patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_emergency_contact_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact_grid->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_grid->ListOptions->render("body", "right", $patient_emergency_contact_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_emergency_contactgrid", "load"], function() {
	fpatient_emergency_contactgrid.updateLists(<?php echo $patient_emergency_contact_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_emergency_contact->CurrentMode == "add" || $patient_emergency_contact->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_emergency_contact_grid->FormKeyCountName ?>" id="<?php echo $patient_emergency_contact_grid->FormKeyCountName ?>" value="<?php echo $patient_emergency_contact_grid->KeyCount ?>">
<?php echo $patient_emergency_contact_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_emergency_contact->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_emergency_contact_grid->FormKeyCountName ?>" id="<?php echo $patient_emergency_contact_grid->FormKeyCountName ?>" value="<?php echo $patient_emergency_contact_grid->KeyCount ?>">
<?php echo $patient_emergency_contact_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_emergency_contact->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_emergency_contactgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_emergency_contact_grid->Recordset)
	$patient_emergency_contact_grid->Recordset->Close();
?>
<?php if ($patient_emergency_contact_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_emergency_contact_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_emergency_contact_grid->TotalRecords == 0 && !$patient_emergency_contact->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_emergency_contact_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_emergency_contact",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_emergency_contact_grid->terminate();
?>