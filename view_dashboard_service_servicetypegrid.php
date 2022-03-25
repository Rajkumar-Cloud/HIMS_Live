<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_dashboard_service_servicetype_grid))
	$view_dashboard_service_servicetype_grid = new view_dashboard_service_servicetype_grid();

// Run the page
$view_dashboard_service_servicetype_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_servicetype_grid->Page_Render();
?>
<?php if (!$view_dashboard_service_servicetype->isExport()) { ?>
<script>

// Form object
var fview_dashboard_service_servicetypegrid = new ew.Form("fview_dashboard_service_servicetypegrid", "grid");
fview_dashboard_service_servicetypegrid.formKeyCountName = '<?php echo $view_dashboard_service_servicetype_grid->FormKeyCountName ?>';

// Validate form
fview_dashboard_service_servicetypegrid.validate = function() {
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
		<?php if ($view_dashboard_service_servicetype_grid->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_servicetype->DEPARTMENT->caption(), $view_dashboard_service_servicetype->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_servicetype_grid->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_servicetype->SERVICE_TYPE->caption(), $view_dashboard_service_servicetype->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_service_servicetype_grid->sum28SubTotal29->Required) { ?>
			elm = this.getElements("x" + infix + "_sum28SubTotal29");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_servicetype->sum28SubTotal29->caption(), $view_dashboard_service_servicetype->sum28SubTotal29->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sum28SubTotal29");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_servicetype->sum28SubTotal29->errorMessage()) ?>");
		<?php if ($view_dashboard_service_servicetype_grid->createdDate->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_servicetype->createdDate->caption(), $view_dashboard_service_servicetype->createdDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_servicetype->createdDate->errorMessage()) ?>");
		<?php if ($view_dashboard_service_servicetype_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_service_servicetype->HospID->caption(), $view_dashboard_service_servicetype->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_servicetype->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_dashboard_service_servicetypegrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "DEPARTMENT", false)) return false;
	if (ew.valueChanged(fobj, infix, "SERVICE_TYPE", false)) return false;
	if (ew.valueChanged(fobj, infix, "sum28SubTotal29", false)) return false;
	if (ew.valueChanged(fobj, infix, "createdDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_service_servicetypegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_servicetypegrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_service_servicetypegrid.lists["x_HospID"] = <?php echo $view_dashboard_service_servicetype_grid->HospID->Lookup->toClientList() ?>;
fview_dashboard_service_servicetypegrid.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_service_servicetype_grid->HospID->lookupOptions()) ?>;
fview_dashboard_service_servicetypegrid.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_dashboard_service_servicetype_grid->renderOtherOptions();
?>
<?php $view_dashboard_service_servicetype_grid->showPageHeader(); ?>
<?php
$view_dashboard_service_servicetype_grid->showMessage();
?>
<?php if ($view_dashboard_service_servicetype_grid->TotalRecs > 0 || $view_dashboard_service_servicetype->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_service_servicetype_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_servicetype">
<?php if ($view_dashboard_service_servicetype_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_dashboard_service_servicetype_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_service_servicetypegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_service_servicetype" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_service_servicetypegrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_service_servicetype_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_service_servicetype_grid->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_servicetype_grid->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_servicetype->sortUrl($view_dashboard_service_servicetype->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_DEPARTMENT" class="view_dashboard_service_servicetype_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_servicetype_DEPARTMENT" class="view_dashboard_service_servicetype_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_servicetype->sortUrl($view_dashboard_service_servicetype->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_SERVICE_TYPE" class="view_dashboard_service_servicetype_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_servicetype_SERVICE_TYPE" class="view_dashboard_service_servicetype_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
	<?php if ($view_dashboard_service_servicetype->sortUrl($view_dashboard_service_servicetype->sum28SubTotal29) == "") { ?>
		<th data-name="sum28SubTotal29" class="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_sum28SubTotal29" class="view_dashboard_service_servicetype_sum28SubTotal29"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->sum28SubTotal29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28SubTotal29" class="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_servicetype_sum28SubTotal29" class="view_dashboard_service_servicetype_sum28SubTotal29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->sum28SubTotal29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype->sum28SubTotal29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype->sum28SubTotal29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_servicetype->sortUrl($view_dashboard_service_servicetype->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_servicetype->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_createdDate" class="view_dashboard_service_servicetype_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_servicetype->createdDate->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_servicetype_createdDate" class="view_dashboard_service_servicetype_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_servicetype->sortUrl($view_dashboard_service_servicetype->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_servicetype->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_HospID" class="view_dashboard_service_servicetype_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_servicetype->HospID->headerCellClass() ?>"><div><div id="elh_view_dashboard_service_servicetype_HospID" class="view_dashboard_service_servicetype_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_servicetype->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_servicetype->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_servicetype->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_servicetype_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_dashboard_service_servicetype_grid->StartRec = 1;
$view_dashboard_service_servicetype_grid->StopRec = $view_dashboard_service_servicetype_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_dashboard_service_servicetype_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_dashboard_service_servicetype_grid->FormKeyCountName) && ($view_dashboard_service_servicetype->isGridAdd() || $view_dashboard_service_servicetype->isGridEdit() || $view_dashboard_service_servicetype->isConfirm())) {
		$view_dashboard_service_servicetype_grid->KeyCount = $CurrentForm->getValue($view_dashboard_service_servicetype_grid->FormKeyCountName);
		$view_dashboard_service_servicetype_grid->StopRec = $view_dashboard_service_servicetype_grid->StartRec + $view_dashboard_service_servicetype_grid->KeyCount - 1;
	}
}
$view_dashboard_service_servicetype_grid->RecCnt = $view_dashboard_service_servicetype_grid->StartRec - 1;
if ($view_dashboard_service_servicetype_grid->Recordset && !$view_dashboard_service_servicetype_grid->Recordset->EOF) {
	$view_dashboard_service_servicetype_grid->Recordset->moveFirst();
	$selectLimit = $view_dashboard_service_servicetype_grid->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_service_servicetype_grid->StartRec > 1)
		$view_dashboard_service_servicetype_grid->Recordset->move($view_dashboard_service_servicetype_grid->StartRec - 1);
} elseif (!$view_dashboard_service_servicetype->AllowAddDeleteRow && $view_dashboard_service_servicetype_grid->StopRec == 0) {
	$view_dashboard_service_servicetype_grid->StopRec = $view_dashboard_service_servicetype->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_service_servicetype->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_service_servicetype->resetAttributes();
$view_dashboard_service_servicetype_grid->renderRow();
if ($view_dashboard_service_servicetype->isGridAdd())
	$view_dashboard_service_servicetype_grid->RowIndex = 0;
if ($view_dashboard_service_servicetype->isGridEdit())
	$view_dashboard_service_servicetype_grid->RowIndex = 0;
while ($view_dashboard_service_servicetype_grid->RecCnt < $view_dashboard_service_servicetype_grid->StopRec) {
	$view_dashboard_service_servicetype_grid->RecCnt++;
	if ($view_dashboard_service_servicetype_grid->RecCnt >= $view_dashboard_service_servicetype_grid->StartRec) {
		$view_dashboard_service_servicetype_grid->RowCnt++;
		if ($view_dashboard_service_servicetype->isGridAdd() || $view_dashboard_service_servicetype->isGridEdit() || $view_dashboard_service_servicetype->isConfirm()) {
			$view_dashboard_service_servicetype_grid->RowIndex++;
			$CurrentForm->Index = $view_dashboard_service_servicetype_grid->RowIndex;
			if ($CurrentForm->hasValue($view_dashboard_service_servicetype_grid->FormActionName) && $view_dashboard_service_servicetype_grid->EventCancelled)
				$view_dashboard_service_servicetype_grid->RowAction = strval($CurrentForm->getValue($view_dashboard_service_servicetype_grid->FormActionName));
			elseif ($view_dashboard_service_servicetype->isGridAdd())
				$view_dashboard_service_servicetype_grid->RowAction = "insert";
			else
				$view_dashboard_service_servicetype_grid->RowAction = "";
		}

		// Set up key count
		$view_dashboard_service_servicetype_grid->KeyCount = $view_dashboard_service_servicetype_grid->RowIndex;

		// Init row class and style
		$view_dashboard_service_servicetype->resetAttributes();
		$view_dashboard_service_servicetype->CssClass = "";
		if ($view_dashboard_service_servicetype->isGridAdd()) {
			if ($view_dashboard_service_servicetype->CurrentMode == "copy") {
				$view_dashboard_service_servicetype_grid->loadRowValues($view_dashboard_service_servicetype_grid->Recordset); // Load row values
				$view_dashboard_service_servicetype_grid->setRecordKey($view_dashboard_service_servicetype_grid->RowOldKey, $view_dashboard_service_servicetype_grid->Recordset); // Set old record key
			} else {
				$view_dashboard_service_servicetype_grid->loadRowValues(); // Load default values
				$view_dashboard_service_servicetype_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_dashboard_service_servicetype_grid->loadRowValues($view_dashboard_service_servicetype_grid->Recordset); // Load row values
		}
		$view_dashboard_service_servicetype->RowType = ROWTYPE_VIEW; // Render view
		if ($view_dashboard_service_servicetype->isGridAdd()) // Grid add
			$view_dashboard_service_servicetype->RowType = ROWTYPE_ADD; // Render add
		if ($view_dashboard_service_servicetype->isGridAdd() && $view_dashboard_service_servicetype->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_dashboard_service_servicetype_grid->restoreCurrentRowFormValues($view_dashboard_service_servicetype_grid->RowIndex); // Restore form values
		if ($view_dashboard_service_servicetype->isGridEdit()) { // Grid edit
			if ($view_dashboard_service_servicetype->EventCancelled)
				$view_dashboard_service_servicetype_grid->restoreCurrentRowFormValues($view_dashboard_service_servicetype_grid->RowIndex); // Restore form values
			if ($view_dashboard_service_servicetype_grid->RowAction == "insert")
				$view_dashboard_service_servicetype->RowType = ROWTYPE_ADD; // Render add
			else
				$view_dashboard_service_servicetype->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_dashboard_service_servicetype->isGridEdit() && ($view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT || $view_dashboard_service_servicetype->RowType == ROWTYPE_ADD) && $view_dashboard_service_servicetype->EventCancelled) // Update failed
			$view_dashboard_service_servicetype_grid->restoreCurrentRowFormValues($view_dashboard_service_servicetype_grid->RowIndex); // Restore form values
		if ($view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT) // Edit row
			$view_dashboard_service_servicetype_grid->EditRowCnt++;
		if ($view_dashboard_service_servicetype->isConfirm()) // Confirm row
			$view_dashboard_service_servicetype_grid->restoreCurrentRowFormValues($view_dashboard_service_servicetype_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_dashboard_service_servicetype->RowAttrs = array_merge($view_dashboard_service_servicetype->RowAttrs, array('data-rowindex'=>$view_dashboard_service_servicetype_grid->RowCnt, 'id'=>'r' . $view_dashboard_service_servicetype_grid->RowCnt . '_view_dashboard_service_servicetype', 'data-rowtype'=>$view_dashboard_service_servicetype->RowType));

		// Render row
		$view_dashboard_service_servicetype_grid->renderRow();

		// Render list options
		$view_dashboard_service_servicetype_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_dashboard_service_servicetype_grid->RowAction <> "delete" && $view_dashboard_service_servicetype_grid->RowAction <> "insertdelete" && !($view_dashboard_service_servicetype_grid->RowAction == "insert" && $view_dashboard_service_servicetype->isConfirm() && $view_dashboard_service_servicetype_grid->emptyRow())) {
?>
	<tr<?php echo $view_dashboard_service_servicetype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_servicetype_grid->ListOptions->render("body", "left", $view_dashboard_service_servicetype_grid->RowCnt);
?>
	<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $view_dashboard_service_servicetype->DEPARTMENT->cellAttributes() ?>>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<span<?php echo $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_servicetype->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<span<?php echo $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_servicetype->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_DEPARTMENT" class="view_dashboard_service_servicetype_DEPARTMENT">
<span<?php echo $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->DEPARTMENT->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE"<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group view_dashboard_service_servicetype_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group view_dashboard_service_servicetype_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_SERVICE_TYPE" class="view_dashboard_service_servicetype_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<td data-name="sum28SubTotal29"<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->cellAttributes() ?>>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_sum28SubTotal29" class="form-group view_dashboard_service_servicetype_sum28SubTotal29">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->EditValue ?>"<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_sum28SubTotal29" class="form-group view_dashboard_service_servicetype_sum28SubTotal29">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->EditValue ?>"<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_sum28SubTotal29" class="view_dashboard_service_servicetype_sum28SubTotal29">
<span<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_dashboard_service_servicetype->createdDate->cellAttributes() ?>>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_servicetype->createdDate->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<span<?php echo $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_servicetype->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->createdDate->EditValue ?>"<?php echo $view_dashboard_service_servicetype->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_servicetype->createdDate->ReadOnly && !$view_dashboard_service_servicetype->createdDate->Disabled && !isset($view_dashboard_service_servicetype->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_servicetype->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_servicetypegrid", "x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_servicetype->createdDate->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<span<?php echo $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_servicetype->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->createdDate->EditValue ?>"<?php echo $view_dashboard_service_servicetype->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_servicetype->createdDate->ReadOnly && !$view_dashboard_service_servicetype->createdDate->Disabled && !isset($view_dashboard_service_servicetype->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_servicetype->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_servicetypegrid", "x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_createdDate" class="view_dashboard_service_servicetype_createdDate">
<span<?php echo $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->createdDate->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" name="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" name="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_service_servicetype->HospID->cellAttributes() ?>>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_service_servicetype->HospID->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<span<?php echo $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_service_servicetype->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_service_servicetype->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_service_servicetype_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_servicetype->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_servicetype->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_service_servicetypegrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_service_servicetype->HospID->Lookup->getParamTag("p_x" . $view_dashboard_service_servicetype_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_service_servicetype->HospID->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<span<?php echo $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_service_servicetype->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_service_servicetype->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_service_servicetype_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_servicetype->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_servicetype->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_service_servicetypegrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_service_servicetype->HospID->Lookup->getParamTag("p_x" . $view_dashboard_service_servicetype_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_service_servicetype_grid->RowCnt ?>_view_dashboard_service_servicetype_HospID" class="view_dashboard_service_servicetype_HospID">
<span<?php echo $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" name="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="fview_dashboard_service_servicetypegrid$x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" name="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="fview_dashboard_service_servicetypegrid$o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_servicetype_grid->ListOptions->render("body", "right", $view_dashboard_service_servicetype_grid->RowCnt);
?>
	</tr>
<?php if ($view_dashboard_service_servicetype->RowType == ROWTYPE_ADD || $view_dashboard_service_servicetype->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_dashboard_service_servicetypegrid.updateLists(<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_dashboard_service_servicetype->isGridAdd() || $view_dashboard_service_servicetype->CurrentMode == "copy")
		if (!$view_dashboard_service_servicetype_grid->Recordset->EOF)
			$view_dashboard_service_servicetype_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_dashboard_service_servicetype->CurrentMode == "add" || $view_dashboard_service_servicetype->CurrentMode == "copy" || $view_dashboard_service_servicetype->CurrentMode == "edit") {
		$view_dashboard_service_servicetype_grid->RowIndex = '$rowindex$';
		$view_dashboard_service_servicetype_grid->loadRowValues();

		// Set row properties
		$view_dashboard_service_servicetype->resetAttributes();
		$view_dashboard_service_servicetype->RowAttrs = array_merge($view_dashboard_service_servicetype->RowAttrs, array('data-rowindex'=>$view_dashboard_service_servicetype_grid->RowIndex, 'id'=>'r0_view_dashboard_service_servicetype', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_dashboard_service_servicetype->RowAttrs["class"], "ew-template");
		$view_dashboard_service_servicetype->RowType = ROWTYPE_ADD;

		// Render row
		$view_dashboard_service_servicetype_grid->renderRow();

		// Render list options
		$view_dashboard_service_servicetype_grid->renderListOptions();
		$view_dashboard_service_servicetype_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_dashboard_service_servicetype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_servicetype_grid->ListOptions->render("body", "left", $view_dashboard_service_servicetype_grid->RowIndex);
?>
	<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT">
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<span<?php echo $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_servicetype->DEPARTMENT->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<span<?php echo $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->DEPARTMENT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->DEPARTMENT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE">
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group view_dashboard_service_servicetype_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group view_dashboard_service_servicetype_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->SERVICE_TYPE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->SERVICE_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<td data-name="sum28SubTotal29">
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_sum28SubTotal29" class="form-group view_dashboard_service_servicetype_sum28SubTotal29">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->EditValue ?>"<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_sum28SubTotal29" class="form-group view_dashboard_service_servicetype_sum28SubTotal29">
<span<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->sum28SubTotal29->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sum28SubTotal29" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_sum28SubTotal29" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->sum28SubTotal29->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate">
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<?php if ($view_dashboard_service_servicetype->createdDate->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<span<?php echo $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_service_servicetype->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<input type="text" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_servicetype->createdDate->EditValue ?>"<?php echo $view_dashboard_service_servicetype->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_servicetype->createdDate->ReadOnly && !$view_dashboard_service_servicetype->createdDate->Disabled && !isset($view_dashboard_service_servicetype->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_servicetype->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_servicetypegrid", "x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<span<?php echo $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->createdDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_dashboard_service_servicetype->isConfirm()) { ?>
<?php if ($view_dashboard_service_servicetype->HospID->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<span<?php echo $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_service_servicetype->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_service_servicetype->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_service_servicetype_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_servicetype->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_servicetype->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_service_servicetypegrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_service_servicetype->HospID->Lookup->getParamTag("p_x" . $view_dashboard_service_servicetype_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<span<?php echo $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_service_servicetype->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" name="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" name="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_service_servicetype->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_servicetype_grid->ListOptions->render("body", "right", $view_dashboard_service_servicetype_grid->RowIndex);
?>
<script>
fview_dashboard_service_servicetypegrid.updateLists(<?php echo $view_dashboard_service_servicetype_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_service_servicetype->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_service_servicetype->resetAttributes();
$view_dashboard_service_servicetype_grid->renderRow();
?>
<?php if ($view_dashboard_service_servicetype_grid->TotalRecs > 0 && $view_dashboard_service_servicetype->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_service_servicetype_grid->renderListOptions();

// Render list options (footer, left)
$view_dashboard_service_servicetype_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_servicetype->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_DEPARTMENT" class="view_dashboard_service_servicetype_DEPARTMENT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_SERVICE_TYPE" class="view_dashboard_service_servicetype_SERVICE_TYPE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<td data-name="sum28SubTotal29" class="<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_sum28SubTotal29" class="view_dashboard_service_servicetype_sum28SubTotal29">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" class="<?php echo $view_dashboard_service_servicetype->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_createdDate" class="view_dashboard_service_servicetype_createdDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_service_servicetype->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_HospID" class="view_dashboard_service_servicetype_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_servicetype_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php if ($view_dashboard_service_servicetype->CurrentMode == "add" || $view_dashboard_service_servicetype->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_dashboard_service_servicetype_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_service_servicetype_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_service_servicetype_grid->KeyCount ?>">
<?php echo $view_dashboard_service_servicetype_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_dashboard_service_servicetype_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_service_servicetype_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_service_servicetype_grid->KeyCount ?>">
<?php echo $view_dashboard_service_servicetype_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_dashboard_service_servicetypegrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_dashboard_service_servicetype_grid->Recordset)
	$view_dashboard_service_servicetype_grid->Recordset->Close();
?>
</div>
<?php if ($view_dashboard_service_servicetype_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_dashboard_service_servicetype_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_service_servicetype_grid->TotalRecs == 0 && !$view_dashboard_service_servicetype->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_servicetype_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_service_servicetype_grid->terminate();
?>
<?php if (!$view_dashboard_service_servicetype->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_service_servicetype", "95%", "");
</script>
<?php } ?>