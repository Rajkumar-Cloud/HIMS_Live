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
$ivf_mas_template_type_list = new ivf_mas_template_type_list();

// Run the page
$ivf_mas_template_type_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_template_type_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_mas_template_typelist = currentForm = new ew.Form("fivf_mas_template_typelist", "list");
fivf_mas_template_typelist.formKeyCountName = '<?php echo $ivf_mas_template_type_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_mas_template_typelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_template_typelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fivf_mas_template_typelistsrch = currentSearchForm = new ew.Form("fivf_mas_template_typelistsrch");

// Filters
fivf_mas_template_typelistsrch.filterList = <?php echo $ivf_mas_template_type_list->getFilterList() ?>;
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
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_mas_template_type_list->TotalRecs > 0 && $ivf_mas_template_type_list->ExportOptions->visible()) { ?>
<?php $ivf_mas_template_type_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_template_type_list->ImportOptions->visible()) { ?>
<?php $ivf_mas_template_type_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_template_type_list->SearchOptions->visible()) { ?>
<?php $ivf_mas_template_type_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_mas_template_type_list->FilterOptions->visible()) { ?>
<?php $ivf_mas_template_type_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_mas_template_type_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_mas_template_type->isExport() && !$ivf_mas_template_type->CurrentAction) { ?>
<form name="fivf_mas_template_typelistsrch" id="fivf_mas_template_typelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_mas_template_type_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_mas_template_typelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_mas_template_type">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_mas_template_type_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_mas_template_type_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_mas_template_type_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_mas_template_type_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_template_type_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_template_type_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_mas_template_type_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_mas_template_type_list->showPageHeader(); ?>
<?php
$ivf_mas_template_type_list->showMessage();
?>
<?php if ($ivf_mas_template_type_list->TotalRecs > 0 || $ivf_mas_template_type->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_mas_template_type_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_mas_template_type">
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_mas_template_type->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_mas_template_type_list->Pager)) $ivf_mas_template_type_list->Pager = new NumericPager($ivf_mas_template_type_list->StartRec, $ivf_mas_template_type_list->DisplayRecs, $ivf_mas_template_type_list->TotalRecs, $ivf_mas_template_type_list->RecRange, $ivf_mas_template_type_list->AutoHidePager) ?>
<?php if ($ivf_mas_template_type_list->Pager->RecordCount > 0 && $ivf_mas_template_type_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_mas_template_type_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_mas_template_type_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_mas_template_type_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_mas_template_type_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_mas_template_type_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_mas_template_type_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_mas_template_type_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_mas_template_type_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_mas_template_type_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_mas_template_type_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_mas_template_type_list->TotalRecs > 0 && (!$ivf_mas_template_type_list->AutoHidePageSizeSelector || $ivf_mas_template_type_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_mas_template_type">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_mas_template_type_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_mas_template_type_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_mas_template_type_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_mas_template_type_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_mas_template_type_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_mas_template_type_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_mas_template_type->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_mas_template_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_mas_template_typelist" id="fivf_mas_template_typelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_mas_template_type_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_template_type_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_template_type">
<div id="gmp_ivf_mas_template_type" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_mas_template_type_list->TotalRecs > 0 || $ivf_mas_template_type->isGridEdit()) { ?>
<table id="tbl_ivf_mas_template_typelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_mas_template_type_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_mas_template_type_list->renderListOptions();

// Render list options (header, left)
$ivf_mas_template_type_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_mas_template_type->id->Visible) { // id ?>
	<?php if ($ivf_mas_template_type->sortUrl($ivf_mas_template_type->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_mas_template_type->id->headerCellClass() ?>"><div id="elh_ivf_mas_template_type_id" class="ivf_mas_template_type_id"><div class="ew-table-header-caption"><?php echo $ivf_mas_template_type->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_mas_template_type->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_mas_template_type->SortUrl($ivf_mas_template_type->id) ?>',1);"><div id="elh_ivf_mas_template_type_id" class="ivf_mas_template_type_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_template_type->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_template_type->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_mas_template_type->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_mas_template_type->TemplateName->Visible) { // TemplateName ?>
	<?php if ($ivf_mas_template_type->sortUrl($ivf_mas_template_type->TemplateName) == "") { ?>
		<th data-name="TemplateName" class="<?php echo $ivf_mas_template_type->TemplateName->headerCellClass() ?>"><div id="elh_ivf_mas_template_type_TemplateName" class="ivf_mas_template_type_TemplateName"><div class="ew-table-header-caption"><?php echo $ivf_mas_template_type->TemplateName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateName" class="<?php echo $ivf_mas_template_type->TemplateName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_mas_template_type->SortUrl($ivf_mas_template_type->TemplateName) ?>',1);"><div id="elh_ivf_mas_template_type_TemplateName" class="ivf_mas_template_type_TemplateName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_mas_template_type->TemplateName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_mas_template_type->TemplateName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_mas_template_type->TemplateName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_mas_template_type_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_mas_template_type->ExportAll && $ivf_mas_template_type->isExport()) {
	$ivf_mas_template_type_list->StopRec = $ivf_mas_template_type_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_mas_template_type_list->TotalRecs > $ivf_mas_template_type_list->StartRec + $ivf_mas_template_type_list->DisplayRecs - 1)
		$ivf_mas_template_type_list->StopRec = $ivf_mas_template_type_list->StartRec + $ivf_mas_template_type_list->DisplayRecs - 1;
	else
		$ivf_mas_template_type_list->StopRec = $ivf_mas_template_type_list->TotalRecs;
}
$ivf_mas_template_type_list->RecCnt = $ivf_mas_template_type_list->StartRec - 1;
if ($ivf_mas_template_type_list->Recordset && !$ivf_mas_template_type_list->Recordset->EOF) {
	$ivf_mas_template_type_list->Recordset->moveFirst();
	$selectLimit = $ivf_mas_template_type_list->UseSelectLimit;
	if (!$selectLimit && $ivf_mas_template_type_list->StartRec > 1)
		$ivf_mas_template_type_list->Recordset->move($ivf_mas_template_type_list->StartRec - 1);
} elseif (!$ivf_mas_template_type->AllowAddDeleteRow && $ivf_mas_template_type_list->StopRec == 0) {
	$ivf_mas_template_type_list->StopRec = $ivf_mas_template_type->GridAddRowCount;
}

// Initialize aggregate
$ivf_mas_template_type->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_mas_template_type->resetAttributes();
$ivf_mas_template_type_list->renderRow();
while ($ivf_mas_template_type_list->RecCnt < $ivf_mas_template_type_list->StopRec) {
	$ivf_mas_template_type_list->RecCnt++;
	if ($ivf_mas_template_type_list->RecCnt >= $ivf_mas_template_type_list->StartRec) {
		$ivf_mas_template_type_list->RowCnt++;

		// Set up key count
		$ivf_mas_template_type_list->KeyCount = $ivf_mas_template_type_list->RowIndex;

		// Init row class and style
		$ivf_mas_template_type->resetAttributes();
		$ivf_mas_template_type->CssClass = "";
		if ($ivf_mas_template_type->isGridAdd()) {
		} else {
			$ivf_mas_template_type_list->loadRowValues($ivf_mas_template_type_list->Recordset); // Load row values
		}
		$ivf_mas_template_type->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_mas_template_type->RowAttrs = array_merge($ivf_mas_template_type->RowAttrs, array('data-rowindex'=>$ivf_mas_template_type_list->RowCnt, 'id'=>'r' . $ivf_mas_template_type_list->RowCnt . '_ivf_mas_template_type', 'data-rowtype'=>$ivf_mas_template_type->RowType));

		// Render row
		$ivf_mas_template_type_list->renderRow();

		// Render list options
		$ivf_mas_template_type_list->renderListOptions();
?>
	<tr<?php echo $ivf_mas_template_type->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_mas_template_type_list->ListOptions->render("body", "left", $ivf_mas_template_type_list->RowCnt);
?>
	<?php if ($ivf_mas_template_type->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_mas_template_type->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_template_type_list->RowCnt ?>_ivf_mas_template_type_id" class="ivf_mas_template_type_id">
<span<?php echo $ivf_mas_template_type->id->viewAttributes() ?>>
<?php echo $ivf_mas_template_type->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_mas_template_type->TemplateName->Visible) { // TemplateName ?>
		<td data-name="TemplateName"<?php echo $ivf_mas_template_type->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_template_type_list->RowCnt ?>_ivf_mas_template_type_TemplateName" class="ivf_mas_template_type_TemplateName">
<span<?php echo $ivf_mas_template_type->TemplateName->viewAttributes() ?>>
<?php echo $ivf_mas_template_type->TemplateName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_mas_template_type_list->ListOptions->render("body", "right", $ivf_mas_template_type_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_mas_template_type->isGridAdd())
		$ivf_mas_template_type_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_mas_template_type->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_mas_template_type_list->Recordset)
	$ivf_mas_template_type_list->Recordset->Close();
?>
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_mas_template_type->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_mas_template_type_list->Pager)) $ivf_mas_template_type_list->Pager = new NumericPager($ivf_mas_template_type_list->StartRec, $ivf_mas_template_type_list->DisplayRecs, $ivf_mas_template_type_list->TotalRecs, $ivf_mas_template_type_list->RecRange, $ivf_mas_template_type_list->AutoHidePager) ?>
<?php if ($ivf_mas_template_type_list->Pager->RecordCount > 0 && $ivf_mas_template_type_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_mas_template_type_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_mas_template_type_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_mas_template_type_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_mas_template_type_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_mas_template_type_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_mas_template_type_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_mas_template_type_list->pageUrl() ?>start=<?php echo $ivf_mas_template_type_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_mas_template_type_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_mas_template_type_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_mas_template_type_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_mas_template_type_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_mas_template_type_list->TotalRecs > 0 && (!$ivf_mas_template_type_list->AutoHidePageSizeSelector || $ivf_mas_template_type_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_mas_template_type">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_mas_template_type_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_mas_template_type_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_mas_template_type_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_mas_template_type_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_mas_template_type_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_mas_template_type_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_mas_template_type->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_mas_template_type_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_mas_template_type_list->TotalRecs == 0 && !$ivf_mas_template_type->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_mas_template_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_mas_template_type_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_mas_template_type->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_mas_template_type", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_mas_template_type_list->terminate();
?>