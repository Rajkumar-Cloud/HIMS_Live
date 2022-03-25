<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($employee_document_grid))
	$employee_document_grid = new employee_document_grid();

// Run the page
$employee_document_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_document_grid->Page_Render();
?>
<?php if (!$employee_document_grid->isExport()) { ?>
<script>
var femployee_documentgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	femployee_documentgrid = new ew.Form("femployee_documentgrid", "grid");
	femployee_documentgrid.formKeyCountName = '<?php echo $employee_document_grid->FormKeyCountName ?>';

	// Validate form
	femployee_documentgrid.validate = function() {
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
			<?php if ($employee_document_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->id->caption(), $employee_document_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_grid->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->employee_id->caption(), $employee_document_grid->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_document_grid->employee_id->errorMessage()) ?>");
			<?php if ($employee_document_grid->DocumentName->Required) { ?>
				elm = this.getElements("x" + infix + "_DocumentName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->DocumentName->caption(), $employee_document_grid->DocumentName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_grid->DocumentNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_DocumentNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->DocumentNumber->caption(), $employee_document_grid->DocumentNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->status->caption(), $employee_document_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->createdby->caption(), $employee_document_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->createddatetime->caption(), $employee_document_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->modifiedby->caption(), $employee_document_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_document_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document_grid->modifieddatetime->caption(), $employee_document_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	femployee_documentgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "DocumentName", false)) return false;
		if (ew.valueChanged(fobj, infix, "DocumentNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployee_documentgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_documentgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_documentgrid.lists["x_DocumentName"] = <?php echo $employee_document_grid->DocumentName->Lookup->toClientList($employee_document_grid) ?>;
	femployee_documentgrid.lists["x_DocumentName"].options = <?php echo JsonEncode($employee_document_grid->DocumentName->lookupOptions()) ?>;
	femployee_documentgrid.lists["x_status"] = <?php echo $employee_document_grid->status->Lookup->toClientList($employee_document_grid) ?>;
	femployee_documentgrid.lists["x_status"].options = <?php echo JsonEncode($employee_document_grid->status->lookupOptions()) ?>;
	loadjs.done("femployee_documentgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$employee_document_grid->renderOtherOptions();
?>
<?php if ($employee_document_grid->TotalRecords > 0 || $employee_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_document_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_document">
<?php if ($employee_document_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $employee_document_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_documentgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_document" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_documentgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_document->RowType = ROWTYPE_HEADER;

// Render list options
$employee_document_grid->renderListOptions();

// Render list options (header, left)
$employee_document_grid->ListOptions->render("header", "left");
?>
<?php if ($employee_document_grid->id->Visible) { // id ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_document_grid->id->headerCellClass() ?>"><div id="elh_employee_document_id" class="employee_document_id"><div class="ew-table-header-caption"><?php echo $employee_document_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_document_grid->id->headerCellClass() ?>"><div><div id="elh_employee_document_id" class="employee_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_document_grid->employee_id->headerCellClass() ?>"><div id="elh_employee_document_employee_id" class="employee_document_employee_id"><div class="ew-table-header-caption"><?php echo $employee_document_grid->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_document_grid->employee_id->headerCellClass() ?>"><div><div id="elh_employee_document_employee_id" class="employee_document_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->employee_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->employee_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->DocumentName->Visible) { // DocumentName ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->DocumentName) == "") { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document_grid->DocumentName->headerCellClass() ?>"><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName"><div class="ew-table-header-caption"><?php echo $employee_document_grid->DocumentName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document_grid->DocumentName->headerCellClass() ?>"><div><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->DocumentName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->DocumentName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->DocumentNumber) == "") { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document_grid->DocumentNumber->headerCellClass() ?>"><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber"><div class="ew-table-header-caption"><?php echo $employee_document_grid->DocumentNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document_grid->DocumentNumber->headerCellClass() ?>"><div><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->DocumentNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->DocumentNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->DocumentNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->status->Visible) { // status ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_document_grid->status->headerCellClass() ?>"><div id="elh_employee_document_status" class="employee_document_status"><div class="ew-table-header-caption"><?php echo $employee_document_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_document_grid->status->headerCellClass() ?>"><div><div id="elh_employee_document_status" class="employee_document_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->createdby->Visible) { // createdby ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $employee_document_grid->createdby->headerCellClass() ?>"><div id="elh_employee_document_createdby" class="employee_document_createdby"><div class="ew-table-header-caption"><?php echo $employee_document_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $employee_document_grid->createdby->headerCellClass() ?>"><div><div id="elh_employee_document_createdby" class="employee_document_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document_grid->createddatetime->headerCellClass() ?>"><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime"><div class="ew-table-header-caption"><?php echo $employee_document_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document_grid->modifiedby->headerCellClass() ?>"><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby"><div class="ew-table-header-caption"><?php echo $employee_document_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($employee_document_grid->SortUrl($employee_document_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime"><div class="ew-table-header-caption"><?php echo $employee_document_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_document_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_document_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$employee_document_grid->StartRecord = 1;
$employee_document_grid->StopRecord = $employee_document_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($employee_document->isConfirm() || $employee_document_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_document_grid->FormKeyCountName) && ($employee_document_grid->isGridAdd() || $employee_document_grid->isGridEdit() || $employee_document->isConfirm())) {
		$employee_document_grid->KeyCount = $CurrentForm->getValue($employee_document_grid->FormKeyCountName);
		$employee_document_grid->StopRecord = $employee_document_grid->StartRecord + $employee_document_grid->KeyCount - 1;
	}
}
$employee_document_grid->RecordCount = $employee_document_grid->StartRecord - 1;
if ($employee_document_grid->Recordset && !$employee_document_grid->Recordset->EOF) {
	$employee_document_grid->Recordset->moveFirst();
	$selectLimit = $employee_document_grid->UseSelectLimit;
	if (!$selectLimit && $employee_document_grid->StartRecord > 1)
		$employee_document_grid->Recordset->move($employee_document_grid->StartRecord - 1);
} elseif (!$employee_document->AllowAddDeleteRow && $employee_document_grid->StopRecord == 0) {
	$employee_document_grid->StopRecord = $employee_document->GridAddRowCount;
}

// Initialize aggregate
$employee_document->RowType = ROWTYPE_AGGREGATEINIT;
$employee_document->resetAttributes();
$employee_document_grid->renderRow();
if ($employee_document_grid->isGridAdd())
	$employee_document_grid->RowIndex = 0;
if ($employee_document_grid->isGridEdit())
	$employee_document_grid->RowIndex = 0;
while ($employee_document_grid->RecordCount < $employee_document_grid->StopRecord) {
	$employee_document_grid->RecordCount++;
	if ($employee_document_grid->RecordCount >= $employee_document_grid->StartRecord) {
		$employee_document_grid->RowCount++;
		if ($employee_document_grid->isGridAdd() || $employee_document_grid->isGridEdit() || $employee_document->isConfirm()) {
			$employee_document_grid->RowIndex++;
			$CurrentForm->Index = $employee_document_grid->RowIndex;
			if ($CurrentForm->hasValue($employee_document_grid->FormActionName) && ($employee_document->isConfirm() || $employee_document_grid->EventCancelled))
				$employee_document_grid->RowAction = strval($CurrentForm->getValue($employee_document_grid->FormActionName));
			elseif ($employee_document_grid->isGridAdd())
				$employee_document_grid->RowAction = "insert";
			else
				$employee_document_grid->RowAction = "";
		}

		// Set up key count
		$employee_document_grid->KeyCount = $employee_document_grid->RowIndex;

		// Init row class and style
		$employee_document->resetAttributes();
		$employee_document->CssClass = "";
		if ($employee_document_grid->isGridAdd()) {
			if ($employee_document->CurrentMode == "copy") {
				$employee_document_grid->loadRowValues($employee_document_grid->Recordset); // Load row values
				$employee_document_grid->setRecordKey($employee_document_grid->RowOldKey, $employee_document_grid->Recordset); // Set old record key
			} else {
				$employee_document_grid->loadRowValues(); // Load default values
				$employee_document_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$employee_document_grid->loadRowValues($employee_document_grid->Recordset); // Load row values
		}
		$employee_document->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_document_grid->isGridAdd()) // Grid add
			$employee_document->RowType = ROWTYPE_ADD; // Render add
		if ($employee_document_grid->isGridAdd() && $employee_document->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values
		if ($employee_document_grid->isGridEdit()) { // Grid edit
			if ($employee_document->EventCancelled)
				$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values
			if ($employee_document_grid->RowAction == "insert")
				$employee_document->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_document->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_document_grid->isGridEdit() && ($employee_document->RowType == ROWTYPE_EDIT || $employee_document->RowType == ROWTYPE_ADD) && $employee_document->EventCancelled) // Update failed
			$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values
		if ($employee_document->RowType == ROWTYPE_EDIT) // Edit row
			$employee_document_grid->EditRowCount++;
		if ($employee_document->isConfirm()) // Confirm row
			$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$employee_document->RowAttrs->merge(["data-rowindex" => $employee_document_grid->RowCount, "id" => "r" . $employee_document_grid->RowCount . "_employee_document", "data-rowtype" => $employee_document->RowType]);

		// Render row
		$employee_document_grid->renderRow();

		// Render list options
		$employee_document_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_document_grid->RowAction != "delete" && $employee_document_grid->RowAction != "insertdelete" && !($employee_document_grid->RowAction == "insert" && $employee_document->isConfirm() && $employee_document_grid->emptyRow())) {
?>
	<tr <?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_grid->ListOptions->render("body", "left", $employee_document_grid->RowCount);
?>
	<?php if ($employee_document_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_document_grid->id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_id" class="form-group"></span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_grid->RowIndex ?>_id" id="o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_id" class="form-group">
<span<?php echo $employee_document_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_grid->RowIndex ?>_id" id="x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_id">
<span<?php echo $employee_document_grid->id->viewAttributes() ?>><?php echo $employee_document_grid->id->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_grid->RowIndex ?>_id" id="x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_grid->RowIndex ?>_id" id="o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_id" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_id" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_id" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id" <?php echo $employee_document_grid->employee_id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_document_grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_employee_id" class="form-group">
<span<?php echo $employee_document_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_employee_id" class="form-group">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document_grid->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document_grid->employee_id->EditValue ?>"<?php echo $employee_document_grid->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_document_grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_employee_id" class="form-group">
<span<?php echo $employee_document_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_employee_id" class="form-group">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document_grid->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document_grid->employee_id->EditValue ?>"<?php echo $employee_document_grid->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_employee_id">
<span<?php echo $employee_document_grid->employee_id->viewAttributes() ?>><?php echo $employee_document_grid->employee_id->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName" <?php echo $employee_document_grid->DocumentName->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_DocumentName" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document_grid->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName"<?php echo $employee_document_grid->DocumentName->editAttributes() ?>>
			<?php echo $employee_document_grid->DocumentName->selectOptionListHtml("x{$employee_document_grid->RowIndex}_DocumentName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document_grid->DocumentName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document_grid->DocumentName->caption() ?>" data-title="<?php echo $employee_document_grid->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_document_grid->DocumentName->Lookup->getParamTag($employee_document_grid, "p_x" . $employee_document_grid->RowIndex . "_DocumentName") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_grid->DocumentName->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_DocumentName" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document_grid->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName"<?php echo $employee_document_grid->DocumentName->editAttributes() ?>>
			<?php echo $employee_document_grid->DocumentName->selectOptionListHtml("x{$employee_document_grid->RowIndex}_DocumentName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document_grid->DocumentName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document_grid->DocumentName->caption() ?>" data-title="<?php echo $employee_document_grid->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_document_grid->DocumentName->Lookup->getParamTag($employee_document_grid, "p_x" . $employee_document_grid->RowIndex . "_DocumentName") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_DocumentName">
<span<?php echo $employee_document_grid->DocumentName->viewAttributes() ?>><?php echo $employee_document_grid->DocumentName->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_grid->DocumentName->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_grid->DocumentName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_grid->DocumentName->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_grid->DocumentName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber" <?php echo $employee_document_grid->DocumentNumber->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_DocumentNumber" class="form-group">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document_grid->DocumentNumber->EditValue ?>"<?php echo $employee_document_grid->DocumentNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_DocumentNumber" class="form-group">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document_grid->DocumentNumber->EditValue ?>"<?php echo $employee_document_grid->DocumentNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_DocumentNumber">
<span<?php echo $employee_document_grid->DocumentNumber->viewAttributes() ?>><?php echo $employee_document_grid->DocumentNumber->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_document_grid->status->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status"<?php echo $employee_document_grid->status->editAttributes() ?>>
			<?php echo $employee_document_grid->status->selectOptionListHtml("x{$employee_document_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_document_grid->status->Lookup->getParamTag($employee_document_grid, "p_x" . $employee_document_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_grid->RowIndex ?>_status" id="o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status"<?php echo $employee_document_grid->status->editAttributes() ?>>
			<?php echo $employee_document_grid->status->selectOptionListHtml("x{$employee_document_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_document_grid->status->Lookup->getParamTag($employee_document_grid, "p_x" . $employee_document_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_status">
<span<?php echo $employee_document_grid->status->viewAttributes() ?>><?php echo $employee_document_grid->status->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status" id="x<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_grid->RowIndex ?>_status" id="o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_status" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_status" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_status" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_status" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $employee_document_grid->createdby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_createdby">
<span<?php echo $employee_document_grid->createdby->viewAttributes() ?>><?php echo $employee_document_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="x<?php echo $employee_document_grid->RowIndex ?>_createdby" id="x<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createdby" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $employee_document_grid->createddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_createddatetime">
<span<?php echo $employee_document_grid->createddatetime->viewAttributes() ?>><?php echo $employee_document_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $employee_document_grid->modifiedby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_modifiedby">
<span<?php echo $employee_document_grid->modifiedby->viewAttributes() ?>><?php echo $employee_document_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $employee_document_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCount ?>_employee_document_modifieddatetime">
<span<?php echo $employee_document_grid->modifieddatetime->viewAttributes() ?>><?php echo $employee_document_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_grid->ListOptions->render("body", "right", $employee_document_grid->RowCount);
?>
	</tr>
<?php if ($employee_document->RowType == ROWTYPE_ADD || $employee_document->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_documentgrid", "load"], function() {
	femployee_documentgrid.updateLists(<?php echo $employee_document_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_document_grid->isGridAdd() || $employee_document->CurrentMode == "copy")
		if (!$employee_document_grid->Recordset->EOF)
			$employee_document_grid->Recordset->moveNext();
}
?>
<?php
	if ($employee_document->CurrentMode == "add" || $employee_document->CurrentMode == "copy" || $employee_document->CurrentMode == "edit") {
		$employee_document_grid->RowIndex = '$rowindex$';
		$employee_document_grid->loadRowValues();

		// Set row properties
		$employee_document->resetAttributes();
		$employee_document->RowAttrs->merge(["data-rowindex" => $employee_document_grid->RowIndex, "id" => "r0_employee_document", "data-rowtype" => ROWTYPE_ADD]);
		$employee_document->RowAttrs->appendClass("ew-template");
		$employee_document->RowType = ROWTYPE_ADD;

		// Render row
		$employee_document_grid->renderRow();

		// Render list options
		$employee_document_grid->renderListOptions();
		$employee_document_grid->StartRowCount = 0;
?>
	<tr <?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_grid->ListOptions->render("body", "left", $employee_document_grid->RowIndex);
?>
	<?php if ($employee_document_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_id" class="form-group employee_document_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_id" class="form-group employee_document_id">
<span<?php echo $employee_document_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_grid->RowIndex ?>_id" id="x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_grid->RowIndex ?>_id" id="o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if (!$employee_document->isConfirm()) { ?>
<?php if ($employee_document_grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document_grid->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document_grid->employee_id->EditValue ?>"<?php echo $employee_document_grid->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document_grid->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document_grid->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName"<?php echo $employee_document_grid->DocumentName->editAttributes() ?>>
			<?php echo $employee_document_grid->DocumentName->selectOptionListHtml("x{$employee_document_grid->RowIndex}_DocumentName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document_grid->DocumentName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document_grid->DocumentName->caption() ?>" data-title="<?php echo $employee_document_grid->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_document_grid->DocumentName->Lookup->getParamTag($employee_document_grid, "p_x" . $employee_document_grid->RowIndex . "_DocumentName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<span<?php echo $employee_document_grid->DocumentName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->DocumentName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_grid->DocumentName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document_grid->DocumentName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document_grid->DocumentNumber->EditValue ?>"<?php echo $employee_document_grid->DocumentNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<span<?php echo $employee_document_grid->DocumentNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->DocumentNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document_grid->DocumentNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status"<?php echo $employee_document_grid->status->editAttributes() ?>>
			<?php echo $employee_document_grid->status->selectOptionListHtml("x{$employee_document_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_document_grid->status->Lookup->getParamTag($employee_document_grid, "p_x" . $employee_document_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
<span<?php echo $employee_document_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status" id="x<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_grid->RowIndex ?>_status" id="o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_createdby" class="form-group employee_document_createdby">
<span<?php echo $employee_document_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="x<?php echo $employee_document_grid->RowIndex ?>_createdby" id="x<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_createddatetime" class="form-group employee_document_createddatetime">
<span<?php echo $employee_document_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_modifiedby" class="form-group employee_document_modifiedby">
<span<?php echo $employee_document_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_modifieddatetime" class="form-group employee_document_modifieddatetime">
<span<?php echo $employee_document_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_document_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_grid->ListOptions->render("body", "right", $employee_document_grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_documentgrid", "load"], function() {
	femployee_documentgrid.updateLists(<?php echo $employee_document_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($employee_document->CurrentMode == "add" || $employee_document->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $employee_document_grid->FormKeyCountName ?>" id="<?php echo $employee_document_grid->FormKeyCountName ?>" value="<?php echo $employee_document_grid->KeyCount ?>">
<?php echo $employee_document_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_document->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $employee_document_grid->FormKeyCountName ?>" id="<?php echo $employee_document_grid->FormKeyCountName ?>" value="<?php echo $employee_document_grid->KeyCount ?>">
<?php echo $employee_document_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_document->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="femployee_documentgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_document_grid->Recordset)
	$employee_document_grid->Recordset->Close();
?>
<?php if ($employee_document_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $employee_document_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_document_grid->TotalRecords == 0 && !$employee_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_document_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$employee_document_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee_document->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee_document",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$employee_document_grid->terminate();
?>