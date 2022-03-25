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
$vitals_list = new vitals_list();

// Run the page
$vitals_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vitals_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$vitals->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fvitalslist = currentForm = new ew.Form("fvitalslist", "list");
fvitalslist.formKeyCountName = '<?php echo $vitals_list->FormKeyCountName ?>';

// Form_CustomValidate event
fvitalslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvitalslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fvitalslistsrch = currentSearchForm = new ew.Form("fvitalslistsrch");

// Filters
fvitalslistsrch.filterList = <?php echo $vitals_list->getFilterList() ?>;
</script>
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
<?php if (!$vitals->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($vitals_list->TotalRecs > 0 && $vitals_list->ExportOptions->visible()) { ?>
<?php $vitals_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($vitals_list->ImportOptions->visible()) { ?>
<?php $vitals_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($vitals_list->SearchOptions->visible()) { ?>
<?php $vitals_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($vitals_list->FilterOptions->visible()) { ?>
<?php $vitals_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$vitals->isExport() || EXPORT_MASTER_RECORD && $vitals->isExport("print")) { ?>
<?php
if ($vitals_list->DbMasterFilter <> "" && $vitals->getCurrentMasterTable() == "reception") {
	if ($vitals_list->MasterRecordExists) {
		include_once "receptionmaster.php";
	}
}
?>
<?php } ?>
<?php
$vitals_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$vitals->isExport() && !$vitals->CurrentAction) { ?>
<form name="fvitalslistsrch" id="fvitalslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($vitals_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fvitalslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="vitals">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($vitals_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($vitals_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $vitals_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($vitals_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($vitals_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($vitals_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($vitals_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $vitals_list->showPageHeader(); ?>
<?php
$vitals_list->showMessage();
?>
<?php if ($vitals_list->TotalRecs > 0 || $vitals->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($vitals_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> vitals">
<?php if (!$vitals->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$vitals->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($vitals_list->Pager)) $vitals_list->Pager = new NumericPager($vitals_list->StartRec, $vitals_list->DisplayRecs, $vitals_list->TotalRecs, $vitals_list->RecRange, $vitals_list->AutoHidePager) ?>
<?php if ($vitals_list->Pager->RecordCount > 0 && $vitals_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($vitals_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($vitals_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($vitals_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $vitals_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($vitals_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($vitals_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($vitals_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $vitals_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $vitals_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $vitals_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($vitals_list->TotalRecs > 0 && (!$vitals_list->AutoHidePageSizeSelector || $vitals_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="vitals">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($vitals_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($vitals_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($vitals_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($vitals_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($vitals_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($vitals_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($vitals->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fvitalslist" id="fvitalslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($vitals_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $vitals_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vitals">
<?php if ($vitals->getCurrentMasterTable() == "reception" && $vitals->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="reception">
<input type="hidden" name="fk_PatientName" value="<?php echo $vitals->PatientName->getSessionValue() ?>">
<input type="hidden" name="fk_PatientID" value="<?php echo $vitals->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $vitals->Reception->getSessionValue() ?>">
<?php } ?>
<div id="gmp_vitals" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($vitals_list->TotalRecs > 0 || $vitals->isGridEdit()) { ?>
<table id="tbl_vitalslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$vitals_list->RowType = ROWTYPE_HEADER;

// Render list options
$vitals_list->renderListOptions();

// Render list options (header, left)
$vitals_list->ListOptions->render("header", "left");
?>
<?php if ($vitals->id->Visible) { // id ?>
	<?php if ($vitals->sortUrl($vitals->id) == "") { ?>
		<th data-name="id" class="<?php echo $vitals->id->headerCellClass() ?>"><div id="elh_vitals_id" class="vitals_id"><div class="ew-table-header-caption"><?php echo $vitals->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $vitals->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->id) ?>',1);"><div id="elh_vitals_id" class="vitals_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
	<?php if ($vitals->sortUrl($vitals->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $vitals->Reception->headerCellClass() ?>"><div id="elh_vitals_Reception" class="vitals_Reception"><div class="ew-table-header-caption"><?php echo $vitals->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $vitals->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->Reception) ?>',1);"><div id="elh_vitals_Reception" class="vitals_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($vitals->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
	<?php if ($vitals->sortUrl($vitals->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $vitals->PatientId->headerCellClass() ?>"><div id="elh_vitals_PatientId" class="vitals_PatientId"><div class="ew-table-header-caption"><?php echo $vitals->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $vitals->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->PatientId) ?>',1);"><div id="elh_vitals_PatientId" class="vitals_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vitals->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
	<?php if ($vitals->sortUrl($vitals->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $vitals->PatientName->headerCellClass() ?>"><div id="elh_vitals_PatientName" class="vitals_PatientName"><div class="ew-table-header-caption"><?php echo $vitals->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $vitals->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->PatientName) ?>',1);"><div id="elh_vitals_PatientName" class="vitals_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vitals->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
	<?php if ($vitals->sortUrl($vitals->HT) == "") { ?>
		<th data-name="HT" class="<?php echo $vitals->HT->headerCellClass() ?>"><div id="elh_vitals_HT" class="vitals_HT"><div class="ew-table-header-caption"><?php echo $vitals->HT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HT" class="<?php echo $vitals->HT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->HT) ?>',1);"><div id="elh_vitals_HT" class="vitals_HT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->HT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vitals->HT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->HT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
	<?php if ($vitals->sortUrl($vitals->WT) == "") { ?>
		<th data-name="WT" class="<?php echo $vitals->WT->headerCellClass() ?>"><div id="elh_vitals_WT" class="vitals_WT"><div class="ew-table-header-caption"><?php echo $vitals->WT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WT" class="<?php echo $vitals->WT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->WT) ?>',1);"><div id="elh_vitals_WT" class="vitals_WT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->WT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vitals->WT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->WT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
	<?php if ($vitals->sortUrl($vitals->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $vitals->BP->headerCellClass() ?>"><div id="elh_vitals_BP" class="vitals_BP"><div class="ew-table-header-caption"><?php echo $vitals->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $vitals->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->BP) ?>',1);"><div id="elh_vitals_BP" class="vitals_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vitals->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
	<?php if ($vitals->sortUrl($vitals->PULSE) == "") { ?>
		<th data-name="PULSE" class="<?php echo $vitals->PULSE->headerCellClass() ?>"><div id="elh_vitals_PULSE" class="vitals_PULSE"><div class="ew-table-header-caption"><?php echo $vitals->PULSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PULSE" class="<?php echo $vitals->PULSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $vitals->SortUrl($vitals->PULSE) ?>',1);"><div id="elh_vitals_PULSE" class="vitals_PULSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $vitals->PULSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($vitals->PULSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($vitals->PULSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$vitals_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($vitals->ExportAll && $vitals->isExport()) {
	$vitals_list->StopRec = $vitals_list->TotalRecs;
} else {

	// Set the last record to display
	if ($vitals_list->TotalRecs > $vitals_list->StartRec + $vitals_list->DisplayRecs - 1)
		$vitals_list->StopRec = $vitals_list->StartRec + $vitals_list->DisplayRecs - 1;
	else
		$vitals_list->StopRec = $vitals_list->TotalRecs;
}
$vitals_list->RecCnt = $vitals_list->StartRec - 1;
if ($vitals_list->Recordset && !$vitals_list->Recordset->EOF) {
	$vitals_list->Recordset->moveFirst();
	$selectLimit = $vitals_list->UseSelectLimit;
	if (!$selectLimit && $vitals_list->StartRec > 1)
		$vitals_list->Recordset->move($vitals_list->StartRec - 1);
} elseif (!$vitals->AllowAddDeleteRow && $vitals_list->StopRec == 0) {
	$vitals_list->StopRec = $vitals->GridAddRowCount;
}

// Initialize aggregate
$vitals->RowType = ROWTYPE_AGGREGATEINIT;
$vitals->resetAttributes();
$vitals_list->renderRow();
while ($vitals_list->RecCnt < $vitals_list->StopRec) {
	$vitals_list->RecCnt++;
	if ($vitals_list->RecCnt >= $vitals_list->StartRec) {
		$vitals_list->RowCnt++;

		// Set up key count
		$vitals_list->KeyCount = $vitals_list->RowIndex;

		// Init row class and style
		$vitals->resetAttributes();
		$vitals->CssClass = "";
		if ($vitals->isGridAdd()) {
		} else {
			$vitals_list->loadRowValues($vitals_list->Recordset); // Load row values
		}
		$vitals->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$vitals->RowAttrs = array_merge($vitals->RowAttrs, array('data-rowindex'=>$vitals_list->RowCnt, 'id'=>'r' . $vitals_list->RowCnt . '_vitals', 'data-rowtype'=>$vitals->RowType));

		// Render row
		$vitals_list->renderRow();

		// Render list options
		$vitals_list->renderListOptions();
?>
	<tr<?php echo $vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$vitals_list->ListOptions->render("body", "left", $vitals_list->RowCnt);
?>
	<?php if ($vitals->id->Visible) { // id ?>
		<td data-name="id"<?php echo $vitals->id->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_id" class="vitals_id">
<span<?php echo $vitals->id->viewAttributes() ?>>
<?php echo $vitals->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vitals->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $vitals->Reception->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_Reception" class="vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<?php echo $vitals->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vitals->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $vitals->PatientId->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_PatientId" class="vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<?php echo $vitals->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vitals->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $vitals->PatientName->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_PatientName" class="vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<?php echo $vitals->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vitals->HT->Visible) { // HT ?>
		<td data-name="HT"<?php echo $vitals->HT->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_HT" class="vitals_HT">
<span<?php echo $vitals->HT->viewAttributes() ?>>
<?php echo $vitals->HT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vitals->WT->Visible) { // WT ?>
		<td data-name="WT"<?php echo $vitals->WT->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_WT" class="vitals_WT">
<span<?php echo $vitals->WT->viewAttributes() ?>>
<?php echo $vitals->WT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vitals->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $vitals->BP->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_BP" class="vitals_BP">
<span<?php echo $vitals->BP->viewAttributes() ?>>
<?php echo $vitals->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($vitals->PULSE->Visible) { // PULSE ?>
		<td data-name="PULSE"<?php echo $vitals->PULSE->cellAttributes() ?>>
<span id="el<?php echo $vitals_list->RowCnt ?>_vitals_PULSE" class="vitals_PULSE">
<span<?php echo $vitals->PULSE->viewAttributes() ?>>
<?php echo $vitals->PULSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$vitals_list->ListOptions->render("body", "right", $vitals_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$vitals->isGridAdd())
		$vitals_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$vitals->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($vitals_list->Recordset)
	$vitals_list->Recordset->Close();
?>
<?php if (!$vitals->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$vitals->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($vitals_list->Pager)) $vitals_list->Pager = new NumericPager($vitals_list->StartRec, $vitals_list->DisplayRecs, $vitals_list->TotalRecs, $vitals_list->RecRange, $vitals_list->AutoHidePager) ?>
<?php if ($vitals_list->Pager->RecordCount > 0 && $vitals_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($vitals_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($vitals_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($vitals_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $vitals_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($vitals_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($vitals_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $vitals_list->pageUrl() ?>start=<?php echo $vitals_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($vitals_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $vitals_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $vitals_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $vitals_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($vitals_list->TotalRecs > 0 && (!$vitals_list->AutoHidePageSizeSelector || $vitals_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="vitals">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($vitals_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($vitals_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($vitals_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($vitals_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($vitals_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($vitals_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($vitals->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $vitals_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($vitals_list->TotalRecs == 0 && !$vitals->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$vitals_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$vitals->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$vitals_list->terminate();
?>