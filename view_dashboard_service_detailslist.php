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
$view_dashboard_service_details_list = new view_dashboard_service_details_list();

// Run the page
$view_dashboard_service_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_details_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dashboard_service_detailslist = currentForm = new ew.Form("fview_dashboard_service_detailslist", "list");
fview_dashboard_service_detailslist.formKeyCountName = '<?php echo $view_dashboard_service_details_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dashboard_service_detailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_detailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_service_detailslist.lists["x_DrName"] = <?php echo $view_dashboard_service_details_list->DrName->Lookup->toClientList() ?>;
fview_dashboard_service_detailslist.lists["x_DrName"].options = <?php echo JsonEncode($view_dashboard_service_details_list->DrName->lookupOptions()) ?>;
fview_dashboard_service_detailslist.lists["x_HospID"] = <?php echo $view_dashboard_service_details_list->HospID->Lookup->toClientList() ?>;
fview_dashboard_service_detailslist.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_service_details_list->HospID->lookupOptions()) ?>;
fview_dashboard_service_detailslist.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_dashboard_service_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_service_detailslistsrch");

// Validate function for search
fview_dashboard_service_detailslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createdDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->createdDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_service_detailslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_detailslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_service_detailslistsrch.lists["x_DrName"] = <?php echo $view_dashboard_service_details_list->DrName->Lookup->toClientList() ?>;
fview_dashboard_service_detailslistsrch.lists["x_DrName"].options = <?php echo JsonEncode($view_dashboard_service_details_list->DrName->lookupOptions()) ?>;

