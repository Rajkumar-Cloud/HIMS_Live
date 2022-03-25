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
$view_dashboard_summary_payment_mode_list = new view_dashboard_summary_payment_mode_list();

// Run the page
$view_dashboard_summary_payment_mode_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_summary_payment_mode_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_dashboard_summary_payment_mode->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_dashboard_summary_payment_modelist = currentForm = new ew.Form("fview_dashboard_summary_payment_modelist", "list");
fview_dashboard_summary_payment_modelist.formKeyCountName = '<?php echo $view_dashboard_summary_payment_mode_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_dashboard_summary_payment_modelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_summary_payment_modelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_summary_payment_modelist.lists["x_HospID"] = <?php echo $view_dashboard_summary_payment_mode_list->HospID->Lookup->toClientList() ?>;
fview_dashboard_summary_payment_modelist.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_summary_payment_mode_list->HospID->lookupOptions()) ?>;
fview_dashboard_summary_payment_modelist.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_dashboard_summary_payment_modelistsrch = currentSearchForm = new ew.Form("fview_dashboard_summary_payment_modelistsrch");

// Validate function for search
fview_dashboard_summary_payment_modelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_summary_payment_mode->createddate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_summary_payment_modelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_summary_payment_modelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_dashboard_summary_payment_modelistsrch.filterList = <?php echo $view_dashboard_summary_payment_mode_list->getFilterList() ?>;
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
<?php if (!$view_dashboard_summary_payment_mode->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_summary_payment_mode_list->TotalRecs > 0 && $view_dashboard_summary_payment_mode_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_summary_payment_mode_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_summary_payment_mode_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_summary_payment_mode_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_summary_payment_mode_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_dashboard_summary_payment_mode_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_summary_payment_mode->isExport() && !$view_dashboard_summary_payment_mode->CurrentAction) { ?>
<form name="fview_dashboard_summary_payment_modelistsrch" id="fview_dashboard_summary_payment_modelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_dashboard_summary_payment_mode_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_summary_payment_modelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_summary_payment_mode">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_dashboard_summary_payment_mode_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_dashboard_summary_payment_mode->RowType = ROWTYPE_SEARCH;

// Render row
$view_dashboard_summary_payment_mode->resetAttributes();
$view_dashboard_summary_payment_mode_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_dashboard_summary_payment_mode->createddate->Visible) { // createddate ?>
	<div id="xsc_createddate" class="ew-cell form-group">
		<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $view_dashboard_summary_payment_mode->createddate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddate" id="z_createddate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_summary_payment_mode->createddate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_dashboard_summary_payment_mode" data-field="x_createddate" data-format="7" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_payment_mode->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_payment_mode->createddate->EditValue ?>"<?php echo $view_dashboard_summary_payment_mode->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_payment_mode->createddate->ReadOnly && !$view_dashboard_summary_payment_mode->createddate->Disabled && !isset($view_dashboard_summary_payment_mode->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_payment_mode->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_summary_payment_modelistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddate style="d-none"">
<input type="text" data-table="view_dashboard_summary_payment_mode" data-field="x_createddate" data-format="7" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_summary_payment_mode->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_summary_payment_mode->createddate->EditValue2 ?>"<?php echo $view_dashboard_summary_payment_mode->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_summary_payment_mode->createddate->ReadOnly && !$view_dashboard_summary_payment_mode->createddate->Disabled && !isset($view_dashboard_summary_payment_mode->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_summary_payment_mode->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_summary_payment_modelistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_summary_payment_mode_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_dashboard_summary_payment_mode_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_summary_payment_mode_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_summary_payment_mode_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_payment_mode_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_payment_mode_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_summary_payment_mode_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_summary_payment_mode_list->showPageHeader(); ?>
<?php
$view_dashboard_summary_payment_mode_list->showMessage();
?>
<?php if ($view_dashboard_summary_payment_mode_list->TotalRecs > 0 || $view_dashboard_summary_payment_mode->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_summary_payment_mode_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_summary_payment_mode">
<?php if (!$view_dashboard_summary_payment_mode->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_summary_payment_mode->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_summary_payment_mode_list->Pager)) $view_dashboard_summary_payment_mode_list->Pager = new NumericPager($view_dashboard_summary_payment_mode_list->StartRec, $view_dashboard_summary_payment_mode_list->DisplayRecs, $view_dashboard_summary_payment_mode_list->TotalRecs, $view_dashboard_summary_payment_mode_list->RecRange, $view_dashboard_summary_payment_mode_list->AutoHidePager) ?>
<?php if ($view_dashboard_summary_payment_mode_list->Pager->RecordCount > 0 && $view_dashboard_summary_payment_mode_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_summary_payment_mode_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_summary_payment_mode_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_summary_payment_mode_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_summary_payment_mode_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_summary_payment_mode_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->TotalRecs > 0 && (!$view_dashboard_summary_payment_mode_list->AutoHidePageSizeSelector || $view_dashboard_summary_payment_mode_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_summary_payment_mode">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_summary_payment_mode->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_payment_mode_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_summary_payment_modelist" id="fview_dashboard_summary_payment_modelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_summary_payment_mode_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_summary_payment_mode_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_summary_payment_mode">
<div id="gmp_view_dashboard_summary_payment_mode" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_summary_payment_mode_list->TotalRecs > 0 || $view_dashboard_summary_payment_mode->isGridEdit()) { ?>
<table id="tbl_view_dashboard_summary_payment_modelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_summary_payment_mode_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_summary_payment_mode_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_summary_payment_mode_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_summary_payment_mode->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_payment_mode->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_createddate" class="view_dashboard_summary_payment_mode_createddate"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_summary_payment_mode->createddate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->createddate) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_createddate" class="view_dashboard_summary_payment_mode_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->createddate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->createddate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_payment_mode->UserName->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_UserName" class="view_dashboard_summary_payment_mode_UserName"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_summary_payment_mode->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->UserName) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_UserName" class="view_dashboard_summary_payment_mode_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CARD->Visible) { // CARD ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->CARD) == "") { ?>
		<th data-name="CARD" class="<?php echo $view_dashboard_summary_payment_mode->CARD->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CARD" class="view_dashboard_summary_payment_mode_CARD"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CARD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CARD" class="<?php echo $view_dashboard_summary_payment_mode->CARD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->CARD) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_CARD" class="view_dashboard_summary_payment_mode_CARD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CARD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->CARD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->CARD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CASH->Visible) { // CASH ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->CASH) == "") { ?>
		<th data-name="CASH" class="<?php echo $view_dashboard_summary_payment_mode->CASH->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CASH" class="view_dashboard_summary_payment_mode_CASH"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CASH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASH" class="<?php echo $view_dashboard_summary_payment_mode->CASH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->CASH) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_CASH" class="view_dashboard_summary_payment_mode_CASH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CASH->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->CASH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->CASH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->NEFT->Visible) { // NEFT ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->NEFT) == "") { ?>
		<th data-name="NEFT" class="<?php echo $view_dashboard_summary_payment_mode->NEFT->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_NEFT" class="view_dashboard_summary_payment_mode_NEFT"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->NEFT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEFT" class="<?php echo $view_dashboard_summary_payment_mode->NEFT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->NEFT) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_NEFT" class="view_dashboard_summary_payment_mode_NEFT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->NEFT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->NEFT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->NEFT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->PAYTM->Visible) { // PAYTM ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $view_dashboard_summary_payment_mode->PAYTM->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_PAYTM" class="view_dashboard_summary_payment_mode_PAYTM"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->PAYTM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $view_dashboard_summary_payment_mode->PAYTM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->PAYTM) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_PAYTM" class="view_dashboard_summary_payment_mode_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->PAYTM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->PAYTM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CHEQUE->Visible) { // CHEQUE ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->CHEQUE) == "") { ?>
		<th data-name="CHEQUE" class="<?php echo $view_dashboard_summary_payment_mode->CHEQUE->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CHEQUE" class="view_dashboard_summary_payment_mode_CHEQUE"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CHEQUE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CHEQUE" class="<?php echo $view_dashboard_summary_payment_mode->CHEQUE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->CHEQUE) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_CHEQUE" class="view_dashboard_summary_payment_mode_CHEQUE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CHEQUE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->CHEQUE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->CHEQUE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->RTGS->Visible) { // RTGS ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $view_dashboard_summary_payment_mode->RTGS->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_RTGS" class="view_dashboard_summary_payment_mode_RTGS"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->RTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $view_dashboard_summary_payment_mode->RTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->RTGS) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_RTGS" class="view_dashboard_summary_payment_mode_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->RTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->RTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->NotSelected->Visible) { // NotSelected ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->NotSelected) == "") { ?>
		<th data-name="NotSelected" class="<?php echo $view_dashboard_summary_payment_mode->NotSelected->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_NotSelected" class="view_dashboard_summary_payment_mode_NotSelected"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->NotSelected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotSelected" class="<?php echo $view_dashboard_summary_payment_mode->NotSelected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->NotSelected) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_NotSelected" class="view_dashboard_summary_payment_mode_NotSelected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->NotSelected->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->NotSelected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->NotSelected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->Total->Visible) { // Total ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $view_dashboard_summary_payment_mode->Total->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_Total" class="view_dashboard_summary_payment_mode_Total"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $view_dashboard_summary_payment_mode->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->Total) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_Total" class="view_dashboard_summary_payment_mode_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->REFUND->Visible) { // REFUND ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->REFUND) == "") { ?>
		<th data-name="REFUND" class="<?php echo $view_dashboard_summary_payment_mode->REFUND->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_REFUND" class="view_dashboard_summary_payment_mode_REFUND"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->REFUND->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REFUND" class="<?php echo $view_dashboard_summary_payment_mode->REFUND->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->REFUND) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_REFUND" class="view_dashboard_summary_payment_mode_REFUND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->REFUND->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->REFUND->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->REFUND->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CANCEL->Visible) { // CANCEL ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->CANCEL) == "") { ?>
		<th data-name="CANCEL" class="<?php echo $view_dashboard_summary_payment_mode->CANCEL->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CANCEL" class="view_dashboard_summary_payment_mode_CANCEL"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CANCEL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CANCEL" class="<?php echo $view_dashboard_summary_payment_mode->CANCEL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->CANCEL) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_CANCEL" class="view_dashboard_summary_payment_mode_CANCEL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->CANCEL->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->CANCEL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->CANCEL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_payment_mode->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_HospID" class="view_dashboard_summary_payment_mode_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_summary_payment_mode->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->HospID) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_HospID" class="view_dashboard_summary_payment_mode_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_summary_payment_mode->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_BillType" class="view_dashboard_summary_payment_mode_BillType"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_summary_payment_mode->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->BillType) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_BillType" class="view_dashboard_summary_payment_mode_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->AdjAdvance->Visible) { // AdjAdvance ?>
	<?php if ($view_dashboard_summary_payment_mode->sortUrl($view_dashboard_summary_payment_mode->AdjAdvance) == "") { ?>
		<th data-name="AdjAdvance" class="<?php echo $view_dashboard_summary_payment_mode->AdjAdvance->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_AdjAdvance" class="view_dashboard_summary_payment_mode_AdjAdvance"><div class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->AdjAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdjAdvance" class="<?php echo $view_dashboard_summary_payment_mode->AdjAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_dashboard_summary_payment_mode->SortUrl($view_dashboard_summary_payment_mode->AdjAdvance) ?>',1);"><div id="elh_view_dashboard_summary_payment_mode_AdjAdvance" class="view_dashboard_summary_payment_mode_AdjAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_summary_payment_mode->AdjAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_summary_payment_mode->AdjAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_summary_payment_mode->AdjAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_summary_payment_mode_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_summary_payment_mode->ExportAll && $view_dashboard_summary_payment_mode->isExport()) {
	$view_dashboard_summary_payment_mode_list->StopRec = $view_dashboard_summary_payment_mode_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_dashboard_summary_payment_mode_list->TotalRecs > $view_dashboard_summary_payment_mode_list->StartRec + $view_dashboard_summary_payment_mode_list->DisplayRecs - 1)
		$view_dashboard_summary_payment_mode_list->StopRec = $view_dashboard_summary_payment_mode_list->StartRec + $view_dashboard_summary_payment_mode_list->DisplayRecs - 1;
	else
		$view_dashboard_summary_payment_mode_list->StopRec = $view_dashboard_summary_payment_mode_list->TotalRecs;
}
$view_dashboard_summary_payment_mode_list->RecCnt = $view_dashboard_summary_payment_mode_list->StartRec - 1;
if ($view_dashboard_summary_payment_mode_list->Recordset && !$view_dashboard_summary_payment_mode_list->Recordset->EOF) {
	$view_dashboard_summary_payment_mode_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_summary_payment_mode_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_summary_payment_mode_list->StartRec > 1)
		$view_dashboard_summary_payment_mode_list->Recordset->move($view_dashboard_summary_payment_mode_list->StartRec - 1);
} elseif (!$view_dashboard_summary_payment_mode->AllowAddDeleteRow && $view_dashboard_summary_payment_mode_list->StopRec == 0) {
	$view_dashboard_summary_payment_mode_list->StopRec = $view_dashboard_summary_payment_mode->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_summary_payment_mode->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_summary_payment_mode->resetAttributes();
$view_dashboard_summary_payment_mode_list->renderRow();
while ($view_dashboard_summary_payment_mode_list->RecCnt < $view_dashboard_summary_payment_mode_list->StopRec) {
	$view_dashboard_summary_payment_mode_list->RecCnt++;
	if ($view_dashboard_summary_payment_mode_list->RecCnt >= $view_dashboard_summary_payment_mode_list->StartRec) {
		$view_dashboard_summary_payment_mode_list->RowCnt++;

		// Set up key count
		$view_dashboard_summary_payment_mode_list->KeyCount = $view_dashboard_summary_payment_mode_list->RowIndex;

		// Init row class and style
		$view_dashboard_summary_payment_mode->resetAttributes();
		$view_dashboard_summary_payment_mode->CssClass = "";
		if ($view_dashboard_summary_payment_mode->isGridAdd()) {
		} else {
			$view_dashboard_summary_payment_mode_list->loadRowValues($view_dashboard_summary_payment_mode_list->Recordset); // Load row values
		}
		$view_dashboard_summary_payment_mode->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_summary_payment_mode->RowAttrs = array_merge($view_dashboard_summary_payment_mode->RowAttrs, array('data-rowindex'=>$view_dashboard_summary_payment_mode_list->RowCnt, 'id'=>'r' . $view_dashboard_summary_payment_mode_list->RowCnt . '_view_dashboard_summary_payment_mode', 'data-rowtype'=>$view_dashboard_summary_payment_mode->RowType));

		// Render row
		$view_dashboard_summary_payment_mode_list->renderRow();

		// Render list options
		$view_dashboard_summary_payment_mode_list->renderListOptions();
?>
	<tr<?php echo $view_dashboard_summary_payment_mode->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_summary_payment_mode_list->ListOptions->render("body", "left", $view_dashboard_summary_payment_mode_list->RowCnt);
?>
	<?php if ($view_dashboard_summary_payment_mode->createddate->Visible) { // createddate ?>
		<td data-name="createddate"<?php echo $view_dashboard_summary_payment_mode->createddate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_createddate" class="view_dashboard_summary_payment_mode_createddate">
<span<?php echo $view_dashboard_summary_payment_mode->createddate->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->createddate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_dashboard_summary_payment_mode->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_UserName" class="view_dashboard_summary_payment_mode_UserName">
<span<?php echo $view_dashboard_summary_payment_mode->UserName->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->CARD->Visible) { // CARD ?>
		<td data-name="CARD"<?php echo $view_dashboard_summary_payment_mode->CARD->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_CARD" class="view_dashboard_summary_payment_mode_CARD">
<span<?php echo $view_dashboard_summary_payment_mode->CARD->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->CARD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->CASH->Visible) { // CASH ?>
		<td data-name="CASH"<?php echo $view_dashboard_summary_payment_mode->CASH->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_CASH" class="view_dashboard_summary_payment_mode_CASH">
<span<?php echo $view_dashboard_summary_payment_mode->CASH->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->CASH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->NEFT->Visible) { // NEFT ?>
		<td data-name="NEFT"<?php echo $view_dashboard_summary_payment_mode->NEFT->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_NEFT" class="view_dashboard_summary_payment_mode_NEFT">
<span<?php echo $view_dashboard_summary_payment_mode->NEFT->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->NEFT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM"<?php echo $view_dashboard_summary_payment_mode->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_PAYTM" class="view_dashboard_summary_payment_mode_PAYTM">
<span<?php echo $view_dashboard_summary_payment_mode->PAYTM->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->PAYTM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->CHEQUE->Visible) { // CHEQUE ?>
		<td data-name="CHEQUE"<?php echo $view_dashboard_summary_payment_mode->CHEQUE->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_CHEQUE" class="view_dashboard_summary_payment_mode_CHEQUE">
<span<?php echo $view_dashboard_summary_payment_mode->CHEQUE->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->CHEQUE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS"<?php echo $view_dashboard_summary_payment_mode->RTGS->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_RTGS" class="view_dashboard_summary_payment_mode_RTGS">
<span<?php echo $view_dashboard_summary_payment_mode->RTGS->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->RTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->NotSelected->Visible) { // NotSelected ?>
		<td data-name="NotSelected"<?php echo $view_dashboard_summary_payment_mode->NotSelected->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_NotSelected" class="view_dashboard_summary_payment_mode_NotSelected">
<span<?php echo $view_dashboard_summary_payment_mode->NotSelected->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->NotSelected->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $view_dashboard_summary_payment_mode->Total->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_Total" class="view_dashboard_summary_payment_mode_Total">
<span<?php echo $view_dashboard_summary_payment_mode->Total->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->REFUND->Visible) { // REFUND ?>
		<td data-name="REFUND"<?php echo $view_dashboard_summary_payment_mode->REFUND->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_REFUND" class="view_dashboard_summary_payment_mode_REFUND">
<span<?php echo $view_dashboard_summary_payment_mode->REFUND->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->REFUND->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->CANCEL->Visible) { // CANCEL ?>
		<td data-name="CANCEL"<?php echo $view_dashboard_summary_payment_mode->CANCEL->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_CANCEL" class="view_dashboard_summary_payment_mode_CANCEL">
<span<?php echo $view_dashboard_summary_payment_mode->CANCEL->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->CANCEL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_summary_payment_mode->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_HospID" class="view_dashboard_summary_payment_mode_HospID">
<span<?php echo $view_dashboard_summary_payment_mode->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_dashboard_summary_payment_mode->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_BillType" class="view_dashboard_summary_payment_mode_BillType">
<span<?php echo $view_dashboard_summary_payment_mode->BillType->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode->AdjAdvance->Visible) { // AdjAdvance ?>
		<td data-name="AdjAdvance"<?php echo $view_dashboard_summary_payment_mode->AdjAdvance->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_summary_payment_mode_list->RowCnt ?>_view_dashboard_summary_payment_mode_AdjAdvance" class="view_dashboard_summary_payment_mode_AdjAdvance">
<span<?php echo $view_dashboard_summary_payment_mode->AdjAdvance->viewAttributes() ?>>
<?php echo $view_dashboard_summary_payment_mode->AdjAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_summary_payment_mode_list->ListOptions->render("body", "right", $view_dashboard_summary_payment_mode_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_summary_payment_mode->isGridAdd())
		$view_dashboard_summary_payment_mode_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_dashboard_summary_payment_mode->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_summary_payment_mode_list->Recordset)
	$view_dashboard_summary_payment_mode_list->Recordset->Close();
?>
<?php if (!$view_dashboard_summary_payment_mode->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_summary_payment_mode->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_dashboard_summary_payment_mode_list->Pager)) $view_dashboard_summary_payment_mode_list->Pager = new NumericPager($view_dashboard_summary_payment_mode_list->StartRec, $view_dashboard_summary_payment_mode_list->DisplayRecs, $view_dashboard_summary_payment_mode_list->TotalRecs, $view_dashboard_summary_payment_mode_list->RecRange, $view_dashboard_summary_payment_mode_list->AutoHidePager) ?>
<?php if ($view_dashboard_summary_payment_mode_list->Pager->RecordCount > 0 && $view_dashboard_summary_payment_mode_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_dashboard_summary_payment_mode_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_dashboard_summary_payment_mode_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_dashboard_summary_payment_mode_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_dashboard_summary_payment_mode_list->pageUrl() ?>start=<?php echo $view_dashboard_summary_payment_mode_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_summary_payment_mode_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_summary_payment_mode_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_summary_payment_mode_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->TotalRecs > 0 && (!$view_dashboard_summary_payment_mode_list->AutoHidePageSizeSelector || $view_dashboard_summary_payment_mode_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_dashboard_summary_payment_mode">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_dashboard_summary_payment_mode_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_dashboard_summary_payment_mode->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_payment_mode_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode_list->TotalRecs == 0 && !$view_dashboard_summary_payment_mode->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_summary_payment_mode_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_summary_payment_mode_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_summary_payment_mode->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_dashboard_summary_payment_mode->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_summary_payment_mode", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_summary_payment_mode_list->terminate();
?>