<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacy_movement_item_grid))
	$view_pharmacy_movement_item_grid = new view_pharmacy_movement_item_grid();

// Run the page
$view_pharmacy_movement_item_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_item_grid->Page_Render();
?>
<?php if (!$view_pharmacy_movement_item_grid->isExport()) { ?>
<script>
var fview_pharmacy_movement_itemgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_pharmacy_movement_itemgrid = new ew.Form("fview_pharmacy_movement_itemgrid", "grid");
	fview_pharmacy_movement_itemgrid.formKeyCountName = '<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>';

	// Validate form
	fview_pharmacy_movement_itemgrid.validate = function() {
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
			<?php if ($view_pharmacy_movement_item_grid->ProductFrom->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductFrom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->ProductFrom->caption(), $view_pharmacy_movement_item_grid->ProductFrom->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->Quantity->caption(), $view_pharmacy_movement_item_grid->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->FreeQty->Required) { ?>
				elm = this.getElements("x" + infix + "_FreeQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->FreeQty->caption(), $view_pharmacy_movement_item_grid->FreeQty->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->IQ->caption(), $view_pharmacy_movement_item_grid->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->MRQ->caption(), $view_pharmacy_movement_item_grid->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->BRCODE->caption(), $view_pharmacy_movement_item_grid->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->OPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_OPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->OPNO->caption(), $view_pharmacy_movement_item_grid->OPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->IPNO->Required) { ?>
				elm = this.getElements("x" + infix + "_IPNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->IPNO->caption(), $view_pharmacy_movement_item_grid->IPNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->PatientBILLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientBILLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->PatientBILLNO->caption(), $view_pharmacy_movement_item_grid->PatientBILLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->BILLDT->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->BILLDT->caption(), $view_pharmacy_movement_item_grid->BILLDT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->GRNNO->Required) { ?>
				elm = this.getElements("x" + infix + "_GRNNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->GRNNO->caption(), $view_pharmacy_movement_item_grid->GRNNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->DT->caption(), $view_pharmacy_movement_item_grid->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->Customername->Required) { ?>
				elm = this.getElements("x" + infix + "_Customername");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->Customername->caption(), $view_pharmacy_movement_item_grid->Customername->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->createdby->caption(), $view_pharmacy_movement_item_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->createddatetime->caption(), $view_pharmacy_movement_item_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_grid->createddatetime->errorMessage()) ?>");
			<?php if ($view_pharmacy_movement_item_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->modifiedby->caption(), $view_pharmacy_movement_item_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->modifieddatetime->caption(), $view_pharmacy_movement_item_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_grid->modifieddatetime->errorMessage()) ?>");
			<?php if ($view_pharmacy_movement_item_grid->BILLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->BILLNO->caption(), $view_pharmacy_movement_item_grid->BILLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->prc->Required) { ?>
				elm = this.getElements("x" + infix + "_prc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->prc->caption(), $view_pharmacy_movement_item_grid->prc->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->PrName->caption(), $view_pharmacy_movement_item_grid->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->BatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_BatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->BatchNo->caption(), $view_pharmacy_movement_item_grid->BatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->ExpDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->ExpDate->caption(), $view_pharmacy_movement_item_grid->ExpDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ExpDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_grid->ExpDate->errorMessage()) ?>");
			<?php if ($view_pharmacy_movement_item_grid->MFRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_MFRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->MFRCODE->caption(), $view_pharmacy_movement_item_grid->MFRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->hsn->Required) { ?>
				elm = this.getElements("x" + infix + "_hsn");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->hsn->caption(), $view_pharmacy_movement_item_grid->hsn->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_movement_item_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_movement_item_grid->HospID->caption(), $view_pharmacy_movement_item_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_pharmacy_movement_itemgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "ProductFrom", false)) return false;
		if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
		if (ew.valueChanged(fobj, infix, "FreeQty", false)) return false;
		if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "MRQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "BRCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "OPNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "IPNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientBILLNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "BILLDT", false)) return false;
		if (ew.valueChanged(fobj, infix, "GRNNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "DT", false)) return false;
		if (ew.valueChanged(fobj, infix, "Customername", false)) return false;
		if (ew.valueChanged(fobj, infix, "createdby", false)) return false;
		if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
		if (ew.valueChanged(fobj, infix, "modifiedby", false)) return false;
		if (ew.valueChanged(fobj, infix, "modifieddatetime", false)) return false;
		if (ew.valueChanged(fobj, infix, "BILLNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "prc", false)) return false;
		if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "BatchNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "ExpDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "MFRCODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "hsn", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_movement_itemgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_movement_itemgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_movement_itemgrid.lists["x_ProductFrom"] = <?php echo $view_pharmacy_movement_item_grid->ProductFrom->Lookup->toClientList($view_pharmacy_movement_item_grid) ?>;
	fview_pharmacy_movement_itemgrid.lists["x_ProductFrom"].options = <?php echo JsonEncode($view_pharmacy_movement_item_grid->ProductFrom->lookupOptions()) ?>;
	fview_pharmacy_movement_itemgrid.autoSuggests["x_ProductFrom"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_pharmacy_movement_itemgrid.lists["x_BRCODE"] = <?php echo $view_pharmacy_movement_item_grid->BRCODE->Lookup->toClientList($view_pharmacy_movement_item_grid) ?>;
	fview_pharmacy_movement_itemgrid.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacy_movement_item_grid->BRCODE->lookupOptions()) ?>;
	fview_pharmacy_movement_itemgrid.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacy_movement_itemgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_pharmacy_movement_item_grid->renderOtherOptions();
?>
<?php if ($view_pharmacy_movement_item_grid->TotalRecords > 0 || $view_pharmacy_movement_item->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_movement_item_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement_item">
<?php if ($view_pharmacy_movement_item_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacy_movement_item_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_movement_itemgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_movement_item" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_movement_itemgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_movement_item->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_movement_item_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_item_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement_item_grid->ProductFrom->Visible) { // ProductFrom ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->ProductFrom) == "") { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item_grid->ProductFrom->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->ProductFrom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item_grid->ProductFrom->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->ProductFrom->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->ProductFrom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->ProductFrom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item_grid->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item_grid->Quantity->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item_grid->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item_grid->FreeQty->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->FreeQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->FreeQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item_grid->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item_grid->IQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item_grid->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item_grid->MRQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item_grid->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item_grid->BRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item_grid->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item_grid->OPNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->OPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->OPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->OPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->IPNO->Visible) { // IPNO ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->IPNO) == "") { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item_grid->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->IPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item_grid->IPNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->IPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->IPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->IPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->PatientBILLNO) == "") { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->PatientBILLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->PatientBILLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->BILLDT->Visible) { // BILLDT ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item_grid->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item_grid->BILLDT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->BILLDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->BILLDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->GRNNO->Visible) { // GRNNO ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item_grid->GRNNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item_grid->GRNNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->GRNNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->GRNNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item_grid->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item_grid->DT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->Customername->Visible) { // Customername ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item_grid->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item_grid->Customername->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->Customername->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->Customername->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item_grid->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item_grid->createdby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item_grid->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item_grid->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item_grid->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item_grid->BILLNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->BILLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->BILLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item_grid->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item_grid->prc->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->prc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->prc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->prc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item_grid->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item_grid->PrName->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item_grid->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item_grid->BatchNo->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item_grid->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item_grid->ExpDate->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->ExpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->ExpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item_grid->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item_grid->MFRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->hsn) == "") { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item_grid->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->hsn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item_grid->hsn->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->hsn->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->hsn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->hsn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement_item_grid->SortUrl($view_pharmacy_movement_item_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item_grid->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_movement_item_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacy_movement_item_grid->StartRecord = 1;
$view_pharmacy_movement_item_grid->StopRecord = $view_pharmacy_movement_item_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_pharmacy_movement_item->isConfirm() || $view_pharmacy_movement_item_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_movement_item_grid->FormKeyCountName) && ($view_pharmacy_movement_item_grid->isGridAdd() || $view_pharmacy_movement_item_grid->isGridEdit() || $view_pharmacy_movement_item->isConfirm())) {
		$view_pharmacy_movement_item_grid->KeyCount = $CurrentForm->getValue($view_pharmacy_movement_item_grid->FormKeyCountName);
		$view_pharmacy_movement_item_grid->StopRecord = $view_pharmacy_movement_item_grid->StartRecord + $view_pharmacy_movement_item_grid->KeyCount - 1;
	}
}
$view_pharmacy_movement_item_grid->RecordCount = $view_pharmacy_movement_item_grid->StartRecord - 1;
if ($view_pharmacy_movement_item_grid->Recordset && !$view_pharmacy_movement_item_grid->Recordset->EOF) {
	$view_pharmacy_movement_item_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_movement_item_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_movement_item_grid->StartRecord > 1)
		$view_pharmacy_movement_item_grid->Recordset->move($view_pharmacy_movement_item_grid->StartRecord - 1);
} elseif (!$view_pharmacy_movement_item->AllowAddDeleteRow && $view_pharmacy_movement_item_grid->StopRecord == 0) {
	$view_pharmacy_movement_item_grid->StopRecord = $view_pharmacy_movement_item->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_movement_item->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_movement_item->resetAttributes();
$view_pharmacy_movement_item_grid->renderRow();
if ($view_pharmacy_movement_item_grid->isGridAdd())
	$view_pharmacy_movement_item_grid->RowIndex = 0;
if ($view_pharmacy_movement_item_grid->isGridEdit())
	$view_pharmacy_movement_item_grid->RowIndex = 0;
while ($view_pharmacy_movement_item_grid->RecordCount < $view_pharmacy_movement_item_grid->StopRecord) {
	$view_pharmacy_movement_item_grid->RecordCount++;
	if ($view_pharmacy_movement_item_grid->RecordCount >= $view_pharmacy_movement_item_grid->StartRecord) {
		$view_pharmacy_movement_item_grid->RowCount++;
		if ($view_pharmacy_movement_item_grid->isGridAdd() || $view_pharmacy_movement_item_grid->isGridEdit() || $view_pharmacy_movement_item->isConfirm()) {
			$view_pharmacy_movement_item_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_movement_item_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_movement_item_grid->FormActionName) && ($view_pharmacy_movement_item->isConfirm() || $view_pharmacy_movement_item_grid->EventCancelled))
				$view_pharmacy_movement_item_grid->RowAction = strval($CurrentForm->getValue($view_pharmacy_movement_item_grid->FormActionName));
			elseif ($view_pharmacy_movement_item_grid->isGridAdd())
				$view_pharmacy_movement_item_grid->RowAction = "insert";
			else
				$view_pharmacy_movement_item_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_movement_item_grid->KeyCount = $view_pharmacy_movement_item_grid->RowIndex;

		// Init row class and style
		$view_pharmacy_movement_item->resetAttributes();
		$view_pharmacy_movement_item->CssClass = "";
		if ($view_pharmacy_movement_item_grid->isGridAdd()) {
			if ($view_pharmacy_movement_item->CurrentMode == "copy") {
				$view_pharmacy_movement_item_grid->loadRowValues($view_pharmacy_movement_item_grid->Recordset); // Load row values
				$view_pharmacy_movement_item_grid->setRecordKey($view_pharmacy_movement_item_grid->RowOldKey, $view_pharmacy_movement_item_grid->Recordset); // Set old record key
			} else {
				$view_pharmacy_movement_item_grid->loadRowValues(); // Load default values
				$view_pharmacy_movement_item_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacy_movement_item_grid->loadRowValues($view_pharmacy_movement_item_grid->Recordset); // Load row values
		}
		$view_pharmacy_movement_item->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_movement_item_grid->isGridAdd()) // Grid add
			$view_pharmacy_movement_item->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_movement_item_grid->isGridAdd() && $view_pharmacy_movement_item->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values
		if ($view_pharmacy_movement_item_grid->isGridEdit()) { // Grid edit
			if ($view_pharmacy_movement_item->EventCancelled)
				$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values
			if ($view_pharmacy_movement_item_grid->RowAction == "insert")
				$view_pharmacy_movement_item->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_movement_item->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_movement_item_grid->isGridEdit() && ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT || $view_pharmacy_movement_item->RowType == ROWTYPE_ADD) && $view_pharmacy_movement_item->EventCancelled) // Update failed
			$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values
		if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_movement_item_grid->EditRowCount++;
		if ($view_pharmacy_movement_item->isConfirm()) // Confirm row
			$view_pharmacy_movement_item_grid->restoreCurrentRowFormValues($view_pharmacy_movement_item_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacy_movement_item->RowAttrs->merge(["data-rowindex" => $view_pharmacy_movement_item_grid->RowCount, "id" => "r" . $view_pharmacy_movement_item_grid->RowCount . "_view_pharmacy_movement_item", "data-rowtype" => $view_pharmacy_movement_item->RowType]);

		// Render row
		$view_pharmacy_movement_item_grid->renderRow();

		// Render list options
		$view_pharmacy_movement_item_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_movement_item_grid->RowAction != "delete" && $view_pharmacy_movement_item_grid->RowAction != "insertdelete" && !($view_pharmacy_movement_item_grid->RowAction == "insert" && $view_pharmacy_movement_item->isConfirm() && $view_pharmacy_movement_item_grid->emptyRow())) {
?>
	<tr <?php echo $view_pharmacy_movement_item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "left", $view_pharmacy_movement_item_grid->RowCount);
?>
	<?php if ($view_pharmacy_movement_item_grid->ProductFrom->Visible) { // ProductFrom ?>
		<td data-name="ProductFrom" <?php echo $view_pharmacy_movement_item_grid->ProductFrom->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_ProductFrom" class="form-group">
<?php
$onchange = $view_pharmacy_movement_item_grid->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_grid->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item_grid->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_grid->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item_grid->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
	fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_grid->ProductFrom->Lookup->getParamTag($view_pharmacy_movement_item_grid, "p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_ProductFrom") ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_ProductFrom" class="form-group">
<?php
$onchange = $view_pharmacy_movement_item_grid->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_grid->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item_grid->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_grid->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item_grid->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
	fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_grid->ProductFrom->Lookup->getParamTag($view_pharmacy_movement_item_grid, "p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_ProductFrom") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_ProductFrom">
<span<?php echo $view_pharmacy_movement_item_grid->ProductFrom->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->ProductFrom->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_pharmacy_movement_item_grid->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_Quantity" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_Quantity" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_Quantity">
<span<?php echo $view_pharmacy_movement_item_grid->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->Quantity->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" <?php echo $view_pharmacy_movement_item_grid->FreeQty->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_FreeQty" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_FreeQty" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->FreeQty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_FreeQty">
<span<?php echo $view_pharmacy_movement_item_grid->FreeQty->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->FreeQty->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $view_pharmacy_movement_item_grid->IQ->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_IQ" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_IQ" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_IQ">
<span<?php echo $view_pharmacy_movement_item_grid->IQ->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->IQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $view_pharmacy_movement_item_grid->MRQ->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_MRQ" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_MRQ" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_MRQ">
<span<?php echo $view_pharmacy_movement_item_grid->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->MRQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacy_movement_item_grid->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BRCODE" class="form-group">
<?php
$onchange = $view_pharmacy_movement_item_grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item_grid->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item_grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
	fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_grid->BRCODE->Lookup->getParamTag($view_pharmacy_movement_item_grid, "p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BRCODE" class="form-group">
<?php
$onchange = $view_pharmacy_movement_item_grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item_grid->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item_grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
	fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_grid->BRCODE->Lookup->getParamTag($view_pharmacy_movement_item_grid, "p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BRCODE">
<span<?php echo $view_pharmacy_movement_item_grid->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO" <?php echo $view_pharmacy_movement_item_grid->OPNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_OPNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->OPNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_OPNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->OPNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_OPNO">
<span<?php echo $view_pharmacy_movement_item_grid->OPNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->OPNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO" <?php echo $view_pharmacy_movement_item_grid->IPNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_IPNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->IPNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_IPNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->IPNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_IPNO">
<span<?php echo $view_pharmacy_movement_item_grid->IPNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->IPNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<td data-name="PatientBILLNO" <?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO">
<span<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" <?php echo $view_pharmacy_movement_item_grid->BILLDT->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BILLDT" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BILLDT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BILLDT" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BILLDT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BILLDT">
<span<?php echo $view_pharmacy_movement_item_grid->BILLDT->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->BILLDT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" <?php echo $view_pharmacy_movement_item_grid->GRNNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_GRNNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->GRNNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_GRNNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->GRNNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_GRNNO">
<span<?php echo $view_pharmacy_movement_item_grid->GRNNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->GRNNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $view_pharmacy_movement_item_grid->DT->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_DT" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->DT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_DT" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->DT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_DT">
<span<?php echo $view_pharmacy_movement_item_grid->DT->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->DT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->Customername->Visible) { // Customername ?>
		<td data-name="Customername" <?php echo $view_pharmacy_movement_item_grid->Customername->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_Customername" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->Customername->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_Customername" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->Customername->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_Customername">
<span<?php echo $view_pharmacy_movement_item_grid->Customername->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->Customername->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_pharmacy_movement_item_grid->createdby->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_createdby" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_createdby" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_createdby">
<span<?php echo $view_pharmacy_movement_item_grid->createdby->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_pharmacy_movement_item_grid->createddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_createddatetime" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->createddatetime->ReadOnly && !$view_pharmacy_movement_item_grid->createddatetime->Disabled && !isset($view_pharmacy_movement_item_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_createddatetime" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->createddatetime->ReadOnly && !$view_pharmacy_movement_item_grid->createddatetime->Disabled && !isset($view_pharmacy_movement_item_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_createddatetime">
<span<?php echo $view_pharmacy_movement_item_grid->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_pharmacy_movement_item_grid->modifiedby->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_modifiedby" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_modifiedby" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_modifiedby">
<span<?php echo $view_pharmacy_movement_item_grid->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_movement_item_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_modifieddatetime" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item_grid->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_modifieddatetime" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item_grid->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_modifieddatetime">
<span<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" <?php echo $view_pharmacy_movement_item_grid->BILLNO->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BILLNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BILLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BILLNO" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BILLNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BILLNO">
<span<?php echo $view_pharmacy_movement_item_grid->BILLNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->BILLNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->prc->Visible) { // prc ?>
		<td data-name="prc" <?php echo $view_pharmacy_movement_item_grid->prc->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_pharmacy_movement_item_grid->prc->getSessionValue() != "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<span<?php echo $view_pharmacy_movement_item_grid->prc->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->prc->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->prc->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_pharmacy_movement_item_grid->prc->getSessionValue() != "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<span<?php echo $view_pharmacy_movement_item_grid->prc->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->prc->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_prc" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->prc->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item_grid->prc->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->prc->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacy_movement_item_grid->PrName->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_PrName" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_PrName" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->PrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_PrName">
<span<?php echo $view_pharmacy_movement_item_grid->PrName->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->PrName->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $view_pharmacy_movement_item_grid->BatchNo->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_pharmacy_movement_item_grid->BatchNo->getSessionValue() != "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<span<?php echo $view_pharmacy_movement_item_grid->BatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->BatchNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_pharmacy_movement_item_grid->BatchNo->getSessionValue() != "") { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<span<?php echo $view_pharmacy_movement_item_grid->BatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->BatchNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BatchNo" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item_grid->BatchNo->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->BatchNo->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" <?php echo $view_pharmacy_movement_item_grid->ExpDate->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_ExpDate" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->ExpDate->ReadOnly && !$view_pharmacy_movement_item_grid->ExpDate->Disabled && !isset($view_pharmacy_movement_item_grid->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_ExpDate" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->ExpDate->ReadOnly && !$view_pharmacy_movement_item_grid->ExpDate->Disabled && !isset($view_pharmacy_movement_item_grid->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_ExpDate">
<span<?php echo $view_pharmacy_movement_item_grid->ExpDate->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->ExpDate->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacy_movement_item_grid->MFRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_MFRCODE" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_MFRCODE" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_MFRCODE">
<span<?php echo $view_pharmacy_movement_item_grid->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->MFRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->hsn->Visible) { // hsn ?>
		<td data-name="hsn" <?php echo $view_pharmacy_movement_item_grid->hsn->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_hsn" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->hsn->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_hsn" class="form-group">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->hsn->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_hsn">
<span<?php echo $view_pharmacy_movement_item_grid->hsn->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->hsn->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacy_movement_item_grid->HospID->cellAttributes() ?>>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_movement_item_grid->RowCount ?>_view_pharmacy_movement_item_HospID">
<span<?php echo $view_pharmacy_movement_item_grid->HospID->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="fview_pharmacy_movement_itemgrid$x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="fview_pharmacy_movement_itemgrid$o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "right", $view_pharmacy_movement_item_grid->RowCount);
?>
	</tr>
<?php if ($view_pharmacy_movement_item->RowType == ROWTYPE_ADD || $view_pharmacy_movement_item->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "load"], function() {
	fview_pharmacy_movement_itemgrid.updateLists(<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_movement_item_grid->isGridAdd() || $view_pharmacy_movement_item->CurrentMode == "copy")
		if (!$view_pharmacy_movement_item_grid->Recordset->EOF)
			$view_pharmacy_movement_item_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_movement_item->CurrentMode == "add" || $view_pharmacy_movement_item->CurrentMode == "copy" || $view_pharmacy_movement_item->CurrentMode == "edit") {
		$view_pharmacy_movement_item_grid->RowIndex = '$rowindex$';
		$view_pharmacy_movement_item_grid->loadRowValues();

		// Set row properties
		$view_pharmacy_movement_item->resetAttributes();
		$view_pharmacy_movement_item->RowAttrs->merge(["data-rowindex" => $view_pharmacy_movement_item_grid->RowIndex, "id" => "r0_view_pharmacy_movement_item", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacy_movement_item->RowAttrs->appendClass("ew-template");
		$view_pharmacy_movement_item->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_movement_item_grid->renderRow();

		// Render list options
		$view_pharmacy_movement_item_grid->renderListOptions();
		$view_pharmacy_movement_item_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacy_movement_item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "left", $view_pharmacy_movement_item_grid->RowIndex);
?>
	<?php if ($view_pharmacy_movement_item_grid->ProductFrom->Visible) { // ProductFrom ?>
		<td data-name="ProductFrom">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<?php
$onchange = $view_pharmacy_movement_item_grid->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_grid->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo RemoveHtml($view_pharmacy_movement_item_grid->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_grid->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-value-separator="<?php echo $view_pharmacy_movement_item_grid->ProductFrom->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
	fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_grid->ProductFrom->Lookup->getParamTag($view_pharmacy_movement_item_grid, "p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_ProductFrom") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ProductFrom" class="form-group view_pharmacy_movement_item_ProductFrom">
<span<?php echo $view_pharmacy_movement_item_grid->ProductFrom->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->ProductFrom->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ProductFrom" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ProductFrom->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->Quantity->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Quantity" class="form-group view_pharmacy_movement_item_Quantity">
<span<?php echo $view_pharmacy_movement_item_grid->Quantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->Quantity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->FreeQty->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->FreeQty->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_FreeQty" class="form-group view_pharmacy_movement_item_FreeQty">
<span<?php echo $view_pharmacy_movement_item_grid->FreeQty->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->FreeQty->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->FreeQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->IQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->IQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IQ" class="form-group view_pharmacy_movement_item_IQ">
<span<?php echo $view_pharmacy_movement_item_grid->IQ->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->IQ->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->MRQ->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->MRQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MRQ" class="form-group view_pharmacy_movement_item_MRQ">
<span<?php echo $view_pharmacy_movement_item_grid->MRQ->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->MRQ->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<?php
$onchange = $view_pharmacy_movement_item_grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_movement_item_grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="sv_x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo RemoveHtml($view_pharmacy_movement_item_grid->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->getPlaceHolder()) ?>"<?php echo $view_pharmacy_movement_item_grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-value-separator="<?php echo $view_pharmacy_movement_item_grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid"], function() {
	fview_pharmacy_movement_itemgrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_movement_item_grid->BRCODE->Lookup->getParamTag($view_pharmacy_movement_item_grid, "p_x" . $view_pharmacy_movement_item_grid->RowIndex . "_BRCODE") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BRCODE" class="form-group view_pharmacy_movement_item_BRCODE">
<span<?php echo $view_pharmacy_movement_item_grid->BRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->BRCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->OPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->OPNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_OPNO" class="form-group view_pharmacy_movement_item_OPNO">
<span<?php echo $view_pharmacy_movement_item_grid->OPNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->OPNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_OPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->OPNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->IPNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->IPNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_IPNO" class="form-group view_pharmacy_movement_item_IPNO">
<span<?php echo $view_pharmacy_movement_item_grid->IPNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->IPNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_IPNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->IPNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<td data-name="PatientBILLNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PatientBILLNO" class="form-group view_pharmacy_movement_item_PatientBILLNO">
<span<?php echo $view_pharmacy_movement_item_grid->PatientBILLNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->PatientBILLNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PatientBILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PatientBILLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BILLDT->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BILLDT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLDT" class="form-group view_pharmacy_movement_item_BILLDT">
<span<?php echo $view_pharmacy_movement_item_grid->BILLDT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->BILLDT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLDT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->GRNNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->GRNNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_GRNNO" class="form-group view_pharmacy_movement_item_GRNNO">
<span<?php echo $view_pharmacy_movement_item_grid->GRNNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->GRNNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_GRNNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->GRNNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->DT->Visible) { // DT ?>
		<td data-name="DT">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->DT->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->DT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_DT" class="form-group view_pharmacy_movement_item_DT">
<span<?php echo $view_pharmacy_movement_item_grid->DT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->DT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_DT" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_DT" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->DT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->Customername->Visible) { // Customername ?>
		<td data-name="Customername">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->Customername->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->Customername->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_Customername" class="form-group view_pharmacy_movement_item_Customername">
<span<?php echo $view_pharmacy_movement_item_grid->Customername->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->Customername->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_Customername" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->Customername->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->createdby->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createdby" class="form-group view_pharmacy_movement_item_createdby">
<span<?php echo $view_pharmacy_movement_item_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->createddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->createddatetime->ReadOnly && !$view_pharmacy_movement_item_grid->createddatetime->Disabled && !isset($view_pharmacy_movement_item_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_createddatetime" class="form-group view_pharmacy_movement_item_createddatetime">
<span<?php echo $view_pharmacy_movement_item_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->modifiedby->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifiedby" class="form-group view_pharmacy_movement_item_modifiedby">
<span<?php echo $view_pharmacy_movement_item_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->modifieddatetime->ReadOnly && !$view_pharmacy_movement_item_grid->modifieddatetime->Disabled && !isset($view_pharmacy_movement_item_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_modifieddatetime" class="form-group view_pharmacy_movement_item_modifieddatetime">
<span<?php echo $view_pharmacy_movement_item_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BILLNO->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BILLNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BILLNO" class="form-group view_pharmacy_movement_item_BILLNO">
<span<?php echo $view_pharmacy_movement_item_grid->BILLNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->BILLNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BILLNO" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BILLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->prc->Visible) { // prc ?>
		<td data-name="prc">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<?php if ($view_pharmacy_movement_item_grid->prc->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item_grid->prc->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->prc->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->prc->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_prc" class="form-group view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item_grid->prc->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->prc->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_prc" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->prc->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->PrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_PrName" class="form-group view_pharmacy_movement_item_PrName">
<span<?php echo $view_pharmacy_movement_item_grid->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->PrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<?php if ($view_pharmacy_movement_item_grid->BatchNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item_grid->BatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->BatchNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->BatchNo->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->BatchNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_BatchNo" class="form-group view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item_grid->BatchNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->BatchNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_grid->ExpDate->ReadOnly && !$view_pharmacy_movement_item_grid->ExpDate->Disabled && !isset($view_pharmacy_movement_item_grid->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemgrid", "x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_ExpDate" class="form-group view_pharmacy_movement_item_ExpDate">
<span<?php echo $view_pharmacy_movement_item_grid->ExpDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->ExpDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->MFRCODE->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->MFRCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_MFRCODE" class="form-group view_pharmacy_movement_item_MFRCODE">
<span<?php echo $view_pharmacy_movement_item_grid->MFRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->MFRCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->hsn->Visible) { // hsn ?>
		<td data-name="hsn">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_grid->hsn->EditValue ?>"<?php echo $view_pharmacy_movement_item_grid->hsn->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_hsn" class="form-group view_pharmacy_movement_item_hsn">
<span<?php echo $view_pharmacy_movement_item_grid->hsn->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->hsn->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_hsn" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->hsn->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_pharmacy_movement_item->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_movement_item_HospID" class="form-group view_pharmacy_movement_item_HospID">
<span<?php echo $view_pharmacy_movement_item_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_movement_item_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="x<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" id="o<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_pharmacy_movement_item_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_grid->ListOptions->render("body", "right", $view_pharmacy_movement_item_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemgrid", "load"], function() {
	fview_pharmacy_movement_itemgrid.updateLists(<?php echo $view_pharmacy_movement_item_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_pharmacy_movement_item->CurrentMode == "add" || $view_pharmacy_movement_item->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_movement_item_grid->KeyCount ?>">
<?php echo $view_pharmacy_movement_item_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_movement_item_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_movement_item_grid->KeyCount ?>">
<?php echo $view_pharmacy_movement_item_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacy_movement_itemgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_movement_item_grid->Recordset)
	$view_pharmacy_movement_item_grid->Recordset->Close();
?>
<?php if ($view_pharmacy_movement_item_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacy_movement_item_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_movement_item_grid->TotalRecords == 0 && !$view_pharmacy_movement_item->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_pharmacy_movement_item_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_movement_item",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_pharmacy_movement_item_grid->terminate();
?>