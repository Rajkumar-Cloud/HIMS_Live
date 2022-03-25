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
$master_procedure_treatment_list = new master_procedure_treatment_list();

// Run the page
$master_procedure_treatment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_procedure_treatment_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$master_procedure_treatment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmaster_procedure_treatmentlist = currentForm = new ew.Form("fmaster_procedure_treatmentlist", "list");
fmaster_procedure_treatmentlist.formKeyCountName = '<?php echo $master_procedure_treatment_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmaster_procedure_treatmentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmaster_procedure_treatmentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fmaster_procedure_treatmentlistsrch = currentSearchForm = new ew.Form("fmaster_procedure_treatmentlistsrch");

// Filters
fmaster_procedure_treatmentlistsrch.filterList = <?php echo $master_procedure_treatment_list->getFilterList() ?>;
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
<?php if (!$master_procedure_treatment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($master_procedure_treatment_list->TotalRecs > 0 && $master_procedure_treatment_list->ExportOptions->visible()) { ?>
<?php $master_procedure_treatment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($master_procedure_treatment_list->ImportOptions->visible()) { ?>
<?php $master_procedure_treatment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($master_procedure_treatment_list->SearchOptions->visible()) { ?>
<?php $master_procedure_treatment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($master_procedure_treatment_list->FilterOptions->visible()) { ?>
<?php $master_procedure_treatment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$master_procedure_treatment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$master_procedure_treatment->isExport() && !$master_procedure_treatment->CurrentAction) { ?>
<form name="fmaster_procedure_treatmentlistsrch" id="fmaster_procedure_treatmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($master_procedure_treatment_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmaster_procedure_treatmentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="master_procedure_treatment">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($master_procedure_treatment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($master_procedure_treatment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $master_procedure_treatment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($master_procedure_treatment_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($master_procedure_treatment_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($master_procedure_treatment_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($master_procedure_treatment_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $master_procedure_treatment_list->showPageHeader(); ?>
<?php
$master_procedure_treatment_list->showMessage();
?>
<?php if ($master_procedure_treatment_list->TotalRecs > 0 || $master_procedure_treatment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($master_procedure_treatment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> master_procedure_treatment">
<?php if (!$master_procedure_treatment->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$master_procedure_treatment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($master_procedure_treatment_list->Pager)) $master_procedure_treatment_list->Pager = new NumericPager($master_procedure_treatment_list->StartRec, $master_procedure_treatment_list->DisplayRecs, $master_procedure_treatment_list->TotalRecs, $master_procedure_treatment_list->RecRange, $master_procedure_treatment_list->AutoHidePager) ?>
<?php if ($master_procedure_treatment_list->Pager->RecordCount > 0 && $master_procedure_treatment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($master_procedure_treatment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($master_procedure_treatment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($master_procedure_treatment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $master_procedure_treatment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($master_procedure_treatment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($master_procedure_treatment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($master_procedure_treatment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $master_procedure_treatment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $master_procedure_treatment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $master_procedure_treatment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($master_procedure_treatment_list->TotalRecs > 0 && (!$master_procedure_treatment_list->AutoHidePageSizeSelector || $master_procedure_treatment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="master_procedure_treatment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($master_procedure_treatment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($master_procedure_treatment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($master_procedure_treatment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($master_procedure_treatment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($master_procedure_treatment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($master_procedure_treatment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($master_procedure_treatment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_procedure_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmaster_procedure_treatmentlist" id="fmaster_procedure_treatmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($master_procedure_treatment_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $master_procedure_treatment_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_procedure_treatment">
<div id="gmp_master_procedure_treatment" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($master_procedure_treatment_list->TotalRecs > 0 || $master_procedure_treatment->isGridEdit()) { ?>
<table id="tbl_master_procedure_treatmentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$master_procedure_treatment_list->RowType = ROWTYPE_HEADER;

// Render list options
$master_procedure_treatment_list->renderListOptions();

// Render list options (header, left)
$master_procedure_treatment_list->ListOptions->render("header", "left");
?>
<?php if ($master_procedure_treatment->id->Visible) { // id ?>
	<?php if ($master_procedure_treatment->sortUrl($master_procedure_treatment->id) == "") { ?>
		<th data-name="id" class="<?php echo $master_procedure_treatment->id->headerCellClass() ?>"><div id="elh_master_procedure_treatment_id" class="master_procedure_treatment_id"><div class="ew-table-header-caption"><?php echo $master_procedure_treatment->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $master_procedure_treatment->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $master_procedure_treatment->SortUrl($master_procedure_treatment->id) ?>',1);"><div id="elh_master_procedure_treatment_id" class="master_procedure_treatment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_procedure_treatment->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($master_procedure_treatment->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($master_procedure_treatment->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_procedure_treatment->Treatment->Visible) { // Treatment ?>
	<?php if ($master_procedure_treatment->sortUrl($master_procedure_treatment->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $master_procedure_treatment->Treatment->headerCellClass() ?>"><div id="elh_master_procedure_treatment_Treatment" class="master_procedure_treatment_Treatment"><div class="ew-table-header-caption"><?php echo $master_procedure_treatment->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $master_procedure_treatment->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $master_procedure_treatment->SortUrl($master_procedure_treatment->Treatment) ?>',1);"><div id="elh_master_procedure_treatment_Treatment" class="master_procedure_treatment_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_procedure_treatment->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_procedure_treatment->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($master_procedure_treatment->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($master_procedure_treatment->Procedure->Visible) { // Procedure ?>
	<?php if ($master_procedure_treatment->sortUrl($master_procedure_treatment->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $master_procedure_treatment->Procedure->headerCellClass() ?>"><div id="elh_master_procedure_treatment_Procedure" class="master_procedure_treatment_Procedure"><div class="ew-table-header-caption"><?php echo $master_procedure_treatment->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $master_procedure_treatment->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $master_procedure_treatment->SortUrl($master_procedure_treatment->Procedure) ?>',1);"><div id="elh_master_procedure_treatment_Procedure" class="master_procedure_treatment_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $master_procedure_treatment->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($master_procedure_treatment->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($master_procedure_treatment->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$master_procedure_treatment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($master_procedure_treatment->ExportAll && $master_procedure_treatment->isExport()) {
	$master_procedure_treatment_list->StopRec = $master_procedure_treatment_list->TotalRecs;
} else {

	// Set the last record to display
	if ($master_procedure_treatment_list->TotalRecs > $master_procedure_treatment_list->StartRec + $master_procedure_treatment_list->DisplayRecs - 1)
		$master_procedure_treatment_list->StopRec = $master_procedure_treatment_list->StartRec + $master_procedure_treatment_list->DisplayRecs - 1;
	else
		$master_procedure_treatment_list->StopRec = $master_procedure_treatment_list->TotalRecs;
}
$master_procedure_treatment_list->RecCnt = $master_procedure_treatment_list->StartRec - 1;
if ($master_procedure_treatment_list->Recordset && !$master_procedure_treatment_list->Recordset->EOF) {
	$master_procedure_treatment_list->Recordset->moveFirst();
	$selectLimit = $master_procedure_treatment_list->UseSelectLimit;
	if (!$selectLimit && $master_procedure_treatment_list->StartRec > 1)
		$master_procedure_treatment_list->Recordset->move($master_procedure_treatment_list->StartRec - 1);
} elseif (!$master_procedure_treatment->AllowAddDeleteRow && $master_procedure_treatment_list->StopRec == 0) {
	$master_procedure_treatment_list->StopRec = $master_procedure_treatment->GridAddRowCount;
}

// Initialize aggregate
$master_procedure_treatment->RowType = ROWTYPE_AGGREGATEINIT;
$master_procedure_treatment->resetAttributes();
$master_procedure_treatment_list->renderRow();
while ($master_procedure_treatment_list->RecCnt < $master_procedure_treatment_list->StopRec) {
	$master_procedure_treatment_list->RecCnt++;
	if ($master_procedure_treatment_list->RecCnt >= $master_procedure_treatment_list->StartRec) {
		$master_procedure_treatment_list->RowCnt++;

		// Set up key count
		$master_procedure_treatment_list->KeyCount = $master_procedure_treatment_list->RowIndex;

		// Init row class and style
		$master_procedure_treatment->resetAttributes();
		$master_procedure_treatment->CssClass = "";
		if ($master_procedure_treatment->isGridAdd()) {
		} else {
			$master_procedure_treatment_list->loadRowValues($master_procedure_treatment_list->Recordset); // Load row values
		}
		$master_procedure_treatment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$master_procedure_treatment->RowAttrs = array_merge($master_procedure_treatment->RowAttrs, array('data-rowindex'=>$master_procedure_treatment_list->RowCnt, 'id'=>'r' . $master_procedure_treatment_list->RowCnt . '_master_procedure_treatment', 'data-rowtype'=>$master_procedure_treatment->RowType));

		// Render row
		$master_procedure_treatment_list->renderRow();

		// Render list options
		$master_procedure_treatment_list->renderListOptions();
?>
	<tr<?php echo $master_procedure_treatment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$master_procedure_treatment_list->ListOptions->render("body", "left", $master_procedure_treatment_list->RowCnt);
?>
	<?php if ($master_procedure_treatment->id->Visible) { // id ?>
		<td data-name="id"<?php echo $master_procedure_treatment->id->cellAttributes() ?>>
<span id="el<?php echo $master_procedure_treatment_list->RowCnt ?>_master_procedure_treatment_id" class="master_procedure_treatment_id">
<span<?php echo $master_procedure_treatment->id->viewAttributes() ?>>
<?php echo $master_procedure_treatment->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_procedure_treatment->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $master_procedure_treatment->Treatment->cellAttributes() ?>>
<span id="el<?php echo $master_procedure_treatment_list->RowCnt ?>_master_procedure_treatment_Treatment" class="master_procedure_treatment_Treatment">
<span<?php echo $master_procedure_treatment->Treatment->viewAttributes() ?>>
<?php echo $master_procedure_treatment->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($master_procedure_treatment->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $master_procedure_treatment->Procedure->cellAttributes() ?>>
<span id="el<?php echo $master_procedure_treatment_list->RowCnt ?>_master_procedure_treatment_Procedure" class="master_procedure_treatment_Procedure">
<span<?php echo $master_procedure_treatment->Procedure->viewAttributes() ?>>
<?php echo $master_procedure_treatment->Procedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$master_procedure_treatment_list->ListOptions->render("body", "right", $master_procedure_treatment_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$master_procedure_treatment->isGridAdd())
		$master_procedure_treatment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$master_procedure_treatment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($master_procedure_treatment_list->Recordset)
	$master_procedure_treatment_list->Recordset->Close();
?>
<?php if (!$master_procedure_treatment->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$master_procedure_treatment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($master_procedure_treatment_list->Pager)) $master_procedure_treatment_list->Pager = new NumericPager($master_procedure_treatment_list->StartRec, $master_procedure_treatment_list->DisplayRecs, $master_procedure_treatment_list->TotalRecs, $master_procedure_treatment_list->RecRange, $master_procedure_treatment_list->AutoHidePager) ?>
<?php if ($master_procedure_treatment_list->Pager->RecordCount > 0 && $master_procedure_treatment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($master_procedure_treatment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($master_procedure_treatment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($master_procedure_treatment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $master_procedure_treatment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($master_procedure_treatment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($master_procedure_treatment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $master_procedure_treatment_list->pageUrl() ?>start=<?php echo $master_procedure_treatment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($master_procedure_treatment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $master_procedure_treatment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $master_procedure_treatment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $master_procedure_treatment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($master_procedure_treatment_list->TotalRecs > 0 && (!$master_procedure_treatment_list->AutoHidePageSizeSelector || $master_procedure_treatment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="master_procedure_treatment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($master_procedure_treatment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($master_procedure_treatment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($master_procedure_treatment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($master_procedure_treatment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($master_procedure_treatment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($master_procedure_treatment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($master_procedure_treatment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $master_procedure_treatment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($master_procedure_treatment_list->TotalRecs == 0 && !$master_procedure_treatment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $master_procedure_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$master_procedure_treatment_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$master_procedure_treatment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$master_procedure_treatment->isExport()) { ?>
<script>
ew.scrollableTable("gmp_master_procedure_treatment", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$master_procedure_treatment_list->terminate();
?>