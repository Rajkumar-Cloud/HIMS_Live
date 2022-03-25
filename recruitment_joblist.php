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
$recruitment_job_list = new recruitment_job_list();

// Run the page
$recruitment_job_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_job_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_job->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var frecruitment_joblist = currentForm = new ew.Form("frecruitment_joblist", "list");
frecruitment_joblist.formKeyCountName = '<?php echo $recruitment_job_list->FormKeyCountName ?>';

// Form_CustomValidate event
frecruitment_joblist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_joblist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_joblist.lists["x_showSalary"] = <?php echo $recruitment_job_list->showSalary->Lookup->toClientList() ?>;
frecruitment_joblist.lists["x_showSalary"].options = <?php echo JsonEncode($recruitment_job_list->showSalary->options(FALSE, TRUE)) ?>;
frecruitment_joblist.lists["x_status"] = <?php echo $recruitment_job_list->status->Lookup->toClientList() ?>;
frecruitment_joblist.lists["x_status"].options = <?php echo JsonEncode($recruitment_job_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var frecruitment_joblistsrch = currentSearchForm = new ew.Form("frecruitment_joblistsrch");

// Validate function for search
frecruitment_joblistsrch.validate = function(fobj) {
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
frecruitment_joblistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_joblistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_joblistsrch.lists["x_showSalary"] = <?php echo $recruitment_job_list->showSalary->Lookup->toClientList() ?>;
frecruitment_joblistsrch.lists["x_showSalary"].options = <?php echo JsonEncode($recruitment_job_list->showSalary->options(FALSE, TRUE)) ?>;
frecruitment_joblistsrch.lists["x_status"] = <?php echo $recruitment_job_list->status->Lookup->toClientList() ?>;
frecruitment_joblistsrch.lists["x_status"].options = <?php echo JsonEncode($recruitment_job_list->status->options(FALSE, TRUE)) ?>;

// Filters
frecruitment_joblistsrch.filterList = <?php echo $recruitment_job_list->getFilterList() ?>;
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
<?php if (!$recruitment_job->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($recruitment_job_list->TotalRecs > 0 && $recruitment_job_list->ExportOptions->visible()) { ?>
<?php $recruitment_job_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_job_list->ImportOptions->visible()) { ?>
<?php $recruitment_job_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_job_list->SearchOptions->visible()) { ?>
<?php $recruitment_job_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_job_list->FilterOptions->visible()) { ?>
<?php $recruitment_job_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$recruitment_job_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$recruitment_job->isExport() && !$recruitment_job->CurrentAction) { ?>
<form name="frecruitment_joblistsrch" id="frecruitment_joblistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($recruitment_job_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="frecruitment_joblistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="recruitment_job">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$recruitment_job_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$recruitment_job->RowType = ROWTYPE_SEARCH;

// Render row
$recruitment_job->resetAttributes();
$recruitment_job_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($recruitment_job->showSalary->Visible) { // showSalary ?>
	<div id="xsc_showSalary" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $recruitment_job->showSalary->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_showSalary" id="z_showSalary" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_showSalary" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_job" data-field="x_showSalary" data-value-separator="<?php echo $recruitment_job->showSalary->displayValueSeparatorAttribute() ?>" name="x_showSalary" id="x_showSalary" value="{value}"<?php echo $recruitment_job->showSalary->editAttributes() ?>></div>
<div id="dsl_x_showSalary" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_job->showSalary->radioButtonListHtml(FALSE, "x_showSalary") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($recruitment_job->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $recruitment_job->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_job" data-field="x_status" data-value-separator="<?php echo $recruitment_job->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $recruitment_job->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_job->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($recruitment_job_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($recruitment_job_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $recruitment_job_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($recruitment_job_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($recruitment_job_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($recruitment_job_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($recruitment_job_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $recruitment_job_list->showPageHeader(); ?>
<?php
$recruitment_job_list->showMessage();
?>
<?php if ($recruitment_job_list->TotalRecs > 0 || $recruitment_job->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($recruitment_job_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> recruitment_job">
<?php if (!$recruitment_job->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$recruitment_job->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_job_list->Pager)) $recruitment_job_list->Pager = new NumericPager($recruitment_job_list->StartRec, $recruitment_job_list->DisplayRecs, $recruitment_job_list->TotalRecs, $recruitment_job_list->RecRange, $recruitment_job_list->AutoHidePager) ?>
<?php if ($recruitment_job_list->Pager->RecordCount > 0 && $recruitment_job_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_job_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_job_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_job_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_job_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_job_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_job_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_job_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_job_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_job_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_job_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_job_list->TotalRecs > 0 && (!$recruitment_job_list->AutoHidePageSizeSelector || $recruitment_job_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_job">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_job_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_job_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_job_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_job_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_job_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_job_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_job->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_job_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="frecruitment_joblist" id="frecruitment_joblist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_job_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_job_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_job">
<div id="gmp_recruitment_job" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($recruitment_job_list->TotalRecs > 0 || $recruitment_job->isGridEdit()) { ?>
<table id="tbl_recruitment_joblist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$recruitment_job_list->RowType = ROWTYPE_HEADER;

// Render list options
$recruitment_job_list->renderListOptions();

// Render list options (header, left)
$recruitment_job_list->ListOptions->render("header", "left");
?>
<?php if ($recruitment_job->id->Visible) { // id ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->id) == "") { ?>
		<th data-name="id" class="<?php echo $recruitment_job->id->headerCellClass() ?>"><div id="elh_recruitment_job_id" class="recruitment_job_id"><div class="ew-table-header-caption"><?php echo $recruitment_job->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $recruitment_job->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->id) ?>',1);"><div id="elh_recruitment_job_id" class="recruitment_job_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->title->Visible) { // title ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->title) == "") { ?>
		<th data-name="title" class="<?php echo $recruitment_job->title->headerCellClass() ?>"><div id="elh_recruitment_job_title" class="recruitment_job_title"><div class="ew-table-header-caption"><?php echo $recruitment_job->title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $recruitment_job->title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->title) ?>',1);"><div id="elh_recruitment_job_title" class="recruitment_job_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->country->Visible) { // country ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->country) == "") { ?>
		<th data-name="country" class="<?php echo $recruitment_job->country->headerCellClass() ?>"><div id="elh_recruitment_job_country" class="recruitment_job_country"><div class="ew-table-header-caption"><?php echo $recruitment_job->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $recruitment_job->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->country) ?>',1);"><div id="elh_recruitment_job_country" class="recruitment_job_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->country->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->company->Visible) { // company ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->company) == "") { ?>
		<th data-name="company" class="<?php echo $recruitment_job->company->headerCellClass() ?>"><div id="elh_recruitment_job_company" class="recruitment_job_company"><div class="ew-table-header-caption"><?php echo $recruitment_job->company->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="company" class="<?php echo $recruitment_job->company->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->company) ?>',1);"><div id="elh_recruitment_job_company" class="recruitment_job_company">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->company->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->company->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->company->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->department->Visible) { // department ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->department) == "") { ?>
		<th data-name="department" class="<?php echo $recruitment_job->department->headerCellClass() ?>"><div id="elh_recruitment_job_department" class="recruitment_job_department"><div class="ew-table-header-caption"><?php echo $recruitment_job->department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department" class="<?php echo $recruitment_job->department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->department) ?>',1);"><div id="elh_recruitment_job_department" class="recruitment_job_department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->code->Visible) { // code ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->code) == "") { ?>
		<th data-name="code" class="<?php echo $recruitment_job->code->headerCellClass() ?>"><div id="elh_recruitment_job_code" class="recruitment_job_code"><div class="ew-table-header-caption"><?php echo $recruitment_job->code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="code" class="<?php echo $recruitment_job->code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->code) ?>',1);"><div id="elh_recruitment_job_code" class="recruitment_job_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->employementType->Visible) { // employementType ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->employementType) == "") { ?>
		<th data-name="employementType" class="<?php echo $recruitment_job->employementType->headerCellClass() ?>"><div id="elh_recruitment_job_employementType" class="recruitment_job_employementType"><div class="ew-table-header-caption"><?php echo $recruitment_job->employementType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employementType" class="<?php echo $recruitment_job->employementType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->employementType) ?>',1);"><div id="elh_recruitment_job_employementType" class="recruitment_job_employementType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->employementType->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->employementType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->employementType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->industry->Visible) { // industry ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->industry) == "") { ?>
		<th data-name="industry" class="<?php echo $recruitment_job->industry->headerCellClass() ?>"><div id="elh_recruitment_job_industry" class="recruitment_job_industry"><div class="ew-table-header-caption"><?php echo $recruitment_job->industry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="industry" class="<?php echo $recruitment_job->industry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->industry) ?>',1);"><div id="elh_recruitment_job_industry" class="recruitment_job_industry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->industry->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->industry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->industry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->experienceLevel->Visible) { // experienceLevel ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->experienceLevel) == "") { ?>
		<th data-name="experienceLevel" class="<?php echo $recruitment_job->experienceLevel->headerCellClass() ?>"><div id="elh_recruitment_job_experienceLevel" class="recruitment_job_experienceLevel"><div class="ew-table-header-caption"><?php echo $recruitment_job->experienceLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="experienceLevel" class="<?php echo $recruitment_job->experienceLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->experienceLevel) ?>',1);"><div id="elh_recruitment_job_experienceLevel" class="recruitment_job_experienceLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->experienceLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->experienceLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->experienceLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->jobFunction->Visible) { // jobFunction ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->jobFunction) == "") { ?>
		<th data-name="jobFunction" class="<?php echo $recruitment_job->jobFunction->headerCellClass() ?>"><div id="elh_recruitment_job_jobFunction" class="recruitment_job_jobFunction"><div class="ew-table-header-caption"><?php echo $recruitment_job->jobFunction->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobFunction" class="<?php echo $recruitment_job->jobFunction->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->jobFunction) ?>',1);"><div id="elh_recruitment_job_jobFunction" class="recruitment_job_jobFunction">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->jobFunction->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->jobFunction->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->jobFunction->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->educationLevel->Visible) { // educationLevel ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->educationLevel) == "") { ?>
		<th data-name="educationLevel" class="<?php echo $recruitment_job->educationLevel->headerCellClass() ?>"><div id="elh_recruitment_job_educationLevel" class="recruitment_job_educationLevel"><div class="ew-table-header-caption"><?php echo $recruitment_job->educationLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="educationLevel" class="<?php echo $recruitment_job->educationLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->educationLevel) ?>',1);"><div id="elh_recruitment_job_educationLevel" class="recruitment_job_educationLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->educationLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->educationLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->educationLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->currency->Visible) { // currency ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->currency) == "") { ?>
		<th data-name="currency" class="<?php echo $recruitment_job->currency->headerCellClass() ?>"><div id="elh_recruitment_job_currency" class="recruitment_job_currency"><div class="ew-table-header-caption"><?php echo $recruitment_job->currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="currency" class="<?php echo $recruitment_job->currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->currency) ?>',1);"><div id="elh_recruitment_job_currency" class="recruitment_job_currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->showSalary->Visible) { // showSalary ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->showSalary) == "") { ?>
		<th data-name="showSalary" class="<?php echo $recruitment_job->showSalary->headerCellClass() ?>"><div id="elh_recruitment_job_showSalary" class="recruitment_job_showSalary"><div class="ew-table-header-caption"><?php echo $recruitment_job->showSalary->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="showSalary" class="<?php echo $recruitment_job->showSalary->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->showSalary) ?>',1);"><div id="elh_recruitment_job_showSalary" class="recruitment_job_showSalary">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->showSalary->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->showSalary->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->showSalary->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->salaryMin->Visible) { // salaryMin ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->salaryMin) == "") { ?>
		<th data-name="salaryMin" class="<?php echo $recruitment_job->salaryMin->headerCellClass() ?>"><div id="elh_recruitment_job_salaryMin" class="recruitment_job_salaryMin"><div class="ew-table-header-caption"><?php echo $recruitment_job->salaryMin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="salaryMin" class="<?php echo $recruitment_job->salaryMin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->salaryMin) ?>',1);"><div id="elh_recruitment_job_salaryMin" class="recruitment_job_salaryMin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->salaryMin->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->salaryMin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->salaryMin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->salaryMax->Visible) { // salaryMax ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->salaryMax) == "") { ?>
		<th data-name="salaryMax" class="<?php echo $recruitment_job->salaryMax->headerCellClass() ?>"><div id="elh_recruitment_job_salaryMax" class="recruitment_job_salaryMax"><div class="ew-table-header-caption"><?php echo $recruitment_job->salaryMax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="salaryMax" class="<?php echo $recruitment_job->salaryMax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->salaryMax) ?>',1);"><div id="elh_recruitment_job_salaryMax" class="recruitment_job_salaryMax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->salaryMax->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->salaryMax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->salaryMax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->status->Visible) { // status ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->status) == "") { ?>
		<th data-name="status" class="<?php echo $recruitment_job->status->headerCellClass() ?>"><div id="elh_recruitment_job_status" class="recruitment_job_status"><div class="ew-table-header-caption"><?php echo $recruitment_job->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $recruitment_job->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->status) ?>',1);"><div id="elh_recruitment_job_status" class="recruitment_job_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->closingDate->Visible) { // closingDate ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->closingDate) == "") { ?>
		<th data-name="closingDate" class="<?php echo $recruitment_job->closingDate->headerCellClass() ?>"><div id="elh_recruitment_job_closingDate" class="recruitment_job_closingDate"><div class="ew-table-header-caption"><?php echo $recruitment_job->closingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="closingDate" class="<?php echo $recruitment_job->closingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->closingDate) ?>',1);"><div id="elh_recruitment_job_closingDate" class="recruitment_job_closingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->closingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->closingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->closingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->attachment->Visible) { // attachment ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->attachment) == "") { ?>
		<th data-name="attachment" class="<?php echo $recruitment_job->attachment->headerCellClass() ?>"><div id="elh_recruitment_job_attachment" class="recruitment_job_attachment"><div class="ew-table-header-caption"><?php echo $recruitment_job->attachment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment" class="<?php echo $recruitment_job->attachment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->attachment) ?>',1);"><div id="elh_recruitment_job_attachment" class="recruitment_job_attachment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->attachment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->attachment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->attachment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->display->Visible) { // display ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->display) == "") { ?>
		<th data-name="display" class="<?php echo $recruitment_job->display->headerCellClass() ?>"><div id="elh_recruitment_job_display" class="recruitment_job_display"><div class="ew-table-header-caption"><?php echo $recruitment_job->display->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="display" class="<?php echo $recruitment_job->display->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->display) ?>',1);"><div id="elh_recruitment_job_display" class="recruitment_job_display">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->display->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->display->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->display->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_job->postedBy->Visible) { // postedBy ?>
	<?php if ($recruitment_job->sortUrl($recruitment_job->postedBy) == "") { ?>
		<th data-name="postedBy" class="<?php echo $recruitment_job->postedBy->headerCellClass() ?>"><div id="elh_recruitment_job_postedBy" class="recruitment_job_postedBy"><div class="ew-table-header-caption"><?php echo $recruitment_job->postedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postedBy" class="<?php echo $recruitment_job->postedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_job->SortUrl($recruitment_job->postedBy) ?>',1);"><div id="elh_recruitment_job_postedBy" class="recruitment_job_postedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_job->postedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_job->postedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_job->postedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$recruitment_job_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($recruitment_job->ExportAll && $recruitment_job->isExport()) {
	$recruitment_job_list->StopRec = $recruitment_job_list->TotalRecs;
} else {

	// Set the last record to display
	if ($recruitment_job_list->TotalRecs > $recruitment_job_list->StartRec + $recruitment_job_list->DisplayRecs - 1)
		$recruitment_job_list->StopRec = $recruitment_job_list->StartRec + $recruitment_job_list->DisplayRecs - 1;
	else
		$recruitment_job_list->StopRec = $recruitment_job_list->TotalRecs;
}
$recruitment_job_list->RecCnt = $recruitment_job_list->StartRec - 1;
if ($recruitment_job_list->Recordset && !$recruitment_job_list->Recordset->EOF) {
	$recruitment_job_list->Recordset->moveFirst();
	$selectLimit = $recruitment_job_list->UseSelectLimit;
	if (!$selectLimit && $recruitment_job_list->StartRec > 1)
		$recruitment_job_list->Recordset->move($recruitment_job_list->StartRec - 1);
} elseif (!$recruitment_job->AllowAddDeleteRow && $recruitment_job_list->StopRec == 0) {
	$recruitment_job_list->StopRec = $recruitment_job->GridAddRowCount;
}

// Initialize aggregate
$recruitment_job->RowType = ROWTYPE_AGGREGATEINIT;
$recruitment_job->resetAttributes();
$recruitment_job_list->renderRow();
while ($recruitment_job_list->RecCnt < $recruitment_job_list->StopRec) {
	$recruitment_job_list->RecCnt++;
	if ($recruitment_job_list->RecCnt >= $recruitment_job_list->StartRec) {
		$recruitment_job_list->RowCnt++;

		// Set up key count
		$recruitment_job_list->KeyCount = $recruitment_job_list->RowIndex;

		// Init row class and style
		$recruitment_job->resetAttributes();
		$recruitment_job->CssClass = "";
		if ($recruitment_job->isGridAdd()) {
		} else {
			$recruitment_job_list->loadRowValues($recruitment_job_list->Recordset); // Load row values
		}
		$recruitment_job->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$recruitment_job->RowAttrs = array_merge($recruitment_job->RowAttrs, array('data-rowindex'=>$recruitment_job_list->RowCnt, 'id'=>'r' . $recruitment_job_list->RowCnt . '_recruitment_job', 'data-rowtype'=>$recruitment_job->RowType));

		// Render row
		$recruitment_job_list->renderRow();

		// Render list options
		$recruitment_job_list->renderListOptions();
?>
	<tr<?php echo $recruitment_job->rowAttributes() ?>>
<?php

// Render list options (body, left)
$recruitment_job_list->ListOptions->render("body", "left", $recruitment_job_list->RowCnt);
?>
	<?php if ($recruitment_job->id->Visible) { // id ?>
		<td data-name="id"<?php echo $recruitment_job->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_id" class="recruitment_job_id">
<span<?php echo $recruitment_job->id->viewAttributes() ?>>
<?php echo $recruitment_job->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->title->Visible) { // title ?>
		<td data-name="title"<?php echo $recruitment_job->title->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_title" class="recruitment_job_title">
<span<?php echo $recruitment_job->title->viewAttributes() ?>>
<?php echo $recruitment_job->title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->country->Visible) { // country ?>
		<td data-name="country"<?php echo $recruitment_job->country->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_country" class="recruitment_job_country">
<span<?php echo $recruitment_job->country->viewAttributes() ?>>
<?php echo $recruitment_job->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->company->Visible) { // company ?>
		<td data-name="company"<?php echo $recruitment_job->company->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_company" class="recruitment_job_company">
<span<?php echo $recruitment_job->company->viewAttributes() ?>>
<?php echo $recruitment_job->company->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->department->Visible) { // department ?>
		<td data-name="department"<?php echo $recruitment_job->department->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_department" class="recruitment_job_department">
<span<?php echo $recruitment_job->department->viewAttributes() ?>>
<?php echo $recruitment_job->department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->code->Visible) { // code ?>
		<td data-name="code"<?php echo $recruitment_job->code->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_code" class="recruitment_job_code">
<span<?php echo $recruitment_job->code->viewAttributes() ?>>
<?php echo $recruitment_job->code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->employementType->Visible) { // employementType ?>
		<td data-name="employementType"<?php echo $recruitment_job->employementType->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_employementType" class="recruitment_job_employementType">
<span<?php echo $recruitment_job->employementType->viewAttributes() ?>>
<?php echo $recruitment_job->employementType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->industry->Visible) { // industry ?>
		<td data-name="industry"<?php echo $recruitment_job->industry->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_industry" class="recruitment_job_industry">
<span<?php echo $recruitment_job->industry->viewAttributes() ?>>
<?php echo $recruitment_job->industry->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->experienceLevel->Visible) { // experienceLevel ?>
		<td data-name="experienceLevel"<?php echo $recruitment_job->experienceLevel->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_experienceLevel" class="recruitment_job_experienceLevel">
<span<?php echo $recruitment_job->experienceLevel->viewAttributes() ?>>
<?php echo $recruitment_job->experienceLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->jobFunction->Visible) { // jobFunction ?>
		<td data-name="jobFunction"<?php echo $recruitment_job->jobFunction->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_jobFunction" class="recruitment_job_jobFunction">
<span<?php echo $recruitment_job->jobFunction->viewAttributes() ?>>
<?php echo $recruitment_job->jobFunction->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->educationLevel->Visible) { // educationLevel ?>
		<td data-name="educationLevel"<?php echo $recruitment_job->educationLevel->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_educationLevel" class="recruitment_job_educationLevel">
<span<?php echo $recruitment_job->educationLevel->viewAttributes() ?>>
<?php echo $recruitment_job->educationLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->currency->Visible) { // currency ?>
		<td data-name="currency"<?php echo $recruitment_job->currency->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_currency" class="recruitment_job_currency">
<span<?php echo $recruitment_job->currency->viewAttributes() ?>>
<?php echo $recruitment_job->currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->showSalary->Visible) { // showSalary ?>
		<td data-name="showSalary"<?php echo $recruitment_job->showSalary->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_showSalary" class="recruitment_job_showSalary">
<span<?php echo $recruitment_job->showSalary->viewAttributes() ?>>
<?php echo $recruitment_job->showSalary->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->salaryMin->Visible) { // salaryMin ?>
		<td data-name="salaryMin"<?php echo $recruitment_job->salaryMin->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_salaryMin" class="recruitment_job_salaryMin">
<span<?php echo $recruitment_job->salaryMin->viewAttributes() ?>>
<?php echo $recruitment_job->salaryMin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->salaryMax->Visible) { // salaryMax ?>
		<td data-name="salaryMax"<?php echo $recruitment_job->salaryMax->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_salaryMax" class="recruitment_job_salaryMax">
<span<?php echo $recruitment_job->salaryMax->viewAttributes() ?>>
<?php echo $recruitment_job->salaryMax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->status->Visible) { // status ?>
		<td data-name="status"<?php echo $recruitment_job->status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_status" class="recruitment_job_status">
<span<?php echo $recruitment_job->status->viewAttributes() ?>>
<?php echo $recruitment_job->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->closingDate->Visible) { // closingDate ?>
		<td data-name="closingDate"<?php echo $recruitment_job->closingDate->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_closingDate" class="recruitment_job_closingDate">
<span<?php echo $recruitment_job->closingDate->viewAttributes() ?>>
<?php echo $recruitment_job->closingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->attachment->Visible) { // attachment ?>
		<td data-name="attachment"<?php echo $recruitment_job->attachment->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_attachment" class="recruitment_job_attachment">
<span<?php echo $recruitment_job->attachment->viewAttributes() ?>>
<?php echo $recruitment_job->attachment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->display->Visible) { // display ?>
		<td data-name="display"<?php echo $recruitment_job->display->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_display" class="recruitment_job_display">
<span<?php echo $recruitment_job->display->viewAttributes() ?>>
<?php echo $recruitment_job->display->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_job->postedBy->Visible) { // postedBy ?>
		<td data-name="postedBy"<?php echo $recruitment_job->postedBy->cellAttributes() ?>>
<span id="el<?php echo $recruitment_job_list->RowCnt ?>_recruitment_job_postedBy" class="recruitment_job_postedBy">
<span<?php echo $recruitment_job->postedBy->viewAttributes() ?>>
<?php echo $recruitment_job->postedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$recruitment_job_list->ListOptions->render("body", "right", $recruitment_job_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$recruitment_job->isGridAdd())
		$recruitment_job_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$recruitment_job->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($recruitment_job_list->Recordset)
	$recruitment_job_list->Recordset->Close();
?>
<?php if (!$recruitment_job->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$recruitment_job->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_job_list->Pager)) $recruitment_job_list->Pager = new NumericPager($recruitment_job_list->StartRec, $recruitment_job_list->DisplayRecs, $recruitment_job_list->TotalRecs, $recruitment_job_list->RecRange, $recruitment_job_list->AutoHidePager) ?>
<?php if ($recruitment_job_list->Pager->RecordCount > 0 && $recruitment_job_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_job_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_job_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_job_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_job_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_job_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_job_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_job_list->pageUrl() ?>start=<?php echo $recruitment_job_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_job_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_job_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_job_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_job_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_job_list->TotalRecs > 0 && (!$recruitment_job_list->AutoHidePageSizeSelector || $recruitment_job_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_job">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_job_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_job_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_job_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_job_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_job_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_job_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_job->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_job_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($recruitment_job_list->TotalRecs == 0 && !$recruitment_job->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $recruitment_job_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$recruitment_job_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_job->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$recruitment_job->isExport()) { ?>
<script>
ew.scrollableTable("gmp_recruitment_job", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_job_list->terminate();
?>