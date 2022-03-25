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
$ivf_semenan_medication_list = new ivf_semenan_medication_list();

// Run the page
$ivf_semenan_medication_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenan_medication_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_semenan_medicationlist = currentForm = new ew.Form("fivf_semenan_medicationlist", "list");
fivf_semenan_medicationlist.formKeyCountName = '<?php echo $ivf_semenan_medication_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_semenan_medicationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_semenan_medicationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fivf_semenan_medicationlistsrch = currentSearchForm = new ew.Form("fivf_semenan_medicationlistsrch");

// Filters
fivf_semenan_medicationlistsrch.filterList = <?php echo $ivf_semenan_medication_list->getFilterList() ?>;
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
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_semenan_medication_list->TotalRecs > 0 && $ivf_semenan_medication_list->ExportOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenan_medication_list->ImportOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenan_medication_list->SearchOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenan_medication_list->FilterOptions->visible()) { ?>
<?php $ivf_semenan_medication_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_semenan_medication_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_semenan_medication->isExport() && !$ivf_semenan_medication->CurrentAction) { ?>
<form name="fivf_semenan_medicationlistsrch" id="fivf_semenan_medicationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_semenan_medication_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_semenan_medicationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_semenan_medication">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_semenan_medication_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_semenan_medication_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_semenan_medication_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenan_medication_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_semenan_medication_list->showPageHeader(); ?>
<?php
$ivf_semenan_medication_list->showMessage();
?>
<?php if ($ivf_semenan_medication_list->TotalRecs > 0 || $ivf_semenan_medication->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_semenan_medication_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_semenan_medication">
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_semenan_medication->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_semenan_medication_list->Pager)) $ivf_semenan_medication_list->Pager = new NumericPager($ivf_semenan_medication_list->StartRec, $ivf_semenan_medication_list->DisplayRecs, $ivf_semenan_medication_list->TotalRecs, $ivf_semenan_medication_list->RecRange, $ivf_semenan_medication_list->AutoHidePager) ?>
<?php if ($ivf_semenan_medication_list->Pager->RecordCount > 0 && $ivf_semenan_medication_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_semenan_medication_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenan_medication_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_semenan_medication_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_semenan_medication_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenan_medication_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenan_medication_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_semenan_medication_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_semenan_medication_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_semenan_medication_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_semenan_medication_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_semenan_medication_list->TotalRecs > 0 && (!$ivf_semenan_medication_list->AutoHidePageSizeSelector || $ivf_semenan_medication_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_semenan_medication">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_semenan_medication_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_semenan_medication_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_semenan_medication_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_semenan_medication_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_semenan_medication_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_semenan_medication_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_semenan_medication->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenan_medication_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_semenan_medicationlist" id="fivf_semenan_medicationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_semenan_medication_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_semenan_medication_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenan_medication">
<div id="gmp_ivf_semenan_medication" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_semenan_medication_list->TotalRecs > 0 || $ivf_semenan_medication->isGridEdit()) { ?>
<table id="tbl_ivf_semenan_medicationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_semenan_medication_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_semenan_medication_list->renderListOptions();

// Render list options (header, left)
$ivf_semenan_medication_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenan_medication->id->Visible) { // id ?>
	<?php if ($ivf_semenan_medication->sortUrl($ivf_semenan_medication->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_semenan_medication->id->headerCellClass() ?>"><div id="elh_ivf_semenan_medication_id" class="ivf_semenan_medication_id"><div class="ew-table-header-caption"><?php echo $ivf_semenan_medication->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_semenan_medication->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenan_medication->SortUrl($ivf_semenan_medication->id) ?>',1);"><div id="elh_ivf_semenan_medication_id" class="ivf_semenan_medication_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenan_medication->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenan_medication->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenan_medication->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenan_medication->Medication->Visible) { // Medication ?>
	<?php if ($ivf_semenan_medication->sortUrl($ivf_semenan_medication->Medication) == "") { ?>
		<th data-name="Medication" class="<?php echo $ivf_semenan_medication->Medication->headerCellClass() ?>"><div id="elh_ivf_semenan_medication_Medication" class="ivf_semenan_medication_Medication"><div class="ew-table-header-caption"><?php echo $ivf_semenan_medication->Medication->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medication" class="<?php echo $ivf_semenan_medication->Medication->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenan_medication->SortUrl($ivf_semenan_medication->Medication) ?>',1);"><div id="elh_ivf_semenan_medication_Medication" class="ivf_semenan_medication_Medication">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenan_medication->Medication->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenan_medication->Medication->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenan_medication->Medication->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_semenan_medication_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_semenan_medication->ExportAll && $ivf_semenan_medication->isExport()) {
	$ivf_semenan_medication_list->StopRec = $ivf_semenan_medication_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_semenan_medication_list->TotalRecs > $ivf_semenan_medication_list->StartRec + $ivf_semenan_medication_list->DisplayRecs - 1)
		$ivf_semenan_medication_list->StopRec = $ivf_semenan_medication_list->StartRec + $ivf_semenan_medication_list->DisplayRecs - 1;
	else
		$ivf_semenan_medication_list->StopRec = $ivf_semenan_medication_list->TotalRecs;
}
$ivf_semenan_medication_list->RecCnt = $ivf_semenan_medication_list->StartRec - 1;
if ($ivf_semenan_medication_list->Recordset && !$ivf_semenan_medication_list->Recordset->EOF) {
	$ivf_semenan_medication_list->Recordset->moveFirst();
	$selectLimit = $ivf_semenan_medication_list->UseSelectLimit;
	if (!$selectLimit && $ivf_semenan_medication_list->StartRec > 1)
		$ivf_semenan_medication_list->Recordset->move($ivf_semenan_medication_list->StartRec - 1);
} elseif (!$ivf_semenan_medication->AllowAddDeleteRow && $ivf_semenan_medication_list->StopRec == 0) {
	$ivf_semenan_medication_list->StopRec = $ivf_semenan_medication->GridAddRowCount;
}

// Initialize aggregate
$ivf_semenan_medication->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_semenan_medication->resetAttributes();
$ivf_semenan_medication_list->renderRow();
while ($ivf_semenan_medication_list->RecCnt < $ivf_semenan_medication_list->StopRec) {
	$ivf_semenan_medication_list->RecCnt++;
	if ($ivf_semenan_medication_list->RecCnt >= $ivf_semenan_medication_list->StartRec) {
		$ivf_semenan_medication_list->RowCnt++;

		// Set up key count
		$ivf_semenan_medication_list->KeyCount = $ivf_semenan_medication_list->RowIndex;

		// Init row class and style
		$ivf_semenan_medication->resetAttributes();
		$ivf_semenan_medication->CssClass = "";
		if ($ivf_semenan_medication->isGridAdd()) {
		} else {
			$ivf_semenan_medication_list->loadRowValues($ivf_semenan_medication_list->Recordset); // Load row values
		}
		$ivf_semenan_medication->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_semenan_medication->RowAttrs = array_merge($ivf_semenan_medication->RowAttrs, array('data-rowindex'=>$ivf_semenan_medication_list->RowCnt, 'id'=>'r' . $ivf_semenan_medication_list->RowCnt . '_ivf_semenan_medication', 'data-rowtype'=>$ivf_semenan_medication->RowType));

		// Render row
		$ivf_semenan_medication_list->renderRow();

		// Render list options
		$ivf_semenan_medication_list->renderListOptions();
?>
	<tr<?php echo $ivf_semenan_medication->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenan_medication_list->ListOptions->render("body", "left", $ivf_semenan_medication_list->RowCnt);
?>
	<?php if ($ivf_semenan_medication->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_semenan_medication->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenan_medication_list->RowCnt ?>_ivf_semenan_medication_id" class="ivf_semenan_medication_id">
<span<?php echo $ivf_semenan_medication->id->viewAttributes() ?>>
<?php echo $ivf_semenan_medication->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenan_medication->Medication->Visible) { // Medication ?>
		<td data-name="Medication"<?php echo $ivf_semenan_medication->Medication->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenan_medication_list->RowCnt ?>_ivf_semenan_medication_Medication" class="ivf_semenan_medication_Medication">
<span<?php echo $ivf_semenan_medication->Medication->viewAttributes() ?>>
<?php echo $ivf_semenan_medication->Medication->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenan_medication_list->ListOptions->render("body", "right", $ivf_semenan_medication_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_semenan_medication->isGridAdd())
		$ivf_semenan_medication_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_semenan_medication->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_semenan_medication_list->Recordset)
	$ivf_semenan_medication_list->Recordset->Close();
?>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_semenan_medication->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_semenan_medication_list->Pager)) $ivf_semenan_medication_list->Pager = new NumericPager($ivf_semenan_medication_list->StartRec, $ivf_semenan_medication_list->DisplayRecs, $ivf_semenan_medication_list->TotalRecs, $ivf_semenan_medication_list->RecRange, $ivf_semenan_medication_list->AutoHidePager) ?>
<?php if ($ivf_semenan_medication_list->Pager->RecordCount > 0 && $ivf_semenan_medication_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_semenan_medication_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenan_medication_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_semenan_medication_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_semenan_medication_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenan_medication_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenan_medication_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenan_medication_list->pageUrl() ?>start=<?php echo $ivf_semenan_medication_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_semenan_medication_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_semenan_medication_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_semenan_medication_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_semenan_medication_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_semenan_medication_list->TotalRecs > 0 && (!$ivf_semenan_medication_list->AutoHidePageSizeSelector || $ivf_semenan_medication_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_semenan_medication">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_semenan_medication_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_semenan_medication_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_semenan_medication_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_semenan_medication_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_semenan_medication_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_semenan_medication_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_semenan_medication->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenan_medication_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_semenan_medication_list->TotalRecs == 0 && !$ivf_semenan_medication->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_semenan_medication_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_semenan_medication_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_semenan_medication->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_semenan_medication", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_semenan_medication_list->terminate();
?>