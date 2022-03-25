<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacy_purchase_request_items_approved_grid))
	$view_pharmacy_purchase_request_items_approved_grid = new view_pharmacy_purchase_request_items_approved_grid();

// Run the page
$view_pharmacy_purchase_request_items_approved_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_approved_grid->Page_Render();
?>
<?php if (!$view_pharmacy_purchase_request_items_approved->isExport()) { ?>
<script>

// Form object
var fview_pharmacy_purchase_request_items_approvedgrid = new ew.Form("fview_pharmacy_purchase_request_items_approvedgrid", "grid");
fview_pharmacy_purchase_request_items_approvedgrid.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_items_approved_grid->FormKeyCountName ?>';

// Validate form
fview_pharmacy_purchase_request_items_approvedgrid.validate = function() {
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
		<?php if ($view_pharmacy_purchase_request_items_approved_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved->id->caption(), $view_pharmacy_purchase_request_items_approved->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_approved_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved->PRC->caption(), $view_pharmacy_purchase_request_items_approved->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_approved_grid->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved->PrName->caption(), $view_pharmacy_purchase_request_items_approved->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_approved_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved->Quantity->caption(), $view_pharmacy_purchase_request_items_approved->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_purchase_request_items_approved->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacy_purchase_request_items_approved_grid->ApprovedStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_ApprovedStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_approved->ApprovedStatus->caption(), $view_pharmacy_purchase_request_items_approved->ApprovedStatus->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_pharmacy_purchase_request_items_approvedgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "ApprovedStatus", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_purchase_request_items_approvedgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_items_approvedgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_items_approvedgrid.lists["x_ApprovedStatus"] = <?php echo $view_pharmacy_purchase_request_items_approved_grid->ApprovedStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_items_approvedgrid.lists["x_ApprovedStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_approved_grid->ApprovedStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_approved_grid->renderOtherOptions();
?>
<?php $view_pharmacy_purchase_request_items_approved_grid->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_approved_grid->showMessage();
?>
<?php if ($view_pharmacy_purchase_request_items_approved_grid->TotalRecs > 0 || $view_pharmacy_purchase_request_items_approved->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_items_approved_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_items_approved">
<?php if ($view_pharmacy_purchase_request_items_approved_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacy_purchase_request_items_approved_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_purchase_request_items_approvedgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_purchase_request_items_approved" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_purchase_request_items_approvedgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_items_approved_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_items_approved_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_items_approved_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_items_approved->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->sortUrl($view_pharmacy_purchase_request_items_approved->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_approved->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_approved->id->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->sortUrl($view_pharmacy_purchase_request_items_approved->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_approved->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_approved->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->sortUrl($view_pharmacy_purchase_request_items_approved->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_approved->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_approved->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->sortUrl($view_pharmacy_purchase_request_items_approved->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->sortUrl($view_pharmacy_purchase_request_items_approved->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_items_approved_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacy_purchase_request_items_approved_grid->StartRec = 1;
$view_pharmacy_purchase_request_items_approved_grid->StopRec = $view_pharmacy_purchase_request_items_approved_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_pharmacy_purchase_request_items_approved_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_approved_grid->FormKeyCountName) && ($view_pharmacy_purchase_request_items_approved->isGridAdd() || $view_pharmacy_purchase_request_items_approved->isGridEdit() || $view_pharmacy_purchase_request_items_approved->isConfirm())) {
		$view_pharmacy_purchase_request_items_approved_grid->KeyCount = $CurrentForm->getValue($view_pharmacy_purchase_request_items_approved_grid->FormKeyCountName);
		$view_pharmacy_purchase_request_items_approved_grid->StopRec = $view_pharmacy_purchase_request_items_approved_grid->StartRec + $view_pharmacy_purchase_request_items_approved_grid->KeyCount - 1;
	}
}
$view_pharmacy_purchase_request_items_approved_grid->RecCnt = $view_pharmacy_purchase_request_items_approved_grid->StartRec - 1;
if ($view_pharmacy_purchase_request_items_approved_grid->Recordset && !$view_pharmacy_purchase_request_items_approved_grid->Recordset->EOF) {
	$view_pharmacy_purchase_request_items_approved_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_items_approved_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_items_approved_grid->StartRec > 1)
		$view_pharmacy_purchase_request_items_approved_grid->Recordset->move($view_pharmacy_purchase_request_items_approved_grid->StartRec - 1);
} elseif (!$view_pharmacy_purchase_request_items_approved->AllowAddDeleteRow && $view_pharmacy_purchase_request_items_approved_grid->StopRec == 0) {
	$view_pharmacy_purchase_request_items_approved_grid->StopRec = $view_pharmacy_purchase_request_items_approved->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_items_approved->resetAttributes();
$view_pharmacy_purchase_request_items_approved_grid->renderRow();
if ($view_pharmacy_purchase_request_items_approved->isGridAdd())
	$view_pharmacy_purchase_request_items_approved_grid->RowIndex = 0;
if ($view_pharmacy_purchase_request_items_approved->isGridEdit())
	$view_pharmacy_purchase_request_items_approved_grid->RowIndex = 0;
while ($view_pharmacy_purchase_request_items_approved_grid->RecCnt < $view_pharmacy_purchase_request_items_approved_grid->StopRec) {
	$view_pharmacy_purchase_request_items_approved_grid->RecCnt++;
	if ($view_pharmacy_purchase_request_items_approved_grid->RecCnt >= $view_pharmacy_purchase_request_items_approved_grid->StartRec) {
		$view_pharmacy_purchase_request_items_approved_grid->RowCnt++;
		if ($view_pharmacy_purchase_request_items_approved->isGridAdd() || $view_pharmacy_purchase_request_items_approved->isGridEdit() || $view_pharmacy_purchase_request_items_approved->isConfirm()) {
			$view_pharmacy_purchase_request_items_approved_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_purchase_request_items_approved_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_approved_grid->FormActionName) && $view_pharmacy_purchase_request_items_approved_grid->EventCancelled)
				$view_pharmacy_purchase_request_items_approved_grid->RowAction = strval($CurrentForm->getValue($view_pharmacy_purchase_request_items_approved_grid->FormActionName));
			elseif ($view_pharmacy_purchase_request_items_approved->isGridAdd())
				$view_pharmacy_purchase_request_items_approved_grid->RowAction = "insert";
			else
				$view_pharmacy_purchase_request_items_approved_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_purchase_request_items_approved_grid->KeyCount = $view_pharmacy_purchase_request_items_approved_grid->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_items_approved->resetAttributes();
		$view_pharmacy_purchase_request_items_approved->CssClass = "";
		if ($view_pharmacy_purchase_request_items_approved->isGridAdd()) {
			if ($view_pharmacy_purchase_request_items_approved->CurrentMode == "copy") {
				$view_pharmacy_purchase_request_items_approved_grid->loadRowValues($view_pharmacy_purchase_request_items_approved_grid->Recordset); // Load row values
				$view_pharmacy_purchase_request_items_approved_grid->setRecordKey($view_pharmacy_purchase_request_items_approved_grid->RowOldKey, $view_pharmacy_purchase_request_items_approved_grid->Recordset); // Set old record key
			} else {
				$view_pharmacy_purchase_request_items_approved_grid->loadRowValues(); // Load default values
				$view_pharmacy_purchase_request_items_approved_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacy_purchase_request_items_approved_grid->loadRowValues($view_pharmacy_purchase_request_items_approved_grid->Recordset); // Load row values
		}
		$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_purchase_request_items_approved->isGridAdd()) // Grid add
			$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_purchase_request_items_approved->isGridAdd() && $view_pharmacy_purchase_request_items_approved->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_purchase_request_items_approved_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_approved_grid->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_approved->isGridEdit()) { // Grid edit
			if ($view_pharmacy_purchase_request_items_approved->EventCancelled)
				$view_pharmacy_purchase_request_items_approved_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_approved_grid->RowIndex); // Restore form values
			if ($view_pharmacy_purchase_request_items_approved_grid->RowAction == "insert")
				$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_purchase_request_items_approved->isGridEdit() && ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT || $view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) && $view_pharmacy_purchase_request_items_approved->EventCancelled) // Update failed
			$view_pharmacy_purchase_request_items_approved_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_approved_grid->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_purchase_request_items_approved_grid->EditRowCnt++;
		if ($view_pharmacy_purchase_request_items_approved->isConfirm()) // Confirm row
			$view_pharmacy_purchase_request_items_approved_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_approved_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_items_approved->RowAttrs = array_merge($view_pharmacy_purchase_request_items_approved->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_items_approved_grid->RowCnt, 'id'=>'r' . $view_pharmacy_purchase_request_items_approved_grid->RowCnt . '_view_pharmacy_purchase_request_items_approved', 'data-rowtype'=>$view_pharmacy_purchase_request_items_approved->RowType));

		// Render row
		$view_pharmacy_purchase_request_items_approved_grid->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_approved_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_purchase_request_items_approved_grid->RowAction <> "delete" && $view_pharmacy_purchase_request_items_approved_grid->RowAction <> "insertdelete" && !($view_pharmacy_purchase_request_items_approved_grid->RowAction == "insert" && $view_pharmacy_purchase_request_items_approved->isConfirm() && $view_pharmacy_purchase_request_items_approved_grid->emptyRow())) {
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_approved->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_approved_grid->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_approved_grid->RowCnt);
?>
	<?php if ($view_pharmacy_purchase_request_items_approved->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_items_approved->id->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_id" class="form-group view_pharmacy_purchase_request_items_approved_id">
<span<?php echo $view_pharmacy_purchase_request_items_approved->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id">
<span<?php echo $view_pharmacy_purchase_request_items_approved->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->id->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_purchase_request_items_approved->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_PRC" class="form-group view_pharmacy_purchase_request_items_approved_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_PRC" class="form-group view_pharmacy_purchase_request_items_approved_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->PRC->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_purchase_request_items_approved->PrName->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_PrName" class="form-group view_pharmacy_purchase_request_items_approved_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_PrName" class="form-group view_pharmacy_purchase_request_items_approved_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->PrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group view_pharmacy_purchase_request_items_approved_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group view_pharmacy_purchase_request_items_approved_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowCnt ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->ApprovedStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->ApprovedStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_approvedgrid$x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->ApprovedStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_approvedgrid$o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_approved_grid->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_approved_grid->RowCnt);
?>
	</tr>
