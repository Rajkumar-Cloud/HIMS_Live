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
$view_dashboard_service_count_list = new view_dashboard_service_count_list();

// Run the page
$view_dashboard_service_count_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_count_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dashboard_service_count->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dashboard_service_countlist = currentForm = new ew.Form("fview_dashboard_service_countlist", "list");
fview_dashboard_service_countlist.formKeyCountName = '<?php echo $view_dashboard_service_count_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dashboard_service_countlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_countlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_dashboard_service_countlistsrch = currentSearchForm = new ew.Form("fview_dashboard_service_countlistsrch");

// Validate function for search
fview_dashboard_service_countlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createdDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_count->createdDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_service_countlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_countlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_dashboard_service_countlistsrch.filterList = <?php echo $view_dashboard_service_count_list->getFilterList() ?>;
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
<?php if (!$view_dashboard_service_count->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_service_count_list->TotalRecs > 0 && $view_dashboard_service_count_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_service_count_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_count_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_service_count_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_count_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_service_count_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_count_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_service_count_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_dashboard_service_count_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_service_count->isExport() && !$view_dashboard_service_count->CurrentAction) { ?>
<form name="fview_dashboard_service_countlistsrch" id="fview_dashboard_service_countlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dashboard_service_count_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_service_countlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_service_count">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dashboard_service_count_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dashboard_service_count->RowType = ROWTYPE_SEARCH;

// Render row
$view_dashboard_service_count->resetAttributes();
$view_dashboard_service_count_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dashboard_service_count->createdDate->Visible) { // createdDate ?>
	<div id="xsc_createdDate" class="ew-cell form-group">
		<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_count->createdDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createdDate" id="z_createdDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_service_count->createdDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_service_count" data-field="x_createdDate" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_count->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_count->createdDate->EditValue ?>"<?php echo $view_dashboard_service_count->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_count->createdDate->ReadOnly && !$view_dashboard_service_count->createdDate->Disabled && !isset($view_dashboard_service_count->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_count->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_countlistsrch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createdDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createdDate style="d-none"">
<input type="text" data-table="view_dashboard_service_count" data-field="x_createdDate" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_count->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_count->createdDate->EditValue2 ?>"<?php echo $view_dashboard_service_count->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_count->createdDate->ReadOnly && !$view_dashboard_service_count->createdDate->Disabled && !isset($view_dashboard_service_count->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_count->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_countlistsrch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_service_count_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dashboard_service_count_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_service_count_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_service_count_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_count_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_count_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_count_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_service_count_list->showPageHeader(); ?>
<?php
$view_dashboard_service_count_list->showMessage();
?>
<?php if ($view_dashboard_service_count_list->TotalRecs > 0 || $view_dashboard_service_count->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_service_count_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_count">
<?php if (!$view_dashboard_service_count->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_service_count->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_service_count_list->Pager)) $view_dashboard_service_count_list->Pager = new NumericPager($view_dashboard_service_count_list->StartRec, $view_dashboard_service_count_list->DisplayRecs, $view_dashboard_service_count_list->TotalRecs, $view_dashboard_service_count_list->RecRange, $view_dashboard_service_count_list->AutoHidePager) ?>
<?php if ($view_dashboard_service_count_list->Pager->RecordCount > 0 && $view_dashboard_service_count_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_service_count_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_count_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_service_count_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_service_count_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_count_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_count_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_service_count_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_count_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_count_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_count_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_service_count_list->TotalRecs > 0 && (!$view_dashboard_service_count_list->AutoHidePageSizeSelector || $view_dashboard_service_count_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_service_count">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_service_count_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_service_count_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_service_count_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_service_count_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_service_count_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_service_count_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_service_count->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_count_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_service_countlist" id="fview_dashboard_service_countlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_service_count_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_service_count_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_count">
<div id="gmp_view_dashboard_service_count" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_service_count_list->TotalRecs > 0 || $view_dashboard_service_count->isGridEdit()) { ?>
<table id="tbl_view_dashboard_service_countlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_service_count_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_service_count_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_count_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_count->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_count->sortUrl($view_dashboard_service_count->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_count->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_count_DEPARTMENT" class="view_dashboard_service_count_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_count->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_count->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_count->SortUrl($view_dashboard_service_count->DEPARTMENT) ?>',1);"><div id="elh_view_dashboard_service_count_DEPARTMENT" class="view_dashboard_service_count_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_count->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_count->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_count->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_count->TestCount->Visible) { // TestCount ?>
	<?php if ($view_dashboard_service_count->sortUrl($view_dashboard_service_count->TestCount) == "") { ?>
		<th data-name="TestCount" class="<?php echo $view_dashboard_service_count->TestCount->headerCellClass() ?>"><div id="elh_view_dashboard_service_count_TestCount" class="view_dashboard_service_count_TestCount"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_count->TestCount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCount" class="<?php echo $view_dashboard_service_count->TestCount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_count->SortUrl($view_dashboard_service_count->TestCount) ?>',1);"><div id="elh_view_dashboard_service_count_TestCount" class="view_dashboard_service_count_TestCount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_count->TestCount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_count->TestCount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_count->TestCount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_count->SumAmount->Visible) { // SumAmount ?>
	<?php if ($view_dashboard_service_count->sortUrl($view_dashboard_service_count->SumAmount) == "") { ?>
		<th data-name="SumAmount" class="<?php echo $view_dashboard_service_count->SumAmount->headerCellClass() ?>"><div id="elh_view_dashboard_service_count_SumAmount" class="view_dashboard_service_count_SumAmount"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_count->SumAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SumAmount" class="<?php echo $view_dashboard_service_count->SumAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_count->SortUrl($view_dashboard_service_count->SumAmount) ?>',1);"><div id="elh_view_dashboard_service_count_SumAmount" class="view_dashboard_service_count_SumAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_count->SumAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_count->SumAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_count->SumAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_count->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_count->sortUrl($view_dashboard_service_count->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_count->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_count_createdDate" class="view_dashboard_service_count_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_count->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_count->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_count->SortUrl($view_dashboard_service_count->createdDate) ?>',1);"><div id="elh_view_dashboard_service_count_createdDate" class="view_dashboard_service_count_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_count->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_count->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_count->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_count->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_count->sortUrl($view_dashboard_service_count->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_count->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_count_HospID" class="view_dashboard_service_count_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_count->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_count->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_count->SortUrl($view_dashboard_service_count->HospID) ?>',1);"><div id="elh_view_dashboard_service_count_HospID" class="view_dashboard_service_count_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_count->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_count->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_count->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_count->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_count->sortUrl($view_dashboard_service_count->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_count->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_count_vid" class="view_dashboard_service_count_vid"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_count->vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_count->vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_count->SortUrl($view_dashboard_service_count->vid) ?>',1);"><div id="elh_view_dashboard_service_count_vid" class="view_dashboard_service_count_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_count->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_count->vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_count->vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_count_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_service_count->ExportAll && $view_dashboard_service_count->isExport()) {
	$view_dashboard_service_count_list->StopRec = $view_dashboard_service_count_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dashboard_service_count_list->TotalRecs > $view_dashboard_service_count_list->StartRec + $view_dashboard_service_count_list->DisplayRecs - 1)
		$view_dashboard_service_count_list->StopRec = $view_dashboard_service_count_list->StartRec + $view_dashboard_service_count_list->DisplayRecs - 1;
	else
		$view_dashboard_service_count_list->StopRec = $view_dashboard_service_count_list->TotalRecs;
}
$view_dashboard_service_count_list->RecCnt = $view_dashboard_service_count_list->StartRec - 1;
if ($view_dashboard_service_count_list->Recordset && !$view_dashboard_service_count_list->Recordset->EOF) {
	$view_dashboard_service_count_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_service_count_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_service_count_list->StartRec > 1)
		$view_dashboard_service_count_list->Recordset->move($view_dashboard_service_count_list->StartRec - 1);
} elseif (!$view_dashboard_service_count->AllowAddDeleteRow && $view_dashboard_service_count_list->StopRec == 0) {
	$view_dashboard_service_count_list->StopRec = $view_dashboard_service_count->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_service_count->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_service_count->resetAttributes();
$view_dashboard_service_count_list->renderRow();
while ($view_dashboard_service_count_list->RecCnt < $view_dashboard_service_count_list->StopRec) {
	$view_dashboard_service_count_list->RecCnt++;
	if ($view_dashboard_service_count_list->RecCnt >= $view_dashboard_service_count_list->StartRec) {
		$view_dashboard_service_count_list->RowCnt++;

		// Set up key count
		$view_dashboard_service_count_list->KeyCount = $view_dashboard_service_count_list->RowIndex;

		// Init row class and style
		$view_dashboard_service_count->resetAttributes();
		$view_dashboard_service_count->CssClass = "";
		if ($view_dashboard_service_count->isGridAdd()) {
		} else {
			$view_dashboard_service_count_list->loadRowValues($view_dashboard_service_count_list->Recordset); // Load row values
		}
		$view_dashboard_service_count->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_service_count->RowAttrs = array_merge($view_dashboard_service_count->RowAttrs, array('data-rowindex'=>$view_dashboard_service_count_list->RowCnt, 'id'=>'r' . $view_dashboard_service_count_list->RowCnt . '_view_dashboard_service_count', 'data-rowtype'=>$view_dashboard_service_count->RowType));

		// Render row
		$view_dashboard_service_count_list->renderRow();

		// Render list options
		$view_dashboard_service_count_list->renderListOptions();
?>
	<tr<?php echo $view_dashboard_service_count->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_count_list->ListOptions->render("body", "left", $view_dashboard_service_count_list->RowCnt);
?>
	<?php if ($view_dashboard_service_count->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $view_dashboard_service_count->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_count_list->RowCnt ?>_view_dashboard_service_count_DEPARTMENT" class="view_dashboard_service_count_DEPARTMENT">
<span<?php echo $view_dashboard_service_count->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_count->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_count->TestCount->Visible) { // TestCount ?>
		<td data-name="TestCount"<?php echo $view_dashboard_service_count->TestCount->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_count_list->RowCnt ?>_view_dashboard_service_count_TestCount" class="view_dashboard_service_count_TestCount">
<span<?php echo $view_dashboard_service_count->TestCount->viewAttributes() ?>>
<?php echo $view_dashboard_service_count->TestCount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_count->SumAmount->Visible) { // SumAmount ?>
		<td data-name="SumAmount"<?php echo $view_dashboard_service_count->SumAmount->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_count_list->RowCnt ?>_view_dashboard_service_count_SumAmount" class="view_dashboard_service_count_SumAmount">
<span<?php echo $view_dashboard_service_count->SumAmount->viewAttributes() ?>>
<?php echo $view_dashboard_service_count->SumAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_count->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_dashboard_service_count->createdDate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_count_list->RowCnt ?>_view_dashboard_service_count_createdDate" class="view_dashboard_service_count_createdDate">
<span<?php echo $view_dashboard_service_count->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_count->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_count->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_service_count->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_count_list->RowCnt ?>_view_dashboard_service_count_HospID" class="view_dashboard_service_count_HospID">
<span<?php echo $view_dashboard_service_count->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_count->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_count->vid->Visible) { // vid ?>
		<td data-name="vid"<?php echo $view_dashboard_service_count->vid->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_count_list->RowCnt ?>_view_dashboard_service_count_vid" class="view_dashboard_service_count_vid">
<span<?php echo $view_dashboard_service_count->vid->viewAttributes() ?>>
<?php echo $view_dashboard_service_count->vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_count_list->ListOptions->render("body", "right", $view_dashboard_service_count_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_service_count->isGridAdd())
		$view_dashboard_service_count_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dashboard_service_count->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_service_count_list->Recordset)
	$view_dashboard_service_count_list->Recordset->Close();
?>
<?php if (!$view_dashboard_service_count->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_service_count->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_service_count_list->Pager)) $view_dashboard_service_count_list->Pager = new NumericPager($view_dashboard_service_count_list->StartRec, $view_dashboard_service_count_list->DisplayRecs, $view_dashboard_service_count_list->TotalRecs, $view_dashboard_service_count_list->RecRange, $view_dashboard_service_count_list->AutoHidePager) ?>
<?php if ($view_dashboard_service_count_list->Pager->RecordCount > 0 && $view_dashboard_service_count_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_service_count_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_count_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_service_count_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_service_count_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_count_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_count_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_count_list->pageUrl() ?>start=<?php echo $view_dashboard_service_count_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_service_count_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_count_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_count_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_count_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_service_count_list->TotalRecs > 0 && (!$view_dashboard_service_count_list->AutoHidePageSizeSelector || $view_dashboard_service_count_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_service_count">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_service_count_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_service_count_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_service_count_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_service_count_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_service_count_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_service_count_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_service_count->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_count_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_service_count_list->TotalRecs == 0 && !$view_dashboard_service_count->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_count_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_service_count_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_service_count->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dashboard_service_count->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_service_count", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_service_count_list->terminate();
?>