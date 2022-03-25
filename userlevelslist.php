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
$userlevels_list = new userlevels_list();

// Run the page
$userlevels_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$userlevels_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$userlevels->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fuserlevelslist = currentForm = new ew.Form("fuserlevelslist", "list");
fuserlevelslist.formKeyCountName = '<?php echo $userlevels_list->FormKeyCountName ?>';

// Form_CustomValidate event
fuserlevelslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuserlevelslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fuserlevelslistsrch = currentSearchForm = new ew.Form("fuserlevelslistsrch");

// Filters
fuserlevelslistsrch.filterList = <?php echo $userlevels_list->getFilterList() ?>;
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
<?php if (!$userlevels->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($userlevels_list->TotalRecs > 0 && $userlevels_list->ExportOptions->visible()) { ?>
<?php $userlevels_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($userlevels_list->ImportOptions->visible()) { ?>
<?php $userlevels_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($userlevels_list->SearchOptions->visible()) { ?>
<?php $userlevels_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($userlevels_list->FilterOptions->visible()) { ?>
<?php $userlevels_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$userlevels_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$userlevels->isExport() && !$userlevels->CurrentAction) { ?>
<form name="fuserlevelslistsrch" id="fuserlevelslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($userlevels_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fuserlevelslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="userlevels">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($userlevels_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($userlevels_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $userlevels_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($userlevels_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($userlevels_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($userlevels_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($userlevels_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $userlevels_list->showPageHeader(); ?>
<?php
$userlevels_list->showMessage();
?>
<?php if ($userlevels_list->TotalRecs > 0 || $userlevels->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($userlevels_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> userlevels">
<?php if (!$userlevels->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$userlevels->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($userlevels_list->Pager)) $userlevels_list->Pager = new NumericPager($userlevels_list->StartRec, $userlevels_list->DisplayRecs, $userlevels_list->TotalRecs, $userlevels_list->RecRange, $userlevels_list->AutoHidePager) ?>
<?php if ($userlevels_list->Pager->RecordCount > 0 && $userlevels_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($userlevels_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($userlevels_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($userlevels_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $userlevels_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($userlevels_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($userlevels_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($userlevels_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $userlevels_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $userlevels_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $userlevels_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($userlevels_list->TotalRecs > 0 && (!$userlevels_list->AutoHidePageSizeSelector || $userlevels_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="userlevels">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($userlevels_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($userlevels_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($userlevels_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($userlevels_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($userlevels_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($userlevels_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($userlevels->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $userlevels_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fuserlevelslist" id="fuserlevelslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($userlevels_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $userlevels_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="userlevels">
<div id="gmp_userlevels" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($userlevels_list->TotalRecs > 0 || $userlevels->isGridEdit()) { ?>
<table id="tbl_userlevelslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$userlevels_list->RowType = ROWTYPE_HEADER;

// Render list options
$userlevels_list->renderListOptions();

// Render list options (header, left)
$userlevels_list->ListOptions->render("header", "left");
?>
<?php if ($userlevels->id->Visible) { // id ?>
	<?php if ($userlevels->sortUrl($userlevels->id) == "") { ?>
		<th data-name="id" class="<?php echo $userlevels->id->headerCellClass() ?>"><div id="elh_userlevels_id" class="userlevels_id"><div class="ew-table-header-caption"><?php echo $userlevels->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $userlevels->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $userlevels->SortUrl($userlevels->id) ?>',1);"><div id="elh_userlevels_id" class="userlevels_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevels->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($userlevels->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($userlevels->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($userlevels->UserLevelsName->Visible) { // UserLevelsName ?>
	<?php if ($userlevels->sortUrl($userlevels->UserLevelsName) == "") { ?>
		<th data-name="UserLevelsName" class="<?php echo $userlevels->UserLevelsName->headerCellClass() ?>"><div id="elh_userlevels_UserLevelsName" class="userlevels_UserLevelsName"><div class="ew-table-header-caption"><?php echo $userlevels->UserLevelsName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserLevelsName" class="<?php echo $userlevels->UserLevelsName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $userlevels->SortUrl($userlevels->UserLevelsName) ?>',1);"><div id="elh_userlevels_UserLevelsName" class="userlevels_UserLevelsName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevels->UserLevelsName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($userlevels->UserLevelsName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($userlevels->UserLevelsName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$userlevels_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($userlevels->ExportAll && $userlevels->isExport()) {
	$userlevels_list->StopRec = $userlevels_list->TotalRecs;
} else {

	// Set the last record to display
	if ($userlevels_list->TotalRecs > $userlevels_list->StartRec + $userlevels_list->DisplayRecs - 1)
		$userlevels_list->StopRec = $userlevels_list->StartRec + $userlevels_list->DisplayRecs - 1;
	else
		$userlevels_list->StopRec = $userlevels_list->TotalRecs;
}
$userlevels_list->RecCnt = $userlevels_list->StartRec - 1;
if ($userlevels_list->Recordset && !$userlevels_list->Recordset->EOF) {
	$userlevels_list->Recordset->moveFirst();
	$selectLimit = $userlevels_list->UseSelectLimit;
	if (!$selectLimit && $userlevels_list->StartRec > 1)
		$userlevels_list->Recordset->move($userlevels_list->StartRec - 1);
} elseif (!$userlevels->AllowAddDeleteRow && $userlevels_list->StopRec == 0) {
	$userlevels_list->StopRec = $userlevels->GridAddRowCount;
}

// Initialize aggregate
$userlevels->RowType = ROWTYPE_AGGREGATEINIT;
$userlevels->resetAttributes();
$userlevels_list->renderRow();
while ($userlevels_list->RecCnt < $userlevels_list->StopRec) {
	$userlevels_list->RecCnt++;
	if ($userlevels_list->RecCnt >= $userlevels_list->StartRec) {
		$userlevels_list->RowCnt++;

		// Set up key count
		$userlevels_list->KeyCount = $userlevels_list->RowIndex;

		// Init row class and style
		$userlevels->resetAttributes();
		$userlevels->CssClass = "";
		if ($userlevels->isGridAdd()) {
		} else {
			$userlevels_list->loadRowValues($userlevels_list->Recordset); // Load row values
		}
		$userlevels->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$userlevels->RowAttrs = array_merge($userlevels->RowAttrs, array('data-rowindex'=>$userlevels_list->RowCnt, 'id'=>'r' . $userlevels_list->RowCnt . '_userlevels', 'data-rowtype'=>$userlevels->RowType));

		// Render row
		$userlevels_list->renderRow();

		// Render list options
		$userlevels_list->renderListOptions();
?>
	<tr<?php echo $userlevels->rowAttributes() ?>>
<?php

// Render list options (body, left)
$userlevels_list->ListOptions->render("body", "left", $userlevels_list->RowCnt);
?>
	<?php if ($userlevels->id->Visible) { // id ?>
		<td data-name="id"<?php echo $userlevels->id->cellAttributes() ?>>
<span id="el<?php echo $userlevels_list->RowCnt ?>_userlevels_id" class="userlevels_id">
<span<?php echo $userlevels->id->viewAttributes() ?>>
<?php echo $userlevels->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($userlevels->UserLevelsName->Visible) { // UserLevelsName ?>
		<td data-name="UserLevelsName"<?php echo $userlevels->UserLevelsName->cellAttributes() ?>>
<span id="el<?php echo $userlevels_list->RowCnt ?>_userlevels_UserLevelsName" class="userlevels_UserLevelsName">
<span<?php echo $userlevels->UserLevelsName->viewAttributes() ?>>
<?php echo $userlevels->UserLevelsName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$userlevels_list->ListOptions->render("body", "right", $userlevels_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$userlevels->isGridAdd())
		$userlevels_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$userlevels->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($userlevels_list->Recordset)
	$userlevels_list->Recordset->Close();
?>
<?php if (!$userlevels->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$userlevels->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($userlevels_list->Pager)) $userlevels_list->Pager = new NumericPager($userlevels_list->StartRec, $userlevels_list->DisplayRecs, $userlevels_list->TotalRecs, $userlevels_list->RecRange, $userlevels_list->AutoHidePager) ?>
<?php if ($userlevels_list->Pager->RecordCount > 0 && $userlevels_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($userlevels_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($userlevels_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($userlevels_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $userlevels_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($userlevels_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($userlevels_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevels_list->pageUrl() ?>start=<?php echo $userlevels_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($userlevels_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $userlevels_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $userlevels_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $userlevels_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($userlevels_list->TotalRecs > 0 && (!$userlevels_list->AutoHidePageSizeSelector || $userlevels_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="userlevels">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($userlevels_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($userlevels_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($userlevels_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($userlevels_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($userlevels_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($userlevels_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($userlevels->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $userlevels_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($userlevels_list->TotalRecs == 0 && !$userlevels->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $userlevels_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$userlevels_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$userlevels->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$userlevels->isExport()) { ?>
<script>
ew.scrollableTable("gmp_userlevels", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$userlevels_list->terminate();
?>