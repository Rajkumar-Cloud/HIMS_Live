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
$sys_workdays_list = new sys_workdays_list();

// Run the page
$sys_workdays_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_workdays_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_workdays->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsys_workdayslist = currentForm = new ew.Form("fsys_workdayslist", "list");
fsys_workdayslist.formKeyCountName = '<?php echo $sys_workdays_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsys_workdayslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_workdayslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsys_workdayslist.lists["x_status"] = <?php echo $sys_workdays_list->status->Lookup->toClientList() ?>;
fsys_workdayslist.lists["x_status"].options = <?php echo JsonEncode($sys_workdays_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var fsys_workdayslistsrch = currentSearchForm = new ew.Form("fsys_workdayslistsrch");

// Validate function for search
fsys_workdayslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fsys_workdayslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_workdayslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsys_workdayslistsrch.lists["x_status"] = <?php echo $sys_workdays_list->status->Lookup->toClientList() ?>;
fsys_workdayslistsrch.lists["x_status"].options = <?php echo JsonEncode($sys_workdays_list->status->options(FALSE, TRUE)) ?>;

// Filters
fsys_workdayslistsrch.filterList = <?php echo $sys_workdays_list->getFilterList() ?>;
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
<?php if (!$sys_workdays->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sys_workdays_list->TotalRecs > 0 && $sys_workdays_list->ExportOptions->visible()) { ?>
<?php $sys_workdays_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_workdays_list->ImportOptions->visible()) { ?>
<?php $sys_workdays_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_workdays_list->SearchOptions->visible()) { ?>
<?php $sys_workdays_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sys_workdays_list->FilterOptions->visible()) { ?>
<?php $sys_workdays_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sys_workdays_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sys_workdays->isExport() && !$sys_workdays->CurrentAction) { ?>
<form name="fsys_workdayslistsrch" id="fsys_workdayslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sys_workdays_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsys_workdayslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sys_workdays">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$sys_workdays_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$sys_workdays->RowType = ROWTYPE_SEARCH;

// Render row
$sys_workdays->resetAttributes();
$sys_workdays_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($sys_workdays->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $sys_workdays->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="sys_workdays" data-field="x_status" data-value-separator="<?php echo $sys_workdays->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $sys_workdays->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $sys_workdays->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sys_workdays_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sys_workdays_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sys_workdays_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sys_workdays_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sys_workdays_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sys_workdays_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sys_workdays_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $sys_workdays_list->showPageHeader(); ?>
<?php
$sys_workdays_list->showMessage();
?>
<?php if ($sys_workdays_list->TotalRecs > 0 || $sys_workdays->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sys_workdays_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sys_workdays">
<?php if (!$sys_workdays->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sys_workdays->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_workdays_list->Pager)) $sys_workdays_list->Pager = new NumericPager($sys_workdays_list->StartRec, $sys_workdays_list->DisplayRecs, $sys_workdays_list->TotalRecs, $sys_workdays_list->RecRange, $sys_workdays_list->AutoHidePager) ?>
<?php if ($sys_workdays_list->Pager->RecordCount > 0 && $sys_workdays_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_workdays_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_workdays_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_workdays_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_workdays_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_workdays_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_workdays_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_workdays_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_workdays_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_workdays_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_workdays_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_workdays_list->TotalRecs > 0 && (!$sys_workdays_list->AutoHidePageSizeSelector || $sys_workdays_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_workdays">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_workdays_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_workdays_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_workdays_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_workdays_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_workdays_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_workdays_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_workdays->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_workdays_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsys_workdayslist" id="fsys_workdayslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_workdays_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_workdays_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_workdays">
<div id="gmp_sys_workdays" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sys_workdays_list->TotalRecs > 0 || $sys_workdays->isGridEdit()) { ?>
<table id="tbl_sys_workdayslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sys_workdays_list->RowType = ROWTYPE_HEADER;

// Render list options
$sys_workdays_list->renderListOptions();

// Render list options (header, left)
$sys_workdays_list->ListOptions->render("header", "left");
?>
<?php if ($sys_workdays->id->Visible) { // id ?>
	<?php if ($sys_workdays->sortUrl($sys_workdays->id) == "") { ?>
		<th data-name="id" class="<?php echo $sys_workdays->id->headerCellClass() ?>"><div id="elh_sys_workdays_id" class="sys_workdays_id"><div class="ew-table-header-caption"><?php echo $sys_workdays->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sys_workdays->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_workdays->SortUrl($sys_workdays->id) ?>',1);"><div id="elh_sys_workdays_id" class="sys_workdays_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_workdays->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_workdays->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_workdays->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_workdays->name->Visible) { // name ?>
	<?php if ($sys_workdays->sortUrl($sys_workdays->name) == "") { ?>
		<th data-name="name" class="<?php echo $sys_workdays->name->headerCellClass() ?>"><div id="elh_sys_workdays_name" class="sys_workdays_name"><div class="ew-table-header-caption"><?php echo $sys_workdays->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $sys_workdays->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_workdays->SortUrl($sys_workdays->name) ?>',1);"><div id="elh_sys_workdays_name" class="sys_workdays_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_workdays->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_workdays->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_workdays->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_workdays->status->Visible) { // status ?>
	<?php if ($sys_workdays->sortUrl($sys_workdays->status) == "") { ?>
		<th data-name="status" class="<?php echo $sys_workdays->status->headerCellClass() ?>"><div id="elh_sys_workdays_status" class="sys_workdays_status"><div class="ew-table-header-caption"><?php echo $sys_workdays->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $sys_workdays->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_workdays->SortUrl($sys_workdays->status) ?>',1);"><div id="elh_sys_workdays_status" class="sys_workdays_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_workdays->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_workdays->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_workdays->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_workdays->country->Visible) { // country ?>
	<?php if ($sys_workdays->sortUrl($sys_workdays->country) == "") { ?>
		<th data-name="country" class="<?php echo $sys_workdays->country->headerCellClass() ?>"><div id="elh_sys_workdays_country" class="sys_workdays_country"><div class="ew-table-header-caption"><?php echo $sys_workdays->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $sys_workdays->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_workdays->SortUrl($sys_workdays->country) ?>',1);"><div id="elh_sys_workdays_country" class="sys_workdays_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_workdays->country->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_workdays->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_workdays->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_workdays->HospID->Visible) { // HospID ?>
	<?php if ($sys_workdays->sortUrl($sys_workdays->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $sys_workdays->HospID->headerCellClass() ?>"><div id="elh_sys_workdays_HospID" class="sys_workdays_HospID"><div class="ew-table-header-caption"><?php echo $sys_workdays->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $sys_workdays->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_workdays->SortUrl($sys_workdays->HospID) ?>',1);"><div id="elh_sys_workdays_HospID" class="sys_workdays_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_workdays->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_workdays->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_workdays->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sys_workdays_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sys_workdays->ExportAll && $sys_workdays->isExport()) {
	$sys_workdays_list->StopRec = $sys_workdays_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sys_workdays_list->TotalRecs > $sys_workdays_list->StartRec + $sys_workdays_list->DisplayRecs - 1)
		$sys_workdays_list->StopRec = $sys_workdays_list->StartRec + $sys_workdays_list->DisplayRecs - 1;
	else
		$sys_workdays_list->StopRec = $sys_workdays_list->TotalRecs;
}
$sys_workdays_list->RecCnt = $sys_workdays_list->StartRec - 1;
if ($sys_workdays_list->Recordset && !$sys_workdays_list->Recordset->EOF) {
	$sys_workdays_list->Recordset->moveFirst();
	$selectLimit = $sys_workdays_list->UseSelectLimit;
	if (!$selectLimit && $sys_workdays_list->StartRec > 1)
		$sys_workdays_list->Recordset->move($sys_workdays_list->StartRec - 1);
} elseif (!$sys_workdays->AllowAddDeleteRow && $sys_workdays_list->StopRec == 0) {
	$sys_workdays_list->StopRec = $sys_workdays->GridAddRowCount;
}

// Initialize aggregate
$sys_workdays->RowType = ROWTYPE_AGGREGATEINIT;
$sys_workdays->resetAttributes();
$sys_workdays_list->renderRow();
while ($sys_workdays_list->RecCnt < $sys_workdays_list->StopRec) {
	$sys_workdays_list->RecCnt++;
	if ($sys_workdays_list->RecCnt >= $sys_workdays_list->StartRec) {
		$sys_workdays_list->RowCnt++;

		// Set up key count
		$sys_workdays_list->KeyCount = $sys_workdays_list->RowIndex;

		// Init row class and style
		$sys_workdays->resetAttributes();
		$sys_workdays->CssClass = "";
		if ($sys_workdays->isGridAdd()) {
		} else {
			$sys_workdays_list->loadRowValues($sys_workdays_list->Recordset); // Load row values
		}
		$sys_workdays->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sys_workdays->RowAttrs = array_merge($sys_workdays->RowAttrs, array('data-rowindex'=>$sys_workdays_list->RowCnt, 'id'=>'r' . $sys_workdays_list->RowCnt . '_sys_workdays', 'data-rowtype'=>$sys_workdays->RowType));

		// Render row
		$sys_workdays_list->renderRow();

		// Render list options
		$sys_workdays_list->renderListOptions();
?>
	<tr<?php echo $sys_workdays->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sys_workdays_list->ListOptions->render("body", "left", $sys_workdays_list->RowCnt);
?>
	<?php if ($sys_workdays->id->Visible) { // id ?>
		<td data-name="id"<?php echo $sys_workdays->id->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_list->RowCnt ?>_sys_workdays_id" class="sys_workdays_id">
<span<?php echo $sys_workdays->id->viewAttributes() ?>>
<?php echo $sys_workdays->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_workdays->name->Visible) { // name ?>
		<td data-name="name"<?php echo $sys_workdays->name->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_list->RowCnt ?>_sys_workdays_name" class="sys_workdays_name">
<span<?php echo $sys_workdays->name->viewAttributes() ?>>
<?php echo $sys_workdays->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_workdays->status->Visible) { // status ?>
		<td data-name="status"<?php echo $sys_workdays->status->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_list->RowCnt ?>_sys_workdays_status" class="sys_workdays_status">
<span<?php echo $sys_workdays->status->viewAttributes() ?>>
<?php echo $sys_workdays->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_workdays->country->Visible) { // country ?>
		<td data-name="country"<?php echo $sys_workdays->country->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_list->RowCnt ?>_sys_workdays_country" class="sys_workdays_country">
<span<?php echo $sys_workdays->country->viewAttributes() ?>>
<?php echo $sys_workdays->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_workdays->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $sys_workdays->HospID->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_list->RowCnt ?>_sys_workdays_HospID" class="sys_workdays_HospID">
<span<?php echo $sys_workdays->HospID->viewAttributes() ?>>
<?php echo $sys_workdays->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sys_workdays_list->ListOptions->render("body", "right", $sys_workdays_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sys_workdays->isGridAdd())
		$sys_workdays_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sys_workdays->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sys_workdays_list->Recordset)
	$sys_workdays_list->Recordset->Close();
?>
<?php if (!$sys_workdays->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sys_workdays->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_workdays_list->Pager)) $sys_workdays_list->Pager = new NumericPager($sys_workdays_list->StartRec, $sys_workdays_list->DisplayRecs, $sys_workdays_list->TotalRecs, $sys_workdays_list->RecRange, $sys_workdays_list->AutoHidePager) ?>
<?php if ($sys_workdays_list->Pager->RecordCount > 0 && $sys_workdays_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_workdays_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_workdays_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_workdays_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_workdays_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_workdays_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_workdays_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_workdays_list->pageUrl() ?>start=<?php echo $sys_workdays_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_workdays_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_workdays_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_workdays_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_workdays_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_workdays_list->TotalRecs > 0 && (!$sys_workdays_list->AutoHidePageSizeSelector || $sys_workdays_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_workdays">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_workdays_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_workdays_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_workdays_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_workdays_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_workdays_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_workdays_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_workdays->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_workdays_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sys_workdays_list->TotalRecs == 0 && !$sys_workdays->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sys_workdays_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sys_workdays_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_workdays->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$sys_workdays->isExport()) { ?>
<script>
ew.scrollableTable("gmp_sys_workdays", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_workdays_list->terminate();
?>