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
$view_followups_list = new view_followups_list();

// Run the page
$view_followups_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_followups_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_followups->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_followupslist = currentForm = new ew.Form("fview_followupslist", "list");
fview_followupslist.formKeyCountName = '<?php echo $view_followups_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_followupslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_followupslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_followupslistsrch = currentSearchForm = new ew.Form("fview_followupslistsrch");

// Validate function for search
fview_followupslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_followupslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_followupslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_followupslistsrch.filterList = <?php echo $view_followups_list->getFilterList() ?>;
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
<?php if (!$view_followups->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_followups_list->TotalRecs > 0 && $view_followups_list->ExportOptions->visible()) { ?>
<?php $view_followups_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_followups_list->ImportOptions->visible()) { ?>
<?php $view_followups_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_followups_list->SearchOptions->visible()) { ?>
<?php $view_followups_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_followups_list->FilterOptions->visible()) { ?>
<?php $view_followups_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_followups_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_followups->isExport() && !$view_followups->CurrentAction) { ?>
<form name="fview_followupslistsrch" id="fview_followupslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_followups_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_followupslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_followups">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_followups_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_followups->RowType = ROWTYPE_SEARCH;

// Render row
$view_followups->resetAttributes();
$view_followups_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_followups->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_followups->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_followups" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_followups->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_followups->PatientID->EditValue ?>"<?php echo $view_followups->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_followups->first_name->Visible) { // first_name ?>
	<div id="xsc_first_name" class="ew-cell form-group">
		<label for="x_first_name" class="ew-search-caption ew-label"><?php echo $view_followups->first_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_first_name" id="z_first_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_followups" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_followups->first_name->getPlaceHolder()) ?>" value="<?php echo $view_followups->first_name->EditValue ?>"<?php echo $view_followups->first_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_followups->mobile_no->Visible) { // mobile_no ?>
	<div id="xsc_mobile_no" class="ew-cell form-group">
		<label for="x_mobile_no" class="ew-search-caption ew-label"><?php echo $view_followups->mobile_no->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobile_no" id="z_mobile_no" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_followups" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_followups->mobile_no->getPlaceHolder()) ?>" value="<?php echo $view_followups->mobile_no->EditValue ?>"<?php echo $view_followups->mobile_no->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_followups_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_followups_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_followups_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_followups_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_followups_list->showPageHeader(); ?>
