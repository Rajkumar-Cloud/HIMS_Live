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
$view_follow_up_list = new view_follow_up_list();

// Run the page
$view_follow_up_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_follow_up_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_follow_up->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_follow_uplist = currentForm = new ew.Form("fview_follow_uplist", "list");
fview_follow_uplist.formKeyCountName = '<?php echo $view_follow_up_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_follow_uplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_follow_uplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_follow_uplistsrch = currentSearchForm = new ew.Form("fview_follow_uplistsrch");

// Filters
fview_follow_uplistsrch.filterList = <?php echo $view_follow_up_list->getFilterList() ?>;
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
<?php if (!$view_follow_up->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_follow_up_list->TotalRecs > 0 && $view_follow_up_list->ExportOptions->visible()) { ?>
<?php $view_follow_up_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_list->ImportOptions->visible()) { ?>
<?php $view_follow_up_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_list->SearchOptions->visible()) { ?>
<?php $view_follow_up_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_list->FilterOptions->visible()) { ?>
<?php $view_follow_up_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_follow_up_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_follow_up->isExport() && !$view_follow_up->CurrentAction) { ?>
<form name="fview_follow_uplistsrch" id="fview_follow_uplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_follow_up_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_follow_uplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_follow_up">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_follow_up_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_follow_up_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_follow_up_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_follow_up_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_follow_up_list->showPageHeader(); ?>
<?php
$view_follow_up_list->showMessage();
?>
<?php if ($view_follow_up_list->TotalRecs > 0 || $view_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_follow_up_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_follow_up">
<?php if (!$view_follow_up->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_follow_up_list->Pager)) $view_follow_up_list->Pager = new NumericPager($view_follow_up_list->StartRec, $view_follow_up_list->DisplayRecs, $view_follow_up_list->TotalRecs, $view_follow_up_list->RecRange, $view_follow_up_list->AutoHidePager) ?>
<?php if ($view_follow_up_list->Pager->RecordCount > 0 && $view_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_follow_up_list->TotalRecs > 0 && (!$view_follow_up_list->AutoHidePageSizeSelector || $view_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_follow_uplist" id="fview_follow_uplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_follow_up_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_follow_up_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_follow_up">
<div id="gmp_view_follow_up" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_follow_up_list->TotalRecs > 0 || $view_follow_up->isGridEdit()) { ?>
<table id="tbl_view_follow_uplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_follow_up_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_follow_up_list->renderListOptions();

// Render list options (header, left)
$view_follow_up_list->ListOptions->render("header", "left");
?>
<?php if ($view_follow_up->id->Visible) { // id ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_follow_up->id->headerCellClass() ?>"><div id="elh_view_follow_up_id" class="view_follow_up_id"><div class="ew-table-header-caption"><?php echo $view_follow_up->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_follow_up->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->id) ?>',1);"><div id="elh_view_follow_up_id" class="view_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->Reception->Visible) { // Reception ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_follow_up->Reception->headerCellClass() ?>"><div id="elh_view_follow_up_Reception" class="view_follow_up_Reception"><div class="ew-table-header-caption"><?php echo $view_follow_up->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_follow_up->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->Reception) ?>',1);"><div id="elh_view_follow_up_Reception" class="view_follow_up_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->PatientId->Visible) { // PatientId ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_follow_up->PatientId->headerCellClass() ?>"><div id="elh_view_follow_up_PatientId" class="view_follow_up_PatientId"><div class="ew-table-header-caption"><?php echo $view_follow_up->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_follow_up->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->PatientId) ?>',1);"><div id="elh_view_follow_up_PatientId" class="view_follow_up_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->mrnno->Visible) { // mrnno ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_follow_up->mrnno->headerCellClass() ?>"><div id="elh_view_follow_up_mrnno" class="view_follow_up_mrnno"><div class="ew-table-header-caption"><?php echo $view_follow_up->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_follow_up->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->mrnno) ?>',1);"><div id="elh_view_follow_up_mrnno" class="view_follow_up_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->PatientName->Visible) { // PatientName ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_follow_up->PatientName->headerCellClass() ?>"><div id="elh_view_follow_up_PatientName" class="view_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $view_follow_up->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_follow_up->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->PatientName) ?>',1);"><div id="elh_view_follow_up_PatientName" class="view_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->Age->Visible) { // Age ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_follow_up->Age->headerCellClass() ?>"><div id="elh_view_follow_up_Age" class="view_follow_up_Age"><div class="ew-table-header-caption"><?php echo $view_follow_up->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_follow_up->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->Age) ?>',1);"><div id="elh_view_follow_up_Age" class="view_follow_up_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->Gender->Visible) { // Gender ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_follow_up->Gender->headerCellClass() ?>"><div id="elh_view_follow_up_Gender" class="view_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $view_follow_up->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_follow_up->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->Gender) ?>',1);"><div id="elh_view_follow_up_Gender" class="view_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->BP->Visible) { // BP ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $view_follow_up->BP->headerCellClass() ?>"><div id="elh_view_follow_up_BP" class="view_follow_up_BP"><div class="ew-table-header-caption"><?php echo $view_follow_up->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $view_follow_up->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->BP) ?>',1);"><div id="elh_view_follow_up_BP" class="view_follow_up_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->Pulse->Visible) { // Pulse ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $view_follow_up->Pulse->headerCellClass() ?>"><div id="elh_view_follow_up_Pulse" class="view_follow_up_Pulse"><div class="ew-table-header-caption"><?php echo $view_follow_up->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $view_follow_up->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->Pulse) ?>',1);"><div id="elh_view_follow_up_Pulse" class="view_follow_up_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->Pulse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->Pulse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->Resp->Visible) { // Resp ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->Resp) == "") { ?>
		<th data-name="Resp" class="<?php echo $view_follow_up->Resp->headerCellClass() ?>"><div id="elh_view_follow_up_Resp" class="view_follow_up_Resp"><div class="ew-table-header-caption"><?php echo $view_follow_up->Resp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resp" class="<?php echo $view_follow_up->Resp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->Resp) ?>',1);"><div id="elh_view_follow_up_Resp" class="view_follow_up_Resp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->Resp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->Resp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->Resp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->SPO2->Visible) { // SPO2 ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->SPO2) == "") { ?>
		<th data-name="SPO2" class="<?php echo $view_follow_up->SPO2->headerCellClass() ?>"><div id="elh_view_follow_up_SPO2" class="view_follow_up_SPO2"><div class="ew-table-header-caption"><?php echo $view_follow_up->SPO2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPO2" class="<?php echo $view_follow_up->SPO2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->SPO2) ?>',1);"><div id="elh_view_follow_up_SPO2" class="view_follow_up_SPO2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->SPO2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->SPO2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->SPO2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_follow_up->sortUrl($view_follow_up->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_follow_up->NextReviewDate->headerCellClass() ?>"><div id="elh_view_follow_up_NextReviewDate" class="view_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $view_follow_up->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_follow_up->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up->SortUrl($view_follow_up->NextReviewDate) ?>',1);"><div id="elh_view_follow_up_NextReviewDate" class="view_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_follow_up_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_follow_up->ExportAll && $view_follow_up->isExport()) {
	$view_follow_up_list->StopRec = $view_follow_up_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_follow_up_list->TotalRecs > $view_follow_up_list->StartRec + $view_follow_up_list->DisplayRecs - 1)
		$view_follow_up_list->StopRec = $view_follow_up_list->StartRec + $view_follow_up_list->DisplayRecs - 1;
	else
		$view_follow_up_list->StopRec = $view_follow_up_list->TotalRecs;
}
$view_follow_up_list->RecCnt = $view_follow_up_list->StartRec - 1;
if ($view_follow_up_list->Recordset && !$view_follow_up_list->Recordset->EOF) {
	$view_follow_up_list->Recordset->moveFirst();
	$selectLimit = $view_follow_up_list->UseSelectLimit;
	if (!$selectLimit && $view_follow_up_list->StartRec > 1)
		$view_follow_up_list->Recordset->move($view_follow_up_list->StartRec - 1);
} elseif (!$view_follow_up->AllowAddDeleteRow && $view_follow_up_list->StopRec == 0) {
	$view_follow_up_list->StopRec = $view_follow_up->GridAddRowCount;
}

