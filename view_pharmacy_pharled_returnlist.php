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
$view_pharmacy_pharled_return_list = new view_pharmacy_pharled_return_list();

// Run the page
$view_pharmacy_pharled_return_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_pharled_returnlist = currentForm = new ew.Form("fview_pharmacy_pharled_returnlist", "list");
fview_pharmacy_pharled_returnlist.formKeyCountName = '<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>';

// Validate form
fview_pharmacy_pharled_returnlist.validate = function() {
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
		<?php if ($view_pharmacy_pharled_return_list->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BRCODE->caption(), $view_pharmacy_pharled_return->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->PRC->caption(), $view_pharmacy_pharled_return->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->SiNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->SiNo->caption(), $view_pharmacy_pharled_return->SiNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SiNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->SiNo->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->Product->Required) { ?>
			elm = this.getElements("x" + infix + "_Product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->Product->caption(), $view_pharmacy_pharled_return->Product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->SLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->SLNO->caption(), $view_pharmacy_pharled_return->SLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SLNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->SLNO->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->RT->Required) { ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->RT->caption(), $view_pharmacy_pharled_return->RT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->RT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->MRQ->Required) { ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->MRQ->caption(), $view_pharmacy_pharled_return->MRQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_MRQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->MRQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->IQ->Required) { ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->IQ->caption(), $view_pharmacy_pharled_return->IQ->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IQ");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->IQ->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->DAMT->Required) { ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->DAMT->caption(), $view_pharmacy_pharled_return->DAMT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DAMT");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->DAMT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->BATCHNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BATCHNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BATCHNO->caption(), $view_pharmacy_pharled_return->BATCHNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->EXPDT->Required) { ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->EXPDT->caption(), $view_pharmacy_pharled_return->EXPDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EXPDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->EXPDT->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->Mfg->Required) { ?>
			elm = this.getElements("x" + infix + "_Mfg");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->Mfg->caption(), $view_pharmacy_pharled_return->Mfg->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->UR->Required) { ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->UR->caption(), $view_pharmacy_pharled_return->UR->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UR");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return->UR->errorMessage()) ?>");
		<?php if ($view_pharmacy_pharled_return_list->_USERID->Required) { ?>
			elm = this.getElements("x" + infix + "__USERID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->_USERID->caption(), $view_pharmacy_pharled_return->_USERID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->id->caption(), $view_pharmacy_pharled_return->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->HosoID->Required) { ?>
			elm = this.getElements("x" + infix + "_HosoID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->HosoID->caption(), $view_pharmacy_pharled_return->HosoID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->createdby->caption(), $view_pharmacy_pharled_return->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->createddatetime->caption(), $view_pharmacy_pharled_return->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->modifiedby->caption(), $view_pharmacy_pharled_return->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->modifieddatetime->caption(), $view_pharmacy_pharled_return->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_pharled_return_list->BRNAME->Required) { ?>
			elm = this.getElements("x" + infix + "_BRNAME");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return->BRNAME->caption(), $view_pharmacy_pharled_return->BRNAME->RequiredErrorMessage)) ?>");
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
fview_pharmacy_pharled_returnlist.emptyRow = function(infix) {
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
fview_pharmacy_pharled_returnlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_pharled_returnlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_pharled_returnlist.lists["x_SLNO"] = <?php echo $view_pharmacy_pharled_return_list->SLNO->Lookup->toClientList() ?>;
fview_pharmacy_pharled_returnlist.lists["x_SLNO"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_list->SLNO->lookupOptions()) ?>;
fview_pharmacy_pharled_returnlist.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_pharmacy_pharled_returnlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_pharled_returnlistsrch");

// Filters
fview_pharmacy_pharled_returnlistsrch.filterList = <?php echo $view_pharmacy_pharled_return_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_pharled_return_list->TotalRecs > 0 && $view_pharmacy_pharled_return_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacy_pharled_return->isExport() || EXPORT_MASTER_RECORD && $view_pharmacy_pharled_return->isExport("print")) { ?>
<?php
if ($view_pharmacy_pharled_return_list->DbMasterFilter <> "" && $view_pharmacy_pharled_return->getCurrentMasterTable() == "pharmacy_billing_return") {
	if ($view_pharmacy_pharled_return_list->MasterRecordExists) {
		include_once "pharmacy_billing_returnmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacy_pharled_return_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_pharled_return->isExport() && !$view_pharmacy_pharled_return->CurrentAction) { ?>
<form name="fview_pharmacy_pharled_returnlistsrch" id="fview_pharmacy_pharled_returnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_pharled_return_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_pharled_returnlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_pharled_return_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_pharled_return_list->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_list->showMessage();
?>
<?php if ($view_pharmacy_pharled_return_list->TotalRecs > 0 || $view_pharmacy_pharled_return->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_pharled_return_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled_return">
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_pharled_return->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_pharled_return_list->Pager)) $view_pharmacy_pharled_return_list->Pager = new NumericPager($view_pharmacy_pharled_return_list->StartRec, $view_pharmacy_pharled_return_list->DisplayRecs, $view_pharmacy_pharled_return_list->TotalRecs, $view_pharmacy_pharled_return_list->RecRange, $view_pharmacy_pharled_return_list->AutoHidePager) ?>
<?php if ($view_pharmacy_pharled_return_list->Pager->RecordCount > 0 && $view_pharmacy_pharled_return_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_pharled_return_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_pharled_return_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_pharled_return_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->TotalRecs > 0 && (!$view_pharmacy_pharled_return_list->AutoHidePageSizeSelector || $view_pharmacy_pharled_return_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_pharled_return->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_pharled_returnlist" id="fview_pharmacy_pharled_returnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_pharled_return_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_pharled_return_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<?php if ($view_pharmacy_pharled_return->getCurrentMasterTable() == "pharmacy_billing_return" && $view_pharmacy_pharled_return->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_billing_return">
<input type="hidden" name="fk_id" value="<?php echo $view_pharmacy_pharled_return->sretid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_pharmacy_pharled_return" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_pharled_return_list->TotalRecs > 0 || $view_pharmacy_pharled_return->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_pharled_returnlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_pharled_return_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_pharled_return_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_pharled_return_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->BRCODE) ?>',1);"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->PRC) ?>',1);"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return->SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->SiNo) ?>',1);"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->SiNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->SiNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->Product) ?>',1);"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $view_pharmacy_pharled_return->SLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $view_pharmacy_pharled_return->SLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->SLNO) ?>',1);"><div id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->SLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->SLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->RT) ?>',1);"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->MRQ) ?>',1);"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->MRQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->MRQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->IQ) ?>',1);"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->DAMT) ?>',1);"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->DAMT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->DAMT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->BATCHNO) ?>',1);"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->EXPDT) ?>',1);"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->Mfg) ?>',1);"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->Mfg->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->Mfg->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return->UR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->UR) ?>',1);"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->UR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->UR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return->_USERID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return->_USERID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->_USERID) ?>',1);"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->_USERID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->_USERID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->_USERID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return->id->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->id) ?>',1);"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->HosoID) ?>',1);"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->createdby) ?>',1);"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->createddatetime) ?>',1);"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->modifiedby) ?>',1);"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->modifieddatetime) ?>',1);"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
	<?php if ($view_pharmacy_pharled_return->sortUrl($view_pharmacy_pharled_return->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return->BRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled_return->SortUrl($view_pharmacy_pharled_return->BRNAME) ?>',1);"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return->BRNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return->BRNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_pharled_return_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_pharled_return->ExportAll && $view_pharmacy_pharled_return->isExport()) {
	$view_pharmacy_pharled_return_list->StopRec = $view_pharmacy_pharled_return_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_pharled_return_list->TotalRecs > $view_pharmacy_pharled_return_list->StartRec + $view_pharmacy_pharled_return_list->DisplayRecs - 1)
		$view_pharmacy_pharled_return_list->StopRec = $view_pharmacy_pharled_return_list->StartRec + $view_pharmacy_pharled_return_list->DisplayRecs - 1;
	else
		$view_pharmacy_pharled_return_list->StopRec = $view_pharmacy_pharled_return_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_pharmacy_pharled_return_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_pharled_return_list->FormKeyCountName) && ($view_pharmacy_pharled_return->isGridAdd() || $view_pharmacy_pharled_return->isGridEdit() || $view_pharmacy_pharled_return->isConfirm())) {
		$view_pharmacy_pharled_return_list->KeyCount = $CurrentForm->getValue($view_pharmacy_pharled_return_list->FormKeyCountName);
		$view_pharmacy_pharled_return_list->StopRec = $view_pharmacy_pharled_return_list->StartRec + $view_pharmacy_pharled_return_list->KeyCount - 1;
	}
}
$view_pharmacy_pharled_return_list->RecCnt = $view_pharmacy_pharled_return_list->StartRec - 1;
if ($view_pharmacy_pharled_return_list->Recordset && !$view_pharmacy_pharled_return_list->Recordset->EOF) {
	$view_pharmacy_pharled_return_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_pharled_return_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_pharled_return_list->StartRec > 1)
		$view_pharmacy_pharled_return_list->Recordset->move($view_pharmacy_pharled_return_list->StartRec - 1);
} elseif (!$view_pharmacy_pharled_return->AllowAddDeleteRow && $view_pharmacy_pharled_return_list->StopRec == 0) {
	$view_pharmacy_pharled_return_list->StopRec = $view_pharmacy_pharled_return->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_pharled_return->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_pharled_return->resetAttributes();
$view_pharmacy_pharled_return_list->renderRow();
if ($view_pharmacy_pharled_return->isGridAdd())
	$view_pharmacy_pharled_return_list->RowIndex = 0;
if ($view_pharmacy_pharled_return->isGridEdit())
	$view_pharmacy_pharled_return_list->RowIndex = 0;
while ($view_pharmacy_pharled_return_list->RecCnt < $view_pharmacy_pharled_return_list->StopRec) {
	$view_pharmacy_pharled_return_list->RecCnt++;
	if ($view_pharmacy_pharled_return_list->RecCnt >= $view_pharmacy_pharled_return_list->StartRec) {
		$view_pharmacy_pharled_return_list->RowCnt++;
		if ($view_pharmacy_pharled_return->isGridAdd() || $view_pharmacy_pharled_return->isGridEdit() || $view_pharmacy_pharled_return->isConfirm()) {
			$view_pharmacy_pharled_return_list->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_pharled_return_list->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_pharled_return_list->FormActionName) && $view_pharmacy_pharled_return_list->EventCancelled)
				$view_pharmacy_pharled_return_list->RowAction = strval($CurrentForm->getValue($view_pharmacy_pharled_return_list->FormActionName));
			elseif ($view_pharmacy_pharled_return->isGridAdd())
				$view_pharmacy_pharled_return_list->RowAction = "insert";
			else
				$view_pharmacy_pharled_return_list->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_pharled_return_list->KeyCount = $view_pharmacy_pharled_return_list->RowIndex;

		// Init row class and style
		$view_pharmacy_pharled_return->resetAttributes();
		$view_pharmacy_pharled_return->CssClass = "";
		if ($view_pharmacy_pharled_return->isGridAdd()) {
			$view_pharmacy_pharled_return_list->loadRowValues(); // Load default values
		} else {
			$view_pharmacy_pharled_return_list->loadRowValues($view_pharmacy_pharled_return_list->Recordset); // Load row values
		}
		$view_pharmacy_pharled_return->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_pharled_return->isGridAdd()) // Grid add
			$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_pharled_return->isGridAdd() && $view_pharmacy_pharled_return->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_pharled_return_list->restoreCurrentRowFormValues($view_pharmacy_pharled_return_list->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return->isGridEdit()) { // Grid edit
			if ($view_pharmacy_pharled_return->EventCancelled)
				$view_pharmacy_pharled_return_list->restoreCurrentRowFormValues($view_pharmacy_pharled_return_list->RowIndex); // Restore form values
			if ($view_pharmacy_pharled_return_list->RowAction == "insert")
				$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_pharled_return->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_pharled_return->isGridEdit() && ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT || $view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) && $view_pharmacy_pharled_return->EventCancelled) // Update failed
			$view_pharmacy_pharled_return_list->restoreCurrentRowFormValues($view_pharmacy_pharled_return_list->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_pharled_return_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_pharmacy_pharled_return->RowAttrs = array_merge($view_pharmacy_pharled_return->RowAttrs, array('data-rowindex'=>$view_pharmacy_pharled_return_list->RowCnt, 'id'=>'r' . $view_pharmacy_pharled_return_list->RowCnt . '_view_pharmacy_pharled_return', 'data-rowtype'=>$view_pharmacy_pharled_return->RowType));

		// Render row
		$view_pharmacy_pharled_return_list->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_pharled_return_list->RowAction <> "delete" && $view_pharmacy_pharled_return_list->RowAction <> "insertdelete" && !($view_pharmacy_pharled_return_list->RowAction == "insert" && $view_pharmacy_pharled_return->isConfirm() && $view_pharmacy_pharled_return_list->emptyRow())) {
?>
	<tr<?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "left", $view_pharmacy_pharled_return_list->RowCnt);
