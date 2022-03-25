<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$pharmacy_pharled_grid->isExport()) { ?>
<script>
var fpharmacy_pharledgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpharmacy_pharledgrid = new ew.Form("fpharmacy_pharledgrid", "grid");
	fpharmacy_pharledgrid.formKeyCountName = '<?php echo $pharmacy_pharled_grid->FormKeyCountName ?>';

	// Validate form
	fpharmacy_pharledgrid.validate = function() {
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
			<?php if ($pharmacy_pharled_grid->SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->SiNo->caption(), $pharmacy_pharled_grid->SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_grid->SiNo->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_grid->SLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->SLNO->caption(), $pharmacy_pharled_grid->SLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_grid->SLNO->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_grid->Product->Required) { ?>
				elm = this.getElements("x" + infix + "_Product");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->Product->caption(), $pharmacy_pharled_grid->Product->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->RT->caption(), $pharmacy_pharled_grid->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_grid->RT->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_grid->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->IQ->caption(), $pharmacy_pharled_grid->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_grid->IQ->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_grid->DAMT->Required) { ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->DAMT->caption(), $pharmacy_pharled_grid->DAMT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_grid->DAMT->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_grid->Mfg->Required) { ?>
				elm = this.getElements("x" + infix + "_Mfg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->Mfg->caption(), $pharmacy_pharled_grid->Mfg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->EXPDT->caption(), $pharmacy_pharled_grid->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_grid->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_grid->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->BATCHNO->caption(), $pharmacy_pharled_grid->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->BRCODE->caption(), $pharmacy_pharled_grid->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->PRC->caption(), $pharmacy_pharled_grid->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->UR->caption(), $pharmacy_pharled_grid->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_grid->UR->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_grid->_USERID->Required) { ?>
				elm = this.getElements("x" + infix + "__USERID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->_USERID->caption(), $pharmacy_pharled_grid->_USERID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->id->caption(), $pharmacy_pharled_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->HosoID->Required) { ?>
				elm = this.getElements("x" + infix + "_HosoID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->HosoID->caption(), $pharmacy_pharled_grid->HosoID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->createdby->caption(), $pharmacy_pharled_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->createddatetime->caption(), $pharmacy_pharled_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->modifiedby->caption(), $pharmacy_pharled_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->modifieddatetime->caption(), $pharmacy_pharled_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_grid->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_grid->BRNAME->caption(), $pharmacy_pharled_grid->BRNAME->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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
		return true;
	}

	// Form_CustomValidate
	fpharmacy_pharledgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_pharledgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_pharledgrid.lists["x_SLNO"] = <?php echo $pharmacy_pharled_grid->SLNO->Lookup->toClientList($pharmacy_pharled_grid) ?>;
	fpharmacy_pharledgrid.lists["x_SLNO"].options = <?php echo JsonEncode($pharmacy_pharled_grid->SLNO->lookupOptions()) ?>;
	fpharmacy_pharledgrid.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_pharledgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$pharmacy_pharled_grid->renderOtherOptions();
?>
<?php if ($pharmacy_pharled_grid->TotalRecords > 0 || $pharmacy_pharled->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_pharled_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_pharled">
<?php if ($pharmacy_pharled_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_pharled_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_pharledgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_pharled" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_pharledgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_pharled->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_pharled_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_pharled_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_pharled_grid->SiNo->Visible) { // SiNo ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled_grid->SiNo->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled_grid->SiNo->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->SiNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->SiNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled_grid->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled_grid->SLNO->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->SLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->SLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->Product->Visible) { // Product ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled_grid->Product->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled_grid->Product->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->Product->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->Product->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->Product->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->RT->Visible) { // RT ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled_grid->RT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled_grid->RT->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled_grid->IQ->headerCellClass() ?>"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled_grid->IQ->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->DAMT->Visible) { // DAMT ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled_grid->DAMT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled_grid->DAMT->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->DAMT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->DAMT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->Mfg->Visible) { // Mfg ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled_grid->Mfg->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled_grid->Mfg->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->Mfg->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->Mfg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->Mfg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled_grid->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled_grid->EXPDT->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled_grid->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled_grid->BATCHNO->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->BATCHNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled_grid->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled_grid->BRCODE->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled_grid->PRC->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled_grid->PRC->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->UR->Visible) { // UR ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled_grid->UR->headerCellClass() ?>"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled_grid->UR->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->_USERID->Visible) { // USERID ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled_grid->_USERID->headerCellClass() ?>"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled_grid->_USERID->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->_USERID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->_USERID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->_USERID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->id->Visible) { // id ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled_grid->id->headerCellClass() ?>"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled_grid->id->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->HosoID->Visible) { // HosoID ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled_grid->HosoID->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled_grid->HosoID->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->HosoID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->HosoID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled_grid->createdby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled_grid->createdby->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled_grid->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled_grid->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_grid->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_pharled_grid->SortUrl($pharmacy_pharled_grid->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled_grid->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled_grid->BRNAME->headerCellClass() ?>"><div><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_grid->BRNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_grid->BRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_grid->BRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$pharmacy_pharled_grid->StartRecord = 1;
$pharmacy_pharled_grid->StopRecord = $pharmacy_pharled_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($pharmacy_pharled->isConfirm() || $pharmacy_pharled_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_pharled_grid->FormKeyCountName) && ($pharmacy_pharled_grid->isGridAdd() || $pharmacy_pharled_grid->isGridEdit() || $pharmacy_pharled->isConfirm())) {
		$pharmacy_pharled_grid->KeyCount = $CurrentForm->getValue($pharmacy_pharled_grid->FormKeyCountName);
		$pharmacy_pharled_grid->StopRecord = $pharmacy_pharled_grid->StartRecord + $pharmacy_pharled_grid->KeyCount - 1;
	}
}
$pharmacy_pharled_grid->RecordCount = $pharmacy_pharled_grid->StartRecord - 1;
if ($pharmacy_pharled_grid->Recordset && !$pharmacy_pharled_grid->Recordset->EOF) {
	$pharmacy_pharled_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_pharled_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_pharled_grid->StartRecord > 1)
		$pharmacy_pharled_grid->Recordset->move($pharmacy_pharled_grid->StartRecord - 1);
} elseif (!$pharmacy_pharled->AllowAddDeleteRow && $pharmacy_pharled_grid->StopRecord == 0) {
	$pharmacy_pharled_grid->StopRecord = $pharmacy_pharled->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_pharled->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_pharled->resetAttributes();
$pharmacy_pharled_grid->renderRow();
if ($pharmacy_pharled_grid->isGridAdd())
	$pharmacy_pharled_grid->RowIndex = 0;
if ($pharmacy_pharled_grid->isGridEdit())
	$pharmacy_pharled_grid->RowIndex = 0;
while ($pharmacy_pharled_grid->RecordCount < $pharmacy_pharled_grid->StopRecord) {
	$pharmacy_pharled_grid->RecordCount++;
	if ($pharmacy_pharled_grid->RecordCount >= $pharmacy_pharled_grid->StartRecord) {
		$pharmacy_pharled_grid->RowCount++;
		if ($pharmacy_pharled_grid->isGridAdd() || $pharmacy_pharled_grid->isGridEdit() || $pharmacy_pharled->isConfirm()) {
			$pharmacy_pharled_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_pharled_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_pharled_grid->FormActionName) && ($pharmacy_pharled->isConfirm() || $pharmacy_pharled_grid->EventCancelled))
				$pharmacy_pharled_grid->RowAction = strval($CurrentForm->getValue($pharmacy_pharled_grid->FormActionName));
			elseif ($pharmacy_pharled_grid->isGridAdd())
				$pharmacy_pharled_grid->RowAction = "insert";
			else
				$pharmacy_pharled_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_pharled_grid->KeyCount = $pharmacy_pharled_grid->RowIndex;

		// Init row class and style
		$pharmacy_pharled->resetAttributes();
		$pharmacy_pharled->CssClass = "";
		if ($pharmacy_pharled_grid->isGridAdd()) {
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
		if ($pharmacy_pharled_grid->isGridAdd()) // Grid add
			$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_pharled_grid->isGridAdd() && $pharmacy_pharled->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values
		if ($pharmacy_pharled_grid->isGridEdit()) { // Grid edit
			if ($pharmacy_pharled->EventCancelled)
				$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values
			if ($pharmacy_pharled_grid->RowAction == "insert")
				$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_pharled->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_pharled_grid->isGridEdit() && ($pharmacy_pharled->RowType == ROWTYPE_EDIT || $pharmacy_pharled->RowType == ROWTYPE_ADD) && $pharmacy_pharled->EventCancelled) // Update failed
			$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values
		if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_pharled_grid->EditRowCount++;
		if ($pharmacy_pharled->isConfirm()) // Confirm row
			$pharmacy_pharled_grid->restoreCurrentRowFormValues($pharmacy_pharled_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_pharled->RowAttrs->merge(["data-rowindex" => $pharmacy_pharled_grid->RowCount, "id" => "r" . $pharmacy_pharled_grid->RowCount . "_pharmacy_pharled", "data-rowtype" => $pharmacy_pharled->RowType]);

		// Render row
		$pharmacy_pharled_grid->renderRow();

		// Render list options
		$pharmacy_pharled_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_pharled_grid->RowAction != "delete" && $pharmacy_pharled_grid->RowAction != "insertdelete" && !($pharmacy_pharled_grid->RowAction == "insert" && $pharmacy_pharled->isConfirm() && $pharmacy_pharled_grid->emptyRow())) {
?>
	<tr <?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_grid->ListOptions->render("body", "left", $pharmacy_pharled_grid->RowCount);
?>
	<?php if ($pharmacy_pharled_grid->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo" <?php echo $pharmacy_pharled_grid->SiNo->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->SiNo->EditValue ?>"<?php echo $pharmacy_pharled_grid->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->SiNo->EditValue ?>"<?php echo $pharmacy_pharled_grid->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled_grid->SiNo->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->SiNo->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO" <?php echo $pharmacy_pharled_grid->SLNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $pharmacy_pharled_grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_pharled_grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled_grid->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled_grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled_grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_pharledgrid"], function() {
	fpharmacy_pharledgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO","forceSelect":true});
});
</script>
<?php echo $pharmacy_pharled_grid->SLNO->Lookup->getParamTag($pharmacy_pharled_grid, "p_x" . $pharmacy_pharled_grid->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $pharmacy_pharled_grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_pharled_grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled_grid->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled_grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled_grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_pharledgrid"], function() {
	fpharmacy_pharledgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO","forceSelect":true});
});
</script>
<?php echo $pharmacy_pharled_grid->SLNO->Lookup->getParamTag($pharmacy_pharled_grid, "p_x" . $pharmacy_pharled_grid->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled_grid->SLNO->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->SLNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->Product->Visible) { // Product ?>
		<td data-name="Product" <?php echo $pharmacy_pharled_grid->Product->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->Product->EditValue ?>"<?php echo $pharmacy_pharled_grid->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->Product->EditValue ?>"<?php echo $pharmacy_pharled_grid->Product->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled_grid->Product->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->Product->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $pharmacy_pharled_grid->RT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->RT->EditValue ?>"<?php echo $pharmacy_pharled_grid->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->RT->EditValue ?>"<?php echo $pharmacy_pharled_grid->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled_grid->RT->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->RT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $pharmacy_pharled_grid->IQ->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->IQ->EditValue ?>"<?php echo $pharmacy_pharled_grid->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->IQ->EditValue ?>"<?php echo $pharmacy_pharled_grid->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled_grid->IQ->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->IQ->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT" <?php echo $pharmacy_pharled_grid->DAMT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->DAMT->EditValue ?>"<?php echo $pharmacy_pharled_grid->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->DAMT->EditValue ?>"<?php echo $pharmacy_pharled_grid->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled_grid->DAMT->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->DAMT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg" <?php echo $pharmacy_pharled_grid->Mfg->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->Mfg->EditValue ?>"<?php echo $pharmacy_pharled_grid->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->Mfg->EditValue ?>"<?php echo $pharmacy_pharled_grid->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled_grid->Mfg->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->Mfg->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $pharmacy_pharled_grid->EXPDT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled_grid->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled_grid->EXPDT->ReadOnly && !$pharmacy_pharled_grid->EXPDT->Disabled && !isset($pharmacy_pharled_grid->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled_grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled_grid->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled_grid->EXPDT->ReadOnly && !$pharmacy_pharled_grid->EXPDT->Disabled && !isset($pharmacy_pharled_grid->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled_grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled_grid->EXPDT->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->EXPDT->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $pharmacy_pharled_grid->BATCHNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled_grid->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled_grid->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled_grid->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->BATCHNO->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_pharled_grid->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled_grid->BRCODE->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_pharled_grid->PRC->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->PRC->EditValue ?>"<?php echo $pharmacy_pharled_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->PRC->EditValue ?>"<?php echo $pharmacy_pharled_grid->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled_grid->PRC->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->PRC->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $pharmacy_pharled_grid->UR->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->UR->EditValue ?>"<?php echo $pharmacy_pharled_grid->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->UR->EditValue ?>"<?php echo $pharmacy_pharled_grid->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled_grid->UR->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->UR->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID" <?php echo $pharmacy_pharled_grid->_USERID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled_grid->_USERID->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->_USERID->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->_USERID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->_USERID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->_USERID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->_USERID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_pharled_grid->id->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_id" class="form-group">
<span<?php echo $pharmacy_pharled_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled_grid->id->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" <?php echo $pharmacy_pharled_grid->HosoID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled_grid->HosoID->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->HosoID->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->HosoID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->HosoID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->HosoID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->HosoID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_pharled_grid->createdby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled_grid->createdby->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_pharled_grid->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled_grid->createddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_pharled_grid->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled_grid->modifiedby->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_pharled_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled_grid->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME" <?php echo $pharmacy_pharled_grid->BRNAME->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_grid->RowCount ?>_pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled_grid->BRNAME->viewAttributes() ?>><?php echo $pharmacy_pharled_grid->BRNAME->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRNAME->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRNAME->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="fpharmacy_pharledgrid$x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRNAME->FormValue) ?>">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="fpharmacy_pharledgrid$o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRNAME->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_grid->ListOptions->render("body", "right", $pharmacy_pharled_grid->RowCount);
?>
	</tr>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD || $pharmacy_pharled->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "load"], function() {
	fpharmacy_pharledgrid.updateLists(<?php echo $pharmacy_pharled_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_pharled_grid->isGridAdd() || $pharmacy_pharled->CurrentMode == "copy")
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
		$pharmacy_pharled->RowAttrs->merge(["data-rowindex" => $pharmacy_pharled_grid->RowIndex, "id" => "r0_pharmacy_pharled", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_pharled->RowAttrs->appendClass("ew-template");
		$pharmacy_pharled->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_pharled_grid->renderRow();

		// Render list options
		$pharmacy_pharled_grid->renderListOptions();
		$pharmacy_pharled_grid->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_grid->ListOptions->render("body", "left", $pharmacy_pharled_grid->RowIndex);
?>
	<?php if ($pharmacy_pharled_grid->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->SiNo->EditValue ?>"<?php echo $pharmacy_pharled_grid->SiNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled_grid->SiNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->SiNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$onchange = $pharmacy_pharled_grid->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_pharled_grid->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled_grid->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled_grid->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled_grid->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_pharledgrid"], function() {
	fpharmacy_pharledgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO","forceSelect":true});
});
</script>
<?php echo $pharmacy_pharled_grid->SLNO->Lookup->getParamTag($pharmacy_pharled_grid, "p_x" . $pharmacy_pharled_grid->RowIndex . "_SLNO") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled_grid->SLNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->SLNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->SLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->Product->Visible) { // Product ?>
		<td data-name="Product">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->Product->EditValue ?>"<?php echo $pharmacy_pharled_grid->Product->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled_grid->Product->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->Product->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->RT->Visible) { // RT ?>
		<td data-name="RT">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->RT->EditValue ?>"<?php echo $pharmacy_pharled_grid->RT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled_grid->RT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->RT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->IQ->EditValue ?>"<?php echo $pharmacy_pharled_grid->IQ->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled_grid->IQ->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->IQ->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_grid->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->DAMT->EditValue ?>"<?php echo $pharmacy_pharled_grid->DAMT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled_grid->DAMT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->DAMT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->Mfg->EditValue ?>"<?php echo $pharmacy_pharled_grid->Mfg->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled_grid->Mfg->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->Mfg->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_grid->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled_grid->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled_grid->EXPDT->ReadOnly && !$pharmacy_pharled_grid->EXPDT->Disabled && !isset($pharmacy_pharled_grid->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled_grid->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_pharledgrid", "x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled_grid->EXPDT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->EXPDT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_grid->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled_grid->BATCHNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled_grid->BATCHNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->BATCHNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BRCODE" class="form-group pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled_grid->BRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->BRCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->PRC->EditValue ?>"<?php echo $pharmacy_pharled_grid->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled_grid->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->PRC->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_grid->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->UR->Visible) { // UR ?>
		<td data-name="UR">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_grid->UR->EditValue ?>"<?php echo $pharmacy_pharled_grid->UR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled_grid->UR->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->UR->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_grid->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled__USERID" class="form-group pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled_grid->_USERID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->_USERID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->_USERID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_pharled_id" class="form-group pharmacy_pharled_id"></span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_id" class="form-group pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_HosoID" class="form-group pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled_grid->HosoID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->HosoID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->HosoID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_grid->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_createdby" class="form-group pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_createddatetime" class="form-group pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_modifiedby" class="form-group pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_modifieddatetime" class="form-group pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_grid->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<?php if (!$pharmacy_pharled->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_pharled_BRNAME" class="form-group pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled_grid->BRNAME->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_grid->BRNAME->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="x<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRNAME->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_grid->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_grid->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_grid->ListOptions->render("body", "right", $pharmacy_pharled_grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_pharledgrid", "load"], function() {
	fpharmacy_pharledgrid.updateLists(<?php echo $pharmacy_pharled_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_pharled_grid->Recordset)
	$pharmacy_pharled_grid->Recordset->Close();
?>
<?php if ($pharmacy_pharled_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_pharled_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_pharled_grid->TotalRecords == 0 && !$pharmacy_pharled->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$pharmacy_pharled_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");
	//$("[data-name='SiNo']").hide();

	$("[data-name='Product']").hide();

	//$("[data-name='Mfg']").hide();
	 //$("[data-name='SLNO']").hide();

			  $("[data-name='BRCODE']").hide();
			  $("[data-name='TYPE']").hide();
			  $("[data-name='DN']").hide();
			  $("[data-name='RDN']").hide();
			  $("[data-name='DT']").hide();
			  $("[data-name='PRC']").hide();
			  $("[data-name='OQ']").hide();
			  $("[data-name='RQ']").hide();
			  $("[data-name='MRQ']").hide();

			//  $("[data-name='IQ']").hide();
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
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_pharled",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$pharmacy_pharled_grid->terminate();
?>