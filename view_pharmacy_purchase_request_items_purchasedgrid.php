<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacy_purchase_request_items_purchased_grid))
	$view_pharmacy_purchase_request_items_purchased_grid = new view_pharmacy_purchase_request_items_purchased_grid();

// Run the page
$view_pharmacy_purchase_request_items_purchased_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_purchased_grid->Page_Render();
?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>

// Form object
var fview_pharmacy_purchase_request_items_purchasedgrid = new ew.Form("fview_pharmacy_purchase_request_items_purchasedgrid", "grid");
fview_pharmacy_purchase_request_items_purchasedgrid.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName ?>';

// Validate form
fview_pharmacy_purchase_request_items_purchasedgrid.validate = function() {
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
		<?php if ($view_pharmacy_purchase_request_items_purchased_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->id->caption(), $view_pharmacy_purchase_request_items_purchased->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PRC->caption(), $view_pharmacy_purchase_request_items_purchased->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PrName->caption(), $view_pharmacy_purchase_request_items_purchased->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_grid->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->Quantity->caption(), $view_pharmacy_purchase_request_items_purchased->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_purchase_request_items_purchased->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_ApprovedStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption(), $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchaseStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption(), $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_pharmacy_purchase_request_items_purchasedgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
	if (ew.valueChanged(fobj, infix, "ApprovedStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "PurchaseStatus", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_purchase_request_items_purchasedgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_items_purchasedgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_items_purchasedgrid.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_items_purchasedgrid.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_purchased_grid->renderOtherOptions();
?>
<?php $view_pharmacy_purchase_request_items_purchased_grid->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_purchased_grid->showMessage();
?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->TotalRecs > 0 || $view_pharmacy_purchase_request_items_purchased->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_items_purchased_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_items_purchased">
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacy_purchase_request_items_purchased_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_purchase_request_items_purchasedgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_purchase_request_items_purchased" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_purchase_request_items_purchasedgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_items_purchased_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_items_purchased_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_purchased->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_purchased->id->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacy_purchase_request_items_purchased_grid->StartRec = 1;
$view_pharmacy_purchase_request_items_purchased_grid->StopRec = $view_pharmacy_purchase_request_items_purchased_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_pharmacy_purchase_request_items_purchased_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName) && ($view_pharmacy_purchase_request_items_purchased->isGridAdd() || $view_pharmacy_purchase_request_items_purchased->isGridEdit() || $view_pharmacy_purchase_request_items_purchased->isConfirm())) {
		$view_pharmacy_purchase_request_items_purchased_grid->KeyCount = $CurrentForm->getValue($view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName);
		$view_pharmacy_purchase_request_items_purchased_grid->StopRec = $view_pharmacy_purchase_request_items_purchased_grid->StartRec + $view_pharmacy_purchase_request_items_purchased_grid->KeyCount - 1;
	}
}
$view_pharmacy_purchase_request_items_purchased_grid->RecCnt = $view_pharmacy_purchase_request_items_purchased_grid->StartRec - 1;
if ($view_pharmacy_purchase_request_items_purchased_grid->Recordset && !$view_pharmacy_purchase_request_items_purchased_grid->Recordset->EOF) {
	$view_pharmacy_purchase_request_items_purchased_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_items_purchased_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_items_purchased_grid->StartRec > 1)
		$view_pharmacy_purchase_request_items_purchased_grid->Recordset->move($view_pharmacy_purchase_request_items_purchased_grid->StartRec - 1);
} elseif (!$view_pharmacy_purchase_request_items_purchased->AllowAddDeleteRow && $view_pharmacy_purchase_request_items_purchased_grid->StopRec == 0) {
	$view_pharmacy_purchase_request_items_purchased_grid->StopRec = $view_pharmacy_purchase_request_items_purchased->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_items_purchased->resetAttributes();
$view_pharmacy_purchase_request_items_purchased_grid->renderRow();
if ($view_pharmacy_purchase_request_items_purchased->isGridAdd())
	$view_pharmacy_purchase_request_items_purchased_grid->RowIndex = 0;
if ($view_pharmacy_purchase_request_items_purchased->isGridEdit())
	$view_pharmacy_purchase_request_items_purchased_grid->RowIndex = 0;
while ($view_pharmacy_purchase_request_items_purchased_grid->RecCnt < $view_pharmacy_purchase_request_items_purchased_grid->StopRec) {
	$view_pharmacy_purchase_request_items_purchased_grid->RecCnt++;
	if ($view_pharmacy_purchase_request_items_purchased_grid->RecCnt >= $view_pharmacy_purchase_request_items_purchased_grid->StartRec) {
		$view_pharmacy_purchase_request_items_purchased_grid->RowCnt++;
		if ($view_pharmacy_purchase_request_items_purchased->isGridAdd() || $view_pharmacy_purchase_request_items_purchased->isGridEdit() || $view_pharmacy_purchase_request_items_purchased->isConfirm()) {
			$view_pharmacy_purchase_request_items_purchased_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_purchase_request_items_purchased_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_purchased_grid->FormActionName) && $view_pharmacy_purchase_request_items_purchased_grid->EventCancelled)
				$view_pharmacy_purchase_request_items_purchased_grid->RowAction = strval($CurrentForm->getValue($view_pharmacy_purchase_request_items_purchased_grid->FormActionName));
			elseif ($view_pharmacy_purchase_request_items_purchased->isGridAdd())
				$view_pharmacy_purchase_request_items_purchased_grid->RowAction = "insert";
			else
				$view_pharmacy_purchase_request_items_purchased_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_purchase_request_items_purchased_grid->KeyCount = $view_pharmacy_purchase_request_items_purchased_grid->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_items_purchased->resetAttributes();
		$view_pharmacy_purchase_request_items_purchased->CssClass = "";
		if ($view_pharmacy_purchase_request_items_purchased->isGridAdd()) {
			if ($view_pharmacy_purchase_request_items_purchased->CurrentMode == "copy") {
				$view_pharmacy_purchase_request_items_purchased_grid->loadRowValues($view_pharmacy_purchase_request_items_purchased_grid->Recordset); // Load row values
				$view_pharmacy_purchase_request_items_purchased_grid->setRecordKey($view_pharmacy_purchase_request_items_purchased_grid->RowOldKey, $view_pharmacy_purchase_request_items_purchased_grid->Recordset); // Set old record key
			} else {
				$view_pharmacy_purchase_request_items_purchased_grid->loadRowValues(); // Load default values
				$view_pharmacy_purchase_request_items_purchased_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacy_purchase_request_items_purchased_grid->loadRowValues($view_pharmacy_purchase_request_items_purchased_grid->Recordset); // Load row values
		}
		$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_purchase_request_items_purchased->isGridAdd()) // Grid add
			$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_purchase_request_items_purchased->isGridAdd() && $view_pharmacy_purchase_request_items_purchased->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_purchased->isGridEdit()) { // Grid edit
			if ($view_pharmacy_purchase_request_items_purchased->EventCancelled)
				$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values
			if ($view_pharmacy_purchase_request_items_purchased_grid->RowAction == "insert")
				$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_purchase_request_items_purchased->isGridEdit() && ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT || $view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) && $view_pharmacy_purchase_request_items_purchased->EventCancelled) // Update failed
			$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_purchase_request_items_purchased_grid->EditRowCnt++;
		if ($view_pharmacy_purchase_request_items_purchased->isConfirm()) // Confirm row
			$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_items_purchased->RowAttrs = array_merge($view_pharmacy_purchase_request_items_purchased->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_items_purchased_grid->RowCnt, 'id'=>'r' . $view_pharmacy_purchase_request_items_purchased_grid->RowCnt . '_view_pharmacy_purchase_request_items_purchased', 'data-rowtype'=>$view_pharmacy_purchase_request_items_purchased->RowType));

		// Render row
		$view_pharmacy_purchase_request_items_purchased_grid->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_purchased_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_purchase_request_items_purchased_grid->RowAction <> "delete" && $view_pharmacy_purchase_request_items_purchased_grid->RowAction <> "insertdelete" && !($view_pharmacy_purchase_request_items_purchased_grid->RowAction == "insert" && $view_pharmacy_purchase_request_items_purchased->isConfirm() && $view_pharmacy_purchase_request_items_purchased_grid->emptyRow())) {
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_purchased_grid->RowCnt);
?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_items_purchased->id->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_id" class="form-group view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->id->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PRC->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_purchased_grid->RowCnt);
?>
	</tr>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD || $view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacy_purchase_request_items_purchasedgrid.updateLists(<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_purchase_request_items_purchased->isGridAdd() || $view_pharmacy_purchase_request_items_purchased->CurrentMode == "copy")
		if (!$view_pharmacy_purchase_request_items_purchased_grid->Recordset->EOF)
			$view_pharmacy_purchase_request_items_purchased_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_purchase_request_items_purchased->CurrentMode == "add" || $view_pharmacy_purchase_request_items_purchased->CurrentMode == "copy" || $view_pharmacy_purchase_request_items_purchased->CurrentMode == "edit") {
		$view_pharmacy_purchase_request_items_purchased_grid->RowIndex = '$rowindex$';
		$view_pharmacy_purchase_request_items_purchased_grid->loadRowValues();

		// Set row properties
		$view_pharmacy_purchase_request_items_purchased->resetAttributes();
		$view_pharmacy_purchase_request_items_purchased->RowAttrs = array_merge($view_pharmacy_purchase_request_items_purchased->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_items_purchased_grid->RowIndex, 'id'=>'r0_view_pharmacy_purchase_request_items_purchased', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacy_purchase_request_items_purchased->RowAttrs["class"], "ew-template");
		$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_purchase_request_items_purchased_grid->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_purchased_grid->renderListOptions();
		$view_pharmacy_purchase_request_items_purchased_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_purchased_grid->RowIndex);
?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_id" class="form-group view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PrName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->Quantity->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_purchased_grid->RowIndex);
?>
<script>
fview_pharmacy_purchase_request_items_purchasedgrid.updateLists(<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_pharmacy_purchase_request_items_purchased->CurrentMode == "add" || $view_pharmacy_purchase_request_items_purchased->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->KeyCount ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->KeyCount ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacy_purchase_request_items_purchasedgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_items_purchased_grid->Recordset)
	$view_pharmacy_purchase_request_items_purchased_grid->Recordset->Close();
?>
</div>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacy_purchase_request_items_purchased_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->TotalRecs == 0 && !$view_pharmacy_purchase_request_items_purchased->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_purchased_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_purchased_grid->terminate();
?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_purchase_request_items_purchased", "95%", "");
</script>
<?php } ?>