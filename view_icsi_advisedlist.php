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
$view_icsi_advised_list = new view_icsi_advised_list();

// Run the page
$view_icsi_advised_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_icsi_advised_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_icsi_advised->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_icsi_advisedlist = currentForm = new ew.Form("fview_icsi_advisedlist", "list");
fview_icsi_advisedlist.formKeyCountName = '<?php echo $view_icsi_advised_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_icsi_advisedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_icsi_advisedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_icsi_advisedlist.lists["x_ICSIAdvised[]"] = <?php echo $view_icsi_advised_list->ICSIAdvised->Lookup->toClientList() ?>;
fview_icsi_advisedlist.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($view_icsi_advised_list->ICSIAdvised->options(FALSE, TRUE)) ?>;
fview_icsi_advisedlist.lists["x_HospID"] = <?php echo $view_icsi_advised_list->HospID->Lookup->toClientList() ?>;
fview_icsi_advisedlist.lists["x_HospID"].options = <?php echo JsonEncode($view_icsi_advised_list->HospID->lookupOptions()) ?>;

// Form object for search
var fview_icsi_advisedlistsrch = currentSearchForm = new ew.Form("fview_icsi_advisedlistsrch");

// Validate function for search
fview_icsi_advisedlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_ICSIDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_icsi_advised->ICSIDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_icsi_advisedlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_icsi_advisedlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_icsi_advisedlistsrch.lists["x_ICSIAdvised[]"] = <?php echo $view_icsi_advised_list->ICSIAdvised->Lookup->toClientList() ?>;
fview_icsi_advisedlistsrch.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($view_icsi_advised_list->ICSIAdvised->options(FALSE, TRUE)) ?>;