<?php
$view_followups_list->showMessage();
?>
<?php if ($view_followups_list->TotalRecs > 0 || $view_followups->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_followups_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_followups">
<?php if (!$view_followups->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_followups->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_followups_list->Pager)) $view_followups_list->Pager = new NumericPager($view_followups_list->StartRec, $view_followups_list->DisplayRecs, $view_followups_list->TotalRecs, $view_followups_list->RecRange, $view_followups_list->AutoHidePager) ?>
<?php if ($view_followups_list->Pager->RecordCount > 0 && $view_followups_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_followups_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_followups_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_followups_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_followups_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_followups_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_followups_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_followups_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_followups_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_followups_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_followups_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_followups_list->TotalRecs > 0 && (!$view_followups_list->AutoHidePageSizeSelector || $view_followups_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_followups">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_followups_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_followups_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_followups_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_followups_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_followups_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_followups_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_followups->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_followups_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_followupslist" id="fview_followupslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_followups_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_followups_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_followups">
<div id="gmp_view_followups" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_followups_list->TotalRecs > 0 || $view_followups->isGridEdit()) { ?>
<table id="tbl_view_followupslist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_followups_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_followups_list->renderListOptions();

// Render list options (header, left)
$view_followups_list->ListOptions->render("header", "left", "", "block", $view_followups->TableVar, "view_followupslist");
?>
<?php if ($view_followups->id->Visible) { // id ?>
	<?php if ($view_followups->sortUrl($view_followups->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_followups->id->headerCellClass() ?>"><div id="elh_view_followups_id" class="view_followups_id"><div class="ew-table-header-caption"><script id="tpc_view_followups_id" class="view_followupslist" type="text/html"><span><?php echo $view_followups->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_followups->id->headerCellClass() ?>"><script id="tpc_view_followups_id" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->id) ?>',1);"><div id="elh_view_followups_id" class="view_followups_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->PatientID->Visible) { // PatientID ?>
	<?php if ($view_followups->sortUrl($view_followups->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_followups->PatientID->headerCellClass() ?>"><div id="elh_view_followups_PatientID" class="view_followups_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_followups_PatientID" class="view_followupslist" type="text/html"><span><?php echo $view_followups->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_followups->PatientID->headerCellClass() ?>"><script id="tpc_view_followups_PatientID" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->PatientID) ?>',1);"><div id="elh_view_followups_PatientID" class="view_followups_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->title->Visible) { // title ?>
	<?php if ($view_followups->sortUrl($view_followups->title) == "") { ?>
		<th data-name="title" class="<?php echo $view_followups->title->headerCellClass() ?>"><div id="elh_view_followups_title" class="view_followups_title"><div class="ew-table-header-caption"><script id="tpc_view_followups_title" class="view_followupslist" type="text/html"><span><?php echo $view_followups->title->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $view_followups->title->headerCellClass() ?>"><script id="tpc_view_followups_title" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->title) ?>',1);"><div id="elh_view_followups_title" class="view_followups_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->title->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->first_name->Visible) { // first_name ?>
	<?php if ($view_followups->sortUrl($view_followups->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_followups->first_name->headerCellClass() ?>"><div id="elh_view_followups_first_name" class="view_followups_first_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_first_name" class="view_followupslist" type="text/html"><span><?php echo $view_followups->first_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_followups->first_name->headerCellClass() ?>"><script id="tpc_view_followups_first_name" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->first_name) ?>',1);"><div id="elh_view_followups_first_name" class="view_followups_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->middle_name->Visible) { // middle_name ?>
	<?php if ($view_followups->sortUrl($view_followups->middle_name) == "") { ?>
		<th data-name="middle_name" class="<?php echo $view_followups->middle_name->headerCellClass() ?>"><div id="elh_view_followups_middle_name" class="view_followups_middle_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_middle_name" class="view_followupslist" type="text/html"><span><?php echo $view_followups->middle_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="middle_name" class="<?php echo $view_followups->middle_name->headerCellClass() ?>"><script id="tpc_view_followups_middle_name" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->middle_name) ?>',1);"><div id="elh_view_followups_middle_name" class="view_followups_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->last_name->Visible) { // last_name ?>
	<?php if ($view_followups->sortUrl($view_followups->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $view_followups->last_name->headerCellClass() ?>"><div id="elh_view_followups_last_name" class="view_followups_last_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_last_name" class="view_followupslist" type="text/html"><span><?php echo $view_followups->last_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $view_followups->last_name->headerCellClass() ?>"><script id="tpc_view_followups_last_name" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->last_name) ?>',1);"><div id="elh_view_followups_last_name" class="view_followups_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->gender->Visible) { // gender ?>
	<?php if ($view_followups->sortUrl($view_followups->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_followups->gender->headerCellClass() ?>"><div id="elh_view_followups_gender" class="view_followups_gender"><div class="ew-table-header-caption"><script id="tpc_view_followups_gender" class="view_followupslist" type="text/html"><span><?php echo $view_followups->gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_followups->gender->headerCellClass() ?>"><script id="tpc_view_followups_gender" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->gender) ?>',1);"><div id="elh_view_followups_gender" class="view_followups_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->dob->Visible) { // dob ?>
	<?php if ($view_followups->sortUrl($view_followups->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $view_followups->dob->headerCellClass() ?>"><div id="elh_view_followups_dob" class="view_followups_dob"><div class="ew-table-header-caption"><script id="tpc_view_followups_dob" class="view_followupslist" type="text/html"><span><?php echo $view_followups->dob->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $view_followups->dob->headerCellClass() ?>"><script id="tpc_view_followups_dob" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->dob) ?>',1);"><div id="elh_view_followups_dob" class="view_followups_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Age->Visible) { // Age ?>
	<?php if ($view_followups->sortUrl($view_followups->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_followups->Age->headerCellClass() ?>"><div id="elh_view_followups_Age" class="view_followups_Age"><div class="ew-table-header-caption"><script id="tpc_view_followups_Age" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_followups->Age->headerCellClass() ?>"><script id="tpc_view_followups_Age" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Age) ?>',1);"><div id="elh_view_followups_Age" class="view_followups_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->blood_group->Visible) { // blood_group ?>
	<?php if ($view_followups->sortUrl($view_followups->blood_group) == "") { ?>
		<th data-name="blood_group" class="<?php echo $view_followups->blood_group->headerCellClass() ?>"><div id="elh_view_followups_blood_group" class="view_followups_blood_group"><div class="ew-table-header-caption"><script id="tpc_view_followups_blood_group" class="view_followupslist" type="text/html"><span><?php echo $view_followups->blood_group->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="blood_group" class="<?php echo $view_followups->blood_group->headerCellClass() ?>"><script id="tpc_view_followups_blood_group" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->blood_group) ?>',1);"><div id="elh_view_followups_blood_group" class="view_followups_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_followups->sortUrl($view_followups->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_followups->mobile_no->headerCellClass() ?>"><div id="elh_view_followups_mobile_no" class="view_followups_mobile_no"><div class="ew-table-header-caption"><script id="tpc_view_followups_mobile_no" class="view_followupslist" type="text/html"><span><?php echo $view_followups->mobile_no->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_followups->mobile_no->headerCellClass() ?>"><script id="tpc_view_followups_mobile_no" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->mobile_no) ?>',1);"><div id="elh_view_followups_mobile_no" class="view_followups_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($view_followups->sortUrl($view_followups->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_followups->IdentificationMark->headerCellClass() ?>"><div id="elh_view_followups_IdentificationMark" class="view_followups_IdentificationMark"><div class="ew-table-header-caption"><script id="tpc_view_followups_IdentificationMark" class="view_followupslist" type="text/html"><span><?php echo $view_followups->IdentificationMark->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_followups->IdentificationMark->headerCellClass() ?>"><script id="tpc_view_followups_IdentificationMark" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->IdentificationMark) ?>',1);"><div id="elh_view_followups_IdentificationMark" class="view_followups_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Religion->Visible) { // Religion ?>
	<?php if ($view_followups->sortUrl($view_followups->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $view_followups->Religion->headerCellClass() ?>"><div id="elh_view_followups_Religion" class="view_followups_Religion"><div class="ew-table-header-caption"><script id="tpc_view_followups_Religion" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Religion->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $view_followups->Religion->headerCellClass() ?>"><script id="tpc_view_followups_Religion" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Religion) ?>',1);"><div id="elh_view_followups_Religion" class="view_followups_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Nationality->Visible) { // Nationality ?>
	<?php if ($view_followups->sortUrl($view_followups->Nationality) == "") { ?>
		<th data-name="Nationality" class="<?php echo $view_followups->Nationality->headerCellClass() ?>"><div id="elh_view_followups_Nationality" class="view_followups_Nationality"><div class="ew-table-header-caption"><script id="tpc_view_followups_Nationality" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Nationality->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Nationality" class="<?php echo $view_followups->Nationality->headerCellClass() ?>"><script id="tpc_view_followups_Nationality" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Nationality) ?>',1);"><div id="elh_view_followups_Nationality" class="view_followups_Nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Nationality->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Nationality->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Nationality->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->profilePic->Visible) { // profilePic ?>
	<?php if ($view_followups->sortUrl($view_followups->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_followups->profilePic->headerCellClass() ?>"><div id="elh_view_followups_profilePic" class="view_followups_profilePic"><div class="ew-table-header-caption"><script id="tpc_view_followups_profilePic" class="view_followupslist" type="text/html"><span><?php echo $view_followups->profilePic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_followups->profilePic->headerCellClass() ?>"><script id="tpc_view_followups_profilePic" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->profilePic) ?>',1);"><div id="elh_view_followups_profilePic" class="view_followups_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->status->Visible) { // status ?>
	<?php if ($view_followups->sortUrl($view_followups->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_followups->status->headerCellClass() ?>"><div id="elh_view_followups_status" class="view_followups_status"><div class="ew-table-header-caption"><script id="tpc_view_followups_status" class="view_followupslist" type="text/html"><span><?php echo $view_followups->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_followups->status->headerCellClass() ?>"><script id="tpc_view_followups_status" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->status) ?>',1);"><div id="elh_view_followups_status" class="view_followups_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->createdby->Visible) { // createdby ?>
	<?php if ($view_followups->sortUrl($view_followups->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_followups->createdby->headerCellClass() ?>"><div id="elh_view_followups_createdby" class="view_followups_createdby"><div class="ew-table-header-caption"><script id="tpc_view_followups_createdby" class="view_followupslist" type="text/html"><span><?php echo $view_followups->createdby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_followups->createdby->headerCellClass() ?>"><script id="tpc_view_followups_createdby" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->createdby) ?>',1);"><div id="elh_view_followups_createdby" class="view_followups_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_followups->sortUrl($view_followups->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_followups->createddatetime->headerCellClass() ?>"><div id="elh_view_followups_createddatetime" class="view_followups_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_followups_createddatetime" class="view_followupslist" type="text/html"><span><?php echo $view_followups->createddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_followups->createddatetime->headerCellClass() ?>"><script id="tpc_view_followups_createddatetime" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->createddatetime) ?>',1);"><div id="elh_view_followups_createddatetime" class="view_followups_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_followups->sortUrl($view_followups->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_followups->modifiedby->headerCellClass() ?>"><div id="elh_view_followups_modifiedby" class="view_followups_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_followups_modifiedby" class="view_followupslist" type="text/html"><span><?php echo $view_followups->modifiedby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_followups->modifiedby->headerCellClass() ?>"><script id="tpc_view_followups_modifiedby" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->modifiedby) ?>',1);"><div id="elh_view_followups_modifiedby" class="view_followups_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_followups->sortUrl($view_followups->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_followups->modifieddatetime->headerCellClass() ?>"><div id="elh_view_followups_modifieddatetime" class="view_followups_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_followups_modifieddatetime" class="view_followupslist" type="text/html"><span><?php echo $view_followups->modifieddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_followups->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_followups_modifieddatetime" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->modifieddatetime) ?>',1);"><div id="elh_view_followups_modifieddatetime" class="view_followups_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_followups->sortUrl($view_followups->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_followups->ReferedByDr->headerCellClass() ?>"><div id="elh_view_followups_ReferedByDr" class="view_followups_ReferedByDr"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferedByDr" class="view_followupslist" type="text/html"><span><?php echo $view_followups->ReferedByDr->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_followups->ReferedByDr->headerCellClass() ?>"><script id="tpc_view_followups_ReferedByDr" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->ReferedByDr) ?>',1);"><div id="elh_view_followups_ReferedByDr" class="view_followups_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_followups->sortUrl($view_followups->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_followups->ReferClinicname->headerCellClass() ?>"><div id="elh_view_followups_ReferClinicname" class="view_followups_ReferClinicname"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferClinicname" class="view_followupslist" type="text/html"><span><?php echo $view_followups->ReferClinicname->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_followups->ReferClinicname->headerCellClass() ?>"><script id="tpc_view_followups_ReferClinicname" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->ReferClinicname) ?>',1);"><div id="elh_view_followups_ReferClinicname" class="view_followups_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_followups->sortUrl($view_followups->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_followups->ReferCity->headerCellClass() ?>"><div id="elh_view_followups_ReferCity" class="view_followups_ReferCity"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferCity" class="view_followupslist" type="text/html"><span><?php echo $view_followups->ReferCity->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_followups->ReferCity->headerCellClass() ?>"><script id="tpc_view_followups_ReferCity" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->ReferCity) ?>',1);"><div id="elh_view_followups_ReferCity" class="view_followups_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_followups->sortUrl($view_followups->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_followups->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_followups_ReferMobileNo" class="view_followups_ReferMobileNo"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferMobileNo" class="view_followupslist" type="text/html"><span><?php echo $view_followups->ReferMobileNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_followups->ReferMobileNo->headerCellClass() ?>"><script id="tpc_view_followups_ReferMobileNo" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->ReferMobileNo) ?>',1);"><div id="elh_view_followups_ReferMobileNo" class="view_followups_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_followups->sortUrl($view_followups->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_followups->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_followups_ReferA4TreatingConsultant" class="view_followups_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><script id="tpc_view_followups_ReferA4TreatingConsultant" class="view_followupslist" type="text/html"><span><?php echo $view_followups->ReferA4TreatingConsultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_followups->ReferA4TreatingConsultant->headerCellClass() ?>"><script id="tpc_view_followups_ReferA4TreatingConsultant" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_followups_ReferA4TreatingConsultant" class="view_followups_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_followups->sortUrl($view_followups->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_followups->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_followups_PurposreReferredfor" class="view_followups_PurposreReferredfor"><div class="ew-table-header-caption"><script id="tpc_view_followups_PurposreReferredfor" class="view_followupslist" type="text/html"><span><?php echo $view_followups->PurposreReferredfor->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_followups->PurposreReferredfor->headerCellClass() ?>"><script id="tpc_view_followups_PurposreReferredfor" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->PurposreReferredfor) ?>',1);"><div id="elh_view_followups_PurposreReferredfor" class="view_followups_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_title->Visible) { // spouse_title ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_title) == "") { ?>
		<th data-name="spouse_title" class="<?php echo $view_followups->spouse_title->headerCellClass() ?>"><div id="elh_view_followups_spouse_title" class="view_followups_spouse_title"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_title" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_title->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_title" class="<?php echo $view_followups->spouse_title->headerCellClass() ?>"><script id="tpc_view_followups_spouse_title" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_title) ?>',1);"><div id="elh_view_followups_spouse_title" class="view_followups_spouse_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_first_name->Visible) { // spouse_first_name ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_first_name) == "") { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_followups->spouse_first_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_first_name" class="view_followups_spouse_first_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_first_name" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_first_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_followups->spouse_first_name->headerCellClass() ?>"><script id="tpc_view_followups_spouse_first_name" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_first_name) ?>',1);"><div id="elh_view_followups_spouse_first_name" class="view_followups_spouse_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_middle_name) == "") { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_followups->spouse_middle_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_middle_name" class="view_followups_spouse_middle_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_middle_name" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_middle_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_followups->spouse_middle_name->headerCellClass() ?>"><script id="tpc_view_followups_spouse_middle_name" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_middle_name) ?>',1);"><div id="elh_view_followups_spouse_middle_name" class="view_followups_spouse_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_last_name->Visible) { // spouse_last_name ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_last_name) == "") { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_followups->spouse_last_name->headerCellClass() ?>"><div id="elh_view_followups_spouse_last_name" class="view_followups_spouse_last_name"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_last_name" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_last_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_followups->spouse_last_name->headerCellClass() ?>"><script id="tpc_view_followups_spouse_last_name" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_last_name) ?>',1);"><div id="elh_view_followups_spouse_last_name" class="view_followups_spouse_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_gender->Visible) { // spouse_gender ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_gender) == "") { ?>
		<th data-name="spouse_gender" class="<?php echo $view_followups->spouse_gender->headerCellClass() ?>"><div id="elh_view_followups_spouse_gender" class="view_followups_spouse_gender"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_gender" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_gender" class="<?php echo $view_followups->spouse_gender->headerCellClass() ?>"><script id="tpc_view_followups_spouse_gender" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_gender) ?>',1);"><div id="elh_view_followups_spouse_gender" class="view_followups_spouse_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_dob->Visible) { // spouse_dob ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_dob) == "") { ?>
		<th data-name="spouse_dob" class="<?php echo $view_followups->spouse_dob->headerCellClass() ?>"><div id="elh_view_followups_spouse_dob" class="view_followups_spouse_dob"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_dob" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_dob->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_dob" class="<?php echo $view_followups->spouse_dob->headerCellClass() ?>"><script id="tpc_view_followups_spouse_dob" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_dob) ?>',1);"><div id="elh_view_followups_spouse_dob" class="view_followups_spouse_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_Age->Visible) { // spouse_Age ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_Age) == "") { ?>
		<th data-name="spouse_Age" class="<?php echo $view_followups->spouse_Age->headerCellClass() ?>"><div id="elh_view_followups_spouse_Age" class="view_followups_spouse_Age"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_Age" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_Age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_Age" class="<?php echo $view_followups->spouse_Age->headerCellClass() ?>"><script id="tpc_view_followups_spouse_Age" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_Age) ?>',1);"><div id="elh_view_followups_spouse_Age" class="view_followups_spouse_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_blood_group) == "") { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_followups->spouse_blood_group->headerCellClass() ?>"><div id="elh_view_followups_spouse_blood_group" class="view_followups_spouse_blood_group"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_blood_group" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_blood_group->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_followups->spouse_blood_group->headerCellClass() ?>"><script id="tpc_view_followups_spouse_blood_group" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_blood_group) ?>',1);"><div id="elh_view_followups_spouse_blood_group" class="view_followups_spouse_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_followups->spouse_mobile_no->headerCellClass() ?>"><div id="elh_view_followups_spouse_mobile_no" class="view_followups_spouse_mobile_no"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_mobile_no" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_mobile_no->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_followups->spouse_mobile_no->headerCellClass() ?>"><script id="tpc_view_followups_spouse_mobile_no" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_mobile_no) ?>',1);"><div id="elh_view_followups_spouse_mobile_no" class="view_followups_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Maritalstatus->Visible) { // Maritalstatus ?>
	<?php if ($view_followups->sortUrl($view_followups->Maritalstatus) == "") { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_followups->Maritalstatus->headerCellClass() ?>"><div id="elh_view_followups_Maritalstatus" class="view_followups_Maritalstatus"><div class="ew-table-header-caption"><script id="tpc_view_followups_Maritalstatus" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Maritalstatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_followups->Maritalstatus->headerCellClass() ?>"><script id="tpc_view_followups_Maritalstatus" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Maritalstatus) ?>',1);"><div id="elh_view_followups_Maritalstatus" class="view_followups_Maritalstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Maritalstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Maritalstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Maritalstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Business->Visible) { // Business ?>
	<?php if ($view_followups->sortUrl($view_followups->Business) == "") { ?>
		<th data-name="Business" class="<?php echo $view_followups->Business->headerCellClass() ?>"><div id="elh_view_followups_Business" class="view_followups_Business"><div class="ew-table-header-caption"><script id="tpc_view_followups_Business" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Business->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Business" class="<?php echo $view_followups->Business->headerCellClass() ?>"><script id="tpc_view_followups_Business" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Business) ?>',1);"><div id="elh_view_followups_Business" class="view_followups_Business">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Business->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Business->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Business->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_followups->sortUrl($view_followups->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $view_followups->Patient_Language->headerCellClass() ?>"><div id="elh_view_followups_Patient_Language" class="view_followups_Patient_Language"><div class="ew-table-header-caption"><script id="tpc_view_followups_Patient_Language" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Patient_Language->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $view_followups->Patient_Language->headerCellClass() ?>"><script id="tpc_view_followups_Patient_Language" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Patient_Language) ?>',1);"><div id="elh_view_followups_Patient_Language" class="view_followups_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Patient_Language->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Patient_Language->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Patient_Language->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Passport->Visible) { // Passport ?>
	<?php if ($view_followups->sortUrl($view_followups->Passport) == "") { ?>
		<th data-name="Passport" class="<?php echo $view_followups->Passport->headerCellClass() ?>"><div id="elh_view_followups_Passport" class="view_followups_Passport"><div class="ew-table-header-caption"><script id="tpc_view_followups_Passport" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Passport->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Passport" class="<?php echo $view_followups->Passport->headerCellClass() ?>"><script id="tpc_view_followups_Passport" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Passport) ?>',1);"><div id="elh_view_followups_Passport" class="view_followups_Passport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Passport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Passport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Passport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->VisaNo->Visible) { // VisaNo ?>
	<?php if ($view_followups->sortUrl($view_followups->VisaNo) == "") { ?>
		<th data-name="VisaNo" class="<?php echo $view_followups->VisaNo->headerCellClass() ?>"><div id="elh_view_followups_VisaNo" class="view_followups_VisaNo"><div class="ew-table-header-caption"><script id="tpc_view_followups_VisaNo" class="view_followupslist" type="text/html"><span><?php echo $view_followups->VisaNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="VisaNo" class="<?php echo $view_followups->VisaNo->headerCellClass() ?>"><script id="tpc_view_followups_VisaNo" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->VisaNo) ?>',1);"><div id="elh_view_followups_VisaNo" class="view_followups_VisaNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->VisaNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->VisaNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->VisaNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<?php if ($view_followups->sortUrl($view_followups->ValidityOfVisa) == "") { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_followups->ValidityOfVisa->headerCellClass() ?>"><div id="elh_view_followups_ValidityOfVisa" class="view_followups_ValidityOfVisa"><div class="ew-table-header-caption"><script id="tpc_view_followups_ValidityOfVisa" class="view_followupslist" type="text/html"><span><?php echo $view_followups->ValidityOfVisa->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_followups->ValidityOfVisa->headerCellClass() ?>"><script id="tpc_view_followups_ValidityOfVisa" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->ValidityOfVisa) ?>',1);"><div id="elh_view_followups_ValidityOfVisa" class="view_followups_ValidityOfVisa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->ValidityOfVisa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->ValidityOfVisa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->ValidityOfVisa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_followups->sortUrl($view_followups->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_followups->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_followups_WhereDidYouHear" class="view_followups_WhereDidYouHear"><div class="ew-table-header-caption"><script id="tpc_view_followups_WhereDidYouHear" class="view_followupslist" type="text/html"><span><?php echo $view_followups->WhereDidYouHear->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_followups->WhereDidYouHear->headerCellClass() ?>"><script id="tpc_view_followups_WhereDidYouHear" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->WhereDidYouHear) ?>',1);"><div id="elh_view_followups_WhereDidYouHear" class="view_followups_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->WhereDidYouHear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->HospID->Visible) { // HospID ?>
	<?php if ($view_followups->sortUrl($view_followups->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_followups->HospID->headerCellClass() ?>"><div id="elh_view_followups_HospID" class="view_followups_HospID"><div class="ew-table-header-caption"><script id="tpc_view_followups_HospID" class="view_followupslist" type="text/html"><span><?php echo $view_followups->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_followups->HospID->headerCellClass() ?>"><script id="tpc_view_followups_HospID" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->HospID) ?>',1);"><div id="elh_view_followups_HospID" class="view_followups_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->street->Visible) { // street ?>
	<?php if ($view_followups->sortUrl($view_followups->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_followups->street->headerCellClass() ?>"><div id="elh_view_followups_street" class="view_followups_street"><div class="ew-table-header-caption"><script id="tpc_view_followups_street" class="view_followupslist" type="text/html"><span><?php echo $view_followups->street->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_followups->street->headerCellClass() ?>"><script id="tpc_view_followups_street" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->street) ?>',1);"><div id="elh_view_followups_street" class="view_followups_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->town->Visible) { // town ?>
	<?php if ($view_followups->sortUrl($view_followups->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_followups->town->headerCellClass() ?>"><div id="elh_view_followups_town" class="view_followups_town"><div class="ew-table-header-caption"><script id="tpc_view_followups_town" class="view_followupslist" type="text/html"><span><?php echo $view_followups->town->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_followups->town->headerCellClass() ?>"><script id="tpc_view_followups_town" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->town) ?>',1);"><div id="elh_view_followups_town" class="view_followups_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->province->Visible) { // province ?>
	<?php if ($view_followups->sortUrl($view_followups->province) == "") { ?>
		<th data-name="province" class="<?php echo $view_followups->province->headerCellClass() ?>"><div id="elh_view_followups_province" class="view_followups_province"><div class="ew-table-header-caption"><script id="tpc_view_followups_province" class="view_followupslist" type="text/html"><span><?php echo $view_followups->province->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $view_followups->province->headerCellClass() ?>"><script id="tpc_view_followups_province" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->province) ?>',1);"><div id="elh_view_followups_province" class="view_followups_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->country->Visible) { // country ?>
	<?php if ($view_followups->sortUrl($view_followups->country) == "") { ?>
		<th data-name="country" class="<?php echo $view_followups->country->headerCellClass() ?>"><div id="elh_view_followups_country" class="view_followups_country"><div class="ew-table-header-caption"><script id="tpc_view_followups_country" class="view_followupslist" type="text/html"><span><?php echo $view_followups->country->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $view_followups->country->headerCellClass() ?>"><script id="tpc_view_followups_country" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->country) ?>',1);"><div id="elh_view_followups_country" class="view_followups_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->postal_code->Visible) { // postal_code ?>
	<?php if ($view_followups->sortUrl($view_followups->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $view_followups->postal_code->headerCellClass() ?>"><div id="elh_view_followups_postal_code" class="view_followups_postal_code"><div class="ew-table-header-caption"><script id="tpc_view_followups_postal_code" class="view_followupslist" type="text/html"><span><?php echo $view_followups->postal_code->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $view_followups->postal_code->headerCellClass() ?>"><script id="tpc_view_followups_postal_code" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->postal_code) ?>',1);"><div id="elh_view_followups_postal_code" class="view_followups_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->PEmail->Visible) { // PEmail ?>
	<?php if ($view_followups->sortUrl($view_followups->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $view_followups->PEmail->headerCellClass() ?>"><div id="elh_view_followups_PEmail" class="view_followups_PEmail"><div class="ew-table-header-caption"><script id="tpc_view_followups_PEmail" class="view_followupslist" type="text/html"><span><?php echo $view_followups->PEmail->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $view_followups->PEmail->headerCellClass() ?>"><script id="tpc_view_followups_PEmail" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->PEmail) ?>',1);"><div id="elh_view_followups_PEmail" class="view_followups_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->PEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->PEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<?php if ($view_followups->sortUrl($view_followups->PEmergencyContact) == "") { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_followups->PEmergencyContact->headerCellClass() ?>"><div id="elh_view_followups_PEmergencyContact" class="view_followups_PEmergencyContact"><div class="ew-table-header-caption"><script id="tpc_view_followups_PEmergencyContact" class="view_followupslist" type="text/html"><span><?php echo $view_followups->PEmergencyContact->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_followups->PEmergencyContact->headerCellClass() ?>"><script id="tpc_view_followups_PEmergencyContact" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->PEmergencyContact) ?>',1);"><div id="elh_view_followups_PEmergencyContact" class="view_followups_PEmergencyContact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->PEmergencyContact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->PEmergencyContact->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->PEmergencyContact->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->occupation->Visible) { // occupation ?>
	<?php if ($view_followups->sortUrl($view_followups->occupation) == "") { ?>
		<th data-name="occupation" class="<?php echo $view_followups->occupation->headerCellClass() ?>"><div id="elh_view_followups_occupation" class="view_followups_occupation"><div class="ew-table-header-caption"><script id="tpc_view_followups_occupation" class="view_followupslist" type="text/html"><span><?php echo $view_followups->occupation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="occupation" class="<?php echo $view_followups->occupation->headerCellClass() ?>"><script id="tpc_view_followups_occupation" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->occupation) ?>',1);"><div id="elh_view_followups_occupation" class="view_followups_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->occupation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->occupation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->spouse_occupation->Visible) { // spouse_occupation ?>
	<?php if ($view_followups->sortUrl($view_followups->spouse_occupation) == "") { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_followups->spouse_occupation->headerCellClass() ?>"><div id="elh_view_followups_spouse_occupation" class="view_followups_spouse_occupation"><div class="ew-table-header-caption"><script id="tpc_view_followups_spouse_occupation" class="view_followupslist" type="text/html"><span><?php echo $view_followups->spouse_occupation->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_followups->spouse_occupation->headerCellClass() ?>"><script id="tpc_view_followups_spouse_occupation" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->spouse_occupation) ?>',1);"><div id="elh_view_followups_spouse_occupation" class="view_followups_spouse_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->spouse_occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->spouse_occupation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->spouse_occupation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->WhatsApp->Visible) { // WhatsApp ?>
	<?php if ($view_followups->sortUrl($view_followups->WhatsApp) == "") { ?>
		<th data-name="WhatsApp" class="<?php echo $view_followups->WhatsApp->headerCellClass() ?>"><div id="elh_view_followups_WhatsApp" class="view_followups_WhatsApp"><div class="ew-table-header-caption"><script id="tpc_view_followups_WhatsApp" class="view_followupslist" type="text/html"><span><?php echo $view_followups->WhatsApp->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="WhatsApp" class="<?php echo $view_followups->WhatsApp->headerCellClass() ?>"><script id="tpc_view_followups_WhatsApp" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->WhatsApp) ?>',1);"><div id="elh_view_followups_WhatsApp" class="view_followups_WhatsApp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->WhatsApp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->WhatsApp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->WhatsApp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->CouppleID->Visible) { // CouppleID ?>
	<?php if ($view_followups->sortUrl($view_followups->CouppleID) == "") { ?>
		<th data-name="CouppleID" class="<?php echo $view_followups->CouppleID->headerCellClass() ?>"><div id="elh_view_followups_CouppleID" class="view_followups_CouppleID"><div class="ew-table-header-caption"><script id="tpc_view_followups_CouppleID" class="view_followupslist" type="text/html"><span><?php echo $view_followups->CouppleID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="CouppleID" class="<?php echo $view_followups->CouppleID->headerCellClass() ?>"><script id="tpc_view_followups_CouppleID" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->CouppleID) ?>',1);"><div id="elh_view_followups_CouppleID" class="view_followups_CouppleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->CouppleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->CouppleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->CouppleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->MaleID->Visible) { // MaleID ?>
	<?php if ($view_followups->sortUrl($view_followups->MaleID) == "") { ?>
		<th data-name="MaleID" class="<?php echo $view_followups->MaleID->headerCellClass() ?>"><div id="elh_view_followups_MaleID" class="view_followups_MaleID"><div class="ew-table-header-caption"><script id="tpc_view_followups_MaleID" class="view_followupslist" type="text/html"><span><?php echo $view_followups->MaleID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="MaleID" class="<?php echo $view_followups->MaleID->headerCellClass() ?>"><script id="tpc_view_followups_MaleID" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->MaleID) ?>',1);"><div id="elh_view_followups_MaleID" class="view_followups_MaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->MaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->MaleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->MaleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->FemaleID->Visible) { // FemaleID ?>
	<?php if ($view_followups->sortUrl($view_followups->FemaleID) == "") { ?>
		<th data-name="FemaleID" class="<?php echo $view_followups->FemaleID->headerCellClass() ?>"><div id="elh_view_followups_FemaleID" class="view_followups_FemaleID"><div class="ew-table-header-caption"><script id="tpc_view_followups_FemaleID" class="view_followupslist" type="text/html"><span><?php echo $view_followups->FemaleID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleID" class="<?php echo $view_followups->FemaleID->headerCellClass() ?>"><script id="tpc_view_followups_FemaleID" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->FemaleID) ?>',1);"><div id="elh_view_followups_FemaleID" class="view_followups_FemaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->FemaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->FemaleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->FemaleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->GroupID->Visible) { // GroupID ?>
	<?php if ($view_followups->sortUrl($view_followups->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $view_followups->GroupID->headerCellClass() ?>"><div id="elh_view_followups_GroupID" class="view_followups_GroupID"><div class="ew-table-header-caption"><script id="tpc_view_followups_GroupID" class="view_followupslist" type="text/html"><span><?php echo $view_followups->GroupID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $view_followups->GroupID->headerCellClass() ?>"><script id="tpc_view_followups_GroupID" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->GroupID) ?>',1);"><div id="elh_view_followups_GroupID" class="view_followups_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->GroupID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_followups->GroupID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->GroupID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_followups->Relationship->Visible) { // Relationship ?>
	<?php if ($view_followups->sortUrl($view_followups->Relationship) == "") { ?>
		<th data-name="Relationship" class="<?php echo $view_followups->Relationship->headerCellClass() ?>"><div id="elh_view_followups_Relationship" class="view_followups_Relationship"><div class="ew-table-header-caption"><script id="tpc_view_followups_Relationship" class="view_followupslist" type="text/html"><span><?php echo $view_followups->Relationship->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Relationship" class="<?php echo $view_followups->Relationship->headerCellClass() ?>"><script id="tpc_view_followups_Relationship" class="view_followupslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_followups->SortUrl($view_followups->Relationship) ?>',1);"><div id="elh_view_followups_Relationship" class="view_followups_Relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_followups->Relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_followups->Relationship->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_followups->Relationship->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_followups_list->ListOptions->render("header", "right", "", "block", $view_followups->TableVar, "view_followupslist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_followups->ExportAll && $view_followups->isExport()) {
	$view_followups_list->StopRec = $view_followups_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_followups_list->TotalRecs > $view_followups_list->StartRec + $view_followups_list->DisplayRecs - 1)
		$view_followups_list->StopRec = $view_followups_list->StartRec + $view_followups_list->DisplayRecs - 1;
	else
		$view_followups_list->StopRec = $view_followups_list->TotalRecs;
}
$view_followups_list->RecCnt = $view_followups_list->StartRec - 1;
if ($view_followups_list->Recordset && !$view_followups_list->Recordset->EOF) {
	$view_followups_list->Recordset->moveFirst();
	$selectLimit = $view_followups_list->UseSelectLimit;
	if (!$selectLimit && $view_followups_list->StartRec > 1)
		$view_followups_list->Recordset->move($view_followups_list->StartRec - 1);
} elseif (!$view_followups->AllowAddDeleteRow && $view_followups_list->StopRec == 0) {
	$view_followups_list->StopRec = $view_followups->GridAddRowCount;
}

// Initialize aggregate
$view_followups->RowType = ROWTYPE_AGGREGATEINIT;
$view_followups->resetAttributes();
$view_followups_list->renderRow();
while ($view_followups_list->RecCnt < $view_followups_list->StopRec) {
	$view_followups_list->RecCnt++;
	if ($view_followups_list->RecCnt >= $view_followups_list->StartRec) {
		$view_followups_list->RowCnt++;

		// Set up key count
		$view_followups_list->KeyCount = $view_followups_list->RowIndex;

		// Init row class and style
		$view_followups->resetAttributes();
		$view_followups->CssClass = "";
		if ($view_followups->isGridAdd()) {
		} else {
			$view_followups_list->loadRowValues($view_followups_list->Recordset); // Load row values
		}
		$view_followups->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_followups->RowAttrs = array_merge($view_followups->RowAttrs, array('data-rowindex'=>$view_followups_list->RowCnt, 'id'=>'r' . $view_followups_list->RowCnt . '_view_followups', 'data-rowtype'=>$view_followups->RowType));

		// Render row
		$view_followups_list->renderRow();

		// Render list options
		$view_followups_list->renderListOptions();

		// Save row and cell attributes
		$view_followups_list->Attrs[$view_followups_list->RowCnt] = array("row_attrs" => $view_followups->rowAttributes(), "cell_attrs" => array());
		$view_followups_list->Attrs[$view_followups_list->RowCnt]["cell_attrs"] = $view_followups->fieldCellAttributes();
?>
	<tr<?php echo $view_followups->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_followups_list->ListOptions->render("body", "left", $view_followups_list->RowCnt, "block", $view_followups->TableVar, "view_followupslist");
?>
	<?php if ($view_followups->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_followups->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_id" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_id" class="view_followups_id">
<span<?php echo $view_followups->id->viewAttributes() ?>>
<?php echo $view_followups->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_followups->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_PatientID" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_PatientID" class="view_followups_PatientID">
<span<?php echo $view_followups->PatientID->viewAttributes() ?>>
<?php echo $view_followups->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->title->Visible) { // title ?>
		<td data-name="title"<?php echo $view_followups->title->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_title" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_title" class="view_followups_title">
<span<?php echo $view_followups->title->viewAttributes() ?>>
<?php echo $view_followups->title->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_followups->first_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_first_name" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_first_name" class="view_followups_first_name">
<span<?php echo $view_followups->first_name->viewAttributes() ?>>
<?php echo $view_followups->first_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name"<?php echo $view_followups->middle_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_middle_name" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_middle_name" class="view_followups_middle_name">
<span<?php echo $view_followups->middle_name->viewAttributes() ?>>
<?php echo $view_followups->middle_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->last_name->Visible) { // last_name ?>
		<td data-name="last_name"<?php echo $view_followups->last_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_last_name" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_last_name" class="view_followups_last_name">
<span<?php echo $view_followups->last_name->viewAttributes() ?>>
<?php echo $view_followups->last_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_followups->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_gender" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_gender" class="view_followups_gender">
<span<?php echo $view_followups->gender->viewAttributes() ?>>
<?php echo $view_followups->gender->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->dob->Visible) { // dob ?>
		<td data-name="dob"<?php echo $view_followups->dob->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_dob" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_dob" class="view_followups_dob">
<span<?php echo $view_followups->dob->viewAttributes() ?>>
<?php echo $view_followups->dob->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_followups->Age->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Age" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Age" class="view_followups_Age">
<span<?php echo $view_followups->Age->viewAttributes() ?>>
<?php echo $view_followups->Age->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->blood_group->Visible) { // blood_group ?>
		<td data-name="blood_group"<?php echo $view_followups->blood_group->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_blood_group" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_blood_group" class="view_followups_blood_group">
<span<?php echo $view_followups->blood_group->viewAttributes() ?>>
<?php echo $view_followups->blood_group->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_followups->mobile_no->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_mobile_no" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_mobile_no" class="view_followups_mobile_no">
<span<?php echo $view_followups->mobile_no->viewAttributes() ?>>
<?php echo $view_followups->mobile_no->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $view_followups->IdentificationMark->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_IdentificationMark" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_IdentificationMark" class="view_followups_IdentificationMark">
<span<?php echo $view_followups->IdentificationMark->viewAttributes() ?>>
<?php echo $view_followups->IdentificationMark->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Religion->Visible) { // Religion ?>
		<td data-name="Religion"<?php echo $view_followups->Religion->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Religion" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Religion" class="view_followups_Religion">
<span<?php echo $view_followups->Religion->viewAttributes() ?>>
<?php echo $view_followups->Religion->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Nationality->Visible) { // Nationality ?>
		<td data-name="Nationality"<?php echo $view_followups->Nationality->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Nationality" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Nationality" class="view_followups_Nationality">
<span<?php echo $view_followups->Nationality->viewAttributes() ?>>
<?php echo $view_followups->Nationality->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $view_followups->profilePic->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_profilePic" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_profilePic" class="view_followups_profilePic">
<span<?php echo $view_followups->profilePic->viewAttributes() ?>>
<?php echo $view_followups->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_followups->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_status" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_status" class="view_followups_status">
<span<?php echo $view_followups->status->viewAttributes() ?>>
<?php echo $view_followups->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_followups->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_createdby" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_createdby" class="view_followups_createdby">
<span<?php echo $view_followups->createdby->viewAttributes() ?>>
<?php echo $view_followups->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_followups->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_createddatetime" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_createddatetime" class="view_followups_createddatetime">
<span<?php echo $view_followups->createddatetime->viewAttributes() ?>>
<?php echo $view_followups->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_followups->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_modifiedby" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_modifiedby" class="view_followups_modifiedby">
<span<?php echo $view_followups->modifiedby->viewAttributes() ?>>
<?php echo $view_followups->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_followups->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_modifieddatetime" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_modifieddatetime" class="view_followups_modifieddatetime">
<span<?php echo $view_followups->modifieddatetime->viewAttributes() ?>>
<?php echo $view_followups->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_followups->ReferedByDr->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferedByDr" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferedByDr" class="view_followups_ReferedByDr">
<span<?php echo $view_followups->ReferedByDr->viewAttributes() ?>>
<?php echo $view_followups->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_followups->ReferClinicname->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferClinicname" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferClinicname" class="view_followups_ReferClinicname">
<span<?php echo $view_followups->ReferClinicname->viewAttributes() ?>>
<?php echo $view_followups->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_followups->ReferCity->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferCity" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferCity" class="view_followups_ReferCity">
<span<?php echo $view_followups->ReferCity->viewAttributes() ?>>
<?php echo $view_followups->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_followups->ReferMobileNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferMobileNo" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferMobileNo" class="view_followups_ReferMobileNo">
<span<?php echo $view_followups->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_followups->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_followups->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferA4TreatingConsultant" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_ReferA4TreatingConsultant" class="view_followups_ReferA4TreatingConsultant">
<span<?php echo $view_followups->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_followups->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_followups->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_PurposreReferredfor" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_PurposreReferredfor" class="view_followups_PurposreReferredfor">
<span<?php echo $view_followups->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_followups->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_title->Visible) { // spouse_title ?>
		<td data-name="spouse_title"<?php echo $view_followups->spouse_title->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_title" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_title" class="view_followups_spouse_title">
<span<?php echo $view_followups->spouse_title->viewAttributes() ?>>
<?php echo $view_followups->spouse_title->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_first_name->Visible) { // spouse_first_name ?>
		<td data-name="spouse_first_name"<?php echo $view_followups->spouse_first_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_first_name" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_first_name" class="view_followups_spouse_first_name">
<span<?php echo $view_followups->spouse_first_name->viewAttributes() ?>>
<?php echo $view_followups->spouse_first_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td data-name="spouse_middle_name"<?php echo $view_followups->spouse_middle_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_middle_name" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_middle_name" class="view_followups_spouse_middle_name">
<span<?php echo $view_followups->spouse_middle_name->viewAttributes() ?>>
<?php echo $view_followups->spouse_middle_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_last_name->Visible) { // spouse_last_name ?>
		<td data-name="spouse_last_name"<?php echo $view_followups->spouse_last_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_last_name" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_last_name" class="view_followups_spouse_last_name">
<span<?php echo $view_followups->spouse_last_name->viewAttributes() ?>>
<?php echo $view_followups->spouse_last_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_gender->Visible) { // spouse_gender ?>
		<td data-name="spouse_gender"<?php echo $view_followups->spouse_gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_gender" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_gender" class="view_followups_spouse_gender">
<span<?php echo $view_followups->spouse_gender->viewAttributes() ?>>
<?php echo $view_followups->spouse_gender->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_dob->Visible) { // spouse_dob ?>
		<td data-name="spouse_dob"<?php echo $view_followups->spouse_dob->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_dob" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_dob" class="view_followups_spouse_dob">
<span<?php echo $view_followups->spouse_dob->viewAttributes() ?>>
<?php echo $view_followups->spouse_dob->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_Age->Visible) { // spouse_Age ?>
		<td data-name="spouse_Age"<?php echo $view_followups->spouse_Age->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_Age" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_Age" class="view_followups_spouse_Age">
<span<?php echo $view_followups->spouse_Age->viewAttributes() ?>>
<?php echo $view_followups->spouse_Age->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td data-name="spouse_blood_group"<?php echo $view_followups->spouse_blood_group->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_blood_group" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_blood_group" class="view_followups_spouse_blood_group">
<span<?php echo $view_followups->spouse_blood_group->viewAttributes() ?>>
<?php echo $view_followups->spouse_blood_group->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no"<?php echo $view_followups->spouse_mobile_no->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_mobile_no" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_mobile_no" class="view_followups_spouse_mobile_no">
<span<?php echo $view_followups->spouse_mobile_no->viewAttributes() ?>>
<?php echo $view_followups->spouse_mobile_no->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Maritalstatus->Visible) { // Maritalstatus ?>
		<td data-name="Maritalstatus"<?php echo $view_followups->Maritalstatus->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Maritalstatus" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Maritalstatus" class="view_followups_Maritalstatus">
<span<?php echo $view_followups->Maritalstatus->viewAttributes() ?>>
<?php echo $view_followups->Maritalstatus->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Business->Visible) { // Business ?>
		<td data-name="Business"<?php echo $view_followups->Business->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Business" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Business" class="view_followups_Business">
<span<?php echo $view_followups->Business->viewAttributes() ?>>
<?php echo $view_followups->Business->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language"<?php echo $view_followups->Patient_Language->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Patient_Language" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Patient_Language" class="view_followups_Patient_Language">
<span<?php echo $view_followups->Patient_Language->viewAttributes() ?>>
<?php echo $view_followups->Patient_Language->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Passport->Visible) { // Passport ?>
		<td data-name="Passport"<?php echo $view_followups->Passport->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Passport" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Passport" class="view_followups_Passport">
<span<?php echo $view_followups->Passport->viewAttributes() ?>>
<?php echo $view_followups->Passport->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->VisaNo->Visible) { // VisaNo ?>
		<td data-name="VisaNo"<?php echo $view_followups->VisaNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_VisaNo" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_VisaNo" class="view_followups_VisaNo">
<span<?php echo $view_followups->VisaNo->viewAttributes() ?>>
<?php echo $view_followups->VisaNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td data-name="ValidityOfVisa"<?php echo $view_followups->ValidityOfVisa->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_ValidityOfVisa" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_ValidityOfVisa" class="view_followups_ValidityOfVisa">
<span<?php echo $view_followups->ValidityOfVisa->viewAttributes() ?>>
<?php echo $view_followups->ValidityOfVisa->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $view_followups->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_WhereDidYouHear" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_WhereDidYouHear" class="view_followups_WhereDidYouHear">
<span<?php echo $view_followups->WhereDidYouHear->viewAttributes() ?>>
<?php echo $view_followups->WhereDidYouHear->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_followups->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_HospID" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_HospID" class="view_followups_HospID">
<span<?php echo $view_followups->HospID->viewAttributes() ?>>
<?php echo $view_followups->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->street->Visible) { // street ?>
		<td data-name="street"<?php echo $view_followups->street->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_street" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_street" class="view_followups_street">
<span<?php echo $view_followups->street->viewAttributes() ?>>
<?php echo $view_followups->street->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->town->Visible) { // town ?>
		<td data-name="town"<?php echo $view_followups->town->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_town" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_town" class="view_followups_town">
<span<?php echo $view_followups->town->viewAttributes() ?>>
<?php echo $view_followups->town->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->province->Visible) { // province ?>
		<td data-name="province"<?php echo $view_followups->province->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_province" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_province" class="view_followups_province">
<span<?php echo $view_followups->province->viewAttributes() ?>>
<?php echo $view_followups->province->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->country->Visible) { // country ?>
		<td data-name="country"<?php echo $view_followups->country->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_country" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_country" class="view_followups_country">
<span<?php echo $view_followups->country->viewAttributes() ?>>
<?php echo $view_followups->country->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $view_followups->postal_code->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_postal_code" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_postal_code" class="view_followups_postal_code">
<span<?php echo $view_followups->postal_code->viewAttributes() ?>>
<?php echo $view_followups->postal_code->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail"<?php echo $view_followups->PEmail->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_PEmail" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_PEmail" class="view_followups_PEmail">
<span<?php echo $view_followups->PEmail->viewAttributes() ?>>
<?php echo $view_followups->PEmail->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td data-name="PEmergencyContact"<?php echo $view_followups->PEmergencyContact->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_PEmergencyContact" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_PEmergencyContact" class="view_followups_PEmergencyContact">
<span<?php echo $view_followups->PEmergencyContact->viewAttributes() ?>>
<?php echo $view_followups->PEmergencyContact->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->occupation->Visible) { // occupation ?>
		<td data-name="occupation"<?php echo $view_followups->occupation->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_occupation" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_occupation" class="view_followups_occupation">
<span<?php echo $view_followups->occupation->viewAttributes() ?>>
<?php echo $view_followups->occupation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->spouse_occupation->Visible) { // spouse_occupation ?>
		<td data-name="spouse_occupation"<?php echo $view_followups->spouse_occupation->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_occupation" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_spouse_occupation" class="view_followups_spouse_occupation">
<span<?php echo $view_followups->spouse_occupation->viewAttributes() ?>>
<?php echo $view_followups->spouse_occupation->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->WhatsApp->Visible) { // WhatsApp ?>
		<td data-name="WhatsApp"<?php echo $view_followups->WhatsApp->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_WhatsApp" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_WhatsApp" class="view_followups_WhatsApp">
<span<?php echo $view_followups->WhatsApp->viewAttributes() ?>>
<?php echo $view_followups->WhatsApp->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->CouppleID->Visible) { // CouppleID ?>
		<td data-name="CouppleID"<?php echo $view_followups->CouppleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_CouppleID" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_CouppleID" class="view_followups_CouppleID">
<span<?php echo $view_followups->CouppleID->viewAttributes() ?>>
<?php echo $view_followups->CouppleID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->MaleID->Visible) { // MaleID ?>
		<td data-name="MaleID"<?php echo $view_followups->MaleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_MaleID" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_MaleID" class="view_followups_MaleID">
<span<?php echo $view_followups->MaleID->viewAttributes() ?>>
<?php echo $view_followups->MaleID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->FemaleID->Visible) { // FemaleID ?>
		<td data-name="FemaleID"<?php echo $view_followups->FemaleID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_FemaleID" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_FemaleID" class="view_followups_FemaleID">
<span<?php echo $view_followups->FemaleID->viewAttributes() ?>>
<?php echo $view_followups->FemaleID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID"<?php echo $view_followups->GroupID->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_GroupID" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_GroupID" class="view_followups_GroupID">
<span<?php echo $view_followups->GroupID->viewAttributes() ?>>
<?php echo $view_followups->GroupID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_followups->Relationship->Visible) { // Relationship ?>
		<td data-name="Relationship"<?php echo $view_followups->Relationship->cellAttributes() ?>>
<script id="tpx<?php echo $view_followups_list->RowCnt ?>_view_followups_Relationship" class="view_followupslist" type="text/html">
<span id="el<?php echo $view_followups_list->RowCnt ?>_view_followups_Relationship" class="view_followups_Relationship">
<span<?php echo $view_followups->Relationship->viewAttributes() ?>>
<?php echo $view_followups->Relationship->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_followups_list->ListOptions->render("body", "right", $view_followups_list->RowCnt, "block", $view_followups->TableVar, "view_followupslist");
?>
	</tr>
<?php
	}
	if (!$view_followups->isGridAdd())
		$view_followups_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_followups->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_followupslist" class="ew-custom-template"></div>
<script id="tpm_view_followupslist" type="text/html">
<div id="ct_view_followups_list"><?php if ($view_followups_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
			<td>Follow up</td>
			<td>{{include tmpl="#tpc_view_followups_PatientID"/}}</td>
			<td>{{include tmpl="#tpc_view_followups_first_name"/}}</td>
			<td>{{include tmpl="#tpc_view_followups_mobile_no"/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_followups_list->StartRowCnt; $i <= $view_followups_list->RowCnt; $i++) { ?>
 <tr<?php echo @$view_followups_list->Attrs[$i]['row_attrs'] ?>> 
			<td>
<a href='ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name={{: ~root.rows[<?php echo $i - 1 ?>].id }}' class="faa-parent animated-hover">
				<i class="fa fa-edit faa-tada fa-2x" style="color:green"></i>
 </a>
			</td>
			<td>{{include tmpl="#tpx<?php echo $i ?>_view_followups_PatientID"/}}</td>
			<td>{{include tmpl="#tpx<?php echo $i ?>_view_followups_first_name"/}}</td>
			<td>{{include tmpl="#tpx<?php echo $i ?>_view_followups_mobile_no"/}}</td>
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
if ($view_followups_list->Recordset)
	$view_followups_list->Recordset->Close();
?>
<?php if (!$view_followups->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_followups->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_followups_list->Pager)) $view_followups_list->Pager = new NumericPager($view_followups_list->StartRec, $view_followups_list->DisplayRecs, $view_followups_list->TotalRecs, $view_followups_list->RecRange, $view_followups_list->AutoHidePager) ?>
<?php if ($view_followups_list->Pager->RecordCount > 0 && $view_followups_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_followups_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_followups_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_followups_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_followups_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_followups_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_followups_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_followups_list->pageUrl() ?>start=<?php echo $view_followups_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_followups_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_followups_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_followups_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_followups_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_followups_list->TotalRecs > 0 && (!$view_followups_list->AutoHidePageSizeSelector || $view_followups_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_followups">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_followups_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_followups_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_followups_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_followups_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_followups_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_followups_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_followups->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_followups_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_followups_list->TotalRecs == 0 && !$view_followups->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_followups_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_followups->Rows) ?> };
ew.applyTemplate("tpd_view_followupslist", "tpm_view_followupslist", "view_followupslist", "<?php echo $view_followups->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_followupslist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_followupslist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_followupslist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_followups_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_followups->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_followups->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_followups", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_followups_list->terminate();
?>