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
$help_list = new help_list();

// Run the page
$help_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$help_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$help->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhelplist = currentForm = new ew.Form("fhelplist", "list");
fhelplist.formKeyCountName = '<?php echo $help_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhelplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhelplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fhelplistsrch = currentSearchForm = new ew.Form("fhelplistsrch");

// Filters
fhelplistsrch.filterList = <?php echo $help_list->getFilterList() ?>;
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
<?php if (!$help->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($help_list->TotalRecs > 0 && $help_list->ExportOptions->visible()) { ?>
<?php $help_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($help_list->ImportOptions->visible()) { ?>
<?php $help_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($help_list->SearchOptions->visible()) { ?>
<?php $help_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($help_list->FilterOptions->visible()) { ?>
<?php $help_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$help_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$help->isExport() && !$help->CurrentAction) { ?>
<form name="fhelplistsrch" id="fhelplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($help_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhelplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="help">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($help_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($help_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $help_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($help_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $help_list->showPageHeader(); ?>
<?php
$help_list->showMessage();
?>
<?php if ($help_list->TotalRecs > 0 || $help->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($help_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> help">
<?php if (!$help->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$help->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($help_list->Pager)) $help_list->Pager = new NumericPager($help_list->StartRec, $help_list->DisplayRecs, $help_list->TotalRecs, $help_list->RecRange, $help_list->AutoHidePager) ?>
<?php if ($help_list->Pager->RecordCount > 0 && $help_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($help_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($help_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($help_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $help_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($help_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($help_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($help_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $help_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $help_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $help_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($help_list->TotalRecs > 0 && (!$help_list->AutoHidePageSizeSelector || $help_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="help">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($help_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($help_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($help_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($help_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($help_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($help_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($help->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $help_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhelplist" id="fhelplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($help_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $help_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="help">
<div id="gmp_help" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($help_list->TotalRecs > 0 || $help->isGridEdit()) { ?>
<table id="tbl_helplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$help_list->RowType = ROWTYPE_HEADER;

// Render list options
$help_list->renderListOptions();

// Render list options (header, left)
$help_list->ListOptions->render("header", "left");
?>
<?php if ($help->id->Visible) { // id ?>
	<?php if ($help->sortUrl($help->id) == "") { ?>
		<th data-name="id" class="<?php echo $help->id->headerCellClass() ?>"><div id="elh_help_id" class="help_id"><div class="ew-table-header-caption"><?php echo $help->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $help->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $help->SortUrl($help->id) ?>',1);"><div id="elh_help_id" class="help_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $help->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($help->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($help->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($help->Tittle->Visible) { // Tittle ?>
	<?php if ($help->sortUrl($help->Tittle) == "") { ?>
		<th data-name="Tittle" class="<?php echo $help->Tittle->headerCellClass() ?>"><div id="elh_help_Tittle" class="help_Tittle"><div class="ew-table-header-caption"><?php echo $help->Tittle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tittle" class="<?php echo $help->Tittle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $help->SortUrl($help->Tittle) ?>',1);"><div id="elh_help_Tittle" class="help_Tittle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $help->Tittle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($help->Tittle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($help->Tittle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$help_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($help->ExportAll && $help->isExport()) {
	$help_list->StopRec = $help_list->TotalRecs;
} else {

	// Set the last record to display
	if ($help_list->TotalRecs > $help_list->StartRec + $help_list->DisplayRecs - 1)
		$help_list->StopRec = $help_list->StartRec + $help_list->DisplayRecs - 1;
	else
		$help_list->StopRec = $help_list->TotalRecs;
}
$help_list->RecCnt = $help_list->StartRec - 1;
if ($help_list->Recordset && !$help_list->Recordset->EOF) {
	$help_list->Recordset->moveFirst();
	$selectLimit = $help_list->UseSelectLimit;
	if (!$selectLimit && $help_list->StartRec > 1)
		$help_list->Recordset->move($help_list->StartRec - 1);
} elseif (!$help->AllowAddDeleteRow && $help_list->StopRec == 0) {
	$help_list->StopRec = $help->GridAddRowCount;
}

// Initialize aggregate
$help->RowType = ROWTYPE_AGGREGATEINIT;
$help->resetAttributes();
$help_list->renderRow();
while ($help_list->RecCnt < $help_list->StopRec) {
	$help_list->RecCnt++;
	if ($help_list->RecCnt >= $help_list->StartRec) {
		$help_list->RowCnt++;

		// Set up key count
		$help_list->KeyCount = $help_list->RowIndex;

		// Init row class and style
		$help->resetAttributes();
		$help->CssClass = "";
		if ($help->isGridAdd()) {
		} else {
			$help_list->loadRowValues($help_list->Recordset); // Load row values
		}
		$help->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$help->RowAttrs = array_merge($help->RowAttrs, array('data-rowindex'=>$help_list->RowCnt, 'id'=>'r' . $help_list->RowCnt . '_help', 'data-rowtype'=>$help->RowType));

		// Render row
		$help_list->renderRow();

		// Render list options
		$help_list->renderListOptions();
?>
	<tr<?php echo $help->rowAttributes() ?>>
<?php

// Render list options (body, left)
$help_list->ListOptions->render("body", "left", $help_list->RowCnt);
?>
	<?php if ($help->id->Visible) { // id ?>
		<td data-name="id"<?php echo $help->id->cellAttributes() ?>>
<span id="el<?php echo $help_list->RowCnt ?>_help_id" class="help_id">
<span<?php echo $help->id->viewAttributes() ?>>
<?php echo $help->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($help->Tittle->Visible) { // Tittle ?>
		<td data-name="Tittle"<?php echo $help->Tittle->cellAttributes() ?>>
<span id="el<?php echo $help_list->RowCnt ?>_help_Tittle" class="help_Tittle">
<span<?php echo $help->Tittle->viewAttributes() ?>>
<?php echo $help->Tittle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$help_list->ListOptions->render("body", "right", $help_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$help->isGridAdd())
		$help_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$help->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($help_list->Recordset)
	$help_list->Recordset->Close();
?>
<?php if (!$help->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$help->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($help_list->Pager)) $help_list->Pager = new NumericPager($help_list->StartRec, $help_list->DisplayRecs, $help_list->TotalRecs, $help_list->RecRange, $help_list->AutoHidePager) ?>
<?php if ($help_list->Pager->RecordCount > 0 && $help_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($help_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($help_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($help_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $help_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($help_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($help_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $help_list->pageUrl() ?>start=<?php echo $help_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($help_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $help_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $help_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $help_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($help_list->TotalRecs > 0 && (!$help_list->AutoHidePageSizeSelector || $help_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="help">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($help_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($help_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($help_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($help_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($help_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($help_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($help->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $help_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($help_list->TotalRecs == 0 && !$help->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $help_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$help_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$help->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$help->isExport()) { ?>
<script>
ew.scrollableTable("gmp_help", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$help_list->terminate();
?>