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
$view_ip_admission_issue_list = new view_ip_admission_issue_list();

// Run the page
$view_ip_admission_issue_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_issue_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_admission_issue->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_admission_issuelist = currentForm = new ew.Form("fview_ip_admission_issuelist", "list");
fview_ip_admission_issuelist.formKeyCountName = '<?php echo $view_ip_admission_issue_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_admission_issuelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admission_issuelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_ip_admission_issuelistsrch = currentSearchForm = new ew.Form("fview_ip_admission_issuelistsrch");

// Filters
fview_ip_admission_issuelistsrch.filterList = <?php echo $view_ip_admission_issue_list->getFilterList() ?>;
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
<?php if (!$view_ip_admission_issue->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_admission_issue_list->TotalRecs > 0 && $view_ip_admission_issue_list->ExportOptions->visible()) { ?>
<?php $view_ip_admission_issue_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_issue_list->ImportOptions->visible()) { ?>
<?php $view_ip_admission_issue_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_issue_list->SearchOptions->visible()) { ?>
<?php $view_ip_admission_issue_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_issue_list->FilterOptions->visible()) { ?>
<?php $view_ip_admission_issue_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_admission_issue_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_admission_issue->isExport() && !$view_ip_admission_issue->CurrentAction) { ?>
<form name="fview_ip_admission_issuelistsrch" id="fview_ip_admission_issuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_admission_issue_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_admission_issuelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission_issue">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_admission_issue_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_admission_issue_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_admission_issue_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_admission_issue_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_issue_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_issue_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_issue_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_admission_issue_list->showPageHeader(); ?>
<?php
$view_ip_admission_issue_list->showMessage();
?>
<?php if ($view_ip_admission_issue_list->TotalRecs > 0 || $view_ip_admission_issue->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_admission_issue_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission_issue">
<?php if (!$view_ip_admission_issue->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_admission_issue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_issue_list->Pager)) $view_ip_admission_issue_list->Pager = new NumericPager($view_ip_admission_issue_list->StartRec, $view_ip_admission_issue_list->DisplayRecs, $view_ip_admission_issue_list->TotalRecs, $view_ip_admission_issue_list->RecRange, $view_ip_admission_issue_list->AutoHidePager) ?>
<?php if ($view_ip_admission_issue_list->Pager->RecordCount > 0 && $view_ip_admission_issue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_issue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_issue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_issue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_issue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_issue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_issue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_issue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_issue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_issue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_issue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_issue_list->TotalRecs > 0 && (!$view_ip_admission_issue_list->AutoHidePageSizeSelector || $view_ip_admission_issue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_issue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_issue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_issue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_issue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_issue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_issue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_issue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_issue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_admission_issuelist" id="fview_ip_admission_issuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_admission_issue_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_admission_issue_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_issue">
<div id="gmp_view_ip_admission_issue" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_admission_issue_list->TotalRecs > 0 || $view_ip_admission_issue->isGridEdit()) { ?>
<table id="tbl_view_ip_admission_issuelist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_admission_issue_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_admission_issue_list->renderListOptions();

// Render list options (header, left)
$view_ip_admission_issue_list->ListOptions->render("header", "left", "", "block", $view_ip_admission_issue->TableVar, "view_ip_admission_issuelist");
?>
<?php if ($view_ip_admission_issue->id->Visible) { // id ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_issue->id->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_id" class="view_ip_admission_issue_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_id" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_issue->id->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_id" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->id) ?>',1);"><div id="elh_view_ip_admission_issue_id" class="view_ip_admission_issue_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_issue->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_mrnNo" class="view_ip_admission_issue_mrnNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_mrnNo" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->mrnNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_issue->mrnNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_mrnNo" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->mrnNo) ?>',1);"><div id="elh_view_ip_admission_issue_mrnNo" class="view_ip_admission_issue_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_issue->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_patient_id" class="view_ip_admission_issue_patient_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_patient_id" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->patient_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_issue->patient_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_patient_id" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->patient_id) ?>',1);"><div id="elh_view_ip_admission_issue_patient_id" class="view_ip_admission_issue_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_issue->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_patient_name" class="view_ip_admission_issue_patient_name"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_patient_name" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->patient_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_issue->patient_name->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_patient_name" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->patient_name) ?>',1);"><div id="elh_view_ip_admission_issue_patient_name" class="view_ip_admission_issue_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->gender->Visible) { // gender ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_issue->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_gender" class="view_ip_admission_issue_gender"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_gender" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_issue->gender->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_gender" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->gender) ?>',1);"><div id="elh_view_ip_admission_issue_gender" class="view_ip_admission_issue_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->age->Visible) { // age ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->age) == "") { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_issue->age->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_age" class="view_ip_admission_issue_age"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_age" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_issue->age->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_age" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->age) ?>',1);"><div id="elh_view_ip_admission_issue_age" class="view_ip_admission_issue_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_issue->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_physician_id" class="view_ip_admission_issue_physician_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_physician_id" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->physician_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_issue->physician_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_physician_id" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->physician_id) ?>',1);"><div id="elh_view_ip_admission_issue_physician_id" class="view_ip_admission_issue_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_issue->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_typeRegsisteration" class="view_ip_admission_issue_typeRegsisteration"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_typeRegsisteration" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->typeRegsisteration->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_issue->typeRegsisteration->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_typeRegsisteration" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->typeRegsisteration) ?>',1);"><div id="elh_view_ip_admission_issue_typeRegsisteration" class="view_ip_admission_issue_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_issue->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_PaymentCategory" class="view_ip_admission_issue_PaymentCategory"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_PaymentCategory" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->PaymentCategory->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_issue->PaymentCategory->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_PaymentCategory" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->PaymentCategory) ?>',1);"><div id="elh_view_ip_admission_issue_PaymentCategory" class="view_ip_admission_issue_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_issue->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_admission_consultant_id" class="view_ip_admission_issue_admission_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_admission_consultant_id" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->admission_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_issue->admission_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_admission_consultant_id" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->admission_consultant_id) ?>',1);"><div id="elh_view_ip_admission_issue_admission_consultant_id" class="view_ip_admission_issue_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->admission_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->admission_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_issue->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_leading_consultant_id" class="view_ip_admission_issue_leading_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_leading_consultant_id" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->leading_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_issue->leading_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_leading_consultant_id" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->leading_consultant_id) ?>',1);"><div id="elh_view_ip_admission_issue_leading_consultant_id" class="view_ip_admission_issue_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->leading_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->leading_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_issue->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_admission_date" class="view_ip_admission_issue_admission_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_admission_date" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->admission_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_issue->admission_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_admission_date" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->admission_date) ?>',1);"><div id="elh_view_ip_admission_issue_admission_date" class="view_ip_admission_issue_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_issue->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_release_date" class="view_ip_admission_issue_release_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_release_date" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->release_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_issue->release_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_release_date" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->release_date) ?>',1);"><div id="elh_view_ip_admission_issue_release_date" class="view_ip_admission_issue_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_issue->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_PaymentStatus" class="view_ip_admission_issue_PaymentStatus"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_PaymentStatus" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->PaymentStatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_issue->PaymentStatus->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_PaymentStatus" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->PaymentStatus) ?>',1);"><div id="elh_view_ip_admission_issue_PaymentStatus" class="view_ip_admission_issue_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->status->Visible) { // status ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_issue->status->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_status" class="view_ip_admission_issue_status"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_status" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_issue->status->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_status" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->status) ?>',1);"><div id="elh_view_ip_admission_issue_status" class="view_ip_admission_issue_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_issue->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_createdby" class="view_ip_admission_issue_createdby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_createdby" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->createdby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_issue->createdby->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_createdby" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->createdby) ?>',1);"><div id="elh_view_ip_admission_issue_createdby" class="view_ip_admission_issue_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_issue->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_createddatetime" class="view_ip_admission_issue_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_createddatetime" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->createddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_issue->createddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_createddatetime" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->createddatetime) ?>',1);"><div id="elh_view_ip_admission_issue_createddatetime" class="view_ip_admission_issue_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_issue->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_modifiedby" class="view_ip_admission_issue_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_modifiedby" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->modifiedby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_issue->modifiedby->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_modifiedby" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->modifiedby) ?>',1);"><div id="elh_view_ip_admission_issue_modifiedby" class="view_ip_admission_issue_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_issue->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_modifieddatetime" class="view_ip_admission_issue_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_modifieddatetime" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->modifieddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_issue->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_modifieddatetime" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->modifieddatetime) ?>',1);"><div id="elh_view_ip_admission_issue_modifieddatetime" class="view_ip_admission_issue_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_issue->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_PatientID" class="view_ip_admission_issue_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_PatientID" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_issue->PatientID->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_PatientID" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->PatientID) ?>',1);"><div id="elh_view_ip_admission_issue_PatientID" class="view_ip_admission_issue_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_issue->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_HospID" class="view_ip_admission_issue_HospID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_HospID" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_issue->HospID->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_HospID" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->HospID) ?>',1);"><div id="elh_view_ip_admission_issue_HospID" class="view_ip_admission_issue_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_issue->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ReferedByDr" class="view_ip_admission_issue_ReferedByDr"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ReferedByDr" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ReferedByDr->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_issue->ReferedByDr->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ReferedByDr" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ReferedByDr) ?>',1);"><div id="elh_view_ip_admission_issue_ReferedByDr" class="view_ip_admission_issue_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_issue->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ReferClinicname" class="view_ip_admission_issue_ReferClinicname"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ReferClinicname" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ReferClinicname->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_issue->ReferClinicname->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ReferClinicname" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ReferClinicname) ?>',1);"><div id="elh_view_ip_admission_issue_ReferClinicname" class="view_ip_admission_issue_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_issue->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ReferCity" class="view_ip_admission_issue_ReferCity"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ReferCity" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ReferCity->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_issue->ReferCity->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ReferCity" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ReferCity) ?>',1);"><div id="elh_view_ip_admission_issue_ReferCity" class="view_ip_admission_issue_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_issue->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ReferMobileNo" class="view_ip_admission_issue_ReferMobileNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ReferMobileNo" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ReferMobileNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_issue->ReferMobileNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ReferMobileNo" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ReferMobileNo) ?>',1);"><div id="elh_view_ip_admission_issue_ReferMobileNo" class="view_ip_admission_issue_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_issue->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ReferA4TreatingConsultant" class="view_ip_admission_issue_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ReferA4TreatingConsultant" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ReferA4TreatingConsultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_issue->ReferA4TreatingConsultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ReferA4TreatingConsultant" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_ip_admission_issue_ReferA4TreatingConsultant" class="view_ip_admission_issue_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_issue->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_PurposreReferredfor" class="view_ip_admission_issue_PurposreReferredfor"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_PurposreReferredfor" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->PurposreReferredfor->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_issue->PurposreReferredfor->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_PurposreReferredfor" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->PurposreReferredfor) ?>',1);"><div id="elh_view_ip_admission_issue_PurposreReferredfor" class="view_ip_admission_issue_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_issue->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_mobileno" class="view_ip_admission_issue_mobileno"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_mobileno" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->mobileno->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_issue->mobileno->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_mobileno" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->mobileno) ?>',1);"><div id="elh_view_ip_admission_issue_mobileno" class="view_ip_admission_issue_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_issue->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_BillClosing" class="view_ip_admission_issue_BillClosing"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_BillClosing" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->BillClosing->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_issue->BillClosing->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_BillClosing" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->BillClosing) ?>',1);"><div id="elh_view_ip_admission_issue_BillClosing" class="view_ip_admission_issue_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->BillClosing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_issue->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_BillClosingDate" class="view_ip_admission_issue_BillClosingDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_BillClosingDate" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->BillClosingDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_issue->BillClosingDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_BillClosingDate" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->BillClosingDate) ?>',1);"><div id="elh_view_ip_admission_issue_BillClosingDate" class="view_ip_admission_issue_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_issue->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_BillNumber" class="view_ip_admission_issue_BillNumber"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_BillNumber" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->BillNumber->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_issue->BillNumber->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_BillNumber" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->BillNumber) ?>',1);"><div id="elh_view_ip_admission_issue_BillNumber" class="view_ip_admission_issue_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_issue->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ClosingAmount" class="view_ip_admission_issue_ClosingAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ClosingAmount" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ClosingAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_issue->ClosingAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ClosingAmount" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ClosingAmount) ?>',1);"><div id="elh_view_ip_admission_issue_ClosingAmount" class="view_ip_admission_issue_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ClosingAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ClosingAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_issue->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ClosingType" class="view_ip_admission_issue_ClosingType"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ClosingType" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ClosingType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_issue->ClosingType->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ClosingType" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ClosingType) ?>',1);"><div id="elh_view_ip_admission_issue_ClosingType" class="view_ip_admission_issue_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ClosingType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ClosingType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_issue->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_BillAmount" class="view_ip_admission_issue_BillAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_BillAmount" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->BillAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_issue->BillAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_BillAmount" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->BillAmount) ?>',1);"><div id="elh_view_ip_admission_issue_BillAmount" class="view_ip_admission_issue_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->BillAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->BillAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_issue->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_billclosedBy" class="view_ip_admission_issue_billclosedBy"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_billclosedBy" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->billclosedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_issue->billclosedBy->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_billclosedBy" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->billclosedBy) ?>',1);"><div id="elh_view_ip_admission_issue_billclosedBy" class="view_ip_admission_issue_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->billclosedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->billclosedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_issue->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_bllcloseByDate" class="view_ip_admission_issue_bllcloseByDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_bllcloseByDate" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->bllcloseByDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_issue->bllcloseByDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_bllcloseByDate" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->bllcloseByDate) ?>',1);"><div id="elh_view_ip_admission_issue_bllcloseByDate" class="view_ip_admission_issue_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->bllcloseByDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->bllcloseByDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_issue->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_ReportHeader" class="view_ip_admission_issue_ReportHeader"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_ReportHeader" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->ReportHeader->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_issue->ReportHeader->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_ReportHeader" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->ReportHeader) ?>',1);"><div id="elh_view_ip_admission_issue_ReportHeader" class="view_ip_admission_issue_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_issue->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_Procedure" class="view_ip_admission_issue_Procedure"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_Procedure" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->Procedure->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_issue->Procedure->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_Procedure" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->Procedure) ?>',1);"><div id="elh_view_ip_admission_issue_Procedure" class="view_ip_admission_issue_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_issue->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_Consultant" class="view_ip_admission_issue_Consultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_Consultant" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->Consultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_issue->Consultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_Consultant" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->Consultant) ?>',1);"><div id="elh_view_ip_admission_issue_Consultant" class="view_ip_admission_issue_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_issue->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_Anesthetist" class="view_ip_admission_issue_Anesthetist"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_Anesthetist" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->Anesthetist->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_issue->Anesthetist->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_Anesthetist" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->Anesthetist) ?>',1);"><div id="elh_view_ip_admission_issue_Anesthetist" class="view_ip_admission_issue_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_issue->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_Amound" class="view_ip_admission_issue_Amound"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_Amound" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->Amound->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_issue->Amound->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_Amound" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->Amound) ?>',1);"><div id="elh_view_ip_admission_issue_Amound" class="view_ip_admission_issue_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->Amound->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->Amound->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_issue->Package->Visible) { // Package ?>
	<?php if ($view_ip_admission_issue->sortUrl($view_ip_admission_issue->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_issue->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_issue_Package" class="view_ip_admission_issue_Package"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_issue_Package" class="view_ip_admission_issuelist" type="text/html"><span><?php echo $view_ip_admission_issue->Package->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_issue->Package->headerCellClass() ?>"><script id="tpc_view_ip_admission_issue_Package" class="view_ip_admission_issuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_issue->SortUrl($view_ip_admission_issue->Package) ?>',1);"><div id="elh_view_ip_admission_issue_Package" class="view_ip_admission_issue_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_issue->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_issue->Package->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_issue->Package->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_admission_issue_list->ListOptions->render("header", "right", "", "block", $view_ip_admission_issue->TableVar, "view_ip_admission_issuelist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_admission_issue->ExportAll && $view_ip_admission_issue->isExport()) {
	$view_ip_admission_issue_list->StopRec = $view_ip_admission_issue_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_admission_issue_list->TotalRecs > $view_ip_admission_issue_list->StartRec + $view_ip_admission_issue_list->DisplayRecs - 1)
		$view_ip_admission_issue_list->StopRec = $view_ip_admission_issue_list->StartRec + $view_ip_admission_issue_list->DisplayRecs - 1;
	else
		$view_ip_admission_issue_list->StopRec = $view_ip_admission_issue_list->TotalRecs;
}
$view_ip_admission_issue_list->RecCnt = $view_ip_admission_issue_list->StartRec - 1;
if ($view_ip_admission_issue_list->Recordset && !$view_ip_admission_issue_list->Recordset->EOF) {
	$view_ip_admission_issue_list->Recordset->moveFirst();
	$selectLimit = $view_ip_admission_issue_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_admission_issue_list->StartRec > 1)
		$view_ip_admission_issue_list->Recordset->move($view_ip_admission_issue_list->StartRec - 1);
} elseif (!$view_ip_admission_issue->AllowAddDeleteRow && $view_ip_admission_issue_list->StopRec == 0) {
	$view_ip_admission_issue_list->StopRec = $view_ip_admission_issue->GridAddRowCount;
}

// Initialize aggregate
$view_ip_admission_issue->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_admission_issue->resetAttributes();
$view_ip_admission_issue_list->renderRow();
while ($view_ip_admission_issue_list->RecCnt < $view_ip_admission_issue_list->StopRec) {
	$view_ip_admission_issue_list->RecCnt++;
	if ($view_ip_admission_issue_list->RecCnt >= $view_ip_admission_issue_list->StartRec) {
		$view_ip_admission_issue_list->RowCnt++;

		// Set up key count
		$view_ip_admission_issue_list->KeyCount = $view_ip_admission_issue_list->RowIndex;

		// Init row class and style
		$view_ip_admission_issue->resetAttributes();
		$view_ip_admission_issue->CssClass = "";
		if ($view_ip_admission_issue->isGridAdd()) {
		} else {
			$view_ip_admission_issue_list->loadRowValues($view_ip_admission_issue_list->Recordset); // Load row values
		}
		$view_ip_admission_issue->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_admission_issue->RowAttrs = array_merge($view_ip_admission_issue->RowAttrs, array('data-rowindex'=>$view_ip_admission_issue_list->RowCnt, 'id'=>'r' . $view_ip_admission_issue_list->RowCnt . '_view_ip_admission_issue', 'data-rowtype'=>$view_ip_admission_issue->RowType));

		// Render row
		$view_ip_admission_issue_list->renderRow();

		// Render list options
		$view_ip_admission_issue_list->renderListOptions();

		// Save row and cell attributes
		$view_ip_admission_issue_list->Attrs[$view_ip_admission_issue_list->RowCnt] = array("row_attrs" => $view_ip_admission_issue->rowAttributes(), "cell_attrs" => array());
		$view_ip_admission_issue_list->Attrs[$view_ip_admission_issue_list->RowCnt]["cell_attrs"] = $view_ip_admission_issue->fieldCellAttributes();
?>
	<tr<?php echo $view_ip_admission_issue->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_admission_issue_list->ListOptions->render("body", "left", $view_ip_admission_issue_list->RowCnt, "block", $view_ip_admission_issue->TableVar, "view_ip_admission_issuelist");
?>
	<?php if ($view_ip_admission_issue->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_admission_issue->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_id" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_id" class="view_ip_admission_issue_id">
<span<?php echo $view_ip_admission_issue->id->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_ip_admission_issue->mrnNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_mrnNo" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_mrnNo" class="view_ip_admission_issue_mrnNo">
<span<?php echo $view_ip_admission_issue->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $view_ip_admission_issue->patient_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_patient_id" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_patient_id" class="view_ip_admission_issue_patient_id">
<span<?php echo $view_ip_admission_issue->patient_id->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_ip_admission_issue->patient_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_patient_name" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_patient_name" class="view_ip_admission_issue_patient_name">
<span<?php echo $view_ip_admission_issue->patient_name->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_ip_admission_issue->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_gender" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_gender" class="view_ip_admission_issue_gender">
<span<?php echo $view_ip_admission_issue->gender->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->gender->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->age->Visible) { // age ?>
		<td data-name="age"<?php echo $view_ip_admission_issue->age->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_age" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_age" class="view_ip_admission_issue_age">
<span<?php echo $view_ip_admission_issue->age->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->age->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_ip_admission_issue->physician_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_physician_id" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_physician_id" class="view_ip_admission_issue_physician_id">
<span<?php echo $view_ip_admission_issue->physician_id->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_ip_admission_issue->typeRegsisteration->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_typeRegsisteration" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_typeRegsisteration" class="view_ip_admission_issue_typeRegsisteration">
<span<?php echo $view_ip_admission_issue->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $view_ip_admission_issue->PaymentCategory->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PaymentCategory" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PaymentCategory" class="view_ip_admission_issue_PaymentCategory">
<span<?php echo $view_ip_admission_issue->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id"<?php echo $view_ip_admission_issue->admission_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_admission_consultant_id" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_admission_consultant_id" class="view_ip_admission_issue_admission_consultant_id">
<span<?php echo $view_ip_admission_issue->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id"<?php echo $view_ip_admission_issue->leading_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_leading_consultant_id" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_leading_consultant_id" class="view_ip_admission_issue_leading_consultant_id">
<span<?php echo $view_ip_admission_issue->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_ip_admission_issue->admission_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_admission_date" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_admission_date" class="view_ip_admission_issue_admission_date">
<span<?php echo $view_ip_admission_issue->admission_date->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_ip_admission_issue->release_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_release_date" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_release_date" class="view_ip_admission_issue_release_date">
<span<?php echo $view_ip_admission_issue->release_date->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_ip_admission_issue->PaymentStatus->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PaymentStatus" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PaymentStatus" class="view_ip_admission_issue_PaymentStatus">
<span<?php echo $view_ip_admission_issue->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ip_admission_issue->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_status" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_status" class="view_ip_admission_issue_status">
<span<?php echo $view_ip_admission_issue->status->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_admission_issue->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_createdby" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_createdby" class="view_ip_admission_issue_createdby">
<span<?php echo $view_ip_admission_issue->createdby->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_admission_issue->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_createddatetime" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_createddatetime" class="view_ip_admission_issue_createddatetime">
<span<?php echo $view_ip_admission_issue->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_admission_issue->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_modifiedby" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_modifiedby" class="view_ip_admission_issue_modifiedby">
<span<?php echo $view_ip_admission_issue->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_admission_issue->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_modifieddatetime" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_modifieddatetime" class="view_ip_admission_issue_modifieddatetime">
<span<?php echo $view_ip_admission_issue->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_admission_issue->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PatientID" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PatientID" class="view_ip_admission_issue_PatientID">
<span<?php echo $view_ip_admission_issue->PatientID->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_admission_issue->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_HospID" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_HospID" class="view_ip_admission_issue_HospID">
<span<?php echo $view_ip_admission_issue->HospID->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ip_admission_issue->ReferedByDr->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferedByDr" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferedByDr" class="view_ip_admission_issue_ReferedByDr">
<span<?php echo $view_ip_admission_issue->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_ip_admission_issue->ReferClinicname->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferClinicname" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferClinicname" class="view_ip_admission_issue_ReferClinicname">
<span<?php echo $view_ip_admission_issue->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_ip_admission_issue->ReferCity->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferCity" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferCity" class="view_ip_admission_issue_ReferCity">
<span<?php echo $view_ip_admission_issue->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_ip_admission_issue->ReferMobileNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferMobileNo" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferMobileNo" class="view_ip_admission_issue_ReferMobileNo">
<span<?php echo $view_ip_admission_issue->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_admission_issue->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferA4TreatingConsultant" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReferA4TreatingConsultant" class="view_ip_admission_issue_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_issue->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_admission_issue->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PurposreReferredfor" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_PurposreReferredfor" class="view_ip_admission_issue_PurposreReferredfor">
<span<?php echo $view_ip_admission_issue->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $view_ip_admission_issue->mobileno->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_mobileno" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_mobileno" class="view_ip_admission_issue_mobileno">
<span<?php echo $view_ip_admission_issue->mobileno->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $view_ip_admission_issue->BillClosing->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillClosing" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillClosing" class="view_ip_admission_issue_BillClosing">
<span<?php echo $view_ip_admission_issue->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $view_ip_admission_issue->BillClosingDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillClosingDate" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillClosingDate" class="view_ip_admission_issue_BillClosingDate">
<span<?php echo $view_ip_admission_issue->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_admission_issue->BillNumber->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillNumber" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillNumber" class="view_ip_admission_issue_BillNumber">
<span<?php echo $view_ip_admission_issue->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount"<?php echo $view_ip_admission_issue->ClosingAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ClosingAmount" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ClosingAmount" class="view_ip_admission_issue_ClosingAmount">
<span<?php echo $view_ip_admission_issue->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType"<?php echo $view_ip_admission_issue->ClosingType->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ClosingType" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ClosingType" class="view_ip_admission_issue_ClosingType">
<span<?php echo $view_ip_admission_issue->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount"<?php echo $view_ip_admission_issue->BillAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillAmount" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_BillAmount" class="view_ip_admission_issue_BillAmount">
<span<?php echo $view_ip_admission_issue->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy"<?php echo $view_ip_admission_issue->billclosedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_billclosedBy" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_billclosedBy" class="view_ip_admission_issue_billclosedBy">
<span<?php echo $view_ip_admission_issue->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate"<?php echo $view_ip_admission_issue->bllcloseByDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_bllcloseByDate" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_bllcloseByDate" class="view_ip_admission_issue_bllcloseByDate">
<span<?php echo $view_ip_admission_issue->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_ip_admission_issue->ReportHeader->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReportHeader" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_ReportHeader" class="view_ip_admission_issue_ReportHeader">
<span<?php echo $view_ip_admission_issue->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $view_ip_admission_issue->Procedure->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Procedure" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Procedure" class="view_ip_admission_issue_Procedure">
<span<?php echo $view_ip_admission_issue->Procedure->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $view_ip_admission_issue->Consultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Consultant" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Consultant" class="view_ip_admission_issue_Consultant">
<span<?php echo $view_ip_admission_issue->Consultant->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $view_ip_admission_issue->Anesthetist->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Anesthetist" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Anesthetist" class="view_ip_admission_issue_Anesthetist">
<span<?php echo $view_ip_admission_issue->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->Amound->Visible) { // Amound ?>
		<td data-name="Amound"<?php echo $view_ip_admission_issue->Amound->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Amound" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Amound" class="view_ip_admission_issue_Amound">
<span<?php echo $view_ip_admission_issue->Amound->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->Amound->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_issue->Package->Visible) { // Package ?>
		<td data-name="Package"<?php echo $view_ip_admission_issue->Package->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Package" class="view_ip_admission_issuelist" type="text/html">
<span id="el<?php echo $view_ip_admission_issue_list->RowCnt ?>_view_ip_admission_issue_Package" class="view_ip_admission_issue_Package">
<span<?php echo $view_ip_admission_issue->Package->viewAttributes() ?>>
<?php echo $view_ip_admission_issue->Package->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_admission_issue_list->ListOptions->render("body", "right", $view_ip_admission_issue_list->RowCnt, "block", $view_ip_admission_issue->TableVar, "view_ip_admission_issuelist");
?>
	</tr>
<?php
	}
	if (!$view_ip_admission_issue->isGridAdd())
		$view_ip_admission_issue_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_admission_issue->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_ip_admission_issuelist" class="ew-custom-template"></div>
<script id="tpm_view_ip_admission_issuelist" type="text/html">
<div id="ct_view_ip_admission_issue_list"><?php if ($view_ip_admission_issue_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
		<td></td>
			<td>{{include tmpl="#tpc_view_ip_admission_issue_PatientID"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_issue_patient_name"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_admission_issue_mrnNo"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_issue_mobileno"/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_ip_admission_issue_list->StartRowCnt; $i <= $view_ip_admission_issue_list->RowCnt; $i++) { ?>
 <tr<?php echo @$view_ip_admission_issue_list->Attrs[$i]['row_attrs'] ?>>
<td>
<div class="btn-group btn-group-sm ew-btn-group">
<a class="btn btn-default ew-row-link ew-view" title="" data-caption="View"  href='pharmacy_pharledlist.php?showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' data-original-title="View">
<i data-phrase="ViewLink" class="icon-view ew-icon" data-caption="View"></i>
</a>
<a class="btn btn-default ew-row-link ew-edit" title="" data-caption="Edit" href='pharmacy_pharledlist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}'  data-original-title="Edit">
<i data-phrase="EditLink" class="icon-edit ew-icon" data-caption="Edit"></i>
</a>
</div>
</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_issue_PatientID"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_issue_patient_name"/}}</td>
	 	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_issue_mrnNo"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_issue_mobileno"/}}</td>
 </tr> 
<?php } ?>
</tbody></table>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_admission_issue_list->Recordset)
	$view_ip_admission_issue_list->Recordset->Close();
?>
<?php if (!$view_ip_admission_issue->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_admission_issue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_issue_list->Pager)) $view_ip_admission_issue_list->Pager = new NumericPager($view_ip_admission_issue_list->StartRec, $view_ip_admission_issue_list->DisplayRecs, $view_ip_admission_issue_list->TotalRecs, $view_ip_admission_issue_list->RecRange, $view_ip_admission_issue_list->AutoHidePager) ?>
<?php if ($view_ip_admission_issue_list->Pager->RecordCount > 0 && $view_ip_admission_issue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_issue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_issue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_issue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_issue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_issue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_issue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_issue_list->pageUrl() ?>start=<?php echo $view_ip_admission_issue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_issue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_issue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_issue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_issue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_issue_list->TotalRecs > 0 && (!$view_ip_admission_issue_list->AutoHidePageSizeSelector || $view_ip_admission_issue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_issue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_issue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_issue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_issue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_issue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_issue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_issue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_issue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_issue_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_admission_issue_list->TotalRecs == 0 && !$view_ip_admission_issue->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_admission_issue->Rows) ?> };
ew.applyTemplate("tpd_view_ip_admission_issuelist", "tpm_view_ip_admission_issuelist", "view_ip_admission_issuelist", "<?php echo $view_ip_admission_issue->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_ip_admission_issuelist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_ip_admission_issuelist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_ip_admission_issuelist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_admission_issue_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_issue->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_admission_issue->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_admission_issue", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_admission_issue_list->terminate();
?>