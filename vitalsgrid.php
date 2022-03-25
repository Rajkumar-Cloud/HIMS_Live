<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($vitals_grid))
	$vitals_grid = new vitals_grid();

// Run the page
$vitals_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vitals_grid->Page_Render();
?>
<?php if (!$vitals->isExport()) { ?>
<script>

// Form object
var fvitalsgrid = new ew.Form("fvitalsgrid", "grid");
fvitalsgrid.formKeyCountName = '<?php echo $vitals_grid->FormKeyCountName ?>';

// Validate form
fvitalsgrid.validate = function() {
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
		<?php if ($vitals_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->id->caption(), $vitals->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->Reception->caption(), $vitals->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($vitals->Reception->errorMessage()) ?>");
		<?php if ($vitals_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->PatientId->caption(), $vitals->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->PatientName->caption(), $vitals->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_grid->HT->Required) { ?>
			elm = this.getElements("x" + infix + "_HT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->HT->caption(), $vitals->HT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_grid->WT->Required) { ?>
			elm = this.getElements("x" + infix + "_WT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->WT->caption(), $vitals->WT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_grid->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->BP->caption(), $vitals->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($vitals_grid->PULSE->Required) { ?>
			elm = this.getElements("x" + infix + "_PULSE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $vitals->PULSE->caption(), $vitals->PULSE->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fvitalsgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "HT", false)) return false;
	if (ew.valueChanged(fobj, infix, "WT", false)) return false;
	if (ew.valueChanged(fobj, infix, "BP", false)) return false;
	if (ew.valueChanged(fobj, infix, "PULSE", false)) return false;
	return true;
}

// Form_CustomValidate event
fvitalsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvitalsgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<?php } ?>
<?php
$vitals_grid->renderOtherOptions();
?>
<?php $vitals_grid->showPageHeader(); ?>
<?php
$vitals_grid->showMessage();
?>
<?php if ($vitals_grid->TotalRecs > 0 || $vitals->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vitals_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vitals">
<?php if ($vitals_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $vitals_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fvitalsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_vitals" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_vitalsgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vitals_grid->RowType = ROWTYPE_HEADER;

// Render list options
$vitals_grid->renderListOptions();

// Render list options (header, left)
$vitals_grid->ListOptions->render("header", "left");
?>
<?php if ($vitals->id->Visible) { // id ?>
	<?php if ($vitals->sortUrl($vitals->id) == "") { ?>
		<th data-name="id" class="<?php echo $vitals->id->headerCellClass() ?>"><div id="elh_vitals_id" class="vitals_id"><div class="ew-table-header-caption"><?php echo $vitals->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $vitals->id->headerCellClass() ?>"><div><div id="elh_vitals_id" class="vitals_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
	<?php if ($vitals->sortUrl($vitals->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $vitals->Reception->headerCellClass() ?>"><div id="elh_vitals_Reception" class="vitals_Reception"><div class="ew-table-header-caption"><?php echo $vitals->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $vitals->Reception->headerCellClass() ?>"><div><div id="elh_vitals_Reception" class="vitals_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
	<?php if ($vitals->sortUrl($vitals->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $vitals->PatientId->headerCellClass() ?>"><div id="elh_vitals_PatientId" class="vitals_PatientId"><div class="ew-table-header-caption"><?php echo $vitals->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $vitals->PatientId->headerCellClass() ?>"><div><div id="elh_vitals_PatientId" class="vitals_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
	<?php if ($vitals->sortUrl($vitals->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $vitals->PatientName->headerCellClass() ?>"><div id="elh_vitals_PatientName" class="vitals_PatientName"><div class="ew-table-header-caption"><?php echo $vitals->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $vitals->PatientName->headerCellClass() ?>"><div><div id="elh_vitals_PatientName" class="vitals_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
	<?php if ($vitals->sortUrl($vitals->HT) == "") { ?>
		<th data-name="HT" class="<?php echo $vitals->HT->headerCellClass() ?>"><div id="elh_vitals_HT" class="vitals_HT"><div class="ew-table-header-caption"><?php echo $vitals->HT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HT" class="<?php echo $vitals->HT->headerCellClass() ?>"><div><div id="elh_vitals_HT" class="vitals_HT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->HT->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->HT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->HT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
	<?php if ($vitals->sortUrl($vitals->WT) == "") { ?>
		<th data-name="WT" class="<?php echo $vitals->WT->headerCellClass() ?>"><div id="elh_vitals_WT" class="vitals_WT"><div class="ew-table-header-caption"><?php echo $vitals->WT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WT" class="<?php echo $vitals->WT->headerCellClass() ?>"><div><div id="elh_vitals_WT" class="vitals_WT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->WT->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->WT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->WT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
	<?php if ($vitals->sortUrl($vitals->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $vitals->BP->headerCellClass() ?>"><div id="elh_vitals_BP" class="vitals_BP"><div class="ew-table-header-caption"><?php echo $vitals->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $vitals->BP->headerCellClass() ?>"><div><div id="elh_vitals_BP" class="vitals_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
	<?php if ($vitals->sortUrl($vitals->PULSE) == "") { ?>
		<th data-name="PULSE" class="<?php echo $vitals->PULSE->headerCellClass() ?>"><div id="elh_vitals_PULSE" class="vitals_PULSE"><div class="ew-table-header-caption"><?php echo $vitals->PULSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PULSE" class="<?php echo $vitals->PULSE->headerCellClass() ?>"><div><div id="elh_vitals_PULSE" class="vitals_PULSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->PULSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->PULSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->PULSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vitals_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$vitals_grid->StartRec = 1;
$vitals_grid->StopRec = $vitals_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $vitals_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($vitals_grid->FormKeyCountName) && ($vitals->isGridAdd() || $vitals->isGridEdit() || $vitals->isConfirm())) {
		$vitals_grid->KeyCount = $CurrentForm->getValue($vitals_grid->FormKeyCountName);
		$vitals_grid->StopRec = $vitals_grid->StartRec + $vitals_grid->KeyCount - 1;
	}
}
$vitals_grid->RecCnt = $vitals_grid->StartRec - 1;
if ($vitals_grid->Recordset && !$vitals_grid->Recordset->EOF) {
	$vitals_grid->Recordset->moveFirst();
	$selectLimit = $vitals_grid->UseSelectLimit;
	if (!$selectLimit && $vitals_grid->StartRec > 1)
		$vitals_grid->Recordset->move($vitals_grid->StartRec - 1);
} elseif (!$vitals->AllowAddDeleteRow && $vitals_grid->StopRec == 0) {
	$vitals_grid->StopRec = $vitals->GridAddRowCount;
}

// Initialize aggregate
$vitals->RowType = ROWTYPE_AGGREGATEINIT;
$vitals->resetAttributes();
$vitals_grid->renderRow();
if ($vitals->isGridAdd())
	$vitals_grid->RowIndex = 0;
if ($vitals->isGridEdit())
	$vitals_grid->RowIndex = 0;
while ($vitals_grid->RecCnt < $vitals_grid->StopRec) {
	$vitals_grid->RecCnt++;
	if ($vitals_grid->RecCnt >= $vitals_grid->StartRec) {
		$vitals_grid->RowCnt++;
		if ($vitals->isGridAdd() || $vitals->isGridEdit() || $vitals->isConfirm()) {
			$vitals_grid->RowIndex++;
			$CurrentForm->Index = $vitals_grid->RowIndex;
			if ($CurrentForm->hasValue($vitals_grid->FormActionName) && $vitals_grid->EventCancelled)
				$vitals_grid->RowAction = strval($CurrentForm->getValue($vitals_grid->FormActionName));
			elseif ($vitals->isGridAdd())
				$vitals_grid->RowAction = "insert";
			else
				$vitals_grid->RowAction = "";
		}

		// Set up key count
		$vitals_grid->KeyCount = $vitals_grid->RowIndex;

		// Init row class and style
		$vitals->resetAttributes();
		$vitals->CssClass = "";
		if ($vitals->isGridAdd()) {
			if ($vitals->CurrentMode == "copy") {
				$vitals_grid->loadRowValues($vitals_grid->Recordset); // Load row values
				$vitals_grid->setRecordKey($vitals_grid->RowOldKey, $vitals_grid->Recordset); // Set old record key
			} else {
				$vitals_grid->loadRowValues(); // Load default values
				$vitals_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$vitals_grid->loadRowValues($vitals_grid->Recordset); // Load row values
		}
		$vitals->RowType = ROWTYPE_VIEW; // Render view
		if ($vitals->isGridAdd()) // Grid add
			$vitals->RowType = ROWTYPE_ADD; // Render add
		if ($vitals->isGridAdd() && $vitals->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$vitals_grid->restoreCurrentRowFormValues($vitals_grid->RowIndex); // Restore form values
		if ($vitals->isGridEdit()) { // Grid edit
			if ($vitals->EventCancelled)
				$vitals_grid->restoreCurrentRowFormValues($vitals_grid->RowIndex); // Restore form values
			if ($vitals_grid->RowAction == "insert")
				$vitals->RowType = ROWTYPE_ADD; // Render add
			else
				$vitals->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($vitals->isGridEdit() && ($vitals->RowType == ROWTYPE_EDIT || $vitals->RowType == ROWTYPE_ADD) && $vitals->EventCancelled) // Update failed
			$vitals_grid->restoreCurrentRowFormValues($vitals_grid->RowIndex); // Restore form values
		if ($vitals->RowType == ROWTYPE_EDIT) // Edit row
			$vitals_grid->EditRowCnt++;
		if ($vitals->isConfirm()) // Confirm row
			$vitals_grid->restoreCurrentRowFormValues($vitals_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$vitals->RowAttrs = array_merge($vitals->RowAttrs, array('data-rowindex'=>$vitals_grid->RowCnt, 'id'=>'r' . $vitals_grid->RowCnt . '_vitals', 'data-rowtype'=>$vitals->RowType));

		// Render row
		$vitals_grid->renderRow();

		// Render list options
		$vitals_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($vitals_grid->RowAction <> "delete" && $vitals_grid->RowAction <> "insertdelete" && !($vitals_grid->RowAction == "insert" && $vitals->isConfirm() && $vitals_grid->emptyRow())) {
?>
	<tr<?php echo $vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vitals_grid->ListOptions->render("body", "left", $vitals_grid->RowCnt);
?>
	<?php if ($vitals->id->Visible) { // id ?>
		<td data-name="id"<?php echo $vitals->id->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="vitals" data-field="x_id" name="o<?php echo $vitals_grid->RowIndex ?>_id" id="o<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_id" class="form-group vitals_id">
<span<?php echo $vitals->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_id" name="x<?php echo $vitals_grid->RowIndex ?>_id" id="x<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->CurrentValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_id" class="vitals_id">
<span<?php echo $vitals->id->viewAttributes() ?>>
<?php echo $vitals->id->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_id" name="x<?php echo $vitals_grid->RowIndex ?>_id" id="x<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_id" name="o<?php echo $vitals_grid->RowIndex ?>_id" id="o<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_id" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_id" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_id" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_id" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vitals->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $vitals->Reception->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($vitals->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_Reception" class="form-group vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_Reception" class="form-group vitals_Reception">
<input type="text" data-table="vitals" data-field="x_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($vitals->Reception->getPlaceHolder()) ?>" value="<?php echo $vitals->Reception->EditValue ?>"<?php echo $vitals->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_Reception" name="o<?php echo $vitals_grid->RowIndex ?>_Reception" id="o<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($vitals->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_Reception" class="form-group vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_Reception" class="form-group vitals_Reception">
<input type="text" data-table="vitals" data-field="x_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($vitals->Reception->getPlaceHolder()) ?>" value="<?php echo $vitals->Reception->EditValue ?>"<?php echo $vitals->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_Reception" class="vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<?php echo $vitals->Reception->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_Reception" name="o<?php echo $vitals_grid->RowIndex ?>_Reception" id="o<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_Reception" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_Reception" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_Reception" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_Reception" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vitals->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $vitals->PatientId->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($vitals->PatientId->getSessionValue() <> "") { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientId" class="form-group vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientId" class="form-group vitals_PatientId">
<input type="text" data-table="vitals" data-field="x_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientId->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientId->EditValue ?>"<?php echo $vitals->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_PatientId" name="o<?php echo $vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($vitals->PatientId->getSessionValue() <> "") { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientId" class="form-group vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientId" class="form-group vitals_PatientId">
<input type="text" data-table="vitals" data-field="x_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientId->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientId->EditValue ?>"<?php echo $vitals->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientId" class="vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<?php echo $vitals->PatientId->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_PatientId" name="o<?php echo $vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_PatientId" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_PatientId" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_PatientId" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_PatientId" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vitals->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $vitals->PatientName->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($vitals->PatientName->getSessionValue() <> "") { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientName" class="form-group vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientName" class="form-group vitals_PatientName">
<input type="text" data-table="vitals" data-field="x_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientName->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientName->EditValue ?>"<?php echo $vitals->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_PatientName" name="o<?php echo $vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($vitals->PatientName->getSessionValue() <> "") { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientName" class="form-group vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientName" class="form-group vitals_PatientName">
<input type="text" data-table="vitals" data-field="x_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientName->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientName->EditValue ?>"<?php echo $vitals->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PatientName" class="vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<?php echo $vitals->PatientName->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_PatientName" name="o<?php echo $vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_PatientName" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_PatientName" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_PatientName" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_PatientName" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vitals->HT->Visible) { // HT ?>
		<td data-name="HT"<?php echo $vitals->HT->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_HT" class="form-group vitals_HT">
<input type="text" data-table="vitals" data-field="x_HT" name="x<?php echo $vitals_grid->RowIndex ?>_HT" id="x<?php echo $vitals_grid->RowIndex ?>_HT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->HT->getPlaceHolder()) ?>" value="<?php echo $vitals->HT->EditValue ?>"<?php echo $vitals->HT->editAttributes() ?>>
</span>
<input type="hidden" data-table="vitals" data-field="x_HT" name="o<?php echo $vitals_grid->RowIndex ?>_HT" id="o<?php echo $vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($vitals->HT->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_HT" class="form-group vitals_HT">
<input type="text" data-table="vitals" data-field="x_HT" name="x<?php echo $vitals_grid->RowIndex ?>_HT" id="x<?php echo $vitals_grid->RowIndex ?>_HT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->HT->getPlaceHolder()) ?>" value="<?php echo $vitals->HT->EditValue ?>"<?php echo $vitals->HT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_HT" class="vitals_HT">
<span<?php echo $vitals->HT->viewAttributes() ?>>
<?php echo $vitals->HT->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_HT" name="x<?php echo $vitals_grid->RowIndex ?>_HT" id="x<?php echo $vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($vitals->HT->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_HT" name="o<?php echo $vitals_grid->RowIndex ?>_HT" id="o<?php echo $vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($vitals->HT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_HT" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_HT" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($vitals->HT->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_HT" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_HT" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($vitals->HT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vitals->WT->Visible) { // WT ?>
		<td data-name="WT"<?php echo $vitals->WT->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_WT" class="form-group vitals_WT">
<input type="text" data-table="vitals" data-field="x_WT" name="x<?php echo $vitals_grid->RowIndex ?>_WT" id="x<?php echo $vitals_grid->RowIndex ?>_WT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->WT->getPlaceHolder()) ?>" value="<?php echo $vitals->WT->EditValue ?>"<?php echo $vitals->WT->editAttributes() ?>>
</span>
<input type="hidden" data-table="vitals" data-field="x_WT" name="o<?php echo $vitals_grid->RowIndex ?>_WT" id="o<?php echo $vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($vitals->WT->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_WT" class="form-group vitals_WT">
<input type="text" data-table="vitals" data-field="x_WT" name="x<?php echo $vitals_grid->RowIndex ?>_WT" id="x<?php echo $vitals_grid->RowIndex ?>_WT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->WT->getPlaceHolder()) ?>" value="<?php echo $vitals->WT->EditValue ?>"<?php echo $vitals->WT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_WT" class="vitals_WT">
<span<?php echo $vitals->WT->viewAttributes() ?>>
<?php echo $vitals->WT->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_WT" name="x<?php echo $vitals_grid->RowIndex ?>_WT" id="x<?php echo $vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($vitals->WT->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_WT" name="o<?php echo $vitals_grid->RowIndex ?>_WT" id="o<?php echo $vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($vitals->WT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_WT" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_WT" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($vitals->WT->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_WT" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_WT" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($vitals->WT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vitals->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $vitals->BP->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_BP" class="form-group vitals_BP">
<input type="text" data-table="vitals" data-field="x_BP" name="x<?php echo $vitals_grid->RowIndex ?>_BP" id="x<?php echo $vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->BP->getPlaceHolder()) ?>" value="<?php echo $vitals->BP->EditValue ?>"<?php echo $vitals->BP->editAttributes() ?>>
</span>
<input type="hidden" data-table="vitals" data-field="x_BP" name="o<?php echo $vitals_grid->RowIndex ?>_BP" id="o<?php echo $vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($vitals->BP->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_BP" class="form-group vitals_BP">
<input type="text" data-table="vitals" data-field="x_BP" name="x<?php echo $vitals_grid->RowIndex ?>_BP" id="x<?php echo $vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->BP->getPlaceHolder()) ?>" value="<?php echo $vitals->BP->EditValue ?>"<?php echo $vitals->BP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_BP" class="vitals_BP">
<span<?php echo $vitals->BP->viewAttributes() ?>>
<?php echo $vitals->BP->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_BP" name="x<?php echo $vitals_grid->RowIndex ?>_BP" id="x<?php echo $vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($vitals->BP->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_BP" name="o<?php echo $vitals_grid->RowIndex ?>_BP" id="o<?php echo $vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($vitals->BP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_BP" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_BP" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($vitals->BP->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_BP" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_BP" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($vitals->BP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($vitals->PULSE->Visible) { // PULSE ?>
		<td data-name="PULSE"<?php echo $vitals->PULSE->cellAttributes() ?>>
<?php if ($vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PULSE" class="form-group vitals_PULSE">
<input type="text" data-table="vitals" data-field="x_PULSE" name="x<?php echo $vitals_grid->RowIndex ?>_PULSE" id="x<?php echo $vitals_grid->RowIndex ?>_PULSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PULSE->getPlaceHolder()) ?>" value="<?php echo $vitals->PULSE->EditValue ?>"<?php echo $vitals->PULSE->editAttributes() ?>>
</span>
<input type="hidden" data-table="vitals" data-field="x_PULSE" name="o<?php echo $vitals_grid->RowIndex ?>_PULSE" id="o<?php echo $vitals_grid->RowIndex ?>_PULSE" value="<?php echo HtmlEncode($vitals->PULSE->OldValue) ?>">
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PULSE" class="form-group vitals_PULSE">
<input type="text" data-table="vitals" data-field="x_PULSE" name="x<?php echo $vitals_grid->RowIndex ?>_PULSE" id="x<?php echo $vitals_grid->RowIndex ?>_PULSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PULSE->getPlaceHolder()) ?>" value="<?php echo $vitals->PULSE->EditValue ?>"<?php echo $vitals->PULSE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $vitals_grid->RowCnt ?>_vitals_PULSE" class="vitals_PULSE">
<span<?php echo $vitals->PULSE->viewAttributes() ?>>
<?php echo $vitals->PULSE->getViewValue() ?></span>
</span>
<?php if (!$vitals->isConfirm()) { ?>
<input type="hidden" data-table="vitals" data-field="x_PULSE" name="x<?php echo $vitals_grid->RowIndex ?>_PULSE" id="x<?php echo $vitals_grid->RowIndex ?>_PULSE" value="<?php echo HtmlEncode($vitals->PULSE->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_PULSE" name="o<?php echo $vitals_grid->RowIndex ?>_PULSE" id="o<?php echo $vitals_grid->RowIndex ?>_PULSE" value="<?php echo HtmlEncode($vitals->PULSE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="vitals" data-field="x_PULSE" name="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_PULSE" id="fvitalsgrid$x<?php echo $vitals_grid->RowIndex ?>_PULSE" value="<?php echo HtmlEncode($vitals->PULSE->FormValue) ?>">
<input type="hidden" data-table="vitals" data-field="x_PULSE" name="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_PULSE" id="fvitalsgrid$o<?php echo $vitals_grid->RowIndex ?>_PULSE" value="<?php echo HtmlEncode($vitals->PULSE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vitals_grid->ListOptions->render("body", "right", $vitals_grid->RowCnt);
?>
	</tr>
<?php if ($vitals->RowType == ROWTYPE_ADD || $vitals->RowType == ROWTYPE_EDIT) { ?>
<script>
fvitalsgrid.updateLists(<?php echo $vitals_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$vitals->isGridAdd() || $vitals->CurrentMode == "copy")
		if (!$vitals_grid->Recordset->EOF)
			$vitals_grid->Recordset->moveNext();
}
?>
<?php
	if ($vitals->CurrentMode == "add" || $vitals->CurrentMode == "copy" || $vitals->CurrentMode == "edit") {
		$vitals_grid->RowIndex = '$rowindex$';
		$vitals_grid->loadRowValues();

		// Set row properties
		$vitals->resetAttributes();
		$vitals->RowAttrs = array_merge($vitals->RowAttrs, array('data-rowindex'=>$vitals_grid->RowIndex, 'id'=>'r0_vitals', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($vitals->RowAttrs["class"], "ew-template");
		$vitals->RowType = ROWTYPE_ADD;

		// Render row
		$vitals_grid->renderRow();

		// Render list options
		$vitals_grid->renderListOptions();
		$vitals_grid->StartRowCnt = 0;
?>
	<tr<?php echo $vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vitals_grid->ListOptions->render("body", "left", $vitals_grid->RowIndex);
?>
	<?php if ($vitals->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_vitals_id" class="form-group vitals_id">
<span<?php echo $vitals->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_id" name="x<?php echo $vitals_grid->RowIndex ?>_id" id="x<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_id" name="o<?php echo $vitals_grid->RowIndex ?>_id" id="o<?php echo $vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($vitals->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vitals->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$vitals->isConfirm()) { ?>
<?php if ($vitals->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_vitals_Reception" class="form-group vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_vitals_Reception" class="form-group vitals_Reception">
<input type="text" data-table="vitals" data-field="x_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($vitals->Reception->getPlaceHolder()) ?>" value="<?php echo $vitals->Reception->EditValue ?>"<?php echo $vitals->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_vitals_Reception" class="form-group vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_Reception" name="x<?php echo $vitals_grid->RowIndex ?>_Reception" id="x<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_Reception" name="o<?php echo $vitals_grid->RowIndex ?>_Reception" id="o<?php echo $vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($vitals->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vitals->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$vitals->isConfirm()) { ?>
<?php if ($vitals->PatientId->getSessionValue() <> "") { ?>
<span id="el$rowindex$_vitals_PatientId" class="form-group vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_vitals_PatientId" class="form-group vitals_PatientId">
<input type="text" data-table="vitals" data-field="x_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientId->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientId->EditValue ?>"<?php echo $vitals->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_vitals_PatientId" class="form-group vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_PatientId" name="x<?php echo $vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_PatientId" name="o<?php echo $vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($vitals->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vitals->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$vitals->isConfirm()) { ?>
<?php if ($vitals->PatientName->getSessionValue() <> "") { ?>
<span id="el$rowindex$_vitals_PatientName" class="form-group vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_vitals_PatientName" class="form-group vitals_PatientName">
<input type="text" data-table="vitals" data-field="x_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PatientName->getPlaceHolder()) ?>" value="<?php echo $vitals->PatientName->EditValue ?>"<?php echo $vitals->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_vitals_PatientName" class="form-group vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_PatientName" name="x<?php echo $vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_PatientName" name="o<?php echo $vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($vitals->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vitals->HT->Visible) { // HT ?>
		<td data-name="HT">
<?php if (!$vitals->isConfirm()) { ?>
<span id="el$rowindex$_vitals_HT" class="form-group vitals_HT">
<input type="text" data-table="vitals" data-field="x_HT" name="x<?php echo $vitals_grid->RowIndex ?>_HT" id="x<?php echo $vitals_grid->RowIndex ?>_HT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->HT->getPlaceHolder()) ?>" value="<?php echo $vitals->HT->EditValue ?>"<?php echo $vitals->HT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vitals_HT" class="form-group vitals_HT">
<span<?php echo $vitals->HT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->HT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_HT" name="x<?php echo $vitals_grid->RowIndex ?>_HT" id="x<?php echo $vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($vitals->HT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_HT" name="o<?php echo $vitals_grid->RowIndex ?>_HT" id="o<?php echo $vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($vitals->HT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vitals->WT->Visible) { // WT ?>
		<td data-name="WT">
<?php if (!$vitals->isConfirm()) { ?>
<span id="el$rowindex$_vitals_WT" class="form-group vitals_WT">
<input type="text" data-table="vitals" data-field="x_WT" name="x<?php echo $vitals_grid->RowIndex ?>_WT" id="x<?php echo $vitals_grid->RowIndex ?>_WT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->WT->getPlaceHolder()) ?>" value="<?php echo $vitals->WT->EditValue ?>"<?php echo $vitals->WT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vitals_WT" class="form-group vitals_WT">
<span<?php echo $vitals->WT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->WT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_WT" name="x<?php echo $vitals_grid->RowIndex ?>_WT" id="x<?php echo $vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($vitals->WT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_WT" name="o<?php echo $vitals_grid->RowIndex ?>_WT" id="o<?php echo $vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($vitals->WT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vitals->BP->Visible) { // BP ?>
		<td data-name="BP">
<?php if (!$vitals->isConfirm()) { ?>
<span id="el$rowindex$_vitals_BP" class="form-group vitals_BP">
<input type="text" data-table="vitals" data-field="x_BP" name="x<?php echo $vitals_grid->RowIndex ?>_BP" id="x<?php echo $vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->BP->getPlaceHolder()) ?>" value="<?php echo $vitals->BP->EditValue ?>"<?php echo $vitals->BP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vitals_BP" class="form-group vitals_BP">
<span<?php echo $vitals->BP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->BP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_BP" name="x<?php echo $vitals_grid->RowIndex ?>_BP" id="x<?php echo $vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($vitals->BP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_BP" name="o<?php echo $vitals_grid->RowIndex ?>_BP" id="o<?php echo $vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($vitals->BP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($vitals->PULSE->Visible) { // PULSE ?>
		<td data-name="PULSE">
<?php if (!$vitals->isConfirm()) { ?>
<span id="el$rowindex$_vitals_PULSE" class="form-group vitals_PULSE">
<input type="text" data-table="vitals" data-field="x_PULSE" name="x<?php echo $vitals_grid->RowIndex ?>_PULSE" id="x<?php echo $vitals_grid->RowIndex ?>_PULSE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($vitals->PULSE->getPlaceHolder()) ?>" value="<?php echo $vitals->PULSE->EditValue ?>"<?php echo $vitals->PULSE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_vitals_PULSE" class="form-group vitals_PULSE">
<span<?php echo $vitals->PULSE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($vitals->PULSE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="vitals" data-field="x_PULSE" name="x<?php echo $vitals_grid->RowIndex ?>_PULSE" id="x<?php echo $vitals_grid->RowIndex ?>_PULSE" value="<?php echo HtmlEncode($vitals->PULSE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="vitals" data-field="x_PULSE" name="o<?php echo $vitals_grid->RowIndex ?>_PULSE" id="o<?php echo $vitals_grid->RowIndex ?>_PULSE" value="<?php echo HtmlEncode($vitals->PULSE->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vitals_grid->ListOptions->render("body", "right", $vitals_grid->RowIndex);
?>
<script>
fvitalsgrid.updateLists(<?php echo $vitals_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($vitals->CurrentMode == "add" || $vitals->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $vitals_grid->FormKeyCountName ?>" id="<?php echo $vitals_grid->FormKeyCountName ?>" value="<?php echo $vitals_grid->KeyCount ?>">
<?php echo $vitals_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($vitals->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $vitals_grid->FormKeyCountName ?>" id="<?php echo $vitals_grid->FormKeyCountName ?>" value="<?php echo $vitals_grid->KeyCount ?>">
<?php echo $vitals_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($vitals->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fvitalsgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($vitals_grid->Recordset)
	$vitals_grid->Recordset->Close();
?>
</div>
<?php if ($vitals_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $vitals_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vitals_grid->TotalRecs == 0 && !$vitals->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vitals_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vitals_grid->terminate();
?>