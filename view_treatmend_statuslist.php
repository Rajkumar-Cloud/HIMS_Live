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
$view_treatmend_status_list = new view_treatmend_status_list();

// Run the page
$view_treatmend_status_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_treatmend_status_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_treatmend_status->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_treatmend_statuslist = currentForm = new ew.Form("fview_treatmend_statuslist", "list");
fview_treatmend_statuslist.formKeyCountName = '<?php echo $view_treatmend_status_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_treatmend_statuslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_treatmend_statuslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_treatmend_statuslist.lists["x_Treatment"] = <?php echo $view_treatmend_status_list->Treatment->Lookup->toClientList() ?>;
fview_treatmend_statuslist.lists["x_Treatment"].options = <?php echo JsonEncode($view_treatmend_status_list->Treatment->options(FALSE, TRUE)) ?>;
fview_treatmend_statuslist.lists["x_Treatment1[]"] = <?php echo $view_treatmend_status_list->Treatment1->Lookup->toClientList() ?>;
fview_treatmend_statuslist.lists["x_Treatment1[]"].options = <?php echo JsonEncode($view_treatmend_status_list->Treatment1->lookupOptions()) ?>;

// Form object for search
var fview_treatmend_statuslistsrch = currentSearchForm = new ew.Form("fview_treatmend_statuslistsrch");

