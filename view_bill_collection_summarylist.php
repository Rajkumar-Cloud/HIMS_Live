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
$view_bill_collection_summary_list = new view_bill_collection_summary_list();

// Run the page
$view_bill_collection_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_bill_collection_summary_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_bill_collection_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_bill_collection_summarylist = currentForm = new ew.Form("fview_bill_collection_summarylist", "list");
fview_bill_collection_summarylist.formKeyCountName = '<?php echo $view_bill_collection_summary_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_bill_collection_summarylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_bill_collection_summarylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_bill_collection_summarylistsrch = currentSearchForm = new ew.Form("fview_bill_collection_summarylistsrch");

// Validate function for search
fview_bill_collection_summarylistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_bill_collection_summary->createddate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_bill_collection_summarylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_bill_collection_summarylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_bill_collection_summarylistsrch.filterList = <?php echo $view_bill_collection_summary_list->getFilterList() ?>;
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
<?php if (!$view_bill_collection_summary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_bill_collection_summary_list->TotalRecs > 0 && $view_bill_collection_summary_list->ExportOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->ImportOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->SearchOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_bill_collection_summary_list->FilterOptions->visible()) { ?>
<?php $view_bill_collection_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_bill_collection_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_bill_collection_summary->isExport() && !$view_bill_collection_summary->CurrentAction) { ?>
<form name="fview_bill_collection_summarylistsrch" id="fview_bill_collection_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_bill_collection_summary_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_bill_collection_summarylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_bill_collection_summary">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_bill_collection_summary_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_bill_collection_summary->RowType = ROWTYPE_SEARCH;

// Render row
$view_bill_collection_summary->resetAttributes();
$view_bill_collection_summary_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_bill_collection_summary->createddate->Visible) { // createddate ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_bill_collection_summary->createddate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddate" id="z_createddate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_bill_collection_summary->createddate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_bill_collection_summary" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_bill_collection_summary->createddate->getPlaceHolder()) ?>" value="<?php echo $view_bill_collection_summary->createddate->EditValue ?>"<?php echo $view_bill_collection_summary->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_summary->createddate->ReadOnly && !$view_bill_collection_summary->createddate->Disabled && !isset($view_bill_collection_summary->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_summary->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_bill_collection_summarylistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddate style="d-none"">
<input type="text" data-table="view_bill_collection_summary" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_bill_collection_summary->createddate->getPlaceHolder()) ?>" value="<?php echo $view_bill_collection_summary->createddate->EditValue2 ?>"<?php echo $view_bill_collection_summary->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_summary->createddate->ReadOnly && !$view_bill_collection_summary->createddate->Disabled && !isset($view_bill_collection_summary->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_summary->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_bill_collection_summarylistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_bill_collection_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_bill_collection_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_bill_collection_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_bill_collection_summary_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_bill_collection_summary_list->showPageHeader(); ?>
<?php
$view_bill_collection_summary_list->showMessage();
?>
<?php if ($view_bill_collection_summary_list->TotalRecs > 0 || $view_bill_collection_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_bill_collection_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_bill_collection_summary">
<?php if (!$view_bill_collection_summary->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_bill_collection_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_bill_collection_summary_list->Pager)) $view_bill_collection_summary_list->Pager = new NumericPager($view_bill_collection_summary_list->StartRec, $view_bill_collection_summary_list->DisplayRecs, $view_bill_collection_summary_list->TotalRecs, $view_bill_collection_summary_list->RecRange, $view_bill_collection_summary_list->AutoHidePager) ?>
<?php if ($view_bill_collection_summary_list->Pager->RecordCount > 0 && $view_bill_collection_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_bill_collection_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_bill_collection_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_bill_collection_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_bill_collection_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_bill_collection_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_bill_collection_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_bill_collection_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_bill_collection_summary_list->TotalRecs > 0 && (!$view_bill_collection_summary_list->AutoHidePageSizeSelector || $view_bill_collection_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_bill_collection_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_bill_collection_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_bill_collection_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_bill_collection_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_bill_collection_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_bill_collection_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_bill_collection_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_bill_collection_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_bill_collection_summarylist" id="fview_bill_collection_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_bill_collection_summary_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_bill_collection_summary_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_bill_collection_summary">
<div id="gmp_view_bill_collection_summary" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_bill_collection_summary_list->TotalRecs > 0 || $view_bill_collection_summary->isGridEdit()) { ?>
<table id="tbl_view_bill_collection_summarylist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_bill_collection_summary_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_bill_collection_summary_list->renderListOptions();

// Render list options (header, left)
$view_bill_collection_summary_list->ListOptions->render("header", "left", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
<?php if ($view_bill_collection_summary->createddate->Visible) { // createddate ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_bill_collection_summary->createddate->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_createddate" class="view_bill_collection_summary_createddate"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_createddate" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->createddate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_bill_collection_summary->createddate->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_createddate" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->createddate) ?>',1);"><div id="elh_view_bill_collection_summary_createddate" class="view_bill_collection_summary_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->createddate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->createddate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->UserName->Visible) { // UserName ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_bill_collection_summary->UserName->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_UserName" class="view_bill_collection_summary_UserName"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_UserName" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->UserName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_bill_collection_summary->UserName->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_UserName" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->UserName) ?>',1);"><div id="elh_view_bill_collection_summary_UserName" class="view_bill_collection_summary_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->CARD->Visible) { // CARD ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->CARD) == "") { ?>
		<th data-name="CARD" class="<?php echo $view_bill_collection_summary->CARD->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CARD" class="view_bill_collection_summary_CARD"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CARD" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->CARD->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CARD" class="<?php echo $view_bill_collection_summary->CARD->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CARD" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->CARD) ?>',1);"><div id="elh_view_bill_collection_summary_CARD" class="view_bill_collection_summary_CARD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->CARD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->CARD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->CARD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->CASH->Visible) { // CASH ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->CASH) == "") { ?>
		<th data-name="CASH" class="<?php echo $view_bill_collection_summary->CASH->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CASH" class="view_bill_collection_summary_CASH"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CASH" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->CASH->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CASH" class="<?php echo $view_bill_collection_summary->CASH->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CASH" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->CASH) ?>',1);"><div id="elh_view_bill_collection_summary_CASH" class="view_bill_collection_summary_CASH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->CASH->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->CASH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->CASH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->NEFT->Visible) { // NEFT ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->NEFT) == "") { ?>
		<th data-name="NEFT" class="<?php echo $view_bill_collection_summary->NEFT->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_NEFT" class="view_bill_collection_summary_NEFT"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_NEFT" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->NEFT->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="NEFT" class="<?php echo $view_bill_collection_summary->NEFT->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_NEFT" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->NEFT) ?>',1);"><div id="elh_view_bill_collection_summary_NEFT" class="view_bill_collection_summary_NEFT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->NEFT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->NEFT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->NEFT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->PAYTM->Visible) { // PAYTM ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $view_bill_collection_summary->PAYTM->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_PAYTM" class="view_bill_collection_summary_PAYTM"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_PAYTM" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->PAYTM->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $view_bill_collection_summary->PAYTM->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_PAYTM" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->PAYTM) ?>',1);"><div id="elh_view_bill_collection_summary_PAYTM" class="view_bill_collection_summary_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->PAYTM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->PAYTM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->CHEQUE->Visible) { // CHEQUE ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->CHEQUE) == "") { ?>
		<th data-name="CHEQUE" class="<?php echo $view_bill_collection_summary->CHEQUE->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summary_CHEQUE"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->CHEQUE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CHEQUE" class="<?php echo $view_bill_collection_summary->CHEQUE->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->CHEQUE) ?>',1);"><div id="elh_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summary_CHEQUE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->CHEQUE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->CHEQUE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->CHEQUE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->RTGS->Visible) { // RTGS ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $view_bill_collection_summary->RTGS->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_RTGS" class="view_bill_collection_summary_RTGS"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_RTGS" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->RTGS->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $view_bill_collection_summary->RTGS->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_RTGS" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->RTGS) ?>',1);"><div id="elh_view_bill_collection_summary_RTGS" class="view_bill_collection_summary_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->RTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->RTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->NotSelected->Visible) { // NotSelected ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->NotSelected) == "") { ?>
		<th data-name="NotSelected" class="<?php echo $view_bill_collection_summary->NotSelected->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_NotSelected" class="view_bill_collection_summary_NotSelected"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_NotSelected" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->NotSelected->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="NotSelected" class="<?php echo $view_bill_collection_summary->NotSelected->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_NotSelected" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->NotSelected) ?>',1);"><div id="elh_view_bill_collection_summary_NotSelected" class="view_bill_collection_summary_NotSelected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->NotSelected->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->NotSelected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->NotSelected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->REFUND->Visible) { // REFUND ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->REFUND) == "") { ?>
		<th data-name="REFUND" class="<?php echo $view_bill_collection_summary->REFUND->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_REFUND" class="view_bill_collection_summary_REFUND"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_REFUND" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->REFUND->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="REFUND" class="<?php echo $view_bill_collection_summary->REFUND->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_REFUND" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->REFUND) ?>',1);"><div id="elh_view_bill_collection_summary_REFUND" class="view_bill_collection_summary_REFUND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->REFUND->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->REFUND->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->REFUND->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->CANCEL->Visible) { // CANCEL ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->CANCEL) == "") { ?>
		<th data-name="CANCEL" class="<?php echo $view_bill_collection_summary->CANCEL->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_CANCEL" class="view_bill_collection_summary_CANCEL"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_CANCEL" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->CANCEL->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CANCEL" class="<?php echo $view_bill_collection_summary->CANCEL->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_CANCEL" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->CANCEL) ?>',1);"><div id="elh_view_bill_collection_summary_CANCEL" class="view_bill_collection_summary_CANCEL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->CANCEL->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->CANCEL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->CANCEL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->Total->Visible) { // Total ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $view_bill_collection_summary->Total->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_Total" class="view_bill_collection_summary_Total"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_Total" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->Total->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $view_bill_collection_summary->Total->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_Total" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->Total) ?>',1);"><div id="elh_view_bill_collection_summary_Total" class="view_bill_collection_summary_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->HospID->Visible) { // HospID ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_bill_collection_summary->HospID->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_HospID" class="view_bill_collection_summary_HospID"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_HospID" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_bill_collection_summary->HospID->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_HospID" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->HospID) ?>',1);"><div id="elh_view_bill_collection_summary_HospID" class="view_bill_collection_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bill_collection_summary->BillType->Visible) { // BillType ?>
	<?php if ($view_bill_collection_summary->sortUrl($view_bill_collection_summary->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_bill_collection_summary->BillType->headerCellClass() ?>"><div id="elh_view_bill_collection_summary_BillType" class="view_bill_collection_summary_BillType"><div class="ew-table-header-caption"><script id="tpc_view_bill_collection_summary_BillType" class="view_bill_collection_summarylist" type="text/html"><span><?php echo $view_bill_collection_summary->BillType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_bill_collection_summary->BillType->headerCellClass() ?>"><script id="tpc_view_bill_collection_summary_BillType" class="view_bill_collection_summarylist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_bill_collection_summary->SortUrl($view_bill_collection_summary->BillType) ?>',1);"><div id="elh_view_bill_collection_summary_BillType" class="view_bill_collection_summary_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bill_collection_summary->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bill_collection_summary->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_bill_collection_summary->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_bill_collection_summary_list->ListOptions->render("header", "right", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_bill_collection_summary->ExportAll && $view_bill_collection_summary->isExport()) {
	$view_bill_collection_summary_list->StopRec = $view_bill_collection_summary_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_bill_collection_summary_list->TotalRecs > $view_bill_collection_summary_list->StartRec + $view_bill_collection_summary_list->DisplayRecs - 1)
		$view_bill_collection_summary_list->StopRec = $view_bill_collection_summary_list->StartRec + $view_bill_collection_summary_list->DisplayRecs - 1;
	else
		$view_bill_collection_summary_list->StopRec = $view_bill_collection_summary_list->TotalRecs;
}
$view_bill_collection_summary_list->RecCnt = $view_bill_collection_summary_list->StartRec - 1;
if ($view_bill_collection_summary_list->Recordset && !$view_bill_collection_summary_list->Recordset->EOF) {
	$view_bill_collection_summary_list->Recordset->moveFirst();
	$selectLimit = $view_bill_collection_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_bill_collection_summary_list->StartRec > 1)
		$view_bill_collection_summary_list->Recordset->move($view_bill_collection_summary_list->StartRec - 1);
} elseif (!$view_bill_collection_summary->AllowAddDeleteRow && $view_bill_collection_summary_list->StopRec == 0) {
	$view_bill_collection_summary_list->StopRec = $view_bill_collection_summary->GridAddRowCount;
}

