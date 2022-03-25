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
$view_bill_collection_report_list = new view_bill_collection_report_list();

// Run the page
$view_bill_collection_report_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_bill_collection_report_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_bill_collection_report->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_bill_collection_reportlist = currentForm = new ew.Form("fview_bill_collection_reportlist", "list");
fview_bill_collection_reportlist.formKeyCountName = '<?php echo $view_bill_collection_report_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_bill_collection_reportlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_bill_collection_reportlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_bill_collection_reportlistsrch = currentSearchForm = new ew.Form("fview_bill_collection_reportlistsrch");

// Validate function for search
fview_bill_collection_reportlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_bill_collection_report->createddate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_bill_collection_reportlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_bill_collection_reportlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_bill_collection_reportlistsrch.filterList = <?php echo $view_bill_collection_report_list->getFilterList() ?>;
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
<?php if (!$view_bill_collection_report->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_bill_collection_report_list->TotalRecs > 0 && $view_bill_collection_report_list->ExportOptions->visible()) { ?>
<?php $view_bill_collection_report_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_report_list->ImportOptions->visible()) { ?>
<?php $view_bill_collection_report_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_report_list->SearchOptions->visible()) { ?>
<?php $view_bill_collection_report_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_report_list->FilterOptions->visible()) { ?>
<?php $view_bill_collection_report_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_bill_collection_report_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_bill_collection_report->isExport() && !$view_bill_collection_report->CurrentAction) { ?>
<form name="fview_bill_collection_reportlistsrch" id="fview_bill_collection_reportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_bill_collection_report_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_bill_collection_reportlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_bill_collection_report">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_bill_collection_report_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_bill_collection_report->RowType = ROWTYPE_SEARCH;

// Render row
$view_bill_collection_report->resetAttributes();
$view_bill_collection_report_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_bill_collection_report->createddate->Visible) { // createddate ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_bill_collection_report->createddate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddate" id="z_createddate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_bill_collection_report->createddate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_bill_collection_report" data-field="x_createddate" data-format="7" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_bill_collection_report->createddate->getPlaceHolder()) ?>" value="<?php echo $view_bill_collection_report->createddate->EditValue ?>"<?php echo $view_bill_collection_report->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_report->createddate->ReadOnly && !$view_bill_collection_report->createddate->Disabled && !isset($view_bill_collection_report->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_report->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_bill_collection_reportlistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddate style="d-none"">
<input type="text" data-table="view_bill_collection_report" data-field="x_createddate" data-format="7" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_bill_collection_report->createddate->getPlaceHolder()) ?>" value="<?php echo $view_bill_collection_report->createddate->EditValue2 ?>"<?php echo $view_bill_collection_report->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_report->createddate->ReadOnly && !$view_bill_collection_report->createddate->Disabled && !isset($view_bill_collection_report->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_report->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_bill_collection_reportlistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_bill_collection_report_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_bill_collection_report_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_bill_collection_report_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_bill_collection_report_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_report_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_report_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_report_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_bill_collection_report_list->showPageHeader(); ?>
<?php
$view_bill_collection_report_list->showMessage();
?>
<?php if ($view_bill_collection_report_list->TotalRecs > 0 || $view_bill_collection_report->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_bill_collection_report_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_bill_collection_report">
<?php if (!$view_bill_collection_report->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_bill_collection_report->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_bill_collection_report_list->Pager)) $view_bill_collection_report_list->Pager = new NumericPager($view_bill_collection_report_list->StartRec, $view_bill_collection_report_list->DisplayRecs, $view_bill_collection_report_list->TotalRecs, $view_bill_collection_report_list->RecRange, $view_bill_collection_report_list->AutoHidePager) ?>
<?php if ($view_bill_collection_report_list->Pager->RecordCount > 0 && $view_bill_collection_report_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_bill_collection_report_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_report_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_bill_collection_report_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_bill_collection_report_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_report_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_report_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_bill_collection_report_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_bill_collection_report_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_bill_collection_report_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_bill_collection_report_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_bill_collection_report_list->TotalRecs > 0 && (!$view_bill_collection_report_list->AutoHidePageSizeSelector || $view_bill_collection_report_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_bill_collection_report">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="40000"<?php if ($view_bill_collection_report_list->DisplayRecs == 40000) { ?> selected<?php } ?>>40000</option>
<option value="ALL"<?php if ($view_bill_collection_report->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_report_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_bill_collection_reportlist" id="fview_bill_collection_reportlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_bill_collection_report_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_bill_collection_report_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_bill_collection_report">
<div id="gmp_view_bill_collection_report" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_bill_collection_report_list->TotalRecs > 0 || $view_bill_collection_report->isGridEdit()) { ?>
<table id="tbl_view_bill_collection_reportlist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_bill_collection_report_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_bill_collection_report_list->renderListOptions();

// Render list options (header, left)
$view_bill_collection_report_list->ListOptions->render("header", "left", "", "block", $view_bill_collection_report->TableVar, "view_bill_collection_reportlist");
?>
<?php if ($view_bill_collection_report->createddate->Visible) { // createddate ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_bill_collection_report->createddate->headerCellClass() ?>"><div id="elh_view_bill_collection_report_createddate" class="view_bill_collection_report_createddate"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_createddate" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->createddate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_bill_collection_report->createddate->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_createddate" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->createddate) ?>',1);"><div id="elh_view_bill_collection_report_createddate" class="view_bill_collection_report_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->createddate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->createddate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->UserName->Visible) { // UserName ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_bill_collection_report->UserName->headerCellClass() ?>"><div id="elh_view_bill_collection_report_UserName" class="view_bill_collection_report_UserName"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_UserName" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->UserName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_bill_collection_report->UserName->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_UserName" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->UserName) ?>',1);"><div id="elh_view_bill_collection_report_UserName" class="view_bill_collection_report_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->CARD->Visible) { // CARD ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->CARD) == "") { ?>
		<th data-name="CARD" class="<?php echo $view_bill_collection_report->CARD->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CARD" class="view_bill_collection_report_CARD"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_CARD" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->CARD->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CARD" class="<?php echo $view_bill_collection_report->CARD->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_CARD" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->CARD) ?>',1);"><div id="elh_view_bill_collection_report_CARD" class="view_bill_collection_report_CARD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->CARD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->CARD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->CARD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->CASH->Visible) { // CASH ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->CASH) == "") { ?>
		<th data-name="CASH" class="<?php echo $view_bill_collection_report->CASH->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CASH" class="view_bill_collection_report_CASH"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_CASH" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->CASH->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CASH" class="<?php echo $view_bill_collection_report->CASH->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_CASH" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->CASH) ?>',1);"><div id="elh_view_bill_collection_report_CASH" class="view_bill_collection_report_CASH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->CASH->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->CASH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->CASH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->NEFT->Visible) { // NEFT ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->NEFT) == "") { ?>
		<th data-name="NEFT" class="<?php echo $view_bill_collection_report->NEFT->headerCellClass() ?>"><div id="elh_view_bill_collection_report_NEFT" class="view_bill_collection_report_NEFT"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_NEFT" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->NEFT->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="NEFT" class="<?php echo $view_bill_collection_report->NEFT->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_NEFT" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->NEFT) ?>',1);"><div id="elh_view_bill_collection_report_NEFT" class="view_bill_collection_report_NEFT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->NEFT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->NEFT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->NEFT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->PAYTM->Visible) { // PAYTM ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $view_bill_collection_report->PAYTM->headerCellClass() ?>"><div id="elh_view_bill_collection_report_PAYTM" class="view_bill_collection_report_PAYTM"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_PAYTM" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->PAYTM->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $view_bill_collection_report->PAYTM->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_PAYTM" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->PAYTM) ?>',1);"><div id="elh_view_bill_collection_report_PAYTM" class="view_bill_collection_report_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->PAYTM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->PAYTM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->CHEQUE->Visible) { // CHEQUE ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->CHEQUE) == "") { ?>
		<th data-name="CHEQUE" class="<?php echo $view_bill_collection_report->CHEQUE->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CHEQUE" class="view_bill_collection_report_CHEQUE"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_CHEQUE" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->CHEQUE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CHEQUE" class="<?php echo $view_bill_collection_report->CHEQUE->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_CHEQUE" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->CHEQUE) ?>',1);"><div id="elh_view_bill_collection_report_CHEQUE" class="view_bill_collection_report_CHEQUE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->CHEQUE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->CHEQUE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->CHEQUE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->RTGS->Visible) { // RTGS ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $view_bill_collection_report->RTGS->headerCellClass() ?>"><div id="elh_view_bill_collection_report_RTGS" class="view_bill_collection_report_RTGS"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_RTGS" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->RTGS->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $view_bill_collection_report->RTGS->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_RTGS" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->RTGS) ?>',1);"><div id="elh_view_bill_collection_report_RTGS" class="view_bill_collection_report_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->RTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->RTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->NotSelected->Visible) { // NotSelected ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->NotSelected) == "") { ?>
		<th data-name="NotSelected" class="<?php echo $view_bill_collection_report->NotSelected->headerCellClass() ?>"><div id="elh_view_bill_collection_report_NotSelected" class="view_bill_collection_report_NotSelected"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_NotSelected" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->NotSelected->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="NotSelected" class="<?php echo $view_bill_collection_report->NotSelected->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_NotSelected" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->NotSelected) ?>',1);"><div id="elh_view_bill_collection_report_NotSelected" class="view_bill_collection_report_NotSelected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->NotSelected->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->NotSelected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->NotSelected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->REFUND->Visible) { // REFUND ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->REFUND) == "") { ?>
		<th data-name="REFUND" class="<?php echo $view_bill_collection_report->REFUND->headerCellClass() ?>"><div id="elh_view_bill_collection_report_REFUND" class="view_bill_collection_report_REFUND"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_REFUND" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->REFUND->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="REFUND" class="<?php echo $view_bill_collection_report->REFUND->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_REFUND" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->REFUND) ?>',1);"><div id="elh_view_bill_collection_report_REFUND" class="view_bill_collection_report_REFUND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->REFUND->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->REFUND->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->REFUND->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->CANCEL->Visible) { // CANCEL ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->CANCEL) == "") { ?>
		<th data-name="CANCEL" class="<?php echo $view_bill_collection_report->CANCEL->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CANCEL" class="view_bill_collection_report_CANCEL"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_CANCEL" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->CANCEL->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CANCEL" class="<?php echo $view_bill_collection_report->CANCEL->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_CANCEL" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->CANCEL) ?>',1);"><div id="elh_view_bill_collection_report_CANCEL" class="view_bill_collection_report_CANCEL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->CANCEL->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->CANCEL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->CANCEL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->Total->Visible) { // Total ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $view_bill_collection_report->Total->headerCellClass() ?>"><div id="elh_view_bill_collection_report_Total" class="view_bill_collection_report_Total"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_Total" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->Total->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $view_bill_collection_report->Total->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_Total" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->Total) ?>',1);"><div id="elh_view_bill_collection_report_Total" class="view_bill_collection_report_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->HospID->Visible) { // HospID ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_bill_collection_report->HospID->headerCellClass() ?>"><div id="elh_view_bill_collection_report_HospID" class="view_bill_collection_report_HospID"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_HospID" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_bill_collection_report->HospID->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_HospID" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->HospID) ?>',1);"><div id="elh_view_bill_collection_report_HospID" class="view_bill_collection_report_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->BillType->Visible) { // BillType ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_bill_collection_report->BillType->headerCellClass() ?>"><div id="elh_view_bill_collection_report_BillType" class="view_bill_collection_report_BillType"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_BillType" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->BillType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_bill_collection_report->BillType->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_BillType" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->BillType) ?>',1);"><div id="elh_view_bill_collection_report_BillType" class="view_bill_collection_report_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_report->AdjAdvance->Visible) { // AdjAdvance ?>
	<?php if ($view_bill_collection_report->sortUrl($view_bill_collection_report->AdjAdvance) == "") { ?>
		<th data-name="AdjAdvance" class="<?php echo $view_bill_collection_report->AdjAdvance->headerCellClass() ?>"><div id="elh_view_bill_collection_report_AdjAdvance" class="view_bill_collection_report_AdjAdvance"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_report_AdjAdvance" class="view_bill_collection_reportlist" type="text/html"><span><?php echo $view_bill_collection_report->AdjAdvance->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="AdjAdvance" class="<?php echo $view_bill_collection_report->AdjAdvance->headerCellClass() ?>"><script id="tpc_view_bill_collection_report_AdjAdvance" class="view_bill_collection_reportlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_report->SortUrl($view_bill_collection_report->AdjAdvance) ?>',1);"><div id="elh_view_bill_collection_report_AdjAdvance" class="view_bill_collection_report_AdjAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_report->AdjAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_report->AdjAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_report->AdjAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_bill_collection_report_list->ListOptions->render("header", "right", "", "block", $view_bill_collection_report->TableVar, "view_bill_collection_reportlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_bill_collection_report->ExportAll && $view_bill_collection_report->isExport()) {
	$view_bill_collection_report_list->StopRec = $view_bill_collection_report_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_bill_collection_report_list->TotalRecs > $view_bill_collection_report_list->StartRec + $view_bill_collection_report_list->DisplayRecs - 1)
		$view_bill_collection_report_list->StopRec = $view_bill_collection_report_list->StartRec + $view_bill_collection_report_list->DisplayRecs - 1;
	else
		$view_bill_collection_report_list->StopRec = $view_bill_collection_report_list->TotalRecs;
}
$view_bill_collection_report_list->RecCnt = $view_bill_collection_report_list->StartRec - 1;
if ($view_bill_collection_report_list->Recordset && !$view_bill_collection_report_list->Recordset->EOF) {
	$view_bill_collection_report_list->Recordset->moveFirst();
	$selectLimit = $view_bill_collection_report_list->UseSelectLimit;
	if (!$selectLimit && $view_bill_collection_report_list->StartRec > 1)
		$view_bill_collection_report_list->Recordset->move($view_bill_collection_report_list->StartRec - 1);
} elseif (!$view_bill_collection_report->AllowAddDeleteRow && $view_bill_collection_report_list->StopRec == 0) {
	$view_bill_collection_report_list->StopRec = $view_bill_collection_report->GridAddRowCount;
}

