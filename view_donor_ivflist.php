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
$view_donor_ivf_list = new view_donor_ivf_list();

// Run the page
$view_donor_ivf_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_donor_ivf_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_donor_ivf->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_donor_ivflist = currentForm = new ew.Form("fview_donor_ivflist", "list");
fview_donor_ivflist.formKeyCountName = '<?php echo $view_donor_ivf_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_donor_ivflist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_donor_ivflist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_donor_ivflist.lists["x_Female"] = <?php echo $view_donor_ivf_list->Female->Lookup->toClientList() ?>;
fview_donor_ivflist.lists["x_Female"].options = <?php echo JsonEncode($view_donor_ivf_list->Female->lookupOptions()) ?>;
fview_donor_ivflist.lists["x_status"] = <?php echo $view_donor_ivf_list->status->Lookup->toClientList() ?>;
fview_donor_ivflist.lists["x_status"].options = <?php echo JsonEncode($view_donor_ivf_list->status->lookupOptions()) ?>;
fview_donor_ivflist.lists["x_ReferedBy"] = <?php echo $view_donor_ivf_list->ReferedBy->Lookup->toClientList() ?>;
fview_donor_ivflist.lists["x_ReferedBy"].options = <?php echo JsonEncode($view_donor_ivf_list->ReferedBy->lookupOptions()) ?>;
fview_donor_ivflist.lists["x_DrID"] = <?php echo $view_donor_ivf_list->DrID->Lookup->toClientList() ?>;
fview_donor_ivflist.lists["x_DrID"].options = <?php echo JsonEncode($view_donor_ivf_list->DrID->lookupOptions()) ?>;

// Form object for search
var fview_donor_ivflistsrch = currentSearchForm = new ew.Form("fview_donor_ivflistsrch");

