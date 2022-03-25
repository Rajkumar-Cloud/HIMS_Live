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
$view_till_search_view_revenew_list = new view_till_search_view_revenew_list();

// Run the page
$view_till_search_view_revenew_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_till_search_view_revenew_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_till_search_view_revenew->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_till_search_view_revenewlist = currentForm = new ew.Form("fview_till_search_view_revenewlist", "list");
fview_till_search_view_revenewlist.formKeyCountName = '<?php echo $view_till_search_view_revenew_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_till_search_view_revenewlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_till_search_view_revenewlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_till_search_view_revenewlistsrch = currentSearchForm = new ew.Form("fview_till_search_view_revenewlistsrch");

// Validate function for search
fview_till_search_view_revenewlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_DepositDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_till_search_view_revenew->DepositDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_till_search_view_revenewlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_till_search_view_revenewlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_till_search_view_revenewlistsrch.filterList = <?php echo $view_till_search_view_revenew_list->getFilterList() ?>;
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
<?php if (!$view_till_search_view_revenew->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_till_search_view_revenew_list->TotalRecs > 0 && $view_till_search_view_revenew_list->ExportOptions->visible()) { ?>
<?php $view_till_search_view_revenew_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_view_revenew_list->ImportOptions->visible()) { ?>
<?php $view_till_search_view_revenew_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_view_revenew_list->SearchOptions->visible()) { ?>
<?php $view_till_search_view_revenew_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_view_revenew_list->FilterOptions->visible()) { ?>
<?php $view_till_search_view_revenew_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_till_search_view_revenew_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_till_search_view_revenew->isExport() && !$view_till_search_view_revenew->CurrentAction) { ?>
<form name="fview_till_search_view_revenewlistsrch" id="fview_till_search_view_revenewlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_till_search_view_revenew_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_till_search_view_revenewlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_till_search_view_revenew">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_till_search_view_revenew_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_till_search_view_revenew->RowType = ROWTYPE_SEARCH;

// Render row
$view_till_search_view_revenew->resetAttributes();
$view_till_search_view_revenew_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_till_search_view_revenew->DepositDate->Visible) { // DepositDate ?>
	<div id="xsc_DepositDate" class="ew-cell form-group">
		<label for="x_DepositDate" class="ew-search-caption ew-label"><?php echo $view_till_search_view_revenew->DepositDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_DepositDate" id="z_DepositDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_till_search_view_revenew->DepositDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_till_search_view_revenew" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?php echo HtmlEncode($view_till_search_view_revenew->DepositDate->getPlaceHolder()) ?>" value="<?php echo $view_till_search_view_revenew->DepositDate->EditValue ?>"<?php echo $view_till_search_view_revenew->DepositDate->editAttributes() ?>>
<?php if (!$view_till_search_view_revenew->DepositDate->ReadOnly && !$view_till_search_view_revenew->DepositDate->Disabled && !isset($view_till_search_view_revenew->DepositDate->EditAttrs["readonly"]) && !isset($view_till_search_view_revenew->DepositDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_till_search_view_revenewlistsrch", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_DepositDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_DepositDate style="d-none"">
<input type="text" data-table="view_till_search_view_revenew" data-field="x_DepositDate" data-format="7" name="y_DepositDate" id="y_DepositDate" placeholder="<?php echo HtmlEncode($view_till_search_view_revenew->DepositDate->getPlaceHolder()) ?>" value="<?php echo $view_till_search_view_revenew->DepositDate->EditValue2 ?>"<?php echo $view_till_search_view_revenew->DepositDate->editAttributes() ?>>
<?php if (!$view_till_search_view_revenew->DepositDate->ReadOnly && !$view_till_search_view_revenew->DepositDate->Disabled && !isset($view_till_search_view_revenew->DepositDate->EditAttrs["readonly"]) && !isset($view_till_search_view_revenew->DepositDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_till_search_view_revenewlistsrch", "y_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_till_search_view_revenew_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_till_search_view_revenew_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_till_search_view_revenew_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_till_search_view_revenew_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_view_revenew_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_view_revenew_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_view_revenew_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_till_search_view_revenew_list->showPageHeader(); ?>
<?php
$view_till_search_view_revenew_list->showMessage();
?>
<?php if ($view_till_search_view_revenew_list->TotalRecs > 0 || $view_till_search_view_revenew->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_till_search_view_revenew_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_till_search_view_revenew">
<?php if (!$view_till_search_view_revenew->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_till_search_view_revenew->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_till_search_view_revenew_list->Pager)) $view_till_search_view_revenew_list->Pager = new NumericPager($view_till_search_view_revenew_list->StartRec, $view_till_search_view_revenew_list->DisplayRecs, $view_till_search_view_revenew_list->TotalRecs, $view_till_search_view_revenew_list->RecRange, $view_till_search_view_revenew_list->AutoHidePager) ?>
<?php if ($view_till_search_view_revenew_list->Pager->RecordCount > 0 && $view_till_search_view_revenew_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_till_search_view_revenew_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_view_revenew_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_till_search_view_revenew_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_till_search_view_revenew_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_view_revenew_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_view_revenew_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_till_search_view_revenew_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_till_search_view_revenew_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_till_search_view_revenew_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_till_search_view_revenew_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_till_search_view_revenew_list->TotalRecs > 0 && (!$view_till_search_view_revenew_list->AutoHidePageSizeSelector || $view_till_search_view_revenew_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_till_search_view_revenew">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_till_search_view_revenew->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_till_search_view_revenew_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_till_search_view_revenewlist" id="fview_till_search_view_revenewlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_till_search_view_revenew_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_till_search_view_revenew_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_till_search_view_revenew">
<div id="gmp_view_till_search_view_revenew" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_till_search_view_revenew_list->TotalRecs > 0 || $view_till_search_view_revenew->isGridEdit()) { ?>
<table id="tbl_view_till_search_view_revenewlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_till_search_view_revenew_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_till_search_view_revenew_list->renderListOptions();

// Render list options (header, left)
$view_till_search_view_revenew_list->ListOptions->render("header", "left");
?>
<?php if ($view_till_search_view_revenew->id->Visible) { // id ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_till_search_view_revenew->id->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_id" class="view_till_search_view_revenew_id"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_till_search_view_revenew->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->id) ?>',1);"><div id="elh_view_till_search_view_revenew_id" class="view_till_search_view_revenew_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->DepositDate->Visible) { // DepositDate ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->DepositDate) == "") { ?>
		<th data-name="DepositDate" class="<?php echo $view_till_search_view_revenew->DepositDate->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_DepositDate" class="view_till_search_view_revenew_DepositDate"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->DepositDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepositDate" class="<?php echo $view_till_search_view_revenew->DepositDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->DepositDate) ?>',1);"><div id="elh_view_till_search_view_revenew_DepositDate" class="view_till_search_view_revenew_DepositDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->DepositDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->DepositDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->DepositDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $view_till_search_view_revenew->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_CreatedDateTime" class="view_till_search_view_revenew_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $view_till_search_view_revenew->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->CreatedDateTime) ?>',1);"><div id="elh_view_till_search_view_revenew_CreatedDateTime" class="view_till_search_view_revenew_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->CreatedUserName->Visible) { // CreatedUserName ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->CreatedUserName) == "") { ?>
		<th data-name="CreatedUserName" class="<?php echo $view_till_search_view_revenew->CreatedUserName->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_CreatedUserName" class="view_till_search_view_revenew_CreatedUserName"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->CreatedUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedUserName" class="<?php echo $view_till_search_view_revenew->CreatedUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->CreatedUserName) ?>',1);"><div id="elh_view_till_search_view_revenew_CreatedUserName" class="view_till_search_view_revenew_CreatedUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->CreatedUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->CreatedUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->CreatedUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->TransferTo->Visible) { // TransferTo ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->TransferTo) == "") { ?>
		<th data-name="TransferTo" class="<?php echo $view_till_search_view_revenew->TransferTo->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TransferTo" class="view_till_search_view_revenew_TransferTo"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TransferTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferTo" class="<?php echo $view_till_search_view_revenew->TransferTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->TransferTo) ?>',1);"><div id="elh_view_till_search_view_revenew_TransferTo" class="view_till_search_view_revenew_TransferTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TransferTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->TransferTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->TransferTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->OpeningBalance->Visible) { // OpeningBalance ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->OpeningBalance) == "") { ?>
		<th data-name="OpeningBalance" class="<?php echo $view_till_search_view_revenew->OpeningBalance->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_OpeningBalance" class="view_till_search_view_revenew_OpeningBalance"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->OpeningBalance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningBalance" class="<?php echo $view_till_search_view_revenew->OpeningBalance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->OpeningBalance) ?>',1);"><div id="elh_view_till_search_view_revenew_OpeningBalance" class="view_till_search_view_revenew_OpeningBalance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->OpeningBalance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->OpeningBalance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->OpeningBalance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->TotalCash->Visible) { // TotalCash ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->TotalCash) == "") { ?>
		<th data-name="TotalCash" class="<?php echo $view_till_search_view_revenew->TotalCash->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TotalCash" class="view_till_search_view_revenew_TotalCash"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TotalCash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCash" class="<?php echo $view_till_search_view_revenew->TotalCash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->TotalCash) ?>',1);"><div id="elh_view_till_search_view_revenew_TotalCash" class="view_till_search_view_revenew_TotalCash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TotalCash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->TotalCash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->TotalCash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->Cheque->Visible) { // Cheque ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->Cheque) == "") { ?>
		<th data-name="Cheque" class="<?php echo $view_till_search_view_revenew->Cheque->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_Cheque" class="view_till_search_view_revenew_Cheque"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->Cheque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cheque" class="<?php echo $view_till_search_view_revenew->Cheque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->Cheque) ?>',1);"><div id="elh_view_till_search_view_revenew_Cheque" class="view_till_search_view_revenew_Cheque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->Cheque->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->Cheque->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->Cheque->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->Card->Visible) { // Card ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_till_search_view_revenew->Card->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_Card" class="view_till_search_view_revenew_Card"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_till_search_view_revenew->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->Card) ?>',1);"><div id="elh_view_till_search_view_revenew_Card" class="view_till_search_view_revenew_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->NEFTRTGS) == "") { ?>
		<th data-name="NEFTRTGS" class="<?php echo $view_till_search_view_revenew->NEFTRTGS->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_NEFTRTGS" class="view_till_search_view_revenew_NEFTRTGS"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->NEFTRTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEFTRTGS" class="<?php echo $view_till_search_view_revenew->NEFTRTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->NEFTRTGS) ?>',1);"><div id="elh_view_till_search_view_revenew_NEFTRTGS" class="view_till_search_view_revenew_NEFTRTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->NEFTRTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->NEFTRTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->NEFTRTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->RTGS->Visible) { // RTGS ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $view_till_search_view_revenew->RTGS->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_RTGS" class="view_till_search_view_revenew_RTGS"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->RTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $view_till_search_view_revenew->RTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->RTGS) ?>',1);"><div id="elh_view_till_search_view_revenew_RTGS" class="view_till_search_view_revenew_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->RTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->RTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->PAYTM->Visible) { // PAYTM ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $view_till_search_view_revenew->PAYTM->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_PAYTM" class="view_till_search_view_revenew_PAYTM"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->PAYTM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $view_till_search_view_revenew->PAYTM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->PAYTM) ?>',1);"><div id="elh_view_till_search_view_revenew_PAYTM" class="view_till_search_view_revenew_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->PAYTM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->PAYTM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->ManualCash->Visible) { // ManualCash ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->ManualCash) == "") { ?>
		<th data-name="ManualCash" class="<?php echo $view_till_search_view_revenew->ManualCash->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_ManualCash" class="view_till_search_view_revenew_ManualCash"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->ManualCash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCash" class="<?php echo $view_till_search_view_revenew->ManualCash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->ManualCash) ?>',1);"><div id="elh_view_till_search_view_revenew_ManualCash" class="view_till_search_view_revenew_ManualCash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->ManualCash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->ManualCash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->ManualCash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->ManualCard->Visible) { // ManualCard ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->ManualCard) == "") { ?>
		<th data-name="ManualCard" class="<?php echo $view_till_search_view_revenew->ManualCard->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_ManualCard" class="view_till_search_view_revenew_ManualCard"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->ManualCard->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCard" class="<?php echo $view_till_search_view_revenew->ManualCard->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->ManualCard) ?>',1);"><div id="elh_view_till_search_view_revenew_ManualCard" class="view_till_search_view_revenew_ManualCard">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->ManualCard->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->ManualCard->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->ManualCard->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->TotalCashAmount->Visible) { // TotalCashAmount ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->TotalCashAmount) == "") { ?>
		<th data-name="TotalCashAmount" class="<?php echo $view_till_search_view_revenew->TotalCashAmount->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TotalCashAmount" class="view_till_search_view_revenew_TotalCashAmount"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TotalCashAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCashAmount" class="<?php echo $view_till_search_view_revenew->TotalCashAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->TotalCashAmount) ?>',1);"><div id="elh_view_till_search_view_revenew_TotalCashAmount" class="view_till_search_view_revenew_TotalCashAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TotalCashAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->TotalCashAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->TotalCashAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_view_revenew->TotalCardAmount->Visible) { // TotalCardAmount ?>
	<?php if ($view_till_search_view_revenew->sortUrl($view_till_search_view_revenew->TotalCardAmount) == "") { ?>
		<th data-name="TotalCardAmount" class="<?php echo $view_till_search_view_revenew->TotalCardAmount->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TotalCardAmount" class="view_till_search_view_revenew_TotalCardAmount"><div class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TotalCardAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCardAmount" class="<?php echo $view_till_search_view_revenew->TotalCardAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search_view_revenew->SortUrl($view_till_search_view_revenew->TotalCardAmount) ?>',1);"><div id="elh_view_till_search_view_revenew_TotalCardAmount" class="view_till_search_view_revenew_TotalCardAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_view_revenew->TotalCardAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_view_revenew->TotalCardAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search_view_revenew->TotalCardAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_till_search_view_revenew_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_till_search_view_revenew->ExportAll && $view_till_search_view_revenew->isExport()) {
	$view_till_search_view_revenew_list->StopRec = $view_till_search_view_revenew_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_till_search_view_revenew_list->TotalRecs > $view_till_search_view_revenew_list->StartRec + $view_till_search_view_revenew_list->DisplayRecs - 1)
		$view_till_search_view_revenew_list->StopRec = $view_till_search_view_revenew_list->StartRec + $view_till_search_view_revenew_list->DisplayRecs - 1;
	else
		$view_till_search_view_revenew_list->StopRec = $view_till_search_view_revenew_list->TotalRecs;
}
$view_till_search_view_revenew_list->RecCnt = $view_till_search_view_revenew_list->StartRec - 1;
if ($view_till_search_view_revenew_list->Recordset && !$view_till_search_view_revenew_list->Recordset->EOF) {
	$view_till_search_view_revenew_list->Recordset->moveFirst();
	$selectLimit = $view_till_search_view_revenew_list->UseSelectLimit;
	if (!$selectLimit && $view_till_search_view_revenew_list->StartRec > 1)
		$view_till_search_view_revenew_list->Recordset->move($view_till_search_view_revenew_list->StartRec - 1);
} elseif (!$view_till_search_view_revenew->AllowAddDeleteRow && $view_till_search_view_revenew_list->StopRec == 0) {
	$view_till_search_view_revenew_list->StopRec = $view_till_search_view_revenew->GridAddRowCount;
}

