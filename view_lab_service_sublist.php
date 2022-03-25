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
$view_lab_service_sub_list = new view_lab_service_sub_list();

// Run the page
$view_lab_service_sub_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_lab_service_sublist = currentForm = new ew.Form("fview_lab_service_sublist", "list");
fview_lab_service_sublist.formKeyCountName = '<?php echo $view_lab_service_sub_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_lab_service_sublist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_service_sublist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_service_sublist.lists["x_UNITS"] = <?php echo $view_lab_service_sub_list->UNITS->Lookup->toClientList() ?>;
fview_lab_service_sublist.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_list->UNITS->lookupOptions()) ?>;
fview_lab_service_sublist.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_list->Inactive->Lookup->toClientList() ?>;
fview_lab_service_sublist.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_list->Inactive->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_lab_service_sublistsrch = currentSearchForm = new ew.Form("fview_lab_service_sublistsrch");

// Validate function for search
fview_lab_service_sublistsrch.validate = function(fobj) {
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
fview_lab_service_sublistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_service_sublistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_lab_service_sublistsrch.filterList = <?php echo $view_lab_service_sub_list->getFilterList() ?>;
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
<?php if (!$view_lab_service_sub->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_service_sub_list->TotalRecs > 0 && $view_lab_service_sub_list->ExportOptions->visible()) { ?>
<?php $view_lab_service_sub_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->ImportOptions->visible()) { ?>
<?php $view_lab_service_sub_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->SearchOptions->visible()) { ?>
<?php $view_lab_service_sub_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->FilterOptions->visible()) { ?>
<?php $view_lab_service_sub_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_lab_service_sub->isExport() || EXPORT_MASTER_RECORD && $view_lab_service_sub->isExport("print")) { ?>
<?php
if ($view_lab_service_sub_list->DbMasterFilter <> "" && $view_lab_service_sub->getCurrentMasterTable() == "view_lab_service") {
	if ($view_lab_service_sub_list->MasterRecordExists) {
		include_once "view_lab_servicemaster.php";
	}
}
?>
<?php } ?>
<?php
$view_lab_service_sub_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_service_sub->isExport() && !$view_lab_service_sub->CurrentAction) { ?>
<form name="fview_lab_service_sublistsrch" id="fview_lab_service_sublistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_lab_service_sub_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_lab_service_sublistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_service_sub">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_lab_service_sub_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_lab_service_sub->RowType = ROWTYPE_SEARCH;

// Render row
$view_lab_service_sub->resetAttributes();
$view_lab_service_sub_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
	<div id="xsc_SERVICE" class="ew-cell form-group">
		<label for="x_SERVICE" class="ew-search-caption ew-label"><?php echo $view_lab_service_sub->SERVICE->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SERVICE" id="z_SERVICE" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub->SERVICE->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_service_sub_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_lab_service_sub_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_service_sub_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_service_sub_list->showPageHeader(); ?>
<?php
$view_lab_service_sub_list->showMessage();
?>
<?php if ($view_lab_service_sub_list->TotalRecs > 0 || $view_lab_service_sub->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_service_sub_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_service_sub">
<?php if (!$view_lab_service_sub->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_service_sub->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_service_sub_list->Pager)) $view_lab_service_sub_list->Pager = new NumericPager($view_lab_service_sub_list->StartRec, $view_lab_service_sub_list->DisplayRecs, $view_lab_service_sub_list->TotalRecs, $view_lab_service_sub_list->RecRange, $view_lab_service_sub_list->AutoHidePager) ?>
<?php if ($view_lab_service_sub_list->Pager->RecordCount > 0 && $view_lab_service_sub_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_service_sub_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_service_sub_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_service_sub_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_service_sub_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_service_sub_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_service_sub_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_service_sub_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_service_sub_list->TotalRecs > 0 && (!$view_lab_service_sub_list->AutoHidePageSizeSelector || $view_lab_service_sub_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_service_sub">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_service_sub_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_service_sub_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_service_sub_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_service_sub_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_service_sub_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_service_sub_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_service_sub->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_service_sublist" id="fview_lab_service_sublist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_service_sub_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_service_sub_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<?php if ($view_lab_service_sub->getCurrentMasterTable() == "view_lab_service" && $view_lab_service_sub->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_lab_service">
<input type="hidden" name="fk_CODE" value="<?php echo $view_lab_service_sub->CODE->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_lab_service_sub" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_service_sub_list->TotalRecs > 0 || $view_lab_service_sub->isGridEdit()) { ?>
<table id="tbl_view_lab_service_sublist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_service_sub_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_service_sub_list->renderListOptions();

// Render list options (header, left)
$view_lab_service_sub_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub->Id->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->Id) ?>',1);"><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub->CODE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->CODE) ?>',1);"><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->SERVICE) ?>',1);"><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub->UNITS->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub->UNITS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->UNITS) ?>',1);"><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->UNITS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->UNITS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub->HospID->headerCellClass() ?>"><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->HospID) ?>',1);"><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->TestSubCd) ?>',1);"><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub->Method->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->Method) ?>',1);"><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub->Order->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->Order) ?>',1);"><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub->ResType->headerCellClass() ?>"><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->ResType) ?>',1);"><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->UnitCD) ?>',1);"><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->UnitCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->UnitCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub->Sample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->Sample) ?>',1);"><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub->NoD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->NoD) ?>',1);"><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->BillOrder) ?>',1);"><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Formula) == "") { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub->Formula->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Formula->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub->Formula->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->Formula) ?>',1);"><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Formula->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Formula->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Formula->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub->Inactive->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->Inactive) ?>',1);"><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub->Outsource->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->Outsource) ?>',1);"><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Outsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Outsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub->CollSample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_service_sub->SortUrl($view_lab_service_sub->CollSample) ?>',1);"><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_service_sub_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_service_sub->ExportAll && $view_lab_service_sub->isExport()) {
	$view_lab_service_sub_list->StopRec = $view_lab_service_sub_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_lab_service_sub_list->TotalRecs > $view_lab_service_sub_list->StartRec + $view_lab_service_sub_list->DisplayRecs - 1)
		$view_lab_service_sub_list->StopRec = $view_lab_service_sub_list->StartRec + $view_lab_service_sub_list->DisplayRecs - 1;
	else
		$view_lab_service_sub_list->StopRec = $view_lab_service_sub_list->TotalRecs;
}
$view_lab_service_sub_list->RecCnt = $view_lab_service_sub_list->StartRec - 1;
if ($view_lab_service_sub_list->Recordset && !$view_lab_service_sub_list->Recordset->EOF) {
	$view_lab_service_sub_list->Recordset->moveFirst();
	$selectLimit = $view_lab_service_sub_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_service_sub_list->StartRec > 1)
		$view_lab_service_sub_list->Recordset->move($view_lab_service_sub_list->StartRec - 1);
} elseif (!$view_lab_service_sub->AllowAddDeleteRow && $view_lab_service_sub_list->StopRec == 0) {
	$view_lab_service_sub_list->StopRec = $view_lab_service_sub->GridAddRowCount;
}

