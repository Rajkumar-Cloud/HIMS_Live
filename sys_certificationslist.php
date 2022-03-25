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
$sys_certifications_list = new sys_certifications_list();

// Run the page
$sys_certifications_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_certifications_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_certifications->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsys_certificationslist = currentForm = new ew.Form("fsys_certificationslist", "list");
fsys_certificationslist.formKeyCountName = '<?php echo $sys_certifications_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsys_certificationslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_certificationslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsys_certificationslistsrch = currentSearchForm = new ew.Form("fsys_certificationslistsrch");

// Filters
fsys_certificationslistsrch.filterList = <?php echo $sys_certifications_list->getFilterList() ?>;
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
<?php if (!$sys_certifications->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sys_certifications_list->TotalRecs > 0 && $sys_certifications_list->ExportOptions->visible()) { ?>
<?php $sys_certifications_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_certifications_list->ImportOptions->visible()) { ?>
<?php $sys_certifications_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_certifications_list->SearchOptions->visible()) { ?>
<?php $sys_certifications_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sys_certifications_list->FilterOptions->visible()) { ?>
<?php $sys_certifications_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sys_certifications_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sys_certifications->isExport() && !$sys_certifications->CurrentAction) { ?>
<form name="fsys_certificationslistsrch" id="fsys_certificationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sys_certifications_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsys_certificationslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sys_certifications">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sys_certifications_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sys_certifications_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sys_certifications_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sys_certifications_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sys_certifications_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sys_certifications_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sys_certifications_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $sys_certifications_list->showPageHeader(); ?>
<?php
$sys_certifications_list->showMessage();
?>
<?php if ($sys_certifications_list->TotalRecs > 0 || $sys_certifications->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sys_certifications_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sys_certifications">
<?php if (!$sys_certifications->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sys_certifications->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_certifications_list->Pager)) $sys_certifications_list->Pager = new NumericPager($sys_certifications_list->StartRec, $sys_certifications_list->DisplayRecs, $sys_certifications_list->TotalRecs, $sys_certifications_list->RecRange, $sys_certifications_list->AutoHidePager) ?>
<?php if ($sys_certifications_list->Pager->RecordCount > 0 && $sys_certifications_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_certifications_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_certifications_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_certifications_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_certifications_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_certifications_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_certifications_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_certifications_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_certifications_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_certifications_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_certifications_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_certifications_list->TotalRecs > 0 && (!$sys_certifications_list->AutoHidePageSizeSelector || $sys_certifications_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_certifications">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_certifications_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_certifications_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_certifications_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_certifications_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_certifications_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_certifications_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_certifications->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_certifications_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsys_certificationslist" id="fsys_certificationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_certifications_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_certifications_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_certifications">
<div id="gmp_sys_certifications" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sys_certifications_list->TotalRecs > 0 || $sys_certifications->isGridEdit()) { ?>
<table id="tbl_sys_certificationslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sys_certifications_list->RowType = ROWTYPE_HEADER;

// Render list options
$sys_certifications_list->renderListOptions();

// Render list options (header, left)
$sys_certifications_list->ListOptions->render("header", "left");
?>
<?php if ($sys_certifications->id->Visible) { // id ?>
	<?php if ($sys_certifications->sortUrl($sys_certifications->id) == "") { ?>
		<th data-name="id" class="<?php echo $sys_certifications->id->headerCellClass() ?>"><div id="elh_sys_certifications_id" class="sys_certifications_id"><div class="ew-table-header-caption"><?php echo $sys_certifications->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sys_certifications->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_certifications->SortUrl($sys_certifications->id) ?>',1);"><div id="elh_sys_certifications_id" class="sys_certifications_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_certifications->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_certifications->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_certifications->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_certifications->name->Visible) { // name ?>
	<?php if ($sys_certifications->sortUrl($sys_certifications->name) == "") { ?>
		<th data-name="name" class="<?php echo $sys_certifications->name->headerCellClass() ?>"><div id="elh_sys_certifications_name" class="sys_certifications_name"><div class="ew-table-header-caption"><?php echo $sys_certifications->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $sys_certifications->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_certifications->SortUrl($sys_certifications->name) ?>',1);"><div id="elh_sys_certifications_name" class="sys_certifications_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_certifications->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_certifications->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_certifications->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_certifications->description->Visible) { // description ?>
	<?php if ($sys_certifications->sortUrl($sys_certifications->description) == "") { ?>
		<th data-name="description" class="<?php echo $sys_certifications->description->headerCellClass() ?>"><div id="elh_sys_certifications_description" class="sys_certifications_description"><div class="ew-table-header-caption"><?php echo $sys_certifications->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $sys_certifications->description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_certifications->SortUrl($sys_certifications->description) ?>',1);"><div id="elh_sys_certifications_description" class="sys_certifications_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_certifications->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_certifications->description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_certifications->description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_certifications->HospID->Visible) { // HospID ?>
	<?php if ($sys_certifications->sortUrl($sys_certifications->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $sys_certifications->HospID->headerCellClass() ?>"><div id="elh_sys_certifications_HospID" class="sys_certifications_HospID"><div class="ew-table-header-caption"><?php echo $sys_certifications->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $sys_certifications->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_certifications->SortUrl($sys_certifications->HospID) ?>',1);"><div id="elh_sys_certifications_HospID" class="sys_certifications_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_certifications->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_certifications->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_certifications->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sys_certifications_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sys_certifications->ExportAll && $sys_certifications->isExport()) {
	$sys_certifications_list->StopRec = $sys_certifications_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sys_certifications_list->TotalRecs > $sys_certifications_list->StartRec + $sys_certifications_list->DisplayRecs - 1)
		$sys_certifications_list->StopRec = $sys_certifications_list->StartRec + $sys_certifications_list->DisplayRecs - 1;
	else
		$sys_certifications_list->StopRec = $sys_certifications_list->TotalRecs;
}
$sys_certifications_list->RecCnt = $sys_certifications_list->StartRec - 1;
if ($sys_certifications_list->Recordset && !$sys_certifications_list->Recordset->EOF) {
	$sys_certifications_list->Recordset->moveFirst();
	$selectLimit = $sys_certifications_list->UseSelectLimit;
	if (!$selectLimit && $sys_certifications_list->StartRec > 1)
		$sys_certifications_list->Recordset->move($sys_certifications_list->StartRec - 1);
} elseif (!$sys_certifications->AllowAddDeleteRow && $sys_certifications_list->StopRec == 0) {
	$sys_certifications_list->StopRec = $sys_certifications->GridAddRowCount;
}

// Initialize aggregate
$sys_certifications->RowType = ROWTYPE_AGGREGATEINIT;
$sys_certifications->resetAttributes();
$sys_certifications_list->renderRow();
while ($sys_certifications_list->RecCnt < $sys_certifications_list->StopRec) {
	$sys_certifications_list->RecCnt++;
	if ($sys_certifications_list->RecCnt >= $sys_certifications_list->StartRec) {
		$sys_certifications_list->RowCnt++;

		// Set up key count
		$sys_certifications_list->KeyCount = $sys_certifications_list->RowIndex;

		// Init row class and style
		$sys_certifications->resetAttributes();
		$sys_certifications->CssClass = "";
		if ($sys_certifications->isGridAdd()) {
		} else {
			$sys_certifications_list->loadRowValues($sys_certifications_list->Recordset); // Load row values
		}
		$sys_certifications->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sys_certifications->RowAttrs = array_merge($sys_certifications->RowAttrs, array('data-rowindex'=>$sys_certifications_list->RowCnt, 'id'=>'r' . $sys_certifications_list->RowCnt . '_sys_certifications', 'data-rowtype'=>$sys_certifications->RowType));

		// Render row
		$sys_certifications_list->renderRow();

		// Render list options
		$sys_certifications_list->renderListOptions();
?>
	<tr<?php echo $sys_certifications->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sys_certifications_list->ListOptions->render("body", "left", $sys_certifications_list->RowCnt);
?>
	<?php if ($sys_certifications->id->Visible) { // id ?>
		<td data-name="id"<?php echo $sys_certifications->id->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_list->RowCnt ?>_sys_certifications_id" class="sys_certifications_id">
<span<?php echo $sys_certifications->id->viewAttributes() ?>>
<?php echo $sys_certifications->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_certifications->name->Visible) { // name ?>
		<td data-name="name"<?php echo $sys_certifications->name->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_list->RowCnt ?>_sys_certifications_name" class="sys_certifications_name">
<span<?php echo $sys_certifications->name->viewAttributes() ?>>
<?php echo $sys_certifications->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_certifications->description->Visible) { // description ?>
		<td data-name="description"<?php echo $sys_certifications->description->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_list->RowCnt ?>_sys_certifications_description" class="sys_certifications_description">
<span<?php echo $sys_certifications->description->viewAttributes() ?>>
<?php echo $sys_certifications->description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_certifications->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $sys_certifications->HospID->cellAttributes() ?>>
<span id="el<?php echo $sys_certifications_list->RowCnt ?>_sys_certifications_HospID" class="sys_certifications_HospID">
<span<?php echo $sys_certifications->HospID->viewAttributes() ?>>
<?php echo $sys_certifications->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sys_certifications_list->ListOptions->render("body", "right", $sys_certifications_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sys_certifications->isGridAdd())
		$sys_certifications_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sys_certifications->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sys_certifications_list->Recordset)
	$sys_certifications_list->Recordset->Close();
?>
<?php if (!$sys_certifications->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sys_certifications->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_certifications_list->Pager)) $sys_certifications_list->Pager = new NumericPager($sys_certifications_list->StartRec, $sys_certifications_list->DisplayRecs, $sys_certifications_list->TotalRecs, $sys_certifications_list->RecRange, $sys_certifications_list->AutoHidePager) ?>
<?php if ($sys_certifications_list->Pager->RecordCount > 0 && $sys_certifications_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_certifications_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_certifications_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_certifications_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_certifications_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_certifications_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_certifications_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_certifications_list->pageUrl() ?>start=<?php echo $sys_certifications_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_certifications_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_certifications_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_certifications_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_certifications_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_certifications_list->TotalRecs > 0 && (!$sys_certifications_list->AutoHidePageSizeSelector || $sys_certifications_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_certifications">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_certifications_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_certifications_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_certifications_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_certifications_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_certifications_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_certifications_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_certifications->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_certifications_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sys_certifications_list->TotalRecs == 0 && !$sys_certifications->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sys_certifications_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sys_certifications_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_certifications->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$sys_certifications->isExport()) { ?>
<script>
ew.scrollableTable("gmp_sys_certifications", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_certifications_list->terminate();
?>