// Initialize aggregate
$view_bill_collection_report->RowType = ROWTYPE_AGGREGATEINIT;
$view_bill_collection_report->resetAttributes();
$view_bill_collection_report_list->renderRow();
while ($view_bill_collection_report_list->RecCnt < $view_bill_collection_report_list->StopRec) {
	$view_bill_collection_report_list->RecCnt++;
	if ($view_bill_collection_report_list->RecCnt >= $view_bill_collection_report_list->StartRec) {
		$view_bill_collection_report_list->RowCnt++;

		// Set up key count
		$view_bill_collection_report_list->KeyCount = $view_bill_collection_report_list->RowIndex;

		// Init row class and style
		$view_bill_collection_report->resetAttributes();
		$view_bill_collection_report->CssClass = "";
		if ($view_bill_collection_report->isGridAdd()) {
		} else {
			$view_bill_collection_report_list->loadRowValues($view_bill_collection_report_list->Recordset); // Load row values
		}
		$view_bill_collection_report->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_bill_collection_report->RowAttrs = array_merge($view_bill_collection_report->RowAttrs, array('data-rowindex'=>$view_bill_collection_report_list->RowCnt, 'id'=>'r' . $view_bill_collection_report_list->RowCnt . '_view_bill_collection_report', 'data-rowtype'=>$view_bill_collection_report->RowType));

		// Render row
		$view_bill_collection_report_list->renderRow();

		// Render list options
		$view_bill_collection_report_list->renderListOptions();

		// Save row and cell attributes
		$view_bill_collection_report_list->Attrs[$view_bill_collection_report_list->RowCnt] = array("row_attrs" => $view_bill_collection_report->rowAttributes(), "cell_attrs" => array());
		$view_bill_collection_report_list->Attrs[$view_bill_collection_report_list->RowCnt]["cell_attrs"] = $view_bill_collection_report->fieldCellAttributes();
?>
	<tr<?php echo $view_bill_collection_report->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_bill_collection_report_list->ListOptions->render("body", "left", $view_bill_collection_report_list->RowCnt, "block", $view_bill_collection_report->TableVar, "view_bill_collection_reportlist");
?>
	<?php if ($view_bill_collection_report->createddate->Visible) { // createddate ?>
		<td data-name="createddate"<?php echo $view_bill_collection_report->createddate->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_createddate" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_createddate" class="view_bill_collection_report_createddate">
<span<?php echo $view_bill_collection_report->createddate->viewAttributes() ?>>
<?php echo $view_bill_collection_report->createddate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_bill_collection_report->UserName->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_UserName" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_UserName" class="view_bill_collection_report_UserName">
<span<?php echo $view_bill_collection_report->UserName->viewAttributes() ?>>
<?php echo $view_bill_collection_report->UserName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CARD->Visible) { // CARD ?>
		<td data-name="CARD"<?php echo $view_bill_collection_report->CARD->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CARD" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CARD" class="view_bill_collection_report_CARD">
<span<?php echo $view_bill_collection_report->CARD->viewAttributes() ?>>
<?php echo $view_bill_collection_report->CARD->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CASH->Visible) { // CASH ?>
		<td data-name="CASH"<?php echo $view_bill_collection_report->CASH->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CASH" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CASH" class="view_bill_collection_report_CASH">
<span<?php echo $view_bill_collection_report->CASH->viewAttributes() ?>>
<?php echo $view_bill_collection_report->CASH->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->NEFT->Visible) { // NEFT ?>
		<td data-name="NEFT"<?php echo $view_bill_collection_report->NEFT->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_NEFT" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_NEFT" class="view_bill_collection_report_NEFT">
<span<?php echo $view_bill_collection_report->NEFT->viewAttributes() ?>>
<?php echo $view_bill_collection_report->NEFT->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM"<?php echo $view_bill_collection_report->PAYTM->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_PAYTM" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_PAYTM" class="view_bill_collection_report_PAYTM">
<span<?php echo $view_bill_collection_report->PAYTM->viewAttributes() ?>>
<?php echo $view_bill_collection_report->PAYTM->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CHEQUE->Visible) { // CHEQUE ?>
		<td data-name="CHEQUE"<?php echo $view_bill_collection_report->CHEQUE->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CHEQUE" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CHEQUE" class="view_bill_collection_report_CHEQUE">
<span<?php echo $view_bill_collection_report->CHEQUE->viewAttributes() ?>>
<?php echo $view_bill_collection_report->CHEQUE->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS"<?php echo $view_bill_collection_report->RTGS->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_RTGS" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_RTGS" class="view_bill_collection_report_RTGS">
<span<?php echo $view_bill_collection_report->RTGS->viewAttributes() ?>>
<?php echo $view_bill_collection_report->RTGS->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->NotSelected->Visible) { // NotSelected ?>
		<td data-name="NotSelected"<?php echo $view_bill_collection_report->NotSelected->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_NotSelected" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_NotSelected" class="view_bill_collection_report_NotSelected">
<span<?php echo $view_bill_collection_report->NotSelected->viewAttributes() ?>>
<?php echo $view_bill_collection_report->NotSelected->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->REFUND->Visible) { // REFUND ?>
		<td data-name="REFUND"<?php echo $view_bill_collection_report->REFUND->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_REFUND" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_REFUND" class="view_bill_collection_report_REFUND">
<span<?php echo $view_bill_collection_report->REFUND->viewAttributes() ?>>
<?php echo $view_bill_collection_report->REFUND->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CANCEL->Visible) { // CANCEL ?>
		<td data-name="CANCEL"<?php echo $view_bill_collection_report->CANCEL->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CANCEL" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_CANCEL" class="view_bill_collection_report_CANCEL">
<span<?php echo $view_bill_collection_report->CANCEL->viewAttributes() ?>>
<?php echo $view_bill_collection_report->CANCEL->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $view_bill_collection_report->Total->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_Total" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_Total" class="view_bill_collection_report_Total">
<span<?php echo $view_bill_collection_report->Total->viewAttributes() ?>>
<?php echo $view_bill_collection_report->Total->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_bill_collection_report->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_HospID" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_HospID" class="view_bill_collection_report_HospID">
<span<?php echo $view_bill_collection_report->HospID->viewAttributes() ?>>
<?php echo $view_bill_collection_report->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_bill_collection_report->BillType->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_BillType" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_BillType" class="view_bill_collection_report_BillType">
<span<?php echo $view_bill_collection_report->BillType->viewAttributes() ?>>
<?php echo $view_bill_collection_report->BillType->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_report->AdjAdvance->Visible) { // AdjAdvance ?>
		<td data-name="AdjAdvance"<?php echo $view_bill_collection_report->AdjAdvance->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_AdjAdvance" class="view_bill_collection_reportlist" type="text/html">
<span id="el<?php echo $view_bill_collection_report_list->RowCnt ?>_view_bill_collection_report_AdjAdvance" class="view_bill_collection_report_AdjAdvance">
<span<?php echo $view_bill_collection_report->AdjAdvance->viewAttributes() ?>>
<?php echo $view_bill_collection_report->AdjAdvance->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_bill_collection_report_list->ListOptions->render("body", "right", $view_bill_collection_report_list->RowCnt, "block", $view_bill_collection_report->TableVar, "view_bill_collection_reportlist");
?>
	</tr>
<?php
	}
	if (!$view_bill_collection_report->isGridAdd())
		$view_bill_collection_report_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_bill_collection_report->RowType = ROWTYPE_AGGREGATE;
$view_bill_collection_report->resetAttributes();
$view_bill_collection_report_list->renderRow();
?>
<?php if ($view_bill_collection_report_list->TotalRecs > 0 && !$view_bill_collection_report->isGridAdd() && !$view_bill_collection_report->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_bill_collection_report_list->renderListOptions();

// Render list options (footer, left)
$view_bill_collection_report_list->ListOptions->render("footer", "left", "", "block", $view_bill_collection_report->TableVar, "view_bill_collection_reportlist");
?>
	<?php if ($view_bill_collection_report->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_bill_collection_report->createddate->footerCellClass() ?>"><span id="elf_view_bill_collection_report_createddate" class="view_bill_collection_report_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_bill_collection_report->UserName->footerCellClass() ?>"><span id="elf_view_bill_collection_report_UserName" class="view_bill_collection_report_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CARD->Visible) { // CARD ?>
		<td data-name="CARD" class="<?php echo $view_bill_collection_report->CARD->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CARD" class="view_bill_collection_report_CARD">
		<script id="tpg_view_bill_collection_report_CARD" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->CARD->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->CARD->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CASH->Visible) { // CASH ?>
		<td data-name="CASH" class="<?php echo $view_bill_collection_report->CASH->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CASH" class="view_bill_collection_report_CASH">
		<script id="tpg_view_bill_collection_report_CASH" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->CASH->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->CASH->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->NEFT->Visible) { // NEFT ?>
		<td data-name="NEFT" class="<?php echo $view_bill_collection_report->NEFT->footerCellClass() ?>"><span id="elf_view_bill_collection_report_NEFT" class="view_bill_collection_report_NEFT">
		<script id="tpg_view_bill_collection_report_NEFT" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->NEFT->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->NEFT->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" class="<?php echo $view_bill_collection_report->PAYTM->footerCellClass() ?>"><span id="elf_view_bill_collection_report_PAYTM" class="view_bill_collection_report_PAYTM">
		<script id="tpg_view_bill_collection_report_PAYTM" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->PAYTM->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->PAYTM->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CHEQUE->Visible) { // CHEQUE ?>
		<td data-name="CHEQUE" class="<?php echo $view_bill_collection_report->CHEQUE->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CHEQUE" class="view_bill_collection_report_CHEQUE">
		<script id="tpg_view_bill_collection_report_CHEQUE" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->CHEQUE->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->CHEQUE->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" class="<?php echo $view_bill_collection_report->RTGS->footerCellClass() ?>"><span id="elf_view_bill_collection_report_RTGS" class="view_bill_collection_report_RTGS">
		<script id="tpg_view_bill_collection_report_RTGS" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->RTGS->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->RTGS->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->NotSelected->Visible) { // NotSelected ?>
		<td data-name="NotSelected" class="<?php echo $view_bill_collection_report->NotSelected->footerCellClass() ?>"><span id="elf_view_bill_collection_report_NotSelected" class="view_bill_collection_report_NotSelected">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->REFUND->Visible) { // REFUND ?>
		<td data-name="REFUND" class="<?php echo $view_bill_collection_report->REFUND->footerCellClass() ?>"><span id="elf_view_bill_collection_report_REFUND" class="view_bill_collection_report_REFUND">
		<script id="tpg_view_bill_collection_report_REFUND" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->REFUND->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->REFUND->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->CANCEL->Visible) { // CANCEL ?>
		<td data-name="CANCEL" class="<?php echo $view_bill_collection_report->CANCEL->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CANCEL" class="view_bill_collection_report_CANCEL">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->Total->Visible) { // Total ?>
		<td data-name="Total" class="<?php echo $view_bill_collection_report->Total->footerCellClass() ?>"><span id="elf_view_bill_collection_report_Total" class="view_bill_collection_report_Total">
		<script id="tpg_view_bill_collection_report_Total" class="view_bill_collection_reportlist" type="text/html"><span<?php echo $view_bill_collection_report->Total->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_report->Total->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_bill_collection_report->HospID->footerCellClass() ?>"><span id="elf_view_bill_collection_report_HospID" class="view_bill_collection_report_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_bill_collection_report->BillType->footerCellClass() ?>"><span id="elf_view_bill_collection_report_BillType" class="view_bill_collection_report_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_report->AdjAdvance->Visible) { // AdjAdvance ?>
		<td data-name="AdjAdvance" class="<?php echo $view_bill_collection_report->AdjAdvance->footerCellClass() ?>"><span id="elf_view_bill_collection_report_AdjAdvance" class="view_bill_collection_report_AdjAdvance">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_bill_collection_report_list->ListOptions->render("footer", "right", "", "block", $view_bill_collection_report->TableVar, "view_bill_collection_reportlist");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_bill_collection_report->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_bill_collection_reportlist" class="ew-custom-template"></div>
<script id="tpm_view_bill_collection_reportlist" type="text/html">
<div id="ct_view_bill_collection_report_list"><?php if ($view_bill_collection_report_list->RowCnt > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $view_bill_collection_report_list->StartRowCnt; $i <= $view_bill_collection_report_list->RowCnt; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($view_bill_collection_report_list->TotalRecs > 0 && !$view_bill_collection_report->isGridAdd() && !$view_bill_collection_report->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_bill_collection_report->createddate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{

	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}	
	(int)$SumAmount = 0;
(int)$SumCARD =  0;
(int)$SumCASH =  0;
(int)$SumNEFT =  0;
(int)$SumPAYTM =  0;
(int)$SumCHEQUE =  0;
(int)$SumRTGS =  0;
(int)$SumNotSelected =  0;
(int)$SumREFUND =  0;
(int)$SumCANCEL =  0;
(int)$SumTotal =  0;
(int)$SumAdj =  0;
	$sql = "SELECT  `UserName`, sum(`CARD`) as CARD, sum( `CASH`) as CASH, sum( `NEFT`) as NEFT,
	sum( `PAYTM`) as PAYTM,sum( `AdjAdvance`) as AdjAdvance,
 sum(  `CHEQUE`) as CHEQUE, sum(  `RTGS`) as RTGS, sum( `NotSelected`) as NotSelected,
 sum( `REFUND`) as REFUND, sum( `CANCEL`) as CANCEL, sum( `Total`)  as Total
	 FROM ganeshkumar_bjhims.view_bill_collection_report
	where HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' and  BillType in ('Bill', 'Pharmacy')  
   group by UserName";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>UserName</b></td>
<td><b align="right">CARD</b></td>
<td><b align="right">CASH</b></td>
<td><b align="right">NEFT</b></td>
<td><b align="right">PAYTM</b></td>
<td><b align="right">CHEQUE</b></td>
<td><b align="right">RTGS</b></td>
<td><b align="right">AdjAdvance</b></td>
<td><b align="right">NotSelected</b></td>
<td><b align="right">REFUND</b></td>
<td><b align="right">CANCEL</b></td>
<td><b align="right">Total</b></td>
</tr>';
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["UserName"];				
$CARD =  $results2[$x]["CARD"];
$CASH =  $results2[$x]["CASH"];
$NEFT =  $results2[$x]["NEFT"];
$PAYTM =  $results2[$x]["PAYTM"];
$CHEQUE =  $results2[$x]["CHEQUE"];
$RTGS =  $results2[$x]["RTGS"];
$AdjAdvance =  $results2[$x]["AdjAdvance"];
$NotSelected =  $results2[$x]["NotSelected"];
$REFUND =  $results2[$x]["REFUND"];
$CANCEL =  $results2[$x]["CANCEL"];
$Total =  $results2[$x]["Total"];
				$hhh .= '<tr><td>'.$UserName.'</td><td align="right">'.$CARD.'</td><td align="right">'.$CASH.'</td>
				<td align="right">'.$NEFT.'</td><td align="right">'.$PAYTM.'</td><td align="right">'.$CHEQUE.'</td>
				<td align="right">'.$RTGS.'</td><td align="right">'.$AdjAdvance.'</td><td align="right">'.$NotSelected.'</td><td align="right">'.$REFUND.'</td>
				<td align="right">'.$CANCEL.'</td><td align="right">'.$Total.'</td>				
				</tr>  ';
(int)$SumAmount = (int)$SumAmount + (int)$Amount;
(int)$SumCARD =  (int)$SumCARD + (int)$CARD;
(int)$SumCASH =  (int)$SumCASH + (int)$CASH;
(int)$SumNEFT =  (int)$SumNEFT + (int)$NEFT;
(int)$SumPAYTM =  (int)$SumPAYTM + (int)$PAYTM;
(int)$SumCHEQUE =  (int)$SumCHEQUE + (int)$CHEQUE;
(int)$SumAdj =  (int)$SumAdj + (int)$AdjAdvance;
(int)$SumRTGS =  (int)$SumRTGS + (int)$RTGS;
(int)$SumNotSelected =  (int)$SumNotSelected + (int)$NotSelected;
(int)$SumREFUND =  (int)$SumREFUND + (int)$REFUND;
(int)$SumCANCEL =  (int)$SumCANCEL + (int)$CANCEL;
(int)$SumTotal =  (int)$SumTotal + (int)$Total;
}
$hhh .= '<tr><td align="right">Total</td><td align="right">'.number_format ($SumCARD,2).'</td><td align="right">'.number_format ($SumCASH,2).'</td>
<td align="right">'.number_format ($SumNEFT,2).'</td><td align="right">'.number_format ($SumPAYTM,2).'</td>
<td align="right">'.number_format ($SumCHEQUE,2).'</td><td align="right">'.number_format ($SumRTGS,2).'</td><td align="right">'.number_format ($SumAdj,2).'</td>
<td align="right">'.number_format ($SumNotSelected,2).'</td><td align="right">'.number_format ($SumREFUND,2).'</td>
<td align="right">'.number_format ($SumCANCEL,2).'</td><td align="right">'.number_format ($SumTotal,2).'</td>
</tr></table>  ';
echo $hhh;
?>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_bill_collection_report->createddate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
$dataPoints = array();
	if($todate == "--")
	{

	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}	
	(int)$SumAmount = 0;
	(int)$rowid = 0;
	$sql = "SELECT  BillType as ProcedureName , sum(ProcedureAmount) as Amount ,count(ProcedureName) as Count FROM ganeshkumar_bjhims.view_dash_billing_voucher
	where HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' and CancelBill not like '%Cancel%'    group by BillType";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td style="width:10px;" ></td>
<td><b>Service</b></td>
<td><b>Count</b></td>
<td><b align="right">Amount</b></td>
</tr>';
for ($x = 0; $x < $VCount; $x++) {
				$DEPARTMENT =  $results2[$x]["ProcedureName"];
				$Count =  $results2[$x]["Count"];				
				$Amount =  $results2[$x]["Amount"];
			if($Amount != '')
			{
				$hhh .= '<tr id="row'.$rowid.'"><td><i  onclick="selectedItemA(this, '.$rowid.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td><td>'.$DEPARTMENT.'</td><td>'.$Count.'</td><td align="right">'.$Amount.'</td></tr>  ';
				(int)$SumAmount = (int)$SumAmount + (int)$Amount;
				(int)$rowid = (int)$rowid + 1;
								$product_itemA=array(
								"label"=> $DEPARTMENT ,
								 "y"=> $Count
								 );
								 array_push($dataPoints , $product_itemA);
			}
}
$sql = "select 'Pharmachy' as Services , sum(Amount) as Amount, '1' as Count
from 
view_pharmacy_billing_voucher
where HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' " ;
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
for ($x = 0; $x < $VCount; $x++) {
				$DEPARTMENT =  $results2[$x]["Services"];
				$Count =  $results2[$x]["Count"];				
				$Amount =  $results2[$x]["Amount"];
			if($Amount != '')
			{
				$hhh .= '<tr id="rowBB'.$rowid.'"><td><i  onclick="selectedItemB(this, '.$rowid.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td><td >'.$DEPARTMENT.'</td><td>'.$Count.'</td><td align="right">'.$Amount.'</td></tr>  ';
				(int)$SumAmount = (int)$SumAmount + (int)$Amount;
				(int)$rowid = (int)$rowid + 1;
				$product_item=array(
"label"=> $DEPARTMENT ,
 "y"=> $Count
);
array_push($dataPoints , $product_item);
			}
}
$hhh .= '<tr><td></td><td></td><td align="right">Total</td><td align="right">'.number_format ($SumAmount,2).'</td></tr></table>  ';
echo $hhh;
?>
	</div>
</div>
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_bill_collection_report_list->Recordset)
	$view_bill_collection_report_list->Recordset->Close();
?>
<?php if (!$view_bill_collection_report->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_bill_collection_report->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_bill_collection_report_list->Pager)) $view_bill_collection_report_list->Pager = new NumericPager($view_bill_collection_report_list->StartRec, $view_bill_collection_report_list->DisplayRecs, $view_bill_collection_report_list->TotalRecs, $view_bill_collection_report_list->RecRange, $view_bill_collection_report_list->AutoHidePager) ?>
<?php if ($view_bill_collection_report_list->Pager->RecordCount > 0 && $view_bill_collection_report_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_bill_collection_report_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_report_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_bill_collection_report_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_bill_collection_report_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_report_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_report_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_report_list->pageUrl() ?>start=<?php echo $view_bill_collection_report_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_bill_collection_report_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_bill_collection_report_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_bill_collection_report_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_bill_collection_report_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_bill_collection_report_list->TotalRecs > 0 && (!$view_bill_collection_report_list->AutoHidePageSizeSelector || $view_bill_collection_report_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_bill_collection_report">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="40000"<?php if ($view_bill_collection_report_list->DisplayRecs == 40000) { ?> selected<?php } ?>>40000</option>
<option value="ALL"<?php if ($view_bill_collection_report->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_report_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_bill_collection_report_list->TotalRecs == 0 && !$view_bill_collection_report->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_report_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_bill_collection_report->Rows) ?> };
ew.applyTemplate("tpd_view_bill_collection_reportlist", "tpm_view_bill_collection_reportlist", "view_bill_collection_reportlist", "<?php echo $view_bill_collection_report->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_bill_collection_reportlist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_bill_collection_reportlist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_bill_collection_reportlist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_bill_collection_report_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_bill_collection_report->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
function selectedItem(item, rowID)
{

 //alert(item.id);
 // $fromdte = date("Y-m-d");
//	   $todate 

	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNo",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
					$("#ServicTableRow").empty();
		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
				var	createddate =  obj.createddate;											
			var	PatientId =  obj.PatientId;
			var	PatientName =  obj.PatientName;				
			var	Mobile =  obj.Mobile;
			var	amount =  obj.amount;
			var	Vid =  obj.Vid;
			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td> <td>' + createddate + '</td> <td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#rowAA' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}

function selectedItemA(item, rowID)
{

 //alert(item.id);
 // $fromdte = date("Y-m-d");
//	   $todate 

	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoA",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
				var $rowid = 0;
					$("#ServicTableRowMM").empty();
		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
			var	Services =  obj.Services;
			var	amount =  obj.amount;				
			var	Count =  obj.Count;
			var	hhh = hhh + '<tr id="rowAA'+$rowid+'"><td><i  onclick="selectedItem(this, ' +$rowid+' )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
		   $rowid = $rowid + 1;
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#row' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}

function selectedItemB(item, rowID)
{
	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoA",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
				var $rowid = 0;
					$("#ServicTableRowMM").empty();
		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
			var	Services =  obj.Services;
			var	amount =  obj.amount;				
			var	Count =  obj.Count;
			var	hhh = hhh + '<tr id="rowAA'+$rowid+'"><td><i  onclick="selectedItem(this, ' +$rowid+' )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
		   $rowid = $rowid + 1;
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#row' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}

function selectedItemBAAAAAAAA(item, rowID)
{

 //alert(item.id);
 // $fromdte = date("Y-m-d");
//	   $todate 

	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoB",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
					$("#ServicTableRow").empty();
		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
			var	createddate =  obj.createddate;								
			var	PatientId =  obj.PatientId;
			var	PatientName =  obj.PatientName;				
			var	Mobile =  obj.Mobile;
			var	amount =  obj.amount;
			var	Vid =  obj.Vid;
			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td><td>' + createddate + '</td><td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#rowBB' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

//window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: ""
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "฿#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

//}
</script>
<style>
.circle-icon {
	background: #0073b7;

	/* width: 4px; */

	/* height: 10px; */
	border-radius: 50%;
	text-align: center;

	/* line-height: 10px; */
	vertical-align: middle;
	padding: 5px;
	color: white;
}
.circle-iconA {
	background: #28a745;

	/* width: 4px; */

	/* height: 10px; */
	border-radius: 50%;
	text-align: center;

	/* line-height: 10px; */
	vertical-align: middle;
	padding: 5px;
	color: white;
}
</style>
<script>
</script>
<?php if (!$view_bill_collection_report->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_bill_collection_report", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_bill_collection_report_list->terminate();
?>