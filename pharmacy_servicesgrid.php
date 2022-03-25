<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($pharmacy_services_grid))
	$pharmacy_services_grid = new pharmacy_services_grid();

// Run the page
$pharmacy_services_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_grid->Page_Render();
?>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>

// Form object
var fpharmacy_servicesgrid = new ew.Form("fpharmacy_servicesgrid", "grid");
fpharmacy_servicesgrid.formKeyCountName = '<?php echo $pharmacy_services_grid->FormKeyCountName ?>';

// Validate form
fpharmacy_servicesgrid.validate = function() {
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
		<?php if ($pharmacy_services_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->id->caption(), $pharmacy_services->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_grid->pharmacy_id->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->pharmacy_id->caption(), $pharmacy_services->pharmacy_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_grid->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->patient_id->caption(), $pharmacy_services->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_services->patient_id->errorMessage()) ?>");
		<?php if ($pharmacy_services_grid->name->Required) { ?>
			elm = this.getElements("x" + infix + "_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->name->caption(), $pharmacy_services->name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_grid->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->amount->caption(), $pharmacy_services->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_services->amount->errorMessage()) ?>");
		<?php if ($pharmacy_services_grid->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->charged_date->caption(), $pharmacy_services->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_services_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_services->status->caption(), $pharmacy_services->status->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpharmacy_servicesgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "pharmacy_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "patient_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "name", false)) return false;
	if (ew.valueChanged(fobj, infix, "amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_servicesgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_servicesgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_servicesgrid.lists["x_pharmacy_id"] = <?php echo $pharmacy_services_grid->pharmacy_id->Lookup->toClientList() ?>;
fpharmacy_servicesgrid.lists["x_pharmacy_id"].options = <?php echo JsonEncode($pharmacy_services_grid->pharmacy_id->lookupOptions()) ?>;
fpharmacy_servicesgrid.lists["x_name"] = <?php echo $pharmacy_services_grid->name->Lookup->toClientList() ?>;
fpharmacy_servicesgrid.lists["x_name"].options = <?php echo JsonEncode($pharmacy_services_grid->name->lookupOptions()) ?>;
fpharmacy_servicesgrid.lists["x_status"] = <?php echo $pharmacy_services_grid->status->Lookup->toClientList() ?>;
fpharmacy_servicesgrid.lists["x_status"].options = <?php echo JsonEncode($pharmacy_services_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$pharmacy_services_grid->renderOtherOptions();
?>
<?php $pharmacy_services_grid->showPageHeader(); ?>
<?php
$pharmacy_services_grid->showMessage();
?>
<?php if ($pharmacy_services_grid->TotalRecs > 0 || $pharmacy_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_services_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_services">
<?php if ($pharmacy_services_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_servicesgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_servicesgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_services_grid->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_services_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_services_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_services->id->Visible) { // id ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_services->id->headerCellClass() ?>"><div id="elh_pharmacy_services_id" class="pharmacy_services_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_services->id->headerCellClass() ?>"><div><div id="elh_pharmacy_services_id" class="pharmacy_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->pharmacy_id) == "") { ?>
		<th data-name="pharmacy_id" class="<?php echo $pharmacy_services->pharmacy_id->headerCellClass() ?>"><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services->pharmacy_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_id" class="<?php echo $pharmacy_services->pharmacy_id->headerCellClass() ?>"><div><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->pharmacy_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->pharmacy_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->pharmacy_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_services->patient_id->headerCellClass() ?>"><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_services->patient_id->headerCellClass() ?>"><div><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->name) == "") { ?>
		<th data-name="name" class="<?php echo $pharmacy_services->name->headerCellClass() ?>"><div id="elh_pharmacy_services_name" class="pharmacy_services_name"><div class="ew-table-header-caption"><?php echo $pharmacy_services->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $pharmacy_services->name->headerCellClass() ?>"><div><div id="elh_pharmacy_services_name" class="pharmacy_services_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $pharmacy_services->amount->headerCellClass() ?>"><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount"><div class="ew-table-header-caption"><?php echo $pharmacy_services->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $pharmacy_services->amount->headerCellClass() ?>"><div><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_services->charged_date->headerCellClass() ?>"><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date"><div class="ew-table-header-caption"><?php echo $pharmacy_services->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_services->charged_date->headerCellClass() ?>"><div><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $pharmacy_services->status->headerCellClass() ?>"><div id="elh_pharmacy_services_status" class="pharmacy_services_status"><div class="ew-table-header-caption"><?php echo $pharmacy_services->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $pharmacy_services->status->headerCellClass() ?>"><div><div id="elh_pharmacy_services_status" class="pharmacy_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_services_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$pharmacy_services_grid->StartRec = 1;
$pharmacy_services_grid->StopRec = $pharmacy_services_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $pharmacy_services_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_services_grid->FormKeyCountName) && ($pharmacy_services->isGridAdd() || $pharmacy_services->isGridEdit() || $pharmacy_services->isConfirm())) {
		$pharmacy_services_grid->KeyCount = $CurrentForm->getValue($pharmacy_services_grid->FormKeyCountName);
		$pharmacy_services_grid->StopRec = $pharmacy_services_grid->StartRec + $pharmacy_services_grid->KeyCount - 1;
	}
}
$pharmacy_services_grid->RecCnt = $pharmacy_services_grid->StartRec - 1;
if ($pharmacy_services_grid->Recordset && !$pharmacy_services_grid->Recordset->EOF) {
	$pharmacy_services_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_services_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_services_grid->StartRec > 1)
		$pharmacy_services_grid->Recordset->move($pharmacy_services_grid->StartRec - 1);
} elseif (!$pharmacy_services->AllowAddDeleteRow && $pharmacy_services_grid->StopRec == 0) {
	$pharmacy_services_grid->StopRec = $pharmacy_services->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_services->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_services->resetAttributes();
$pharmacy_services_grid->renderRow();
if ($pharmacy_services->isGridAdd())
	$pharmacy_services_grid->RowIndex = 0;
if ($pharmacy_services->isGridEdit())
	$pharmacy_services_grid->RowIndex = 0;
while ($pharmacy_services_grid->RecCnt < $pharmacy_services_grid->StopRec) {
	$pharmacy_services_grid->RecCnt++;
	if ($pharmacy_services_grid->RecCnt >= $pharmacy_services_grid->StartRec) {
		$pharmacy_services_grid->RowCnt++;
		if ($pharmacy_services->isGridAdd() || $pharmacy_services->isGridEdit() || $pharmacy_services->isConfirm()) {
			$pharmacy_services_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_services_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_services_grid->FormActionName) && $pharmacy_services_grid->EventCancelled)
				$pharmacy_services_grid->RowAction = strval($CurrentForm->getValue($pharmacy_services_grid->FormActionName));
			elseif ($pharmacy_services->isGridAdd())
				$pharmacy_services_grid->RowAction = "insert";
			else
				$pharmacy_services_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_services_grid->KeyCount = $pharmacy_services_grid->RowIndex;

		// Init row class and style
		$pharmacy_services->resetAttributes();
		$pharmacy_services->CssClass = "";
		if ($pharmacy_services->isGridAdd()) {
			if ($pharmacy_services->CurrentMode == "copy") {
				$pharmacy_services_grid->loadRowValues($pharmacy_services_grid->Recordset); // Load row values
				$pharmacy_services_grid->setRecordKey($pharmacy_services_grid->RowOldKey, $pharmacy_services_grid->Recordset); // Set old record key
			} else {
				$pharmacy_services_grid->loadRowValues(); // Load default values
				$pharmacy_services_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$pharmacy_services_grid->loadRowValues($pharmacy_services_grid->Recordset); // Load row values
		}
		$pharmacy_services->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_services->isGridAdd()) // Grid add
			$pharmacy_services->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_services->isGridAdd() && $pharmacy_services->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_services_grid->restoreCurrentRowFormValues($pharmacy_services_grid->RowIndex); // Restore form values
		if ($pharmacy_services->isGridEdit()) { // Grid edit
			if ($pharmacy_services->EventCancelled)
				$pharmacy_services_grid->restoreCurrentRowFormValues($pharmacy_services_grid->RowIndex); // Restore form values
			if ($pharmacy_services_grid->RowAction == "insert")
				$pharmacy_services->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_services->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_services->isGridEdit() && ($pharmacy_services->RowType == ROWTYPE_EDIT || $pharmacy_services->RowType == ROWTYPE_ADD) && $pharmacy_services->EventCancelled) // Update failed
			$pharmacy_services_grid->restoreCurrentRowFormValues($pharmacy_services_grid->RowIndex); // Restore form values
		if ($pharmacy_services->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_services_grid->EditRowCnt++;
		if ($pharmacy_services->isConfirm()) // Confirm row
			$pharmacy_services_grid->restoreCurrentRowFormValues($pharmacy_services_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_services->RowAttrs = array_merge($pharmacy_services->RowAttrs, array('data-rowindex'=>$pharmacy_services_grid->RowCnt, 'id'=>'r' . $pharmacy_services_grid->RowCnt . '_pharmacy_services', 'data-rowtype'=>$pharmacy_services->RowType));

		// Render row
		$pharmacy_services_grid->renderRow();

		// Render list options
		$pharmacy_services_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_services_grid->RowAction <> "delete" && $pharmacy_services_grid->RowAction <> "insertdelete" && !($pharmacy_services_grid->RowAction == "insert" && $pharmacy_services->isConfirm() && $pharmacy_services_grid->emptyRow())) {
?>
	<tr<?php echo $pharmacy_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_services_grid->ListOptions->render("body", "left", $pharmacy_services_grid->RowCnt);
?>
	<?php if ($pharmacy_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_services->id->cellAttributes() ?>>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_id" class="form-group pharmacy_services_id">
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_id" class="pharmacy_services_id">
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<?php echo $pharmacy_services->id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_services->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
		<td data-name="pharmacy_id"<?php echo $pharmacy_services->pharmacy_id->cellAttributes() ?>>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_services->pharmacy_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->pharmacy_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_pharmacy_id" data-value-separator="<?php echo $pharmacy_services->pharmacy_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id"<?php echo $pharmacy_services->pharmacy_id->editAttributes() ?>>
		<?php echo $pharmacy_services->pharmacy_id->selectOptionListHtml("x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id") ?>
	</select>
</div>
<?php echo $pharmacy_services->pharmacy_id->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_pharmacy_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_services->pharmacy_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->pharmacy_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_pharmacy_id" data-value-separator="<?php echo $pharmacy_services->pharmacy_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id"<?php echo $pharmacy_services->pharmacy_id->editAttributes() ?>>
		<?php echo $pharmacy_services->pharmacy_id->selectOptionListHtml("x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id") ?>
	</select>
</div>
<?php echo $pharmacy_services->pharmacy_id->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_pharmacy_id") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<?php echo $pharmacy_services->pharmacy_id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_services->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" name="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" id="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" name="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" id="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $pharmacy_services->patient_id->cellAttributes() ?>>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_services->patient_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<input type="text" data-table="pharmacy_services" data-field="x_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->patient_id->EditValue ?>"<?php echo $pharmacy_services->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_services->patient_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<input type="text" data-table="pharmacy_services" data-field="x_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->patient_id->EditValue ?>"<?php echo $pharmacy_services->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_patient_id" class="pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<?php echo $pharmacy_services->patient_id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_services->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" name="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" name="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->name->Visible) { // name ?>
		<td data-name="name"<?php echo $pharmacy_services->name->cellAttributes() ?>>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_services->name->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_name" class="form-group pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_name" class="form-group pharmacy_services_name">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_services_grid->RowIndex ?>_name"><?php echo strval($pharmacy_services->name->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_services->name->ViewValue) : $pharmacy_services->name->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_services->name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_services->name->ReadOnly || $pharmacy_services->name->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_services_grid->RowIndex ?>_name',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_services->name->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_name") ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_services->name->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo $pharmacy_services->name->CurrentValue ?>"<?php echo $pharmacy_services->name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_services->name->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_name" class="form-group pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_name" class="form-group pharmacy_services_name">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_services_grid->RowIndex ?>_name"><?php echo strval($pharmacy_services->name->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_services->name->ViewValue) : $pharmacy_services->name->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_services->name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_services->name->ReadOnly || $pharmacy_services->name->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_services_grid->RowIndex ?>_name',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_services->name->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_name") ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_services->name->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo $pharmacy_services->name->CurrentValue ?>"<?php echo $pharmacy_services->name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_name" class="pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<?php echo $pharmacy_services->name->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_services->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_name" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" name="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_name" name="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $pharmacy_services->amount->cellAttributes() ?>>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_services->amount->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<input type="text" data-table="pharmacy_services" data-field="x_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->amount->EditValue ?>"<?php echo $pharmacy_services->amount->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_services->amount->getSessionValue() <> "") { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<input type="text" data-table="pharmacy_services" data-field="x_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->amount->EditValue ?>"<?php echo $pharmacy_services->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_amount" class="pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<?php echo $pharmacy_services->amount->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_services->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" name="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" name="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $pharmacy_services->charged_date->cellAttributes() ?>>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($pharmacy_services->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_charged_date" class="pharmacy_services_charged_date">
<span<?php echo $pharmacy_services->charged_date->viewAttributes() ?>>
<?php echo $pharmacy_services->charged_date->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_services->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($pharmacy_services->charged_date->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($pharmacy_services->charged_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" name="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" id="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($pharmacy_services->charged_date->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" name="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" id="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($pharmacy_services->charged_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $pharmacy_services->status->cellAttributes() ?>>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_status" class="form-group pharmacy_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_status" data-value-separator="<?php echo $pharmacy_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_status" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_status"<?php echo $pharmacy_services->status->editAttributes() ?>>
		<?php echo $pharmacy_services->status->selectOptionListHtml("x<?php echo $pharmacy_services_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $pharmacy_services->status->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_status" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($pharmacy_services->status->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_status" class="form-group pharmacy_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_status" data-value-separator="<?php echo $pharmacy_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_status" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_status"<?php echo $pharmacy_services->status->editAttributes() ?>>
		<?php echo $pharmacy_services->status->selectOptionListHtml("x<?php echo $pharmacy_services_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $pharmacy_services->status->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($pharmacy_services->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_services_grid->RowCnt ?>_pharmacy_services_status" class="pharmacy_services_status">
<span<?php echo $pharmacy_services->status->viewAttributes() ?>>
<?php echo $pharmacy_services->status->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_services->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_status" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($pharmacy_services->status->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_status" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_status" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($pharmacy_services->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" name="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_status" id="fpharmacy_servicesgrid$x<?php echo $pharmacy_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($pharmacy_services->status->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_status" name="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_status" id="fpharmacy_servicesgrid$o<?php echo $pharmacy_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($pharmacy_services->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_services_grid->ListOptions->render("body", "right", $pharmacy_services_grid->RowCnt);
?>
	</tr>
<?php if ($pharmacy_services->RowType == ROWTYPE_ADD || $pharmacy_services->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_servicesgrid.updateLists(<?php echo $pharmacy_services_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_services->isGridAdd() || $pharmacy_services->CurrentMode == "copy")
		if (!$pharmacy_services_grid->Recordset->EOF)
			$pharmacy_services_grid->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_services->CurrentMode == "add" || $pharmacy_services->CurrentMode == "copy" || $pharmacy_services->CurrentMode == "edit") {
		$pharmacy_services_grid->RowIndex = '$rowindex$';
		$pharmacy_services_grid->loadRowValues();

		// Set row properties
		$pharmacy_services->resetAttributes();
		$pharmacy_services->RowAttrs = array_merge($pharmacy_services->RowAttrs, array('data-rowindex'=>$pharmacy_services_grid->RowIndex, 'id'=>'r0_pharmacy_services', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_services->RowAttrs["class"], "ew-template");
		$pharmacy_services->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_services_grid->renderRow();

		// Render list options
		$pharmacy_services_grid->renderListOptions();
		$pharmacy_services_grid->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_services_grid->ListOptions->render("body", "left", $pharmacy_services_grid->RowIndex);
?>
	<?php if ($pharmacy_services->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$pharmacy_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_id" class="form-group pharmacy_services_id">
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_services->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
		<td data-name="pharmacy_id">
<?php if (!$pharmacy_services->isConfirm()) { ?>
<?php if ($pharmacy_services->pharmacy_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->pharmacy_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_pharmacy_id" data-value-separator="<?php echo $pharmacy_services->pharmacy_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id"<?php echo $pharmacy_services->pharmacy_id->editAttributes() ?>>
		<?php echo $pharmacy_services->pharmacy_id->selectOptionListHtml("x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id") ?>
	</select>
</div>
<?php echo $pharmacy_services->pharmacy_id->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_pharmacy_id") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->pharmacy_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_pharmacy_id" value="<?php echo HtmlEncode($pharmacy_services->pharmacy_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id">
<?php if (!$pharmacy_services->isConfirm()) { ?>
<?php if ($pharmacy_services->patient_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<input type="text" data-table="pharmacy_services" data-field="x_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->patient_id->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->patient_id->EditValue ?>"<?php echo $pharmacy_services->patient_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->patient_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_patient_id" value="<?php echo HtmlEncode($pharmacy_services->patient_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_services->name->Visible) { // name ?>
		<td data-name="name">
<?php if (!$pharmacy_services->isConfirm()) { ?>
<?php if ($pharmacy_services->name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_pharmacy_services_name" class="form-group pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_name" class="form-group pharmacy_services_name">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_services_grid->RowIndex ?>_name"><?php echo strval($pharmacy_services->name->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_services->name->ViewValue) : $pharmacy_services->name->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_services->name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_services->name->ReadOnly || $pharmacy_services->name->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_services_grid->RowIndex ?>_name',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_services->name->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_name") ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_services->name->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo $pharmacy_services->name->CurrentValue ?>"<?php echo $pharmacy_services->name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_name" class="form-group pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_name" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_name" value="<?php echo HtmlEncode($pharmacy_services->name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_services->amount->Visible) { // amount ?>
		<td data-name="amount">
<?php if (!$pharmacy_services->isConfirm()) { ?>
<?php if ($pharmacy_services->amount->getSessionValue() <> "") { ?>
<span id="el$rowindex$_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<input type="text" data-table="pharmacy_services" data-field="x_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_services->amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_services->amount->EditValue ?>"<?php echo $pharmacy_services->amount->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_amount" value="<?php echo HtmlEncode($pharmacy_services->amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date">
<?php if (!$pharmacy_services->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_charged_date" class="form-group pharmacy_services_charged_date">
<span<?php echo $pharmacy_services->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->charged_date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($pharmacy_services->charged_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_charged_date" value="<?php echo HtmlEncode($pharmacy_services->charged_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_services->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$pharmacy_services->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_services_status" class="form-group pharmacy_services_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_services" data-field="x_status" data-value-separator="<?php echo $pharmacy_services->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_status" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_status"<?php echo $pharmacy_services->status->editAttributes() ?>>
		<?php echo $pharmacy_services->status->selectOptionListHtml("x<?php echo $pharmacy_services_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $pharmacy_services->status->Lookup->getParamTag("p_x" . $pharmacy_services_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_status" class="form-group pharmacy_services_status">
<span<?php echo $pharmacy_services->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_services->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" name="x<?php echo $pharmacy_services_grid->RowIndex ?>_status" id="x<?php echo $pharmacy_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($pharmacy_services->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" name="o<?php echo $pharmacy_services_grid->RowIndex ?>_status" id="o<?php echo $pharmacy_services_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($pharmacy_services->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_services_grid->ListOptions->render("body", "right", $pharmacy_services_grid->RowIndex);
?>
<script>
fpharmacy_servicesgrid.updateLists(<?php echo $pharmacy_services_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($pharmacy_services->CurrentMode == "add" || $pharmacy_services->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $pharmacy_services_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_services_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_services_grid->KeyCount ?>">
<?php echo $pharmacy_services_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_services->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $pharmacy_services_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_services_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_services_grid->KeyCount ?>">
<?php echo $pharmacy_services_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_services->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpharmacy_servicesgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($pharmacy_services_grid->Recordset)
	$pharmacy_services_grid->Recordset->Close();
?>
</div>
<?php if ($pharmacy_services_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_services_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_services_grid->TotalRecs == 0 && !$pharmacy_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_services_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_services_grid->terminate();
?>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_services", "95%", "");
</script>
<?php } ?>