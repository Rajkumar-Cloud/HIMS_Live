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
$view_appointment_list = new view_appointment_list();

// Run the page
$view_appointment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_appointment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_appointmentlist = currentForm = new ew.Form("fview_appointmentlist", "list");
fview_appointmentlist.formKeyCountName = '<?php echo $view_appointment_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_appointmentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointmentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_appointmentlistsrch = currentSearchForm = new ew.Form("fview_appointmentlistsrch");

// Filters
fview_appointmentlistsrch.filterList = <?php echo $view_appointment_list->getFilterList() ?>;
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
<?php if (!$view_appointment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_appointment_list->TotalRecs > 0 && $view_appointment_list->ExportOptions->visible()) { ?>
<?php $view_appointment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_list->ImportOptions->visible()) { ?>
<?php $view_appointment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_list->SearchOptions->visible()) { ?>
<?php $view_appointment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_list->FilterOptions->visible()) { ?>
<?php $view_appointment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_appointment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_appointment->isExport() && !$view_appointment->CurrentAction) { ?>
<form name="fview_appointmentlistsrch" id="fview_appointmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_appointment_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_appointmentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_appointment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_appointment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_appointment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_appointment_list->showPageHeader(); ?>
<?php
$view_appointment_list->showMessage();
?>
<?php if ($view_appointment_list->TotalRecs > 0 || $view_appointment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_appointment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment">
<?php if (!$view_appointment->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_appointment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_appointment_list->Pager)) $view_appointment_list->Pager = new NumericPager($view_appointment_list->StartRec, $view_appointment_list->DisplayRecs, $view_appointment_list->TotalRecs, $view_appointment_list->RecRange, $view_appointment_list->AutoHidePager) ?>
<?php if ($view_appointment_list->Pager->RecordCount > 0 && $view_appointment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_appointment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_appointment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_appointment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_appointment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_appointment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_appointment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_appointment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_appointment_list->TotalRecs > 0 && (!$view_appointment_list->AutoHidePageSizeSelector || $view_appointment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_appointment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_appointment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_appointment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_appointment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_appointment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_appointment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_appointment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_appointment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_appointmentlist" id="fview_appointmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment">
<div id="gmp_view_appointment" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_appointment_list->TotalRecs > 0 || $view_appointment->isGridEdit()) { ?>
<table id="tbl_view_appointmentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_appointment_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_appointment_list->renderListOptions();

// Render list options (header, left)
$view_appointment_list->ListOptions->render("header", "left");
?>
<?php if ($view_appointment->PId->Visible) { // PId ?>
	<?php if ($view_appointment->sortUrl($view_appointment->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $view_appointment->PId->headerCellClass() ?>"><div id="elh_view_appointment_PId" class="view_appointment_PId"><div class="ew-table-header-caption"><?php echo $view_appointment->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $view_appointment->PId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->PId) ?>',1);"><div id="elh_view_appointment_PId" class="view_appointment_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->PId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->PId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment->patientID->Visible) { // patientID ?>
	<?php if ($view_appointment->sortUrl($view_appointment->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $view_appointment->patientID->headerCellClass() ?>"><div id="elh_view_appointment_patientID" class="view_appointment_patientID"><div class="ew-table-header-caption"><?php echo $view_appointment->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $view_appointment->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->patientID) ?>',1);"><div id="elh_view_appointment_patientID" class="view_appointment_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->patientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->patientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->patientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment->patientName->Visible) { // patientName ?>
	<?php if ($view_appointment->sortUrl($view_appointment->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $view_appointment->patientName->headerCellClass() ?>"><div id="elh_view_appointment_patientName" class="view_appointment_patientName"><div class="ew-table-header-caption"><?php echo $view_appointment->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $view_appointment->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->patientName) ?>',1);"><div id="elh_view_appointment_patientName" class="view_appointment_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->patientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->patientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($view_appointment->sortUrl($view_appointment->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_MobileNumber" class="view_appointment_MobileNumber"><div class="ew-table-header-caption"><?php echo $view_appointment->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->MobileNumber) ?>',1);"><div id="elh_view_appointment_MobileNumber" class="view_appointment_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment->Referal->Visible) { // Referal ?>
	<?php if ($view_appointment->sortUrl($view_appointment->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $view_appointment->Referal->headerCellClass() ?>"><div id="elh_view_appointment_Referal" class="view_appointment_Referal"><div class="ew-table-header-caption"><?php echo $view_appointment->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $view_appointment->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->Referal) ?>',1);"><div id="elh_view_appointment_Referal" class="view_appointment_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->Referal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->Referal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->Referal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($view_appointment->sortUrl($view_appointment->createdDateTime) == "") { ?>
		<th data-name="createdDateTime" class="<?php echo $view_appointment->createdDateTime->headerCellClass() ?>"><div id="elh_view_appointment_createdDateTime" class="view_appointment_createdDateTime"><div class="ew-table-header-caption"><?php echo $view_appointment->createdDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDateTime" class="<?php echo $view_appointment->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->createdDateTime) ?>',1);"><div id="elh_view_appointment_createdDateTime" class="view_appointment_createdDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->createdDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->createdDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment->App->Visible) { // App ?>
	<?php if ($view_appointment->sortUrl($view_appointment->App) == "") { ?>
		<th data-name="App" class="<?php echo $view_appointment->App->headerCellClass() ?>"><div id="elh_view_appointment_App" class="view_appointment_App"><div class="ew-table-header-caption"><?php echo $view_appointment->App->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="App" class="<?php echo $view_appointment->App->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->App) ?>',1);"><div id="elh_view_appointment_App" class="view_appointment_App">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->App->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->App->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->App->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment->HospID->Visible) { // HospID ?>
	<?php if ($view_appointment->sortUrl($view_appointment->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_appointment->HospID->headerCellClass() ?>"><div id="elh_view_appointment_HospID" class="view_appointment_HospID"><div class="ew-table-header-caption"><?php echo $view_appointment->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_appointment->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment->SortUrl($view_appointment->HospID) ?>',1);"><div id="elh_view_appointment_HospID" class="view_appointment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_appointment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_appointment->ExportAll && $view_appointment->isExport()) {
	$view_appointment_list->StopRec = $view_appointment_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_appointment_list->TotalRecs > $view_appointment_list->StartRec + $view_appointment_list->DisplayRecs - 1)
		$view_appointment_list->StopRec = $view_appointment_list->StartRec + $view_appointment_list->DisplayRecs - 1;
	else
		$view_appointment_list->StopRec = $view_appointment_list->TotalRecs;
}
$view_appointment_list->RecCnt = $view_appointment_list->StartRec - 1;
if ($view_appointment_list->Recordset && !$view_appointment_list->Recordset->EOF) {
	$view_appointment_list->Recordset->moveFirst();
	$selectLimit = $view_appointment_list->UseSelectLimit;
	if (!$selectLimit && $view_appointment_list->StartRec > 1)
		$view_appointment_list->Recordset->move($view_appointment_list->StartRec - 1);
} elseif (!$view_appointment->AllowAddDeleteRow && $view_appointment_list->StopRec == 0) {
	$view_appointment_list->StopRec = $view_appointment->GridAddRowCount;
}

// Initialize aggregate
$view_appointment->RowType = ROWTYPE_AGGREGATEINIT;
$view_appointment->resetAttributes();
$view_appointment_list->renderRow();
while ($view_appointment_list->RecCnt < $view_appointment_list->StopRec) {
	$view_appointment_list->RecCnt++;
	if ($view_appointment_list->RecCnt >= $view_appointment_list->StartRec) {
		$view_appointment_list->RowCnt++;

		// Set up key count
		$view_appointment_list->KeyCount = $view_appointment_list->RowIndex;

		// Init row class and style
		$view_appointment->resetAttributes();
		$view_appointment->CssClass = "";
		if ($view_appointment->isGridAdd()) {
		} else {
			$view_appointment_list->loadRowValues($view_appointment_list->Recordset); // Load row values
		}
		$view_appointment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_appointment->RowAttrs = array_merge($view_appointment->RowAttrs, array('data-rowindex'=>$view_appointment_list->RowCnt, 'id'=>'r' . $view_appointment_list->RowCnt . '_view_appointment', 'data-rowtype'=>$view_appointment->RowType));

		// Render row
		$view_appointment_list->renderRow();

		// Render list options
		$view_appointment_list->renderListOptions();
?>
	<tr<?php echo $view_appointment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_list->ListOptions->render("body", "left", $view_appointment_list->RowCnt);
?>
	<?php if ($view_appointment->PId->Visible) { // PId ?>
		<td data-name="PId"<?php echo $view_appointment->PId->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_PId" class="view_appointment_PId">
<span<?php echo $view_appointment->PId->viewAttributes() ?>>
<?php echo $view_appointment->PId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment->patientID->Visible) { // patientID ?>
		<td data-name="patientID"<?php echo $view_appointment->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_patientID" class="view_appointment_patientID">
<span<?php echo $view_appointment->patientID->viewAttributes() ?>>
<?php echo $view_appointment->patientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment->patientName->Visible) { // patientName ?>
		<td data-name="patientName"<?php echo $view_appointment->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_patientName" class="view_appointment_patientName">
<span<?php echo $view_appointment->patientName->viewAttributes() ?>>
<?php echo $view_appointment->patientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $view_appointment->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_MobileNumber" class="view_appointment_MobileNumber">
<span<?php echo $view_appointment->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment->Referal->Visible) { // Referal ?>
		<td data-name="Referal"<?php echo $view_appointment->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_Referal" class="view_appointment_Referal">
<span<?php echo $view_appointment->Referal->viewAttributes() ?>>
<?php echo $view_appointment->Referal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime"<?php echo $view_appointment->createdDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_createdDateTime" class="view_appointment_createdDateTime">
<span<?php echo $view_appointment->createdDateTime->viewAttributes() ?>>
<?php echo $view_appointment->createdDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment->App->Visible) { // App ?>
		<td data-name="App"<?php echo $view_appointment->App->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_App" class="view_appointment_App">
<span<?php echo $view_appointment->App->viewAttributes() ?>>
<?php echo $view_appointment->App->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_appointment->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_appointment->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_appointment_list->RowCnt ?>_view_appointment_HospID" class="view_appointment_HospID">
<span<?php echo $view_appointment->HospID->viewAttributes() ?>>
<?php echo $view_appointment->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_list->ListOptions->render("body", "right", $view_appointment_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_appointment->isGridAdd())
		$view_appointment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_appointment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_appointment_list->Recordset)
	$view_appointment_list->Recordset->Close();
?>
<?php if (!$view_appointment->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_appointment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_appointment_list->Pager)) $view_appointment_list->Pager = new NumericPager($view_appointment_list->StartRec, $view_appointment_list->DisplayRecs, $view_appointment_list->TotalRecs, $view_appointment_list->RecRange, $view_appointment_list->AutoHidePager) ?>
<?php if ($view_appointment_list->Pager->RecordCount > 0 && $view_appointment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_appointment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_appointment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_appointment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_list->pageUrl() ?>start=<?php echo $view_appointment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_appointment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_appointment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_appointment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_appointment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_appointment_list->TotalRecs > 0 && (!$view_appointment_list->AutoHidePageSizeSelector || $view_appointment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_appointment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_appointment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_appointment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_appointment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_appointment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_appointment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_appointment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_appointment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_appointment_list->TotalRecs == 0 && !$view_appointment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_appointment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_appointment_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_appointment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_appointment->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_appointment", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_appointment_list->terminate();
?>