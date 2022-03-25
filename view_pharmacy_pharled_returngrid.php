<?php
namespace PHPMaker2019\HIMS;

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
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>

// Form object
var fview_pharmacy_pharled_returngrid = new ew.Form("fview_pharmacy_pharled_returngrid", "grid");
fview_pharmacy_pharled_returngrid.formKeyCountName = '<?php echo $view_pharmacy_pharled_return_grid->FormKeyCountName ?>';

// Validate form
fview_pharmacy_pharled_returngrid.validate = function() {
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
		<?php if ($view_pharmacy_pharled_return_grid->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BRCODE->caption(), $view_pharmacy_pharled_return->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PRC->caption(), $view_pharmacy_pharled_return->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->SiNo->caption(), $view_pharmacy_pharled_return->SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->SiNo->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->Product->Required) { ?>
			elm = this.getElements("x" + infix + "_Product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->Product->caption(), $view_pharmacy_pharled_return->Product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->SLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->SLNO->caption(), $view_pharmacy_pharled_return->SLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->SLNO->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RT->caption(), $view_pharmacy_pharled_return->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->RT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->MRQ->caption(), $view_pharmacy_pharled_return->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->MRQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->IQ->caption(), $view_pharmacy_pharled_return->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->IQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->DAMT->Required) { ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DAMT->caption(), $view_pharmacy_pharled_return->DAMT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->DAMT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BATCHNO->caption(), $view_pharmacy_pharled_return->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->EXPDT->caption(), $view_pharmacy_pharled_return->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->EXPDT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->Mfg->Required) { ?>
			elm = this.getElements("x" + infix + "_Mfg");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->Mfg->caption(), $view_pharmacy_pharled_return->Mfg->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->UR->caption(), $view_pharmacy_pharled_return->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->UR->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_grid->_USERID->Required) { ?>
			elm = this.getElements("x" + infix + "__USERID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->_USERID->caption(), $view_pharmacy_pharled_return->_USERID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->id->caption(), $view_pharmacy_pharled_return->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->HosoID->Required) { ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->HosoID->caption(), $view_pharmacy_pharled_return->HosoID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->createdby->caption(), $view_pharmacy_pharled_return->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->createddatetime->caption(), $view_pharmacy_pharled_return->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->modifiedby->caption(), $view_pharmacy_pharled_return->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->modifieddatetime->caption(), $view_pharmacy_pharled_return->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_grid->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BRNAME->caption(), $view_pharmacy_pharled_return->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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
	if (ew.valueChanged(fobj, infix, "SLNO", false)) return false;
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

// Form_CustomValidate event
fview_pharmacy_pharled_returngrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_pharled_returngrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_pharled_returngrid.lists["x_SLNO"] = <?php echo $view_pharmacy_pharled_return_grid->SLNO->Lookup->toClientList() ?>;
fview_pharmacy_pharled_returngrid.lists["x_SLNO"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_grid->SLNO->lookupOptions()) ?>;
fview_pharmacy_pharled_returngrid.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_pharmacy_pharled_return_grid->renderOtherOptions();
?>
<?php $view_pharmacy_pharled_return_grid->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_grid->showMessage();
?>
<?php if ($view_pharmacy_pharled_return_grid->TotalRecs > 0 || $view_pharmacy_pharled_return->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_pharled_return_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled_return">
<?php if ($view_pharmacy_pharled_return_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_pharmacy_pharled_return_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_pharled_returngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_pharled_return" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_pharled_returngrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_pharled_return_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_pharled_return_grid->renderListOptions();

// Render list options (header, left)
$view_pharmacy_pharled_return_grid->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return->BRCODE->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return->PRC->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return->SiNo->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->SiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->SiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return->Product->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Product->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $view_pharmacy_pharled_return->SLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $view_pharmacy_pharled_return->SLNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->SLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->SLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return->RT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return->MRQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return->IQ->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return->DAMT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->DAMT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->DAMT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return->BATCHNO->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return->EXPDT->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return->Mfg->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->Mfg->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->Mfg->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return->UR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return->UR->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return->_USERID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return->_USERID->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->_USERID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->_USERID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return->id->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return->id->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return->HosoID->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return->createdby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return->createddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return->modifiedby->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return->BRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return->BRNAME->headerCellClass() ?>"><div><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->BRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->BRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
$view_pharmacy_pharled_return_grid->StartRec = 1;
$view_pharmacy_pharled_return_grid->StopRec = $view_pharmacy_pharled_return_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_pharmacy_pharled_return_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_pharled_return_grid->FormKeyCountName) && ($view_pharmacy_pharled_return->isGridAdd() || $view_pharmacy_pharled_return->isGridEdit() || $view_pharmacy_pharled_return->isConfirm())) {
		$view_pharmacy_pharled_return_grid->KeyCount = $CurrentForm->getValue($view_pharmacy_pharled_return_grid->FormKeyCountName);
		$view_pharmacy_pharled_return_grid->StopRec = $view_pharmacy_pharled_return_grid->StartRec + $view_pharmacy_pharled_return_grid->KeyCount - 1;
	}
}
$view_pharmacy_pharled_return_grid->RecCnt = $view_pharmacy_pharled_return_grid->StartRec - 1;
if ($view_pharmacy_pharled_return_grid->Recordset && !$view_pharmacy_pharled_return_grid->Recordset->EOF) {
	$view_pharmacy_pharled_return_grid->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_pharled_return_grid->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_pharled_return_grid->StartRec > 1)
		$view_pharmacy_pharled_return_grid->Recordset->move($view_pharmacy_pharled_return_grid->StartRec - 1);
} elseif (!$view_pharmacy_pharled_return->AllowAddDeleteRow && $view_pharmacy_pharled_return_grid->StopRec == 0) {
	$view_pharmacy_pharled_return_grid->StopRec = $view_pharmacy_pharled_return->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_pharled_return->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_pharled_return->resetAttributes();
$view_pharmacy_pharled_return_grid->renderRow();
if ($view_pharmacy_pharled_return->isGridAdd())
	$view_pharmacy_pharled_return_grid->RowIndex = 0;
if ($view_pharmacy_pharled_return->isGridEdit())
	$view_pharmacy_pharled_return_grid->RowIndex = 0;
while ($view_pharmacy_pharled_return_grid->RecCnt < $view_pharmacy_pharled_return_grid->StopRec) {
	$view_pharmacy_pharled_return_grid->RecCnt++;
	if ($view_pharmacy_pharled_return_grid->RecCnt >= $view_pharmacy_pharled_return_grid->StartRec) {
		$view_pharmacy_pharled_return_grid->RowCnt++;
		if ($view_pharmacy_pharled_return->isGridAdd() || $view_pharmacy_pharled_return->isGridEdit() || $view_pharmacy_pharled_return->isConfirm()) {
			$view_pharmacy_pharled_return_grid->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_pharled_return_grid->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_pharled_return_grid->FormActionName) && $view_pharmacy_pharled_return_grid->EventCancelled)
				$view_pharmacy_pharled_return_grid->RowAction = strval($CurrentForm->getValue($view_pharmacy_pharled_return_grid->FormActionName));
			elseif ($view_pharmacy_pharled_return->isGridAdd())
				$view_pharmacy_pharled_return_grid->RowAction = "insert";
			else
				$view_pharmacy_pharled_return_grid->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_pharled_return_grid->KeyCount = $view_pharmacy_pharled_return_grid->RowIndex;

		// Init row class and style
		$view_pharmacy_pharled_return->resetAttributes();
		$view_pharmacy_pharled_return->CssClass = "";
		if ($view_pharmacy_pharled_return->isGridAdd()) {
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
		if ($view_pharmacy_pharled_return->isGridAdd()) // Grid add
			$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_pharled_return->isGridAdd() && $view_pharmacy_pharled_return->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return->isGridEdit()) { // Grid edit
			if ($view_pharmacy_pharled_return->EventCancelled)
				$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values
			if ($view_pharmacy_pharled_return_grid->RowAction == "insert")
				$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_pharled_return->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_pharled_return->isGridEdit() && ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT || $view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) && $view_pharmacy_pharled_return->EventCancelled) // Update failed
			$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_pharled_return_grid->EditRowCnt++;
		if ($view_pharmacy_pharled_return->isConfirm()) // Confirm row
			$view_pharmacy_pharled_return_grid->restoreCurrentRowFormValues($view_pharmacy_pharled_return_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_pharmacy_pharled_return->RowAttrs = array_merge($view_pharmacy_pharled_return->RowAttrs, array('data-rowindex'=>$view_pharmacy_pharled_return_grid->RowCnt, 'id'=>'r' . $view_pharmacy_pharled_return_grid->RowCnt . '_view_pharmacy_pharled_return', 'data-rowtype'=>$view_pharmacy_pharled_return->RowType));

		// Render row
		$view_pharmacy_pharled_return_grid->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_pharled_return_grid->RowAction <> "delete" && $view_pharmacy_pharled_return_grid->RowAction <> "insertdelete" && !($view_pharmacy_pharled_return_grid->RowAction == "insert" && $view_pharmacy_pharled_return->isConfirm() && $view_pharmacy_pharled_return_grid->emptyRow())) {
?>
	<tr<?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "left", $view_pharmacy_pharled_return_grid->RowCnt);
?>
	<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_pharled_return->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_pharled_return->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRC->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo"<?php echo $view_pharmacy_pharled_return->SiNo->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return->SiNo->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SiNo->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view_pharmacy_pharled_return->Product->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Product->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Product->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Product->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Product->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO"<?php echo $view_pharmacy_pharled_return->SLNO->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_pharled_return_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-value-separator="<?php echo $view_pharmacy_pharled_return->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_pharled_returngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $view_pharmacy_pharled_return->SLNO->Lookup->getParamTag("p_x" . $view_pharmacy_pharled_return_grid->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_pharled_return_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-value-separator="<?php echo $view_pharmacy_pharled_return->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_pharled_returngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $view_pharmacy_pharled_return->SLNO->Lookup->getParamTag("p_x" . $view_pharmacy_pharled_return_grid->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO">
<span<?php echo $view_pharmacy_pharled_return->SLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SLNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $view_pharmacy_pharled_return->RT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $view_pharmacy_pharled_return->MRQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MRQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $view_pharmacy_pharled_return->IQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->IQ->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT"<?php echo $view_pharmacy_pharled_return->DAMT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return->DAMT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DAMT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $view_pharmacy_pharled_return->BATCHNO->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return->BATCHNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BATCHNO->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $view_pharmacy_pharled_return->EXPDT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->EXPDT->ReadOnly && !$view_pharmacy_pharled_return->EXPDT->Disabled && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->EXPDT->ReadOnly && !$view_pharmacy_pharled_return->EXPDT->Disabled && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->EXPDT->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg"<?php echo $view_pharmacy_pharled_return->Mfg->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return->Mfg->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Mfg->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $view_pharmacy_pharled_return->UR->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return->UR->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->UR->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID"<?php echo $view_pharmacy_pharled_return->_USERID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return->_USERID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->_USERID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_pharled_return->id->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->id->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $view_pharmacy_pharled_return->HosoID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return->HosoID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->HosoID->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_pharmacy_pharled_return->createdby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_pharmacy_pharled_return->createddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_pharmacy_pharled_return->modifiedby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_pharled_return->modifieddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME"<?php echo $view_pharmacy_pharled_return->BRNAME->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_grid->RowCnt ?>_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return->BRNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRNAME->getViewValue() ?></span>
</span>
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="fview_pharmacy_pharled_returngrid$x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="fview_pharmacy_pharled_returngrid$o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "right", $view_pharmacy_pharled_return_grid->RowCnt);
?>
	</tr>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD || $view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacy_pharled_returngrid.updateLists(<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_pharled_return->isGridAdd() || $view_pharmacy_pharled_return->CurrentMode == "copy")
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
		$view_pharmacy_pharled_return->RowAttrs = array_merge($view_pharmacy_pharled_return->RowAttrs, array('data-rowindex'=>$view_pharmacy_pharled_return_grid->RowIndex, 'id'=>'r0_view_pharmacy_pharled_return', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacy_pharled_return->RowAttrs["class"], "ew-template");
		$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_pharled_return_grid->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_grid->renderListOptions();
		$view_pharmacy_pharled_return_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "left", $view_pharmacy_pharled_return_grid->RowIndex);
?>
	<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BRCODE" class="form-group view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->BRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return->SiNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return->SiNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SiNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
		<td data-name="Product">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Product->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Product->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return->Product->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->Product->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_pharled_return_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-value-separator="<?php echo $view_pharmacy_pharled_return->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_pharled_returngrid.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $view_pharmacy_pharled_return->SLNO->Lookup->getParamTag("p_x" . $view_pharmacy_pharled_return_grid->RowIndex . "_SLNO") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<span<?php echo $view_pharmacy_pharled_return->SLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
		<td data-name="RT">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return->RT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->RT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return->MRQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->MRQ->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return->IQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->IQ->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DAMT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return->DAMT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->DAMT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BATCHNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return->BATCHNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->BATCHNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->EXPDT->ReadOnly && !$view_pharmacy_pharled_return->EXPDT->Disabled && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returngrid", "x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return->EXPDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->EXPDT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Mfg->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return->Mfg->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->Mfg->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
		<td data-name="UR">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->UR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return->UR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->UR->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return__USERID" class="form-group view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return->_USERID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->_USERID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_HosoID" class="form-group view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return->HosoID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->HosoID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_createdby" class="form-group view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_createddatetime" class="form-group view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_modifiedby" class="form-group view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_modifieddatetime" class="form-group view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<?php if (!$view_pharmacy_pharled_return->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_pharled_return_BRNAME" class="form-group view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return->BRNAME->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->BRNAME->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="x<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_grid->ListOptions->render("body", "right", $view_pharmacy_pharled_return_grid->RowIndex);
?>
<script>
fview_pharmacy_pharled_returngrid.updateLists(<?php echo $view_pharmacy_pharled_return_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
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
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_pharmacy_pharled_return_grid->Recordset)
	$view_pharmacy_pharled_return_grid->Recordset->Close();
?>
</div>
<?php if ($view_pharmacy_pharled_return_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_pharmacy_pharled_return_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_pharled_return_grid->TotalRecs == 0 && !$view_pharmacy_pharled_return->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_pharled_return_grid->terminate();
?>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_pharled_return", "95%", "");
</script>
<?php } ?>