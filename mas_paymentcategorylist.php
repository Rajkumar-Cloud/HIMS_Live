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
$mas_paymentcategory_list = new mas_paymentcategory_list();

// Run the page
$mas_paymentcategory_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_paymentcategory_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_paymentcategorylist = currentForm = new ew.Form("fmas_paymentcategorylist", "list");
fmas_paymentcategorylist.formKeyCountName = '<?php echo $mas_paymentcategory_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_paymentcategorylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_paymentcategorylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fmas_paymentcategorylistsrch = currentSearchForm = new ew.Form("fmas_paymentcategorylistsrch");

// Filters
fmas_paymentcategorylistsrch.filterList = <?php echo $mas_paymentcategory_list->getFilterList() ?>;
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
<?php if (!$mas_paymentcategory->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_paymentcategory_list->TotalRecs > 0 && $mas_paymentcategory_list->ExportOptions->visible()) { ?>
<?php $mas_paymentcategory_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_paymentcategory_list->ImportOptions->visible()) { ?>
<?php $mas_paymentcategory_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_paymentcategory_list->SearchOptions->visible()) { ?>
<?php $mas_paymentcategory_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_paymentcategory_list->FilterOptions->visible()) { ?>
<?php $mas_paymentcategory_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_paymentcategory_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_paymentcategory->isExport() && !$mas_paymentcategory->CurrentAction) { ?>
<form name="fmas_paymentcategorylistsrch" id="fmas_paymentcategorylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_paymentcategory_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_paymentcategorylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_paymentcategory">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_paymentcategory_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_paymentcategory_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_paymentcategory_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_paymentcategory_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_paymentcategory_list->showPageHeader(); ?>
<?php
$mas_paymentcategory_list->showMessage();
?>
<?php if ($mas_paymentcategory_list->TotalRecs > 0 || $mas_paymentcategory->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_paymentcategory_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_paymentcategory">
<?php if (!$mas_paymentcategory->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_paymentcategory->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_paymentcategory_list->Pager)) $mas_paymentcategory_list->Pager = new NumericPager($mas_paymentcategory_list->StartRec, $mas_paymentcategory_list->DisplayRecs, $mas_paymentcategory_list->TotalRecs, $mas_paymentcategory_list->RecRange, $mas_paymentcategory_list->AutoHidePager) ?>
<?php if ($mas_paymentcategory_list->Pager->RecordCount > 0 && $mas_paymentcategory_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_paymentcategory_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_paymentcategory_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_paymentcategory_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_paymentcategory_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_paymentcategory_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_paymentcategory_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_paymentcategory_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_paymentcategory_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_paymentcategory_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_paymentcategory_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_paymentcategory_list->TotalRecs > 0 && (!$mas_paymentcategory_list->AutoHidePageSizeSelector || $mas_paymentcategory_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_paymentcategory">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_paymentcategory_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_paymentcategory_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_paymentcategory_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_paymentcategory_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_paymentcategory_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_paymentcategory_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_paymentcategory->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_paymentcategory_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_paymentcategorylist" id="fmas_paymentcategorylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_paymentcategory_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_paymentcategory_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_paymentcategory">
<div id="gmp_mas_paymentcategory" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_paymentcategory_list->TotalRecs > 0 || $mas_paymentcategory->isGridEdit()) { ?>
<table id="tbl_mas_paymentcategorylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_paymentcategory_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_paymentcategory_list->renderListOptions();

// Render list options (header, left)
$mas_paymentcategory_list->ListOptions->render("header", "left");
?>
<?php if ($mas_paymentcategory->id->Visible) { // id ?>
	<?php if ($mas_paymentcategory->sortUrl($mas_paymentcategory->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_paymentcategory->id->headerCellClass() ?>"><div id="elh_mas_paymentcategory_id" class="mas_paymentcategory_id"><div class="ew-table-header-caption"><?php echo $mas_paymentcategory->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_paymentcategory->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_paymentcategory->SortUrl($mas_paymentcategory->id) ?>',1);"><div id="elh_mas_paymentcategory_id" class="mas_paymentcategory_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_paymentcategory->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_paymentcategory->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_paymentcategory->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_paymentcategory->Category->Visible) { // Category ?>
	<?php if ($mas_paymentcategory->sortUrl($mas_paymentcategory->Category) == "") { ?>
		<th data-name="Category" class="<?php echo $mas_paymentcategory->Category->headerCellClass() ?>"><div id="elh_mas_paymentcategory_Category" class="mas_paymentcategory_Category"><div class="ew-table-header-caption"><?php echo $mas_paymentcategory->Category->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Category" class="<?php echo $mas_paymentcategory->Category->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_paymentcategory->SortUrl($mas_paymentcategory->Category) ?>',1);"><div id="elh_mas_paymentcategory_Category" class="mas_paymentcategory_Category">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_paymentcategory->Category->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_paymentcategory->Category->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_paymentcategory->Category->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_paymentcategory_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_paymentcategory->ExportAll && $mas_paymentcategory->isExport()) {
	$mas_paymentcategory_list->StopRec = $mas_paymentcategory_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_paymentcategory_list->TotalRecs > $mas_paymentcategory_list->StartRec + $mas_paymentcategory_list->DisplayRecs - 1)
		$mas_paymentcategory_list->StopRec = $mas_paymentcategory_list->StartRec + $mas_paymentcategory_list->DisplayRecs - 1;
	else
		$mas_paymentcategory_list->StopRec = $mas_paymentcategory_list->TotalRecs;
}
$mas_paymentcategory_list->RecCnt = $mas_paymentcategory_list->StartRec - 1;
if ($mas_paymentcategory_list->Recordset && !$mas_paymentcategory_list->Recordset->EOF) {
	$mas_paymentcategory_list->Recordset->moveFirst();
	$selectLimit = $mas_paymentcategory_list->UseSelectLimit;
	if (!$selectLimit && $mas_paymentcategory_list->StartRec > 1)
		$mas_paymentcategory_list->Recordset->move($mas_paymentcategory_list->StartRec - 1);
} elseif (!$mas_paymentcategory->AllowAddDeleteRow && $mas_paymentcategory_list->StopRec == 0) {
	$mas_paymentcategory_list->StopRec = $mas_paymentcategory->GridAddRowCount;
}

// Initialize aggregate
$mas_paymentcategory->RowType = ROWTYPE_AGGREGATEINIT;
$mas_paymentcategory->resetAttributes();
$mas_paymentcategory_list->renderRow();
while ($mas_paymentcategory_list->RecCnt < $mas_paymentcategory_list->StopRec) {
	$mas_paymentcategory_list->RecCnt++;
	if ($mas_paymentcategory_list->RecCnt >= $mas_paymentcategory_list->StartRec) {
		$mas_paymentcategory_list->RowCnt++;

		// Set up key count
		$mas_paymentcategory_list->KeyCount = $mas_paymentcategory_list->RowIndex;

		// Init row class and style
		$mas_paymentcategory->resetAttributes();
		$mas_paymentcategory->CssClass = "";
		if ($mas_paymentcategory->isGridAdd()) {
		} else {
			$mas_paymentcategory_list->loadRowValues($mas_paymentcategory_list->Recordset); // Load row values
		}
		$mas_paymentcategory->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_paymentcategory->RowAttrs = array_merge($mas_paymentcategory->RowAttrs, array('data-rowindex'=>$mas_paymentcategory_list->RowCnt, 'id'=>'r' . $mas_paymentcategory_list->RowCnt . '_mas_paymentcategory', 'data-rowtype'=>$mas_paymentcategory->RowType));

		// Render row
		$mas_paymentcategory_list->renderRow();

		// Render list options
		$mas_paymentcategory_list->renderListOptions();
?>
	<tr<?php echo $mas_paymentcategory->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_paymentcategory_list->ListOptions->render("body", "left", $mas_paymentcategory_list->RowCnt);
?>
	<?php if ($mas_paymentcategory->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_paymentcategory->id->cellAttributes() ?>>
<span id="el<?php echo $mas_paymentcategory_list->RowCnt ?>_mas_paymentcategory_id" class="mas_paymentcategory_id">
<span<?php echo $mas_paymentcategory->id->viewAttributes() ?>>
<?php echo $mas_paymentcategory->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_paymentcategory->Category->Visible) { // Category ?>
		<td data-name="Category"<?php echo $mas_paymentcategory->Category->cellAttributes() ?>>
<span id="el<?php echo $mas_paymentcategory_list->RowCnt ?>_mas_paymentcategory_Category" class="mas_paymentcategory_Category">
<span<?php echo $mas_paymentcategory->Category->viewAttributes() ?>>
<?php echo $mas_paymentcategory->Category->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_paymentcategory_list->ListOptions->render("body", "right", $mas_paymentcategory_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_paymentcategory->isGridAdd())
		$mas_paymentcategory_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_paymentcategory->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_paymentcategory_list->Recordset)
	$mas_paymentcategory_list->Recordset->Close();
?>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_paymentcategory->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_paymentcategory_list->Pager)) $mas_paymentcategory_list->Pager = new NumericPager($mas_paymentcategory_list->StartRec, $mas_paymentcategory_list->DisplayRecs, $mas_paymentcategory_list->TotalRecs, $mas_paymentcategory_list->RecRange, $mas_paymentcategory_list->AutoHidePager) ?>
<?php if ($mas_paymentcategory_list->Pager->RecordCount > 0 && $mas_paymentcategory_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_paymentcategory_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_paymentcategory_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_paymentcategory_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_paymentcategory_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_paymentcategory_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_paymentcategory_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_paymentcategory_list->pageUrl() ?>start=<?php echo $mas_paymentcategory_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_paymentcategory_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_paymentcategory_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_paymentcategory_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_paymentcategory_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_paymentcategory_list->TotalRecs > 0 && (!$mas_paymentcategory_list->AutoHidePageSizeSelector || $mas_paymentcategory_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_paymentcategory">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_paymentcategory_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_paymentcategory_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_paymentcategory_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_paymentcategory_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_paymentcategory_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_paymentcategory_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_paymentcategory->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_paymentcategory_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_paymentcategory_list->TotalRecs == 0 && !$mas_paymentcategory->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_paymentcategory_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_paymentcategory_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_paymentcategory->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_paymentcategory", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_paymentcategory_list->terminate();
?>