// Filters
fview_dashboard_service_detailslistsrch.filterList = <?php echo $view_dashboard_service_details_list->getFilterList() ?>;
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
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_service_details_list->TotalRecs > 0 && $view_dashboard_service_details_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_dashboard_service_details->isExport() || EXPORT_MASTER_RECORD && $view_dashboard_service_details->isExport("print")) { ?>
<?php
if ($view_dashboard_service_details_list->DbMasterFilter <> "" && $view_dashboard_service_details->getCurrentMasterTable() == "view_dashboard_service_servicetype") {
	if ($view_dashboard_service_details_list->MasterRecordExists) {
		include_once "view_dashboard_service_servicetypemaster.php";
	}
}
?>
<?php } ?>
<?php
$view_dashboard_service_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_service_details->isExport() && !$view_dashboard_service_details->CurrentAction) { ?>
<form name="fview_dashboard_service_detailslistsrch" id="fview_dashboard_service_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dashboard_service_details_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_service_detailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_service_details">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dashboard_service_details_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dashboard_service_details->RowType = ROWTYPE_SEARCH;

// Render row
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
	<div id="xsc_Services" class="ew-cell form-group">
		<label for="x_Services" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details->Services->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Services" id="z_Services" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x_Services" id="x_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->Services->EditValue ?>"<?php echo $view_dashboard_service_details->Services->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
	<div id="xsc_createdDate" class="ew-cell form-group">
		<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details->createdDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createdDate" id="z_createdDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createdDate->ReadOnly && !$view_dashboard_service_details->createdDate->Disabled && !isset($view_dashboard_service_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailslistsrch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createdDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createdDate style="d-none"">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdDate->EditValue2 ?>"<?php echo $view_dashboard_service_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createdDate->ReadOnly && !$view_dashboard_service_details->createdDate->Disabled && !isset($view_dashboard_service_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailslistsrch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
	<div id="xsc_DrName" class="ew-cell form-group">
		<label for="x_DrName" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details->DrName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrName" id="z_DrName" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?php echo strval($view_dashboard_service_details->DrName->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_dashboard_service_details->DrName->AdvancedSearch->ViewValue) : $view_dashboard_service_details->DrName->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_dashboard_service_details->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_dashboard_service_details->DrName->ReadOnly || $view_dashboard_service_details->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_dashboard_service_details->DrName->Lookup->getParamTag("p_x_DrName") ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_dashboard_service_details->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?php echo $view_dashboard_service_details->DrName->AdvancedSearch->SearchValue ?>"<?php echo $view_dashboard_service_details->DrName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
	<div id="xsc_DRDepartment" class="ew-cell form-group">
		<label for="x_DRDepartment" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DRDepartment" id="z_DRDepartment" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x_DRDepartment" id="x_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details->DRDepartment->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="xsc_DEPARTMENT" class="ew-cell form-group">
		<label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details->DEPARTMENT->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_service_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dashboard_service_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_service_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_service_details_list->showPageHeader(); ?>
<?php
$view_dashboard_service_details_list->showMessage();
?>
<?php if ($view_dashboard_service_details_list->TotalRecs > 0 || $view_dashboard_service_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_service_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_details">
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_service_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_service_details_list->Pager)) $view_dashboard_service_details_list->Pager = new NumericPager($view_dashboard_service_details_list->StartRec, $view_dashboard_service_details_list->DisplayRecs, $view_dashboard_service_details_list->TotalRecs, $view_dashboard_service_details_list->RecRange, $view_dashboard_service_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_service_details_list->Pager->RecordCount > 0 && $view_dashboard_service_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_service_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_service_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_service_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_service_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_service_details_list->TotalRecs > 0 && (!$view_dashboard_service_details_list->AutoHidePageSizeSelector || $view_dashboard_service_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_service_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_service_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_service_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_service_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_service_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_service_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_service_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_service_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_service_detailslist" id="fview_dashboard_service_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_service_details_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_service_details_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_details">
<?php if ($view_dashboard_service_details->getCurrentMasterTable() == "view_dashboard_service_servicetype" && $view_dashboard_service_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_dashboard_service_servicetype">
<input type="hidden" name="fk_DEPARTMENT" value="<?php echo $view_dashboard_service_details->DEPARTMENT->getSessionValue() ?>">
<input type="hidden" name="fk_HospID" value="<?php echo $view_dashboard_service_details->HospID->getSessionValue() ?>">
<input type="hidden" name="fk_SERVICE_TYPE" value="<?php echo $view_dashboard_service_details->SERVICE_TYPE->getSessionValue() ?>">
<input type="hidden" name="fk_createdDate" value="<?php echo $view_dashboard_service_details->createdDate->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_dashboard_service_details" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_service_details_list->TotalRecs > 0 || $view_dashboard_service_details->isGridEdit()) { ?>
<table id="tbl_view_dashboard_service_detailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_service_details_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_service_details_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_details_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details->PatientId->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->PatientId) ?>',1);"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->PatientName) ?>',1);"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details->Services->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->Services) ?>',1);"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details->amount->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->amount) ?>',1);"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details->SubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->SubTotal) ?>',1);"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->createdby) ?>',1);"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->createddatetime) ?>',1);"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->createdDate) ?>',1);"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details->DrName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->DrName) ?>',1);"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DRDepartment) == "") { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details->DRDepartment->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details->DRDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->DRDepartment) ?>',1);"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DRDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DRDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details->ItemCode->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->ItemCode) ?>',1);"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details->DEptCd->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->DEptCd) ?>',1);"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details->CODE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->CODE) ?>',1);"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details->SERVICE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->SERVICE) ?>',1);"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->SERVICE_TYPE) ?>',1);"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->SERVICE_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->DEPARTMENT) ?>',1);"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->HospID) ?>',1);"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_details->sortUrl($view_dashboard_service_details->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details->vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details->vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_service_details->SortUrl($view_dashboard_service_details->vid) ?>',1);"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details->vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_service_details->vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_service_details->ExportAll && $view_dashboard_service_details->isExport()) {
	$view_dashboard_service_details_list->StopRec = $view_dashboard_service_details_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dashboard_service_details_list->TotalRecs > $view_dashboard_service_details_list->StartRec + $view_dashboard_service_details_list->DisplayRecs - 1)
		$view_dashboard_service_details_list->StopRec = $view_dashboard_service_details_list->StartRec + $view_dashboard_service_details_list->DisplayRecs - 1;
	else
		$view_dashboard_service_details_list->StopRec = $view_dashboard_service_details_list->TotalRecs;
}
$view_dashboard_service_details_list->RecCnt = $view_dashboard_service_details_list->StartRec - 1;
if ($view_dashboard_service_details_list->Recordset && !$view_dashboard_service_details_list->Recordset->EOF) {
	$view_dashboard_service_details_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_service_details_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_service_details_list->StartRec > 1)
		$view_dashboard_service_details_list->Recordset->move($view_dashboard_service_details_list->StartRec - 1);
} elseif (!$view_dashboard_service_details->AllowAddDeleteRow && $view_dashboard_service_details_list->StopRec == 0) {
	$view_dashboard_service_details_list->StopRec = $view_dashboard_service_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_list->renderRow();
while ($view_dashboard_service_details_list->RecCnt < $view_dashboard_service_details_list->StopRec) {
	$view_dashboard_service_details_list->RecCnt++;
	if ($view_dashboard_service_details_list->RecCnt >= $view_dashboard_service_details_list->StartRec) {
		$view_dashboard_service_details_list->RowCnt++;

		// Set up key count
		$view_dashboard_service_details_list->KeyCount = $view_dashboard_service_details_list->RowIndex;

		// Init row class and style
		$view_dashboard_service_details->resetAttributes();
		$view_dashboard_service_details->CssClass = "";
		if ($view_dashboard_service_details->isGridAdd()) {
		} else {
			$view_dashboard_service_details_list->loadRowValues($view_dashboard_service_details_list->Recordset); // Load row values
		}
		$view_dashboard_service_details->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_service_details->RowAttrs = array_merge($view_dashboard_service_details->RowAttrs, array('data-rowindex'=>$view_dashboard_service_details_list->RowCnt, 'id'=>'r' . $view_dashboard_service_details_list->RowCnt . '_view_dashboard_service_details', 'data-rowtype'=>$view_dashboard_service_details->RowType));

		// Render row
		$view_dashboard_service_details_list->renderRow();

		// Render list options
		$view_dashboard_service_details_list->renderListOptions();
?>
	<tr<?php echo $view_dashboard_service_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_list->ListOptions->render("body", "left", $view_dashboard_service_details_list->RowCnt);
?>
	<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_dashboard_service_details->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
<span<?php echo $view_dashboard_service_details->PatientId->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_dashboard_service_details->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
<span<?php echo $view_dashboard_service_details->PatientName->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_dashboard_service_details->Services->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
<span<?php echo $view_dashboard_service_details->Services->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->Services->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $view_dashboard_service_details->amount->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
<span<?php echo $view_dashboard_service_details->amount->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $view_dashboard_service_details->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
<span<?php echo $view_dashboard_service_details->SubTotal->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SubTotal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_dashboard_service_details->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
<span<?php echo $view_dashboard_service_details->createdby->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_dashboard_service_details->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
<span<?php echo $view_dashboard_service_details->createddatetime->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_dashboard_service_details->createdDate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_dashboard_service_details->DrName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
<span<?php echo $view_dashboard_service_details->DrName->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment"<?php echo $view_dashboard_service_details->DRDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
<span<?php echo $view_dashboard_service_details->DRDepartment->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DRDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_dashboard_service_details->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
<span<?php echo $view_dashboard_service_details->ItemCode->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->ItemCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_dashboard_service_details->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
<span<?php echo $view_dashboard_service_details->DEptCd->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DEptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $view_dashboard_service_details->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
<span<?php echo $view_dashboard_service_details->CODE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE"<?php echo $view_dashboard_service_details->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
<span<?php echo $view_dashboard_service_details->SERVICE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SERVICE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE"<?php echo $view_dashboard_service_details->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $view_dashboard_service_details->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_service_details->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
		<td data-name="vid"<?php echo $view_dashboard_service_details->vid->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCnt ?>_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
<span<?php echo $view_dashboard_service_details->vid->viewAttributes() ?>>
<?php echo $view_dashboard_service_details->vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_list->ListOptions->render("body", "right", $view_dashboard_service_details_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_service_details->isGridAdd())
		$view_dashboard_service_details_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_list->renderRow();
?>
<?php if ($view_dashboard_service_details_list->TotalRecs > 0 && !$view_dashboard_service_details->isGridAdd() && !$view_dashboard_service_details->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_service_details_list->renderListOptions();

// Render list options (footer, left)
$view_dashboard_service_details_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_dashboard_service_details->PatientId->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_dashboard_service_details->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $view_dashboard_service_details->Services->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->Services->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $view_dashboard_service_details->amount->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_dashboard_service_details->SubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_dashboard_service_details->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_dashboard_service_details->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" class="<?php echo $view_dashboard_service_details->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $view_dashboard_service_details->DrName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment" class="<?php echo $view_dashboard_service_details->DRDepartment->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_dashboard_service_details->ItemCode->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $view_dashboard_service_details->DEptCd->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
		<td data-name="CODE" class="<?php echo $view_dashboard_service_details->CODE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" class="<?php echo $view_dashboard_service_details->SERVICE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_service_details->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
		<td data-name="vid" class="<?php echo $view_dashboard_service_details->vid->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_details_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dashboard_service_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_service_details_list->Recordset)
	$view_dashboard_service_details_list->Recordset->Close();
?>
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_service_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_service_details_list->Pager)) $view_dashboard_service_details_list->Pager = new NumericPager($view_dashboard_service_details_list->StartRec, $view_dashboard_service_details_list->DisplayRecs, $view_dashboard_service_details_list->TotalRecs, $view_dashboard_service_details_list->RecRange, $view_dashboard_service_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_service_details_list->Pager->RecordCount > 0 && $view_dashboard_service_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_service_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_service_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_service_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_service_details_list->pageUrl() ?>start=<?php echo $view_dashboard_service_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_service_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_service_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_service_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_service_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_service_details_list->TotalRecs > 0 && (!$view_dashboard_service_details_list->AutoHidePageSizeSelector || $view_dashboard_service_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_service_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_service_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_service_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_service_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_service_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_service_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_service_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_service_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_service_details_list->TotalRecs == 0 && !$view_dashboard_service_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_service_details_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_service_details", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_service_details_list->terminate();
?>