// Initialize aggregate
$view_lab_service_sub->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_service_sub->resetAttributes();
$view_lab_service_sub_list->renderRow();
while ($view_lab_service_sub_list->RecCnt < $view_lab_service_sub_list->StopRec) {
	$view_lab_service_sub_list->RecCnt++;
	if ($view_lab_service_sub_list->RecCnt >= $view_lab_service_sub_list->StartRec) {
		$view_lab_service_sub_list->RowCnt++;

		// Set up key count
		$view_lab_service_sub_list->KeyCount = $view_lab_service_sub_list->RowIndex;

		// Init row class and style
		$view_lab_service_sub->resetAttributes();
		$view_lab_service_sub->CssClass = "";
		if ($view_lab_service_sub->isGridAdd()) {
		} else {
			$view_lab_service_sub_list->loadRowValues($view_lab_service_sub_list->Recordset); // Load row values
		}
		$view_lab_service_sub->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_lab_service_sub->RowAttrs = array_merge($view_lab_service_sub->RowAttrs, array('data-rowindex'=>$view_lab_service_sub_list->RowCnt, 'id'=>'r' . $view_lab_service_sub_list->RowCnt . '_view_lab_service_sub', 'data-rowtype'=>$view_lab_service_sub->RowType));

		// Render row
		$view_lab_service_sub_list->renderRow();

		// Render list options
		$view_lab_service_sub_list->renderListOptions();
?>
	<tr<?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_list->ListOptions->render("body", "left", $view_lab_service_sub_list->RowCnt);
?>
	<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
		<td data-name="Id"<?php echo $view_lab_service_sub->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub->Id->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $view_lab_service_sub->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE"<?php echo $view_lab_service_sub->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->SERVICE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS"<?php echo $view_lab_service_sub->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UNITS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_service_sub->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub->HospID->viewAttributes() ?>>
<?php echo $view_lab_service_sub->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $view_lab_service_sub->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service_sub->TestSubCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $view_lab_service_sub->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub->Method->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_lab_service_sub->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub->Order->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $view_lab_service_sub->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub->ResType->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ResType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD"<?php echo $view_lab_service_sub->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UnitCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $view_lab_service_sub->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub->Sample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Sample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $view_lab_service_sub->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub->NoD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->NoD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $view_lab_service_sub->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service_sub->BillOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
		<td data-name="Formula"<?php echo $view_lab_service_sub->Formula->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub->Formula->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Formula->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $view_lab_service_sub->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Inactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource"<?php echo $view_lab_service_sub->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Outsource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $view_lab_service_sub->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCnt ?>_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CollSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_list->ListOptions->render("body", "right", $view_lab_service_sub_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_lab_service_sub->isGridAdd())
		$view_lab_service_sub_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_lab_service_sub->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_service_sub_list->Recordset)
	$view_lab_service_sub_list->Recordset->Close();
?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_service_sub->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_service_sub_list->Pager)) $view_lab_service_sub_list->Pager = new NumericPager($view_lab_service_sub_list->StartRec, $view_lab_service_sub_list->DisplayRecs, $view_lab_service_sub_list->TotalRecs, $view_lab_service_sub_list->RecRange, $view_lab_service_sub_list->AutoHidePager) ?>
<?php if ($view_lab_service_sub_list->Pager->RecordCount > 0 && $view_lab_service_sub_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_service_sub_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_service_sub_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_service_sub_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_service_sub_list->pageUrl() ?>start=<?php echo $view_lab_service_sub_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_service_sub_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_service_sub_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_service_sub_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_service_sub_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_service_sub_list->TotalRecs > 0 && (!$view_lab_service_sub_list->AutoHidePageSizeSelector || $view_lab_service_sub_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_service_sub">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_service_sub_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_service_sub_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_service_sub_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_service_sub_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_service_sub_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_service_sub_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_service_sub->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_service_sub_list->TotalRecs == 0 && !$view_lab_service_sub->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_service_sub_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

$("[data-name='id']").hide();
$("[data-name='id']").width('8px');
$("[data-name='UNITS']").width('8px');
$("[data-name='TestSubCd']").width('8px');
$("[data-name='Method']").width('8px');
$("[data-name='Order']").width('8px');
$("[data-name='ResType']").width('8px');
$("[data-name='UnitCD']").width('8px');
$("[data-name='Sample']").width('8px');
$("[data-name='NoD']").width('8px');
$("[data-name='BillOrder']").width('8px');
$("[data-name='Formula']").width('8px');
$("[data-name='Inactive']").width('8px');
$("[data-name='Outsource']").width('8px');
$("[data-name='CollSample']").width('8px');
</script>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_service_sub", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_service_sub_list->terminate();
?>