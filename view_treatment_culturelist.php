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
$view_treatment_culture_list = new view_treatment_culture_list();

// Run the page
$view_treatment_culture_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_treatment_culture_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_treatment_culture->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_treatment_culturelist = currentForm = new ew.Form("fview_treatment_culturelist", "list");
fview_treatment_culturelist.formKeyCountName = '<?php echo $view_treatment_culture_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_treatment_culturelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_treatment_culturelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

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
<?php if (!$view_treatment_culture->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_treatment_culture_list->TotalRecs > 0 && $view_treatment_culture_list->ExportOptions->visible()) { ?>
<?php $view_treatment_culture_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatment_culture_list->ImportOptions->visible()) { ?>
<?php $view_treatment_culture_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_treatment_culture_list->renderOtherOptions();
?>
<?php $view_treatment_culture_list->showPageHeader(); ?>
<?php
$view_treatment_culture_list->showMessage();
?>
<?php if ($view_treatment_culture_list->TotalRecs > 0 || $view_treatment_culture->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_treatment_culture_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_treatment_culture">
<?php if (!$view_treatment_culture->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_treatment_culture->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_treatment_culture_list->Pager)) $view_treatment_culture_list->Pager = new NumericPager($view_treatment_culture_list->StartRec, $view_treatment_culture_list->DisplayRecs, $view_treatment_culture_list->TotalRecs, $view_treatment_culture_list->RecRange, $view_treatment_culture_list->AutoHidePager) ?>
<?php if ($view_treatment_culture_list->Pager->RecordCount > 0 && $view_treatment_culture_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_treatment_culture_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_treatment_culture_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_treatment_culture_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_treatment_culture_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_treatment_culture_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_treatment_culture_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_treatment_culture_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_treatment_culture_list->TotalRecs > 0 && (!$view_treatment_culture_list->AutoHidePageSizeSelector || $view_treatment_culture_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_treatment_culture">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_treatment_culture_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_treatment_culture_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_treatment_culture_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_treatment_culture_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_treatment_culture_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_treatment_culture_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_treatment_culture->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatment_culture_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_treatment_culturelist" id="fview_treatment_culturelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_treatment_culture_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_treatment_culture_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_treatment_culture">
<div id="gmp_view_treatment_culture" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_treatment_culture_list->TotalRecs > 0 || $view_treatment_culture->isGridEdit()) { ?>
<table id="tbl_view_treatment_culturelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_treatment_culture_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_treatment_culture_list->renderListOptions();

// Render list options (header, left)
$view_treatment_culture_list->ListOptions->render("header", "left");
?>
<?php if ($view_treatment_culture->TidNo->Visible) { // TidNo ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_treatment_culture->TidNo->headerCellClass() ?>"><div id="elh_view_treatment_culture_TidNo" class="view_treatment_culture_TidNo"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_treatment_culture->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->TidNo) ?>',1);"><div id="elh_view_treatment_culture_TidNo" class="view_treatment_culture_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->Day0OocyteStage) == "") { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $view_treatment_culture->Day0OocyteStage->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day0OocyteStage" class="view_treatment_culture_Day0OocyteStage"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->Day0OocyteStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day0OocyteStage" class="<?php echo $view_treatment_culture->Day0OocyteStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->Day0OocyteStage) ?>',1);"><div id="elh_view_treatment_culture_Day0OocyteStage" class="view_treatment_culture_Day0OocyteStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->Day0OocyteStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->Day0OocyteStage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->Day0OocyteStage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->Day1->Visible) { // Day1 ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->Day1) == "") { ?>
		<th data-name="Day1" class="<?php echo $view_treatment_culture->Day1->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day1" class="view_treatment_culture_Day1"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->Day1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1" class="<?php echo $view_treatment_culture->Day1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->Day1) ?>',1);"><div id="elh_view_treatment_culture_Day1" class="view_treatment_culture_Day1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->Day1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->Day1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->Day1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->Day2->Visible) { // Day2 ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->Day2) == "") { ?>
		<th data-name="Day2" class="<?php echo $view_treatment_culture->Day2->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day2" class="view_treatment_culture_Day2"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->Day2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2" class="<?php echo $view_treatment_culture->Day2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->Day2) ?>',1);"><div id="elh_view_treatment_culture_Day2" class="view_treatment_culture_Day2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->Day2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->Day2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->Day2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->Day3->Visible) { // Day3 ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->Day3) == "") { ?>
		<th data-name="Day3" class="<?php echo $view_treatment_culture->Day3->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day3" class="view_treatment_culture_Day3"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->Day3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3" class="<?php echo $view_treatment_culture->Day3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->Day3) ?>',1);"><div id="elh_view_treatment_culture_Day3" class="view_treatment_culture_Day3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->Day3->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->Day3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->Day3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->Day4->Visible) { // Day4 ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->Day4) == "") { ?>
		<th data-name="Day4" class="<?php echo $view_treatment_culture->Day4->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day4" class="view_treatment_culture_Day4"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->Day4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4" class="<?php echo $view_treatment_culture->Day4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->Day4) ?>',1);"><div id="elh_view_treatment_culture_Day4" class="view_treatment_culture_Day4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->Day4->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->Day4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->Day4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->Day5->Visible) { // Day5 ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->Day5) == "") { ?>
		<th data-name="Day5" class="<?php echo $view_treatment_culture->Day5->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day5" class="view_treatment_culture_Day5"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->Day5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5" class="<?php echo $view_treatment_culture->Day5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->Day5) ?>',1);"><div id="elh_view_treatment_culture_Day5" class="view_treatment_culture_Day5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->Day5->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->Day5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->Day5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->Day6->Visible) { // Day6 ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->Day6) == "") { ?>
		<th data-name="Day6" class="<?php echo $view_treatment_culture->Day6->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day6" class="view_treatment_culture_Day6"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->Day6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day6" class="<?php echo $view_treatment_culture->Day6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->Day6) ?>',1);"><div id="elh_view_treatment_culture_Day6" class="view_treatment_culture_Day6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->Day6->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->Day6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->Day6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->ET->Visible) { // ET ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->ET) == "") { ?>
		<th data-name="ET" class="<?php echo $view_treatment_culture->ET->headerCellClass() ?>"><div id="elh_view_treatment_culture_ET" class="view_treatment_culture_ET"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->ET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ET" class="<?php echo $view_treatment_culture->ET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->ET) ?>',1);"><div id="elh_view_treatment_culture_ET" class="view_treatment_culture_ET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->ET->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->ET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->ET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatment_culture->ETDate->Visible) { // ETDate ?>
	<?php if ($view_treatment_culture->sortUrl($view_treatment_culture->ETDate) == "") { ?>
		<th data-name="ETDate" class="<?php echo $view_treatment_culture->ETDate->headerCellClass() ?>"><div id="elh_view_treatment_culture_ETDate" class="view_treatment_culture_ETDate"><div class="ew-table-header-caption"><?php echo $view_treatment_culture->ETDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETDate" class="<?php echo $view_treatment_culture->ETDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatment_culture->SortUrl($view_treatment_culture->ETDate) ?>',1);"><div id="elh_view_treatment_culture_ETDate" class="view_treatment_culture_ETDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatment_culture->ETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatment_culture->ETDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatment_culture->ETDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_treatment_culture_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_treatment_culture->ExportAll && $view_treatment_culture->isExport()) {
	$view_treatment_culture_list->StopRec = $view_treatment_culture_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_treatment_culture_list->TotalRecs > $view_treatment_culture_list->StartRec + $view_treatment_culture_list->DisplayRecs - 1)
		$view_treatment_culture_list->StopRec = $view_treatment_culture_list->StartRec + $view_treatment_culture_list->DisplayRecs - 1;
	else
		$view_treatment_culture_list->StopRec = $view_treatment_culture_list->TotalRecs;
}
$view_treatment_culture_list->RecCnt = $view_treatment_culture_list->StartRec - 1;
if ($view_treatment_culture_list->Recordset && !$view_treatment_culture_list->Recordset->EOF) {
	$view_treatment_culture_list->Recordset->moveFirst();
	$selectLimit = $view_treatment_culture_list->UseSelectLimit;
	if (!$selectLimit && $view_treatment_culture_list->StartRec > 1)
		$view_treatment_culture_list->Recordset->move($view_treatment_culture_list->StartRec - 1);
} elseif (!$view_treatment_culture->AllowAddDeleteRow && $view_treatment_culture_list->StopRec == 0) {
	$view_treatment_culture_list->StopRec = $view_treatment_culture->GridAddRowCount;
}

