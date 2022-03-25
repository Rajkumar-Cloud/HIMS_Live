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
$patient_room_list = new patient_room_list();

// Run the page
$patient_room_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_room->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_roomlist = currentForm = new ew.Form("fpatient_roomlist", "list");
fpatient_roomlist.formKeyCountName = '<?php echo $patient_room_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_roomlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_roomlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_roomlist.lists["x_Reception"] = <?php echo $patient_room_list->Reception->Lookup->toClientList() ?>;
fpatient_roomlist.lists["x_Reception"].options = <?php echo JsonEncode($patient_room_list->Reception->lookupOptions()) ?>;
fpatient_roomlist.lists["x_RoomID"] = <?php echo $patient_room_list->RoomID->Lookup->toClientList() ?>;
fpatient_roomlist.lists["x_RoomID"].options = <?php echo JsonEncode($patient_room_list->RoomID->lookupOptions()) ?>;

// Form object for search
var fpatient_roomlistsrch = currentSearchForm = new ew.Form("fpatient_roomlistsrch");

// Filters
fpatient_roomlistsrch.filterList = <?php echo $patient_room_list->getFilterList() ?>;
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
<?php if (!$patient_room->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_room_list->TotalRecs > 0 && $patient_room_list->ExportOptions->visible()) { ?>
<?php $patient_room_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_room_list->ImportOptions->visible()) { ?>
<?php $patient_room_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_room_list->SearchOptions->visible()) { ?>
<?php $patient_room_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_room_list->FilterOptions->visible()) { ?>
<?php $patient_room_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_room->isExport() || EXPORT_MASTER_RECORD && $patient_room->isExport("print")) { ?>
<?php
if ($patient_room_list->DbMasterFilter <> "" && $patient_room->getCurrentMasterTable() == "ip_admission") {
	if ($patient_room_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_room_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_room->isExport() && !$patient_room->CurrentAction) { ?>
<form name="fpatient_roomlistsrch" id="fpatient_roomlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_room_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_roomlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_room">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_room_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_room_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_room_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_room_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_room_list->showPageHeader(); ?>
<?php
$patient_room_list->showMessage();
?>
<?php if ($patient_room_list->TotalRecs > 0 || $patient_room->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_room_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_room">
<?php if (!$patient_room->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_room->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_room_list->Pager)) $patient_room_list->Pager = new NumericPager($patient_room_list->StartRec, $patient_room_list->DisplayRecs, $patient_room_list->TotalRecs, $patient_room_list->RecRange, $patient_room_list->AutoHidePager) ?>
<?php if ($patient_room_list->Pager->RecordCount > 0 && $patient_room_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_room_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_room_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_room_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_room_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_room_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_room_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_room_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_room_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_room_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_room_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_room_list->TotalRecs > 0 && (!$patient_room_list->AutoHidePageSizeSelector || $patient_room_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_room">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_room_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_room_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_room_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_room_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_room_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_room_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_room->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_room_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_roomlist" id="fpatient_roomlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_room_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_room_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<?php if ($patient_room->getCurrentMasterTable() == "ip_admission" && $patient_room->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_room->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_room->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_room->PatID->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_room" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_room_list->TotalRecs > 0 || $patient_room->isGridEdit()) { ?>
<table id="tbl_patient_roomlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_room_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_room_list->renderListOptions();

// Render list options (header, left)
$patient_room_list->ListOptions->render("header", "left");
?>
<?php if ($patient_room->id->Visible) { // id ?>
	<?php if ($patient_room->sortUrl($patient_room->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_room->id->headerCellClass() ?>"><div id="elh_patient_room_id" class="patient_room_id"><div class="ew-table-header-caption"><?php echo $patient_room->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_room->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->id) ?>',1);"><div id="elh_patient_room_id" class="patient_room_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Reception->Visible) { // Reception ?>
	<?php if ($patient_room->sortUrl($patient_room->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_room->Reception->headerCellClass() ?>"><div id="elh_patient_room_Reception" class="patient_room_Reception"><div class="ew-table-header-caption"><?php echo $patient_room->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_room->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->Reception) ?>',1);"><div id="elh_patient_room_Reception" class="patient_room_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_room->sortUrl($patient_room->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_room->PatientId->headerCellClass() ?>"><div id="elh_patient_room_PatientId" class="patient_room_PatientId"><div class="ew-table-header-caption"><?php echo $patient_room->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_room->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->PatientId) ?>',1);"><div id="elh_patient_room_PatientId" class="patient_room_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_room->sortUrl($patient_room->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_room->mrnno->headerCellClass() ?>"><div id="elh_patient_room_mrnno" class="patient_room_mrnno"><div class="ew-table-header-caption"><?php echo $patient_room->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_room->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->mrnno) ?>',1);"><div id="elh_patient_room_mrnno" class="patient_room_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_room->sortUrl($patient_room->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_room->PatientName->headerCellClass() ?>"><div id="elh_patient_room_PatientName" class="patient_room_PatientName"><div class="ew-table-header-caption"><?php echo $patient_room->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_room->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->PatientName) ?>',1);"><div id="elh_patient_room_PatientName" class="patient_room_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
	<?php if ($patient_room->sortUrl($patient_room->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_room->Gender->headerCellClass() ?>"><div id="elh_patient_room_Gender" class="patient_room_Gender"><div class="ew-table-header-caption"><?php echo $patient_room->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_room->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->Gender) ?>',1);"><div id="elh_patient_room_Gender" class="patient_room_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
	<?php if ($patient_room->sortUrl($patient_room->RoomID) == "") { ?>
		<th data-name="RoomID" class="<?php echo $patient_room->RoomID->headerCellClass() ?>"><div id="elh_patient_room_RoomID" class="patient_room_RoomID"><div class="ew-table-header-caption"><?php echo $patient_room->RoomID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomID" class="<?php echo $patient_room->RoomID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->RoomID) ?>',1);"><div id="elh_patient_room_RoomID" class="patient_room_RoomID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->RoomID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->RoomID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->RoomID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
	<?php if ($patient_room->sortUrl($patient_room->RoomNo) == "") { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room->RoomNo->headerCellClass() ?>"><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><div class="ew-table-header-caption"><?php echo $patient_room->RoomNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room->RoomNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->RoomNo) ?>',1);"><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->RoomNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->RoomNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->RoomNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
	<?php if ($patient_room->sortUrl($patient_room->RoomType) == "") { ?>
		<th data-name="RoomType" class="<?php echo $patient_room->RoomType->headerCellClass() ?>"><div id="elh_patient_room_RoomType" class="patient_room_RoomType"><div class="ew-table-header-caption"><?php echo $patient_room->RoomType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomType" class="<?php echo $patient_room->RoomType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->RoomType) ?>',1);"><div id="elh_patient_room_RoomType" class="patient_room_RoomType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->RoomType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->RoomType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->RoomType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($patient_room->sortUrl($patient_room->SharingRoom) == "") { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room->SharingRoom->headerCellClass() ?>"><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><div class="ew-table-header-caption"><?php echo $patient_room->SharingRoom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room->SharingRoom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->SharingRoom) ?>',1);"><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->SharingRoom->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->SharingRoom->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->SharingRoom->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
	<?php if ($patient_room->sortUrl($patient_room->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $patient_room->Amount->headerCellClass() ?>"><div id="elh_patient_room_Amount" class="patient_room_Amount"><div class="ew-table-header-caption"><?php echo $patient_room->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $patient_room->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->Amount) ?>',1);"><div id="elh_patient_room_Amount" class="patient_room_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->Startdatetime) == "") { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room->Startdatetime->headerCellClass() ?>"><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><div class="ew-table-header-caption"><?php echo $patient_room->Startdatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room->Startdatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->Startdatetime) ?>',1);"><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Startdatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Startdatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Startdatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->Enddatetime) == "") { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room->Enddatetime->headerCellClass() ?>"><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><div class="ew-table-header-caption"><?php echo $patient_room->Enddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room->Enddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->Enddatetime) ?>',1);"><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Enddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Enddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Enddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
	<?php if ($patient_room->sortUrl($patient_room->DaysHours) == "") { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room->DaysHours->headerCellClass() ?>"><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><div class="ew-table-header-caption"><?php echo $patient_room->DaysHours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room->DaysHours->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->DaysHours) ?>',1);"><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->DaysHours->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->DaysHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->DaysHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
	<?php if ($patient_room->sortUrl($patient_room->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $patient_room->Days->headerCellClass() ?>"><div id="elh_patient_room_Days" class="patient_room_Days"><div class="ew-table-header-caption"><?php echo $patient_room->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $patient_room->Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->Days) ?>',1);"><div id="elh_patient_room_Days" class="patient_room_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Days->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
	<?php if ($patient_room->sortUrl($patient_room->Hours) == "") { ?>
		<th data-name="Hours" class="<?php echo $patient_room->Hours->headerCellClass() ?>"><div id="elh_patient_room_Hours" class="patient_room_Hours"><div class="ew-table-header-caption"><?php echo $patient_room->Hours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hours" class="<?php echo $patient_room->Hours->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->Hours) ?>',1);"><div id="elh_patient_room_Hours" class="patient_room_Hours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Hours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Hours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Hours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($patient_room->sortUrl($patient_room->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room->TotalAmount->headerCellClass() ?>"><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><div class="ew-table-header-caption"><?php echo $patient_room->TotalAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room->TotalAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->TotalAmount) ?>',1);"><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->TotalAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->TotalAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
	<?php if ($patient_room->sortUrl($patient_room->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_room->PatID->headerCellClass() ?>"><div id="elh_patient_room_PatID" class="patient_room_PatID"><div class="ew-table-header-caption"><?php echo $patient_room->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_room->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->PatID) ?>',1);"><div id="elh_patient_room_PatID" class="patient_room_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_room->sortUrl($patient_room->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room->MobileNumber->headerCellClass() ?>"><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_room->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->MobileNumber) ?>',1);"><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_room->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->HospID->Visible) { // HospID ?>
	<?php if ($patient_room->sortUrl($patient_room->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_room->HospID->headerCellClass() ?>"><div id="elh_patient_room_HospID" class="patient_room_HospID"><div class="ew-table-header-caption"><?php echo $patient_room->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_room->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->HospID) ?>',1);"><div id="elh_patient_room_HospID" class="patient_room_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
	<?php if ($patient_room->sortUrl($patient_room->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_room->status->headerCellClass() ?>"><div id="elh_patient_room_status" class="patient_room_status"><div class="ew-table-header-caption"><?php echo $patient_room->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_room->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->status) ?>',1);"><div id="elh_patient_room_status" class="patient_room_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->createdby->Visible) { // createdby ?>
	<?php if ($patient_room->sortUrl($patient_room->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_room->createdby->headerCellClass() ?>"><div id="elh_patient_room_createdby" class="patient_room_createdby"><div class="ew-table-header-caption"><?php echo $patient_room->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_room->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->createdby) ?>',1);"><div id="elh_patient_room_createdby" class="patient_room_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room->createddatetime->headerCellClass() ?>"><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_room->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->createddatetime) ?>',1);"><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_room->sortUrl($patient_room->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room->modifiedby->headerCellClass() ?>"><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_room->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->modifiedby) ?>',1);"><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_room->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_room->SortUrl($patient_room->modifieddatetime) ?>',1);"><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_room_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_room->ExportAll && $patient_room->isExport()) {
	$patient_room_list->StopRec = $patient_room_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_room_list->TotalRecs > $patient_room_list->StartRec + $patient_room_list->DisplayRecs - 1)
		$patient_room_list->StopRec = $patient_room_list->StartRec + $patient_room_list->DisplayRecs - 1;
	else
		$patient_room_list->StopRec = $patient_room_list->TotalRecs;
}
$patient_room_list->RecCnt = $patient_room_list->StartRec - 1;
if ($patient_room_list->Recordset && !$patient_room_list->Recordset->EOF) {
	$patient_room_list->Recordset->moveFirst();
	$selectLimit = $patient_room_list->UseSelectLimit;
	if (!$selectLimit && $patient_room_list->StartRec > 1)
		$patient_room_list->Recordset->move($patient_room_list->StartRec - 1);
} elseif (!$patient_room->AllowAddDeleteRow && $patient_room_list->StopRec == 0) {
	$patient_room_list->StopRec = $patient_room->GridAddRowCount;
}

// Initialize aggregate
$patient_room->RowType = ROWTYPE_AGGREGATEINIT;
$patient_room->resetAttributes();
$patient_room_list->renderRow();
while ($patient_room_list->RecCnt < $patient_room_list->StopRec) {
	$patient_room_list->RecCnt++;
	if ($patient_room_list->RecCnt >= $patient_room_list->StartRec) {
		$patient_room_list->RowCnt++;

		// Set up key count
		$patient_room_list->KeyCount = $patient_room_list->RowIndex;

		// Init row class and style
		$patient_room->resetAttributes();
		$patient_room->CssClass = "";
		if ($patient_room->isGridAdd()) {
		} else {
			$patient_room_list->loadRowValues($patient_room_list->Recordset); // Load row values
		}
		$patient_room->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_room->RowAttrs = array_merge($patient_room->RowAttrs, array('data-rowindex'=>$patient_room_list->RowCnt, 'id'=>'r' . $patient_room_list->RowCnt . '_patient_room', 'data-rowtype'=>$patient_room->RowType));

		// Render row
		$patient_room_list->renderRow();

		// Render list options
		$patient_room_list->renderListOptions();
?>
	<tr<?php echo $patient_room->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_list->ListOptions->render("body", "left", $patient_room_list->RowCnt);
?>
	<?php if ($patient_room->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_room->id->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_id" class="patient_room_id">
<span<?php echo $patient_room->id->viewAttributes() ?>>
<?php echo $patient_room->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_room->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_Reception" class="patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<?php echo $patient_room->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_room->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_PatientId" class="patient_room_PatientId">
<span<?php echo $patient_room->PatientId->viewAttributes() ?>>
<?php echo $patient_room->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_room->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_mrnno" class="patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<?php echo $patient_room->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_room->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_PatientName" class="patient_room_PatientName">
<span<?php echo $patient_room->PatientName->viewAttributes() ?>>
<?php echo $patient_room->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_room->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_Gender" class="patient_room_Gender">
<span<?php echo $patient_room->Gender->viewAttributes() ?>>
<?php echo $patient_room->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
		<td data-name="RoomID"<?php echo $patient_room->RoomID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_RoomID" class="patient_room_RoomID">
<span<?php echo $patient_room->RoomID->viewAttributes() ?>>
<?php echo $patient_room->RoomID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo"<?php echo $patient_room->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_RoomNo" class="patient_room_RoomNo">
<span<?php echo $patient_room->RoomNo->viewAttributes() ?>>
<?php echo $patient_room->RoomNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType"<?php echo $patient_room->RoomType->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_RoomType" class="patient_room_RoomType">
<span<?php echo $patient_room->RoomType->viewAttributes() ?>>
<?php echo $patient_room->RoomType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom"<?php echo $patient_room->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_SharingRoom" class="patient_room_SharingRoom">
<span<?php echo $patient_room->SharingRoom->viewAttributes() ?>>
<?php echo $patient_room->SharingRoom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $patient_room->Amount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_Amount" class="patient_room_Amount">
<span<?php echo $patient_room->Amount->viewAttributes() ?>>
<?php echo $patient_room->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
		<td data-name="Startdatetime"<?php echo $patient_room->Startdatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_Startdatetime" class="patient_room_Startdatetime">
<span<?php echo $patient_room->Startdatetime->viewAttributes() ?>>
<?php echo $patient_room->Startdatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
		<td data-name="Enddatetime"<?php echo $patient_room->Enddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_Enddatetime" class="patient_room_Enddatetime">
<span<?php echo $patient_room->Enddatetime->viewAttributes() ?>>
<?php echo $patient_room->Enddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
		<td data-name="DaysHours"<?php echo $patient_room->DaysHours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_DaysHours" class="patient_room_DaysHours">
<span<?php echo $patient_room->DaysHours->viewAttributes() ?>>
<?php echo $patient_room->DaysHours->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->Days->Visible) { // Days ?>
		<td data-name="Days"<?php echo $patient_room->Days->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_Days" class="patient_room_Days">
<span<?php echo $patient_room->Days->viewAttributes() ?>>
<?php echo $patient_room->Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->Hours->Visible) { // Hours ?>
		<td data-name="Hours"<?php echo $patient_room->Hours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_Hours" class="patient_room_Hours">
<span<?php echo $patient_room->Hours->viewAttributes() ?>>
<?php echo $patient_room->Hours->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount"<?php echo $patient_room->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_TotalAmount" class="patient_room_TotalAmount">
<span<?php echo $patient_room->TotalAmount->viewAttributes() ?>>
<?php echo $patient_room->TotalAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_room->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_PatID" class="patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<?php echo $patient_room->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_room->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_MobileNumber" class="patient_room_MobileNumber">
<span<?php echo $patient_room->MobileNumber->viewAttributes() ?>>
<?php echo $patient_room->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_room->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_HospID" class="patient_room_HospID">
<span<?php echo $patient_room->HospID->viewAttributes() ?>>
<?php echo $patient_room->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_room->status->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_status" class="patient_room_status">
<span<?php echo $patient_room->status->viewAttributes() ?>>
<?php echo $patient_room->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_room->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_createdby" class="patient_room_createdby">
<span<?php echo $patient_room->createdby->viewAttributes() ?>>
<?php echo $patient_room->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_room->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_createddatetime" class="patient_room_createddatetime">
<span<?php echo $patient_room->createddatetime->viewAttributes() ?>>
<?php echo $patient_room->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_room->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_modifiedby" class="patient_room_modifiedby">
<span<?php echo $patient_room->modifiedby->viewAttributes() ?>>
<?php echo $patient_room->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_room->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_list->RowCnt ?>_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
<span<?php echo $patient_room->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_room->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_room_list->ListOptions->render("body", "right", $patient_room_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_room->isGridAdd())
		$patient_room_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_room->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_room_list->Recordset)
	$patient_room_list->Recordset->Close();
?>
<?php if (!$patient_room->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_room->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_room_list->Pager)) $patient_room_list->Pager = new NumericPager($patient_room_list->StartRec, $patient_room_list->DisplayRecs, $patient_room_list->TotalRecs, $patient_room_list->RecRange, $patient_room_list->AutoHidePager) ?>
<?php if ($patient_room_list->Pager->RecordCount > 0 && $patient_room_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_room_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_room_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_room_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_room_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_room_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_room_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_room_list->pageUrl() ?>start=<?php echo $patient_room_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_room_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_room_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_room_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_room_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_room_list->TotalRecs > 0 && (!$patient_room_list->AutoHidePageSizeSelector || $patient_room_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_room">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_room_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_room_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_room_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_room_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_room_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_room_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_room->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_room_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_room_list->TotalRecs == 0 && !$patient_room->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_room_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_room_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_room->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_room->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_room", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_room_list->terminate();
?>