// Filters
fview_icsi_advisedlistsrch.filterList = <?php echo $view_icsi_advised_list->getFilterList() ?>;
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
<?php if (!$view_icsi_advised->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_icsi_advised_list->TotalRecs > 0 && $view_icsi_advised_list->ExportOptions->visible()) { ?>
<?php $view_icsi_advised_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_icsi_advised_list->ImportOptions->visible()) { ?>
<?php $view_icsi_advised_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_icsi_advised_list->SearchOptions->visible()) { ?>
<?php $view_icsi_advised_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_icsi_advised_list->FilterOptions->visible()) { ?>
<?php $view_icsi_advised_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_icsi_advised_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_icsi_advised->isExport() && !$view_icsi_advised->CurrentAction) { ?>
<form name="fview_icsi_advisedlistsrch" id="fview_icsi_advisedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_icsi_advised_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_icsi_advisedlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_icsi_advised">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_icsi_advised_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_icsi_advised->RowType = ROWTYPE_SEARCH;

// Render row
$view_icsi_advised->resetAttributes();
$view_icsi_advised_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_icsi_advised->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="xsc_ICSIAdvised" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $view_icsi_advised->ICSIAdvised->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ICSIAdvised" id="z_ICSIAdvised" value="LIKE"></span>
		<span class="ew-search-field">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_icsi_advised" data-field="x_ICSIAdvised" data-value-separator="<?php echo $view_icsi_advised->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $view_icsi_advised->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_icsi_advised->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_icsi_advised->ICSIDate->Visible) { // ICSIDate ?>
	<div id="xsc_ICSIDate" class="ew-cell form-group">
		<label for="x_ICSIDate" class="ew-search-caption ew-label"><?php echo $view_icsi_advised->ICSIDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_ICSIDate" id="z_ICSIDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_icsi_advised->ICSIDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_icsi_advised" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($view_icsi_advised->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $view_icsi_advised->ICSIDate->EditValue ?>"<?php echo $view_icsi_advised->ICSIDate->editAttributes() ?>>
<?php if (!$view_icsi_advised->ICSIDate->ReadOnly && !$view_icsi_advised->ICSIDate->Disabled && !isset($view_icsi_advised->ICSIDate->EditAttrs["readonly"]) && !isset($view_icsi_advised->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_icsi_advisedlistsrch", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_ICSIDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_ICSIDate style="d-none"">
<input type="text" data-table="view_icsi_advised" data-field="x_ICSIDate" data-format="7" name="y_ICSIDate" id="y_ICSIDate" placeholder="<?php echo HtmlEncode($view_icsi_advised->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $view_icsi_advised->ICSIDate->EditValue2 ?>"<?php echo $view_icsi_advised->ICSIDate->editAttributes() ?>>
<?php if (!$view_icsi_advised->ICSIDate->ReadOnly && !$view_icsi_advised->ICSIDate->Disabled && !isset($view_icsi_advised->ICSIDate->EditAttrs["readonly"]) && !isset($view_icsi_advised->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_icsi_advisedlistsrch", "y_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_icsi_advised_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_icsi_advised_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_icsi_advised_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_icsi_advised_list->showPageHeader(); ?>
<?php
$view_icsi_advised_list->showMessage();
?>
<?php if ($view_icsi_advised_list->TotalRecs > 0 || $view_icsi_advised->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_icsi_advised_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_icsi_advised">
<?php if (!$view_icsi_advised->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_icsi_advised->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_icsi_advised_list->Pager)) $view_icsi_advised_list->Pager = new NumericPager($view_icsi_advised_list->StartRec, $view_icsi_advised_list->DisplayRecs, $view_icsi_advised_list->TotalRecs, $view_icsi_advised_list->RecRange, $view_icsi_advised_list->AutoHidePager) ?>
<?php if ($view_icsi_advised_list->Pager->RecordCount > 0 && $view_icsi_advised_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_icsi_advised_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_icsi_advised_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_icsi_advised_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_icsi_advised_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_icsi_advised_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_icsi_advised_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_icsi_advised_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_icsi_advised_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_icsi_advised_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_icsi_advised_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_icsi_advised_list->TotalRecs > 0 && (!$view_icsi_advised_list->AutoHidePageSizeSelector || $view_icsi_advised_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_icsi_advised">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_icsi_advised_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_icsi_advised_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_icsi_advised_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_icsi_advised_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_icsi_advised_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_icsi_advised_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_icsi_advised->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_icsi_advised_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_icsi_advisedlist" id="fview_icsi_advisedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_icsi_advised_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_icsi_advised_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_icsi_advised">
<div id="gmp_view_icsi_advised" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_icsi_advised_list->TotalRecs > 0 || $view_icsi_advised->isGridEdit()) { ?>
<table id="tbl_view_icsi_advisedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_icsi_advised_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_icsi_advised_list->renderListOptions();

// Render list options (header, left)
$view_icsi_advised_list->ListOptions->render("header", "left");
?>
<?php if ($view_icsi_advised->first_name->Visible) { // first_name ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_icsi_advised->first_name->headerCellClass() ?>"><div id="elh_view_icsi_advised_first_name" class="view_icsi_advised_first_name"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_icsi_advised->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->first_name) ?>',1);"><div id="elh_view_icsi_advised_first_name" class="view_icsi_advised_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->PatientID->Visible) { // PatientID ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_icsi_advised->PatientID->headerCellClass() ?>"><div id="elh_view_icsi_advised_PatientID" class="view_icsi_advised_PatientID"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_icsi_advised->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->PatientID) ?>',1);"><div id="elh_view_icsi_advised_PatientID" class="view_icsi_advised_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_icsi_advised->mobile_no->headerCellClass() ?>"><div id="elh_view_icsi_advised_mobile_no" class="view_icsi_advised_mobile_no"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_icsi_advised->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->mobile_no) ?>',1);"><div id="elh_view_icsi_advised_mobile_no" class="view_icsi_advised_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->street->Visible) { // street ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_icsi_advised->street->headerCellClass() ?>"><div id="elh_view_icsi_advised_street" class="view_icsi_advised_street"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_icsi_advised->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->street) ?>',1);"><div id="elh_view_icsi_advised_street" class="view_icsi_advised_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->town->Visible) { // town ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_icsi_advised->town->headerCellClass() ?>"><div id="elh_view_icsi_advised_town" class="view_icsi_advised_town"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_icsi_advised->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->town) ?>',1);"><div id="elh_view_icsi_advised_town" class="view_icsi_advised_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->ICSIAdvised) == "") { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_icsi_advised->ICSIAdvised->headerCellClass() ?>"><div id="elh_view_icsi_advised_ICSIAdvised" class="view_icsi_advised_ICSIAdvised"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->ICSIAdvised->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_icsi_advised->ICSIAdvised->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->ICSIAdvised) ?>',1);"><div id="elh_view_icsi_advised_ICSIAdvised" class="view_icsi_advised_ICSIAdvised">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->ICSIAdvised->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->ICSIAdvised->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->ICSIAdvised->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->ICSIDate) == "") { ?>
		<th data-name="ICSIDate" class="<?php echo $view_icsi_advised->ICSIDate->headerCellClass() ?>"><div id="elh_view_icsi_advised_ICSIDate" class="view_icsi_advised_ICSIDate"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->ICSIDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDate" class="<?php echo $view_icsi_advised->ICSIDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->ICSIDate) ?>',1);"><div id="elh_view_icsi_advised_ICSIDate" class="view_icsi_advised_ICSIDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->ICSIDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->ICSIDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->ICSIDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_icsi_advised->createdUserName->headerCellClass() ?>"><div id="elh_view_icsi_advised_createdUserName" class="view_icsi_advised_createdUserName"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_icsi_advised->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->createdUserName) ?>',1);"><div id="elh_view_icsi_advised_createdUserName" class="view_icsi_advised_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->createdUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->createdUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised->HospID->Visible) { // HospID ?>
	<?php if ($view_icsi_advised->sortUrl($view_icsi_advised->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_icsi_advised->HospID->headerCellClass() ?>"><div id="elh_view_icsi_advised_HospID" class="view_icsi_advised_HospID"><div class="ew-table-header-caption"><?php echo $view_icsi_advised->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_icsi_advised->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_icsi_advised->SortUrl($view_icsi_advised->HospID) ?>',1);"><div id="elh_view_icsi_advised_HospID" class="view_icsi_advised_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_icsi_advised->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_icsi_advised_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_icsi_advised->ExportAll && $view_icsi_advised->isExport()) {
	$view_icsi_advised_list->StopRec = $view_icsi_advised_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_icsi_advised_list->TotalRecs > $view_icsi_advised_list->StartRec + $view_icsi_advised_list->DisplayRecs - 1)
		$view_icsi_advised_list->StopRec = $view_icsi_advised_list->StartRec + $view_icsi_advised_list->DisplayRecs - 1;
	else
		$view_icsi_advised_list->StopRec = $view_icsi_advised_list->TotalRecs;
}
$view_icsi_advised_list->RecCnt = $view_icsi_advised_list->StartRec - 1;
if ($view_icsi_advised_list->Recordset && !$view_icsi_advised_list->Recordset->EOF) {
	$view_icsi_advised_list->Recordset->moveFirst();
	$selectLimit = $view_icsi_advised_list->UseSelectLimit;
	if (!$selectLimit && $view_icsi_advised_list->StartRec > 1)
		$view_icsi_advised_list->Recordset->move($view_icsi_advised_list->StartRec - 1);
} elseif (!$view_icsi_advised->AllowAddDeleteRow && $view_icsi_advised_list->StopRec == 0) {
	$view_icsi_advised_list->StopRec = $view_icsi_advised->GridAddRowCount;
}

// Initialize aggregate
$view_icsi_advised->RowType = ROWTYPE_AGGREGATEINIT;
$view_icsi_advised->resetAttributes();
$view_icsi_advised_list->renderRow();
while ($view_icsi_advised_list->RecCnt < $view_icsi_advised_list->StopRec) {
	$view_icsi_advised_list->RecCnt++;
	if ($view_icsi_advised_list->RecCnt >= $view_icsi_advised_list->StartRec) {
		$view_icsi_advised_list->RowCnt++;

		// Set up key count
		$view_icsi_advised_list->KeyCount = $view_icsi_advised_list->RowIndex;

		// Init row class and style
		$view_icsi_advised->resetAttributes();
		$view_icsi_advised->CssClass = "";
		if ($view_icsi_advised->isGridAdd()) {
		} else {
			$view_icsi_advised_list->loadRowValues($view_icsi_advised_list->Recordset); // Load row values
		}
		$view_icsi_advised->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_icsi_advised->RowAttrs = array_merge($view_icsi_advised->RowAttrs, array('data-rowindex'=>$view_icsi_advised_list->RowCnt, 'id'=>'r' . $view_icsi_advised_list->RowCnt . '_view_icsi_advised', 'data-rowtype'=>$view_icsi_advised->RowType));

		// Render row
		$view_icsi_advised_list->renderRow();

		// Render list options
		$view_icsi_advised_list->renderListOptions();
?>
	<tr<?php echo $view_icsi_advised->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_icsi_advised_list->ListOptions->render("body", "left", $view_icsi_advised_list->RowCnt);
?>
	<?php if ($view_icsi_advised->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_icsi_advised->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_first_name" class="view_icsi_advised_first_name">
<span<?php echo $view_icsi_advised->first_name->viewAttributes() ?>>
<?php echo $view_icsi_advised->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_icsi_advised->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_PatientID" class="view_icsi_advised_PatientID">
<span<?php echo $view_icsi_advised->PatientID->viewAttributes() ?>>
<?php echo $view_icsi_advised->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_icsi_advised->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_mobile_no" class="view_icsi_advised_mobile_no">
<span<?php echo $view_icsi_advised->mobile_no->viewAttributes() ?>>
<?php echo $view_icsi_advised->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->street->Visible) { // street ?>
		<td data-name="street"<?php echo $view_icsi_advised->street->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_street" class="view_icsi_advised_street">
<span<?php echo $view_icsi_advised->street->viewAttributes() ?>>
<?php echo $view_icsi_advised->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->town->Visible) { // town ?>
		<td data-name="town"<?php echo $view_icsi_advised->town->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_town" class="view_icsi_advised_town">
<span<?php echo $view_icsi_advised->town->viewAttributes() ?>>
<?php echo $view_icsi_advised->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised"<?php echo $view_icsi_advised->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_ICSIAdvised" class="view_icsi_advised_ICSIAdvised">
<span<?php echo $view_icsi_advised->ICSIAdvised->viewAttributes() ?>>
<?php echo $view_icsi_advised->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate"<?php echo $view_icsi_advised->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_ICSIDate" class="view_icsi_advised_ICSIDate">
<span<?php echo $view_icsi_advised->ICSIDate->viewAttributes() ?>>
<?php echo $view_icsi_advised->ICSIDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName"<?php echo $view_icsi_advised->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_createdUserName" class="view_icsi_advised_createdUserName">
<span<?php echo $view_icsi_advised->createdUserName->viewAttributes() ?>>
<?php echo $view_icsi_advised->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_icsi_advised->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCnt ?>_view_icsi_advised_HospID" class="view_icsi_advised_HospID">
<span<?php echo $view_icsi_advised->HospID->viewAttributes() ?>>
<?php echo $view_icsi_advised->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_icsi_advised_list->ListOptions->render("body", "right", $view_icsi_advised_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_icsi_advised->isGridAdd())
		$view_icsi_advised_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_icsi_advised->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_icsi_advised_list->Recordset)
	$view_icsi_advised_list->Recordset->Close();
?>
<?php if (!$view_icsi_advised->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_icsi_advised->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_icsi_advised_list->Pager)) $view_icsi_advised_list->Pager = new NumericPager($view_icsi_advised_list->StartRec, $view_icsi_advised_list->DisplayRecs, $view_icsi_advised_list->TotalRecs, $view_icsi_advised_list->RecRange, $view_icsi_advised_list->AutoHidePager) ?>
<?php if ($view_icsi_advised_list->Pager->RecordCount > 0 && $view_icsi_advised_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_icsi_advised_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_icsi_advised_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_icsi_advised_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_icsi_advised_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_icsi_advised_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_icsi_advised_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_icsi_advised_list->pageUrl() ?>start=<?php echo $view_icsi_advised_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_icsi_advised_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_icsi_advised_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_icsi_advised_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_icsi_advised_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_icsi_advised_list->TotalRecs > 0 && (!$view_icsi_advised_list->AutoHidePageSizeSelector || $view_icsi_advised_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_icsi_advised">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_icsi_advised_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_icsi_advised_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_icsi_advised_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_icsi_advised_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_icsi_advised_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_icsi_advised_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_icsi_advised->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_icsi_advised_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_icsi_advised_list->TotalRecs == 0 && !$view_icsi_advised->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_icsi_advised_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_icsi_advised_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_icsi_advised->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_icsi_advised->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_icsi_advised", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_icsi_advised_list->terminate();
?>