// Filters
fview_donor_ivflistsrch.filterList = <?php echo $view_donor_ivf_list->getFilterList() ?>;
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
<?php if (!$view_donor_ivf->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_donor_ivf_list->TotalRecs > 0 && $view_donor_ivf_list->ExportOptions->visible()) { ?>
<?php $view_donor_ivf_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_ivf_list->ImportOptions->visible()) { ?>
<?php $view_donor_ivf_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_ivf_list->SearchOptions->visible()) { ?>
<?php $view_donor_ivf_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_donor_ivf_list->FilterOptions->visible()) { ?>
<?php $view_donor_ivf_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_donor_ivf_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_donor_ivf->isExport() && !$view_donor_ivf->CurrentAction) { ?>
<form name="fview_donor_ivflistsrch" id="fview_donor_ivflistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_donor_ivf_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_donor_ivflistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_donor_ivf">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_donor_ivf_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_donor_ivf_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_donor_ivf_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_donor_ivf_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_donor_ivf_list->showPageHeader(); ?>
<?php
$view_donor_ivf_list->showMessage();
?>
<?php if ($view_donor_ivf_list->TotalRecs > 0 || $view_donor_ivf->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_donor_ivf_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_donor_ivf">
<?php if (!$view_donor_ivf->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_donor_ivf->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_donor_ivf_list->Pager)) $view_donor_ivf_list->Pager = new NumericPager($view_donor_ivf_list->StartRec, $view_donor_ivf_list->DisplayRecs, $view_donor_ivf_list->TotalRecs, $view_donor_ivf_list->RecRange, $view_donor_ivf_list->AutoHidePager) ?>
<?php if ($view_donor_ivf_list->Pager->RecordCount > 0 && $view_donor_ivf_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_donor_ivf_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_donor_ivf_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_donor_ivf_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_donor_ivf_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_donor_ivf_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_donor_ivf_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_donor_ivf_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_donor_ivf_list->TotalRecs > 0 && (!$view_donor_ivf_list->AutoHidePageSizeSelector || $view_donor_ivf_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_donor_ivf">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_donor_ivf_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_donor_ivf_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_donor_ivf_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_donor_ivf_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_donor_ivf_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_donor_ivf_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_donor_ivf->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_donor_ivflist" id="fview_donor_ivflist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_donor_ivf_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_donor_ivf_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<div id="gmp_view_donor_ivf" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_donor_ivf_list->TotalRecs > 0 || $view_donor_ivf->isGridEdit()) { ?>
<table id="tbl_view_donor_ivflist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_donor_ivf_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_donor_ivf_list->renderListOptions();

// Render list options (header, left)
$view_donor_ivf_list->ListOptions->render("header", "left", "", "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
<?php if ($view_donor_ivf->id->Visible) { // id ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_donor_ivf->id->headerCellClass() ?>"><div id="elh_view_donor_ivf_id" class="view_donor_ivf_id"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_id" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_donor_ivf->id->headerCellClass() ?>"><script id="tpc_view_donor_ivf_id" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->id) ?>',1);"><div id="elh_view_donor_ivf_id" class="view_donor_ivf_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->Male) == "") { ?>
		<th data-name="Male" class="<?php echo $view_donor_ivf->Male->headerCellClass() ?>"><div id="elh_view_donor_ivf_Male" class="view_donor_ivf_Male"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_Male" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->Male->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Male" class="<?php echo $view_donor_ivf->Male->headerCellClass() ?>"><script id="tpc_view_donor_ivf_Male" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->Male) ?>',1);"><div id="elh_view_donor_ivf_Male" class="view_donor_ivf_Male">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->Male->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->Male->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->Male->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->Female) == "") { ?>
		<th data-name="Female" class="<?php echo $view_donor_ivf->Female->headerCellClass() ?>"><div id="elh_view_donor_ivf_Female" class="view_donor_ivf_Female"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_Female" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->Female->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Female" class="<?php echo $view_donor_ivf->Female->headerCellClass() ?>"><script id="tpc_view_donor_ivf_Female" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->Female) ?>',1);"><div id="elh_view_donor_ivf_Female" class="view_donor_ivf_Female">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->Female->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->Female->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->Female->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->status->Visible) { // status ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_donor_ivf->status->headerCellClass() ?>"><div id="elh_view_donor_ivf_status" class="view_donor_ivf_status"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_status" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_donor_ivf->status->headerCellClass() ?>"><script id="tpc_view_donor_ivf_status" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->status) ?>',1);"><div id="elh_view_donor_ivf_status" class="view_donor_ivf_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_donor_ivf->createdby->headerCellClass() ?>"><div id="elh_view_donor_ivf_createdby" class="view_donor_ivf_createdby"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_createdby" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->createdby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_donor_ivf->createdby->headerCellClass() ?>"><script id="tpc_view_donor_ivf_createdby" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->createdby) ?>',1);"><div id="elh_view_donor_ivf_createdby" class="view_donor_ivf_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_donor_ivf->createddatetime->headerCellClass() ?>"><div id="elh_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_createddatetime" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->createddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_donor_ivf->createddatetime->headerCellClass() ?>"><script id="tpc_view_donor_ivf_createddatetime" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->createddatetime) ?>',1);"><div id="elh_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_donor_ivf->modifiedby->headerCellClass() ?>"><div id="elh_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_modifiedby" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->modifiedby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_donor_ivf->modifiedby->headerCellClass() ?>"><script id="tpc_view_donor_ivf_modifiedby" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->modifiedby) ?>',1);"><div id="elh_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_donor_ivf->modifieddatetime->headerCellClass() ?>"><div id="elh_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_modifieddatetime" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->modifieddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_donor_ivf->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_donor_ivf_modifieddatetime" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->modifieddatetime) ?>',1);"><div id="elh_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->malepropic) == "") { ?>
		<th data-name="malepropic" class="<?php echo $view_donor_ivf->malepropic->headerCellClass() ?>"><div id="elh_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_malepropic" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->malepropic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="malepropic" class="<?php echo $view_donor_ivf->malepropic->headerCellClass() ?>"><script id="tpc_view_donor_ivf_malepropic" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->malepropic) ?>',1);"><div id="elh_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->malepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->malepropic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->malepropic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->femalepropic) == "") { ?>
		<th data-name="femalepropic" class="<?php echo $view_donor_ivf->femalepropic->headerCellClass() ?>"><div id="elh_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_femalepropic" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->femalepropic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="femalepropic" class="<?php echo $view_donor_ivf->femalepropic->headerCellClass() ?>"><script id="tpc_view_donor_ivf_femalepropic" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->femalepropic) ?>',1);"><div id="elh_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->femalepropic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->femalepropic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->femalepropic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->HusbandEducation) == "") { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_donor_ivf->HusbandEducation->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandEducation" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->HusbandEducation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEducation" class="<?php echo $view_donor_ivf->HusbandEducation->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandEducation" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->HusbandEducation) ?>',1);"><div id="elh_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->HusbandEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->HusbandEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->HusbandEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->WifeEducation) == "") { ?>
		<th data-name="WifeEducation" class="<?php echo $view_donor_ivf->WifeEducation->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeEducation" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->WifeEducation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEducation" class="<?php echo $view_donor_ivf->WifeEducation->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeEducation" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->WifeEducation) ?>',1);"><div id="elh_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->WifeEducation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->WifeEducation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->WifeEducation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->HusbandWorkHours) == "") { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_donor_ivf->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandWorkHours" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->HusbandWorkHours->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandWorkHours" class="<?php echo $view_donor_ivf->HusbandWorkHours->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandWorkHours" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->HusbandWorkHours) ?>',1);"><div id="elh_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->HusbandWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->HusbandWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->HusbandWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->WifeWorkHours) == "") { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_donor_ivf->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeWorkHours" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->WifeWorkHours->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeWorkHours" class="<?php echo $view_donor_ivf->WifeWorkHours->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeWorkHours" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->WifeWorkHours) ?>',1);"><div id="elh_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->WifeWorkHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->WifeWorkHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->WifeWorkHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->PatientLanguage) == "") { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_donor_ivf->PatientLanguage->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PatientLanguage" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->PatientLanguage->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientLanguage" class="<?php echo $view_donor_ivf->PatientLanguage->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PatientLanguage" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->PatientLanguage) ?>',1);"><div id="elh_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->PatientLanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->PatientLanguage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->PatientLanguage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->ReferedBy) == "") { ?>
		<th data-name="ReferedBy" class="<?php echo $view_donor_ivf->ReferedBy->headerCellClass() ?>"><div id="elh_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_ReferedBy" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->ReferedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedBy" class="<?php echo $view_donor_ivf->ReferedBy->headerCellClass() ?>"><script id="tpc_view_donor_ivf_ReferedBy" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->ReferedBy) ?>',1);"><div id="elh_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->ReferedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->ReferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->ReferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->ReferPhNo) == "") { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_donor_ivf->ReferPhNo->headerCellClass() ?>"><div id="elh_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_ReferPhNo" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->ReferPhNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferPhNo" class="<?php echo $view_donor_ivf->ReferPhNo->headerCellClass() ?>"><script id="tpc_view_donor_ivf_ReferPhNo" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->ReferPhNo) ?>',1);"><div id="elh_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->ReferPhNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->ReferPhNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->ReferPhNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_donor_ivf->WifeCell->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeCell" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->WifeCell->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_donor_ivf->WifeCell->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeCell" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->WifeCell) ?>',1);"><div id="elh_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->WifeCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->WifeCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_donor_ivf->HusbandCell->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandCell" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->HusbandCell->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_donor_ivf->HusbandCell->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandCell" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->HusbandCell) ?>',1);"><div id="elh_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->HusbandCell->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->HusbandCell->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->WifeEmail) == "") { ?>
		<th data-name="WifeEmail" class="<?php echo $view_donor_ivf->WifeEmail->headerCellClass() ?>"><div id="elh_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_WifeEmail" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->WifeEmail->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WifeEmail" class="<?php echo $view_donor_ivf->WifeEmail->headerCellClass() ?>"><script id="tpc_view_donor_ivf_WifeEmail" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->WifeEmail) ?>',1);"><div id="elh_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->WifeEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->WifeEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->WifeEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->HusbandEmail) == "") { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_donor_ivf->HusbandEmail->headerCellClass() ?>"><div id="elh_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HusbandEmail" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->HusbandEmail->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandEmail" class="<?php echo $view_donor_ivf->HusbandEmail->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HusbandEmail" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->HusbandEmail) ?>',1);"><div id="elh_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->HusbandEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->HusbandEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->HusbandEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_donor_ivf->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_ARTCYCLE" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->ARTCYCLE->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_donor_ivf->ARTCYCLE->headerCellClass() ?>"><script id="tpc_view_donor_ivf_ARTCYCLE" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->ARTCYCLE) ?>',1);"><div id="elh_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_donor_ivf->RESULT->headerCellClass() ?>"><div id="elh_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_RESULT" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->RESULT->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_donor_ivf->RESULT->headerCellClass() ?>"><script id="tpc_view_donor_ivf_RESULT" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->RESULT) ?>',1);"><div id="elh_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_donor_ivf->CoupleID->headerCellClass() ?>"><div id="elh_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_CoupleID" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->CoupleID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_donor_ivf->CoupleID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_CoupleID" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->CoupleID) ?>',1);"><div id="elh_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_donor_ivf->HospID->headerCellClass() ?>"><div id="elh_view_donor_ivf_HospID" class="view_donor_ivf_HospID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_HospID" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_donor_ivf->HospID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_HospID" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->HospID) ?>',1);"><div id="elh_view_donor_ivf_HospID" class="view_donor_ivf_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_donor_ivf->PatientName->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PatientName" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->PatientName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_donor_ivf->PatientName->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PatientName" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->PatientName) ?>',1);"><div id="elh_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_donor_ivf->PatientID->headerCellClass() ?>"><div id="elh_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PatientID" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_donor_ivf->PatientID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PatientID" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->PatientID) ?>',1);"><div id="elh_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_donor_ivf->PartnerName->headerCellClass() ?>"><div id="elh_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PartnerName" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->PartnerName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_donor_ivf->PartnerName->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PartnerName" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->PartnerName) ?>',1);"><div id="elh_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_donor_ivf->PartnerID->headerCellClass() ?>"><div id="elh_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_PartnerID" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->PartnerID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_donor_ivf->PartnerID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_PartnerID" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->PartnerID) ?>',1);"><div id="elh_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_donor_ivf->DrID->headerCellClass() ?>"><div id="elh_view_donor_ivf_DrID" class="view_donor_ivf_DrID"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_DrID" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->DrID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_donor_ivf->DrID->headerCellClass() ?>"><script id="tpc_view_donor_ivf_DrID" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->DrID) ?>',1);"><div id="elh_view_donor_ivf_DrID" class="view_donor_ivf_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_donor_ivf->DrDepartment->headerCellClass() ?>"><div id="elh_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_DrDepartment" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->DrDepartment->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_donor_ivf->DrDepartment->headerCellClass() ?>"><script id="tpc_view_donor_ivf_DrDepartment" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->DrDepartment) ?>',1);"><div id="elh_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
	<?php if ($view_donor_ivf->sortUrl($view_donor_ivf->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_donor_ivf->Doctor->headerCellClass() ?>"><div id="elh_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor"><div class="ew-table-header-caption"><script id="tpc_view_donor_ivf_Doctor" class="view_donor_ivflist" type="text/html"><span><?php echo $view_donor_ivf->Doctor->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_donor_ivf->Doctor->headerCellClass() ?>"><script id="tpc_view_donor_ivf_Doctor" class="view_donor_ivflist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_donor_ivf->SortUrl($view_donor_ivf->Doctor) ?>',1);"><div id="elh_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_donor_ivf->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_donor_ivf->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_donor_ivf->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_donor_ivf_list->ListOptions->render("header", "right", "", "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_donor_ivf->ExportAll && $view_donor_ivf->isExport()) {
	$view_donor_ivf_list->StopRec = $view_donor_ivf_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_donor_ivf_list->TotalRecs > $view_donor_ivf_list->StartRec + $view_donor_ivf_list->DisplayRecs - 1)
		$view_donor_ivf_list->StopRec = $view_donor_ivf_list->StartRec + $view_donor_ivf_list->DisplayRecs - 1;
	else
		$view_donor_ivf_list->StopRec = $view_donor_ivf_list->TotalRecs;
}
$view_donor_ivf_list->RecCnt = $view_donor_ivf_list->StartRec - 1;
if ($view_donor_ivf_list->Recordset && !$view_donor_ivf_list->Recordset->EOF) {
	$view_donor_ivf_list->Recordset->moveFirst();
	$selectLimit = $view_donor_ivf_list->UseSelectLimit;
	if (!$selectLimit && $view_donor_ivf_list->StartRec > 1)
		$view_donor_ivf_list->Recordset->move($view_donor_ivf_list->StartRec - 1);
} elseif (!$view_donor_ivf->AllowAddDeleteRow && $view_donor_ivf_list->StopRec == 0) {
	$view_donor_ivf_list->StopRec = $view_donor_ivf->GridAddRowCount;
}

