<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_dashboard_summary_modeofpayment_details_grid))
	$view_dashboard_summary_modeofpayment_details_grid = new view_dashboard_summary_modeofpayment_details_grid();

// Run the page
$view_dashboard_summary_modeofpayment_details_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_summary_modeofpayment_details_grid->Page_Render();
?>
<?php if (!$view_dashboard_summary_modeofpayment_details_grid->isExport()) { ?>
<script>
var fview_dashboard_summary_modeofpayment_detailsgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_dashboard_summary_modeofpayment_detailsgrid = new ew.Form("fview_dashboard_summary_modeofpayment_detailsgrid", "grid");
	fview_dashboard_summary_modeofpayment_detailsgrid.formKeyCountName = '<?php echo $view_dashboard_summary_modeofpayment_details_grid->FormKeyCountName ?>';

	// Validate form
	fview_dashboard_summary_modeofpayment_detailsgrid.validate = function() {
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
			<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_summary_modeofpayment_details_grid->UserName->caption(), $view_dashboard_summary_modeofpayment_details_grid->UserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->caption(), $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->Required) { ?>
				elm = this.getElements("x" + infix + "_sum28Amount29");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->caption(), $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sum28Amount29");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->errorMessage()) ?>");
			<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->Required) { ?>
				elm = this.getElements("x" + infix + "_createddate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_summary_modeofpayment_details_grid->createddate->caption(), $view_dashboard_summary_modeofpayment_details_grid->createddate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->errorMessage()) ?>");
			<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_summary_modeofpayment_details_grid->HospID->caption(), $view_dashboard_summary_modeofpayment_details_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->errorMessage()) ?>");
			<?php if ($view_dashboard_summary_modeofpayment_details_grid->BillType->Required) { ?>
				elm = this.getElements("x" + infix + "_BillType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_summary_modeofpayment_details_grid->BillType->caption(), $view_dashboard_summary_modeofpayment_details_grid->BillType->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_dashboard_summary_modeofpayment_detailsgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "UserName", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
		if (ew.valueChanged(fobj, infix, "sum28Amount29", false)) return false;
		if (ew.valueChanged(fobj, infix, "createddate", false)) return false;
		if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillType", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_summary_modeofpayment_detailsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_summary_modeofpayment_detailsgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_dashboard_summary_modeofpayment_detailsgrid.lists["x_HospID"] = <?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->Lookup->toClientList($view_dashboard_summary_modeofpayment_details_grid) ?>;
	fview_dashboard_summary_modeofpayment_detailsgrid.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->lookupOptions()) ?>;
	fview_dashboard_summary_modeofpayment_detailsgrid.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_dashboard_summary_modeofpayment_detailsgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_dashboard_summary_modeofpayment_details_grid->renderOtherOptions();
?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->TotalRecords > 0 || $view_dashboard_summary_modeofpayment_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_summary_modeofpayment_details_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_summary_modeofpayment_details">
<?php if ($view_dashboard_summary_modeofpayment_details_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_dashboard_summary_modeofpayment_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_summary_modeofpayment_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_summary_modeofpayment_details" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_summary_modeofpayment_detailsgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_summary_modeofpayment_details_grid->renderListOptions();

// Render list options (header, left)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->SortUrl($view_dashboard_summary_modeofpayment_details_grid->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_UserName" class="view_dashboard_summary_modeofpayment_details_UserName"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->headerCellClass() ?>"><div><div id="elh_view_dashboard_summary_modeofpayment_details_UserName" class="view_dashboard_summary_modeofpayment_details_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_grid->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->SortUrl($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->headerCellClass() ?>"><div><div id="elh_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->Visible) { // sum(Amount) ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->SortUrl($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29) == "") { ?>
		<th data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="view_dashboard_summary_modeofpayment_details_sum28Amount29"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->headerCellClass() ?>"><div><div id="elh_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="view_dashboard_summary_modeofpayment_details_sum28Amount29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->SortUrl($view_dashboard_summary_modeofpayment_details_grid->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->headerCellClass() ?>"><div><div id="elh_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_grid->createddate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->SortUrl($view_dashboard_summary_modeofpayment_details_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->SortUrl($view_dashboard_summary_modeofpayment_details_grid->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->headerCellClass() ?>"><div><div id="elh_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_modeofpayment_details_grid->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_summary_modeofpayment_details_grid->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_dashboard_summary_modeofpayment_details_grid->StartRecord = 1;
$view_dashboard_summary_modeofpayment_details_grid->StopRecord = $view_dashboard_summary_modeofpayment_details_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_dashboard_summary_modeofpayment_details->isConfirm() || $view_dashboard_summary_modeofpayment_details_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_dashboard_summary_modeofpayment_details_grid->FormKeyCountName) && ($view_dashboard_summary_modeofpayment_details_grid->isGridAdd() || $view_dashboard_summary_modeofpayment_details_grid->isGridEdit() || $view_dashboard_summary_modeofpayment_details->isConfirm())) {
		$view_dashboard_summary_modeofpayment_details_grid->KeyCount = $CurrentForm->getValue($view_dashboard_summary_modeofpayment_details_grid->FormKeyCountName);
		$view_dashboard_summary_modeofpayment_details_grid->StopRecord = $view_dashboard_summary_modeofpayment_details_grid->StartRecord + $view_dashboard_summary_modeofpayment_details_grid->KeyCount - 1;
	}
}
$view_dashboard_summary_modeofpayment_details_grid->RecordCount = $view_dashboard_summary_modeofpayment_details_grid->StartRecord - 1;
if ($view_dashboard_summary_modeofpayment_details_grid->Recordset && !$view_dashboard_summary_modeofpayment_details_grid->Recordset->EOF) {
	$view_dashboard_summary_modeofpayment_details_grid->Recordset->moveFirst();
	$selectLimit = $view_dashboard_summary_modeofpayment_details_grid->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_summary_modeofpayment_details_grid->StartRecord > 1)
		$view_dashboard_summary_modeofpayment_details_grid->Recordset->move($view_dashboard_summary_modeofpayment_details_grid->StartRecord - 1);
} elseif (!$view_dashboard_summary_modeofpayment_details->AllowAddDeleteRow && $view_dashboard_summary_modeofpayment_details_grid->StopRecord == 0) {
	$view_dashboard_summary_modeofpayment_details_grid->StopRecord = $view_dashboard_summary_modeofpayment_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_summary_modeofpayment_details->resetAttributes();
$view_dashboard_summary_modeofpayment_details_grid->renderRow();
if ($view_dashboard_summary_modeofpayment_details_grid->isGridAdd())
	$view_dashboard_summary_modeofpayment_details_grid->RowIndex = 0;
if ($view_dashboard_summary_modeofpayment_details_grid->isGridEdit())
	$view_dashboard_summary_modeofpayment_details_grid->RowIndex = 0;
while ($view_dashboard_summary_modeofpayment_details_grid->RecordCount < $view_dashboard_summary_modeofpayment_details_grid->StopRecord) {
	$view_dashboard_summary_modeofpayment_details_grid->RecordCount++;
	if ($view_dashboard_summary_modeofpayment_details_grid->RecordCount >= $view_dashboard_summary_modeofpayment_details_grid->StartRecord) {
		$view_dashboard_summary_modeofpayment_details_grid->RowCount++;
		if ($view_dashboard_summary_modeofpayment_details_grid->isGridAdd() || $view_dashboard_summary_modeofpayment_details_grid->isGridEdit() || $view_dashboard_summary_modeofpayment_details->isConfirm()) {
			$view_dashboard_summary_modeofpayment_details_grid->RowIndex++;
			$CurrentForm->Index = $view_dashboard_summary_modeofpayment_details_grid->RowIndex;
			if ($CurrentForm->hasValue($view_dashboard_summary_modeofpayment_details_grid->FormActionName) && ($view_dashboard_summary_modeofpayment_details->isConfirm() || $view_dashboard_summary_modeofpayment_details_grid->EventCancelled))
				$view_dashboard_summary_modeofpayment_details_grid->RowAction = strval($CurrentForm->getValue($view_dashboard_summary_modeofpayment_details_grid->FormActionName));
			elseif ($view_dashboard_summary_modeofpayment_details_grid->isGridAdd())
				$view_dashboard_summary_modeofpayment_details_grid->RowAction = "insert";
			else
				$view_dashboard_summary_modeofpayment_details_grid->RowAction = "";
		}

		// Set up key count
		$view_dashboard_summary_modeofpayment_details_grid->KeyCount = $view_dashboard_summary_modeofpayment_details_grid->RowIndex;

		// Init row class and style
		$view_dashboard_summary_modeofpayment_details->resetAttributes();
		$view_dashboard_summary_modeofpayment_details->CssClass = "";
		if ($view_dashboard_summary_modeofpayment_details_grid->isGridAdd()) {
			if ($view_dashboard_summary_modeofpayment_details->CurrentMode == "copy") {
				$view_dashboard_summary_modeofpayment_details_grid->loadRowValues($view_dashboard_summary_modeofpayment_details_grid->Recordset); // Load row values
				$view_dashboard_summary_modeofpayment_details_grid->setRecordKey($view_dashboard_summary_modeofpayment_details_grid->RowOldKey, $view_dashboard_summary_modeofpayment_details_grid->Recordset); // Set old record key
			} else {
				$view_dashboard_summary_modeofpayment_details_grid->loadRowValues(); // Load default values
				$view_dashboard_summary_modeofpayment_details_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_dashboard_summary_modeofpayment_details_grid->loadRowValues($view_dashboard_summary_modeofpayment_details_grid->Recordset); // Load row values
		}
		$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_VIEW; // Render view
		if ($view_dashboard_summary_modeofpayment_details_grid->isGridAdd()) // Grid add
			$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_ADD; // Render add
		if ($view_dashboard_summary_modeofpayment_details_grid->isGridAdd() && $view_dashboard_summary_modeofpayment_details->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_dashboard_summary_modeofpayment_details_grid->restoreCurrentRowFormValues($view_dashboard_summary_modeofpayment_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_summary_modeofpayment_details_grid->isGridEdit()) { // Grid edit
			if ($view_dashboard_summary_modeofpayment_details->EventCancelled)
				$view_dashboard_summary_modeofpayment_details_grid->restoreCurrentRowFormValues($view_dashboard_summary_modeofpayment_details_grid->RowIndex); // Restore form values
			if ($view_dashboard_summary_modeofpayment_details_grid->RowAction == "insert")
				$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_ADD; // Render add
			else
				$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_dashboard_summary_modeofpayment_details_grid->isGridEdit() && ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT || $view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD) && $view_dashboard_summary_modeofpayment_details->EventCancelled) // Update failed
			$view_dashboard_summary_modeofpayment_details_grid->restoreCurrentRowFormValues($view_dashboard_summary_modeofpayment_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) // Edit row
			$view_dashboard_summary_modeofpayment_details_grid->EditRowCount++;
		if ($view_dashboard_summary_modeofpayment_details->isConfirm()) // Confirm row
			$view_dashboard_summary_modeofpayment_details_grid->restoreCurrentRowFormValues($view_dashboard_summary_modeofpayment_details_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_dashboard_summary_modeofpayment_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_summary_modeofpayment_details_grid->RowCount, "id" => "r" . $view_dashboard_summary_modeofpayment_details_grid->RowCount . "_view_dashboard_summary_modeofpayment_details", "data-rowtype" => $view_dashboard_summary_modeofpayment_details->RowType]);

		// Render row
		$view_dashboard_summary_modeofpayment_details_grid->renderRow();

		// Render list options
		$view_dashboard_summary_modeofpayment_details_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_dashboard_summary_modeofpayment_details_grid->RowAction != "delete" && $view_dashboard_summary_modeofpayment_details_grid->RowAction != "insertdelete" && !($view_dashboard_summary_modeofpayment_details_grid->RowAction == "insert" && $view_dashboard_summary_modeofpayment_details->isConfirm() && $view_dashboard_summary_modeofpayment_details_grid->emptyRow())) {
?>
	<tr <?php echo $view_dashboard_summary_modeofpayment_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("body", "left", $view_dashboard_summary_modeofpayment_details_grid->RowCount);
?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->cellAttributes() ?>>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_UserName" class="form-group">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_UserName" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_UserName" class="form-group">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_UserName" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_UserName">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->cellAttributes() ?>>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->Visible) { // sum(Amount) ?>
		<td data-name="sum28Amount29" <?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->cellAttributes() ?>>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_sum28Amount29">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->Visible) { // createddate ?>
		<td data-name="createddate" <?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->cellAttributes() ?>>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_summary_modeofpayment_details_grid->createddate->CurrentValue, 0)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_modeofpayment_details_grid->createddate->ReadOnly && !$view_dashboard_summary_modeofpayment_details_grid->createddate->Disabled && !isset($view_dashboard_summary_modeofpayment_details_grid->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_modeofpayment_details_grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailsgrid", "x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_summary_modeofpayment_details_grid->createddate->CurrentValue, 0)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_modeofpayment_details_grid->createddate->ReadOnly && !$view_dashboard_summary_modeofpayment_details_grid->createddate->Disabled && !isset($view_dashboard_summary_modeofpayment_details_grid->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_modeofpayment_details_grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailsgrid", "x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->cellAttributes() ?>>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<?php
$onchange = $view_dashboard_summary_modeofpayment_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_summary_modeofpayment_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid"], function() {
	fview_dashboard_summary_modeofpayment_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->Lookup->getParamTag($view_dashboard_summary_modeofpayment_details_grid, "p_x" . $view_dashboard_summary_modeofpayment_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<?php
$onchange = $view_dashboard_summary_modeofpayment_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_summary_modeofpayment_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid"], function() {
	fview_dashboard_summary_modeofpayment_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->Lookup->getParamTag($view_dashboard_summary_modeofpayment_details_grid, "p_x" . $view_dashboard_summary_modeofpayment_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->cellAttributes() ?>>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType" class="form-group">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->viewAttributes() ?>><?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("body", "right", $view_dashboard_summary_modeofpayment_details_grid->RowCount);
?>
	</tr>
<?php if ($view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_ADD || $view_dashboard_summary_modeofpayment_details->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "load"], function() {
	fview_dashboard_summary_modeofpayment_detailsgrid.updateLists(<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_dashboard_summary_modeofpayment_details_grid->isGridAdd() || $view_dashboard_summary_modeofpayment_details->CurrentMode == "copy")
		if (!$view_dashboard_summary_modeofpayment_details_grid->Recordset->EOF)
			$view_dashboard_summary_modeofpayment_details_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_dashboard_summary_modeofpayment_details->CurrentMode == "add" || $view_dashboard_summary_modeofpayment_details->CurrentMode == "copy" || $view_dashboard_summary_modeofpayment_details->CurrentMode == "edit") {
		$view_dashboard_summary_modeofpayment_details_grid->RowIndex = '$rowindex$';
		$view_dashboard_summary_modeofpayment_details_grid->loadRowValues();

		// Set row properties
		$view_dashboard_summary_modeofpayment_details->resetAttributes();
		$view_dashboard_summary_modeofpayment_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_summary_modeofpayment_details_grid->RowIndex, "id" => "r0_view_dashboard_summary_modeofpayment_details", "data-rowtype" => ROWTYPE_ADD]);
		$view_dashboard_summary_modeofpayment_details->RowAttrs->appendClass("ew-template");
		$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_ADD;

		// Render row
		$view_dashboard_summary_modeofpayment_details_grid->renderRow();

		// Render list options
		$view_dashboard_summary_modeofpayment_details_grid->renderListOptions();
		$view_dashboard_summary_modeofpayment_details_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_dashboard_summary_modeofpayment_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("body", "left", $view_dashboard_summary_modeofpayment_details_grid->RowIndex);
?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->Visible) { // UserName ?>
		<td data-name="UserName">
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_UserName" class="form-group view_dashboard_summary_modeofpayment_details_UserName">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_UserName" class="form-group view_dashboard_summary_modeofpayment_details_UserName">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_UserName" class="form-group view_dashboard_summary_modeofpayment_details_UserName">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_UserName" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->UserName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group view_dashboard_summary_modeofpayment_details_ModeofPayment">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->Visible) { // sum(Amount) ?>
		<td data-name="sum28Amount29">
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="form-group view_dashboard_summary_modeofpayment_details_sum28Amount29">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="form-group view_dashboard_summary_modeofpayment_details_sum28Amount29">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sum28Amount29" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_sum28Amount29" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->Visible) { // createddate ?>
		<td data-name="createddate">
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_createddate" class="form-group view_dashboard_summary_modeofpayment_details_createddate">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_summary_modeofpayment_details_grid->createddate->CurrentValue, 0)) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_createddate" class="form-group view_dashboard_summary_modeofpayment_details_createddate">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_modeofpayment_details_grid->createddate->ReadOnly && !$view_dashboard_summary_modeofpayment_details_grid->createddate->Disabled && !isset($view_dashboard_summary_modeofpayment_details_grid->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_modeofpayment_details_grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailsgrid", "x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_createddate" class="form-group view_dashboard_summary_modeofpayment_details_createddate">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->createddate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_HospID" class="form-group view_dashboard_summary_modeofpayment_details_HospID">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_HospID" class="form-group view_dashboard_summary_modeofpayment_details_HospID">
<?php
$onchange = $view_dashboard_summary_modeofpayment_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_summary_modeofpayment_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid"], function() {
	fview_dashboard_summary_modeofpayment_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->Lookup->getParamTag($view_dashboard_summary_modeofpayment_details_grid, "p_x" . $view_dashboard_summary_modeofpayment_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_HospID" class="form-group view_dashboard_summary_modeofpayment_details_HospID">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->BillType->Visible) { // BillType ?>
		<td data-name="BillType">
<?php if (!$view_dashboard_summary_modeofpayment_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_BillType" class="form-group view_dashboard_summary_modeofpayment_details_BillType">
<input type="text" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->EditValue ?>"<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_BillType" class="form-group view_dashboard_summary_modeofpayment_details_BillType">
<span<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_summary_modeofpayment_details_grid->BillType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" id="o<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_summary_modeofpayment_details_grid->BillType->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("body", "right", $view_dashboard_summary_modeofpayment_details_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "load"], function() {
	fview_dashboard_summary_modeofpayment_detailsgrid.updateLists(<?php echo $view_dashboard_summary_modeofpayment_details_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_summary_modeofpayment_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_summary_modeofpayment_details->resetAttributes();
$view_dashboard_summary_modeofpayment_details_grid->renderRow();
?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->TotalRecords > 0 && $view_dashboard_summary_modeofpayment_details->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_summary_modeofpayment_details_grid->renderListOptions();

// Render list options (footer, left)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->UserName->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_UserName" class="view_dashboard_summary_modeofpayment_details_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->Visible) { // sum(Amount) ?>
		<td data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_sum28Amount29" class="view_dashboard_summary_modeofpayment_details_sum28Amount29">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_summary_modeofpayment_details_grid->sum28Amount29->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_modeofpayment_details_grid->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_dashboard_summary_modeofpayment_details_grid->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_summary_modeofpayment_details_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_dashboard_summary_modeofpayment_details->CurrentMode == "add" || $view_dashboard_summary_modeofpayment_details->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_dashboard_summary_modeofpayment_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_summary_modeofpayment_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->KeyCount ?>">
<?php echo $view_dashboard_summary_modeofpayment_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_dashboard_summary_modeofpayment_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_summary_modeofpayment_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_summary_modeofpayment_details_grid->KeyCount ?>">
<?php echo $view_dashboard_summary_modeofpayment_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_dashboard_summary_modeofpayment_detailsgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_summary_modeofpayment_details_grid->Recordset)
	$view_dashboard_summary_modeofpayment_details_grid->Recordset->Close();
?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_dashboard_summary_modeofpayment_details_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details_grid->TotalRecords == 0 && !$view_dashboard_summary_modeofpayment_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_modeofpayment_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_dashboard_summary_modeofpayment_details_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_dashboard_summary_modeofpayment_details->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_dashboard_summary_modeofpayment_details",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_dashboard_summary_modeofpayment_details_grid->terminate();
?>