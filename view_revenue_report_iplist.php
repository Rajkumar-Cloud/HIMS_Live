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
$view_revenue_report_ip_list = new view_revenue_report_ip_list();

// Run the page
$view_revenue_report_ip_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_revenue_report_ip_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_revenue_report_ip->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_revenue_report_iplist = currentForm = new ew.Form("fview_revenue_report_iplist", "list");
fview_revenue_report_iplist.formKeyCountName = '<?php echo $view_revenue_report_ip_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_revenue_report_iplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_revenue_report_iplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_revenue_report_iplistsrch = currentSearchForm = new ew.Form("fview_revenue_report_iplistsrch");

// Validate function for search
fview_revenue_report_iplistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_DATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_revenue_report_ip->DATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_revenue_report_iplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_revenue_report_iplistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_revenue_report_iplistsrch.filterList = <?php echo $view_revenue_report_ip_list->getFilterList() ?>;
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
<?php if (!$view_revenue_report_ip->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_revenue_report_ip_list->TotalRecs > 0 && $view_revenue_report_ip_list->ExportOptions->visible()) { ?>
<?php $view_revenue_report_ip_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_ip_list->ImportOptions->visible()) { ?>
<?php $view_revenue_report_ip_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_ip_list->SearchOptions->visible()) { ?>
<?php $view_revenue_report_ip_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_ip_list->FilterOptions->visible()) { ?>
<?php $view_revenue_report_ip_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_revenue_report_ip_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_revenue_report_ip->isExport() && !$view_revenue_report_ip->CurrentAction) { ?>
<form name="fview_revenue_report_iplistsrch" id="fview_revenue_report_iplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_revenue_report_ip_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_revenue_report_iplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_revenue_report_ip">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_revenue_report_ip_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_revenue_report_ip->RowType = ROWTYPE_SEARCH;

// Render row
$view_revenue_report_ip->resetAttributes();
$view_revenue_report_ip_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_revenue_report_ip->DATE->Visible) { // DATE ?>
	<div id="xsc_DATE" class="ew-cell form-group">
		<label for="x_DATE" class="ew-search-caption ew-label"><?php echo $view_revenue_report_ip->DATE->caption() ?></label>
		<span class="ew-search-operator"><select name="z_DATE" id="z_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_revenue_report_ip->DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_revenue_report_ip" data-field="x_DATE" name="x_DATE" id="x_DATE" placeholder="<?php echo HtmlEncode($view_revenue_report_ip->DATE->getPlaceHolder()) ?>" value="<?php echo $view_revenue_report_ip->DATE->EditValue ?>"<?php echo $view_revenue_report_ip->DATE->editAttributes() ?>>
<?php if (!$view_revenue_report_ip->DATE->ReadOnly && !$view_revenue_report_ip->DATE->Disabled && !isset($view_revenue_report_ip->DATE->EditAttrs["readonly"]) && !isset($view_revenue_report_ip->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_revenue_report_iplistsrch", "x_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_DATE style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_DATE style="d-none"">
<input type="text" data-table="view_revenue_report_ip" data-field="x_DATE" name="y_DATE" id="y_DATE" placeholder="<?php echo HtmlEncode($view_revenue_report_ip->DATE->getPlaceHolder()) ?>" value="<?php echo $view_revenue_report_ip->DATE->EditValue2 ?>"<?php echo $view_revenue_report_ip->DATE->editAttributes() ?>>
<?php if (!$view_revenue_report_ip->DATE->ReadOnly && !$view_revenue_report_ip->DATE->Disabled && !isset($view_revenue_report_ip->DATE->EditAttrs["readonly"]) && !isset($view_revenue_report_ip->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_revenue_report_iplistsrch", "y_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_revenue_report_ip_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_revenue_report_ip_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_revenue_report_ip_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_revenue_report_ip_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_ip_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_ip_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_ip_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_revenue_report_ip_list->showPageHeader(); ?>
<?php
$view_revenue_report_ip_list->showMessage();
?>
<?php if ($view_revenue_report_ip_list->TotalRecs > 0 || $view_revenue_report_ip->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_revenue_report_ip_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_revenue_report_ip">
<?php if (!$view_revenue_report_ip->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_revenue_report_ip->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_revenue_report_ip_list->Pager)) $view_revenue_report_ip_list->Pager = new NumericPager($view_revenue_report_ip_list->StartRec, $view_revenue_report_ip_list->DisplayRecs, $view_revenue_report_ip_list->TotalRecs, $view_revenue_report_ip_list->RecRange, $view_revenue_report_ip_list->AutoHidePager) ?>
<?php if ($view_revenue_report_ip_list->Pager->RecordCount > 0 && $view_revenue_report_ip_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_revenue_report_ip_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_ip_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_revenue_report_ip_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_revenue_report_ip_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_ip_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_ip_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_revenue_report_ip_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_revenue_report_ip_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_revenue_report_ip_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_revenue_report_ip_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_revenue_report_ip_list->TotalRecs > 0 && (!$view_revenue_report_ip_list->AutoHidePageSizeSelector || $view_revenue_report_ip_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_revenue_report_ip">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_revenue_report_ip_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_revenue_report_ip_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_revenue_report_ip_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_revenue_report_ip_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_revenue_report_ip_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_revenue_report_ip_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_revenue_report_ip->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_ip_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_revenue_report_iplist" id="fview_revenue_report_iplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_revenue_report_ip_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_revenue_report_ip_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_revenue_report_ip">
<div id="gmp_view_revenue_report_ip" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_revenue_report_ip_list->TotalRecs > 0 || $view_revenue_report_ip->isGridEdit()) { ?>
<table id="tbl_view_revenue_report_iplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_revenue_report_ip_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_revenue_report_ip_list->renderListOptions();

// Render list options (header, left)
$view_revenue_report_ip_list->ListOptions->render("header", "left");
?>
<?php if ($view_revenue_report_ip->DATE->Visible) { // DATE ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->DATE) == "") { ?>
		<th data-name="DATE" class="<?php echo $view_revenue_report_ip->DATE->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_DATE" class="view_revenue_report_ip_DATE"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATE" class="<?php echo $view_revenue_report_ip->DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->DATE) ?>',1);"><div id="elh_view_revenue_report_ip_DATE" class="view_revenue_report_ip_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_revenue_report_ip->BillNumber->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_BillNumber" class="view_revenue_report_ip_BillNumber"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_revenue_report_ip->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->BillNumber) ?>',1);"><div id="elh_view_revenue_report_ip_BillNumber" class="view_revenue_report_ip_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->PatientId->Visible) { // PatientId ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_revenue_report_ip->PatientId->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_PatientId" class="view_revenue_report_ip_PatientId"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_revenue_report_ip->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->PatientId) ?>',1);"><div id="elh_view_revenue_report_ip_PatientId" class="view_revenue_report_ip_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->PatientName->Visible) { // PatientName ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_revenue_report_ip->PatientName->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_PatientName" class="view_revenue_report_ip_PatientName"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_revenue_report_ip->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->PatientName) ?>',1);"><div id="elh_view_revenue_report_ip_PatientName" class="view_revenue_report_ip_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_revenue_report_ip->RefferedBy->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_RefferedBy" class="view_revenue_report_ip_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_revenue_report_ip->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->RefferedBy) ?>',1);"><div id="elh_view_revenue_report_ip_RefferedBy" class="view_revenue_report_ip_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->CASES->Visible) { // CASES ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->CASES) == "") { ?>
		<th data-name="CASES" class="<?php echo $view_revenue_report_ip->CASES->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_CASES" class="view_revenue_report_ip_CASES"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->CASES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CASES" class="<?php echo $view_revenue_report_ip->CASES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->CASES) ?>',1);"><div id="elh_view_revenue_report_ip_CASES" class="view_revenue_report_ip_CASES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->CASES->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->CASES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->CASES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->WARD->Visible) { // WARD ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->WARD) == "") { ?>
		<th data-name="WARD" class="<?php echo $view_revenue_report_ip->WARD->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_WARD" class="view_revenue_report_ip_WARD"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->WARD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WARD" class="<?php echo $view_revenue_report_ip->WARD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->WARD) ?>',1);"><div id="elh_view_revenue_report_ip_WARD" class="view_revenue_report_ip_WARD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->WARD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->WARD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->WARD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->OT->Visible) { // OT ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->OT) == "") { ?>
		<th data-name="OT" class="<?php echo $view_revenue_report_ip->OT->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_OT" class="view_revenue_report_ip_OT"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->OT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OT" class="<?php echo $view_revenue_report_ip->OT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->OT) ?>',1);"><div id="elh_view_revenue_report_ip_OT" class="view_revenue_report_ip_OT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->OT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->OT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->OT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->IMPLANT->Visible) { // IMPLANT ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->IMPLANT) == "") { ?>
		<th data-name="IMPLANT" class="<?php echo $view_revenue_report_ip->IMPLANT->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_IMPLANT" class="view_revenue_report_ip_IMPLANT"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->IMPLANT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMPLANT" class="<?php echo $view_revenue_report_ip->IMPLANT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->IMPLANT) ?>',1);"><div id="elh_view_revenue_report_ip_IMPLANT" class="view_revenue_report_ip_IMPLANT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->IMPLANT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->IMPLANT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->IMPLANT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->LAB->Visible) { // LAB ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->LAB) == "") { ?>
		<th data-name="LAB" class="<?php echo $view_revenue_report_ip->LAB->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_LAB" class="view_revenue_report_ip_LAB"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->LAB->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LAB" class="<?php echo $view_revenue_report_ip->LAB->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->LAB) ?>',1);"><div id="elh_view_revenue_report_ip_LAB" class="view_revenue_report_ip_LAB">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->LAB->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->LAB->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->LAB->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->PHARMACY->Visible) { // PHARMACY ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->PHARMACY) == "") { ?>
		<th data-name="PHARMACY" class="<?php echo $view_revenue_report_ip->PHARMACY->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_PHARMACY" class="view_revenue_report_ip_PHARMACY"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PHARMACY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PHARMACY" class="<?php echo $view_revenue_report_ip->PHARMACY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->PHARMACY) ?>',1);"><div id="elh_view_revenue_report_ip_PHARMACY" class="view_revenue_report_ip_PHARMACY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PHARMACY->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->PHARMACY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->PHARMACY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->Visible) { // OUT SIDE DRS VISIT NAME Amount ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount) == "") { ?>
		<th data-name="OUT_SIDE_DRS_VISIT_NAME_Amount" class="<?php echo $view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_OUT_SIDE_DRS_VISIT_NAME_Amount" class="view_revenue_report_ip_OUT_SIDE_DRS_VISIT_NAME_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OUT_SIDE_DRS_VISIT_NAME_Amount" class="<?php echo $view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount) ?>',1);"><div id="elh_view_revenue_report_ip_OUT_SIDE_DRS_VISIT_NAME_Amount" class="view_revenue_report_ip_OUT_SIDE_DRS_VISIT_NAME_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->PHYSIO_Amount->Visible) { // PHYSIO Amount ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->PHYSIO_Amount) == "") { ?>
		<th data-name="PHYSIO_Amount" class="<?php echo $view_revenue_report_ip->PHYSIO_Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_PHYSIO_Amount" class="view_revenue_report_ip_PHYSIO_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PHYSIO_Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PHYSIO_Amount" class="<?php echo $view_revenue_report_ip->PHYSIO_Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->PHYSIO_Amount) ?>',1);"><div id="elh_view_revenue_report_ip_PHYSIO_Amount" class="view_revenue_report_ip_PHYSIO_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->PHYSIO_Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->PHYSIO_Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->PHYSIO_Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->SURGEON_Amount->Visible) { // SURGEON Amount ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->SURGEON_Amount) == "") { ?>
		<th data-name="SURGEON_Amount" class="<?php echo $view_revenue_report_ip->SURGEON_Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_SURGEON_Amount" class="view_revenue_report_ip_SURGEON_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->SURGEON_Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SURGEON_Amount" class="<?php echo $view_revenue_report_ip->SURGEON_Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->SURGEON_Amount) ?>',1);"><div id="elh_view_revenue_report_ip_SURGEON_Amount" class="view_revenue_report_ip_SURGEON_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->SURGEON_Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->SURGEON_Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->SURGEON_Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->ASST_SURGEON_Amount->Visible) { // ASST SURGEON Amount ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->ASST_SURGEON_Amount) == "") { ?>
		<th data-name="ASST_SURGEON_Amount" class="<?php echo $view_revenue_report_ip->ASST_SURGEON_Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_ASST_SURGEON_Amount" class="view_revenue_report_ip_ASST_SURGEON_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->ASST_SURGEON_Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ASST_SURGEON_Amount" class="<?php echo $view_revenue_report_ip->ASST_SURGEON_Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->ASST_SURGEON_Amount) ?>',1);"><div id="elh_view_revenue_report_ip_ASST_SURGEON_Amount" class="view_revenue_report_ip_ASST_SURGEON_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->ASST_SURGEON_Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->ASST_SURGEON_Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->ASST_SURGEON_Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->ANESTHETIST_Amount->Visible) { // ANESTHETIST Amount ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->ANESTHETIST_Amount) == "") { ?>
		<th data-name="ANESTHETIST_Amount" class="<?php echo $view_revenue_report_ip->ANESTHETIST_Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_ANESTHETIST_Amount" class="view_revenue_report_ip_ANESTHETIST_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->ANESTHETIST_Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANESTHETIST_Amount" class="<?php echo $view_revenue_report_ip->ANESTHETIST_Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->ANESTHETIST_Amount) ?>',1);"><div id="elh_view_revenue_report_ip_ANESTHETIST_Amount" class="view_revenue_report_ip_ANESTHETIST_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->ANESTHETIST_Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->ANESTHETIST_Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->ANESTHETIST_Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->Others->Visible) { // Others ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->Others) == "") { ?>
		<th data-name="Others" class="<?php echo $view_revenue_report_ip->Others->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_Others" class="view_revenue_report_ip_Others"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others" class="<?php echo $view_revenue_report_ip->Others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->Others) ?>',1);"><div id="elh_view_revenue_report_ip_Others" class="view_revenue_report_ip_Others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Others->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->Others->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->Others->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->Amount->Visible) { // Amount ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_revenue_report_ip->Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_Amount" class="view_revenue_report_ip_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_revenue_report_ip->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->Amount) ?>',1);"><div id="elh_view_revenue_report_ip_Amount" class="view_revenue_report_ip_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_revenue_report_ip->ModeofPayment->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_ModeofPayment" class="view_revenue_report_ip_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_revenue_report_ip->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->ModeofPayment) ?>',1);"><div id="elh_view_revenue_report_ip_ModeofPayment" class="view_revenue_report_ip_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->Cash->Visible) { // Cash ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $view_revenue_report_ip->Cash->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_Cash" class="view_revenue_report_ip_Cash"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $view_revenue_report_ip->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->Cash) ?>',1);"><div id="elh_view_revenue_report_ip_Cash" class="view_revenue_report_ip_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->Card->Visible) { // Card ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_revenue_report_ip->Card->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_Card" class="view_revenue_report_ip_Card"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_revenue_report_ip->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->Card) ?>',1);"><div id="elh_view_revenue_report_ip_Card" class="view_revenue_report_ip_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_ip->HospID->Visible) { // HospID ?>
	<?php if ($view_revenue_report_ip->sortUrl($view_revenue_report_ip->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_revenue_report_ip->HospID->headerCellClass() ?>"><div id="elh_view_revenue_report_ip_HospID" class="view_revenue_report_ip_HospID"><div class="ew-table-header-caption"><?php echo $view_revenue_report_ip->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_revenue_report_ip->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_ip->SortUrl($view_revenue_report_ip->HospID) ?>',1);"><div id="elh_view_revenue_report_ip_HospID" class="view_revenue_report_ip_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_ip->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_ip->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_ip->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_revenue_report_ip_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_revenue_report_ip->ExportAll && $view_revenue_report_ip->isExport()) {
	$view_revenue_report_ip_list->StopRec = $view_revenue_report_ip_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_revenue_report_ip_list->TotalRecs > $view_revenue_report_ip_list->StartRec + $view_revenue_report_ip_list->DisplayRecs - 1)
		$view_revenue_report_ip_list->StopRec = $view_revenue_report_ip_list->StartRec + $view_revenue_report_ip_list->DisplayRecs - 1;
	else
		$view_revenue_report_ip_list->StopRec = $view_revenue_report_ip_list->TotalRecs;
}
$view_revenue_report_ip_list->RecCnt = $view_revenue_report_ip_list->StartRec - 1;
if ($view_revenue_report_ip_list->Recordset && !$view_revenue_report_ip_list->Recordset->EOF) {
	$view_revenue_report_ip_list->Recordset->moveFirst();
	$selectLimit = $view_revenue_report_ip_list->UseSelectLimit;
	if (!$selectLimit && $view_revenue_report_ip_list->StartRec > 1)
		$view_revenue_report_ip_list->Recordset->move($view_revenue_report_ip_list->StartRec - 1);
} elseif (!$view_revenue_report_ip->AllowAddDeleteRow && $view_revenue_report_ip_list->StopRec == 0) {
	$view_revenue_report_ip_list->StopRec = $view_revenue_report_ip->GridAddRowCount;
}

// Initialize aggregate
$view_revenue_report_ip->RowType = ROWTYPE_AGGREGATEINIT;
$view_revenue_report_ip->resetAttributes();
$view_revenue_report_ip_list->renderRow();
while ($view_revenue_report_ip_list->RecCnt < $view_revenue_report_ip_list->StopRec) {
	$view_revenue_report_ip_list->RecCnt++;
	if ($view_revenue_report_ip_list->RecCnt >= $view_revenue_report_ip_list->StartRec) {
		$view_revenue_report_ip_list->RowCnt++;

		// Set up key count
		$view_revenue_report_ip_list->KeyCount = $view_revenue_report_ip_list->RowIndex;

		// Init row class and style
		$view_revenue_report_ip->resetAttributes();
		$view_revenue_report_ip->CssClass = "";
		if ($view_revenue_report_ip->isGridAdd()) {
		} else {
			$view_revenue_report_ip_list->loadRowValues($view_revenue_report_ip_list->Recordset); // Load row values
		}
		$view_revenue_report_ip->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_revenue_report_ip->RowAttrs = array_merge($view_revenue_report_ip->RowAttrs, array('data-rowindex'=>$view_revenue_report_ip_list->RowCnt, 'id'=>'r' . $view_revenue_report_ip_list->RowCnt . '_view_revenue_report_ip', 'data-rowtype'=>$view_revenue_report_ip->RowType));

		// Render row
		$view_revenue_report_ip_list->renderRow();

		// Render list options
		$view_revenue_report_ip_list->renderListOptions();
?>
	<tr<?php echo $view_revenue_report_ip->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_revenue_report_ip_list->ListOptions->render("body", "left", $view_revenue_report_ip_list->RowCnt);
?>
	<?php if ($view_revenue_report_ip->DATE->Visible) { // DATE ?>
		<td data-name="DATE"<?php echo $view_revenue_report_ip->DATE->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_DATE" class="view_revenue_report_ip_DATE">
<span<?php echo $view_revenue_report_ip->DATE->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_revenue_report_ip->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_BillNumber" class="view_revenue_report_ip_BillNumber">
<span<?php echo $view_revenue_report_ip->BillNumber->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_revenue_report_ip->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_PatientId" class="view_revenue_report_ip_PatientId">
<span<?php echo $view_revenue_report_ip->PatientId->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_revenue_report_ip->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_PatientName" class="view_revenue_report_ip_PatientName">
<span<?php echo $view_revenue_report_ip->PatientName->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $view_revenue_report_ip->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_RefferedBy" class="view_revenue_report_ip_RefferedBy">
<span<?php echo $view_revenue_report_ip->RefferedBy->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->CASES->Visible) { // CASES ?>
		<td data-name="CASES"<?php echo $view_revenue_report_ip->CASES->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_CASES" class="view_revenue_report_ip_CASES">
<span<?php echo $view_revenue_report_ip->CASES->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->CASES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->WARD->Visible) { // WARD ?>
		<td data-name="WARD"<?php echo $view_revenue_report_ip->WARD->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_WARD" class="view_revenue_report_ip_WARD">
<span<?php echo $view_revenue_report_ip->WARD->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->WARD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->OT->Visible) { // OT ?>
		<td data-name="OT"<?php echo $view_revenue_report_ip->OT->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_OT" class="view_revenue_report_ip_OT">
<span<?php echo $view_revenue_report_ip->OT->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->OT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->IMPLANT->Visible) { // IMPLANT ?>
		<td data-name="IMPLANT"<?php echo $view_revenue_report_ip->IMPLANT->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_IMPLANT" class="view_revenue_report_ip_IMPLANT">
<span<?php echo $view_revenue_report_ip->IMPLANT->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->IMPLANT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->LAB->Visible) { // LAB ?>
		<td data-name="LAB"<?php echo $view_revenue_report_ip->LAB->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_LAB" class="view_revenue_report_ip_LAB">
<span<?php echo $view_revenue_report_ip->LAB->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->LAB->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->PHARMACY->Visible) { // PHARMACY ?>
		<td data-name="PHARMACY"<?php echo $view_revenue_report_ip->PHARMACY->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_PHARMACY" class="view_revenue_report_ip_PHARMACY">
<span<?php echo $view_revenue_report_ip->PHARMACY->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->PHARMACY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->Visible) { // OUT SIDE DRS VISIT NAME Amount ?>
		<td data-name="OUT_SIDE_DRS_VISIT_NAME_Amount"<?php echo $view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_OUT_SIDE_DRS_VISIT_NAME_Amount" class="view_revenue_report_ip_OUT_SIDE_DRS_VISIT_NAME_Amount">
<span<?php echo $view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->OUT_SIDE_DRS_VISIT_NAME_Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->PHYSIO_Amount->Visible) { // PHYSIO Amount ?>
		<td data-name="PHYSIO_Amount"<?php echo $view_revenue_report_ip->PHYSIO_Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_PHYSIO_Amount" class="view_revenue_report_ip_PHYSIO_Amount">
<span<?php echo $view_revenue_report_ip->PHYSIO_Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->PHYSIO_Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->SURGEON_Amount->Visible) { // SURGEON Amount ?>
		<td data-name="SURGEON_Amount"<?php echo $view_revenue_report_ip->SURGEON_Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_SURGEON_Amount" class="view_revenue_report_ip_SURGEON_Amount">
<span<?php echo $view_revenue_report_ip->SURGEON_Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->SURGEON_Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->ASST_SURGEON_Amount->Visible) { // ASST SURGEON Amount ?>
		<td data-name="ASST_SURGEON_Amount"<?php echo $view_revenue_report_ip->ASST_SURGEON_Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_ASST_SURGEON_Amount" class="view_revenue_report_ip_ASST_SURGEON_Amount">
<span<?php echo $view_revenue_report_ip->ASST_SURGEON_Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->ASST_SURGEON_Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->ANESTHETIST_Amount->Visible) { // ANESTHETIST Amount ?>
		<td data-name="ANESTHETIST_Amount"<?php echo $view_revenue_report_ip->ANESTHETIST_Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_ANESTHETIST_Amount" class="view_revenue_report_ip_ANESTHETIST_Amount">
<span<?php echo $view_revenue_report_ip->ANESTHETIST_Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->ANESTHETIST_Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->Others->Visible) { // Others ?>
		<td data-name="Others"<?php echo $view_revenue_report_ip->Others->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_Others" class="view_revenue_report_ip_Others">
<span<?php echo $view_revenue_report_ip->Others->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->Others->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_revenue_report_ip->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_Amount" class="view_revenue_report_ip_Amount">
<span<?php echo $view_revenue_report_ip->Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_revenue_report_ip->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_ModeofPayment" class="view_revenue_report_ip_ModeofPayment">
<span<?php echo $view_revenue_report_ip->ModeofPayment->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $view_revenue_report_ip->Cash->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_Cash" class="view_revenue_report_ip_Cash">
<span<?php echo $view_revenue_report_ip->Cash->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_revenue_report_ip->Card->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_Card" class="view_revenue_report_ip_Card">
<span<?php echo $view_revenue_report_ip->Card->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_ip->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_revenue_report_ip->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_ip_list->RowCnt ?>_view_revenue_report_ip_HospID" class="view_revenue_report_ip_HospID">
<span<?php echo $view_revenue_report_ip->HospID->viewAttributes() ?>>
<?php echo $view_revenue_report_ip->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_revenue_report_ip_list->ListOptions->render("body", "right", $view_revenue_report_ip_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_revenue_report_ip->isGridAdd())
		$view_revenue_report_ip_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_revenue_report_ip->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_revenue_report_ip_list->Recordset)
	$view_revenue_report_ip_list->Recordset->Close();
?>
<?php if (!$view_revenue_report_ip->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_revenue_report_ip->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_revenue_report_ip_list->Pager)) $view_revenue_report_ip_list->Pager = new NumericPager($view_revenue_report_ip_list->StartRec, $view_revenue_report_ip_list->DisplayRecs, $view_revenue_report_ip_list->TotalRecs, $view_revenue_report_ip_list->RecRange, $view_revenue_report_ip_list->AutoHidePager) ?>
<?php if ($view_revenue_report_ip_list->Pager->RecordCount > 0 && $view_revenue_report_ip_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_revenue_report_ip_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_ip_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_revenue_report_ip_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_revenue_report_ip_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_ip_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_ip_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_ip_list->pageUrl() ?>start=<?php echo $view_revenue_report_ip_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_revenue_report_ip_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_revenue_report_ip_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_revenue_report_ip_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_revenue_report_ip_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_revenue_report_ip_list->TotalRecs > 0 && (!$view_revenue_report_ip_list->AutoHidePageSizeSelector || $view_revenue_report_ip_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_revenue_report_ip">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_revenue_report_ip_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_revenue_report_ip_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_revenue_report_ip_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_revenue_report_ip_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_revenue_report_ip_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_revenue_report_ip_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_revenue_report_ip->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_ip_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_revenue_report_ip_list->TotalRecs == 0 && !$view_revenue_report_ip->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_ip_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_revenue_report_ip_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_revenue_report_ip->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_revenue_report_ip->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_revenue_report_ip", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_revenue_report_ip_list->terminate();
?>