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
$appointment_block_slot_list = new appointment_block_slot_list();

// Run the page
$appointment_block_slot_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_block_slot_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$appointment_block_slot->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fappointment_block_slotlist = currentForm = new ew.Form("fappointment_block_slotlist", "list");
fappointment_block_slotlist.formKeyCountName = '<?php echo $appointment_block_slot_list->FormKeyCountName ?>';

// Form_CustomValidate event
fappointment_block_slotlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_block_slotlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fappointment_block_slotlistsrch = currentSearchForm = new ew.Form("fappointment_block_slotlistsrch");

// Filters
fappointment_block_slotlistsrch.filterList = <?php echo $appointment_block_slot_list->getFilterList() ?>;
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
<?php if (!$appointment_block_slot->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($appointment_block_slot_list->TotalRecs > 0 && $appointment_block_slot_list->ExportOptions->visible()) { ?>
<?php $appointment_block_slot_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_block_slot_list->ImportOptions->visible()) { ?>
<?php $appointment_block_slot_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_block_slot_list->SearchOptions->visible()) { ?>
<?php $appointment_block_slot_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_block_slot_list->FilterOptions->visible()) { ?>
<?php $appointment_block_slot_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$appointment_block_slot_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$appointment_block_slot->isExport() && !$appointment_block_slot->CurrentAction) { ?>
<form name="fappointment_block_slotlistsrch" id="fappointment_block_slotlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($appointment_block_slot_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fappointment_block_slotlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_block_slot">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($appointment_block_slot_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($appointment_block_slot_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $appointment_block_slot_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($appointment_block_slot_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $appointment_block_slot_list->showPageHeader(); ?>
<?php
$appointment_block_slot_list->showMessage();
?>
<?php if ($appointment_block_slot_list->TotalRecs > 0 || $appointment_block_slot->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_block_slot_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_block_slot">
<?php if (!$appointment_block_slot->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$appointment_block_slot->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($appointment_block_slot_list->Pager)) $appointment_block_slot_list->Pager = new NumericPager($appointment_block_slot_list->StartRec, $appointment_block_slot_list->DisplayRecs, $appointment_block_slot_list->TotalRecs, $appointment_block_slot_list->RecRange, $appointment_block_slot_list->AutoHidePager) ?>
<?php if ($appointment_block_slot_list->Pager->RecordCount > 0 && $appointment_block_slot_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($appointment_block_slot_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($appointment_block_slot_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $appointment_block_slot_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($appointment_block_slot_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $appointment_block_slot_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $appointment_block_slot_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $appointment_block_slot_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($appointment_block_slot_list->TotalRecs > 0 && (!$appointment_block_slot_list->AutoHidePageSizeSelector || $appointment_block_slot_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="appointment_block_slot">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($appointment_block_slot_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($appointment_block_slot_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($appointment_block_slot_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($appointment_block_slot_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($appointment_block_slot_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($appointment_block_slot_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($appointment_block_slot->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_block_slot_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fappointment_block_slotlist" id="fappointment_block_slotlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_block_slot_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_block_slot_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<div id="gmp_appointment_block_slot" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($appointment_block_slot_list->TotalRecs > 0 || $appointment_block_slot->isGridEdit()) { ?>
<table id="tbl_appointment_block_slotlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_block_slot_list->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_block_slot_list->renderListOptions();

// Render list options (header, left)
$appointment_block_slot_list->ListOptions->render("header", "left");
?>
<?php if ($appointment_block_slot->id->Visible) { // id ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_block_slot->id->headerCellClass() ?>"><div id="elh_appointment_block_slot_id" class="appointment_block_slot_id"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_block_slot->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->id) ?>',1);"><div id="elh_appointment_block_slot_id" class="appointment_block_slot_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->Drid->Visible) { // Drid ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->Drid) == "") { ?>
		<th data-name="Drid" class="<?php echo $appointment_block_slot->Drid->headerCellClass() ?>"><div id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->Drid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drid" class="<?php echo $appointment_block_slot->Drid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->Drid) ?>',1);"><div id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->Drid->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->Drid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->Drid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->DrName->Visible) { // DrName ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $appointment_block_slot->DrName->headerCellClass() ?>"><div id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $appointment_block_slot->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->DrName) ?>',1);"><div id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->Details->Visible) { // Details ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $appointment_block_slot->Details->headerCellClass() ?>"><div id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $appointment_block_slot->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->Details) ?>',1);"><div id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->BlockType->Visible) { // BlockType ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->BlockType) == "") { ?>
		<th data-name="BlockType" class="<?php echo $appointment_block_slot->BlockType->headerCellClass() ?>"><div id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->BlockType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BlockType" class="<?php echo $appointment_block_slot->BlockType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->BlockType) ?>',1);"><div id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->BlockType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->BlockType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->BlockType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->FromDate->Visible) { // FromDate ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->FromDate) == "") { ?>
		<th data-name="FromDate" class="<?php echo $appointment_block_slot->FromDate->headerCellClass() ?>"><div id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->FromDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FromDate" class="<?php echo $appointment_block_slot->FromDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->FromDate) ?>',1);"><div id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->FromDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->FromDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->FromDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->ToDate->Visible) { // ToDate ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->ToDate) == "") { ?>
		<th data-name="ToDate" class="<?php echo $appointment_block_slot->ToDate->headerCellClass() ?>"><div id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->ToDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ToDate" class="<?php echo $appointment_block_slot->ToDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->ToDate) ?>',1);"><div id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->ToDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->ToDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->ToDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->FromTime->Visible) { // FromTime ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->FromTime) == "") { ?>
		<th data-name="FromTime" class="<?php echo $appointment_block_slot->FromTime->headerCellClass() ?>"><div id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->FromTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FromTime" class="<?php echo $appointment_block_slot->FromTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->FromTime) ?>',1);"><div id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->FromTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->FromTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->FromTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_block_slot->ToTime->Visible) { // ToTime ?>
	<?php if ($appointment_block_slot->sortUrl($appointment_block_slot->ToTime) == "") { ?>
		<th data-name="ToTime" class="<?php echo $appointment_block_slot->ToTime->headerCellClass() ?>"><div id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime"><div class="ew-table-header-caption"><?php echo $appointment_block_slot->ToTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ToTime" class="<?php echo $appointment_block_slot->ToTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_block_slot->SortUrl($appointment_block_slot->ToTime) ?>',1);"><div id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_block_slot->ToTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_block_slot->ToTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_block_slot->ToTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_block_slot_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appointment_block_slot->ExportAll && $appointment_block_slot->isExport()) {
	$appointment_block_slot_list->StopRec = $appointment_block_slot_list->TotalRecs;
} else {

	// Set the last record to display
	if ($appointment_block_slot_list->TotalRecs > $appointment_block_slot_list->StartRec + $appointment_block_slot_list->DisplayRecs - 1)
		$appointment_block_slot_list->StopRec = $appointment_block_slot_list->StartRec + $appointment_block_slot_list->DisplayRecs - 1;
	else
		$appointment_block_slot_list->StopRec = $appointment_block_slot_list->TotalRecs;
}
$appointment_block_slot_list->RecCnt = $appointment_block_slot_list->StartRec - 1;
if ($appointment_block_slot_list->Recordset && !$appointment_block_slot_list->Recordset->EOF) {
	$appointment_block_slot_list->Recordset->moveFirst();
	$selectLimit = $appointment_block_slot_list->UseSelectLimit;
	if (!$selectLimit && $appointment_block_slot_list->StartRec > 1)
		$appointment_block_slot_list->Recordset->move($appointment_block_slot_list->StartRec - 1);
} elseif (!$appointment_block_slot->AllowAddDeleteRow && $appointment_block_slot_list->StopRec == 0) {
	$appointment_block_slot_list->StopRec = $appointment_block_slot->GridAddRowCount;
}

// Initialize aggregate
$appointment_block_slot->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_block_slot->resetAttributes();
$appointment_block_slot_list->renderRow();
while ($appointment_block_slot_list->RecCnt < $appointment_block_slot_list->StopRec) {
	$appointment_block_slot_list->RecCnt++;
	if ($appointment_block_slot_list->RecCnt >= $appointment_block_slot_list->StartRec) {
		$appointment_block_slot_list->RowCnt++;

		// Set up key count
		$appointment_block_slot_list->KeyCount = $appointment_block_slot_list->RowIndex;

		// Init row class and style
		$appointment_block_slot->resetAttributes();
		$appointment_block_slot->CssClass = "";
		if ($appointment_block_slot->isGridAdd()) {
		} else {
			$appointment_block_slot_list->loadRowValues($appointment_block_slot_list->Recordset); // Load row values
		}
		$appointment_block_slot->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appointment_block_slot->RowAttrs = array_merge($appointment_block_slot->RowAttrs, array('data-rowindex'=>$appointment_block_slot_list->RowCnt, 'id'=>'r' . $appointment_block_slot_list->RowCnt . '_appointment_block_slot', 'data-rowtype'=>$appointment_block_slot->RowType));

		// Render row
		$appointment_block_slot_list->renderRow();

		// Render list options
		$appointment_block_slot_list->renderListOptions();
?>
	<tr<?php echo $appointment_block_slot->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_block_slot_list->ListOptions->render("body", "left", $appointment_block_slot_list->RowCnt);
?>
	<?php if ($appointment_block_slot->id->Visible) { // id ?>
		<td data-name="id"<?php echo $appointment_block_slot->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_id" class="appointment_block_slot_id">
<span<?php echo $appointment_block_slot->id->viewAttributes() ?>>
<?php echo $appointment_block_slot->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->Drid->Visible) { // Drid ?>
		<td data-name="Drid"<?php echo $appointment_block_slot->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_Drid" class="appointment_block_slot_Drid">
<span<?php echo $appointment_block_slot->Drid->viewAttributes() ?>>
<?php echo $appointment_block_slot->Drid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $appointment_block_slot->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_DrName" class="appointment_block_slot_DrName">
<span<?php echo $appointment_block_slot->DrName->viewAttributes() ?>>
<?php echo $appointment_block_slot->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $appointment_block_slot->Details->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_Details" class="appointment_block_slot_Details">
<span<?php echo $appointment_block_slot->Details->viewAttributes() ?>>
<?php echo $appointment_block_slot->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->BlockType->Visible) { // BlockType ?>
		<td data-name="BlockType"<?php echo $appointment_block_slot->BlockType->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType">
<span<?php echo $appointment_block_slot->BlockType->viewAttributes() ?>>
<?php echo $appointment_block_slot->BlockType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->FromDate->Visible) { // FromDate ?>
		<td data-name="FromDate"<?php echo $appointment_block_slot->FromDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate">
<span<?php echo $appointment_block_slot->FromDate->viewAttributes() ?>>
<?php echo $appointment_block_slot->FromDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->ToDate->Visible) { // ToDate ?>
		<td data-name="ToDate"<?php echo $appointment_block_slot->ToDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate">
<span<?php echo $appointment_block_slot->ToDate->viewAttributes() ?>>
<?php echo $appointment_block_slot->ToDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->FromTime->Visible) { // FromTime ?>
		<td data-name="FromTime"<?php echo $appointment_block_slot->FromTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime">
<span<?php echo $appointment_block_slot->FromTime->viewAttributes() ?>>
<?php echo $appointment_block_slot->FromTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_block_slot->ToTime->Visible) { // ToTime ?>
		<td data-name="ToTime"<?php echo $appointment_block_slot->ToTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_list->RowCnt ?>_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime">
<span<?php echo $appointment_block_slot->ToTime->viewAttributes() ?>>
<?php echo $appointment_block_slot->ToTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_block_slot_list->ListOptions->render("body", "right", $appointment_block_slot_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$appointment_block_slot->isGridAdd())
		$appointment_block_slot_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$appointment_block_slot->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_block_slot_list->Recordset)
	$appointment_block_slot_list->Recordset->Close();
?>
<?php if (!$appointment_block_slot->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$appointment_block_slot->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($appointment_block_slot_list->Pager)) $appointment_block_slot_list->Pager = new NumericPager($appointment_block_slot_list->StartRec, $appointment_block_slot_list->DisplayRecs, $appointment_block_slot_list->TotalRecs, $appointment_block_slot_list->RecRange, $appointment_block_slot_list->AutoHidePager) ?>
<?php if ($appointment_block_slot_list->Pager->RecordCount > 0 && $appointment_block_slot_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($appointment_block_slot_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($appointment_block_slot_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $appointment_block_slot_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($appointment_block_slot_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_block_slot_list->pageUrl() ?>start=<?php echo $appointment_block_slot_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($appointment_block_slot_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $appointment_block_slot_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $appointment_block_slot_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $appointment_block_slot_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($appointment_block_slot_list->TotalRecs > 0 && (!$appointment_block_slot_list->AutoHidePageSizeSelector || $appointment_block_slot_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="appointment_block_slot">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($appointment_block_slot_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($appointment_block_slot_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($appointment_block_slot_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($appointment_block_slot_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($appointment_block_slot_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($appointment_block_slot_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($appointment_block_slot->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_block_slot_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_block_slot_list->TotalRecs == 0 && !$appointment_block_slot->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_block_slot_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$appointment_block_slot_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$appointment_block_slot->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$appointment_block_slot->isExport()) { ?>
<script>
ew.scrollableTable("gmp_appointment_block_slot", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$appointment_block_slot_list->terminate();
?>