?>
	<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_pharled_return->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_pharled_return->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo"<?php echo $view_pharmacy_pharled_return->SiNo->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return->SiNo->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view_pharmacy_pharled_return->Product->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Product->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Product->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Product->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Product->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO"<?php echo $view_pharmacy_pharled_return->SLNO->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_pharled_return_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-value-separator="<?php echo $view_pharmacy_pharled_return->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_pharled_returnlist.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $view_pharmacy_pharled_return->SLNO->Lookup->getParamTag("p_x" . $view_pharmacy_pharled_return_list->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_pharled_return_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-value-separator="<?php echo $view_pharmacy_pharled_return->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_pharled_returnlist.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $view_pharmacy_pharled_return->SLNO->Lookup->getParamTag("p_x" . $view_pharmacy_pharled_return_list->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO">
<span<?php echo $view_pharmacy_pharled_return->SLNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->SLNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $view_pharmacy_pharled_return->RT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ"<?php echo $view_pharmacy_pharled_return->MRQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return->MRQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->MRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $view_pharmacy_pharled_return->IQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return->IQ->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT"<?php echo $view_pharmacy_pharled_return->DAMT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return->DAMT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->DAMT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $view_pharmacy_pharled_return->BATCHNO->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return->BATCHNO->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $view_pharmacy_pharled_return->EXPDT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->EXPDT->ReadOnly && !$view_pharmacy_pharled_return->EXPDT->Disabled && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->EXPDT->ReadOnly && !$view_pharmacy_pharled_return->EXPDT->Disabled && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg"<?php echo $view_pharmacy_pharled_return->Mfg->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return->Mfg->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->Mfg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
		<td data-name="UR"<?php echo $view_pharmacy_pharled_return->UR->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return->UR->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID"<?php echo $view_pharmacy_pharled_return->_USERID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return->_USERID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->_USERID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_pharled_return->id->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return->id->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $view_pharmacy_pharled_return->HosoID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return->HosoID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->HosoID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_pharmacy_pharled_return->createdby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_pharmacy_pharled_return->createddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_pharmacy_pharled_return->modifiedby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_pharled_return->modifieddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME"<?php echo $view_pharmacy_pharled_return->BRNAME->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCnt ?>_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return->BRNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled_return->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "right", $view_pharmacy_pharled_return_list->RowCnt);
