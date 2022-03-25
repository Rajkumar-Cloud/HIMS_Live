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
$pharmacy_pharled_list = new pharmacy_pharled_list();

// Run the page
$pharmacy_pharled_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_pharled_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_pharledlist = currentForm = new ew.Form("fpharmacy_pharledlist", "list");
fpharmacy_pharledlist.formKeyCountName = '<?php echo $pharmacy_pharled_list->FormKeyCountName ?>';

// Validate form
fpharmacy_pharledlist.validate = function() {
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
		<?php if ($pharmacy_pharled_list->SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SiNo->caption(), $pharmacy_pharled->SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SiNo->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->SLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SLNO->caption(), $pharmacy_pharled->SLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SLNO->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->Product->Required) { ?>
			elm = this.getElements("x" + infix + "_Product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->Product->caption(), $pharmacy_pharled->Product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->RT->caption(), $pharmacy_pharled->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->RT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->IQ->caption(), $pharmacy_pharled->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->IQ->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->DAMT->Required) { ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->DAMT->caption(), $pharmacy_pharled->DAMT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->DAMT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->Mfg->Required) { ?>
			elm = this.getElements("x" + infix + "_Mfg");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->Mfg->caption(), $pharmacy_pharled->Mfg->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->EXPDT->caption(), $pharmacy_pharled->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->EXPDT->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BATCHNO->caption(), $pharmacy_pharled->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BRCODE->caption(), $pharmacy_pharled->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PRC->caption(), $pharmacy_pharled->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->UR->caption(), $pharmacy_pharled->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->UR->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->_USERID->Required) { ?>
			elm = this.getElements("x" + infix + "__USERID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->_USERID->caption(), $pharmacy_pharled->_USERID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->id->caption(), $pharmacy_pharled->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->HosoID->Required) { ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->HosoID->caption(), $pharmacy_pharled->HosoID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->createdby->caption(), $pharmacy_pharled->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->createddatetime->caption(), $pharmacy_pharled->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->modifiedby->caption(), $pharmacy_pharled->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->modifieddatetime->caption(), $pharmacy_pharled->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->BRNAME->caption(), $pharmacy_pharled->BRNAME->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->baid->Required) { ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->baid->caption(), $pharmacy_pharled->baid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_baid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->baid->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->isdate->Required) { ?>
			elm = this.getElements("x" + infix + "_isdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->isdate->caption(), $pharmacy_pharled->isdate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_pharled_list->PSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PSGST->caption(), $pharmacy_pharled->PSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PSGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->PCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PCGST->caption(), $pharmacy_pharled->PCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PCGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->SSGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SSGST->caption(), $pharmacy_pharled->SSGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SSGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SSGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->SCGST->Required) { ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SCGST->caption(), $pharmacy_pharled->SCGST->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SCGST");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SCGST->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->PurValue->Required) { ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PurValue->caption(), $pharmacy_pharled->PurValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PurValue->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->PurRate->Required) { ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PurRate->caption(), $pharmacy_pharled->PurRate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PurRate");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PurRate->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->PUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->PUnit->caption(), $pharmacy_pharled->PUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->PUnit->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->SUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->SUnit->caption(), $pharmacy_pharled->SUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SUnit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled->SUnit->errorMessage()) ?>");
		<?php if ($pharmacy_pharled_list->HSNCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_HSNCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled->HSNCODE->caption(), $pharmacy_pharled->HSNCODE->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fpharmacy_pharledlist.emptyRow = function(infix) {
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
fpharmacy_pharledlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_pharledlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_pharledlist.lists["x_SLNO"] = <?php echo $pharmacy_pharled_list->SLNO->Lookup->toClientList() ?>;
fpharmacy_pharledlist.lists["x_SLNO"].options = <?php echo JsonEncode($pharmacy_pharled_list->SLNO->lookupOptions()) ?>;
fpharmacy_pharledlist.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fpharmacy_pharledlistsrch = currentSearchForm = new ew.Form("fpharmacy_pharledlistsrch");

// Filters
fpharmacy_pharledlistsrch.filterList = <?php echo $pharmacy_pharled_list->getFilterList() ?>;
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
<?php if (!$pharmacy_pharled->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_pharled_list->TotalRecs > 0 && $pharmacy_pharled_list->ExportOptions->visible()) { ?>
<?php $pharmacy_pharled_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->ImportOptions->visible()) { ?>
<?php $pharmacy_pharled_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->SearchOptions->visible()) { ?>
<?php $pharmacy_pharled_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->FilterOptions->visible()) { ?>
<?php $pharmacy_pharled_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_pharled->isExport() || EXPORT_MASTER_RECORD && $pharmacy_pharled->isExport("print")) { ?>
<?php
if ($pharmacy_pharled_list->DbMasterFilter <> "" && $pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_voucher") {
	if ($pharmacy_pharled_list->MasterRecordExists) {
		include_once "pharmacy_billing_vouchermaster.php";
	}
}
?>
<?php
if ($pharmacy_pharled_list->DbMasterFilter <> "" && $pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_issue") {
	if ($pharmacy_pharled_list->MasterRecordExists) {
		include_once "pharmacy_billing_issuemaster.php";
	}
}
?>
<?php
if ($pharmacy_pharled_list->DbMasterFilter <> "" && $pharmacy_pharled->getCurrentMasterTable() == "ip_admission") {
	if ($pharmacy_pharled_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_pharled_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_pharled->isExport() && !$pharmacy_pharled->CurrentAction) { ?>
<form name="fpharmacy_pharledlistsrch" id="fpharmacy_pharledlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_pharled_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_pharledlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_pharled">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_pharled_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_pharled_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_pharled_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_pharled_list->showPageHeader(); ?>
<?php
$pharmacy_pharled_list->showMessage();
?>
<?php if ($pharmacy_pharled_list->TotalRecs > 0 || $pharmacy_pharled->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_pharled_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_pharled">
<?php if (!$pharmacy_pharled->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_pharled->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_pharled_list->Pager)) $pharmacy_pharled_list->Pager = new NumericPager($pharmacy_pharled_list->StartRec, $pharmacy_pharled_list->DisplayRecs, $pharmacy_pharled_list->TotalRecs, $pharmacy_pharled_list->RecRange, $pharmacy_pharled_list->AutoHidePager) ?>
<?php if ($pharmacy_pharled_list->Pager->RecordCount > 0 && $pharmacy_pharled_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_pharled_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_pharled_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_pharled_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_pharled_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_pharled_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_pharled_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_pharled_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_pharled_list->TotalRecs > 0 && (!$pharmacy_pharled_list->AutoHidePageSizeSelector || $pharmacy_pharled_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_pharled">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_pharled_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_pharled_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_pharled_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_pharled_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_pharled_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_pharled_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_pharled->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_pharledlist" id="fpharmacy_pharledlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_pharled_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_pharled_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_voucher" && $pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_pharled->pbv->getSessionValue() ?>">
<?php } ?>
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_issue" && $pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_billing_issue">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_pharled->pbt->getSessionValue() ?>">
<?php } ?>
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "ip_admission" && $pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?php echo $pharmacy_pharled->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $pharmacy_pharled->PatID->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_pharled->Reception->getSessionValue() ?>">
<?php } ?>
<div id="gmp_pharmacy_pharled" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_pharled_list->TotalRecs > 0 || $pharmacy_pharled->isGridEdit()) { ?>
<table id="tbl_pharmacy_pharledlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_pharled_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_pharled_list->renderListOptions();

// Render list options (header, left)
$pharmacy_pharled_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled->SiNo->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled->SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->SiNo) ?>',1);"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled->SLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->SLNO) ?>',1);"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled->Product->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->Product) ?>',1);"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled->RT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->RT) ?>',1);"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled->IQ->headerCellClass() ?>"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->IQ) ?>',1);"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled->DAMT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->DAMT) ?>',1);"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->DAMT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->DAMT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled->Mfg->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->Mfg) ?>',1);"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->Mfg->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->Mfg->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->EXPDT) ?>',1);"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->BATCHNO) ?>',1);"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->BRCODE) ?>',1);"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled->PRC->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->PRC) ?>',1);"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled->UR->headerCellClass() ?>"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->UR) ?>',1);"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled->_USERID->headerCellClass() ?>"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled->_USERID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->_USERID) ?>',1);"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->_USERID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->_USERID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->_USERID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->id->Visible) { // id ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled->id->headerCellClass() ?>"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->id) ?>',1);"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled->HosoID->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->HosoID) ?>',1);"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled->createdby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->createdby) ?>',1);"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->createddatetime) ?>',1);"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->modifiedby) ?>',1);"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->modifieddatetime) ?>',1);"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->BRNAME) ?>',1);"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->BRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->BRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->baid) == "") { ?>
		<th data-name="baid" class="<?php echo $pharmacy_pharled->baid->headerCellClass() ?>"><div id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->baid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="baid" class="<?php echo $pharmacy_pharled->baid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->baid) ?>',1);"><div id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->baid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->baid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->baid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->isdate) == "") { ?>
		<th data-name="isdate" class="<?php echo $pharmacy_pharled->isdate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->isdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isdate" class="<?php echo $pharmacy_pharled->isdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->isdate) ?>',1);"><div id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->isdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->isdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->isdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_pharled->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_pharled->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->PSGST) ?>',1);"><div id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_pharled->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_pharled->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->PCGST) ?>',1);"><div id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_pharled->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_pharled->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->SSGST) ?>',1);"><div id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_pharled->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_pharled->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->SCGST) ?>',1);"><div id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_pharled->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_pharled->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->PurValue) ?>',1);"><div id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $pharmacy_pharled->PurRate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $pharmacy_pharled->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->PurRate) ?>',1);"><div id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $pharmacy_pharled->PUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $pharmacy_pharled->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->PUnit) ?>',1);"><div id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $pharmacy_pharled->SUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $pharmacy_pharled->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->SUnit) ?>',1);"><div id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
	<?php if ($pharmacy_pharled->sortUrl($pharmacy_pharled->HSNCODE) == "") { ?>
		<th data-name="HSNCODE" class="<?php echo $pharmacy_pharled->HSNCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled->HSNCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSNCODE" class="<?php echo $pharmacy_pharled->HSNCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_pharled->SortUrl($pharmacy_pharled->HSNCODE) ?>',1);"><div id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled->HSNCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled->HSNCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_pharled->HSNCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_pharled_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_pharled->ExportAll && $pharmacy_pharled->isExport()) {
	$pharmacy_pharled_list->StopRec = $pharmacy_pharled_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_pharled_list->TotalRecs > $pharmacy_pharled_list->StartRec + $pharmacy_pharled_list->DisplayRecs - 1)
		$pharmacy_pharled_list->StopRec = $pharmacy_pharled_list->StartRec + $pharmacy_pharled_list->DisplayRecs - 1;
	else
		$pharmacy_pharled_list->StopRec = $pharmacy_pharled_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $pharmacy_pharled_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_pharled_list->FormKeyCountName) && ($pharmacy_pharled->isGridAdd() || $pharmacy_pharled->isGridEdit() || $pharmacy_pharled->isConfirm())) {
		$pharmacy_pharled_list->KeyCount = $CurrentForm->getValue($pharmacy_pharled_list->FormKeyCountName);
		$pharmacy_pharled_list->StopRec = $pharmacy_pharled_list->StartRec + $pharmacy_pharled_list->KeyCount - 1;
	}
}
$pharmacy_pharled_list->RecCnt = $pharmacy_pharled_list->StartRec - 1;
if ($pharmacy_pharled_list->Recordset && !$pharmacy_pharled_list->Recordset->EOF) {
	$pharmacy_pharled_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_pharled_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_pharled_list->StartRec > 1)
		$pharmacy_pharled_list->Recordset->move($pharmacy_pharled_list->StartRec - 1);
} elseif (!$pharmacy_pharled->AllowAddDeleteRow && $pharmacy_pharled_list->StopRec == 0) {
	$pharmacy_pharled_list->StopRec = $pharmacy_pharled->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_pharled->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_pharled->resetAttributes();
$pharmacy_pharled_list->renderRow();
if ($pharmacy_pharled->isGridAdd())
	$pharmacy_pharled_list->RowIndex = 0;
if ($pharmacy_pharled->isGridEdit())
	$pharmacy_pharled_list->RowIndex = 0;
while ($pharmacy_pharled_list->RecCnt < $pharmacy_pharled_list->StopRec) {
	$pharmacy_pharled_list->RecCnt++;
	if ($pharmacy_pharled_list->RecCnt >= $pharmacy_pharled_list->StartRec) {
		$pharmacy_pharled_list->RowCnt++;
		if ($pharmacy_pharled->isGridAdd() || $pharmacy_pharled->isGridEdit() || $pharmacy_pharled->isConfirm()) {
			$pharmacy_pharled_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_pharled_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_pharled_list->FormActionName) && $pharmacy_pharled_list->EventCancelled)
				$pharmacy_pharled_list->RowAction = strval($CurrentForm->getValue($pharmacy_pharled_list->FormActionName));
			elseif ($pharmacy_pharled->isGridAdd())
				$pharmacy_pharled_list->RowAction = "insert";
			else
				$pharmacy_pharled_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_pharled_list->KeyCount = $pharmacy_pharled_list->RowIndex;

		// Init row class and style
		$pharmacy_pharled->resetAttributes();
		$pharmacy_pharled->CssClass = "";
		if ($pharmacy_pharled->isGridAdd()) {
			$pharmacy_pharled_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_pharled_list->loadRowValues($pharmacy_pharled_list->Recordset); // Load row values
		}
		$pharmacy_pharled->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_pharled->isGridAdd()) // Grid add
			$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_pharled->isGridAdd() && $pharmacy_pharled->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_pharled_list->restoreCurrentRowFormValues($pharmacy_pharled_list->RowIndex); // Restore form values
		if ($pharmacy_pharled->isGridEdit()) { // Grid edit
			if ($pharmacy_pharled->EventCancelled)
				$pharmacy_pharled_list->restoreCurrentRowFormValues($pharmacy_pharled_list->RowIndex); // Restore form values
			if ($pharmacy_pharled_list->RowAction == "insert")
				$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_pharled->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_pharled->isGridEdit() && ($pharmacy_pharled->RowType == ROWTYPE_EDIT || $pharmacy_pharled->RowType == ROWTYPE_ADD) && $pharmacy_pharled->EventCancelled) // Update failed
			$pharmacy_pharled_list->restoreCurrentRowFormValues($pharmacy_pharled_list->RowIndex); // Restore form values
		if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_pharled_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$pharmacy_pharled->RowAttrs = array_merge($pharmacy_pharled->RowAttrs, array('data-rowindex'=>$pharmacy_pharled_list->RowCnt, 'id'=>'r' . $pharmacy_pharled_list->RowCnt . '_pharmacy_pharled', 'data-rowtype'=>$pharmacy_pharled->RowType));

		// Render row
		$pharmacy_pharled_list->renderRow();

		// Render list options
		$pharmacy_pharled_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_pharled_list->RowAction <> "delete" && $pharmacy_pharled_list->RowAction <> "insertdelete" && !($pharmacy_pharled_list->RowAction == "insert" && $pharmacy_pharled->isConfirm() && $pharmacy_pharled_list->emptyRow())) {
?>
	<tr<?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_list->ListOptions->render("body", "left", $pharmacy_pharled_list->RowCnt);
?>
	<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo"<?php echo $pharmacy_pharled->SiNo->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SiNo->EditValue ?>"<?php echo $pharmacy_pharled->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SiNo->EditValue ?>"<?php echo $pharmacy_pharled->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled->SiNo->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO"<?php echo $pharmacy_pharled->SLNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_pharled->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_pharled->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_pharled_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_pharledlist.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $pharmacy_pharled->SLNO->Lookup->getParamTag("p_x" . $pharmacy_pharled_list->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_pharled->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_pharled->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_pharled_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_pharledlist.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $pharmacy_pharled->SLNO->Lookup->getParamTag("p_x" . $pharmacy_pharled_list->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled->SLNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SLNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $pharmacy_pharled->Product->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Product->EditValue ?>"<?php echo $pharmacy_pharled->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Product->EditValue ?>"<?php echo $pharmacy_pharled->Product->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled->Product->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Product->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $pharmacy_pharled->RT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RT->EditValue ?>"<?php echo $pharmacy_pharled->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RT->EditValue ?>"<?php echo $pharmacy_pharled->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled->RT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $pharmacy_pharled->IQ->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IQ->EditValue ?>"<?php echo $pharmacy_pharled->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IQ->EditValue ?>"<?php echo $pharmacy_pharled->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled->IQ->viewAttributes() ?>>
<?php echo $pharmacy_pharled->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT"<?php echo $pharmacy_pharled->DAMT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DAMT->EditValue ?>"<?php echo $pharmacy_pharled->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DAMT->EditValue ?>"<?php echo $pharmacy_pharled->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled->DAMT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->DAMT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg"<?php echo $pharmacy_pharled->Mfg->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Mfg->EditValue ?>"<?php echo $pharmacy_pharled->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Mfg->EditValue ?>"<?php echo $pharmacy_pharled->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled->Mfg->viewAttributes() ?>>
<?php echo $pharmacy_pharled->Mfg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $pharmacy_pharled->EXPDT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->EXPDT->ReadOnly && !$pharmacy_pharled->EXPDT->Disabled && !isset($pharmacy_pharled->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharledlist", "x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->EXPDT->ReadOnly && !$pharmacy_pharled->EXPDT->Disabled && !isset($pharmacy_pharled->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharledlist", "x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled->EXPDT->viewAttributes() ?>>
<?php echo $pharmacy_pharled->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $pharmacy_pharled->BATCHNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled->BATCHNO->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_pharled->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_pharled->PRC->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRC->EditValue ?>"<?php echo $pharmacy_pharled->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRC->EditValue ?>"<?php echo $pharmacy_pharled->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled->PRC->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $pharmacy_pharled->UR->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->UR->EditValue ?>"<?php echo $pharmacy_pharled->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->UR->EditValue ?>"<?php echo $pharmacy_pharled->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled->UR->viewAttributes() ?>>
<?php echo $pharmacy_pharled->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID"<?php echo $pharmacy_pharled->_USERID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled->_USERID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->_USERID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_pharled->id->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_id" class="form-group pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_pharled->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_id" class="pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled->id->viewAttributes() ?>>
<?php echo $pharmacy_pharled->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $pharmacy_pharled->HosoID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled->HosoID->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HosoID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_pharled->createdby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled->createdby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_pharled->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_pharled->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_pharled->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_pharled->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME"<?php echo $pharmacy_pharled->BRNAME->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled->BRNAME->viewAttributes() ?>>
<?php echo $pharmacy_pharled->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
		<td data-name="baid"<?php echo $pharmacy_pharled->baid->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="text" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->baid->EditValue ?>"<?php echo $pharmacy_pharled->baid->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="text" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->baid->EditValue ?>"<?php echo $pharmacy_pharled->baid->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_baid" class="pharmacy_pharled_baid">
<span<?php echo $pharmacy_pharled->baid->viewAttributes() ?>>
<?php echo $pharmacy_pharled->baid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
		<td data-name="isdate"<?php echo $pharmacy_pharled->isdate->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_isdate" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate">
<span<?php echo $pharmacy_pharled->isdate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->isdate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $pharmacy_pharled->PSGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PSGST->EditValue ?>"<?php echo $pharmacy_pharled->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PSGST->EditValue ?>"<?php echo $pharmacy_pharled->PSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST">
<span<?php echo $pharmacy_pharled->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $pharmacy_pharled->PCGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PCGST->EditValue ?>"<?php echo $pharmacy_pharled->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PCGST->EditValue ?>"<?php echo $pharmacy_pharled->PCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST">
<span<?php echo $pharmacy_pharled->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $pharmacy_pharled->SSGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SSGST->EditValue ?>"<?php echo $pharmacy_pharled->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SSGST->EditValue ?>"<?php echo $pharmacy_pharled->SSGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST">
<span<?php echo $pharmacy_pharled->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $pharmacy_pharled->SCGST->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SCGST->EditValue ?>"<?php echo $pharmacy_pharled->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SCGST->EditValue ?>"<?php echo $pharmacy_pharled->SCGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST">
<span<?php echo $pharmacy_pharled->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $pharmacy_pharled->PurValue->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurValue->EditValue ?>"<?php echo $pharmacy_pharled->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurValue->EditValue ?>"<?php echo $pharmacy_pharled->PurValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue">
<span<?php echo $pharmacy_pharled->PurValue->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $pharmacy_pharled->PurRate->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurRate->EditValue ?>"<?php echo $pharmacy_pharled->PurRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurRate->EditValue ?>"<?php echo $pharmacy_pharled->PurRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate">
<span<?php echo $pharmacy_pharled->PurRate->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PurRate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $pharmacy_pharled->PUnit->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PUnit->EditValue ?>"<?php echo $pharmacy_pharled->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PUnit->EditValue ?>"<?php echo $pharmacy_pharled->PUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit">
<span<?php echo $pharmacy_pharled->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->PUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $pharmacy_pharled->SUnit->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SUnit->EditValue ?>"<?php echo $pharmacy_pharled->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SUnit->EditValue ?>"<?php echo $pharmacy_pharled->SUnit->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit">
<span<?php echo $pharmacy_pharled->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_pharled->SUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
		<td data-name="HSNCODE"<?php echo $pharmacy_pharled->HSNCODE->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HSNCODE->EditValue ?>"<?php echo $pharmacy_pharled->HSNCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HSNCODE->EditValue ?>"<?php echo $pharmacy_pharled->HSNCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCnt ?>_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE">
<span<?php echo $pharmacy_pharled->HSNCODE->viewAttributes() ?>>
<?php echo $pharmacy_pharled->HSNCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_list->ListOptions->render("body", "right", $pharmacy_pharled_list->RowCnt);
?>
	</tr>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD || $pharmacy_pharled->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_pharledlist.updateLists(<?php echo $pharmacy_pharled_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_pharled->isGridAdd())
		if (!$pharmacy_pharled_list->Recordset->EOF)
			$pharmacy_pharled_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_pharled->isGridAdd() || $pharmacy_pharled->isGridEdit()) {
		$pharmacy_pharled_list->RowIndex = '$rowindex$';
		$pharmacy_pharled_list->loadRowValues();

		// Set row properties
		$pharmacy_pharled->resetAttributes();
		$pharmacy_pharled->RowAttrs = array_merge($pharmacy_pharled->RowAttrs, array('data-rowindex'=>$pharmacy_pharled_list->RowIndex, 'id'=>'r0_pharmacy_pharled', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_pharled->RowAttrs["class"], "ew-template");
		$pharmacy_pharled->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_pharled_list->renderRow();

		// Render list options
		$pharmacy_pharled_list->renderListOptions();
		$pharmacy_pharled_list->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_list->ListOptions->render("body", "left", $pharmacy_pharled_list->RowIndex);
?>
	<?php if ($pharmacy_pharled->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SiNo->EditValue ?>"<?php echo $pharmacy_pharled->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO">
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$pharmacy_pharled->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$pharmacy_pharled->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $pharmacy_pharled_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpharmacy_pharledlist.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $pharmacy_pharled->SLNO->Lookup->getParamTag("p_x" . $pharmacy_pharled_list->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled->SLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Product->Visible) { // Product ?>
		<td data-name="Product">
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Product->EditValue ?>"<?php echo $pharmacy_pharled->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->RT->Visible) { // RT ?>
		<td data-name="RT">
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->RT->EditValue ?>"<?php echo $pharmacy_pharled->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->IQ->EditValue ?>"<?php echo $pharmacy_pharled->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->DAMT->EditValue ?>"<?php echo $pharmacy_pharled->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->Mfg->EditValue ?>"<?php echo $pharmacy_pharled->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled->EXPDT->ReadOnly && !$pharmacy_pharled->EXPDT->Disabled && !isset($pharmacy_pharled->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_pharledlist", "x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PRC->EditValue ?>"<?php echo $pharmacy_pharled->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->UR->Visible) { // UR ?>
		<td data-name="UR">
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->UR->EditValue ?>"<?php echo $pharmacy_pharled->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->baid->Visible) { // baid ?>
		<td data-name="baid">
<span id="el$rowindex$_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="text" data-table="pharmacy_pharled" data-field="x_baid" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->baid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->baid->EditValue ?>"<?php echo $pharmacy_pharled->baid->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_baid" value="<?php echo HtmlEncode($pharmacy_pharled->baid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->isdate->Visible) { // isdate ?>
		<td data-name="isdate">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_isdate" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_isdate" value="<?php echo HtmlEncode($pharmacy_pharled->isdate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST">
<span id="el$rowindex$_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PSGST->EditValue ?>"<?php echo $pharmacy_pharled->PSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PSGST" value="<?php echo HtmlEncode($pharmacy_pharled->PSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST">
<span id="el$rowindex$_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PCGST->EditValue ?>"<?php echo $pharmacy_pharled->PCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PCGST" value="<?php echo HtmlEncode($pharmacy_pharled->PCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST">
<span id="el$rowindex$_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SSGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SSGST->EditValue ?>"<?php echo $pharmacy_pharled->SSGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SSGST" value="<?php echo HtmlEncode($pharmacy_pharled->SSGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST">
<span id="el$rowindex$_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="text" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SCGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SCGST->EditValue ?>"<?php echo $pharmacy_pharled->SCGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SCGST" value="<?php echo HtmlEncode($pharmacy_pharled->SCGST->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue">
<span id="el$rowindex$_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurValue->EditValue ?>"<?php echo $pharmacy_pharled->PurValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurValue" value="<?php echo HtmlEncode($pharmacy_pharled->PurValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate">
<span id="el$rowindex$_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="text" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PurRate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PurRate->EditValue ?>"<?php echo $pharmacy_pharled->PurRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PurRate" value="<?php echo HtmlEncode($pharmacy_pharled->PurRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit">
<span id="el$rowindex$_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->PUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->PUnit->EditValue ?>"<?php echo $pharmacy_pharled->PUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PUnit" value="<?php echo HtmlEncode($pharmacy_pharled->PUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit">
<span id="el$rowindex$_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="text" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled->SUnit->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->SUnit->EditValue ?>"<?php echo $pharmacy_pharled->SUnit->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SUnit" value="<?php echo HtmlEncode($pharmacy_pharled->SUnit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled->HSNCODE->Visible) { // HSNCODE ?>
		<td data-name="HSNCODE">
<span id="el$rowindex$_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="text" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled->HSNCODE->EditValue ?>"<?php echo $pharmacy_pharled->HSNCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HSNCODE" value="<?php echo HtmlEncode($pharmacy_pharled->HSNCODE->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_list->ListOptions->render("body", "right", $pharmacy_pharled_list->RowIndex);
?>
<script>
fpharmacy_pharledlist.updateLists(<?php echo $pharmacy_pharled_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($pharmacy_pharled->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" id="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" value="<?php echo $pharmacy_pharled_list->KeyCount ?>">
<?php echo $pharmacy_pharled_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_pharled->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" id="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" value="<?php echo $pharmacy_pharled_list->KeyCount ?>">
<?php echo $pharmacy_pharled_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_pharled_list->Recordset)
	$pharmacy_pharled_list->Recordset->Close();
?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_pharled->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_pharled_list->Pager)) $pharmacy_pharled_list->Pager = new NumericPager($pharmacy_pharled_list->StartRec, $pharmacy_pharled_list->DisplayRecs, $pharmacy_pharled_list->TotalRecs, $pharmacy_pharled_list->RecRange, $pharmacy_pharled_list->AutoHidePager) ?>
<?php if ($pharmacy_pharled_list->Pager->RecordCount > 0 && $pharmacy_pharled_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_pharled_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_pharled_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_pharled_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_pharled_list->pageUrl() ?>start=<?php echo $pharmacy_pharled_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_pharled_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_pharled_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_pharled_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_pharled_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_pharled_list->TotalRecs > 0 && (!$pharmacy_pharled_list->AutoHidePageSizeSelector || $pharmacy_pharled_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_pharled">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_pharled_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_pharled_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_pharled_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_pharled_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_pharled_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_pharled_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_pharled->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_pharled_list->TotalRecs == 0 && !$pharmacy_pharled->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_pharled_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

 $("[data-name='baid']").hide();
  $("[data-name='isdate']").hide();

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
</script>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_pharled", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_pharled_list->terminate();
?>