// Initialize aggregate
$view_treatment_culture->RowType = ROWTYPE_AGGREGATEINIT;
$view_treatment_culture->resetAttributes();
$view_treatment_culture_list->renderRow();
while ($view_treatment_culture_list->RecCnt < $view_treatment_culture_list->StopRec) {
	$view_treatment_culture_list->RecCnt++;
	if ($view_treatment_culture_list->RecCnt >= $view_treatment_culture_list->StartRec) {
		$view_treatment_culture_list->RowCnt++;

		// Set up key count
		$view_treatment_culture_list->KeyCount = $view_treatment_culture_list->RowIndex;

		// Init row class and style
		$view_treatment_culture->resetAttributes();
		$view_treatment_culture->CssClass = "";
		if ($view_treatment_culture->isGridAdd()) {
		} else {
			$view_treatment_culture_list->loadRowValues($view_treatment_culture_list->Recordset); // Load row values
		}
		$view_treatment_culture->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_treatment_culture->RowAttrs = array_merge($view_treatment_culture->RowAttrs, array('data-rowindex'=>$view_treatment_culture_list->RowCnt, 'id'=>'r' . $view_treatment_culture_list->RowCnt . '_view_treatment_culture', 'data-rowtype'=>$view_treatment_culture->RowType));

		// Render row
		$view_treatment_culture_list->renderRow();

		// Render list options
		$view_treatment_culture_list->renderListOptions();
?>
	<tr<?php echo $view_treatment_culture->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_treatment_culture_list->ListOptions->render("body", "left", $view_treatment_culture_list->RowCnt);
?>
	<?php if ($view_treatment_culture->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_treatment_culture->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_TidNo" class="view_treatment_culture_TidNo">
<span<?php echo $view_treatment_culture->TidNo->viewAttributes() ?>>
<?php echo $view_treatment_culture->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
		<td data-name="Day0OocyteStage"<?php echo $view_treatment_culture->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_Day0OocyteStage" class="view_treatment_culture_Day0OocyteStage">
<span<?php echo $view_treatment_culture->Day0OocyteStage->viewAttributes() ?>>
<?php echo $view_treatment_culture->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->Day1->Visible) { // Day1 ?>
		<td data-name="Day1"<?php echo $view_treatment_culture->Day1->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_Day1" class="view_treatment_culture_Day1">
<span<?php echo $view_treatment_culture->Day1->viewAttributes() ?>>
<?php echo $view_treatment_culture->Day1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->Day2->Visible) { // Day2 ?>
		<td data-name="Day2"<?php echo $view_treatment_culture->Day2->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_Day2" class="view_treatment_culture_Day2">
<span<?php echo $view_treatment_culture->Day2->viewAttributes() ?>>
<?php echo $view_treatment_culture->Day2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->Day3->Visible) { // Day3 ?>
		<td data-name="Day3"<?php echo $view_treatment_culture->Day3->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_Day3" class="view_treatment_culture_Day3">
<span<?php echo $view_treatment_culture->Day3->viewAttributes() ?>>
<?php echo $view_treatment_culture->Day3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->Day4->Visible) { // Day4 ?>
		<td data-name="Day4"<?php echo $view_treatment_culture->Day4->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_Day4" class="view_treatment_culture_Day4">
<span<?php echo $view_treatment_culture->Day4->viewAttributes() ?>>
<?php echo $view_treatment_culture->Day4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->Day5->Visible) { // Day5 ?>
		<td data-name="Day5"<?php echo $view_treatment_culture->Day5->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_Day5" class="view_treatment_culture_Day5">
<span<?php echo $view_treatment_culture->Day5->viewAttributes() ?>>
<?php echo $view_treatment_culture->Day5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->Day6->Visible) { // Day6 ?>
		<td data-name="Day6"<?php echo $view_treatment_culture->Day6->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_Day6" class="view_treatment_culture_Day6">
<span<?php echo $view_treatment_culture->Day6->viewAttributes() ?>>
<?php echo $view_treatment_culture->Day6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->ET->Visible) { // ET ?>
		<td data-name="ET"<?php echo $view_treatment_culture->ET->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_ET" class="view_treatment_culture_ET">
<span<?php echo $view_treatment_culture->ET->viewAttributes() ?>>
<?php echo $view_treatment_culture->ET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatment_culture->ETDate->Visible) { // ETDate ?>
		<td data-name="ETDate"<?php echo $view_treatment_culture->ETDate->cellAttributes() ?>>
<span id="el<?php echo $view_treatment_culture_list->RowCnt ?>_view_treatment_culture_ETDate" class="view_treatment_culture_ETDate">
<span<?php echo $view_treatment_culture->ETDate->viewAttributes() ?>>
<?php echo $view_treatment_culture->ETDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_treatment_culture_list->ListOptions->render("body", "right", $view_treatment_culture_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_treatment_culture->isGridAdd())
		$view_treatment_culture_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_treatment_culture->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_treatment_culture_list->Recordset)
	$view_treatment_culture_list->Recordset->Close();
?>
<?php if (!$view_treatment_culture->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_treatment_culture->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_treatment_culture_list->Pager)) $view_treatment_culture_list->Pager = new NumericPager($view_treatment_culture_list->StartRec, $view_treatment_culture_list->DisplayRecs, $view_treatment_culture_list->TotalRecs, $view_treatment_culture_list->RecRange, $view_treatment_culture_list->AutoHidePager) ?>
<?php if ($view_treatment_culture_list->Pager->RecordCount > 0 && $view_treatment_culture_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_treatment_culture_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_treatment_culture_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_treatment_culture_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_treatment_culture_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatment_culture_list->pageUrl() ?>start=<?php echo $view_treatment_culture_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_treatment_culture_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_treatment_culture_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_treatment_culture_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_treatment_culture_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_treatment_culture_list->TotalRecs > 0 && (!$view_treatment_culture_list->AutoHidePageSizeSelector || $view_treatment_culture_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_treatment_culture">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_treatment_culture_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_treatment_culture_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_treatment_culture_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_treatment_culture_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_treatment_culture_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_treatment_culture_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_treatment_culture->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatment_culture_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_treatment_culture_list->TotalRecs == 0 && !$view_treatment_culture->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_treatment_culture_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_treatment_culture_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_treatment_culture->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_treatment_culture->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_treatment_culture", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_treatment_culture_list->terminate();
?>