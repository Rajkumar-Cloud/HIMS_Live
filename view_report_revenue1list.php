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
$view_report_revenue1_list = new view_report_revenue1_list();

// Run the page
$view_report_revenue1_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_report_revenue1_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_report_revenue1->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_report_revenue1list = currentForm = new ew.Form("fview_report_revenue1list", "list");
fview_report_revenue1list.formKeyCountName = '<?php echo $view_report_revenue1_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_report_revenue1list.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_report_revenue1list.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_report_revenue1listsrch = currentSearchForm = new ew.Form("fview_report_revenue1listsrch");

// Validate function for search
fview_report_revenue1listsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Date");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_report_revenue1->Date->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_report_revenue1listsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_report_revenue1listsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_report_revenue1listsrch.filterList = <?php echo $view_report_revenue1_list->getFilterList() ?>;
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
<?php if (!$view_report_revenue1->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_report_revenue1_list->TotalRecs > 0 && $view_report_revenue1_list->ExportOptions->visible()) { ?>
<?php $view_report_revenue1_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_report_revenue1_list->ImportOptions->visible()) { ?>
<?php $view_report_revenue1_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_report_revenue1_list->SearchOptions->visible()) { ?>
<?php $view_report_revenue1_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_report_revenue1_list->FilterOptions->visible()) { ?>
<?php $view_report_revenue1_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_report_revenue1_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_report_revenue1->isExport() && !$view_report_revenue1->CurrentAction) { ?>
<form name="fview_report_revenue1listsrch" id="fview_report_revenue1listsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_report_revenue1_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_report_revenue1listsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_report_revenue1">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_report_revenue1_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_report_revenue1->RowType = ROWTYPE_SEARCH;

// Render row
$view_report_revenue1->resetAttributes();
$view_report_revenue1_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_report_revenue1->Date->Visible) { // Date ?>
	<div id="xsc_Date" class="ew-cell form-group">
		<label for="x_Date" class="ew-search-caption ew-label"><?php echo $view_report_revenue1->Date->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Date" id="z_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_report_revenue1->Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_report_revenue1" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($view_report_revenue1->Date->getPlaceHolder()) ?>" value="<?php echo $view_report_revenue1->Date->EditValue ?>"<?php echo $view_report_revenue1->Date->editAttributes() ?>>
<?php if (!$view_report_revenue1->Date->ReadOnly && !$view_report_revenue1->Date->Disabled && !isset($view_report_revenue1->Date->EditAttrs["readonly"]) && !isset($view_report_revenue1->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_report_revenue1listsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_Date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Date style="d-none"">
<input type="text" data-table="view_report_revenue1" data-field="x_Date" data-format="7" name="y_Date" id="y_Date" placeholder="<?php echo HtmlEncode($view_report_revenue1->Date->getPlaceHolder()) ?>" value="<?php echo $view_report_revenue1->Date->EditValue2 ?>"<?php echo $view_report_revenue1->Date->editAttributes() ?>>
<?php if (!$view_report_revenue1->Date->ReadOnly && !$view_report_revenue1->Date->Disabled && !isset($view_report_revenue1->Date->EditAttrs["readonly"]) && !isset($view_report_revenue1->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_report_revenue1listsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_report_revenue1_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_report_revenue1_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_report_revenue1_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_report_revenue1_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_report_revenue1_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_report_revenue1_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_report_revenue1_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_report_revenue1_list->showPageHeader(); ?>
<?php
$view_report_revenue1_list->showMessage();
?>
<?php if ($view_report_revenue1_list->TotalRecs > 0 || $view_report_revenue1->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_report_revenue1_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_report_revenue1">
<?php if (!$view_report_revenue1->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_report_revenue1->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_report_revenue1_list->Pager)) $view_report_revenue1_list->Pager = new NumericPager($view_report_revenue1_list->StartRec, $view_report_revenue1_list->DisplayRecs, $view_report_revenue1_list->TotalRecs, $view_report_revenue1_list->RecRange, $view_report_revenue1_list->AutoHidePager) ?>
<?php if ($view_report_revenue1_list->Pager->RecordCount > 0 && $view_report_revenue1_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_report_revenue1_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_report_revenue1_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_report_revenue1_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_report_revenue1_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_report_revenue1_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_report_revenue1_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_report_revenue1_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_report_revenue1_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_report_revenue1_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_report_revenue1_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_report_revenue1_list->TotalRecs > 0 && (!$view_report_revenue1_list->AutoHidePageSizeSelector || $view_report_revenue1_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_report_revenue1">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_report_revenue1_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_report_revenue1_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_report_revenue1_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_report_revenue1_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_report_revenue1_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_report_revenue1_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_report_revenue1->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_report_revenue1_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_report_revenue1list" id="fview_report_revenue1list" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_report_revenue1_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_report_revenue1_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_report_revenue1">
<div id="gmp_view_report_revenue1" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_report_revenue1_list->TotalRecs > 0 || $view_report_revenue1->isGridEdit()) { ?>
<table id="tbl_view_report_revenue1list" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_report_revenue1_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_report_revenue1_list->renderListOptions();

// Render list options (header, left)
$view_report_revenue1_list->ListOptions->render("header", "left", "", "block", $view_report_revenue1->TableVar, "view_report_revenue1list");
?>
<?php if ($view_report_revenue1->Date->Visible) { // Date ?>
	<?php if ($view_report_revenue1->sortUrl($view_report_revenue1->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_report_revenue1->Date->headerCellClass() ?>"><div id="elh_view_report_revenue1_Date" class="view_report_revenue1_Date"><div class="ew-table-header-caption"><script id="tpc_view_report_revenue1_Date" class="view_report_revenue1list" type="text/html"><span><?php echo $view_report_revenue1->Date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_report_revenue1->Date->headerCellClass() ?>"><script id="tpc_view_report_revenue1_Date" class="view_report_revenue1list" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_report_revenue1->SortUrl($view_report_revenue1->Date) ?>',1);"><div id="elh_view_report_revenue1_Date" class="view_report_revenue1_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_report_revenue1->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_report_revenue1->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_report_revenue1->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_report_revenue1->BillType->Visible) { // BillType ?>
	<?php if ($view_report_revenue1->sortUrl($view_report_revenue1->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_report_revenue1->BillType->headerCellClass() ?>"><div id="elh_view_report_revenue1_BillType" class="view_report_revenue1_BillType"><div class="ew-table-header-caption"><script id="tpc_view_report_revenue1_BillType" class="view_report_revenue1list" type="text/html"><span><?php echo $view_report_revenue1->BillType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_report_revenue1->BillType->headerCellClass() ?>"><script id="tpc_view_report_revenue1_BillType" class="view_report_revenue1list" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_report_revenue1->SortUrl($view_report_revenue1->BillType) ?>',1);"><div id="elh_view_report_revenue1_BillType" class="view_report_revenue1_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_report_revenue1->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_report_revenue1->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_report_revenue1->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_report_revenue1->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($view_report_revenue1->sortUrl($view_report_revenue1->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $view_report_revenue1->TotalAmount->headerCellClass() ?>"><div id="elh_view_report_revenue1_TotalAmount" class="view_report_revenue1_TotalAmount"><div class="ew-table-header-caption"><script id="tpc_view_report_revenue1_TotalAmount" class="view_report_revenue1list" type="text/html"><span><?php echo $view_report_revenue1->TotalAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $view_report_revenue1->TotalAmount->headerCellClass() ?>"><script id="tpc_view_report_revenue1_TotalAmount" class="view_report_revenue1list" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_report_revenue1->SortUrl($view_report_revenue1->TotalAmount) ?>',1);"><div id="elh_view_report_revenue1_TotalAmount" class="view_report_revenue1_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_report_revenue1->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_report_revenue1->TotalAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_report_revenue1->TotalAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_report_revenue1->HospID->Visible) { // HospID ?>
	<?php if ($view_report_revenue1->sortUrl($view_report_revenue1->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_report_revenue1->HospID->headerCellClass() ?>"><div id="elh_view_report_revenue1_HospID" class="view_report_revenue1_HospID"><div class="ew-table-header-caption"><script id="tpc_view_report_revenue1_HospID" class="view_report_revenue1list" type="text/html"><span><?php echo $view_report_revenue1->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_report_revenue1->HospID->headerCellClass() ?>"><script id="tpc_view_report_revenue1_HospID" class="view_report_revenue1list" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_report_revenue1->SortUrl($view_report_revenue1->HospID) ?>',1);"><div id="elh_view_report_revenue1_HospID" class="view_report_revenue1_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_report_revenue1->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_report_revenue1->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_report_revenue1->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_report_revenue1_list->ListOptions->render("header", "right", "", "block", $view_report_revenue1->TableVar, "view_report_revenue1list");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_report_revenue1->ExportAll && $view_report_revenue1->isExport()) {
	$view_report_revenue1_list->StopRec = $view_report_revenue1_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_report_revenue1_list->TotalRecs > $view_report_revenue1_list->StartRec + $view_report_revenue1_list->DisplayRecs - 1)
		$view_report_revenue1_list->StopRec = $view_report_revenue1_list->StartRec + $view_report_revenue1_list->DisplayRecs - 1;
	else
		$view_report_revenue1_list->StopRec = $view_report_revenue1_list->TotalRecs;
}
$view_report_revenue1_list->RecCnt = $view_report_revenue1_list->StartRec - 1;
if ($view_report_revenue1_list->Recordset && !$view_report_revenue1_list->Recordset->EOF) {
	$view_report_revenue1_list->Recordset->moveFirst();
	$selectLimit = $view_report_revenue1_list->UseSelectLimit;
	if (!$selectLimit && $view_report_revenue1_list->StartRec > 1)
		$view_report_revenue1_list->Recordset->move($view_report_revenue1_list->StartRec - 1);
} elseif (!$view_report_revenue1->AllowAddDeleteRow && $view_report_revenue1_list->StopRec == 0) {
	$view_report_revenue1_list->StopRec = $view_report_revenue1->GridAddRowCount;
}

// Initialize aggregate
$view_report_revenue1->RowType = ROWTYPE_AGGREGATEINIT;
$view_report_revenue1->resetAttributes();
$view_report_revenue1_list->renderRow();
while ($view_report_revenue1_list->RecCnt < $view_report_revenue1_list->StopRec) {
	$view_report_revenue1_list->RecCnt++;
	if ($view_report_revenue1_list->RecCnt >= $view_report_revenue1_list->StartRec) {
		$view_report_revenue1_list->RowCnt++;

		// Set up key count
		$view_report_revenue1_list->KeyCount = $view_report_revenue1_list->RowIndex;

		// Init row class and style
		$view_report_revenue1->resetAttributes();
		$view_report_revenue1->CssClass = "";
		if ($view_report_revenue1->isGridAdd()) {
		} else {
			$view_report_revenue1_list->loadRowValues($view_report_revenue1_list->Recordset); // Load row values
		}
		$view_report_revenue1->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_report_revenue1->RowAttrs = array_merge($view_report_revenue1->RowAttrs, array('data-rowindex'=>$view_report_revenue1_list->RowCnt, 'id'=>'r' . $view_report_revenue1_list->RowCnt . '_view_report_revenue1', 'data-rowtype'=>$view_report_revenue1->RowType));

		// Render row
		$view_report_revenue1_list->renderRow();

		// Render list options
		$view_report_revenue1_list->renderListOptions();

		// Save row and cell attributes
		$view_report_revenue1_list->Attrs[$view_report_revenue1_list->RowCnt] = array("row_attrs" => $view_report_revenue1->rowAttributes(), "cell_attrs" => array());
		$view_report_revenue1_list->Attrs[$view_report_revenue1_list->RowCnt]["cell_attrs"] = $view_report_revenue1->fieldCellAttributes();
?>
	<tr<?php echo $view_report_revenue1->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_report_revenue1_list->ListOptions->render("body", "left", $view_report_revenue1_list->RowCnt, "block", $view_report_revenue1->TableVar, "view_report_revenue1list");
?>
	<?php if ($view_report_revenue1->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $view_report_revenue1->Date->cellAttributes() ?>>
<script id="tpx<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_Date" class="view_report_revenue1list" type="text/html">
<span id="el<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_Date" class="view_report_revenue1_Date">
<span<?php echo $view_report_revenue1->Date->viewAttributes() ?>>
<?php echo $view_report_revenue1->Date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_report_revenue1->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_report_revenue1->BillType->cellAttributes() ?>>
<script id="tpx<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_BillType" class="view_report_revenue1list" type="text/html">
<span id="el<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_BillType" class="view_report_revenue1_BillType">
<span<?php echo $view_report_revenue1->BillType->viewAttributes() ?>>
<?php echo $view_report_revenue1->BillType->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_report_revenue1->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount"<?php echo $view_report_revenue1->TotalAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_TotalAmount" class="view_report_revenue1list" type="text/html">
<span id="el<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_TotalAmount" class="view_report_revenue1_TotalAmount">
<span<?php echo $view_report_revenue1->TotalAmount->viewAttributes() ?>>
<?php echo $view_report_revenue1->TotalAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_report_revenue1->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_report_revenue1->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_HospID" class="view_report_revenue1list" type="text/html">
<span id="el<?php echo $view_report_revenue1_list->RowCnt ?>_view_report_revenue1_HospID" class="view_report_revenue1_HospID">
<span<?php echo $view_report_revenue1->HospID->viewAttributes() ?>>
<?php echo $view_report_revenue1->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_report_revenue1_list->ListOptions->render("body", "right", $view_report_revenue1_list->RowCnt, "block", $view_report_revenue1->TableVar, "view_report_revenue1list");
?>
	</tr>
<?php
	}
	if (!$view_report_revenue1->isGridAdd())
		$view_report_revenue1_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_report_revenue1->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_report_revenue1list" class="ew-custom-template"></div>
<script id="tpm_view_report_revenue1list" type="text/html">
<div id="ct_view_report_revenue1_list"><?php if ($view_report_revenue1_list->RowCnt > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $view_report_revenue1_list->StartRowCnt; $i <= $view_report_revenue1_list->RowCnt; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($view_report_revenue1_list->TotalRecs > 0 && !$view_report_revenue1->isGridAdd() && !$view_report_revenue1->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_report_revenue1->Date->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_report_revenue1->Date->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_report_revenue1->Date->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{

	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}
	(int)$rowid = 0;
	(int)$CARDsum = 0;
$dataPoints = array();
	$sql = "SELECT 
BillType ,sum(Amount) as TotalAmount 
	 FROM ganeshkumar_bjhims.billing_voucher
	where
createddatetime between '".$fromdte."' and '".$todate."' and HospID='".HospitalID()."' group by BillType, HospID";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr><td></td>
<td><b>BillType</b></td>
<td><b align="right">Amount</b></td></tr>';
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["BillType"];				
$CARD =  $results2[$x]["TotalAmount"];
$CARDsum = $CARDsum + $CARD;
$bbbhhh =  "'".$UserName."'";
$hhh .= '<tr id="row'.$rowid.'"><td><i  onclick="selectedItemA(this, '.$rowid.', '.$bbbhhh.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td>  <td>'.$UserName.'</td><td align="right">'.$CARD.'</td></tr>  ';
	(int)$rowid = (int)$rowid + 1;
				$product_item=array(
"label"=> $UserName ,
 "y"=> $CARD
);
array_push($dataPoints , $product_item);
}
	$sql = "SELECT 
 'PH' as BillType ,sum(Amount) as TotalAmount 
	 FROM ganeshkumar_bjhims.pharmacy_billing_voucher
	where
createddatetime between '".$fromdte."' and '".$todate."' and HospID='".HospitalID()."' group by  HospID";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["BillType"];				
$CARD =  $results2[$x]["TotalAmount"];
$CARDsum = $CARDsum + $CARD;
$hhh .= '<tr id="rowBB'.$rowid.'"><td><i  onclick="selectedItemB(this, '.$rowid.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td> <td>'.$UserName.'</td><td align="right">'.$CARD.'</td></tr>  ';
	(int)$rowid = (int)$rowid + 1;
				$product_item=array(
"label"=> $UserName ,
 "y"=> $CARD
);
array_push($dataPoints , $product_item);
}
echo $hhh;
echo '<br> Total = ' . $CARDsum;
?>
	</div>
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_report_revenue1_list->Recordset)
	$view_report_revenue1_list->Recordset->Close();
?>
<?php if (!$view_report_revenue1->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_report_revenue1->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_report_revenue1_list->Pager)) $view_report_revenue1_list->Pager = new NumericPager($view_report_revenue1_list->StartRec, $view_report_revenue1_list->DisplayRecs, $view_report_revenue1_list->TotalRecs, $view_report_revenue1_list->RecRange, $view_report_revenue1_list->AutoHidePager) ?>
<?php if ($view_report_revenue1_list->Pager->RecordCount > 0 && $view_report_revenue1_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_report_revenue1_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_report_revenue1_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_report_revenue1_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_report_revenue1_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_report_revenue1_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_report_revenue1_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_report_revenue1_list->pageUrl() ?>start=<?php echo $view_report_revenue1_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_report_revenue1_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_report_revenue1_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_report_revenue1_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_report_revenue1_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_report_revenue1_list->TotalRecs > 0 && (!$view_report_revenue1_list->AutoHidePageSizeSelector || $view_report_revenue1_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_report_revenue1">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_report_revenue1_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_report_revenue1_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_report_revenue1_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_report_revenue1_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_report_revenue1_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_report_revenue1_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_report_revenue1->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_report_revenue1_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_report_revenue1_list->TotalRecs == 0 && !$view_report_revenue1->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_report_revenue1_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_report_revenue1->Rows) ?> };
ew.applyTemplate("tpd_view_report_revenue1list", "tpm_view_report_revenue1list", "view_report_revenue1list", "<?php echo $view_report_revenue1->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_report_revenue1list th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_report_revenue1list td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_report_revenue1list_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_report_revenue1_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_report_revenue1->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
function selectedItemPharmachy(item, rowID, Services)
{

 //alert(item.id);
 // $fromdte = date("Y-m-d");
//	   $todate 

	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = Services ; // item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoPharmacy",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
					$("#ServicTableRow").empty();
		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
				var	createddate =  obj.createddate;											
			var	PatientId =  obj.PatientId;
			var	PatientName =  obj.PatientName;				
			var	Mobile =  obj.Mobile;
			var	amount =  obj.amount;
			var	Vid =  obj.id;
			var	hhh = hhh + '<tr><td><a href="pharmacy_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="pharmacy_billing_voucheredit.php?showdetail=pharmacy_pharled&id='+ Vid +'" class="fas fa-edit"></a> </td> <td>' + createddate + '</td> <td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#rowAABB' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});
}

function selectedItem(item, rowID)
{

 //alert(item.id);
 // $fromdte = date("Y-m-d");
//	   $todate 

	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoBBBBBB",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
					$("#ServicTableRow").empty();
		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
				var	createddate =  obj.createddate;											
			var	PatientId =  obj.PatientId;
			var	PatientName =  obj.PatientName;				
			var	Mobile =  obj.Mobile;
			var	amount =  obj.amount;
			var	Vid =  obj.Vid;
			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td> <td>' + createddate + '</td> <td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#rowAA' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}

function selectedItemA(item, rowID, uuusseer)
{

 //alert(item.id);
 // $fromdte = date("Y-m-d");
//	   $todate 

	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
 var ressss = uuusseer.replace('"', '');
	var Itemmed = ressss;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoArevenueAAA",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
				var $rowid = 0;
					$("#ServicTableRowMM").empty();
		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
			var	Services =  obj.Services;
			var	amount =  obj.amount;				
			var	Count =  obj.Count;
			var	hhh = hhh + '<tr id="rowAA'+$rowid+'"><td><i  onclick="selectedItem(this, ' +$rowid+' )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
		   $rowid = $rowid + 1;
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#row' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}

function selectedItemB(item, rowID)
{
	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoArevenuePharmachy",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
				var $rowid = 0;
					$("#ServicTableRowMM").empty();
		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
			var	Services =  obj.Services;
			var	amount =  obj.amount;				
			var	Count =  obj.Count;
var	ServicesAA = "'" + Services + "'";
			var	hhh = hhh + '<tr id="rowAABB'+$rowid+'"><td><i  onclick="selectedItemPharmachy(this, ' +$rowid+', '+ServicesAA+'  )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
		   $rowid = $rowid + 1;
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#rowBB' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}

function selectedItemBAAAAAAAA(item, rowID)
{

 //alert(item.id);
 // $fromdte = date("Y-m-d");
//	   $todate 

	var fromdte = "<?php echo $fromdte; ?>";
	var todate = "<?php echo $todate; ?>";
	var HospitalID = "<?php echo HospitalID(); ?>";
	var Itemmed = item.id;
 								var user = [{
									'fromdte': fromdte,
									'todate': todate,
									'HospitalID': HospitalID,
									'Itemmed': Itemmed
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ServiceWiseBillNoB",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
				var umAmount = 0;
					$("#ServicTableRow").empty();
		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
			var	createddate =  obj.createddate;								
			var	PatientId =  obj.PatientId;
			var	PatientName =  obj.PatientName;				
			var	Mobile =  obj.Mobile;
			var	amount =  obj.amount;
			var	Vid =  obj.Vid;
			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td><td>' + createddate + '</td><td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
			umAmount = parseInt(umAmount) + parseInt(amount);
										}
hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
		var rr = '#rowBB' + rowID;
		$(rr).after(hhh);

//var x = document.getElementById(item.id).parentElement;
//var child = x.childNodes(hhh);

									}
	});		
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

//window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: ""
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "฿#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

//}
</script>
<style>
.circle-icon {
	background: #0073b7;

	/* width: 4px; */

	/* height: 10px; */
	border-radius: 50%;
	text-align: center;

	/* line-height: 10px; */
	vertical-align: middle;
	padding: 5px;
	color: white;
}
.circle-iconA {
	background: #28a745;

	/* width: 4px; */

	/* height: 10px; */
	border-radius: 50%;
	text-align: center;

	/* line-height: 10px; */
	vertical-align: middle;
	padding: 5px;
	color: white;
}
</style>
<script>
</script>
<?php if (!$view_report_revenue1->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_report_revenue1", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_report_revenue1_list->terminate();
?>