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
$view_dashboard_summary_details_list = new view_dashboard_summary_details_list();

// Run the page
$view_dashboard_summary_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_summary_details_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dashboard_summary_details->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dashboard_summary_detailslist = currentForm = new ew.Form("fview_dashboard_summary_detailslist", "list");
fview_dashboard_summary_detailslist.formKeyCountName = '<?php echo $view_dashboard_summary_details_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dashboard_summary_detailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_summary_detailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_summary_detailslist.lists["x_HospID"] = <?php echo $view_dashboard_summary_details_list->HospID->Lookup->toClientList() ?>;
fview_dashboard_summary_detailslist.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_summary_details_list->HospID->lookupOptions()) ?>;
fview_dashboard_summary_detailslist.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_dashboard_summary_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_summary_detailslistsrch");

// Validate function for search
fview_dashboard_summary_detailslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_summary_details->createddate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_summary_detailslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_summary_detailslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_dashboard_summary_detailslistsrch.filterList = <?php echo $view_dashboard_summary_details_list->getFilterList() ?>;
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
<?php if (!$view_dashboard_summary_details->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_summary_details_list->TotalRecs > 0 && $view_dashboard_summary_details_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_summary_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_details_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_summary_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_details_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_summary_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_details_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_summary_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_dashboard_summary_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_summary_details->isExport() && !$view_dashboard_summary_details->CurrentAction) { ?>
<form name="fview_dashboard_summary_detailslistsrch" id="fview_dashboard_summary_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dashboard_summary_details_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_summary_detailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_summary_details">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dashboard_summary_details_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dashboard_summary_details->RowType = ROWTYPE_SEARCH;

// Render row
$view_dashboard_summary_details->resetAttributes();
$view_dashboard_summary_details_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dashboard_summary_details->createddate->Visible) { // createddate ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_dashboard_summary_details->createddate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddate" id="z_createddate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_summary_details->createddate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_summary_details" data-field="x_createddate" data-format="7" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_details->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_details->createddate->EditValue ?>"<?php echo $view_dashboard_summary_details->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_details->createddate->ReadOnly && !$view_dashboard_summary_details->createddate->Disabled && !isset($view_dashboard_summary_details->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_details->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_summary_detailslistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddate style="d-none"">
<input type="text" data-table="view_dashboard_summary_details" data-field="x_createddate" data-format="7" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_details->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_details->createddate->EditValue2 ?>"<?php echo $view_dashboard_summary_details->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_details->createddate->ReadOnly && !$view_dashboard_summary_details->createddate->Disabled && !isset($view_dashboard_summary_details->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_details->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_summary_detailslistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_summary_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dashboard_summary_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_summary_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_summary_details_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_details_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_details_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_details_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_summary_details_list->showPageHeader(); ?>
<?php
$view_dashboard_summary_details_list->showMessage();
?>
<?php if ($view_dashboard_summary_details_list->TotalRecs > 0 || $view_dashboard_summary_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_summary_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_summary_details">
<?php if (!$view_dashboard_summary_details->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_summary_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_summary_details_list->Pager)) $view_dashboard_summary_details_list->Pager = new NumericPager($view_dashboard_summary_details_list->StartRec, $view_dashboard_summary_details_list->DisplayRecs, $view_dashboard_summary_details_list->TotalRecs, $view_dashboard_summary_details_list->RecRange, $view_dashboard_summary_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_summary_details_list->Pager->RecordCount > 0 && $view_dashboard_summary_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_summary_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_summary_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_summary_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_summary_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_summary_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_summary_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_details_list->TotalRecs > 0 && (!$view_dashboard_summary_details_list->AutoHidePageSizeSelector || $view_dashboard_summary_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_summary_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_summary_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_summary_detailslist" id="fview_dashboard_summary_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_summary_details_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_summary_details_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_summary_details">
<div id="gmp_view_dashboard_summary_details" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_summary_details_list->TotalRecs > 0 || $view_dashboard_summary_details->isGridEdit()) { ?>
<table id="tbl_view_dashboard_summary_detailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_summary_details_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_summary_details_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_summary_details_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_summary_details->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_summary_details->sortUrl($view_dashboard_summary_details->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_details->UserName->headerCellClass() ?>"><div id="elh_view_dashboard_summary_details_UserName" class="view_dashboard_summary_details_UserName"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_details->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_details->SortUrl($view_dashboard_summary_details->UserName) ?>',1);"><div id="elh_view_dashboard_summary_details_UserName" class="view_dashboard_summary_details_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_details->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_details->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_details->sum28Amount29->Visible) { // sum(Amount) ?>
	<?php if ($view_dashboard_summary_details->sortUrl($view_dashboard_summary_details->sum28Amount29) == "") { ?>
		<th data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_details->sum28Amount29->headerCellClass() ?>"><div id="elh_view_dashboard_summary_details_sum28Amount29" class="view_dashboard_summary_details_sum28Amount29"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->sum28Amount29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_details->sum28Amount29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_details->SortUrl($view_dashboard_summary_details->sum28Amount29) ?>',1);"><div id="elh_view_dashboard_summary_details_sum28Amount29" class="view_dashboard_summary_details_sum28Amount29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->sum28Amount29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_details->sum28Amount29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_details->sum28Amount29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_details->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_summary_details->sortUrl($view_dashboard_summary_details->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_details->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_summary_details_createddate" class="view_dashboard_summary_details_createddate"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_details->createddate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_details->SortUrl($view_dashboard_summary_details->createddate) ?>',1);"><div id="elh_view_dashboard_summary_details_createddate" class="view_dashboard_summary_details_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_details->createddate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_details->createddate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_summary_details->sortUrl($view_dashboard_summary_details->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_details->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_summary_details_HospID" class="view_dashboard_summary_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_details->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_details->SortUrl($view_dashboard_summary_details->HospID) ?>',1);"><div id="elh_view_dashboard_summary_details_HospID" class="view_dashboard_summary_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_details->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_details->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_details->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_summary_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_summary_details->ExportAll && $view_dashboard_summary_details->isExport()) {
	$view_dashboard_summary_details_list->StopRec = $view_dashboard_summary_details_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dashboard_summary_details_list->TotalRecs > $view_dashboard_summary_details_list->StartRec + $view_dashboard_summary_details_list->DisplayRecs - 1)
		$view_dashboard_summary_details_list->StopRec = $view_dashboard_summary_details_list->StartRec + $view_dashboard_summary_details_list->DisplayRecs - 1;
	else
		$view_dashboard_summary_details_list->StopRec = $view_dashboard_summary_details_list->TotalRecs;
}
$view_dashboard_summary_details_list->RecCnt = $view_dashboard_summary_details_list->StartRec - 1;
if ($view_dashboard_summary_details_list->Recordset && !$view_dashboard_summary_details_list->Recordset->EOF) {
	$view_dashboard_summary_details_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_summary_details_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_summary_details_list->StartRec > 1)
		$view_dashboard_summary_details_list->Recordset->move($view_dashboard_summary_details_list->StartRec - 1);
} elseif (!$view_dashboard_summary_details->AllowAddDeleteRow && $view_dashboard_summary_details_list->StopRec == 0) {
	$view_dashboard_summary_details_list->StopRec = $view_dashboard_summary_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_summary_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_summary_details->resetAttributes();
$view_dashboard_summary_details_list->renderRow();
while ($view_dashboard_summary_details_list->RecCnt < $view_dashboard_summary_details_list->StopRec) {
	$view_dashboard_summary_details_list->RecCnt++;
	if ($view_dashboard_summary_details_list->RecCnt >= $view_dashboard_summary_details_list->StartRec) {
		$view_dashboard_summary_details_list->RowCnt++;

		// Set up key count
		$view_dashboard_summary_details_list->KeyCount = $view_dashboard_summary_details_list->RowIndex;

		// Init row class and style
		$view_dashboard_summary_details->resetAttributes();
		$view_dashboard_summary_details->CssClass = "";
		if ($view_dashboard_summary_details->isGridAdd()) {
		} else {
			$view_dashboard_summary_details_list->loadRowValues($view_dashboard_summary_details_list->Recordset); // Load row values
		}
		$view_dashboard_summary_details->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_summary_details->RowAttrs = array_merge($view_dashboard_summary_details->RowAttrs, array('data-rowindex'=>$view_dashboard_summary_details_list->RowCnt, 'id'=>'r' . $view_dashboard_summary_details_list->RowCnt . '_view_dashboard_summary_details', 'data-rowtype'=>$view_dashboard_summary_details->RowType));

		// Render row
		$view_dashboard_summary_details_list->renderRow();

		// Render list options
		$view_dashboard_summary_details_list->renderListOptions();
?>
	<tr<?php echo $view_dashboard_summary_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_summary_details_list->ListOptions->render("body", "left", $view_dashboard_summary_details_list->RowCnt);
?>
	<?php if ($view_dashboard_summary_details->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_dashboard_summary_details->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_details_list->RowCnt ?>_view_dashboard_summary_details_UserName" class="view_dashboard_summary_details_UserName">
<span<?php echo $view_dashboard_summary_details->UserName->viewAttributes() ?>>
<?php echo $view_dashboard_summary_details->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_details->sum28Amount29->Visible) { // sum(Amount) ?>
		<td data-name="sum28Amount29"<?php echo $view_dashboard_summary_details->sum28Amount29->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_details_list->RowCnt ?>_view_dashboard_summary_details_sum28Amount29" class="view_dashboard_summary_details_sum28Amount29">
<span<?php echo $view_dashboard_summary_details->sum28Amount29->viewAttributes() ?>>
<?php echo $view_dashboard_summary_details->sum28Amount29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_details->createddate->Visible) { // createddate ?>
		<td data-name="createddate"<?php echo $view_dashboard_summary_details->createddate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_details_list->RowCnt ?>_view_dashboard_summary_details_createddate" class="view_dashboard_summary_details_createddate">
<span<?php echo $view_dashboard_summary_details->createddate->viewAttributes() ?>>
<?php echo $view_dashboard_summary_details->createddate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_summary_details->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_details_list->RowCnt ?>_view_dashboard_summary_details_HospID" class="view_dashboard_summary_details_HospID">
<span<?php echo $view_dashboard_summary_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_summary_details->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_summary_details_list->ListOptions->render("body", "right", $view_dashboard_summary_details_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_summary_details->isGridAdd())
		$view_dashboard_summary_details_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_summary_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_summary_details->resetAttributes();
$view_dashboard_summary_details_list->renderRow();
?>
<?php if ($view_dashboard_summary_details_list->TotalRecs > 0 && !$view_dashboard_summary_details->isGridAdd() && !$view_dashboard_summary_details->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_summary_details_list->renderListOptions();

// Render list options (footer, left)
$view_dashboard_summary_details_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_summary_details->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_dashboard_summary_details->UserName->footerCellClass() ?>"><span id="elf_view_dashboard_summary_details_UserName" class="view_dashboard_summary_details_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_details->sum28Amount29->Visible) { // sum(Amount) ?>
		<td data-name="sum28Amount29" class="<?php echo $view_dashboard_summary_details->sum28Amount29->footerCellClass() ?>"><span id="elf_view_dashboard_summary_details_sum28Amount29" class="view_dashboard_summary_details_sum28Amount29">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_summary_details->sum28Amount29->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_details->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_dashboard_summary_details->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_summary_details_createddate" class="view_dashboard_summary_details_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_summary_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_summary_details->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_summary_details_HospID" class="view_dashboard_summary_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_summary_details_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dashboard_summary_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_summary_details_list->Recordset)
	$view_dashboard_summary_details_list->Recordset->Close();
?>
<?php if (!$view_dashboard_summary_details->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_summary_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_summary_details_list->Pager)) $view_dashboard_summary_details_list->Pager = new NumericPager($view_dashboard_summary_details_list->StartRec, $view_dashboard_summary_details_list->DisplayRecs, $view_dashboard_summary_details_list->TotalRecs, $view_dashboard_summary_details_list->RecRange, $view_dashboard_summary_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_summary_details_list->Pager->RecordCount > 0 && $view_dashboard_summary_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_summary_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_summary_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_summary_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_details_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_summary_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_summary_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_summary_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_details_list->TotalRecs > 0 && (!$view_dashboard_summary_details_list->AutoHidePageSizeSelector || $view_dashboard_summary_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_summary_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_summary_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_summary_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_summary_details_list->TotalRecs == 0 && !$view_dashboard_summary_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_summary_details_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_summary_details->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dashboard_summary_details->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_summary_details", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_summary_details_list->terminate();
?>