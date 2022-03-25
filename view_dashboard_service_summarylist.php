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
$view_dashboard_service_summary_list = new view_dashboard_service_summary_list();

// Run the page
$view_dashboard_service_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_summary_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dashboard_service_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dashboard_service_summarylist = currentForm = new ew.Form("fview_dashboard_service_summarylist", "list");
fview_dashboard_service_summarylist.formKeyCountName = '<?php echo $view_dashboard_service_summary_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dashboard_service_summarylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_summarylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_service_summarylist.lists["x_HospID"] = <?php echo $view_dashboard_service_summary_list->HospID->Lookup->toClientList() ?>;
fview_dashboard_service_summarylist.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_service_summary_list->HospID->lookupOptions()) ?>;
fview_dashboard_service_summarylist.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_dashboard_service_summarylistsrch = currentSearchForm = new ew.Form("fview_dashboard_service_summarylistsrch");

// Validate function for search
fview_dashboard_service_summarylistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createdDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_summary->createdDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_service_summarylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_summarylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_dashboard_service_summarylistsrch.filterList = <?php echo $view_dashboard_service_summary_list->getFilterList() ?>;
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
<?php if (!$view_dashboard_service_summary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_service_summary_list->TotalRecs > 0 && $view_dashboard_service_summary_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_service_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_summary_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_service_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_summary_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_service_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_summary_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_service_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_dashboard_service_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_service_summary->isExport() && !$view_dashboard_service_summary->CurrentAction) { ?>
<form name="fview_dashboard_service_summarylistsrch" id="fview_dashboard_service_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dashboard_service_summary_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_service_summarylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_service_summary">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dashboard_service_summary_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dashboard_service_summary->RowType = ROWTYPE_SEARCH;

// Render row
$view_dashboard_service_summary->resetAttributes();
$view_dashboard_service_summary_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dashboard_service_summary->createdDate->Visible) { // createdDate ?>
	<div id="xsc_createdDate" class="ew-cell form-group">
		<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_summary->createdDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createdDate" id="z_createdDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_service_summary->createdDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_service_summary" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_summary->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_summary->createdDate->EditValue ?>"<?php echo $view_dashboard_service_summary->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_summary->createdDate->ReadOnly && !$view_dashboard_service_summary->createdDate->Disabled && !isset($view_dashboard_service_summary->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_summary->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_summarylistsrch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createdDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createdDate style="d-none"">
<input type="text" data-table="view_dashboard_service_summary" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_summary->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_summary->createdDate->EditValue2 ?>"<?php echo $view_dashboard_service_summary->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_summary->createdDate->ReadOnly && !$view_dashboard_service_summary->createdDate->Disabled && !isset($view_dashboard_service_summary->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_summary->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_summarylistsrch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_service_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dashboard_service_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_service_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_service_summary_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_summary_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_summary_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_summary_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_service_summary_list->showPageHeader(); ?>
<?php
$view_dashboard_service_summary_list->showMessage();
?>
<?php if ($view_dashboard_service_summary_list->TotalRecs > 0 || $view_dashboard_service_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_service_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_summary">
<?php if (!$view_dashboard_service_summary->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_service_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_service_summary_list->Pager)) $view_dashboard_service_summary_list->Pager = new NumericPager($view_dashboard_service_summary_list->StartRec, $view_dashboard_service_summary_list->DisplayRecs, $view_dashboard_service_summary_list->TotalRecs, $view_dashboard_service_summary_list->RecRange, $view_dashboard_service_summary_list->AutoHidePager) ?>
<?php if ($view_dashboard_service_summary_list->Pager->RecordCount > 0 && $view_dashboard_service_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_service_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_service_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_service_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_service_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_service_summary_list->TotalRecs > 0 && (!$view_dashboard_service_summary_list->AutoHidePageSizeSelector || $view_dashboard_service_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_service_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_service_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_service_summarylist" id="fview_dashboard_service_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_service_summary_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_service_summary_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_summary">
<div id="gmp_view_dashboard_service_summary" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_service_summary_list->TotalRecs > 0 || $view_dashboard_service_summary->isGridEdit()) { ?>
<table id="tbl_view_dashboard_service_summarylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_service_summary_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_service_summary_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_summary_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_summary->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_summary->sortUrl($view_dashboard_service_summary->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_summary->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_summary_DEPARTMENT" class="view_dashboard_service_summary_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_summary->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_summary->SortUrl($view_dashboard_service_summary->DEPARTMENT) ?>',1);"><div id="elh_view_dashboard_service_summary_DEPARTMENT" class="view_dashboard_service_summary_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_summary->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_summary->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_summary->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_dashboard_service_summary->sortUrl($view_dashboard_service_summary->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_summary->SubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_summary_SubTotal" class="view_dashboard_service_summary_SubTotal"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_summary->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_summary->SortUrl($view_dashboard_service_summary->SubTotal) ?>',1);"><div id="elh_view_dashboard_service_summary_SubTotal" class="view_dashboard_service_summary_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_summary->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_summary->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_summary->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_summary->sortUrl($view_dashboard_service_summary->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_summary->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_summary_createdDate" class="view_dashboard_service_summary_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_summary->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_summary->SortUrl($view_dashboard_service_summary->createdDate) ?>',1);"><div id="elh_view_dashboard_service_summary_createdDate" class="view_dashboard_service_summary_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_summary->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_summary->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_summary->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_summary->sortUrl($view_dashboard_service_summary->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_summary->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_summary_HospID" class="view_dashboard_service_summary_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_summary->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_summary->SortUrl($view_dashboard_service_summary->HospID) ?>',1);"><div id="elh_view_dashboard_service_summary_HospID" class="view_dashboard_service_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_summary->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_summary->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_summary->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_summary->sortUrl($view_dashboard_service_summary->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_summary->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_summary_vid" class="view_dashboard_service_summary_vid"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_summary->vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_summary->SortUrl($view_dashboard_service_summary->vid) ?>',1);"><div id="elh_view_dashboard_service_summary_vid" class="view_dashboard_service_summary_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_summary->vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_summary->vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_summary->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_dashboard_service_summary->sortUrl($view_dashboard_service_summary->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_summary->ItemCode->headerCellClass() ?>"><div id="elh_view_dashboard_service_summary_ItemCode" class="view_dashboard_service_summary_ItemCode"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_summary->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_summary->SortUrl($view_dashboard_service_summary->ItemCode) ?>',1);"><div id="elh_view_dashboard_service_summary_ItemCode" class="view_dashboard_service_summary_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_summary->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_summary->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_summary->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dashboard_service_summary->sortUrl($view_dashboard_service_summary->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_summary->PatientId->headerCellClass() ?>"><div id="elh_view_dashboard_service_summary_PatientId" class="view_dashboard_service_summary_PatientId"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_summary->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_summary->SortUrl($view_dashboard_service_summary->PatientId) ?>',1);"><div id="elh_view_dashboard_service_summary_PatientId" class="view_dashboard_service_summary_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_summary->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_summary->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_summary->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_service_summary->ExportAll && $view_dashboard_service_summary->isExport()) {
	$view_dashboard_service_summary_list->StopRec = $view_dashboard_service_summary_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dashboard_service_summary_list->TotalRecs > $view_dashboard_service_summary_list->StartRec + $view_dashboard_service_summary_list->DisplayRecs - 1)
		$view_dashboard_service_summary_list->StopRec = $view_dashboard_service_summary_list->StartRec + $view_dashboard_service_summary_list->DisplayRecs - 1;
	else
		$view_dashboard_service_summary_list->StopRec = $view_dashboard_service_summary_list->TotalRecs;
}
$view_dashboard_service_summary_list->RecCnt = $view_dashboard_service_summary_list->StartRec - 1;
if ($view_dashboard_service_summary_list->Recordset && !$view_dashboard_service_summary_list->Recordset->EOF) {
	$view_dashboard_service_summary_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_service_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_service_summary_list->StartRec > 1)
		$view_dashboard_service_summary_list->Recordset->move($view_dashboard_service_summary_list->StartRec - 1);
} elseif (!$view_dashboard_service_summary->AllowAddDeleteRow && $view_dashboard_service_summary_list->StopRec == 0) {
	$view_dashboard_service_summary_list->StopRec = $view_dashboard_service_summary->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_service_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_service_summary->resetAttributes();
$view_dashboard_service_summary_list->renderRow();
while ($view_dashboard_service_summary_list->RecCnt < $view_dashboard_service_summary_list->StopRec) {
	$view_dashboard_service_summary_list->RecCnt++;
	if ($view_dashboard_service_summary_list->RecCnt >= $view_dashboard_service_summary_list->StartRec) {
		$view_dashboard_service_summary_list->RowCnt++;

		// Set up key count
		$view_dashboard_service_summary_list->KeyCount = $view_dashboard_service_summary_list->RowIndex;

		// Init row class and style
		$view_dashboard_service_summary->resetAttributes();
		$view_dashboard_service_summary->CssClass = "";
		if ($view_dashboard_service_summary->isGridAdd()) {
		} else {
			$view_dashboard_service_summary_list->loadRowValues($view_dashboard_service_summary_list->Recordset); // Load row values
		}
		$view_dashboard_service_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_service_summary->RowAttrs = array_merge($view_dashboard_service_summary->RowAttrs, array('data-rowindex'=>$view_dashboard_service_summary_list->RowCnt, 'id'=>'r' . $view_dashboard_service_summary_list->RowCnt . '_view_dashboard_service_summary', 'data-rowtype'=>$view_dashboard_service_summary->RowType));

		// Render row
		$view_dashboard_service_summary_list->renderRow();

		// Render list options
		$view_dashboard_service_summary_list->renderListOptions();
?>
	<tr<?php echo $view_dashboard_service_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_summary_list->ListOptions->render("body", "left", $view_dashboard_service_summary_list->RowCnt);
?>
	<?php if ($view_dashboard_service_summary->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $view_dashboard_service_summary->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_summary_list->RowCnt ?>_view_dashboard_service_summary_DEPARTMENT" class="view_dashboard_service_summary_DEPARTMENT">
<span<?php echo $view_dashboard_service_summary->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_summary->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $view_dashboard_service_summary->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_summary_list->RowCnt ?>_view_dashboard_service_summary_SubTotal" class="view_dashboard_service_summary_SubTotal">
<span<?php echo $view_dashboard_service_summary->SubTotal->viewAttributes() ?>>
<?php echo $view_dashboard_service_summary->SubTotal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_dashboard_service_summary->createdDate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_summary_list->RowCnt ?>_view_dashboard_service_summary_createdDate" class="view_dashboard_service_summary_createdDate">
<span<?php echo $view_dashboard_service_summary->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_summary->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_service_summary->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_summary_list->RowCnt ?>_view_dashboard_service_summary_HospID" class="view_dashboard_service_summary_HospID">
<span<?php echo $view_dashboard_service_summary->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_summary->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->vid->Visible) { // vid ?>
		<td data-name="vid"<?php echo $view_dashboard_service_summary->vid->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_summary_list->RowCnt ?>_view_dashboard_service_summary_vid" class="view_dashboard_service_summary_vid">
<span<?php echo $view_dashboard_service_summary->vid->viewAttributes() ?>>
<?php echo $view_dashboard_service_summary->vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_dashboard_service_summary->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_summary_list->RowCnt ?>_view_dashboard_service_summary_ItemCode" class="view_dashboard_service_summary_ItemCode">
<span<?php echo $view_dashboard_service_summary->ItemCode->viewAttributes() ?>>
<?php echo $view_dashboard_service_summary->ItemCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_dashboard_service_summary->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_summary_list->RowCnt ?>_view_dashboard_service_summary_PatientId" class="view_dashboard_service_summary_PatientId">
<span<?php echo $view_dashboard_service_summary->PatientId->viewAttributes() ?>>
<?php echo $view_dashboard_service_summary->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_summary_list->ListOptions->render("body", "right", $view_dashboard_service_summary_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_service_summary->isGridAdd())
		$view_dashboard_service_summary_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_service_summary->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_service_summary->resetAttributes();
$view_dashboard_service_summary_list->renderRow();
?>
<?php if ($view_dashboard_service_summary_list->TotalRecs > 0 && !$view_dashboard_service_summary->isGridAdd() && !$view_dashboard_service_summary->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_service_summary_list->renderListOptions();

// Render list options (footer, left)
$view_dashboard_service_summary_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_service_summary->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_summary->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_summary_DEPARTMENT" class="view_dashboard_service_summary_DEPARTMENT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_dashboard_service_summary->SubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_summary_SubTotal" class="view_dashboard_service_summary_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_summary->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" class="<?php echo $view_dashboard_service_summary->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_summary_createdDate" class="view_dashboard_service_summary_createdDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_service_summary->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_summary_HospID" class="view_dashboard_service_summary_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->vid->Visible) { // vid ?>
		<td data-name="vid" class="<?php echo $view_dashboard_service_summary->vid->footerCellClass() ?>"><span id="elf_view_dashboard_service_summary_vid" class="view_dashboard_service_summary_vid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_dashboard_service_summary->ItemCode->footerCellClass() ?>"><span id="elf_view_dashboard_service_summary_ItemCode" class="view_dashboard_service_summary_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_summary->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_dashboard_service_summary->PatientId->footerCellClass() ?>"><span id="elf_view_dashboard_service_summary_PatientId" class="view_dashboard_service_summary_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_summary_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dashboard_service_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_service_summary_list->Recordset)
	$view_dashboard_service_summary_list->Recordset->Close();
?>
<?php if (!$view_dashboard_service_summary->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_service_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_service_summary_list->Pager)) $view_dashboard_service_summary_list->Pager = new NumericPager($view_dashboard_service_summary_list->StartRec, $view_dashboard_service_summary_list->DisplayRecs, $view_dashboard_service_summary_list->TotalRecs, $view_dashboard_service_summary_list->RecRange, $view_dashboard_service_summary_list->AutoHidePager) ?>
<?php if ($view_dashboard_service_summary_list->Pager->RecordCount > 0 && $view_dashboard_service_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_service_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_service_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_service_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_summary_list->pageUrl() ?>start=<?php echo $view_dashboard_service_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_service_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_service_summary_list->TotalRecs > 0 && (!$view_dashboard_service_summary_list->AutoHidePageSizeSelector || $view_dashboard_service_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_service_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_service_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_service_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_service_summary_list->TotalRecs == 0 && !$view_dashboard_service_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_service_summary_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_service_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dashboard_service_summary->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_service_summary", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_service_summary_list->terminate();
?>