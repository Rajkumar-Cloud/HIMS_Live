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
$crm_leads_relation_list = new crm_leads_relation_list();

// Run the page
$crm_leads_relation_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leads_relation_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leads_relation->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_leads_relationlist = currentForm = new ew.Form("fcrm_leads_relationlist", "list");
fcrm_leads_relationlist.formKeyCountName = '<?php echo $crm_leads_relation_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_leads_relationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leads_relationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_leads_relationlistsrch = currentSearchForm = new ew.Form("fcrm_leads_relationlistsrch");

// Filters
fcrm_leads_relationlistsrch.filterList = <?php echo $crm_leads_relation_list->getFilterList() ?>;
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
<?php if (!$crm_leads_relation->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_leads_relation_list->TotalRecs > 0 && $crm_leads_relation_list->ExportOptions->visible()) { ?>
<?php $crm_leads_relation_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leads_relation_list->ImportOptions->visible()) { ?>
<?php $crm_leads_relation_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leads_relation_list->SearchOptions->visible()) { ?>
<?php $crm_leads_relation_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leads_relation_list->FilterOptions->visible()) { ?>
<?php $crm_leads_relation_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_leads_relation_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_leads_relation->isExport() && !$crm_leads_relation->CurrentAction) { ?>
<form name="fcrm_leads_relationlistsrch" id="fcrm_leads_relationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_leads_relation_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_leads_relationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leads_relation">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_leads_relation_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_leads_relation_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_leads_relation_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_leads_relation_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_leads_relation_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_leads_relation_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_leads_relation_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_leads_relation_list->showPageHeader(); ?>
<?php
$crm_leads_relation_list->showMessage();
?>
<?php if ($crm_leads_relation_list->TotalRecs > 0 || $crm_leads_relation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_leads_relation_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leads_relation">
<?php if (!$crm_leads_relation->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_leads_relation->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leads_relation_list->Pager)) $crm_leads_relation_list->Pager = new NumericPager($crm_leads_relation_list->StartRec, $crm_leads_relation_list->DisplayRecs, $crm_leads_relation_list->TotalRecs, $crm_leads_relation_list->RecRange, $crm_leads_relation_list->AutoHidePager) ?>
<?php if ($crm_leads_relation_list->Pager->RecordCount > 0 && $crm_leads_relation_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leads_relation_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leads_relation_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leads_relation_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leads_relation_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leads_relation_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leads_relation_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leads_relation_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leads_relation_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leads_relation_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leads_relation_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leads_relation_list->TotalRecs > 0 && (!$crm_leads_relation_list->AutoHidePageSizeSelector || $crm_leads_relation_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leads_relation">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leads_relation_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leads_relation_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leads_relation_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leads_relation_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leads_relation_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leads_relation_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leads_relation->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leads_relation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_leads_relationlist" id="fcrm_leads_relationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leads_relation_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leads_relation_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leads_relation">
<div id="gmp_crm_leads_relation" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_leads_relation_list->TotalRecs > 0 || $crm_leads_relation->isGridEdit()) { ?>
<table id="tbl_crm_leads_relationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_leads_relation_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_leads_relation_list->renderListOptions();

// Render list options (header, left)
$crm_leads_relation_list->ListOptions->render("header", "left");
?>
<?php if ($crm_leads_relation->leads_relationid->Visible) { // leads_relationid ?>
	<?php if ($crm_leads_relation->sortUrl($crm_leads_relation->leads_relationid) == "") { ?>
		<th data-name="leads_relationid" class="<?php echo $crm_leads_relation->leads_relationid->headerCellClass() ?>"><div id="elh_crm_leads_relation_leads_relationid" class="crm_leads_relation_leads_relationid"><div class="ew-table-header-caption"><?php echo $crm_leads_relation->leads_relationid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leads_relationid" class="<?php echo $crm_leads_relation->leads_relationid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leads_relation->SortUrl($crm_leads_relation->leads_relationid) ?>',1);"><div id="elh_crm_leads_relation_leads_relationid" class="crm_leads_relation_leads_relationid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leads_relation->leads_relationid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leads_relation->leads_relationid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leads_relation->leads_relationid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leads_relation->leads_relation->Visible) { // leads_relation ?>
	<?php if ($crm_leads_relation->sortUrl($crm_leads_relation->leads_relation) == "") { ?>
		<th data-name="leads_relation" class="<?php echo $crm_leads_relation->leads_relation->headerCellClass() ?>"><div id="elh_crm_leads_relation_leads_relation" class="crm_leads_relation_leads_relation"><div class="ew-table-header-caption"><?php echo $crm_leads_relation->leads_relation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leads_relation" class="<?php echo $crm_leads_relation->leads_relation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leads_relation->SortUrl($crm_leads_relation->leads_relation) ?>',1);"><div id="elh_crm_leads_relation_leads_relation" class="crm_leads_relation_leads_relation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leads_relation->leads_relation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leads_relation->leads_relation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leads_relation->leads_relation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leads_relation->sortorderid->Visible) { // sortorderid ?>
	<?php if ($crm_leads_relation->sortUrl($crm_leads_relation->sortorderid) == "") { ?>
		<th data-name="sortorderid" class="<?php echo $crm_leads_relation->sortorderid->headerCellClass() ?>"><div id="elh_crm_leads_relation_sortorderid" class="crm_leads_relation_sortorderid"><div class="ew-table-header-caption"><?php echo $crm_leads_relation->sortorderid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sortorderid" class="<?php echo $crm_leads_relation->sortorderid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leads_relation->SortUrl($crm_leads_relation->sortorderid) ?>',1);"><div id="elh_crm_leads_relation_sortorderid" class="crm_leads_relation_sortorderid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leads_relation->sortorderid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leads_relation->sortorderid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leads_relation->sortorderid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leads_relation->presence->Visible) { // presence ?>
	<?php if ($crm_leads_relation->sortUrl($crm_leads_relation->presence) == "") { ?>
		<th data-name="presence" class="<?php echo $crm_leads_relation->presence->headerCellClass() ?>"><div id="elh_crm_leads_relation_presence" class="crm_leads_relation_presence"><div class="ew-table-header-caption"><?php echo $crm_leads_relation->presence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="presence" class="<?php echo $crm_leads_relation->presence->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leads_relation->SortUrl($crm_leads_relation->presence) ?>',1);"><div id="elh_crm_leads_relation_presence" class="crm_leads_relation_presence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leads_relation->presence->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leads_relation->presence->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leads_relation->presence->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_leads_relation_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_leads_relation->ExportAll && $crm_leads_relation->isExport()) {
	$crm_leads_relation_list->StopRec = $crm_leads_relation_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_leads_relation_list->TotalRecs > $crm_leads_relation_list->StartRec + $crm_leads_relation_list->DisplayRecs - 1)
		$crm_leads_relation_list->StopRec = $crm_leads_relation_list->StartRec + $crm_leads_relation_list->DisplayRecs - 1;
	else
		$crm_leads_relation_list->StopRec = $crm_leads_relation_list->TotalRecs;
}
$crm_leads_relation_list->RecCnt = $crm_leads_relation_list->StartRec - 1;
if ($crm_leads_relation_list->Recordset && !$crm_leads_relation_list->Recordset->EOF) {
	$crm_leads_relation_list->Recordset->moveFirst();
	$selectLimit = $crm_leads_relation_list->UseSelectLimit;
	if (!$selectLimit && $crm_leads_relation_list->StartRec > 1)
		$crm_leads_relation_list->Recordset->move($crm_leads_relation_list->StartRec - 1);
} elseif (!$crm_leads_relation->AllowAddDeleteRow && $crm_leads_relation_list->StopRec == 0) {
	$crm_leads_relation_list->StopRec = $crm_leads_relation->GridAddRowCount;
}

// Initialize aggregate
$crm_leads_relation->RowType = ROWTYPE_AGGREGATEINIT;
$crm_leads_relation->resetAttributes();
$crm_leads_relation_list->renderRow();
while ($crm_leads_relation_list->RecCnt < $crm_leads_relation_list->StopRec) {
	$crm_leads_relation_list->RecCnt++;
	if ($crm_leads_relation_list->RecCnt >= $crm_leads_relation_list->StartRec) {
		$crm_leads_relation_list->RowCnt++;

		// Set up key count
		$crm_leads_relation_list->KeyCount = $crm_leads_relation_list->RowIndex;

		// Init row class and style
		$crm_leads_relation->resetAttributes();
		$crm_leads_relation->CssClass = "";
		if ($crm_leads_relation->isGridAdd()) {
		} else {
			$crm_leads_relation_list->loadRowValues($crm_leads_relation_list->Recordset); // Load row values
		}
		$crm_leads_relation->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_leads_relation->RowAttrs = array_merge($crm_leads_relation->RowAttrs, array('data-rowindex'=>$crm_leads_relation_list->RowCnt, 'id'=>'r' . $crm_leads_relation_list->RowCnt . '_crm_leads_relation', 'data-rowtype'=>$crm_leads_relation->RowType));

		// Render row
		$crm_leads_relation_list->renderRow();

		// Render list options
		$crm_leads_relation_list->renderListOptions();
?>
	<tr<?php echo $crm_leads_relation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_leads_relation_list->ListOptions->render("body", "left", $crm_leads_relation_list->RowCnt);
?>
	<?php if ($crm_leads_relation->leads_relationid->Visible) { // leads_relationid ?>
		<td data-name="leads_relationid"<?php echo $crm_leads_relation->leads_relationid->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_list->RowCnt ?>_crm_leads_relation_leads_relationid" class="crm_leads_relation_leads_relationid">
<span<?php echo $crm_leads_relation->leads_relationid->viewAttributes() ?>>
<?php echo $crm_leads_relation->leads_relationid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leads_relation->leads_relation->Visible) { // leads_relation ?>
		<td data-name="leads_relation"<?php echo $crm_leads_relation->leads_relation->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_list->RowCnt ?>_crm_leads_relation_leads_relation" class="crm_leads_relation_leads_relation">
<span<?php echo $crm_leads_relation->leads_relation->viewAttributes() ?>>
<?php echo $crm_leads_relation->leads_relation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leads_relation->sortorderid->Visible) { // sortorderid ?>
		<td data-name="sortorderid"<?php echo $crm_leads_relation->sortorderid->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_list->RowCnt ?>_crm_leads_relation_sortorderid" class="crm_leads_relation_sortorderid">
<span<?php echo $crm_leads_relation->sortorderid->viewAttributes() ?>>
<?php echo $crm_leads_relation->sortorderid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leads_relation->presence->Visible) { // presence ?>
		<td data-name="presence"<?php echo $crm_leads_relation->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_leads_relation_list->RowCnt ?>_crm_leads_relation_presence" class="crm_leads_relation_presence">
<span<?php echo $crm_leads_relation->presence->viewAttributes() ?>>
<?php echo $crm_leads_relation->presence->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_leads_relation_list->ListOptions->render("body", "right", $crm_leads_relation_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_leads_relation->isGridAdd())
		$crm_leads_relation_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_leads_relation->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_leads_relation_list->Recordset)
	$crm_leads_relation_list->Recordset->Close();
?>
<?php if (!$crm_leads_relation->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_leads_relation->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leads_relation_list->Pager)) $crm_leads_relation_list->Pager = new NumericPager($crm_leads_relation_list->StartRec, $crm_leads_relation_list->DisplayRecs, $crm_leads_relation_list->TotalRecs, $crm_leads_relation_list->RecRange, $crm_leads_relation_list->AutoHidePager) ?>
<?php if ($crm_leads_relation_list->Pager->RecordCount > 0 && $crm_leads_relation_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leads_relation_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leads_relation_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leads_relation_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leads_relation_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leads_relation_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leads_relation_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leads_relation_list->pageUrl() ?>start=<?php echo $crm_leads_relation_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leads_relation_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leads_relation_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leads_relation_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leads_relation_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leads_relation_list->TotalRecs > 0 && (!$crm_leads_relation_list->AutoHidePageSizeSelector || $crm_leads_relation_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leads_relation">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leads_relation_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leads_relation_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leads_relation_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leads_relation_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leads_relation_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leads_relation_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leads_relation->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leads_relation_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_leads_relation_list->TotalRecs == 0 && !$crm_leads_relation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_leads_relation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_leads_relation_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leads_relation->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_leads_relation->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_leads_relation", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leads_relation_list->terminate();
?>