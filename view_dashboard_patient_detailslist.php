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
$view_dashboard_patient_details_list = new view_dashboard_patient_details_list();

// Run the page
$view_dashboard_patient_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_patient_details_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dashboard_patient_detailslist = currentForm = new ew.Form("fview_dashboard_patient_detailslist", "list");
fview_dashboard_patient_detailslist.formKeyCountName = '<?php echo $view_dashboard_patient_details_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dashboard_patient_detailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_patient_detailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_patient_detailslist.lists["x_HospID"] = <?php echo $view_dashboard_patient_details_list->HospID->Lookup->toClientList() ?>;
fview_dashboard_patient_detailslist.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_patient_details_list->HospID->lookupOptions()) ?>;
fview_dashboard_patient_detailslist.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_dashboard_patient_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_patient_detailslistsrch");

// Validate function for search
fview_dashboard_patient_detailslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createdDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_patient_details->createdDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_patient_detailslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_patient_detailslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_dashboard_patient_detailslistsrch.filterList = <?php echo $view_dashboard_patient_details_list->getFilterList() ?>;
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
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_patient_details_list->TotalRecs > 0 && $view_dashboard_patient_details_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_patient_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_patient_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_patient_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_patient_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_dashboard_patient_details->isExport() || EXPORT_MASTER_RECORD && $view_dashboard_patient_details->isExport("print")) { ?>
<?php
if ($view_dashboard_patient_details_list->DbMasterFilter <> "" && $view_dashboard_patient_details->getCurrentMasterTable() == "view_dashboard_patient_summary") {
	if ($view_dashboard_patient_details_list->MasterRecordExists) {
		include_once "view_dashboard_patient_summarymaster.php";
	}
}
?>
<?php } ?>
<?php
$view_dashboard_patient_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_patient_details->isExport() && !$view_dashboard_patient_details->CurrentAction) { ?>
<form name="fview_dashboard_patient_detailslistsrch" id="fview_dashboard_patient_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dashboard_patient_details_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_patient_detailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_patient_details">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dashboard_patient_details_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dashboard_patient_details->RowType = ROWTYPE_SEARCH;

// Render row
$view_dashboard_patient_details->resetAttributes();
$view_dashboard_patient_details_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
	<div id="xsc_createdDate" class="ew-cell form-group">
		<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $view_dashboard_patient_details->createdDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createdDate" id="z_createdDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_patient_details->createdDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->createdDate->EditValue ?>"<?php echo $view_dashboard_patient_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_patient_details->createdDate->ReadOnly && !$view_dashboard_patient_details->createdDate->Disabled && !isset($view_dashboard_patient_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_patient_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_patient_detailslistsrch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createdDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createdDate style="d-none"">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->createdDate->EditValue2 ?>"<?php echo $view_dashboard_patient_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_patient_details->createdDate->ReadOnly && !$view_dashboard_patient_details->createdDate->Disabled && !isset($view_dashboard_patient_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_patient_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_patient_detailslistsrch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_patient_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dashboard_patient_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_patient_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_patient_details_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_patient_details_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_patient_details_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_patient_details_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_patient_details_list->showPageHeader(); ?>
<?php
$view_dashboard_patient_details_list->showMessage();
?>
<?php if ($view_dashboard_patient_details_list->TotalRecs > 0 || $view_dashboard_patient_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_patient_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_patient_details">
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_patient_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_patient_details_list->Pager)) $view_dashboard_patient_details_list->Pager = new NumericPager($view_dashboard_patient_details_list->StartRec, $view_dashboard_patient_details_list->DisplayRecs, $view_dashboard_patient_details_list->TotalRecs, $view_dashboard_patient_details_list->RecRange, $view_dashboard_patient_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_patient_details_list->Pager->RecordCount > 0 && $view_dashboard_patient_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_patient_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_patient_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_patient_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_patient_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_patient_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_patient_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_patient_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_patient_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_patient_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_patient_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_patient_details_list->TotalRecs > 0 && (!$view_dashboard_patient_details_list->AutoHidePageSizeSelector || $view_dashboard_patient_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_patient_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_patient_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_patient_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_patient_detailslist" id="fview_dashboard_patient_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_patient_details_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_patient_details_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_patient_details">
<?php if ($view_dashboard_patient_details->getCurrentMasterTable() == "view_dashboard_patient_summary" && $view_dashboard_patient_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_dashboard_patient_summary">
<input type="hidden" name="fk_createdDate" value="<?php echo $view_dashboard_patient_details->createdDate->getSessionValue() ?>">
<input type="hidden" name="fk_WhereDidYouHear" value="<?php echo $view_dashboard_patient_details->WhereDidYouHear->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_dashboard_patient_details" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_patient_details_list->TotalRecs > 0 || $view_dashboard_patient_details->isGridEdit()) { ?>
<table id="tbl_view_dashboard_patient_detailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_patient_details_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_patient_details_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_patient_details_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_patient_details->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_patient_details->PatientID->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_PatientID" class="view_dashboard_patient_details_PatientID"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_patient_details->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->PatientID) ?>',1);"><div id="elh_view_dashboard_patient_details_PatientID" class="view_dashboard_patient_details_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->first_name->Visible) { // first_name ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_dashboard_patient_details->first_name->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_first_name" class="view_dashboard_patient_details_first_name"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_dashboard_patient_details->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->first_name) ?>',1);"><div id="elh_view_dashboard_patient_details_first_name" class="view_dashboard_patient_details_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_dashboard_patient_details->mobile_no->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_mobile_no" class="view_dashboard_patient_details_mobile_no"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_dashboard_patient_details->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->mobile_no) ?>',1);"><div id="elh_view_dashboard_patient_details_mobile_no" class="view_dashboard_patient_details_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_ReferA4TreatingConsultant" class="view_dashboard_patient_details_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_dashboard_patient_details_ReferA4TreatingConsultant" class="view_dashboard_patient_details_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $view_dashboard_patient_details->Patient_Language->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_Patient_Language" class="view_dashboard_patient_details_Patient_Language"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->Patient_Language->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $view_dashboard_patient_details->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->Patient_Language) ?>',1);"><div id="elh_view_dashboard_patient_details_Patient_Language" class="view_dashboard_patient_details_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->Patient_Language->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->Patient_Language->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->Patient_Language->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_dashboard_patient_details->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_WhereDidYouHear" class="view_dashboard_patient_details_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_dashboard_patient_details->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->WhereDidYouHear) ?>',1);"><div id="elh_view_dashboard_patient_details_WhereDidYouHear" class="view_dashboard_patient_details_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->WhereDidYouHear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_patient_details->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_HospID" class="view_dashboard_patient_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_patient_details->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->HospID) ?>',1);"><div id="elh_view_dashboard_patient_details_HospID" class="view_dashboard_patient_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_patient_details->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_createdDate" class="view_dashboard_patient_details_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_patient_details->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->createdDate) ?>',1);"><div id="elh_view_dashboard_patient_details_createdDate" class="view_dashboard_patient_details_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_patient_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_patient_details->ExportAll && $view_dashboard_patient_details->isExport()) {
	$view_dashboard_patient_details_list->StopRec = $view_dashboard_patient_details_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dashboard_patient_details_list->TotalRecs > $view_dashboard_patient_details_list->StartRec + $view_dashboard_patient_details_list->DisplayRecs - 1)
		$view_dashboard_patient_details_list->StopRec = $view_dashboard_patient_details_list->StartRec + $view_dashboard_patient_details_list->DisplayRecs - 1;
	else
		$view_dashboard_patient_details_list->StopRec = $view_dashboard_patient_details_list->TotalRecs;
}
$view_dashboard_patient_details_list->RecCnt = $view_dashboard_patient_details_list->StartRec - 1;
if ($view_dashboard_patient_details_list->Recordset && !$view_dashboard_patient_details_list->Recordset->EOF) {
	$view_dashboard_patient_details_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_patient_details_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_patient_details_list->StartRec > 1)
		$view_dashboard_patient_details_list->Recordset->move($view_dashboard_patient_details_list->StartRec - 1);
} elseif (!$view_dashboard_patient_details->AllowAddDeleteRow && $view_dashboard_patient_details_list->StopRec == 0) {
	$view_dashboard_patient_details_list->StopRec = $view_dashboard_patient_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_patient_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_patient_details->resetAttributes();
$view_dashboard_patient_details_list->renderRow();
while ($view_dashboard_patient_details_list->RecCnt < $view_dashboard_patient_details_list->StopRec) {
	$view_dashboard_patient_details_list->RecCnt++;
	if ($view_dashboard_patient_details_list->RecCnt >= $view_dashboard_patient_details_list->StartRec) {
		$view_dashboard_patient_details_list->RowCnt++;

		// Set up key count
		$view_dashboard_patient_details_list->KeyCount = $view_dashboard_patient_details_list->RowIndex;

		// Init row class and style
		$view_dashboard_patient_details->resetAttributes();
		$view_dashboard_patient_details->CssClass = "";
		if ($view_dashboard_patient_details->isGridAdd()) {
		} else {
			$view_dashboard_patient_details_list->loadRowValues($view_dashboard_patient_details_list->Recordset); // Load row values
		}
		$view_dashboard_patient_details->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_patient_details->RowAttrs = array_merge($view_dashboard_patient_details->RowAttrs, array('data-rowindex'=>$view_dashboard_patient_details_list->RowCnt, 'id'=>'r' . $view_dashboard_patient_details_list->RowCnt . '_view_dashboard_patient_details', 'data-rowtype'=>$view_dashboard_patient_details->RowType));

		// Render row
		$view_dashboard_patient_details_list->renderRow();

		// Render list options
		$view_dashboard_patient_details_list->renderListOptions();
?>
	<tr<?php echo $view_dashboard_patient_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_patient_details_list->ListOptions->render("body", "left", $view_dashboard_patient_details_list->RowCnt);
?>
	<?php if ($view_dashboard_patient_details->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_dashboard_patient_details->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_PatientID" class="view_dashboard_patient_details_PatientID">
<span<?php echo $view_dashboard_patient_details->PatientID->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_dashboard_patient_details->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_first_name" class="view_dashboard_patient_details_first_name">
<span<?php echo $view_dashboard_patient_details->first_name->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_dashboard_patient_details->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_mobile_no" class="view_dashboard_patient_details_mobile_no">
<span<?php echo $view_dashboard_patient_details->mobile_no->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_ReferA4TreatingConsultant" class="view_dashboard_patient_details_ReferA4TreatingConsultant">
<span<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language"<?php echo $view_dashboard_patient_details->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_Patient_Language" class="view_dashboard_patient_details_Patient_Language">
<span<?php echo $view_dashboard_patient_details->Patient_Language->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->Patient_Language->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $view_dashboard_patient_details->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_WhereDidYouHear" class="view_dashboard_patient_details_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_details->WhereDidYouHear->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_patient_details->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_HospID" class="view_dashboard_patient_details_HospID">
<span<?php echo $view_dashboard_patient_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_dashboard_patient_details->createdDate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_details_list->RowCnt ?>_view_dashboard_patient_details_createdDate" class="view_dashboard_patient_details_createdDate">
<span<?php echo $view_dashboard_patient_details->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_patient_details_list->ListOptions->render("body", "right", $view_dashboard_patient_details_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_patient_details->isGridAdd())
		$view_dashboard_patient_details_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dashboard_patient_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_patient_details_list->Recordset)
	$view_dashboard_patient_details_list->Recordset->Close();
?>
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_patient_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_patient_details_list->Pager)) $view_dashboard_patient_details_list->Pager = new NumericPager($view_dashboard_patient_details_list->StartRec, $view_dashboard_patient_details_list->DisplayRecs, $view_dashboard_patient_details_list->TotalRecs, $view_dashboard_patient_details_list->RecRange, $view_dashboard_patient_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_patient_details_list->Pager->RecordCount > 0 && $view_dashboard_patient_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_patient_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_patient_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_patient_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_patient_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_patient_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_patient_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_patient_details_list->pageUrl() ?>start=<?php echo $view_dashboard_patient_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_patient_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_patient_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_patient_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_patient_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_patient_details_list->TotalRecs > 0 && (!$view_dashboard_patient_details_list->AutoHidePageSizeSelector || $view_dashboard_patient_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_patient_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_patient_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_patient_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_patient_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_patient_details_list->TotalRecs == 0 && !$view_dashboard_patient_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_patient_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_patient_details_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_patient_details", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_patient_details_list->terminate();
?>