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
$view_ongoing_treatment_list = new view_ongoing_treatment_list();

// Run the page
$view_ongoing_treatment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ongoing_treatment_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ongoing_treatment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ongoing_treatmentlist = currentForm = new ew.Form("fview_ongoing_treatmentlist", "list");
fview_ongoing_treatmentlist.formKeyCountName = '<?php echo $view_ongoing_treatment_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ongoing_treatmentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ongoing_treatmentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_ongoing_treatmentlistsrch = currentSearchForm = new ew.Form("fview_ongoing_treatmentlistsrch");

// Filters
fview_ongoing_treatmentlistsrch.filterList = <?php echo $view_ongoing_treatment_list->getFilterList() ?>;
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
<?php if (!$view_ongoing_treatment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ongoing_treatment_list->TotalRecs > 0 && $view_ongoing_treatment_list->ExportOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ImportOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->SearchOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->FilterOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ongoing_treatment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ongoing_treatment->isExport() && !$view_ongoing_treatment->CurrentAction) { ?>
<form name="fview_ongoing_treatmentlistsrch" id="fview_ongoing_treatmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ongoing_treatment_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ongoing_treatmentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ongoing_treatment">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ongoing_treatment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ongoing_treatment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ongoing_treatment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ongoing_treatment_list->showPageHeader(); ?>
<?php
$view_ongoing_treatment_list->showMessage();
?>
<?php if ($view_ongoing_treatment_list->TotalRecs > 0 || $view_ongoing_treatment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ongoing_treatment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ongoing_treatment">
<?php if (!$view_ongoing_treatment->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ongoing_treatment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ongoing_treatment_list->Pager)) $view_ongoing_treatment_list->Pager = new NumericPager($view_ongoing_treatment_list->StartRec, $view_ongoing_treatment_list->DisplayRecs, $view_ongoing_treatment_list->TotalRecs, $view_ongoing_treatment_list->RecRange, $view_ongoing_treatment_list->AutoHidePager) ?>
<?php if ($view_ongoing_treatment_list->Pager->RecordCount > 0 && $view_ongoing_treatment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ongoing_treatment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ongoing_treatment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ongoing_treatment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ongoing_treatment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ongoing_treatment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ongoing_treatment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TotalRecs > 0 && (!$view_ongoing_treatment_list->AutoHidePageSizeSelector || $view_ongoing_treatment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ongoing_treatment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ongoing_treatment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ongoing_treatment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ongoing_treatment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ongoing_treatment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ongoing_treatment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ongoing_treatment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ongoing_treatment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ongoing_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ongoing_treatmentlist" id="fview_ongoing_treatmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ongoing_treatment_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ongoing_treatment_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ongoing_treatment">
<div id="gmp_view_ongoing_treatment" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ongoing_treatment_list->TotalRecs > 0 || $view_ongoing_treatment->isGridEdit()) { ?>
<table id="tbl_view_ongoing_treatmentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ongoing_treatment_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ongoing_treatment_list->renderListOptions();

// Render list options (header, left)
$view_ongoing_treatment_list->ListOptions->render("header", "left");
?>
<?php if ($view_ongoing_treatment->bid->Visible) { // bid ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->bid) == "") { ?>
		<th data-name="bid" class="<?php echo $view_ongoing_treatment->bid->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bid" class="view_ongoing_treatment_bid"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->bid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bid" class="<?php echo $view_ongoing_treatment->bid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->bid) ?>',1);"><div id="elh_view_ongoing_treatment_bid" class="view_ongoing_treatment_bid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->bid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->bid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->bid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->bPatientID->Visible) { // bPatientID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->bPatientID) == "") { ?>
		<th data-name="bPatientID" class="<?php echo $view_ongoing_treatment->bPatientID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bPatientID" class="view_ongoing_treatment_bPatientID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->bPatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bPatientID" class="<?php echo $view_ongoing_treatment->bPatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->bPatientID) ?>',1);"><div id="elh_view_ongoing_treatment_bPatientID" class="view_ongoing_treatment_bPatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->bPatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->bPatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->bPatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->title->Visible) { // title ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->title) == "") { ?>
		<th data-name="title" class="<?php echo $view_ongoing_treatment->title->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_title" class="view_ongoing_treatment_title"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $view_ongoing_treatment->title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->title) ?>',1);"><div id="elh_view_ongoing_treatment_title" class="view_ongoing_treatment_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->title->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->first_name->Visible) { // first_name ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_ongoing_treatment->first_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_first_name" class="view_ongoing_treatment_first_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_ongoing_treatment->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->first_name) ?>',1);"><div id="elh_view_ongoing_treatment_first_name" class="view_ongoing_treatment_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->middle_name->Visible) { // middle_name ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->middle_name) == "") { ?>
		<th data-name="middle_name" class="<?php echo $view_ongoing_treatment->middle_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_middle_name" class="view_ongoing_treatment_middle_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="middle_name" class="<?php echo $view_ongoing_treatment->middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->middle_name) ?>',1);"><div id="elh_view_ongoing_treatment_middle_name" class="view_ongoing_treatment_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->last_name->Visible) { // last_name ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $view_ongoing_treatment->last_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_last_name" class="view_ongoing_treatment_last_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $view_ongoing_treatment->last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->last_name) ?>',1);"><div id="elh_view_ongoing_treatment_last_name" class="view_ongoing_treatment_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->gender->Visible) { // gender ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ongoing_treatment->gender->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_gender" class="view_ongoing_treatment_gender"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ongoing_treatment->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->gender) ?>',1);"><div id="elh_view_ongoing_treatment_gender" class="view_ongoing_treatment_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->dob->Visible) { // dob ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $view_ongoing_treatment->dob->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_dob" class="view_ongoing_treatment_dob"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $view_ongoing_treatment->dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->dob) ?>',1);"><div id="elh_view_ongoing_treatment_dob" class="view_ongoing_treatment_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->bAge->Visible) { // bAge ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->bAge) == "") { ?>
		<th data-name="bAge" class="<?php echo $view_ongoing_treatment->bAge->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bAge" class="view_ongoing_treatment_bAge"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->bAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bAge" class="<?php echo $view_ongoing_treatment->bAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->bAge) ?>',1);"><div id="elh_view_ongoing_treatment_bAge" class="view_ongoing_treatment_bAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->bAge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->bAge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->bAge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->blood_group->Visible) { // blood_group ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->blood_group) == "") { ?>
		<th data-name="blood_group" class="<?php echo $view_ongoing_treatment->blood_group->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_blood_group" class="view_ongoing_treatment_blood_group"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="blood_group" class="<?php echo $view_ongoing_treatment->blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->blood_group) ?>',1);"><div id="elh_view_ongoing_treatment_blood_group" class="view_ongoing_treatment_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_ongoing_treatment->mobile_no->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_mobile_no" class="view_ongoing_treatment_mobile_no"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_ongoing_treatment->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->mobile_no) ?>',1);"><div id="elh_view_ongoing_treatment_mobile_no" class="view_ongoing_treatment_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_ongoing_treatment->IdentificationMark->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_IdentificationMark" class="view_ongoing_treatment_IdentificationMark"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_ongoing_treatment->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->IdentificationMark) ?>',1);"><div id="elh_view_ongoing_treatment_IdentificationMark" class="view_ongoing_treatment_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Religion->Visible) { // Religion ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $view_ongoing_treatment->Religion->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Religion" class="view_ongoing_treatment_Religion"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $view_ongoing_treatment->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Religion) ?>',1);"><div id="elh_view_ongoing_treatment_Religion" class="view_ongoing_treatment_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Nationality->Visible) { // Nationality ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Nationality) == "") { ?>
		<th data-name="Nationality" class="<?php echo $view_ongoing_treatment->Nationality->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Nationality" class="view_ongoing_treatment_Nationality"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Nationality->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nationality" class="<?php echo $view_ongoing_treatment->Nationality->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Nationality) ?>',1);"><div id="elh_view_ongoing_treatment_Nationality" class="view_ongoing_treatment_Nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Nationality->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Nationality->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Nationality->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->profilePic->Visible) { // profilePic ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_ongoing_treatment->profilePic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_profilePic" class="view_ongoing_treatment_profilePic"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_ongoing_treatment->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->profilePic) ?>',1);"><div id="elh_view_ongoing_treatment_profilePic" class="view_ongoing_treatment_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ongoing_treatment->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferedByDr" class="view_ongoing_treatment_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ongoing_treatment->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->ReferedByDr) ?>',1);"><div id="elh_view_ongoing_treatment_ReferedByDr" class="view_ongoing_treatment_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ongoing_treatment->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferClinicname" class="view_ongoing_treatment_ReferClinicname"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ongoing_treatment->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->ReferClinicname) ?>',1);"><div id="elh_view_ongoing_treatment_ReferClinicname" class="view_ongoing_treatment_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ongoing_treatment->ReferCity->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferCity" class="view_ongoing_treatment_ReferCity"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ongoing_treatment->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->ReferCity) ?>',1);"><div id="elh_view_ongoing_treatment_ReferCity" class="view_ongoing_treatment_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ongoing_treatment->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferMobileNo" class="view_ongoing_treatment_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ongoing_treatment->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->ReferMobileNo) ?>',1);"><div id="elh_view_ongoing_treatment_ReferMobileNo" class="view_ongoing_treatment_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ongoing_treatment->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferA4TreatingConsultant" class="view_ongoing_treatment_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ongoing_treatment->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_ongoing_treatment_ReferA4TreatingConsultant" class="view_ongoing_treatment_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ongoing_treatment->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PurposreReferredfor" class="view_ongoing_treatment_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ongoing_treatment->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PurposreReferredfor) ?>',1);"><div id="elh_view_ongoing_treatment_PurposreReferredfor" class="view_ongoing_treatment_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_title->Visible) { // spouse_title ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_title) == "") { ?>
		<th data-name="spouse_title" class="<?php echo $view_ongoing_treatment->spouse_title->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_title" class="view_ongoing_treatment_spouse_title"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_title" class="<?php echo $view_ongoing_treatment->spouse_title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_title) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_title" class="view_ongoing_treatment_spouse_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_first_name->Visible) { // spouse_first_name ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_first_name) == "") { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_ongoing_treatment->spouse_first_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_first_name" class="view_ongoing_treatment_spouse_first_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_ongoing_treatment->spouse_first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_first_name) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_first_name" class="view_ongoing_treatment_spouse_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_middle_name) == "") { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_ongoing_treatment->spouse_middle_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_middle_name" class="view_ongoing_treatment_spouse_middle_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_ongoing_treatment->spouse_middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_middle_name) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_middle_name" class="view_ongoing_treatment_spouse_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_last_name->Visible) { // spouse_last_name ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_last_name) == "") { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_ongoing_treatment->spouse_last_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_last_name" class="view_ongoing_treatment_spouse_last_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_ongoing_treatment->spouse_last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_last_name) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_last_name" class="view_ongoing_treatment_spouse_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_gender->Visible) { // spouse_gender ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_gender) == "") { ?>
		<th data-name="spouse_gender" class="<?php echo $view_ongoing_treatment->spouse_gender->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_gender" class="view_ongoing_treatment_spouse_gender"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_gender" class="<?php echo $view_ongoing_treatment->spouse_gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_gender) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_gender" class="view_ongoing_treatment_spouse_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_dob->Visible) { // spouse_dob ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_dob) == "") { ?>
		<th data-name="spouse_dob" class="<?php echo $view_ongoing_treatment->spouse_dob->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_dob" class="view_ongoing_treatment_spouse_dob"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_dob" class="<?php echo $view_ongoing_treatment->spouse_dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_dob) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_dob" class="view_ongoing_treatment_spouse_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_Age->Visible) { // spouse_Age ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_Age) == "") { ?>
		<th data-name="spouse_Age" class="<?php echo $view_ongoing_treatment->spouse_Age->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_Age" class="view_ongoing_treatment_spouse_Age"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_Age" class="<?php echo $view_ongoing_treatment->spouse_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_Age) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_Age" class="view_ongoing_treatment_spouse_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_blood_group) == "") { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_ongoing_treatment->spouse_blood_group->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_blood_group" class="view_ongoing_treatment_spouse_blood_group"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_ongoing_treatment->spouse_blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_blood_group) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_blood_group" class="view_ongoing_treatment_spouse_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_ongoing_treatment->spouse_mobile_no->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_mobile_no" class="view_ongoing_treatment_spouse_mobile_no"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_ongoing_treatment->spouse_mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_mobile_no) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_mobile_no" class="view_ongoing_treatment_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Maritalstatus->Visible) { // Maritalstatus ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Maritalstatus) == "") { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_ongoing_treatment->Maritalstatus->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Maritalstatus" class="view_ongoing_treatment_Maritalstatus"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Maritalstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_ongoing_treatment->Maritalstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Maritalstatus) ?>',1);"><div id="elh_view_ongoing_treatment_Maritalstatus" class="view_ongoing_treatment_Maritalstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Maritalstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Maritalstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Maritalstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Business->Visible) { // Business ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Business) == "") { ?>
		<th data-name="Business" class="<?php echo $view_ongoing_treatment->Business->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Business" class="view_ongoing_treatment_Business"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Business->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Business" class="<?php echo $view_ongoing_treatment->Business->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Business) ?>',1);"><div id="elh_view_ongoing_treatment_Business" class="view_ongoing_treatment_Business">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Business->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Business->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Business->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $view_ongoing_treatment->Patient_Language->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Patient_Language" class="view_ongoing_treatment_Patient_Language"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Patient_Language->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $view_ongoing_treatment->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Patient_Language) ?>',1);"><div id="elh_view_ongoing_treatment_Patient_Language" class="view_ongoing_treatment_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Patient_Language->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Patient_Language->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Patient_Language->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Passport->Visible) { // Passport ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Passport) == "") { ?>
		<th data-name="Passport" class="<?php echo $view_ongoing_treatment->Passport->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Passport" class="view_ongoing_treatment_Passport"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Passport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Passport" class="<?php echo $view_ongoing_treatment->Passport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Passport) ?>',1);"><div id="elh_view_ongoing_treatment_Passport" class="view_ongoing_treatment_Passport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Passport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Passport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Passport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->VisaNo->Visible) { // VisaNo ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->VisaNo) == "") { ?>
		<th data-name="VisaNo" class="<?php echo $view_ongoing_treatment->VisaNo->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_VisaNo" class="view_ongoing_treatment_VisaNo"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->VisaNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisaNo" class="<?php echo $view_ongoing_treatment->VisaNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->VisaNo) ?>',1);"><div id="elh_view_ongoing_treatment_VisaNo" class="view_ongoing_treatment_VisaNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->VisaNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->VisaNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->VisaNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->ValidityOfVisa) == "") { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_ongoing_treatment->ValidityOfVisa->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ValidityOfVisa" class="view_ongoing_treatment_ValidityOfVisa"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ValidityOfVisa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_ongoing_treatment->ValidityOfVisa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->ValidityOfVisa) ?>',1);"><div id="elh_view_ongoing_treatment_ValidityOfVisa" class="view_ongoing_treatment_ValidityOfVisa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ValidityOfVisa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->ValidityOfVisa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->ValidityOfVisa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_ongoing_treatment->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WhereDidYouHear" class="view_ongoing_treatment_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_ongoing_treatment->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->WhereDidYouHear) ?>',1);"><div id="elh_view_ongoing_treatment_WhereDidYouHear" class="view_ongoing_treatment_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->WhereDidYouHear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->HospID->Visible) { // HospID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ongoing_treatment->HospID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_HospID" class="view_ongoing_treatment_HospID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ongoing_treatment->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->HospID) ?>',1);"><div id="elh_view_ongoing_treatment_HospID" class="view_ongoing_treatment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->street->Visible) { // street ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_ongoing_treatment->street->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_street" class="view_ongoing_treatment_street"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_ongoing_treatment->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->street) ?>',1);"><div id="elh_view_ongoing_treatment_street" class="view_ongoing_treatment_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->town->Visible) { // town ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_ongoing_treatment->town->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_town" class="view_ongoing_treatment_town"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_ongoing_treatment->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->town) ?>',1);"><div id="elh_view_ongoing_treatment_town" class="view_ongoing_treatment_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->province->Visible) { // province ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->province) == "") { ?>
		<th data-name="province" class="<?php echo $view_ongoing_treatment->province->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_province" class="view_ongoing_treatment_province"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $view_ongoing_treatment->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->province) ?>',1);"><div id="elh_view_ongoing_treatment_province" class="view_ongoing_treatment_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->country->Visible) { // country ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->country) == "") { ?>
		<th data-name="country" class="<?php echo $view_ongoing_treatment->country->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_country" class="view_ongoing_treatment_country"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $view_ongoing_treatment->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->country) ?>',1);"><div id="elh_view_ongoing_treatment_country" class="view_ongoing_treatment_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->postal_code->Visible) { // postal_code ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $view_ongoing_treatment->postal_code->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_postal_code" class="view_ongoing_treatment_postal_code"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $view_ongoing_treatment->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->postal_code) ?>',1);"><div id="elh_view_ongoing_treatment_postal_code" class="view_ongoing_treatment_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PEmail->Visible) { // PEmail ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $view_ongoing_treatment->PEmail->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PEmail" class="view_ongoing_treatment_PEmail"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $view_ongoing_treatment->PEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PEmail) ?>',1);"><div id="elh_view_ongoing_treatment_PEmail" class="view_ongoing_treatment_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PEmergencyContact) == "") { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_ongoing_treatment->PEmergencyContact->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PEmergencyContact" class="view_ongoing_treatment_PEmergencyContact"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PEmergencyContact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_ongoing_treatment->PEmergencyContact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PEmergencyContact) ?>',1);"><div id="elh_view_ongoing_treatment_PEmergencyContact" class="view_ongoing_treatment_PEmergencyContact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PEmergencyContact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PEmergencyContact->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PEmergencyContact->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->occupation->Visible) { // occupation ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->occupation) == "") { ?>
		<th data-name="occupation" class="<?php echo $view_ongoing_treatment->occupation->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_occupation" class="view_ongoing_treatment_occupation"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="occupation" class="<?php echo $view_ongoing_treatment->occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->occupation) ?>',1);"><div id="elh_view_ongoing_treatment_occupation" class="view_ongoing_treatment_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->occupation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->occupation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->spouse_occupation->Visible) { // spouse_occupation ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->spouse_occupation) == "") { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_ongoing_treatment->spouse_occupation->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_occupation" class="view_ongoing_treatment_spouse_occupation"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_ongoing_treatment->spouse_occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->spouse_occupation) ?>',1);"><div id="elh_view_ongoing_treatment_spouse_occupation" class="view_ongoing_treatment_spouse_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->spouse_occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->spouse_occupation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->spouse_occupation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->WhatsApp->Visible) { // WhatsApp ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->WhatsApp) == "") { ?>
		<th data-name="WhatsApp" class="<?php echo $view_ongoing_treatment->WhatsApp->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WhatsApp" class="view_ongoing_treatment_WhatsApp"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->WhatsApp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhatsApp" class="<?php echo $view_ongoing_treatment->WhatsApp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->WhatsApp) ?>',1);"><div id="elh_view_ongoing_treatment_WhatsApp" class="view_ongoing_treatment_WhatsApp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->WhatsApp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->WhatsApp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->WhatsApp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->CouppleID->Visible) { // CouppleID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->CouppleID) == "") { ?>
		<th data-name="CouppleID" class="<?php echo $view_ongoing_treatment->CouppleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_CouppleID" class="view_ongoing_treatment_CouppleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->CouppleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CouppleID" class="<?php echo $view_ongoing_treatment->CouppleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->CouppleID) ?>',1);"><div id="elh_view_ongoing_treatment_CouppleID" class="view_ongoing_treatment_CouppleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->CouppleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->CouppleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->CouppleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->MaleID->Visible) { // MaleID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->MaleID) == "") { ?>
		<th data-name="MaleID" class="<?php echo $view_ongoing_treatment->MaleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MaleID" class="view_ongoing_treatment_MaleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->MaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleID" class="<?php echo $view_ongoing_treatment->MaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->MaleID) ?>',1);"><div id="elh_view_ongoing_treatment_MaleID" class="view_ongoing_treatment_MaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->MaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->MaleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->MaleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->FemaleID->Visible) { // FemaleID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->FemaleID) == "") { ?>
		<th data-name="FemaleID" class="<?php echo $view_ongoing_treatment->FemaleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FemaleID" class="view_ongoing_treatment_FemaleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->FemaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleID" class="<?php echo $view_ongoing_treatment->FemaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->FemaleID) ?>',1);"><div id="elh_view_ongoing_treatment_FemaleID" class="view_ongoing_treatment_FemaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->FemaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->FemaleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->FemaleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->GroupID->Visible) { // GroupID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $view_ongoing_treatment->GroupID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_GroupID" class="view_ongoing_treatment_GroupID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->GroupID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $view_ongoing_treatment->GroupID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->GroupID) ?>',1);"><div id="elh_view_ongoing_treatment_GroupID" class="view_ongoing_treatment_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->GroupID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->GroupID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->GroupID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Relationship->Visible) { // Relationship ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Relationship) == "") { ?>
		<th data-name="Relationship" class="<?php echo $view_ongoing_treatment->Relationship->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Relationship" class="view_ongoing_treatment_Relationship"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Relationship" class="<?php echo $view_ongoing_treatment->Relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Relationship) ?>',1);"><div id="elh_view_ongoing_treatment_Relationship" class="view_ongoing_treatment_Relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Relationship->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Relationship->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->FacebookID->Visible) { // FacebookID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->FacebookID) == "") { ?>
		<th data-name="FacebookID" class="<?php echo $view_ongoing_treatment->FacebookID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FacebookID" class="view_ongoing_treatment_FacebookID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->FacebookID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FacebookID" class="<?php echo $view_ongoing_treatment->FacebookID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->FacebookID) ?>',1);"><div id="elh_view_ongoing_treatment_FacebookID" class="view_ongoing_treatment_FacebookID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->FacebookID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->FacebookID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->FacebookID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->id->Visible) { // id ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ongoing_treatment->id->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_id" class="view_ongoing_treatment_id"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ongoing_treatment->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->id) ?>',1);"><div id="elh_view_ongoing_treatment_id" class="view_ongoing_treatment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_ongoing_treatment->RIDNO->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_RIDNO" class="view_ongoing_treatment_RIDNO"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_ongoing_treatment->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->RIDNO) ?>',1);"><div id="elh_view_ongoing_treatment_RIDNO" class="view_ongoing_treatment_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Name->Visible) { // Name ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ongoing_treatment->Name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Name" class="view_ongoing_treatment_Name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ongoing_treatment->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Name) ?>',1);"><div id="elh_view_ongoing_treatment_Name" class="view_ongoing_treatment_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->treatment_status->Visible) { // treatment_status ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $view_ongoing_treatment->treatment_status->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_treatment_status" class="view_ongoing_treatment_treatment_status"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $view_ongoing_treatment->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->treatment_status) ?>',1);"><div id="elh_view_ongoing_treatment_treatment_status" class="view_ongoing_treatment_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->treatment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->treatment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->treatment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ongoing_treatment->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ARTCYCLE" class="view_ongoing_treatment_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ongoing_treatment->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->ARTCYCLE) ?>',1);"><div id="elh_view_ongoing_treatment_ARTCYCLE" class="view_ongoing_treatment_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->RESULT->Visible) { // RESULT ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_ongoing_treatment->RESULT->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_RESULT" class="view_ongoing_treatment_RESULT"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_ongoing_treatment->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->RESULT) ?>',1);"><div id="elh_view_ongoing_treatment_RESULT" class="view_ongoing_treatment_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->status->Visible) { // status ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ongoing_treatment->status->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_status" class="view_ongoing_treatment_status"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ongoing_treatment->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->status) ?>',1);"><div id="elh_view_ongoing_treatment_status" class="view_ongoing_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->createdby->Visible) { // createdby ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ongoing_treatment->createdby->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_createdby" class="view_ongoing_treatment_createdby"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ongoing_treatment->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->createdby) ?>',1);"><div id="elh_view_ongoing_treatment_createdby" class="view_ongoing_treatment_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ongoing_treatment->createddatetime->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_createddatetime" class="view_ongoing_treatment_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ongoing_treatment->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->createddatetime) ?>',1);"><div id="elh_view_ongoing_treatment_createddatetime" class="view_ongoing_treatment_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ongoing_treatment->modifiedby->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_modifiedby" class="view_ongoing_treatment_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ongoing_treatment->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->modifiedby) ?>',1);"><div id="elh_view_ongoing_treatment_modifiedby" class="view_ongoing_treatment_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ongoing_treatment->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_modifieddatetime" class="view_ongoing_treatment_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ongoing_treatment->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->modifieddatetime) ?>',1);"><div id="elh_view_ongoing_treatment_modifieddatetime" class="view_ongoing_treatment_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ongoing_treatment->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatmentStartDate" class="view_ongoing_treatment_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ongoing_treatment->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TreatmentStartDate) ?>',1);"><div id="elh_view_ongoing_treatment_TreatmentStartDate" class="view_ongoing_treatment_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TreatmentStartDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TreatmentStartDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TreatementStopDate) == "") { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ongoing_treatment->TreatementStopDate->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatementStopDate" class="view_ongoing_treatment_TreatementStopDate"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TreatementStopDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ongoing_treatment->TreatementStopDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TreatementStopDate) ?>',1);"><div id="elh_view_ongoing_treatment_TreatementStopDate" class="view_ongoing_treatment_TreatementStopDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TreatementStopDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TreatementStopDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TreatementStopDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TypePatient->Visible) { // TypePatient ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TypePatient) == "") { ?>
		<th data-name="TypePatient" class="<?php echo $view_ongoing_treatment->TypePatient->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TypePatient" class="view_ongoing_treatment_TypePatient"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TypePatient->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypePatient" class="<?php echo $view_ongoing_treatment->TypePatient->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TypePatient) ?>',1);"><div id="elh_view_ongoing_treatment_TypePatient" class="view_ongoing_treatment_TypePatient">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TypePatient->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TypePatient->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TypePatient->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Treatment->Visible) { // Treatment ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_ongoing_treatment->Treatment->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Treatment" class="view_ongoing_treatment_Treatment"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_ongoing_treatment->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Treatment) ?>',1);"><div id="elh_view_ongoing_treatment_Treatment" class="view_ongoing_treatment_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ongoing_treatment->TreatmentTec->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatmentTec" class="view_ongoing_treatment_TreatmentTec"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TreatmentTec->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ongoing_treatment->TreatmentTec->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TreatmentTec) ?>',1);"><div id="elh_view_ongoing_treatment_TreatmentTec" class="view_ongoing_treatment_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TreatmentTec->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TreatmentTec->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TreatmentTec->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ongoing_treatment->TypeOfCycle->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TypeOfCycle" class="view_ongoing_treatment_TypeOfCycle"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TypeOfCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ongoing_treatment->TypeOfCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TypeOfCycle) ?>',1);"><div id="elh_view_ongoing_treatment_TypeOfCycle" class="view_ongoing_treatment_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TypeOfCycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TypeOfCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TypeOfCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ongoing_treatment->SpermOrgin->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SpermOrgin" class="view_ongoing_treatment_SpermOrgin"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->SpermOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ongoing_treatment->SpermOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->SpermOrgin) ?>',1);"><div id="elh_view_ongoing_treatment_SpermOrgin" class="view_ongoing_treatment_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->SpermOrgin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->SpermOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->SpermOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->State->Visible) { // State ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->State) == "") { ?>
		<th data-name="State" class="<?php echo $view_ongoing_treatment->State->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_State" class="view_ongoing_treatment_State"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $view_ongoing_treatment->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->State) ?>',1);"><div id="elh_view_ongoing_treatment_State" class="view_ongoing_treatment_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Origin->Visible) { // Origin ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $view_ongoing_treatment->Origin->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Origin" class="view_ongoing_treatment_Origin"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $view_ongoing_treatment->Origin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Origin) ?>',1);"><div id="elh_view_ongoing_treatment_Origin" class="view_ongoing_treatment_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Origin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Origin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Origin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->MACS->Visible) { // MACS ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $view_ongoing_treatment->MACS->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MACS" class="view_ongoing_treatment_MACS"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->MACS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $view_ongoing_treatment->MACS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->MACS) ?>',1);"><div id="elh_view_ongoing_treatment_MACS" class="view_ongoing_treatment_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->MACS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->MACS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->MACS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Technique->Visible) { // Technique ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $view_ongoing_treatment->Technique->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Technique" class="view_ongoing_treatment_Technique"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Technique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $view_ongoing_treatment->Technique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Technique) ?>',1);"><div id="elh_view_ongoing_treatment_Technique" class="view_ongoing_treatment_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Technique->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Technique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Technique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ongoing_treatment->PgdPlanning->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PgdPlanning" class="view_ongoing_treatment_PgdPlanning"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PgdPlanning->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ongoing_treatment->PgdPlanning->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PgdPlanning) ?>',1);"><div id="elh_view_ongoing_treatment_PgdPlanning" class="view_ongoing_treatment_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PgdPlanning->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PgdPlanning->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PgdPlanning->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->IMSI->Visible) { // IMSI ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $view_ongoing_treatment->IMSI->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_IMSI" class="view_ongoing_treatment_IMSI"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->IMSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $view_ongoing_treatment->IMSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->IMSI) ?>',1);"><div id="elh_view_ongoing_treatment_IMSI" class="view_ongoing_treatment_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->IMSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->IMSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->IMSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ongoing_treatment->SequentialCulture->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SequentialCulture" class="view_ongoing_treatment_SequentialCulture"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->SequentialCulture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ongoing_treatment->SequentialCulture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->SequentialCulture) ?>',1);"><div id="elh_view_ongoing_treatment_SequentialCulture" class="view_ongoing_treatment_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->SequentialCulture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->SequentialCulture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->SequentialCulture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ongoing_treatment->TimeLapse->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TimeLapse" class="view_ongoing_treatment_TimeLapse"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TimeLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ongoing_treatment->TimeLapse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TimeLapse) ?>',1);"><div id="elh_view_ongoing_treatment_TimeLapse" class="view_ongoing_treatment_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TimeLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TimeLapse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TimeLapse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->AH->Visible) { // AH ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $view_ongoing_treatment->AH->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_AH" class="view_ongoing_treatment_AH"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->AH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $view_ongoing_treatment->AH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->AH) ?>',1);"><div id="elh_view_ongoing_treatment_AH" class="view_ongoing_treatment_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->AH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->AH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->AH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Weight->Visible) { // Weight ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $view_ongoing_treatment->Weight->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Weight" class="view_ongoing_treatment_Weight"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $view_ongoing_treatment->Weight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Weight) ?>',1);"><div id="elh_view_ongoing_treatment_Weight" class="view_ongoing_treatment_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Weight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Weight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Weight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->BMI->Visible) { // BMI ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $view_ongoing_treatment->BMI->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_BMI" class="view_ongoing_treatment_BMI"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->BMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $view_ongoing_treatment->BMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->BMI) ?>',1);"><div id="elh_view_ongoing_treatment_BMI" class="view_ongoing_treatment_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->BMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->BMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->BMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->MaleIndications) == "") { ?>
		<th data-name="MaleIndications" class="<?php echo $view_ongoing_treatment->MaleIndications->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MaleIndications" class="view_ongoing_treatment_MaleIndications"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->MaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleIndications" class="<?php echo $view_ongoing_treatment->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->MaleIndications) ?>',1);"><div id="elh_view_ongoing_treatment_MaleIndications" class="view_ongoing_treatment_MaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->MaleIndications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->MaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->MaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->FemaleIndications) == "") { ?>
		<th data-name="FemaleIndications" class="<?php echo $view_ongoing_treatment->FemaleIndications->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FemaleIndications" class="view_ongoing_treatment_FemaleIndications"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->FemaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleIndications" class="<?php echo $view_ongoing_treatment->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->FemaleIndications) ?>',1);"><div id="elh_view_ongoing_treatment_FemaleIndications" class="view_ongoing_treatment_FemaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->FemaleIndications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->FemaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->FemaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->UseOfThe->Visible) { // UseOfThe ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->UseOfThe) == "") { ?>
		<th data-name="UseOfThe" class="<?php echo $view_ongoing_treatment->UseOfThe->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_UseOfThe" class="view_ongoing_treatment_UseOfThe"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->UseOfThe->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UseOfThe" class="<?php echo $view_ongoing_treatment->UseOfThe->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->UseOfThe) ?>',1);"><div id="elh_view_ongoing_treatment_UseOfThe" class="view_ongoing_treatment_UseOfThe">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->UseOfThe->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->UseOfThe->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->UseOfThe->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Ectopic->Visible) { // Ectopic ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Ectopic) == "") { ?>
		<th data-name="Ectopic" class="<?php echo $view_ongoing_treatment->Ectopic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Ectopic" class="view_ongoing_treatment_Ectopic"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Ectopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ectopic" class="<?php echo $view_ongoing_treatment->Ectopic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Ectopic) ?>',1);"><div id="elh_view_ongoing_treatment_Ectopic" class="view_ongoing_treatment_Ectopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Ectopic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Ectopic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Ectopic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Heterotopic->Visible) { // Heterotopic ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Heterotopic) == "") { ?>
		<th data-name="Heterotopic" class="<?php echo $view_ongoing_treatment->Heterotopic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Heterotopic" class="view_ongoing_treatment_Heterotopic"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Heterotopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Heterotopic" class="<?php echo $view_ongoing_treatment->Heterotopic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Heterotopic) ?>',1);"><div id="elh_view_ongoing_treatment_Heterotopic" class="view_ongoing_treatment_Heterotopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Heterotopic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Heterotopic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Heterotopic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TransferDFE->Visible) { // TransferDFE ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TransferDFE) == "") { ?>
		<th data-name="TransferDFE" class="<?php echo $view_ongoing_treatment->TransferDFE->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TransferDFE" class="view_ongoing_treatment_TransferDFE"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TransferDFE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferDFE" class="<?php echo $view_ongoing_treatment->TransferDFE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TransferDFE) ?>',1);"><div id="elh_view_ongoing_treatment_TransferDFE" class="view_ongoing_treatment_TransferDFE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TransferDFE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TransferDFE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TransferDFE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Evolutive->Visible) { // Evolutive ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Evolutive) == "") { ?>
		<th data-name="Evolutive" class="<?php echo $view_ongoing_treatment->Evolutive->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Evolutive" class="view_ongoing_treatment_Evolutive"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Evolutive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Evolutive" class="<?php echo $view_ongoing_treatment->Evolutive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Evolutive) ?>',1);"><div id="elh_view_ongoing_treatment_Evolutive" class="view_ongoing_treatment_Evolutive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Evolutive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Evolutive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Evolutive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->Number->Visible) { // Number ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->Number) == "") { ?>
		<th data-name="Number" class="<?php echo $view_ongoing_treatment->Number->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Number" class="view_ongoing_treatment_Number"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Number" class="<?php echo $view_ongoing_treatment->Number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->Number) ?>',1);"><div id="elh_view_ongoing_treatment_Number" class="view_ongoing_treatment_Number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->Number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->Number->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->Number->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->SequentialCult->Visible) { // SequentialCult ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->SequentialCult) == "") { ?>
		<th data-name="SequentialCult" class="<?php echo $view_ongoing_treatment->SequentialCult->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SequentialCult" class="view_ongoing_treatment_SequentialCult"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->SequentialCult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCult" class="<?php echo $view_ongoing_treatment->SequentialCult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->SequentialCult) ?>',1);"><div id="elh_view_ongoing_treatment_SequentialCult" class="view_ongoing_treatment_SequentialCult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->SequentialCult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->SequentialCult->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->SequentialCult->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->TineLapse->Visible) { // TineLapse ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->TineLapse) == "") { ?>
		<th data-name="TineLapse" class="<?php echo $view_ongoing_treatment->TineLapse->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TineLapse" class="view_ongoing_treatment_TineLapse"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TineLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TineLapse" class="<?php echo $view_ongoing_treatment->TineLapse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->TineLapse) ?>',1);"><div id="elh_view_ongoing_treatment_TineLapse" class="view_ongoing_treatment_TineLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->TineLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->TineLapse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->TineLapse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ongoing_treatment->PatientName->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PatientName" class="view_ongoing_treatment_PatientName"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ongoing_treatment->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PatientName) ?>',1);"><div id="elh_view_ongoing_treatment_PatientName" class="view_ongoing_treatment_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ongoing_treatment->PatientID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PatientID" class="view_ongoing_treatment_PatientID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ongoing_treatment->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PatientID) ?>',1);"><div id="elh_view_ongoing_treatment_PatientID" class="view_ongoing_treatment_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ongoing_treatment->PartnerName->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PartnerName" class="view_ongoing_treatment_PartnerName"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ongoing_treatment->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PartnerName) ?>',1);"><div id="elh_view_ongoing_treatment_PartnerName" class="view_ongoing_treatment_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_ongoing_treatment->PartnerID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PartnerID" class="view_ongoing_treatment_PartnerID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_ongoing_treatment->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->PartnerID) ?>',1);"><div id="elh_view_ongoing_treatment_PartnerID" class="view_ongoing_treatment_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_ongoing_treatment->WifeCell->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WifeCell" class="view_ongoing_treatment_WifeCell"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->WifeCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_ongoing_treatment->WifeCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->WifeCell) ?>',1);"><div id="elh_view_ongoing_treatment_WifeCell" class="view_ongoing_treatment_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->WifeCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->WifeCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ongoing_treatment->HusbandCell->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_HusbandCell" class="view_ongoing_treatment_HusbandCell"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->HusbandCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ongoing_treatment->HusbandCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->HusbandCell) ?>',1);"><div id="elh_view_ongoing_treatment_HusbandCell" class="view_ongoing_treatment_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->HusbandCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->HusbandCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_ongoing_treatment->sortUrl($view_ongoing_treatment->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_ongoing_treatment->CoupleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_CoupleID" class="view_ongoing_treatment_CoupleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_ongoing_treatment->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ongoing_treatment->SortUrl($view_ongoing_treatment->CoupleID) ?>',1);"><div id="elh_view_ongoing_treatment_CoupleID" class="view_ongoing_treatment_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ongoing_treatment->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ongoing_treatment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ongoing_treatment->ExportAll && $view_ongoing_treatment->isExport()) {
	$view_ongoing_treatment_list->StopRec = $view_ongoing_treatment_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ongoing_treatment_list->TotalRecs > $view_ongoing_treatment_list->StartRec + $view_ongoing_treatment_list->DisplayRecs - 1)
		$view_ongoing_treatment_list->StopRec = $view_ongoing_treatment_list->StartRec + $view_ongoing_treatment_list->DisplayRecs - 1;
	else
		$view_ongoing_treatment_list->StopRec = $view_ongoing_treatment_list->TotalRecs;
}
$view_ongoing_treatment_list->RecCnt = $view_ongoing_treatment_list->StartRec - 1;
if ($view_ongoing_treatment_list->Recordset && !$view_ongoing_treatment_list->Recordset->EOF) {
	$view_ongoing_treatment_list->Recordset->moveFirst();
	$selectLimit = $view_ongoing_treatment_list->UseSelectLimit;
	if (!$selectLimit && $view_ongoing_treatment_list->StartRec > 1)
		$view_ongoing_treatment_list->Recordset->move($view_ongoing_treatment_list->StartRec - 1);
} elseif (!$view_ongoing_treatment->AllowAddDeleteRow && $view_ongoing_treatment_list->StopRec == 0) {
	$view_ongoing_treatment_list->StopRec = $view_ongoing_treatment->GridAddRowCount;
}

