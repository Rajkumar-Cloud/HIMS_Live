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
$recruitment_candidates_list = new recruitment_candidates_list();

// Run the page
$recruitment_candidates_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_candidates_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$recruitment_candidates->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var frecruitment_candidateslist = currentForm = new ew.Form("frecruitment_candidateslist", "list");
frecruitment_candidateslist.formKeyCountName = '<?php echo $recruitment_candidates_list->FormKeyCountName ?>';

// Form_CustomValidate event
frecruitment_candidateslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_candidateslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_candidateslist.lists["x_gender"] = <?php echo $recruitment_candidates_list->gender->Lookup->toClientList() ?>;
frecruitment_candidateslist.lists["x_gender"].options = <?php echo JsonEncode($recruitment_candidates_list->gender->options(FALSE, TRUE)) ?>;
frecruitment_candidateslist.lists["x_marital_status"] = <?php echo $recruitment_candidates_list->marital_status->Lookup->toClientList() ?>;
frecruitment_candidateslist.lists["x_marital_status"].options = <?php echo JsonEncode($recruitment_candidates_list->marital_status->options(FALSE, TRUE)) ?>;

// Form object for search
var frecruitment_candidateslistsrch = currentSearchForm = new ew.Form("frecruitment_candidateslistsrch");