// Initialize aggregate
$view_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$view_follow_up->resetAttributes();
$view_follow_up_list->renderRow();
while ($view_follow_up_list->RecCnt < $view_follow_up_list->StopRec) {
	$view_follow_up_list->RecCnt++;
	if ($view_follow_up_list->RecCnt >= $view_follow_up_list->StartRec) {
		$view_follow_up_list->RowCnt++;

		// Set up key count
		$view_follow_up_list->KeyCount = $view_follow_up_list->RowIndex;

		// Init row class and style
		$view_follow_up->resetAttributes();
		$view_follow_up->CssClass = "";
		if ($view_follow_up->isGridAdd()) {
		} else {
			$view_follow_up_list->loadRowValues($view_follow_up_list->Recordset); // Load row values
		}
		$view_follow_up->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_follow_up->RowAttrs = array_merge($view_follow_up->RowAttrs, array('data-rowindex'=>$view_follow_up_list->RowCnt, 'id'=>'r' . $view_follow_up_list->RowCnt . '_view_follow_up', 'data-rowtype'=>$view_follow_up->RowType));

		// Render row
		$view_follow_up_list->renderRow();

		// Render list options
		$view_follow_up_list->renderListOptions();
?>
	<tr<?php echo $view_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_follow_up_list->ListOptions->render("body", "left", $view_follow_up_list->RowCnt);
?>
	<?php if ($view_follow_up->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_follow_up->id->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_id" class="view_follow_up_id">
<span<?php echo $view_follow_up->id->viewAttributes() ?>>
<?php echo $view_follow_up->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_follow_up->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_Reception" class="view_follow_up_Reception">
<span<?php echo $view_follow_up->Reception->viewAttributes() ?>>
<?php echo $view_follow_up->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_follow_up->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_PatientId" class="view_follow_up_PatientId">
<span<?php echo $view_follow_up->PatientId->viewAttributes() ?>>
<?php echo $view_follow_up->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_follow_up->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_mrnno" class="view_follow_up_mrnno">
<span<?php echo $view_follow_up->mrnno->viewAttributes() ?>>
<?php echo $view_follow_up->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_follow_up->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_PatientName" class="view_follow_up_PatientName">
<span<?php echo $view_follow_up->PatientName->viewAttributes() ?>>
<?php echo $view_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_follow_up->Age->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_Age" class="view_follow_up_Age">
<span<?php echo $view_follow_up->Age->viewAttributes() ?>>
<?php echo $view_follow_up->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_follow_up->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_Gender" class="view_follow_up_Gender">
<span<?php echo $view_follow_up->Gender->viewAttributes() ?>>
<?php echo $view_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $view_follow_up->BP->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_BP" class="view_follow_up_BP">
<span<?php echo $view_follow_up->BP->viewAttributes() ?>>
<?php echo $view_follow_up->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse"<?php echo $view_follow_up->Pulse->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_Pulse" class="view_follow_up_Pulse">
<span<?php echo $view_follow_up->Pulse->viewAttributes() ?>>
<?php echo $view_follow_up->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->Resp->Visible) { // Resp ?>
		<td data-name="Resp"<?php echo $view_follow_up->Resp->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_Resp" class="view_follow_up_Resp">
<span<?php echo $view_follow_up->Resp->viewAttributes() ?>>
<?php echo $view_follow_up->Resp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->SPO2->Visible) { // SPO2 ?>
		<td data-name="SPO2"<?php echo $view_follow_up->SPO2->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_SPO2" class="view_follow_up_SPO2">
<span<?php echo $view_follow_up->SPO2->viewAttributes() ?>>
<?php echo $view_follow_up->SPO2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate"<?php echo $view_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_list->RowCnt ?>_view_follow_up_NextReviewDate" class="view_follow_up_NextReviewDate">
<span<?php echo $view_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $view_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_follow_up_list->ListOptions->render("body", "right", $view_follow_up_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_follow_up->isGridAdd())
		$view_follow_up_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_follow_up->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_follow_up_list->Recordset)
	$view_follow_up_list->Recordset->Close();
?>
<?php if (!$view_follow_up->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_follow_up_list->Pager)) $view_follow_up_list->Pager = new NumericPager($view_follow_up_list->StartRec, $view_follow_up_list->DisplayRecs, $view_follow_up_list->TotalRecs, $view_follow_up_list->RecRange, $view_follow_up_list->AutoHidePager) ?>
<?php if ($view_follow_up_list->Pager->RecordCount > 0 && $view_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_list->pageUrl() ?>start=<?php echo $view_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_follow_up_list->TotalRecs > 0 && (!$view_follow_up_list->AutoHidePageSizeSelector || $view_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_follow_up_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_follow_up_list->TotalRecs == 0 && !$view_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_follow_up_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_follow_up->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_follow_up->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_follow_up", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_follow_up_list->terminate();
?>