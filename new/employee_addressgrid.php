<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($employee_address_grid))
	$employee_address_grid = new employee_address_grid();

// Run the page
$employee_address_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_address_grid->Page_Render();
?>
<?php if (!$employee_address_grid->isExport()) { ?>
<script>
var femployee_addressgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	femployee_addressgrid = new ew.Form("femployee_addressgrid", "grid");
	femployee_addressgrid.formKeyCountName = '<?php echo $employee_address_grid->FormKeyCountName ?>';

	// Validate form
	femployee_addressgrid.validate = function() {
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
			<?php if ($employee_address_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->id->caption(), $employee_address_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->employee_id->caption(), $employee_address_grid->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->contact_persion->Required) { ?>
				elm = this.getElements("x" + infix + "_contact_persion");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->contact_persion->caption(), $employee_address_grid->contact_persion->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->street->Required) { ?>
				elm = this.getElements("x" + infix + "_street");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->street->caption(), $employee_address_grid->street->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->town->Required) { ?>
				elm = this.getElements("x" + infix + "_town");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->town->caption(), $employee_address_grid->town->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->province->Required) { ?>
				elm = this.getElements("x" + infix + "_province");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->province->caption(), $employee_address_grid->province->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->postal_code->Required) { ?>
				elm = this.getElements("x" + infix + "_postal_code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->postal_code->caption(), $employee_address_grid->postal_code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->address_type->Required) { ?>
				elm = this.getElements("x" + infix + "_address_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->address_type->caption(), $employee_address_grid->address_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_address_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_address_grid->status->caption(), $employee_address_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	femployee_addressgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "contact_persion", false)) return false;
		if (ew.valueChanged(fobj, infix, "street", false)) return false;
		if (ew.valueChanged(fobj, infix, "town", false)) return false;
		if (ew.valueChanged(fobj, infix, "province", false)) return false;
		if (ew.valueChanged(fobj, infix, "postal_code", false)) return false;
		if (ew.valueChanged(fobj, infix, "address_type", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployee_addressgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_addressgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_addressgrid.lists["x_employee_id"] = <?php echo $employee_address_grid->employee_id->Lookup->toClientList($employee_address_grid) ?>;
	femployee_addressgrid.lists["x_employee_id"].options = <?php echo JsonEncode($employee_address_grid->employee_id->lookupOptions()) ?>;
	femployee_addressgrid.lists["x_address_type"] = <?php echo $employee_address_grid->address_type->Lookup->toClientList($employee_address_grid) ?>;
	femployee_addressgrid.lists["x_address_type"].options = <?php echo JsonEncode($employee_address_grid->address_type->lookupOptions()) ?>;
	femployee_addressgrid.lists["x_status"] = <?php echo $employee_address_grid->status->Lookup->toClientList($employee_address_grid) ?>;
	femployee_addressgrid.lists["x_status"].options = <?php echo JsonEncode($employee_address_grid->status->lookupOptions()) ?>;
	loadjs.done("femployee_addressgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$employee_address_grid->renderOtherOptions();
?>
<?php if ($employee_address_grid->TotalRecords > 0 || $employee_address->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_address_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_address">
<?php if ($employee_address_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $employee_address_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_addressgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_address" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_addressgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_address->RowType = ROWTYPE_HEADER;

// Render list options
$employee_address_grid->renderListOptions();

// Render list options (header, left)
$employee_address_grid->ListOptions->render("header", "left");
?>
<?php if ($employee_address_grid->id->Visible) { // id ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_address_grid->id->headerCellClass() ?>"><div id="elh_employee_address_id" class="employee_address_id"><div class="ew-table-header-caption"><?php echo $employee_address_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_address_grid->id->headerCellClass() ?>"><div><div id="elh_employee_address_id" class="employee_address_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_address_grid->employee_id->headerCellClass() ?>"><div id="elh_employee_address_employee_id" class="employee_address_employee_id"><div class="ew-table-header-caption"><?php echo $employee_address_grid->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_address_grid->employee_id->headerCellClass() ?>"><div><div id="elh_employee_address_employee_id" class="employee_address_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->employee_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->employee_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->contact_persion->Visible) { // contact_persion ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->contact_persion) == "") { ?>
		<th data-name="contact_persion" class="<?php echo $employee_address_grid->contact_persion->headerCellClass() ?>"><div id="elh_employee_address_contact_persion" class="employee_address_contact_persion"><div class="ew-table-header-caption"><?php echo $employee_address_grid->contact_persion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contact_persion" class="<?php echo $employee_address_grid->contact_persion->headerCellClass() ?>"><div><div id="elh_employee_address_contact_persion" class="employee_address_contact_persion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->contact_persion->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->contact_persion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->contact_persion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->street->Visible) { // street ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->street) == "") { ?>
		<th data-name="street" class="<?php echo $employee_address_grid->street->headerCellClass() ?>"><div id="elh_employee_address_street" class="employee_address_street"><div class="ew-table-header-caption"><?php echo $employee_address_grid->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $employee_address_grid->street->headerCellClass() ?>"><div><div id="elh_employee_address_street" class="employee_address_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->street->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->town->Visible) { // town ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->town) == "") { ?>
		<th data-name="town" class="<?php echo $employee_address_grid->town->headerCellClass() ?>"><div id="elh_employee_address_town" class="employee_address_town"><div class="ew-table-header-caption"><?php echo $employee_address_grid->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $employee_address_grid->town->headerCellClass() ?>"><div><div id="elh_employee_address_town" class="employee_address_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->town->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->province->Visible) { // province ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->province) == "") { ?>
		<th data-name="province" class="<?php echo $employee_address_grid->province->headerCellClass() ?>"><div id="elh_employee_address_province" class="employee_address_province"><div class="ew-table-header-caption"><?php echo $employee_address_grid->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $employee_address_grid->province->headerCellClass() ?>"><div><div id="elh_employee_address_province" class="employee_address_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->postal_code->Visible) { // postal_code ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $employee_address_grid->postal_code->headerCellClass() ?>"><div id="elh_employee_address_postal_code" class="employee_address_postal_code"><div class="ew-table-header-caption"><?php echo $employee_address_grid->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $employee_address_grid->postal_code->headerCellClass() ?>"><div><div id="elh_employee_address_postal_code" class="employee_address_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->postal_code->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->address_type->Visible) { // address_type ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->address_type) == "") { ?>
		<th data-name="address_type" class="<?php echo $employee_address_grid->address_type->headerCellClass() ?>"><div id="elh_employee_address_address_type" class="employee_address_address_type"><div class="ew-table-header-caption"><?php echo $employee_address_grid->address_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address_type" class="<?php echo $employee_address_grid->address_type->headerCellClass() ?>"><div><div id="elh_employee_address_address_type" class="employee_address_address_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->address_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->address_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_address_grid->status->Visible) { // status ?>
	<?php if ($employee_address_grid->SortUrl($employee_address_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_address_grid->status->headerCellClass() ?>"><div id="elh_employee_address_status" class="employee_address_status"><div class="ew-table-header-caption"><?php echo $employee_address_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_address_grid->status->headerCellClass() ?>"><div><div id="elh_employee_address_status" class="employee_address_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_address_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_address_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_address_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_address_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$employee_address_grid->StartRecord = 1;
$employee_address_grid->StopRecord = $employee_address_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($employee_address->isConfirm() || $employee_address_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_address_grid->FormKeyCountName) && ($employee_address_grid->isGridAdd() || $employee_address_grid->isGridEdit() || $employee_address->isConfirm())) {
		$employee_address_grid->KeyCount = $CurrentForm->getValue($employee_address_grid->FormKeyCountName);
		$employee_address_grid->StopRecord = $employee_address_grid->StartRecord + $employee_address_grid->KeyCount - 1;
	}
}
$employee_address_grid->RecordCount = $employee_address_grid->StartRecord - 1;
if ($employee_address_grid->Recordset && !$employee_address_grid->Recordset->EOF) {
	$employee_address_grid->Recordset->moveFirst();
	$selectLimit = $employee_address_grid->UseSelectLimit;
	if (!$selectLimit && $employee_address_grid->StartRecord > 1)
		$employee_address_grid->Recordset->move($employee_address_grid->StartRecord - 1);
} elseif (!$employee_address->AllowAddDeleteRow && $employee_address_grid->StopRecord == 0) {
	$employee_address_grid->StopRecord = $employee_address->GridAddRowCount;
}

// Initialize aggregate
$employee_address->RowType = ROWTYPE_AGGREGATEINIT;
$employee_address->resetAttributes();
$employee_address_grid->renderRow();
if ($employee_address_grid->isGridAdd())
	$employee_address_grid->RowIndex = 0;
if ($employee_address_grid->isGridEdit())
	$employee_address_grid->RowIndex = 0;
while ($employee_address_grid->RecordCount < $employee_address_grid->StopRecord) {
	$employee_address_grid->RecordCount++;
	if ($employee_address_grid->RecordCount >= $employee_address_grid->StartRecord) {
		$employee_address_grid->RowCount++;
		if ($employee_address_grid->isGridAdd() || $employee_address_grid->isGridEdit() || $employee_address->isConfirm()) {
			$employee_address_grid->RowIndex++;
			$CurrentForm->Index = $employee_address_grid->RowIndex;
			if ($CurrentForm->hasValue($employee_address_grid->FormActionName) && ($employee_address->isConfirm() || $employee_address_grid->EventCancelled))
				$employee_address_grid->RowAction = strval($CurrentForm->getValue($employee_address_grid->FormActionName));
			elseif ($employee_address_grid->isGridAdd())
				$employee_address_grid->RowAction = "insert";
			else
				$employee_address_grid->RowAction = "";
		}

		// Set up key count
		$employee_address_grid->KeyCount = $employee_address_grid->RowIndex;

		// Init row class and style
		$employee_address->resetAttributes();
		$employee_address->CssClass = "";
		if ($employee_address_grid->isGridAdd()) {
			if ($employee_address->CurrentMode == "copy") {
				$employee_address_grid->loadRowValues($employee_address_grid->Recordset); // Load row values
				$employee_address_grid->setRecordKey($employee_address_grid->RowOldKey, $employee_address_grid->Recordset); // Set old record key
			} else {
				$employee_address_grid->loadRowValues(); // Load default values
				$employee_address_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$employee_address_grid->loadRowValues($employee_address_grid->Recordset); // Load row values
		}
		$employee_address->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_address_grid->isGridAdd()) // Grid add
			$employee_address->RowType = ROWTYPE_ADD; // Render add
		if ($employee_address_grid->isGridAdd() && $employee_address->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_address_grid->restoreCurrentRowFormValues($employee_address_grid->RowIndex); // Restore form values
		if ($employee_address_grid->isGridEdit()) { // Grid edit
			if ($employee_address->EventCancelled)
				$employee_address_grid->restoreCurrentRowFormValues($employee_address_grid->RowIndex); // Restore form values
			if ($employee_address_grid->RowAction == "insert")
				$employee_address->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_address->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_address_grid->isGridEdit() && ($employee_address->RowType == ROWTYPE_EDIT || $employee_address->RowType == ROWTYPE_ADD) && $employee_address->EventCancelled) // Update failed
			$employee_address_grid->restoreCurrentRowFormValues($employee_address_grid->RowIndex); // Restore form values
		if ($employee_address->RowType == ROWTYPE_EDIT) // Edit row
			$employee_address_grid->EditRowCount++;
		if ($employee_address->isConfirm()) // Confirm row
			$employee_address_grid->restoreCurrentRowFormValues($employee_address_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$employee_address->RowAttrs->merge(["data-rowindex" => $employee_address_grid->RowCount, "id" => "r" . $employee_address_grid->RowCount . "_employee_address", "data-rowtype" => $employee_address->RowType]);

		// Render row
		$employee_address_grid->renderRow();

		// Render list options
		$employee_address_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_address_grid->RowAction != "delete" && $employee_address_grid->RowAction != "insertdelete" && !($employee_address_grid->RowAction == "insert" && $employee_address->isConfirm() && $employee_address_grid->emptyRow())) {
?>
	<tr <?php echo $employee_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_address_grid->ListOptions->render("body", "left", $employee_address_grid->RowCount);
?>
	<?php if ($employee_address_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_address_grid->id->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_id" class="form-group"></span>
<input type="hidden" data-table="employee_address" data-field="x_id" name="o<?php echo $employee_address_grid->RowIndex ?>_id" id="o<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_id" class="form-group">
<span<?php echo $employee_address_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_id" name="x<?php echo $employee_address_grid->RowIndex ?>_id" id="x<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_id">
<span<?php echo $employee_address_grid->id->viewAttributes() ?>><?php echo $employee_address_grid->id->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_id" name="x<?php echo $employee_address_grid->RowIndex ?>_id" id="x<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_id" name="o<?php echo $employee_address_grid->RowIndex ?>_id" id="o<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_id" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_id" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_id" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_id" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id" <?php echo $employee_address_grid->employee_id->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_address_grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_employee_id" class="form-group">
<span<?php echo $employee_address_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_employee_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_employee_id" data-value-separator="<?php echo $employee_address_grid->employee_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id"<?php echo $employee_address_grid->employee_id->editAttributes() ?>>
			<?php echo $employee_address_grid->employee_id->selectOptionListHtml("x{$employee_address_grid->RowIndex}_employee_id") ?>
		</select>
</div>
<?php echo $employee_address_grid->employee_id->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_employee_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="o<?php echo $employee_address_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_address_grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_employee_id" class="form-group">
<span<?php echo $employee_address_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_employee_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_employee_id" data-value-separator="<?php echo $employee_address_grid->employee_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id"<?php echo $employee_address_grid->employee_id->editAttributes() ?>>
			<?php echo $employee_address_grid->employee_id->selectOptionListHtml("x{$employee_address_grid->RowIndex}_employee_id") ?>
		</select>
</div>
<?php echo $employee_address_grid->employee_id->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_employee_id") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_employee_id">
<span<?php echo $employee_address_grid->employee_id->viewAttributes() ?>><?php echo $employee_address_grid->employee_id->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="o<?php echo $employee_address_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_employee_id" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_employee_id" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->contact_persion->Visible) { // contact_persion ?>
		<td data-name="contact_persion" <?php echo $employee_address_grid->contact_persion->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_contact_persion" class="form-group">
<input type="text" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_grid->contact_persion->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->contact_persion->EditValue ?>"<?php echo $employee_address_grid->contact_persion->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address_grid->contact_persion->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_contact_persion" class="form-group">
<input type="text" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_grid->contact_persion->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->contact_persion->EditValue ?>"<?php echo $employee_address_grid->contact_persion->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_contact_persion">
<span<?php echo $employee_address_grid->contact_persion->viewAttributes() ?>><?php echo $employee_address_grid->contact_persion->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address_grid->contact_persion->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address_grid->contact_persion->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address_grid->contact_persion->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address_grid->contact_persion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->street->Visible) { // street ?>
		<td data-name="street" <?php echo $employee_address_grid->street->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_street" class="form-group">
<input type="text" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_grid->RowIndex ?>_street" id="x<?php echo $employee_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_grid->street->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->street->EditValue ?>"<?php echo $employee_address_grid->street->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" name="o<?php echo $employee_address_grid->RowIndex ?>_street" id="o<?php echo $employee_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address_grid->street->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_street" class="form-group">
<input type="text" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_grid->RowIndex ?>_street" id="x<?php echo $employee_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_grid->street->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->street->EditValue ?>"<?php echo $employee_address_grid->street->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_street">
<span<?php echo $employee_address_grid->street->viewAttributes() ?>><?php echo $employee_address_grid->street->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_grid->RowIndex ?>_street" id="x<?php echo $employee_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address_grid->street->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_street" name="o<?php echo $employee_address_grid->RowIndex ?>_street" id="o<?php echo $employee_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address_grid->street->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_street" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_street" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address_grid->street->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_street" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_street" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address_grid->street->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->town->Visible) { // town ?>
		<td data-name="town" <?php echo $employee_address_grid->town->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_town" class="form-group">
<input type="text" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_grid->RowIndex ?>_town" id="x<?php echo $employee_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->town->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->town->EditValue ?>"<?php echo $employee_address_grid->town->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" name="o<?php echo $employee_address_grid->RowIndex ?>_town" id="o<?php echo $employee_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address_grid->town->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_town" class="form-group">
<input type="text" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_grid->RowIndex ?>_town" id="x<?php echo $employee_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->town->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->town->EditValue ?>"<?php echo $employee_address_grid->town->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_town">
<span<?php echo $employee_address_grid->town->viewAttributes() ?>><?php echo $employee_address_grid->town->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_grid->RowIndex ?>_town" id="x<?php echo $employee_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address_grid->town->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_town" name="o<?php echo $employee_address_grid->RowIndex ?>_town" id="o<?php echo $employee_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address_grid->town->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_town" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_town" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address_grid->town->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_town" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_town" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address_grid->town->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->province->Visible) { // province ?>
		<td data-name="province" <?php echo $employee_address_grid->province->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_province" class="form-group">
<input type="text" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_grid->RowIndex ?>_province" id="x<?php echo $employee_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->province->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->province->EditValue ?>"<?php echo $employee_address_grid->province->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" name="o<?php echo $employee_address_grid->RowIndex ?>_province" id="o<?php echo $employee_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address_grid->province->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_province" class="form-group">
<input type="text" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_grid->RowIndex ?>_province" id="x<?php echo $employee_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->province->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->province->EditValue ?>"<?php echo $employee_address_grid->province->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_province">
<span<?php echo $employee_address_grid->province->viewAttributes() ?>><?php echo $employee_address_grid->province->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_grid->RowIndex ?>_province" id="x<?php echo $employee_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address_grid->province->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_province" name="o<?php echo $employee_address_grid->RowIndex ?>_province" id="o<?php echo $employee_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address_grid->province->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_province" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_province" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address_grid->province->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_province" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_province" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address_grid->province->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $employee_address_grid->postal_code->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_postal_code" class="form-group">
<input type="text" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->postal_code->EditValue ?>"<?php echo $employee_address_grid->postal_code->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="o<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="o<?php echo $employee_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address_grid->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_postal_code" class="form-group">
<input type="text" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->postal_code->EditValue ?>"<?php echo $employee_address_grid->postal_code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_postal_code">
<span<?php echo $employee_address_grid->postal_code->viewAttributes() ?>><?php echo $employee_address_grid->postal_code->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address_grid->postal_code->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="o<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="o<?php echo $employee_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address_grid->postal_code->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address_grid->postal_code->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address_grid->postal_code->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->address_type->Visible) { // address_type ?>
		<td data-name="address_type" <?php echo $employee_address_grid->address_type->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_address_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_address_type" data-value-separator="<?php echo $employee_address_grid->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_address_type" name="x<?php echo $employee_address_grid->RowIndex ?>_address_type"<?php echo $employee_address_grid->address_type->editAttributes() ?>>
			<?php echo $employee_address_grid->address_type->selectOptionListHtml("x{$employee_address_grid->RowIndex}_address_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$employee_address_grid->address_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_address_grid->RowIndex ?>_address_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_address_grid->address_type->caption() ?>" data-title="<?php echo $employee_address_grid->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_address_grid->RowIndex ?>_address_type',url:'sys_address_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_address_grid->address_type->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_address_type") ?>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="o<?php echo $employee_address_grid->RowIndex ?>_address_type" id="o<?php echo $employee_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address_grid->address_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_address_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_address_type" data-value-separator="<?php echo $employee_address_grid->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_address_type" name="x<?php echo $employee_address_grid->RowIndex ?>_address_type"<?php echo $employee_address_grid->address_type->editAttributes() ?>>
			<?php echo $employee_address_grid->address_type->selectOptionListHtml("x{$employee_address_grid->RowIndex}_address_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$employee_address_grid->address_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_address_grid->RowIndex ?>_address_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_address_grid->address_type->caption() ?>" data-title="<?php echo $employee_address_grid->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_address_grid->RowIndex ?>_address_type',url:'sys_address_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_address_grid->address_type->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_address_type") ?>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_address_type">
<span<?php echo $employee_address_grid->address_type->viewAttributes() ?>><?php echo $employee_address_grid->address_type->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="x<?php echo $employee_address_grid->RowIndex ?>_address_type" id="x<?php echo $employee_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address_grid->address_type->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="o<?php echo $employee_address_grid->RowIndex ?>_address_type" id="o<?php echo $employee_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address_grid->address_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_address_type" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address_grid->address_type->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_address_type" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address_grid->address_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_address_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_address_grid->status->cellAttributes() ?>>
<?php if ($employee_address->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_status" data-value-separator="<?php echo $employee_address_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_status" name="x<?php echo $employee_address_grid->RowIndex ?>_status"<?php echo $employee_address_grid->status->editAttributes() ?>>
			<?php echo $employee_address_grid->status->selectOptionListHtml("x{$employee_address_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_address_grid->status->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" name="o<?php echo $employee_address_grid->RowIndex ?>_status" id="o<?php echo $employee_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_status" data-value-separator="<?php echo $employee_address_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_status" name="x<?php echo $employee_address_grid->RowIndex ?>_status"<?php echo $employee_address_grid->status->editAttributes() ?>>
			<?php echo $employee_address_grid->status->selectOptionListHtml("x{$employee_address_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_address_grid->status->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_address->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_address_grid->RowCount ?>_employee_address_status">
<span<?php echo $employee_address_grid->status->viewAttributes() ?>><?php echo $employee_address_grid->status->getViewValue() ?></span>
</span>
<?php if (!$employee_address->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_status" name="x<?php echo $employee_address_grid->RowIndex ?>_status" id="x<?php echo $employee_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address_grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_status" name="o<?php echo $employee_address_grid->RowIndex ?>_status" id="o<?php echo $employee_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_address" data-field="x_status" name="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_status" id="femployee_addressgrid$x<?php echo $employee_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address_grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_status" name="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_status" id="femployee_addressgrid$o<?php echo $employee_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_address_grid->ListOptions->render("body", "right", $employee_address_grid->RowCount);
?>
	</tr>
<?php if ($employee_address->RowType == ROWTYPE_ADD || $employee_address->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_addressgrid", "load"], function() {
	femployee_addressgrid.updateLists(<?php echo $employee_address_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_address_grid->isGridAdd() || $employee_address->CurrentMode == "copy")
		if (!$employee_address_grid->Recordset->EOF)
			$employee_address_grid->Recordset->moveNext();
}
?>
<?php
	if ($employee_address->CurrentMode == "add" || $employee_address->CurrentMode == "copy" || $employee_address->CurrentMode == "edit") {
		$employee_address_grid->RowIndex = '$rowindex$';
		$employee_address_grid->loadRowValues();

		// Set row properties
		$employee_address->resetAttributes();
		$employee_address->RowAttrs->merge(["data-rowindex" => $employee_address_grid->RowIndex, "id" => "r0_employee_address", "data-rowtype" => ROWTYPE_ADD]);
		$employee_address->RowAttrs->appendClass("ew-template");
		$employee_address->RowType = ROWTYPE_ADD;

		// Render row
		$employee_address_grid->renderRow();

		// Render list options
		$employee_address_grid->renderListOptions();
		$employee_address_grid->StartRowCount = 0;
?>
	<tr <?php echo $employee_address->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_address_grid->ListOptions->render("body", "left", $employee_address_grid->RowIndex);
?>
	<?php if ($employee_address_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_id" class="form-group employee_address_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_id" class="form-group employee_address_id">
<span<?php echo $employee_address_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_id" name="x<?php echo $employee_address_grid->RowIndex ?>_id" id="x<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_id" name="o<?php echo $employee_address_grid->RowIndex ?>_id" id="o<?php echo $employee_address_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_address_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if (!$employee_address->isConfirm()) { ?>
<?php if ($employee_address_grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?php echo $employee_address_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_employee_id" data-value-separator="<?php echo $employee_address_grid->employee_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id"<?php echo $employee_address_grid->employee_id->editAttributes() ?>>
			<?php echo $employee_address_grid->employee_id->selectOptionListHtml("x{$employee_address_grid->RowIndex}_employee_id") ?>
		</select>
</div>
<?php echo $employee_address_grid->employee_id->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_employee_id") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?php echo $employee_address_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" name="o<?php echo $employee_address_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_address_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_address_grid->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->contact_persion->Visible) { // contact_persion ?>
		<td data-name="contact_persion">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<input type="text" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_grid->contact_persion->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->contact_persion->EditValue ?>"<?php echo $employee_address_grid->contact_persion->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<span<?php echo $employee_address_grid->contact_persion->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->contact_persion->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="x<?php echo $employee_address_grid->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address_grid->contact_persion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" name="o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" id="o<?php echo $employee_address_grid->RowIndex ?>_contact_persion" value="<?php echo HtmlEncode($employee_address_grid->contact_persion->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->street->Visible) { // street ?>
		<td data-name="street">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_street" class="form-group employee_address_street">
<input type="text" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_grid->RowIndex ?>_street" id="x<?php echo $employee_address_grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_address_grid->street->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->street->EditValue ?>"<?php echo $employee_address_grid->street->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_street" class="form-group employee_address_street">
<span<?php echo $employee_address_grid->street->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->street->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" name="x<?php echo $employee_address_grid->RowIndex ?>_street" id="x<?php echo $employee_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address_grid->street->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_street" name="o<?php echo $employee_address_grid->RowIndex ?>_street" id="o<?php echo $employee_address_grid->RowIndex ?>_street" value="<?php echo HtmlEncode($employee_address_grid->street->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->town->Visible) { // town ?>
		<td data-name="town">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_town" class="form-group employee_address_town">
<input type="text" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_grid->RowIndex ?>_town" id="x<?php echo $employee_address_grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->town->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->town->EditValue ?>"<?php echo $employee_address_grid->town->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_town" class="form-group employee_address_town">
<span<?php echo $employee_address_grid->town->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->town->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" name="x<?php echo $employee_address_grid->RowIndex ?>_town" id="x<?php echo $employee_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address_grid->town->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_town" name="o<?php echo $employee_address_grid->RowIndex ?>_town" id="o<?php echo $employee_address_grid->RowIndex ?>_town" value="<?php echo HtmlEncode($employee_address_grid->town->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->province->Visible) { // province ?>
		<td data-name="province">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_province" class="form-group employee_address_province">
<input type="text" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_grid->RowIndex ?>_province" id="x<?php echo $employee_address_grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->province->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->province->EditValue ?>"<?php echo $employee_address_grid->province->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_province" class="form-group employee_address_province">
<span<?php echo $employee_address_grid->province->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->province->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" name="x<?php echo $employee_address_grid->RowIndex ?>_province" id="x<?php echo $employee_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address_grid->province->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_province" name="o<?php echo $employee_address_grid->RowIndex ?>_province" id="o<?php echo $employee_address_grid->RowIndex ?>_province" value="<?php echo HtmlEncode($employee_address_grid->province->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_postal_code" class="form-group employee_address_postal_code">
<input type="text" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($employee_address_grid->postal_code->getPlaceHolder()) ?>" value="<?php echo $employee_address_grid->postal_code->EditValue ?>"<?php echo $employee_address_grid->postal_code->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_postal_code" class="form-group employee_address_postal_code">
<span<?php echo $employee_address_grid->postal_code->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->postal_code->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="x<?php echo $employee_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address_grid->postal_code->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" name="o<?php echo $employee_address_grid->RowIndex ?>_postal_code" id="o<?php echo $employee_address_grid->RowIndex ?>_postal_code" value="<?php echo HtmlEncode($employee_address_grid->postal_code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->address_type->Visible) { // address_type ?>
		<td data-name="address_type">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_address_type" class="form-group employee_address_address_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_address_type" data-value-separator="<?php echo $employee_address_grid->address_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_address_type" name="x<?php echo $employee_address_grid->RowIndex ?>_address_type"<?php echo $employee_address_grid->address_type->editAttributes() ?>>
			<?php echo $employee_address_grid->address_type->selectOptionListHtml("x{$employee_address_grid->RowIndex}_address_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$employee_address_grid->address_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_address_grid->RowIndex ?>_address_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_address_grid->address_type->caption() ?>" data-title="<?php echo $employee_address_grid->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_address_grid->RowIndex ?>_address_type',url:'sys_address_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_address_grid->address_type->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_address_type") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_address_type" class="form-group employee_address_address_type">
<span<?php echo $employee_address_grid->address_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->address_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="x<?php echo $employee_address_grid->RowIndex ?>_address_type" id="x<?php echo $employee_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address_grid->address_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_address_type" name="o<?php echo $employee_address_grid->RowIndex ?>_address_type" id="o<?php echo $employee_address_grid->RowIndex ?>_address_type" value="<?php echo HtmlEncode($employee_address_grid->address_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_address_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$employee_address->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_status" class="form-group employee_address_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_address" data-field="x_status" data-value-separator="<?php echo $employee_address_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_address_grid->RowIndex ?>_status" name="x<?php echo $employee_address_grid->RowIndex ?>_status"<?php echo $employee_address_grid->status->editAttributes() ?>>
			<?php echo $employee_address_grid->status->selectOptionListHtml("x{$employee_address_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_address_grid->status->Lookup->getParamTag($employee_address_grid, "p_x" . $employee_address_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_status" class="form-group employee_address_status">
<span<?php echo $employee_address_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_address_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" name="x<?php echo $employee_address_grid->RowIndex ?>_status" id="x<?php echo $employee_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_status" name="o<?php echo $employee_address_grid->RowIndex ?>_status" id="o<?php echo $employee_address_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_address_grid->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_address_grid->ListOptions->render("body", "right", $employee_address_grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_addressgrid", "load"], function() {
	femployee_addressgrid.updateLists(<?php echo $employee_address_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($employee_address->CurrentMode == "add" || $employee_address->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $employee_address_grid->FormKeyCountName ?>" id="<?php echo $employee_address_grid->FormKeyCountName ?>" value="<?php echo $employee_address_grid->KeyCount ?>">
<?php echo $employee_address_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_address->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $employee_address_grid->FormKeyCountName ?>" id="<?php echo $employee_address_grid->FormKeyCountName ?>" value="<?php echo $employee_address_grid->KeyCount ?>">
<?php echo $employee_address_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_address->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="femployee_addressgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_address_grid->Recordset)
	$employee_address_grid->Recordset->Close();
?>
<?php if ($employee_address_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $employee_address_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_address_grid->TotalRecords == 0 && !$employee_address->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_address_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$employee_address_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee_address->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee_address",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$employee_address_grid->terminate();
?>