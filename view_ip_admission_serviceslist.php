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
$view_ip_admission_services_list = new view_ip_admission_services_list();

// Run the page
$view_ip_admission_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_services_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_admission_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_admission_serviceslist = currentForm = new ew.Form("fview_ip_admission_serviceslist", "list");
fview_ip_admission_serviceslist.formKeyCountName = '<?php echo $view_ip_admission_services_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_admission_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admission_serviceslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_ip_admission_serviceslistsrch = currentSearchForm = new ew.Form("fview_ip_admission_serviceslistsrch");

// Filters
fview_ip_admission_serviceslistsrch.filterList = <?php echo $view_ip_admission_services_list->getFilterList() ?>;
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
<?php if (!$view_ip_admission_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_admission_services_list->TotalRecs > 0 && $view_ip_admission_services_list->ExportOptions->visible()) { ?>
<?php $view_ip_admission_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_services_list->ImportOptions->visible()) { ?>
<?php $view_ip_admission_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_services_list->SearchOptions->visible()) { ?>
<?php $view_ip_admission_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_services_list->FilterOptions->visible()) { ?>
<?php $view_ip_admission_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_admission_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_admission_services->isExport() && !$view_ip_admission_services->CurrentAction) { ?>
<form name="fview_ip_admission_serviceslistsrch" id="fview_ip_admission_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_admission_services_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_admission_serviceslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission_services">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_admission_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_admission_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_admission_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_admission_services_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_services_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_services_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_services_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_admission_services_list->showPageHeader(); ?>
<?php
$view_ip_admission_services_list->showMessage();
?>
<?php if ($view_ip_admission_services_list->TotalRecs > 0 || $view_ip_admission_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_admission_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission_services">
<?php if (!$view_ip_admission_services->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_admission_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_services_list->Pager)) $view_ip_admission_services_list->Pager = new NumericPager($view_ip_admission_services_list->StartRec, $view_ip_admission_services_list->DisplayRecs, $view_ip_admission_services_list->TotalRecs, $view_ip_admission_services_list->RecRange, $view_ip_admission_services_list->AutoHidePager) ?>
<?php if ($view_ip_admission_services_list->Pager->RecordCount > 0 && $view_ip_admission_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_services_list->TotalRecs > 0 && (!$view_ip_admission_services_list->AutoHidePageSizeSelector || $view_ip_admission_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_admission_serviceslist" id="fview_ip_admission_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_admission_services_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_admission_services_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_services">
<div id="gmp_view_ip_admission_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_admission_services_list->TotalRecs > 0 || $view_ip_admission_services->isGridEdit()) { ?>
<table id="tbl_view_ip_admission_serviceslist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_admission_services_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_admission_services_list->renderListOptions();

// Render list options (header, left)
$view_ip_admission_services_list->ListOptions->render("header", "left", "", "block", $view_ip_admission_services->TableVar, "view_ip_admission_serviceslist");
?>
<?php if ($view_ip_admission_services->id->Visible) { // id ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_services->id->headerCellClass() ?>"><div id="elh_view_ip_admission_services_id" class="view_ip_admission_services_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_id" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_services->id->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_id" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->id) ?>',1);"><div id="elh_view_ip_admission_services_id" class="view_ip_admission_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_services->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_services_mrnNo" class="view_ip_admission_services_mrnNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_mrnNo" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->mrnNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_services->mrnNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_mrnNo" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->mrnNo) ?>',1);"><div id="elh_view_ip_admission_services_mrnNo" class="view_ip_admission_services_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_services->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_services_patient_id" class="view_ip_admission_services_patient_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_patient_id" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->patient_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_services->patient_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_patient_id" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->patient_id) ?>',1);"><div id="elh_view_ip_admission_services_patient_id" class="view_ip_admission_services_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_services->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_services_patient_name" class="view_ip_admission_services_patient_name"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_patient_name" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->patient_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_services->patient_name->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_patient_name" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->patient_name) ?>',1);"><div id="elh_view_ip_admission_services_patient_name" class="view_ip_admission_services_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->gender->Visible) { // gender ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_services->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_services_gender" class="view_ip_admission_services_gender"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_gender" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_services->gender->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_gender" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->gender) ?>',1);"><div id="elh_view_ip_admission_services_gender" class="view_ip_admission_services_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->age->Visible) { // age ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->age) == "") { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_services->age->headerCellClass() ?>"><div id="elh_view_ip_admission_services_age" class="view_ip_admission_services_age"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_age" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_services->age->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_age" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->age) ?>',1);"><div id="elh_view_ip_admission_services_age" class="view_ip_admission_services_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_services->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_services_physician_id" class="view_ip_admission_services_physician_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_physician_id" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->physician_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_services->physician_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_physician_id" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->physician_id) ?>',1);"><div id="elh_view_ip_admission_services_physician_id" class="view_ip_admission_services_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_services->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_services_typeRegsisteration" class="view_ip_admission_services_typeRegsisteration"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_typeRegsisteration" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->typeRegsisteration->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_services->typeRegsisteration->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_typeRegsisteration" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->typeRegsisteration) ?>',1);"><div id="elh_view_ip_admission_services_typeRegsisteration" class="view_ip_admission_services_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_services->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_services_PaymentCategory" class="view_ip_admission_services_PaymentCategory"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_PaymentCategory" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->PaymentCategory->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_services->PaymentCategory->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_PaymentCategory" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->PaymentCategory) ?>',1);"><div id="elh_view_ip_admission_services_PaymentCategory" class="view_ip_admission_services_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_services->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_services_admission_consultant_id" class="view_ip_admission_services_admission_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_admission_consultant_id" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->admission_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_services->admission_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_admission_consultant_id" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->admission_consultant_id) ?>',1);"><div id="elh_view_ip_admission_services_admission_consultant_id" class="view_ip_admission_services_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->admission_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->admission_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_services->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_services_leading_consultant_id" class="view_ip_admission_services_leading_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_leading_consultant_id" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->leading_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_services->leading_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_leading_consultant_id" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->leading_consultant_id) ?>',1);"><div id="elh_view_ip_admission_services_leading_consultant_id" class="view_ip_admission_services_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->leading_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->leading_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_services->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_services_admission_date" class="view_ip_admission_services_admission_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_admission_date" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->admission_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_services->admission_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_admission_date" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->admission_date) ?>',1);"><div id="elh_view_ip_admission_services_admission_date" class="view_ip_admission_services_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_services->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_services_release_date" class="view_ip_admission_services_release_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_release_date" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->release_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_services->release_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_release_date" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->release_date) ?>',1);"><div id="elh_view_ip_admission_services_release_date" class="view_ip_admission_services_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_services->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_services_PaymentStatus" class="view_ip_admission_services_PaymentStatus"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_PaymentStatus" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->PaymentStatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_services->PaymentStatus->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_PaymentStatus" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->PaymentStatus) ?>',1);"><div id="elh_view_ip_admission_services_PaymentStatus" class="view_ip_admission_services_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->status->Visible) { // status ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_services->status->headerCellClass() ?>"><div id="elh_view_ip_admission_services_status" class="view_ip_admission_services_status"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_status" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_services->status->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_status" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->status) ?>',1);"><div id="elh_view_ip_admission_services_status" class="view_ip_admission_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_services->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_services_createdby" class="view_ip_admission_services_createdby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_createdby" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->createdby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_services->createdby->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_createdby" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->createdby) ?>',1);"><div id="elh_view_ip_admission_services_createdby" class="view_ip_admission_services_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_services->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_services_createddatetime" class="view_ip_admission_services_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_createddatetime" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->createddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_services->createddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_createddatetime" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->createddatetime) ?>',1);"><div id="elh_view_ip_admission_services_createddatetime" class="view_ip_admission_services_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_services->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_services_modifiedby" class="view_ip_admission_services_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_modifiedby" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->modifiedby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_services->modifiedby->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_modifiedby" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->modifiedby) ?>',1);"><div id="elh_view_ip_admission_services_modifiedby" class="view_ip_admission_services_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_services->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_services_modifieddatetime" class="view_ip_admission_services_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_modifieddatetime" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->modifieddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_services->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_modifieddatetime" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->modifieddatetime) ?>',1);"><div id="elh_view_ip_admission_services_modifieddatetime" class="view_ip_admission_services_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_services->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_services_PatientID" class="view_ip_admission_services_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_PatientID" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_services->PatientID->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_PatientID" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->PatientID) ?>',1);"><div id="elh_view_ip_admission_services_PatientID" class="view_ip_admission_services_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_services->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_services_HospID" class="view_ip_admission_services_HospID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_HospID" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_services->HospID->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_HospID" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->HospID) ?>',1);"><div id="elh_view_ip_admission_services_HospID" class="view_ip_admission_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_services->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ReferedByDr" class="view_ip_admission_services_ReferedByDr"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ReferedByDr" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ReferedByDr->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_services->ReferedByDr->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ReferedByDr" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ReferedByDr) ?>',1);"><div id="elh_view_ip_admission_services_ReferedByDr" class="view_ip_admission_services_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_services->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ReferClinicname" class="view_ip_admission_services_ReferClinicname"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ReferClinicname" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ReferClinicname->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_services->ReferClinicname->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ReferClinicname" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ReferClinicname) ?>',1);"><div id="elh_view_ip_admission_services_ReferClinicname" class="view_ip_admission_services_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_services->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ReferCity" class="view_ip_admission_services_ReferCity"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ReferCity" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ReferCity->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_services->ReferCity->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ReferCity" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ReferCity) ?>',1);"><div id="elh_view_ip_admission_services_ReferCity" class="view_ip_admission_services_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_services->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ReferMobileNo" class="view_ip_admission_services_ReferMobileNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ReferMobileNo" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ReferMobileNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_services->ReferMobileNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ReferMobileNo" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ReferMobileNo) ?>',1);"><div id="elh_view_ip_admission_services_ReferMobileNo" class="view_ip_admission_services_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_services->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ReferA4TreatingConsultant" class="view_ip_admission_services_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ReferA4TreatingConsultant" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ReferA4TreatingConsultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_services->ReferA4TreatingConsultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ReferA4TreatingConsultant" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_ip_admission_services_ReferA4TreatingConsultant" class="view_ip_admission_services_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_services->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_services_PurposreReferredfor" class="view_ip_admission_services_PurposreReferredfor"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_PurposreReferredfor" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->PurposreReferredfor->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_services->PurposreReferredfor->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_PurposreReferredfor" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->PurposreReferredfor) ?>',1);"><div id="elh_view_ip_admission_services_PurposreReferredfor" class="view_ip_admission_services_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_services->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_services_mobileno" class="view_ip_admission_services_mobileno"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_mobileno" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->mobileno->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_services->mobileno->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_mobileno" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->mobileno) ?>',1);"><div id="elh_view_ip_admission_services_mobileno" class="view_ip_admission_services_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_services->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_services_BillClosing" class="view_ip_admission_services_BillClosing"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_BillClosing" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->BillClosing->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_services->BillClosing->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_BillClosing" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->BillClosing) ?>',1);"><div id="elh_view_ip_admission_services_BillClosing" class="view_ip_admission_services_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->BillClosing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_services->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_services_BillClosingDate" class="view_ip_admission_services_BillClosingDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_BillClosingDate" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->BillClosingDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_services->BillClosingDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_BillClosingDate" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->BillClosingDate) ?>',1);"><div id="elh_view_ip_admission_services_BillClosingDate" class="view_ip_admission_services_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_services->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_services_BillNumber" class="view_ip_admission_services_BillNumber"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_BillNumber" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->BillNumber->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_services->BillNumber->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_BillNumber" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->BillNumber) ?>',1);"><div id="elh_view_ip_admission_services_BillNumber" class="view_ip_admission_services_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_services->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ClosingAmount" class="view_ip_admission_services_ClosingAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ClosingAmount" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ClosingAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_services->ClosingAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ClosingAmount" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ClosingAmount) ?>',1);"><div id="elh_view_ip_admission_services_ClosingAmount" class="view_ip_admission_services_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ClosingAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ClosingAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_services->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ClosingType" class="view_ip_admission_services_ClosingType"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ClosingType" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ClosingType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_services->ClosingType->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ClosingType" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ClosingType) ?>',1);"><div id="elh_view_ip_admission_services_ClosingType" class="view_ip_admission_services_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ClosingType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ClosingType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_services->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_services_BillAmount" class="view_ip_admission_services_BillAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_BillAmount" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->BillAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_services->BillAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_BillAmount" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->BillAmount) ?>',1);"><div id="elh_view_ip_admission_services_BillAmount" class="view_ip_admission_services_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->BillAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->BillAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_services->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_services_billclosedBy" class="view_ip_admission_services_billclosedBy"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_billclosedBy" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->billclosedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_services->billclosedBy->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_billclosedBy" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->billclosedBy) ?>',1);"><div id="elh_view_ip_admission_services_billclosedBy" class="view_ip_admission_services_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->billclosedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->billclosedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_services->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_services_bllcloseByDate" class="view_ip_admission_services_bllcloseByDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_bllcloseByDate" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->bllcloseByDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_services->bllcloseByDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_bllcloseByDate" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->bllcloseByDate) ?>',1);"><div id="elh_view_ip_admission_services_bllcloseByDate" class="view_ip_admission_services_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->bllcloseByDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->bllcloseByDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_services->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_services_ReportHeader" class="view_ip_admission_services_ReportHeader"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_ReportHeader" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->ReportHeader->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_services->ReportHeader->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_ReportHeader" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->ReportHeader) ?>',1);"><div id="elh_view_ip_admission_services_ReportHeader" class="view_ip_admission_services_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_services->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_services_Procedure" class="view_ip_admission_services_Procedure"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_Procedure" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->Procedure->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_services->Procedure->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_Procedure" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->Procedure) ?>',1);"><div id="elh_view_ip_admission_services_Procedure" class="view_ip_admission_services_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_services->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_services_Consultant" class="view_ip_admission_services_Consultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_Consultant" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->Consultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_services->Consultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_Consultant" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->Consultant) ?>',1);"><div id="elh_view_ip_admission_services_Consultant" class="view_ip_admission_services_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_services->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_services_Anesthetist" class="view_ip_admission_services_Anesthetist"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_Anesthetist" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->Anesthetist->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_services->Anesthetist->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_Anesthetist" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->Anesthetist) ?>',1);"><div id="elh_view_ip_admission_services_Anesthetist" class="view_ip_admission_services_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_services->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_services_Amound" class="view_ip_admission_services_Amound"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_Amound" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->Amound->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_services->Amound->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_Amound" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->Amound) ?>',1);"><div id="elh_view_ip_admission_services_Amound" class="view_ip_admission_services_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->Amound->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->Amound->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_services->Package->Visible) { // Package ?>
	<?php if ($view_ip_admission_services->sortUrl($view_ip_admission_services->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_services->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_services_Package" class="view_ip_admission_services_Package"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_services_Package" class="view_ip_admission_serviceslist" type="text/html"><span><?php echo $view_ip_admission_services->Package->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_services->Package->headerCellClass() ?>"><script id="tpc_view_ip_admission_services_Package" class="view_ip_admission_serviceslist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_services->SortUrl($view_ip_admission_services->Package) ?>',1);"><div id="elh_view_ip_admission_services_Package" class="view_ip_admission_services_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_services->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_services->Package->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_services->Package->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_admission_services_list->ListOptions->render("header", "right", "", "block", $view_ip_admission_services->TableVar, "view_ip_admission_serviceslist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_admission_services->ExportAll && $view_ip_admission_services->isExport()) {
	$view_ip_admission_services_list->StopRec = $view_ip_admission_services_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_admission_services_list->TotalRecs > $view_ip_admission_services_list->StartRec + $view_ip_admission_services_list->DisplayRecs - 1)
		$view_ip_admission_services_list->StopRec = $view_ip_admission_services_list->StartRec + $view_ip_admission_services_list->DisplayRecs - 1;
	else
		$view_ip_admission_services_list->StopRec = $view_ip_admission_services_list->TotalRecs;
}
$view_ip_admission_services_list->RecCnt = $view_ip_admission_services_list->StartRec - 1;
if ($view_ip_admission_services_list->Recordset && !$view_ip_admission_services_list->Recordset->EOF) {
	$view_ip_admission_services_list->Recordset->moveFirst();
	$selectLimit = $view_ip_admission_services_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_admission_services_list->StartRec > 1)
		$view_ip_admission_services_list->Recordset->move($view_ip_admission_services_list->StartRec - 1);
} elseif (!$view_ip_admission_services->AllowAddDeleteRow && $view_ip_admission_services_list->StopRec == 0) {
	$view_ip_admission_services_list->StopRec = $view_ip_admission_services->GridAddRowCount;
}

// Initialize aggregate
$view_ip_admission_services->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_admission_services->resetAttributes();
$view_ip_admission_services_list->renderRow();
while ($view_ip_admission_services_list->RecCnt < $view_ip_admission_services_list->StopRec) {
	$view_ip_admission_services_list->RecCnt++;
	if ($view_ip_admission_services_list->RecCnt >= $view_ip_admission_services_list->StartRec) {
		$view_ip_admission_services_list->RowCnt++;

		// Set up key count
		$view_ip_admission_services_list->KeyCount = $view_ip_admission_services_list->RowIndex;

		// Init row class and style
		$view_ip_admission_services->resetAttributes();
		$view_ip_admission_services->CssClass = "";
		if ($view_ip_admission_services->isGridAdd()) {
		} else {
			$view_ip_admission_services_list->loadRowValues($view_ip_admission_services_list->Recordset); // Load row values
		}
		$view_ip_admission_services->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_admission_services->RowAttrs = array_merge($view_ip_admission_services->RowAttrs, array('data-rowindex'=>$view_ip_admission_services_list->RowCnt, 'id'=>'r' . $view_ip_admission_services_list->RowCnt . '_view_ip_admission_services', 'data-rowtype'=>$view_ip_admission_services->RowType));

		// Render row
		$view_ip_admission_services_list->renderRow();

		// Render list options
		$view_ip_admission_services_list->renderListOptions();

		// Save row and cell attributes
		$view_ip_admission_services_list->Attrs[$view_ip_admission_services_list->RowCnt] = array("row_attrs" => $view_ip_admission_services->rowAttributes(), "cell_attrs" => array());
		$view_ip_admission_services_list->Attrs[$view_ip_admission_services_list->RowCnt]["cell_attrs"] = $view_ip_admission_services->fieldCellAttributes();
?>
	<tr<?php echo $view_ip_admission_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_admission_services_list->ListOptions->render("body", "left", $view_ip_admission_services_list->RowCnt, "block", $view_ip_admission_services->TableVar, "view_ip_admission_serviceslist");
?>
	<?php if ($view_ip_admission_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_admission_services->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_id" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_id" class="view_ip_admission_services_id">
<span<?php echo $view_ip_admission_services->id->viewAttributes() ?>>
<?php echo $view_ip_admission_services->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_ip_admission_services->mrnNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_mrnNo" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_mrnNo" class="view_ip_admission_services_mrnNo">
<span<?php echo $view_ip_admission_services->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_admission_services->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $view_ip_admission_services->patient_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_patient_id" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_patient_id" class="view_ip_admission_services_patient_id">
<span<?php echo $view_ip_admission_services->patient_id->viewAttributes() ?>>
<?php echo $view_ip_admission_services->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_ip_admission_services->patient_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_patient_name" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_patient_name" class="view_ip_admission_services_patient_name">
<span<?php echo $view_ip_admission_services->patient_name->viewAttributes() ?>>
<?php echo $view_ip_admission_services->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_ip_admission_services->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_gender" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_gender" class="view_ip_admission_services_gender">
<span<?php echo $view_ip_admission_services->gender->viewAttributes() ?>>
<?php echo $view_ip_admission_services->gender->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->age->Visible) { // age ?>
		<td data-name="age"<?php echo $view_ip_admission_services->age->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_age" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_age" class="view_ip_admission_services_age">
<span<?php echo $view_ip_admission_services->age->viewAttributes() ?>>
<?php echo $view_ip_admission_services->age->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_ip_admission_services->physician_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_physician_id" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_physician_id" class="view_ip_admission_services_physician_id">
<span<?php echo $view_ip_admission_services->physician_id->viewAttributes() ?>>
<?php echo $view_ip_admission_services->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_ip_admission_services->typeRegsisteration->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_typeRegsisteration" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_typeRegsisteration" class="view_ip_admission_services_typeRegsisteration">
<span<?php echo $view_ip_admission_services->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_admission_services->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $view_ip_admission_services->PaymentCategory->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PaymentCategory" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PaymentCategory" class="view_ip_admission_services_PaymentCategory">
<span<?php echo $view_ip_admission_services->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_admission_services->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id"<?php echo $view_ip_admission_services->admission_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_admission_consultant_id" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_admission_consultant_id" class="view_ip_admission_services_admission_consultant_id">
<span<?php echo $view_ip_admission_services->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_services->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id"<?php echo $view_ip_admission_services->leading_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_leading_consultant_id" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_leading_consultant_id" class="view_ip_admission_services_leading_consultant_id">
<span<?php echo $view_ip_admission_services->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_services->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_ip_admission_services->admission_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_admission_date" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_admission_date" class="view_ip_admission_services_admission_date">
<span<?php echo $view_ip_admission_services->admission_date->viewAttributes() ?>>
<?php echo $view_ip_admission_services->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_ip_admission_services->release_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_release_date" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_release_date" class="view_ip_admission_services_release_date">
<span<?php echo $view_ip_admission_services->release_date->viewAttributes() ?>>
<?php echo $view_ip_admission_services->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_ip_admission_services->PaymentStatus->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PaymentStatus" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PaymentStatus" class="view_ip_admission_services_PaymentStatus">
<span<?php echo $view_ip_admission_services->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_admission_services->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ip_admission_services->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_status" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_status" class="view_ip_admission_services_status">
<span<?php echo $view_ip_admission_services->status->viewAttributes() ?>>
<?php echo $view_ip_admission_services->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_admission_services->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_createdby" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_createdby" class="view_ip_admission_services_createdby">
<span<?php echo $view_ip_admission_services->createdby->viewAttributes() ?>>
<?php echo $view_ip_admission_services->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_admission_services->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_createddatetime" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_createddatetime" class="view_ip_admission_services_createddatetime">
<span<?php echo $view_ip_admission_services->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_services->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_admission_services->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_modifiedby" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_modifiedby" class="view_ip_admission_services_modifiedby">
<span<?php echo $view_ip_admission_services->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_admission_services->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_admission_services->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_modifieddatetime" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_modifieddatetime" class="view_ip_admission_services_modifieddatetime">
<span<?php echo $view_ip_admission_services->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_services->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_admission_services->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PatientID" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PatientID" class="view_ip_admission_services_PatientID">
<span<?php echo $view_ip_admission_services->PatientID->viewAttributes() ?>>
<?php echo $view_ip_admission_services->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_admission_services->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_HospID" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_HospID" class="view_ip_admission_services_HospID">
<span<?php echo $view_ip_admission_services->HospID->viewAttributes() ?>>
<?php echo $view_ip_admission_services->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ip_admission_services->ReferedByDr->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferedByDr" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferedByDr" class="view_ip_admission_services_ReferedByDr">
<span<?php echo $view_ip_admission_services->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_ip_admission_services->ReferClinicname->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferClinicname" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferClinicname" class="view_ip_admission_services_ReferClinicname">
<span<?php echo $view_ip_admission_services->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_ip_admission_services->ReferCity->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferCity" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferCity" class="view_ip_admission_services_ReferCity">
<span<?php echo $view_ip_admission_services->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_ip_admission_services->ReferMobileNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferMobileNo" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferMobileNo" class="view_ip_admission_services_ReferMobileNo">
<span<?php echo $view_ip_admission_services->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_admission_services->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferA4TreatingConsultant" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReferA4TreatingConsultant" class="view_ip_admission_services_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_services->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_admission_services->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PurposreReferredfor" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_PurposreReferredfor" class="view_ip_admission_services_PurposreReferredfor">
<span<?php echo $view_ip_admission_services->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_admission_services->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $view_ip_admission_services->mobileno->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_mobileno" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_mobileno" class="view_ip_admission_services_mobileno">
<span<?php echo $view_ip_admission_services->mobileno->viewAttributes() ?>>
<?php echo $view_ip_admission_services->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $view_ip_admission_services->BillClosing->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillClosing" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillClosing" class="view_ip_admission_services_BillClosing">
<span<?php echo $view_ip_admission_services->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_admission_services->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $view_ip_admission_services->BillClosingDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillClosingDate" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillClosingDate" class="view_ip_admission_services_BillClosingDate">
<span<?php echo $view_ip_admission_services->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_admission_services->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_admission_services->BillNumber->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillNumber" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillNumber" class="view_ip_admission_services_BillNumber">
<span<?php echo $view_ip_admission_services->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_admission_services->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount"<?php echo $view_ip_admission_services->ClosingAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ClosingAmount" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ClosingAmount" class="view_ip_admission_services_ClosingAmount">
<span<?php echo $view_ip_admission_services->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType"<?php echo $view_ip_admission_services->ClosingType->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ClosingType" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ClosingType" class="view_ip_admission_services_ClosingType">
<span<?php echo $view_ip_admission_services->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount"<?php echo $view_ip_admission_services->BillAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillAmount" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_BillAmount" class="view_ip_admission_services_BillAmount">
<span<?php echo $view_ip_admission_services->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_services->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy"<?php echo $view_ip_admission_services->billclosedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_billclosedBy" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_billclosedBy" class="view_ip_admission_services_billclosedBy">
<span<?php echo $view_ip_admission_services->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_admission_services->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate"<?php echo $view_ip_admission_services->bllcloseByDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_bllcloseByDate" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_bllcloseByDate" class="view_ip_admission_services_bllcloseByDate">
<span<?php echo $view_ip_admission_services->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_admission_services->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_ip_admission_services->ReportHeader->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReportHeader" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_ReportHeader" class="view_ip_admission_services_ReportHeader">
<span<?php echo $view_ip_admission_services->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_admission_services->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $view_ip_admission_services->Procedure->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Procedure" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Procedure" class="view_ip_admission_services_Procedure">
<span<?php echo $view_ip_admission_services->Procedure->viewAttributes() ?>>
<?php echo $view_ip_admission_services->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $view_ip_admission_services->Consultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Consultant" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Consultant" class="view_ip_admission_services_Consultant">
<span<?php echo $view_ip_admission_services->Consultant->viewAttributes() ?>>
<?php echo $view_ip_admission_services->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $view_ip_admission_services->Anesthetist->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Anesthetist" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Anesthetist" class="view_ip_admission_services_Anesthetist">
<span<?php echo $view_ip_admission_services->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_admission_services->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->Amound->Visible) { // Amound ?>
		<td data-name="Amound"<?php echo $view_ip_admission_services->Amound->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Amound" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Amound" class="view_ip_admission_services_Amound">
<span<?php echo $view_ip_admission_services->Amound->viewAttributes() ?>>
<?php echo $view_ip_admission_services->Amound->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_services->Package->Visible) { // Package ?>
		<td data-name="Package"<?php echo $view_ip_admission_services->Package->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Package" class="view_ip_admission_serviceslist" type="text/html">
<span id="el<?php echo $view_ip_admission_services_list->RowCnt ?>_view_ip_admission_services_Package" class="view_ip_admission_services_Package">
<span<?php echo $view_ip_admission_services->Package->viewAttributes() ?>>
<?php echo $view_ip_admission_services->Package->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_admission_services_list->ListOptions->render("body", "right", $view_ip_admission_services_list->RowCnt, "block", $view_ip_admission_services->TableVar, "view_ip_admission_serviceslist");
?>
	</tr>
<?php
	}
	if (!$view_ip_admission_services->isGridAdd())
		$view_ip_admission_services_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_admission_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_ip_admission_serviceslist" class="ew-custom-template"></div>
<script id="tpm_view_ip_admission_serviceslist" type="text/html">
<div id="ct_view_ip_admission_services_list"><?php if ($view_ip_admission_services_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
		<td></td>
			<td>{{include tmpl="#tpc_view_ip_admission_services_PatientID"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_services_patient_name"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_admission_services_mrnNo"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_services_mobileno"/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_ip_admission_services_list->StartRowCnt; $i <= $view_ip_admission_services_list->RowCnt; $i++) { ?>
 <tr<?php echo @$view_ip_admission_services_list->Attrs[$i]['row_attrs'] ?>>
<td>
<div class="btn-group btn-group-sm ew-btn-group">
<a class="btn btn-default ew-row-link ew-view" title="" data-caption="View"  href='patient_serviceslist.php?showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' data-original-title="View">
<i data-phrase="ViewLink" class="icon-view ew-icon" data-caption="View"></i>
</a>
<a class="btn btn-default ew-row-link ew-edit" title="" data-caption="Edit" href='patient_serviceslist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}'  data-original-title="Edit">
<i data-phrase="EditLink" class="icon-edit ew-icon" data-caption="Edit"></i>
</a>
<a class="btn btn-default ew-row-link ew-edit" title="" data-caption="BulkService" href='bulkservice.php?id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}'  data-original-title="BulkService">
<i class="fas fa-mail-bulk"></i>
</a>
</div>
</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_services_PatientID"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_services_patient_name"/}}</td>
	 	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_services_mrnNo"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_services_mobileno"/}}</td>
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
if ($view_ip_admission_services_list->Recordset)
	$view_ip_admission_services_list->Recordset->Close();
?>
<?php if (!$view_ip_admission_services->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_admission_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_services_list->Pager)) $view_ip_admission_services_list->Pager = new NumericPager($view_ip_admission_services_list->StartRec, $view_ip_admission_services_list->DisplayRecs, $view_ip_admission_services_list->TotalRecs, $view_ip_admission_services_list->RecRange, $view_ip_admission_services_list->AutoHidePager) ?>
<?php if ($view_ip_admission_services_list->Pager->RecordCount > 0 && $view_ip_admission_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_services_list->pageUrl() ?>start=<?php echo $view_ip_admission_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_services_list->TotalRecs > 0 && (!$view_ip_admission_services_list->AutoHidePageSizeSelector || $view_ip_admission_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_admission_services_list->TotalRecs == 0 && !$view_ip_admission_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_admission_services->Rows) ?> };
ew.applyTemplate("tpd_view_ip_admission_serviceslist", "tpm_view_ip_admission_serviceslist", "view_ip_admission_serviceslist", "<?php echo $view_ip_admission_services->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_ip_admission_serviceslist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_ip_admission_serviceslist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_ip_admission_serviceslist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_admission_services_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_admission_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_admission_services", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_admission_services_list->terminate();
?>