// Validate function for search
fview_treatmend_statuslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_TreatmentStartDate");
	if (elm && !ew.checkShortEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_treatmend_status->TreatmentStartDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_treatmend_statuslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_treatmend_statuslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_treatmend_statuslistsrch.lists["x_Treatment"] = <?php echo $view_treatmend_status_list->Treatment->Lookup->toClientList() ?>;
fview_treatmend_statuslistsrch.lists["x_Treatment"].options = <?php echo JsonEncode($view_treatmend_status_list->Treatment->options(FALSE, TRUE)) ?>;
fview_treatmend_statuslistsrch.lists["x_Treatment1[]"] = <?php echo $view_treatmend_status_list->Treatment1->Lookup->toClientList() ?>;
fview_treatmend_statuslistsrch.lists["x_Treatment1[]"].options = <?php echo JsonEncode($view_treatmend_status_list->Treatment1->lookupOptions()) ?>;

// Filters
fview_treatmend_statuslistsrch.filterList = <?php echo $view_treatmend_status_list->getFilterList() ?>;
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
<?php if (!$view_treatmend_status->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_treatmend_status_list->TotalRecs > 0 && $view_treatmend_status_list->ExportOptions->visible()) { ?>
<?php $view_treatmend_status_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatmend_status_list->ImportOptions->visible()) { ?>
<?php $view_treatmend_status_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatmend_status_list->SearchOptions->visible()) { ?>
<?php $view_treatmend_status_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_treatmend_status_list->FilterOptions->visible()) { ?>
<?php $view_treatmend_status_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_treatmend_status_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_treatmend_status->isExport() && !$view_treatmend_status->CurrentAction) { ?>
<form name="fview_treatmend_statuslistsrch" id="fview_treatmend_statuslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_treatmend_status_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_treatmend_statuslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_treatmend_status">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_treatmend_status_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_treatmend_status->RowType = ROWTYPE_SEARCH;

// Render row
$view_treatmend_status->resetAttributes();
$view_treatmend_status_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_treatmend_status->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<div id="xsc_TreatmentStartDate" class="ew-cell form-group">
		<label for="x_TreatmentStartDate" class="ew-search-caption ew-label"><?php echo $view_treatmend_status->TreatmentStartDate->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("BETWEEN") ?><input type="hidden" name="z_TreatmentStartDate" id="z_TreatmentStartDate" value="BETWEEN"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_treatmend_status" data-field="x_TreatmentStartDate" data-format="14" name="x_TreatmentStartDate" id="x_TreatmentStartDate" placeholder="<?php echo HtmlEncode($view_treatmend_status->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $view_treatmend_status->TreatmentStartDate->EditValue ?>"<?php echo $view_treatmend_status->TreatmentStartDate->editAttributes() ?>>
<?php if (!$view_treatmend_status->TreatmentStartDate->ReadOnly && !$view_treatmend_status->TreatmentStartDate->Disabled && !isset($view_treatmend_status->TreatmentStartDate->EditAttrs["readonly"]) && !isset($view_treatmend_status->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_treatmend_statuslistsrch", "x_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":14});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_TreatmentStartDate"><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_TreatmentStartDate">
<input type="text" data-table="view_treatmend_status" data-field="x_TreatmentStartDate" data-format="14" name="y_TreatmentStartDate" id="y_TreatmentStartDate" placeholder="<?php echo HtmlEncode($view_treatmend_status->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $view_treatmend_status->TreatmentStartDate->EditValue2 ?>"<?php echo $view_treatmend_status->TreatmentStartDate->editAttributes() ?>>
<?php if (!$view_treatmend_status->TreatmentStartDate->ReadOnly && !$view_treatmend_status->TreatmentStartDate->Disabled && !isset($view_treatmend_status->TreatmentStartDate->EditAttrs["readonly"]) && !isset($view_treatmend_status->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_treatmend_statuslistsrch", "y_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":14});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_treatmend_status->Treatment->Visible) { // Treatment ?>
	<div id="xsc_Treatment" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $view_treatmend_status->Treatment->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Treatment" id="z_Treatment" value="LIKE"></span>
		<span class="ew-search-field">
<?php $view_treatmend_status->Treatment->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$view_treatmend_status->Treatment->EditAttrs["onclick"]; ?>
<div id="tp_x_Treatment" class="ew-template"><input type="radio" class="form-check-input" data-table="view_treatmend_status" data-field="x_Treatment" data-value-separator="<?php echo $view_treatmend_status->Treatment->displayValueSeparatorAttribute() ?>" name="x_Treatment" id="x_Treatment" value="{value}"<?php echo $view_treatmend_status->Treatment->editAttributes() ?>></div>
<div id="dsl_x_Treatment" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_treatmend_status->Treatment->radioButtonListHtml(FALSE, "x_Treatment") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_treatmend_status->Treatment1->Visible) { // Treatment1 ?>
	<div id="xsc_Treatment1" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $view_treatmend_status->Treatment1->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Treatment1" id="z_Treatment1" value="LIKE"></span>
		<span class="ew-search-field">
<div id="tp_x_Treatment1" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_treatmend_status" data-field="x_Treatment1" data-value-separator="<?php echo $view_treatmend_status->Treatment1->displayValueSeparatorAttribute() ?>" name="x_Treatment1[]" id="x_Treatment1[]" value="{value}"<?php echo $view_treatmend_status->Treatment1->editAttributes() ?>></div>
<div id="dsl_x_Treatment1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_treatmend_status->Treatment1->checkBoxListHtml(FALSE, "x_Treatment1[]") ?>
</div></div>
<?php echo $view_treatmend_status->Treatment1->Lookup->getParamTag("p_x_Treatment1") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_treatmend_status_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_treatmend_status_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_treatmend_status_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_treatmend_status_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_treatmend_status_list->showPageHeader(); ?>
<?php
$view_treatmend_status_list->showMessage();
?>
<?php if ($view_treatmend_status_list->TotalRecs > 0 || $view_treatmend_status->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_treatmend_status_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_treatmend_status">
<?php if (!$view_treatmend_status->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_treatmend_status->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_treatmend_status_list->Pager)) $view_treatmend_status_list->Pager = new NumericPager($view_treatmend_status_list->StartRec, $view_treatmend_status_list->DisplayRecs, $view_treatmend_status_list->TotalRecs, $view_treatmend_status_list->RecRange, $view_treatmend_status_list->AutoHidePager) ?>
<?php if ($view_treatmend_status_list->Pager->RecordCount > 0 && $view_treatmend_status_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_treatmend_status_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_treatmend_status_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_treatmend_status_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_treatmend_status_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_treatmend_status_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_treatmend_status_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_treatmend_status_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_treatmend_status_list->TotalRecs > 0 && (!$view_treatmend_status_list->AutoHidePageSizeSelector || $view_treatmend_status_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_treatmend_status">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_treatmend_status_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_treatmend_status_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_treatmend_status_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_treatmend_status_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_treatmend_status_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_treatmend_status_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_treatmend_status->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatmend_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_treatmend_statuslist" id="fview_treatmend_statuslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_treatmend_status_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_treatmend_status_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_treatmend_status">
<div id="gmp_view_treatmend_status" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_treatmend_status_list->TotalRecs > 0 || $view_treatmend_status->isGridEdit()) { ?>
<table id="tbl_view_treatmend_statuslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_treatmend_status_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_treatmend_status_list->renderListOptions();

// Render list options (header, left)
$view_treatmend_status_list->ListOptions->render("header", "left");
?>
<?php if ($view_treatmend_status->id->Visible) { // id ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_treatmend_status->id->headerCellClass() ?>"><div id="elh_view_treatmend_status_id" class="view_treatmend_status_id"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_treatmend_status->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->id) ?>',1);"><div id="elh_view_treatmend_status_id" class="view_treatmend_status_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_treatmend_status->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_treatmend_status_TreatmentStartDate" class="view_treatmend_status_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_treatmend_status->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->TreatmentStartDate) ?>',1);"><div id="elh_view_treatmend_status_TreatmentStartDate" class="view_treatmend_status_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->TreatmentStartDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->TreatmentStartDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status->PatientID->Visible) { // PatientID ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_treatmend_status->PatientID->headerCellClass() ?>"><div id="elh_view_treatmend_status_PatientID" class="view_treatmend_status_PatientID"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_treatmend_status->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->PatientID) ?>',1);"><div id="elh_view_treatmend_status_PatientID" class="view_treatmend_status_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status->first_name->Visible) { // first_name ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_treatmend_status->first_name->headerCellClass() ?>"><div id="elh_view_treatmend_status_first_name" class="view_treatmend_status_first_name"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_treatmend_status->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->first_name) ?>',1);"><div id="elh_view_treatmend_status_first_name" class="view_treatmend_status_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status->Treatment->Visible) { // Treatment ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_treatmend_status->Treatment->headerCellClass() ?>"><div id="elh_view_treatmend_status_Treatment" class="view_treatmend_status_Treatment"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_treatmend_status->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->Treatment) ?>',1);"><div id="elh_view_treatmend_status_Treatment" class="view_treatmend_status_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status->OPUDATE->Visible) { // OPUDATE ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->OPUDATE) == "") { ?>
		<th data-name="OPUDATE" class="<?php echo $view_treatmend_status->OPUDATE->headerCellClass() ?>"><div id="elh_view_treatmend_status_OPUDATE" class="view_treatmend_status_OPUDATE"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->OPUDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDATE" class="<?php echo $view_treatmend_status->OPUDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->OPUDATE) ?>',1);"><div id="elh_view_treatmend_status_OPUDATE" class="view_treatmend_status_OPUDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->OPUDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->OPUDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->OPUDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status->Treatment1->Visible) { // Treatment1 ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->Treatment1) == "") { ?>
		<th data-name="Treatment1" class="<?php echo $view_treatmend_status->Treatment1->headerCellClass() ?>"><div id="elh_view_treatmend_status_Treatment1" class="view_treatmend_status_Treatment1"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->Treatment1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment1" class="<?php echo $view_treatmend_status->Treatment1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->Treatment1) ?>',1);"><div id="elh_view_treatmend_status_Treatment1" class="view_treatmend_status_Treatment1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->Treatment1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->Treatment1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->Treatment1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_treatmend_status->Status->Visible) { // Status ?>
	<?php if ($view_treatmend_status->sortUrl($view_treatmend_status->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $view_treatmend_status->Status->headerCellClass() ?>"><div id="elh_view_treatmend_status_Status" class="view_treatmend_status_Status"><div class="ew-table-header-caption"><?php echo $view_treatmend_status->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $view_treatmend_status->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_treatmend_status->SortUrl($view_treatmend_status->Status) ?>',1);"><div id="elh_view_treatmend_status_Status" class="view_treatmend_status_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_treatmend_status->Status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_treatmend_status->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_treatmend_status->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_treatmend_status_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_treatmend_status->ExportAll && $view_treatmend_status->isExport()) {
	$view_treatmend_status_list->StopRec = $view_treatmend_status_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_treatmend_status_list->TotalRecs > $view_treatmend_status_list->StartRec + $view_treatmend_status_list->DisplayRecs - 1)
		$view_treatmend_status_list->StopRec = $view_treatmend_status_list->StartRec + $view_treatmend_status_list->DisplayRecs - 1;
	else
		$view_treatmend_status_list->StopRec = $view_treatmend_status_list->TotalRecs;
}
$view_treatmend_status_list->RecCnt = $view_treatmend_status_list->StartRec - 1;
if ($view_treatmend_status_list->Recordset && !$view_treatmend_status_list->Recordset->EOF) {
	$view_treatmend_status_list->Recordset->moveFirst();
	$selectLimit = $view_treatmend_status_list->UseSelectLimit;
	if (!$selectLimit && $view_treatmend_status_list->StartRec > 1)
		$view_treatmend_status_list->Recordset->move($view_treatmend_status_list->StartRec - 1);
} elseif (!$view_treatmend_status->AllowAddDeleteRow && $view_treatmend_status_list->StopRec == 0) {
	$view_treatmend_status_list->StopRec = $view_treatmend_status->GridAddRowCount;
}

// Initialize aggregate
$view_treatmend_status->RowType = ROWTYPE_AGGREGATEINIT;
$view_treatmend_status->resetAttributes();
$view_treatmend_status_list->renderRow();
while ($view_treatmend_status_list->RecCnt < $view_treatmend_status_list->StopRec) {
	$view_treatmend_status_list->RecCnt++;
	if ($view_treatmend_status_list->RecCnt >= $view_treatmend_status_list->StartRec) {
		$view_treatmend_status_list->RowCnt++;

		// Set up key count
		$view_treatmend_status_list->KeyCount = $view_treatmend_status_list->RowIndex;

		// Init row class and style
		$view_treatmend_status->resetAttributes();
		$view_treatmend_status->CssClass = "";
		if ($view_treatmend_status->isGridAdd()) {
		} else {
			$view_treatmend_status_list->loadRowValues($view_treatmend_status_list->Recordset); // Load row values
		}
		$view_treatmend_status->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_treatmend_status->RowAttrs = array_merge($view_treatmend_status->RowAttrs, array('data-rowindex'=>$view_treatmend_status_list->RowCnt, 'id'=>'r' . $view_treatmend_status_list->RowCnt . '_view_treatmend_status', 'data-rowtype'=>$view_treatmend_status->RowType));

		// Render row
		$view_treatmend_status_list->renderRow();

		// Render list options
		$view_treatmend_status_list->renderListOptions();
?>
	<tr<?php echo $view_treatmend_status->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_treatmend_status_list->ListOptions->render("body", "left", $view_treatmend_status_list->RowCnt);
?>
	<?php if ($view_treatmend_status->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_treatmend_status->id->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_id" class="view_treatmend_status_id">
<span<?php echo $view_treatmend_status->id->viewAttributes() ?>>
<?php echo $view_treatmend_status->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate"<?php echo $view_treatmend_status->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_TreatmentStartDate" class="view_treatmend_status_TreatmentStartDate">
<span<?php echo $view_treatmend_status->TreatmentStartDate->viewAttributes() ?>>
<?php echo $view_treatmend_status->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_treatmend_status->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_PatientID" class="view_treatmend_status_PatientID">
<span<?php echo $view_treatmend_status->PatientID->viewAttributes() ?>>
<?php echo $view_treatmend_status->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_treatmend_status->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_first_name" class="view_treatmend_status_first_name">
<span<?php echo $view_treatmend_status->first_name->viewAttributes() ?>>
<?php echo $view_treatmend_status->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $view_treatmend_status->Treatment->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_Treatment" class="view_treatmend_status_Treatment">
<span<?php echo $view_treatmend_status->Treatment->viewAttributes() ?>>
<?php echo $view_treatmend_status->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status->OPUDATE->Visible) { // OPUDATE ?>
		<td data-name="OPUDATE"<?php echo $view_treatmend_status->OPUDATE->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_OPUDATE" class="view_treatmend_status_OPUDATE">
<span<?php echo $view_treatmend_status->OPUDATE->viewAttributes() ?>>
<?php echo $view_treatmend_status->OPUDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status->Treatment1->Visible) { // Treatment1 ?>
		<td data-name="Treatment1"<?php echo $view_treatmend_status->Treatment1->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_Treatment1" class="view_treatmend_status_Treatment1">
<span<?php echo $view_treatmend_status->Treatment1->viewAttributes() ?>>
<?php echo $view_treatmend_status->Treatment1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_treatmend_status->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $view_treatmend_status->Status->cellAttributes() ?>>
<span id="el<?php echo $view_treatmend_status_list->RowCnt ?>_view_treatmend_status_Status" class="view_treatmend_status_Status">
<span<?php echo $view_treatmend_status->Status->viewAttributes() ?>>
<?php echo $view_treatmend_status->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_treatmend_status_list->ListOptions->render("body", "right", $view_treatmend_status_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_treatmend_status->isGridAdd())
		$view_treatmend_status_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_treatmend_status->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_treatmend_status_list->Recordset)
	$view_treatmend_status_list->Recordset->Close();
?>
<?php if (!$view_treatmend_status->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_treatmend_status->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_treatmend_status_list->Pager)) $view_treatmend_status_list->Pager = new NumericPager($view_treatmend_status_list->StartRec, $view_treatmend_status_list->DisplayRecs, $view_treatmend_status_list->TotalRecs, $view_treatmend_status_list->RecRange, $view_treatmend_status_list->AutoHidePager) ?>
<?php if ($view_treatmend_status_list->Pager->RecordCount > 0 && $view_treatmend_status_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_treatmend_status_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_treatmend_status_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_treatmend_status_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_treatmend_status_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_treatmend_status_list->pageUrl() ?>start=<?php echo $view_treatmend_status_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_treatmend_status_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_treatmend_status_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_treatmend_status_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_treatmend_status_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_treatmend_status_list->TotalRecs > 0 && (!$view_treatmend_status_list->AutoHidePageSizeSelector || $view_treatmend_status_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_treatmend_status">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_treatmend_status_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_treatmend_status_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_treatmend_status_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_treatmend_status_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_treatmend_status_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_treatmend_status_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_treatmend_status->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_treatmend_status_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_treatmend_status_list->TotalRecs == 0 && !$view_treatmend_status->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_treatmend_status_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_treatmend_status_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_treatmend_status->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_treatmend_status->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_treatmend_status", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_treatmend_status_list->terminate();
?>