<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$view_pharmacy_purchase_request_items_purchased_grid->isExport()) { ?>
<script>
var fview_pharmacy_purchase_request_items_purchasedgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_pharmacy_purchase_request_items_purchasedgrid = new ew.Form("fview_pharmacy_purchase_request_items_purchasedgrid", "grid");
	fview_pharmacy_purchase_request_items_purchasedgrid.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName ?>';

	// Validate form
	fview_pharmacy_purchase_request_items_purchasedgrid.validate = function() {
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
			<?php if ($view_pharmacy_purchase_request_items_purchased_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_grid->id->caption(), $view_pharmacy_purchase_request_items_purchased_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_grid->PRC->caption(), $view_pharmacy_purchase_request_items_purchased_grid->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_grid->PrName->caption(), $view_pharmacy_purchase_request_items_purchased_grid->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_grid->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_grid->Quantity->caption(), $view_pharmacy_purchase_request_items_purchased_grid->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_ApprovedStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->caption(), $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PurchaseStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->caption(), $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fview_pharmacy_purchase_request_items_purchasedgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_purchase_request_items_purchasedgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_purchase_request_items_purchasedgrid.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->Lookup->toClientList($view_pharmacy_purchase_request_items_purchased_grid) ?>;
	fview_pharmacy_purchase_request_items_purchasedgrid.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_pharmacy_purchase_request_items_purchasedgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_purchased_grid->renderOtherOptions();
?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->TotalRecords > 0 || $view_pharmacy_purchase_request_items_purchased->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_items_purchased_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_items_purchased">
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacy_purchase_request_items_purchased_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_purchase_request_items_purchasedgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_purchase_request_items_purchased" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_purchase_request_items_purchasedgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_items_purchased_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->SortUrl($view_pharmacy_purchase_request_items_purchased_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->SortUrl($view_pharmacy_purchase_request_items_purchased_grid->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased_grid->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased_grid->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->SortUrl($view_pharmacy_purchase_request_items_purchased_grid->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased_grid->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased_grid->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->SortUrl($view_pharmacy_purchase_request_items_purchased_grid->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased_grid->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased_grid->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->SortUrl($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->SortUrl($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->headerCellClass() ?>"><div><div id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$view_pharmacy_purchase_request_items_purchased_grid->StartRecord = 1;
$view_pharmacy_purchase_request_items_purchased_grid->StopRecord = $view_pharmacy_purchase_request_items_purchased_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_pharmacy_purchase_request_items_purchased->isConfirm() || $view_pharmacy_purchase_request_items_purchased_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName) && ($view_pharmacy_purchase_request_items_purchased_grid->isGridAdd() || $view_pharmacy_purchase_request_items_purchased_grid->isGridEdit() || $view_pharmacy_purchase_request_items_purchased->isConfirm())) {
		$view_pharmacy_purchase_request_items_purchased_grid->KeyCount = $CurrentForm->getValue($view_pharmacy_purchase_request_items_purchased_grid->FormKeyCountName);
		$view_pharmacy_purchase_request_items_purchased_grid->StopRecord = $view_pharmacy_purchase_request_items_purchased_grid->StartRecord + $view_pharmacy_purchase_request_items_purchased_grid->KeyCount - 1;
	}
}
$view_pharmacy_purchase_request_items_purchased_grid->RecordCount = $view_pharmacy_purchase_request_items_purchased_grid->StartRecord - 1;
if ($view_pharmacy_purchase_request_items_purchased_grid->Recordset && !$view_pharmacy_purchase_request_items_purchased_grid->Recordset->EOF) {
	$view_pharmacy_purchase_request_items_purchased_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_items_purchased_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_items_purchased_grid->StartRecord > 1)
		$view_pharmacy_purchase_request_items_purchased_grid->Recordset->move($view_pharmacy_purchase_request_items_purchased_grid->StartRecord - 1);
} elseif (!$view_pharmacy_purchase_request_items_purchased->AllowAddDeleteRow && $view_pharmacy_purchase_request_items_purchased_grid->StopRecord == 0) {
	$view_pharmacy_purchase_request_items_purchased_grid->StopRecord = $view_pharmacy_purchase_request_items_purchased->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_items_purchased->resetAttributes();
$view_pharmacy_purchase_request_items_purchased_grid->renderRow();
if ($view_pharmacy_purchase_request_items_purchased_grid->isGridAdd())
	$view_pharmacy_purchase_request_items_purchased_grid->RowIndex = 0;
if ($view_pharmacy_purchase_request_items_purchased_grid->isGridEdit())
	$view_pharmacy_purchase_request_items_purchased_grid->RowIndex = 0;
while ($view_pharmacy_purchase_request_items_purchased_grid->RecordCount < $view_pharmacy_purchase_request_items_purchased_grid->StopRecord) {
	$view_pharmacy_purchase_request_items_purchased_grid->RecordCount++;
	if ($view_pharmacy_purchase_request_items_purchased_grid->RecordCount >= $view_pharmacy_purchase_request_items_purchased_grid->StartRecord) {
		$view_pharmacy_purchase_request_items_purchased_grid->RowCount++;
		if ($view_pharmacy_purchase_request_items_purchased_grid->isGridAdd() || $view_pharmacy_purchase_request_items_purchased_grid->isGridEdit() || $view_pharmacy_purchase_request_items_purchased->isConfirm()) {
			$view_pharmacy_purchase_request_items_purchased_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_purchase_request_items_purchased_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_purchased_grid->FormActionName) && ($view_pharmacy_purchase_request_items_purchased->isConfirm() || $view_pharmacy_purchase_request_items_purchased_grid->EventCancelled))
				$view_pharmacy_purchase_request_items_purchased_grid->RowAction = strval($CurrentForm->getValue($view_pharmacy_purchase_request_items_purchased_grid->FormActionName));
			elseif ($view_pharmacy_purchase_request_items_purchased_grid->isGridAdd())
				$view_pharmacy_purchase_request_items_purchased_grid->RowAction = "insert";
			else
				$view_pharmacy_purchase_request_items_purchased_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_purchase_request_items_purchased_grid->KeyCount = $view_pharmacy_purchase_request_items_purchased_grid->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_items_purchased->resetAttributes();
		$view_pharmacy_purchase_request_items_purchased->CssClass = "";
		if ($view_pharmacy_purchase_request_items_purchased_grid->isGridAdd()) {
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
		if ($view_pharmacy_purchase_request_items_purchased_grid->isGridAdd()) // Grid add
			$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_purchase_request_items_purchased_grid->isGridAdd() && $view_pharmacy_purchase_request_items_purchased->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_purchased_grid->isGridEdit()) { // Grid edit
			if ($view_pharmacy_purchase_request_items_purchased->EventCancelled)
				$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values
			if ($view_pharmacy_purchase_request_items_purchased_grid->RowAction == "insert")
				$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_purchase_request_items_purchased_grid->isGridEdit() && ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT || $view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) && $view_pharmacy_purchase_request_items_purchased->EventCancelled) // Update failed
			$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_purchase_request_items_purchased_grid->EditRowCount++;
		if ($view_pharmacy_purchase_request_items_purchased->isConfirm()) // Confirm row
			$view_pharmacy_purchase_request_items_purchased_grid->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_items_purchased->RowAttrs->merge(["data-rowindex" => $view_pharmacy_purchase_request_items_purchased_grid->RowCount, "id" => "r" . $view_pharmacy_purchase_request_items_purchased_grid->RowCount . "_view_pharmacy_purchase_request_items_purchased", "data-rowtype" => $view_pharmacy_purchase_request_items_purchased->RowType]);

		// Render row
		$view_pharmacy_purchase_request_items_purchased_grid->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_purchased_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_purchase_request_items_purchased_grid->RowAction != "delete" && $view_pharmacy_purchase_request_items_purchased_grid->RowAction != "insertdelete" && !($view_pharmacy_purchase_request_items_purchased_grid->RowAction == "insert" && $view_pharmacy_purchase_request_items_purchased->isConfirm() && $view_pharmacy_purchase_request_items_purchased_grid->emptyRow())) {
?>
	<tr <?php echo $view_pharmacy_purchase_request_items_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_purchased_grid->RowCount);
