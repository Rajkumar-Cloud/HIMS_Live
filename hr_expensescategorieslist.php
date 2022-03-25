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
$hr_expensescategories_list = new hr_expensescategories_list();

// Run the page
$hr_expensescategories_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensescategories_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_expensescategories->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_expensescategorieslist = currentForm = new ew.Form("fhr_expensescategorieslist", "list");
fhr_expensescategorieslist.formKeyCountName = '<?php echo $hr_expensescategories_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_expensescategorieslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensescategorieslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_expensescategorieslist.lists["x_pre_approve"] = <?php echo $hr_expensescategories_list->pre_approve->Lookup->toClientList() ?>;
fhr_expensescategorieslist.lists["x_pre_approve"].options = <?php echo JsonEncode($hr_expensescategories_list->pre_approve->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_expensescategorieslistsrch = currentSearchForm = new ew.Form("fhr_expensescategorieslistsrch");

// Validate function for search
fhr_expensescategorieslistsrch.validate = function(fobj) {
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
fhr_expensescategorieslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensescategorieslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_expensescategorieslistsrch.lists["x_pre_approve"] = <?php echo $hr_expensescategories_list->pre_approve->Lookup->toClientList() ?>;
fhr_expensescategorieslistsrch.lists["x_pre_approve"].options = <?php echo JsonEncode($hr_expensescategories_list->pre_approve->options(FALSE, TRUE)) ?>;

// Filters
fhr_expensescategorieslistsrch.filterList = <?php echo $hr_expensescategories_list->getFilterList() ?>;
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
<?php if (!$hr_expensescategories->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_expensescategories_list->TotalRecs > 0 && $hr_expensescategories_list->ExportOptions->visible()) { ?>
<?php $hr_expensescategories_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_expensescategories_list->ImportOptions->visible()) { ?>
<?php $hr_expensescategories_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_expensescategories_list->SearchOptions->visible()) { ?>
<?php $hr_expensescategories_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_expensescategories_list->FilterOptions->visible()) { ?>
<?php $hr_expensescategories_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_expensescategories_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_expensescategories->isExport() && !$hr_expensescategories->CurrentAction) { ?>
<form name="fhr_expensescategorieslistsrch" id="fhr_expensescategorieslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_expensescategories_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_expensescategorieslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_expensescategories">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_expensescategories_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_expensescategories->RowType = ROWTYPE_SEARCH;

// Render row
$hr_expensescategories->resetAttributes();
$hr_expensescategories_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_expensescategories->pre_approve->Visible) { // pre_approve ?>
	<div id="xsc_pre_approve" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_expensescategories->pre_approve->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_pre_approve" id="z_pre_approve" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_pre_approve" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_expensescategories" data-field="x_pre_approve" data-value-separator="<?php echo $hr_expensescategories->pre_approve->displayValueSeparatorAttribute() ?>" name="x_pre_approve" id="x_pre_approve" value="{value}"<?php echo $hr_expensescategories->pre_approve->editAttributes() ?>></div>
<div id="dsl_x_pre_approve" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_expensescategories->pre_approve->radioButtonListHtml(FALSE, "x_pre_approve") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_expensescategories_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_expensescategories_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_expensescategories_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_expensescategories_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_expensescategories_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_expensescategories_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_expensescategories_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_expensescategories_list->showPageHeader(); ?>
<?php
$hr_expensescategories_list->showMessage();
?>
<?php if ($hr_expensescategories_list->TotalRecs > 0 || $hr_expensescategories->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_expensescategories_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_expensescategories">
<?php if (!$hr_expensescategories->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_expensescategories->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_expensescategories_list->Pager)) $hr_expensescategories_list->Pager = new NumericPager($hr_expensescategories_list->StartRec, $hr_expensescategories_list->DisplayRecs, $hr_expensescategories_list->TotalRecs, $hr_expensescategories_list->RecRange, $hr_expensescategories_list->AutoHidePager) ?>
<?php if ($hr_expensescategories_list->Pager->RecordCount > 0 && $hr_expensescategories_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_expensescategories_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensescategories_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_expensescategories_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_expensescategories_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_expensescategories_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensescategories_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_expensescategories_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_expensescategories_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_expensescategories_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_expensescategories_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_expensescategories_list->TotalRecs > 0 && (!$hr_expensescategories_list->AutoHidePageSizeSelector || $hr_expensescategories_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_expensescategories">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_expensescategories_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_expensescategories_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_expensescategories_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_expensescategories_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_expensescategories_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_expensescategories_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_expensescategories->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_expensescategories_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_expensescategorieslist" id="fhr_expensescategorieslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensescategories_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensescategories_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensescategories">
<div id="gmp_hr_expensescategories" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_expensescategories_list->TotalRecs > 0 || $hr_expensescategories->isGridEdit()) { ?>
<table id="tbl_hr_expensescategorieslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_expensescategories_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_expensescategories_list->renderListOptions();

// Render list options (header, left)
$hr_expensescategories_list->ListOptions->render("header", "left");
?>
<?php if ($hr_expensescategories->id->Visible) { // id ?>
	<?php if ($hr_expensescategories->sortUrl($hr_expensescategories->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_expensescategories->id->headerCellClass() ?>"><div id="elh_hr_expensescategories_id" class="hr_expensescategories_id"><div class="ew-table-header-caption"><?php echo $hr_expensescategories->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_expensescategories->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensescategories->SortUrl($hr_expensescategories->id) ?>',1);"><div id="elh_hr_expensescategories_id" class="hr_expensescategories_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensescategories->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensescategories->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensescategories->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensescategories->name->Visible) { // name ?>
	<?php if ($hr_expensescategories->sortUrl($hr_expensescategories->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_expensescategories->name->headerCellClass() ?>"><div id="elh_hr_expensescategories_name" class="hr_expensescategories_name"><div class="ew-table-header-caption"><?php echo $hr_expensescategories->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_expensescategories->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensescategories->SortUrl($hr_expensescategories->name) ?>',1);"><div id="elh_hr_expensescategories_name" class="hr_expensescategories_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensescategories->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_expensescategories->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensescategories->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensescategories->created->Visible) { // created ?>
	<?php if ($hr_expensescategories->sortUrl($hr_expensescategories->created) == "") { ?>
		<th data-name="created" class="<?php echo $hr_expensescategories->created->headerCellClass() ?>"><div id="elh_hr_expensescategories_created" class="hr_expensescategories_created"><div class="ew-table-header-caption"><?php echo $hr_expensescategories->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $hr_expensescategories->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensescategories->SortUrl($hr_expensescategories->created) ?>',1);"><div id="elh_hr_expensescategories_created" class="hr_expensescategories_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensescategories->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensescategories->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensescategories->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensescategories->updated->Visible) { // updated ?>
	<?php if ($hr_expensescategories->sortUrl($hr_expensescategories->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $hr_expensescategories->updated->headerCellClass() ?>"><div id="elh_hr_expensescategories_updated" class="hr_expensescategories_updated"><div class="ew-table-header-caption"><?php echo $hr_expensescategories->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $hr_expensescategories->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensescategories->SortUrl($hr_expensescategories->updated) ?>',1);"><div id="elh_hr_expensescategories_updated" class="hr_expensescategories_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensescategories->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensescategories->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensescategories->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensescategories->pre_approve->Visible) { // pre_approve ?>
	<?php if ($hr_expensescategories->sortUrl($hr_expensescategories->pre_approve) == "") { ?>
		<th data-name="pre_approve" class="<?php echo $hr_expensescategories->pre_approve->headerCellClass() ?>"><div id="elh_hr_expensescategories_pre_approve" class="hr_expensescategories_pre_approve"><div class="ew-table-header-caption"><?php echo $hr_expensescategories->pre_approve->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_approve" class="<?php echo $hr_expensescategories->pre_approve->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensescategories->SortUrl($hr_expensescategories->pre_approve) ?>',1);"><div id="elh_hr_expensescategories_pre_approve" class="hr_expensescategories_pre_approve">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensescategories->pre_approve->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensescategories->pre_approve->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensescategories->pre_approve->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensescategories->HospID->Visible) { // HospID ?>
	<?php if ($hr_expensescategories->sortUrl($hr_expensescategories->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_expensescategories->HospID->headerCellClass() ?>"><div id="elh_hr_expensescategories_HospID" class="hr_expensescategories_HospID"><div class="ew-table-header-caption"><?php echo $hr_expensescategories->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_expensescategories->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensescategories->SortUrl($hr_expensescategories->HospID) ?>',1);"><div id="elh_hr_expensescategories_HospID" class="hr_expensescategories_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensescategories->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensescategories->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensescategories->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_expensescategories_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_expensescategories->ExportAll && $hr_expensescategories->isExport()) {
	$hr_expensescategories_list->StopRec = $hr_expensescategories_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_expensescategories_list->TotalRecs > $hr_expensescategories_list->StartRec + $hr_expensescategories_list->DisplayRecs - 1)
		$hr_expensescategories_list->StopRec = $hr_expensescategories_list->StartRec + $hr_expensescategories_list->DisplayRecs - 1;
	else
		$hr_expensescategories_list->StopRec = $hr_expensescategories_list->TotalRecs;
}
$hr_expensescategories_list->RecCnt = $hr_expensescategories_list->StartRec - 1;
if ($hr_expensescategories_list->Recordset && !$hr_expensescategories_list->Recordset->EOF) {
	$hr_expensescategories_list->Recordset->moveFirst();
	$selectLimit = $hr_expensescategories_list->UseSelectLimit;
	if (!$selectLimit && $hr_expensescategories_list->StartRec > 1)
		$hr_expensescategories_list->Recordset->move($hr_expensescategories_list->StartRec - 1);
} elseif (!$hr_expensescategories->AllowAddDeleteRow && $hr_expensescategories_list->StopRec == 0) {
	$hr_expensescategories_list->StopRec = $hr_expensescategories->GridAddRowCount;
}

// Initialize aggregate
$hr_expensescategories->RowType = ROWTYPE_AGGREGATEINIT;
$hr_expensescategories->resetAttributes();
$hr_expensescategories_list->renderRow();
while ($hr_expensescategories_list->RecCnt < $hr_expensescategories_list->StopRec) {
	$hr_expensescategories_list->RecCnt++;
	if ($hr_expensescategories_list->RecCnt >= $hr_expensescategories_list->StartRec) {
		$hr_expensescategories_list->RowCnt++;

		// Set up key count
		$hr_expensescategories_list->KeyCount = $hr_expensescategories_list->RowIndex;

		// Init row class and style
		$hr_expensescategories->resetAttributes();
		$hr_expensescategories->CssClass = "";
		if ($hr_expensescategories->isGridAdd()) {
		} else {
			$hr_expensescategories_list->loadRowValues($hr_expensescategories_list->Recordset); // Load row values
		}
		$hr_expensescategories->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_expensescategories->RowAttrs = array_merge($hr_expensescategories->RowAttrs, array('data-rowindex'=>$hr_expensescategories_list->RowCnt, 'id'=>'r' . $hr_expensescategories_list->RowCnt . '_hr_expensescategories', 'data-rowtype'=>$hr_expensescategories->RowType));

		// Render row
		$hr_expensescategories_list->renderRow();

		// Render list options
		$hr_expensescategories_list->renderListOptions();
?>
	<tr<?php echo $hr_expensescategories->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_expensescategories_list->ListOptions->render("body", "left", $hr_expensescategories_list->RowCnt);
?>
	<?php if ($hr_expensescategories->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_expensescategories->id->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_list->RowCnt ?>_hr_expensescategories_id" class="hr_expensescategories_id">
<span<?php echo $hr_expensescategories->id->viewAttributes() ?>>
<?php echo $hr_expensescategories->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensescategories->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_expensescategories->name->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_list->RowCnt ?>_hr_expensescategories_name" class="hr_expensescategories_name">
<span<?php echo $hr_expensescategories->name->viewAttributes() ?>>
<?php echo $hr_expensescategories->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensescategories->created->Visible) { // created ?>
		<td data-name="created"<?php echo $hr_expensescategories->created->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_list->RowCnt ?>_hr_expensescategories_created" class="hr_expensescategories_created">
<span<?php echo $hr_expensescategories->created->viewAttributes() ?>>
<?php echo $hr_expensescategories->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensescategories->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $hr_expensescategories->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_list->RowCnt ?>_hr_expensescategories_updated" class="hr_expensescategories_updated">
<span<?php echo $hr_expensescategories->updated->viewAttributes() ?>>
<?php echo $hr_expensescategories->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensescategories->pre_approve->Visible) { // pre_approve ?>
		<td data-name="pre_approve"<?php echo $hr_expensescategories->pre_approve->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_list->RowCnt ?>_hr_expensescategories_pre_approve" class="hr_expensescategories_pre_approve">
<span<?php echo $hr_expensescategories->pre_approve->viewAttributes() ?>>
<?php echo $hr_expensescategories->pre_approve->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensescategories->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_expensescategories->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_list->RowCnt ?>_hr_expensescategories_HospID" class="hr_expensescategories_HospID">
<span<?php echo $hr_expensescategories->HospID->viewAttributes() ?>>
<?php echo $hr_expensescategories->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_expensescategories_list->ListOptions->render("body", "right", $hr_expensescategories_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_expensescategories->isGridAdd())
		$hr_expensescategories_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_expensescategories->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_expensescategories_list->Recordset)
	$hr_expensescategories_list->Recordset->Close();
?>
<?php if (!$hr_expensescategories->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_expensescategories->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_expensescategories_list->Pager)) $hr_expensescategories_list->Pager = new NumericPager($hr_expensescategories_list->StartRec, $hr_expensescategories_list->DisplayRecs, $hr_expensescategories_list->TotalRecs, $hr_expensescategories_list->RecRange, $hr_expensescategories_list->AutoHidePager) ?>
<?php if ($hr_expensescategories_list->Pager->RecordCount > 0 && $hr_expensescategories_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_expensescategories_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensescategories_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_expensescategories_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_expensescategories_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_expensescategories_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensescategories_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensescategories_list->pageUrl() ?>start=<?php echo $hr_expensescategories_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_expensescategories_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_expensescategories_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_expensescategories_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_expensescategories_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_expensescategories_list->TotalRecs > 0 && (!$hr_expensescategories_list->AutoHidePageSizeSelector || $hr_expensescategories_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_expensescategories">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_expensescategories_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_expensescategories_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_expensescategories_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_expensescategories_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_expensescategories_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_expensescategories_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_expensescategories->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_expensescategories_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_expensescategories_list->TotalRecs == 0 && !$hr_expensescategories->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_expensescategories_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_expensescategories_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_expensescategories->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_expensescategories->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_expensescategories", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_expensescategories_list->terminate();
?>