// Initialize aggregate
$view_donor_ivf->RowType = ROWTYPE_AGGREGATEINIT;
$view_donor_ivf->resetAttributes();
$view_donor_ivf_list->renderRow();
while ($view_donor_ivf_list->RecCnt < $view_donor_ivf_list->StopRec) {
	$view_donor_ivf_list->RecCnt++;
	if ($view_donor_ivf_list->RecCnt >= $view_donor_ivf_list->StartRec) {
		$view_donor_ivf_list->RowCnt++;

		// Set up key count
		$view_donor_ivf_list->KeyCount = $view_donor_ivf_list->RowIndex;

		// Init row class and style
		$view_donor_ivf->resetAttributes();
		$view_donor_ivf->CssClass = "";
		if ($view_donor_ivf->isGridAdd()) {
		} else {
			$view_donor_ivf_list->loadRowValues($view_donor_ivf_list->Recordset); // Load row values
		}
		$view_donor_ivf->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_donor_ivf->RowAttrs = array_merge($view_donor_ivf->RowAttrs, array('data-rowindex'=>$view_donor_ivf_list->RowCnt, 'id'=>'r' . $view_donor_ivf_list->RowCnt . '_view_donor_ivf', 'data-rowtype'=>$view_donor_ivf->RowType));

		// Render row
		$view_donor_ivf_list->renderRow();

		// Render list options
		$view_donor_ivf_list->renderListOptions();

		// Save row and cell attributes
		$view_donor_ivf_list->Attrs[$view_donor_ivf_list->RowCnt] = array("row_attrs" => $view_donor_ivf->rowAttributes(), "cell_attrs" => array());
		$view_donor_ivf_list->Attrs[$view_donor_ivf_list->RowCnt]["cell_attrs"] = $view_donor_ivf->fieldCellAttributes();
?>
	<tr<?php echo $view_donor_ivf->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_donor_ivf_list->ListOptions->render("body", "left", $view_donor_ivf_list->RowCnt, "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
	<?php if ($view_donor_ivf->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_donor_ivf->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_id" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_id" class="view_donor_ivf_id">
<span<?php echo $view_donor_ivf->id->viewAttributes() ?>>
<?php echo $view_donor_ivf->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
		<td data-name="Male"<?php echo $view_donor_ivf->Male->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_Male" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_Male" class="view_donor_ivf_Male">
<span<?php echo $view_donor_ivf->Male->viewAttributes() ?>>
<?php echo $view_donor_ivf->Male->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
		<td data-name="Female"<?php echo $view_donor_ivf->Female->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_Female" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_Female" class="view_donor_ivf_Female">
<span<?php echo $view_donor_ivf->Female->viewAttributes() ?>>
<?php echo $view_donor_ivf->Female->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_donor_ivf->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_status" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_status" class="view_donor_ivf_status">
<span<?php echo $view_donor_ivf->status->viewAttributes() ?>>
<?php echo $view_donor_ivf->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_donor_ivf->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_createdby" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_createdby" class="view_donor_ivf_createdby">
<span<?php echo $view_donor_ivf->createdby->viewAttributes() ?>>
<?php echo $view_donor_ivf->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_donor_ivf->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_createddatetime" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_createddatetime" class="view_donor_ivf_createddatetime">
<span<?php echo $view_donor_ivf->createddatetime->viewAttributes() ?>>
<?php echo $view_donor_ivf->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_donor_ivf->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_modifiedby" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_modifiedby" class="view_donor_ivf_modifiedby">
<span<?php echo $view_donor_ivf->modifiedby->viewAttributes() ?>>
<?php echo $view_donor_ivf->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_donor_ivf->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_modifieddatetime" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_modifieddatetime" class="view_donor_ivf_modifieddatetime">
<span<?php echo $view_donor_ivf->modifieddatetime->viewAttributes() ?>>
<?php echo $view_donor_ivf->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
		<td data-name="malepropic"<?php echo $view_donor_ivf->malepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_malepropic" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_malepropic" class="view_donor_ivf_malepropic">
<span>
<?php echo GetFileViewTag($view_donor_ivf->malepropic, $view_donor_ivf->malepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
		<td data-name="femalepropic"<?php echo $view_donor_ivf->femalepropic->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_femalepropic" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_femalepropic" class="view_donor_ivf_femalepropic">
<span>
<?php echo GetFileViewTag($view_donor_ivf->femalepropic, $view_donor_ivf->femalepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<td data-name="HusbandEducation"<?php echo $view_donor_ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandEducation" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandEducation" class="view_donor_ivf_HusbandEducation">
<span<?php echo $view_donor_ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
		<td data-name="WifeEducation"<?php echo $view_donor_ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeEducation" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeEducation" class="view_donor_ivf_WifeEducation">
<span<?php echo $view_donor_ivf->WifeEducation->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<td data-name="HusbandWorkHours"<?php echo $view_donor_ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandWorkHours" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandWorkHours" class="view_donor_ivf_HusbandWorkHours">
<span<?php echo $view_donor_ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<td data-name="WifeWorkHours"<?php echo $view_donor_ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeWorkHours" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeWorkHours" class="view_donor_ivf_WifeWorkHours">
<span<?php echo $view_donor_ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<td data-name="PatientLanguage"<?php echo $view_donor_ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PatientLanguage" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PatientLanguage" class="view_donor_ivf_PatientLanguage">
<span<?php echo $view_donor_ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
		<td data-name="ReferedBy"<?php echo $view_donor_ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_ReferedBy" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_ReferedBy" class="view_donor_ivf_ReferedBy">
<span<?php echo $view_donor_ivf->ReferedBy->viewAttributes() ?>>
<?php echo $view_donor_ivf->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<td data-name="ReferPhNo"<?php echo $view_donor_ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_ReferPhNo" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_ReferPhNo" class="view_donor_ivf_ReferPhNo">
<span<?php echo $view_donor_ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $view_donor_ivf->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell"<?php echo $view_donor_ivf->WifeCell->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeCell" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeCell" class="view_donor_ivf_WifeCell">
<span<?php echo $view_donor_ivf->WifeCell->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeCell->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell"<?php echo $view_donor_ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandCell" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandCell" class="view_donor_ivf_HusbandCell">
<span<?php echo $view_donor_ivf->HusbandCell->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandCell->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
		<td data-name="WifeEmail"<?php echo $view_donor_ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeEmail" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_WifeEmail" class="view_donor_ivf_WifeEmail">
<span<?php echo $view_donor_ivf->WifeEmail->viewAttributes() ?>>
<?php echo $view_donor_ivf->WifeEmail->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<td data-name="HusbandEmail"<?php echo $view_donor_ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandEmail" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HusbandEmail" class="view_donor_ivf_HusbandEmail">
<span<?php echo $view_donor_ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $view_donor_ivf->HusbandEmail->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $view_donor_ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_ARTCYCLE" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_ARTCYCLE" class="view_donor_ivf_ARTCYCLE">
<span<?php echo $view_donor_ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_donor_ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $view_donor_ivf->RESULT->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_RESULT" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_RESULT" class="view_donor_ivf_RESULT">
<span<?php echo $view_donor_ivf->RESULT->viewAttributes() ?>>
<?php echo $view_donor_ivf->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $view_donor_ivf->CoupleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_CoupleID" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_CoupleID" class="view_donor_ivf_CoupleID">
<span<?php echo $view_donor_ivf->CoupleID->viewAttributes() ?>>
<?php echo $view_donor_ivf->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_donor_ivf->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HospID" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_HospID" class="view_donor_ivf_HospID">
<span<?php echo $view_donor_ivf->HospID->viewAttributes() ?>>
<?php echo $view_donor_ivf->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_donor_ivf->PatientName->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PatientName" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PatientName" class="view_donor_ivf_PatientName">
<span<?php echo $view_donor_ivf->PatientName->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_donor_ivf->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PatientID" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PatientID" class="view_donor_ivf_PatientID">
<span<?php echo $view_donor_ivf->PatientID->viewAttributes() ?>>
<?php echo $view_donor_ivf->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_donor_ivf->PartnerName->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PartnerName" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PartnerName" class="view_donor_ivf_PartnerName">
<span<?php echo $view_donor_ivf->PartnerName->viewAttributes() ?>>
<?php echo $view_donor_ivf->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_donor_ivf->PartnerID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PartnerID" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_PartnerID" class="view_donor_ivf_PartnerID">
<span<?php echo $view_donor_ivf->PartnerID->viewAttributes() ?>>
<?php echo $view_donor_ivf->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_donor_ivf->DrID->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_DrID" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_DrID" class="view_donor_ivf_DrID">
<span<?php echo $view_donor_ivf->DrID->viewAttributes() ?>>
<?php echo $view_donor_ivf->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $view_donor_ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_DrDepartment" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_DrDepartment" class="view_donor_ivf_DrDepartment">
<span<?php echo $view_donor_ivf->DrDepartment->viewAttributes() ?>>
<?php echo $view_donor_ivf->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_donor_ivf->Doctor->cellAttributes() ?>>
<script id="tpx<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_Doctor" class="view_donor_ivflist" type="text/html">
<span id="el<?php echo $view_donor_ivf_list->RowCnt ?>_view_donor_ivf_Doctor" class="view_donor_ivf_Doctor">
<span<?php echo $view_donor_ivf->Doctor->viewAttributes() ?>>
<?php echo $view_donor_ivf->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_donor_ivf_list->ListOptions->render("body", "right", $view_donor_ivf_list->RowCnt, "block", $view_donor_ivf->TableVar, "view_donor_ivflist");
?>
	</tr>
<?php
	}
	if (!$view_donor_ivf->isGridAdd())
		$view_donor_ivf_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_donor_ivf->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_donor_ivflist" class="ew-custom-template"></div>
<script id="tpm_view_donor_ivflist" type="text/html">
<div id="ct_view_donor_ivf_list"><?php if ($view_donor_ivf_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
	<tr class="ew-table-header">
	{{include tmpl="#tpoh_view_donor_ivf"/}}
	<td rowspan="2">Home</td>
	<td rowspan="2">{{include tmpl="#tpc_view_donor_ivf_CoupleID"/}}</td>
		<td rowspan="2">{{include tmpl="#tpc_view_donor_ivf_femalepropic"/}}</td>
	<td rowspan="2">{{include tmpl="#tpc_view_donor_ivf_Female"/}}</td>
				<td>{{include tmpl="#tpc_view_donor_ivf_ARTCYCLE"/}}</td>
					<td>{{include tmpl="#tpc_view_donor_ivf_status"/}}</td>
	</tr>
	<tr class="ew-table-header">
				<td>{{include tmpl="#tpc_view_donor_ivf_RESULT"/}}</td>
					<td>{{include tmpl="#tpc_view_donor_ivf_ReferedBy"/}}</td>
	</tr>    
	</thead>          
	<tbody>  
<?php for ($i = $view_donor_ivf_list->StartRowCnt; $i <= $view_donor_ivf_list->RowCnt; $i++) { ?>
<tr<?php echo @$view_donor_ivf_list->Attrs[$i]['row_attrs'] ?>> 
	{{include tmpl="#tpob<?php echo $i ?>_view_donor_ivf"/}}
	<td rowspan="2">
				<a class="btn btn-app" href="donorivf.php?id={{: ~root.rows[<?php echo $i - 1 ?>].id }}">
				  <i class="fas fa-user-md"></i> Start
				</a>
	</td>
	<td rowspan="2">{{include tmpl="#tpx<?php echo $i ?>_view_donor_ivf_CoupleID"/}}</td>
		<td rowspan="2">{{include tmpl="#tpx<?php echo $i ?>_view_donor_ivf_femalepropic"/}}</td>
	<td rowspan="2">{{include tmpl="#tpx<?php echo $i ?>_view_donor_ivf_Female"/}}</td>
				<td>{{include tmpl="#tpx<?php echo $i ?>_view_donor_ivf_ARTCYCLE"/}}</td>
					<td>{{include tmpl="#tpx<?php echo $i ?>_view_donor_ivf_status"/}}</td>
</tr>
<tr<?php echo @$view_donor_ivf_list->Attrs[$i]['row_attrs'] ?>>
				<td>{{include tmpl="#tpx<?php echo $i ?>_view_donor_ivf_RESULT"/}}</td>
					<td>{{include tmpl="#tpx<?php echo $i ?>_view_donor_ivf_ReferedBy"/}}</td>
</tr>
<?php } ?>
	</tbody>
	<!-- <?php if ($view_donor_ivf_list->TotalRecs > 0 && !$view_donor_ivf->isGridAdd() && !$view_donor_ivf->isGridEdit()) { ?>
<tfoot><tr class="ew-table-footer">{{include tmpl="#tpof_view_donor_ivf"/}}<td>{{include tmpl="#tpg_MyField1"/}}</td><td>&nbsp;</td></tr></tfoot>
<?php } ?> -->
</table>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_donor_ivf_list->Recordset)
	$view_donor_ivf_list->Recordset->Close();
?>
<?php if (!$view_donor_ivf->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_donor_ivf->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_donor_ivf_list->Pager)) $view_donor_ivf_list->Pager = new NumericPager($view_donor_ivf_list->StartRec, $view_donor_ivf_list->DisplayRecs, $view_donor_ivf_list->TotalRecs, $view_donor_ivf_list->RecRange, $view_donor_ivf_list->AutoHidePager) ?>
<?php if ($view_donor_ivf_list->Pager->RecordCount > 0 && $view_donor_ivf_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_donor_ivf_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_donor_ivf_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_donor_ivf_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_donor_ivf_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_donor_ivf_list->pageUrl() ?>start=<?php echo $view_donor_ivf_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_donor_ivf_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_donor_ivf_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_donor_ivf_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_donor_ivf_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_donor_ivf_list->TotalRecs > 0 && (!$view_donor_ivf_list->AutoHidePageSizeSelector || $view_donor_ivf_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_donor_ivf">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_donor_ivf_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_donor_ivf_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_donor_ivf_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_donor_ivf_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_donor_ivf_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_donor_ivf_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_donor_ivf->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_donor_ivf_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_donor_ivf_list->TotalRecs == 0 && !$view_donor_ivf->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_donor_ivf_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_donor_ivf->Rows) ?> };
ew.applyTemplate("tpd_view_donor_ivflist", "tpm_view_donor_ivflist", "view_donor_ivflist", "<?php echo $view_donor_ivf->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_donor_ivflist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_donor_ivflist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_donor_ivflist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_donor_ivf_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_donor_ivf->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_donor_ivf->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_donor_ivf", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_donor_ivf_list->terminate();
?>