// Initialize aggregate
$view_bill_collection_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_bill_collection_summary->resetAttributes();
$view_bill_collection_summary_list->renderRow();
while ($view_bill_collection_summary_list->RecCnt < $view_bill_collection_summary_list->StopRec) {
	$view_bill_collection_summary_list->RecCnt++;
	if ($view_bill_collection_summary_list->RecCnt >= $view_bill_collection_summary_list->StartRec) {
		$view_bill_collection_summary_list->RowCnt++;

		// Set up key count
		$view_bill_collection_summary_list->KeyCount = $view_bill_collection_summary_list->RowIndex;

		// Init row class and style
		$view_bill_collection_summary->resetAttributes();
		$view_bill_collection_summary->CssClass = "";
		if ($view_bill_collection_summary->isGridAdd()) {
		} else {
			$view_bill_collection_summary_list->loadRowValues($view_bill_collection_summary_list->Recordset); // Load row values
		}
		$view_bill_collection_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_bill_collection_summary->RowAttrs = array_merge($view_bill_collection_summary->RowAttrs, array('data-rowindex'=>$view_bill_collection_summary_list->RowCnt, 'id'=>'r' . $view_bill_collection_summary_list->RowCnt . '_view_bill_collection_summary', 'data-rowtype'=>$view_bill_collection_summary->RowType));

		// Render row
		$view_bill_collection_summary_list->renderRow();

		// Render list options
		$view_bill_collection_summary_list->renderListOptions();

		// Save row and cell attributes
		$view_bill_collection_summary_list->Attrs[$view_bill_collection_summary_list->RowCnt] = array("row_attrs" => $view_bill_collection_summary->rowAttributes(), "cell_attrs" => array());
		$view_bill_collection_summary_list->Attrs[$view_bill_collection_summary_list->RowCnt]["cell_attrs"] = $view_bill_collection_summary->fieldCellAttributes();
?>
	<tr<?php echo $view_bill_collection_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_bill_collection_summary_list->ListOptions->render("body", "left", $view_bill_collection_summary_list->RowCnt, "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	<?php if ($view_bill_collection_summary->createddate->Visible) { // createddate ?>
		<td data-name="createddate"<?php echo $view_bill_collection_summary->createddate->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_createddate" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_createddate" class="view_bill_collection_summary_createddate">
<span<?php echo $view_bill_collection_summary->createddate->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->createddate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_bill_collection_summary->UserName->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_UserName" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_UserName" class="view_bill_collection_summary_UserName">
<span<?php echo $view_bill_collection_summary->UserName->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->UserName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CARD->Visible) { // CARD ?>
		<td data-name="CARD"<?php echo $view_bill_collection_summary->CARD->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CARD" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CARD" class="view_bill_collection_summary_CARD">
<span<?php echo $view_bill_collection_summary->CARD->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->CARD->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CASH->Visible) { // CASH ?>
		<td data-name="CASH"<?php echo $view_bill_collection_summary->CASH->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CASH" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CASH" class="view_bill_collection_summary_CASH">
<span<?php echo $view_bill_collection_summary->CASH->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->CASH->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->NEFT->Visible) { // NEFT ?>
		<td data-name="NEFT"<?php echo $view_bill_collection_summary->NEFT->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_NEFT" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_NEFT" class="view_bill_collection_summary_NEFT">
<span<?php echo $view_bill_collection_summary->NEFT->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->NEFT->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM"<?php echo $view_bill_collection_summary->PAYTM->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_PAYTM" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_PAYTM" class="view_bill_collection_summary_PAYTM">
<span<?php echo $view_bill_collection_summary->PAYTM->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->PAYTM->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CHEQUE->Visible) { // CHEQUE ?>
		<td data-name="CHEQUE"<?php echo $view_bill_collection_summary->CHEQUE->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summary_CHEQUE">
<span<?php echo $view_bill_collection_summary->CHEQUE->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->CHEQUE->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS"<?php echo $view_bill_collection_summary->RTGS->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_RTGS" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_RTGS" class="view_bill_collection_summary_RTGS">
<span<?php echo $view_bill_collection_summary->RTGS->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->RTGS->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->NotSelected->Visible) { // NotSelected ?>
		<td data-name="NotSelected"<?php echo $view_bill_collection_summary->NotSelected->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_NotSelected" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_NotSelected" class="view_bill_collection_summary_NotSelected">
<span<?php echo $view_bill_collection_summary->NotSelected->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->NotSelected->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->REFUND->Visible) { // REFUND ?>
		<td data-name="REFUND"<?php echo $view_bill_collection_summary->REFUND->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_REFUND" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_REFUND" class="view_bill_collection_summary_REFUND">
<span<?php echo $view_bill_collection_summary->REFUND->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->REFUND->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CANCEL->Visible) { // CANCEL ?>
		<td data-name="CANCEL"<?php echo $view_bill_collection_summary->CANCEL->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CANCEL" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_CANCEL" class="view_bill_collection_summary_CANCEL">
<span<?php echo $view_bill_collection_summary->CANCEL->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->CANCEL->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $view_bill_collection_summary->Total->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_Total" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_Total" class="view_bill_collection_summary_Total">
<span<?php echo $view_bill_collection_summary->Total->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->Total->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_bill_collection_summary->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_HospID" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_HospID" class="view_bill_collection_summary_HospID">
<span<?php echo $view_bill_collection_summary->HospID->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_bill_collection_summary->BillType->cellAttributes() ?>>
<script id="tpx<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_BillType" class="view_bill_collection_summarylist" type="text/html">
<span id="el<?php echo $view_bill_collection_summary_list->RowCnt ?>_view_bill_collection_summary_BillType" class="view_bill_collection_summary_BillType">
<span<?php echo $view_bill_collection_summary->BillType->viewAttributes() ?>>
<?php echo $view_bill_collection_summary->BillType->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_bill_collection_summary_list->ListOptions->render("body", "right", $view_bill_collection_summary_list->RowCnt, "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	</tr>
<?php
	}
	if (!$view_bill_collection_summary->isGridAdd())
		$view_bill_collection_summary_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_bill_collection_summary->RowType = ROWTYPE_AGGREGATE;
$view_bill_collection_summary->resetAttributes();
$view_bill_collection_summary_list->renderRow();
?>
<?php if ($view_bill_collection_summary_list->TotalRecs > 0 && !$view_bill_collection_summary->isGridAdd() && !$view_bill_collection_summary->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_bill_collection_summary_list->renderListOptions();

// Render list options (footer, left)
$view_bill_collection_summary_list->ListOptions->render("footer", "left", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	<?php if ($view_bill_collection_summary->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_bill_collection_summary->createddate->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_createddate" class="view_bill_collection_summary_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_bill_collection_summary->UserName->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_UserName" class="view_bill_collection_summary_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CARD->Visible) { // CARD ?>
		<td data-name="CARD" class="<?php echo $view_bill_collection_summary->CARD->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CARD" class="view_bill_collection_summary_CARD">
		<script id="tpg_view_bill_collection_summary_CARD" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->CARD->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->CARD->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CASH->Visible) { // CASH ?>
		<td data-name="CASH" class="<?php echo $view_bill_collection_summary->CASH->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CASH" class="view_bill_collection_summary_CASH">
		<script id="tpg_view_bill_collection_summary_CASH" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->CASH->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->CASH->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->NEFT->Visible) { // NEFT ?>
		<td data-name="NEFT" class="<?php echo $view_bill_collection_summary->NEFT->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_NEFT" class="view_bill_collection_summary_NEFT">
		<script id="tpg_view_bill_collection_summary_NEFT" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->NEFT->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->NEFT->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" class="<?php echo $view_bill_collection_summary->PAYTM->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_PAYTM" class="view_bill_collection_summary_PAYTM">
		<script id="tpg_view_bill_collection_summary_PAYTM" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->PAYTM->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->PAYTM->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CHEQUE->Visible) { // CHEQUE ?>
		<td data-name="CHEQUE" class="<?php echo $view_bill_collection_summary->CHEQUE->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summary_CHEQUE">
		<script id="tpg_view_bill_collection_summary_CHEQUE" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->CHEQUE->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->CHEQUE->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" class="<?php echo $view_bill_collection_summary->RTGS->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_RTGS" class="view_bill_collection_summary_RTGS">
		<script id="tpg_view_bill_collection_summary_RTGS" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->RTGS->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->RTGS->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->NotSelected->Visible) { // NotSelected ?>
		<td data-name="NotSelected" class="<?php echo $view_bill_collection_summary->NotSelected->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_NotSelected" class="view_bill_collection_summary_NotSelected">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->REFUND->Visible) { // REFUND ?>
		<td data-name="REFUND" class="<?php echo $view_bill_collection_summary->REFUND->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_REFUND" class="view_bill_collection_summary_REFUND">
		<script id="tpg_view_bill_collection_summary_REFUND" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->REFUND->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->REFUND->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->CANCEL->Visible) { // CANCEL ?>
		<td data-name="CANCEL" class="<?php echo $view_bill_collection_summary->CANCEL->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_CANCEL" class="view_bill_collection_summary_CANCEL">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->Total->Visible) { // Total ?>
		<td data-name="Total" class="<?php echo $view_bill_collection_summary->Total->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_Total" class="view_bill_collection_summary_Total">
		<script id="tpg_view_bill_collection_summary_Total" class="view_bill_collection_summarylist" type="text/html"><span<?php echo $view_bill_collection_summary->Total->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_bill_collection_summary->Total->ViewValue ?></span></span></span></script>
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_bill_collection_summary->HospID->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_HospID" class="view_bill_collection_summary_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_bill_collection_summary->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_bill_collection_summary->BillType->footerCellClass() ?>"><span id="elf_view_bill_collection_summary_BillType" class="view_bill_collection_summary_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_bill_collection_summary_list->ListOptions->render("footer", "right", "", "block", $view_bill_collection_summary->TableVar, "view_bill_collection_summarylist");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_bill_collection_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_bill_collection_summarylist" class="ew-custom-template"></div>
<script id="tpm_view_bill_collection_summarylist" type="text/html">
<div id="ct_view_bill_collection_summary_list"><?php if ($view_bill_collection_summary_list->RowCnt > 0) { ?>
<table  style="width:100%">
  <thead>
	<tr>
	  <th>{{include tmpl="#tpc_view_bill_collection_summary_createddate"/}}</th>
	  <th>{{include tmpl="#tpc_view_bill_collection_summary_UserName"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_CARD"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_CASH"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_NEFT"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_PAYTM"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_CHEQUE"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_RTGS"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_NotSelected"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_REFUND"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_CANCEL"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_Total"/}}</th>
	  <th style="text-align:right">{{include tmpl="#tpc_view_bill_collection_summary_BillType"/}}</th>
	</tr>
  </thead>
  <tbody>
<?php for ($i = $view_bill_collection_summary_list->StartRowCnt; $i <= $view_bill_collection_summary_list->RowCnt; $i++) { ?>
  <tr>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_createddate"/}}</td>
	  <td>{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_UserName"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_CARD"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_CASH"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_NEFT"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_PAYTM"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_CHEQUE"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_RTGS"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_NotSelected"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_REFUND"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_CANCEL"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_Total"/}}</td>
	  <td style="text-align:right">{{include tmpl="#tpx<?php echo $i ?>_view_bill_collection_summary_BillType"/}}</td>
	</tr>
<?php } ?>
</tbody>
  <?php if ($view_bill_collection_summary_list->TotalRecs > 0 && !$view_bill_collection_summary->isGridAdd() && !$view_bill_collection_summary->isGridEdit()) { ?>
<tfoot>
	<tr>
	  <td></td>
	  <td></td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_CARD"/}}</td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_CASH"/}}</td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_NEFT"/}}</td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_PAYTM"/}}</td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_CHEQUE"/}}</td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_RTGS"/}}</td>
	  <td></td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_REFUND"/}}</td>
	  <td></td>
	  <td>{{include tmpl="#tpg_view_bill_collection_summary_Total"/}}</td>
	  <td></td>
	</tr>	
  </tfoot>
<?php } ?>  
</table>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_bill_collection_summary_list->Recordset)
	$view_bill_collection_summary_list->Recordset->Close();
?>
<?php if (!$view_bill_collection_summary->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_bill_collection_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_bill_collection_summary_list->Pager)) $view_bill_collection_summary_list->Pager = new NumericPager($view_bill_collection_summary_list->StartRec, $view_bill_collection_summary_list->DisplayRecs, $view_bill_collection_summary_list->TotalRecs, $view_bill_collection_summary_list->RecRange, $view_bill_collection_summary_list->AutoHidePager) ?>
<?php if ($view_bill_collection_summary_list->Pager->RecordCount > 0 && $view_bill_collection_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_bill_collection_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_bill_collection_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_bill_collection_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_bill_collection_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_bill_collection_summary_list->pageUrl() ?>start=<?php echo $view_bill_collection_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_bill_collection_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_bill_collection_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_bill_collection_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_bill_collection_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_bill_collection_summary_list->TotalRecs > 0 && (!$view_bill_collection_summary_list->AutoHidePageSizeSelector || $view_bill_collection_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_bill_collection_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_bill_collection_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_bill_collection_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_bill_collection_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_bill_collection_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_bill_collection_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_bill_collection_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_bill_collection_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_bill_collection_summary_list->TotalRecs == 0 && !$view_bill_collection_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_bill_collection_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_bill_collection_summary->Rows) ?> };
ew.applyTemplate("tpd_view_bill_collection_summarylist", "tpm_view_bill_collection_summarylist", "view_bill_collection_summarylist", "<?php echo $view_bill_collection_summary->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_bill_collection_summarylist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_bill_collection_summarylist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_bill_collection_summarylist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_bill_collection_summary_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_bill_collection_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_bill_collection_summary->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_bill_collection_summary", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_bill_collection_summary_list->terminate();
?>