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
$appointment_reminder_list = new appointment_reminder_list();

// Run the page
$appointment_reminder_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_reminder_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$appointment_reminder->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fappointment_reminderlist = currentForm = new ew.Form("fappointment_reminderlist", "list");
fappointment_reminderlist.formKeyCountName = '<?php echo $appointment_reminder_list->FormKeyCountName ?>';

// Form_CustomValidate event
fappointment_reminderlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_reminderlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fappointment_reminderlistsrch = currentSearchForm = new ew.Form("fappointment_reminderlistsrch");

// Filters
fappointment_reminderlistsrch.filterList = <?php echo $appointment_reminder_list->getFilterList() ?>;
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
<?php if (!$appointment_reminder->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($appointment_reminder_list->TotalRecs > 0 && $appointment_reminder_list->ExportOptions->visible()) { ?>
<?php $appointment_reminder_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_reminder_list->ImportOptions->visible()) { ?>
<?php $appointment_reminder_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_reminder_list->SearchOptions->visible()) { ?>
<?php $appointment_reminder_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_reminder_list->FilterOptions->visible()) { ?>
<?php $appointment_reminder_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$appointment_reminder_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$appointment_reminder->isExport() && !$appointment_reminder->CurrentAction) { ?>
<form name="fappointment_reminderlistsrch" id="fappointment_reminderlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($appointment_reminder_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fappointment_reminderlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_reminder">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($appointment_reminder_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($appointment_reminder_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $appointment_reminder_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($appointment_reminder_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $appointment_reminder_list->showPageHeader(); ?>
<?php
$appointment_reminder_list->showMessage();
?>
<?php if ($appointment_reminder_list->TotalRecs > 0 || $appointment_reminder->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_reminder_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_reminder">
<?php if (!$appointment_reminder->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$appointment_reminder->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($appointment_reminder_list->Pager)) $appointment_reminder_list->Pager = new NumericPager($appointment_reminder_list->StartRec, $appointment_reminder_list->DisplayRecs, $appointment_reminder_list->TotalRecs, $appointment_reminder_list->RecRange, $appointment_reminder_list->AutoHidePager) ?>
<?php if ($appointment_reminder_list->Pager->RecordCount > 0 && $appointment_reminder_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($appointment_reminder_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($appointment_reminder_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($appointment_reminder_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $appointment_reminder_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($appointment_reminder_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($appointment_reminder_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($appointment_reminder_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $appointment_reminder_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $appointment_reminder_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $appointment_reminder_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($appointment_reminder_list->TotalRecs > 0 && (!$appointment_reminder_list->AutoHidePageSizeSelector || $appointment_reminder_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="appointment_reminder">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($appointment_reminder_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($appointment_reminder_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($appointment_reminder_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($appointment_reminder_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($appointment_reminder_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($appointment_reminder_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($appointment_reminder->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_reminder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fappointment_reminderlist" id="fappointment_reminderlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_reminder_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_reminder_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<div id="gmp_appointment_reminder" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($appointment_reminder_list->TotalRecs > 0 || $appointment_reminder->isGridEdit()) { ?>
<table id="tbl_appointment_reminderlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_reminder_list->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_reminder_list->renderListOptions();

// Render list options (header, left)
$appointment_reminder_list->ListOptions->render("header", "left");
?>
<?php if ($appointment_reminder->id->Visible) { // id ?>
	<?php if ($appointment_reminder->sortUrl($appointment_reminder->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_reminder->id->headerCellClass() ?>"><div id="elh_appointment_reminder_id" class="appointment_reminder_id"><div class="ew-table-header-caption"><?php echo $appointment_reminder->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_reminder->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_reminder->SortUrl($appointment_reminder->id) ?>',1);"><div id="elh_appointment_reminder_id" class="appointment_reminder_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_reminder->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder->Drid->Visible) { // Drid ?>
	<?php if ($appointment_reminder->sortUrl($appointment_reminder->Drid) == "") { ?>
		<th data-name="Drid" class="<?php echo $appointment_reminder->Drid->headerCellClass() ?>"><div id="elh_appointment_reminder_Drid" class="appointment_reminder_Drid"><div class="ew-table-header-caption"><?php echo $appointment_reminder->Drid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drid" class="<?php echo $appointment_reminder->Drid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_reminder->SortUrl($appointment_reminder->Drid) ?>',1);"><div id="elh_appointment_reminder_Drid" class="appointment_reminder_Drid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder->Drid->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder->Drid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_reminder->Drid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder->DrName->Visible) { // DrName ?>
	<?php if ($appointment_reminder->sortUrl($appointment_reminder->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $appointment_reminder->DrName->headerCellClass() ?>"><div id="elh_appointment_reminder_DrName" class="appointment_reminder_DrName"><div class="ew-table-header-caption"><?php echo $appointment_reminder->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $appointment_reminder->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_reminder->SortUrl($appointment_reminder->DrName) ?>',1);"><div id="elh_appointment_reminder_DrName" class="appointment_reminder_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_reminder->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder->Duration->Visible) { // Duration ?>
	<?php if ($appointment_reminder->sortUrl($appointment_reminder->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $appointment_reminder->Duration->headerCellClass() ?>"><div id="elh_appointment_reminder_Duration" class="appointment_reminder_Duration"><div class="ew-table-header-caption"><?php echo $appointment_reminder->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $appointment_reminder->Duration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_reminder->SortUrl($appointment_reminder->Duration) ?>',1);"><div id="elh_appointment_reminder_Duration" class="appointment_reminder_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder->Duration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_reminder->Duration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder->Date->Visible) { // Date ?>
	<?php if ($appointment_reminder->sortUrl($appointment_reminder->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $appointment_reminder->Date->headerCellClass() ?>"><div id="elh_appointment_reminder_Date" class="appointment_reminder_Date"><div class="ew-table-header-caption"><?php echo $appointment_reminder->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $appointment_reminder->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_reminder->SortUrl($appointment_reminder->Date) ?>',1);"><div id="elh_appointment_reminder_Date" class="appointment_reminder_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_reminder->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder->SMSSend->Visible) { // SMSSend ?>
	<?php if ($appointment_reminder->sortUrl($appointment_reminder->SMSSend) == "") { ?>
		<th data-name="SMSSend" class="<?php echo $appointment_reminder->SMSSend->headerCellClass() ?>"><div id="elh_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend"><div class="ew-table-header-caption"><?php echo $appointment_reminder->SMSSend->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMSSend" class="<?php echo $appointment_reminder->SMSSend->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_reminder->SortUrl($appointment_reminder->SMSSend) ?>',1);"><div id="elh_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder->SMSSend->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder->SMSSend->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_reminder->SMSSend->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_reminder->EmailSend->Visible) { // EmailSend ?>
	<?php if ($appointment_reminder->sortUrl($appointment_reminder->EmailSend) == "") { ?>
		<th data-name="EmailSend" class="<?php echo $appointment_reminder->EmailSend->headerCellClass() ?>"><div id="elh_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend"><div class="ew-table-header-caption"><?php echo $appointment_reminder->EmailSend->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmailSend" class="<?php echo $appointment_reminder->EmailSend->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $appointment_reminder->SortUrl($appointment_reminder->EmailSend) ?>',1);"><div id="elh_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_reminder->EmailSend->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_reminder->EmailSend->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($appointment_reminder->EmailSend->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_reminder_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appointment_reminder->ExportAll && $appointment_reminder->isExport()) {
	$appointment_reminder_list->StopRec = $appointment_reminder_list->TotalRecs;
} else {

	// Set the last record to display
	if ($appointment_reminder_list->TotalRecs > $appointment_reminder_list->StartRec + $appointment_reminder_list->DisplayRecs - 1)
		$appointment_reminder_list->StopRec = $appointment_reminder_list->StartRec + $appointment_reminder_list->DisplayRecs - 1;
	else
		$appointment_reminder_list->StopRec = $appointment_reminder_list->TotalRecs;
}
$appointment_reminder_list->RecCnt = $appointment_reminder_list->StartRec - 1;
if ($appointment_reminder_list->Recordset && !$appointment_reminder_list->Recordset->EOF) {
	$appointment_reminder_list->Recordset->moveFirst();
	$selectLimit = $appointment_reminder_list->UseSelectLimit;
	if (!$selectLimit && $appointment_reminder_list->StartRec > 1)
		$appointment_reminder_list->Recordset->move($appointment_reminder_list->StartRec - 1);
} elseif (!$appointment_reminder->AllowAddDeleteRow && $appointment_reminder_list->StopRec == 0) {
	$appointment_reminder_list->StopRec = $appointment_reminder->GridAddRowCount;
}

// Initialize aggregate
$appointment_reminder->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_reminder->resetAttributes();
$appointment_reminder_list->renderRow();
while ($appointment_reminder_list->RecCnt < $appointment_reminder_list->StopRec) {
	$appointment_reminder_list->RecCnt++;
	if ($appointment_reminder_list->RecCnt >= $appointment_reminder_list->StartRec) {
		$appointment_reminder_list->RowCnt++;

		// Set up key count
		$appointment_reminder_list->KeyCount = $appointment_reminder_list->RowIndex;

		// Init row class and style
		$appointment_reminder->resetAttributes();
		$appointment_reminder->CssClass = "";
		if ($appointment_reminder->isGridAdd()) {
		} else {
			$appointment_reminder_list->loadRowValues($appointment_reminder_list->Recordset); // Load row values
		}
		$appointment_reminder->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appointment_reminder->RowAttrs = array_merge($appointment_reminder->RowAttrs, array('data-rowindex'=>$appointment_reminder_list->RowCnt, 'id'=>'r' . $appointment_reminder_list->RowCnt . '_appointment_reminder', 'data-rowtype'=>$appointment_reminder->RowType));

		// Render row
		$appointment_reminder_list->renderRow();

		// Render list options
		$appointment_reminder_list->renderListOptions();
?>
	<tr<?php echo $appointment_reminder->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_reminder_list->ListOptions->render("body", "left", $appointment_reminder_list->RowCnt);
?>
	<?php if ($appointment_reminder->id->Visible) { // id ?>
		<td data-name="id"<?php echo $appointment_reminder->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCnt ?>_appointment_reminder_id" class="appointment_reminder_id">
<span<?php echo $appointment_reminder->id->viewAttributes() ?>>
<?php echo $appointment_reminder->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder->Drid->Visible) { // Drid ?>
		<td data-name="Drid"<?php echo $appointment_reminder->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCnt ?>_appointment_reminder_Drid" class="appointment_reminder_Drid">
<span<?php echo $appointment_reminder->Drid->viewAttributes() ?>>
<?php echo $appointment_reminder->Drid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $appointment_reminder->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCnt ?>_appointment_reminder_DrName" class="appointment_reminder_DrName">
<span<?php echo $appointment_reminder->DrName->viewAttributes() ?>>
<?php echo $appointment_reminder->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder->Duration->Visible) { // Duration ?>
		<td data-name="Duration"<?php echo $appointment_reminder->Duration->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCnt ?>_appointment_reminder_Duration" class="appointment_reminder_Duration">
<span<?php echo $appointment_reminder->Duration->viewAttributes() ?>>
<?php echo $appointment_reminder->Duration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $appointment_reminder->Date->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCnt ?>_appointment_reminder_Date" class="appointment_reminder_Date">
<span<?php echo $appointment_reminder->Date->viewAttributes() ?>>
<?php echo $appointment_reminder->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder->SMSSend->Visible) { // SMSSend ?>
		<td data-name="SMSSend"<?php echo $appointment_reminder->SMSSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCnt ?>_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend">
<span<?php echo $appointment_reminder->SMSSend->viewAttributes() ?>>
<?php echo $appointment_reminder->SMSSend->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_reminder->EmailSend->Visible) { // EmailSend ?>
		<td data-name="EmailSend"<?php echo $appointment_reminder->EmailSend->cellAttributes() ?>>
<span id="el<?php echo $appointment_reminder_list->RowCnt ?>_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend">
<span<?php echo $appointment_reminder->EmailSend->viewAttributes() ?>>
<?php echo $appointment_reminder->EmailSend->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_reminder_list->ListOptions->render("body", "right", $appointment_reminder_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$appointment_reminder->isGridAdd())
		$appointment_reminder_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$appointment_reminder->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_reminder_list->Recordset)
	$appointment_reminder_list->Recordset->Close();
?>
<?php if (!$appointment_reminder->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$appointment_reminder->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($appointment_reminder_list->Pager)) $appointment_reminder_list->Pager = new NumericPager($appointment_reminder_list->StartRec, $appointment_reminder_list->DisplayRecs, $appointment_reminder_list->TotalRecs, $appointment_reminder_list->RecRange, $appointment_reminder_list->AutoHidePager) ?>
<?php if ($appointment_reminder_list->Pager->RecordCount > 0 && $appointment_reminder_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($appointment_reminder_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($appointment_reminder_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($appointment_reminder_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $appointment_reminder_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($appointment_reminder_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($appointment_reminder_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $appointment_reminder_list->pageUrl() ?>start=<?php echo $appointment_reminder_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($appointment_reminder_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $appointment_reminder_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $appointment_reminder_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $appointment_reminder_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($appointment_reminder_list->TotalRecs > 0 && (!$appointment_reminder_list->AutoHidePageSizeSelector || $appointment_reminder_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="appointment_reminder">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($appointment_reminder_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($appointment_reminder_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($appointment_reminder_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($appointment_reminder_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($appointment_reminder_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($appointment_reminder_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($appointment_reminder->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_reminder_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_reminder_list->TotalRecs == 0 && !$appointment_reminder->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_reminder_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$appointment_reminder_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$appointment_reminder->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$appointment_reminder->isExport()) { ?>
<script>
ew.scrollableTable("gmp_appointment_reminder", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$appointment_reminder_list->terminate();
?>