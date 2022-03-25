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
$hr_projects_list = new hr_projects_list();

// Run the page
$hr_projects_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_projects_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_projects->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_projectslist = currentForm = new ew.Form("fhr_projectslist", "list");
fhr_projectslist.formKeyCountName = '<?php echo $hr_projects_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_projectslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_projectslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_projectslist.lists["x_status"] = <?php echo $hr_projects_list->status->Lookup->toClientList() ?>;
fhr_projectslist.lists["x_status"].options = <?php echo JsonEncode($hr_projects_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_projectslistsrch = currentSearchForm = new ew.Form("fhr_projectslistsrch");

// Validate function for search
fhr_projectslistsrch.validate = function(fobj) {
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
fhr_projectslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_projectslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_projectslistsrch.lists["x_status"] = <?php echo $hr_projects_list->status->Lookup->toClientList() ?>;
fhr_projectslistsrch.lists["x_status"].options = <?php echo JsonEncode($hr_projects_list->status->options(FALSE, TRUE)) ?>;

// Filters
fhr_projectslistsrch.filterList = <?php echo $hr_projects_list->getFilterList() ?>;
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
<?php if (!$hr_projects->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_projects_list->TotalRecs > 0 && $hr_projects_list->ExportOptions->visible()) { ?>
<?php $hr_projects_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_projects_list->ImportOptions->visible()) { ?>
<?php $hr_projects_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_projects_list->SearchOptions->visible()) { ?>
<?php $hr_projects_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_projects_list->FilterOptions->visible()) { ?>
<?php $hr_projects_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_projects_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_projects->isExport() && !$hr_projects->CurrentAction) { ?>
<form name="fhr_projectslistsrch" id="fhr_projectslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_projects_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_projectslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_projects">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_projects_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_projects->RowType = ROWTYPE_SEARCH;

// Render row
$hr_projects->resetAttributes();
$hr_projects_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_projects->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_projects->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_projects" data-field="x_status" data-value-separator="<?php echo $hr_projects->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_projects->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_projects->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_projects_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_projects_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_projects_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_projects_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_projects_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_projects_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_projects_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_projects_list->showPageHeader(); ?>
<?php
$hr_projects_list->showMessage();
?>
<?php if ($hr_projects_list->TotalRecs > 0 || $hr_projects->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_projects_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_projects">
<?php if (!$hr_projects->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_projects->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_projects_list->Pager)) $hr_projects_list->Pager = new NumericPager($hr_projects_list->StartRec, $hr_projects_list->DisplayRecs, $hr_projects_list->TotalRecs, $hr_projects_list->RecRange, $hr_projects_list->AutoHidePager) ?>
<?php if ($hr_projects_list->Pager->RecordCount > 0 && $hr_projects_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_projects_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_projects_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_projects_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_projects_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_projects_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_projects_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_projects_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_projects_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_projects_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_projects_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_projects_list->TotalRecs > 0 && (!$hr_projects_list->AutoHidePageSizeSelector || $hr_projects_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_projects">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_projects_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_projects_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_projects_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_projects_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_projects_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_projects_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_projects->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_projects_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_projectslist" id="fhr_projectslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_projects_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_projects_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_projects">
<div id="gmp_hr_projects" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_projects_list->TotalRecs > 0 || $hr_projects->isGridEdit()) { ?>
<table id="tbl_hr_projectslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_projects_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_projects_list->renderListOptions();

// Render list options (header, left)
$hr_projects_list->ListOptions->render("header", "left");
?>
<?php if ($hr_projects->id->Visible) { // id ?>
	<?php if ($hr_projects->sortUrl($hr_projects->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_projects->id->headerCellClass() ?>"><div id="elh_hr_projects_id" class="hr_projects_id"><div class="ew-table-header-caption"><?php echo $hr_projects->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_projects->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_projects->SortUrl($hr_projects->id) ?>',1);"><div id="elh_hr_projects_id" class="hr_projects_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_projects->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_projects->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_projects->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_projects->name->Visible) { // name ?>
	<?php if ($hr_projects->sortUrl($hr_projects->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_projects->name->headerCellClass() ?>"><div id="elh_hr_projects_name" class="hr_projects_name"><div class="ew-table-header-caption"><?php echo $hr_projects->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_projects->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_projects->SortUrl($hr_projects->name) ?>',1);"><div id="elh_hr_projects_name" class="hr_projects_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_projects->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_projects->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_projects->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_projects->client->Visible) { // client ?>
	<?php if ($hr_projects->sortUrl($hr_projects->client) == "") { ?>
		<th data-name="client" class="<?php echo $hr_projects->client->headerCellClass() ?>"><div id="elh_hr_projects_client" class="hr_projects_client"><div class="ew-table-header-caption"><?php echo $hr_projects->client->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="client" class="<?php echo $hr_projects->client->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_projects->SortUrl($hr_projects->client) ?>',1);"><div id="elh_hr_projects_client" class="hr_projects_client">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_projects->client->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_projects->client->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_projects->client->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_projects->details->Visible) { // details ?>
	<?php if ($hr_projects->sortUrl($hr_projects->details) == "") { ?>
		<th data-name="details" class="<?php echo $hr_projects->details->headerCellClass() ?>"><div id="elh_hr_projects_details" class="hr_projects_details"><div class="ew-table-header-caption"><?php echo $hr_projects->details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="details" class="<?php echo $hr_projects->details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_projects->SortUrl($hr_projects->details) ?>',1);"><div id="elh_hr_projects_details" class="hr_projects_details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_projects->details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_projects->details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_projects->details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_projects->created->Visible) { // created ?>
	<?php if ($hr_projects->sortUrl($hr_projects->created) == "") { ?>
		<th data-name="created" class="<?php echo $hr_projects->created->headerCellClass() ?>"><div id="elh_hr_projects_created" class="hr_projects_created"><div class="ew-table-header-caption"><?php echo $hr_projects->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $hr_projects->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_projects->SortUrl($hr_projects->created) ?>',1);"><div id="elh_hr_projects_created" class="hr_projects_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_projects->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_projects->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_projects->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_projects->status->Visible) { // status ?>
	<?php if ($hr_projects->sortUrl($hr_projects->status) == "") { ?>
		<th data-name="status" class="<?php echo $hr_projects->status->headerCellClass() ?>"><div id="elh_hr_projects_status" class="hr_projects_status"><div class="ew-table-header-caption"><?php echo $hr_projects->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hr_projects->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_projects->SortUrl($hr_projects->status) ?>',1);"><div id="elh_hr_projects_status" class="hr_projects_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_projects->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_projects->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_projects->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_projects->HospID->Visible) { // HospID ?>
	<?php if ($hr_projects->sortUrl($hr_projects->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_projects->HospID->headerCellClass() ?>"><div id="elh_hr_projects_HospID" class="hr_projects_HospID"><div class="ew-table-header-caption"><?php echo $hr_projects->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_projects->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_projects->SortUrl($hr_projects->HospID) ?>',1);"><div id="elh_hr_projects_HospID" class="hr_projects_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_projects->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_projects->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_projects->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_projects_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_projects->ExportAll && $hr_projects->isExport()) {
	$hr_projects_list->StopRec = $hr_projects_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_projects_list->TotalRecs > $hr_projects_list->StartRec + $hr_projects_list->DisplayRecs - 1)
		$hr_projects_list->StopRec = $hr_projects_list->StartRec + $hr_projects_list->DisplayRecs - 1;
	else
		$hr_projects_list->StopRec = $hr_projects_list->TotalRecs;
}
$hr_projects_list->RecCnt = $hr_projects_list->StartRec - 1;
if ($hr_projects_list->Recordset && !$hr_projects_list->Recordset->EOF) {
	$hr_projects_list->Recordset->moveFirst();
	$selectLimit = $hr_projects_list->UseSelectLimit;
	if (!$selectLimit && $hr_projects_list->StartRec > 1)
		$hr_projects_list->Recordset->move($hr_projects_list->StartRec - 1);
} elseif (!$hr_projects->AllowAddDeleteRow && $hr_projects_list->StopRec == 0) {
	$hr_projects_list->StopRec = $hr_projects->GridAddRowCount;
}

// Initialize aggregate
$hr_projects->RowType = ROWTYPE_AGGREGATEINIT;
$hr_projects->resetAttributes();
$hr_projects_list->renderRow();
while ($hr_projects_list->RecCnt < $hr_projects_list->StopRec) {
	$hr_projects_list->RecCnt++;
	if ($hr_projects_list->RecCnt >= $hr_projects_list->StartRec) {
		$hr_projects_list->RowCnt++;

		// Set up key count
		$hr_projects_list->KeyCount = $hr_projects_list->RowIndex;

		// Init row class and style
		$hr_projects->resetAttributes();
		$hr_projects->CssClass = "";
		if ($hr_projects->isGridAdd()) {
		} else {
			$hr_projects_list->loadRowValues($hr_projects_list->Recordset); // Load row values
		}
		$hr_projects->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_projects->RowAttrs = array_merge($hr_projects->RowAttrs, array('data-rowindex'=>$hr_projects_list->RowCnt, 'id'=>'r' . $hr_projects_list->RowCnt . '_hr_projects', 'data-rowtype'=>$hr_projects->RowType));

		// Render row
		$hr_projects_list->renderRow();

		// Render list options
		$hr_projects_list->renderListOptions();
?>
	<tr<?php echo $hr_projects->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_projects_list->ListOptions->render("body", "left", $hr_projects_list->RowCnt);
?>
	<?php if ($hr_projects->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_projects->id->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_list->RowCnt ?>_hr_projects_id" class="hr_projects_id">
<span<?php echo $hr_projects->id->viewAttributes() ?>>
<?php echo $hr_projects->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_projects->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_projects->name->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_list->RowCnt ?>_hr_projects_name" class="hr_projects_name">
<span<?php echo $hr_projects->name->viewAttributes() ?>>
<?php echo $hr_projects->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_projects->client->Visible) { // client ?>
		<td data-name="client"<?php echo $hr_projects->client->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_list->RowCnt ?>_hr_projects_client" class="hr_projects_client">
<span<?php echo $hr_projects->client->viewAttributes() ?>>
<?php echo $hr_projects->client->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_projects->details->Visible) { // details ?>
		<td data-name="details"<?php echo $hr_projects->details->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_list->RowCnt ?>_hr_projects_details" class="hr_projects_details">
<span<?php echo $hr_projects->details->viewAttributes() ?>>
<?php echo $hr_projects->details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_projects->created->Visible) { // created ?>
		<td data-name="created"<?php echo $hr_projects->created->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_list->RowCnt ?>_hr_projects_created" class="hr_projects_created">
<span<?php echo $hr_projects->created->viewAttributes() ?>>
<?php echo $hr_projects->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_projects->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hr_projects->status->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_list->RowCnt ?>_hr_projects_status" class="hr_projects_status">
<span<?php echo $hr_projects->status->viewAttributes() ?>>
<?php echo $hr_projects->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_projects->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_projects->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_projects_list->RowCnt ?>_hr_projects_HospID" class="hr_projects_HospID">
<span<?php echo $hr_projects->HospID->viewAttributes() ?>>
<?php echo $hr_projects->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_projects_list->ListOptions->render("body", "right", $hr_projects_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_projects->isGridAdd())
		$hr_projects_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_projects->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_projects_list->Recordset)
	$hr_projects_list->Recordset->Close();
?>
<?php if (!$hr_projects->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_projects->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_projects_list->Pager)) $hr_projects_list->Pager = new NumericPager($hr_projects_list->StartRec, $hr_projects_list->DisplayRecs, $hr_projects_list->TotalRecs, $hr_projects_list->RecRange, $hr_projects_list->AutoHidePager) ?>
<?php if ($hr_projects_list->Pager->RecordCount > 0 && $hr_projects_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_projects_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_projects_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_projects_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_projects_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_projects_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_projects_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_projects_list->pageUrl() ?>start=<?php echo $hr_projects_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_projects_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_projects_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_projects_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_projects_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_projects_list->TotalRecs > 0 && (!$hr_projects_list->AutoHidePageSizeSelector || $hr_projects_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_projects">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_projects_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_projects_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_projects_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_projects_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_projects_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_projects_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_projects->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_projects_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_projects_list->TotalRecs == 0 && !$hr_projects->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_projects_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_projects_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_projects->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_projects->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_projects", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_projects_list->terminate();
?>