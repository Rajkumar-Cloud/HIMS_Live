<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacygrn_grid))
	$view_pharmacygrn_grid = new view_pharmacygrn_grid();

// Run the page
$view_pharmacygrn_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_grid->Page_Render();
?>
<?php if (!$view_pharmacygrn_grid->isExport()) { ?>
<script>
var fview_pharmacygrngrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_pharmacygrngrid = new ew.Form("fview_pharmacygrngrid", "grid");
	fview_pharmacygrngrid.formKeyCountName = '<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>';

	// Validate form
	fview_pharmacygrngrid.validate = function() {
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
			<?php if ($view_pharmacygrn_grid->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->PRC->caption(), $view_pharmacygrn_grid->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->PrName->caption(), $view_pharmacygrn_grid->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->GrnQuantity->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->GrnQuantity->caption(), $view_pharmacygrn_grid->GrnQuantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnQuantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->GrnQuantity->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->Quantity->caption(), $view_pharmacygrn_grid->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->Quantity->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->FreeQty->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->FreeQty->caption(), $view_pharmacygrn_grid->FreeQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->FreeQty->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->BatchNo->caption(), $view_pharmacygrn_grid->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->ExpDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->ExpDate->caption(), $view_pharmacygrn_grid->ExpDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->ExpDate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->HSN->Required) { ?>
				elm = this.getElements("x" + infix + "_HSN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->HSN->caption(), $view_pharmacygrn_grid->HSN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->MFRCODE->caption(), $view_pharmacygrn_grid->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->PUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->PUnit->caption(), $view_pharmacygrn_grid->PUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->PUnit->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->SUnit->Required) { ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->SUnit->caption(), $view_pharmacygrn_grid->SUnit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SUnit");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->SUnit->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->MRP->Required) { ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->MRP->caption(), $view_pharmacygrn_grid->MRP->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRP");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->MRP->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->PurValue->Required) { ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->PurValue->caption(), $view_pharmacygrn_grid->PurValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PurValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->PurValue->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->Disc->Required) { ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->Disc->caption(), $view_pharmacygrn_grid->Disc->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Disc");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->Disc->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->PSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->PSGST->caption(), $view_pharmacygrn_grid->PSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->PCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_PCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->PCGST->caption(), $view_pharmacygrn_grid->PCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->PTax->Required) { ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->PTax->caption(), $view_pharmacygrn_grid->PTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->PTax->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->ItemValue->Required) { ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->ItemValue->caption(), $view_pharmacygrn_grid->ItemValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ItemValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->ItemValue->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->SalTax->Required) { ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->SalTax->caption(), $view_pharmacygrn_grid->SalTax->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalTax");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->SalTax->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->SalRate->Required) { ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->SalRate->caption(), $view_pharmacygrn_grid->SalRate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SalRate");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->SalRate->errorMessage()) ?>");
			<?php if ($view_pharmacygrn_grid->SSGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SSGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->SSGST->caption(), $view_pharmacygrn_grid->SSGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->SCGST->Required) { ?>
				elm = this.getElements("x" + infix + "_SCGST");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->SCGST->caption(), $view_pharmacygrn_grid->SCGST->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->BRCODE->caption(), $view_pharmacygrn_grid->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->HospID->caption(), $view_pharmacygrn_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->grncreatedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->grncreatedby->caption(), $view_pharmacygrn_grid->grncreatedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->grncreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grncreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->grncreatedDateTime->caption(), $view_pharmacygrn_grid->grncreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->grnModifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->grnModifiedby->caption(), $view_pharmacygrn_grid->grnModifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->grnModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_grnModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->grnModifiedDateTime->caption(), $view_pharmacygrn_grid->grnModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacygrn_grid->BillDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacygrn_grid->BillDate->caption(), $view_pharmacygrn_grid->BillDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacygrn_grid->BillDate->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_pharmacygrngrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "GrnQuantity", false)) return false;
		if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
		if (ew.valueChanged(fobj, infix, "FreeQty", false)) return false;
		if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "HSN", false)) return false;
		if (ew.valueChanged(fobj, infix, "MFRCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "PUnit", false)) return false;
		if (ew.valueChanged(fobj, infix, "SUnit", false)) return false;
		if (ew.valueChanged(fobj, infix, "MRP", false)) return false;
		if (ew.valueChanged(fobj, infix, "PurValue", false)) return false;
		if (ew.valueChanged(fobj, infix, "Disc", false)) return false;
		if (ew.valueChanged(fobj, infix, "PSGST", false)) return false;
		if (ew.valueChanged(fobj, infix, "PCGST", false)) return false;
		if (ew.valueChanged(fobj, infix, "PTax", false)) return false;
		if (ew.valueChanged(fobj, infix, "ItemValue", false)) return false;
		if (ew.valueChanged(fobj, infix, "SalTax", false)) return false;
		if (ew.valueChanged(fobj, infix, "SalRate", false)) return false;
		if (ew.valueChanged(fobj, infix, "SSGST", false)) return false;
		if (ew.valueChanged(fobj, infix, "SCGST", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillDate", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacygrngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacygrngrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacygrngrid.lists["x_PrName"] = <?php echo $view_pharmacygrn_grid->PrName->Lookup->toClientList($view_pharmacygrn_grid) ?>;
	fview_pharmacygrngrid.lists["x_PrName"].options = <?php echo JsonEncode($view_pharmacygrn_grid->PrName->lookupOptions()) ?>;
	fview_pharmacygrngrid.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacygrngrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_pharmacygrn_grid->renderOtherOptions();
?>
<?php if ($view_pharmacygrn_grid->TotalRecords > 0 || $view_pharmacygrn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacygrn_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacygrn">
<?php if ($view_pharmacygrn_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacygrn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacygrngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacygrn" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacygrngrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacygrn->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacygrn_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacygrn_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacygrn_grid->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn_grid->PRC->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn_grid->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn_grid->PrName->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn_grid->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn_grid->GrnQuantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->GrnQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn_grid->GrnQuantity->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->GrnQuantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->GrnQuantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn_grid->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn_grid->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn_grid->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn_grid->FreeQty->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->FreeQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->FreeQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn_grid->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn_grid->BatchNo->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn_grid->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn_grid->ExpDate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->ExpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->ExpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn_grid->HSN->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn_grid->HSN->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->HSN->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->HSN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->HSN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn_grid->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn_grid->MFRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn_grid->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn_grid->PUnit->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->PUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->PUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->SUnit->Visible) { // SUnit ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn_grid->SUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn_grid->SUnit->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->SUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->SUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn_grid->MRP->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn_grid->MRP->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn_grid->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn_grid->PurValue->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->PurValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->PurValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->Disc->Visible) { // Disc ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->Disc) == "") { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn_grid->Disc->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->Disc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn_grid->Disc->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->Disc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->Disc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn_grid->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn_grid->PSGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->PSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->PSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn_grid->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn_grid->PCGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->PCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->PCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->PTax->Visible) { // PTax ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->PTax) == "") { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn_grid->PTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn_grid->PTax->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->PTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->PTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn_grid->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn_grid->ItemValue->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->ItemValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->ItemValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->SalTax->Visible) { // SalTax ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->SalTax) == "") { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn_grid->SalTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn_grid->SalTax->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->SalTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->SalTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn_grid->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn_grid->SalRate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->SalRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->SalRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn_grid->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn_grid->SSGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn_grid->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn_grid->SCGST->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn_grid->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn_grid->BRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn_grid->HospID->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn_grid->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn_grid->grncreatedby->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->grncreatedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->grncreatedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn_grid->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn_grid->grncreatedDateTime->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->grncreatedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->grncreatedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn_grid->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn_grid->grnModifiedby->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->grnModifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->grnModifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn_grid->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn_grid->grnModifiedDateTime->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn_grid->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacygrn_grid->SortUrl($view_pharmacygrn_grid->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn_grid->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn_grid->BillDate->headerCellClass() ?>"><div><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn_grid->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn_grid->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacygrn_grid->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacygrn_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacygrn_grid->StartRecord = 1;
$view_pharmacygrn_grid->StopRecord = $view_pharmacygrn_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_pharmacygrn->isConfirm() || $view_pharmacygrn_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacygrn_grid->FormKeyCountName) && ($view_pharmacygrn_grid->isGridAdd() || $view_pharmacygrn_grid->isGridEdit() || $view_pharmacygrn->isConfirm())) {
		$view_pharmacygrn_grid->KeyCount = $CurrentForm->getValue($view_pharmacygrn_grid->FormKeyCountName);
		$view_pharmacygrn_grid->StopRecord = $view_pharmacygrn_grid->StartRecord + $view_pharmacygrn_grid->KeyCount - 1;
	}
}
$view_pharmacygrn_grid->RecordCount = $view_pharmacygrn_grid->StartRecord - 1;
if ($view_pharmacygrn_grid->Recordset && !$view_pharmacygrn_grid->Recordset->EOF) {
	$view_pharmacygrn_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacygrn_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacygrn_grid->StartRecord > 1)
		$view_pharmacygrn_grid->Recordset->move($view_pharmacygrn_grid->StartRecord - 1);
} elseif (!$view_pharmacygrn->AllowAddDeleteRow && $view_pharmacygrn_grid->StopRecord == 0) {
	$view_pharmacygrn_grid->StopRecord = $view_pharmacygrn->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_grid->renderRow();
if ($view_pharmacygrn_grid->isGridAdd())
	$view_pharmacygrn_grid->RowIndex = 0;
if ($view_pharmacygrn_grid->isGridEdit())
	$view_pharmacygrn_grid->RowIndex = 0;
while ($view_pharmacygrn_grid->RecordCount < $view_pharmacygrn_grid->StopRecord) {
	$view_pharmacygrn_grid->RecordCount++;
	if ($view_pharmacygrn_grid->RecordCount >= $view_pharmacygrn_grid->StartRecord) {
		$view_pharmacygrn_grid->RowCount++;
		if ($view_pharmacygrn_grid->isGridAdd() || $view_pharmacygrn_grid->isGridEdit() || $view_pharmacygrn->isConfirm()) {
			$view_pharmacygrn_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacygrn_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacygrn_grid->FormActionName) && ($view_pharmacygrn->isConfirm() || $view_pharmacygrn_grid->EventCancelled))
				$view_pharmacygrn_grid->RowAction = strval($CurrentForm->getValue($view_pharmacygrn_grid->FormActionName));
			elseif ($view_pharmacygrn_grid->isGridAdd())
				$view_pharmacygrn_grid->RowAction = "insert";
			else
				$view_pharmacygrn_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacygrn_grid->KeyCount = $view_pharmacygrn_grid->RowIndex;

		// Init row class and style
		$view_pharmacygrn->resetAttributes();
		$view_pharmacygrn->CssClass = "";
		if ($view_pharmacygrn_grid->isGridAdd()) {
			if ($view_pharmacygrn->CurrentMode == "copy") {
				$view_pharmacygrn_grid->loadRowValues($view_pharmacygrn_grid->Recordset); // Load row values
				$view_pharmacygrn_grid->setRecordKey($view_pharmacygrn_grid->RowOldKey, $view_pharmacygrn_grid->Recordset); // Set old record key
			} else {
				$view_pharmacygrn_grid->loadRowValues(); // Load default values
				$view_pharmacygrn_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacygrn_grid->loadRowValues($view_pharmacygrn_grid->Recordset); // Load row values
		}
		$view_pharmacygrn->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacygrn_grid->isGridAdd()) // Grid add
			$view_pharmacygrn->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacygrn_grid->isGridAdd() && $view_pharmacygrn->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values
		if ($view_pharmacygrn_grid->isGridEdit()) { // Grid edit
			if ($view_pharmacygrn->EventCancelled)
				$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values
			if ($view_pharmacygrn_grid->RowAction == "insert")
				$view_pharmacygrn->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacygrn->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacygrn_grid->isGridEdit() && ($view_pharmacygrn->RowType == ROWTYPE_EDIT || $view_pharmacygrn->RowType == ROWTYPE_ADD) && $view_pharmacygrn->EventCancelled) // Update failed
			$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values
		if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacygrn_grid->EditRowCount++;
		if ($view_pharmacygrn->isConfirm()) // Confirm row
			$view_pharmacygrn_grid->restoreCurrentRowFormValues($view_pharmacygrn_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacygrn->RowAttrs->merge(["data-rowindex" => $view_pharmacygrn_grid->RowCount, "id" => "r" . $view_pharmacygrn_grid->RowCount . "_view_pharmacygrn", "data-rowtype" => $view_pharmacygrn->RowType]);

		// Render row
		$view_pharmacygrn_grid->renderRow();

		// Render list options
		$view_pharmacygrn_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacygrn_grid->RowAction != "delete" && $view_pharmacygrn_grid->RowAction != "insertdelete" && !($view_pharmacygrn_grid->RowAction == "insert" && $view_pharmacygrn->isConfirm() && $view_pharmacygrn_grid->emptyRow())) {
?>
	<tr <?php echo $view_pharmacygrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_grid->ListOptions->render("body", "left", $view_pharmacygrn_grid->RowCount);
?>
	<?php if ($view_pharmacygrn_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacygrn_grid->PRC->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PRC" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PRC->EditValue ?>"<?php echo $view_pharmacygrn_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PRC" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PRC->EditValue ?>"<?php echo $view_pharmacygrn_grid->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn_grid->PRC->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacygrn_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacygrn_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT || $view_pharmacygrn->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_id" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacygrn_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_pharmacygrn_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacygrn_grid->PrName->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PrName" class="form-group">
<?php
$onchange = $view_pharmacygrn_grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacygrn_grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_pharmacygrn_grid->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn_grid->PrName->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn_grid->PrName->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn_grid->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn_grid->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn_grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacygrngrid"], function() {
	fview_pharmacygrngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $view_pharmacygrn_grid->PrName->Lookup->getParamTag($view_pharmacygrn_grid, "p_x" . $view_pharmacygrn_grid->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PrName" class="form-group">
<?php
$onchange = $view_pharmacygrn_grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacygrn_grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_pharmacygrn_grid->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn_grid->PrName->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn_grid->PrName->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn_grid->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn_grid->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn_grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacygrngrid"], function() {
	fview_pharmacygrngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $view_pharmacygrn_grid->PrName->Lookup->getParamTag($view_pharmacygrn_grid, "p_x" . $view_pharmacygrn_grid->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn_grid->PrName->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" <?php echo $view_pharmacygrn_grid->GrnQuantity->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_GrnQuantity" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn_grid->GrnQuantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_GrnQuantity" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn_grid->GrnQuantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn_grid->GrnQuantity->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->GrnQuantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_pharmacygrn_grid->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_Quantity" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->Quantity->EditValue ?>"<?php echo $view_pharmacygrn_grid->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_Quantity" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->Quantity->EditValue ?>"<?php echo $view_pharmacygrn_grid->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn_grid->Quantity->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" <?php echo $view_pharmacygrn_grid->FreeQty->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_FreeQty" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn_grid->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_FreeQty" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn_grid->FreeQty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn_grid->FreeQty->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->FreeQty->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $view_pharmacygrn_grid->BatchNo->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_BatchNo" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn_grid->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_BatchNo" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn_grid->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn_grid->BatchNo->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->BatchNo->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" <?php echo $view_pharmacygrn_grid->ExpDate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_ExpDate" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn_grid->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_grid->ExpDate->ReadOnly && !$view_pharmacygrn_grid->ExpDate->Disabled && !isset($view_pharmacygrn_grid->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_ExpDate" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn_grid->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_grid->ExpDate->ReadOnly && !$view_pharmacygrn_grid->ExpDate->Disabled && !isset($view_pharmacygrn_grid->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn_grid->ExpDate->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->ExpDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->HSN->Visible) { // HSN ?>
		<td data-name="HSN" <?php echo $view_pharmacygrn_grid->HSN->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_HSN" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->HSN->EditValue ?>"<?php echo $view_pharmacygrn_grid->HSN->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_HSN" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->HSN->EditValue ?>"<?php echo $view_pharmacygrn_grid->HSN->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn_grid->HSN->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->HSN->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacygrn_grid->MFRCODE->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_MFRCODE" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn_grid->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_MFRCODE" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn_grid->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn_grid->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->MFRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" <?php echo $view_pharmacygrn_grid->PUnit->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PUnit" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PUnit->EditValue ?>"<?php echo $view_pharmacygrn_grid->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PUnit" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PUnit->EditValue ?>"<?php echo $view_pharmacygrn_grid->PUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn_grid->PUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->PUnit->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" <?php echo $view_pharmacygrn_grid->SUnit->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SUnit" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SUnit->EditValue ?>"<?php echo $view_pharmacygrn_grid->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SUnit" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SUnit->EditValue ?>"<?php echo $view_pharmacygrn_grid->SUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn_grid->SUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->SUnit->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $view_pharmacygrn_grid->MRP->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_MRP" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->MRP->EditValue ?>"<?php echo $view_pharmacygrn_grid->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_MRP" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->MRP->EditValue ?>"<?php echo $view_pharmacygrn_grid->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn_grid->MRP->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->MRP->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" <?php echo $view_pharmacygrn_grid->PurValue->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PurValue" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PurValue->EditValue ?>"<?php echo $view_pharmacygrn_grid->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PurValue" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PurValue->EditValue ?>"<?php echo $view_pharmacygrn_grid->PurValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn_grid->PurValue->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->PurValue->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->Disc->Visible) { // Disc ?>
		<td data-name="Disc" <?php echo $view_pharmacygrn_grid->Disc->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_Disc" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->Disc->EditValue ?>"<?php echo $view_pharmacygrn_grid->Disc->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_Disc" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->Disc->EditValue ?>"<?php echo $view_pharmacygrn_grid->Disc->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn_grid->Disc->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->Disc->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" <?php echo $view_pharmacygrn_grid->PSGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PSGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PSGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PSGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PSGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->PSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn_grid->PSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->PSGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" <?php echo $view_pharmacygrn_grid->PCGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PCGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PCGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PCGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PCGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->PCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn_grid->PCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->PCGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PTax->Visible) { // PTax ?>
		<td data-name="PTax" <?php echo $view_pharmacygrn_grid->PTax->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PTax" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PTax->EditValue ?>"<?php echo $view_pharmacygrn_grid->PTax->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PTax" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PTax->EditValue ?>"<?php echo $view_pharmacygrn_grid->PTax->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn_grid->PTax->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->PTax->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" <?php echo $view_pharmacygrn_grid->ItemValue->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_ItemValue" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn_grid->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_ItemValue" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn_grid->ItemValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn_grid->ItemValue->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->ItemValue->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" <?php echo $view_pharmacygrn_grid->SalTax->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SalTax" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SalTax->EditValue ?>"<?php echo $view_pharmacygrn_grid->SalTax->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SalTax" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SalTax->EditValue ?>"<?php echo $view_pharmacygrn_grid->SalTax->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn_grid->SalTax->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->SalTax->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" <?php echo $view_pharmacygrn_grid->SalRate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SalRate" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SalRate->EditValue ?>"<?php echo $view_pharmacygrn_grid->SalRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SalRate" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SalRate->EditValue ?>"<?php echo $view_pharmacygrn_grid->SalRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn_grid->SalRate->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->SalRate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $view_pharmacygrn_grid->SSGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SSGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SSGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SSGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SSGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn_grid->SSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->SSGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $view_pharmacygrn_grid->SCGST->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SCGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SCGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SCGST" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SCGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn_grid->SCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->SCGST->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacygrn_grid->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn_grid->BRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacygrn_grid->HospID->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn_grid->HospID->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" <?php echo $view_pharmacygrn_grid->grncreatedby->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn_grid->grncreatedby->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->grncreatedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" <?php echo $view_pharmacygrn_grid->grncreatedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn_grid->grncreatedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" <?php echo $view_pharmacygrn_grid->grnModifiedby->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn_grid->grnModifiedby->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->grnModifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" <?php echo $view_pharmacygrn_grid->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn_grid->grnModifiedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $view_pharmacygrn_grid->BillDate->cellAttributes() ?>>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_BillDate" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->BillDate->EditValue ?>"<?php echo $view_pharmacygrn_grid->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_grid->BillDate->ReadOnly && !$view_pharmacygrn_grid->BillDate->Disabled && !isset($view_pharmacygrn_grid->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_BillDate" class="form-group">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->BillDate->EditValue ?>"<?php echo $view_pharmacygrn_grid->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_grid->BillDate->ReadOnly && !$view_pharmacygrn_grid->BillDate->Disabled && !isset($view_pharmacygrn_grid->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacygrn_grid->RowCount ?>_view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn_grid->BillDate->viewAttributes() ?>><?php echo $view_pharmacygrn_grid->BillDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="fview_pharmacygrngrid$x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="fview_pharmacygrngrid$o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_grid->ListOptions->render("body", "right", $view_pharmacygrn_grid->RowCount);
?>
	</tr>
<?php if ($view_pharmacygrn->RowType == ROWTYPE_ADD || $view_pharmacygrn->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "load"], function() {
	fview_pharmacygrngrid.updateLists(<?php echo $view_pharmacygrn_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacygrn_grid->isGridAdd() || $view_pharmacygrn->CurrentMode == "copy")
		if (!$view_pharmacygrn_grid->Recordset->EOF)
			$view_pharmacygrn_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacygrn->CurrentMode == "add" || $view_pharmacygrn->CurrentMode == "copy" || $view_pharmacygrn->CurrentMode == "edit") {
		$view_pharmacygrn_grid->RowIndex = '$rowindex$';
		$view_pharmacygrn_grid->loadRowValues();

		// Set row properties
		$view_pharmacygrn->resetAttributes();
		$view_pharmacygrn->RowAttrs->merge(["data-rowindex" => $view_pharmacygrn_grid->RowIndex, "id" => "r0_view_pharmacygrn", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacygrn->RowAttrs->appendClass("ew-template");
		$view_pharmacygrn->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacygrn_grid->renderRow();

		// Render list options
		$view_pharmacygrn_grid->renderListOptions();
		$view_pharmacygrn_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacygrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_grid->ListOptions->render("body", "left", $view_pharmacygrn_grid->RowIndex);
?>
	<?php if ($view_pharmacygrn_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PRC" class="form-group view_pharmacygrn_PRC">
<input type="text" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" size="4" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PRC->EditValue ?>"<?php echo $view_pharmacygrn_grid->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PRC" class="form-group view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn_grid->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->PRC->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PRC" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PrName" class="form-group view_pharmacygrn_PrName">
<?php
$onchange = $view_pharmacygrn_grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacygrn_grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="sv_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($view_pharmacygrn_grid->PrName->EditValue) ?>" size="20" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->getPlaceHolder()) ?>"<?php echo $view_pharmacygrn_grid->PrName->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pharmacy_storemast") && !$view_pharmacygrn_grid->PrName->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_pharmacygrn_grid->PrName->caption() ?>" data-title="<?php echo $view_pharmacygrn_grid->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName',url:'pharmacy_storemastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" data-value-separator="<?php echo $view_pharmacygrn_grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacygrngrid"], function() {
	fview_pharmacygrngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $view_pharmacygrn_grid->PrName->Lookup->getParamTag($view_pharmacygrn_grid, "p_x" . $view_pharmacygrn_grid->RowIndex . "_PrName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PrName" class="form-group view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn_grid->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->PrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PrName" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_GrnQuantity" class="form-group view_pharmacygrn_GrnQuantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->GrnQuantity->EditValue ?>"<?php echo $view_pharmacygrn_grid->GrnQuantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_GrnQuantity" class="form-group view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn_grid->GrnQuantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->GrnQuantity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_GrnQuantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_GrnQuantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->GrnQuantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_Quantity" class="form-group view_pharmacygrn_Quantity">
<input type="text" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->Quantity->EditValue ?>"<?php echo $view_pharmacygrn_grid->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_Quantity" class="form-group view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn_grid->Quantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->Quantity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Quantity" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_FreeQty" class="form-group view_pharmacygrn_FreeQty">
<input type="text" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->FreeQty->EditValue ?>"<?php echo $view_pharmacygrn_grid->FreeQty->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_FreeQty" class="form-group view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn_grid->FreeQty->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->FreeQty->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_FreeQty" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacygrn_grid->FreeQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_BatchNo" class="form-group view_pharmacygrn_BatchNo">
<input type="text" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->BatchNo->EditValue ?>"<?php echo $view_pharmacygrn_grid->BatchNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_BatchNo" class="form-group view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn_grid->BatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->BatchNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BatchNo" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_ExpDate" class="form-group view_pharmacygrn_ExpDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" size="8" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->ExpDate->EditValue ?>"<?php echo $view_pharmacygrn_grid->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_grid->ExpDate->ReadOnly && !$view_pharmacygrn_grid->ExpDate->Disabled && !isset($view_pharmacygrn_grid->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_ExpDate" class="form-group view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn_grid->ExpDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->ExpDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ExpDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->HSN->Visible) { // HSN ?>
		<td data-name="HSN">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_HSN" class="form-group view_pharmacygrn_HSN">
<input type="text" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->HSN->EditValue ?>"<?php echo $view_pharmacygrn_grid->HSN->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_HSN" class="form-group view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn_grid->HSN->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->HSN->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HSN" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HSN" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HSN->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_MFRCODE" class="form-group view_pharmacygrn_MFRCODE">
<input type="text" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->MFRCODE->EditValue ?>"<?php echo $view_pharmacygrn_grid->MFRCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_MFRCODE" class="form-group view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn_grid->MFRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->MFRCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MFRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PUnit" class="form-group view_pharmacygrn_PUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PUnit->EditValue ?>"<?php echo $view_pharmacygrn_grid->PUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PUnit" class="form-group view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn_grid->PUnit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->PUnit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SUnit" class="form-group view_pharmacygrn_SUnit">
<input type="text" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SUnit->EditValue ?>"<?php echo $view_pharmacygrn_grid->SUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SUnit" class="form-group view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn_grid->SUnit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->SUnit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SUnit" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_MRP" class="form-group view_pharmacygrn_MRP">
<input type="text" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->MRP->EditValue ?>"<?php echo $view_pharmacygrn_grid->MRP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_MRP" class="form-group view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn_grid->MRP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->MRP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_MRP" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_MRP" value="<?php echo HtmlEncode($view_pharmacygrn_grid->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PurValue" class="form-group view_pharmacygrn_PurValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PurValue->EditValue ?>"<?php echo $view_pharmacygrn_grid->PurValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PurValue" class="form-group view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn_grid->PurValue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->PurValue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PurValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PurValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->Disc->Visible) { // Disc ?>
		<td data-name="Disc">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_Disc" class="form-group view_pharmacygrn_Disc">
<input type="text" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->Disc->EditValue ?>"<?php echo $view_pharmacygrn_grid->Disc->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_Disc" class="form-group view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn_grid->Disc->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->Disc->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_Disc" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_Disc" value="<?php echo HtmlEncode($view_pharmacygrn_grid->Disc->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PSGST" class="form-group view_pharmacygrn_PSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PSGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->PSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PSGST" class="form-group view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn_grid->PSGST->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->PSGST->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PCGST" class="form-group view_pharmacygrn_PCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PCGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->PCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PCGST" class="form-group view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn_grid->PCGST->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->PCGST->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PTax->Visible) { // PTax ?>
		<td data-name="PTax">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_PTax" class="form-group view_pharmacygrn_PTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" size="6" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->PTax->EditValue ?>"<?php echo $view_pharmacygrn_grid->PTax->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_PTax" class="form-group view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn_grid->PTax->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->PTax->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_PTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_PTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->PTax->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_ItemValue" class="form-group view_pharmacygrn_ItemValue">
<input type="text" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->ItemValue->EditValue ?>"<?php echo $view_pharmacygrn_grid->ItemValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_ItemValue" class="form-group view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn_grid->ItemValue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->ItemValue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_ItemValue" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_pharmacygrn_grid->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SalTax" class="form-group view_pharmacygrn_SalTax">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" size="8" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SalTax->EditValue ?>"<?php echo $view_pharmacygrn_grid->SalTax->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SalTax" class="form-group view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn_grid->SalTax->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->SalTax->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalTax" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalTax" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalTax->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SalRate" class="form-group view_pharmacygrn_SalRate">
<input type="text" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SalRate->EditValue ?>"<?php echo $view_pharmacygrn_grid->SalRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SalRate" class="form-group view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn_grid->SalRate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->SalRate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SalRate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SalRate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SalRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SSGST" class="form-group view_pharmacygrn_SSGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SSGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->SSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SSGST" class="form-group view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn_grid->SSGST->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->SSGST->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SSGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_SCGST" class="form-group view_pharmacygrn_SCGST">
<input type="text" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->SCGST->EditValue ?>"<?php echo $view_pharmacygrn_grid->SCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_SCGST" class="form-group view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn_grid->SCGST->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->SCGST->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_SCGST" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($view_pharmacygrn_grid->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_BRCODE" class="form-group view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn_grid->BRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->BRCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BRCODE" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_HospID" class="form-group view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_HospID" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacygrn_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grncreatedby" class="form-group view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn_grid->grncreatedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->grncreatedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grncreatedDateTime" class="form-group view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn_grid->grncreatedDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->grncreatedDateTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grncreatedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grncreatedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grncreatedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grnModifiedby" class="form-group view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn_grid->grnModifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->grnModifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedby" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedby" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_grnModifiedDateTime" class="form-group view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn_grid->grnModifiedDateTime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->grnModifiedDateTime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_grnModifiedDateTime" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_grnModifiedDateTime" value="<?php echo HtmlEncode($view_pharmacygrn_grid->grnModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<?php if (!$view_pharmacygrn->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacygrn_BillDate" class="form-group view_pharmacygrn_BillDate">
<input type="text" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacygrn_grid->BillDate->EditValue ?>"<?php echo $view_pharmacygrn_grid->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacygrn_grid->BillDate->ReadOnly && !$view_pharmacygrn_grid->BillDate->Disabled && !isset($view_pharmacygrn_grid->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacygrn_grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacygrngrid", "x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacygrn_BillDate" class="form-group view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn_grid->BillDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacygrn_grid->BillDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="x<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacygrn" data-field="x_BillDate" name="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" id="o<?php echo $view_pharmacygrn_grid->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_pharmacygrn_grid->BillDate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_grid->ListOptions->render("body", "right", $view_pharmacygrn_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacygrngrid", "load"], function() {
	fview_pharmacygrngrid.updateLists(<?php echo $view_pharmacygrn_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATE;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_grid->renderRow();
?>
<?php if ($view_pharmacygrn_grid->TotalRecords > 0 && $view_pharmacygrn->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacygrn_grid->renderListOptions();

// Render list options (footer, left)
$view_pharmacygrn_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacygrn_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_pharmacygrn_grid->PRC->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_pharmacygrn_grid->PrName->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" class="<?php echo $view_pharmacygrn_grid->GrnQuantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_pharmacygrn_grid->Quantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_pharmacygrn_grid->FreeQty->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_pharmacygrn_grid->BatchNo->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_pharmacygrn_grid->ExpDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->HSN->Visible) { // HSN ?>
		<td data-name="HSN" class="<?php echo $view_pharmacygrn_grid->HSN->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_pharmacygrn_grid->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" class="<?php echo $view_pharmacygrn_grid->PUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" class="<?php echo $view_pharmacygrn_grid->SUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->MRP->Visible) { // MRP ?>
		<td data-name="MRP" class="<?php echo $view_pharmacygrn_grid->MRP->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" class="<?php echo $view_pharmacygrn_grid->PurValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->Disc->Visible) { // Disc ?>
		<td data-name="Disc" class="<?php echo $view_pharmacygrn_grid->Disc->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" class="<?php echo $view_pharmacygrn_grid->PSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" class="<?php echo $view_pharmacygrn_grid->PCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->PTax->Visible) { // PTax ?>
		<td data-name="PTax" class="<?php echo $view_pharmacygrn_grid->PTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_grid->PTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_pharmacygrn_grid->ItemValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_grid->ItemValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" class="<?php echo $view_pharmacygrn_grid->SalTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn_grid->SalTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" class="<?php echo $view_pharmacygrn_grid->SalRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_pharmacygrn_grid->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_pharmacygrn_grid->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_pharmacygrn_grid->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_pharmacygrn_grid->HospID->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" class="<?php echo $view_pharmacygrn_grid->grncreatedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn_grid->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" class="<?php echo $view_pharmacygrn_grid->grnModifiedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn_grid->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn_grid->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_pharmacygrn_grid->BillDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacygrn_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_pharmacygrn->CurrentMode == "add" || $view_pharmacygrn->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacygrn_grid->KeyCount ?>">
<?php echo $view_pharmacygrn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacygrn->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacygrn_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacygrn_grid->KeyCount ?>">
<?php echo $view_pharmacygrn_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacygrn->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacygrngrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacygrn_grid->Recordset)
	$view_pharmacygrn_grid->Recordset->Close();
?>
<?php if ($view_pharmacygrn_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacygrn_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacygrn_grid->TotalRecords == 0 && !$view_pharmacygrn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_pharmacygrn_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-name='Quantity']").hide();
});
</script>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacygrn",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_pharmacygrn_grid->terminate();
?>