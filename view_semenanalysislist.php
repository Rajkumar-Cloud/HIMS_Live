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
$view_semenanalysis_list = new view_semenanalysis_list();

// Run the page
$view_semenanalysis_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_semenanalysis_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_semenanalysis->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_semenanalysislist = currentForm = new ew.Form("fview_semenanalysislist", "list");
fview_semenanalysislist.formKeyCountName = '<?php echo $view_semenanalysis_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_semenanalysislist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_semenanalysislist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_semenanalysislist.lists["x_RequestSample"] = <?php echo $view_semenanalysis_list->RequestSample->Lookup->toClientList() ?>;
fview_semenanalysislist.lists["x_RequestSample"].options = <?php echo JsonEncode($view_semenanalysis_list->RequestSample->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_semenanalysislistsrch = currentSearchForm = new ew.Form("fview_semenanalysislistsrch");

// Validate function for search
fview_semenanalysislistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_semenanalysis->PREG_TEST_DATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_semenanalysislistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_semenanalysislistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_semenanalysislistsrch.filterList = <?php echo $view_semenanalysis_list->getFilterList() ?>;
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
<?php if (!$view_semenanalysis->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_semenanalysis_list->TotalRecs > 0 && $view_semenanalysis_list->ExportOptions->visible()) { ?>
<?php $view_semenanalysis_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_semenanalysis_list->ImportOptions->visible()) { ?>
<?php $view_semenanalysis_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_semenanalysis_list->SearchOptions->visible()) { ?>
<?php $view_semenanalysis_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_semenanalysis_list->FilterOptions->visible()) { ?>
<?php $view_semenanalysis_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_semenanalysis_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_semenanalysis->isExport() && !$view_semenanalysis->CurrentAction) { ?>
<form name="fview_semenanalysislistsrch" id="fview_semenanalysislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_semenanalysis_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_semenanalysislistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_semenanalysis">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_semenanalysis_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_semenanalysis->RowType = ROWTYPE_SEARCH;

// Render row
$view_semenanalysis->resetAttributes();
$view_semenanalysis_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_semenanalysis->PaID->Visible) { // PaID ?>
	<div id="xsc_PaID" class="ew-cell form-group">
		<label for="x_PaID" class="ew-search-caption ew-label"><?php echo $view_semenanalysis->PaID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaID" id="z_PaID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PaID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PaID->EditValue ?>"<?php echo $view_semenanalysis->PaID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PaName->Visible) { // PaName ?>
	<div id="xsc_PaName" class="ew-cell form-group">
		<label for="x_PaName" class="ew-search-caption ew-label"><?php echo $view_semenanalysis->PaName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaName" id="z_PaName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PaName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PaName->EditValue ?>"<?php echo $view_semenanalysis->PaName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_semenanalysis->PaMobile->Visible) { // PaMobile ?>
	<div id="xsc_PaMobile" class="ew-cell form-group">
		<label for="x_PaMobile" class="ew-search-caption ew-label"><?php echo $view_semenanalysis->PaMobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaMobile" id="z_PaMobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PaMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PaMobile->EditValue ?>"<?php echo $view_semenanalysis->PaMobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PartnerID->Visible) { // PartnerID ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_semenanalysis->PartnerID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PartnerID->EditValue ?>"<?php echo $view_semenanalysis->PartnerID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_semenanalysis->PartnerName->Visible) { // PartnerName ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_semenanalysis->PartnerName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PartnerName->EditValue ?>"<?php echo $view_semenanalysis->PartnerName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="xsc_PartnerMobile" class="ew-cell form-group">
		<label for="x_PartnerMobile" class="ew-search-caption ew-label"><?php echo $view_semenanalysis->PartnerMobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PartnerMobile->EditValue ?>"<?php echo $view_semenanalysis->PartnerMobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_semenanalysis->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<div id="xsc_PREG_TEST_DATE" class="ew-cell form-group">
		<label for="x_PREG_TEST_DATE" class="ew-search-caption ew-label"><?php echo $view_semenanalysis->PREG_TEST_DATE->caption() ?></label>
		<span class="ew-search-operator"><select name="z_PREG_TEST_DATE" id="z_PREG_TEST_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_semenanalysis->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PREG_TEST_DATE->EditValue ?>"<?php echo $view_semenanalysis->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_semenanalysis->PREG_TEST_DATE->ReadOnly && !$view_semenanalysis->PREG_TEST_DATE->Disabled && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_semenanalysislistsrch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_PREG_TEST_DATE style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_PREG_TEST_DATE style="d-none"">
<input type="text" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_semenanalysis->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PREG_TEST_DATE->EditValue2 ?>"<?php echo $view_semenanalysis->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_semenanalysis->PREG_TEST_DATE->ReadOnly && !$view_semenanalysis->PREG_TEST_DATE->Disabled && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_semenanalysislistsrch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_semenanalysis_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_semenanalysis_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_semenanalysis_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_semenanalysis_list->showPageHeader(); ?>
<?php
$view_semenanalysis_list->showMessage();
?>
<?php if ($view_semenanalysis_list->TotalRecs > 0 || $view_semenanalysis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_semenanalysis_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_semenanalysis">
<?php if (!$view_semenanalysis->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_semenanalysis->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_semenanalysis_list->Pager)) $view_semenanalysis_list->Pager = new NumericPager($view_semenanalysis_list->StartRec, $view_semenanalysis_list->DisplayRecs, $view_semenanalysis_list->TotalRecs, $view_semenanalysis_list->RecRange, $view_semenanalysis_list->AutoHidePager) ?>
<?php if ($view_semenanalysis_list->Pager->RecordCount > 0 && $view_semenanalysis_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_semenanalysis_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_semenanalysis_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_semenanalysis_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_semenanalysis_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_semenanalysis_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_semenanalysis_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_semenanalysis_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_semenanalysis_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_semenanalysis_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_semenanalysis_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_semenanalysis_list->TotalRecs > 0 && (!$view_semenanalysis_list->AutoHidePageSizeSelector || $view_semenanalysis_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_semenanalysis">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_semenanalysis_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_semenanalysis_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_semenanalysis_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_semenanalysis_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_semenanalysis_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_semenanalysis_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_semenanalysis->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_semenanalysis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_semenanalysislist" id="fview_semenanalysislist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_semenanalysis_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_semenanalysis_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<div id="gmp_view_semenanalysis" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_semenanalysis_list->TotalRecs > 0 || $view_semenanalysis->isGridEdit()) { ?>
<table id="tbl_view_semenanalysislist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_semenanalysis_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_semenanalysis_list->renderListOptions();

// Render list options (header, left)
$view_semenanalysis_list->ListOptions->render("header", "left");
?>
<?php if ($view_semenanalysis->id->Visible) { // id ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_semenanalysis->id->headerCellClass() ?>"><div id="elh_view_semenanalysis_id" class="view_semenanalysis_id"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_semenanalysis->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->id) ?>',1);"><div id="elh_view_semenanalysis_id" class="view_semenanalysis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->PaID->Visible) { // PaID ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->PaID) == "") { ?>
		<th data-name="PaID" class="<?php echo $view_semenanalysis->PaID->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->PaID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaID" class="<?php echo $view_semenanalysis->PaID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->PaID) ?>',1);"><div id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->PaID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->PaID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->PaID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->PaName->Visible) { // PaName ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->PaName) == "") { ?>
		<th data-name="PaName" class="<?php echo $view_semenanalysis->PaName->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->PaName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaName" class="<?php echo $view_semenanalysis->PaName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->PaName) ?>',1);"><div id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->PaName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->PaName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->PaName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->PaMobile->Visible) { // PaMobile ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->PaMobile) == "") { ?>
		<th data-name="PaMobile" class="<?php echo $view_semenanalysis->PaMobile->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->PaMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaMobile" class="<?php echo $view_semenanalysis->PaMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->PaMobile) ?>',1);"><div id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->PaMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->PaMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->PaMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_semenanalysis->PartnerID->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_semenanalysis->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->PartnerID) ?>',1);"><div id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_semenanalysis->PartnerName->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_semenanalysis->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->PartnerName) ?>',1);"><div id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_semenanalysis->PartnerMobile->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_semenanalysis->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->PartnerMobile) ?>',1);"><div id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->PartnerMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->PartnerMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->RequestDr->Visible) { // RequestDr ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $view_semenanalysis->RequestDr->headerCellClass() ?>"><div id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $view_semenanalysis->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->RequestDr) ?>',1);"><div id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->RequestDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->RequestDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $view_semenanalysis->CollectionDate->headerCellClass() ?>"><div id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $view_semenanalysis->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->CollectionDate) ?>',1);"><div id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->CollectionDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->CollectionDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_semenanalysis->ResultDate->headerCellClass() ?>"><div id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_semenanalysis->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->ResultDate) ?>',1);"><div id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->RequestSample->Visible) { // RequestSample ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $view_semenanalysis->RequestSample->headerCellClass() ?>"><div id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $view_semenanalysis->RequestSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->RequestSample) ?>',1);"><div id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->RequestSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->RequestSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->TidNo->Visible) { // TidNo ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_semenanalysis->TidNo->headerCellClass() ?>"><div id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_semenanalysis->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->TidNo) ?>',1);"><div id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($view_semenanalysis->sortUrl($view_semenanalysis->PREG_TEST_DATE) == "") { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $view_semenanalysis->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE"><div class="ew-table-header-caption"><?php echo $view_semenanalysis->PREG_TEST_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $view_semenanalysis->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_semenanalysis->SortUrl($view_semenanalysis->PREG_TEST_DATE) ?>',1);"><div id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis->PREG_TEST_DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_semenanalysis->PREG_TEST_DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_semenanalysis_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_semenanalysis->ExportAll && $view_semenanalysis->isExport()) {
	$view_semenanalysis_list->StopRec = $view_semenanalysis_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_semenanalysis_list->TotalRecs > $view_semenanalysis_list->StartRec + $view_semenanalysis_list->DisplayRecs - 1)
		$view_semenanalysis_list->StopRec = $view_semenanalysis_list->StartRec + $view_semenanalysis_list->DisplayRecs - 1;
	else
		$view_semenanalysis_list->StopRec = $view_semenanalysis_list->TotalRecs;
}
$view_semenanalysis_list->RecCnt = $view_semenanalysis_list->StartRec - 1;
if ($view_semenanalysis_list->Recordset && !$view_semenanalysis_list->Recordset->EOF) {
	$view_semenanalysis_list->Recordset->moveFirst();
	$selectLimit = $view_semenanalysis_list->UseSelectLimit;
	if (!$selectLimit && $view_semenanalysis_list->StartRec > 1)
		$view_semenanalysis_list->Recordset->move($view_semenanalysis_list->StartRec - 1);
} elseif (!$view_semenanalysis->AllowAddDeleteRow && $view_semenanalysis_list->StopRec == 0) {
	$view_semenanalysis_list->StopRec = $view_semenanalysis->GridAddRowCount;
}

// Initialize aggregate
$view_semenanalysis->RowType = ROWTYPE_AGGREGATEINIT;
$view_semenanalysis->resetAttributes();
$view_semenanalysis_list->renderRow();
while ($view_semenanalysis_list->RecCnt < $view_semenanalysis_list->StopRec) {
	$view_semenanalysis_list->RecCnt++;
	if ($view_semenanalysis_list->RecCnt >= $view_semenanalysis_list->StartRec) {
		$view_semenanalysis_list->RowCnt++;

		// Set up key count
		$view_semenanalysis_list->KeyCount = $view_semenanalysis_list->RowIndex;

		// Init row class and style
		$view_semenanalysis->resetAttributes();
		$view_semenanalysis->CssClass = "";
		if ($view_semenanalysis->isGridAdd()) {
		} else {
			$view_semenanalysis_list->loadRowValues($view_semenanalysis_list->Recordset); // Load row values
		}
		$view_semenanalysis->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_semenanalysis->RowAttrs = array_merge($view_semenanalysis->RowAttrs, array('data-rowindex'=>$view_semenanalysis_list->RowCnt, 'id'=>'r' . $view_semenanalysis_list->RowCnt . '_view_semenanalysis', 'data-rowtype'=>$view_semenanalysis->RowType));

		// Render row
		$view_semenanalysis_list->renderRow();

		// Render list options
		$view_semenanalysis_list->renderListOptions();
?>
	<tr<?php echo $view_semenanalysis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_semenanalysis_list->ListOptions->render("body", "left", $view_semenanalysis_list->RowCnt);
?>
	<?php if ($view_semenanalysis->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_semenanalysis->id->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_id" class="view_semenanalysis_id">
<span<?php echo $view_semenanalysis->id->viewAttributes() ?>>
<?php echo $view_semenanalysis->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->PaID->Visible) { // PaID ?>
		<td data-name="PaID"<?php echo $view_semenanalysis->PaID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_PaID" class="view_semenanalysis_PaID">
<span<?php echo $view_semenanalysis->PaID->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->PaName->Visible) { // PaName ?>
		<td data-name="PaName"<?php echo $view_semenanalysis->PaName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_PaName" class="view_semenanalysis_PaName">
<span<?php echo $view_semenanalysis->PaName->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile"<?php echo $view_semenanalysis->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile">
<span<?php echo $view_semenanalysis->PaMobile->viewAttributes() ?>>
<?php echo $view_semenanalysis->PaMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_semenanalysis->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID">
<span<?php echo $view_semenanalysis->PartnerID->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_semenanalysis->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName">
<span<?php echo $view_semenanalysis->PartnerName->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile"<?php echo $view_semenanalysis->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile">
<span<?php echo $view_semenanalysis->PartnerMobile->viewAttributes() ?>>
<?php echo $view_semenanalysis->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr"<?php echo $view_semenanalysis->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr">
<span<?php echo $view_semenanalysis->RequestDr->viewAttributes() ?>>
<?php echo $view_semenanalysis->RequestDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate"<?php echo $view_semenanalysis->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate">
<span<?php echo $view_semenanalysis->CollectionDate->viewAttributes() ?>>
<?php echo $view_semenanalysis->CollectionDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_semenanalysis->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate">
<span<?php echo $view_semenanalysis->ResultDate->viewAttributes() ?>>
<?php echo $view_semenanalysis->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample"<?php echo $view_semenanalysis->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample">
<span<?php echo $view_semenanalysis->RequestSample->viewAttributes() ?>>
<?php echo $view_semenanalysis->RequestSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_semenanalysis->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo">
<span<?php echo $view_semenanalysis->TidNo->viewAttributes() ?>>
<?php echo $view_semenanalysis->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE"<?php echo $view_semenanalysis->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCnt ?>_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE">
<span<?php echo $view_semenanalysis->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $view_semenanalysis->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_semenanalysis_list->ListOptions->render("body", "right", $view_semenanalysis_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_semenanalysis->isGridAdd())
		$view_semenanalysis_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_semenanalysis->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_semenanalysis_list->Recordset)
	$view_semenanalysis_list->Recordset->Close();
?>
<?php if (!$view_semenanalysis->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_semenanalysis->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_semenanalysis_list->Pager)) $view_semenanalysis_list->Pager = new NumericPager($view_semenanalysis_list->StartRec, $view_semenanalysis_list->DisplayRecs, $view_semenanalysis_list->TotalRecs, $view_semenanalysis_list->RecRange, $view_semenanalysis_list->AutoHidePager) ?>
<?php if ($view_semenanalysis_list->Pager->RecordCount > 0 && $view_semenanalysis_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_semenanalysis_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_semenanalysis_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_semenanalysis_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_semenanalysis_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_semenanalysis_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_semenanalysis_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_semenanalysis_list->pageUrl() ?>start=<?php echo $view_semenanalysis_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_semenanalysis_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_semenanalysis_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_semenanalysis_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_semenanalysis_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_semenanalysis_list->TotalRecs > 0 && (!$view_semenanalysis_list->AutoHidePageSizeSelector || $view_semenanalysis_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_semenanalysis">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_semenanalysis_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_semenanalysis_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_semenanalysis_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_semenanalysis_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_semenanalysis_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_semenanalysis_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_semenanalysis->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_semenanalysis_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_semenanalysis_list->TotalRecs == 0 && !$view_semenanalysis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_semenanalysis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_semenanalysis_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_semenanalysis->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_semenanalysis->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_semenanalysis", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_semenanalysis_list->terminate();
?>