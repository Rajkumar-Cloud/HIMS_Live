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
$mas_services_list = new mas_services_list();

// Run the page
$mas_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_serviceslist = currentForm = new ew.Form("fmas_serviceslist", "list");
fmas_serviceslist.formKeyCountName = '<?php echo $mas_services_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_serviceslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_serviceslist.lists["x_status"] = <?php echo $mas_services_list->status->Lookup->toClientList() ?>;
fmas_serviceslist.lists["x_status"].options = <?php echo JsonEncode($mas_services_list->status->lookupOptions()) ?>;

// Form object for search
var fmas_serviceslistsrch = currentSearchForm = new ew.Form("fmas_serviceslistsrch");

// Filters
fmas_serviceslistsrch.filterList = <?php echo $mas_services_list->getFilterList() ?>;
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
<?php if (!$mas_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_services_list->TotalRecs > 0 && $mas_services_list->ExportOptions->visible()) { ?>
<?php $mas_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_services_list->ImportOptions->visible()) { ?>
<?php $mas_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_services_list->SearchOptions->visible()) { ?>
<?php $mas_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_services_list->FilterOptions->visible()) { ?>
<?php $mas_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_services->isExport() && !$mas_services->CurrentAction) { ?>
<form name="fmas_serviceslistsrch" id="fmas_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_services_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_serviceslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_services">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_services_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_services_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_services_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_services_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_services_list->showPageHeader(); ?>
<?php
$mas_services_list->showMessage();
?>
<?php if ($mas_services_list->TotalRecs > 0 || $mas_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_services">
<?php if (!$mas_services->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_services_list->Pager)) $mas_services_list->Pager = new NumericPager($mas_services_list->StartRec, $mas_services_list->DisplayRecs, $mas_services_list->TotalRecs, $mas_services_list->RecRange, $mas_services_list->AutoHidePager) ?>
<?php if ($mas_services_list->Pager->RecordCount > 0 && $mas_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_services_list->TotalRecs > 0 && (!$mas_services_list->AutoHidePageSizeSelector || $mas_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_serviceslist" id="fmas_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_services_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_services_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services">
<div id="gmp_mas_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_services_list->TotalRecs > 0 || $mas_services->isGridEdit()) { ?>
<table id="tbl_mas_serviceslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_services_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_services_list->renderListOptions();

// Render list options (header, left)
$mas_services_list->ListOptions->render("header", "left");
?>
<?php if ($mas_services->id->Visible) { // id ?>
	<?php if ($mas_services->sortUrl($mas_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_services->id->headerCellClass() ?>"><div id="elh_mas_services_id" class="mas_services_id"><div class="ew-table-header-caption"><?php echo $mas_services->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_services->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services->SortUrl($mas_services->id) ?>',1);"><div id="elh_mas_services_id" class="mas_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services->name->Visible) { // name ?>
	<?php if ($mas_services->sortUrl($mas_services->name) == "") { ?>
		<th data-name="name" class="<?php echo $mas_services->name->headerCellClass() ?>"><div id="elh_mas_services_name" class="mas_services_name"><div class="ew-table-header-caption"><?php echo $mas_services->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $mas_services->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services->SortUrl($mas_services->name) ?>',1);"><div id="elh_mas_services_name" class="mas_services_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_services->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services->amount->Visible) { // amount ?>
	<?php if ($mas_services->sortUrl($mas_services->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $mas_services->amount->headerCellClass() ?>"><div id="elh_mas_services_amount" class="mas_services_amount"><div class="ew-table-header-caption"><?php echo $mas_services->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $mas_services->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services->SortUrl($mas_services->amount) ?>',1);"><div id="elh_mas_services_amount" class="mas_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services->charged_date->Visible) { // charged_date ?>
	<?php if ($mas_services->sortUrl($mas_services->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $mas_services->charged_date->headerCellClass() ?>"><div id="elh_mas_services_charged_date" class="mas_services_charged_date"><div class="ew-table-header-caption"><?php echo $mas_services->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $mas_services->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services->SortUrl($mas_services->charged_date) ?>',1);"><div id="elh_mas_services_charged_date" class="mas_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_services->status->Visible) { // status ?>
	<?php if ($mas_services->sortUrl($mas_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $mas_services->status->headerCellClass() ?>"><div id="elh_mas_services_status" class="mas_services_status"><div class="ew-table-header-caption"><?php echo $mas_services->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $mas_services->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_services->SortUrl($mas_services->status) ?>',1);"><div id="elh_mas_services_status" class="mas_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_services_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_services->ExportAll && $mas_services->isExport()) {
	$mas_services_list->StopRec = $mas_services_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_services_list->TotalRecs > $mas_services_list->StartRec + $mas_services_list->DisplayRecs - 1)
		$mas_services_list->StopRec = $mas_services_list->StartRec + $mas_services_list->DisplayRecs - 1;
	else
		$mas_services_list->StopRec = $mas_services_list->TotalRecs;
}
$mas_services_list->RecCnt = $mas_services_list->StartRec - 1;
if ($mas_services_list->Recordset && !$mas_services_list->Recordset->EOF) {
	$mas_services_list->Recordset->moveFirst();
	$selectLimit = $mas_services_list->UseSelectLimit;
	if (!$selectLimit && $mas_services_list->StartRec > 1)
		$mas_services_list->Recordset->move($mas_services_list->StartRec - 1);
} elseif (!$mas_services->AllowAddDeleteRow && $mas_services_list->StopRec == 0) {
	$mas_services_list->StopRec = $mas_services->GridAddRowCount;
}

// Initialize aggregate
$mas_services->RowType = ROWTYPE_AGGREGATEINIT;
$mas_services->resetAttributes();
$mas_services_list->renderRow();
while ($mas_services_list->RecCnt < $mas_services_list->StopRec) {
	$mas_services_list->RecCnt++;
	if ($mas_services_list->RecCnt >= $mas_services_list->StartRec) {
		$mas_services_list->RowCnt++;

		// Set up key count
		$mas_services_list->KeyCount = $mas_services_list->RowIndex;

		// Init row class and style
		$mas_services->resetAttributes();
		$mas_services->CssClass = "";
		if ($mas_services->isGridAdd()) {
		} else {
			$mas_services_list->loadRowValues($mas_services_list->Recordset); // Load row values
		}
		$mas_services->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_services->RowAttrs = array_merge($mas_services->RowAttrs, array('data-rowindex'=>$mas_services_list->RowCnt, 'id'=>'r' . $mas_services_list->RowCnt . '_mas_services', 'data-rowtype'=>$mas_services->RowType));

		// Render row
		$mas_services_list->renderRow();

		// Render list options
		$mas_services_list->renderListOptions();
?>
	<tr<?php echo $mas_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_services_list->ListOptions->render("body", "left", $mas_services_list->RowCnt);
?>
	<?php if ($mas_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_services->id->cellAttributes() ?>>
<span id="el<?php echo $mas_services_list->RowCnt ?>_mas_services_id" class="mas_services_id">
<span<?php echo $mas_services->id->viewAttributes() ?>>
<?php echo $mas_services->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_services->name->Visible) { // name ?>
		<td data-name="name"<?php echo $mas_services->name->cellAttributes() ?>>
<span id="el<?php echo $mas_services_list->RowCnt ?>_mas_services_name" class="mas_services_name">
<span<?php echo $mas_services->name->viewAttributes() ?>>
<?php echo $mas_services->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_services->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $mas_services->amount->cellAttributes() ?>>
<span id="el<?php echo $mas_services_list->RowCnt ?>_mas_services_amount" class="mas_services_amount">
<span<?php echo $mas_services->amount->viewAttributes() ?>>
<?php echo $mas_services->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $mas_services->charged_date->cellAttributes() ?>>
<span id="el<?php echo $mas_services_list->RowCnt ?>_mas_services_charged_date" class="mas_services_charged_date">
<span<?php echo $mas_services->charged_date->viewAttributes() ?>>
<?php echo $mas_services->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $mas_services->status->cellAttributes() ?>>
<span id="el<?php echo $mas_services_list->RowCnt ?>_mas_services_status" class="mas_services_status">
<span<?php echo $mas_services->status->viewAttributes() ?>>
<?php echo $mas_services->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_services_list->ListOptions->render("body", "right", $mas_services_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_services->isGridAdd())
		$mas_services_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_services_list->Recordset)
	$mas_services_list->Recordset->Close();
?>
<?php if (!$mas_services->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_services_list->Pager)) $mas_services_list->Pager = new NumericPager($mas_services_list->StartRec, $mas_services_list->DisplayRecs, $mas_services_list->TotalRecs, $mas_services_list->RecRange, $mas_services_list->AutoHidePager) ?>
<?php if ($mas_services_list->Pager->RecordCount > 0 && $mas_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_services_list->pageUrl() ?>start=<?php echo $mas_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_services_list->TotalRecs > 0 && (!$mas_services_list->AutoHidePageSizeSelector || $mas_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_services_list->TotalRecs == 0 && !$mas_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_services_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_services_list->terminate();
?>