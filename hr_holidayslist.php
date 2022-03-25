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
$hr_holidays_list = new hr_holidays_list();

// Run the page
$hr_holidays_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_holidays_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_holidays->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_holidayslist = currentForm = new ew.Form("fhr_holidayslist", "list");
fhr_holidayslist.formKeyCountName = '<?php echo $hr_holidays_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_holidayslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_holidayslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_holidayslist.lists["x_status"] = <?php echo $hr_holidays_list->status->Lookup->toClientList() ?>;
fhr_holidayslist.lists["x_status"].options = <?php echo JsonEncode($hr_holidays_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_holidayslistsrch = currentSearchForm = new ew.Form("fhr_holidayslistsrch");

// Validate function for search
fhr_holidayslistsrch.validate = function(fobj) {
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
fhr_holidayslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_holidayslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_holidayslistsrch.lists["x_status"] = <?php echo $hr_holidays_list->status->Lookup->toClientList() ?>;
fhr_holidayslistsrch.lists["x_status"].options = <?php echo JsonEncode($hr_holidays_list->status->options(FALSE, TRUE)) ?>;

// Filters
fhr_holidayslistsrch.filterList = <?php echo $hr_holidays_list->getFilterList() ?>;
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
<?php if (!$hr_holidays->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_holidays_list->TotalRecs > 0 && $hr_holidays_list->ExportOptions->visible()) { ?>
<?php $hr_holidays_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_holidays_list->ImportOptions->visible()) { ?>
<?php $hr_holidays_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_holidays_list->SearchOptions->visible()) { ?>
<?php $hr_holidays_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_holidays_list->FilterOptions->visible()) { ?>
<?php $hr_holidays_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_holidays_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_holidays->isExport() && !$hr_holidays->CurrentAction) { ?>
<form name="fhr_holidayslistsrch" id="fhr_holidayslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_holidays_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_holidayslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_holidays">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_holidays_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_holidays->RowType = ROWTYPE_SEARCH;

// Render row
$hr_holidays->resetAttributes();
$hr_holidays_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_holidays->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_holidays->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_holidays" data-field="x_status" data-value-separator="<?php echo $hr_holidays->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_holidays->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_holidays->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_holidays_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_holidays_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_holidays_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_holidays_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_holidays_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_holidays_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_holidays_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_holidays_list->showPageHeader(); ?>
<?php
$hr_holidays_list->showMessage();
?>
<?php if ($hr_holidays_list->TotalRecs > 0 || $hr_holidays->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_holidays_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_holidays">
<?php if (!$hr_holidays->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_holidays->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_holidays_list->Pager)) $hr_holidays_list->Pager = new NumericPager($hr_holidays_list->StartRec, $hr_holidays_list->DisplayRecs, $hr_holidays_list->TotalRecs, $hr_holidays_list->RecRange, $hr_holidays_list->AutoHidePager) ?>
<?php if ($hr_holidays_list->Pager->RecordCount > 0 && $hr_holidays_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_holidays_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_holidays_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_holidays_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_holidays_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_holidays_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_holidays_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_holidays_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_holidays_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_holidays_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_holidays_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_holidays_list->TotalRecs > 0 && (!$hr_holidays_list->AutoHidePageSizeSelector || $hr_holidays_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_holidays">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_holidays_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_holidays_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_holidays_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_holidays_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_holidays_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_holidays_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_holidays->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_holidays_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_holidayslist" id="fhr_holidayslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_holidays_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_holidays_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_holidays">
<div id="gmp_hr_holidays" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_holidays_list->TotalRecs > 0 || $hr_holidays->isGridEdit()) { ?>
<table id="tbl_hr_holidayslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_holidays_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_holidays_list->renderListOptions();

// Render list options (header, left)
$hr_holidays_list->ListOptions->render("header", "left");
?>
<?php if ($hr_holidays->id->Visible) { // id ?>
	<?php if ($hr_holidays->sortUrl($hr_holidays->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_holidays->id->headerCellClass() ?>"><div id="elh_hr_holidays_id" class="hr_holidays_id"><div class="ew-table-header-caption"><?php echo $hr_holidays->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_holidays->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_holidays->SortUrl($hr_holidays->id) ?>',1);"><div id="elh_hr_holidays_id" class="hr_holidays_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_holidays->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_holidays->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_holidays->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_holidays->name->Visible) { // name ?>
	<?php if ($hr_holidays->sortUrl($hr_holidays->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_holidays->name->headerCellClass() ?>"><div id="elh_hr_holidays_name" class="hr_holidays_name"><div class="ew-table-header-caption"><?php echo $hr_holidays->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_holidays->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_holidays->SortUrl($hr_holidays->name) ?>',1);"><div id="elh_hr_holidays_name" class="hr_holidays_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_holidays->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_holidays->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_holidays->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_holidays->dateh->Visible) { // dateh ?>
	<?php if ($hr_holidays->sortUrl($hr_holidays->dateh) == "") { ?>
		<th data-name="dateh" class="<?php echo $hr_holidays->dateh->headerCellClass() ?>"><div id="elh_hr_holidays_dateh" class="hr_holidays_dateh"><div class="ew-table-header-caption"><?php echo $hr_holidays->dateh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dateh" class="<?php echo $hr_holidays->dateh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_holidays->SortUrl($hr_holidays->dateh) ?>',1);"><div id="elh_hr_holidays_dateh" class="hr_holidays_dateh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_holidays->dateh->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_holidays->dateh->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_holidays->dateh->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_holidays->status->Visible) { // status ?>
	<?php if ($hr_holidays->sortUrl($hr_holidays->status) == "") { ?>
		<th data-name="status" class="<?php echo $hr_holidays->status->headerCellClass() ?>"><div id="elh_hr_holidays_status" class="hr_holidays_status"><div class="ew-table-header-caption"><?php echo $hr_holidays->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hr_holidays->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_holidays->SortUrl($hr_holidays->status) ?>',1);"><div id="elh_hr_holidays_status" class="hr_holidays_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_holidays->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_holidays->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_holidays->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_holidays->country->Visible) { // country ?>
	<?php if ($hr_holidays->sortUrl($hr_holidays->country) == "") { ?>
		<th data-name="country" class="<?php echo $hr_holidays->country->headerCellClass() ?>"><div id="elh_hr_holidays_country" class="hr_holidays_country"><div class="ew-table-header-caption"><?php echo $hr_holidays->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $hr_holidays->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_holidays->SortUrl($hr_holidays->country) ?>',1);"><div id="elh_hr_holidays_country" class="hr_holidays_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_holidays->country->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_holidays->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_holidays->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_holidays->HospID->Visible) { // HospID ?>
	<?php if ($hr_holidays->sortUrl($hr_holidays->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_holidays->HospID->headerCellClass() ?>"><div id="elh_hr_holidays_HospID" class="hr_holidays_HospID"><div class="ew-table-header-caption"><?php echo $hr_holidays->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_holidays->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_holidays->SortUrl($hr_holidays->HospID) ?>',1);"><div id="elh_hr_holidays_HospID" class="hr_holidays_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_holidays->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_holidays->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_holidays->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_holidays_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_holidays->ExportAll && $hr_holidays->isExport()) {
	$hr_holidays_list->StopRec = $hr_holidays_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_holidays_list->TotalRecs > $hr_holidays_list->StartRec + $hr_holidays_list->DisplayRecs - 1)
		$hr_holidays_list->StopRec = $hr_holidays_list->StartRec + $hr_holidays_list->DisplayRecs - 1;
	else
		$hr_holidays_list->StopRec = $hr_holidays_list->TotalRecs;
}
$hr_holidays_list->RecCnt = $hr_holidays_list->StartRec - 1;
if ($hr_holidays_list->Recordset && !$hr_holidays_list->Recordset->EOF) {
	$hr_holidays_list->Recordset->moveFirst();
	$selectLimit = $hr_holidays_list->UseSelectLimit;
	if (!$selectLimit && $hr_holidays_list->StartRec > 1)
		$hr_holidays_list->Recordset->move($hr_holidays_list->StartRec - 1);
} elseif (!$hr_holidays->AllowAddDeleteRow && $hr_holidays_list->StopRec == 0) {
	$hr_holidays_list->StopRec = $hr_holidays->GridAddRowCount;
}

// Initialize aggregate
$hr_holidays->RowType = ROWTYPE_AGGREGATEINIT;
$hr_holidays->resetAttributes();
$hr_holidays_list->renderRow();
while ($hr_holidays_list->RecCnt < $hr_holidays_list->StopRec) {
	$hr_holidays_list->RecCnt++;
	if ($hr_holidays_list->RecCnt >= $hr_holidays_list->StartRec) {
		$hr_holidays_list->RowCnt++;

		// Set up key count
		$hr_holidays_list->KeyCount = $hr_holidays_list->RowIndex;

		// Init row class and style
		$hr_holidays->resetAttributes();
		$hr_holidays->CssClass = "";
		if ($hr_holidays->isGridAdd()) {
		} else {
			$hr_holidays_list->loadRowValues($hr_holidays_list->Recordset); // Load row values
		}
		$hr_holidays->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_holidays->RowAttrs = array_merge($hr_holidays->RowAttrs, array('data-rowindex'=>$hr_holidays_list->RowCnt, 'id'=>'r' . $hr_holidays_list->RowCnt . '_hr_holidays', 'data-rowtype'=>$hr_holidays->RowType));

		// Render row
		$hr_holidays_list->renderRow();

		// Render list options
		$hr_holidays_list->renderListOptions();
?>
	<tr<?php echo $hr_holidays->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_holidays_list->ListOptions->render("body", "left", $hr_holidays_list->RowCnt);
?>
	<?php if ($hr_holidays->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_holidays->id->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_list->RowCnt ?>_hr_holidays_id" class="hr_holidays_id">
<span<?php echo $hr_holidays->id->viewAttributes() ?>>
<?php echo $hr_holidays->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_holidays->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_holidays->name->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_list->RowCnt ?>_hr_holidays_name" class="hr_holidays_name">
<span<?php echo $hr_holidays->name->viewAttributes() ?>>
<?php echo $hr_holidays->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_holidays->dateh->Visible) { // dateh ?>
		<td data-name="dateh"<?php echo $hr_holidays->dateh->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_list->RowCnt ?>_hr_holidays_dateh" class="hr_holidays_dateh">
<span<?php echo $hr_holidays->dateh->viewAttributes() ?>>
<?php echo $hr_holidays->dateh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_holidays->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hr_holidays->status->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_list->RowCnt ?>_hr_holidays_status" class="hr_holidays_status">
<span<?php echo $hr_holidays->status->viewAttributes() ?>>
<?php echo $hr_holidays->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_holidays->country->Visible) { // country ?>
		<td data-name="country"<?php echo $hr_holidays->country->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_list->RowCnt ?>_hr_holidays_country" class="hr_holidays_country">
<span<?php echo $hr_holidays->country->viewAttributes() ?>>
<?php echo $hr_holidays->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_holidays->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_holidays->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_list->RowCnt ?>_hr_holidays_HospID" class="hr_holidays_HospID">
<span<?php echo $hr_holidays->HospID->viewAttributes() ?>>
<?php echo $hr_holidays->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_holidays_list->ListOptions->render("body", "right", $hr_holidays_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_holidays->isGridAdd())
		$hr_holidays_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_holidays->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_holidays_list->Recordset)
	$hr_holidays_list->Recordset->Close();
?>
<?php if (!$hr_holidays->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_holidays->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_holidays_list->Pager)) $hr_holidays_list->Pager = new NumericPager($hr_holidays_list->StartRec, $hr_holidays_list->DisplayRecs, $hr_holidays_list->TotalRecs, $hr_holidays_list->RecRange, $hr_holidays_list->AutoHidePager) ?>
<?php if ($hr_holidays_list->Pager->RecordCount > 0 && $hr_holidays_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_holidays_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_holidays_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_holidays_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_holidays_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_holidays_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_holidays_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_holidays_list->pageUrl() ?>start=<?php echo $hr_holidays_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_holidays_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_holidays_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_holidays_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_holidays_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_holidays_list->TotalRecs > 0 && (!$hr_holidays_list->AutoHidePageSizeSelector || $hr_holidays_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_holidays">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_holidays_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_holidays_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_holidays_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_holidays_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_holidays_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_holidays_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_holidays->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_holidays_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_holidays_list->TotalRecs == 0 && !$hr_holidays->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_holidays_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_holidays_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_holidays->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_holidays->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_holidays", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_holidays_list->terminate();
?>