?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_id" class="form-group">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->PRC->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->PrName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus" <?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus" <?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->editAttributes() ?>>
			<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->selectOptionListHtml("x{$view_pharmacy_purchase_request_items_purchased_grid->RowIndex}_PurchaseStatus") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->editAttributes() ?>>
			<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->selectOptionListHtml("x{$view_pharmacy_purchase_request_items_purchased_grid->RowIndex}_PurchaseStatus") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_purchased_grid->RowCount);
?>
	</tr>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD || $view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacy_purchase_request_items_purchasedgrid", "load"], function() {
	fview_pharmacy_purchase_request_items_purchasedgrid.updateLists(<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_purchase_request_items_purchased_grid->isGridAdd() || $view_pharmacy_purchase_request_items_purchased->CurrentMode == "copy")
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
		$view_pharmacy_purchase_request_items_purchased->RowAttrs->merge(["data-rowindex" => $view_pharmacy_purchase_request_items_purchased_grid->RowIndex, "id" => "r0_view_pharmacy_purchase_request_items_purchased", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacy_purchase_request_items_purchased->RowAttrs->appendClass("ew-template");
		$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_purchase_request_items_purchased_grid->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_purchased_grid->renderListOptions();
		$view_pharmacy_purchase_request_items_purchased_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacy_purchase_request_items_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_purchased_grid->RowIndex);
?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_id" class="form-group view_pharmacy_purchase_request_items_purchased_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_id" class="form-group view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->PRC->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->PrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->Quantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->Quantity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->ApprovedStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->editAttributes() ?>>
			<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->selectOptionListHtml("x{$view_pharmacy_purchase_request_items_purchased_grid->RowIndex}_PurchaseStatus") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_grid->PurchaseStatus->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_purchased_grid->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_purchased_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_purchase_request_items_purchasedgrid", "load"], function() {
	fview_pharmacy_purchase_request_items_purchasedgrid.updateLists(<?php echo $view_pharmacy_purchase_request_items_purchased_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_items_purchased_grid->Recordset)
	$view_pharmacy_purchase_request_items_purchased_grid->Recordset->Close();
?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacy_purchase_request_items_purchased_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_grid->TotalRecords == 0 && !$view_pharmacy_purchase_request_items_purchased->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_purchased_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_purchase_request_items_purchased",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_purchased_grid->terminate();
?>