// Validate function for search
frecruitment_candidateslistsrch.validate = function(fobj) {
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
frecruitment_candidateslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_candidateslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_candidateslistsrch.lists["x_gender"] = <?php echo $recruitment_candidates_list->gender->Lookup->toClientList() ?>;
frecruitment_candidateslistsrch.lists["x_gender"].options = <?php echo JsonEncode($recruitment_candidates_list->gender->options(FALSE, TRUE)) ?>;
frecruitment_candidateslistsrch.lists["x_marital_status"] = <?php echo $recruitment_candidates_list->marital_status->Lookup->toClientList() ?>;
frecruitment_candidateslistsrch.lists["x_marital_status"].options = <?php echo JsonEncode($recruitment_candidates_list->marital_status->options(FALSE, TRUE)) ?>;

// Filters
frecruitment_candidateslistsrch.filterList = <?php echo $recruitment_candidates_list->getFilterList() ?>;
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
<?php if (!$recruitment_candidates->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($recruitment_candidates_list->TotalRecs > 0 && $recruitment_candidates_list->ExportOptions->visible()) { ?>
<?php $recruitment_candidates_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_candidates_list->ImportOptions->visible()) { ?>
<?php $recruitment_candidates_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_candidates_list->SearchOptions->visible()) { ?>
<?php $recruitment_candidates_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($recruitment_candidates_list->FilterOptions->visible()) { ?>
<?php $recruitment_candidates_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$recruitment_candidates_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$recruitment_candidates->isExport() && !$recruitment_candidates->CurrentAction) { ?>
<form name="frecruitment_candidateslistsrch" id="frecruitment_candidateslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($recruitment_candidates_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="frecruitment_candidateslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="recruitment_candidates">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$recruitment_candidates_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$recruitment_candidates->RowType = ROWTYPE_SEARCH;

// Render row
$recruitment_candidates->resetAttributes();
$recruitment_candidates_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($recruitment_candidates->gender->Visible) { // gender ?>
	<div id="xsc_gender" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $recruitment_candidates->gender->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_gender" id="z_gender" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_gender" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_candidates" data-field="x_gender" data-value-separator="<?php echo $recruitment_candidates->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="{value}"<?php echo $recruitment_candidates->gender->editAttributes() ?>></div>
<div id="dsl_x_gender" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_candidates->gender->radioButtonListHtml(FALSE, "x_gender") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($recruitment_candidates->marital_status->Visible) { // marital_status ?>
	<div id="xsc_marital_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $recruitment_candidates->marital_status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_marital_status" id="z_marital_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_marital_status" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_candidates" data-field="x_marital_status" data-value-separator="<?php echo $recruitment_candidates->marital_status->displayValueSeparatorAttribute() ?>" name="x_marital_status" id="x_marital_status" value="{value}"<?php echo $recruitment_candidates->marital_status->editAttributes() ?>></div>
<div id="dsl_x_marital_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_candidates->marital_status->radioButtonListHtml(FALSE, "x_marital_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($recruitment_candidates_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($recruitment_candidates_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $recruitment_candidates_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($recruitment_candidates_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($recruitment_candidates_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($recruitment_candidates_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($recruitment_candidates_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $recruitment_candidates_list->showPageHeader(); ?>
<?php
$recruitment_candidates_list->showMessage();
?>
<?php if ($recruitment_candidates_list->TotalRecs > 0 || $recruitment_candidates->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($recruitment_candidates_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> recruitment_candidates">
<?php if (!$recruitment_candidates->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$recruitment_candidates->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_candidates_list->Pager)) $recruitment_candidates_list->Pager = new NumericPager($recruitment_candidates_list->StartRec, $recruitment_candidates_list->DisplayRecs, $recruitment_candidates_list->TotalRecs, $recruitment_candidates_list->RecRange, $recruitment_candidates_list->AutoHidePager) ?>
<?php if ($recruitment_candidates_list->Pager->RecordCount > 0 && $recruitment_candidates_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_candidates_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_candidates_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_candidates_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_candidates_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_candidates_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_candidates_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_candidates_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_candidates_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_candidates_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_candidates_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_candidates_list->TotalRecs > 0 && (!$recruitment_candidates_list->AutoHidePageSizeSelector || $recruitment_candidates_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_candidates">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_candidates_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_candidates_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_candidates_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_candidates_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_candidates_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_candidates_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_candidates->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_candidates_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="frecruitment_candidateslist" id="frecruitment_candidateslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_candidates_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_candidates_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<div id="gmp_recruitment_candidates" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($recruitment_candidates_list->TotalRecs > 0 || $recruitment_candidates->isGridEdit()) { ?>
<table id="tbl_recruitment_candidateslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$recruitment_candidates_list->RowType = ROWTYPE_HEADER;

// Render list options
$recruitment_candidates_list->renderListOptions();

// Render list options (header, left)
$recruitment_candidates_list->ListOptions->render("header", "left");
?>
<?php if ($recruitment_candidates->id->Visible) { // id ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->id) == "") { ?>
		<th data-name="id" class="<?php echo $recruitment_candidates->id->headerCellClass() ?>"><div id="elh_recruitment_candidates_id" class="recruitment_candidates_id"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $recruitment_candidates->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->id) ?>',1);"><div id="elh_recruitment_candidates_id" class="recruitment_candidates_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->first_name->Visible) { // first_name ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $recruitment_candidates->first_name->headerCellClass() ?>"><div id="elh_recruitment_candidates_first_name" class="recruitment_candidates_first_name"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $recruitment_candidates->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->first_name) ?>',1);"><div id="elh_recruitment_candidates_first_name" class="recruitment_candidates_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->last_name->Visible) { // last_name ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $recruitment_candidates->last_name->headerCellClass() ?>"><div id="elh_recruitment_candidates_last_name" class="recruitment_candidates_last_name"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $recruitment_candidates->last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->last_name) ?>',1);"><div id="elh_recruitment_candidates_last_name" class="recruitment_candidates_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->nationality->Visible) { // nationality ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->nationality) == "") { ?>
		<th data-name="nationality" class="<?php echo $recruitment_candidates->nationality->headerCellClass() ?>"><div id="elh_recruitment_candidates_nationality" class="recruitment_candidates_nationality"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->nationality->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nationality" class="<?php echo $recruitment_candidates->nationality->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->nationality) ?>',1);"><div id="elh_recruitment_candidates_nationality" class="recruitment_candidates_nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->nationality->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->nationality->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->nationality->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->birthday->Visible) { // birthday ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->birthday) == "") { ?>
		<th data-name="birthday" class="<?php echo $recruitment_candidates->birthday->headerCellClass() ?>"><div id="elh_recruitment_candidates_birthday" class="recruitment_candidates_birthday"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->birthday->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthday" class="<?php echo $recruitment_candidates->birthday->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->birthday) ?>',1);"><div id="elh_recruitment_candidates_birthday" class="recruitment_candidates_birthday">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->birthday->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->birthday->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->birthday->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->gender->Visible) { // gender ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $recruitment_candidates->gender->headerCellClass() ?>"><div id="elh_recruitment_candidates_gender" class="recruitment_candidates_gender"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $recruitment_candidates->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->gender) ?>',1);"><div id="elh_recruitment_candidates_gender" class="recruitment_candidates_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->marital_status->Visible) { // marital_status ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->marital_status) == "") { ?>
		<th data-name="marital_status" class="<?php echo $recruitment_candidates->marital_status->headerCellClass() ?>"><div id="elh_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->marital_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="marital_status" class="<?php echo $recruitment_candidates->marital_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->marital_status) ?>',1);"><div id="elh_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->marital_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->marital_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->marital_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->address1->Visible) { // address1 ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->address1) == "") { ?>
		<th data-name="address1" class="<?php echo $recruitment_candidates->address1->headerCellClass() ?>"><div id="elh_recruitment_candidates_address1" class="recruitment_candidates_address1"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address1" class="<?php echo $recruitment_candidates->address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->address1) ?>',1);"><div id="elh_recruitment_candidates_address1" class="recruitment_candidates_address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->address2->Visible) { // address2 ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->address2) == "") { ?>
		<th data-name="address2" class="<?php echo $recruitment_candidates->address2->headerCellClass() ?>"><div id="elh_recruitment_candidates_address2" class="recruitment_candidates_address2"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="address2" class="<?php echo $recruitment_candidates->address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->address2) ?>',1);"><div id="elh_recruitment_candidates_address2" class="recruitment_candidates_address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->city->Visible) { // city ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->city) == "") { ?>
		<th data-name="city" class="<?php echo $recruitment_candidates->city->headerCellClass() ?>"><div id="elh_recruitment_candidates_city" class="recruitment_candidates_city"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->city->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="city" class="<?php echo $recruitment_candidates->city->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->city) ?>',1);"><div id="elh_recruitment_candidates_city" class="recruitment_candidates_city">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->city->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->city->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->city->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->country->Visible) { // country ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->country) == "") { ?>
		<th data-name="country" class="<?php echo $recruitment_candidates->country->headerCellClass() ?>"><div id="elh_recruitment_candidates_country" class="recruitment_candidates_country"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $recruitment_candidates->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->country) ?>',1);"><div id="elh_recruitment_candidates_country" class="recruitment_candidates_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->province->Visible) { // province ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->province) == "") { ?>
		<th data-name="province" class="<?php echo $recruitment_candidates->province->headerCellClass() ?>"><div id="elh_recruitment_candidates_province" class="recruitment_candidates_province"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $recruitment_candidates->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->province) ?>',1);"><div id="elh_recruitment_candidates_province" class="recruitment_candidates_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->postal_code->Visible) { // postal_code ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $recruitment_candidates->postal_code->headerCellClass() ?>"><div id="elh_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $recruitment_candidates->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->postal_code) ?>',1);"><div id="elh_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->_email->Visible) { // email ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $recruitment_candidates->_email->headerCellClass() ?>"><div id="elh_recruitment_candidates__email" class="recruitment_candidates__email"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $recruitment_candidates->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->_email) ?>',1);"><div id="elh_recruitment_candidates__email" class="recruitment_candidates__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->home_phone->Visible) { // home_phone ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->home_phone) == "") { ?>
		<th data-name="home_phone" class="<?php echo $recruitment_candidates->home_phone->headerCellClass() ?>"><div id="elh_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->home_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="home_phone" class="<?php echo $recruitment_candidates->home_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->home_phone) ?>',1);"><div id="elh_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->home_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->home_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->home_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->mobile_phone->Visible) { // mobile_phone ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->mobile_phone) == "") { ?>
		<th data-name="mobile_phone" class="<?php echo $recruitment_candidates->mobile_phone->headerCellClass() ?>"><div id="elh_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->mobile_phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_phone" class="<?php echo $recruitment_candidates->mobile_phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->mobile_phone) ?>',1);"><div id="elh_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->mobile_phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->mobile_phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->mobile_phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->cv_title->Visible) { // cv_title ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->cv_title) == "") { ?>
		<th data-name="cv_title" class="<?php echo $recruitment_candidates->cv_title->headerCellClass() ?>"><div id="elh_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->cv_title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cv_title" class="<?php echo $recruitment_candidates->cv_title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->cv_title) ?>',1);"><div id="elh_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->cv_title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->cv_title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->cv_title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->cv->Visible) { // cv ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->cv) == "") { ?>
		<th data-name="cv" class="<?php echo $recruitment_candidates->cv->headerCellClass() ?>"><div id="elh_recruitment_candidates_cv" class="recruitment_candidates_cv"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->cv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cv" class="<?php echo $recruitment_candidates->cv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->cv) ?>',1);"><div id="elh_recruitment_candidates_cv" class="recruitment_candidates_cv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->cv->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->cv->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->cv->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->profileImage->Visible) { // profileImage ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->profileImage) == "") { ?>
		<th data-name="profileImage" class="<?php echo $recruitment_candidates->profileImage->headerCellClass() ?>"><div id="elh_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->profileImage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profileImage" class="<?php echo $recruitment_candidates->profileImage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->profileImage) ?>',1);"><div id="elh_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->profileImage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->profileImage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->profileImage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->totalYearsOfExperience) == "") { ?>
		<th data-name="totalYearsOfExperience" class="<?php echo $recruitment_candidates->totalYearsOfExperience->headerCellClass() ?>"><div id="elh_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->totalYearsOfExperience->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="totalYearsOfExperience" class="<?php echo $recruitment_candidates->totalYearsOfExperience->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->totalYearsOfExperience) ?>',1);"><div id="elh_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->totalYearsOfExperience->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->totalYearsOfExperience->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->totalYearsOfExperience->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->totalMonthsOfExperience) == "") { ?>
		<th data-name="totalMonthsOfExperience" class="<?php echo $recruitment_candidates->totalMonthsOfExperience->headerCellClass() ?>"><div id="elh_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->totalMonthsOfExperience->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="totalMonthsOfExperience" class="<?php echo $recruitment_candidates->totalMonthsOfExperience->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->totalMonthsOfExperience) ?>',1);"><div id="elh_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->totalMonthsOfExperience->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->totalMonthsOfExperience->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->totalMonthsOfExperience->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->generatedCVFile->Visible) { // generatedCVFile ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->generatedCVFile) == "") { ?>
		<th data-name="generatedCVFile" class="<?php echo $recruitment_candidates->generatedCVFile->headerCellClass() ?>"><div id="elh_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->generatedCVFile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="generatedCVFile" class="<?php echo $recruitment_candidates->generatedCVFile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->generatedCVFile) ?>',1);"><div id="elh_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->generatedCVFile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->generatedCVFile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->generatedCVFile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->created->Visible) { // created ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->created) == "") { ?>
		<th data-name="created" class="<?php echo $recruitment_candidates->created->headerCellClass() ?>"><div id="elh_recruitment_candidates_created" class="recruitment_candidates_created"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $recruitment_candidates->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->created) ?>',1);"><div id="elh_recruitment_candidates_created" class="recruitment_candidates_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->updated->Visible) { // updated ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $recruitment_candidates->updated->headerCellClass() ?>"><div id="elh_recruitment_candidates_updated" class="recruitment_candidates_updated"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $recruitment_candidates->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->updated) ?>',1);"><div id="elh_recruitment_candidates_updated" class="recruitment_candidates_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->expectedSalary->Visible) { // expectedSalary ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->expectedSalary) == "") { ?>
		<th data-name="expectedSalary" class="<?php echo $recruitment_candidates->expectedSalary->headerCellClass() ?>"><div id="elh_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->expectedSalary->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="expectedSalary" class="<?php echo $recruitment_candidates->expectedSalary->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->expectedSalary) ?>',1);"><div id="elh_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->expectedSalary->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->expectedSalary->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->expectedSalary->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->preferedJobtype->Visible) { // preferedJobtype ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->preferedJobtype) == "") { ?>
		<th data-name="preferedJobtype" class="<?php echo $recruitment_candidates->preferedJobtype->headerCellClass() ?>"><div id="elh_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->preferedJobtype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="preferedJobtype" class="<?php echo $recruitment_candidates->preferedJobtype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->preferedJobtype) ?>',1);"><div id="elh_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->preferedJobtype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->preferedJobtype->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->preferedJobtype->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->age->Visible) { // age ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->age) == "") { ?>
		<th data-name="age" class="<?php echo $recruitment_candidates->age->headerCellClass() ?>"><div id="elh_recruitment_candidates_age" class="recruitment_candidates_age"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $recruitment_candidates->age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->age) ?>',1);"><div id="elh_recruitment_candidates_age" class="recruitment_candidates_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->age->caption() ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->hash->Visible) { // hash ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->hash) == "") { ?>
		<th data-name="hash" class="<?php echo $recruitment_candidates->hash->headerCellClass() ?>"><div id="elh_recruitment_candidates_hash" class="recruitment_candidates_hash"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->hash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hash" class="<?php echo $recruitment_candidates->hash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->hash) ?>',1);"><div id="elh_recruitment_candidates_hash" class="recruitment_candidates_hash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->hash->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->hash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->hash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->linkedInProfileLink) == "") { ?>
		<th data-name="linkedInProfileLink" class="<?php echo $recruitment_candidates->linkedInProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->linkedInProfileLink->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="linkedInProfileLink" class="<?php echo $recruitment_candidates->linkedInProfileLink->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->linkedInProfileLink) ?>',1);"><div id="elh_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->linkedInProfileLink->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->linkedInProfileLink->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->linkedInProfileLink->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileId->Visible) { // linkedInProfileId ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->linkedInProfileId) == "") { ?>
		<th data-name="linkedInProfileId" class="<?php echo $recruitment_candidates->linkedInProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->linkedInProfileId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="linkedInProfileId" class="<?php echo $recruitment_candidates->linkedInProfileId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->linkedInProfileId) ?>',1);"><div id="elh_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->linkedInProfileId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->linkedInProfileId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->linkedInProfileId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileLink->Visible) { // facebookProfileLink ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->facebookProfileLink) == "") { ?>
		<th data-name="facebookProfileLink" class="<?php echo $recruitment_candidates->facebookProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->facebookProfileLink->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="facebookProfileLink" class="<?php echo $recruitment_candidates->facebookProfileLink->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->facebookProfileLink) ?>',1);"><div id="elh_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->facebookProfileLink->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->facebookProfileLink->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->facebookProfileLink->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileId->Visible) { // facebookProfileId ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->facebookProfileId) == "") { ?>
		<th data-name="facebookProfileId" class="<?php echo $recruitment_candidates->facebookProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->facebookProfileId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="facebookProfileId" class="<?php echo $recruitment_candidates->facebookProfileId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->facebookProfileId) ?>',1);"><div id="elh_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->facebookProfileId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->facebookProfileId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->facebookProfileId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileLink->Visible) { // twitterProfileLink ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->twitterProfileLink) == "") { ?>
		<th data-name="twitterProfileLink" class="<?php echo $recruitment_candidates->twitterProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->twitterProfileLink->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="twitterProfileLink" class="<?php echo $recruitment_candidates->twitterProfileLink->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->twitterProfileLink) ?>',1);"><div id="elh_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->twitterProfileLink->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->twitterProfileLink->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->twitterProfileLink->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileId->Visible) { // twitterProfileId ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->twitterProfileId) == "") { ?>
		<th data-name="twitterProfileId" class="<?php echo $recruitment_candidates->twitterProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->twitterProfileId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="twitterProfileId" class="<?php echo $recruitment_candidates->twitterProfileId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->twitterProfileId) ?>',1);"><div id="elh_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->twitterProfileId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->twitterProfileId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->twitterProfileId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileLink->Visible) { // googleProfileLink ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->googleProfileLink) == "") { ?>
		<th data-name="googleProfileLink" class="<?php echo $recruitment_candidates->googleProfileLink->headerCellClass() ?>"><div id="elh_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->googleProfileLink->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="googleProfileLink" class="<?php echo $recruitment_candidates->googleProfileLink->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->googleProfileLink) ?>',1);"><div id="elh_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->googleProfileLink->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->googleProfileLink->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->googleProfileLink->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileId->Visible) { // googleProfileId ?>
	<?php if ($recruitment_candidates->sortUrl($recruitment_candidates->googleProfileId) == "") { ?>
		<th data-name="googleProfileId" class="<?php echo $recruitment_candidates->googleProfileId->headerCellClass() ?>"><div id="elh_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId"><div class="ew-table-header-caption"><?php echo $recruitment_candidates->googleProfileId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="googleProfileId" class="<?php echo $recruitment_candidates->googleProfileId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $recruitment_candidates->SortUrl($recruitment_candidates->googleProfileId) ?>',1);"><div id="elh_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $recruitment_candidates->googleProfileId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($recruitment_candidates->googleProfileId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($recruitment_candidates->googleProfileId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$recruitment_candidates_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($recruitment_candidates->ExportAll && $recruitment_candidates->isExport()) {
	$recruitment_candidates_list->StopRec = $recruitment_candidates_list->TotalRecs;
} else {

	// Set the last record to display
	if ($recruitment_candidates_list->TotalRecs > $recruitment_candidates_list->StartRec + $recruitment_candidates_list->DisplayRecs - 1)
		$recruitment_candidates_list->StopRec = $recruitment_candidates_list->StartRec + $recruitment_candidates_list->DisplayRecs - 1;
	else
		$recruitment_candidates_list->StopRec = $recruitment_candidates_list->TotalRecs;
}
$recruitment_candidates_list->RecCnt = $recruitment_candidates_list->StartRec - 1;
if ($recruitment_candidates_list->Recordset && !$recruitment_candidates_list->Recordset->EOF) {
	$recruitment_candidates_list->Recordset->moveFirst();
	$selectLimit = $recruitment_candidates_list->UseSelectLimit;
	if (!$selectLimit && $recruitment_candidates_list->StartRec > 1)
		$recruitment_candidates_list->Recordset->move($recruitment_candidates_list->StartRec - 1);
} elseif (!$recruitment_candidates->AllowAddDeleteRow && $recruitment_candidates_list->StopRec == 0) {
	$recruitment_candidates_list->StopRec = $recruitment_candidates->GridAddRowCount;
}

