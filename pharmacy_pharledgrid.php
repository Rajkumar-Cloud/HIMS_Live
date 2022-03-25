<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($pharmacy_pharled_grid))
	$pharmacy_pharled_grid = new pharmacy_pharled_grid();

// Run the page
$pharmacy_pharled_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_pharled_grid->Page_Render();
?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>

// Form object
var fpharmacy_pharledgrid = new ew.Form("fpharmacy_pharledgrid", "grid");
fpharmacy_pharledgrid.formKeyCountName = '<?php echo $pharmacy_pharled_grid->FormKeyCountName ?>';

// Validate form
fpharmacy_pharledgrid.validate = function() {
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
		<?php if ($pharmacy_pharled_grid->SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SiNo->caption(), $pharmacy_pharled->SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SiNo->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->SLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SLNO->caption(), $pharmacy_pharled->SLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SLNO->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->Product->Required) { ?>
			elm = this.getElements("x" + infix + "_Product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->Product->caption(), $pharmacy_pharled->Product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RT->caption(), $pharmacy_pharled->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->RT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->IQ->caption(), $pharmacy_pharled->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->IQ->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->DAMT->Required) { ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DAMT->caption(), $pharmacy_pharled->DAMT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->DAMT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->Mfg->Required) { ?>
			elm = this.getElements("x" + infix + "_Mfg");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->Mfg->caption(), $pharmacy_pharled->Mfg->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->EXPDT->caption(), $pharmacy_pharled->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BATCHNO->caption(), $pharmacy_pharled->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BRCODE->caption(), $pharmacy_pharled->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PRC->caption(), $pharmacy_pharled->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->UR->caption(), $pharmacy_pharled->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->UR->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->_USERID->Required) { ?>
			elm = this.getElements("x" + infix + "__USERID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->_USERID->caption(), $pharmacy_pharled->_USERID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->id->caption(), $pharmacy_pharled->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->HosoID->Required) { ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->HosoID->caption(), $pharmacy_pharled->HosoID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->createdby->caption(), $pharmacy_pharled->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->createddatetime->caption(), $pharmacy_pharled->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->modifiedby->caption(), $pharmacy_pharled->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->modifieddatetime->caption(), $pharmacy_pharled->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BRNAME->caption(), $pharmacy_pharled->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->baid->Required) { ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->baid->caption(), $pharmacy_pharled->baid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->baid->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->isdate->Required) { ?>
			elm = this.getElements("x" + infix + "_isdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->isdate->caption(), $pharmacy_pharled->isdate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_grid->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PSGST->caption(), $pharmacy_pharled->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PSGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PCGST->caption(), $pharmacy_pharled->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PCGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SSGST->caption(), $pharmacy_pharled->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SSGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SCGST->caption(), $pharmacy_pharled->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SCGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PurValue->caption(), $pharmacy_pharled->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PurRate->caption(), $pharmacy_pharled->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PurRate->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PUnit->caption(), $pharmacy_pharled->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PUnit->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SUnit->caption(), $pharmacy_pharled->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SUnit->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_grid->HSNCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_HSNCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->HSNCODE->caption(), $pharmacy_pharled->HSNCODE->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpharmacy_pharledgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "SiNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "SLNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "Product", false)) return false;
	if (ew.valueChanged(fobj, infix, "RT", false)) return false;
	if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "DAMT", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mfg", false)) return false;
	if (ew.valueChanged(fobj, infix, "EXPDT", false)) return false;
	if (ew.valueChanged(fobj, infix, "BATCHNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "UR", false)) return false;
	if (ew.valueChanged(fobj, infix, "baid", false)) return false;
	if (ew.valueChanged(fobj, infix, "PSGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "PCGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "SSGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "SCGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "PurValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "PurRate", false)) return false;
	if (ew.valueChanged(fobj, infix, "PUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "SUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "HSNCODE", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_pharledgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_pharledgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_pharledgrid.lists["x_SLNO"] = <?php echo $pharmacy_pharled_grid->SLNO->Lookup->toClientList() ?>;
fpharmacy_pharledgrid.lists["x_SLNO"].options = <?php echo JsonEncode($pharmacy_pharled_grid->SLNO->lookupOptions()) ?>;
fpharmacy_pharledgrid.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$pharmacy_pharled_grid->renderOtherOptions();
?>
<?php $pharmacy_pharled_grid->showPageHeader(); ?>
<?php
$pharmacy_pharled_grid->showMessage();
?>
<?php if ($pharmacy_pharled_grid->TotalRecs > 0 || $pharmacy_pharled->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_pharled_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_pharled">
<?php if ($pharmacy_pharled_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_pharled_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_pharledgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_pharled" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_pharledgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_pharled_grid->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_pharled_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_pharled_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled->SiNo->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled->SiNo->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled->SLNO->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled->Product->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled->Product->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->Product->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled->RT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled->RT->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled->IQ->headerCellClass() ?>"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled->IQ->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled->DAMT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled->DAMT->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->DAMT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->DAMT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled->Mfg->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled->Mfg->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->Mfg->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->Mfg->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->Mfg->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled->EXPDT->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled->BATCHNO->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BATCHNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled->BRCODE->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled->PRC->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled->PRC->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled->UR->headerCellClass() ?>"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled->UR->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled->_USERID->headerCellClass() ?>"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled->_USERID->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->_USERID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->_USERID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->_USERID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled->id->headerCellClass() ?>"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled->id->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled->HosoID->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled->HosoID->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled->createdby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled->createdby->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled->createddatetime->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled->modifiedby->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled->modifieddatetime->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled->BRNAME->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->BRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->BRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->baid) == "") { ?>
		<th data-name="baid" class="<?php echo $pharmacy_pharled->baid->headerCellClass() ?>"><div id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->baid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="baid" class="<?php echo $pharmacy_pharled->baid->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->baid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->baid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->baid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->isdate) == "") { ?>
		<th data-name="isdate" class="<?php echo $pharmacy_pharled->isdate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->isdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isdate" class="<?php echo $pharmacy_pharled->isdate->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->isdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->isdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->isdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_pharled->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_pharled->PSGST->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_pharled->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_pharled->PCGST->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_pharled->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_pharled->SSGST->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_pharled->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_pharled->SCGST->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_pharled->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_pharled->PurValue->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $pharmacy_pharled->PurRate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $pharmacy_pharled->PurRate->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $pharmacy_pharled->PUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $pharmacy_pharled->PUnit->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $pharmacy_pharled->SUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $pharmacy_pharled->SUnit->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->HSNCODE) == "") { ?>
		<th data-name="HSNCODE" class="<?php echo $pharmacy_pharled->HSNCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->HSNCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSNCODE" class="<?php echo $pharmacy_pharled->HSNCODE->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->HSNCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->HSNCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->HSNCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_pharled_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$pharmacy_pharled_grid->StartRec = 1;
$pharmacy_pharled_grid->StopRec = $pharmacy_pharled_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $pharmacy_pharled_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_pharled_grid->FormKeyCountName) && ($pharmacy_pharled->isGridAdd() || $pharmacy_pharled->isGridEdit() || $pharmacy_pharled->isConfirm())) {
		$pharmacy_pharled_grid->KeyCount = $CurrentForm->getValue($pharmacy_pharled_grid->FormKeyCountName);
		$pharmacy_pharled_grid->StopRec = $pharmacy_pharled_grid->StartRec + $pharmacy_pharled_grid->KeyCount - 1;
	}
}
$pharmacy_pharled_grid->RecCnt = $pharmacy_pharled_grid->StartRec - 1;
if ($pharmacy_pharled_grid->Recordset && !$pharmacy_pharled_grid->Recordset->EOF) {
	$pharmacy_pharled_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_pharled_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_pharled_grid->StartRec > 1)
		$pharmacy_pharled_grid->Recordset->move($pharmacy_pharled_grid->StartRec - 1);
} elseif (!$pharmacy_pharled->AllowAddDeleteRow && $pharmacy_pharled_grid->StopRec == 0) {
	$pharmacy_pharled_grid->StopRec = $pharmacy_pharled->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_pharled->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_pharled->resetAttributes();
$pharmacy_pharled_grid->renderRow();
if ($pharmacy_pharled->isGridAdd())
	$pharmacy_pharled_grid->RowIndex = 0;
if ($pharmacy_pharled->isGridEdit())
	$pharmacy_pharled_grid->RowIndex = 0;
while ($pharmacy_pharled_grid->RecCnt < $pharmacy_pharled_grid->StopRec) {
	$pharmacy_pharled_grid->RecCnt++;
	if ($pharmacy_pharled_grid->RecCnt >= $pharmacy_pharled_grid->StartRec) {
		$pharmacy_pharled_grid->RowCnt++;
		if ($pharmacy_pharled->isGridAdd() || $pharmacy_pharled->isGridEdit() || $pharmacy_pharled->isConfirm()) {
			$pharmacy_pharled_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_pharled_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_pharled_grid->FormActionName) && $pharmacy_pharled_grid->EventCancelled)
				$pharmacy_pharled_grid->RowAction = strval($CurrentForm->getValue($pharmacy_pharled_grid->FormActionName));
			elseif ($pharmacy_pharled->isGridAdd())
				$pharmacy_pharled_grid->RowAction = "insert";
			else
				$pharmacy_pharled_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_pharled_grid->KeyCount = $pharmacy_pharled_grid->RowIndex;

		// Init row class and style
		$pharmacy_pharled->resetAttributes();
		$pharmacy_pharled->CssClass = "";
		if ($pharmacy_pharled->isGridAdd()) {
			if ($pharmacy_pharled->CurrentMode == "copy") {
				$pharmacy_pharled_grid->loadRowValues($pharmacy_pharled_grid->Recordset); // Load row values
				$pharmacy_pharled_grid->setRecordKey($pharmacy_pharled_grid->RowOldKey, $pharmacy_pharled_grid->Recordset); // Set old record key
			} else {
				$pharmacy_pharled_grid->loadRowValues(); // Load default values
				$pharmacy_pharled_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$pharmacy_pharled_grid->loadRowValues($pharmacy_pharled_grid->Recordset); // Load row values
		}
		$pharmacy_pharled->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_pharled->isGridAdd()) // Grid add
			$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_pharled->isGridAdd() && $pharmacy_pharled->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values
		if ($pharmacy_pharled->isGridEdit()) { // Grid edit
			if ($pharmacy_pharled->EventCancelled)
				$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values
			if ($pharmacy_pharled_grid->RowAction == "insert")
				$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_pharled->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_pharled->isGridEdit() && ($pharmacy_pharled->RowType == ROWTYPE_EDIT || $pharmacy_pharled->RowType == ROWTYPE_ADD) && $pharmacy_pharled->EventCancelled) // Update failed
			$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values
		if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_pharled_grid->EditRowCnt++;
		if ($pharmacy_pharled->isConfirm()) // Confirm row
			$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_pharled->RowAttrs = array_merge($pharmacy_pharled->RowAttrs, array('data-rowindex'=>$pharmacy_pharled_grid->RowCnt, 'id'=>'r' . $pharmacy_pharled_grid->RowCnt . '_pharmacy_pharled', 'data-rowtype'=>$pharmacy_pharled->RowType));

		// Render row
		$pharmacy_pharled_grid->renderRow();

		// Render list options
		$pharmacy_pharled_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_pharled_grid->RowAction <> "delete" && $pharmacy_pharled_grid->RowAction <> "insertdelete" && !($pharmacy_pharled_grid->RowAction == "insert" && $pharmacy_pharled->isConfirm() && $pharmacy_pharled_grid->emptyRow())) {
?>
	<tr<?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_grid->ListOptions->render("body", "left", $pharmacy_pharled_grid->RowCnt);
?>
	<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo"<?php echo $pharmacy_pharled->SiNo->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SiNo->EditValue ?>"<?php echo $pharmacy_pharled->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SiNo->EditValue ?>"<?php echo $pharmacy_pharled->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled->SiNo->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SiNo->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO"<?php echo $pharmacy_pharled->SLNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_pharled->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_pharled->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_pharled_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_pharledgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $pharmacy_pharled->SLNO->Lookup->getParamTag("p_x" . $pharmacy_pharled_grid->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_pharled->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_pharled->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_pharled_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_pharledgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $pharmacy_pharled->SLNO->Lookup->getParamTag("p_x" . $pharmacy_pharled_grid->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled->SLNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SLNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $pharmacy_pharled->Product->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Product->EditValue ?>"<?php echo $pharmacy_pharled->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Product->EditValue ?>"<?php echo $pharmacy_pharled->Product->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled->Product->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Product->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $pharmacy_pharled->RT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RT->EditValue ?>"<?php echo $pharmacy_pharled->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RT->EditValue ?>"<?php echo $pharmacy_pharled->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled->RT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $pharmacy_pharled->IQ->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IQ->EditValue ?>"<?php echo $pharmacy_pharled->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IQ->EditValue ?>"<?php echo $pharmacy_pharled->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled->IQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->IQ->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT"<?php echo $pharmacy_pharled->DAMT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DAMT->EditValue ?>"<?php echo $pharmacy_pharled->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DAMT->EditValue ?>"<?php echo $pharmacy_pharled->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled->DAMT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DAMT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg"<?php echo $pharmacy_pharled->Mfg->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Mfg->EditValue ?>"<?php echo $pharmacy_pharled->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Mfg->EditValue ?>"<?php echo $pharmacy_pharled->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled->Mfg->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Mfg->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $pharmacy_pharled->EXPDT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->EXPDT->ReadOnly && !$pharmacy_pharled->EXPDT->Disabled && !isset($pharmacy_pharled->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->EXPDT->ReadOnly && !$pharmacy_pharled->EXPDT->Disabled && !isset($pharmacy_pharled->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->EXPDT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $pharmacy_pharled->BATCHNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BATCHNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_pharled->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_pharled->PRC->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRC->EditValue ?>"<?php echo $pharmacy_pharled->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRC->EditValue ?>"<?php echo $pharmacy_pharled->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled->PRC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRC->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $pharmacy_pharled->UR->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->UR->EditValue ?>"<?php echo $pharmacy_pharled->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->UR->EditValue ?>"<?php echo $pharmacy_pharled->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled->UR->viewAttributes() ?>>
<?php echo $pharmacy_pharled->UR->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID"<?php echo $pharmacy_pharled->_USERID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled->_USERID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->_USERID->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_pharled->id->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_id" class="form-group pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_id" class="pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<?php echo $pharmacy_pharled->id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $pharmacy_pharled->HosoID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled->HosoID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HosoID->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_pharled->createdby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled->createdby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createdby->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_pharled->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_pharled->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_pharled->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME"<?php echo $pharmacy_pharled->BRNAME->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRNAME->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
		<td data-name="baid"<?php echo $pharmacy_pharled->baid->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="text" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->baid->EditValue ?>"<?php echo $pharmacy_pharled->baid->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="text" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->baid->EditValue ?>"<?php echo $pharmacy_pharled->baid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_baid" class="pharmacy_pharled_baid">
<span<?php echo $pharmacy_pharled->baid->viewAttributes() ?>>
<?php echo $pharmacy_pharled->baid->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
		<td data-name="isdate"<?php echo $pharmacy_pharled->isdate->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate">
<span<?php echo $pharmacy_pharled->isdate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->isdate->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $pharmacy_pharled->PSGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PSGST->EditValue ?>"<?php echo $pharmacy_pharled->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PSGST->EditValue ?>"<?php echo $pharmacy_pharled->PSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST">
<span<?php echo $pharmacy_pharled->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PSGST->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $pharmacy_pharled->PCGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PCGST->EditValue ?>"<?php echo $pharmacy_pharled->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PCGST->EditValue ?>"<?php echo $pharmacy_pharled->PCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST">
<span<?php echo $pharmacy_pharled->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PCGST->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $pharmacy_pharled->SSGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SSGST->EditValue ?>"<?php echo $pharmacy_pharled->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SSGST->EditValue ?>"<?php echo $pharmacy_pharled->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST">
<span<?php echo $pharmacy_pharled->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SSGST->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $pharmacy_pharled->SCGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SCGST->EditValue ?>"<?php echo $pharmacy_pharled->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SCGST->EditValue ?>"<?php echo $pharmacy_pharled->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST">
<span<?php echo $pharmacy_pharled->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SCGST->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $pharmacy_pharled->PurValue->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurValue->EditValue ?>"<?php echo $pharmacy_pharled->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurValue->EditValue ?>"<?php echo $pharmacy_pharled->PurValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue">
<span<?php echo $pharmacy_pharled->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurValue->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $pharmacy_pharled->PurRate->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurRate->EditValue ?>"<?php echo $pharmacy_pharled->PurRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurRate->EditValue ?>"<?php echo $pharmacy_pharled->PurRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate">
<span<?php echo $pharmacy_pharled->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurRate->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $pharmacy_pharled->PUnit->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PUnit->EditValue ?>"<?php echo $pharmacy_pharled->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PUnit->EditValue ?>"<?php echo $pharmacy_pharled->PUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit">
<span<?php echo $pharmacy_pharled->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PUnit->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $pharmacy_pharled->SUnit->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SUnit->EditValue ?>"<?php echo $pharmacy_pharled->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SUnit->EditValue ?>"<?php echo $pharmacy_pharled->SUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit">
<span<?php echo $pharmacy_pharled->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SUnit->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
		<td data-name="HSNCODE"<?php echo $pharmacy_pharled->HSNCODE->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HSNCODE->EditValue ?>"<?php echo $pharmacy_pharled->HSNCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HSNCODE->EditValue ?>"<?php echo $pharmacy_pharled->HSNCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCnt ?>_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE">
<span<?php echo $pharmacy_pharled->HSNCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HSNCODE->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_grid->ListOptions->render("body", "right", $pharmacy_pharled_grid->RowCnt);
?>
	</tr>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD || $pharmacy_pharled->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_pharledgrid.updateLists(<?php echo $pharmacy_pharled_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_pharled->isGridAdd() || $pharmacy_pharled->CurrentMode == "copy")
		if (!$pharmacy_pharled_grid->Recordset->EOF)
			$pharmacy_pharled_grid->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_pharled->CurrentMode == "add" || $pharmacy_pharled->CurrentMode == "copy" || $pharmacy_pharled->CurrentMode == "edit") {
		$pharmacy_pharled_grid->RowIndex = '$rowindex$';
		$pharmacy_pharled_grid->loadRowValues();

		// Set row properties
		$pharmacy_pharled->resetAttributes();
		$pharmacy_pharled->RowAttrs = array_merge($pharmacy_pharled->RowAttrs, array('data-rowindex'=>$pharmacy_pharled_grid->RowIndex, 'id'=>'r0_pharmacy_pharled', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_pharled->RowAttrs["class"], "ew-template");
		$pharmacy_pharled->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_pharled_grid->renderRow();

		// Render list options
		$pharmacy_pharled_grid->renderListOptions();
		$pharmacy_pharled_grid->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_grid->ListOptions->render("body", "left", $pharmacy_pharled_grid->RowIndex);
?>
	<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SiNo->EditValue ?>"<?php echo $pharmacy_pharled->SiNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled->SiNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->SiNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_pharled->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_pharled->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_pharled_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_pharledgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $pharmacy_pharled->SLNO->Lookup->getParamTag("p_x" . $pharmacy_pharled_grid->RowIndex . "_SLNO") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled->SLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
		<td data-name="Product">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Product->EditValue ?>"<?php echo $pharmacy_pharled->Product->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled->Product->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->Product->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
		<td data-name="RT">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RT->EditValue ?>"<?php echo $pharmacy_pharled->RT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled->RT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->RT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IQ->EditValue ?>"<?php echo $pharmacy_pharled->IQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled->IQ->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->IQ->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DAMT->EditValue ?>"<?php echo $pharmacy_pharled->DAMT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled->DAMT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->DAMT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Mfg->EditValue ?>"<?php echo $pharmacy_pharled->Mfg->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled->Mfg->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->Mfg->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->EXPDT->ReadOnly && !$pharmacy_pharled->EXPDT->Disabled && !isset($pharmacy_pharled->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled->EXPDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->EXPDT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled->BATCHNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled->BATCHNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->BATCHNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BRCODE" class="form-group pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->BRCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRC->EditValue ?>"<?php echo $pharmacy_pharled->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->PRC->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
		<td data-name="UR">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->UR->EditValue ?>"<?php echo $pharmacy_pharled->UR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled->UR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->UR->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled__USERID" class="form-group pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled->_USERID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->_USERID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_id" class="form-group pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_HosoID" class="form-group pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled->HosoID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->HosoID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_createdby" class="form-group pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_createddatetime" class="form-group pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_modifiedby" class="form-group pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_modifieddatetime" class="form-group pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BRNAME" class="form-group pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled->BRNAME->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->BRNAME->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
		<td data-name="baid">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="text" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->baid->EditValue ?>"<?php echo $pharmacy_pharled->baid->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<span<?php echo $pharmacy_pharled->baid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->baid->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
		<td data-name="isdate">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_isdate" class="form-group pharmacy_pharled_isdate">
<span<?php echo $pharmacy_pharled->isdate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->isdate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PSGST->EditValue ?>"<?php echo $pharmacy_pharled->PSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<span<?php echo $pharmacy_pharled->PSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->PSGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PCGST->EditValue ?>"<?php echo $pharmacy_pharled->PCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<span<?php echo $pharmacy_pharled->PCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->PCGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SSGST->EditValue ?>"<?php echo $pharmacy_pharled->SSGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<span<?php echo $pharmacy_pharled->SSGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->SSGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SCGST->EditValue ?>"<?php echo $pharmacy_pharled->SCGST->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<span<?php echo $pharmacy_pharled->SCGST->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->SCGST->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurValue->EditValue ?>"<?php echo $pharmacy_pharled->PurValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<span<?php echo $pharmacy_pharled->PurValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->PurValue->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurRate->EditValue ?>"<?php echo $pharmacy_pharled->PurRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<span<?php echo $pharmacy_pharled->PurRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->PurRate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PUnit->EditValue ?>"<?php echo $pharmacy_pharled->PUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<span<?php echo $pharmacy_pharled->PUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->PUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SUnit->EditValue ?>"<?php echo $pharmacy_pharled->SUnit->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<span<?php echo $pharmacy_pharled->SUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->SUnit->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
		<td data-name="HSNCODE">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HSNCODE->EditValue ?>"<?php echo $pharmacy_pharled->HSNCODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<span<?php echo $pharmacy_pharled->HSNCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->HSNCODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_grid->ListOptions->render("body", "right", $pharmacy_pharled_grid->RowIndex);
?>
<script>
fpharmacy_pharledgrid.updateLists(<?php echo $pharmacy_pharled_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($pharmacy_pharled->CurrentMode == "add" || $pharmacy_pharled->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $pharmacy_pharled_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_pharled_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_pharled_grid->KeyCount ?>">
<?php echo $pharmacy_pharled_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_pharled->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $pharmacy_pharled_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_pharled_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_pharled_grid->KeyCount ?>">
<?php echo $pharmacy_pharled_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_pharled->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpharmacy_pharledgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($pharmacy_pharled_grid->Recordset)
	$pharmacy_pharled_grid->Recordset->Close();
?>
</div>
<?php if ($pharmacy_pharled_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_pharled_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_pharled_grid->TotalRecs == 0 && !$pharmacy_pharled->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_pharled_grid->terminate();
?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_pharled", "95%", "");
</script>
<?php } ?>