<?php if ($view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_ADD || $view_pharmacy_purchase_request_items_approved->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacy_purchase_request_items_approvedgrid.updateLists(<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_purchase_request_items_approved->isGridAdd() || $view_pharmacy_purchase_request_items_approved->CurrentMode == "copy")
		if (!$view_pharmacy_purchase_request_items_approved_grid->Recordset->EOF)
			$view_pharmacy_purchase_request_items_approved_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_purchase_request_items_approved->CurrentMode == "add" || $view_pharmacy_purchase_request_items_approved->CurrentMode == "copy" || $view_pharmacy_purchase_request_items_approved->CurrentMode == "edit") {
		$view_pharmacy_purchase_request_items_approved_grid->RowIndex = '$rowindex$';
		$view_pharmacy_purchase_request_items_approved_grid->loadRowValues();

		// Set row properties
		$view_pharmacy_purchase_request_items_approved->resetAttributes();
		$view_pharmacy_purchase_request_items_approved->RowAttrs = array_merge($view_pharmacy_purchase_request_items_approved->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_items_approved_grid->RowIndex, 'id'=>'r0_view_pharmacy_purchase_request_items_approved', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacy_purchase_request_items_approved->RowAttrs["class"], "ew-template");
		$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_purchase_request_items_approved_grid->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_approved_grid->renderListOptions();
		$view_pharmacy_purchase_request_items_approved_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_approved->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_approved_grid->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_approved_grid->RowIndex);
