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
$mas_pharmacy_list = new mas_pharmacy_list();

// Run the page
$mas_pharmacy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_pharmacy_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_pharmacy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_pharmacylist = currentForm = new ew.Form("fmas_pharmacylist", "list");
fmas_pharmacylist.formKeyCountName = '<?php echo $mas_pharmacy_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_pharmacylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_pharmacylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_pharmacylist.lists["x_status"] = <?php echo $mas_pharmacy_list->status->Lookup->toClientList() ?>;
fmas_pharmacylist.lists["x_status"].options = <?php echo JsonEncode($mas_pharmacy_list->status->lookupOptions()) ?>;

// Form object for search
var fmas_pharmacylistsrch = currentSearchForm = new ew.Form("fmas_pharmacylistsrch");

// Filters
fmas_pharmacylistsrch.filterList = <?php echo $mas_pharmacy_list->getFilterList() ?>;
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
<?php if (!$mas_pharmacy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_pharmacy_list->TotalRecs > 0 && $mas_pharmacy_list->ExportOptions->visible()) { ?>
<?php $mas_pharmacy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_pharmacy_list->ImportOptions->visible()) { ?>
<?php $mas_pharmacy_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_pharmacy_list->SearchOptions->visible()) { ?>
<?php $mas_pharmacy_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_pharmacy_list->FilterOptions->visible()) { ?>
<?php $mas_pharmacy_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_pharmacy_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_pharmacy->isExport() && !$mas_pharmacy->CurrentAction) { ?>
<form name="fmas_pharmacylistsrch" id="fmas_pharmacylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_pharmacy_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_pharmacylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_pharmacy">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_pharmacy_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_pharmacy_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_pharmacy_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_pharmacy_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_pharmacy_list->showPageHeader(); ?>
<?php
$mas_pharmacy_list->showMessage();
?>
<?php if ($mas_pharmacy_list->TotalRecs > 0 || $mas_pharmacy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_pharmacy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_pharmacy">
<?php if (!$mas_pharmacy->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_pharmacy_list->Pager)) $mas_pharmacy_list->Pager = new NumericPager($mas_pharmacy_list->StartRec, $mas_pharmacy_list->DisplayRecs, $mas_pharmacy_list->TotalRecs, $mas_pharmacy_list->RecRange, $mas_pharmacy_list->AutoHidePager) ?>
<?php if ($mas_pharmacy_list->Pager->RecordCount > 0 && $mas_pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_pharmacy_list->TotalRecs > 0 && (!$mas_pharmacy_list->AutoHidePageSizeSelector || $mas_pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_pharmacylist" id="fmas_pharmacylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_pharmacy_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_pharmacy_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_pharmacy">
<div id="gmp_mas_pharmacy" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_pharmacy_list->TotalRecs > 0 || $mas_pharmacy->isGridEdit()) { ?>
<table id="tbl_mas_pharmacylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_pharmacy_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_pharmacy_list->renderListOptions();

// Render list options (header, left)
$mas_pharmacy_list->ListOptions->render("header", "left");
?>
<?php if ($mas_pharmacy->id->Visible) { // id ?>
	<?php if ($mas_pharmacy->sortUrl($mas_pharmacy->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_pharmacy->id->headerCellClass() ?>"><div id="elh_mas_pharmacy_id" class="mas_pharmacy_id"><div class="ew-table-header-caption"><?php echo $mas_pharmacy->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_pharmacy->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_pharmacy->SortUrl($mas_pharmacy->id) ?>',1);"><div id="elh_mas_pharmacy_id" class="mas_pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_pharmacy->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy->name->Visible) { // name ?>
	<?php if ($mas_pharmacy->sortUrl($mas_pharmacy->name) == "") { ?>
		<th data-name="name" class="<?php echo $mas_pharmacy->name->headerCellClass() ?>"><div id="elh_mas_pharmacy_name" class="mas_pharmacy_name"><div class="ew-table-header-caption"><?php echo $mas_pharmacy->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $mas_pharmacy->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_pharmacy->SortUrl($mas_pharmacy->name) ?>',1);"><div id="elh_mas_pharmacy_name" class="mas_pharmacy_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_pharmacy->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy->amount->Visible) { // amount ?>
	<?php if ($mas_pharmacy->sortUrl($mas_pharmacy->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $mas_pharmacy->amount->headerCellClass() ?>"><div id="elh_mas_pharmacy_amount" class="mas_pharmacy_amount"><div class="ew-table-header-caption"><?php echo $mas_pharmacy->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $mas_pharmacy->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_pharmacy->SortUrl($mas_pharmacy->amount) ?>',1);"><div id="elh_mas_pharmacy_amount" class="mas_pharmacy_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_pharmacy->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy->charged_date->Visible) { // charged_date ?>
	<?php if ($mas_pharmacy->sortUrl($mas_pharmacy->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $mas_pharmacy->charged_date->headerCellClass() ?>"><div id="elh_mas_pharmacy_charged_date" class="mas_pharmacy_charged_date"><div class="ew-table-header-caption"><?php echo $mas_pharmacy->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $mas_pharmacy->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_pharmacy->SortUrl($mas_pharmacy->charged_date) ?>',1);"><div id="elh_mas_pharmacy_charged_date" class="mas_pharmacy_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_pharmacy->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_pharmacy->status->Visible) { // status ?>
	<?php if ($mas_pharmacy->sortUrl($mas_pharmacy->status) == "") { ?>
		<th data-name="status" class="<?php echo $mas_pharmacy->status->headerCellClass() ?>"><div id="elh_mas_pharmacy_status" class="mas_pharmacy_status"><div class="ew-table-header-caption"><?php echo $mas_pharmacy->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $mas_pharmacy->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_pharmacy->SortUrl($mas_pharmacy->status) ?>',1);"><div id="elh_mas_pharmacy_status" class="mas_pharmacy_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_pharmacy->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_pharmacy->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_pharmacy->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_pharmacy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_pharmacy->ExportAll && $mas_pharmacy->isExport()) {
	$mas_pharmacy_list->StopRec = $mas_pharmacy_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_pharmacy_list->TotalRecs > $mas_pharmacy_list->StartRec + $mas_pharmacy_list->DisplayRecs - 1)
		$mas_pharmacy_list->StopRec = $mas_pharmacy_list->StartRec + $mas_pharmacy_list->DisplayRecs - 1;
	else
		$mas_pharmacy_list->StopRec = $mas_pharmacy_list->TotalRecs;
}
$mas_pharmacy_list->RecCnt = $mas_pharmacy_list->StartRec - 1;
if ($mas_pharmacy_list->Recordset && !$mas_pharmacy_list->Recordset->EOF) {
	$mas_pharmacy_list->Recordset->moveFirst();
	$selectLimit = $mas_pharmacy_list->UseSelectLimit;
	if (!$selectLimit && $mas_pharmacy_list->StartRec > 1)
		$mas_pharmacy_list->Recordset->move($mas_pharmacy_list->StartRec - 1);
} elseif (!$mas_pharmacy->AllowAddDeleteRow && $mas_pharmacy_list->StopRec == 0) {
	$mas_pharmacy_list->StopRec = $mas_pharmacy->GridAddRowCount;
}

// Initialize aggregate
$mas_pharmacy->RowType = ROWTYPE_AGGREGATEINIT;
$mas_pharmacy->resetAttributes();
$mas_pharmacy_list->renderRow();
while ($mas_pharmacy_list->RecCnt < $mas_pharmacy_list->StopRec) {
	$mas_pharmacy_list->RecCnt++;
	if ($mas_pharmacy_list->RecCnt >= $mas_pharmacy_list->StartRec) {
		$mas_pharmacy_list->RowCnt++;

		// Set up key count
		$mas_pharmacy_list->KeyCount = $mas_pharmacy_list->RowIndex;

		// Init row class and style
		$mas_pharmacy->resetAttributes();
		$mas_pharmacy->CssClass = "";
		if ($mas_pharmacy->isGridAdd()) {
		} else {
			$mas_pharmacy_list->loadRowValues($mas_pharmacy_list->Recordset); // Load row values
		}
		$mas_pharmacy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_pharmacy->RowAttrs = array_merge($mas_pharmacy->RowAttrs, array('data-rowindex'=>$mas_pharmacy_list->RowCnt, 'id'=>'r' . $mas_pharmacy_list->RowCnt . '_mas_pharmacy', 'data-rowtype'=>$mas_pharmacy->RowType));

		// Render row
		$mas_pharmacy_list->renderRow();

		// Render list options
		$mas_pharmacy_list->renderListOptions();
?>
	<tr<?php echo $mas_pharmacy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_pharmacy_list->ListOptions->render("body", "left", $mas_pharmacy_list->RowCnt);
?>
	<?php if ($mas_pharmacy->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_pharmacy->id->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCnt ?>_mas_pharmacy_id" class="mas_pharmacy_id">
<span<?php echo $mas_pharmacy->id->viewAttributes() ?>>
<?php echo $mas_pharmacy->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy->name->Visible) { // name ?>
		<td data-name="name"<?php echo $mas_pharmacy->name->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCnt ?>_mas_pharmacy_name" class="mas_pharmacy_name">
<span<?php echo $mas_pharmacy->name->viewAttributes() ?>>
<?php echo $mas_pharmacy->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $mas_pharmacy->amount->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCnt ?>_mas_pharmacy_amount" class="mas_pharmacy_amount">
<span<?php echo $mas_pharmacy->amount->viewAttributes() ?>>
<?php echo $mas_pharmacy->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $mas_pharmacy->charged_date->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCnt ?>_mas_pharmacy_charged_date" class="mas_pharmacy_charged_date">
<span<?php echo $mas_pharmacy->charged_date->viewAttributes() ?>>
<?php echo $mas_pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_pharmacy->status->Visible) { // status ?>
		<td data-name="status"<?php echo $mas_pharmacy->status->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_list->RowCnt ?>_mas_pharmacy_status" class="mas_pharmacy_status">
<span<?php echo $mas_pharmacy->status->viewAttributes() ?>>
<?php echo $mas_pharmacy->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_pharmacy_list->ListOptions->render("body", "right", $mas_pharmacy_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_pharmacy->isGridAdd())
		$mas_pharmacy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_pharmacy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_pharmacy_list->Recordset)
	$mas_pharmacy_list->Recordset->Close();
?>
<?php if (!$mas_pharmacy->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_pharmacy_list->Pager)) $mas_pharmacy_list->Pager = new NumericPager($mas_pharmacy_list->StartRec, $mas_pharmacy_list->DisplayRecs, $mas_pharmacy_list->TotalRecs, $mas_pharmacy_list->RecRange, $mas_pharmacy_list->AutoHidePager) ?>
<?php if ($mas_pharmacy_list->Pager->RecordCount > 0 && $mas_pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_pharmacy_list->pageUrl() ?>start=<?php echo $mas_pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_pharmacy_list->TotalRecs > 0 && (!$mas_pharmacy_list->AutoHidePageSizeSelector || $mas_pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_pharmacy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_pharmacy_list->TotalRecs == 0 && !$mas_pharmacy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_pharmacy_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_pharmacy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_pharmacy->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_pharmacy", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_pharmacy_list->terminate();
?>