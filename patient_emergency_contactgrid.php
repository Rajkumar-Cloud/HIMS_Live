<?php
namespace PHPMaker2019\HIMS;

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
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>

// Form object
var fpatient_emergency_contactgrid = new ew.Form("fpatient_emergency_contactgrid", "grid");
fpatient_emergency_contactgrid.formKeyCountName = '<?php echo $patient_emergency_contact_grid->FormKeyCountName ?>';

// Validate form
fpatient_emergency_contactgrid.validate = function() {
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
		<?php if ($patient_emergency_contact_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->id->caption(), $patient_emergency_contact->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_grid->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->patient_id->caption(), $patient_emergency_contact->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_grid->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->name->caption(), $patient_emergency_contact->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_grid->relationship->Required) { ?>
			elm = this.getElements("x" + infix + "_relationship");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->relationship->caption(), $patient_emergency_contact->relationship->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_grid->telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->telephone->caption(), $patient_emergency_contact->telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_grid->address->Required) { ?>
			elm = this.getElements("x" + infix + "_address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->address->caption(), $patient_emergency_contact->address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_emergency_contact_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_emergency_contact->status->caption(), $patient_emergency_contact->status->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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

// Form_CustomValidate event
fpatient_emergency_contactgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emergency_contactgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emergency_contactgrid.lists["x_status"] = <?php echo $patient_emergency_contact_grid->status->Lookup->toClientList() ?>;
fpatient_emergency_contactgrid.lists["x_status"].options = <?php echo JsonEncode($patient_emergency_contact_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_emergency_contact_grid->renderOtherOptions();
?>
<?php $patient_emergency_contact_grid->showPageHeader(); ?>
<?php
$patient_emergency_contact_grid->showMessage();
?>
<?php if ($patient_emergency_contact_grid->TotalRecs > 0 || $patient_emergency_contact->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_emergency_contact_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_emergency_contact">
<?php if ($patient_emergency_contact_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_emergency_contact_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_emergency_contactgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_emergency_contact" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_emergency_contactgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_emergency_contact_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_emergency_contact_grid->renderListOptions();

// Render list options (header, left)
$patient_emergency_contact_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact->id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_emergency_contact->id->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact->patient_id->headerCellClass() ?>"><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_emergency_contact->patient_id->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->name) == "") { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact->name->headerCellClass() ?>"><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $patient_emergency_contact->name->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->relationship) == "") { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact->relationship->headerCellClass() ?>"><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="relationship" class="<?php echo $patient_emergency_contact->relationship->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->relationship->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->relationship->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->relationship->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->telephone) == "") { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact->telephone->headerCellClass() ?>"><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="telephone" class="<?php echo $patient_emergency_contact->telephone->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->telephone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->telephone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->address) == "") { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact->address->headerCellClass() ?>"><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address" class="<?php echo $patient_emergency_contact->address->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->address->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
	<?php if ($patient_emergency_contact->sortUrl($patient_emergency_contact->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact->status->headerCellClass() ?>"><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status"><div class="ew-table-header-caption"><?php echo $patient_emergency_contact->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_emergency_contact->status->headerCellClass() ?>"><div><div id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_emergency_contact->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
$patient_emergency_contact_grid->StartRec = 1;
$patient_emergency_contact_grid->StopRec = $patient_emergency_contact_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_emergency_contact_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_emergency_contact_grid->FormKeyCountName) && ($patient_emergency_contact->isGridAdd() || $patient_emergency_contact->isGridEdit() || $patient_emergency_contact->isConfirm())) {
		$patient_emergency_contact_grid->KeyCount = $CurrentForm->getValue($patient_emergency_contact_grid->FormKeyCountName);
		$patient_emergency_contact_grid->StopRec = $patient_emergency_contact_grid->StartRec + $patient_emergency_contact_grid->KeyCount - 1;
	}
}
$patient_emergency_contact_grid->RecCnt = $patient_emergency_contact_grid->StartRec - 1;
if ($patient_emergency_contact_grid->Recordset && !$patient_emergency_contact_grid->Recordset->EOF) {
	$patient_emergency_contact_grid->Recordset->moveFirst();
	$selectLimit = $patient_emergency_contact_grid->UseSelectLimit;
	if (!$selectLimit && $patient_emergency_contact_grid->StartRec > 1)
		$patient_emergency_contact_grid->Recordset->move($patient_emergency_contact_grid->StartRec - 1);
} elseif (!$patient_emergency_contact->AllowAddDeleteRow && $patient_emergency_contact_grid->StopRec == 0) {
	$patient_emergency_contact_grid->StopRec = $patient_emergency_contact->GridAddRowCount;
}

// Initialize aggregate
$patient_emergency_contact->RowType = ROWTYPE_AGGREGATEINIT;
$patient_emergency_contact->resetAttributes();
$patient_emergency_contact_grid->renderRow();
if ($patient_emergency_contact->isGridAdd())
	$patient_emergency_contact_grid->RowIndex = 0;
if ($patient_emergency_contact->isGridEdit())
	$patient_emergency_contact_grid->RowIndex = 0;
while ($patient_emergency_contact_grid->RecCnt < $patient_emergency_contact_grid->StopRec) {
	$patient_emergency_contact_grid->RecCnt++;
	if ($patient_emergency_contact_grid->RecCnt >= $patient_emergency_contact_grid->StartRec) {
		$patient_emergency_contact_grid->RowCnt++;
		if ($patient_emergency_contact->isGridAdd() || $patient_emergency_contact->isGridEdit() || $patient_emergency_contact->isConfirm()) {
			$patient_emergency_contact_grid->RowIndex++;
			$CurrentForm->Index = $patient_emergency_contact_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_emergency_contact_grid->FormActionName) && $patient_emergency_contact_grid->EventCancelled)
				$patient_emergency_contact_grid->RowAction = strval($CurrentForm->getValue($patient_emergency_contact_grid->FormActionName));
			elseif ($patient_emergency_contact->isGridAdd())
				$patient_emergency_contact_grid->RowAction = "insert";
			else
				$patient_emergency_contact_grid->RowAction = "";
		}

		// Set up key count
		$patient_emergency_contact_grid->KeyCount = $patient_emergency_contact_grid->RowIndex;

		// Init row class and style
		$patient_emergency_contact->resetAttributes();
		$patient_emergency_contact->CssClass = "";
		if ($patient_emergency_contact->isGridAdd()) {
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
		if ($patient_emergency_contact->isGridAdd()) // Grid add
			$patient_emergency_contact->RowType = ROWTYPE_ADD; // Render add
		if ($patient_emergency_contact->isGridAdd() && $patient_emergency_contact->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values
		if ($patient_emergency_contact->isGridEdit()) { // Grid edit
			if ($patient_emergency_contact->EventCancelled)
				$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values
			if ($patient_emergency_contact_grid->RowAction == "insert")
				$patient_emergency_contact->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_emergency_contact->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_emergency_contact->isGridEdit() && ($patient_emergency_contact->RowType == ROWTYPE_EDIT || $patient_emergency_contact->RowType == ROWTYPE_ADD) && $patient_emergency_contact->EventCancelled) // Update failed
			$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values
		if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) // Edit row
			$patient_emergency_contact_grid->EditRowCnt++;
		if ($patient_emergency_contact->isConfirm()) // Confirm row
			$patient_emergency_contact_grid->restoreCurrentRowFormValues($patient_emergency_contact_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_emergency_contact->RowAttrs = array_merge($patient_emergency_contact->RowAttrs, array('data-rowindex'=>$patient_emergency_contact_grid->RowCnt, 'id'=>'r' . $patient_emergency_contact_grid->RowCnt . '_patient_emergency_contact', 'data-rowtype'=>$patient_emergency_contact->RowType));

		// Render row
		$patient_emergency_contact_grid->renderRow();

		// Render list options
		$patient_emergency_contact_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_emergency_contact_grid->RowAction <> "delete" && $patient_emergency_contact_grid->RowAction <> "insertdelete" && !($patient_emergency_contact_grid->RowAction == "insert" && $patient_emergency_contact->isConfirm() && $patient_emergency_contact_grid->emptyRow())) {
?>
	<tr<?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_grid->ListOptions->render("body", "left", $patient_emergency_contact_grid->RowCnt);
?>
	<?php if ($patient_emergency_contact->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_emergency_contact->id->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_id" class="form-group patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_id" class="patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->id->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_emergency_contact->patient_id->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_emergency_contact->patient_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<input type="text" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->patient_id->EditValue ?>"<?php echo $patient_emergency_contact->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->patient_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->patient_id->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->name->Visible) { // name ?>
		<td data-name="name"<?php echo $patient_emergency_contact->name->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_name" class="form-group patient_emergency_contact_name">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->name->EditValue ?>"<?php echo $patient_emergency_contact->name->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact->name->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_name" class="form-group patient_emergency_contact_name">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->name->EditValue ?>"<?php echo $patient_emergency_contact->name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_name" class="patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact->name->viewAttributes() ?>>
<?php echo $patient_emergency_contact->name->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact->name->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact->name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact->name->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact->name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
		<td data-name="relationship"<?php echo $patient_emergency_contact->relationship->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_relationship" class="form-group patient_emergency_contact_relationship">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->relationship->EditValue ?>"<?php echo $patient_emergency_contact->relationship->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact->relationship->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_relationship" class="form-group patient_emergency_contact_relationship">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->relationship->EditValue ?>"<?php echo $patient_emergency_contact->relationship->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact->relationship->viewAttributes() ?>>
<?php echo $patient_emergency_contact->relationship->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact->relationship->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact->relationship->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact->relationship->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact->relationship->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
		<td data-name="telephone"<?php echo $patient_emergency_contact->telephone->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_telephone" class="form-group patient_emergency_contact_telephone">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->telephone->EditValue ?>"<?php echo $patient_emergency_contact->telephone->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact->telephone->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_telephone" class="form-group patient_emergency_contact_telephone">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->telephone->EditValue ?>"<?php echo $patient_emergency_contact->telephone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact->telephone->viewAttributes() ?>>
<?php echo $patient_emergency_contact->telephone->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact->telephone->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact->telephone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact->telephone->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact->telephone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->address->Visible) { // address ?>
		<td data-name="address"<?php echo $patient_emergency_contact->address->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_address" class="form-group patient_emergency_contact_address">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->address->EditValue ?>"<?php echo $patient_emergency_contact->address->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact->address->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_address" class="form-group patient_emergency_contact_address">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->address->EditValue ?>"<?php echo $patient_emergency_contact->address->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_address" class="patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact->address->viewAttributes() ?>>
<?php echo $patient_emergency_contact->address->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact->address->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact->address->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact->address->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact->address->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_emergency_contact->status->cellAttributes() ?>>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_status" class="form-group patient_emergency_contact_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status"<?php echo $patient_emergency_contact->status->editAttributes() ?>>
		<?php echo $patient_emergency_contact->status->selectOptionListHtml("x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_emergency_contact->status->Lookup->getParamTag("p_x" . $patient_emergency_contact_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_status" class="form-group patient_emergency_contact_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status"<?php echo $patient_emergency_contact->status->editAttributes() ?>>
		<?php echo $patient_emergency_contact->status->selectOptionListHtml("x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_emergency_contact->status->Lookup->getParamTag("p_x" . $patient_emergency_contact_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_emergency_contact_grid->RowCnt ?>_patient_emergency_contact_status" class="patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact->status->viewAttributes() ?>>
<?php echo $patient_emergency_contact->status->getViewValue() ?></span>
</span>
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact->status->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="fpatient_emergency_contactgrid$x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact->status->FormValue) ?>">
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="fpatient_emergency_contactgrid$o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_grid->ListOptions->render("body", "right", $patient_emergency_contact_grid->RowCnt);
?>
	</tr>
<?php if ($patient_emergency_contact->RowType == ROWTYPE_ADD || $patient_emergency_contact->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_emergency_contactgrid.updateLists(<?php echo $patient_emergency_contact_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_emergency_contact->isGridAdd() || $patient_emergency_contact->CurrentMode == "copy")
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
		$patient_emergency_contact->RowAttrs = array_merge($patient_emergency_contact->RowAttrs, array('data-rowindex'=>$patient_emergency_contact_grid->RowIndex, 'id'=>'r0_patient_emergency_contact', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_emergency_contact->RowAttrs["class"], "ew-template");
		$patient_emergency_contact->RowType = ROWTYPE_ADD;

		// Render row
		$patient_emergency_contact_grid->renderRow();

		// Render list options
		$patient_emergency_contact_grid->renderListOptions();
		$patient_emergency_contact_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_grid->ListOptions->render("body", "left", $patient_emergency_contact_grid->RowIndex);
?>
	<?php if ($patient_emergency_contact->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_id" class="form-group patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_emergency_contact->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<?php if ($patient_emergency_contact->patient_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<input type="text" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_emergency_contact->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->patient_id->EditValue ?>"<?php echo $patient_emergency_contact->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_patient_id" class="form-group patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_patient_id" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_emergency_contact->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->name->Visible) { // name ?>
		<td data-name="name">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_name" class="form-group patient_emergency_contact_name">
<input type="text" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_emergency_contact->name->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->name->EditValue ?>"<?php echo $patient_emergency_contact->name->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_name" class="form-group patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact->name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_name" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($patient_emergency_contact->name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
		<td data-name="relationship">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_relationship" class="form-group patient_emergency_contact_relationship">
<input type="text" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_emergency_contact->relationship->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->relationship->EditValue ?>"<?php echo $patient_emergency_contact->relationship->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_relationship" class="form-group patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact->relationship->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->relationship->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact->relationship->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_relationship" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_relationship" value="<?php echo HtmlEncode($patient_emergency_contact->relationship->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
		<td data-name="telephone">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_telephone" class="form-group patient_emergency_contact_telephone">
<input type="text" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($patient_emergency_contact->telephone->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->telephone->EditValue ?>"<?php echo $patient_emergency_contact->telephone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_telephone" class="form-group patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact->telephone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->telephone->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact->telephone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_telephone" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_telephone" value="<?php echo HtmlEncode($patient_emergency_contact->telephone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->address->Visible) { // address ?>
		<td data-name="address">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_address" class="form-group patient_emergency_contact_address">
<input type="text" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($patient_emergency_contact->address->getPlaceHolder()) ?>" value="<?php echo $patient_emergency_contact->address->EditValue ?>"<?php echo $patient_emergency_contact->address->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_address" class="form-group patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact->address->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->address->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact->address->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_address" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_address" value="<?php echo HtmlEncode($patient_emergency_contact->address->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_emergency_contact->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_emergency_contact->isConfirm()) { ?>
<span id="el$rowindex$_patient_emergency_contact_status" class="form-group patient_emergency_contact_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_emergency_contact" data-field="x_status" data-value-separator="<?php echo $patient_emergency_contact->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status"<?php echo $patient_emergency_contact->status->editAttributes() ?>>
		<?php echo $patient_emergency_contact->status->selectOptionListHtml("x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_emergency_contact->status->Lookup->getParamTag("p_x" . $patient_emergency_contact_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_emergency_contact_status" class="form-group patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_emergency_contact->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="x<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_emergency_contact" data-field="x_status" name="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" id="o<?php echo $patient_emergency_contact_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_emergency_contact->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_grid->ListOptions->render("body", "right", $patient_emergency_contact_grid->RowIndex);
?>
<script>
fpatient_emergency_contactgrid.updateLists(<?php echo $patient_emergency_contact_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
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
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_emergency_contact_grid->Recordset)
	$patient_emergency_contact_grid->Recordset->Close();
?>
</div>
<?php if ($patient_emergency_contact_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_emergency_contact_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_emergency_contact_grid->TotalRecs == 0 && !$patient_emergency_contact->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_emergency_contact_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_emergency_contact_grid->terminate();
?>
<?php if (!$patient_emergency_contact->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_emergency_contact", "95%", "");
</script>
<?php } ?>