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
$view_ip_admission_prescription_list = new view_ip_admission_prescription_list();

// Run the page
$view_ip_admission_prescription_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_prescription_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_admission_prescription->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_admission_prescriptionlist = currentForm = new ew.Form("fview_ip_admission_prescriptionlist", "list");
fview_ip_admission_prescriptionlist.formKeyCountName = '<?php echo $view_ip_admission_prescription_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_admission_prescriptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admission_prescriptionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_ip_admission_prescriptionlistsrch = currentSearchForm = new ew.Form("fview_ip_admission_prescriptionlistsrch");

// Filters
fview_ip_admission_prescriptionlistsrch.filterList = <?php echo $view_ip_admission_prescription_list->getFilterList() ?>;
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
<?php if (!$view_ip_admission_prescription->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_admission_prescription_list->TotalRecs > 0 && $view_ip_admission_prescription_list->ExportOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->ImportOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->SearchOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->FilterOptions->visible()) { ?>
<?php $view_ip_admission_prescription_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_admission_prescription_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_admission_prescription->isExport() && !$view_ip_admission_prescription->CurrentAction) { ?>
<form name="fview_ip_admission_prescriptionlistsrch" id="fview_ip_admission_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_admission_prescription_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_admission_prescriptionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission_prescription">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_admission_prescription_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_admission_prescription_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_admission_prescription_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_prescription_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_admission_prescription_list->showPageHeader(); ?>
<?php
$view_ip_admission_prescription_list->showMessage();
?>
<?php if ($view_ip_admission_prescription_list->TotalRecs > 0 || $view_ip_admission_prescription->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_admission_prescription_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission_prescription">
<?php if (!$view_ip_admission_prescription->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_admission_prescription->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_prescription_list->Pager)) $view_ip_admission_prescription_list->Pager = new NumericPager($view_ip_admission_prescription_list->StartRec, $view_ip_admission_prescription_list->DisplayRecs, $view_ip_admission_prescription_list->TotalRecs, $view_ip_admission_prescription_list->RecRange, $view_ip_admission_prescription_list->AutoHidePager) ?>
<?php if ($view_ip_admission_prescription_list->Pager->RecordCount > 0 && $view_ip_admission_prescription_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_prescription_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_prescription_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_prescription_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_prescription_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_prescription_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_prescription_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->TotalRecs > 0 && (!$view_ip_admission_prescription_list->AutoHidePageSizeSelector || $view_ip_admission_prescription_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_prescription">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_prescription->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_admission_prescriptionlist" id="fview_ip_admission_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_admission_prescription_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_admission_prescription_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_prescription">
<div id="gmp_view_ip_admission_prescription" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_admission_prescription_list->TotalRecs > 0 || $view_ip_admission_prescription->isGridEdit()) { ?>
<table id="tbl_view_ip_admission_prescriptionlist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_admission_prescription_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_admission_prescription_list->renderListOptions();

// Render list options (header, left)
$view_ip_admission_prescription_list->ListOptions->render("header", "left", "", "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
<?php if ($view_ip_admission_prescription->id->Visible) { // id ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_prescription->id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_id" class="view_ip_admission_prescription_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_id" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_admission_prescription->id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_id" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->id) ?>',1);"><div id="elh_view_ip_admission_prescription_id" class="view_ip_admission_prescription_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_prescription->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescription_mrnNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->mrnNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission_prescription->mrnNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->mrnNo) ?>',1);"><div id="elh_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescription_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_prescription->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescription_patient_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->patient_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission_prescription->patient_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->patient_id) ?>',1);"><div id="elh_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescription_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_prescription->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescription_patient_name"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->patient_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission_prescription->patient_name->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->patient_name) ?>',1);"><div id="elh_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescription_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->gender->Visible) { // gender ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_prescription->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_gender" class="view_ip_admission_prescription_gender"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_gender" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission_prescription->gender->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_gender" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->gender) ?>',1);"><div id="elh_view_ip_admission_prescription_gender" class="view_ip_admission_prescription_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->age->Visible) { // age ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->age) == "") { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_prescription->age->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_age" class="view_ip_admission_prescription_age"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_age" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $view_ip_admission_prescription->age->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_age" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->age) ?>',1);"><div id="elh_view_ip_admission_prescription_age" class="view_ip_admission_prescription_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_prescription->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescription_physician_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->physician_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission_prescription->physician_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->physician_id) ?>',1);"><div id="elh_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescription_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_prescription->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescription_typeRegsisteration"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->typeRegsisteration->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission_prescription->typeRegsisteration->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->typeRegsisteration) ?>',1);"><div id="elh_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescription_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_prescription->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescription_PaymentCategory"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->PaymentCategory->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission_prescription->PaymentCategory->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->PaymentCategory) ?>',1);"><div id="elh_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescription_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_prescription->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescription_admission_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->admission_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission_prescription->admission_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->admission_consultant_id) ?>',1);"><div id="elh_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescription_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->admission_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->admission_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_prescription->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescription_leading_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->leading_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission_prescription->leading_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->leading_consultant_id) ?>',1);"><div id="elh_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescription_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->leading_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->leading_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_prescription->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescription_admission_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->admission_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission_prescription->admission_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->admission_date) ?>',1);"><div id="elh_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescription_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_prescription->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_release_date" class="view_ip_admission_prescription_release_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_release_date" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->release_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission_prescription->release_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_release_date" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->release_date) ?>',1);"><div id="elh_view_ip_admission_prescription_release_date" class="view_ip_admission_prescription_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_prescription->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescription_PaymentStatus"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->PaymentStatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission_prescription->PaymentStatus->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->PaymentStatus) ?>',1);"><div id="elh_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescription_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->status->Visible) { // status ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_prescription->status->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_status" class="view_ip_admission_prescription_status"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_status" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_admission_prescription->status->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_status" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->status) ?>',1);"><div id="elh_view_ip_admission_prescription_status" class="view_ip_admission_prescription_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_prescription->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_createdby" class="view_ip_admission_prescription_createdby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_createdby" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->createdby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission_prescription->createdby->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_createdby" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->createdby) ?>',1);"><div id="elh_view_ip_admission_prescription_createdby" class="view_ip_admission_prescription_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_prescription->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescription_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->createddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission_prescription->createddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->createddatetime) ?>',1);"><div id="elh_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescription_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_prescription->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescription_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->modifiedby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission_prescription->modifiedby->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->modifiedby) ?>',1);"><div id="elh_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescription_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_prescription->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescription_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->modifieddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission_prescription->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->modifieddatetime) ?>',1);"><div id="elh_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescription_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_prescription->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescription_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission_prescription->PatientID->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->PatientID) ?>',1);"><div id="elh_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescription_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_prescription->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_HospID" class="view_ip_admission_prescription_HospID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_HospID" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission_prescription->HospID->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_HospID" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->HospID) ?>',1);"><div id="elh_view_ip_admission_prescription_HospID" class="view_ip_admission_prescription_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_prescription->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescription_ReferedByDr"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ReferedByDr->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission_prescription->ReferedByDr->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ReferedByDr) ?>',1);"><div id="elh_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescription_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_prescription->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescription_ReferClinicname"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ReferClinicname->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission_prescription->ReferClinicname->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ReferClinicname) ?>',1);"><div id="elh_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescription_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_prescription->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescription_ReferCity"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ReferCity->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission_prescription->ReferCity->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ReferCity) ?>',1);"><div id="elh_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescription_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_prescription->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescription_ReferMobileNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ReferMobileNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission_prescription->ReferMobileNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ReferMobileNo) ?>',1);"><div id="elh_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescription_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_prescription->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescription_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ReferA4TreatingConsultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission_prescription->ReferA4TreatingConsultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescription_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_prescription->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescription_PurposreReferredfor"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->PurposreReferredfor->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission_prescription->PurposreReferredfor->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->PurposreReferredfor) ?>',1);"><div id="elh_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescription_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_prescription->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescription_mobileno"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->mobileno->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission_prescription->mobileno->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->mobileno) ?>',1);"><div id="elh_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescription_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_prescription->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescription_BillClosing"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->BillClosing->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission_prescription->BillClosing->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->BillClosing) ?>',1);"><div id="elh_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescription_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->BillClosing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_prescription->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescription_BillClosingDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->BillClosingDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission_prescription->BillClosingDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->BillClosingDate) ?>',1);"><div id="elh_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescription_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_prescription->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescription_BillNumber"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->BillNumber->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission_prescription->BillNumber->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->BillNumber) ?>',1);"><div id="elh_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescription_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_prescription->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescription_ClosingAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ClosingAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission_prescription->ClosingAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ClosingAmount) ?>',1);"><div id="elh_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescription_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ClosingAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ClosingAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_prescription->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescription_ClosingType"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ClosingType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission_prescription->ClosingType->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ClosingType) ?>',1);"><div id="elh_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescription_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ClosingType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ClosingType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_prescription->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescription_BillAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->BillAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission_prescription->BillAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->BillAmount) ?>',1);"><div id="elh_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescription_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->BillAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->BillAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_prescription->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescription_billclosedBy"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->billclosedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission_prescription->billclosedBy->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->billclosedBy) ?>',1);"><div id="elh_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescription_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->billclosedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->billclosedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_prescription->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescription_bllcloseByDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->bllcloseByDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission_prescription->bllcloseByDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->bllcloseByDate) ?>',1);"><div id="elh_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescription_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->bllcloseByDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->bllcloseByDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_prescription->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescription_ReportHeader"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->ReportHeader->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission_prescription->ReportHeader->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->ReportHeader) ?>',1);"><div id="elh_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescription_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_prescription->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescription_Procedure"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->Procedure->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission_prescription->Procedure->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->Procedure) ?>',1);"><div id="elh_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescription_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_prescription->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescription_Consultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->Consultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission_prescription->Consultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->Consultant) ?>',1);"><div id="elh_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescription_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_prescription->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescription_Anesthetist"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->Anesthetist->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission_prescription->Anesthetist->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->Anesthetist) ?>',1);"><div id="elh_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescription_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_prescription->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Amound" class="view_ip_admission_prescription_Amound"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Amound" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->Amound->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission_prescription->Amound->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Amound" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->Amound) ?>',1);"><div id="elh_view_ip_admission_prescription_Amound" class="view_ip_admission_prescription_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->Amound->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->Amound->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission_prescription->Package->Visible) { // Package ?>
	<?php if ($view_ip_admission_prescription->sortUrl($view_ip_admission_prescription->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_prescription->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_prescription_Package" class="view_ip_admission_prescription_Package"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_prescription_Package" class="view_ip_admission_prescriptionlist" type="text/html"><span><?php echo $view_ip_admission_prescription->Package->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission_prescription->Package->headerCellClass() ?>"><script id="tpc_view_ip_admission_prescription_Package" class="view_ip_admission_prescriptionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission_prescription->SortUrl($view_ip_admission_prescription->Package) ?>',1);"><div id="elh_view_ip_admission_prescription_Package" class="view_ip_admission_prescription_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission_prescription->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission_prescription->Package->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission_prescription->Package->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_admission_prescription_list->ListOptions->render("header", "right", "", "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_admission_prescription->ExportAll && $view_ip_admission_prescription->isExport()) {
	$view_ip_admission_prescription_list->StopRec = $view_ip_admission_prescription_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_admission_prescription_list->TotalRecs > $view_ip_admission_prescription_list->StartRec + $view_ip_admission_prescription_list->DisplayRecs - 1)
		$view_ip_admission_prescription_list->StopRec = $view_ip_admission_prescription_list->StartRec + $view_ip_admission_prescription_list->DisplayRecs - 1;
	else
		$view_ip_admission_prescription_list->StopRec = $view_ip_admission_prescription_list->TotalRecs;
}
$view_ip_admission_prescription_list->RecCnt = $view_ip_admission_prescription_list->StartRec - 1;
if ($view_ip_admission_prescription_list->Recordset && !$view_ip_admission_prescription_list->Recordset->EOF) {
	$view_ip_admission_prescription_list->Recordset->moveFirst();
	$selectLimit = $view_ip_admission_prescription_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_admission_prescription_list->StartRec > 1)
		$view_ip_admission_prescription_list->Recordset->move($view_ip_admission_prescription_list->StartRec - 1);
} elseif (!$view_ip_admission_prescription->AllowAddDeleteRow && $view_ip_admission_prescription_list->StopRec == 0) {
	$view_ip_admission_prescription_list->StopRec = $view_ip_admission_prescription->GridAddRowCount;
}

// Initialize aggregate
$view_ip_admission_prescription->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_admission_prescription->resetAttributes();
$view_ip_admission_prescription_list->renderRow();
while ($view_ip_admission_prescription_list->RecCnt < $view_ip_admission_prescription_list->StopRec) {
	$view_ip_admission_prescription_list->RecCnt++;
	if ($view_ip_admission_prescription_list->RecCnt >= $view_ip_admission_prescription_list->StartRec) {
		$view_ip_admission_prescription_list->RowCnt++;

		// Set up key count
		$view_ip_admission_prescription_list->KeyCount = $view_ip_admission_prescription_list->RowIndex;

		// Init row class and style
		$view_ip_admission_prescription->resetAttributes();
		$view_ip_admission_prescription->CssClass = "";
		if ($view_ip_admission_prescription->isGridAdd()) {
		} else {
			$view_ip_admission_prescription_list->loadRowValues($view_ip_admission_prescription_list->Recordset); // Load row values
		}
		$view_ip_admission_prescription->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_admission_prescription->RowAttrs = array_merge($view_ip_admission_prescription->RowAttrs, array('data-rowindex'=>$view_ip_admission_prescription_list->RowCnt, 'id'=>'r' . $view_ip_admission_prescription_list->RowCnt . '_view_ip_admission_prescription', 'data-rowtype'=>$view_ip_admission_prescription->RowType));

		// Render row
		$view_ip_admission_prescription_list->renderRow();

		// Render list options
		$view_ip_admission_prescription_list->renderListOptions();

		// Save row and cell attributes
		$view_ip_admission_prescription_list->Attrs[$view_ip_admission_prescription_list->RowCnt] = array("row_attrs" => $view_ip_admission_prescription->rowAttributes(), "cell_attrs" => array());
		$view_ip_admission_prescription_list->Attrs[$view_ip_admission_prescription_list->RowCnt]["cell_attrs"] = $view_ip_admission_prescription->fieldCellAttributes();
?>
	<tr<?php echo $view_ip_admission_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_admission_prescription_list->ListOptions->render("body", "left", $view_ip_admission_prescription_list->RowCnt, "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
	<?php if ($view_ip_admission_prescription->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_admission_prescription->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_id" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_id" class="view_ip_admission_prescription_id">
<span<?php echo $view_ip_admission_prescription->id->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_ip_admission_prescription->mrnNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_mrnNo" class="view_ip_admission_prescription_mrnNo">
<span<?php echo $view_ip_admission_prescription->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $view_ip_admission_prescription->patient_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_patient_id" class="view_ip_admission_prescription_patient_id">
<span<?php echo $view_ip_admission_prescription->patient_id->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_ip_admission_prescription->patient_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_patient_name" class="view_ip_admission_prescription_patient_name">
<span<?php echo $view_ip_admission_prescription->patient_name->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_ip_admission_prescription->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_gender" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_gender" class="view_ip_admission_prescription_gender">
<span<?php echo $view_ip_admission_prescription->gender->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->gender->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->age->Visible) { // age ?>
		<td data-name="age"<?php echo $view_ip_admission_prescription->age->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_age" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_age" class="view_ip_admission_prescription_age">
<span<?php echo $view_ip_admission_prescription->age->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->age->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_ip_admission_prescription->physician_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_physician_id" class="view_ip_admission_prescription_physician_id">
<span<?php echo $view_ip_admission_prescription->physician_id->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_ip_admission_prescription->typeRegsisteration->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_typeRegsisteration" class="view_ip_admission_prescription_typeRegsisteration">
<span<?php echo $view_ip_admission_prescription->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $view_ip_admission_prescription->PaymentCategory->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PaymentCategory" class="view_ip_admission_prescription_PaymentCategory">
<span<?php echo $view_ip_admission_prescription->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id"<?php echo $view_ip_admission_prescription->admission_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_admission_consultant_id" class="view_ip_admission_prescription_admission_consultant_id">
<span<?php echo $view_ip_admission_prescription->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id"<?php echo $view_ip_admission_prescription->leading_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_leading_consultant_id" class="view_ip_admission_prescription_leading_consultant_id">
<span<?php echo $view_ip_admission_prescription->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_ip_admission_prescription->admission_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_admission_date" class="view_ip_admission_prescription_admission_date">
<span<?php echo $view_ip_admission_prescription->admission_date->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_ip_admission_prescription->release_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_release_date" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_release_date" class="view_ip_admission_prescription_release_date">
<span<?php echo $view_ip_admission_prescription->release_date->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_ip_admission_prescription->PaymentStatus->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PaymentStatus" class="view_ip_admission_prescription_PaymentStatus">
<span<?php echo $view_ip_admission_prescription->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ip_admission_prescription->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_status" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_status" class="view_ip_admission_prescription_status">
<span<?php echo $view_ip_admission_prescription->status->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_admission_prescription->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_createdby" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_createdby" class="view_ip_admission_prescription_createdby">
<span<?php echo $view_ip_admission_prescription->createdby->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_admission_prescription->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_createddatetime" class="view_ip_admission_prescription_createddatetime">
<span<?php echo $view_ip_admission_prescription->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_admission_prescription->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_modifiedby" class="view_ip_admission_prescription_modifiedby">
<span<?php echo $view_ip_admission_prescription->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_admission_prescription->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_modifieddatetime" class="view_ip_admission_prescription_modifieddatetime">
<span<?php echo $view_ip_admission_prescription->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_admission_prescription->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PatientID" class="view_ip_admission_prescription_PatientID">
<span<?php echo $view_ip_admission_prescription->PatientID->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_admission_prescription->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_HospID" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_HospID" class="view_ip_admission_prescription_HospID">
<span<?php echo $view_ip_admission_prescription->HospID->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ip_admission_prescription->ReferedByDr->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferedByDr" class="view_ip_admission_prescription_ReferedByDr">
<span<?php echo $view_ip_admission_prescription->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_ip_admission_prescription->ReferClinicname->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferClinicname" class="view_ip_admission_prescription_ReferClinicname">
<span<?php echo $view_ip_admission_prescription->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_ip_admission_prescription->ReferCity->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferCity" class="view_ip_admission_prescription_ReferCity">
<span<?php echo $view_ip_admission_prescription->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_ip_admission_prescription->ReferMobileNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferMobileNo" class="view_ip_admission_prescription_ReferMobileNo">
<span<?php echo $view_ip_admission_prescription->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_admission_prescription->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReferA4TreatingConsultant" class="view_ip_admission_prescription_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_prescription->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_admission_prescription->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_PurposreReferredfor" class="view_ip_admission_prescription_PurposreReferredfor">
<span<?php echo $view_ip_admission_prescription->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $view_ip_admission_prescription->mobileno->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_mobileno" class="view_ip_admission_prescription_mobileno">
<span<?php echo $view_ip_admission_prescription->mobileno->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $view_ip_admission_prescription->BillClosing->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillClosing" class="view_ip_admission_prescription_BillClosing">
<span<?php echo $view_ip_admission_prescription->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $view_ip_admission_prescription->BillClosingDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillClosingDate" class="view_ip_admission_prescription_BillClosingDate">
<span<?php echo $view_ip_admission_prescription->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_admission_prescription->BillNumber->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillNumber" class="view_ip_admission_prescription_BillNumber">
<span<?php echo $view_ip_admission_prescription->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount"<?php echo $view_ip_admission_prescription->ClosingAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ClosingAmount" class="view_ip_admission_prescription_ClosingAmount">
<span<?php echo $view_ip_admission_prescription->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType"<?php echo $view_ip_admission_prescription->ClosingType->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ClosingType" class="view_ip_admission_prescription_ClosingType">
<span<?php echo $view_ip_admission_prescription->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount"<?php echo $view_ip_admission_prescription->BillAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_BillAmount" class="view_ip_admission_prescription_BillAmount">
<span<?php echo $view_ip_admission_prescription->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy"<?php echo $view_ip_admission_prescription->billclosedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_billclosedBy" class="view_ip_admission_prescription_billclosedBy">
<span<?php echo $view_ip_admission_prescription->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate"<?php echo $view_ip_admission_prescription->bllcloseByDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_bllcloseByDate" class="view_ip_admission_prescription_bllcloseByDate">
<span<?php echo $view_ip_admission_prescription->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_ip_admission_prescription->ReportHeader->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_ReportHeader" class="view_ip_admission_prescription_ReportHeader">
<span<?php echo $view_ip_admission_prescription->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $view_ip_admission_prescription->Procedure->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Procedure" class="view_ip_admission_prescription_Procedure">
<span<?php echo $view_ip_admission_prescription->Procedure->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $view_ip_admission_prescription->Consultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Consultant" class="view_ip_admission_prescription_Consultant">
<span<?php echo $view_ip_admission_prescription->Consultant->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $view_ip_admission_prescription->Anesthetist->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Anesthetist" class="view_ip_admission_prescription_Anesthetist">
<span<?php echo $view_ip_admission_prescription->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->Amound->Visible) { // Amound ?>
		<td data-name="Amound"<?php echo $view_ip_admission_prescription->Amound->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Amound" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Amound" class="view_ip_admission_prescription_Amound">
<span<?php echo $view_ip_admission_prescription->Amound->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->Amound->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission_prescription->Package->Visible) { // Package ?>
		<td data-name="Package"<?php echo $view_ip_admission_prescription->Package->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Package" class="view_ip_admission_prescriptionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_prescription_list->RowCnt ?>_view_ip_admission_prescription_Package" class="view_ip_admission_prescription_Package">
<span<?php echo $view_ip_admission_prescription->Package->viewAttributes() ?>>
<?php echo $view_ip_admission_prescription->Package->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_admission_prescription_list->ListOptions->render("body", "right", $view_ip_admission_prescription_list->RowCnt, "block", $view_ip_admission_prescription->TableVar, "view_ip_admission_prescriptionlist");
?>
	</tr>
<?php
	}
	if (!$view_ip_admission_prescription->isGridAdd())
		$view_ip_admission_prescription_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_admission_prescription->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_ip_admission_prescriptionlist" class="ew-custom-template"></div>
<script id="tpm_view_ip_admission_prescriptionlist" type="text/html">
<div id="ct_view_ip_admission_prescription_list"><?php if ($view_ip_admission_prescription_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
		<td></td>
			<td>{{include tmpl="#tpc_view_ip_admission_prescription_PatientID"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_prescription_patient_name"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_admission_prescription_mrnNo"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_prescription_mobileno"/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_ip_admission_prescription_list->StartRowCnt; $i <= $view_ip_admission_prescription_list->RowCnt; $i++) { ?>
 <tr<?php echo @$view_ip_admission_prescription_list->Attrs[$i]['row_attrs'] ?>>
<td>
<div class="btn-group btn-group-sm ew-btn-group">
<a class="btn btn-default ew-row-link ew-view" title="" data-caption="View"  href='patient_prescriptionlist.php?showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' data-original-title="View">
<i data-phrase="ViewLink" class="icon-view ew-icon" data-caption="View"></i>
</a>
<a class="btn btn-default ew-row-link ew-edit" title="" data-caption="Edit" href='patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}'  data-original-title="Edit">
<i data-phrase="EditLink" class="icon-edit ew-icon" data-caption="Edit"></i>
</a>
</div>
</td>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_prescription_PatientID"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_prescription_patient_name"/}}</td>
	 	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_prescription_mrnNo"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_prescription_mobileno"/}}</td>
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
if ($view_ip_admission_prescription_list->Recordset)
	$view_ip_admission_prescription_list->Recordset->Close();
?>
<?php if (!$view_ip_admission_prescription->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_admission_prescription->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_prescription_list->Pager)) $view_ip_admission_prescription_list->Pager = new NumericPager($view_ip_admission_prescription_list->StartRec, $view_ip_admission_prescription_list->DisplayRecs, $view_ip_admission_prescription_list->TotalRecs, $view_ip_admission_prescription_list->RecRange, $view_ip_admission_prescription_list->AutoHidePager) ?>
<?php if ($view_ip_admission_prescription_list->Pager->RecordCount > 0 && $view_ip_admission_prescription_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_prescription_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_prescription_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_prescription_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_prescription_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_prescription_list->pageUrl() ?>start=<?php echo $view_ip_admission_prescription_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_prescription_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_prescription_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_prescription_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_prescription_list->TotalRecs > 0 && (!$view_ip_admission_prescription_list->AutoHidePageSizeSelector || $view_ip_admission_prescription_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission_prescription">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_prescription_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission_prescription->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_prescription_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_admission_prescription_list->TotalRecs == 0 && !$view_ip_admission_prescription->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_admission_prescription->Rows) ?> };
ew.applyTemplate("tpd_view_ip_admission_prescriptionlist", "tpm_view_ip_admission_prescriptionlist", "view_ip_admission_prescriptionlist", "<?php echo $view_ip_admission_prescription->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_ip_admission_prescriptionlist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_ip_admission_prescriptionlist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_ip_admission_prescriptionlist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_admission_prescription_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_prescription->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_admission_prescription->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_admission_prescription", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_admission_prescription_list->terminate();
?>