<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($lab_profile_details_grid))
	$lab_profile_details_grid = new lab_profile_details_grid();

// Run the page
$lab_profile_details_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_grid->Page_Render();
?>
<?php if (!$lab_profile_details_grid->isExport()) { ?>
<script>
var flab_profile_detailsgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	flab_profile_detailsgrid = new ew.Form("flab_profile_detailsgrid", "grid");
	flab_profile_detailsgrid.formKeyCountName = '<?php echo $lab_profile_details_grid->FormKeyCountName ?>';

	// Validate form
	flab_profile_detailsgrid.validate = function() {
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
			<?php if ($lab_profile_details_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_grid->id->caption(), $lab_profile_details_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_grid->ProfileCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_grid->ProfileCode->caption(), $lab_profile_details_grid->ProfileCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_grid->SubProfileCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SubProfileCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_grid->SubProfileCode->caption(), $lab_profile_details_grid->SubProfileCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_grid->ProfileTestCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileTestCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_grid->ProfileTestCode->caption(), $lab_profile_details_grid->ProfileTestCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_grid->ProfileSubTestCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileSubTestCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_grid->ProfileSubTestCode->caption(), $lab_profile_details_grid->ProfileSubTestCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_grid->TestOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_TestOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_grid->TestOrder->caption(), $lab_profile_details_grid->TestOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TestOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_details_grid->TestOrder->errorMessage()) ?>");
			<?php if ($lab_profile_details_grid->TestAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TestAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_grid->TestAmount->caption(), $lab_profile_details_grid->TestAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TestAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_details_grid->TestAmount->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	flab_profile_detailsgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "ProfileCode", false)) return false;
		if (ew.valueChanged(fobj, infix, "SubProfileCode", false)) return false;
		if (ew.valueChanged(fobj, infix, "ProfileTestCode", false)) return false;
		if (ew.valueChanged(fobj, infix, "ProfileSubTestCode", false)) return false;
		if (ew.valueChanged(fobj, infix, "TestOrder", false)) return false;
		if (ew.valueChanged(fobj, infix, "TestAmount", false)) return false;
		return true;
	}

	// Form_CustomValidate
	flab_profile_detailsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_profile_detailsgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	flab_profile_detailsgrid.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_grid->SubProfileCode->Lookup->toClientList($lab_profile_details_grid) ?>;
	flab_profile_detailsgrid.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_grid->SubProfileCode->lookupOptions()) ?>;
	flab_profile_detailsgrid.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_grid->ProfileTestCode->Lookup->toClientList($lab_profile_details_grid) ?>;
	flab_profile_detailsgrid.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_grid->ProfileTestCode->lookupOptions()) ?>;
	loadjs.done("flab_profile_detailsgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$lab_profile_details_grid->renderOtherOptions();
?>
<?php if ($lab_profile_details_grid->TotalRecords > 0 || $lab_profile_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_profile_details_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_profile_details">
<?php if ($lab_profile_details_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $lab_profile_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="flab_profile_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_lab_profile_details" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_lab_profile_detailsgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_profile_details->RowType = ROWTYPE_HEADER;

// Render list options
$lab_profile_details_grid->renderListOptions();

// Render list options (header, left)
$lab_profile_details_grid->ListOptions->render("header", "left");
?>
<?php if ($lab_profile_details_grid->id->Visible) { // id ?>
	<?php if ($lab_profile_details_grid->SortUrl($lab_profile_details_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_profile_details_grid->id->headerCellClass() ?>"><div id="elh_lab_profile_details_id" class="lab_profile_details_id"><div class="ew-table-header-caption"><?php echo $lab_profile_details_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_profile_details_grid->id->headerCellClass() ?>"><div><div id="elh_lab_profile_details_id" class="lab_profile_details_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_grid->ProfileCode->Visible) { // ProfileCode ?>
	<?php if ($lab_profile_details_grid->SortUrl($lab_profile_details_grid->ProfileCode) == "") { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_details_grid->ProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details_grid->ProfileCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_details_grid->ProfileCode->headerCellClass() ?>"><div><div id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_grid->ProfileCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_grid->ProfileCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_grid->ProfileCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_grid->SubProfileCode->Visible) { // SubProfileCode ?>
	<?php if ($lab_profile_details_grid->SortUrl($lab_profile_details_grid->SubProfileCode) == "") { ?>
		<th data-name="SubProfileCode" class="<?php echo $lab_profile_details_grid->SubProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details_grid->SubProfileCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubProfileCode" class="<?php echo $lab_profile_details_grid->SubProfileCode->headerCellClass() ?>"><div><div id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_grid->SubProfileCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_grid->SubProfileCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_grid->SubProfileCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_grid->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<?php if ($lab_profile_details_grid->SortUrl($lab_profile_details_grid->ProfileTestCode) == "") { ?>
		<th data-name="ProfileTestCode" class="<?php echo $lab_profile_details_grid->ProfileTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details_grid->ProfileTestCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileTestCode" class="<?php echo $lab_profile_details_grid->ProfileTestCode->headerCellClass() ?>"><div><div id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_grid->ProfileTestCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_grid->ProfileTestCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_grid->ProfileTestCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_grid->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<?php if ($lab_profile_details_grid->SortUrl($lab_profile_details_grid->ProfileSubTestCode) == "") { ?>
		<th data-name="ProfileSubTestCode" class="<?php echo $lab_profile_details_grid->ProfileSubTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode"><div class="ew-table-header-caption"><?php echo $lab_profile_details_grid->ProfileSubTestCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileSubTestCode" class="<?php echo $lab_profile_details_grid->ProfileSubTestCode->headerCellClass() ?>"><div><div id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_grid->ProfileSubTestCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_grid->ProfileSubTestCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_grid->ProfileSubTestCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_grid->TestOrder->Visible) { // TestOrder ?>
	<?php if ($lab_profile_details_grid->SortUrl($lab_profile_details_grid->TestOrder) == "") { ?>
		<th data-name="TestOrder" class="<?php echo $lab_profile_details_grid->TestOrder->headerCellClass() ?>"><div id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder"><div class="ew-table-header-caption"><?php echo $lab_profile_details_grid->TestOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestOrder" class="<?php echo $lab_profile_details_grid->TestOrder->headerCellClass() ?>"><div><div id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_grid->TestOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_grid->TestOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_grid->TestOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_details_grid->TestAmount->Visible) { // TestAmount ?>
	<?php if ($lab_profile_details_grid->SortUrl($lab_profile_details_grid->TestAmount) == "") { ?>
		<th data-name="TestAmount" class="<?php echo $lab_profile_details_grid->TestAmount->headerCellClass() ?>"><div id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount"><div class="ew-table-header-caption"><?php echo $lab_profile_details_grid->TestAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestAmount" class="<?php echo $lab_profile_details_grid->TestAmount->headerCellClass() ?>"><div><div id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_details_grid->TestAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_details_grid->TestAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_details_grid->TestAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_profile_details_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$lab_profile_details_grid->StartRecord = 1;
$lab_profile_details_grid->StopRecord = $lab_profile_details_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($lab_profile_details->isConfirm() || $lab_profile_details_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_profile_details_grid->FormKeyCountName) && ($lab_profile_details_grid->isGridAdd() || $lab_profile_details_grid->isGridEdit() || $lab_profile_details->isConfirm())) {
		$lab_profile_details_grid->KeyCount = $CurrentForm->getValue($lab_profile_details_grid->FormKeyCountName);
		$lab_profile_details_grid->StopRecord = $lab_profile_details_grid->StartRecord + $lab_profile_details_grid->KeyCount - 1;
	}
}
$lab_profile_details_grid->RecordCount = $lab_profile_details_grid->StartRecord - 1;
if ($lab_profile_details_grid->Recordset && !$lab_profile_details_grid->Recordset->EOF) {
	$lab_profile_details_grid->Recordset->moveFirst();
	$selectLimit = $lab_profile_details_grid->UseSelectLimit;
	if (!$selectLimit && $lab_profile_details_grid->StartRecord > 1)
		$lab_profile_details_grid->Recordset->move($lab_profile_details_grid->StartRecord - 1);
} elseif (!$lab_profile_details->AllowAddDeleteRow && $lab_profile_details_grid->StopRecord == 0) {
	$lab_profile_details_grid->StopRecord = $lab_profile_details->GridAddRowCount;
}

// Initialize aggregate
$lab_profile_details->RowType = ROWTYPE_AGGREGATEINIT;
$lab_profile_details->resetAttributes();
$lab_profile_details_grid->renderRow();
if ($lab_profile_details_grid->isGridAdd())
	$lab_profile_details_grid->RowIndex = 0;
if ($lab_profile_details_grid->isGridEdit())
	$lab_profile_details_grid->RowIndex = 0;
while ($lab_profile_details_grid->RecordCount < $lab_profile_details_grid->StopRecord) {
	$lab_profile_details_grid->RecordCount++;
	if ($lab_profile_details_grid->RecordCount >= $lab_profile_details_grid->StartRecord) {
		$lab_profile_details_grid->RowCount++;
		if ($lab_profile_details_grid->isGridAdd() || $lab_profile_details_grid->isGridEdit() || $lab_profile_details->isConfirm()) {
			$lab_profile_details_grid->RowIndex++;
			$CurrentForm->Index = $lab_profile_details_grid->RowIndex;
			if ($CurrentForm->hasValue($lab_profile_details_grid->FormActionName) && ($lab_profile_details->isConfirm() || $lab_profile_details_grid->EventCancelled))
				$lab_profile_details_grid->RowAction = strval($CurrentForm->getValue($lab_profile_details_grid->FormActionName));
			elseif ($lab_profile_details_grid->isGridAdd())
				$lab_profile_details_grid->RowAction = "insert";
			else
				$lab_profile_details_grid->RowAction = "";
		}

		// Set up key count
		$lab_profile_details_grid->KeyCount = $lab_profile_details_grid->RowIndex;

		// Init row class and style
		$lab_profile_details->resetAttributes();
		$lab_profile_details->CssClass = "";
		if ($lab_profile_details_grid->isGridAdd()) {
			if ($lab_profile_details->CurrentMode == "copy") {
				$lab_profile_details_grid->loadRowValues($lab_profile_details_grid->Recordset); // Load row values
				$lab_profile_details_grid->setRecordKey($lab_profile_details_grid->RowOldKey, $lab_profile_details_grid->Recordset); // Set old record key
			} else {
				$lab_profile_details_grid->loadRowValues(); // Load default values
				$lab_profile_details_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$lab_profile_details_grid->loadRowValues($lab_profile_details_grid->Recordset); // Load row values
		}
		$lab_profile_details->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_profile_details_grid->isGridAdd()) // Grid add
			$lab_profile_details->RowType = ROWTYPE_ADD; // Render add
		if ($lab_profile_details_grid->isGridAdd() && $lab_profile_details->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_profile_details_grid->restoreCurrentRowFormValues($lab_profile_details_grid->RowIndex); // Restore form values
		if ($lab_profile_details_grid->isGridEdit()) { // Grid edit
			if ($lab_profile_details->EventCancelled)
				$lab_profile_details_grid->restoreCurrentRowFormValues($lab_profile_details_grid->RowIndex); // Restore form values
			if ($lab_profile_details_grid->RowAction == "insert")
				$lab_profile_details->RowType = ROWTYPE_ADD; // Render add
			else
				$lab_profile_details->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($lab_profile_details_grid->isGridEdit() && ($lab_profile_details->RowType == ROWTYPE_EDIT || $lab_profile_details->RowType == ROWTYPE_ADD) && $lab_profile_details->EventCancelled) // Update failed
			$lab_profile_details_grid->restoreCurrentRowFormValues($lab_profile_details_grid->RowIndex); // Restore form values
		if ($lab_profile_details->RowType == ROWTYPE_EDIT) // Edit row
			$lab_profile_details_grid->EditRowCount++;
		if ($lab_profile_details->isConfirm()) // Confirm row
			$lab_profile_details_grid->restoreCurrentRowFormValues($lab_profile_details_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$lab_profile_details->RowAttrs->merge(["data-rowindex" => $lab_profile_details_grid->RowCount, "id" => "r" . $lab_profile_details_grid->RowCount . "_lab_profile_details", "data-rowtype" => $lab_profile_details->RowType]);

		// Render row
		$lab_profile_details_grid->renderRow();

		// Render list options
		$lab_profile_details_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_profile_details_grid->RowAction != "delete" && $lab_profile_details_grid->RowAction != "insertdelete" && !($lab_profile_details_grid->RowAction == "insert" && $lab_profile_details->isConfirm() && $lab_profile_details_grid->emptyRow())) {
?>
	<tr <?php echo $lab_profile_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_details_grid->ListOptions->render("body", "left", $lab_profile_details_grid->RowCount);
?>
	<?php if ($lab_profile_details_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $lab_profile_details_grid->id->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_id" class="form-group"></span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_id" class="form-group">
<span<?php echo $lab_profile_details_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_id">
<span<?php echo $lab_profile_details_grid->id->viewAttributes() ?>><?php echo $lab_profile_details_grid->id->getViewValue() ?></span>
</span>
<?php if (!$lab_profile_details->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->ProfileCode->Visible) { // ProfileCode ?>
		<td data-name="ProfileCode" <?php echo $lab_profile_details_grid->ProfileCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($lab_profile_details_grid->ProfileCode->getSessionValue() != "") { ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<span<?php echo $lab_profile_details_grid->ProfileCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->ProfileCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->ProfileCode->EditValue ?>"<?php echo $lab_profile_details_grid->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($lab_profile_details_grid->ProfileCode->getSessionValue() != "") { ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<span<?php echo $lab_profile_details_grid->ProfileCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->ProfileCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->ProfileCode->EditValue ?>"<?php echo $lab_profile_details_grid->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details_grid->ProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_grid->ProfileCode->getViewValue() ?></span>
</span>
<?php if (!$lab_profile_details->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->SubProfileCode->Visible) { // SubProfileCode ?>
		<td data-name="SubProfileCode" <?php echo $lab_profile_details_grid->SubProfileCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_SubProfileCode" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode"><?php echo EmptyValue(strval($lab_profile_details_grid->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_grid->SubProfileCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_grid->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_grid->SubProfileCode->ReadOnly || $lab_profile_details_grid->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_grid->SubProfileCode->Lookup->getParamTag($lab_profile_details_grid, "p_x" . $lab_profile_details_grid->RowIndex . "_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_grid->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo $lab_profile_details_grid->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details_grid->SubProfileCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->SubProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_SubProfileCode" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode"><?php echo EmptyValue(strval($lab_profile_details_grid->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_grid->SubProfileCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_grid->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_grid->SubProfileCode->ReadOnly || $lab_profile_details_grid->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_grid->SubProfileCode->Lookup->getParamTag($lab_profile_details_grid, "p_x" . $lab_profile_details_grid->RowIndex . "_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_grid->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo $lab_profile_details_grid->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details_grid->SubProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_SubProfileCode">
<span<?php echo $lab_profile_details_grid->SubProfileCode->viewAttributes() ?>><?php echo $lab_profile_details_grid->SubProfileCode->getViewValue() ?></span>
</span>
<?php if (!$lab_profile_details->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->SubProfileCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->SubProfileCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->SubProfileCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->SubProfileCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<td data-name="ProfileTestCode" <?php echo $lab_profile_details_grid->ProfileTestCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileTestCode" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode"><?php echo EmptyValue(strval($lab_profile_details_grid->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_grid->ProfileTestCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_grid->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_grid->ProfileTestCode->ReadOnly || $lab_profile_details_grid->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_grid->ProfileTestCode->Lookup->getParamTag($lab_profile_details_grid, "p_x" . $lab_profile_details_grid->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_grid->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo $lab_profile_details_grid->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details_grid->ProfileTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileTestCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileTestCode" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode"><?php echo EmptyValue(strval($lab_profile_details_grid->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_grid->ProfileTestCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_grid->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_grid->ProfileTestCode->ReadOnly || $lab_profile_details_grid->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_grid->ProfileTestCode->Lookup->getParamTag($lab_profile_details_grid, "p_x" . $lab_profile_details_grid->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_grid->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo $lab_profile_details_grid->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details_grid->ProfileTestCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileTestCode">
<span<?php echo $lab_profile_details_grid->ProfileTestCode->viewAttributes() ?>><?php echo $lab_profile_details_grid->ProfileTestCode->getViewValue() ?></span>
</span>
<?php if (!$lab_profile_details->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileTestCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileTestCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileTestCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileTestCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<td data-name="ProfileSubTestCode" <?php echo $lab_profile_details_grid->ProfileSubTestCode->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details_grid->ProfileSubTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details_grid->ProfileSubTestCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_ProfileSubTestCode">
<span<?php echo $lab_profile_details_grid->ProfileSubTestCode->viewAttributes() ?>><?php echo $lab_profile_details_grid->ProfileSubTestCode->getViewValue() ?></span>
</span>
<?php if (!$lab_profile_details->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder" <?php echo $lab_profile_details_grid->TestOrder->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_TestOrder" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->TestOrder->EditValue ?>"<?php echo $lab_profile_details_grid->TestOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_TestOrder" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->TestOrder->EditValue ?>"<?php echo $lab_profile_details_grid->TestOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_TestOrder">
<span<?php echo $lab_profile_details_grid->TestOrder->viewAttributes() ?>><?php echo $lab_profile_details_grid->TestOrder->getViewValue() ?></span>
</span>
<?php if (!$lab_profile_details->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->TestAmount->Visible) { // TestAmount ?>
		<td data-name="TestAmount" <?php echo $lab_profile_details_grid->TestAmount->cellAttributes() ?>>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_TestAmount" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->TestAmount->EditValue ?>"<?php echo $lab_profile_details_grid->TestAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->OldValue) ?>">
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_TestAmount" class="form-group">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->TestAmount->EditValue ?>"<?php echo $lab_profile_details_grid->TestAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_profile_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_profile_details_grid->RowCount ?>_lab_profile_details_TestAmount">
<span<?php echo $lab_profile_details_grid->TestAmount->viewAttributes() ?>><?php echo $lab_profile_details_grid->TestAmount->getViewValue() ?></span>
</span>
<?php if (!$lab_profile_details->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="flab_profile_detailsgrid$x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="flab_profile_detailsgrid$o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_details_grid->ListOptions->render("body", "right", $lab_profile_details_grid->RowCount);
?>
	</tr>
<?php if ($lab_profile_details->RowType == ROWTYPE_ADD || $lab_profile_details->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["flab_profile_detailsgrid", "load"], function() {
	flab_profile_detailsgrid.updateLists(<?php echo $lab_profile_details_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_profile_details_grid->isGridAdd() || $lab_profile_details->CurrentMode == "copy")
		if (!$lab_profile_details_grid->Recordset->EOF)
			$lab_profile_details_grid->Recordset->moveNext();
}
?>
<?php
	if ($lab_profile_details->CurrentMode == "add" || $lab_profile_details->CurrentMode == "copy" || $lab_profile_details->CurrentMode == "edit") {
		$lab_profile_details_grid->RowIndex = '$rowindex$';
		$lab_profile_details_grid->loadRowValues();

		// Set row properties
		$lab_profile_details->resetAttributes();
		$lab_profile_details->RowAttrs->merge(["data-rowindex" => $lab_profile_details_grid->RowIndex, "id" => "r0_lab_profile_details", "data-rowtype" => ROWTYPE_ADD]);
		$lab_profile_details->RowAttrs->appendClass("ew-template");
		$lab_profile_details->RowType = ROWTYPE_ADD;

		// Render row
		$lab_profile_details_grid->renderRow();

		// Render list options
		$lab_profile_details_grid->renderListOptions();
		$lab_profile_details_grid->StartRowCount = 0;
?>
	<tr <?php echo $lab_profile_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_details_grid->ListOptions->render("body", "left", $lab_profile_details_grid->RowIndex);
?>
	<?php if ($lab_profile_details_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$lab_profile_details->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_id" class="form-group lab_profile_details_id"></span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_id" class="form-group lab_profile_details_id">
<span<?php echo $lab_profile_details_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_id" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_profile_details_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->ProfileCode->Visible) { // ProfileCode ?>
		<td data-name="ProfileCode">
<?php if (!$lab_profile_details->isConfirm()) { ?>
<?php if ($lab_profile_details_grid->ProfileCode->getSessionValue() != "") { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details_grid->ProfileCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->ProfileCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->ProfileCode->EditValue ?>"<?php echo $lab_profile_details_grid->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details_grid->ProfileCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->ProfileCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->SubProfileCode->Visible) { // SubProfileCode ?>
		<td data-name="SubProfileCode">
<?php if (!$lab_profile_details->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode"><?php echo EmptyValue(strval($lab_profile_details_grid->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_grid->SubProfileCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_grid->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_grid->SubProfileCode->ReadOnly || $lab_profile_details_grid->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_grid->SubProfileCode->Lookup->getParamTag($lab_profile_details_grid, "p_x" . $lab_profile_details_grid->RowIndex . "_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_grid->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo $lab_profile_details_grid->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details_grid->SubProfileCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<span<?php echo $lab_profile_details_grid->SubProfileCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->SubProfileCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->SubProfileCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_SubProfileCode" value="<?php echo HtmlEncode($lab_profile_details_grid->SubProfileCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->ProfileTestCode->Visible) { // ProfileTestCode ?>
		<td data-name="ProfileTestCode">
<?php if (!$lab_profile_details->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode"><?php echo EmptyValue(strval($lab_profile_details_grid->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_grid->ProfileTestCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_grid->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_grid->ProfileTestCode->ReadOnly || $lab_profile_details_grid->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_grid->ProfileTestCode->Lookup->getParamTag($lab_profile_details_grid, "p_x" . $lab_profile_details_grid->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_grid->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo $lab_profile_details_grid->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details_grid->ProfileTestCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<span<?php echo $lab_profile_details_grid->ProfileTestCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->ProfileTestCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileTestCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileTestCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
		<td data-name="ProfileSubTestCode">
<?php if (!$lab_profile_details->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details_grid->ProfileSubTestCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<span<?php echo $lab_profile_details_grid->ProfileSubTestCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->ProfileSubTestCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_ProfileSubTestCode" value="<?php echo HtmlEncode($lab_profile_details_grid->ProfileSubTestCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder">
<?php if (!$lab_profile_details->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->TestOrder->EditValue ?>"<?php echo $lab_profile_details_grid->TestOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<span<?php echo $lab_profile_details_grid->TestOrder->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->TestOrder->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_profile_details_grid->TestOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_profile_details_grid->TestAmount->Visible) { // TestAmount ?>
		<td data-name="TestAmount">
<?php if (!$lab_profile_details->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_grid->TestAmount->EditValue ?>"<?php echo $lab_profile_details_grid->TestAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<span<?php echo $lab_profile_details_grid->TestAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_grid->TestAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="x<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" name="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" id="o<?php echo $lab_profile_details_grid->RowIndex ?>_TestAmount" value="<?php echo HtmlEncode($lab_profile_details_grid->TestAmount->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_details_grid->ListOptions->render("body", "right", $lab_profile_details_grid->RowIndex);
?>
<script>
loadjs.ready(["flab_profile_detailsgrid", "load"], function() {
	flab_profile_detailsgrid.updateLists(<?php echo $lab_profile_details_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($lab_profile_details->CurrentMode == "add" || $lab_profile_details->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $lab_profile_details_grid->FormKeyCountName ?>" id="<?php echo $lab_profile_details_grid->FormKeyCountName ?>" value="<?php echo $lab_profile_details_grid->KeyCount ?>">
<?php echo $lab_profile_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_profile_details->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $lab_profile_details_grid->FormKeyCountName ?>" id="<?php echo $lab_profile_details_grid->FormKeyCountName ?>" value="<?php echo $lab_profile_details_grid->KeyCount ?>">
<?php echo $lab_profile_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_profile_details->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="flab_profile_detailsgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_profile_details_grid->Recordset)
	$lab_profile_details_grid->Recordset->Close();
?>
<?php if ($lab_profile_details_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $lab_profile_details_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_profile_details_grid->TotalRecords == 0 && !$lab_profile_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_profile_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$lab_profile_details_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_profile_details->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_profile_details",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$lab_profile_details_grid->terminate();
?>