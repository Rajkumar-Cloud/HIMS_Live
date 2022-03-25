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
$view_delivery_registered_list = new view_delivery_registered_list();

// Run the page
$view_delivery_registered_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_delivery_registered_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_delivery_registered->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_delivery_registeredlist = currentForm = new ew.Form("fview_delivery_registeredlist", "list");
fview_delivery_registeredlist.formKeyCountName = '<?php echo $view_delivery_registered_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_delivery_registeredlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_delivery_registeredlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_delivery_registeredlist.lists["x_DeliveryRegistered"] = <?php echo $view_delivery_registered_list->DeliveryRegistered->Lookup->toClientList() ?>;
fview_delivery_registeredlist.lists["x_DeliveryRegistered"].options = <?php echo JsonEncode($view_delivery_registered_list->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fview_delivery_registeredlist.lists["x_HospID"] = <?php echo $view_delivery_registered_list->HospID->Lookup->toClientList() ?>;
fview_delivery_registeredlist.lists["x_HospID"].options = <?php echo JsonEncode($view_delivery_registered_list->HospID->lookupOptions()) ?>;

// Form object for search
var fview_delivery_registeredlistsrch = currentSearchForm = new ew.Form("fview_delivery_registeredlistsrch");

// Validate function for search
fview_delivery_registeredlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_LMP");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_delivery_registered->LMP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EDD");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_delivery_registered->EDD->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_delivery_registeredlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_delivery_registeredlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_delivery_registeredlistsrch.filterList = <?php echo $view_delivery_registered_list->getFilterList() ?>;
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
<?php if (!$view_delivery_registered->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_delivery_registered_list->TotalRecs > 0 && $view_delivery_registered_list->ExportOptions->visible()) { ?>
<?php $view_delivery_registered_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_delivery_registered_list->ImportOptions->visible()) { ?>
<?php $view_delivery_registered_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_delivery_registered_list->SearchOptions->visible()) { ?>
<?php $view_delivery_registered_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_delivery_registered_list->FilterOptions->visible()) { ?>
<?php $view_delivery_registered_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_delivery_registered_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_delivery_registered->isExport() && !$view_delivery_registered->CurrentAction) { ?>
<form name="fview_delivery_registeredlistsrch" id="fview_delivery_registeredlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_delivery_registered_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_delivery_registeredlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_delivery_registered">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_delivery_registered_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_delivery_registered->RowType = ROWTYPE_SEARCH;

// Render row
$view_delivery_registered->resetAttributes();
$view_delivery_registered_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_delivery_registered->LMP->Visible) { // LMP ?>
	<div id="xsc_LMP" class="ew-cell form-group">
		<label for="x_LMP" class="ew-search-caption ew-label"><?php echo $view_delivery_registered->LMP->caption() ?></label>
		<span class="ew-search-operator"><select name="z_LMP" id="z_LMP" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_delivery_registered->LMP->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_delivery_registered" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($view_delivery_registered->LMP->getPlaceHolder()) ?>" value="<?php echo $view_delivery_registered->LMP->EditValue ?>"<?php echo $view_delivery_registered->LMP->editAttributes() ?>>
<?php if (!$view_delivery_registered->LMP->ReadOnly && !$view_delivery_registered->LMP->Disabled && !isset($view_delivery_registered->LMP->EditAttrs["readonly"]) && !isset($view_delivery_registered->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_delivery_registeredlistsrch", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_LMP style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_LMP style="d-none"">
<input type="text" data-table="view_delivery_registered" data-field="x_LMP" data-format="7" name="y_LMP" id="y_LMP" placeholder="<?php echo HtmlEncode($view_delivery_registered->LMP->getPlaceHolder()) ?>" value="<?php echo $view_delivery_registered->LMP->EditValue2 ?>"<?php echo $view_delivery_registered->LMP->editAttributes() ?>>
<?php if (!$view_delivery_registered->LMP->ReadOnly && !$view_delivery_registered->LMP->Disabled && !isset($view_delivery_registered->LMP->EditAttrs["readonly"]) && !isset($view_delivery_registered->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_delivery_registeredlistsrch", "y_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_delivery_registered->EDD->Visible) { // EDD ?>
	<div id="xsc_EDD" class="ew-cell form-group">
		<label for="x_EDD" class="ew-search-caption ew-label"><?php echo $view_delivery_registered->EDD->caption() ?></label>
		<span class="ew-search-operator"><select name="z_EDD" id="z_EDD" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_delivery_registered->EDD->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_delivery_registered" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($view_delivery_registered->EDD->getPlaceHolder()) ?>" value="<?php echo $view_delivery_registered->EDD->EditValue ?>"<?php echo $view_delivery_registered->EDD->editAttributes() ?>>
<?php if (!$view_delivery_registered->EDD->ReadOnly && !$view_delivery_registered->EDD->Disabled && !isset($view_delivery_registered->EDD->EditAttrs["readonly"]) && !isset($view_delivery_registered->EDD->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_delivery_registeredlistsrch", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_EDD style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_EDD style="d-none"">
<input type="text" data-table="view_delivery_registered" data-field="x_EDD" data-format="7" name="y_EDD" id="y_EDD" placeholder="<?php echo HtmlEncode($view_delivery_registered->EDD->getPlaceHolder()) ?>" value="<?php echo $view_delivery_registered->EDD->EditValue2 ?>"<?php echo $view_delivery_registered->EDD->editAttributes() ?>>
<?php if (!$view_delivery_registered->EDD->ReadOnly && !$view_delivery_registered->EDD->Disabled && !isset($view_delivery_registered->EDD->EditAttrs["readonly"]) && !isset($view_delivery_registered->EDD->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_delivery_registeredlistsrch", "y_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_delivery_registered_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_delivery_registered_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_delivery_registered_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_delivery_registered_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_delivery_registered_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_delivery_registered_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_delivery_registered_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_delivery_registered_list->showPageHeader(); ?>
<?php
$view_delivery_registered_list->showMessage();
?>
<?php if ($view_delivery_registered_list->TotalRecs > 0 || $view_delivery_registered->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_delivery_registered_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_delivery_registered">
<?php if (!$view_delivery_registered->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_delivery_registered->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_delivery_registered_list->Pager)) $view_delivery_registered_list->Pager = new NumericPager($view_delivery_registered_list->StartRec, $view_delivery_registered_list->DisplayRecs, $view_delivery_registered_list->TotalRecs, $view_delivery_registered_list->RecRange, $view_delivery_registered_list->AutoHidePager) ?>
<?php if ($view_delivery_registered_list->Pager->RecordCount > 0 && $view_delivery_registered_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_delivery_registered_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_delivery_registered_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_delivery_registered_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_delivery_registered_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_delivery_registered_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_delivery_registered_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_delivery_registered_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_delivery_registered_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_delivery_registered_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_delivery_registered_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_delivery_registered_list->TotalRecs > 0 && (!$view_delivery_registered_list->AutoHidePageSizeSelector || $view_delivery_registered_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_delivery_registered">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_delivery_registered_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_delivery_registered_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_delivery_registered_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_delivery_registered_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_delivery_registered_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_delivery_registered_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_delivery_registered->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_delivery_registered_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_delivery_registeredlist" id="fview_delivery_registeredlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_delivery_registered_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_delivery_registered_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_delivery_registered">
<div id="gmp_view_delivery_registered" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_delivery_registered_list->TotalRecs > 0 || $view_delivery_registered->isGridEdit()) { ?>
<table id="tbl_view_delivery_registeredlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_delivery_registered_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_delivery_registered_list->renderListOptions();

// Render list options (header, left)
$view_delivery_registered_list->ListOptions->render("header", "left");
?>
<?php if ($view_delivery_registered->first_name->Visible) { // first_name ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_delivery_registered->first_name->headerCellClass() ?>"><div id="elh_view_delivery_registered_first_name" class="view_delivery_registered_first_name"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_delivery_registered->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->first_name) ?>',1);"><div id="elh_view_delivery_registered_first_name" class="view_delivery_registered_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->PatientID->Visible) { // PatientID ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_delivery_registered->PatientID->headerCellClass() ?>"><div id="elh_view_delivery_registered_PatientID" class="view_delivery_registered_PatientID"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_delivery_registered->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->PatientID) ?>',1);"><div id="elh_view_delivery_registered_PatientID" class="view_delivery_registered_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_delivery_registered->mobile_no->headerCellClass() ?>"><div id="elh_view_delivery_registered_mobile_no" class="view_delivery_registered_mobile_no"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_delivery_registered->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->mobile_no) ?>',1);"><div id="elh_view_delivery_registered_mobile_no" class="view_delivery_registered_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->street->Visible) { // street ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_delivery_registered->street->headerCellClass() ?>"><div id="elh_view_delivery_registered_street" class="view_delivery_registered_street"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_delivery_registered->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->street) ?>',1);"><div id="elh_view_delivery_registered_street" class="view_delivery_registered_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->town->Visible) { // town ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_delivery_registered->town->headerCellClass() ?>"><div id="elh_view_delivery_registered_town" class="view_delivery_registered_town"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_delivery_registered->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->town) ?>',1);"><div id="elh_view_delivery_registered_town" class="view_delivery_registered_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->DeliveryRegistered) == "") { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $view_delivery_registered->DeliveryRegistered->headerCellClass() ?>"><div id="elh_view_delivery_registered_DeliveryRegistered" class="view_delivery_registered_DeliveryRegistered"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->DeliveryRegistered->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $view_delivery_registered->DeliveryRegistered->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->DeliveryRegistered) ?>',1);"><div id="elh_view_delivery_registered_DeliveryRegistered" class="view_delivery_registered_DeliveryRegistered">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->DeliveryRegistered->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->DeliveryRegistered->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->DeliveryRegistered->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->LMP->Visible) { // LMP ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $view_delivery_registered->LMP->headerCellClass() ?>"><div id="elh_view_delivery_registered_LMP" class="view_delivery_registered_LMP"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $view_delivery_registered->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->LMP) ?>',1);"><div id="elh_view_delivery_registered_LMP" class="view_delivery_registered_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->EDD->Visible) { // EDD ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->EDD) == "") { ?>
		<th data-name="EDD" class="<?php echo $view_delivery_registered->EDD->headerCellClass() ?>"><div id="elh_view_delivery_registered_EDD" class="view_delivery_registered_EDD"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->EDD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD" class="<?php echo $view_delivery_registered->EDD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->EDD) ?>',1);"><div id="elh_view_delivery_registered_EDD" class="view_delivery_registered_EDD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->EDD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->EDD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->EDD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_delivery_registered->createdUserName->headerCellClass() ?>"><div id="elh_view_delivery_registered_createdUserName" class="view_delivery_registered_createdUserName"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_delivery_registered->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->createdUserName) ?>',1);"><div id="elh_view_delivery_registered_createdUserName" class="view_delivery_registered_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->createdUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->createdUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_delivery_registered->HospID->Visible) { // HospID ?>
	<?php if ($view_delivery_registered->sortUrl($view_delivery_registered->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_delivery_registered->HospID->headerCellClass() ?>"><div id="elh_view_delivery_registered_HospID" class="view_delivery_registered_HospID"><div class="ew-table-header-caption"><?php echo $view_delivery_registered->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_delivery_registered->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_delivery_registered->SortUrl($view_delivery_registered->HospID) ?>',1);"><div id="elh_view_delivery_registered_HospID" class="view_delivery_registered_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_delivery_registered->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_delivery_registered->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_delivery_registered->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_delivery_registered_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_delivery_registered->ExportAll && $view_delivery_registered->isExport()) {
	$view_delivery_registered_list->StopRec = $view_delivery_registered_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_delivery_registered_list->TotalRecs > $view_delivery_registered_list->StartRec + $view_delivery_registered_list->DisplayRecs - 1)
		$view_delivery_registered_list->StopRec = $view_delivery_registered_list->StartRec + $view_delivery_registered_list->DisplayRecs - 1;
	else
		$view_delivery_registered_list->StopRec = $view_delivery_registered_list->TotalRecs;
}
$view_delivery_registered_list->RecCnt = $view_delivery_registered_list->StartRec - 1;
if ($view_delivery_registered_list->Recordset && !$view_delivery_registered_list->Recordset->EOF) {
	$view_delivery_registered_list->Recordset->moveFirst();
	$selectLimit = $view_delivery_registered_list->UseSelectLimit;
	if (!$selectLimit && $view_delivery_registered_list->StartRec > 1)
		$view_delivery_registered_list->Recordset->move($view_delivery_registered_list->StartRec - 1);
} elseif (!$view_delivery_registered->AllowAddDeleteRow && $view_delivery_registered_list->StopRec == 0) {
	$view_delivery_registered_list->StopRec = $view_delivery_registered->GridAddRowCount;
}

// Initialize aggregate
$view_delivery_registered->RowType = ROWTYPE_AGGREGATEINIT;
$view_delivery_registered->resetAttributes();
$view_delivery_registered_list->renderRow();
while ($view_delivery_registered_list->RecCnt < $view_delivery_registered_list->StopRec) {
	$view_delivery_registered_list->RecCnt++;
	if ($view_delivery_registered_list->RecCnt >= $view_delivery_registered_list->StartRec) {
		$view_delivery_registered_list->RowCnt++;

		// Set up key count
		$view_delivery_registered_list->KeyCount = $view_delivery_registered_list->RowIndex;

		// Init row class and style
		$view_delivery_registered->resetAttributes();
		$view_delivery_registered->CssClass = "";
		if ($view_delivery_registered->isGridAdd()) {
		} else {
			$view_delivery_registered_list->loadRowValues($view_delivery_registered_list->Recordset); // Load row values
		}
		$view_delivery_registered->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_delivery_registered->RowAttrs = array_merge($view_delivery_registered->RowAttrs, array('data-rowindex'=>$view_delivery_registered_list->RowCnt, 'id'=>'r' . $view_delivery_registered_list->RowCnt . '_view_delivery_registered', 'data-rowtype'=>$view_delivery_registered->RowType));

		// Render row
		$view_delivery_registered_list->renderRow();

		// Render list options
		$view_delivery_registered_list->renderListOptions();
?>
	<tr<?php echo $view_delivery_registered->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_delivery_registered_list->ListOptions->render("body", "left", $view_delivery_registered_list->RowCnt);
?>
	<?php if ($view_delivery_registered->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_delivery_registered->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_first_name" class="view_delivery_registered_first_name">
<span<?php echo $view_delivery_registered->first_name->viewAttributes() ?>>
<?php echo $view_delivery_registered->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_delivery_registered->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_PatientID" class="view_delivery_registered_PatientID">
<span<?php echo $view_delivery_registered->PatientID->viewAttributes() ?>>
<?php echo $view_delivery_registered->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_delivery_registered->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_mobile_no" class="view_delivery_registered_mobile_no">
<span<?php echo $view_delivery_registered->mobile_no->viewAttributes() ?>>
<?php echo $view_delivery_registered->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->street->Visible) { // street ?>
		<td data-name="street"<?php echo $view_delivery_registered->street->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_street" class="view_delivery_registered_street">
<span<?php echo $view_delivery_registered->street->viewAttributes() ?>>
<?php echo $view_delivery_registered->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->town->Visible) { // town ?>
		<td data-name="town"<?php echo $view_delivery_registered->town->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_town" class="view_delivery_registered_town">
<span<?php echo $view_delivery_registered->town->viewAttributes() ?>>
<?php echo $view_delivery_registered->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td data-name="DeliveryRegistered"<?php echo $view_delivery_registered->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_DeliveryRegistered" class="view_delivery_registered_DeliveryRegistered">
<span<?php echo $view_delivery_registered->DeliveryRegistered->viewAttributes() ?>>
<?php echo $view_delivery_registered->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $view_delivery_registered->LMP->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_LMP" class="view_delivery_registered_LMP">
<span<?php echo $view_delivery_registered->LMP->viewAttributes() ?>>
<?php echo $view_delivery_registered->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->EDD->Visible) { // EDD ?>
		<td data-name="EDD"<?php echo $view_delivery_registered->EDD->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_EDD" class="view_delivery_registered_EDD">
<span<?php echo $view_delivery_registered->EDD->viewAttributes() ?>>
<?php echo $view_delivery_registered->EDD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName"<?php echo $view_delivery_registered->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_createdUserName" class="view_delivery_registered_createdUserName">
<span<?php echo $view_delivery_registered->createdUserName->viewAttributes() ?>>
<?php echo $view_delivery_registered->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_delivery_registered->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_delivery_registered->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_delivery_registered_list->RowCnt ?>_view_delivery_registered_HospID" class="view_delivery_registered_HospID">
<span<?php echo $view_delivery_registered->HospID->viewAttributes() ?>>
<?php echo $view_delivery_registered->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_delivery_registered_list->ListOptions->render("body", "right", $view_delivery_registered_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_delivery_registered->isGridAdd())
		$view_delivery_registered_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_delivery_registered->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_delivery_registered_list->Recordset)
	$view_delivery_registered_list->Recordset->Close();
?>
<?php if (!$view_delivery_registered->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_delivery_registered->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_delivery_registered_list->Pager)) $view_delivery_registered_list->Pager = new NumericPager($view_delivery_registered_list->StartRec, $view_delivery_registered_list->DisplayRecs, $view_delivery_registered_list->TotalRecs, $view_delivery_registered_list->RecRange, $view_delivery_registered_list->AutoHidePager) ?>
<?php if ($view_delivery_registered_list->Pager->RecordCount > 0 && $view_delivery_registered_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_delivery_registered_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_delivery_registered_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_delivery_registered_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_delivery_registered_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_delivery_registered_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_delivery_registered_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_delivery_registered_list->pageUrl() ?>start=<?php echo $view_delivery_registered_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_delivery_registered_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_delivery_registered_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_delivery_registered_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_delivery_registered_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_delivery_registered_list->TotalRecs > 0 && (!$view_delivery_registered_list->AutoHidePageSizeSelector || $view_delivery_registered_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_delivery_registered">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_delivery_registered_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_delivery_registered_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_delivery_registered_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_delivery_registered_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_delivery_registered_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_delivery_registered_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_delivery_registered->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_delivery_registered_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_delivery_registered_list->TotalRecs == 0 && !$view_delivery_registered->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_delivery_registered_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_delivery_registered_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_delivery_registered->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_delivery_registered->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_delivery_registered", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_delivery_registered_list->terminate();
?>