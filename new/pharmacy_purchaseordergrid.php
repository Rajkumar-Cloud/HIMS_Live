<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($pharmacy_purchaseorder_grid))
	$pharmacy_purchaseorder_grid = new pharmacy_purchaseorder_grid();

// Run the page
$pharmacy_purchaseorder_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_grid->Page_Render();
?>
<?php if (!$pharmacy_purchaseorder_grid->isExport()) { ?>
<script>
var fpharmacy_purchaseordergrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpharmacy_purchaseordergrid = new ew.Form("fpharmacy_purchaseordergrid", "grid");
	fpharmacy_purchaseordergrid.formKeyCountName = '<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>';

	// Validate form
	fpharmacy_purchaseordergrid.validate = function() {
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
			<?php if ($pharmacy_purchaseorder_grid->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->PRC->caption(), $pharmacy_purchaseorder_grid->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_grid->QTY->Required) { ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->QTY->caption(), $pharmacy_purchaseorder_grid->QTY->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_QTY");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_grid->QTY->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_grid->Stock->Required) { ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->Stock->caption(), $pharmacy_purchaseorder_grid->Stock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Stock");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_grid->Stock->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_grid->LastMonthSale->Required) { ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->LastMonthSale->caption(), $pharmacy_purchaseorder_grid->LastMonthSale->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LastMonthSale");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_grid->LastMonthSale->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->HospID->caption(), $pharmacy_purchaseorder_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_grid->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->CreatedBy->caption(), $pharmacy_purchaseorder_grid->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_grid->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->CreatedDateTime->caption(), $pharmacy_purchaseorder_grid->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_grid->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->ModifiedBy->caption(), $pharmacy_purchaseorder_grid->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_grid->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->ModifiedDateTime->caption(), $pharmacy_purchaseorder_grid->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchaseorder_grid->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->BillDate->caption(), $pharmacy_purchaseorder_grid->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_grid->BillDate->errorMessage()) ?>");
			<?php if ($pharmacy_purchaseorder_grid->CurStock->Required) { ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchaseorder_grid->CurStock->caption(), $pharmacy_purchaseorder_grid->CurStock->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CurStock");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchaseorder_grid->CurStock->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpharmacy_purchaseordergrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "QTY", false)) return false;
		if (ew.valueChanged(fobj, infix, "Stock", false)) return false;
		if (ew.valueChanged(fobj, infix, "LastMonthSale", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "CurStock", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_purchaseordergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchaseordergrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchaseordergrid.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_grid->PRC->Lookup->toClientList($pharmacy_purchaseorder_grid) ?>;
	fpharmacy_purchaseordergrid.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_grid->PRC->lookupOptions()) ?>;
	fpharmacy_purchaseordergrid.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_purchaseordergrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$pharmacy_purchaseorder_grid->renderOtherOptions();
?>
<?php if ($pharmacy_purchaseorder_grid->TotalRecords > 0 || $pharmacy_purchaseorder->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchaseorder_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchaseorder">
<?php if ($pharmacy_purchaseorder_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_purchaseorder_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_purchaseordergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_purchaseorder" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_purchaseordergrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchaseorder->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchaseorder_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_purchaseorder_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchaseorder_grid->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchaseorder_grid->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchaseorder_grid->PRC->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->QTY->Visible) { // QTY ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->QTY) == "") { ?>
		<th data-name="QTY" class="<?php echo $pharmacy_purchaseorder_grid->QTY->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->QTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QTY" class="<?php echo $pharmacy_purchaseorder_grid->QTY->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->QTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->QTY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->QTY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->Stock->Visible) { // Stock ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $pharmacy_purchaseorder_grid->Stock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $pharmacy_purchaseorder_grid->Stock->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->Stock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->Stock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->LastMonthSale->Visible) { // LastMonthSale ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->LastMonthSale) == "") { ?>
		<th data-name="LastMonthSale" class="<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->LastMonthSale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastMonthSale" class="<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->LastMonthSale->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->LastMonthSale->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchaseorder_grid->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchaseorder_grid->HospID->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $pharmacy_purchaseorder_grid->CreatedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $pharmacy_purchaseorder_grid->CreatedBy->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->CreatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->CreatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->CreatedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->CreatedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $pharmacy_purchaseorder_grid->ModifiedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $pharmacy_purchaseorder_grid->ModifiedBy->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->ModifiedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->ModifiedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->ModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->ModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->BillDate->Visible) { // BillDate ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $pharmacy_purchaseorder_grid->BillDate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $pharmacy_purchaseorder_grid->BillDate->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->CurStock->Visible) { // CurStock ?>
	<?php if ($pharmacy_purchaseorder_grid->SortUrl($pharmacy_purchaseorder_grid->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $pharmacy_purchaseorder_grid->CurStock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><div class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $pharmacy_purchaseorder_grid->CurStock->headerCellClass() ?>"><div><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchaseorder_grid->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchaseorder_grid->CurStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchaseorder_grid->CurStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchaseorder_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$pharmacy_purchaseorder_grid->StartRecord = 1;
$pharmacy_purchaseorder_grid->StopRecord = $pharmacy_purchaseorder_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($pharmacy_purchaseorder->isConfirm() || $pharmacy_purchaseorder_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_purchaseorder_grid->FormKeyCountName) && ($pharmacy_purchaseorder_grid->isGridAdd() || $pharmacy_purchaseorder_grid->isGridEdit() || $pharmacy_purchaseorder->isConfirm())) {
		$pharmacy_purchaseorder_grid->KeyCount = $CurrentForm->getValue($pharmacy_purchaseorder_grid->FormKeyCountName);
		$pharmacy_purchaseorder_grid->StopRecord = $pharmacy_purchaseorder_grid->StartRecord + $pharmacy_purchaseorder_grid->KeyCount - 1;
	}
}
$pharmacy_purchaseorder_grid->RecordCount = $pharmacy_purchaseorder_grid->StartRecord - 1;
if ($pharmacy_purchaseorder_grid->Recordset && !$pharmacy_purchaseorder_grid->Recordset->EOF) {
	$pharmacy_purchaseorder_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchaseorder_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchaseorder_grid->StartRecord > 1)
		$pharmacy_purchaseorder_grid->Recordset->move($pharmacy_purchaseorder_grid->StartRecord - 1);
} elseif (!$pharmacy_purchaseorder->AllowAddDeleteRow && $pharmacy_purchaseorder_grid->StopRecord == 0) {
	$pharmacy_purchaseorder_grid->StopRecord = $pharmacy_purchaseorder->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchaseorder->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchaseorder->resetAttributes();
$pharmacy_purchaseorder_grid->renderRow();
if ($pharmacy_purchaseorder_grid->isGridAdd())
	$pharmacy_purchaseorder_grid->RowIndex = 0;
if ($pharmacy_purchaseorder_grid->isGridEdit())
	$pharmacy_purchaseorder_grid->RowIndex = 0;
while ($pharmacy_purchaseorder_grid->RecordCount < $pharmacy_purchaseorder_grid->StopRecord) {
	$pharmacy_purchaseorder_grid->RecordCount++;
	if ($pharmacy_purchaseorder_grid->RecordCount >= $pharmacy_purchaseorder_grid->StartRecord) {
		$pharmacy_purchaseorder_grid->RowCount++;
		if ($pharmacy_purchaseorder_grid->isGridAdd() || $pharmacy_purchaseorder_grid->isGridEdit() || $pharmacy_purchaseorder->isConfirm()) {
			$pharmacy_purchaseorder_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_purchaseorder_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_purchaseorder_grid->FormActionName) && ($pharmacy_purchaseorder->isConfirm() || $pharmacy_purchaseorder_grid->EventCancelled))
				$pharmacy_purchaseorder_grid->RowAction = strval($CurrentForm->getValue($pharmacy_purchaseorder_grid->FormActionName));
			elseif ($pharmacy_purchaseorder_grid->isGridAdd())
				$pharmacy_purchaseorder_grid->RowAction = "insert";
			else
				$pharmacy_purchaseorder_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_purchaseorder_grid->KeyCount = $pharmacy_purchaseorder_grid->RowIndex;

		// Init row class and style
		$pharmacy_purchaseorder->resetAttributes();
		$pharmacy_purchaseorder->CssClass = "";
		if ($pharmacy_purchaseorder_grid->isGridAdd()) {
			if ($pharmacy_purchaseorder->CurrentMode == "copy") {
				$pharmacy_purchaseorder_grid->loadRowValues($pharmacy_purchaseorder_grid->Recordset); // Load row values
				$pharmacy_purchaseorder_grid->setRecordKey($pharmacy_purchaseorder_grid->RowOldKey, $pharmacy_purchaseorder_grid->Recordset); // Set old record key
			} else {
				$pharmacy_purchaseorder_grid->loadRowValues(); // Load default values
				$pharmacy_purchaseorder_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$pharmacy_purchaseorder_grid->loadRowValues($pharmacy_purchaseorder_grid->Recordset); // Load row values
		}
		$pharmacy_purchaseorder->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_purchaseorder_grid->isGridAdd()) // Grid add
			$pharmacy_purchaseorder->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_purchaseorder_grid->isGridAdd() && $pharmacy_purchaseorder->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values
		if ($pharmacy_purchaseorder_grid->isGridEdit()) { // Grid edit
			if ($pharmacy_purchaseorder->EventCancelled)
				$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values
			if ($pharmacy_purchaseorder_grid->RowAction == "insert")
				$pharmacy_purchaseorder->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_purchaseorder->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_purchaseorder_grid->isGridEdit() && ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT || $pharmacy_purchaseorder->RowType == ROWTYPE_ADD) && $pharmacy_purchaseorder->EventCancelled) // Update failed
			$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values
		if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_purchaseorder_grid->EditRowCount++;
		if ($pharmacy_purchaseorder->isConfirm()) // Confirm row
			$pharmacy_purchaseorder_grid->restoreCurrentRowFormValues($pharmacy_purchaseorder_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_purchaseorder->RowAttrs->merge(["data-rowindex" => $pharmacy_purchaseorder_grid->RowCount, "id" => "r" . $pharmacy_purchaseorder_grid->RowCount . "_pharmacy_purchaseorder", "data-rowtype" => $pharmacy_purchaseorder->RowType]);

		// Render row
		$pharmacy_purchaseorder_grid->renderRow();

		// Render list options
		$pharmacy_purchaseorder_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_purchaseorder_grid->RowAction != "delete" && $pharmacy_purchaseorder_grid->RowAction != "insertdelete" && !($pharmacy_purchaseorder_grid->RowAction == "insert" && $pharmacy_purchaseorder->isConfirm() && $pharmacy_purchaseorder_grid->emptyRow())) {
?>
	<tr <?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "left", $pharmacy_purchaseorder_grid->RowCount);
?>
	<?php if ($pharmacy_purchaseorder_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_purchaseorder_grid->PRC->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $pharmacy_purchaseorder_grid->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_grid->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_grid->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_grid->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid"], function() {
	fpharmacy_purchaseordergrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_grid->PRC->Lookup->getParamTag($pharmacy_purchaseorder_grid, "p_x" . $pharmacy_purchaseorder_grid->RowIndex . "_PRC") ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $pharmacy_purchaseorder_grid->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_grid->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_grid->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_grid->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid"], function() {
	fpharmacy_purchaseordergrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_grid->PRC->Lookup->getParamTag($pharmacy_purchaseorder_grid, "p_x" . $pharmacy_purchaseorder_grid->RowIndex . "_PRC") ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder_grid->PRC->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->PRC->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT || $pharmacy_purchaseorder->CurrentMode == "edit") { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_id" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->QTY->Visible) { // QTY ?>
		<td data-name="QTY" <?php echo $pharmacy_purchaseorder_grid->QTY->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->QTY->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->QTY->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder_grid->QTY->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->QTY->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->Stock->Visible) { // Stock ?>
		<td data-name="Stock" <?php echo $pharmacy_purchaseorder_grid->Stock->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->Stock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->Stock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder_grid->Stock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->Stock->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale" <?php echo $pharmacy_purchaseorder_grid->LastMonthSale->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->LastMonthSale->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_purchaseorder_grid->HospID->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder_grid->HospID->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" <?php echo $pharmacy_purchaseorder_grid->CreatedBy->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder_grid->CreatedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->CreatedBy->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime" <?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" <?php echo $pharmacy_purchaseorder_grid->ModifiedBy->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder_grid->ModifiedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->ModifiedBy->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime" <?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $pharmacy_purchaseorder_grid->BillDate->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_grid->BillDate->ReadOnly && !$pharmacy_purchaseorder_grid->BillDate->Disabled && !isset($pharmacy_purchaseorder_grid->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_grid->BillDate->ReadOnly && !$pharmacy_purchaseorder_grid->BillDate->Disabled && !isset($pharmacy_purchaseorder_grid->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder_grid->BillDate->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->BillDate->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock" <?php echo $pharmacy_purchaseorder_grid->CurStock->cellAttributes() ?>>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->CurStock->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->CurStock->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchaseorder_grid->RowCount ?>_pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder_grid->CurStock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_grid->CurStock->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="fpharmacy_purchaseordergrid$x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="fpharmacy_purchaseordergrid$o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "right", $pharmacy_purchaseorder_grid->RowCount);
?>
	</tr>
<?php if ($pharmacy_purchaseorder->RowType == ROWTYPE_ADD || $pharmacy_purchaseorder->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "load"], function() {
	fpharmacy_purchaseordergrid.updateLists(<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_purchaseorder_grid->isGridAdd() || $pharmacy_purchaseorder->CurrentMode == "copy")
		if (!$pharmacy_purchaseorder_grid->Recordset->EOF)
			$pharmacy_purchaseorder_grid->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_purchaseorder->CurrentMode == "add" || $pharmacy_purchaseorder->CurrentMode == "copy" || $pharmacy_purchaseorder->CurrentMode == "edit") {
		$pharmacy_purchaseorder_grid->RowIndex = '$rowindex$';
		$pharmacy_purchaseorder_grid->loadRowValues();

		// Set row properties
		$pharmacy_purchaseorder->resetAttributes();
		$pharmacy_purchaseorder->RowAttrs->merge(["data-rowindex" => $pharmacy_purchaseorder_grid->RowIndex, "id" => "r0_pharmacy_purchaseorder", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_purchaseorder->RowAttrs->appendClass("ew-template");
		$pharmacy_purchaseorder->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_purchaseorder_grid->renderRow();

		// Render list options
		$pharmacy_purchaseorder_grid->renderListOptions();
		$pharmacy_purchaseorder_grid->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "left", $pharmacy_purchaseorder_grid->RowIndex);
?>
	<?php if ($pharmacy_purchaseorder_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<?php
$onchange = $pharmacy_purchaseorder_grid->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchaseorder_grid->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="sv_x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo RemoveHtml($pharmacy_purchaseorder_grid->PRC->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->getPlaceHolder()) ?>"<?php echo $pharmacy_purchaseorder_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-value-separator="<?php echo $pharmacy_purchaseorder_grid->PRC->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid"], function() {
	fpharmacy_purchaseordergrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchaseorder_grid->PRC->Lookup->getParamTag($pharmacy_purchaseorder_grid, "p_x" . $pharmacy_purchaseorder_grid->RowIndex . "_PRC") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder_grid->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->PRC->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->QTY->Visible) { // QTY ?>
		<td data-name="QTY">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->QTY->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->QTY->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder_grid->QTY->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->QTY->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_QTY" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->QTY->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->Stock->Visible) { // Stock ?>
		<td data-name="Stock">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->Stock->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->Stock->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder_grid->Stock->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->Stock->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_Stock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->Stock->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->LastMonthSale->Visible) { // LastMonthSale ?>
		<td data-name="LastMonthSale">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder_grid->LastMonthSale->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->LastMonthSale->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_LastMonthSale" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->LastMonthSale->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_HospID" class="form-group pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CreatedBy" class="form-group pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder_grid->CreatedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->CreatedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CreatedDateTime" class="form-group pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder_grid->CreatedDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->CreatedDateTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CreatedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_ModifiedBy" class="form-group pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder_grid->ModifiedBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->ModifiedBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_ModifiedDateTime" class="form-group pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder_grid->ModifiedDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->ModifiedDateTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->BillDate->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->BillDate->editAttributes() ?>>
<?php if (!$pharmacy_purchaseorder_grid->BillDate->ReadOnly && !$pharmacy_purchaseorder_grid->BillDate->Disabled && !isset($pharmacy_purchaseorder_grid->BillDate->EditAttrs["readonly"]) && !isset($pharmacy_purchaseorder_grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder_grid->BillDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->BillDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchaseorder_grid->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock">
<?php if (!$pharmacy_purchaseorder->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<input type="text" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchaseorder_grid->CurStock->EditValue ?>"<?php echo $pharmacy_purchaseorder_grid->CurStock->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder_grid->CurStock->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchaseorder_grid->CurStock->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="x<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" id="o<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>_CurStock" value="<?php echo HtmlEncode($pharmacy_purchaseorder_grid->CurStock->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchaseorder_grid->ListOptions->render("body", "right", $pharmacy_purchaseorder_grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "load"], function() {
	fpharmacy_purchaseordergrid.updateLists(<?php echo $pharmacy_purchaseorder_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($pharmacy_purchaseorder->CurrentMode == "add" || $pharmacy_purchaseorder->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_purchaseorder_grid->KeyCount ?>">
<?php echo $pharmacy_purchaseorder_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_purchaseorder_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_purchaseorder_grid->KeyCount ?>">
<?php echo $pharmacy_purchaseorder_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpharmacy_purchaseordergrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_purchaseorder_grid->Recordset)
	$pharmacy_purchaseorder_grid->Recordset->Close();
?>
<?php if ($pharmacy_purchaseorder_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_purchaseorder_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_purchaseorder_grid->TotalRecords == 0 && !$pharmacy_purchaseorder->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchaseorder_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$pharmacy_purchaseorder_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group>.form-control.ew-lookup-text {
		width: 35em;
	}
	</style>
	<script>
});
</script>
<?php if (!$pharmacy_purchaseorder->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_purchaseorder",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$pharmacy_purchaseorder_grid->terminate();
?>