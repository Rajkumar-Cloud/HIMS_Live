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
$view_template_couple_vitals_list = new view_template_couple_vitals_list();

// Run the page
$view_template_couple_vitals_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_template_couple_vitals_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_template_couple_vitals->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_template_couple_vitalslist = currentForm = new ew.Form("fview_template_couple_vitalslist", "list");
fview_template_couple_vitalslist.formKeyCountName = '<?php echo $view_template_couple_vitals_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_template_couple_vitalslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_template_couple_vitalslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_template_couple_vitalslistsrch = currentSearchForm = new ew.Form("fview_template_couple_vitalslistsrch");

// Filters
fview_template_couple_vitalslistsrch.filterList = <?php echo $view_template_couple_vitals_list->getFilterList() ?>;
</script>
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
<?php if (!$view_template_couple_vitals->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_template_couple_vitals_list->TotalRecs > 0 && $view_template_couple_vitals_list->ExportOptions->visible()) { ?>
<?php $view_template_couple_vitals_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_couple_vitals_list->ImportOptions->visible()) { ?>
<?php $view_template_couple_vitals_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_couple_vitals_list->SearchOptions->visible()) { ?>
<?php $view_template_couple_vitals_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_template_couple_vitals_list->FilterOptions->visible()) { ?>
<?php $view_template_couple_vitals_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_template_couple_vitals_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_template_couple_vitals->isExport() && !$view_template_couple_vitals->CurrentAction) { ?>
<form name="fview_template_couple_vitalslistsrch" id="fview_template_couple_vitalslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_template_couple_vitals_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_template_couple_vitalslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_template_couple_vitals">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_template_couple_vitals_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_template_couple_vitals_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_template_couple_vitals_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_template_couple_vitals_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_template_couple_vitals_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_template_couple_vitals_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_template_couple_vitals_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_template_couple_vitals_list->showPageHeader(); ?>
<?php
$view_template_couple_vitals_list->showMessage();
?>
<?php if ($view_template_couple_vitals_list->TotalRecs > 0 || $view_template_couple_vitals->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_template_couple_vitals_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_template_couple_vitals">
<?php if (!$view_template_couple_vitals->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_template_couple_vitals->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_template_couple_vitals_list->Pager)) $view_template_couple_vitals_list->Pager = new NumericPager($view_template_couple_vitals_list->StartRec, $view_template_couple_vitals_list->DisplayRecs, $view_template_couple_vitals_list->TotalRecs, $view_template_couple_vitals_list->RecRange, $view_template_couple_vitals_list->AutoHidePager) ?>
<?php if ($view_template_couple_vitals_list->Pager->RecordCount > 0 && $view_template_couple_vitals_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_template_couple_vitals_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_template_couple_vitals_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_template_couple_vitals_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_template_couple_vitals_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_template_couple_vitals_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_template_couple_vitals_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_template_couple_vitals_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_template_couple_vitals_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_template_couple_vitals_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_template_couple_vitals_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_template_couple_vitals_list->TotalRecs > 0 && (!$view_template_couple_vitals_list->AutoHidePageSizeSelector || $view_template_couple_vitals_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_template_couple_vitals">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_template_couple_vitals_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_template_couple_vitals_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_template_couple_vitals_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_template_couple_vitals_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_template_couple_vitals_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_template_couple_vitals_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_template_couple_vitals->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_template_couple_vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_template_couple_vitalslist" id="fview_template_couple_vitalslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_template_couple_vitals_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_template_couple_vitals_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_template_couple_vitals">
<div id="gmp_view_template_couple_vitals" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_template_couple_vitals_list->TotalRecs > 0 || $view_template_couple_vitals->isGridEdit()) { ?>
<table id="tbl_view_template_couple_vitalslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_template_couple_vitals_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_template_couple_vitals_list->renderListOptions();

// Render list options (header, left)
$view_template_couple_vitals_list->ListOptions->render("header", "left");
?>
<?php if ($view_template_couple_vitals->id->Visible) { // id ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_template_couple_vitals->id->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_id" class="view_template_couple_vitals_id"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_template_couple_vitals->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->id) ?>',1);"><div id="elh_view_template_couple_vitals_id" class="view_template_couple_vitals_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Male->Visible) { // Male ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Male) == "") { ?>
		<th data-name="Male" class="<?php echo $view_template_couple_vitals->Male->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Male" class="view_template_couple_vitals_Male"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Male->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Male" class="<?php echo $view_template_couple_vitals->Male->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Male) ?>',1);"><div id="elh_view_template_couple_vitals_Male" class="view_template_couple_vitals_Male">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Male->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Male->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Male->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Female->Visible) { // Female ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Female) == "") { ?>
		<th data-name="Female" class="<?php echo $view_template_couple_vitals->Female->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Female" class="view_template_couple_vitals_Female"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Female->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Female" class="<?php echo $view_template_couple_vitals->Female->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Female) ?>',1);"><div id="elh_view_template_couple_vitals_Female" class="view_template_couple_vitals_Female">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Female->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Female->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Female->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->status->Visible) { // status ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_template_couple_vitals->status->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_status" class="view_template_couple_vitals_status"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_template_couple_vitals->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->status) ?>',1);"><div id="elh_view_template_couple_vitals_status" class="view_template_couple_vitals_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->createdby->Visible) { // createdby ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_template_couple_vitals->createdby->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_createdby" class="view_template_couple_vitals_createdby"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_template_couple_vitals->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->createdby) ?>',1);"><div id="elh_view_template_couple_vitals_createdby" class="view_template_couple_vitals_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_template_couple_vitals->createddatetime->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_createddatetime" class="view_template_couple_vitals_createddatetime"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_template_couple_vitals->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->createddatetime) ?>',1);"><div id="elh_view_template_couple_vitals_createddatetime" class="view_template_couple_vitals_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_template_couple_vitals->modifiedby->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_modifiedby" class="view_template_couple_vitals_modifiedby"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_template_couple_vitals->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->modifiedby) ?>',1);"><div id="elh_view_template_couple_vitals_modifiedby" class="view_template_couple_vitals_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_template_couple_vitals->modifieddatetime->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_modifieddatetime" class="view_template_couple_vitals_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_template_couple_vitals->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->modifieddatetime) ?>',1);"><div id="elh_view_template_couple_vitals_modifieddatetime" class="view_template_couple_vitals_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->HusbandEducation->Visible) { // HusbandEducation ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->HusbandEducation) == "") { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_template_couple_vitals->HusbandEducation->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandEducation" class="view_template_couple_vitals_HusbandEducation"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandEducation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_template_couple_vitals->HusbandEducation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->HusbandEducation) ?>',1);"><div id="elh_view_template_couple_vitals_HusbandEducation" class="view_template_couple_vitals_HusbandEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->HusbandEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->HusbandEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->WifeEducation->Visible) { // WifeEducation ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->WifeEducation) == "") { ?>
		<th data-name="WifeEducation" class="<?php echo $view_template_couple_vitals->WifeEducation->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeEducation" class="view_template_couple_vitals_WifeEducation"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeEducation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEducation" class="<?php echo $view_template_couple_vitals->WifeEducation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->WifeEducation) ?>',1);"><div id="elh_view_template_couple_vitals_WifeEducation" class="view_template_couple_vitals_WifeEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->WifeEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->WifeEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->HusbandWorkHours) == "") { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_template_couple_vitals->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandWorkHours" class="view_template_couple_vitals_HusbandWorkHours"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandWorkHours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_template_couple_vitals->HusbandWorkHours->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->HusbandWorkHours) ?>',1);"><div id="elh_view_template_couple_vitals_HusbandWorkHours" class="view_template_couple_vitals_HusbandWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->HusbandWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->HusbandWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->WifeWorkHours) == "") { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_template_couple_vitals->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeWorkHours" class="view_template_couple_vitals_WifeWorkHours"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeWorkHours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_template_couple_vitals->WifeWorkHours->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->WifeWorkHours) ?>',1);"><div id="elh_view_template_couple_vitals_WifeWorkHours" class="view_template_couple_vitals_WifeWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->WifeWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->WifeWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PatientLanguage->Visible) { // PatientLanguage ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PatientLanguage) == "") { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_template_couple_vitals->PatientLanguage->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PatientLanguage" class="view_template_couple_vitals_PatientLanguage"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PatientLanguage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_template_couple_vitals->PatientLanguage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PatientLanguage) ?>',1);"><div id="elh_view_template_couple_vitals_PatientLanguage" class="view_template_couple_vitals_PatientLanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PatientLanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PatientLanguage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PatientLanguage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->ReferedBy->Visible) { // ReferedBy ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->ReferedBy) == "") { ?>
		<th data-name="ReferedBy" class="<?php echo $view_template_couple_vitals->ReferedBy->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_ReferedBy" class="view_template_couple_vitals_ReferedBy"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->ReferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedBy" class="<?php echo $view_template_couple_vitals->ReferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->ReferedBy) ?>',1);"><div id="elh_view_template_couple_vitals_ReferedBy" class="view_template_couple_vitals_ReferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->ReferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->ReferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->ReferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->ReferPhNo->Visible) { // ReferPhNo ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->ReferPhNo) == "") { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_template_couple_vitals->ReferPhNo->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_ReferPhNo" class="view_template_couple_vitals_ReferPhNo"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->ReferPhNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_template_couple_vitals->ReferPhNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->ReferPhNo) ?>',1);"><div id="elh_view_template_couple_vitals_ReferPhNo" class="view_template_couple_vitals_ReferPhNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->ReferPhNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->ReferPhNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->ReferPhNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_template_couple_vitals->WifeCell->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeCell" class="view_template_couple_vitals_WifeCell"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_template_couple_vitals->WifeCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->WifeCell) ?>',1);"><div id="elh_view_template_couple_vitals_WifeCell" class="view_template_couple_vitals_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->WifeCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->WifeCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_template_couple_vitals->HusbandCell->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandCell" class="view_template_couple_vitals_HusbandCell"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_template_couple_vitals->HusbandCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->HusbandCell) ?>',1);"><div id="elh_view_template_couple_vitals_HusbandCell" class="view_template_couple_vitals_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->HusbandCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->HusbandCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->WifeEmail->Visible) { // WifeEmail ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->WifeEmail) == "") { ?>
		<th data-name="WifeEmail" class="<?php echo $view_template_couple_vitals->WifeEmail->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeEmail" class="view_template_couple_vitals_WifeEmail"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEmail" class="<?php echo $view_template_couple_vitals->WifeEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->WifeEmail) ?>',1);"><div id="elh_view_template_couple_vitals_WifeEmail" class="view_template_couple_vitals_WifeEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->WifeEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->WifeEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->WifeEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->HusbandEmail->Visible) { // HusbandEmail ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->HusbandEmail) == "") { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_template_couple_vitals->HusbandEmail->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandEmail" class="view_template_couple_vitals_HusbandEmail"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_template_couple_vitals->HusbandEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->HusbandEmail) ?>',1);"><div id="elh_view_template_couple_vitals_HusbandEmail" class="view_template_couple_vitals_HusbandEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HusbandEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->HusbandEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->HusbandEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_template_couple_vitals->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_ARTCYCLE" class="view_template_couple_vitals_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_template_couple_vitals->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->ARTCYCLE) ?>',1);"><div id="elh_view_template_couple_vitals_ARTCYCLE" class="view_template_couple_vitals_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->RESULT->Visible) { // RESULT ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_template_couple_vitals->RESULT->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_RESULT" class="view_template_couple_vitals_RESULT"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_template_couple_vitals->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->RESULT) ?>',1);"><div id="elh_view_template_couple_vitals_RESULT" class="view_template_couple_vitals_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_template_couple_vitals->CoupleID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CoupleID" class="view_template_couple_vitals_CoupleID"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_template_couple_vitals->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->CoupleID) ?>',1);"><div id="elh_view_template_couple_vitals_CoupleID" class="view_template_couple_vitals_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->HospID->Visible) { // HospID ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_template_couple_vitals->HospID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HospID" class="view_template_couple_vitals_HospID"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_template_couple_vitals->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->HospID) ?>',1);"><div id="elh_view_template_couple_vitals_HospID" class="view_template_couple_vitals_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PatientName->Visible) { // PatientName ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_template_couple_vitals->PatientName->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PatientName" class="view_template_couple_vitals_PatientName"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_template_couple_vitals->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PatientName) ?>',1);"><div id="elh_view_template_couple_vitals_PatientName" class="view_template_couple_vitals_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PatientID->Visible) { // PatientID ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_template_couple_vitals->PatientID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PatientID" class="view_template_couple_vitals_PatientID"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_template_couple_vitals->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PatientID) ?>',1);"><div id="elh_view_template_couple_vitals_PatientID" class="view_template_couple_vitals_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_template_couple_vitals->PartnerName->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PartnerName" class="view_template_couple_vitals_PartnerName"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_template_couple_vitals->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PartnerName) ?>',1);"><div id="elh_view_template_couple_vitals_PartnerName" class="view_template_couple_vitals_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_template_couple_vitals->PartnerID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PartnerID" class="view_template_couple_vitals_PartnerID"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_template_couple_vitals->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PartnerID) ?>',1);"><div id="elh_view_template_couple_vitals_PartnerID" class="view_template_couple_vitals_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->DrID->Visible) { // DrID ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_template_couple_vitals->DrID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_DrID" class="view_template_couple_vitals_DrID"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_template_couple_vitals->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->DrID) ?>',1);"><div id="elh_view_template_couple_vitals_DrID" class="view_template_couple_vitals_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_template_couple_vitals->DrDepartment->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_DrDepartment" class="view_template_couple_vitals_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_template_couple_vitals->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->DrDepartment) ?>',1);"><div id="elh_view_template_couple_vitals_DrDepartment" class="view_template_couple_vitals_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Doctor->Visible) { // Doctor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_template_couple_vitals->Doctor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Doctor" class="view_template_couple_vitals_Doctor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_template_couple_vitals->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Doctor) ?>',1);"><div id="elh_view_template_couple_vitals_Doctor" class="view_template_couple_vitals_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->hid->Visible) { // hid ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->hid) == "") { ?>
		<th data-name="hid" class="<?php echo $view_template_couple_vitals->hid->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_hid" class="view_template_couple_vitals_hid"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->hid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hid" class="<?php echo $view_template_couple_vitals->hid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->hid) ?>',1);"><div id="elh_view_template_couple_vitals_hid" class="view_template_couple_vitals_hid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->hid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->hid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->hid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_template_couple_vitals->RIDNO->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_RIDNO" class="view_template_couple_vitals_RIDNO"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_template_couple_vitals->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->RIDNO) ?>',1);"><div id="elh_view_template_couple_vitals_RIDNO" class="view_template_couple_vitals_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Name->Visible) { // Name ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_template_couple_vitals->Name->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Name" class="view_template_couple_vitals_Name"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_template_couple_vitals->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Name) ?>',1);"><div id="elh_view_template_couple_vitals_Name" class="view_template_couple_vitals_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Age->Visible) { // Age ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_template_couple_vitals->Age->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Age" class="view_template_couple_vitals_Age"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_template_couple_vitals->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Age) ?>',1);"><div id="elh_view_template_couple_vitals_Age" class="view_template_couple_vitals_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->SEX->Visible) { // SEX ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->SEX) == "") { ?>
		<th data-name="SEX" class="<?php echo $view_template_couple_vitals->SEX->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_SEX" class="view_template_couple_vitals_SEX"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->SEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEX" class="<?php echo $view_template_couple_vitals->SEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->SEX) ?>',1);"><div id="elh_view_template_couple_vitals_SEX" class="view_template_couple_vitals_SEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->SEX->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->SEX->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->SEX->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Religion->Visible) { // Religion ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $view_template_couple_vitals->Religion->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Religion" class="view_template_couple_vitals_Religion"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $view_template_couple_vitals->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Religion) ?>',1);"><div id="elh_view_template_couple_vitals_Religion" class="view_template_couple_vitals_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Address->Visible) { // Address ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Address) == "") { ?>
		<th data-name="Address" class="<?php echo $view_template_couple_vitals->Address->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Address" class="view_template_couple_vitals_Address"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address" class="<?php echo $view_template_couple_vitals->Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Address) ?>',1);"><div id="elh_view_template_couple_vitals_Address" class="view_template_couple_vitals_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Address->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Address->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_template_couple_vitals->IdentificationMark->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_IdentificationMark" class="view_template_couple_vitals_IdentificationMark"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_template_couple_vitals->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->IdentificationMark) ?>',1);"><div id="elh_view_template_couple_vitals_IdentificationMark" class="view_template_couple_vitals_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MedicalHistory->Visible) { // MedicalHistory ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MedicalHistory) == "") { ?>
		<th data-name="MedicalHistory" class="<?php echo $view_template_couple_vitals->MedicalHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MedicalHistory" class="view_template_couple_vitals_MedicalHistory"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MedicalHistory" class="<?php echo $view_template_couple_vitals->MedicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MedicalHistory) ?>',1);"><div id="elh_view_template_couple_vitals_MedicalHistory" class="view_template_couple_vitals_MedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MedicalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MedicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MedicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->SurgicalHistory) == "") { ?>
		<th data-name="SurgicalHistory" class="<?php echo $view_template_couple_vitals->SurgicalHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_SurgicalHistory" class="view_template_couple_vitals_SurgicalHistory"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->SurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurgicalHistory" class="<?php echo $view_template_couple_vitals->SurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->SurgicalHistory) ?>',1);"><div id="elh_view_template_couple_vitals_SurgicalHistory" class="view_template_couple_vitals_SurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->SurgicalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->SurgicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->SurgicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Generalexaminationpallor) == "") { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $view_template_couple_vitals->Generalexaminationpallor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Generalexaminationpallor" class="view_template_couple_vitals_Generalexaminationpallor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Generalexaminationpallor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $view_template_couple_vitals->Generalexaminationpallor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Generalexaminationpallor) ?>',1);"><div id="elh_view_template_couple_vitals_Generalexaminationpallor" class="view_template_couple_vitals_Generalexaminationpallor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Generalexaminationpallor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Generalexaminationpallor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Generalexaminationpallor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PR->Visible) { // PR ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $view_template_couple_vitals->PR->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PR" class="view_template_couple_vitals_PR"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $view_template_couple_vitals->PR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PR) ?>',1);"><div id="elh_view_template_couple_vitals_PR" class="view_template_couple_vitals_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->CVS->Visible) { // CVS ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $view_template_couple_vitals->CVS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CVS" class="view_template_couple_vitals_CVS"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $view_template_couple_vitals->CVS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->CVS) ?>',1);"><div id="elh_view_template_couple_vitals_CVS" class="view_template_couple_vitals_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CVS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->CVS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->CVS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PA->Visible) { // PA ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $view_template_couple_vitals->PA->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PA" class="view_template_couple_vitals_PA"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $view_template_couple_vitals->PA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PA) ?>',1);"><div id="elh_view_template_couple_vitals_PA" class="view_template_couple_vitals_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PROVISIONALDIAGNOSIS) == "") { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $view_template_couple_vitals->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PROVISIONALDIAGNOSIS" class="view_template_couple_vitals_PROVISIONALDIAGNOSIS"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PROVISIONALDIAGNOSIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $view_template_couple_vitals->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PROVISIONALDIAGNOSIS) ?>',1);"><div id="elh_view_template_couple_vitals_PROVISIONALDIAGNOSIS" class="view_template_couple_vitals_PROVISIONALDIAGNOSIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PROVISIONALDIAGNOSIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PROVISIONALDIAGNOSIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PROVISIONALDIAGNOSIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Investigations->Visible) { // Investigations ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Investigations) == "") { ?>
		<th data-name="Investigations" class="<?php echo $view_template_couple_vitals->Investigations->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Investigations" class="view_template_couple_vitals_Investigations"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Investigations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investigations" class="<?php echo $view_template_couple_vitals->Investigations->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Investigations) ?>',1);"><div id="elh_view_template_couple_vitals_Investigations" class="view_template_couple_vitals_Investigations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Investigations->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Investigations->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Investigations->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Fheight->Visible) { // Fheight ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Fheight) == "") { ?>
		<th data-name="Fheight" class="<?php echo $view_template_couple_vitals->Fheight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Fheight" class="view_template_couple_vitals_Fheight"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Fheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fheight" class="<?php echo $view_template_couple_vitals->Fheight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Fheight) ?>',1);"><div id="elh_view_template_couple_vitals_Fheight" class="view_template_couple_vitals_Fheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Fheight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Fheight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Fheight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Fweight->Visible) { // Fweight ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Fweight) == "") { ?>
		<th data-name="Fweight" class="<?php echo $view_template_couple_vitals->Fweight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Fweight" class="view_template_couple_vitals_Fweight"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Fweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fweight" class="<?php echo $view_template_couple_vitals->Fweight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Fweight) ?>',1);"><div id="elh_view_template_couple_vitals_Fweight" class="view_template_couple_vitals_Fweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Fweight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Fweight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Fweight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FBMI->Visible) { // FBMI ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FBMI) == "") { ?>
		<th data-name="FBMI" class="<?php echo $view_template_couple_vitals->FBMI->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FBMI" class="view_template_couple_vitals_FBMI"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBMI" class="<?php echo $view_template_couple_vitals->FBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FBMI) ?>',1);"><div id="elh_view_template_couple_vitals_FBMI" class="view_template_couple_vitals_FBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FBloodgroup->Visible) { // FBloodgroup ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FBloodgroup) == "") { ?>
		<th data-name="FBloodgroup" class="<?php echo $view_template_couple_vitals->FBloodgroup->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FBloodgroup" class="view_template_couple_vitals_FBloodgroup"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBloodgroup" class="<?php echo $view_template_couple_vitals->FBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FBloodgroup) ?>',1);"><div id="elh_view_template_couple_vitals_FBloodgroup" class="view_template_couple_vitals_FBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FBloodgroup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Mheight->Visible) { // Mheight ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Mheight) == "") { ?>
		<th data-name="Mheight" class="<?php echo $view_template_couple_vitals->Mheight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Mheight" class="view_template_couple_vitals_Mheight"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Mheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mheight" class="<?php echo $view_template_couple_vitals->Mheight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Mheight) ?>',1);"><div id="elh_view_template_couple_vitals_Mheight" class="view_template_couple_vitals_Mheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Mheight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Mheight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Mheight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Mweight->Visible) { // Mweight ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Mweight) == "") { ?>
		<th data-name="Mweight" class="<?php echo $view_template_couple_vitals->Mweight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Mweight" class="view_template_couple_vitals_Mweight"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Mweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mweight" class="<?php echo $view_template_couple_vitals->Mweight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Mweight) ?>',1);"><div id="elh_view_template_couple_vitals_Mweight" class="view_template_couple_vitals_Mweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Mweight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Mweight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Mweight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MBMI->Visible) { // MBMI ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MBMI) == "") { ?>
		<th data-name="MBMI" class="<?php echo $view_template_couple_vitals->MBMI->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MBMI" class="view_template_couple_vitals_MBMI"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBMI" class="<?php echo $view_template_couple_vitals->MBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MBMI) ?>',1);"><div id="elh_view_template_couple_vitals_MBMI" class="view_template_couple_vitals_MBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MBMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MBMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MBloodgroup->Visible) { // MBloodgroup ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MBloodgroup) == "") { ?>
		<th data-name="MBloodgroup" class="<?php echo $view_template_couple_vitals->MBloodgroup->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MBloodgroup" class="view_template_couple_vitals_MBloodgroup"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBloodgroup" class="<?php echo $view_template_couple_vitals->MBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MBloodgroup) ?>',1);"><div id="elh_view_template_couple_vitals_MBloodgroup" class="view_template_couple_vitals_MBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MBloodgroup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FBuild->Visible) { // FBuild ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FBuild) == "") { ?>
		<th data-name="FBuild" class="<?php echo $view_template_couple_vitals->FBuild->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FBuild" class="view_template_couple_vitals_FBuild"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBuild" class="<?php echo $view_template_couple_vitals->FBuild->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FBuild) ?>',1);"><div id="elh_view_template_couple_vitals_FBuild" class="view_template_couple_vitals_FBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FBuild->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FBuild->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FBuild->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MBuild->Visible) { // MBuild ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MBuild) == "") { ?>
		<th data-name="MBuild" class="<?php echo $view_template_couple_vitals->MBuild->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MBuild" class="view_template_couple_vitals_MBuild"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBuild" class="<?php echo $view_template_couple_vitals->MBuild->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MBuild) ?>',1);"><div id="elh_view_template_couple_vitals_MBuild" class="view_template_couple_vitals_MBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MBuild->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MBuild->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MBuild->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FSkinColor->Visible) { // FSkinColor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FSkinColor) == "") { ?>
		<th data-name="FSkinColor" class="<?php echo $view_template_couple_vitals->FSkinColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FSkinColor" class="view_template_couple_vitals_FSkinColor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FSkinColor" class="<?php echo $view_template_couple_vitals->FSkinColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FSkinColor) ?>',1);"><div id="elh_view_template_couple_vitals_FSkinColor" class="view_template_couple_vitals_FSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FSkinColor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FSkinColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FSkinColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MSkinColor->Visible) { // MSkinColor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MSkinColor) == "") { ?>
		<th data-name="MSkinColor" class="<?php echo $view_template_couple_vitals->MSkinColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MSkinColor" class="view_template_couple_vitals_MSkinColor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MSkinColor" class="<?php echo $view_template_couple_vitals->MSkinColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MSkinColor) ?>',1);"><div id="elh_view_template_couple_vitals_MSkinColor" class="view_template_couple_vitals_MSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MSkinColor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MSkinColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MSkinColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FEyesColor->Visible) { // FEyesColor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FEyesColor) == "") { ?>
		<th data-name="FEyesColor" class="<?php echo $view_template_couple_vitals->FEyesColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FEyesColor" class="view_template_couple_vitals_FEyesColor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FEyesColor" class="<?php echo $view_template_couple_vitals->FEyesColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FEyesColor) ?>',1);"><div id="elh_view_template_couple_vitals_FEyesColor" class="view_template_couple_vitals_FEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FEyesColor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FEyesColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FEyesColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MEyesColor->Visible) { // MEyesColor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MEyesColor) == "") { ?>
		<th data-name="MEyesColor" class="<?php echo $view_template_couple_vitals->MEyesColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MEyesColor" class="view_template_couple_vitals_MEyesColor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MEyesColor" class="<?php echo $view_template_couple_vitals->MEyesColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MEyesColor) ?>',1);"><div id="elh_view_template_couple_vitals_MEyesColor" class="view_template_couple_vitals_MEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MEyesColor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MEyesColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MEyesColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FHairColor->Visible) { // FHairColor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FHairColor) == "") { ?>
		<th data-name="FHairColor" class="<?php echo $view_template_couple_vitals->FHairColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FHairColor" class="view_template_couple_vitals_FHairColor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FHairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FHairColor" class="<?php echo $view_template_couple_vitals->FHairColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FHairColor) ?>',1);"><div id="elh_view_template_couple_vitals_FHairColor" class="view_template_couple_vitals_FHairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FHairColor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FHairColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FHairColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MhairColor->Visible) { // MhairColor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MhairColor) == "") { ?>
		<th data-name="MhairColor" class="<?php echo $view_template_couple_vitals->MhairColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MhairColor" class="view_template_couple_vitals_MhairColor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MhairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MhairColor" class="<?php echo $view_template_couple_vitals->MhairColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MhairColor) ?>',1);"><div id="elh_view_template_couple_vitals_MhairColor" class="view_template_couple_vitals_MhairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MhairColor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MhairColor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MhairColor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FhairTexture->Visible) { // FhairTexture ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FhairTexture) == "") { ?>
		<th data-name="FhairTexture" class="<?php echo $view_template_couple_vitals->FhairTexture->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FhairTexture" class="view_template_couple_vitals_FhairTexture"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FhairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FhairTexture" class="<?php echo $view_template_couple_vitals->FhairTexture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FhairTexture) ?>',1);"><div id="elh_view_template_couple_vitals_FhairTexture" class="view_template_couple_vitals_FhairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FhairTexture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FhairTexture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FhairTexture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MHairTexture->Visible) { // MHairTexture ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MHairTexture) == "") { ?>
		<th data-name="MHairTexture" class="<?php echo $view_template_couple_vitals->MHairTexture->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MHairTexture" class="view_template_couple_vitals_MHairTexture"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MHairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MHairTexture" class="<?php echo $view_template_couple_vitals->MHairTexture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MHairTexture) ?>',1);"><div id="elh_view_template_couple_vitals_MHairTexture" class="view_template_couple_vitals_MHairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MHairTexture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MHairTexture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MHairTexture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Fothers->Visible) { // Fothers ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Fothers) == "") { ?>
		<th data-name="Fothers" class="<?php echo $view_template_couple_vitals->Fothers->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Fothers" class="view_template_couple_vitals_Fothers"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Fothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fothers" class="<?php echo $view_template_couple_vitals->Fothers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Fothers) ?>',1);"><div id="elh_view_template_couple_vitals_Fothers" class="view_template_couple_vitals_Fothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Fothers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Fothers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Fothers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Mothers->Visible) { // Mothers ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Mothers) == "") { ?>
		<th data-name="Mothers" class="<?php echo $view_template_couple_vitals->Mothers->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Mothers" class="view_template_couple_vitals_Mothers"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Mothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mothers" class="<?php echo $view_template_couple_vitals->Mothers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Mothers) ?>',1);"><div id="elh_view_template_couple_vitals_Mothers" class="view_template_couple_vitals_Mothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Mothers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Mothers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Mothers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PGE->Visible) { // PGE ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PGE) == "") { ?>
		<th data-name="PGE" class="<?php echo $view_template_couple_vitals->PGE->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PGE" class="view_template_couple_vitals_PGE"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PGE" class="<?php echo $view_template_couple_vitals->PGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PGE) ?>',1);"><div id="elh_view_template_couple_vitals_PGE" class="view_template_couple_vitals_PGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PGE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PGE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PGE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PPR->Visible) { // PPR ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PPR) == "") { ?>
		<th data-name="PPR" class="<?php echo $view_template_couple_vitals->PPR->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPR" class="view_template_couple_vitals_PPR"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPR" class="<?php echo $view_template_couple_vitals->PPR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PPR) ?>',1);"><div id="elh_view_template_couple_vitals_PPR" class="view_template_couple_vitals_PPR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PPR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PPR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PBP->Visible) { // PBP ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PBP) == "") { ?>
		<th data-name="PBP" class="<?php echo $view_template_couple_vitals->PBP->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PBP" class="view_template_couple_vitals_PBP"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PBP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PBP" class="<?php echo $view_template_couple_vitals->PBP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PBP) ?>',1);"><div id="elh_view_template_couple_vitals_PBP" class="view_template_couple_vitals_PBP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PBP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PBP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PBP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Breast->Visible) { // Breast ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Breast) == "") { ?>
		<th data-name="Breast" class="<?php echo $view_template_couple_vitals->Breast->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Breast" class="view_template_couple_vitals_Breast"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Breast->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Breast" class="<?php echo $view_template_couple_vitals->Breast->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Breast) ?>',1);"><div id="elh_view_template_couple_vitals_Breast" class="view_template_couple_vitals_Breast">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Breast->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Breast->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Breast->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PPA->Visible) { // PPA ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PPA) == "") { ?>
		<th data-name="PPA" class="<?php echo $view_template_couple_vitals->PPA->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPA" class="view_template_couple_vitals_PPA"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPA" class="<?php echo $view_template_couple_vitals->PPA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PPA) ?>',1);"><div id="elh_view_template_couple_vitals_PPA" class="view_template_couple_vitals_PPA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PPA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PPA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PPSV->Visible) { // PPSV ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PPSV) == "") { ?>
		<th data-name="PPSV" class="<?php echo $view_template_couple_vitals->PPSV->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPSV" class="view_template_couple_vitals_PPSV"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPSV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPSV" class="<?php echo $view_template_couple_vitals->PPSV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PPSV) ?>',1);"><div id="elh_view_template_couple_vitals_PPSV" class="view_template_couple_vitals_PPSV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPSV->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PPSV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PPSV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PPAPSMEAR) == "") { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $view_template_couple_vitals->PPAPSMEAR->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPAPSMEAR" class="view_template_couple_vitals_PPAPSMEAR"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPAPSMEAR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $view_template_couple_vitals->PPAPSMEAR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PPAPSMEAR) ?>',1);"><div id="elh_view_template_couple_vitals_PPAPSMEAR" class="view_template_couple_vitals_PPAPSMEAR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PPAPSMEAR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PPAPSMEAR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PPAPSMEAR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PTHYROID->Visible) { // PTHYROID ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PTHYROID) == "") { ?>
		<th data-name="PTHYROID" class="<?php echo $view_template_couple_vitals->PTHYROID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PTHYROID" class="view_template_couple_vitals_PTHYROID"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTHYROID" class="<?php echo $view_template_couple_vitals->PTHYROID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PTHYROID) ?>',1);"><div id="elh_view_template_couple_vitals_PTHYROID" class="view_template_couple_vitals_PTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PTHYROID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PTHYROID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PTHYROID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MTHYROID->Visible) { // MTHYROID ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MTHYROID) == "") { ?>
		<th data-name="MTHYROID" class="<?php echo $view_template_couple_vitals->MTHYROID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MTHYROID" class="view_template_couple_vitals_MTHYROID"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MTHYROID" class="<?php echo $view_template_couple_vitals->MTHYROID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MTHYROID) ?>',1);"><div id="elh_view_template_couple_vitals_MTHYROID" class="view_template_couple_vitals_MTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MTHYROID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MTHYROID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MTHYROID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->SecSexCharacters) == "") { ?>
		<th data-name="SecSexCharacters" class="<?php echo $view_template_couple_vitals->SecSexCharacters->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_SecSexCharacters" class="view_template_couple_vitals_SecSexCharacters"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->SecSexCharacters->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecSexCharacters" class="<?php echo $view_template_couple_vitals->SecSexCharacters->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->SecSexCharacters) ?>',1);"><div id="elh_view_template_couple_vitals_SecSexCharacters" class="view_template_couple_vitals_SecSexCharacters">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->SecSexCharacters->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->SecSexCharacters->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->SecSexCharacters->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->PenisUM->Visible) { // PenisUM ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->PenisUM) == "") { ?>
		<th data-name="PenisUM" class="<?php echo $view_template_couple_vitals->PenisUM->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PenisUM" class="view_template_couple_vitals_PenisUM"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PenisUM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PenisUM" class="<?php echo $view_template_couple_vitals->PenisUM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->PenisUM) ?>',1);"><div id="elh_view_template_couple_vitals_PenisUM" class="view_template_couple_vitals_PenisUM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->PenisUM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->PenisUM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->PenisUM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->VAS->Visible) { // VAS ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->VAS) == "") { ?>
		<th data-name="VAS" class="<?php echo $view_template_couple_vitals->VAS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_VAS" class="view_template_couple_vitals_VAS"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->VAS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VAS" class="<?php echo $view_template_couple_vitals->VAS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->VAS) ?>',1);"><div id="elh_view_template_couple_vitals_VAS" class="view_template_couple_vitals_VAS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->VAS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->VAS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->VAS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->EPIDIDYMIS) == "") { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $view_template_couple_vitals->EPIDIDYMIS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_EPIDIDYMIS" class="view_template_couple_vitals_EPIDIDYMIS"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->EPIDIDYMIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $view_template_couple_vitals->EPIDIDYMIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->EPIDIDYMIS) ?>',1);"><div id="elh_view_template_couple_vitals_EPIDIDYMIS" class="view_template_couple_vitals_EPIDIDYMIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->EPIDIDYMIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->EPIDIDYMIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->EPIDIDYMIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Varicocele->Visible) { // Varicocele ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Varicocele) == "") { ?>
		<th data-name="Varicocele" class="<?php echo $view_template_couple_vitals->Varicocele->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Varicocele" class="view_template_couple_vitals_Varicocele"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Varicocele->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Varicocele" class="<?php echo $view_template_couple_vitals->Varicocele->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Varicocele) ?>',1);"><div id="elh_view_template_couple_vitals_Varicocele" class="view_template_couple_vitals_Varicocele">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Varicocele->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Varicocele->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Varicocele->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $view_template_couple_vitals->FamilyHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FamilyHistory" class="view_template_couple_vitals_FamilyHistory"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $view_template_couple_vitals->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->FamilyHistory) ?>',1);"><div id="elh_view_template_couple_vitals_FamilyHistory" class="view_template_couple_vitals_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->FamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->FamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->FamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Addictions->Visible) { // Addictions ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Addictions) == "") { ?>
		<th data-name="Addictions" class="<?php echo $view_template_couple_vitals->Addictions->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Addictions" class="view_template_couple_vitals_Addictions"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Addictions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Addictions" class="<?php echo $view_template_couple_vitals->Addictions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Addictions) ?>',1);"><div id="elh_view_template_couple_vitals_Addictions" class="view_template_couple_vitals_Addictions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Addictions->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Addictions->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Addictions->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Medical->Visible) { // Medical ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Medical) == "") { ?>
		<th data-name="Medical" class="<?php echo $view_template_couple_vitals->Medical->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Medical" class="view_template_couple_vitals_Medical"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Medical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medical" class="<?php echo $view_template_couple_vitals->Medical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Medical) ?>',1);"><div id="elh_view_template_couple_vitals_Medical" class="view_template_couple_vitals_Medical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Medical->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Medical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Medical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->Surgical->Visible) { // Surgical ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->Surgical) == "") { ?>
		<th data-name="Surgical" class="<?php echo $view_template_couple_vitals->Surgical->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Surgical" class="view_template_couple_vitals_Surgical"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Surgical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgical" class="<?php echo $view_template_couple_vitals->Surgical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->Surgical) ?>',1);"><div id="elh_view_template_couple_vitals_Surgical" class="view_template_couple_vitals_Surgical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->Surgical->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->Surgical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->Surgical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->CoitalHistory->Visible) { // CoitalHistory ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->CoitalHistory) == "") { ?>
		<th data-name="CoitalHistory" class="<?php echo $view_template_couple_vitals->CoitalHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CoitalHistory" class="view_template_couple_vitals_CoitalHistory"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CoitalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoitalHistory" class="<?php echo $view_template_couple_vitals->CoitalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->CoitalHistory) ?>',1);"><div id="elh_view_template_couple_vitals_CoitalHistory" class="view_template_couple_vitals_CoitalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CoitalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->CoitalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->CoitalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->MariedFor->Visible) { // MariedFor ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->MariedFor) == "") { ?>
		<th data-name="MariedFor" class="<?php echo $view_template_couple_vitals->MariedFor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MariedFor" class="view_template_couple_vitals_MariedFor"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MariedFor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MariedFor" class="<?php echo $view_template_couple_vitals->MariedFor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->MariedFor) ?>',1);"><div id="elh_view_template_couple_vitals_MariedFor" class="view_template_couple_vitals_MariedFor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->MariedFor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->MariedFor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->MariedFor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->CMNCM->Visible) { // CMNCM ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->CMNCM) == "") { ?>
		<th data-name="CMNCM" class="<?php echo $view_template_couple_vitals->CMNCM->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CMNCM" class="view_template_couple_vitals_CMNCM"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CMNCM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CMNCM" class="<?php echo $view_template_couple_vitals->CMNCM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->CMNCM) ?>',1);"><div id="elh_view_template_couple_vitals_CMNCM" class="view_template_couple_vitals_CMNCM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->CMNCM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->CMNCM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->CMNCM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->TidNo->Visible) { // TidNo ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_template_couple_vitals->TidNo->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_TidNo" class="view_template_couple_vitals_TidNo"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_template_couple_vitals->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->TidNo) ?>',1);"><div id="elh_view_template_couple_vitals_TidNo" class="view_template_couple_vitals_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->pFamilyHistory) == "") { ?>
		<th data-name="pFamilyHistory" class="<?php echo $view_template_couple_vitals->pFamilyHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_pFamilyHistory" class="view_template_couple_vitals_pFamilyHistory"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->pFamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pFamilyHistory" class="<?php echo $view_template_couple_vitals->pFamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->pFamilyHistory) ?>',1);"><div id="elh_view_template_couple_vitals_pFamilyHistory" class="view_template_couple_vitals_pFamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->pFamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->pFamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->pFamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->AntiTPO->Visible) { // AntiTPO ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->AntiTPO) == "") { ?>
		<th data-name="AntiTPO" class="<?php echo $view_template_couple_vitals->AntiTPO->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_AntiTPO" class="view_template_couple_vitals_AntiTPO"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->AntiTPO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AntiTPO" class="<?php echo $view_template_couple_vitals->AntiTPO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->AntiTPO) ?>',1);"><div id="elh_view_template_couple_vitals_AntiTPO" class="view_template_couple_vitals_AntiTPO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->AntiTPO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->AntiTPO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->AntiTPO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_template_couple_vitals->AntiTG->Visible) { // AntiTG ?>
	<?php if ($view_template_couple_vitals->sortUrl($view_template_couple_vitals->AntiTG) == "") { ?>
		<th data-name="AntiTG" class="<?php echo $view_template_couple_vitals->AntiTG->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_AntiTG" class="view_template_couple_vitals_AntiTG"><div class="ew-table-header-caption"><?php echo $view_template_couple_vitals->AntiTG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AntiTG" class="<?php echo $view_template_couple_vitals->AntiTG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_template_couple_vitals->SortUrl($view_template_couple_vitals->AntiTG) ?>',1);"><div id="elh_view_template_couple_vitals_AntiTG" class="view_template_couple_vitals_AntiTG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_template_couple_vitals->AntiTG->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_template_couple_vitals->AntiTG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_template_couple_vitals->AntiTG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_template_couple_vitals_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_template_couple_vitals->ExportAll && $view_template_couple_vitals->isExport()) {
	$view_template_couple_vitals_list->StopRec = $view_template_couple_vitals_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_template_couple_vitals_list->TotalRecs > $view_template_couple_vitals_list->StartRec + $view_template_couple_vitals_list->DisplayRecs - 1)
		$view_template_couple_vitals_list->StopRec = $view_template_couple_vitals_list->StartRec + $view_template_couple_vitals_list->DisplayRecs - 1;
	else
		$view_template_couple_vitals_list->StopRec = $view_template_couple_vitals_list->TotalRecs;
}
$view_template_couple_vitals_list->RecCnt = $view_template_couple_vitals_list->StartRec - 1;
if ($view_template_couple_vitals_list->Recordset && !$view_template_couple_vitals_list->Recordset->EOF) {
	$view_template_couple_vitals_list->Recordset->moveFirst();
	$selectLimit = $view_template_couple_vitals_list->UseSelectLimit;
	if (!$selectLimit && $view_template_couple_vitals_list->StartRec > 1)
		$view_template_couple_vitals_list->Recordset->move($view_template_couple_vitals_list->StartRec - 1);
} elseif (!$view_template_couple_vitals->AllowAddDeleteRow && $view_template_couple_vitals_list->StopRec == 0) {
	$view_template_couple_vitals_list->StopRec = $view_template_couple_vitals->GridAddRowCount;
}

