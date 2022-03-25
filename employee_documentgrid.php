<?php
namespace PHPMaker2019\HIMS;

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
<?php if (!$employee_document->isExport()) { ?>
<script>

// Form object
var femployee_documentgrid = new ew.Form("femployee_documentgrid", "grid");
femployee_documentgrid.formKeyCountName = '<?php echo $employee_document_grid->FormKeyCountName ?>';

// Validate form
femployee_documentgrid.validate = function() {
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
		<?php if ($employee_document_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->id->caption(), $employee_document->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->employee_id->caption(), $employee_document->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_document->employee_id->errorMessage()) ?>");
		<?php if ($employee_document_grid->DocumentName->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->DocumentName->caption(), $employee_document->DocumentName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->DocumentNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_DocumentNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->DocumentNumber->caption(), $employee_document->DocumentNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->status->caption(), $employee_document->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->createdby->caption(), $employee_document->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->createddatetime->caption(), $employee_document->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->modifiedby->caption(), $employee_document->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->modifieddatetime->caption(), $employee_document->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_document_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_document->HospID->caption(), $employee_document->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_document->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
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
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_documentgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_documentgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_documentgrid.lists["x_DocumentName"] = <?php echo $employee_document_grid->DocumentName->Lookup->toClientList() ?>;
femployee_documentgrid.lists["x_DocumentName"].options = <?php echo JsonEncode($employee_document_grid->DocumentName->lookupOptions()) ?>;
femployee_documentgrid.lists["x_status"] = <?php echo $employee_document_grid->status->Lookup->toClientList() ?>;
femployee_documentgrid.lists["x_status"].options = <?php echo JsonEncode($employee_document_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$employee_document_grid->renderOtherOptions();
?>
<?php $employee_document_grid->showPageHeader(); ?>
<?php
$employee_document_grid->showMessage();
?>
<?php if ($employee_document_grid->TotalRecs > 0 || $employee_document->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_document_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_document">
<?php if ($employee_document_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $employee_document_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_documentgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_document" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_documentgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_document_grid->RowType = ROWTYPE_HEADER;

// Render list options
$employee_document_grid->renderListOptions();

// Render list options (header, left)
$employee_document_grid->ListOptions->render("header", "left");
?>
<?php if ($employee_document->id->Visible) { // id ?>
	<?php if ($employee_document->sortUrl($employee_document->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_document->id->headerCellClass() ?>"><div id="elh_employee_document_id" class="employee_document_id"><div class="ew-table-header-caption"><?php echo $employee_document->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_document->id->headerCellClass() ?>"><div><div id="elh_employee_document_id" class="employee_document_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_document->sortUrl($employee_document->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_document->employee_id->headerCellClass() ?>"><div id="elh_employee_document_employee_id" class="employee_document_employee_id"><div class="ew-table-header-caption"><?php echo $employee_document->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_document->employee_id->headerCellClass() ?>"><div><div id="elh_employee_document_employee_id" class="employee_document_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
	<?php if ($employee_document->sortUrl($employee_document->DocumentName) == "") { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document->DocumentName->headerCellClass() ?>"><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName"><div class="ew-table-header-caption"><?php echo $employee_document->DocumentName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentName" class="<?php echo $employee_document->DocumentName->headerCellClass() ?>"><div><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->DocumentName->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->DocumentName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->DocumentName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
	<?php if ($employee_document->sortUrl($employee_document->DocumentNumber) == "") { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document->DocumentNumber->headerCellClass() ?>"><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber"><div class="ew-table-header-caption"><?php echo $employee_document->DocumentNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DocumentNumber" class="<?php echo $employee_document->DocumentNumber->headerCellClass() ?>"><div><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->DocumentNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->DocumentNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->DocumentNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
	<?php if ($employee_document->sortUrl($employee_document->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_document->status->headerCellClass() ?>"><div id="elh_employee_document_status" class="employee_document_status"><div class="ew-table-header-caption"><?php echo $employee_document->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_document->status->headerCellClass() ?>"><div><div id="elh_employee_document_status" class="employee_document_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->createdby->Visible) { // createdby ?>
	<?php if ($employee_document->sortUrl($employee_document->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $employee_document->createdby->headerCellClass() ?>"><div id="elh_employee_document_createdby" class="employee_document_createdby"><div class="ew-table-header-caption"><?php echo $employee_document->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $employee_document->createdby->headerCellClass() ?>"><div><div id="elh_employee_document_createdby" class="employee_document_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
	<?php if ($employee_document->sortUrl($employee_document->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document->createddatetime->headerCellClass() ?>"><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime"><div class="ew-table-header-caption"><?php echo $employee_document->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $employee_document->createddatetime->headerCellClass() ?>"><div><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
	<?php if ($employee_document->sortUrl($employee_document->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document->modifiedby->headerCellClass() ?>"><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby"><div class="ew-table-header-caption"><?php echo $employee_document->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $employee_document->modifiedby->headerCellClass() ?>"><div><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($employee_document->sortUrl($employee_document->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document->modifieddatetime->headerCellClass() ?>"><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime"><div class="ew-table-header-caption"><?php echo $employee_document->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $employee_document->modifieddatetime->headerCellClass() ?>"><div><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
	<?php if ($employee_document->sortUrl($employee_document->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_document->HospID->headerCellClass() ?>"><div id="elh_employee_document_HospID" class="employee_document_HospID"><div class="ew-table-header-caption"><?php echo $employee_document->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_document->HospID->headerCellClass() ?>"><div><div id="elh_employee_document_HospID" class="employee_document_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_document->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_document->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_document->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
$employee_document_grid->StartRec = 1;
$employee_document_grid->StopRec = $employee_document_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $employee_document_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_document_grid->FormKeyCountName) && ($employee_document->isGridAdd() || $employee_document->isGridEdit() || $employee_document->isConfirm())) {
		$employee_document_grid->KeyCount = $CurrentForm->getValue($employee_document_grid->FormKeyCountName);
		$employee_document_grid->StopRec = $employee_document_grid->StartRec + $employee_document_grid->KeyCount - 1;
	}
}
$employee_document_grid->RecCnt = $employee_document_grid->StartRec - 1;
if ($employee_document_grid->Recordset && !$employee_document_grid->Recordset->EOF) {
	$employee_document_grid->Recordset->moveFirst();
	$selectLimit = $employee_document_grid->UseSelectLimit;
	if (!$selectLimit && $employee_document_grid->StartRec > 1)
		$employee_document_grid->Recordset->move($employee_document_grid->StartRec - 1);
} elseif (!$employee_document->AllowAddDeleteRow && $employee_document_grid->StopRec == 0) {
	$employee_document_grid->StopRec = $employee_document->GridAddRowCount;
}

// Initialize aggregate
$employee_document->RowType = ROWTYPE_AGGREGATEINIT;
$employee_document->resetAttributes();
$employee_document_grid->renderRow();
if ($employee_document->isGridAdd())
	$employee_document_grid->RowIndex = 0;
if ($employee_document->isGridEdit())
	$employee_document_grid->RowIndex = 0;
while ($employee_document_grid->RecCnt < $employee_document_grid->StopRec) {
	$employee_document_grid->RecCnt++;
	if ($employee_document_grid->RecCnt >= $employee_document_grid->StartRec) {
		$employee_document_grid->RowCnt++;
		if ($employee_document->isGridAdd() || $employee_document->isGridEdit() || $employee_document->isConfirm()) {
			$employee_document_grid->RowIndex++;
			$CurrentForm->Index = $employee_document_grid->RowIndex;
			if ($CurrentForm->hasValue($employee_document_grid->FormActionName) && $employee_document_grid->EventCancelled)
				$employee_document_grid->RowAction = strval($CurrentForm->getValue($employee_document_grid->FormActionName));
			elseif ($employee_document->isGridAdd())
				$employee_document_grid->RowAction = "insert";
			else
				$employee_document_grid->RowAction = "";
		}

		// Set up key count
		$employee_document_grid->KeyCount = $employee_document_grid->RowIndex;

		// Init row class and style
		$employee_document->resetAttributes();
		$employee_document->CssClass = "";
		if ($employee_document->isGridAdd()) {
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
		if ($employee_document->isGridAdd()) // Grid add
			$employee_document->RowType = ROWTYPE_ADD; // Render add
		if ($employee_document->isGridAdd() && $employee_document->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values
		if ($employee_document->isGridEdit()) { // Grid edit
			if ($employee_document->EventCancelled)
				$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values
			if ($employee_document_grid->RowAction == "insert")
				$employee_document->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_document->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_document->isGridEdit() && ($employee_document->RowType == ROWTYPE_EDIT || $employee_document->RowType == ROWTYPE_ADD) && $employee_document->EventCancelled) // Update failed
			$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values
		if ($employee_document->RowType == ROWTYPE_EDIT) // Edit row
			$employee_document_grid->EditRowCnt++;
		if ($employee_document->isConfirm()) // Confirm row
			$employee_document_grid->restoreCurrentRowFormValues($employee_document_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$employee_document->RowAttrs = array_merge($employee_document->RowAttrs, array('data-rowindex'=>$employee_document_grid->RowCnt, 'id'=>'r' . $employee_document_grid->RowCnt . '_employee_document', 'data-rowtype'=>$employee_document->RowType));

		// Render row
		$employee_document_grid->renderRow();

		// Render list options
		$employee_document_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_document_grid->RowAction <> "delete" && $employee_document_grid->RowAction <> "insertdelete" && !($employee_document_grid->RowAction == "insert" && $employee_document->isConfirm() && $employee_document_grid->emptyRow())) {
?>
	<tr<?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_grid->ListOptions->render("body", "left", $employee_document_grid->RowCnt);
?>
	<?php if ($employee_document->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_document->id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_grid->RowIndex ?>_id" id="o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_id" class="form-group employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_grid->RowIndex ?>_id" id="x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_id" class="employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<?php echo $employee_document->id->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_grid->RowIndex ?>_id" id="x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_grid->RowIndex ?>_id" id="o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_id" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_id" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_id" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_document->employee_id->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_document->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document->employee_id->EditValue ?>"<?php echo $employee_document->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_document->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document->employee_id->EditValue ?>"<?php echo $employee_document->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_employee_id" class="employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<?php echo $employee_document->employee_id->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName"<?php echo $employee_document->DocumentName->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName"<?php echo $employee_document->DocumentName->editAttributes() ?>>
		<?php echo $employee_document->DocumentName->selectOptionListHtml("x<?php echo $employee_document_grid->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document->DocumentName->caption() ?>" data-title="<?php echo $employee_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_document->DocumentName->Lookup->getParamTag("p_x" . $employee_document_grid->RowIndex . "_DocumentName") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName"<?php echo $employee_document->DocumentName->editAttributes() ?>>
		<?php echo $employee_document->DocumentName->selectOptionListHtml("x<?php echo $employee_document_grid->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document->DocumentName->caption() ?>" data-title="<?php echo $employee_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_document->DocumentName->Lookup->getParamTag("p_x" . $employee_document_grid->RowIndex . "_DocumentName") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_DocumentName" class="employee_document_DocumentName">
<span<?php echo $employee_document->DocumentName->viewAttributes() ?>>
<?php echo $employee_document->DocumentName->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber"<?php echo $employee_document->DocumentNumber->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document->DocumentNumber->EditValue ?>"<?php echo $employee_document->DocumentNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document->DocumentNumber->EditValue ?>"<?php echo $employee_document->DocumentNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
<span<?php echo $employee_document->DocumentNumber->viewAttributes() ?>>
<?php echo $employee_document->DocumentNumber->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_document->status->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status"<?php echo $employee_document->status->editAttributes() ?>>
		<?php echo $employee_document->status->selectOptionListHtml("x<?php echo $employee_document_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_document->status->Lookup->getParamTag("p_x" . $employee_document_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_grid->RowIndex ?>_status" id="o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status"<?php echo $employee_document->status->editAttributes() ?>>
		<?php echo $employee_document->status->selectOptionListHtml("x<?php echo $employee_document_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_document->status->Lookup->getParamTag("p_x" . $employee_document_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_status" class="employee_document_status">
<span<?php echo $employee_document->status->viewAttributes() ?>>
<?php echo $employee_document->status->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status" id="x<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_grid->RowIndex ?>_status" id="o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_status" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_status" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_status" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_status" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $employee_document->createdby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_createdby" class="employee_document_createdby">
<span<?php echo $employee_document->createdby->viewAttributes() ?>>
<?php echo $employee_document->createdby->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="x<?php echo $employee_document_grid->RowIndex ?>_createdby" id="x<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createdby" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $employee_document->createddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_createddatetime" class="employee_document_createddatetime">
<span<?php echo $employee_document->createddatetime->viewAttributes() ?>>
<?php echo $employee_document->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $employee_document->modifiedby->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_modifiedby" class="employee_document_modifiedby">
<span<?php echo $employee_document->modifiedby->viewAttributes() ?>>
<?php echo $employee_document->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $employee_document->modifieddatetime->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
<span<?php echo $employee_document->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_document->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_document->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_document->HospID->cellAttributes() ?>>
<?php if ($employee_document->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_HospID" class="form-group employee_document_HospID">
<input type="text" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_grid->RowIndex ?>_HospID" id="x<?php echo $employee_document_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_document->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_document->HospID->EditValue ?>"<?php echo $employee_document->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="o<?php echo $employee_document_grid->RowIndex ?>_HospID" id="o<?php echo $employee_document_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_HospID" class="form-group employee_document_HospID">
<input type="text" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_grid->RowIndex ?>_HospID" id="x<?php echo $employee_document_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_document->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_document->HospID->EditValue ?>"<?php echo $employee_document->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_document->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_document_grid->RowCnt ?>_employee_document_HospID" class="employee_document_HospID">
<span<?php echo $employee_document->HospID->viewAttributes() ?>>
<?php echo $employee_document->HospID->getViewValue() ?></span>
</span>
<?php if (!$employee_document->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_grid->RowIndex ?>_HospID" id="x<?php echo $employee_document_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="o<?php echo $employee_document_grid->RowIndex ?>_HospID" id="o<?php echo $employee_document_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_HospID" id="femployee_documentgrid$x<?php echo $employee_document_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_HospID" id="femployee_documentgrid$o<?php echo $employee_document_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_grid->ListOptions->render("body", "right", $employee_document_grid->RowCnt);
?>
	</tr>
<?php if ($employee_document->RowType == ROWTYPE_ADD || $employee_document->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_documentgrid.updateLists(<?php echo $employee_document_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_document->isGridAdd() || $employee_document->CurrentMode == "copy")
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
		$employee_document->RowAttrs = array_merge($employee_document->RowAttrs, array('data-rowindex'=>$employee_document_grid->RowIndex, 'id'=>'r0_employee_document', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_document->RowAttrs["class"], "ew-template");
		$employee_document->RowType = ROWTYPE_ADD;

		// Render row
		$employee_document_grid->renderRow();

		// Render list options
		$employee_document_grid->renderListOptions();
		$employee_document_grid->StartRowCnt = 0;
?>
	<tr<?php echo $employee_document->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_document_grid->ListOptions->render("body", "left", $employee_document_grid->RowIndex);
?>
	<?php if ($employee_document->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_id" class="form-group employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" name="x<?php echo $employee_document_grid->RowIndex ?>_id" id="x<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_id" name="o<?php echo $employee_document_grid->RowIndex ?>_id" id="o<?php echo $employee_document_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_document->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if (!$employee_document->isConfirm()) { ?>
<?php if ($employee_document->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="text" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_document->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_document->employee_id->EditValue ?>"<?php echo $employee_document->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" name="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_document_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_document->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
		<td data-name="DocumentName">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_DocumentName" data-value-separator="<?php echo $employee_document->DocumentName->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName"<?php echo $employee_document->DocumentName->editAttributes() ?>>
		<?php echo $employee_document->DocumentName->selectOptionListHtml("x<?php echo $employee_document_grid->RowIndex ?>_DocumentName") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$employee_document->DocumentName->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_document->DocumentName->caption() ?>" data-title="<?php echo $employee_document->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_document_grid->RowIndex ?>_DocumentName',url:'mas_documentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $employee_document->DocumentName->Lookup->getParamTag("p_x" . $employee_document_grid->RowIndex . "_DocumentName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<span<?php echo $employee_document->DocumentName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->DocumentName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentName" value="<?php echo HtmlEncode($employee_document->DocumentName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td data-name="DocumentNumber">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="text" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($employee_document->DocumentNumber->getPlaceHolder()) ?>" value="<?php echo $employee_document->DocumentNumber->EditValue ?>"<?php echo $employee_document->DocumentNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<span<?php echo $employee_document->DocumentNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->DocumentNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="x<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" name="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" id="o<?php echo $employee_document_grid->RowIndex ?>_DocumentNumber" value="<?php echo HtmlEncode($employee_document->DocumentNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_document" data-field="x_status" data-value-separator="<?php echo $employee_document->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_document_grid->RowIndex ?>_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status"<?php echo $employee_document->status->editAttributes() ?>>
		<?php echo $employee_document->status->selectOptionListHtml("x<?php echo $employee_document_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_document->status->Lookup->getParamTag("p_x" . $employee_document_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
<span<?php echo $employee_document->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" name="x<?php echo $employee_document_grid->RowIndex ?>_status" id="x<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_status" name="o<?php echo $employee_document_grid->RowIndex ?>_status" id="o<?php echo $employee_document_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_document->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_createdby" class="form-group employee_document_createdby">
<span<?php echo $employee_document->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="x<?php echo $employee_document_grid->RowIndex ?>_createdby" id="x<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" name="o<?php echo $employee_document_grid->RowIndex ?>_createdby" id="o<?php echo $employee_document_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($employee_document->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_createddatetime" class="form-group employee_document_createddatetime">
<span<?php echo $employee_document->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($employee_document->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_modifiedby" class="form-group employee_document_modifiedby">
<span<?php echo $employee_document->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="x<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" name="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" id="o<?php echo $employee_document_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($employee_document->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$employee_document->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_modifieddatetime" class="form-group employee_document_modifieddatetime">
<span<?php echo $employee_document->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" name="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $employee_document_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($employee_document->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_document->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$employee_document->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_HospID" class="form-group employee_document_HospID">
<input type="text" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_grid->RowIndex ?>_HospID" id="x<?php echo $employee_document_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_document->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_document->HospID->EditValue ?>"<?php echo $employee_document->HospID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_HospID" class="form-group employee_document_HospID">
<span<?php echo $employee_document->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_document->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="x<?php echo $employee_document_grid->RowIndex ?>_HospID" id="x<?php echo $employee_document_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_HospID" name="o<?php echo $employee_document_grid->RowIndex ?>_HospID" id="o<?php echo $employee_document_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_document->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_document_grid->ListOptions->render("body", "right", $employee_document_grid->RowIndex);
?>
<script>
femployee_documentgrid.updateLists(<?php echo $employee_document_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
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
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($employee_document_grid->Recordset)
	$employee_document_grid->Recordset->Close();
?>
</div>
<?php if ($employee_document_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $employee_document_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_document_grid->TotalRecs == 0 && !$employee_document->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_document_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_document_grid->terminate();
?>
<?php if (!$employee_document->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_document", "95%", "");
</script>
<?php } ?>