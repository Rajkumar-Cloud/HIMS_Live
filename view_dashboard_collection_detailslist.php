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
$view_dashboard_collection_details_list = new view_dashboard_collection_details_list();

// Run the page
$view_dashboard_collection_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_collection_details_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dashboard_collection_detailslist = currentForm = new ew.Form("fview_dashboard_collection_detailslist", "list");
fview_dashboard_collection_detailslist.formKeyCountName = '<?php echo $view_dashboard_collection_details_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dashboard_collection_detailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_collection_detailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_collection_detailslist.lists["x_HospID"] = <?php echo $view_dashboard_collection_details_list->HospID->Lookup->toClientList() ?>;
fview_dashboard_collection_detailslist.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_collection_details_list->HospID->lookupOptions()) ?>;
fview_dashboard_collection_detailslist.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_dashboard_collection_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_collection_detailslistsrch");

// Validate function for search
fview_dashboard_collection_detailslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details->createddate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_collection_detailslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_collection_detailslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_dashboard_collection_detailslistsrch.filterList = <?php echo $view_dashboard_collection_details_list->getFilterList() ?>;
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
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_collection_details_list->TotalRecs > 0 && $view_dashboard_collection_details_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_collection_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_dashboard_collection_details->isExport() || EXPORT_MASTER_RECORD && $view_dashboard_collection_details->isExport("print")) { ?>
<?php
if ($view_dashboard_collection_details_list->DbMasterFilter <> "" && $view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_modeofpayment_details") {
	if ($view_dashboard_collection_details_list->MasterRecordExists) {
		include_once "view_dashboard_summary_modeofpayment_detailsmaster.php";
	}
}
?>
<?php
if ($view_dashboard_collection_details_list->DbMasterFilter <> "" && $view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_payment_mode") {
	if ($view_dashboard_collection_details_list->MasterRecordExists) {
		include_once "view_dashboard_summary_payment_modemaster.php";
	}
}
?>
<?php } ?>
<?php
$view_dashboard_collection_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_collection_details->isExport() && !$view_dashboard_collection_details->CurrentAction) { ?>
<form name="fview_dashboard_collection_detailslistsrch" id="fview_dashboard_collection_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dashboard_collection_details_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_collection_detailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_collection_details">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dashboard_collection_details_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dashboard_collection_details->RowType = ROWTYPE_SEARCH;

// Render row
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dashboard_collection_details->createddate->Visible) { // createddate ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_dashboard_collection_details->createddate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddate" id="z_createddate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_collection_details->createddate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details->createddate->EditValue ?>"<?php echo $view_dashboard_collection_details->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details->createddate->ReadOnly && !$view_dashboard_collection_details->createddate->Disabled && !isset($view_dashboard_collection_details->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_collection_detailslistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddate style="d-none"">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details->createddate->EditValue2 ?>"<?php echo $view_dashboard_collection_details->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details->createddate->ReadOnly && !$view_dashboard_collection_details->createddate->Disabled && !isset($view_dashboard_collection_details->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_collection_detailslistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_dashboard_collection_details->UserName->Visible) { // UserName ?>
	<div id="xsc_UserName" class="ew-cell form-group">
		<label for="x_UserName" class="ew-search-caption ew-label"><?php echo $view_dashboard_collection_details->UserName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UserName" id="z_UserName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x_UserName" id="x_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details->UserName->EditValue ?>"<?php echo $view_dashboard_collection_details->UserName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_dashboard_collection_details->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_dashboard_collection_details->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details->Mobile->EditValue ?>"<?php echo $view_dashboard_collection_details->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dashboard_collection_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_collection_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_collection_details_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_collection_details_list->showPageHeader(); ?>
<?php
$view_dashboard_collection_details_list->showMessage();
?>
<?php if ($view_dashboard_collection_details_list->TotalRecs > 0 || $view_dashboard_collection_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_collection_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_collection_details">
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_collection_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_collection_details_list->Pager)) $view_dashboard_collection_details_list->Pager = new NumericPager($view_dashboard_collection_details_list->StartRec, $view_dashboard_collection_details_list->DisplayRecs, $view_dashboard_collection_details_list->TotalRecs, $view_dashboard_collection_details_list->RecRange, $view_dashboard_collection_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_collection_details_list->Pager->RecordCount > 0 && $view_dashboard_collection_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_collection_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_collection_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_collection_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_collection_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_collection_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_collection_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->TotalRecs > 0 && (!$view_dashboard_collection_details_list->AutoHidePageSizeSelector || $view_dashboard_collection_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_collection_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_collection_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_collection_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_collection_detailslist" id="fview_dashboard_collection_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_collection_details_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_collection_details_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_collection_details">
<?php if ($view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_modeofpayment_details" && $view_dashboard_collection_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_dashboard_summary_modeofpayment_details">
<input type="hidden" name="fk_UserName" value="<?php echo $view_dashboard_collection_details->UserName->getSessionValue() ?>">
<input type="hidden" name="fk_createddate" value="<?php echo $view_dashboard_collection_details->createddate->getSessionValue() ?>">
<input type="hidden" name="fk_ModeofPayment" value="<?php echo $view_dashboard_collection_details->ModeofPayment->getSessionValue() ?>">
<input type="hidden" name="fk_HospID" value="<?php echo $view_dashboard_collection_details->HospID->getSessionValue() ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->getCurrentMasterTable() == "view_dashboard_summary_payment_mode" && $view_dashboard_collection_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_dashboard_summary_payment_mode">
<input type="hidden" name="fk_createddate" value="<?php echo $view_dashboard_collection_details->createddate->getSessionValue() ?>">
<input type="hidden" name="fk_HospID" value="<?php echo $view_dashboard_collection_details->HospID->getSessionValue() ?>">
<input type="hidden" name="fk_UserName" value="<?php echo $view_dashboard_collection_details->UserName->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_dashboard_collection_details" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_collection_details_list->TotalRecs > 0 || $view_dashboard_collection_details->isGridEdit()) { ?>
<table id="tbl_view_dashboard_collection_detailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_collection_details_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_collection_details_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_collection_details_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_collection_details->id->Visible) { // id ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_dashboard_collection_details->id->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_dashboard_collection_details->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->id) ?>',1);"><div id="elh_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_collection_details->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_collection_details->createddate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->createddate) ?>',1);"><div id="elh_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->createddate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->createddate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_collection_details->UserName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_collection_details->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->UserName) ?>',1);"><div id="elh_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_dashboard_collection_details->BillNumber->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_dashboard_collection_details->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->BillNumber) ?>',1);"><div id="elh_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_collection_details->PatientID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_collection_details->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->PatientID) ?>',1);"><div id="elh_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_collection_details->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_collection_details->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->PatientName) ?>',1);"><div id="elh_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->Mobile->Visible) { // Mobile ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_dashboard_collection_details->Mobile->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_dashboard_collection_details->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->Mobile) ?>',1);"><div id="elh_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_dashboard_collection_details->voucher_type->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_dashboard_collection_details->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->voucher_type) ?>',1);"><div id="elh_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->Details->Visible) { // Details ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_dashboard_collection_details->Details->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_dashboard_collection_details->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->Details) ?>',1);"><div id="elh_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->ModeofPayment) ?>',1);"><div id="elh_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->Amount->Visible) { // Amount ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_dashboard_collection_details->Amount->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_dashboard_collection_details->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->Amount) ?>',1);"><div id="elh_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_dashboard_collection_details->AnyDues->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_dashboard_collection_details->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->AnyDues) ?>',1);"><div id="elh_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_collection_details->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_collection_details->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->createdby) ?>',1);"><div id="elh_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_collection_details->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_collection_details->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->createddatetime) ?>',1);"><div id="elh_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_dashboard_collection_details->modifiedby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_dashboard_collection_details->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->modifiedby) ?>',1);"><div id="elh_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details->modifieddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->modifieddatetime) ?>',1);"><div id="elh_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_collection_details->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_collection_details->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->BillType) ?>',1);"><div id="elh_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_collection_details->sortUrl($view_dashboard_collection_details->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_collection_details->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_collection_details->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_collection_details->SortUrl($view_dashboard_collection_details->HospID) ?>',1);"><div id="elh_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_collection_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_collection_details->ExportAll && $view_dashboard_collection_details->isExport()) {
	$view_dashboard_collection_details_list->StopRec = $view_dashboard_collection_details_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dashboard_collection_details_list->TotalRecs > $view_dashboard_collection_details_list->StartRec + $view_dashboard_collection_details_list->DisplayRecs - 1)
		$view_dashboard_collection_details_list->StopRec = $view_dashboard_collection_details_list->StartRec + $view_dashboard_collection_details_list->DisplayRecs - 1;
	else
		$view_dashboard_collection_details_list->StopRec = $view_dashboard_collection_details_list->TotalRecs;
}
$view_dashboard_collection_details_list->RecCnt = $view_dashboard_collection_details_list->StartRec - 1;
if ($view_dashboard_collection_details_list->Recordset && !$view_dashboard_collection_details_list->Recordset->EOF) {
	$view_dashboard_collection_details_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_collection_details_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_collection_details_list->StartRec > 1)
		$view_dashboard_collection_details_list->Recordset->move($view_dashboard_collection_details_list->StartRec - 1);
} elseif (!$view_dashboard_collection_details->AllowAddDeleteRow && $view_dashboard_collection_details_list->StopRec == 0) {
	$view_dashboard_collection_details_list->StopRec = $view_dashboard_collection_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_collection_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_list->renderRow();
while ($view_dashboard_collection_details_list->RecCnt < $view_dashboard_collection_details_list->StopRec) {
	$view_dashboard_collection_details_list->RecCnt++;
	if ($view_dashboard_collection_details_list->RecCnt >= $view_dashboard_collection_details_list->StartRec) {
		$view_dashboard_collection_details_list->RowCnt++;

		// Set up key count
		$view_dashboard_collection_details_list->KeyCount = $view_dashboard_collection_details_list->RowIndex;

		// Init row class and style
		$view_dashboard_collection_details->resetAttributes();
		$view_dashboard_collection_details->CssClass = "";
		if ($view_dashboard_collection_details->isGridAdd()) {
		} else {
			$view_dashboard_collection_details_list->loadRowValues($view_dashboard_collection_details_list->Recordset); // Load row values
		}
		$view_dashboard_collection_details->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_collection_details->RowAttrs = array_merge($view_dashboard_collection_details->RowAttrs, array('data-rowindex'=>$view_dashboard_collection_details_list->RowCnt, 'id'=>'r' . $view_dashboard_collection_details_list->RowCnt . '_view_dashboard_collection_details', 'data-rowtype'=>$view_dashboard_collection_details->RowType));

		// Render row
		$view_dashboard_collection_details_list->renderRow();

		// Render list options
		$view_dashboard_collection_details_list->renderListOptions();
?>
	<tr<?php echo $view_dashboard_collection_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_collection_details_list->ListOptions->render("body", "left", $view_dashboard_collection_details_list->RowCnt);
?>
	<?php if ($view_dashboard_collection_details->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_dashboard_collection_details->id->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
<span<?php echo $view_dashboard_collection_details->id->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->createddate->Visible) { // createddate ?>
		<td data-name="createddate"<?php echo $view_dashboard_collection_details->createddate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
<span<?php echo $view_dashboard_collection_details->createddate->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->createddate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_dashboard_collection_details->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName">
<span<?php echo $view_dashboard_collection_details->UserName->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_dashboard_collection_details->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
<span<?php echo $view_dashboard_collection_details->BillNumber->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_dashboard_collection_details->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
<span<?php echo $view_dashboard_collection_details->PatientID->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_dashboard_collection_details->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
<span<?php echo $view_dashboard_collection_details->PatientName->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_dashboard_collection_details->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
<span<?php echo $view_dashboard_collection_details->Mobile->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_dashboard_collection_details->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
<span<?php echo $view_dashboard_collection_details->voucher_type->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_dashboard_collection_details->Details->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
<span<?php echo $view_dashboard_collection_details->Details->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_dashboard_collection_details->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
<span<?php echo $view_dashboard_collection_details->ModeofPayment->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_dashboard_collection_details->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
<span<?php echo $view_dashboard_collection_details->Amount->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_dashboard_collection_details->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
<span<?php echo $view_dashboard_collection_details->AnyDues->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_dashboard_collection_details->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
<span<?php echo $view_dashboard_collection_details->createdby->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_dashboard_collection_details->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
<span<?php echo $view_dashboard_collection_details->createddatetime->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_dashboard_collection_details->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
<span<?php echo $view_dashboard_collection_details->modifiedby->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_dashboard_collection_details->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
<span<?php echo $view_dashboard_collection_details->modifieddatetime->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_dashboard_collection_details->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
<span<?php echo $view_dashboard_collection_details->BillType->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_collection_details->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_collection_details_list->RowCnt ?>_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
<span<?php echo $view_dashboard_collection_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_collection_details->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_collection_details_list->ListOptions->render("body", "right", $view_dashboard_collection_details_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_collection_details->isGridAdd())
		$view_dashboard_collection_details_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_collection_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_list->renderRow();
?>
<?php if ($view_dashboard_collection_details_list->TotalRecs > 0 && !$view_dashboard_collection_details->isGridAdd() && !$view_dashboard_collection_details->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_collection_details_list->renderListOptions();

// Render list options (footer, left)
$view_dashboard_collection_details_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_collection_details->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_dashboard_collection_details->id->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_dashboard_collection_details->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_dashboard_collection_details->UserName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" class="<?php echo $view_dashboard_collection_details->BillNumber->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" class="<?php echo $view_dashboard_collection_details->PatientID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_dashboard_collection_details->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_dashboard_collection_details->Mobile->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" class="<?php echo $view_dashboard_collection_details->voucher_type->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->Details->Visible) { // Details ?>
		<td data-name="Details" class="<?php echo $view_dashboard_collection_details->Details->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $view_dashboard_collection_details->Amount->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_collection_details->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" class="<?php echo $view_dashboard_collection_details->AnyDues->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_dashboard_collection_details->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_dashboard_collection_details->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $view_dashboard_collection_details->modifiedby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details->modifieddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_dashboard_collection_details->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_collection_details->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_collection_details_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dashboard_collection_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_collection_details_list->Recordset)
	$view_dashboard_collection_details_list->Recordset->Close();
?>
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_collection_details->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_collection_details_list->Pager)) $view_dashboard_collection_details_list->Pager = new NumericPager($view_dashboard_collection_details_list->StartRec, $view_dashboard_collection_details_list->DisplayRecs, $view_dashboard_collection_details_list->TotalRecs, $view_dashboard_collection_details_list->RecRange, $view_dashboard_collection_details_list->AutoHidePager) ?>
<?php if ($view_dashboard_collection_details_list->Pager->RecordCount > 0 && $view_dashboard_collection_details_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_collection_details_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_collection_details_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_collection_details_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_collection_details_list->pageUrl() ?>start=<?php echo $view_dashboard_collection_details_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_collection_details_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_collection_details_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_collection_details_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_list->TotalRecs > 0 && (!$view_dashboard_collection_details_list->AutoHidePageSizeSelector || $view_dashboard_collection_details_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_collection_details">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_collection_details_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_collection_details->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_collection_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_collection_details_list->TotalRecs == 0 && !$view_dashboard_collection_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_collection_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_collection_details_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_collection_details", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_collection_details_list->terminate();
?>