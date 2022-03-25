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
$view_next_review_date_list = new view_next_review_date_list();

// Run the page
$view_next_review_date_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_next_review_date_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_next_review_date->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_next_review_datelist = currentForm = new ew.Form("fview_next_review_datelist", "list");
fview_next_review_datelist.formKeyCountName = '<?php echo $view_next_review_date_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_next_review_datelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_next_review_datelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_next_review_datelist.lists["x_HospID"] = <?php echo $view_next_review_date_list->HospID->Lookup->toClientList() ?>;
fview_next_review_datelist.lists["x_HospID"].options = <?php echo JsonEncode($view_next_review_date_list->HospID->lookupOptions()) ?>;

// Form object for search
var fview_next_review_datelistsrch = currentSearchForm = new ew.Form("fview_next_review_datelistsrch");

// Validate function for search
fview_next_review_datelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_NextReviewDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_next_review_date->NextReviewDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_next_review_datelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_next_review_datelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_next_review_datelistsrch.filterList = <?php echo $view_next_review_date_list->getFilterList() ?>;
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
<?php if (!$view_next_review_date->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_next_review_date_list->TotalRecs > 0 && $view_next_review_date_list->ExportOptions->visible()) { ?>
<?php $view_next_review_date_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_next_review_date_list->ImportOptions->visible()) { ?>
<?php $view_next_review_date_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_next_review_date_list->SearchOptions->visible()) { ?>
<?php $view_next_review_date_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_next_review_date_list->FilterOptions->visible()) { ?>
<?php $view_next_review_date_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_next_review_date_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_next_review_date->isExport() && !$view_next_review_date->CurrentAction) { ?>
<form name="fview_next_review_datelistsrch" id="fview_next_review_datelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_next_review_date_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_next_review_datelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_next_review_date">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_next_review_date_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_next_review_date->RowType = ROWTYPE_SEARCH;

// Render row
$view_next_review_date->resetAttributes();
$view_next_review_date_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_next_review_date->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="xsc_NextReviewDate" class="ew-cell form-group">
		<label for="x_NextReviewDate" class="ew-search-caption ew-label"><?php echo $view_next_review_date->NextReviewDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_NextReviewDate" id="z_NextReviewDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_next_review_date->NextReviewDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_next_review_date" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?php echo HtmlEncode($view_next_review_date->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $view_next_review_date->NextReviewDate->EditValue ?>"<?php echo $view_next_review_date->NextReviewDate->editAttributes() ?>>
<?php if (!$view_next_review_date->NextReviewDate->ReadOnly && !$view_next_review_date->NextReviewDate->Disabled && !isset($view_next_review_date->NextReviewDate->EditAttrs["readonly"]) && !isset($view_next_review_date->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_next_review_datelistsrch", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_NextReviewDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_NextReviewDate style="d-none"">
<input type="text" data-table="view_next_review_date" data-field="x_NextReviewDate" name="y_NextReviewDate" id="y_NextReviewDate" placeholder="<?php echo HtmlEncode($view_next_review_date->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $view_next_review_date->NextReviewDate->EditValue2 ?>"<?php echo $view_next_review_date->NextReviewDate->editAttributes() ?>>
<?php if (!$view_next_review_date->NextReviewDate->ReadOnly && !$view_next_review_date->NextReviewDate->Disabled && !isset($view_next_review_date->NextReviewDate->EditAttrs["readonly"]) && !isset($view_next_review_date->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_next_review_datelistsrch", "y_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_next_review_date_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_next_review_date_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_next_review_date_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_next_review_date_list->showPageHeader(); ?>
<?php
$view_next_review_date_list->showMessage();
?>
<?php if ($view_next_review_date_list->TotalRecs > 0 || $view_next_review_date->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_next_review_date_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_next_review_date">
<?php if (!$view_next_review_date->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_next_review_date->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_next_review_date_list->Pager)) $view_next_review_date_list->Pager = new NumericPager($view_next_review_date_list->StartRec, $view_next_review_date_list->DisplayRecs, $view_next_review_date_list->TotalRecs, $view_next_review_date_list->RecRange, $view_next_review_date_list->AutoHidePager) ?>
<?php if ($view_next_review_date_list->Pager->RecordCount > 0 && $view_next_review_date_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_next_review_date_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_next_review_date_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_next_review_date_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_next_review_date_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_next_review_date_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_next_review_date_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_next_review_date_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_next_review_date_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_next_review_date_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_next_review_date_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_next_review_date_list->TotalRecs > 0 && (!$view_next_review_date_list->AutoHidePageSizeSelector || $view_next_review_date_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_next_review_date">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_next_review_date_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_next_review_date_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_next_review_date_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_next_review_date_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_next_review_date_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_next_review_date_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_next_review_date->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_next_review_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_next_review_datelist" id="fview_next_review_datelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_next_review_date_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_next_review_date_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_next_review_date">
<div id="gmp_view_next_review_date" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_next_review_date_list->TotalRecs > 0 || $view_next_review_date->isGridEdit()) { ?>
<table id="tbl_view_next_review_datelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_next_review_date_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_next_review_date_list->renderListOptions();

// Render list options (header, left)
$view_next_review_date_list->ListOptions->render("header", "left");
?>
<?php if ($view_next_review_date->first_name->Visible) { // first_name ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_next_review_date->first_name->headerCellClass() ?>"><div id="elh_view_next_review_date_first_name" class="view_next_review_date_first_name"><div class="ew-table-header-caption"><?php echo $view_next_review_date->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_next_review_date->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->first_name) ?>',1);"><div id="elh_view_next_review_date_first_name" class="view_next_review_date_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->PatientID->Visible) { // PatientID ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_next_review_date->PatientID->headerCellClass() ?>"><div id="elh_view_next_review_date_PatientID" class="view_next_review_date_PatientID"><div class="ew-table-header-caption"><?php echo $view_next_review_date->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_next_review_date->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->PatientID) ?>',1);"><div id="elh_view_next_review_date_PatientID" class="view_next_review_date_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_next_review_date->mobile_no->headerCellClass() ?>"><div id="elh_view_next_review_date_mobile_no" class="view_next_review_date_mobile_no"><div class="ew-table-header-caption"><?php echo $view_next_review_date->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_next_review_date->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->mobile_no) ?>',1);"><div id="elh_view_next_review_date_mobile_no" class="view_next_review_date_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->street->Visible) { // street ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_next_review_date->street->headerCellClass() ?>"><div id="elh_view_next_review_date_street" class="view_next_review_date_street"><div class="ew-table-header-caption"><?php echo $view_next_review_date->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_next_review_date->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->street) ?>',1);"><div id="elh_view_next_review_date_street" class="view_next_review_date_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->town->Visible) { // town ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_next_review_date->town->headerCellClass() ?>"><div id="elh_view_next_review_date_town" class="view_next_review_date_town"><div class="ew-table-header-caption"><?php echo $view_next_review_date->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_next_review_date->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->town) ?>',1);"><div id="elh_view_next_review_date_town" class="view_next_review_date_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_next_review_date->NextReviewDate->headerCellClass() ?>"><div id="elh_view_next_review_date_NextReviewDate" class="view_next_review_date_NextReviewDate"><div class="ew-table-header-caption"><?php echo $view_next_review_date->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_next_review_date->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->NextReviewDate) ?>',1);"><div id="elh_view_next_review_date_NextReviewDate" class="view_next_review_date_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_next_review_date->createdUserName->headerCellClass() ?>"><div id="elh_view_next_review_date_createdUserName" class="view_next_review_date_createdUserName"><div class="ew-table-header-caption"><?php echo $view_next_review_date->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_next_review_date->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->createdUserName) ?>',1);"><div id="elh_view_next_review_date_createdUserName" class="view_next_review_date_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->createdUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->createdUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->HospID->Visible) { // HospID ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_next_review_date->HospID->headerCellClass() ?>"><div id="elh_view_next_review_date_HospID" class="view_next_review_date_HospID"><div class="ew-table-header-caption"><?php echo $view_next_review_date->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_next_review_date->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->HospID) ?>',1);"><div id="elh_view_next_review_date_HospID" class="view_next_review_date_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date->DrName->Visible) { // DrName ?>
	<?php if ($view_next_review_date->sortUrl($view_next_review_date->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_next_review_date->DrName->headerCellClass() ?>"><div id="elh_view_next_review_date_DrName" class="view_next_review_date_DrName"><div class="ew-table-header-caption"><?php echo $view_next_review_date->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_next_review_date->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_next_review_date->SortUrl($view_next_review_date->DrName) ?>',1);"><div id="elh_view_next_review_date_DrName" class="view_next_review_date_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_next_review_date->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_next_review_date_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_next_review_date->ExportAll && $view_next_review_date->isExport()) {
	$view_next_review_date_list->StopRec = $view_next_review_date_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_next_review_date_list->TotalRecs > $view_next_review_date_list->StartRec + $view_next_review_date_list->DisplayRecs - 1)
		$view_next_review_date_list->StopRec = $view_next_review_date_list->StartRec + $view_next_review_date_list->DisplayRecs - 1;
	else
		$view_next_review_date_list->StopRec = $view_next_review_date_list->TotalRecs;
}
$view_next_review_date_list->RecCnt = $view_next_review_date_list->StartRec - 1;
if ($view_next_review_date_list->Recordset && !$view_next_review_date_list->Recordset->EOF) {
	$view_next_review_date_list->Recordset->moveFirst();
	$selectLimit = $view_next_review_date_list->UseSelectLimit;
	if (!$selectLimit && $view_next_review_date_list->StartRec > 1)
		$view_next_review_date_list->Recordset->move($view_next_review_date_list->StartRec - 1);
} elseif (!$view_next_review_date->AllowAddDeleteRow && $view_next_review_date_list->StopRec == 0) {
	$view_next_review_date_list->StopRec = $view_next_review_date->GridAddRowCount;
}

// Initialize aggregate
$view_next_review_date->RowType = ROWTYPE_AGGREGATEINIT;
$view_next_review_date->resetAttributes();
$view_next_review_date_list->renderRow();
while ($view_next_review_date_list->RecCnt < $view_next_review_date_list->StopRec) {
	$view_next_review_date_list->RecCnt++;
	if ($view_next_review_date_list->RecCnt >= $view_next_review_date_list->StartRec) {
		$view_next_review_date_list->RowCnt++;

		// Set up key count
		$view_next_review_date_list->KeyCount = $view_next_review_date_list->RowIndex;

		// Init row class and style
		$view_next_review_date->resetAttributes();
		$view_next_review_date->CssClass = "";
		if ($view_next_review_date->isGridAdd()) {
		} else {
			$view_next_review_date_list->loadRowValues($view_next_review_date_list->Recordset); // Load row values
		}
		$view_next_review_date->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_next_review_date->RowAttrs = array_merge($view_next_review_date->RowAttrs, array('data-rowindex'=>$view_next_review_date_list->RowCnt, 'id'=>'r' . $view_next_review_date_list->RowCnt . '_view_next_review_date', 'data-rowtype'=>$view_next_review_date->RowType));

		// Render row
		$view_next_review_date_list->renderRow();

		// Render list options
		$view_next_review_date_list->renderListOptions();
?>
	<tr<?php echo $view_next_review_date->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_next_review_date_list->ListOptions->render("body", "left", $view_next_review_date_list->RowCnt);
?>
	<?php if ($view_next_review_date->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_next_review_date->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_first_name" class="view_next_review_date_first_name">
<span<?php echo $view_next_review_date->first_name->viewAttributes() ?>>
<?php echo $view_next_review_date->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_next_review_date->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_PatientID" class="view_next_review_date_PatientID">
<span<?php echo $view_next_review_date->PatientID->viewAttributes() ?>>
<?php echo $view_next_review_date->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_next_review_date->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_mobile_no" class="view_next_review_date_mobile_no">
<span<?php echo $view_next_review_date->mobile_no->viewAttributes() ?>>
<?php echo $view_next_review_date->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->street->Visible) { // street ?>
		<td data-name="street"<?php echo $view_next_review_date->street->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_street" class="view_next_review_date_street">
<span<?php echo $view_next_review_date->street->viewAttributes() ?>>
<?php echo $view_next_review_date->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->town->Visible) { // town ?>
		<td data-name="town"<?php echo $view_next_review_date->town->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_town" class="view_next_review_date_town">
<span<?php echo $view_next_review_date->town->viewAttributes() ?>>
<?php echo $view_next_review_date->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate"<?php echo $view_next_review_date->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_NextReviewDate" class="view_next_review_date_NextReviewDate">
<span<?php echo $view_next_review_date->NextReviewDate->viewAttributes() ?>>
<?php echo $view_next_review_date->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName"<?php echo $view_next_review_date->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_createdUserName" class="view_next_review_date_createdUserName">
<span<?php echo $view_next_review_date->createdUserName->viewAttributes() ?>>
<?php echo $view_next_review_date->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_next_review_date->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_HospID" class="view_next_review_date_HospID">
<span<?php echo $view_next_review_date->HospID->viewAttributes() ?>>
<?php echo $view_next_review_date->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_next_review_date->DrName->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCnt ?>_view_next_review_date_DrName" class="view_next_review_date_DrName">
<span<?php echo $view_next_review_date->DrName->viewAttributes() ?>>
<?php echo $view_next_review_date->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_next_review_date_list->ListOptions->render("body", "right", $view_next_review_date_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_next_review_date->isGridAdd())
		$view_next_review_date_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_next_review_date->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_next_review_date_list->Recordset)
	$view_next_review_date_list->Recordset->Close();
?>
<?php if (!$view_next_review_date->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_next_review_date->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_next_review_date_list->Pager)) $view_next_review_date_list->Pager = new NumericPager($view_next_review_date_list->StartRec, $view_next_review_date_list->DisplayRecs, $view_next_review_date_list->TotalRecs, $view_next_review_date_list->RecRange, $view_next_review_date_list->AutoHidePager) ?>
<?php if ($view_next_review_date_list->Pager->RecordCount > 0 && $view_next_review_date_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_next_review_date_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_next_review_date_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_next_review_date_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_next_review_date_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_next_review_date_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_next_review_date_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_next_review_date_list->pageUrl() ?>start=<?php echo $view_next_review_date_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_next_review_date_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_next_review_date_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_next_review_date_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_next_review_date_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_next_review_date_list->TotalRecs > 0 && (!$view_next_review_date_list->AutoHidePageSizeSelector || $view_next_review_date_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_next_review_date">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_next_review_date_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_next_review_date_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_next_review_date_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_next_review_date_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_next_review_date_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_next_review_date_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_next_review_date->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_next_review_date_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_next_review_date_list->TotalRecs == 0 && !$view_next_review_date->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_next_review_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_next_review_date_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_next_review_date->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_next_review_date->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_next_review_date", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_next_review_date_list->terminate();
?>