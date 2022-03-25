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
$pres_indicationstable_list = new pres_indicationstable_list();

// Run the page
$pres_indicationstable_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_indicationstable_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_indicationstable->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_indicationstablelist = currentForm = new ew.Form("fpres_indicationstablelist", "list");
fpres_indicationstablelist.formKeyCountName = '<?php echo $pres_indicationstable_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_indicationstablelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_indicationstablelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_indicationstablelistsrch = currentSearchForm = new ew.Form("fpres_indicationstablelistsrch");

// Filters
fpres_indicationstablelistsrch.filterList = <?php echo $pres_indicationstable_list->getFilterList() ?>;
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
<?php if (!$pres_indicationstable->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_indicationstable_list->TotalRecs > 0 && $pres_indicationstable_list->ExportOptions->visible()) { ?>
<?php $pres_indicationstable_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_indicationstable_list->ImportOptions->visible()) { ?>
<?php $pres_indicationstable_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_indicationstable_list->SearchOptions->visible()) { ?>
<?php $pres_indicationstable_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_indicationstable_list->FilterOptions->visible()) { ?>
<?php $pres_indicationstable_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_indicationstable_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_indicationstable->isExport() && !$pres_indicationstable->CurrentAction) { ?>
<form name="fpres_indicationstablelistsrch" id="fpres_indicationstablelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_indicationstable_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_indicationstablelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_indicationstable">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_indicationstable_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_indicationstable_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_indicationstable_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_indicationstable_list->showPageHeader(); ?>
<?php
$pres_indicationstable_list->showMessage();
?>
<?php if ($pres_indicationstable_list->TotalRecs > 0 || $pres_indicationstable->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_indicationstable_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_indicationstable">
<?php if (!$pres_indicationstable->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_indicationstable->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_indicationstable_list->Pager)) $pres_indicationstable_list->Pager = new NumericPager($pres_indicationstable_list->StartRec, $pres_indicationstable_list->DisplayRecs, $pres_indicationstable_list->TotalRecs, $pres_indicationstable_list->RecRange, $pres_indicationstable_list->AutoHidePager) ?>
<?php if ($pres_indicationstable_list->Pager->RecordCount > 0 && $pres_indicationstable_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_indicationstable_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_indicationstable_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_indicationstable_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_indicationstable_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_indicationstable_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_indicationstable_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_indicationstable_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_indicationstable_list->TotalRecs > 0 && (!$pres_indicationstable_list->AutoHidePageSizeSelector || $pres_indicationstable_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_indicationstable">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_indicationstable_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_indicationstable_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_indicationstable_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_indicationstable_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_indicationstable_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_indicationstable_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_indicationstable->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_indicationstable_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_indicationstablelist" id="fpres_indicationstablelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_indicationstable_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_indicationstable_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<div id="gmp_pres_indicationstable" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_indicationstable_list->TotalRecs > 0 || $pres_indicationstable->isGridEdit()) { ?>
<table id="tbl_pres_indicationstablelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_indicationstable_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_indicationstable_list->renderListOptions();

// Render list options (header, left)
$pres_indicationstable_list->ListOptions->render("header", "left");
?>
<?php if ($pres_indicationstable->Sno->Visible) { // Sno ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Sno) == "") { ?>
		<th data-name="Sno" class="<?php echo $pres_indicationstable->Sno->headerCellClass() ?>"><div id="elh_pres_indicationstable_Sno" class="pres_indicationstable_Sno"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Sno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sno" class="<?php echo $pres_indicationstable->Sno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Sno) ?>',1);"><div id="elh_pres_indicationstable_Sno" class="pres_indicationstable_Sno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Sno->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Sno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Sno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_indicationstable->Genericname->headerCellClass() ?>"><div id="elh_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_indicationstable->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Genericname) ?>',1);"><div id="elh_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Genericname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Genericname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Indications->Visible) { // Indications ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Indications) == "") { ?>
		<th data-name="Indications" class="<?php echo $pres_indicationstable->Indications->headerCellClass() ?>"><div id="elh_pres_indicationstable_Indications" class="pres_indicationstable_Indications"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Indications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Indications" class="<?php echo $pres_indicationstable->Indications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Indications) ?>',1);"><div id="elh_pres_indicationstable_Indications" class="pres_indicationstable_Indications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Indications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Indications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Indications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Category->Visible) { // Category ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Category) == "") { ?>
		<th data-name="Category" class="<?php echo $pres_indicationstable->Category->headerCellClass() ?>"><div id="elh_pres_indicationstable_Category" class="pres_indicationstable_Category"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Category->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Category" class="<?php echo $pres_indicationstable->Category->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Category) ?>',1);"><div id="elh_pres_indicationstable_Category" class="pres_indicationstable_Category">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Category->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Category->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Category->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Min_Age->Visible) { // Min_Age ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Min_Age) == "") { ?>
		<th data-name="Min_Age" class="<?php echo $pres_indicationstable->Min_Age->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Age" class="<?php echo $pres_indicationstable->Min_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Min_Age) ?>',1);"><div id="elh_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Min_Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Min_Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Min_Days->Visible) { // Min_Days ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Min_Days) == "") { ?>
		<th data-name="Min_Days" class="<?php echo $pres_indicationstable->Min_Days->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Days" class="<?php echo $pres_indicationstable->Min_Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Min_Days) ?>',1);"><div id="elh_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Days->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Min_Days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Min_Days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Max_Age->Visible) { // Max_Age ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Max_Age) == "") { ?>
		<th data-name="Max_Age" class="<?php echo $pres_indicationstable->Max_Age->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Age" class="<?php echo $pres_indicationstable->Max_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Max_Age) ?>',1);"><div id="elh_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Max_Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Max_Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Max_Days->Visible) { // Max_Days ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Max_Days) == "") { ?>
		<th data-name="Max_Days" class="<?php echo $pres_indicationstable->Max_Days->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Days" class="<?php echo $pres_indicationstable->Max_Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Max_Days) ?>',1);"><div id="elh_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Days->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Max_Days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Max_Days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->_Route->Visible) { // Route ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->_Route) == "") { ?>
		<th data-name="_Route" class="<?php echo $pres_indicationstable->_Route->headerCellClass() ?>"><div id="elh_pres_indicationstable__Route" class="pres_indicationstable__Route"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->_Route->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Route" class="<?php echo $pres_indicationstable->_Route->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->_Route) ?>',1);"><div id="elh_pres_indicationstable__Route" class="pres_indicationstable__Route">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->_Route->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->_Route->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->_Route->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Form->Visible) { // Form ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $pres_indicationstable->Form->headerCellClass() ?>"><div id="elh_pres_indicationstable_Form" class="pres_indicationstable_Form"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $pres_indicationstable->Form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Form) ?>',1);"><div id="elh_pres_indicationstable_Form" class="pres_indicationstable_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Form->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Form->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Form->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Min_Dose_Val) == "") { ?>
		<th data-name="Min_Dose_Val" class="<?php echo $pres_indicationstable->Min_Dose_Val->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Dose_Val->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Dose_Val" class="<?php echo $pres_indicationstable->Min_Dose_Val->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Min_Dose_Val) ?>',1);"><div id="elh_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Dose_Val->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Min_Dose_Val->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Min_Dose_Val->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Min_Dose_Unit) == "") { ?>
		<th data-name="Min_Dose_Unit" class="<?php echo $pres_indicationstable->Min_Dose_Unit->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Dose_Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Dose_Unit" class="<?php echo $pres_indicationstable->Min_Dose_Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Min_Dose_Unit) ?>',1);"><div id="elh_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Min_Dose_Unit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Min_Dose_Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Min_Dose_Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Max_Dose_Val) == "") { ?>
		<th data-name="Max_Dose_Val" class="<?php echo $pres_indicationstable->Max_Dose_Val->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Dose_Val->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Dose_Val" class="<?php echo $pres_indicationstable->Max_Dose_Val->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Max_Dose_Val) ?>',1);"><div id="elh_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Dose_Val->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Max_Dose_Val->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Max_Dose_Val->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Max_Dose_Unit) == "") { ?>
		<th data-name="Max_Dose_Unit" class="<?php echo $pres_indicationstable->Max_Dose_Unit->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Dose_Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Dose_Unit" class="<?php echo $pres_indicationstable->Max_Dose_Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Max_Dose_Unit) ?>',1);"><div id="elh_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Max_Dose_Unit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Max_Dose_Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Max_Dose_Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Frequency->Visible) { // Frequency ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Frequency) == "") { ?>
		<th data-name="Frequency" class="<?php echo $pres_indicationstable->Frequency->headerCellClass() ?>"><div id="elh_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Frequency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Frequency" class="<?php echo $pres_indicationstable->Frequency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Frequency) ?>',1);"><div id="elh_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Frequency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Frequency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Frequency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Duration->Visible) { // Duration ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $pres_indicationstable->Duration->headerCellClass() ?>"><div id="elh_pres_indicationstable_Duration" class="pres_indicationstable_Duration"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $pres_indicationstable->Duration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Duration) ?>',1);"><div id="elh_pres_indicationstable_Duration" class="pres_indicationstable_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Duration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Duration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->DWMY->Visible) { // DWMY ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->DWMY) == "") { ?>
		<th data-name="DWMY" class="<?php echo $pres_indicationstable->DWMY->headerCellClass() ?>"><div id="elh_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->DWMY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DWMY" class="<?php echo $pres_indicationstable->DWMY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->DWMY) ?>',1);"><div id="elh_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->DWMY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->DWMY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->DWMY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->Contraindications->Visible) { // Contraindications ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->Contraindications) == "") { ?>
		<th data-name="Contraindications" class="<?php echo $pres_indicationstable->Contraindications->headerCellClass() ?>"><div id="elh_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->Contraindications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contraindications" class="<?php echo $pres_indicationstable->Contraindications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->Contraindications) ?>',1);"><div id="elh_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->Contraindications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->Contraindications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->Contraindications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable->RecStatus->Visible) { // RecStatus ?>
	<?php if ($pres_indicationstable->sortUrl($pres_indicationstable->RecStatus) == "") { ?>
		<th data-name="RecStatus" class="<?php echo $pres_indicationstable->RecStatus->headerCellClass() ?>"><div id="elh_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus"><div class="ew-table-header-caption"><?php echo $pres_indicationstable->RecStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecStatus" class="<?php echo $pres_indicationstable->RecStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_indicationstable->SortUrl($pres_indicationstable->RecStatus) ?>',1);"><div id="elh_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable->RecStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable->RecStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_indicationstable->RecStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_indicationstable_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_indicationstable->ExportAll && $pres_indicationstable->isExport()) {
	$pres_indicationstable_list->StopRec = $pres_indicationstable_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_indicationstable_list->TotalRecs > $pres_indicationstable_list->StartRec + $pres_indicationstable_list->DisplayRecs - 1)
		$pres_indicationstable_list->StopRec = $pres_indicationstable_list->StartRec + $pres_indicationstable_list->DisplayRecs - 1;
	else
		$pres_indicationstable_list->StopRec = $pres_indicationstable_list->TotalRecs;
}
$pres_indicationstable_list->RecCnt = $pres_indicationstable_list->StartRec - 1;
if ($pres_indicationstable_list->Recordset && !$pres_indicationstable_list->Recordset->EOF) {
	$pres_indicationstable_list->Recordset->moveFirst();
	$selectLimit = $pres_indicationstable_list->UseSelectLimit;
	if (!$selectLimit && $pres_indicationstable_list->StartRec > 1)
		$pres_indicationstable_list->Recordset->move($pres_indicationstable_list->StartRec - 1);
} elseif (!$pres_indicationstable->AllowAddDeleteRow && $pres_indicationstable_list->StopRec == 0) {
	$pres_indicationstable_list->StopRec = $pres_indicationstable->GridAddRowCount;
}