// Initialize aggregate
$view_till_search_view_revenew->RowType = ROWTYPE_AGGREGATEINIT;
$view_till_search_view_revenew->resetAttributes();
$view_till_search_view_revenew_list->renderRow();
while ($view_till_search_view_revenew_list->RecCnt < $view_till_search_view_revenew_list->StopRec) {
	$view_till_search_view_revenew_list->RecCnt++;
	if ($view_till_search_view_revenew_list->RecCnt >= $view_till_search_view_revenew_list->StartRec) {
		$view_till_search_view_revenew_list->RowCnt++;

		// Set up key count
		$view_till_search_view_revenew_list->KeyCount = $view_till_search_view_revenew_list->RowIndex;

		// Init row class and style
		$view_till_search_view_revenew->resetAttributes();
		$view_till_search_view_revenew->CssClass = "";
		if ($view_till_search_view_revenew->isGridAdd()) {
		} else {
			$view_till_search_view_revenew_list->loadRowValues($view_till_search_view_revenew_list->Recordset); // Load row values
		}
		$view_till_search_view_revenew->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_till_search_view_revenew->RowAttrs = array_merge($view_till_search_view_revenew->RowAttrs, array('data-rowindex'=>$view_till_search_view_revenew_list->RowCnt, 'id'=>'r' . $view_till_search_view_revenew_list->RowCnt . '_view_till_search_view_revenew', 'data-rowtype'=>$view_till_search_view_revenew->RowType));

		// Render row
		$view_till_search_view_revenew_list->renderRow();

		// Render list options
		$view_till_search_view_revenew_list->renderListOptions();
?>
	<tr<?php echo $view_till_search_view_revenew->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_till_search_view_revenew_list->ListOptions->render("body", "left", $view_till_search_view_revenew_list->RowCnt);
?>
	<?php if ($view_till_search_view_revenew->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_till_search_view_revenew->id->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_id" class="view_till_search_view_revenew_id">
<span<?php echo $view_till_search_view_revenew->id->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate"<?php echo $view_till_search_view_revenew->DepositDate->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_DepositDate" class="view_till_search_view_revenew_DepositDate">
<span<?php echo $view_till_search_view_revenew->DepositDate->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->DepositDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $view_till_search_view_revenew->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_CreatedDateTime" class="view_till_search_view_revenew_CreatedDateTime">
<span<?php echo $view_till_search_view_revenew->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName"<?php echo $view_till_search_view_revenew->CreatedUserName->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_CreatedUserName" class="view_till_search_view_revenew_CreatedUserName">
<span<?php echo $view_till_search_view_revenew->CreatedUserName->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->CreatedUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo"<?php echo $view_till_search_view_revenew->TransferTo->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_TransferTo" class="view_till_search_view_revenew_TransferTo">
<span<?php echo $view_till_search_view_revenew->TransferTo->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->TransferTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance"<?php echo $view_till_search_view_revenew->OpeningBalance->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_OpeningBalance" class="view_till_search_view_revenew_OpeningBalance">
<span<?php echo $view_till_search_view_revenew->OpeningBalance->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->OpeningBalance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash"<?php echo $view_till_search_view_revenew->TotalCash->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_TotalCash" class="view_till_search_view_revenew_TotalCash">
<span<?php echo $view_till_search_view_revenew->TotalCash->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->TotalCash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque"<?php echo $view_till_search_view_revenew->Cheque->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_Cheque" class="view_till_search_view_revenew_Cheque">
<span<?php echo $view_till_search_view_revenew->Cheque->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->Cheque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_till_search_view_revenew->Card->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_Card" class="view_till_search_view_revenew_Card">
<span<?php echo $view_till_search_view_revenew->Card->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS"<?php echo $view_till_search_view_revenew->NEFTRTGS->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_NEFTRTGS" class="view_till_search_view_revenew_NEFTRTGS">
<span<?php echo $view_till_search_view_revenew->NEFTRTGS->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS"<?php echo $view_till_search_view_revenew->RTGS->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_RTGS" class="view_till_search_view_revenew_RTGS">
<span<?php echo $view_till_search_view_revenew->RTGS->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->RTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM"<?php echo $view_till_search_view_revenew->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_PAYTM" class="view_till_search_view_revenew_PAYTM">
<span<?php echo $view_till_search_view_revenew->PAYTM->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->PAYTM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->ManualCash->Visible) { // ManualCash ?>
		<td data-name="ManualCash"<?php echo $view_till_search_view_revenew->ManualCash->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_ManualCash" class="view_till_search_view_revenew_ManualCash">
<span<?php echo $view_till_search_view_revenew->ManualCash->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->ManualCash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->ManualCard->Visible) { // ManualCard ?>
		<td data-name="ManualCard"<?php echo $view_till_search_view_revenew->ManualCard->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_ManualCard" class="view_till_search_view_revenew_ManualCard">
<span<?php echo $view_till_search_view_revenew->ManualCard->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->ManualCard->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TotalCashAmount->Visible) { // TotalCashAmount ?>
		<td data-name="TotalCashAmount"<?php echo $view_till_search_view_revenew->TotalCashAmount->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_TotalCashAmount" class="view_till_search_view_revenew_TotalCashAmount">
<span<?php echo $view_till_search_view_revenew->TotalCashAmount->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->TotalCashAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TotalCardAmount->Visible) { // TotalCardAmount ?>
		<td data-name="TotalCardAmount"<?php echo $view_till_search_view_revenew->TotalCardAmount->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_view_revenew_list->RowCnt ?>_view_till_search_view_revenew_TotalCardAmount" class="view_till_search_view_revenew_TotalCardAmount">
<span<?php echo $view_till_search_view_revenew->TotalCardAmount->viewAttributes() ?>>
<?php echo $view_till_search_view_revenew->TotalCardAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_till_search_view_revenew_list->ListOptions->render("body", "right", $view_till_search_view_revenew_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_till_search_view_revenew->isGridAdd())
		$view_till_search_view_revenew_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_till_search_view_revenew->RowType = ROWTYPE_AGGREGATE;
$view_till_search_view_revenew->resetAttributes();
$view_till_search_view_revenew_list->renderRow();
?>
<?php if ($view_till_search_view_revenew_list->TotalRecs > 0 && !$view_till_search_view_revenew->isGridAdd() && !$view_till_search_view_revenew->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_till_search_view_revenew_list->renderListOptions();

// Render list options (footer, left)
$view_till_search_view_revenew_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_till_search_view_revenew->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_till_search_view_revenew->id->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_id" class="view_till_search_view_revenew_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate" class="<?php echo $view_till_search_view_revenew->DepositDate->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_DepositDate" class="view_till_search_view_revenew_DepositDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime" class="<?php echo $view_till_search_view_revenew->CreatedDateTime->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_CreatedDateTime" class="view_till_search_view_revenew_CreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName" class="<?php echo $view_till_search_view_revenew->CreatedUserName->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_CreatedUserName" class="view_till_search_view_revenew_CreatedUserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo" class="<?php echo $view_till_search_view_revenew->TransferTo->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TransferTo" class="view_till_search_view_revenew_TransferTo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance" class="<?php echo $view_till_search_view_revenew->OpeningBalance->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_OpeningBalance" class="view_till_search_view_revenew_OpeningBalance">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->OpeningBalance->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash" class="<?php echo $view_till_search_view_revenew->TotalCash->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TotalCash" class="view_till_search_view_revenew_TotalCash">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->TotalCash->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque" class="<?php echo $view_till_search_view_revenew->Cheque->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_Cheque" class="view_till_search_view_revenew_Cheque">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->Cheque->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->Card->Visible) { // Card ?>
		<td data-name="Card" class="<?php echo $view_till_search_view_revenew->Card->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_Card" class="view_till_search_view_revenew_Card">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->Card->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS" class="<?php echo $view_till_search_view_revenew->NEFTRTGS->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_NEFTRTGS" class="view_till_search_view_revenew_NEFTRTGS">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->NEFTRTGS->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" class="<?php echo $view_till_search_view_revenew->RTGS->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_RTGS" class="view_till_search_view_revenew_RTGS">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->RTGS->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" class="<?php echo $view_till_search_view_revenew->PAYTM->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_PAYTM" class="view_till_search_view_revenew_PAYTM">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->PAYTM->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->ManualCash->Visible) { // ManualCash ?>
		<td data-name="ManualCash" class="<?php echo $view_till_search_view_revenew->ManualCash->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_ManualCash" class="view_till_search_view_revenew_ManualCash">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->ManualCard->Visible) { // ManualCard ?>
		<td data-name="ManualCard" class="<?php echo $view_till_search_view_revenew->ManualCard->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_ManualCard" class="view_till_search_view_revenew_ManualCard">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TotalCashAmount->Visible) { // TotalCashAmount ?>
		<td data-name="TotalCashAmount" class="<?php echo $view_till_search_view_revenew->TotalCashAmount->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TotalCashAmount" class="view_till_search_view_revenew_TotalCashAmount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->TotalCashAmount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_till_search_view_revenew->TotalCardAmount->Visible) { // TotalCardAmount ?>
		<td data-name="TotalCardAmount" class="<?php echo $view_till_search_view_revenew->TotalCardAmount->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TotalCardAmount" class="view_till_search_view_revenew_TotalCardAmount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_till_search_view_revenew->TotalCardAmount->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_till_search_view_revenew_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_till_search_view_revenew->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_till_search_view_revenew_list->Recordset)
	$view_till_search_view_revenew_list->Recordset->Close();
?>
<?php if (!$view_till_search_view_revenew->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_till_search_view_revenew->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_till_search_view_revenew_list->Pager)) $view_till_search_view_revenew_list->Pager = new NumericPager($view_till_search_view_revenew_list->StartRec, $view_till_search_view_revenew_list->DisplayRecs, $view_till_search_view_revenew_list->TotalRecs, $view_till_search_view_revenew_list->RecRange, $view_till_search_view_revenew_list->AutoHidePager) ?>
<?php if ($view_till_search_view_revenew_list->Pager->RecordCount > 0 && $view_till_search_view_revenew_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_till_search_view_revenew_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_view_revenew_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_till_search_view_revenew_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_till_search_view_revenew_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_view_revenew_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_view_revenew_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_view_revenew_list->pageUrl() ?>start=<?php echo $view_till_search_view_revenew_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_till_search_view_revenew_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_till_search_view_revenew_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_till_search_view_revenew_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_till_search_view_revenew_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_till_search_view_revenew_list->TotalRecs > 0 && (!$view_till_search_view_revenew_list->AutoHidePageSizeSelector || $view_till_search_view_revenew_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_till_search_view_revenew">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_till_search_view_revenew_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_till_search_view_revenew->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_till_search_view_revenew_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_till_search_view_revenew_list->TotalRecs == 0 && !$view_till_search_view_revenew->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_till_search_view_revenew_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_till_search_view_revenew_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_till_search_view_revenew->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_till_search_view_revenew->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_till_search_view_revenew", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_till_search_view_revenew_list->terminate();
?>