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
$patient_app_list = new patient_app_list();

// Run the page
$patient_app_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_app_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_app->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_applist = currentForm = new ew.Form("fpatient_applist", "list");
fpatient_applist.formKeyCountName = '<?php echo $patient_app_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_applist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_applist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpatient_applistsrch = currentSearchForm = new ew.Form("fpatient_applistsrch");

// Filters
fpatient_applistsrch.filterList = <?php echo $patient_app_list->getFilterList() ?>;
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
<?php if (!$patient_app->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_app_list->TotalRecs > 0 && $patient_app_list->ExportOptions->visible()) { ?>
<?php $patient_app_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_app_list->ImportOptions->visible()) { ?>
<?php $patient_app_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_app_list->SearchOptions->visible()) { ?>
<?php $patient_app_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_app_list->FilterOptions->visible()) { ?>
<?php $patient_app_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$patient_app_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_app->isExport() && !$patient_app->CurrentAction) { ?>
<form name="fpatient_applistsrch" id="fpatient_applistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_app_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_applistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_app">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_app_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_app_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_app_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_app_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_app_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_app_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_app_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_app_list->showPageHeader(); ?>
<?php
$patient_app_list->showMessage();
?>
<?php if ($patient_app_list->TotalRecs > 0 || $patient_app->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_app_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_app">
<?php if (!$patient_app->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_app->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_app_list->Pager)) $patient_app_list->Pager = new NumericPager($patient_app_list->StartRec, $patient_app_list->DisplayRecs, $patient_app_list->TotalRecs, $patient_app_list->RecRange, $patient_app_list->AutoHidePager) ?>
<?php if ($patient_app_list->Pager->RecordCount > 0 && $patient_app_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_app_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_app_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_app_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_app_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_app_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_app_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_app_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_app_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_app_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_app_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_app_list->TotalRecs > 0 && (!$patient_app_list->AutoHidePageSizeSelector || $patient_app_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_app">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_app_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_app_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_app_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_app_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_app_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_app_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_app->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_app_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_applist" id="fpatient_applist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_app_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_app_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<div id="gmp_patient_app" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_app_list->TotalRecs > 0 || $patient_app->isGridEdit()) { ?>
<table id="tbl_patient_applist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_app_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_app_list->renderListOptions();

// Render list options (header, left)
$patient_app_list->ListOptions->render("header", "left");
?>
<?php if ($patient_app->id->Visible) { // id ?>
	<?php if ($patient_app->sortUrl($patient_app->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_app->id->headerCellClass() ?>"><div id="elh_patient_app_id" class="patient_app_id"><div class="ew-table-header-caption"><?php echo $patient_app->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_app->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->id) ?>',1);"><div id="elh_patient_app_id" class="patient_app_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_app->sortUrl($patient_app->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $patient_app->PatientID->headerCellClass() ?>"><div id="elh_patient_app_PatientID" class="patient_app_PatientID"><div class="ew-table-header-caption"><?php echo $patient_app->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $patient_app->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->PatientID) ?>',1);"><div id="elh_patient_app_PatientID" class="patient_app_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->title->Visible) { // title ?>
	<?php if ($patient_app->sortUrl($patient_app->title) == "") { ?>
		<th data-name="title" class="<?php echo $patient_app->title->headerCellClass() ?>"><div id="elh_patient_app_title" class="patient_app_title"><div class="ew-table-header-caption"><?php echo $patient_app->title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $patient_app->title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->title) ?>',1);"><div id="elh_patient_app_title" class="patient_app_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->title->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->first_name->Visible) { // first_name ?>
	<?php if ($patient_app->sortUrl($patient_app->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $patient_app->first_name->headerCellClass() ?>"><div id="elh_patient_app_first_name" class="patient_app_first_name"><div class="ew-table-header-caption"><?php echo $patient_app->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $patient_app->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->first_name) ?>',1);"><div id="elh_patient_app_first_name" class="patient_app_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->middle_name->Visible) { // middle_name ?>
	<?php if ($patient_app->sortUrl($patient_app->middle_name) == "") { ?>
		<th data-name="middle_name" class="<?php echo $patient_app->middle_name->headerCellClass() ?>"><div id="elh_patient_app_middle_name" class="patient_app_middle_name"><div class="ew-table-header-caption"><?php echo $patient_app->middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="middle_name" class="<?php echo $patient_app->middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->middle_name) ?>',1);"><div id="elh_patient_app_middle_name" class="patient_app_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->last_name->Visible) { // last_name ?>
	<?php if ($patient_app->sortUrl($patient_app->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $patient_app->last_name->headerCellClass() ?>"><div id="elh_patient_app_last_name" class="patient_app_last_name"><div class="ew-table-header-caption"><?php echo $patient_app->last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $patient_app->last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->last_name) ?>',1);"><div id="elh_patient_app_last_name" class="patient_app_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->gender->Visible) { // gender ?>
	<?php if ($patient_app->sortUrl($patient_app->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $patient_app->gender->headerCellClass() ?>"><div id="elh_patient_app_gender" class="patient_app_gender"><div class="ew-table-header-caption"><?php echo $patient_app->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $patient_app->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->gender) ?>',1);"><div id="elh_patient_app_gender" class="patient_app_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->dob->Visible) { // dob ?>
	<?php if ($patient_app->sortUrl($patient_app->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $patient_app->dob->headerCellClass() ?>"><div id="elh_patient_app_dob" class="patient_app_dob"><div class="ew-table-header-caption"><?php echo $patient_app->dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $patient_app->dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->dob) ?>',1);"><div id="elh_patient_app_dob" class="patient_app_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Age->Visible) { // Age ?>
	<?php if ($patient_app->sortUrl($patient_app->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_app->Age->headerCellClass() ?>"><div id="elh_patient_app_Age" class="patient_app_Age"><div class="ew-table-header-caption"><?php echo $patient_app->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_app->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Age) ?>',1);"><div id="elh_patient_app_Age" class="patient_app_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->blood_group->Visible) { // blood_group ?>
	<?php if ($patient_app->sortUrl($patient_app->blood_group) == "") { ?>
		<th data-name="blood_group" class="<?php echo $patient_app->blood_group->headerCellClass() ?>"><div id="elh_patient_app_blood_group" class="patient_app_blood_group"><div class="ew-table-header-caption"><?php echo $patient_app->blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="blood_group" class="<?php echo $patient_app->blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->blood_group) ?>',1);"><div id="elh_patient_app_blood_group" class="patient_app_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->mobile_no->Visible) { // mobile_no ?>
	<?php if ($patient_app->sortUrl($patient_app->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $patient_app->mobile_no->headerCellClass() ?>"><div id="elh_patient_app_mobile_no" class="patient_app_mobile_no"><div class="ew-table-header-caption"><?php echo $patient_app->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $patient_app->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->mobile_no) ?>',1);"><div id="elh_patient_app_mobile_no" class="patient_app_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($patient_app->sortUrl($patient_app->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $patient_app->IdentificationMark->headerCellClass() ?>"><div id="elh_patient_app_IdentificationMark" class="patient_app_IdentificationMark"><div class="ew-table-header-caption"><?php echo $patient_app->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $patient_app->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->IdentificationMark) ?>',1);"><div id="elh_patient_app_IdentificationMark" class="patient_app_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Religion->Visible) { // Religion ?>
	<?php if ($patient_app->sortUrl($patient_app->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $patient_app->Religion->headerCellClass() ?>"><div id="elh_patient_app_Religion" class="patient_app_Religion"><div class="ew-table-header-caption"><?php echo $patient_app->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $patient_app->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Religion) ?>',1);"><div id="elh_patient_app_Religion" class="patient_app_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Nationality->Visible) { // Nationality ?>
	<?php if ($patient_app->sortUrl($patient_app->Nationality) == "") { ?>
		<th data-name="Nationality" class="<?php echo $patient_app->Nationality->headerCellClass() ?>"><div id="elh_patient_app_Nationality" class="patient_app_Nationality"><div class="ew-table-header-caption"><?php echo $patient_app->Nationality->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nationality" class="<?php echo $patient_app->Nationality->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Nationality) ?>',1);"><div id="elh_patient_app_Nationality" class="patient_app_Nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Nationality->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Nationality->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Nationality->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_app->sortUrl($patient_app->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $patient_app->profilePic->headerCellClass() ?>"><div id="elh_patient_app_profilePic" class="patient_app_profilePic"><div class="ew-table-header-caption"><?php echo $patient_app->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $patient_app->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->profilePic) ?>',1);"><div id="elh_patient_app_profilePic" class="patient_app_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->status->Visible) { // status ?>
	<?php if ($patient_app->sortUrl($patient_app->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_app->status->headerCellClass() ?>"><div id="elh_patient_app_status" class="patient_app_status"><div class="ew-table-header-caption"><?php echo $patient_app->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_app->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->status) ?>',1);"><div id="elh_patient_app_status" class="patient_app_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->createdby->Visible) { // createdby ?>
	<?php if ($patient_app->sortUrl($patient_app->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_app->createdby->headerCellClass() ?>"><div id="elh_patient_app_createdby" class="patient_app_createdby"><div class="ew-table-header-caption"><?php echo $patient_app->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_app->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->createdby) ?>',1);"><div id="elh_patient_app_createdby" class="patient_app_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_app->sortUrl($patient_app->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_app->createddatetime->headerCellClass() ?>"><div id="elh_patient_app_createddatetime" class="patient_app_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_app->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_app->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->createddatetime) ?>',1);"><div id="elh_patient_app_createddatetime" class="patient_app_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_app->sortUrl($patient_app->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_app->modifiedby->headerCellClass() ?>"><div id="elh_patient_app_modifiedby" class="patient_app_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_app->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_app->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->modifiedby) ?>',1);"><div id="elh_patient_app_modifiedby" class="patient_app_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_app->sortUrl($patient_app->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_app->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_app_modifieddatetime" class="patient_app_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_app->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_app->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->modifieddatetime) ?>',1);"><div id="elh_patient_app_modifieddatetime" class="patient_app_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($patient_app->sortUrl($patient_app->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $patient_app->ReferedByDr->headerCellClass() ?>"><div id="elh_patient_app_ReferedByDr" class="patient_app_ReferedByDr"><div class="ew-table-header-caption"><?php echo $patient_app->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $patient_app->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->ReferedByDr) ?>',1);"><div id="elh_patient_app_ReferedByDr" class="patient_app_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($patient_app->sortUrl($patient_app->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $patient_app->ReferClinicname->headerCellClass() ?>"><div id="elh_patient_app_ReferClinicname" class="patient_app_ReferClinicname"><div class="ew-table-header-caption"><?php echo $patient_app->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $patient_app->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->ReferClinicname) ?>',1);"><div id="elh_patient_app_ReferClinicname" class="patient_app_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->ReferCity->Visible) { // ReferCity ?>
	<?php if ($patient_app->sortUrl($patient_app->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $patient_app->ReferCity->headerCellClass() ?>"><div id="elh_patient_app_ReferCity" class="patient_app_ReferCity"><div class="ew-table-header-caption"><?php echo $patient_app->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $patient_app->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->ReferCity) ?>',1);"><div id="elh_patient_app_ReferCity" class="patient_app_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($patient_app->sortUrl($patient_app->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $patient_app->ReferMobileNo->headerCellClass() ?>"><div id="elh_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $patient_app->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $patient_app->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->ReferMobileNo) ?>',1);"><div id="elh_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($patient_app->sortUrl($patient_app->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $patient_app->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $patient_app->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $patient_app->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->ReferA4TreatingConsultant) ?>',1);"><div id="elh_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($patient_app->sortUrl($patient_app->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $patient_app->PurposreReferredfor->headerCellClass() ?>"><div id="elh_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $patient_app->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $patient_app->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->PurposreReferredfor) ?>',1);"><div id="elh_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_title->Visible) { // spouse_title ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_title) == "") { ?>
		<th data-name="spouse_title" class="<?php echo $patient_app->spouse_title->headerCellClass() ?>"><div id="elh_patient_app_spouse_title" class="patient_app_spouse_title"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_title" class="<?php echo $patient_app->spouse_title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_title) ?>',1);"><div id="elh_patient_app_spouse_title" class="patient_app_spouse_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_first_name->Visible) { // spouse_first_name ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_first_name) == "") { ?>
		<th data-name="spouse_first_name" class="<?php echo $patient_app->spouse_first_name->headerCellClass() ?>"><div id="elh_patient_app_spouse_first_name" class="patient_app_spouse_first_name"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_first_name" class="<?php echo $patient_app->spouse_first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_first_name) ?>',1);"><div id="elh_patient_app_spouse_first_name" class="patient_app_spouse_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_middle_name) == "") { ?>
		<th data-name="spouse_middle_name" class="<?php echo $patient_app->spouse_middle_name->headerCellClass() ?>"><div id="elh_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_middle_name" class="<?php echo $patient_app->spouse_middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_middle_name) ?>',1);"><div id="elh_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_last_name->Visible) { // spouse_last_name ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_last_name) == "") { ?>
		<th data-name="spouse_last_name" class="<?php echo $patient_app->spouse_last_name->headerCellClass() ?>"><div id="elh_patient_app_spouse_last_name" class="patient_app_spouse_last_name"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_last_name" class="<?php echo $patient_app->spouse_last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_last_name) ?>',1);"><div id="elh_patient_app_spouse_last_name" class="patient_app_spouse_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_gender->Visible) { // spouse_gender ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_gender) == "") { ?>
		<th data-name="spouse_gender" class="<?php echo $patient_app->spouse_gender->headerCellClass() ?>"><div id="elh_patient_app_spouse_gender" class="patient_app_spouse_gender"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_gender" class="<?php echo $patient_app->spouse_gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_gender) ?>',1);"><div id="elh_patient_app_spouse_gender" class="patient_app_spouse_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_dob->Visible) { // spouse_dob ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_dob) == "") { ?>
		<th data-name="spouse_dob" class="<?php echo $patient_app->spouse_dob->headerCellClass() ?>"><div id="elh_patient_app_spouse_dob" class="patient_app_spouse_dob"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_dob" class="<?php echo $patient_app->spouse_dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_dob) ?>',1);"><div id="elh_patient_app_spouse_dob" class="patient_app_spouse_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_Age->Visible) { // spouse_Age ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_Age) == "") { ?>
		<th data-name="spouse_Age" class="<?php echo $patient_app->spouse_Age->headerCellClass() ?>"><div id="elh_patient_app_spouse_Age" class="patient_app_spouse_Age"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_Age" class="<?php echo $patient_app->spouse_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_Age) ?>',1);"><div id="elh_patient_app_spouse_Age" class="patient_app_spouse_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_blood_group) == "") { ?>
		<th data-name="spouse_blood_group" class="<?php echo $patient_app->spouse_blood_group->headerCellClass() ?>"><div id="elh_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_blood_group" class="<?php echo $patient_app->spouse_blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_blood_group) ?>',1);"><div id="elh_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $patient_app->spouse_mobile_no->headerCellClass() ?>"><div id="elh_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $patient_app->spouse_mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_mobile_no) ?>',1);"><div id="elh_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Maritalstatus->Visible) { // Maritalstatus ?>
	<?php if ($patient_app->sortUrl($patient_app->Maritalstatus) == "") { ?>
		<th data-name="Maritalstatus" class="<?php echo $patient_app->Maritalstatus->headerCellClass() ?>"><div id="elh_patient_app_Maritalstatus" class="patient_app_Maritalstatus"><div class="ew-table-header-caption"><?php echo $patient_app->Maritalstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maritalstatus" class="<?php echo $patient_app->Maritalstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Maritalstatus) ?>',1);"><div id="elh_patient_app_Maritalstatus" class="patient_app_Maritalstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Maritalstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Maritalstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Maritalstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Business->Visible) { // Business ?>
	<?php if ($patient_app->sortUrl($patient_app->Business) == "") { ?>
		<th data-name="Business" class="<?php echo $patient_app->Business->headerCellClass() ?>"><div id="elh_patient_app_Business" class="patient_app_Business"><div class="ew-table-header-caption"><?php echo $patient_app->Business->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Business" class="<?php echo $patient_app->Business->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Business) ?>',1);"><div id="elh_patient_app_Business" class="patient_app_Business">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Business->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Business->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Business->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($patient_app->sortUrl($patient_app->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $patient_app->Patient_Language->headerCellClass() ?>"><div id="elh_patient_app_Patient_Language" class="patient_app_Patient_Language"><div class="ew-table-header-caption"><?php echo $patient_app->Patient_Language->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $patient_app->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Patient_Language) ?>',1);"><div id="elh_patient_app_Patient_Language" class="patient_app_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Patient_Language->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Patient_Language->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Patient_Language->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Passport->Visible) { // Passport ?>
	<?php if ($patient_app->sortUrl($patient_app->Passport) == "") { ?>
		<th data-name="Passport" class="<?php echo $patient_app->Passport->headerCellClass() ?>"><div id="elh_patient_app_Passport" class="patient_app_Passport"><div class="ew-table-header-caption"><?php echo $patient_app->Passport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Passport" class="<?php echo $patient_app->Passport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Passport) ?>',1);"><div id="elh_patient_app_Passport" class="patient_app_Passport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Passport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Passport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Passport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->VisaNo->Visible) { // VisaNo ?>
	<?php if ($patient_app->sortUrl($patient_app->VisaNo) == "") { ?>
		<th data-name="VisaNo" class="<?php echo $patient_app->VisaNo->headerCellClass() ?>"><div id="elh_patient_app_VisaNo" class="patient_app_VisaNo"><div class="ew-table-header-caption"><?php echo $patient_app->VisaNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisaNo" class="<?php echo $patient_app->VisaNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->VisaNo) ?>',1);"><div id="elh_patient_app_VisaNo" class="patient_app_VisaNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->VisaNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->VisaNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->VisaNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<?php if ($patient_app->sortUrl($patient_app->ValidityOfVisa) == "") { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $patient_app->ValidityOfVisa->headerCellClass() ?>"><div id="elh_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa"><div class="ew-table-header-caption"><?php echo $patient_app->ValidityOfVisa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $patient_app->ValidityOfVisa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->ValidityOfVisa) ?>',1);"><div id="elh_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->ValidityOfVisa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->ValidityOfVisa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->ValidityOfVisa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($patient_app->sortUrl($patient_app->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $patient_app->WhereDidYouHear->headerCellClass() ?>"><div id="elh_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $patient_app->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $patient_app->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->WhereDidYouHear) ?>',1);"><div id="elh_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->WhereDidYouHear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->HospID->Visible) { // HospID ?>
	<?php if ($patient_app->sortUrl($patient_app->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_app->HospID->headerCellClass() ?>"><div id="elh_patient_app_HospID" class="patient_app_HospID"><div class="ew-table-header-caption"><?php echo $patient_app->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_app->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->HospID) ?>',1);"><div id="elh_patient_app_HospID" class="patient_app_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->street->Visible) { // street ?>
	<?php if ($patient_app->sortUrl($patient_app->street) == "") { ?>
		<th data-name="street" class="<?php echo $patient_app->street->headerCellClass() ?>"><div id="elh_patient_app_street" class="patient_app_street"><div class="ew-table-header-caption"><?php echo $patient_app->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $patient_app->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->street) ?>',1);"><div id="elh_patient_app_street" class="patient_app_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->town->Visible) { // town ?>
	<?php if ($patient_app->sortUrl($patient_app->town) == "") { ?>
		<th data-name="town" class="<?php echo $patient_app->town->headerCellClass() ?>"><div id="elh_patient_app_town" class="patient_app_town"><div class="ew-table-header-caption"><?php echo $patient_app->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $patient_app->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->town) ?>',1);"><div id="elh_patient_app_town" class="patient_app_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->province->Visible) { // province ?>
	<?php if ($patient_app->sortUrl($patient_app->province) == "") { ?>
		<th data-name="province" class="<?php echo $patient_app->province->headerCellClass() ?>"><div id="elh_patient_app_province" class="patient_app_province"><div class="ew-table-header-caption"><?php echo $patient_app->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $patient_app->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->province) ?>',1);"><div id="elh_patient_app_province" class="patient_app_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->country->Visible) { // country ?>
	<?php if ($patient_app->sortUrl($patient_app->country) == "") { ?>
		<th data-name="country" class="<?php echo $patient_app->country->headerCellClass() ?>"><div id="elh_patient_app_country" class="patient_app_country"><div class="ew-table-header-caption"><?php echo $patient_app->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $patient_app->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->country) ?>',1);"><div id="elh_patient_app_country" class="patient_app_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_app->sortUrl($patient_app->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $patient_app->postal_code->headerCellClass() ?>"><div id="elh_patient_app_postal_code" class="patient_app_postal_code"><div class="ew-table-header-caption"><?php echo $patient_app->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $patient_app->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->postal_code) ?>',1);"><div id="elh_patient_app_postal_code" class="patient_app_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->PEmail->Visible) { // PEmail ?>
	<?php if ($patient_app->sortUrl($patient_app->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $patient_app->PEmail->headerCellClass() ?>"><div id="elh_patient_app_PEmail" class="patient_app_PEmail"><div class="ew-table-header-caption"><?php echo $patient_app->PEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $patient_app->PEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->PEmail) ?>',1);"><div id="elh_patient_app_PEmail" class="patient_app_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->PEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->PEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<?php if ($patient_app->sortUrl($patient_app->PEmergencyContact) == "") { ?>
		<th data-name="PEmergencyContact" class="<?php echo $patient_app->PEmergencyContact->headerCellClass() ?>"><div id="elh_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact"><div class="ew-table-header-caption"><?php echo $patient_app->PEmergencyContact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmergencyContact" class="<?php echo $patient_app->PEmergencyContact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->PEmergencyContact) ?>',1);"><div id="elh_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->PEmergencyContact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->PEmergencyContact->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->PEmergencyContact->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->occupation->Visible) { // occupation ?>
	<?php if ($patient_app->sortUrl($patient_app->occupation) == "") { ?>
		<th data-name="occupation" class="<?php echo $patient_app->occupation->headerCellClass() ?>"><div id="elh_patient_app_occupation" class="patient_app_occupation"><div class="ew-table-header-caption"><?php echo $patient_app->occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="occupation" class="<?php echo $patient_app->occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->occupation) ?>',1);"><div id="elh_patient_app_occupation" class="patient_app_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->occupation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->occupation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->spouse_occupation->Visible) { // spouse_occupation ?>
	<?php if ($patient_app->sortUrl($patient_app->spouse_occupation) == "") { ?>
		<th data-name="spouse_occupation" class="<?php echo $patient_app->spouse_occupation->headerCellClass() ?>"><div id="elh_patient_app_spouse_occupation" class="patient_app_spouse_occupation"><div class="ew-table-header-caption"><?php echo $patient_app->spouse_occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_occupation" class="<?php echo $patient_app->spouse_occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->spouse_occupation) ?>',1);"><div id="elh_patient_app_spouse_occupation" class="patient_app_spouse_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->spouse_occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->spouse_occupation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->spouse_occupation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->WhatsApp->Visible) { // WhatsApp ?>
	<?php if ($patient_app->sortUrl($patient_app->WhatsApp) == "") { ?>
		<th data-name="WhatsApp" class="<?php echo $patient_app->WhatsApp->headerCellClass() ?>"><div id="elh_patient_app_WhatsApp" class="patient_app_WhatsApp"><div class="ew-table-header-caption"><?php echo $patient_app->WhatsApp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhatsApp" class="<?php echo $patient_app->WhatsApp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->WhatsApp) ?>',1);"><div id="elh_patient_app_WhatsApp" class="patient_app_WhatsApp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->WhatsApp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->WhatsApp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->WhatsApp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->CouppleID->Visible) { // CouppleID ?>
	<?php if ($patient_app->sortUrl($patient_app->CouppleID) == "") { ?>
		<th data-name="CouppleID" class="<?php echo $patient_app->CouppleID->headerCellClass() ?>"><div id="elh_patient_app_CouppleID" class="patient_app_CouppleID"><div class="ew-table-header-caption"><?php echo $patient_app->CouppleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CouppleID" class="<?php echo $patient_app->CouppleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->CouppleID) ?>',1);"><div id="elh_patient_app_CouppleID" class="patient_app_CouppleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->CouppleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->CouppleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->CouppleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->MaleID->Visible) { // MaleID ?>
	<?php if ($patient_app->sortUrl($patient_app->MaleID) == "") { ?>
		<th data-name="MaleID" class="<?php echo $patient_app->MaleID->headerCellClass() ?>"><div id="elh_patient_app_MaleID" class="patient_app_MaleID"><div class="ew-table-header-caption"><?php echo $patient_app->MaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleID" class="<?php echo $patient_app->MaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->MaleID) ?>',1);"><div id="elh_patient_app_MaleID" class="patient_app_MaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->MaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->MaleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->MaleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->FemaleID->Visible) { // FemaleID ?>
	<?php if ($patient_app->sortUrl($patient_app->FemaleID) == "") { ?>
		<th data-name="FemaleID" class="<?php echo $patient_app->FemaleID->headerCellClass() ?>"><div id="elh_patient_app_FemaleID" class="patient_app_FemaleID"><div class="ew-table-header-caption"><?php echo $patient_app->FemaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleID" class="<?php echo $patient_app->FemaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->FemaleID) ?>',1);"><div id="elh_patient_app_FemaleID" class="patient_app_FemaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->FemaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->FemaleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->FemaleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->GroupID->Visible) { // GroupID ?>
	<?php if ($patient_app->sortUrl($patient_app->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $patient_app->GroupID->headerCellClass() ?>"><div id="elh_patient_app_GroupID" class="patient_app_GroupID"><div class="ew-table-header-caption"><?php echo $patient_app->GroupID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $patient_app->GroupID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->GroupID) ?>',1);"><div id="elh_patient_app_GroupID" class="patient_app_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->GroupID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_app->GroupID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->GroupID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_app->Relationship->Visible) { // Relationship ?>
	<?php if ($patient_app->sortUrl($patient_app->Relationship) == "") { ?>
		<th data-name="Relationship" class="<?php echo $patient_app->Relationship->headerCellClass() ?>"><div id="elh_patient_app_Relationship" class="patient_app_Relationship"><div class="ew-table-header-caption"><?php echo $patient_app->Relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Relationship" class="<?php echo $patient_app->Relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_app->SortUrl($patient_app->Relationship) ?>',1);"><div id="elh_patient_app_Relationship" class="patient_app_Relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_app->Relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_app->Relationship->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_app->Relationship->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_app_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_app->ExportAll && $patient_app->isExport()) {
	$patient_app_list->StopRec = $patient_app_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_app_list->TotalRecs > $patient_app_list->StartRec + $patient_app_list->DisplayRecs - 1)
		$patient_app_list->StopRec = $patient_app_list->StartRec + $patient_app_list->DisplayRecs - 1;
	else
		$patient_app_list->StopRec = $patient_app_list->TotalRecs;
}
$patient_app_list->RecCnt = $patient_app_list->StartRec - 1;
if ($patient_app_list->Recordset && !$patient_app_list->Recordset->EOF) {
	$patient_app_list->Recordset->moveFirst();
	$selectLimit = $patient_app_list->UseSelectLimit;
	if (!$selectLimit && $patient_app_list->StartRec > 1)
		$patient_app_list->Recordset->move($patient_app_list->StartRec - 1);
} elseif (!$patient_app->AllowAddDeleteRow && $patient_app_list->StopRec == 0) {
	$patient_app_list->StopRec = $patient_app->GridAddRowCount;
}

// Initialize aggregate
$patient_app->RowType = ROWTYPE_AGGREGATEINIT;
$patient_app->resetAttributes();
$patient_app_list->renderRow();
while ($patient_app_list->RecCnt < $patient_app_list->StopRec) {
	$patient_app_list->RecCnt++;
	if ($patient_app_list->RecCnt >= $patient_app_list->StartRec) {
		$patient_app_list->RowCnt++;

		// Set up key count
		$patient_app_list->KeyCount = $patient_app_list->RowIndex;

		// Init row class and style
		$patient_app->resetAttributes();
		$patient_app->CssClass = "";
		if ($patient_app->isGridAdd()) {
		} else {
			$patient_app_list->loadRowValues($patient_app_list->Recordset); // Load row values
		}
		$patient_app->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_app->RowAttrs = array_merge($patient_app->RowAttrs, array('data-rowindex'=>$patient_app_list->RowCnt, 'id'=>'r' . $patient_app_list->RowCnt . '_patient_app', 'data-rowtype'=>$patient_app->RowType));

		// Render row
		$patient_app_list->renderRow();

		// Render list options
		$patient_app_list->renderListOptions();
?>
	<tr<?php echo $patient_app->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_app_list->ListOptions->render("body", "left", $patient_app_list->RowCnt);
?>
	<?php if ($patient_app->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_app->id->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_id" class="patient_app_id">
<span<?php echo $patient_app->id->viewAttributes() ?>>
<?php echo $patient_app->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $patient_app->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_PatientID" class="patient_app_PatientID">
<span<?php echo $patient_app->PatientID->viewAttributes() ?>>
<?php echo $patient_app->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->title->Visible) { // title ?>
		<td data-name="title"<?php echo $patient_app->title->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_title" class="patient_app_title">
<span<?php echo $patient_app->title->viewAttributes() ?>>
<?php echo $patient_app->title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $patient_app->first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_first_name" class="patient_app_first_name">
<span<?php echo $patient_app->first_name->viewAttributes() ?>>
<?php echo $patient_app->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name"<?php echo $patient_app->middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_middle_name" class="patient_app_middle_name">
<span<?php echo $patient_app->middle_name->viewAttributes() ?>>
<?php echo $patient_app->middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->last_name->Visible) { // last_name ?>
		<td data-name="last_name"<?php echo $patient_app->last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_last_name" class="patient_app_last_name">
<span<?php echo $patient_app->last_name->viewAttributes() ?>>
<?php echo $patient_app->last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $patient_app->gender->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_gender" class="patient_app_gender">
<span<?php echo $patient_app->gender->viewAttributes() ?>>
<?php echo $patient_app->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->dob->Visible) { // dob ?>
		<td data-name="dob"<?php echo $patient_app->dob->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_dob" class="patient_app_dob">
<span<?php echo $patient_app->dob->viewAttributes() ?>>
<?php echo $patient_app->dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_app->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Age" class="patient_app_Age">
<span<?php echo $patient_app->Age->viewAttributes() ?>>
<?php echo $patient_app->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->blood_group->Visible) { // blood_group ?>
		<td data-name="blood_group"<?php echo $patient_app->blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_blood_group" class="patient_app_blood_group">
<span<?php echo $patient_app->blood_group->viewAttributes() ?>>
<?php echo $patient_app->blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $patient_app->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_mobile_no" class="patient_app_mobile_no">
<span<?php echo $patient_app->mobile_no->viewAttributes() ?>>
<?php echo $patient_app->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $patient_app->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_IdentificationMark" class="patient_app_IdentificationMark">
<span<?php echo $patient_app->IdentificationMark->viewAttributes() ?>>
<?php echo $patient_app->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Religion->Visible) { // Religion ?>
		<td data-name="Religion"<?php echo $patient_app->Religion->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Religion" class="patient_app_Religion">
<span<?php echo $patient_app->Religion->viewAttributes() ?>>
<?php echo $patient_app->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Nationality->Visible) { // Nationality ?>
		<td data-name="Nationality"<?php echo $patient_app->Nationality->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Nationality" class="patient_app_Nationality">
<span<?php echo $patient_app->Nationality->viewAttributes() ?>>
<?php echo $patient_app->Nationality->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $patient_app->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_profilePic" class="patient_app_profilePic">
<span<?php echo $patient_app->profilePic->viewAttributes() ?>>
<?php echo $patient_app->profilePic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_app->status->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_status" class="patient_app_status">
<span<?php echo $patient_app->status->viewAttributes() ?>>
<?php echo $patient_app->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_app->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_createdby" class="patient_app_createdby">
<span<?php echo $patient_app->createdby->viewAttributes() ?>>
<?php echo $patient_app->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_app->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_createddatetime" class="patient_app_createddatetime">
<span<?php echo $patient_app->createddatetime->viewAttributes() ?>>
<?php echo $patient_app->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_app->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_modifiedby" class="patient_app_modifiedby">
<span<?php echo $patient_app->modifiedby->viewAttributes() ?>>
<?php echo $patient_app->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_app->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_modifieddatetime" class="patient_app_modifieddatetime">
<span<?php echo $patient_app->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_app->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $patient_app->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_ReferedByDr" class="patient_app_ReferedByDr">
<span<?php echo $patient_app->ReferedByDr->viewAttributes() ?>>
<?php echo $patient_app->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $patient_app->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_ReferClinicname" class="patient_app_ReferClinicname">
<span<?php echo $patient_app->ReferClinicname->viewAttributes() ?>>
<?php echo $patient_app->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $patient_app->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_ReferCity" class="patient_app_ReferCity">
<span<?php echo $patient_app->ReferCity->viewAttributes() ?>>
<?php echo $patient_app->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $patient_app->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo">
<span<?php echo $patient_app->ReferMobileNo->viewAttributes() ?>>
<?php echo $patient_app->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $patient_app->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant">
<span<?php echo $patient_app->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $patient_app->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $patient_app->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor">
<span<?php echo $patient_app->PurposreReferredfor->viewAttributes() ?>>
<?php echo $patient_app->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_title->Visible) { // spouse_title ?>
		<td data-name="spouse_title"<?php echo $patient_app->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_title" class="patient_app_spouse_title">
<span<?php echo $patient_app->spouse_title->viewAttributes() ?>>
<?php echo $patient_app->spouse_title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_first_name->Visible) { // spouse_first_name ?>
		<td data-name="spouse_first_name"<?php echo $patient_app->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_first_name" class="patient_app_spouse_first_name">
<span<?php echo $patient_app->spouse_first_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td data-name="spouse_middle_name"<?php echo $patient_app->spouse_middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name">
<span<?php echo $patient_app->spouse_middle_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_last_name->Visible) { // spouse_last_name ?>
		<td data-name="spouse_last_name"<?php echo $patient_app->spouse_last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_last_name" class="patient_app_spouse_last_name">
<span<?php echo $patient_app->spouse_last_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_gender->Visible) { // spouse_gender ?>
		<td data-name="spouse_gender"<?php echo $patient_app->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_gender" class="patient_app_spouse_gender">
<span<?php echo $patient_app->spouse_gender->viewAttributes() ?>>
<?php echo $patient_app->spouse_gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_dob->Visible) { // spouse_dob ?>
		<td data-name="spouse_dob"<?php echo $patient_app->spouse_dob->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_dob" class="patient_app_spouse_dob">
<span<?php echo $patient_app->spouse_dob->viewAttributes() ?>>
<?php echo $patient_app->spouse_dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_Age->Visible) { // spouse_Age ?>
		<td data-name="spouse_Age"<?php echo $patient_app->spouse_Age->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_Age" class="patient_app_spouse_Age">
<span<?php echo $patient_app->spouse_Age->viewAttributes() ?>>
<?php echo $patient_app->spouse_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td data-name="spouse_blood_group"<?php echo $patient_app->spouse_blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group">
<span<?php echo $patient_app->spouse_blood_group->viewAttributes() ?>>
<?php echo $patient_app->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no"<?php echo $patient_app->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no">
<span<?php echo $patient_app->spouse_mobile_no->viewAttributes() ?>>
<?php echo $patient_app->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Maritalstatus->Visible) { // Maritalstatus ?>
		<td data-name="Maritalstatus"<?php echo $patient_app->Maritalstatus->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Maritalstatus" class="patient_app_Maritalstatus">
<span<?php echo $patient_app->Maritalstatus->viewAttributes() ?>>
<?php echo $patient_app->Maritalstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Business->Visible) { // Business ?>
		<td data-name="Business"<?php echo $patient_app->Business->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Business" class="patient_app_Business">
<span<?php echo $patient_app->Business->viewAttributes() ?>>
<?php echo $patient_app->Business->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language"<?php echo $patient_app->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Patient_Language" class="patient_app_Patient_Language">
<span<?php echo $patient_app->Patient_Language->viewAttributes() ?>>
<?php echo $patient_app->Patient_Language->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Passport->Visible) { // Passport ?>
		<td data-name="Passport"<?php echo $patient_app->Passport->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Passport" class="patient_app_Passport">
<span<?php echo $patient_app->Passport->viewAttributes() ?>>
<?php echo $patient_app->Passport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->VisaNo->Visible) { // VisaNo ?>
		<td data-name="VisaNo"<?php echo $patient_app->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_VisaNo" class="patient_app_VisaNo">
<span<?php echo $patient_app->VisaNo->viewAttributes() ?>>
<?php echo $patient_app->VisaNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td data-name="ValidityOfVisa"<?php echo $patient_app->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa">
<span<?php echo $patient_app->ValidityOfVisa->viewAttributes() ?>>
<?php echo $patient_app->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $patient_app->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear">
<span<?php echo $patient_app->WhereDidYouHear->viewAttributes() ?>>
<?php echo $patient_app->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_app->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_HospID" class="patient_app_HospID">
<span<?php echo $patient_app->HospID->viewAttributes() ?>>
<?php echo $patient_app->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->street->Visible) { // street ?>
		<td data-name="street"<?php echo $patient_app->street->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_street" class="patient_app_street">
<span<?php echo $patient_app->street->viewAttributes() ?>>
<?php echo $patient_app->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->town->Visible) { // town ?>
		<td data-name="town"<?php echo $patient_app->town->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_town" class="patient_app_town">
<span<?php echo $patient_app->town->viewAttributes() ?>>
<?php echo $patient_app->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->province->Visible) { // province ?>
		<td data-name="province"<?php echo $patient_app->province->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_province" class="patient_app_province">
<span<?php echo $patient_app->province->viewAttributes() ?>>
<?php echo $patient_app->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->country->Visible) { // country ?>
		<td data-name="country"<?php echo $patient_app->country->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_country" class="patient_app_country">
<span<?php echo $patient_app->country->viewAttributes() ?>>
<?php echo $patient_app->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $patient_app->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_postal_code" class="patient_app_postal_code">
<span<?php echo $patient_app->postal_code->viewAttributes() ?>>
<?php echo $patient_app->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail"<?php echo $patient_app->PEmail->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_PEmail" class="patient_app_PEmail">
<span<?php echo $patient_app->PEmail->viewAttributes() ?>>
<?php echo $patient_app->PEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td data-name="PEmergencyContact"<?php echo $patient_app->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact">
<span<?php echo $patient_app->PEmergencyContact->viewAttributes() ?>>
<?php echo $patient_app->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->occupation->Visible) { // occupation ?>
		<td data-name="occupation"<?php echo $patient_app->occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_occupation" class="patient_app_occupation">
<span<?php echo $patient_app->occupation->viewAttributes() ?>>
<?php echo $patient_app->occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->spouse_occupation->Visible) { // spouse_occupation ?>
		<td data-name="spouse_occupation"<?php echo $patient_app->spouse_occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_spouse_occupation" class="patient_app_spouse_occupation">
<span<?php echo $patient_app->spouse_occupation->viewAttributes() ?>>
<?php echo $patient_app->spouse_occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->WhatsApp->Visible) { // WhatsApp ?>
		<td data-name="WhatsApp"<?php echo $patient_app->WhatsApp->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_WhatsApp" class="patient_app_WhatsApp">
<span<?php echo $patient_app->WhatsApp->viewAttributes() ?>>
<?php echo $patient_app->WhatsApp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->CouppleID->Visible) { // CouppleID ?>
		<td data-name="CouppleID"<?php echo $patient_app->CouppleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_CouppleID" class="patient_app_CouppleID">
<span<?php echo $patient_app->CouppleID->viewAttributes() ?>>
<?php echo $patient_app->CouppleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->MaleID->Visible) { // MaleID ?>
		<td data-name="MaleID"<?php echo $patient_app->MaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_MaleID" class="patient_app_MaleID">
<span<?php echo $patient_app->MaleID->viewAttributes() ?>>
<?php echo $patient_app->MaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->FemaleID->Visible) { // FemaleID ?>
		<td data-name="FemaleID"<?php echo $patient_app->FemaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_FemaleID" class="patient_app_FemaleID">
<span<?php echo $patient_app->FemaleID->viewAttributes() ?>>
<?php echo $patient_app->FemaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID"<?php echo $patient_app->GroupID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_GroupID" class="patient_app_GroupID">
<span<?php echo $patient_app->GroupID->viewAttributes() ?>>
<?php echo $patient_app->GroupID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_app->Relationship->Visible) { // Relationship ?>
		<td data-name="Relationship"<?php echo $patient_app->Relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_app_list->RowCnt ?>_patient_app_Relationship" class="patient_app_Relationship">
<span<?php echo $patient_app->Relationship->viewAttributes() ?>>
<?php echo $patient_app->Relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_app_list->ListOptions->render("body", "right", $patient_app_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_app->isGridAdd())
		$patient_app_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_app->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_app_list->Recordset)
	$patient_app_list->Recordset->Close();
?>
<?php if (!$patient_app->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_app->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_app_list->Pager)) $patient_app_list->Pager = new NumericPager($patient_app_list->StartRec, $patient_app_list->DisplayRecs, $patient_app_list->TotalRecs, $patient_app_list->RecRange, $patient_app_list->AutoHidePager) ?>
<?php if ($patient_app_list->Pager->RecordCount > 0 && $patient_app_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_app_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_app_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_app_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_app_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_app_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_app_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_app_list->pageUrl() ?>start=<?php echo $patient_app_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_app_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_app_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_app_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_app_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_app_list->TotalRecs > 0 && (!$patient_app_list->AutoHidePageSizeSelector || $patient_app_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_app">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_app_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_app_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_app_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_app_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_app_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_app_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_app->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_app_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_app_list->TotalRecs == 0 && !$patient_app->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_app_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_app_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_app->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_app->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_app", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_app_list->terminate();
?>