// Initialize aggregate
$pres_indicationstable->RowType = ROWTYPE_AGGREGATEINIT;
$pres_indicationstable->resetAttributes();
$pres_indicationstable_list->renderRow();
while ($pres_indicationstable_list->RecCnt < $pres_indicationstable_list->StopRec) {
	$pres_indicationstable_list->RecCnt++;
	if ($pres_indicationstable_list->RecCnt >= $pres_indicationstable_list->StartRec) {
		$pres_indicationstable_list->RowCnt++;

		// Set up key count
		$pres_indicationstable_list->KeyCount = $pres_indicationstable_list->RowIndex;

		// Init row class and style
		$pres_indicationstable->resetAttributes();
		$pres_indicationstable->CssClass = "";
		if ($pres_indicationstable->isGridAdd()) {
		} else {
			$pres_indicationstable_list->loadRowValues($pres_indicationstable_list->Recordset); // Load row values
		}
		$pres_indicationstable->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_indicationstable->RowAttrs = array_merge($pres_indicationstable->RowAttrs, array('data-rowindex'=>$pres_indicationstable_list->RowCnt, 'id'=>'r' . $pres_indicationstable_list->RowCnt . '_pres_indicationstable', 'data-rowtype'=>$pres_indicationstable->RowType));

		// Render row
		$pres_indicationstable_list->renderRow();

		// Render list options
		$pres_indicationstable_list->renderListOptions();
?>
	<tr<?php echo $pres_indicationstable->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_indicationstable_list->ListOptions->render("body", "left", $pres_indicationstable_list->RowCnt);
?>
	<?php if ($pres_indicationstable->Sno->Visible) { // Sno ?>
		<td data-name="Sno"<?php echo $pres_indicationstable->Sno->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Sno" class="pres_indicationstable_Sno">
<span<?php echo $pres_indicationstable->Sno->viewAttributes() ?>>
<?php echo $pres_indicationstable->Sno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname"<?php echo $pres_indicationstable->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname">
<span<?php echo $pres_indicationstable->Genericname->viewAttributes() ?>>
<?php echo $pres_indicationstable->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Indications->Visible) { // Indications ?>
		<td data-name="Indications"<?php echo $pres_indicationstable->Indications->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Indications" class="pres_indicationstable_Indications">
<span<?php echo $pres_indicationstable->Indications->viewAttributes() ?>>
<?php echo $pres_indicationstable->Indications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Category->Visible) { // Category ?>
		<td data-name="Category"<?php echo $pres_indicationstable->Category->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Category" class="pres_indicationstable_Category">
<span<?php echo $pres_indicationstable->Category->viewAttributes() ?>>
<?php echo $pres_indicationstable->Category->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Min_Age->Visible) { // Min_Age ?>
		<td data-name="Min_Age"<?php echo $pres_indicationstable->Min_Age->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age">
<span<?php echo $pres_indicationstable->Min_Age->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Min_Days->Visible) { // Min_Days ?>
		<td data-name="Min_Days"<?php echo $pres_indicationstable->Min_Days->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days">
<span<?php echo $pres_indicationstable->Min_Days->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Max_Age->Visible) { // Max_Age ?>
		<td data-name="Max_Age"<?php echo $pres_indicationstable->Max_Age->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age">
<span<?php echo $pres_indicationstable->Max_Age->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Max_Days->Visible) { // Max_Days ?>
		<td data-name="Max_Days"<?php echo $pres_indicationstable->Max_Days->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days">
<span<?php echo $pres_indicationstable->Max_Days->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->_Route->Visible) { // Route ?>
		<td data-name="_Route"<?php echo $pres_indicationstable->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable__Route" class="pres_indicationstable__Route">
<span<?php echo $pres_indicationstable->_Route->viewAttributes() ?>>
<?php echo $pres_indicationstable->_Route->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Form->Visible) { // Form ?>
		<td data-name="Form"<?php echo $pres_indicationstable->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Form" class="pres_indicationstable_Form">
<span<?php echo $pres_indicationstable->Form->viewAttributes() ?>>
<?php echo $pres_indicationstable->Form->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
		<td data-name="Min_Dose_Val"<?php echo $pres_indicationstable->Min_Dose_Val->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val">
<span<?php echo $pres_indicationstable->Min_Dose_Val->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
		<td data-name="Min_Dose_Unit"<?php echo $pres_indicationstable->Min_Dose_Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit">
<span<?php echo $pres_indicationstable->Min_Dose_Unit->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
		<td data-name="Max_Dose_Val"<?php echo $pres_indicationstable->Max_Dose_Val->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val">
<span<?php echo $pres_indicationstable->Max_Dose_Val->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
		<td data-name="Max_Dose_Unit"<?php echo $pres_indicationstable->Max_Dose_Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit">
<span<?php echo $pres_indicationstable->Max_Dose_Unit->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Frequency->Visible) { // Frequency ?>
		<td data-name="Frequency"<?php echo $pres_indicationstable->Frequency->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency">
<span<?php echo $pres_indicationstable->Frequency->viewAttributes() ?>>
<?php echo $pres_indicationstable->Frequency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Duration->Visible) { // Duration ?>
		<td data-name="Duration"<?php echo $pres_indicationstable->Duration->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Duration" class="pres_indicationstable_Duration">
<span<?php echo $pres_indicationstable->Duration->viewAttributes() ?>>
<?php echo $pres_indicationstable->Duration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->DWMY->Visible) { // DWMY ?>
		<td data-name="DWMY"<?php echo $pres_indicationstable->DWMY->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY">
<span<?php echo $pres_indicationstable->DWMY->viewAttributes() ?>>
<?php echo $pres_indicationstable->DWMY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->Contraindications->Visible) { // Contraindications ?>
		<td data-name="Contraindications"<?php echo $pres_indicationstable->Contraindications->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications">
<span<?php echo $pres_indicationstable->Contraindications->viewAttributes() ?>>
<?php echo $pres_indicationstable->Contraindications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable->RecStatus->Visible) { // RecStatus ?>
		<td data-name="RecStatus"<?php echo $pres_indicationstable->RecStatus->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCnt ?>_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus">
<span<?php echo $pres_indicationstable->RecStatus->viewAttributes() ?>>
<?php echo $pres_indicationstable->RecStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_indicationstable_list->ListOptions->render("body", "right", $pres_indicationstable_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_indicationstable->isGridAdd())
		$pres_indicationstable_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_indicationstable->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_indicationstable_list->Recordset)
	$pres_indicationstable_list->Recordset->Close();
?>
<?php if (!$pres_indicationstable->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_indicationstable->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_indicationstable_list->Pager)) $pres_indicationstable_list->Pager = new NumericPager($pres_indicationstable_list->StartRec, $pres_indicationstable_list->DisplayRecs, $pres_indicationstable_list->TotalRecs, $pres_indicationstable_list->RecRange, $pres_indicationstable_list->AutoHidePager) ?>
<?php if ($pres_indicationstable_list->Pager->RecordCount > 0 && $pres_indicationstable_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_indicationstable_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_indicationstable_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_indicationstable_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_indicationstable_list->pageUrl() ?>start=<?php echo $pres_indicationstable_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_indicationstable_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_indicationstable_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_indicationstable_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_indicationstable_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_indicationstable_list->TotalRecs > 0 && (!$pres_indicationstable_list->AutoHidePageSizeSelector || $pres_indicationstable_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_indicationstable">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_indicationstable_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_indicationstable_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_indicationstable_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_indicationstable_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_indicationstable_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_indicationstable_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_indicationstable->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_indicationstable_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_indicationstable_list->TotalRecs == 0 && !$pres_indicationstable->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_indicationstable_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_indicationstable_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_indicationstable->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_indicationstable->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_indicationstable", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_indicationstable_list->terminate();
?>