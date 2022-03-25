<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_document_grid))
	$patient_document_grid = new patient_document_grid();

// Run the page
$patient_document_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_grid->Page_Render();
?>
<?php if (!$patient_document->isExport()) { ?>
<script>

// Form object
var fpatient_documentgrid = new ew.Form("fpatient_documentgrid", "grid");
fpatient_documentgrid.formKeyCountName = '<?php echo $patient_document_grid->FormKeyCountName ?>';

// Validate form
fpatient_documentgrid.validate = function() {
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
		<?php if ($patient_document_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->id->caption(), $patient_document->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->patient_id->caption(), $patient_document->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->DocumentName->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->DocumentName->caption(), $patient_document->DocumentName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->status->caption(), $patient_document->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->createdby->caption(), $patient_document->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->createddatetime->caption(), $patient_document->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->modifiedby->caption(), $patient_document->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->modifieddatetime->caption(), $patient_document->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_document_grid->DocumentNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_document->DocumentNumber->caption(), $patient_document->DocumentNumber->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_documentgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "patient_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "DocumentName", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "DocumentNumber", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_documentgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_documentgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_documentgrid.lists["x_DocumentName"] = <?php echo $patient_document_grid->DocumentName->Lookup->toClientList() ?>;
fpatient_documentgrid.lists["x_DocumentName"].options = <?php echo JsonEncode($patient_document_grid->DocumentName->lookupOptions()) ?>;
fpatient_documentgrid.lists["x_status"] = <?php echo $patient_document_grid->status->Lookup->toClientList() ?>;
fpatient_documentgrid.lists["x_status"].options = <?php echo JsonEncode($patient_document_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_document_grid->renderOtherOptions();
?>
<?php $patient_document_grid->showPageHeader(); ?>
<?php
$patient_document_grid->showMessage();
?>
<?php if ($patient_document_grid->TotalRecs > 0 || $patient_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_document_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_document">
<?php if ($patient_document_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_document_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_documentgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_document" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_documentgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_document_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_document_grid->renderListOptions();

// Render list options (header, left)
$patient_document_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_document->id->Visible) { // id ?>
	<?php if ($patient_document->sortUrl($patient_document->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_document->id->headerCellClass() ?>"><div id="elh_patient_document_id" class="patient_document_id"><div class="ew-table-header-caption"><?php echo $patient_document->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_document->id->headerCellClass() ?>"><div><div id="elh_patient_document_id" class="patient_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_document->sortUrl($patient_document->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $patient_document->patient_id->headerCellClass() ?>"><div id="elh_patient_document_patient_id" class="patient_document_patient_id"><div class="ew-table-header-caption"><?php echo $patient_document->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $patient_document->patient_id->headerCellClass() ?>"><div><div id="elh_patient_document_patient_id" class="patient_document_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
	<?php if ($patient_document->sortUrl($patient_document->DocumentName) == "") { ?>
		<th data-name="DocumentName" class="<?php echo $patient_document->DocumentName->headerCellClass() ?>"><div id="elh_patient_document_DocumentName" class="patient_document_DocumentName"><div class="ew-table-header-caption"><?php echo $patient_document->DocumentName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentName" class="<?php echo $patient_document->DocumentName->headerCellClass() ?>"><div><div id="elh_patient_document_DocumentName" class="patient_document_DocumentName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->DocumentName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->DocumentName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
	<?php if ($patient_document->sortUrl($patient_document->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_document->status->headerCellClass() ?>"><div id="elh_patient_document_status" class="patient_document_status"><div class="ew-table-header-caption"><?php echo $patient_document->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_document->status->headerCellClass() ?>"><div><div id="elh_patient_document_status" class="patient_document_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->createdby->Visible) { // createdby ?>
	<?php if ($patient_document->sortUrl($patient_document->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_document->createdby->headerCellClass() ?>"><div id="elh_patient_document_createdby" class="patient_document_createdby"><div class="ew-table-header-caption"><?php echo $patient_document->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_document->createdby->headerCellClass() ?>"><div><div id="elh_patient_document_createdby" class="patient_document_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_document->sortUrl($patient_document->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_document->createddatetime->headerCellClass() ?>"><div id="elh_patient_document_createddatetime" class="patient_document_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_document->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_document->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_document_createddatetime" class="patient_document_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_document->sortUrl($patient_document->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_document->modifiedby->headerCellClass() ?>"><div id="elh_patient_document_modifiedby" class="patient_document_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_document->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_document->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_document_modifiedby" class="patient_document_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_document->sortUrl($patient_document->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_document->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_document_modifieddatetime" class="patient_document_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_document->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_document->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_document_modifieddatetime" class="patient_document_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($patient_document->sortUrl($patient_document->DocumentNumber) == "") { ?>
		<th data-name="DocumentNumber" class="<?php echo $patient_document->DocumentNumber->headerCellClass() ?>"><div id="elh_patient_document_DocumentNumber" class="patient_document_DocumentNumber"><div class="ew-table-header-caption"><?php echo $patient_document->DocumentNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentNumber" class="<?php echo $patient_document->DocumentNumber->headerCellClass() ?>"><div><div id="elh_patient_document_DocumentNumber" class="patient_document_DocumentNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_document->DocumentNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_document->DocumentNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_document->DocumentNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_document_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_document_grid->StartRec = 1;
$patient_document_grid->StopRec = $patient_document_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_document_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_document_grid->FormKeyCountName) && ($patient_document->isGridAdd() || $patient_document->isGridEdit() || $patient_document->isConfirm())) {
		$patient_document_grid->KeyCount = $CurrentForm->getValue($patient_document_grid->FormKeyCountName);
		$patient_document_grid->StopRec = $patient_document_grid->StartRec + $patient_document_grid->KeyCount - 1;
	}
}
$patient_document_grid->RecCnt = $patient_document_grid->StartRec - 1;
if ($patient_document_grid->Recordset && !$patient_document_grid->Recordset->EOF) {
	$patient_document_grid->Recordset->moveFirst();
	$selectLimit = $patient_document_grid->UseSelectLimit;
	if (!$selectLimit && $patient_document_grid->StartRec > 1)
		$patient_document_grid->Recordset->move($patient_document_grid->StartRec - 1);
} elseif (!$patient_document->AllowAddDeleteRow && $patient_document_grid->StopRec == 0) {
	$patient_document_grid->StopRec = $patient_document->GridAddRowCount;
}

// Initialize aggregate
$patient_document->RowType = ROWTYPE_AGGREGATEINIT;
$patient_document->resetAttributes();
$patient_document_grid->renderRow();
if ($patient_document->isGridAdd())
	$patient_document_grid->RowIndex = 0;
if ($patient_document->isGridEdit())
	$patient_document_grid->RowIndex = 0;
while ($patient_document_grid->RecCnt < $patient_document_grid->StopRec) {
	$patient_document_grid->RecCnt++;
	if ($patient_document_grid->RecCnt >= $patient_document_grid->StartRec) {
		$patient_document_grid->RowCnt++;
		if ($patient_document->isGridAdd() || $patient_document->isGridEdit() || $patient_document->isConfirm()) {
			$patient_document_grid->RowIndex++;
			$CurrentForm->Index = $patient_document_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_document_grid->FormActionName) && $patient_document_grid->EventCancelled)
				$patient_document_grid->RowAction = strval($CurrentForm->getValue($patient_document_grid->FormActionName));
			elseif ($patient_document->isGridAdd())
				$patient_document_grid->RowAction = "insert";
			else
				$patient_document_grid->RowAction = "";
		}

		// Set up key count
		$patient_document_grid->KeyCount = $patient_document_grid->RowIndex;

		// Init row class and style
		$patient_document->resetAttributes();
		$patient_document->CssClass = "";
		if ($patient_document->isGridAdd()) {
			if ($patient_document->CurrentMode == "copy") {
				$patient_document_grid->loadRowValues($patient_document_grid->Recordset); // Load row values
				$patient_document_grid->setRecordKey($patient_document_grid->RowOldKey, $patient_document_grid->Recordset); // Set old record key
			} else {
				$patient_document_grid->loadRowValues(); // Load default values
				$patient_document_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_document_grid->loadRowValues($patient_document_grid->Recordset); // Load row values
		}
		$patient_document->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_document->isGridAdd()) // Grid add
			$patient_document->RowType = ROWTYPE_ADD; // Render add
		if ($patient_document->isGridAdd() && $patient_document->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_document_grid->restoreCurrentRowFormValues($patient_document_grid->RowIndex); // Restore form values
		if ($patient_document->isGridEdit()) { // Grid edit
			if ($patient_document->EventCancelled)
				$patient_document_grid->restoreCurrentRowFormValues($patient_document_grid->RowIndex); // Restore form values
			if ($patient_document_grid->RowAction == "insert")
				$patient_document->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_document->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_document->isGridEdit() && ($patient_document->RowType == ROWTYPE_EDIT || $patient_document->RowType == ROWTYPE_ADD) && $patient_document->EventCancelled) // Update failed
			$patient_document_grid->restoreCurrentRowFormValues($patient_document_grid->RowIndex); // Restore form values
		if ($patient_document->RowType == ROWTYPE_EDIT) // Edit row
			$patient_document_grid->EditRowCnt++;
		if ($patient_document->isConfirm()) // Confirm row
			$patient_document_grid->restoreCurrentRowFormValues($patient_document_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_document->RowAttrs = array_merge($patient_document->RowAttrs, array('data-rowindex'=>$patient_document_grid->RowCnt, 'id'=>'r' . $patient_document_grid->RowCnt . '_patient_document', 'data-rowtype'=>$patient_document->RowType));

		// Render row
		$patient_document_grid->renderRow();

		// Render list options
		$patient_document_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_document_grid->RowAction <> "delete" && $patient_document_grid->RowAction <> "insertdelete" && !($patient_document_grid->RowAction == "insert" && $patient_document->isConfirm() && $patient_document_grid->emptyRow())) {
?>
	<tr<?php echo $patient_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_document_grid->ListOptions->render("body", "left", $patient_document_grid->RowCnt);
?>
	<?php if ($patient_document->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_document->id->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_document" data-field="x_id" name="o<?php echo $patient_document_grid->RowIndex ?>_id" id="o<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_id" class="form-group patient_document_id">
<span<?php echo $patient_document->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_id" name="x<?php echo $patient_document_grid->RowIndex ?>_id" id="x<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_id" class="patient_document_id">
<span<?php echo $patient_document->id->viewAttributes() ?>>
<?php echo $patient_document->id->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_id" name="x<?php echo $patient_document_grid->RowIndex ?>_id" id="x<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_id" name="o<?php echo $patient_document_grid->RowIndex ?>_id" id="o<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_id" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_id" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_id" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_id" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $patient_document->patient_id->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_document->patient_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_patient_id" class="form-group patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_patient_id" class="form-group patient_document_patient_id">
<input type="text" data-table="patient_document" data-field="x_patient_id" name="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_document->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_document->patient_id->EditValue ?>"<?php echo $patient_document->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="o<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_patient_id" class="form-group patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->patient_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_patient_id" class="patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<?php echo $patient_document->patient_id->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="o<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName"<?php echo $patient_document->DocumentName->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_DocumentName" class="form-group patient_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_DocumentName" data-value-separator="<?php echo $patient_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName"<?php echo $patient_document->DocumentName->editAttributes() ?>>
		<?php echo $patient_document->DocumentName->selectOptionListHtml("x<?php echo $patient_document_grid->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$patient_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_document->DocumentName->caption() ?>" data-title="<?php echo $patient_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_document->DocumentName->Lookup->getParamTag("p_x" . $patient_document_grid->RowIndex . "_DocumentName") ?>
</span>
<input type="hidden" data-table="patient_document" data-field="x_DocumentName" name="o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($patient_document->DocumentName->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_DocumentName" class="form-group patient_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_DocumentName" data-value-separator="<?php echo $patient_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName"<?php echo $patient_document->DocumentName->editAttributes() ?>>
		<?php echo $patient_document->DocumentName->selectOptionListHtml("x<?php echo $patient_document_grid->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$patient_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_document->DocumentName->caption() ?>" data-title="<?php echo $patient_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_document->DocumentName->Lookup->getParamTag("p_x" . $patient_document_grid->RowIndex . "_DocumentName") ?>
</span>
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_DocumentName" class="patient_document_DocumentName">
<span<?php echo $patient_document->DocumentName->viewAttributes() ?>>
<?php echo $patient_document->DocumentName->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_DocumentName" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($patient_document->DocumentName->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_DocumentName" name="o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($patient_document->DocumentName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_DocumentName" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($patient_document->DocumentName->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_DocumentName" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($patient_document->DocumentName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_document->status->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_status" class="form-group patient_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_status" data-value-separator="<?php echo $patient_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_document_grid->RowIndex ?>_status" name="x<?php echo $patient_document_grid->RowIndex ?>_status"<?php echo $patient_document->status->editAttributes() ?>>
		<?php echo $patient_document->status->selectOptionListHtml("x<?php echo $patient_document_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_document->status->Lookup->getParamTag("p_x" . $patient_document_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_document" data-field="x_status" name="o<?php echo $patient_document_grid->RowIndex ?>_status" id="o<?php echo $patient_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_document->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_status" class="form-group patient_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_status" data-value-separator="<?php echo $patient_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_document_grid->RowIndex ?>_status" name="x<?php echo $patient_document_grid->RowIndex ?>_status"<?php echo $patient_document->status->editAttributes() ?>>
		<?php echo $patient_document->status->selectOptionListHtml("x<?php echo $patient_document_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_document->status->Lookup->getParamTag("p_x" . $patient_document_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_status" class="patient_document_status">
<span<?php echo $patient_document->status->viewAttributes() ?>>
<?php echo $patient_document->status->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_status" name="x<?php echo $patient_document_grid->RowIndex ?>_status" id="x<?php echo $patient_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_document->status->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_status" name="o<?php echo $patient_document_grid->RowIndex ?>_status" id="o<?php echo $patient_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_document->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_status" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_status" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_document->status->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_status" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_status" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_document->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_document->createdby->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_document" data-field="x_createdby" name="o<?php echo $patient_document_grid->RowIndex ?>_createdby" id="o<?php echo $patient_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_document->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_createdby" class="patient_document_createdby">
<span<?php echo $patient_document->createdby->viewAttributes() ?>>
<?php echo $patient_document->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_createdby" name="x<?php echo $patient_document_grid->RowIndex ?>_createdby" id="x<?php echo $patient_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_document->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_createdby" name="o<?php echo $patient_document_grid->RowIndex ?>_createdby" id="o<?php echo $patient_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_document->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_createdby" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_createdby" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_document->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_createdby" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_createdby" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_document->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_document->createddatetime->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_document" data-field="x_createddatetime" name="o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_document->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_createddatetime" class="patient_document_createddatetime">
<span<?php echo $patient_document->createddatetime->viewAttributes() ?>>
<?php echo $patient_document->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_createddatetime" name="x<?php echo $patient_document_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_document->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_createddatetime" name="o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_document->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_createddatetime" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_createddatetime" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_document->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_createddatetime" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_document->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_document->modifiedby->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_document" data-field="x_modifiedby" name="o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_document->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_modifiedby" class="patient_document_modifiedby">
<span<?php echo $patient_document->modifiedby->viewAttributes() ?>>
<?php echo $patient_document->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_modifiedby" name="x<?php echo $patient_document_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_document->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_modifiedby" name="o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_document->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_modifiedby" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_modifiedby" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_document->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_modifiedby" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_document->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_document->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_document" data-field="x_modifieddatetime" name="o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_document->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_modifieddatetime" class="patient_document_modifieddatetime">
<span<?php echo $patient_document->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_document->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_modifieddatetime" name="x<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_document->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_modifieddatetime" name="o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_document->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_modifieddatetime" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_document->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_modifieddatetime" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_document->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber"<?php echo $patient_document->DocumentNumber->cellAttributes() ?>>
<?php if ($patient_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_DocumentNumber" class="form-group patient_document_DocumentNumber">
<input type="text" data-table="patient_document" data-field="x_DocumentNumber" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $patient_document->DocumentNumber->EditValue ?>"<?php echo $patient_document->DocumentNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_document" data-field="x_DocumentNumber" name="o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($patient_document->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_DocumentNumber" class="form-group patient_document_DocumentNumber">
<input type="text" data-table="patient_document" data-field="x_DocumentNumber" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $patient_document->DocumentNumber->EditValue ?>"<?php echo $patient_document->DocumentNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_document_grid->RowCnt ?>_patient_document_DocumentNumber" class="patient_document_DocumentNumber">
<span<?php echo $patient_document->DocumentNumber->viewAttributes() ?>>
<?php echo $patient_document->DocumentNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_document->isConfirm()) { ?>
<input type="hidden" data-table="patient_document" data-field="x_DocumentNumber" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($patient_document->DocumentNumber->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_DocumentNumber" name="o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($patient_document->DocumentNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_document" data-field="x_DocumentNumber" name="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="fpatient_documentgrid$x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($patient_document->DocumentNumber->FormValue) ?>">
<input type="hidden" data-table="patient_document" data-field="x_DocumentNumber" name="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="fpatient_documentgrid$o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($patient_document->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_document_grid->ListOptions->render("body", "right", $patient_document_grid->RowCnt);
?>
	</tr>
<?php if ($patient_document->RowType == ROWTYPE_ADD || $patient_document->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_documentgrid.updateLists(<?php echo $patient_document_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_document->isGridAdd() || $patient_document->CurrentMode == "copy")
		if (!$patient_document_grid->Recordset->EOF)
			$patient_document_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_document->CurrentMode == "add" || $patient_document->CurrentMode == "copy" || $patient_document->CurrentMode == "edit") {
		$patient_document_grid->RowIndex = '$rowindex$';
		$patient_document_grid->loadRowValues();

		// Set row properties
		$patient_document->resetAttributes();
		$patient_document->RowAttrs = array_merge($patient_document->RowAttrs, array('data-rowindex'=>$patient_document_grid->RowIndex, 'id'=>'r0_patient_document', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_document->RowAttrs["class"], "ew-template");
		$patient_document->RowType = ROWTYPE_ADD;

		// Render row
		$patient_document_grid->renderRow();

		// Render list options
		$patient_document_grid->renderListOptions();
		$patient_document_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_document_grid->ListOptions->render("body", "left", $patient_document_grid->RowIndex);
?>
	<?php if ($patient_document->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_document_id" class="form-group patient_document_id">
<span<?php echo $patient_document->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_id" name="x<?php echo $patient_document_grid->RowIndex ?>_id" id="x<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_id" name="o<?php echo $patient_document_grid->RowIndex ?>_id" id="o<?php echo $patient_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_document->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$patient_document->isConfirm()) { ?>
<?php if ($patient_document->patient_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_document_patient_id" class="form-group patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" name="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_document_patient_id" class="form-group patient_document_patient_id">
<input type="text" data-table="patient_document" data-field="x_patient_id" name="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($patient_document->patient_id->getPlaceHolder()) ?>" value="<?php echo $patient_document->patient_id->EditValue ?>"<?php echo $patient_document->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_document_patient_id" class="form-group patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="x<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_patient_id" name="o<?php echo $patient_document_grid->RowIndex ?>_patient_id" id="o<?php echo $patient_document_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($patient_document->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName">
<?php if (!$patient_document->isConfirm()) { ?>
<span id="el$rowindex$_patient_document_DocumentName" class="form-group patient_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_DocumentName" data-value-separator="<?php echo $patient_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName"<?php echo $patient_document->DocumentName->editAttributes() ?>>
		<?php echo $patient_document->DocumentName->selectOptionListHtml("x<?php echo $patient_document_grid->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$patient_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_document->DocumentName->caption() ?>" data-title="<?php echo $patient_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_document->DocumentName->Lookup->getParamTag("p_x" . $patient_document_grid->RowIndex . "_DocumentName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_document_DocumentName" class="form-group patient_document_DocumentName">
<span<?php echo $patient_document->DocumentName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->DocumentName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_DocumentName" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($patient_document->DocumentName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_DocumentName" name="o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $patient_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($patient_document->DocumentName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_document->isConfirm()) { ?>
<span id="el$rowindex$_patient_document_status" class="form-group patient_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_document" data-field="x_status" data-value-separator="<?php echo $patient_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_document_grid->RowIndex ?>_status" name="x<?php echo $patient_document_grid->RowIndex ?>_status"<?php echo $patient_document->status->editAttributes() ?>>
		<?php echo $patient_document->status->selectOptionListHtml("x<?php echo $patient_document_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $patient_document->status->Lookup->getParamTag("p_x" . $patient_document_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_document_status" class="form-group patient_document_status">
<span<?php echo $patient_document->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_status" name="x<?php echo $patient_document_grid->RowIndex ?>_status" id="x<?php echo $patient_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_document->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_status" name="o<?php echo $patient_document_grid->RowIndex ?>_status" id="o<?php echo $patient_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_document->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_document_createdby" class="form-group patient_document_createdby">
<span<?php echo $patient_document->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_createdby" name="x<?php echo $patient_document_grid->RowIndex ?>_createdby" id="x<?php echo $patient_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_document->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_createdby" name="o<?php echo $patient_document_grid->RowIndex ?>_createdby" id="o<?php echo $patient_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_document->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_document_createddatetime" class="form-group patient_document_createddatetime">
<span<?php echo $patient_document->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_createddatetime" name="x<?php echo $patient_document_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_document->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_createddatetime" name="o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_document->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_document_modifiedby" class="form-group patient_document_modifiedby">
<span<?php echo $patient_document->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_modifiedby" name="x<?php echo $patient_document_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_document->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_modifiedby" name="o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_document->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_document_modifieddatetime" class="form-group patient_document_modifieddatetime">
<span<?php echo $patient_document->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_modifieddatetime" name="x<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_document->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_modifieddatetime" name="o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_document->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber">
<?php if (!$patient_document->isConfirm()) { ?>
<span id="el$rowindex$_patient_document_DocumentNumber" class="form-group patient_document_DocumentNumber">
<input type="text" data-table="patient_document" data-field="x_DocumentNumber" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $patient_document->DocumentNumber->EditValue ?>"<?php echo $patient_document->DocumentNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_document_DocumentNumber" class="form-group patient_document_DocumentNumber">
<span<?php echo $patient_document->DocumentNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_document->DocumentNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_document" data-field="x_DocumentNumber" name="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($patient_document->DocumentNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_document" data-field="x_DocumentNumber" name="o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $patient_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($patient_document->DocumentNumber->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_document_grid->ListOptions->render("body", "right", $patient_document_grid->RowIndex);
?>
<script>
fpatient_documentgrid.updateLists(<?php echo $patient_document_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_document->CurrentMode == "add" || $patient_document->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_document_grid->FormKeyCountName ?>" id="<?php echo $patient_document_grid->FormKeyCountName ?>" value="<?php echo $patient_document_grid->KeyCount ?>">
<?php echo $patient_document_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_document->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_document_grid->FormKeyCountName ?>" id="<?php echo $patient_document_grid->FormKeyCountName ?>" value="<?php echo $patient_document_grid->KeyCount ?>">
<?php echo $patient_document_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_document->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_documentgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_document_grid->Recordset)
	$patient_document_grid->Recordset->Close();
?>
</div>
<?php if ($patient_document_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_document_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_document_grid->TotalRecs == 0 && !$patient_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_document_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_document_grid->terminate();
?>
<?php if (!$patient_document->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_document", "95%", "");
</script>
<?php } ?>