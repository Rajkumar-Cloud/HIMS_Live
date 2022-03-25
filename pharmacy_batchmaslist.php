<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pharmacy_batchmas_list = new pharmacy_batchmas_list();

// Run the page
$pharmacy_batchmas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_batchmas_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_batchmaslist = currentForm = new ew.Form("fpharmacy_batchmaslist", "list");
fpharmacy_batchmaslist.formKeyCountName = '<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>';

// Validate form
fpharmacy_batchmaslist.validate = function() {
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
		<?php if ($pharmacy_batchmas_list->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PRC->caption(), $pharmacy_batchmas->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PrName->caption(), $pharmacy_batchmas->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->BATCHNO->caption(), $pharmacy_batchmas->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->MFRCODE->caption(), $pharmacy_batchmas->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->EXPDT->caption(), $pharmacy_batchmas->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->PRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PRCODE->caption(), $pharmacy_batchmas->PRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->OQ->Required) { ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->OQ->caption(), $pharmacy_batchmas->OQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->OQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->RQ->Required) { ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->RQ->caption(), $pharmacy_batchmas->RQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->RQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->FRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->FRQ->caption(), $pharmacy_batchmas->FRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->FRQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->IQ->caption(), $pharmacy_batchmas->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->IQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->MRQ->caption(), $pharmacy_batchmas->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->MRQ->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->MRP->Required) { ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->MRP->caption(), $pharmacy_batchmas->MRP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRP");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->MRP->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->UR->caption(), $pharmacy_batchmas->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->UR->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->SSGST->caption(), $pharmacy_batchmas->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->SCGST->caption(), $pharmacy_batchmas->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->RT->caption(), $pharmacy_batchmas->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->RT->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->BRCODE->caption(), $pharmacy_batchmas->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->HospID->caption(), $pharmacy_batchmas->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->HospID->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->UM->Required) { ?>
			elm = this.getElements("x" + infix + "_UM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->UM->caption(), $pharmacy_batchmas->UM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->GENNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_GENNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->GENNAME->caption(), $pharmacy_batchmas->GENNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_batchmas_list->BILLDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->BILLDATE->caption(), $pharmacy_batchmas->BILLDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->BILLDATE->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PUnit->caption(), $pharmacy_batchmas->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PUnit->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->SUnit->caption(), $pharmacy_batchmas->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->SUnit->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PurValue->caption(), $pharmacy_batchmas->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_batchmas_list->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_batchmas->PurRate->caption(), $pharmacy_batchmas->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->PurRate->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
fpharmacy_batchmaslist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
	if (ew.valueChanged(fobj, infix, "BATCHNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "MFRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "EXPDT", false)) return false;
	if (ew.valueChanged(fobj, infix, "PRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "OQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "RQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "FRQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "MRQ", false)) return false;
	if (ew.valueChanged(fobj, infix, "MRP", false)) return false;
	if (ew.valueChanged(fobj, infix, "UR", false)) return false;
	if (ew.valueChanged(fobj, infix, "SSGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "SCGST", false)) return false;
	if (ew.valueChanged(fobj, infix, "RT", false)) return false;
	if (ew.valueChanged(fobj, infix, "BRCODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	if (ew.valueChanged(fobj, infix, "UM", false)) return false;
	if (ew.valueChanged(fobj, infix, "GENNAME", false)) return false;
	if (ew.valueChanged(fobj, infix, "BILLDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "PUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "SUnit", false)) return false;
	if (ew.valueChanged(fobj, infix, "PurValue", false)) return false;
	if (ew.valueChanged(fobj, infix, "PurRate", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_batchmaslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_batchmaslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_batchmaslist.lists["x_PrName"] = <?php echo $pharmacy_batchmas_list->PrName->Lookup->toClientList() ?>;
fpharmacy_batchmaslist.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_list->PrName->lookupOptions()) ?>;
fpharmacy_batchmaslist.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_batchmaslist.lists["x_BRCODE"] = <?php echo $pharmacy_batchmas_list->BRCODE->Lookup->toClientList() ?>;
fpharmacy_batchmaslist.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_batchmas_list->BRCODE->lookupOptions()) ?>;

// Form object for search
var fpharmacy_batchmaslistsrch = currentSearchForm = new ew.Form("fpharmacy_batchmaslistsrch");

// Validate function for search
fpharmacy_batchmaslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_batchmas->EXPDT->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_batchmaslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_batchmaslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_batchmaslistsrch.lists["x_PrName"] = <?php echo $pharmacy_batchmas_list->PrName->Lookup->toClientList() ?>;
fpharmacy_batchmaslistsrch.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_batchmas_list->PrName->lookupOptions()) ?>;
fpharmacy_batchmaslistsrch.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Filters
fpharmacy_batchmaslistsrch.filterList = <?php echo $pharmacy_batchmas_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_batchmas_list->TotalRecs > 0 && $pharmacy_batchmas_list->ExportOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->ImportOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->SearchOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_batchmas_list->FilterOptions->visible()) { ?>
<?php $pharmacy_batchmas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_batchmas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_batchmas->isExport() && !$pharmacy_batchmas->CurrentAction) { ?>
<form name="fpharmacy_batchmaslistsrch" id="fpharmacy_batchmaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_batchmas_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_batchmaslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_batchmas">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$pharmacy_batchmas_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$pharmacy_batchmas->RowType = ROWTYPE_SEARCH;

// Render row
$pharmacy_batchmas->resetAttributes();
$pharmacy_batchmas_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
	<div id="xsc_PRC" class="ew-cell form-group">
		<label for="x_PRC" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas->PRC->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PRC" id="z_PRC" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRC->EditValue ?>"<?php echo $pharmacy_batchmas->PRC->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
	<div id="xsc_PrName" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas->PrName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrName" id="z_PrName" value="LIKE"></span>
		<span class="ew-search-field">
<?php
$wrkonchange = "" . trim(@$pharmacy_batchmas->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_batchmas->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_batchmaslistsrch.createAutoSuggest({"id":"x_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_batchmas->PrName->Lookup->getParamTag("p_x_PrName") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<div id="xsc_BATCHNO" class="ew-cell form-group">
		<label for="x_BATCHNO" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas->BATCHNO->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas->BATCHNO->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<div id="xsc_MFRCODE" class="ew-cell form-group">
		<label for="x_MFRCODE" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas->MFRCODE->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->MFRCODE->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
	<div id="xsc_EXPDT" class="ew-cell form-group">
		<label for="x_EXPDT" class="ew-search-caption ew-label"><?php echo $pharmacy_batchmas->EXPDT->caption() ?></label>
		<span class="ew-search-operator"><select name="z_EXPDT" id="z_EXPDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_batchmas->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_EXPDT style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_EXPDT style="d-none"">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue2 ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_batchmas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_batchmas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_batchmas_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_batchmas_list->showPageHeader(); ?>
<?php
$pharmacy_batchmas_list->showMessage();
?>
<?php if ($pharmacy_batchmas_list->TotalRecs > 0 || $pharmacy_batchmas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_batchmas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_batchmas">
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_batchmas->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_batchmas_list->Pager)) $pharmacy_batchmas_list->Pager = new NumericPager($pharmacy_batchmas_list->StartRec, $pharmacy_batchmas_list->DisplayRecs, $pharmacy_batchmas_list->TotalRecs, $pharmacy_batchmas_list->RecRange, $pharmacy_batchmas_list->AutoHidePager) ?>
<?php if ($pharmacy_batchmas_list->Pager->RecordCount > 0 && $pharmacy_batchmas_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_batchmas_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_batchmas_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_batchmas_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_batchmas_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_batchmas_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_batchmas_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_batchmas_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_batchmas_list->TotalRecs > 0 && (!$pharmacy_batchmas_list->AutoHidePageSizeSelector || $pharmacy_batchmas_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_batchmas">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_batchmas_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_batchmas_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_batchmas_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_batchmas_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_batchmas_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_batchmas_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_batchmas->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_batchmaslist" id="fpharmacy_batchmaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_batchmas_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_batchmas_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<div id="gmp_pharmacy_batchmas" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_batchmas_list->TotalRecs > 0 || $pharmacy_batchmas->isGridEdit()) { ?>
<table id="tbl_pharmacy_batchmaslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_batchmas_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_batchmas_list->renderListOptions();

// Render list options (header, left)
$pharmacy_batchmas_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_batchmas->PRC->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_batchmas->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->PRC) ?>',1);"><div id="elh_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_batchmas->PrName->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_batchmas->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->PrName) ?>',1);"><div id="elh_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_batchmas->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_batchmas->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->BATCHNO) ?>',1);"><div id="elh_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_batchmas->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_batchmas->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->MFRCODE) ?>',1);"><div id="elh_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_batchmas->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_batchmas->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->EXPDT) ?>',1);"><div id="elh_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->PRCODE) == "") { ?>
		<th data-name="PRCODE" class="<?php echo $pharmacy_batchmas->PRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRCODE" class="<?php echo $pharmacy_batchmas->PRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->PRCODE) ?>',1);"><div id="elh_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->PRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->PRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $pharmacy_batchmas->OQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $pharmacy_batchmas->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->OQ) ?>',1);"><div id="elh_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->RQ) == "") { ?>
		<th data-name="RQ" class="<?php echo $pharmacy_batchmas->RQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->RQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RQ" class="<?php echo $pharmacy_batchmas->RQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->RQ) ?>',1);"><div id="elh_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->RQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->RQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->RQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->FRQ) == "") { ?>
		<th data-name="FRQ" class="<?php echo $pharmacy_batchmas->FRQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->FRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FRQ" class="<?php echo $pharmacy_batchmas->FRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->FRQ) ?>',1);"><div id="elh_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->FRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->FRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->FRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_batchmas->IQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_batchmas->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->IQ) ?>',1);"><div id="elh_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $pharmacy_batchmas->MRQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $pharmacy_batchmas->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->MRQ) ?>',1);"><div id="elh_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_batchmas->MRP->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_batchmas->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->MRP) ?>',1);"><div id="elh_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $pharmacy_batchmas->UR->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $pharmacy_batchmas->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->UR) ?>',1);"><div id="elh_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_batchmas->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_batchmas->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->SSGST) ?>',1);"><div id="elh_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->SSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_batchmas->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_batchmas->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->SCGST) ?>',1);"><div id="elh_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->SCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_batchmas->RT->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_batchmas->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->RT) ?>',1);"><div id="elh_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_batchmas->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_batchmas->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->BRCODE) ?>',1);"><div id="elh_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_batchmas->HospID->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_batchmas->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->HospID) ?>',1);"><div id="elh_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $pharmacy_batchmas->UM->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $pharmacy_batchmas->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->UM) ?>',1);"><div id="elh_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->UM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->UM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_batchmas->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_batchmas->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->GENNAME) ?>',1);"><div id="elh_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $pharmacy_batchmas->BILLDATE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $pharmacy_batchmas->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->BILLDATE) ?>',1);"><div id="elh_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->BILLDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->BILLDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $pharmacy_batchmas->PUnit->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PUnit" class="pharmacy_batchmas_PUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $pharmacy_batchmas->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->PUnit) ?>',1);"><div id="elh_pharmacy_batchmas_PUnit" class="pharmacy_batchmas_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $pharmacy_batchmas->SUnit->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SUnit" class="pharmacy_batchmas_SUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $pharmacy_batchmas->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->SUnit) ?>',1);"><div id="elh_pharmacy_batchmas_SUnit" class="pharmacy_batchmas_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_batchmas->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PurValue" class="pharmacy_batchmas_PurValue"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_batchmas->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->PurValue) ?>',1);"><div id="elh_pharmacy_batchmas_PurValue" class="pharmacy_batchmas_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
	<?php if ($pharmacy_batchmas->sortUrl($pharmacy_batchmas->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $pharmacy_batchmas->PurRate->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PurRate" class="pharmacy_batchmas_PurRate"><div class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $pharmacy_batchmas->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_batchmas->SortUrl($pharmacy_batchmas->PurRate) ?>',1);"><div id="elh_pharmacy_batchmas_PurRate" class="pharmacy_batchmas_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_batchmas->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_batchmas->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_batchmas->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_batchmas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_batchmas->ExportAll && $pharmacy_batchmas->isExport()) {
	$pharmacy_batchmas_list->StopRec = $pharmacy_batchmas_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_batchmas_list->TotalRecs > $pharmacy_batchmas_list->StartRec + $pharmacy_batchmas_list->DisplayRecs - 1)
		$pharmacy_batchmas_list->StopRec = $pharmacy_batchmas_list->StartRec + $pharmacy_batchmas_list->DisplayRecs - 1;
	else
		$pharmacy_batchmas_list->StopRec = $pharmacy_batchmas_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $pharmacy_batchmas_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_batchmas_list->FormKeyCountName) && ($pharmacy_batchmas->isGridAdd() || $pharmacy_batchmas->isGridEdit() || $pharmacy_batchmas->isConfirm())) {
		$pharmacy_batchmas_list->KeyCount = $CurrentForm->getValue($pharmacy_batchmas_list->FormKeyCountName);
		$pharmacy_batchmas_list->StopRec = $pharmacy_batchmas_list->StartRec + $pharmacy_batchmas_list->KeyCount - 1;
	}
}
$pharmacy_batchmas_list->RecCnt = $pharmacy_batchmas_list->StartRec - 1;
if ($pharmacy_batchmas_list->Recordset && !$pharmacy_batchmas_list->Recordset->EOF) {
	$pharmacy_batchmas_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_batchmas_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_batchmas_list->StartRec > 1)
		$pharmacy_batchmas_list->Recordset->move($pharmacy_batchmas_list->StartRec - 1);
} elseif (!$pharmacy_batchmas->AllowAddDeleteRow && $pharmacy_batchmas_list->StopRec == 0) {
	$pharmacy_batchmas_list->StopRec = $pharmacy_batchmas->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_batchmas->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_batchmas->resetAttributes();
$pharmacy_batchmas_list->renderRow();
if ($pharmacy_batchmas->isGridAdd())
	$pharmacy_batchmas_list->RowIndex = 0;
if ($pharmacy_batchmas->isGridEdit())
	$pharmacy_batchmas_list->RowIndex = 0;
while ($pharmacy_batchmas_list->RecCnt < $pharmacy_batchmas_list->StopRec) {
	$pharmacy_batchmas_list->RecCnt++;
	if ($pharmacy_batchmas_list->RecCnt >= $pharmacy_batchmas_list->StartRec) {
		$pharmacy_batchmas_list->RowCnt++;
		if ($pharmacy_batchmas->isGridAdd() || $pharmacy_batchmas->isGridEdit() || $pharmacy_batchmas->isConfirm()) {
			$pharmacy_batchmas_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_batchmas_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_batchmas_list->FormActionName) && $pharmacy_batchmas_list->EventCancelled)
				$pharmacy_batchmas_list->RowAction = strval($CurrentForm->getValue($pharmacy_batchmas_list->FormActionName));
			elseif ($pharmacy_batchmas->isGridAdd())
				$pharmacy_batchmas_list->RowAction = "insert";
			else
				$pharmacy_batchmas_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_batchmas_list->KeyCount = $pharmacy_batchmas_list->RowIndex;

		// Init row class and style
		$pharmacy_batchmas->resetAttributes();
		$pharmacy_batchmas->CssClass = "";
		if ($pharmacy_batchmas->isGridAdd()) {
			$pharmacy_batchmas_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_batchmas_list->loadRowValues($pharmacy_batchmas_list->Recordset); // Load row values
		}
		$pharmacy_batchmas->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_batchmas->isGridAdd()) // Grid add
			$pharmacy_batchmas->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_batchmas->isGridAdd() && $pharmacy_batchmas->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_batchmas_list->restoreCurrentRowFormValues($pharmacy_batchmas_list->RowIndex); // Restore form values
		if ($pharmacy_batchmas->isGridEdit()) { // Grid edit
			if ($pharmacy_batchmas->EventCancelled)
				$pharmacy_batchmas_list->restoreCurrentRowFormValues($pharmacy_batchmas_list->RowIndex); // Restore form values
			if ($pharmacy_batchmas_list->RowAction == "insert")
				$pharmacy_batchmas->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_batchmas->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_batchmas->isGridEdit() && ($pharmacy_batchmas->RowType == ROWTYPE_EDIT || $pharmacy_batchmas->RowType == ROWTYPE_ADD) && $pharmacy_batchmas->EventCancelled) // Update failed
			$pharmacy_batchmas_list->restoreCurrentRowFormValues($pharmacy_batchmas_list->RowIndex); // Restore form values
		if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_batchmas_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$pharmacy_batchmas->RowAttrs = array_merge($pharmacy_batchmas->RowAttrs, array('data-rowindex'=>$pharmacy_batchmas_list->RowCnt, 'id'=>'r' . $pharmacy_batchmas_list->RowCnt . '_pharmacy_batchmas', 'data-rowtype'=>$pharmacy_batchmas->RowType));

		// Render row
		$pharmacy_batchmas_list->renderRow();

		// Render list options
		$pharmacy_batchmas_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_batchmas_list->RowAction <> "delete" && $pharmacy_batchmas_list->RowAction <> "insertdelete" && !($pharmacy_batchmas_list->RowAction == "insert" && $pharmacy_batchmas->isConfirm() && $pharmacy_batchmas_list->emptyRow())) {
?>
	<tr<?php echo $pharmacy_batchmas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_batchmas_list->ListOptions->render("body", "left", $pharmacy_batchmas_list->RowCnt);
?>
	<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_batchmas->PRC->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PRC" class="form-group pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRC->EditValue ?>"<?php echo $pharmacy_batchmas->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRC" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_batchmas->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PRC" class="form-group pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRC->EditValue ?>"<?php echo $pharmacy_batchmas->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC">
<span<?php echo $pharmacy_batchmas->PRC->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_batchmas->id->CurrentValue) ?>">
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_batchmas->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT || $pharmacy_batchmas->CurrentMode == "edit") { ?>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_id" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_batchmas->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $pharmacy_batchmas->PrName->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PrName" class="form-group pharmacy_batchmas_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_batchmas->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_batchmas->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_batchmas_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_batchmaslist.createAutoSuggest({"id":"x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_batchmas->PrName->Lookup->getParamTag("p_x" . $pharmacy_batchmas_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PrName" class="form-group pharmacy_batchmas_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_batchmas->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_batchmas->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_batchmas_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_batchmaslist.createAutoSuggest({"id":"x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_batchmas->PrName->Lookup->getParamTag("p_x" . $pharmacy_batchmas_list->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName">
<span<?php echo $pharmacy_batchmas->PrName->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $pharmacy_batchmas->BATCHNO->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BATCHNO" class="form-group pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BATCHNO" class="form-group pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO">
<span<?php echo $pharmacy_batchmas->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $pharmacy_batchmas->MFRCODE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MFRCODE" class="form-group pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MFRCODE" class="form-group pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE">
<span<?php echo $pharmacy_batchmas->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $pharmacy_batchmas->EXPDT->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_EXPDT" class="form-group pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_EXPDT" class="form-group pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT">
<span<?php echo $pharmacy_batchmas->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE"<?php echo $pharmacy_batchmas->PRCODE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PRCODE" class="form-group pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->PRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas->PRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PRCODE" class="form-group pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->PRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE">
<span<?php echo $pharmacy_batchmas->PRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $pharmacy_batchmas->OQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_OQ" class="form-group pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OQ->EditValue ?>"<?php echo $pharmacy_batchmas->OQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_OQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" value="<?php echo HtmlEncode($pharmacy_batchmas->OQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_OQ" class="form-group pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OQ->EditValue ?>"<?php echo $pharmacy_batchmas->OQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ">
<span<?php echo $pharmacy_batchmas->OQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->OQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
		<td data-name="RQ"<?php echo $pharmacy_batchmas->RQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_RQ" class="form-group pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RQ->EditValue ?>"<?php echo $pharmacy_batchmas->RQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" value="<?php echo HtmlEncode($pharmacy_batchmas->RQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_RQ" class="form-group pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RQ->EditValue ?>"<?php echo $pharmacy_batchmas->RQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ">
<span<?php echo $pharmacy_batchmas->RQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->RQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
		<td data-name="FRQ"<?php echo $pharmacy_batchmas->FRQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_FRQ" class="form-group pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas->FRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_FRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" value="<?php echo HtmlEncode($pharmacy_batchmas->FRQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_FRQ" class="form-group pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas->FRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ">
<span<?php echo $pharmacy_batchmas->FRQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->FRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $pharmacy_batchmas->IQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_IQ" class="form-group pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->IQ->EditValue ?>"<?php echo $pharmacy_batchmas->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_IQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_batchmas->IQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_IQ" class="form-group pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->IQ->EditValue ?>"<?php echo $pharmacy_batchmas->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ">
<span<?php echo $pharmacy_batchmas->IQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $pharmacy_batchmas->MRQ->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MRQ" class="form-group pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($pharmacy_batchmas->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MRQ" class="form-group pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ">
<span<?php echo $pharmacy_batchmas->MRQ->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $pharmacy_batchmas->MRP->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MRP" class="form-group pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRP->EditValue ?>"<?php echo $pharmacy_batchmas->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRP" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($pharmacy_batchmas->MRP->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MRP" class="form-group pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRP->EditValue ?>"<?php echo $pharmacy_batchmas->MRP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP">
<span<?php echo $pharmacy_batchmas->MRP->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->MRP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $pharmacy_batchmas->UR->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_UR" class="form-group pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UR->EditValue ?>"<?php echo $pharmacy_batchmas->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UR" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_batchmas->UR->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_UR" class="form-group pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UR->EditValue ?>"<?php echo $pharmacy_batchmas->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR">
<span<?php echo $pharmacy_batchmas->UR->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $pharmacy_batchmas->SSGST->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SSGST" class="form-group pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SSGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_batchmas->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SSGST" class="form-group pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST">
<span<?php echo $pharmacy_batchmas->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $pharmacy_batchmas->SCGST->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SCGST" class="form-group pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SCGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_batchmas->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SCGST" class="form-group pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST">
<span<?php echo $pharmacy_batchmas->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $pharmacy_batchmas->RT->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_RT" class="form-group pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RT->EditValue ?>"<?php echo $pharmacy_batchmas->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_batchmas->RT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_RT" class="form-group pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RT->EditValue ?>"<?php echo $pharmacy_batchmas->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT">
<span<?php echo $pharmacy_batchmas->RT->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_batchmas->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BRCODE" class="form-group pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas->BRCODE->ViewValue ?></button>
		<div id="dsl_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas->BRCODE->radioButtonListHtml(TRUE, "x{$pharmacy_batchmas_list->RowIndex}_BRCODE") ?>
			</div><!-- /.ew-items ##-->
		</div><!-- /.dropdown-menu ##-->
		<div id="tp_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="{value}"<?php echo $pharmacy_batchmas->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group ##-->
	<?php if (!$pharmacy_batchmas->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
<?php echo $pharmacy_batchmas->BRCODE->Lookup->getParamTag("p_x" . $pharmacy_batchmas_list->RowIndex . "_BRCODE") ?>
	<?php } ?>
</div><!-- /.ew-dropdown-list ##-->
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BRCODE" class="form-group pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas->BRCODE->ViewValue ?></button>
		<div id="dsl_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas->BRCODE->radioButtonListHtml(TRUE, "x{$pharmacy_batchmas_list->RowIndex}_BRCODE") ?>
			</div><!-- /.ew-items ##-->
		</div><!-- /.dropdown-menu ##-->
		<div id="tp_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="{value}"<?php echo $pharmacy_batchmas->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group ##-->
	<?php if (!$pharmacy_batchmas->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
<?php echo $pharmacy_batchmas->BRCODE->Lookup->getParamTag("p_x" . $pharmacy_batchmas_list->RowIndex . "_BRCODE") ?>
	<?php } ?>
</div><!-- /.ew-dropdown-list ##-->
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE">
<span<?php echo $pharmacy_batchmas->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_batchmas->HospID->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_HospID" class="form-group pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->HospID->EditValue ?>"<?php echo $pharmacy_batchmas->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_HospID" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_batchmas->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_HospID" class="form-group pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->HospID->EditValue ?>"<?php echo $pharmacy_batchmas->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID">
<span<?php echo $pharmacy_batchmas->HospID->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
		<td data-name="UM"<?php echo $pharmacy_batchmas->UM->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_UM" class="form-group pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UM->EditValue ?>"<?php echo $pharmacy_batchmas->UM->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UM" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" value="<?php echo HtmlEncode($pharmacy_batchmas->UM->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_UM" class="form-group pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UM->EditValue ?>"<?php echo $pharmacy_batchmas->UM->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM">
<span<?php echo $pharmacy_batchmas->UM->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->UM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $pharmacy_batchmas->GENNAME->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_GENNAME" class="form-group pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas->GENNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_batchmas->GENNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_GENNAME" class="form-group pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas->GENNAME->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME">
<span<?php echo $pharmacy_batchmas->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->GENNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE"<?php echo $pharmacy_batchmas->BILLDATE->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BILLDATE" class="form-group pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->BILLDATE->ReadOnly && !$pharmacy_batchmas->BILLDATE->Disabled && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" value="<?php echo HtmlEncode($pharmacy_batchmas->BILLDATE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BILLDATE" class="form-group pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->BILLDATE->ReadOnly && !$pharmacy_batchmas->BILLDATE->Disabled && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE">
<span<?php echo $pharmacy_batchmas->BILLDATE->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->BILLDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $pharmacy_batchmas->PUnit->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PUnit" class="form-group pharmacy_batchmas_PUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PUnit->EditValue ?>"<?php echo $pharmacy_batchmas->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PUnit" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_batchmas->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PUnit" class="form-group pharmacy_batchmas_PUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PUnit->EditValue ?>"<?php echo $pharmacy_batchmas->PUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PUnit" class="pharmacy_batchmas_PUnit">
<span<?php echo $pharmacy_batchmas->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $pharmacy_batchmas->SUnit->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SUnit" class="form-group pharmacy_batchmas_SUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SUnit->EditValue ?>"<?php echo $pharmacy_batchmas->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SUnit" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_batchmas->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SUnit" class="form-group pharmacy_batchmas_SUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SUnit->EditValue ?>"<?php echo $pharmacy_batchmas->SUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_SUnit" class="pharmacy_batchmas_SUnit">
<span<?php echo $pharmacy_batchmas->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->SUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $pharmacy_batchmas->PurValue->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PurValue" class="form-group pharmacy_batchmas_PurValue">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurValue->EditValue ?>"<?php echo $pharmacy_batchmas->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurValue" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_batchmas->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PurValue" class="form-group pharmacy_batchmas_PurValue">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurValue->EditValue ?>"<?php echo $pharmacy_batchmas->PurValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PurValue" class="pharmacy_batchmas_PurValue">
<span<?php echo $pharmacy_batchmas->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PurValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $pharmacy_batchmas->PurRate->cellAttributes() ?>>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PurRate" class="form-group pharmacy_batchmas_PurRate">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurRate->EditValue ?>"<?php echo $pharmacy_batchmas->PurRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurRate" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_batchmas->PurRate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PurRate" class="form-group pharmacy_batchmas_PurRate">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurRate->EditValue ?>"<?php echo $pharmacy_batchmas->PurRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_batchmas_list->RowCnt ?>_pharmacy_batchmas_PurRate" class="pharmacy_batchmas_PurRate">
<span<?php echo $pharmacy_batchmas->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_batchmas->PurRate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_batchmas_list->ListOptions->render("body", "right", $pharmacy_batchmas_list->RowCnt);
?>
	</tr>
<?php if ($pharmacy_batchmas->RowType == ROWTYPE_ADD || $pharmacy_batchmas->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_batchmaslist.updateLists(<?php echo $pharmacy_batchmas_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_batchmas->isGridAdd())
		if (!$pharmacy_batchmas_list->Recordset->EOF)
			$pharmacy_batchmas_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_batchmas->isGridAdd() || $pharmacy_batchmas->isGridEdit()) {
		$pharmacy_batchmas_list->RowIndex = '$rowindex$';
		$pharmacy_batchmas_list->loadRowValues();

		// Set row properties
		$pharmacy_batchmas->resetAttributes();
		$pharmacy_batchmas->RowAttrs = array_merge($pharmacy_batchmas->RowAttrs, array('data-rowindex'=>$pharmacy_batchmas_list->RowIndex, 'id'=>'r0_pharmacy_batchmas', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_batchmas->RowAttrs["class"], "ew-template");
		$pharmacy_batchmas->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_batchmas_list->renderRow();

		// Render list options
		$pharmacy_batchmas_list->renderListOptions();
		$pharmacy_batchmas_list->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_batchmas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_batchmas_list->ListOptions->render("body", "left", $pharmacy_batchmas_list->RowIndex);
?>
	<?php if ($pharmacy_batchmas->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_batchmas_PRC" class="form-group pharmacy_batchmas_PRC">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRC->EditValue ?>"<?php echo $pharmacy_batchmas->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRC" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_batchmas->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_pharmacy_batchmas_PrName" class="form-group pharmacy_batchmas_PrName">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_batchmas->PrName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_batchmas->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_batchmas_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_batchmas->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_batchmas->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_batchmas->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_batchmaslist.createAutoSuggest({"id":"x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName","forceSelect":true});
</script>
<?php echo $pharmacy_batchmas->PrName->Lookup->getParamTag("p_x" . $pharmacy_batchmas_list->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_batchmas->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_batchmas_BATCHNO" class="form-group pharmacy_batchmas_BATCHNO">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BATCHNO->EditValue ?>"<?php echo $pharmacy_batchmas->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_batchmas->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<span id="el$rowindex$_pharmacy_batchmas_MFRCODE" class="form-group pharmacy_batchmas_MFRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MFRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_batchmas_EXPDT" class="form-group pharmacy_batchmas_EXPDT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->EXPDT->EditValue ?>"<?php echo $pharmacy_batchmas->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->EXPDT->ReadOnly && !$pharmacy_batchmas->EXPDT->Disabled && !isset($pharmacy_batchmas->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_batchmas->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PRCODE->Visible) { // PRCODE ?>
		<td data-name="PRCODE">
<span id="el$rowindex$_pharmacy_batchmas_PRCODE" class="form-group pharmacy_batchmas_PRCODE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PRCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PRCODE->EditValue ?>"<?php echo $pharmacy_batchmas->PRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas->PRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->OQ->Visible) { // OQ ?>
		<td data-name="OQ">
<span id="el$rowindex$_pharmacy_batchmas_OQ" class="form-group pharmacy_batchmas_OQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->OQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->OQ->EditValue ?>"<?php echo $pharmacy_batchmas->OQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_OQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_OQ" value="<?php echo HtmlEncode($pharmacy_batchmas->OQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->RQ->Visible) { // RQ ?>
		<td data-name="RQ">
<span id="el$rowindex$_pharmacy_batchmas_RQ" class="form-group pharmacy_batchmas_RQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RQ->EditValue ?>"<?php echo $pharmacy_batchmas->RQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RQ" value="<?php echo HtmlEncode($pharmacy_batchmas->RQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->FRQ->Visible) { // FRQ ?>
		<td data-name="FRQ">
<span id="el$rowindex$_pharmacy_batchmas_FRQ" class="form-group pharmacy_batchmas_FRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->FRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->FRQ->EditValue ?>"<?php echo $pharmacy_batchmas->FRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_FRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_FRQ" value="<?php echo HtmlEncode($pharmacy_batchmas->FRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<span id="el$rowindex$_pharmacy_batchmas_IQ" class="form-group pharmacy_batchmas_IQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->IQ->EditValue ?>"<?php echo $pharmacy_batchmas->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_IQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_batchmas->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<span id="el$rowindex$_pharmacy_batchmas_MRQ" class="form-group pharmacy_batchmas_MRQ">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRQ->EditValue ?>"<?php echo $pharmacy_batchmas->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRQ" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($pharmacy_batchmas->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->MRP->Visible) { // MRP ?>
		<td data-name="MRP">
<span id="el$rowindex$_pharmacy_batchmas_MRP" class="form-group pharmacy_batchmas_MRP">
<input type="text" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->MRP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->MRP->EditValue ?>"<?php echo $pharmacy_batchmas->MRP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRP" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_MRP" value="<?php echo HtmlEncode($pharmacy_batchmas->MRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->UR->Visible) { // UR ?>
		<td data-name="UR">
<span id="el$rowindex$_pharmacy_batchmas_UR" class="form-group pharmacy_batchmas_UR">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UR->EditValue ?>"<?php echo $pharmacy_batchmas->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UR" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_batchmas->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<span id="el$rowindex$_pharmacy_batchmas_SSGST" class="form-group pharmacy_batchmas_SSGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SSGST->EditValue ?>"<?php echo $pharmacy_batchmas->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SSGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_batchmas->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<span id="el$rowindex$_pharmacy_batchmas_SCGST" class="form-group pharmacy_batchmas_SCGST">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SCGST->EditValue ?>"<?php echo $pharmacy_batchmas->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SCGST" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_batchmas->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->RT->Visible) { // RT ?>
		<td data-name="RT">
<span id="el$rowindex$_pharmacy_batchmas_RT" class="form-group pharmacy_batchmas_RT">
<input type="text" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->RT->EditValue ?>"<?php echo $pharmacy_batchmas->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RT" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_batchmas->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<span id="el$rowindex$_pharmacy_batchmas_BRCODE" class="form-group pharmacy_batchmas_BRCODE">
<div class="btn-group ew-dropdown-list" role="group">
	<div class="btn-group" role="group">
		<button type="button" class="btn form-control dropdown-toggle ew-dropdown-toggle" aria-haspopup="true" aria-expanded="false"<?php if ($pharmacy_batchmas->BRCODE->ReadOnly) { ?> readonly<?php } else { ?>data-toggle="dropdown"<?php } ?>><?php echo $pharmacy_batchmas->BRCODE->ViewValue ?></button>
		<div id="dsl_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" data-repeatcolumn="1" class="dropdown-menu">
			<div class="ew-items" style="overflow-x: hidden;">
<?php echo $pharmacy_batchmas->BRCODE->radioButtonListHtml(TRUE, "x{$pharmacy_batchmas_list->RowIndex}_BRCODE") ?>
			</div><!-- /.ew-items ##-->
		</div><!-- /.dropdown-menu ##-->
		<div id="tp_x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_batchmas->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="{value}"<?php echo $pharmacy_batchmas->BRCODE->editAttributes() ?>></div>
	</div><!-- /.btn-group ##-->
	<?php if (!$pharmacy_batchmas->BRCODE->ReadOnly) { ?>
	<button type="button" class="btn btn-default ew-dropdown-clear" disabled>
		<i class="fa fa-times ew-icon"></i>
	</button>
<?php echo $pharmacy_batchmas->BRCODE->Lookup->getParamTag("p_x" . $pharmacy_batchmas_list->RowIndex . "_BRCODE") ?>
	<?php } ?>
</div><!-- /.ew-dropdown-list ##-->
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BRCODE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_batchmas->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el$rowindex$_pharmacy_batchmas_HospID" class="form-group pharmacy_batchmas_HospID">
<input type="text" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->HospID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->HospID->EditValue ?>"<?php echo $pharmacy_batchmas->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_HospID" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_batchmas->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->UM->Visible) { // UM ?>
		<td data-name="UM">
<span id="el$rowindex$_pharmacy_batchmas_UM" class="form-group pharmacy_batchmas_UM">
<input type="text" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->UM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->UM->EditValue ?>"<?php echo $pharmacy_batchmas->UM->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UM" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_UM" value="<?php echo HtmlEncode($pharmacy_batchmas->UM->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME">
<span id="el$rowindex$_pharmacy_batchmas_GENNAME" class="form-group pharmacy_batchmas_GENNAME">
<input type="text" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->GENNAME->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->GENNAME->EditValue ?>"<?php echo $pharmacy_batchmas->GENNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_GENNAME" value="<?php echo HtmlEncode($pharmacy_batchmas->GENNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE">
<span id="el$rowindex$_pharmacy_batchmas_BILLDATE" class="form-group pharmacy_batchmas_BILLDATE">
<input type="text" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->BILLDATE->EditValue ?>"<?php echo $pharmacy_batchmas->BILLDATE->editAttributes() ?>>
<?php if (!$pharmacy_batchmas->BILLDATE->ReadOnly && !$pharmacy_batchmas->BILLDATE->Disabled && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["readonly"]) && !isset($pharmacy_batchmas->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_BILLDATE" value="<?php echo HtmlEncode($pharmacy_batchmas->BILLDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit">
<span id="el$rowindex$_pharmacy_batchmas_PUnit" class="form-group pharmacy_batchmas_PUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PUnit->EditValue ?>"<?php echo $pharmacy_batchmas->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PUnit" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_batchmas->PUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit">
<span id="el$rowindex$_pharmacy_batchmas_SUnit" class="form-group pharmacy_batchmas_SUnit">
<input type="text" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->SUnit->EditValue ?>"<?php echo $pharmacy_batchmas->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SUnit" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_batchmas->SUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue">
<span id="el$rowindex$_pharmacy_batchmas_PurValue" class="form-group pharmacy_batchmas_PurValue">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurValue->EditValue ?>"<?php echo $pharmacy_batchmas->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurValue" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_batchmas->PurValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_batchmas->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate">
<span id="el$rowindex$_pharmacy_batchmas_PurRate" class="form-group pharmacy_batchmas_PurRate">
<input type="text" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_batchmas->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_batchmas->PurRate->EditValue ?>"<?php echo $pharmacy_batchmas->PurRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurRate" name="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" id="o<?php echo $pharmacy_batchmas_list->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_batchmas->PurRate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_batchmas_list->ListOptions->render("body", "right", $pharmacy_batchmas_list->RowIndex);
?>
<script>
fpharmacy_batchmaslist.updateLists(<?php echo $pharmacy_batchmas_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($pharmacy_batchmas->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" id="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" value="<?php echo $pharmacy_batchmas_list->KeyCount ?>">
<?php echo $pharmacy_batchmas_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_batchmas->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" id="<?php echo $pharmacy_batchmas_list->FormKeyCountName ?>" value="<?php echo $pharmacy_batchmas_list->KeyCount ?>">
<?php echo $pharmacy_batchmas_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_batchmas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_batchmas_list->Recordset)
	$pharmacy_batchmas_list->Recordset->Close();
?>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_batchmas->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_batchmas_list->Pager)) $pharmacy_batchmas_list->Pager = new NumericPager($pharmacy_batchmas_list->StartRec, $pharmacy_batchmas_list->DisplayRecs, $pharmacy_batchmas_list->TotalRecs, $pharmacy_batchmas_list->RecRange, $pharmacy_batchmas_list->AutoHidePager) ?>
<?php if ($pharmacy_batchmas_list->Pager->RecordCount > 0 && $pharmacy_batchmas_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_batchmas_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_batchmas_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_batchmas_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_batchmas_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_batchmas_list->pageUrl() ?>start=<?php echo $pharmacy_batchmas_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_batchmas_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_batchmas_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_batchmas_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_batchmas_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_batchmas_list->TotalRecs > 0 && (!$pharmacy_batchmas_list->AutoHidePageSizeSelector || $pharmacy_batchmas_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_batchmas">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_batchmas_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_batchmas_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_batchmas_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_batchmas_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_batchmas_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_batchmas_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_batchmas->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_batchmas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_batchmas_list->TotalRecs == 0 && !$pharmacy_batchmas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_batchmas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_batchmas_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<style>
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 80%;
}
.form-control {
	width: 100%;
	flex-grow: 0;
}
.input-group>.form-control {
	width: 100%;
	flex-grow: 0;
}
</style>
<script>
</script>
<?php if (!$pharmacy_batchmas->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_batchmas", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_batchmas_list->terminate();
?>