?>
	</tr>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD || $view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacy_pharled_returnlist.updateLists(<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_pharled_return->isGridAdd())
		if (!$view_pharmacy_pharled_return_list->Recordset->EOF)
			$view_pharmacy_pharled_return_list->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_pharled_return->isGridAdd() || $view_pharmacy_pharled_return->isGridEdit()) {
		$view_pharmacy_pharled_return_list->RowIndex = '$rowindex$';
		$view_pharmacy_pharled_return_list->loadRowValues();

		// Set row properties
		$view_pharmacy_pharled_return->resetAttributes();
		$view_pharmacy_pharled_return->RowAttrs = array_merge($view_pharmacy_pharled_return->RowAttrs, array('data-rowindex'=>$view_pharmacy_pharled_return_list->RowIndex, 'id'=>'r0_view_pharmacy_pharled_return', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacy_pharled_return->RowAttrs["class"], "ew-template");
		$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_pharled_return_list->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_list->renderListOptions();
		$view_pharmacy_pharled_return_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "left", $view_pharmacy_pharled_return_list->RowIndex);
?>
	<?php if ($view_pharmacy_pharled_return->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Product->Visible) { // Product ?>
		<td data-name="Product">
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Product->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO">
<span id="el$rowindex$_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$wrkonchange = "ew.autoFill(this);" . trim(@$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_pharmacy_pharled_return->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" class="text-nowrap" style="z-index: <?php echo (9000 - $view_pharmacy_pharled_return_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($view_pharmacy_pharled_return->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-value-separator="<?php echo $view_pharmacy_pharled_return->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_pharmacy_pharled_returnlist.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO","forceSelect":true});
</script>
<?php echo $view_pharmacy_pharled_return->SLNO->Lookup->getParamTag("p_x" . $view_pharmacy_pharled_return_list->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->SLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->RT->Visible) { // RT ?>
		<td data-name="RT">
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return->EXPDT->ReadOnly && !$view_pharmacy_pharled_return->EXPDT->Disabled && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->UR->Visible) { // UR ?>
		<td data-name="UR">
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "right", $view_pharmacy_pharled_return_list->RowIndex);
?>
<script>
fview_pharmacy_pharled_returnlist.updateLists(<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_pharmacy_pharled_return->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" id="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" value="<?php echo $view_pharmacy_pharled_return_list->KeyCount ?>">
<?php echo $view_pharmacy_pharled_return_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" id="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" value="<?php echo $view_pharmacy_pharled_return_list->KeyCount ?>">
<?php echo $view_pharmacy_pharled_return_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_pharmacy_pharled_return->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_pharled_return_list->Recordset)
	$view_pharmacy_pharled_return_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_pharled_return->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_pharled_return_list->Pager)) $view_pharmacy_pharled_return_list->Pager = new NumericPager($view_pharmacy_pharled_return_list->StartRec, $view_pharmacy_pharled_return_list->DisplayRecs, $view_pharmacy_pharled_return_list->TotalRecs, $view_pharmacy_pharled_return_list->RecRange, $view_pharmacy_pharled_return_list->AutoHidePager) ?>
<?php if ($view_pharmacy_pharled_return_list->Pager->RecordCount > 0 && $view_pharmacy_pharled_return_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_pharled_return_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_pharled_return_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_pharled_return_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_return_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_return_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_pharled_return_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->TotalRecs > 0 && (!$view_pharmacy_pharled_return_list->AutoHidePageSizeSelector || $view_pharmacy_pharled_return_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_pharled_return_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_pharled_return->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->TotalRecs == 0 && !$view_pharmacy_pharled_return->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_pharled_return_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>

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
</script>
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_pharled_return", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_pharled_return_list->terminate();
?>