?>
	<?php if ($view_pharmacy_purchase_request_items_approved->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_id" class="form-group view_pharmacy_purchase_request_items_approved_id">
<span<?php echo $view_pharmacy_purchase_request_items_approved->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PRC" class="form-group view_pharmacy_purchase_request_items_approved_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PRC" class="form-group view_pharmacy_purchase_request_items_approved_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PrName" class="form-group view_pharmacy_purchase_request_items_approved_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved->PrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_PrName" class="form-group view_pharmacy_purchase_request_items_approved_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_approved->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->PrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group view_pharmacy_purchase_request_items_approved_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_Quantity" class="form-group view_pharmacy_purchase_request_items_approved_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_approved->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus">
<?php if (!$view_pharmacy_purchase_request_items_approved->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_approved->ApprovedStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->ApprovedStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_approved" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_approved->ApprovedStatus->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_approved_grid->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_approved_grid->RowIndex);
?>
<script>
fview_pharmacy_purchase_request_items_approvedgrid.updateLists(<?php echo $view_pharmacy_purchase_request_items_approved_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_pharmacy_purchase_request_items_approved->CurrentMode == "add" || $view_pharmacy_purchase_request_items_approved->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_purchase_request_items_approved_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_purchase_request_items_approved_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_grid->KeyCount ?>">
<?php echo $view_pharmacy_purchase_request_items_approved_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_purchase_request_items_approved_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_purchase_request_items_approved_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_purchase_request_items_approved_grid->KeyCount ?>">
<?php echo $view_pharmacy_purchase_request_items_approved_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacy_purchase_request_items_approvedgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_items_approved_grid->Recordset)
	$view_pharmacy_purchase_request_items_approved_grid->Recordset->Close();
?>
</div>
<?php if ($view_pharmacy_purchase_request_items_approved_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacy_purchase_request_items_approved_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_grid->TotalRecs == 0 && !$view_pharmacy_purchase_request_items_approved->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_approved_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_approved_grid->terminate();
?>
<?php if (!$view_pharmacy_purchase_request_items_approved->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_purchase_request_items_approved", "95%", "");
</script>
<?php } ?>