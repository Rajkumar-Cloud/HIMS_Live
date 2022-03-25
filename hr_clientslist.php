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
$hr_clients_list = new hr_clients_list();

// Run the page
$hr_clients_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_clients_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_clients->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_clientslist = currentForm = new ew.Form("fhr_clientslist", "list");
fhr_clientslist.formKeyCountName = '<?php echo $hr_clients_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_clientslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_clientslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_clientslist.lists["x_status"] = <?php echo $hr_clients_list->status->Lookup->toClientList() ?>;
fhr_clientslist.lists["x_status"].options = <?php echo JsonEncode($hr_clients_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_clientslistsrch = currentSearchForm = new ew.Form("fhr_clientslistsrch");

// Validate function for search
fhr_clientslistsrch.validate = function(fobj) {
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
fhr_clientslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_clientslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_clientslistsrch.lists["x_status"] = <?php echo $hr_clients_list->status->Lookup->toClientList() ?>;
fhr_clientslistsrch.lists["x_status"].options = <?php echo JsonEncode($hr_clients_list->status->options(FALSE, TRUE)) ?>;

// Filters
fhr_clientslistsrch.filterList = <?php echo $hr_clients_list->getFilterList() ?>;
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
<?php if (!$hr_clients->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_clients_list->TotalRecs > 0 && $hr_clients_list->ExportOptions->visible()) { ?>
<?php $hr_clients_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_clients_list->ImportOptions->visible()) { ?>
<?php $hr_clients_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_clients_list->SearchOptions->visible()) { ?>
<?php $hr_clients_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_clients_list->FilterOptions->visible()) { ?>
<?php $hr_clients_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_clients_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_clients->isExport() && !$hr_clients->CurrentAction) { ?>
<form name="fhr_clientslistsrch" id="fhr_clientslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_clients_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_clientslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_clients">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_clients_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_clients->RowType = ROWTYPE_SEARCH;

// Render row
$hr_clients->resetAttributes();
$hr_clients_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_clients->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_clients->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_clients" data-field="x_status" data-value-separator="<?php echo $hr_clients->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_clients->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_clients->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_clients_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_clients_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_clients_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_clients_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_clients_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_clients_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_clients_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_clients_list->showPageHeader(); ?>
<?php
$hr_clients_list->showMessage();
?>
<?php if ($hr_clients_list->TotalRecs > 0 || $hr_clients->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_clients_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_clients">
<?php if (!$hr_clients->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_clients->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_clients_list->Pager)) $hr_clients_list->Pager = new NumericPager($hr_clients_list->StartRec, $hr_clients_list->DisplayRecs, $hr_clients_list->TotalRecs, $hr_clients_list->RecRange, $hr_clients_list->AutoHidePager) ?>
<?php if ($hr_clients_list->Pager->RecordCount > 0 && $hr_clients_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_clients_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_clients_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_clients_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_clients_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_clients_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_clients_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_clients_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_clients_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_clients_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_clients_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_clients_list->TotalRecs > 0 && (!$hr_clients_list->AutoHidePageSizeSelector || $hr_clients_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_clients">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_clients_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_clients_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_clients_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_clients_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_clients_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_clients_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_clients->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_clients_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_clientslist" id="fhr_clientslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_clients_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_clients_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_clients">
<div id="gmp_hr_clients" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_clients_list->TotalRecs > 0 || $hr_clients->isGridEdit()) { ?>
<table id="tbl_hr_clientslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_clients_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_clients_list->renderListOptions();

// Render list options (header, left)
$hr_clients_list->ListOptions->render("header", "left");
?>
<?php if ($hr_clients->id->Visible) { // id ?>
	<?php if ($hr_clients->sortUrl($hr_clients->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_clients->id->headerCellClass() ?>"><div id="elh_hr_clients_id" class="hr_clients_id"><div class="ew-table-header-caption"><?php echo $hr_clients->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_clients->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->id) ?>',1);"><div id="elh_hr_clients_id" class="hr_clients_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_clients->name->Visible) { // name ?>
	<?php if ($hr_clients->sortUrl($hr_clients->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_clients->name->headerCellClass() ?>"><div id="elh_hr_clients_name" class="hr_clients_name"><div class="ew-table-header-caption"><?php echo $hr_clients->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_clients->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->name) ?>',1);"><div id="elh_hr_clients_name" class="hr_clients_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_clients->first_contact_date->Visible) { // first_contact_date ?>
	<?php if ($hr_clients->sortUrl($hr_clients->first_contact_date) == "") { ?>
		<th data-name="first_contact_date" class="<?php echo $hr_clients->first_contact_date->headerCellClass() ?>"><div id="elh_hr_clients_first_contact_date" class="hr_clients_first_contact_date"><div class="ew-table-header-caption"><?php echo $hr_clients->first_contact_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_contact_date" class="<?php echo $hr_clients->first_contact_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->first_contact_date) ?>',1);"><div id="elh_hr_clients_first_contact_date" class="hr_clients_first_contact_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->first_contact_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->first_contact_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->first_contact_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_clients->created->Visible) { // created ?>
	<?php if ($hr_clients->sortUrl($hr_clients->created) == "") { ?>
		<th data-name="created" class="<?php echo $hr_clients->created->headerCellClass() ?>"><div id="elh_hr_clients_created" class="hr_clients_created"><div class="ew-table-header-caption"><?php echo $hr_clients->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $hr_clients->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->created) ?>',1);"><div id="elh_hr_clients_created" class="hr_clients_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_clients->contact_number->Visible) { // contact_number ?>
	<?php if ($hr_clients->sortUrl($hr_clients->contact_number) == "") { ?>
		<th data-name="contact_number" class="<?php echo $hr_clients->contact_number->headerCellClass() ?>"><div id="elh_hr_clients_contact_number" class="hr_clients_contact_number"><div class="ew-table-header-caption"><?php echo $hr_clients->contact_number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contact_number" class="<?php echo $hr_clients->contact_number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->contact_number) ?>',1);"><div id="elh_hr_clients_contact_number" class="hr_clients_contact_number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->contact_number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->contact_number->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->contact_number->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_clients->contact_email->Visible) { // contact_email ?>
	<?php if ($hr_clients->sortUrl($hr_clients->contact_email) == "") { ?>
		<th data-name="contact_email" class="<?php echo $hr_clients->contact_email->headerCellClass() ?>"><div id="elh_hr_clients_contact_email" class="hr_clients_contact_email"><div class="ew-table-header-caption"><?php echo $hr_clients->contact_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contact_email" class="<?php echo $hr_clients->contact_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->contact_email) ?>',1);"><div id="elh_hr_clients_contact_email" class="hr_clients_contact_email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->contact_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->contact_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->contact_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_clients->status->Visible) { // status ?>
	<?php if ($hr_clients->sortUrl($hr_clients->status) == "") { ?>
		<th data-name="status" class="<?php echo $hr_clients->status->headerCellClass() ?>"><div id="elh_hr_clients_status" class="hr_clients_status"><div class="ew-table-header-caption"><?php echo $hr_clients->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hr_clients->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->status) ?>',1);"><div id="elh_hr_clients_status" class="hr_clients_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_clients->HospID->Visible) { // HospID ?>
	<?php if ($hr_clients->sortUrl($hr_clients->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_clients->HospID->headerCellClass() ?>"><div id="elh_hr_clients_HospID" class="hr_clients_HospID"><div class="ew-table-header-caption"><?php echo $hr_clients->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_clients->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_clients->SortUrl($hr_clients->HospID) ?>',1);"><div id="elh_hr_clients_HospID" class="hr_clients_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_clients->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_clients->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_clients->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_clients_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_clients->ExportAll && $hr_clients->isExport()) {
	$hr_clients_list->StopRec = $hr_clients_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_clients_list->TotalRecs > $hr_clients_list->StartRec + $hr_clients_list->DisplayRecs - 1)
		$hr_clients_list->StopRec = $hr_clients_list->StartRec + $hr_clients_list->DisplayRecs - 1;
	else
		$hr_clients_list->StopRec = $hr_clients_list->TotalRecs;
}
$hr_clients_list->RecCnt = $hr_clients_list->StartRec - 1;
if ($hr_clients_list->Recordset && !$hr_clients_list->Recordset->EOF) {
	$hr_clients_list->Recordset->moveFirst();
	$selectLimit = $hr_clients_list->UseSelectLimit;
	if (!$selectLimit && $hr_clients_list->StartRec > 1)
		$hr_clients_list->Recordset->move($hr_clients_list->StartRec - 1);
} elseif (!$hr_clients->AllowAddDeleteRow && $hr_clients_list->StopRec == 0) {
	$hr_clients_list->StopRec = $hr_clients->GridAddRowCount;
}

// Initialize aggregate
$hr_clients->RowType = ROWTYPE_AGGREGATEINIT;
$hr_clients->resetAttributes();
$hr_clients_list->renderRow();
while ($hr_clients_list->RecCnt < $hr_clients_list->StopRec) {
	$hr_clients_list->RecCnt++;
	if ($hr_clients_list->RecCnt >= $hr_clients_list->StartRec) {
		$hr_clients_list->RowCnt++;

		// Set up key count
		$hr_clients_list->KeyCount = $hr_clients_list->RowIndex;

		// Init row class and style
		$hr_clients->resetAttributes();
		$hr_clients->CssClass = "";
		if ($hr_clients->isGridAdd()) {
		} else {
			$hr_clients_list->loadRowValues($hr_clients_list->Recordset); // Load row values
		}
		$hr_clients->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_clients->RowAttrs = array_merge($hr_clients->RowAttrs, array('data-rowindex'=>$hr_clients_list->RowCnt, 'id'=>'r' . $hr_clients_list->RowCnt . '_hr_clients', 'data-rowtype'=>$hr_clients->RowType));

		// Render row
		$hr_clients_list->renderRow();

		// Render list options
		$hr_clients_list->renderListOptions();
?>
	<tr<?php echo $hr_clients->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_clients_list->ListOptions->render("body", "left", $hr_clients_list->RowCnt);
?>
	<?php if ($hr_clients->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_clients->id->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_id" class="hr_clients_id">
<span<?php echo $hr_clients->id->viewAttributes() ?>>
<?php echo $hr_clients->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_clients->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_clients->name->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_name" class="hr_clients_name">
<span<?php echo $hr_clients->name->viewAttributes() ?>>
<?php echo $hr_clients->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_clients->first_contact_date->Visible) { // first_contact_date ?>
		<td data-name="first_contact_date"<?php echo $hr_clients->first_contact_date->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_first_contact_date" class="hr_clients_first_contact_date">
<span<?php echo $hr_clients->first_contact_date->viewAttributes() ?>>
<?php echo $hr_clients->first_contact_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_clients->created->Visible) { // created ?>
		<td data-name="created"<?php echo $hr_clients->created->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_created" class="hr_clients_created">
<span<?php echo $hr_clients->created->viewAttributes() ?>>
<?php echo $hr_clients->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_clients->contact_number->Visible) { // contact_number ?>
		<td data-name="contact_number"<?php echo $hr_clients->contact_number->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_contact_number" class="hr_clients_contact_number">
<span<?php echo $hr_clients->contact_number->viewAttributes() ?>>
<?php echo $hr_clients->contact_number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_clients->contact_email->Visible) { // contact_email ?>
		<td data-name="contact_email"<?php echo $hr_clients->contact_email->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_contact_email" class="hr_clients_contact_email">
<span<?php echo $hr_clients->contact_email->viewAttributes() ?>>
<?php echo $hr_clients->contact_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_clients->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hr_clients->status->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_status" class="hr_clients_status">
<span<?php echo $hr_clients->status->viewAttributes() ?>>
<?php echo $hr_clients->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_clients->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_clients->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_clients_list->RowCnt ?>_hr_clients_HospID" class="hr_clients_HospID">
<span<?php echo $hr_clients->HospID->viewAttributes() ?>>
<?php echo $hr_clients->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_clients_list->ListOptions->render("body", "right", $hr_clients_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_clients->isGridAdd())
		$hr_clients_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_clients->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_clients_list->Recordset)
	$hr_clients_list->Recordset->Close();
?>
<?php if (!$hr_clients->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_clients->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_clients_list->Pager)) $hr_clients_list->Pager = new NumericPager($hr_clients_list->StartRec, $hr_clients_list->DisplayRecs, $hr_clients_list->TotalRecs, $hr_clients_list->RecRange, $hr_clients_list->AutoHidePager) ?>
<?php if ($hr_clients_list->Pager->RecordCount > 0 && $hr_clients_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_clients_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_clients_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_clients_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_clients_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_clients_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_clients_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_clients_list->pageUrl() ?>start=<?php echo $hr_clients_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_clients_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_clients_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_clients_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_clients_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_clients_list->TotalRecs > 0 && (!$hr_clients_list->AutoHidePageSizeSelector || $hr_clients_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_clients">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_clients_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_clients_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_clients_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_clients_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_clients_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_clients_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_clients->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_clients_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_clients_list->TotalRecs == 0 && !$hr_clients->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_clients_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_clients_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_clients->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_clients->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_clients", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_clients_list->terminate();
?>