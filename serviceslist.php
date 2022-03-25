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
$services_list = new services_list();

// Run the page
$services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$services_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fserviceslist = currentForm = new ew.Form("fserviceslist", "list");
fserviceslist.formKeyCountName = '<?php echo $services_list->FormKeyCountName ?>';

// Form_CustomValidate event
fserviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fserviceslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fserviceslistsrch = currentSearchForm = new ew.Form("fserviceslistsrch");

// Filters
fserviceslistsrch.filterList = <?php echo $services_list->getFilterList() ?>;
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
<?php if (!$services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($services_list->TotalRecs > 0 && $services_list->ExportOptions->visible()) { ?>
<?php $services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($services_list->ImportOptions->visible()) { ?>
<?php $services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($services_list->SearchOptions->visible()) { ?>
<?php $services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($services_list->FilterOptions->visible()) { ?>
<?php $services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$services->isExport() && !$services->CurrentAction) { ?>
<form name="fserviceslistsrch" id="fserviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($services_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fserviceslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="services">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($services_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($services_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($services_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($services_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $services_list->showPageHeader(); ?>
<?php
$services_list->showMessage();
?>
<?php if ($services_list->TotalRecs > 0 || $services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> services">
<?php if (!$services->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($services_list->Pager)) $services_list->Pager = new NumericPager($services_list->StartRec, $services_list->DisplayRecs, $services_list->TotalRecs, $services_list->RecRange, $services_list->AutoHidePager) ?>
<?php if ($services_list->Pager->RecordCount > 0 && $services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($services_list->TotalRecs > 0 && (!$services_list->AutoHidePageSizeSelector || $services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fserviceslist" id="fserviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($services_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $services_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="services">
<div id="gmp_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($services_list->TotalRecs > 0 || $services->isGridEdit()) { ?>
<table id="tbl_serviceslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$services_list->RowType = ROWTYPE_HEADER;

// Render list options
$services_list->renderListOptions();

// Render list options (header, left)
$services_list->ListOptions->render("header", "left");
?>
<?php if ($services->Id->Visible) { // Id ?>
	<?php if ($services->sortUrl($services->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $services->Id->headerCellClass() ?>"><div id="elh_services_Id" class="services_Id"><div class="ew-table-header-caption"><?php echo $services->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $services->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $services->SortUrl($services->Id) ?>',1);"><div id="elh_services_Id" class="services_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $services->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($services->Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($services->Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($services->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($services->sortUrl($services->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $services->DEPARTMENT->headerCellClass() ?>"><div id="elh_services_DEPARTMENT" class="services_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $services->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $services->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $services->SortUrl($services->DEPARTMENT) ?>',1);"><div id="elh_services_DEPARTMENT" class="services_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $services->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($services->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($services->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($services->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($services->sortUrl($services->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $services->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_services_SERVICE_TYPE" class="services_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $services->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $services->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $services->SortUrl($services->SERVICE_TYPE) ?>',1);"><div id="elh_services_SERVICE_TYPE" class="services_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $services->SERVICE_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($services->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($services->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($services->SERVICE->Visible) { // SERVICE ?>
	<?php if ($services->sortUrl($services->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $services->SERVICE->headerCellClass() ?>"><div id="elh_services_SERVICE" class="services_SERVICE"><div class="ew-table-header-caption"><?php echo $services->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $services->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $services->SortUrl($services->SERVICE) ?>',1);"><div id="elh_services_SERVICE" class="services_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $services->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($services->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($services->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($services->CODE->Visible) { // CODE ?>
	<?php if ($services->sortUrl($services->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $services->CODE->headerCellClass() ?>"><div id="elh_services_CODE" class="services_CODE"><div class="ew-table-header-caption"><?php echo $services->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $services->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $services->SortUrl($services->CODE) ?>',1);"><div id="elh_services_CODE" class="services_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $services->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($services->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($services->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($services->AMOUNT->Visible) { // AMOUNT ?>
	<?php if ($services->sortUrl($services->AMOUNT) == "") { ?>
		<th data-name="AMOUNT" class="<?php echo $services->AMOUNT->headerCellClass() ?>"><div id="elh_services_AMOUNT" class="services_AMOUNT"><div class="ew-table-header-caption"><?php echo $services->AMOUNT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMOUNT" class="<?php echo $services->AMOUNT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $services->SortUrl($services->AMOUNT) ?>',1);"><div id="elh_services_AMOUNT" class="services_AMOUNT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $services->AMOUNT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($services->AMOUNT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($services->AMOUNT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$services_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($services->ExportAll && $services->isExport()) {
	$services_list->StopRec = $services_list->TotalRecs;
} else {

	// Set the last record to display
	if ($services_list->TotalRecs > $services_list->StartRec + $services_list->DisplayRecs - 1)
		$services_list->StopRec = $services_list->StartRec + $services_list->DisplayRecs - 1;
	else
		$services_list->StopRec = $services_list->TotalRecs;
}
$services_list->RecCnt = $services_list->StartRec - 1;
if ($services_list->Recordset && !$services_list->Recordset->EOF) {
	$services_list->Recordset->moveFirst();
	$selectLimit = $services_list->UseSelectLimit;
	if (!$selectLimit && $services_list->StartRec > 1)
		$services_list->Recordset->move($services_list->StartRec - 1);
} elseif (!$services->AllowAddDeleteRow && $services_list->StopRec == 0) {
	$services_list->StopRec = $services->GridAddRowCount;
}

// Initialize aggregate
$services->RowType = ROWTYPE_AGGREGATEINIT;
$services->resetAttributes();
$services_list->renderRow();
while ($services_list->RecCnt < $services_list->StopRec) {
	$services_list->RecCnt++;
	if ($services_list->RecCnt >= $services_list->StartRec) {
		$services_list->RowCnt++;

		// Set up key count
		$services_list->KeyCount = $services_list->RowIndex;

		// Init row class and style
		$services->resetAttributes();
		$services->CssClass = "";
		if ($services->isGridAdd()) {
		} else {
			$services_list->loadRowValues($services_list->Recordset); // Load row values
		}
		$services->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$services->RowAttrs = array_merge($services->RowAttrs, array('data-rowindex'=>$services_list->RowCnt, 'id'=>'r' . $services_list->RowCnt . '_services', 'data-rowtype'=>$services->RowType));

		// Render row
		$services_list->renderRow();

		// Render list options
		$services_list->renderListOptions();
?>
	<tr<?php echo $services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$services_list->ListOptions->render("body", "left", $services_list->RowCnt);
?>
	<?php if ($services->Id->Visible) { // Id ?>
		<td data-name="Id"<?php echo $services->Id->cellAttributes() ?>>
<span id="el<?php echo $services_list->RowCnt ?>_services_Id" class="services_Id">
<span<?php echo $services->Id->viewAttributes() ?>>
<?php echo $services->Id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($services->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $services->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $services_list->RowCnt ?>_services_DEPARTMENT" class="services_DEPARTMENT">
<span<?php echo $services->DEPARTMENT->viewAttributes() ?>>
<?php echo $services->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($services->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE"<?php echo $services->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $services_list->RowCnt ?>_services_SERVICE_TYPE" class="services_SERVICE_TYPE">
<span<?php echo $services->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $services->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($services->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE"<?php echo $services->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $services_list->RowCnt ?>_services_SERVICE" class="services_SERVICE">
<span<?php echo $services->SERVICE->viewAttributes() ?>>
<?php echo $services->SERVICE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($services->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $services->CODE->cellAttributes() ?>>
<span id="el<?php echo $services_list->RowCnt ?>_services_CODE" class="services_CODE">
<span<?php echo $services->CODE->viewAttributes() ?>>
<?php echo $services->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($services->AMOUNT->Visible) { // AMOUNT ?>
		<td data-name="AMOUNT"<?php echo $services->AMOUNT->cellAttributes() ?>>
<span id="el<?php echo $services_list->RowCnt ?>_services_AMOUNT" class="services_AMOUNT">
<span<?php echo $services->AMOUNT->viewAttributes() ?>>
<?php echo $services->AMOUNT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$services_list->ListOptions->render("body", "right", $services_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$services->isGridAdd())
		$services_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($services_list->Recordset)
	$services_list->Recordset->Close();
?>
<?php if (!$services->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($services_list->Pager)) $services_list->Pager = new NumericPager($services_list->StartRec, $services_list->DisplayRecs, $services_list->TotalRecs, $services_list->RecRange, $services_list->AutoHidePager) ?>
<?php if ($services_list->Pager->RecordCount > 0 && $services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $services_list->pageUrl() ?>start=<?php echo $services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($services_list->TotalRecs > 0 && (!$services_list->AutoHidePageSizeSelector || $services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($services_list->TotalRecs == 0 && !$services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$services_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$services_list->terminate();
?>