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
$pharmacy_master_generic_list = new pharmacy_master_generic_list();

// Run the page
$pharmacy_master_generic_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_generic_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_master_genericlist = currentForm = new ew.Form("fpharmacy_master_genericlist", "list");
fpharmacy_master_genericlist.formKeyCountName = '<?php echo $pharmacy_master_generic_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_master_genericlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_genericlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_master_genericlist.lists["x_GRPCODE"] = <?php echo $pharmacy_master_generic_list->GRPCODE->Lookup->toClientList() ?>;
fpharmacy_master_genericlist.lists["x_GRPCODE"].options = <?php echo JsonEncode($pharmacy_master_generic_list->GRPCODE->lookupOptions()) ?>;

// Form object for search
var fpharmacy_master_genericlistsrch = currentSearchForm = new ew.Form("fpharmacy_master_genericlistsrch");

// Filters
fpharmacy_master_genericlistsrch.filterList = <?php echo $pharmacy_master_generic_list->getFilterList() ?>;
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
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_master_generic_list->TotalRecs > 0 && $pharmacy_master_generic_list->ExportOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->ImportOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->SearchOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_generic_list->FilterOptions->visible()) { ?>
<?php $pharmacy_master_generic_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_master_generic_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_master_generic->isExport() && !$pharmacy_master_generic->CurrentAction) { ?>
<form name="fpharmacy_master_genericlistsrch" id="fpharmacy_master_genericlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_master_generic_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_master_genericlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_master_generic">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_master_generic_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_master_generic_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_master_generic_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_generic_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_master_generic_list->showPageHeader(); ?>
<?php
$pharmacy_master_generic_list->showMessage();
?>
<?php if ($pharmacy_master_generic_list->TotalRecs > 0 || $pharmacy_master_generic->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_master_generic_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_master_generic">
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_master_generic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_master_generic_list->Pager)) $pharmacy_master_generic_list->Pager = new NumericPager($pharmacy_master_generic_list->StartRec, $pharmacy_master_generic_list->DisplayRecs, $pharmacy_master_generic_list->TotalRecs, $pharmacy_master_generic_list->RecRange, $pharmacy_master_generic_list->AutoHidePager) ?>
<?php if ($pharmacy_master_generic_list->Pager->RecordCount > 0 && $pharmacy_master_generic_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_master_generic_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_master_generic_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_master_generic_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_master_generic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_master_generic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_master_generic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_master_generic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_master_generic_list->TotalRecs > 0 && (!$pharmacy_master_generic_list->AutoHidePageSizeSelector || $pharmacy_master_generic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_master_generic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_master_generic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_master_generic_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_master_generic_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_master_generic_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_master_generic_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_master_generic_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_master_generic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_generic_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_master_genericlist" id="fpharmacy_master_genericlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_generic_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_generic_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<div id="gmp_pharmacy_master_generic" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_master_generic_list->TotalRecs > 0 || $pharmacy_master_generic->isGridEdit()) { ?>
<table id="tbl_pharmacy_master_genericlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_master_generic_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_master_generic_list->renderListOptions();

// Render list options (header, left)
$pharmacy_master_generic_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_master_generic->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_master_generic->sortUrl($pharmacy_master_generic->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_generic->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_generic->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_generic->SortUrl($pharmacy_master_generic->GENNAME) ?>',1);"><div id="elh_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_generic->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_generic->CODE->Visible) { // CODE ?>
	<?php if ($pharmacy_master_generic->sortUrl($pharmacy_master_generic->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_generic->CODE->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_generic->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_generic->SortUrl($pharmacy_master_generic->CODE) ?>',1);"><div id="elh_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_generic->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_generic->GRPCODE->Visible) { // GRPCODE ?>
	<?php if ($pharmacy_master_generic->sortUrl($pharmacy_master_generic->GRPCODE) == "") { ?>
		<th data-name="GRPCODE" class="<?php echo $pharmacy_master_generic->GRPCODE->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic->GRPCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRPCODE" class="<?php echo $pharmacy_master_generic->GRPCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_generic->SortUrl($pharmacy_master_generic->GRPCODE) ?>',1);"><div id="elh_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic->GRPCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic->GRPCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_generic->GRPCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_generic->id->Visible) { // id ?>
	<?php if ($pharmacy_master_generic->sortUrl($pharmacy_master_generic->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_generic->id->headerCellClass() ?>"><div id="elh_pharmacy_master_generic_id" class="pharmacy_master_generic_id"><div class="ew-table-header-caption"><?php echo $pharmacy_master_generic->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_generic->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_generic->SortUrl($pharmacy_master_generic->id) ?>',1);"><div id="elh_pharmacy_master_generic_id" class="pharmacy_master_generic_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_generic->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_generic->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_generic->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_master_generic_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_master_generic->ExportAll && $pharmacy_master_generic->isExport()) {
	$pharmacy_master_generic_list->StopRec = $pharmacy_master_generic_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_master_generic_list->TotalRecs > $pharmacy_master_generic_list->StartRec + $pharmacy_master_generic_list->DisplayRecs - 1)
		$pharmacy_master_generic_list->StopRec = $pharmacy_master_generic_list->StartRec + $pharmacy_master_generic_list->DisplayRecs - 1;
	else
		$pharmacy_master_generic_list->StopRec = $pharmacy_master_generic_list->TotalRecs;
}
$pharmacy_master_generic_list->RecCnt = $pharmacy_master_generic_list->StartRec - 1;
if ($pharmacy_master_generic_list->Recordset && !$pharmacy_master_generic_list->Recordset->EOF) {
	$pharmacy_master_generic_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_master_generic_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_master_generic_list->StartRec > 1)
		$pharmacy_master_generic_list->Recordset->move($pharmacy_master_generic_list->StartRec - 1);
} elseif (!$pharmacy_master_generic->AllowAddDeleteRow && $pharmacy_master_generic_list->StopRec == 0) {
	$pharmacy_master_generic_list->StopRec = $pharmacy_master_generic->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_master_generic->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_master_generic->resetAttributes();
$pharmacy_master_generic_list->renderRow();
while ($pharmacy_master_generic_list->RecCnt < $pharmacy_master_generic_list->StopRec) {
	$pharmacy_master_generic_list->RecCnt++;
	if ($pharmacy_master_generic_list->RecCnt >= $pharmacy_master_generic_list->StartRec) {
		$pharmacy_master_generic_list->RowCnt++;

		// Set up key count
		$pharmacy_master_generic_list->KeyCount = $pharmacy_master_generic_list->RowIndex;

		// Init row class and style
		$pharmacy_master_generic->resetAttributes();
		$pharmacy_master_generic->CssClass = "";
		if ($pharmacy_master_generic->isGridAdd()) {
		} else {
			$pharmacy_master_generic_list->loadRowValues($pharmacy_master_generic_list->Recordset); // Load row values
		}
		$pharmacy_master_generic->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_master_generic->RowAttrs = array_merge($pharmacy_master_generic->RowAttrs, array('data-rowindex'=>$pharmacy_master_generic_list->RowCnt, 'id'=>'r' . $pharmacy_master_generic_list->RowCnt . '_pharmacy_master_generic', 'data-rowtype'=>$pharmacy_master_generic->RowType));

		// Render row
		$pharmacy_master_generic_list->renderRow();

		// Render list options
		$pharmacy_master_generic_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_master_generic->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_master_generic_list->ListOptions->render("body", "left", $pharmacy_master_generic_list->RowCnt);
?>
	<?php if ($pharmacy_master_generic->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $pharmacy_master_generic->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCnt ?>_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME">
<span<?php echo $pharmacy_master_generic->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_generic->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $pharmacy_master_generic->CODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCnt ?>_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE">
<span<?php echo $pharmacy_master_generic->CODE->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_generic->GRPCODE->Visible) { // GRPCODE ?>
		<td data-name="GRPCODE"<?php echo $pharmacy_master_generic->GRPCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCnt ?>_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE">
<span<?php echo $pharmacy_master_generic->GRPCODE->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->GRPCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_generic->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_master_generic->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_list->RowCnt ?>_pharmacy_master_generic_id" class="pharmacy_master_generic_id">
<span<?php echo $pharmacy_master_generic->id->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_master_generic_list->ListOptions->render("body", "right", $pharmacy_master_generic_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_master_generic->isGridAdd())
		$pharmacy_master_generic_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_master_generic->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_master_generic_list->Recordset)
	$pharmacy_master_generic_list->Recordset->Close();
?>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_master_generic->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_master_generic_list->Pager)) $pharmacy_master_generic_list->Pager = new NumericPager($pharmacy_master_generic_list->StartRec, $pharmacy_master_generic_list->DisplayRecs, $pharmacy_master_generic_list->TotalRecs, $pharmacy_master_generic_list->RecRange, $pharmacy_master_generic_list->AutoHidePager) ?>
<?php if ($pharmacy_master_generic_list->Pager->RecordCount > 0 && $pharmacy_master_generic_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_master_generic_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_master_generic_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_master_generic_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_generic_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_generic_list->pageUrl() ?>start=<?php echo $pharmacy_master_generic_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_master_generic_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_master_generic_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_master_generic_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_master_generic_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_master_generic_list->TotalRecs > 0 && (!$pharmacy_master_generic_list->AutoHidePageSizeSelector || $pharmacy_master_generic_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_master_generic">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_master_generic_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_master_generic_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_master_generic_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_master_generic_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_master_generic_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_master_generic_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_master_generic->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_generic_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_master_generic_list->TotalRecs == 0 && !$pharmacy_master_generic->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_generic_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_master_generic_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_master_generic->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_master_generic", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_generic_list->terminate();
?>