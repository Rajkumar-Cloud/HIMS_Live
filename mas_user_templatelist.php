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
$mas_user_template_list = new mas_user_template_list();

// Run the page
$mas_user_template_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_user_template->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_user_templatelist = currentForm = new ew.Form("fmas_user_templatelist", "list");
fmas_user_templatelist.formKeyCountName = '<?php echo $mas_user_template_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_user_templatelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_user_templatelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_user_templatelist.lists["x_TemplateType"] = <?php echo $mas_user_template_list->TemplateType->Lookup->toClientList() ?>;
fmas_user_templatelist.lists["x_TemplateType"].options = <?php echo JsonEncode($mas_user_template_list->TemplateType->lookupOptions()) ?>;

// Form object for search
var fmas_user_templatelistsrch = currentSearchForm = new ew.Form("fmas_user_templatelistsrch");

// Filters
fmas_user_templatelistsrch.filterList = <?php echo $mas_user_template_list->getFilterList() ?>;
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
<?php if (!$mas_user_template->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_user_template_list->TotalRecs > 0 && $mas_user_template_list->ExportOptions->visible()) { ?>
<?php $mas_user_template_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_list->ImportOptions->visible()) { ?>
<?php $mas_user_template_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_list->SearchOptions->visible()) { ?>
<?php $mas_user_template_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_user_template_list->FilterOptions->visible()) { ?>
<?php $mas_user_template_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_user_template_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_user_template->isExport() && !$mas_user_template->CurrentAction) { ?>
<form name="fmas_user_templatelistsrch" id="fmas_user_templatelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_user_template_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_user_templatelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_user_template">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_user_template_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_user_template_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_user_template_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_user_template_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_user_template_list->showPageHeader(); ?>
<?php
$mas_user_template_list->showMessage();
?>
<?php if ($mas_user_template_list->TotalRecs > 0 || $mas_user_template->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_user_template_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_user_template">
<?php if (!$mas_user_template->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_user_template->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_user_template_list->Pager)) $mas_user_template_list->Pager = new NumericPager($mas_user_template_list->StartRec, $mas_user_template_list->DisplayRecs, $mas_user_template_list->TotalRecs, $mas_user_template_list->RecRange, $mas_user_template_list->AutoHidePager) ?>
<?php if ($mas_user_template_list->Pager->RecordCount > 0 && $mas_user_template_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_user_template_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_user_template_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_user_template_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_user_template_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_user_template_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_user_template_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_user_template_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_user_template_list->TotalRecs > 0 && (!$mas_user_template_list->AutoHidePageSizeSelector || $mas_user_template_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_user_template">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_user_template_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_user_template_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_user_template_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_user_template_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_user_template_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_user_template_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_user_template->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_user_template_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_user_templatelist" id="fmas_user_templatelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_user_template_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_user_template_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template">
<div id="gmp_mas_user_template" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_user_template_list->TotalRecs > 0 || $mas_user_template->isGridEdit()) { ?>
<table id="tbl_mas_user_templatelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_user_template_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_user_template_list->renderListOptions();

// Render list options (header, left)
$mas_user_template_list->ListOptions->render("header", "left");
?>
<?php if ($mas_user_template->id->Visible) { // id ?>
	<?php if ($mas_user_template->sortUrl($mas_user_template->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_user_template->id->headerCellClass() ?>"><div id="elh_mas_user_template_id" class="mas_user_template_id"><div class="ew-table-header-caption"><?php echo $mas_user_template->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_user_template->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template->SortUrl($mas_user_template->id) ?>',1);"><div id="elh_mas_user_template_id" class="mas_user_template_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template->TemplateName->Visible) { // TemplateName ?>
	<?php if ($mas_user_template->sortUrl($mas_user_template->TemplateName) == "") { ?>
		<th data-name="TemplateName" class="<?php echo $mas_user_template->TemplateName->headerCellClass() ?>"><div id="elh_mas_user_template_TemplateName" class="mas_user_template_TemplateName"><div class="ew-table-header-caption"><?php echo $mas_user_template->TemplateName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateName" class="<?php echo $mas_user_template->TemplateName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template->SortUrl($mas_user_template->TemplateName) ?>',1);"><div id="elh_mas_user_template_TemplateName" class="mas_user_template_TemplateName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template->TemplateName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template->TemplateName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template->TemplateName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template->TemplateType->Visible) { // TemplateType ?>
	<?php if ($mas_user_template->sortUrl($mas_user_template->TemplateType) == "") { ?>
		<th data-name="TemplateType" class="<?php echo $mas_user_template->TemplateType->headerCellClass() ?>"><div id="elh_mas_user_template_TemplateType" class="mas_user_template_TemplateType"><div class="ew-table-header-caption"><?php echo $mas_user_template->TemplateType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateType" class="<?php echo $mas_user_template->TemplateType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template->SortUrl($mas_user_template->TemplateType) ?>',1);"><div id="elh_mas_user_template_TemplateType" class="mas_user_template_TemplateType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template->TemplateType->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template->TemplateType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template->TemplateType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template->created->Visible) { // created ?>
	<?php if ($mas_user_template->sortUrl($mas_user_template->created) == "") { ?>
		<th data-name="created" class="<?php echo $mas_user_template->created->headerCellClass() ?>"><div id="elh_mas_user_template_created" class="mas_user_template_created"><div class="ew-table-header-caption"><?php echo $mas_user_template->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $mas_user_template->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template->SortUrl($mas_user_template->created) ?>',1);"><div id="elh_mas_user_template_created" class="mas_user_template_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template->created->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template->createdDatetime->Visible) { // createdDatetime ?>
	<?php if ($mas_user_template->sortUrl($mas_user_template->createdDatetime) == "") { ?>
		<th data-name="createdDatetime" class="<?php echo $mas_user_template->createdDatetime->headerCellClass() ?>"><div id="elh_mas_user_template_createdDatetime" class="mas_user_template_createdDatetime"><div class="ew-table-header-caption"><?php echo $mas_user_template->createdDatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatetime" class="<?php echo $mas_user_template->createdDatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template->SortUrl($mas_user_template->createdDatetime) ?>',1);"><div id="elh_mas_user_template_createdDatetime" class="mas_user_template_createdDatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template->createdDatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template->createdDatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template->createdDatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template->modified->Visible) { // modified ?>
	<?php if ($mas_user_template->sortUrl($mas_user_template->modified) == "") { ?>
		<th data-name="modified" class="<?php echo $mas_user_template->modified->headerCellClass() ?>"><div id="elh_mas_user_template_modified" class="mas_user_template_modified"><div class="ew-table-header-caption"><?php echo $mas_user_template->modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modified" class="<?php echo $mas_user_template->modified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template->SortUrl($mas_user_template->modified) ?>',1);"><div id="elh_mas_user_template_modified" class="mas_user_template_modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template->modified->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template->modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template->modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_user_template->modifiedDatetime->Visible) { // modifiedDatetime ?>
	<?php if ($mas_user_template->sortUrl($mas_user_template->modifiedDatetime) == "") { ?>
		<th data-name="modifiedDatetime" class="<?php echo $mas_user_template->modifiedDatetime->headerCellClass() ?>"><div id="elh_mas_user_template_modifiedDatetime" class="mas_user_template_modifiedDatetime"><div class="ew-table-header-caption"><?php echo $mas_user_template->modifiedDatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedDatetime" class="<?php echo $mas_user_template->modifiedDatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_user_template->SortUrl($mas_user_template->modifiedDatetime) ?>',1);"><div id="elh_mas_user_template_modifiedDatetime" class="mas_user_template_modifiedDatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_user_template->modifiedDatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_user_template->modifiedDatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_user_template->modifiedDatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_user_template_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_user_template->ExportAll && $mas_user_template->isExport()) {
	$mas_user_template_list->StopRec = $mas_user_template_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_user_template_list->TotalRecs > $mas_user_template_list->StartRec + $mas_user_template_list->DisplayRecs - 1)
		$mas_user_template_list->StopRec = $mas_user_template_list->StartRec + $mas_user_template_list->DisplayRecs - 1;
	else
		$mas_user_template_list->StopRec = $mas_user_template_list->TotalRecs;
}
$mas_user_template_list->RecCnt = $mas_user_template_list->StartRec - 1;
if ($mas_user_template_list->Recordset && !$mas_user_template_list->Recordset->EOF) {
	$mas_user_template_list->Recordset->moveFirst();
	$selectLimit = $mas_user_template_list->UseSelectLimit;
	if (!$selectLimit && $mas_user_template_list->StartRec > 1)
		$mas_user_template_list->Recordset->move($mas_user_template_list->StartRec - 1);
} elseif (!$mas_user_template->AllowAddDeleteRow && $mas_user_template_list->StopRec == 0) {
	$mas_user_template_list->StopRec = $mas_user_template->GridAddRowCount;
}

// Initialize aggregate
$mas_user_template->RowType = ROWTYPE_AGGREGATEINIT;
$mas_user_template->resetAttributes();
$mas_user_template_list->renderRow();
while ($mas_user_template_list->RecCnt < $mas_user_template_list->StopRec) {
	$mas_user_template_list->RecCnt++;
	if ($mas_user_template_list->RecCnt >= $mas_user_template_list->StartRec) {
		$mas_user_template_list->RowCnt++;

		// Set up key count
		$mas_user_template_list->KeyCount = $mas_user_template_list->RowIndex;

		// Init row class and style
		$mas_user_template->resetAttributes();
		$mas_user_template->CssClass = "";
		if ($mas_user_template->isGridAdd()) {
		} else {
			$mas_user_template_list->loadRowValues($mas_user_template_list->Recordset); // Load row values
		}
		$mas_user_template->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_user_template->RowAttrs = array_merge($mas_user_template->RowAttrs, array('data-rowindex'=>$mas_user_template_list->RowCnt, 'id'=>'r' . $mas_user_template_list->RowCnt . '_mas_user_template', 'data-rowtype'=>$mas_user_template->RowType));

		// Render row
		$mas_user_template_list->renderRow();

		// Render list options
		$mas_user_template_list->renderListOptions();
?>
	<tr<?php echo $mas_user_template->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_user_template_list->ListOptions->render("body", "left", $mas_user_template_list->RowCnt);
?>
	<?php if ($mas_user_template->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_user_template->id->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCnt ?>_mas_user_template_id" class="mas_user_template_id">
<span<?php echo $mas_user_template->id->viewAttributes() ?>>
<?php echo $mas_user_template->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template->TemplateName->Visible) { // TemplateName ?>
		<td data-name="TemplateName"<?php echo $mas_user_template->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCnt ?>_mas_user_template_TemplateName" class="mas_user_template_TemplateName">
<span<?php echo $mas_user_template->TemplateName->viewAttributes() ?>>
<?php echo $mas_user_template->TemplateName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template->TemplateType->Visible) { // TemplateType ?>
		<td data-name="TemplateType"<?php echo $mas_user_template->TemplateType->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCnt ?>_mas_user_template_TemplateType" class="mas_user_template_TemplateType">
<span<?php echo $mas_user_template->TemplateType->viewAttributes() ?>>
<?php echo $mas_user_template->TemplateType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template->created->Visible) { // created ?>
		<td data-name="created"<?php echo $mas_user_template->created->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCnt ?>_mas_user_template_created" class="mas_user_template_created">
<span<?php echo $mas_user_template->created->viewAttributes() ?>>
<?php echo $mas_user_template->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template->createdDatetime->Visible) { // createdDatetime ?>
		<td data-name="createdDatetime"<?php echo $mas_user_template->createdDatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCnt ?>_mas_user_template_createdDatetime" class="mas_user_template_createdDatetime">
<span<?php echo $mas_user_template->createdDatetime->viewAttributes() ?>>
<?php echo $mas_user_template->createdDatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template->modified->Visible) { // modified ?>
		<td data-name="modified"<?php echo $mas_user_template->modified->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCnt ?>_mas_user_template_modified" class="mas_user_template_modified">
<span<?php echo $mas_user_template->modified->viewAttributes() ?>>
<?php echo $mas_user_template->modified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_user_template->modifiedDatetime->Visible) { // modifiedDatetime ?>
		<td data-name="modifiedDatetime"<?php echo $mas_user_template->modifiedDatetime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_list->RowCnt ?>_mas_user_template_modifiedDatetime" class="mas_user_template_modifiedDatetime">
<span<?php echo $mas_user_template->modifiedDatetime->viewAttributes() ?>>
<?php echo $mas_user_template->modifiedDatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_user_template_list->ListOptions->render("body", "right", $mas_user_template_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_user_template->isGridAdd())
		$mas_user_template_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_user_template->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_user_template_list->Recordset)
	$mas_user_template_list->Recordset->Close();
?>
<?php if (!$mas_user_template->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_user_template->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_user_template_list->Pager)) $mas_user_template_list->Pager = new NumericPager($mas_user_template_list->StartRec, $mas_user_template_list->DisplayRecs, $mas_user_template_list->TotalRecs, $mas_user_template_list->RecRange, $mas_user_template_list->AutoHidePager) ?>
<?php if ($mas_user_template_list->Pager->RecordCount > 0 && $mas_user_template_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_user_template_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_user_template_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_user_template_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_user_template_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_user_template_list->pageUrl() ?>start=<?php echo $mas_user_template_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_user_template_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_user_template_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_user_template_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_user_template_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_user_template_list->TotalRecs > 0 && (!$mas_user_template_list->AutoHidePageSizeSelector || $mas_user_template_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_user_template">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_user_template_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_user_template_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_user_template_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_user_template_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_user_template_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_user_template_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_user_template->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_user_template_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_user_template_list->TotalRecs == 0 && !$mas_user_template->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_user_template_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_user_template_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_user_template->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_user_template->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_user_template", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_user_template_list->terminate();
?>