// Initialize aggregate
$recruitment_candidates->RowType = ROWTYPE_AGGREGATEINIT;
$recruitment_candidates->resetAttributes();
$recruitment_candidates_list->renderRow();
while ($recruitment_candidates_list->RecCnt < $recruitment_candidates_list->StopRec) {
	$recruitment_candidates_list->RecCnt++;
	if ($recruitment_candidates_list->RecCnt >= $recruitment_candidates_list->StartRec) {
		$recruitment_candidates_list->RowCnt++;

		// Set up key count
		$recruitment_candidates_list->KeyCount = $recruitment_candidates_list->RowIndex;

		// Init row class and style
		$recruitment_candidates->resetAttributes();
		$recruitment_candidates->CssClass = "";
		if ($recruitment_candidates->isGridAdd()) {
		} else {
			$recruitment_candidates_list->loadRowValues($recruitment_candidates_list->Recordset); // Load row values
		}
		$recruitment_candidates->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$recruitment_candidates->RowAttrs = array_merge($recruitment_candidates->RowAttrs, array('data-rowindex'=>$recruitment_candidates_list->RowCnt, 'id'=>'r' . $recruitment_candidates_list->RowCnt . '_recruitment_candidates', 'data-rowtype'=>$recruitment_candidates->RowType));

		// Render row
		$recruitment_candidates_list->renderRow();

		// Render list options
		$recruitment_candidates_list->renderListOptions();
?>
	<tr<?php echo $recruitment_candidates->rowAttributes() ?>>
<?php

// Render list options (body, left)
$recruitment_candidates_list->ListOptions->render("body", "left", $recruitment_candidates_list->RowCnt);
?>
	<?php if ($recruitment_candidates->id->Visible) { // id ?>
		<td data-name="id"<?php echo $recruitment_candidates->id->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_id" class="recruitment_candidates_id">
<span<?php echo $recruitment_candidates->id->viewAttributes() ?>>
<?php echo $recruitment_candidates->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $recruitment_candidates->first_name->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_first_name" class="recruitment_candidates_first_name">
<span<?php echo $recruitment_candidates->first_name->viewAttributes() ?>>
<?php echo $recruitment_candidates->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->last_name->Visible) { // last_name ?>
		<td data-name="last_name"<?php echo $recruitment_candidates->last_name->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_last_name" class="recruitment_candidates_last_name">
<span<?php echo $recruitment_candidates->last_name->viewAttributes() ?>>
<?php echo $recruitment_candidates->last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->nationality->Visible) { // nationality ?>
		<td data-name="nationality"<?php echo $recruitment_candidates->nationality->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_nationality" class="recruitment_candidates_nationality">
<span<?php echo $recruitment_candidates->nationality->viewAttributes() ?>>
<?php echo $recruitment_candidates->nationality->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->birthday->Visible) { // birthday ?>
		<td data-name="birthday"<?php echo $recruitment_candidates->birthday->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_birthday" class="recruitment_candidates_birthday">
<span<?php echo $recruitment_candidates->birthday->viewAttributes() ?>>
<?php echo $recruitment_candidates->birthday->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $recruitment_candidates->gender->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_gender" class="recruitment_candidates_gender">
<span<?php echo $recruitment_candidates->gender->viewAttributes() ?>>
<?php echo $recruitment_candidates->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->marital_status->Visible) { // marital_status ?>
		<td data-name="marital_status"<?php echo $recruitment_candidates->marital_status->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_marital_status" class="recruitment_candidates_marital_status">
<span<?php echo $recruitment_candidates->marital_status->viewAttributes() ?>>
<?php echo $recruitment_candidates->marital_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->address1->Visible) { // address1 ?>
		<td data-name="address1"<?php echo $recruitment_candidates->address1->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_address1" class="recruitment_candidates_address1">
<span<?php echo $recruitment_candidates->address1->viewAttributes() ?>>
<?php echo $recruitment_candidates->address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->address2->Visible) { // address2 ?>
		<td data-name="address2"<?php echo $recruitment_candidates->address2->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_address2" class="recruitment_candidates_address2">
<span<?php echo $recruitment_candidates->address2->viewAttributes() ?>>
<?php echo $recruitment_candidates->address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->city->Visible) { // city ?>
		<td data-name="city"<?php echo $recruitment_candidates->city->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_city" class="recruitment_candidates_city">
<span<?php echo $recruitment_candidates->city->viewAttributes() ?>>
<?php echo $recruitment_candidates->city->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->country->Visible) { // country ?>
		<td data-name="country"<?php echo $recruitment_candidates->country->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_country" class="recruitment_candidates_country">
<span<?php echo $recruitment_candidates->country->viewAttributes() ?>>
<?php echo $recruitment_candidates->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->province->Visible) { // province ?>
		<td data-name="province"<?php echo $recruitment_candidates->province->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_province" class="recruitment_candidates_province">
<span<?php echo $recruitment_candidates->province->viewAttributes() ?>>
<?php echo $recruitment_candidates->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $recruitment_candidates->postal_code->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_postal_code" class="recruitment_candidates_postal_code">
<span<?php echo $recruitment_candidates->postal_code->viewAttributes() ?>>
<?php echo $recruitment_candidates->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $recruitment_candidates->_email->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates__email" class="recruitment_candidates__email">
<span<?php echo $recruitment_candidates->_email->viewAttributes() ?>>
<?php echo $recruitment_candidates->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->home_phone->Visible) { // home_phone ?>
		<td data-name="home_phone"<?php echo $recruitment_candidates->home_phone->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_home_phone" class="recruitment_candidates_home_phone">
<span<?php echo $recruitment_candidates->home_phone->viewAttributes() ?>>
<?php echo $recruitment_candidates->home_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->mobile_phone->Visible) { // mobile_phone ?>
		<td data-name="mobile_phone"<?php echo $recruitment_candidates->mobile_phone->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_mobile_phone" class="recruitment_candidates_mobile_phone">
<span<?php echo $recruitment_candidates->mobile_phone->viewAttributes() ?>>
<?php echo $recruitment_candidates->mobile_phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->cv_title->Visible) { // cv_title ?>
		<td data-name="cv_title"<?php echo $recruitment_candidates->cv_title->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_cv_title" class="recruitment_candidates_cv_title">
<span<?php echo $recruitment_candidates->cv_title->viewAttributes() ?>>
<?php echo $recruitment_candidates->cv_title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->cv->Visible) { // cv ?>
		<td data-name="cv"<?php echo $recruitment_candidates->cv->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_cv" class="recruitment_candidates_cv">
<span<?php echo $recruitment_candidates->cv->viewAttributes() ?>>
<?php echo $recruitment_candidates->cv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->profileImage->Visible) { // profileImage ?>
		<td data-name="profileImage"<?php echo $recruitment_candidates->profileImage->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_profileImage" class="recruitment_candidates_profileImage">
<span<?php echo $recruitment_candidates->profileImage->viewAttributes() ?>>
<?php echo $recruitment_candidates->profileImage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
		<td data-name="totalYearsOfExperience"<?php echo $recruitment_candidates->totalYearsOfExperience->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_totalYearsOfExperience" class="recruitment_candidates_totalYearsOfExperience">
<span<?php echo $recruitment_candidates->totalYearsOfExperience->viewAttributes() ?>>
<?php echo $recruitment_candidates->totalYearsOfExperience->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
		<td data-name="totalMonthsOfExperience"<?php echo $recruitment_candidates->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_totalMonthsOfExperience" class="recruitment_candidates_totalMonthsOfExperience">
<span<?php echo $recruitment_candidates->totalMonthsOfExperience->viewAttributes() ?>>
<?php echo $recruitment_candidates->totalMonthsOfExperience->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->generatedCVFile->Visible) { // generatedCVFile ?>
		<td data-name="generatedCVFile"<?php echo $recruitment_candidates->generatedCVFile->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_generatedCVFile" class="recruitment_candidates_generatedCVFile">
<span<?php echo $recruitment_candidates->generatedCVFile->viewAttributes() ?>>
<?php echo $recruitment_candidates->generatedCVFile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->created->Visible) { // created ?>
		<td data-name="created"<?php echo $recruitment_candidates->created->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_created" class="recruitment_candidates_created">
<span<?php echo $recruitment_candidates->created->viewAttributes() ?>>
<?php echo $recruitment_candidates->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $recruitment_candidates->updated->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_updated" class="recruitment_candidates_updated">
<span<?php echo $recruitment_candidates->updated->viewAttributes() ?>>
<?php echo $recruitment_candidates->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->expectedSalary->Visible) { // expectedSalary ?>
		<td data-name="expectedSalary"<?php echo $recruitment_candidates->expectedSalary->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_expectedSalary" class="recruitment_candidates_expectedSalary">
<span<?php echo $recruitment_candidates->expectedSalary->viewAttributes() ?>>
<?php echo $recruitment_candidates->expectedSalary->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->preferedJobtype->Visible) { // preferedJobtype ?>
		<td data-name="preferedJobtype"<?php echo $recruitment_candidates->preferedJobtype->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_preferedJobtype" class="recruitment_candidates_preferedJobtype">
<span<?php echo $recruitment_candidates->preferedJobtype->viewAttributes() ?>>
<?php echo $recruitment_candidates->preferedJobtype->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->age->Visible) { // age ?>
		<td data-name="age"<?php echo $recruitment_candidates->age->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_age" class="recruitment_candidates_age">
<span<?php echo $recruitment_candidates->age->viewAttributes() ?>>
<?php echo $recruitment_candidates->age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->hash->Visible) { // hash ?>
		<td data-name="hash"<?php echo $recruitment_candidates->hash->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_hash" class="recruitment_candidates_hash">
<span<?php echo $recruitment_candidates->hash->viewAttributes() ?>>
<?php echo $recruitment_candidates->hash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
		<td data-name="linkedInProfileLink"<?php echo $recruitment_candidates->linkedInProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_linkedInProfileLink" class="recruitment_candidates_linkedInProfileLink">
<span<?php echo $recruitment_candidates->linkedInProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInProfileLink->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->linkedInProfileId->Visible) { // linkedInProfileId ?>
		<td data-name="linkedInProfileId"<?php echo $recruitment_candidates->linkedInProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_linkedInProfileId" class="recruitment_candidates_linkedInProfileId">
<span<?php echo $recruitment_candidates->linkedInProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->linkedInProfileId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->facebookProfileLink->Visible) { // facebookProfileLink ?>
		<td data-name="facebookProfileLink"<?php echo $recruitment_candidates->facebookProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_facebookProfileLink" class="recruitment_candidates_facebookProfileLink">
<span<?php echo $recruitment_candidates->facebookProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->facebookProfileLink->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->facebookProfileId->Visible) { // facebookProfileId ?>
		<td data-name="facebookProfileId"<?php echo $recruitment_candidates->facebookProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_facebookProfileId" class="recruitment_candidates_facebookProfileId">
<span<?php echo $recruitment_candidates->facebookProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->facebookProfileId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->twitterProfileLink->Visible) { // twitterProfileLink ?>
		<td data-name="twitterProfileLink"<?php echo $recruitment_candidates->twitterProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_twitterProfileLink" class="recruitment_candidates_twitterProfileLink">
<span<?php echo $recruitment_candidates->twitterProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->twitterProfileLink->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->twitterProfileId->Visible) { // twitterProfileId ?>
		<td data-name="twitterProfileId"<?php echo $recruitment_candidates->twitterProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_twitterProfileId" class="recruitment_candidates_twitterProfileId">
<span<?php echo $recruitment_candidates->twitterProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->twitterProfileId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->googleProfileLink->Visible) { // googleProfileLink ?>
		<td data-name="googleProfileLink"<?php echo $recruitment_candidates->googleProfileLink->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_googleProfileLink" class="recruitment_candidates_googleProfileLink">
<span<?php echo $recruitment_candidates->googleProfileLink->viewAttributes() ?>>
<?php echo $recruitment_candidates->googleProfileLink->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($recruitment_candidates->googleProfileId->Visible) { // googleProfileId ?>
		<td data-name="googleProfileId"<?php echo $recruitment_candidates->googleProfileId->cellAttributes() ?>>
<span id="el<?php echo $recruitment_candidates_list->RowCnt ?>_recruitment_candidates_googleProfileId" class="recruitment_candidates_googleProfileId">
<span<?php echo $recruitment_candidates->googleProfileId->viewAttributes() ?>>
<?php echo $recruitment_candidates->googleProfileId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$recruitment_candidates_list->ListOptions->render("body", "right", $recruitment_candidates_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$recruitment_candidates->isGridAdd())
		$recruitment_candidates_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$recruitment_candidates->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($recruitment_candidates_list->Recordset)
	$recruitment_candidates_list->Recordset->Close();
?>
<?php if (!$recruitment_candidates->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$recruitment_candidates->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($recruitment_candidates_list->Pager)) $recruitment_candidates_list->Pager = new NumericPager($recruitment_candidates_list->StartRec, $recruitment_candidates_list->DisplayRecs, $recruitment_candidates_list->TotalRecs, $recruitment_candidates_list->RecRange, $recruitment_candidates_list->AutoHidePager) ?>
<?php if ($recruitment_candidates_list->Pager->RecordCount > 0 && $recruitment_candidates_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($recruitment_candidates_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_candidates_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($recruitment_candidates_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $recruitment_candidates_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($recruitment_candidates_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($recruitment_candidates_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $recruitment_candidates_list->pageUrl() ?>start=<?php echo $recruitment_candidates_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($recruitment_candidates_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $recruitment_candidates_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $recruitment_candidates_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $recruitment_candidates_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($recruitment_candidates_list->TotalRecs > 0 && (!$recruitment_candidates_list->AutoHidePageSizeSelector || $recruitment_candidates_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="recruitment_candidates">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($recruitment_candidates_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($recruitment_candidates_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($recruitment_candidates_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($recruitment_candidates_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($recruitment_candidates_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($recruitment_candidates_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($recruitment_candidates->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $recruitment_candidates_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($recruitment_candidates_list->TotalRecs == 0 && !$recruitment_candidates->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $recruitment_candidates_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$recruitment_candidates_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$recruitment_candidates->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$recruitment_candidates->isExport()) { ?>
<script>
ew.scrollableTable("gmp_recruitment_candidates", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$recruitment_candidates_list->terminate();
?>