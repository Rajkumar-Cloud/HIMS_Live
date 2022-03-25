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
$employee_immigrationdocuments_list = new employee_immigrationdocuments_list();

// Run the page
$employee_immigrationdocuments_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrationdocuments_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_immigrationdocumentslist = currentForm = new ew.Form("femployee_immigrationdocumentslist", "list");
femployee_immigrationdocumentslist.formKeyCountName = '<?php echo $employee_immigrationdocuments_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_immigrationdocumentslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationdocumentslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationdocumentslist.lists["x_required"] = <?php echo $employee_immigrationdocuments_list->required->Lookup->toClientList() ?>;
femployee_immigrationdocumentslist.lists["x_required"].options = <?php echo JsonEncode($employee_immigrationdocuments_list->required->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentslist.lists["x_alert_on_missing"] = <?php echo $employee_immigrationdocuments_list->alert_on_missing->Lookup->toClientList() ?>;
femployee_immigrationdocumentslist.lists["x_alert_on_missing"].options = <?php echo JsonEncode($employee_immigrationdocuments_list->alert_on_missing->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentslist.lists["x_alert_before_expiry"] = <?php echo $employee_immigrationdocuments_list->alert_before_expiry->Lookup->toClientList() ?>;
femployee_immigrationdocumentslist.lists["x_alert_before_expiry"].options = <?php echo JsonEncode($employee_immigrationdocuments_list->alert_before_expiry->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_immigrationdocumentslistsrch = currentSearchForm = new ew.Form("femployee_immigrationdocumentslistsrch");

// Validate function for search
femployee_immigrationdocumentslistsrch.validate = function(fobj) {
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
femployee_immigrationdocumentslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationdocumentslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationdocumentslistsrch.lists["x_required"] = <?php echo $employee_immigrationdocuments_list->required->Lookup->toClientList() ?>;
femployee_immigrationdocumentslistsrch.lists["x_required"].options = <?php echo JsonEncode($employee_immigrationdocuments_list->required->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentslistsrch.lists["x_alert_on_missing"] = <?php echo $employee_immigrationdocuments_list->alert_on_missing->Lookup->toClientList() ?>;
femployee_immigrationdocumentslistsrch.lists["x_alert_on_missing"].options = <?php echo JsonEncode($employee_immigrationdocuments_list->alert_on_missing->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentslistsrch.lists["x_alert_before_expiry"] = <?php echo $employee_immigrationdocuments_list->alert_before_expiry->Lookup->toClientList() ?>;
femployee_immigrationdocumentslistsrch.lists["x_alert_before_expiry"].options = <?php echo JsonEncode($employee_immigrationdocuments_list->alert_before_expiry->options(FALSE, TRUE)) ?>;

// Filters
femployee_immigrationdocumentslistsrch.filterList = <?php echo $employee_immigrationdocuments_list->getFilterList() ?>;
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
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_immigrationdocuments_list->TotalRecs > 0 && $employee_immigrationdocuments_list->ExportOptions->visible()) { ?>
<?php $employee_immigrationdocuments_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_immigrationdocuments_list->ImportOptions->visible()) { ?>
<?php $employee_immigrationdocuments_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_immigrationdocuments_list->SearchOptions->visible()) { ?>
<?php $employee_immigrationdocuments_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_immigrationdocuments_list->FilterOptions->visible()) { ?>
<?php $employee_immigrationdocuments_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_immigrationdocuments_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_immigrationdocuments->isExport() && !$employee_immigrationdocuments->CurrentAction) { ?>
<form name="femployee_immigrationdocumentslistsrch" id="femployee_immigrationdocumentslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_immigrationdocuments_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_immigrationdocumentslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_immigrationdocuments">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_immigrationdocuments_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_immigrationdocuments->RowType = ROWTYPE_SEARCH;

// Render row
$employee_immigrationdocuments->resetAttributes();
$employee_immigrationdocuments_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_immigrationdocuments->required->Visible) { // required ?>
	<div id="xsc_required" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_immigrationdocuments->required->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_required" id="z_required" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_required" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrationdocuments" data-field="x_required" data-value-separator="<?php echo $employee_immigrationdocuments->required->displayValueSeparatorAttribute() ?>" name="x_required" id="x_required" value="{value}"<?php echo $employee_immigrationdocuments->required->editAttributes() ?>></div>
<div id="dsl_x_required" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrationdocuments->required->radioButtonListHtml(FALSE, "x_required") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($employee_immigrationdocuments->alert_on_missing->Visible) { // alert_on_missing ?>
	<div id="xsc_alert_on_missing" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_immigrationdocuments->alert_on_missing->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_alert_on_missing" id="z_alert_on_missing" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_alert_on_missing" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrationdocuments" data-field="x_alert_on_missing" data-value-separator="<?php echo $employee_immigrationdocuments->alert_on_missing->displayValueSeparatorAttribute() ?>" name="x_alert_on_missing" id="x_alert_on_missing" value="{value}"<?php echo $employee_immigrationdocuments->alert_on_missing->editAttributes() ?>></div>
<div id="dsl_x_alert_on_missing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrationdocuments->alert_on_missing->radioButtonListHtml(FALSE, "x_alert_on_missing") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($employee_immigrationdocuments->alert_before_expiry->Visible) { // alert_before_expiry ?>
	<div id="xsc_alert_before_expiry" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_immigrationdocuments->alert_before_expiry->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_alert_before_expiry" id="z_alert_before_expiry" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_alert_before_expiry" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_immigrationdocuments" data-field="x_alert_before_expiry" data-value-separator="<?php echo $employee_immigrationdocuments->alert_before_expiry->displayValueSeparatorAttribute() ?>" name="x_alert_before_expiry" id="x_alert_before_expiry" value="{value}"<?php echo $employee_immigrationdocuments->alert_before_expiry->editAttributes() ?>></div>
<div id="dsl_x_alert_before_expiry" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_immigrationdocuments->alert_before_expiry->radioButtonListHtml(FALSE, "x_alert_before_expiry") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_immigrationdocuments_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_immigrationdocuments_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_immigrationdocuments_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_immigrationdocuments_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_immigrationdocuments_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_immigrationdocuments_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_immigrationdocuments_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_immigrationdocuments_list->showPageHeader(); ?>
<?php
$employee_immigrationdocuments_list->showMessage();
?>
<?php if ($employee_immigrationdocuments_list->TotalRecs > 0 || $employee_immigrationdocuments->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_immigrationdocuments_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_immigrationdocuments">
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_immigrationdocuments->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_immigrationdocuments_list->Pager)) $employee_immigrationdocuments_list->Pager = new NumericPager($employee_immigrationdocuments_list->StartRec, $employee_immigrationdocuments_list->DisplayRecs, $employee_immigrationdocuments_list->TotalRecs, $employee_immigrationdocuments_list->RecRange, $employee_immigrationdocuments_list->AutoHidePager) ?>
<?php if ($employee_immigrationdocuments_list->Pager->RecordCount > 0 && $employee_immigrationdocuments_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_immigrationdocuments_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrationdocuments_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_immigrationdocuments_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_immigrationdocuments_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrationdocuments_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrationdocuments_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_immigrationdocuments_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_immigrationdocuments_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_immigrationdocuments_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_immigrationdocuments_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_immigrationdocuments_list->TotalRecs > 0 && (!$employee_immigrationdocuments_list->AutoHidePageSizeSelector || $employee_immigrationdocuments_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_immigrationdocuments">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_immigrationdocuments->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_immigrationdocuments_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_immigrationdocumentslist" id="femployee_immigrationdocumentslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrationdocuments_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrationdocuments_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
<div id="gmp_employee_immigrationdocuments" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_immigrationdocuments_list->TotalRecs > 0 || $employee_immigrationdocuments->isGridEdit()) { ?>
<table id="tbl_employee_immigrationdocumentslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_immigrationdocuments_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_immigrationdocuments_list->renderListOptions();

// Render list options (header, left)
$employee_immigrationdocuments_list->ListOptions->render("header", "left");
?>
<?php if ($employee_immigrationdocuments->id->Visible) { // id ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_immigrationdocuments->id->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_immigrationdocuments->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->id) ?>',1);"><div id="elh_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrationdocuments->name->Visible) { // name ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->name) == "") { ?>
		<th data-name="name" class="<?php echo $employee_immigrationdocuments->name->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $employee_immigrationdocuments->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->name) ?>',1);"><div id="elh_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrationdocuments->required->Visible) { // required ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->required) == "") { ?>
		<th data-name="required" class="<?php echo $employee_immigrationdocuments->required->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->required->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="required" class="<?php echo $employee_immigrationdocuments->required->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->required) ?>',1);"><div id="elh_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->required->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->required->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->required->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_on_missing->Visible) { // alert_on_missing ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->alert_on_missing) == "") { ?>
		<th data-name="alert_on_missing" class="<?php echo $employee_immigrationdocuments->alert_on_missing->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->alert_on_missing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alert_on_missing" class="<?php echo $employee_immigrationdocuments->alert_on_missing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->alert_on_missing) ?>',1);"><div id="elh_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->alert_on_missing->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->alert_on_missing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->alert_on_missing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_expiry->Visible) { // alert_before_expiry ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->alert_before_expiry) == "") { ?>
		<th data-name="alert_before_expiry" class="<?php echo $employee_immigrationdocuments->alert_before_expiry->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->alert_before_expiry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alert_before_expiry" class="<?php echo $employee_immigrationdocuments->alert_before_expiry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->alert_before_expiry) ?>',1);"><div id="elh_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->alert_before_expiry->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->alert_before_expiry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->alert_before_expiry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_day_number->Visible) { // alert_before_day_number ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->alert_before_day_number) == "") { ?>
		<th data-name="alert_before_day_number" class="<?php echo $employee_immigrationdocuments->alert_before_day_number->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->alert_before_day_number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alert_before_day_number" class="<?php echo $employee_immigrationdocuments->alert_before_day_number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->alert_before_day_number) ?>',1);"><div id="elh_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->alert_before_day_number->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->alert_before_day_number->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->alert_before_day_number->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrationdocuments->created->Visible) { // created ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->created) == "") { ?>
		<th data-name="created" class="<?php echo $employee_immigrationdocuments->created->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $employee_immigrationdocuments->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->created) ?>',1);"><div id="elh_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_immigrationdocuments->updated->Visible) { // updated ?>
	<?php if ($employee_immigrationdocuments->sortUrl($employee_immigrationdocuments->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $employee_immigrationdocuments->updated->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated"><div class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $employee_immigrationdocuments->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_immigrationdocuments->SortUrl($employee_immigrationdocuments->updated) ?>',1);"><div id="elh_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_immigrationdocuments->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_immigrationdocuments->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_immigrationdocuments->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_immigrationdocuments_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_immigrationdocuments->ExportAll && $employee_immigrationdocuments->isExport()) {
	$employee_immigrationdocuments_list->StopRec = $employee_immigrationdocuments_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_immigrationdocuments_list->TotalRecs > $employee_immigrationdocuments_list->StartRec + $employee_immigrationdocuments_list->DisplayRecs - 1)
		$employee_immigrationdocuments_list->StopRec = $employee_immigrationdocuments_list->StartRec + $employee_immigrationdocuments_list->DisplayRecs - 1;
	else
		$employee_immigrationdocuments_list->StopRec = $employee_immigrationdocuments_list->TotalRecs;
}
$employee_immigrationdocuments_list->RecCnt = $employee_immigrationdocuments_list->StartRec - 1;
if ($employee_immigrationdocuments_list->Recordset && !$employee_immigrationdocuments_list->Recordset->EOF) {
	$employee_immigrationdocuments_list->Recordset->moveFirst();
	$selectLimit = $employee_immigrationdocuments_list->UseSelectLimit;
	if (!$selectLimit && $employee_immigrationdocuments_list->StartRec > 1)
		$employee_immigrationdocuments_list->Recordset->move($employee_immigrationdocuments_list->StartRec - 1);
} elseif (!$employee_immigrationdocuments->AllowAddDeleteRow && $employee_immigrationdocuments_list->StopRec == 0) {
	$employee_immigrationdocuments_list->StopRec = $employee_immigrationdocuments->GridAddRowCount;
}

// Initialize aggregate
$employee_immigrationdocuments->RowType = ROWTYPE_AGGREGATEINIT;
$employee_immigrationdocuments->resetAttributes();
$employee_immigrationdocuments_list->renderRow();
while ($employee_immigrationdocuments_list->RecCnt < $employee_immigrationdocuments_list->StopRec) {
	$employee_immigrationdocuments_list->RecCnt++;
	if ($employee_immigrationdocuments_list->RecCnt >= $employee_immigrationdocuments_list->StartRec) {
		$employee_immigrationdocuments_list->RowCnt++;

		// Set up key count
		$employee_immigrationdocuments_list->KeyCount = $employee_immigrationdocuments_list->RowIndex;

		// Init row class and style
		$employee_immigrationdocuments->resetAttributes();
		$employee_immigrationdocuments->CssClass = "";
		if ($employee_immigrationdocuments->isGridAdd()) {
		} else {
			$employee_immigrationdocuments_list->loadRowValues($employee_immigrationdocuments_list->Recordset); // Load row values
		}
		$employee_immigrationdocuments->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_immigrationdocuments->RowAttrs = array_merge($employee_immigrationdocuments->RowAttrs, array('data-rowindex'=>$employee_immigrationdocuments_list->RowCnt, 'id'=>'r' . $employee_immigrationdocuments_list->RowCnt . '_employee_immigrationdocuments', 'data-rowtype'=>$employee_immigrationdocuments->RowType));

		// Render row
		$employee_immigrationdocuments_list->renderRow();

		// Render list options
		$employee_immigrationdocuments_list->renderListOptions();
?>
	<tr<?php echo $employee_immigrationdocuments->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_immigrationdocuments_list->ListOptions->render("body", "left", $employee_immigrationdocuments_list->RowCnt);
?>
	<?php if ($employee_immigrationdocuments->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_immigrationdocuments->id->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id">
<span<?php echo $employee_immigrationdocuments->id->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrationdocuments->name->Visible) { // name ?>
		<td data-name="name"<?php echo $employee_immigrationdocuments->name->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name">
<span<?php echo $employee_immigrationdocuments->name->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrationdocuments->required->Visible) { // required ?>
		<td data-name="required"<?php echo $employee_immigrationdocuments->required->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required">
<span<?php echo $employee_immigrationdocuments->required->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->required->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrationdocuments->alert_on_missing->Visible) { // alert_on_missing ?>
		<td data-name="alert_on_missing"<?php echo $employee_immigrationdocuments->alert_on_missing->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing">
<span<?php echo $employee_immigrationdocuments->alert_on_missing->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_on_missing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrationdocuments->alert_before_expiry->Visible) { // alert_before_expiry ?>
		<td data-name="alert_before_expiry"<?php echo $employee_immigrationdocuments->alert_before_expiry->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry">
<span<?php echo $employee_immigrationdocuments->alert_before_expiry->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_before_expiry->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrationdocuments->alert_before_day_number->Visible) { // alert_before_day_number ?>
		<td data-name="alert_before_day_number"<?php echo $employee_immigrationdocuments->alert_before_day_number->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number">
<span<?php echo $employee_immigrationdocuments->alert_before_day_number->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_before_day_number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrationdocuments->created->Visible) { // created ?>
		<td data-name="created"<?php echo $employee_immigrationdocuments->created->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created">
<span<?php echo $employee_immigrationdocuments->created->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_immigrationdocuments->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $employee_immigrationdocuments->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_list->RowCnt ?>_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated">
<span<?php echo $employee_immigrationdocuments->updated->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_immigrationdocuments_list->ListOptions->render("body", "right", $employee_immigrationdocuments_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_immigrationdocuments->isGridAdd())
		$employee_immigrationdocuments_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_immigrationdocuments->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_immigrationdocuments_list->Recordset)
	$employee_immigrationdocuments_list->Recordset->Close();
?>
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_immigrationdocuments->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_immigrationdocuments_list->Pager)) $employee_immigrationdocuments_list->Pager = new NumericPager($employee_immigrationdocuments_list->StartRec, $employee_immigrationdocuments_list->DisplayRecs, $employee_immigrationdocuments_list->TotalRecs, $employee_immigrationdocuments_list->RecRange, $employee_immigrationdocuments_list->AutoHidePager) ?>
<?php if ($employee_immigrationdocuments_list->Pager->RecordCount > 0 && $employee_immigrationdocuments_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_immigrationdocuments_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrationdocuments_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_immigrationdocuments_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_immigrationdocuments_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrationdocuments_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_immigrationdocuments_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_immigrationdocuments_list->pageUrl() ?>start=<?php echo $employee_immigrationdocuments_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_immigrationdocuments_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_immigrationdocuments_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_immigrationdocuments_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_immigrationdocuments_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_immigrationdocuments_list->TotalRecs > 0 && (!$employee_immigrationdocuments_list->AutoHidePageSizeSelector || $employee_immigrationdocuments_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_immigrationdocuments">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_immigrationdocuments_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_immigrationdocuments->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_immigrationdocuments_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_immigrationdocuments_list->TotalRecs == 0 && !$employee_immigrationdocuments->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_immigrationdocuments_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_immigrationdocuments_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_immigrationdocuments->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_immigrationdocuments", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_immigrationdocuments_list->terminate();
?>