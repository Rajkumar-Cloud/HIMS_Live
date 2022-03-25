<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_pharmacy_pharled_return_grid))
	$view_pharmacy_pharled_return_grid = new view_pharmacy_pharled_return_grid();

// Run the page
$view_pharmacy_pharled_return_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_grid->Page_Render();
?>
<?php if (!$view_pharmacy_pharled_return_grid->isExport()) { ?>
<script>
var fview_pharmacy_pharled_returngrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_pharmacy_pharled_returngrid = new ew.Form("fview_pharmacy_pharled_returngrid", "grid");
	fview_pharmacy_pharled_returngrid.formKeyCountName = '<?php echo $view_pharmacy_pharled_return_grid->FormKeyCountName ?>';

	// Validate form
	fview_pharmacy_pharled_returngrid.validate = function() {
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
			<?php if ($view_pharmacy_pharled_return_grid->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->BRCODE->caption(), $view_pharmacy_pharled_return_grid->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->PRC->caption(), $view_pharmacy_pharled_return_grid->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->SiNo->caption(), $view_pharmacy_pharled_return_grid->SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_grid->SiNo->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_grid->Product->Required) { ?>
				elm = this.getElements("x" + infix + "_Product");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->Product->caption(), $view_pharmacy_pharled_return_grid->Product->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->RT->caption(), $view_pharmacy_pharled_return_grid->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_grid->RT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_grid->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->MRQ->caption(), $view_pharmacy_pharled_return_grid->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_grid->MRQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_grid->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->IQ->caption(), $view_pharmacy_pharled_return_grid->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_grid->IQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_grid->DAMT->Required) { ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->DAMT->caption(), $view_pharmacy_pharled_return_grid->DAMT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_grid->DAMT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_grid->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->BATCHNO->caption(), $view_pharmacy_pharled_return_grid->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->EXPDT->caption(), $view_pharmacy_pharled_return_grid->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_grid->EXPDT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_grid->Mfg->Required) { ?>
				elm = this.getElements("x" + infix + "_Mfg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->Mfg->caption(), $view_pharmacy_pharled_return_grid->Mfg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->UR->caption(), $view_pharmacy_pharled_return_grid->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_grid->UR->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_grid->_USERID->Required) { ?>
				elm = this.getElements("x" + infix + "__USERID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->_USERID->caption(), $view_pharmacy_pharled_return_grid->_USERID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->id->caption(), $view_pharmacy_pharled_return_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->HosoID->Required) { ?>
				elm = this.getElements("x" + infix + "_HosoID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->HosoID->caption(), $view_pharmacy_pharled_return_grid->HosoID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->createdby->caption(), $view_pharmacy_pharled_return_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->createddatetime->caption(), $view_pharmacy_pharled_return_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->modifiedby->caption(), $view_pharmacy_pharled_return_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->modifieddatetime->caption(), $view_pharmacy_pharled_return_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_grid->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_grid->BRNAME->caption(), $view_pharmacy_pharled_return_grid->BRNAME->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_pharmacy_pharled_returngrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "SiNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "Product", false)) return false;
		if (ew.valueChanged(fobj, infix, "RT", false)) return false;
		if (ew.valueChanged(fobj, infix, "MRQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "DAMT", false)) return false;
		if (ew.valueChanged(fobj, infix, "BATCHNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "EXPDT", false)) return false;
		if (ew.valueChanged(fobj, infix, "Mfg", false)) return false;
		if (ew.valueChanged(fobj, infix, "UR", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_pharled_returngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_pharled_returngrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_pharled_returngrid.lists["x_Product"] = <?php echo $view_pharmacy_pharled_return_grid->Product->Lookup->toClientList($view_pharmacy_pharled_return_grid) ?>;
	fview_pharmacy_pharled_returngrid.lists["x_Product"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_grid->Product->lookupOptions()) ?>;
	fview_pharmacy_pharled_returngrid.autoSuggests["x_Product"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacy_pharled_returngrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_pharmacy_pharled_return_grid->renderOtherOptions();
?>
<?php if ($view_pharmacy_pharled_return_grid->TotalRecords > 0 || $view_pharmacy_pharled_return->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_pharled_return_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled_return">
<?php if ($view_pharmacy_pharled_return_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacy_pharled_return_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_pharled_returngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_pharled_return" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_pharled_returngrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_pharled_return->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_pharled_return_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacy_pharled_return_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_pharled_return_grid->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return_grid->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return_grid->BRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return_grid->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return_grid->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->SiNo->Visible) { // SiNo ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return_grid->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return_grid->SiNo->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->SiNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->SiNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return_grid->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return_grid->Product->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->Product->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->Product->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->Product->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return_grid->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return_grid->RT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return_grid->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return_grid->MRQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return_grid->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return_grid->IQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return_grid->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return_grid->DAMT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->DAMT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->DAMT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->BATCHNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return_grid->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return_grid->EXPDT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->Mfg->Visible) { // Mfg ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return_grid->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return_grid->Mfg->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->Mfg->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->Mfg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->Mfg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->UR->Visible) { // UR ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return_grid->UR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return_grid->UR->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->_USERID->Visible) { // USERID ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return_grid->_USERID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return_grid->_USERID->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->_USERID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->_USERID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->_USERID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->id->Visible) { // id ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return_grid->id->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return_grid->id->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return_grid->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return_grid->HosoID->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->HosoID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->HosoID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return_grid->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return_grid->createdby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return_grid->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return_grid->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->BRNAME->Visible) { // BRNAME ?>
	<?php if ($view_pharmacy_pharled_return_grid->SortUrl($view_pharmacy_pharled_return_grid->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return_grid->BRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return_grid->BRNAME->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_grid->BRNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_grid->BRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_grid->BRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_pharled_return_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_pharmacy_pharled_return_grid->StartRecord = 1;
$view_pharmacy_pharled_return_grid->StopRecord = $view_pharmacy_pharled_return_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_pharmacy_pharled_return->isConfirm() || $view_pharmacy_pharled_return_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_pharled_return_grid->FormKeyCountName) && ($view_pharmacy_pharled_return_grid->isGridAdd() || $view_pharmacy_pharled_return_grid->isGridEdit() || $view_pharmacy_pharled_return->isConfirm())) {
		$view_pharmacy_pharled_return_grid->KeyCount = $CurrentForm->getValue($view_pharmacy_pharled_return_grid->FormKeyCountName);
		$view_pharmacy_pharled_return_grid->StopRecord = $view_pharmacy_pharled_return_grid->StartRecord + $view_pharmacy_pharled_return_grid->KeyCount - 1;
	}
}
$view_pharmacy_pharled_return_grid->RecordCount = $view_pharmacy_pharled_return_grid->StartRecord - 1;
if ($view_pharmacy_pharled_return_grid->Recordset && !$view_pharmacy_pharled_return_grid->Recordset->EOF) {
	$view_pharmacy_pharled_return_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_pharled_return_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_pharled_return_grid->StartRecord > 1)
		$view_pharmacy_pharled_return_grid->Recordset->move($view_pharmacy_pharled_return_grid->StartRecord - 1);
} elseif (!$view_pharmacy_pharled_return->AllowAddDeleteRow && $view_pharmacy_pharled_return_grid->StopRecord == 0) {
	$view_pharmacy_pharled_return_grid->StopRecord = $view_pharmacy_pharled_return->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_pharled_return->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_pharled_return->resetAttributes();
$view_pharmacy_pharled_return_grid->renderRow();
if ($view_pharmacy_pharled_return_grid->isGridAdd())
	$view_pharmacy_pharled_return_grid->RowIndex = 0;
if ($view_pharmacy_pharled_return_grid->isGridEdit())
	$view_pharmacy_pharled_return_grid->RowIndex = 0;
while ($view_pharmacy_pharled_return_grid->RecordCount < $view_pharmacy_pharled_return_grid->StopRecord) {
	$view_pharmacy_pharled_return_grid->RecordCount++;
	if ($view_pharmacy_pharled_return_grid->RecordCount >= $view_pharmacy_pharled_return_grid->StartRecord) {
		$view_pharmacy_pharled_return_grid->RowCount++;
		if ($view_pharmacy_pharled_return_grid->isGridAdd() || $view_pharmacy_pharled_return_grid->isGridEdit() || $view_pharmacy_pharled_return->isConfirm()) {
			$view_pharmacy_pharled_return_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_pharled_return_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_pharled_return_grid->FormActionName) && ($view_pharmacy_pharled_return->isConfirm() || $view_pharmacy_pharled_return_grid->EventCancelled))
				$view_pharmacy_pharled_return_grid->RowAction = strval($CurrentForm->getValue($view_pharmacy_pharled_return_grid->FormActionName));
			elseif ($view_pharmacy_pharled_return_grid->isGridAdd())
				$view_pharmacy_pharled_return_grid->RowAction = "insert";
			else
				$view_pharmacy_pharled_return_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_pharled_return_grid->KeyCount = $view_pharmacy_pharled_return_grid->RowIndex;

		// Init row class and style
		$view_pharmacy_pharled_return->resetAttributes();
		$view_pharmacy_pharled_return->CssClass = "";
		if ($view_pharmacy_pharled_return_grid->isGridAdd()) {
			if ($view_pharmacy_pharled_return->CurrentMode == "copy") {
				$view_pharmacy_pharled_return_grid->loadRowValues($view_pharmacy_pharled_return_grid->Recordset); // Load row values
				$view_pharmacy_pharled_return_grid->setRecordKey($view_pharmacy_pharled_return_grid->RowOldKey, $view_pharmacy_pharled_return_grid->Recordset); // Set old record key
			} else {
				$view_pharmacy_pharled_return_grid->loadRowValues(); // Load default values
				$view_pharmacy_pharled_return_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_pharmacy_pharled_return_grid->loadRowValues($view_pharmacy_pharled_return_grid->Recordset); // Load row values
		}
		$view_pharmacy_pharled_return->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_pharled_return_grid->isGridAdd()) // Grid add
			$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_pharled_return_grid->isGridAdd() && $view_pharmacy_pharled_return->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return_grid->isGridEdit()) { // Grid edit
			if ($view_pharmacy_pharled_return->EventCancelled)
				$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values
			if ($view_pharmacy_pharled_return_grid->RowAction == "insert")
				$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_pharled_return->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_pharled_return_grid->isGridEdit() && ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT || $view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) && $view_pharmacy_pharled_return->EventCancelled) // Update failed
			$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_pharled_return_grid->EditRowCount++;
		if ($view_pharmacy_pharled_return->isConfirm()) // Confirm row
			$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacy_pharled_return->RowAttrs->merge(["data-rowindex" => $view_pharmacy_pharled_return_grid->RowCount, "id" => "r" . $view_pharmacy_pharled_return_grid->RowCount . "_view_pharmacy_pharled_return", "data-rowtype" => $view_pharmacy_pharled_return->RowType]);

		// Render row
		$view_pharmacy_pharled_return_grid->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_pharled_return_grid->RowAction != "delete" && $view_pharmacy_pharled_return_grid->RowAction != "insertdelete" && !($view_pharmacy_pharled_return_grid->RowAction == "insert" && $view_pharmacy_pharled_return->isConfirm() && $view_pharmacy_pharled_return_grid->emptyRow())) {
?>
	<tr <?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "left", $view_pharmacy_pharled_return_grid->RowCount);
?>
	<?php if ($view_pharmacy_pharled_return_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacy_pharled_return_grid->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return_grid->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_pharled_return_grid->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return_grid->PRC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo" <?php echo $view_pharmacy_pharled_return_grid->SiNo->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return_grid->SiNo->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->SiNo->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->Product->Visible) { // Product ?>
		<td data-name="Product" <?php echo $view_pharmacy_pharled_return_grid->Product->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<?php
$onchange = $view_pharmacy_pharled_return_grid->Product->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_pharled_return_grid->Product->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo RemoveHtml($view_pharmacy_pharled_return_grid->Product->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return_grid->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-value-separator="<?php echo $view_pharmacy_pharled_return_grid->Product->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid"], function() {
	fview_pharmacy_pharled_returngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_pharled_return_grid->Product->Lookup->getParamTag($view_pharmacy_pharled_return_grid, "p_x" . $view_pharmacy_pharled_return_grid->RowIndex . "_Product") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<?php
$onchange = $view_pharmacy_pharled_return_grid->Product->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_pharled_return_grid->Product->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo RemoveHtml($view_pharmacy_pharled_return_grid->Product->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return_grid->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-value-separator="<?php echo $view_pharmacy_pharled_return_grid->Product->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid"], function() {
	fview_pharmacy_pharled_returngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_pharled_return_grid->Product->Lookup->getParamTag($view_pharmacy_pharled_return_grid, "p_x" . $view_pharmacy_pharled_return_grid->RowIndex . "_Product") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return_grid->Product->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->Product->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $view_pharmacy_pharled_return_grid->RT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return_grid->RT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->RT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $view_pharmacy_pharled_return_grid->MRQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return_grid->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->MRQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $view_pharmacy_pharled_return_grid->IQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return_grid->IQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->IQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT" <?php echo $view_pharmacy_pharled_return_grid->DAMT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return_grid->DAMT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->DAMT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $view_pharmacy_pharled_return_grid->BATCHNO->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->BATCHNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $view_pharmacy_pharled_return_grid->EXPDT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_grid->EXPDT->ReadOnly && !$view_pharmacy_pharled_return_grid->EXPDT->Disabled && !isset($view_pharmacy_pharled_return_grid->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_grid->EXPDT->ReadOnly && !$view_pharmacy_pharled_return_grid->EXPDT->Disabled && !isset($view_pharmacy_pharled_return_grid->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return_grid->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->EXPDT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg" <?php echo $view_pharmacy_pharled_return_grid->Mfg->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return_grid->Mfg->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->Mfg->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $view_pharmacy_pharled_return_grid->UR->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return_grid->UR->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->UR->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID" <?php echo $view_pharmacy_pharled_return_grid->_USERID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return_grid->_USERID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->_USERID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->_USERID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->_USERID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->_USERID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->_USERID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_pharled_return_grid->id->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group">
<span<?php echo $view_pharmacy_pharled_return_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return_grid->id->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->id->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" <?php echo $view_pharmacy_pharled_return_grid->HosoID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return_grid->HosoID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->HosoID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->HosoID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->HosoID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->HosoID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->HosoID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_pharmacy_pharled_return_grid->createdby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return_grid->createdby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_pharmacy_pharled_return_grid->createddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return_grid->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_pharmacy_pharled_return_grid->modifiedby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return_grid->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME" <?php echo $view_pharmacy_pharled_return_grid->BRNAME->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCount ?>_view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return_grid->BRNAME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_grid->BRNAME->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRNAME->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRNAME->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRNAME->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRNAME->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "right", $view_pharmacy_pharled_return_grid->RowCount);
?>
	</tr>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD || $view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "load"], function() {
	fview_pharmacy_pharled_returngrid.updateLists(<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_pharled_return_grid->isGridAdd() || $view_pharmacy_pharled_return->CurrentMode == "copy")
		if (!$view_pharmacy_pharled_return_grid->Recordset->EOF)
			$view_pharmacy_pharled_return_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_pharled_return->CurrentMode == "add" || $view_pharmacy_pharled_return->CurrentMode == "copy" || $view_pharmacy_pharled_return->CurrentMode == "edit") {
		$view_pharmacy_pharled_return_grid->RowIndex = '$rowindex$';
		$view_pharmacy_pharled_return_grid->loadRowValues();

		// Set row properties
		$view_pharmacy_pharled_return->resetAttributes();
		$view_pharmacy_pharled_return->RowAttrs->merge(["data-rowindex" => $view_pharmacy_pharled_return_grid->RowIndex, "id" => "r0_view_pharmacy_pharled_return", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacy_pharled_return->RowAttrs->appendClass("ew-template");
		$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_pharled_return_grid->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_grid->renderListOptions();
		$view_pharmacy_pharled_return_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "left", $view_pharmacy_pharled_return_grid->RowIndex);
?>
	<?php if ($view_pharmacy_pharled_return_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BRCODE" class="form-group view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return_grid->BRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->BRCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return_grid->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->PRC->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->SiNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return_grid->SiNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->SiNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->Product->Visible) { // Product ?>
		<td data-name="Product">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<?php
$onchange = $view_pharmacy_pharled_return_grid->Product->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_pharled_return_grid->Product->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo RemoveHtml($view_pharmacy_pharled_return_grid->Product->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return_grid->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-value-separator="<?php echo $view_pharmacy_pharled_return_grid->Product->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid"], function() {
	fview_pharmacy_pharled_returngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_pharled_return_grid->Product->Lookup->getParamTag($view_pharmacy_pharled_return_grid, "p_x" . $view_pharmacy_pharled_return_grid->RowIndex . "_Product") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return_grid->Product->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->Product->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->RT->Visible) { // RT ?>
		<td data-name="RT">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->RT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return_grid->RT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->RT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->MRQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return_grid->MRQ->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->MRQ->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->IQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return_grid->IQ->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->IQ->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->DAMT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return_grid->DAMT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->DAMT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return_grid->BATCHNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->BATCHNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_grid->EXPDT->ReadOnly && !$view_pharmacy_pharled_return_grid->EXPDT->Disabled && !isset($view_pharmacy_pharled_return_grid->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return_grid->EXPDT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->EXPDT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->Mfg->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return_grid->Mfg->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->Mfg->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->UR->Visible) { // UR ?>
		<td data-name="UR">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_grid->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_grid->UR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return_grid->UR->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->UR->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return__USERID" class="form-group view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return_grid->_USERID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->_USERID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->_USERID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_HosoID" class="form-group view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return_grid->HosoID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->HosoID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->HosoID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_createdby" class="form-group view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_createddatetime" class="form-group view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_modifiedby" class="form-group view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_modifieddatetime" class="form-group view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_grid->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BRNAME" class="form-group view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return_grid->BRNAME->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_grid->BRNAME->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRNAME->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_grid->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "right", $view_pharmacy_pharled_return_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returngrid", "load"], function() {
	fview_pharmacy_pharled_returngrid.updateLists(<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_pharmacy_pharled_return->CurrentMode == "add" || $view_pharmacy_pharled_return->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_pharled_return_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_pharled_return_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_pharled_return_grid->KeyCount ?>">
<?php echo $view_pharmacy_pharled_return_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_pharmacy_pharled_return_grid->FormKeyCountName ?>" id="<?php echo $view_pharmacy_pharled_return_grid->FormKeyCountName ?>" value="<?php echo $view_pharmacy_pharled_return_grid->KeyCount ?>">
<?php echo $view_pharmacy_pharled_return_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_pharmacy_pharled_returngrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_pharled_return_grid->Recordset)
	$view_pharmacy_pharled_return_grid->Recordset->Close();
?>
<?php if ($view_pharmacy_pharled_return_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacy_pharled_return_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->TotalRecords == 0 && !$view_pharmacy_pharled_return->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_pharmacy_pharled_return_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");
	// Write your table-specific startup script here
	// document.write("page loaded");
	//$("[data-name='SiNo']").hide();
	//$("[data-name='Product']").hide();
	//$("[data-name='Mfg']").hide();

			  $("[data-name='BRCODE']").hide();
			  $("[data-name='TYPE']").hide();
			  $("[data-name='DN']").hide();
			  $("[data-name='RDN']").hide();
			  $("[data-name='DT']").hide();
			  $("[data-name='UR']").hide();
			  $("[data-name='PRC']").hide();
			  $("[data-name='OQ']").hide();
			  $("[data-name='RQ']").hide();

			//  $("[data-name='MRQ']").hide();
			  $("[data-name='IQ']").hide();

		//	  $("[data-name='BATCHNO']").hide();
		//	  $("[data-name='EXPDT']").hide();

			  $("[data-name='BILLNO']").hide();
			  $("[data-name='BILLDT']").hide();

		//	  $("[data-name='RT']").hide();
			  $("[data-name='VALUE']").hide();
			  $("[data-name='DISC']").hide();
			  $("[data-name='TAXP']").hide();
			  $("[data-name='TAX']").hide();
			  $("[data-name='TAXR']").hide();

		//	  $("[data-name='DAMT']").hide();
			  $("[data-name='EMPNO']").hide();
			  $("[data-name='PC']").hide();
			  $("[data-name='DRNAME']").hide();
			  $("[data-name='BTIME']").hide();
			  $("[data-name='ONO']").hide();
			  $("[data-name='ODT']").hide();
			  $("[data-name='PURRT']").hide();
			  $("[data-name='GRP']").hide();
			  $("[data-name='IBATCH']").hide();
			  $("[data-name='IPNO']").hide();
			  $("[data-name='OPNO']").hide();
			  $("[data-name='RECID']").hide();
			  $("[data-name='FQTY']").hide();
			  $("[data-name='UR']").hide();		  
			  $("[data-name='DCID']").hide();
			  $("[data-name='USERID']").hide();
			  $("[data-name='MODDT']").hide();
			  $("[data-name='FYM']").hide();
			  $("[data-name='PRCBATCH']").hide();
			  $("[data-name='SLNO']").hide();
			  $("[data-name='MRP']").hide();
			  $("[data-name='BILLYM']").hide();
			  $("[data-name='BILLGRP']").hide();
			  $("[data-name='STAFF']").hide();
			  $("[data-name='TEMPIPNO']").hide();
			  $("[data-name='PRNTED']").hide();
			  $("[data-name='PATNAME']").hide();
			  $("[data-name='PJVNO']").hide();
			  $("[data-name='PJVSLNO']").hide();
			  $("[data-name='OTHDISC']").hide();
			  $("[data-name='PJVYM']").hide();
			  $("[data-name='PURDISCPER']").hide();
			  $("[data-name='CASHIER']").hide();
			  $("[data-name='CASHTIME']").hide();
			  $("[data-name='CASHRECD']").hide();
			  $("[data-name='CASHREFNO']").hide();
			  $("[data-name='CASHIERSHIFT']").hide();
			  $("[data-name='PRCODE']").hide();
			  $("[data-name='RELEASEBY']").hide();
			  $("[data-name='CRAUTHOR']").hide();
			  $("[data-name='PAYMENT']").hide();
			  $("[data-name='DRID']").hide();
			  $("[data-name='WARD']").hide();
			  $("[data-name='STAXTYPE']").hide();
			  $("[data-name='PURDISCVAL']").hide();
			  $("[data-name='RNDOFF']").hide();
			  $("[data-name='DISCONMRP']").hide();
			  $("[data-name='DELVDT']").hide();
			  $("[data-name='DELVTIME']").hide();
			  $("[data-name='DELVBY']").hide();
			  $("[data-name='HOSPNO']").hide();
			  $("[data-name='pbv']").hide();
			  $("[data-name='pbt']").hide();
			  $("[data-name='Reception']").hide();
			  $("[data-name='PatID']").hide();
			  $("[data-name='mrnno']").hide();

	function addtotalSum()
	{	
		var totSum = 0;
		for (var i = 1; i < 40; i++) {
				try {
					var amount = document.getElementById("x" + i + "_DAMT");
					if (amount.value != '') {
						totSum = parseInt(totSum) + parseInt(amount.value);
					 var SiNo = document.getElementById("x" + i + "_SiNo");
					 SiNo.value = i;
					}
					var RT = document.getElementById("x" + i + "_RT");
					var Product = document.getElementById("sv_x" + i + "_Product").value;
					if(Product!= '')
					{
					 var SiNo = document.getElementById("x" + i + "_SiNo");
					 SiNo.value = i;
					 }
				}
				catch(err) {
				}
		}
			var BillAmount = document.getElementById("x_Amount");

		//	BillAmount.value = totSum;
	}
	</script>
	<style>
	.input-group>.form-control {
		width: 1%;
		flex-grow: 1;
	}
	</style>
	<script>
});
</script>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_pharled_return",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_pharmacy_pharled_return_grid->terminate();
?>