// Initialize aggregate
$view_ongoing_treatment->RowType = ROWTYPE_AGGREGATEINIT;
$view_ongoing_treatment->resetAttributes();
$view_ongoing_treatment_list->renderRow();
while ($view_ongoing_treatment_list->RecCnt < $view_ongoing_treatment_list->StopRec) {
	$view_ongoing_treatment_list->RecCnt++;
	if ($view_ongoing_treatment_list->RecCnt >= $view_ongoing_treatment_list->StartRec) {
		$view_ongoing_treatment_list->RowCnt++;

		// Set up key count
		$view_ongoing_treatment_list->KeyCount = $view_ongoing_treatment_list->RowIndex;

		// Init row class and style
		$view_ongoing_treatment->resetAttributes();
		$view_ongoing_treatment->CssClass = "";
		if ($view_ongoing_treatment->isGridAdd()) {
		} else {
			$view_ongoing_treatment_list->loadRowValues($view_ongoing_treatment_list->Recordset); // Load row values
		}
		$view_ongoing_treatment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ongoing_treatment->RowAttrs = array_merge($view_ongoing_treatment->RowAttrs, array('data-rowindex'=>$view_ongoing_treatment_list->RowCnt, 'id'=>'r' . $view_ongoing_treatment_list->RowCnt . '_view_ongoing_treatment', 'data-rowtype'=>$view_ongoing_treatment->RowType));

		// Render row
		$view_ongoing_treatment_list->renderRow();

		// Render list options
		$view_ongoing_treatment_list->renderListOptions();
?>
	<tr<?php echo $view_ongoing_treatment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ongoing_treatment_list->ListOptions->render("body", "left", $view_ongoing_treatment_list->RowCnt);
?>
	<?php if ($view_ongoing_treatment->bid->Visible) { // bid ?>
		<td data-name="bid"<?php echo $view_ongoing_treatment->bid->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_bid" class="view_ongoing_treatment_bid">
<span<?php echo $view_ongoing_treatment->bid->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->bid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->bPatientID->Visible) { // bPatientID ?>
		<td data-name="bPatientID"<?php echo $view_ongoing_treatment->bPatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_bPatientID" class="view_ongoing_treatment_bPatientID">
<span<?php echo $view_ongoing_treatment->bPatientID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->bPatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->title->Visible) { // title ?>
		<td data-name="title"<?php echo $view_ongoing_treatment->title->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_title" class="view_ongoing_treatment_title">
<span<?php echo $view_ongoing_treatment->title->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_ongoing_treatment->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_first_name" class="view_ongoing_treatment_first_name">
<span<?php echo $view_ongoing_treatment->first_name->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name"<?php echo $view_ongoing_treatment->middle_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_middle_name" class="view_ongoing_treatment_middle_name">
<span<?php echo $view_ongoing_treatment->middle_name->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->last_name->Visible) { // last_name ?>
		<td data-name="last_name"<?php echo $view_ongoing_treatment->last_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_last_name" class="view_ongoing_treatment_last_name">
<span<?php echo $view_ongoing_treatment->last_name->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_ongoing_treatment->gender->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_gender" class="view_ongoing_treatment_gender">
<span<?php echo $view_ongoing_treatment->gender->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->dob->Visible) { // dob ?>
		<td data-name="dob"<?php echo $view_ongoing_treatment->dob->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_dob" class="view_ongoing_treatment_dob">
<span<?php echo $view_ongoing_treatment->dob->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->bAge->Visible) { // bAge ?>
		<td data-name="bAge"<?php echo $view_ongoing_treatment->bAge->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_bAge" class="view_ongoing_treatment_bAge">
<span<?php echo $view_ongoing_treatment->bAge->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->bAge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->blood_group->Visible) { // blood_group ?>
		<td data-name="blood_group"<?php echo $view_ongoing_treatment->blood_group->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_blood_group" class="view_ongoing_treatment_blood_group">
<span<?php echo $view_ongoing_treatment->blood_group->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_ongoing_treatment->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_mobile_no" class="view_ongoing_treatment_mobile_no">
<span<?php echo $view_ongoing_treatment->mobile_no->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $view_ongoing_treatment->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_IdentificationMark" class="view_ongoing_treatment_IdentificationMark">
<span<?php echo $view_ongoing_treatment->IdentificationMark->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Religion->Visible) { // Religion ?>
		<td data-name="Religion"<?php echo $view_ongoing_treatment->Religion->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Religion" class="view_ongoing_treatment_Religion">
<span<?php echo $view_ongoing_treatment->Religion->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Nationality->Visible) { // Nationality ?>
		<td data-name="Nationality"<?php echo $view_ongoing_treatment->Nationality->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Nationality" class="view_ongoing_treatment_Nationality">
<span<?php echo $view_ongoing_treatment->Nationality->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Nationality->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $view_ongoing_treatment->profilePic->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_profilePic" class="view_ongoing_treatment_profilePic">
<span<?php echo $view_ongoing_treatment->profilePic->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->profilePic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ongoing_treatment->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_ReferedByDr" class="view_ongoing_treatment_ReferedByDr">
<span<?php echo $view_ongoing_treatment->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_ongoing_treatment->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_ReferClinicname" class="view_ongoing_treatment_ReferClinicname">
<span<?php echo $view_ongoing_treatment->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_ongoing_treatment->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_ReferCity" class="view_ongoing_treatment_ReferCity">
<span<?php echo $view_ongoing_treatment->ReferCity->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_ongoing_treatment->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_ReferMobileNo" class="view_ongoing_treatment_ReferMobileNo">
<span<?php echo $view_ongoing_treatment->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ongoing_treatment->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_ReferA4TreatingConsultant" class="view_ongoing_treatment_ReferA4TreatingConsultant">
<span<?php echo $view_ongoing_treatment->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_ongoing_treatment->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PurposreReferredfor" class="view_ongoing_treatment_PurposreReferredfor">
<span<?php echo $view_ongoing_treatment->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_title->Visible) { // spouse_title ?>
		<td data-name="spouse_title"<?php echo $view_ongoing_treatment->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_title" class="view_ongoing_treatment_spouse_title">
<span<?php echo $view_ongoing_treatment->spouse_title->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_first_name->Visible) { // spouse_first_name ?>
		<td data-name="spouse_first_name"<?php echo $view_ongoing_treatment->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_first_name" class="view_ongoing_treatment_spouse_first_name">
<span<?php echo $view_ongoing_treatment->spouse_first_name->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td data-name="spouse_middle_name"<?php echo $view_ongoing_treatment->spouse_middle_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_middle_name" class="view_ongoing_treatment_spouse_middle_name">
<span<?php echo $view_ongoing_treatment->spouse_middle_name->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_last_name->Visible) { // spouse_last_name ?>
		<td data-name="spouse_last_name"<?php echo $view_ongoing_treatment->spouse_last_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_last_name" class="view_ongoing_treatment_spouse_last_name">
<span<?php echo $view_ongoing_treatment->spouse_last_name->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_gender->Visible) { // spouse_gender ?>
		<td data-name="spouse_gender"<?php echo $view_ongoing_treatment->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_gender" class="view_ongoing_treatment_spouse_gender">
<span<?php echo $view_ongoing_treatment->spouse_gender->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_dob->Visible) { // spouse_dob ?>
		<td data-name="spouse_dob"<?php echo $view_ongoing_treatment->spouse_dob->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_dob" class="view_ongoing_treatment_spouse_dob">
<span<?php echo $view_ongoing_treatment->spouse_dob->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_Age->Visible) { // spouse_Age ?>
		<td data-name="spouse_Age"<?php echo $view_ongoing_treatment->spouse_Age->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_Age" class="view_ongoing_treatment_spouse_Age">
<span<?php echo $view_ongoing_treatment->spouse_Age->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td data-name="spouse_blood_group"<?php echo $view_ongoing_treatment->spouse_blood_group->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_blood_group" class="view_ongoing_treatment_spouse_blood_group">
<span<?php echo $view_ongoing_treatment->spouse_blood_group->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no"<?php echo $view_ongoing_treatment->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_mobile_no" class="view_ongoing_treatment_spouse_mobile_no">
<span<?php echo $view_ongoing_treatment->spouse_mobile_no->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Maritalstatus->Visible) { // Maritalstatus ?>
		<td data-name="Maritalstatus"<?php echo $view_ongoing_treatment->Maritalstatus->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Maritalstatus" class="view_ongoing_treatment_Maritalstatus">
<span<?php echo $view_ongoing_treatment->Maritalstatus->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Maritalstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Business->Visible) { // Business ?>
		<td data-name="Business"<?php echo $view_ongoing_treatment->Business->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Business" class="view_ongoing_treatment_Business">
<span<?php echo $view_ongoing_treatment->Business->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Business->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language"<?php echo $view_ongoing_treatment->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Patient_Language" class="view_ongoing_treatment_Patient_Language">
<span<?php echo $view_ongoing_treatment->Patient_Language->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Patient_Language->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Passport->Visible) { // Passport ?>
		<td data-name="Passport"<?php echo $view_ongoing_treatment->Passport->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Passport" class="view_ongoing_treatment_Passport">
<span<?php echo $view_ongoing_treatment->Passport->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Passport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->VisaNo->Visible) { // VisaNo ?>
		<td data-name="VisaNo"<?php echo $view_ongoing_treatment->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_VisaNo" class="view_ongoing_treatment_VisaNo">
<span<?php echo $view_ongoing_treatment->VisaNo->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->VisaNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td data-name="ValidityOfVisa"<?php echo $view_ongoing_treatment->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_ValidityOfVisa" class="view_ongoing_treatment_ValidityOfVisa">
<span<?php echo $view_ongoing_treatment->ValidityOfVisa->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $view_ongoing_treatment->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_WhereDidYouHear" class="view_ongoing_treatment_WhereDidYouHear">
<span<?php echo $view_ongoing_treatment->WhereDidYouHear->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ongoing_treatment->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_HospID" class="view_ongoing_treatment_HospID">
<span<?php echo $view_ongoing_treatment->HospID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->street->Visible) { // street ?>
		<td data-name="street"<?php echo $view_ongoing_treatment->street->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_street" class="view_ongoing_treatment_street">
<span<?php echo $view_ongoing_treatment->street->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->town->Visible) { // town ?>
		<td data-name="town"<?php echo $view_ongoing_treatment->town->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_town" class="view_ongoing_treatment_town">
<span<?php echo $view_ongoing_treatment->town->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->province->Visible) { // province ?>
		<td data-name="province"<?php echo $view_ongoing_treatment->province->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_province" class="view_ongoing_treatment_province">
<span<?php echo $view_ongoing_treatment->province->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->country->Visible) { // country ?>
		<td data-name="country"<?php echo $view_ongoing_treatment->country->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_country" class="view_ongoing_treatment_country">
<span<?php echo $view_ongoing_treatment->country->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $view_ongoing_treatment->postal_code->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_postal_code" class="view_ongoing_treatment_postal_code">
<span<?php echo $view_ongoing_treatment->postal_code->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail"<?php echo $view_ongoing_treatment->PEmail->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PEmail" class="view_ongoing_treatment_PEmail">
<span<?php echo $view_ongoing_treatment->PEmail->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td data-name="PEmergencyContact"<?php echo $view_ongoing_treatment->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PEmergencyContact" class="view_ongoing_treatment_PEmergencyContact">
<span<?php echo $view_ongoing_treatment->PEmergencyContact->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->occupation->Visible) { // occupation ?>
		<td data-name="occupation"<?php echo $view_ongoing_treatment->occupation->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_occupation" class="view_ongoing_treatment_occupation">
<span<?php echo $view_ongoing_treatment->occupation->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->spouse_occupation->Visible) { // spouse_occupation ?>
		<td data-name="spouse_occupation"<?php echo $view_ongoing_treatment->spouse_occupation->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_spouse_occupation" class="view_ongoing_treatment_spouse_occupation">
<span<?php echo $view_ongoing_treatment->spouse_occupation->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->spouse_occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->WhatsApp->Visible) { // WhatsApp ?>
		<td data-name="WhatsApp"<?php echo $view_ongoing_treatment->WhatsApp->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_WhatsApp" class="view_ongoing_treatment_WhatsApp">
<span<?php echo $view_ongoing_treatment->WhatsApp->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->WhatsApp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->CouppleID->Visible) { // CouppleID ?>
		<td data-name="CouppleID"<?php echo $view_ongoing_treatment->CouppleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_CouppleID" class="view_ongoing_treatment_CouppleID">
<span<?php echo $view_ongoing_treatment->CouppleID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->CouppleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->MaleID->Visible) { // MaleID ?>
		<td data-name="MaleID"<?php echo $view_ongoing_treatment->MaleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_MaleID" class="view_ongoing_treatment_MaleID">
<span<?php echo $view_ongoing_treatment->MaleID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->MaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->FemaleID->Visible) { // FemaleID ?>
		<td data-name="FemaleID"<?php echo $view_ongoing_treatment->FemaleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_FemaleID" class="view_ongoing_treatment_FemaleID">
<span<?php echo $view_ongoing_treatment->FemaleID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->FemaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID"<?php echo $view_ongoing_treatment->GroupID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_GroupID" class="view_ongoing_treatment_GroupID">
<span<?php echo $view_ongoing_treatment->GroupID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->GroupID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Relationship->Visible) { // Relationship ?>
		<td data-name="Relationship"<?php echo $view_ongoing_treatment->Relationship->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Relationship" class="view_ongoing_treatment_Relationship">
<span<?php echo $view_ongoing_treatment->Relationship->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->FacebookID->Visible) { // FacebookID ?>
		<td data-name="FacebookID"<?php echo $view_ongoing_treatment->FacebookID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_FacebookID" class="view_ongoing_treatment_FacebookID">
<span<?php echo $view_ongoing_treatment->FacebookID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->FacebookID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ongoing_treatment->id->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_id" class="view_ongoing_treatment_id">
<span<?php echo $view_ongoing_treatment->id->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_ongoing_treatment->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_RIDNO" class="view_ongoing_treatment_RIDNO">
<span<?php echo $view_ongoing_treatment->RIDNO->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $view_ongoing_treatment->Name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Name" class="view_ongoing_treatment_Name">
<span<?php echo $view_ongoing_treatment->Name->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status"<?php echo $view_ongoing_treatment->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_treatment_status" class="view_ongoing_treatment_treatment_status">
<span<?php echo $view_ongoing_treatment->treatment_status->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $view_ongoing_treatment->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_ARTCYCLE" class="view_ongoing_treatment_ARTCYCLE">
<span<?php echo $view_ongoing_treatment->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $view_ongoing_treatment->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_RESULT" class="view_ongoing_treatment_RESULT">
<span<?php echo $view_ongoing_treatment->RESULT->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ongoing_treatment->status->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_status" class="view_ongoing_treatment_status">
<span<?php echo $view_ongoing_treatment->status->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ongoing_treatment->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_createdby" class="view_ongoing_treatment_createdby">
<span<?php echo $view_ongoing_treatment->createdby->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ongoing_treatment->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_createddatetime" class="view_ongoing_treatment_createddatetime">
<span<?php echo $view_ongoing_treatment->createddatetime->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ongoing_treatment->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_modifiedby" class="view_ongoing_treatment_modifiedby">
<span<?php echo $view_ongoing_treatment->modifiedby->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ongoing_treatment->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_modifieddatetime" class="view_ongoing_treatment_modifieddatetime">
<span<?php echo $view_ongoing_treatment->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate"<?php echo $view_ongoing_treatment->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TreatmentStartDate" class="view_ongoing_treatment_TreatmentStartDate">
<span<?php echo $view_ongoing_treatment->TreatmentStartDate->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TreatementStopDate->Visible) { // TreatementStopDate ?>
		<td data-name="TreatementStopDate"<?php echo $view_ongoing_treatment->TreatementStopDate->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TreatementStopDate" class="view_ongoing_treatment_TreatementStopDate">
<span<?php echo $view_ongoing_treatment->TreatementStopDate->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TypePatient->Visible) { // TypePatient ?>
		<td data-name="TypePatient"<?php echo $view_ongoing_treatment->TypePatient->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TypePatient" class="view_ongoing_treatment_TypePatient">
<span<?php echo $view_ongoing_treatment->TypePatient->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TypePatient->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $view_ongoing_treatment->Treatment->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Treatment" class="view_ongoing_treatment_Treatment">
<span<?php echo $view_ongoing_treatment->Treatment->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec"<?php echo $view_ongoing_treatment->TreatmentTec->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TreatmentTec" class="view_ongoing_treatment_TreatmentTec">
<span<?php echo $view_ongoing_treatment->TreatmentTec->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TreatmentTec->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle"<?php echo $view_ongoing_treatment->TypeOfCycle->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TypeOfCycle" class="view_ongoing_treatment_TypeOfCycle">
<span<?php echo $view_ongoing_treatment->TypeOfCycle->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin"<?php echo $view_ongoing_treatment->SpermOrgin->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_SpermOrgin" class="view_ongoing_treatment_SpermOrgin">
<span<?php echo $view_ongoing_treatment->SpermOrgin->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->SpermOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->State->Visible) { // State ?>
		<td data-name="State"<?php echo $view_ongoing_treatment->State->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_State" class="view_ongoing_treatment_State">
<span<?php echo $view_ongoing_treatment->State->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Origin->Visible) { // Origin ?>
		<td data-name="Origin"<?php echo $view_ongoing_treatment->Origin->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Origin" class="view_ongoing_treatment_Origin">
<span<?php echo $view_ongoing_treatment->Origin->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Origin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->MACS->Visible) { // MACS ?>
		<td data-name="MACS"<?php echo $view_ongoing_treatment->MACS->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_MACS" class="view_ongoing_treatment_MACS">
<span<?php echo $view_ongoing_treatment->MACS->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->MACS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Technique->Visible) { // Technique ?>
		<td data-name="Technique"<?php echo $view_ongoing_treatment->Technique->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Technique" class="view_ongoing_treatment_Technique">
<span<?php echo $view_ongoing_treatment->Technique->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Technique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning"<?php echo $view_ongoing_treatment->PgdPlanning->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PgdPlanning" class="view_ongoing_treatment_PgdPlanning">
<span<?php echo $view_ongoing_treatment->PgdPlanning->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PgdPlanning->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI"<?php echo $view_ongoing_treatment->IMSI->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_IMSI" class="view_ongoing_treatment_IMSI">
<span<?php echo $view_ongoing_treatment->IMSI->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->IMSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture"<?php echo $view_ongoing_treatment->SequentialCulture->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_SequentialCulture" class="view_ongoing_treatment_SequentialCulture">
<span<?php echo $view_ongoing_treatment->SequentialCulture->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->SequentialCulture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse"<?php echo $view_ongoing_treatment->TimeLapse->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TimeLapse" class="view_ongoing_treatment_TimeLapse">
<span<?php echo $view_ongoing_treatment->TimeLapse->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TimeLapse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->AH->Visible) { // AH ?>
		<td data-name="AH"<?php echo $view_ongoing_treatment->AH->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_AH" class="view_ongoing_treatment_AH">
<span<?php echo $view_ongoing_treatment->AH->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->AH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Weight->Visible) { // Weight ?>
		<td data-name="Weight"<?php echo $view_ongoing_treatment->Weight->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Weight" class="view_ongoing_treatment_Weight">
<span<?php echo $view_ongoing_treatment->Weight->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Weight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->BMI->Visible) { // BMI ?>
		<td data-name="BMI"<?php echo $view_ongoing_treatment->BMI->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_BMI" class="view_ongoing_treatment_BMI">
<span<?php echo $view_ongoing_treatment->BMI->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->BMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications"<?php echo $view_ongoing_treatment->MaleIndications->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_MaleIndications" class="view_ongoing_treatment_MaleIndications">
<span<?php echo $view_ongoing_treatment->MaleIndications->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->MaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications"<?php echo $view_ongoing_treatment->FemaleIndications->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_FemaleIndications" class="view_ongoing_treatment_FemaleIndications">
<span<?php echo $view_ongoing_treatment->FemaleIndications->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->FemaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->UseOfThe->Visible) { // UseOfThe ?>
		<td data-name="UseOfThe"<?php echo $view_ongoing_treatment->UseOfThe->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_UseOfThe" class="view_ongoing_treatment_UseOfThe">
<span<?php echo $view_ongoing_treatment->UseOfThe->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->UseOfThe->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic"<?php echo $view_ongoing_treatment->Ectopic->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Ectopic" class="view_ongoing_treatment_Ectopic">
<span<?php echo $view_ongoing_treatment->Ectopic->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Ectopic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Heterotopic->Visible) { // Heterotopic ?>
		<td data-name="Heterotopic"<?php echo $view_ongoing_treatment->Heterotopic->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Heterotopic" class="view_ongoing_treatment_Heterotopic">
<span<?php echo $view_ongoing_treatment->Heterotopic->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Heterotopic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TransferDFE->Visible) { // TransferDFE ?>
		<td data-name="TransferDFE"<?php echo $view_ongoing_treatment->TransferDFE->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TransferDFE" class="view_ongoing_treatment_TransferDFE">
<span<?php echo $view_ongoing_treatment->TransferDFE->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TransferDFE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Evolutive->Visible) { // Evolutive ?>
		<td data-name="Evolutive"<?php echo $view_ongoing_treatment->Evolutive->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Evolutive" class="view_ongoing_treatment_Evolutive">
<span<?php echo $view_ongoing_treatment->Evolutive->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Evolutive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->Number->Visible) { // Number ?>
		<td data-name="Number"<?php echo $view_ongoing_treatment->Number->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_Number" class="view_ongoing_treatment_Number">
<span<?php echo $view_ongoing_treatment->Number->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->Number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->SequentialCult->Visible) { // SequentialCult ?>
		<td data-name="SequentialCult"<?php echo $view_ongoing_treatment->SequentialCult->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_SequentialCult" class="view_ongoing_treatment_SequentialCult">
<span<?php echo $view_ongoing_treatment->SequentialCult->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->SequentialCult->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->TineLapse->Visible) { // TineLapse ?>
		<td data-name="TineLapse"<?php echo $view_ongoing_treatment->TineLapse->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_TineLapse" class="view_ongoing_treatment_TineLapse">
<span<?php echo $view_ongoing_treatment->TineLapse->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->TineLapse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_ongoing_treatment->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PatientName" class="view_ongoing_treatment_PatientName">
<span<?php echo $view_ongoing_treatment->PatientName->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ongoing_treatment->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PatientID" class="view_ongoing_treatment_PatientID">
<span<?php echo $view_ongoing_treatment->PatientID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_ongoing_treatment->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PartnerName" class="view_ongoing_treatment_PartnerName">
<span<?php echo $view_ongoing_treatment->PartnerName->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_ongoing_treatment->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_PartnerID" class="view_ongoing_treatment_PartnerID">
<span<?php echo $view_ongoing_treatment->PartnerID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell"<?php echo $view_ongoing_treatment->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_WifeCell" class="view_ongoing_treatment_WifeCell">
<span<?php echo $view_ongoing_treatment->WifeCell->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->WifeCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell"<?php echo $view_ongoing_treatment->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_HusbandCell" class="view_ongoing_treatment_HusbandCell">
<span<?php echo $view_ongoing_treatment->HusbandCell->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->HusbandCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $view_ongoing_treatment->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCnt ?>_view_ongoing_treatment_CoupleID" class="view_ongoing_treatment_CoupleID">
<span<?php echo $view_ongoing_treatment->CoupleID->viewAttributes() ?>>
<?php echo $view_ongoing_treatment->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ongoing_treatment_list->ListOptions->render("body", "right", $view_ongoing_treatment_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_ongoing_treatment->isGridAdd())
		$view_ongoing_treatment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ongoing_treatment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ongoing_treatment_list->Recordset)
	$view_ongoing_treatment_list->Recordset->Close();
?>
<?php if (!$view_ongoing_treatment->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ongoing_treatment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ongoing_treatment_list->Pager)) $view_ongoing_treatment_list->Pager = new NumericPager($view_ongoing_treatment_list->StartRec, $view_ongoing_treatment_list->DisplayRecs, $view_ongoing_treatment_list->TotalRecs, $view_ongoing_treatment_list->RecRange, $view_ongoing_treatment_list->AutoHidePager) ?>
<?php if ($view_ongoing_treatment_list->Pager->RecordCount > 0 && $view_ongoing_treatment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ongoing_treatment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ongoing_treatment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ongoing_treatment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ongoing_treatment_list->pageUrl() ?>start=<?php echo $view_ongoing_treatment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ongoing_treatment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ongoing_treatment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ongoing_treatment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TotalRecs > 0 && (!$view_ongoing_treatment_list->AutoHidePageSizeSelector || $view_ongoing_treatment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ongoing_treatment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ongoing_treatment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ongoing_treatment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ongoing_treatment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ongoing_treatment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ongoing_treatment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ongoing_treatment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ongoing_treatment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ongoing_treatment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ongoing_treatment_list->TotalRecs == 0 && !$view_ongoing_treatment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ongoing_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ongoing_treatment_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ongoing_treatment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ongoing_treatment->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ongoing_treatment", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ongoing_treatment_list->terminate();
?>