// Initialize aggregate
$view_template_couple_vitals->RowType = ROWTYPE_AGGREGATEINIT;
$view_template_couple_vitals->resetAttributes();
$view_template_couple_vitals_list->renderRow();
while ($view_template_couple_vitals_list->RecCnt < $view_template_couple_vitals_list->StopRec) {
	$view_template_couple_vitals_list->RecCnt++;
	if ($view_template_couple_vitals_list->RecCnt >= $view_template_couple_vitals_list->StartRec) {
		$view_template_couple_vitals_list->RowCnt++;

		// Set up key count
		$view_template_couple_vitals_list->KeyCount = $view_template_couple_vitals_list->RowIndex;

		// Init row class and style
		$view_template_couple_vitals->resetAttributes();
		$view_template_couple_vitals->CssClass = "";
		if ($view_template_couple_vitals->isGridAdd()) {
		} else {
			$view_template_couple_vitals_list->loadRowValues($view_template_couple_vitals_list->Recordset); // Load row values
		}
		$view_template_couple_vitals->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_template_couple_vitals->RowAttrs = array_merge($view_template_couple_vitals->RowAttrs, array('data-rowindex'=>$view_template_couple_vitals_list->RowCnt, 'id'=>'r' . $view_template_couple_vitals_list->RowCnt . '_view_template_couple_vitals', 'data-rowtype'=>$view_template_couple_vitals->RowType));

		// Render row
		$view_template_couple_vitals_list->renderRow();

		// Render list options
		$view_template_couple_vitals_list->renderListOptions();
?>
	<tr<?php echo $view_template_couple_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_template_couple_vitals_list->ListOptions->render("body", "left", $view_template_couple_vitals_list->RowCnt);
?>
	<?php if ($view_template_couple_vitals->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_template_couple_vitals->id->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_id" class="view_template_couple_vitals_id">
<span<?php echo $view_template_couple_vitals->id->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Male->Visible) { // Male ?>
		<td data-name="Male"<?php echo $view_template_couple_vitals->Male->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Male" class="view_template_couple_vitals_Male">
<span<?php echo $view_template_couple_vitals->Male->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Male->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Female->Visible) { // Female ?>
		<td data-name="Female"<?php echo $view_template_couple_vitals->Female->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Female" class="view_template_couple_vitals_Female">
<span<?php echo $view_template_couple_vitals->Female->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Female->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_template_couple_vitals->status->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_status" class="view_template_couple_vitals_status">
<span<?php echo $view_template_couple_vitals->status->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_template_couple_vitals->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_createdby" class="view_template_couple_vitals_createdby">
<span<?php echo $view_template_couple_vitals->createdby->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_template_couple_vitals->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_createddatetime" class="view_template_couple_vitals_createddatetime">
<span<?php echo $view_template_couple_vitals->createddatetime->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_template_couple_vitals->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_modifiedby" class="view_template_couple_vitals_modifiedby">
<span<?php echo $view_template_couple_vitals->modifiedby->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_template_couple_vitals->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_modifieddatetime" class="view_template_couple_vitals_modifieddatetime">
<span<?php echo $view_template_couple_vitals->modifieddatetime->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->HusbandEducation->Visible) { // HusbandEducation ?>
		<td data-name="HusbandEducation"<?php echo $view_template_couple_vitals->HusbandEducation->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_HusbandEducation" class="view_template_couple_vitals_HusbandEducation">
<span<?php echo $view_template_couple_vitals->HusbandEducation->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->HusbandEducation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->WifeEducation->Visible) { // WifeEducation ?>
		<td data-name="WifeEducation"<?php echo $view_template_couple_vitals->WifeEducation->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_WifeEducation" class="view_template_couple_vitals_WifeEducation">
<span<?php echo $view_template_couple_vitals->WifeEducation->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->WifeEducation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td data-name="HusbandWorkHours"<?php echo $view_template_couple_vitals->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_HusbandWorkHours" class="view_template_couple_vitals_HusbandWorkHours">
<span<?php echo $view_template_couple_vitals->HusbandWorkHours->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td data-name="WifeWorkHours"<?php echo $view_template_couple_vitals->WifeWorkHours->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_WifeWorkHours" class="view_template_couple_vitals_WifeWorkHours">
<span<?php echo $view_template_couple_vitals->WifeWorkHours->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PatientLanguage->Visible) { // PatientLanguage ?>
		<td data-name="PatientLanguage"<?php echo $view_template_couple_vitals->PatientLanguage->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PatientLanguage" class="view_template_couple_vitals_PatientLanguage">
<span<?php echo $view_template_couple_vitals->PatientLanguage->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PatientLanguage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->ReferedBy->Visible) { // ReferedBy ?>
		<td data-name="ReferedBy"<?php echo $view_template_couple_vitals->ReferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_ReferedBy" class="view_template_couple_vitals_ReferedBy">
<span<?php echo $view_template_couple_vitals->ReferedBy->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->ReferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->ReferPhNo->Visible) { // ReferPhNo ?>
		<td data-name="ReferPhNo"<?php echo $view_template_couple_vitals->ReferPhNo->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_ReferPhNo" class="view_template_couple_vitals_ReferPhNo">
<span<?php echo $view_template_couple_vitals->ReferPhNo->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->ReferPhNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell"<?php echo $view_template_couple_vitals->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_WifeCell" class="view_template_couple_vitals_WifeCell">
<span<?php echo $view_template_couple_vitals->WifeCell->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->WifeCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell"<?php echo $view_template_couple_vitals->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_HusbandCell" class="view_template_couple_vitals_HusbandCell">
<span<?php echo $view_template_couple_vitals->HusbandCell->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->HusbandCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->WifeEmail->Visible) { // WifeEmail ?>
		<td data-name="WifeEmail"<?php echo $view_template_couple_vitals->WifeEmail->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_WifeEmail" class="view_template_couple_vitals_WifeEmail">
<span<?php echo $view_template_couple_vitals->WifeEmail->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->WifeEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->HusbandEmail->Visible) { // HusbandEmail ?>
		<td data-name="HusbandEmail"<?php echo $view_template_couple_vitals->HusbandEmail->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_HusbandEmail" class="view_template_couple_vitals_HusbandEmail">
<span<?php echo $view_template_couple_vitals->HusbandEmail->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->HusbandEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $view_template_couple_vitals->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_ARTCYCLE" class="view_template_couple_vitals_ARTCYCLE">
<span<?php echo $view_template_couple_vitals->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $view_template_couple_vitals->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_RESULT" class="view_template_couple_vitals_RESULT">
<span<?php echo $view_template_couple_vitals->RESULT->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $view_template_couple_vitals->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_CoupleID" class="view_template_couple_vitals_CoupleID">
<span<?php echo $view_template_couple_vitals->CoupleID->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_template_couple_vitals->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_HospID" class="view_template_couple_vitals_HospID">
<span<?php echo $view_template_couple_vitals->HospID->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_template_couple_vitals->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PatientName" class="view_template_couple_vitals_PatientName">
<span<?php echo $view_template_couple_vitals->PatientName->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_template_couple_vitals->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PatientID" class="view_template_couple_vitals_PatientID">
<span<?php echo $view_template_couple_vitals->PatientID->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_template_couple_vitals->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PartnerName" class="view_template_couple_vitals_PartnerName">
<span<?php echo $view_template_couple_vitals->PartnerName->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_template_couple_vitals->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PartnerID" class="view_template_couple_vitals_PartnerID">
<span<?php echo $view_template_couple_vitals->PartnerID->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_template_couple_vitals->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_DrID" class="view_template_couple_vitals_DrID">
<span<?php echo $view_template_couple_vitals->DrID->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $view_template_couple_vitals->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_DrDepartment" class="view_template_couple_vitals_DrDepartment">
<span<?php echo $view_template_couple_vitals->DrDepartment->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_template_couple_vitals->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Doctor" class="view_template_couple_vitals_Doctor">
<span<?php echo $view_template_couple_vitals->Doctor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->hid->Visible) { // hid ?>
		<td data-name="hid"<?php echo $view_template_couple_vitals->hid->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_hid" class="view_template_couple_vitals_hid">
<span<?php echo $view_template_couple_vitals->hid->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->hid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_template_couple_vitals->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_RIDNO" class="view_template_couple_vitals_RIDNO">
<span<?php echo $view_template_couple_vitals->RIDNO->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $view_template_couple_vitals->Name->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Name" class="view_template_couple_vitals_Name">
<span<?php echo $view_template_couple_vitals->Name->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_template_couple_vitals->Age->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Age" class="view_template_couple_vitals_Age">
<span<?php echo $view_template_couple_vitals->Age->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->SEX->Visible) { // SEX ?>
		<td data-name="SEX"<?php echo $view_template_couple_vitals->SEX->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_SEX" class="view_template_couple_vitals_SEX">
<span<?php echo $view_template_couple_vitals->SEX->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->SEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Religion->Visible) { // Religion ?>
		<td data-name="Religion"<?php echo $view_template_couple_vitals->Religion->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Religion" class="view_template_couple_vitals_Religion">
<span<?php echo $view_template_couple_vitals->Religion->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Address->Visible) { // Address ?>
		<td data-name="Address"<?php echo $view_template_couple_vitals->Address->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Address" class="view_template_couple_vitals_Address">
<span<?php echo $view_template_couple_vitals->Address->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $view_template_couple_vitals->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_IdentificationMark" class="view_template_couple_vitals_IdentificationMark">
<span<?php echo $view_template_couple_vitals->IdentificationMark->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MedicalHistory->Visible) { // MedicalHistory ?>
		<td data-name="MedicalHistory"<?php echo $view_template_couple_vitals->MedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MedicalHistory" class="view_template_couple_vitals_MedicalHistory">
<span<?php echo $view_template_couple_vitals->MedicalHistory->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MedicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory"<?php echo $view_template_couple_vitals->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_SurgicalHistory" class="view_template_couple_vitals_SurgicalHistory">
<span<?php echo $view_template_couple_vitals->SurgicalHistory->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td data-name="Generalexaminationpallor"<?php echo $view_template_couple_vitals->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Generalexaminationpallor" class="view_template_couple_vitals_Generalexaminationpallor">
<span<?php echo $view_template_couple_vitals->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PR->Visible) { // PR ?>
		<td data-name="PR"<?php echo $view_template_couple_vitals->PR->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PR" class="view_template_couple_vitals_PR">
<span<?php echo $view_template_couple_vitals->PR->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->CVS->Visible) { // CVS ?>
		<td data-name="CVS"<?php echo $view_template_couple_vitals->CVS->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_CVS" class="view_template_couple_vitals_CVS">
<span<?php echo $view_template_couple_vitals->CVS->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->CVS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PA->Visible) { // PA ?>
		<td data-name="PA"<?php echo $view_template_couple_vitals->PA->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PA" class="view_template_couple_vitals_PA">
<span<?php echo $view_template_couple_vitals->PA->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $view_template_couple_vitals->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PROVISIONALDIAGNOSIS" class="view_template_couple_vitals_PROVISIONALDIAGNOSIS">
<span<?php echo $view_template_couple_vitals->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Investigations->Visible) { // Investigations ?>
		<td data-name="Investigations"<?php echo $view_template_couple_vitals->Investigations->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Investigations" class="view_template_couple_vitals_Investigations">
<span<?php echo $view_template_couple_vitals->Investigations->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Investigations->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Fheight->Visible) { // Fheight ?>
		<td data-name="Fheight"<?php echo $view_template_couple_vitals->Fheight->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Fheight" class="view_template_couple_vitals_Fheight">
<span<?php echo $view_template_couple_vitals->Fheight->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Fheight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Fweight->Visible) { // Fweight ?>
		<td data-name="Fweight"<?php echo $view_template_couple_vitals->Fweight->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Fweight" class="view_template_couple_vitals_Fweight">
<span<?php echo $view_template_couple_vitals->Fweight->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Fweight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FBMI->Visible) { // FBMI ?>
		<td data-name="FBMI"<?php echo $view_template_couple_vitals->FBMI->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FBMI" class="view_template_couple_vitals_FBMI">
<span<?php echo $view_template_couple_vitals->FBMI->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FBloodgroup->Visible) { // FBloodgroup ?>
		<td data-name="FBloodgroup"<?php echo $view_template_couple_vitals->FBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FBloodgroup" class="view_template_couple_vitals_FBloodgroup">
<span<?php echo $view_template_couple_vitals->FBloodgroup->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Mheight->Visible) { // Mheight ?>
		<td data-name="Mheight"<?php echo $view_template_couple_vitals->Mheight->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Mheight" class="view_template_couple_vitals_Mheight">
<span<?php echo $view_template_couple_vitals->Mheight->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Mheight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Mweight->Visible) { // Mweight ?>
		<td data-name="Mweight"<?php echo $view_template_couple_vitals->Mweight->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Mweight" class="view_template_couple_vitals_Mweight">
<span<?php echo $view_template_couple_vitals->Mweight->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Mweight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MBMI->Visible) { // MBMI ?>
		<td data-name="MBMI"<?php echo $view_template_couple_vitals->MBMI->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MBMI" class="view_template_couple_vitals_MBMI">
<span<?php echo $view_template_couple_vitals->MBMI->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MBloodgroup->Visible) { // MBloodgroup ?>
		<td data-name="MBloodgroup"<?php echo $view_template_couple_vitals->MBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MBloodgroup" class="view_template_couple_vitals_MBloodgroup">
<span<?php echo $view_template_couple_vitals->MBloodgroup->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FBuild->Visible) { // FBuild ?>
		<td data-name="FBuild"<?php echo $view_template_couple_vitals->FBuild->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FBuild" class="view_template_couple_vitals_FBuild">
<span<?php echo $view_template_couple_vitals->FBuild->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FBuild->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MBuild->Visible) { // MBuild ?>
		<td data-name="MBuild"<?php echo $view_template_couple_vitals->MBuild->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MBuild" class="view_template_couple_vitals_MBuild">
<span<?php echo $view_template_couple_vitals->MBuild->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MBuild->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FSkinColor->Visible) { // FSkinColor ?>
		<td data-name="FSkinColor"<?php echo $view_template_couple_vitals->FSkinColor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FSkinColor" class="view_template_couple_vitals_FSkinColor">
<span<?php echo $view_template_couple_vitals->FSkinColor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FSkinColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MSkinColor->Visible) { // MSkinColor ?>
		<td data-name="MSkinColor"<?php echo $view_template_couple_vitals->MSkinColor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MSkinColor" class="view_template_couple_vitals_MSkinColor">
<span<?php echo $view_template_couple_vitals->MSkinColor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MSkinColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FEyesColor->Visible) { // FEyesColor ?>
		<td data-name="FEyesColor"<?php echo $view_template_couple_vitals->FEyesColor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FEyesColor" class="view_template_couple_vitals_FEyesColor">
<span<?php echo $view_template_couple_vitals->FEyesColor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FEyesColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MEyesColor->Visible) { // MEyesColor ?>
		<td data-name="MEyesColor"<?php echo $view_template_couple_vitals->MEyesColor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MEyesColor" class="view_template_couple_vitals_MEyesColor">
<span<?php echo $view_template_couple_vitals->MEyesColor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MEyesColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FHairColor->Visible) { // FHairColor ?>
		<td data-name="FHairColor"<?php echo $view_template_couple_vitals->FHairColor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FHairColor" class="view_template_couple_vitals_FHairColor">
<span<?php echo $view_template_couple_vitals->FHairColor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FHairColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MhairColor->Visible) { // MhairColor ?>
		<td data-name="MhairColor"<?php echo $view_template_couple_vitals->MhairColor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MhairColor" class="view_template_couple_vitals_MhairColor">
<span<?php echo $view_template_couple_vitals->MhairColor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MhairColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FhairTexture->Visible) { // FhairTexture ?>
		<td data-name="FhairTexture"<?php echo $view_template_couple_vitals->FhairTexture->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FhairTexture" class="view_template_couple_vitals_FhairTexture">
<span<?php echo $view_template_couple_vitals->FhairTexture->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FhairTexture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MHairTexture->Visible) { // MHairTexture ?>
		<td data-name="MHairTexture"<?php echo $view_template_couple_vitals->MHairTexture->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MHairTexture" class="view_template_couple_vitals_MHairTexture">
<span<?php echo $view_template_couple_vitals->MHairTexture->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MHairTexture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Fothers->Visible) { // Fothers ?>
		<td data-name="Fothers"<?php echo $view_template_couple_vitals->Fothers->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Fothers" class="view_template_couple_vitals_Fothers">
<span<?php echo $view_template_couple_vitals->Fothers->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Fothers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Mothers->Visible) { // Mothers ?>
		<td data-name="Mothers"<?php echo $view_template_couple_vitals->Mothers->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Mothers" class="view_template_couple_vitals_Mothers">
<span<?php echo $view_template_couple_vitals->Mothers->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Mothers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PGE->Visible) { // PGE ?>
		<td data-name="PGE"<?php echo $view_template_couple_vitals->PGE->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PGE" class="view_template_couple_vitals_PGE">
<span<?php echo $view_template_couple_vitals->PGE->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PPR->Visible) { // PPR ?>
		<td data-name="PPR"<?php echo $view_template_couple_vitals->PPR->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PPR" class="view_template_couple_vitals_PPR">
<span<?php echo $view_template_couple_vitals->PPR->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PPR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PBP->Visible) { // PBP ?>
		<td data-name="PBP"<?php echo $view_template_couple_vitals->PBP->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PBP" class="view_template_couple_vitals_PBP">
<span<?php echo $view_template_couple_vitals->PBP->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PBP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Breast->Visible) { // Breast ?>
		<td data-name="Breast"<?php echo $view_template_couple_vitals->Breast->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Breast" class="view_template_couple_vitals_Breast">
<span<?php echo $view_template_couple_vitals->Breast->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Breast->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PPA->Visible) { // PPA ?>
		<td data-name="PPA"<?php echo $view_template_couple_vitals->PPA->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PPA" class="view_template_couple_vitals_PPA">
<span<?php echo $view_template_couple_vitals->PPA->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PPA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PPSV->Visible) { // PPSV ?>
		<td data-name="PPSV"<?php echo $view_template_couple_vitals->PPSV->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PPSV" class="view_template_couple_vitals_PPSV">
<span<?php echo $view_template_couple_vitals->PPSV->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PPSV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td data-name="PPAPSMEAR"<?php echo $view_template_couple_vitals->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PPAPSMEAR" class="view_template_couple_vitals_PPAPSMEAR">
<span<?php echo $view_template_couple_vitals->PPAPSMEAR->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PTHYROID->Visible) { // PTHYROID ?>
		<td data-name="PTHYROID"<?php echo $view_template_couple_vitals->PTHYROID->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PTHYROID" class="view_template_couple_vitals_PTHYROID">
<span<?php echo $view_template_couple_vitals->PTHYROID->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PTHYROID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MTHYROID->Visible) { // MTHYROID ?>
		<td data-name="MTHYROID"<?php echo $view_template_couple_vitals->MTHYROID->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MTHYROID" class="view_template_couple_vitals_MTHYROID">
<span<?php echo $view_template_couple_vitals->MTHYROID->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MTHYROID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td data-name="SecSexCharacters"<?php echo $view_template_couple_vitals->SecSexCharacters->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_SecSexCharacters" class="view_template_couple_vitals_SecSexCharacters">
<span<?php echo $view_template_couple_vitals->SecSexCharacters->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->PenisUM->Visible) { // PenisUM ?>
		<td data-name="PenisUM"<?php echo $view_template_couple_vitals->PenisUM->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_PenisUM" class="view_template_couple_vitals_PenisUM">
<span<?php echo $view_template_couple_vitals->PenisUM->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->PenisUM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->VAS->Visible) { // VAS ?>
		<td data-name="VAS"<?php echo $view_template_couple_vitals->VAS->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_VAS" class="view_template_couple_vitals_VAS">
<span<?php echo $view_template_couple_vitals->VAS->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->VAS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td data-name="EPIDIDYMIS"<?php echo $view_template_couple_vitals->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_EPIDIDYMIS" class="view_template_couple_vitals_EPIDIDYMIS">
<span<?php echo $view_template_couple_vitals->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Varicocele->Visible) { // Varicocele ?>
		<td data-name="Varicocele"<?php echo $view_template_couple_vitals->Varicocele->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Varicocele" class="view_template_couple_vitals_Varicocele">
<span<?php echo $view_template_couple_vitals->Varicocele->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Varicocele->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory"<?php echo $view_template_couple_vitals->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_FamilyHistory" class="view_template_couple_vitals_FamilyHistory">
<span<?php echo $view_template_couple_vitals->FamilyHistory->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->FamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Addictions->Visible) { // Addictions ?>
		<td data-name="Addictions"<?php echo $view_template_couple_vitals->Addictions->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Addictions" class="view_template_couple_vitals_Addictions">
<span<?php echo $view_template_couple_vitals->Addictions->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Addictions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Medical->Visible) { // Medical ?>
		<td data-name="Medical"<?php echo $view_template_couple_vitals->Medical->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Medical" class="view_template_couple_vitals_Medical">
<span<?php echo $view_template_couple_vitals->Medical->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Medical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->Surgical->Visible) { // Surgical ?>
		<td data-name="Surgical"<?php echo $view_template_couple_vitals->Surgical->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_Surgical" class="view_template_couple_vitals_Surgical">
<span<?php echo $view_template_couple_vitals->Surgical->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->Surgical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->CoitalHistory->Visible) { // CoitalHistory ?>
		<td data-name="CoitalHistory"<?php echo $view_template_couple_vitals->CoitalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_CoitalHistory" class="view_template_couple_vitals_CoitalHistory">
<span<?php echo $view_template_couple_vitals->CoitalHistory->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->CoitalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->MariedFor->Visible) { // MariedFor ?>
		<td data-name="MariedFor"<?php echo $view_template_couple_vitals->MariedFor->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_MariedFor" class="view_template_couple_vitals_MariedFor">
<span<?php echo $view_template_couple_vitals->MariedFor->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->MariedFor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->CMNCM->Visible) { // CMNCM ?>
		<td data-name="CMNCM"<?php echo $view_template_couple_vitals->CMNCM->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_CMNCM" class="view_template_couple_vitals_CMNCM">
<span<?php echo $view_template_couple_vitals->CMNCM->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->CMNCM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_template_couple_vitals->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_TidNo" class="view_template_couple_vitals_TidNo">
<span<?php echo $view_template_couple_vitals->TidNo->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td data-name="pFamilyHistory"<?php echo $view_template_couple_vitals->pFamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_pFamilyHistory" class="view_template_couple_vitals_pFamilyHistory">
<span<?php echo $view_template_couple_vitals->pFamilyHistory->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->AntiTPO->Visible) { // AntiTPO ?>
		<td data-name="AntiTPO"<?php echo $view_template_couple_vitals->AntiTPO->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_AntiTPO" class="view_template_couple_vitals_AntiTPO">
<span<?php echo $view_template_couple_vitals->AntiTPO->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->AntiTPO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_template_couple_vitals->AntiTG->Visible) { // AntiTG ?>
		<td data-name="AntiTG"<?php echo $view_template_couple_vitals->AntiTG->cellAttributes() ?>>
<span id="el<?php echo $view_template_couple_vitals_list->RowCnt ?>_view_template_couple_vitals_AntiTG" class="view_template_couple_vitals_AntiTG">
<span<?php echo $view_template_couple_vitals->AntiTG->viewAttributes() ?>>
<?php echo $view_template_couple_vitals->AntiTG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_template_couple_vitals_list->ListOptions->render("body", "right", $view_template_couple_vitals_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_template_couple_vitals->isGridAdd())
		$view_template_couple_vitals_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_template_couple_vitals->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_template_couple_vitals_list->Recordset)
	$view_template_couple_vitals_list->Recordset->Close();
?>
<?php if (!$view_template_couple_vitals->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_template_couple_vitals->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_template_couple_vitals_list->Pager)) $view_template_couple_vitals_list->Pager = new NumericPager($view_template_couple_vitals_list->StartRec, $view_template_couple_vitals_list->DisplayRecs, $view_template_couple_vitals_list->TotalRecs, $view_template_couple_vitals_list->RecRange, $view_template_couple_vitals_list->AutoHidePager) ?>
<?php if ($view_template_couple_vitals_list->Pager->RecordCount > 0 && $view_template_couple_vitals_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_template_couple_vitals_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_template_couple_vitals_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_template_couple_vitals_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_template_couple_vitals_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_template_couple_vitals_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_template_couple_vitals_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_template_couple_vitals_list->pageUrl() ?>start=<?php echo $view_template_couple_vitals_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_template_couple_vitals_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_template_couple_vitals_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_template_couple_vitals_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_template_couple_vitals_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_template_couple_vitals_list->TotalRecs > 0 && (!$view_template_couple_vitals_list->AutoHidePageSizeSelector || $view_template_couple_vitals_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_template_couple_vitals">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_template_couple_vitals_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_template_couple_vitals_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_template_couple_vitals_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_template_couple_vitals_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_template_couple_vitals_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_template_couple_vitals_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_template_couple_vitals->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_template_couple_vitals_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_template_couple_vitals_list->TotalRecs == 0 && !$view_template_couple_vitals->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_template_couple_vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_template_couple_vitals_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_template_couple_vitals->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_template_couple_vitals_list->terminate();
?>