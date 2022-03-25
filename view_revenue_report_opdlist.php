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
$view_revenue_report_opd_list = new view_revenue_report_opd_list();

// Run the page
$view_revenue_report_opd_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_revenue_report_opd_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_revenue_report_opd->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_revenue_report_opdlist = currentForm = new ew.Form("fview_revenue_report_opdlist", "list");
fview_revenue_report_opdlist.formKeyCountName = '<?php echo $view_revenue_report_opd_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_revenue_report_opdlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_revenue_report_opdlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_revenue_report_opdlistsrch = currentSearchForm = new ew.Form("fview_revenue_report_opdlistsrch");

// Validate function for search
fview_revenue_report_opdlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_DATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_revenue_report_opd->DATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_revenue_report_opdlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_revenue_report_opdlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_revenue_report_opdlistsrch.filterList = <?php echo $view_revenue_report_opd_list->getFilterList() ?>;
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
<?php if (!$view_revenue_report_opd->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_revenue_report_opd_list->TotalRecs > 0 && $view_revenue_report_opd_list->ExportOptions->visible()) { ?>
<?php $view_revenue_report_opd_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_opd_list->ImportOptions->visible()) { ?>
<?php $view_revenue_report_opd_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_opd_list->SearchOptions->visible()) { ?>
<?php $view_revenue_report_opd_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_opd_list->FilterOptions->visible()) { ?>
<?php $view_revenue_report_opd_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_revenue_report_opd_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_revenue_report_opd->isExport() && !$view_revenue_report_opd->CurrentAction) { ?>
<form name="fview_revenue_report_opdlistsrch" id="fview_revenue_report_opdlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_revenue_report_opd_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_revenue_report_opdlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_revenue_report_opd">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_revenue_report_opd_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_revenue_report_opd->RowType = ROWTYPE_SEARCH;

// Render row
$view_revenue_report_opd->resetAttributes();
$view_revenue_report_opd_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_revenue_report_opd->DATE->Visible) { // DATE ?>
	<div id="xsc_DATE" class="ew-cell form-group">
		<label for="x_DATE" class="ew-search-caption ew-label"><?php echo $view_revenue_report_opd->DATE->caption() ?></label>
		<span class="ew-search-operator"><select name="z_DATE" id="z_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_revenue_report_opd->DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_revenue_report_opd" data-field="x_DATE" name="x_DATE" id="x_DATE" placeholder="<?php echo HtmlEncode($view_revenue_report_opd->DATE->getPlaceHolder()) ?>" value="<?php echo $view_revenue_report_opd->DATE->EditValue ?>"<?php echo $view_revenue_report_opd->DATE->editAttributes() ?>>
<?php if (!$view_revenue_report_opd->DATE->ReadOnly && !$view_revenue_report_opd->DATE->Disabled && !isset($view_revenue_report_opd->DATE->EditAttrs["readonly"]) && !isset($view_revenue_report_opd->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_revenue_report_opdlistsrch", "x_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_DATE style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_DATE style="d-none"">
<input type="text" data-table="view_revenue_report_opd" data-field="x_DATE" name="y_DATE" id="y_DATE" placeholder="<?php echo HtmlEncode($view_revenue_report_opd->DATE->getPlaceHolder()) ?>" value="<?php echo $view_revenue_report_opd->DATE->EditValue2 ?>"<?php echo $view_revenue_report_opd->DATE->editAttributes() ?>>
<?php if (!$view_revenue_report_opd->DATE->ReadOnly && !$view_revenue_report_opd->DATE->Disabled && !isset($view_revenue_report_opd->DATE->EditAttrs["readonly"]) && !isset($view_revenue_report_opd->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_revenue_report_opdlistsrch", "y_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_revenue_report_opd_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_revenue_report_opd_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_revenue_report_opd_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_revenue_report_opd_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_opd_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_opd_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_opd_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_revenue_report_opd_list->showPageHeader(); ?>
<?php
$view_revenue_report_opd_list->showMessage();
?>
<?php if ($view_revenue_report_opd_list->TotalRecs > 0 || $view_revenue_report_opd->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_revenue_report_opd_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_revenue_report_opd">
<?php if (!$view_revenue_report_opd->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_revenue_report_opd->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_revenue_report_opd_list->Pager)) $view_revenue_report_opd_list->Pager = new NumericPager($view_revenue_report_opd_list->StartRec, $view_revenue_report_opd_list->DisplayRecs, $view_revenue_report_opd_list->TotalRecs, $view_revenue_report_opd_list->RecRange, $view_revenue_report_opd_list->AutoHidePager) ?>
<?php if ($view_revenue_report_opd_list->Pager->RecordCount > 0 && $view_revenue_report_opd_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_revenue_report_opd_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_opd_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_revenue_report_opd_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_revenue_report_opd_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_opd_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_opd_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_revenue_report_opd_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_revenue_report_opd_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_revenue_report_opd_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_revenue_report_opd_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_revenue_report_opd_list->TotalRecs > 0 && (!$view_revenue_report_opd_list->AutoHidePageSizeSelector || $view_revenue_report_opd_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_revenue_report_opd">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_revenue_report_opd_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_revenue_report_opd_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_revenue_report_opd_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_revenue_report_opd_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_revenue_report_opd_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_revenue_report_opd_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_revenue_report_opd->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_opd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_revenue_report_opdlist" id="fview_revenue_report_opdlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_revenue_report_opd_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_revenue_report_opd_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_revenue_report_opd">
<div id="gmp_view_revenue_report_opd" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_revenue_report_opd_list->TotalRecs > 0 || $view_revenue_report_opd->isGridEdit()) { ?>
<table id="tbl_view_revenue_report_opdlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_revenue_report_opd_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_revenue_report_opd_list->renderListOptions();

// Render list options (header, left)
$view_revenue_report_opd_list->ListOptions->render("header", "left");
?>
<?php if ($view_revenue_report_opd->DATE->Visible) { // DATE ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->DATE) == "") { ?>
		<th data-name="DATE" class="<?php echo $view_revenue_report_opd->DATE->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_DATE" class="view_revenue_report_opd_DATE"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATE" class="<?php echo $view_revenue_report_opd->DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->DATE) ?>',1);"><div id="elh_view_revenue_report_opd_DATE" class="view_revenue_report_opd_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_revenue_report_opd->BillNumber->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_BillNumber" class="view_revenue_report_opd_BillNumber"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_revenue_report_opd->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->BillNumber) ?>',1);"><div id="elh_view_revenue_report_opd_BillNumber" class="view_revenue_report_opd_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->PatientId->Visible) { // PatientId ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_revenue_report_opd->PatientId->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_PatientId" class="view_revenue_report_opd_PatientId"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_revenue_report_opd->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->PatientId) ?>',1);"><div id="elh_view_revenue_report_opd_PatientId" class="view_revenue_report_opd_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->Op_consultations->Visible) { // Op consultations ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->Op_consultations) == "") { ?>
		<th data-name="Op_consultations" class="<?php echo $view_revenue_report_opd->Op_consultations->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_Op_consultations" class="view_revenue_report_opd_Op_consultations"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Op_consultations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Op_consultations" class="<?php echo $view_revenue_report_opd->Op_consultations->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->Op_consultations) ?>',1);"><div id="elh_view_revenue_report_opd_Op_consultations" class="view_revenue_report_opd_Op_consultations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Op_consultations->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->Op_consultations->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->Op_consultations->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->Scan->Visible) { // Scan ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->Scan) == "") { ?>
		<th data-name="Scan" class="<?php echo $view_revenue_report_opd->Scan->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_Scan" class="view_revenue_report_opd_Scan"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Scan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Scan" class="<?php echo $view_revenue_report_opd->Scan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->Scan) ?>',1);"><div id="elh_view_revenue_report_opd_Scan" class="view_revenue_report_opd_Scan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Scan->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->Scan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->Scan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->PROCEDURES->Visible) { // PROCEDURES ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->PROCEDURES) == "") { ?>
		<th data-name="PROCEDURES" class="<?php echo $view_revenue_report_opd->PROCEDURES->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_PROCEDURES" class="view_revenue_report_opd_PROCEDURES"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->PROCEDURES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROCEDURES" class="<?php echo $view_revenue_report_opd->PROCEDURES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->PROCEDURES) ?>',1);"><div id="elh_view_revenue_report_opd_PROCEDURES" class="view_revenue_report_opd_PROCEDURES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->PROCEDURES->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->PROCEDURES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->PROCEDURES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->LAB->Visible) { // LAB ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->LAB) == "") { ?>
		<th data-name="LAB" class="<?php echo $view_revenue_report_opd->LAB->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_LAB" class="view_revenue_report_opd_LAB"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->LAB->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LAB" class="<?php echo $view_revenue_report_opd->LAB->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->LAB) ?>',1);"><div id="elh_view_revenue_report_opd_LAB" class="view_revenue_report_opd_LAB">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->LAB->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->LAB->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->LAB->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->Others->Visible) { // Others ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->Others) == "") { ?>
		<th data-name="Others" class="<?php echo $view_revenue_report_opd->Others->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_Others" class="view_revenue_report_opd_Others"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others" class="<?php echo $view_revenue_report_opd->Others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->Others) ?>',1);"><div id="elh_view_revenue_report_opd_Others" class="view_revenue_report_opd_Others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Others->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->Others->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->Others->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->Amount->Visible) { // Amount ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_revenue_report_opd->Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_Amount" class="view_revenue_report_opd_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_revenue_report_opd->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->Amount) ?>',1);"><div id="elh_view_revenue_report_opd_Amount" class="view_revenue_report_opd_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_revenue_report_opd->ModeofPayment->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_ModeofPayment" class="view_revenue_report_opd_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_revenue_report_opd->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->ModeofPayment) ?>',1);"><div id="elh_view_revenue_report_opd_ModeofPayment" class="view_revenue_report_opd_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->Cash->Visible) { // Cash ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $view_revenue_report_opd->Cash->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_Cash" class="view_revenue_report_opd_Cash"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $view_revenue_report_opd->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->Cash) ?>',1);"><div id="elh_view_revenue_report_opd_Cash" class="view_revenue_report_opd_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->Card->Visible) { // Card ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_revenue_report_opd->Card->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_Card" class="view_revenue_report_opd_Card"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_revenue_report_opd->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->Card) ?>',1);"><div id="elh_view_revenue_report_opd_Card" class="view_revenue_report_opd_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_opd->HospID->Visible) { // HospID ?>
	<?php if ($view_revenue_report_opd->sortUrl($view_revenue_report_opd->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_revenue_report_opd->HospID->headerCellClass() ?>"><div id="elh_view_revenue_report_opd_HospID" class="view_revenue_report_opd_HospID"><div class="ew-table-header-caption"><?php echo $view_revenue_report_opd->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_revenue_report_opd->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_opd->SortUrl($view_revenue_report_opd->HospID) ?>',1);"><div id="elh_view_revenue_report_opd_HospID" class="view_revenue_report_opd_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_opd->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_opd->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_opd->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_revenue_report_opd_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_revenue_report_opd->ExportAll && $view_revenue_report_opd->isExport()) {
	$view_revenue_report_opd_list->StopRec = $view_revenue_report_opd_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_revenue_report_opd_list->TotalRecs > $view_revenue_report_opd_list->StartRec + $view_revenue_report_opd_list->DisplayRecs - 1)
		$view_revenue_report_opd_list->StopRec = $view_revenue_report_opd_list->StartRec + $view_revenue_report_opd_list->DisplayRecs - 1;
	else
		$view_revenue_report_opd_list->StopRec = $view_revenue_report_opd_list->TotalRecs;
}
$view_revenue_report_opd_list->RecCnt = $view_revenue_report_opd_list->StartRec - 1;
if ($view_revenue_report_opd_list->Recordset && !$view_revenue_report_opd_list->Recordset->EOF) {
	$view_revenue_report_opd_list->Recordset->moveFirst();
	$selectLimit = $view_revenue_report_opd_list->UseSelectLimit;
	if (!$selectLimit && $view_revenue_report_opd_list->StartRec > 1)
		$view_revenue_report_opd_list->Recordset->move($view_revenue_report_opd_list->StartRec - 1);
} elseif (!$view_revenue_report_opd->AllowAddDeleteRow && $view_revenue_report_opd_list->StopRec == 0) {
	$view_revenue_report_opd_list->StopRec = $view_revenue_report_opd->GridAddRowCount;
}

// Initialize aggregate
$view_revenue_report_opd->RowType = ROWTYPE_AGGREGATEINIT;
$view_revenue_report_opd->resetAttributes();
$view_revenue_report_opd_list->renderRow();
while ($view_revenue_report_opd_list->RecCnt < $view_revenue_report_opd_list->StopRec) {
	$view_revenue_report_opd_list->RecCnt++;
	if ($view_revenue_report_opd_list->RecCnt >= $view_revenue_report_opd_list->StartRec) {
		$view_revenue_report_opd_list->RowCnt++;

		// Set up key count
		$view_revenue_report_opd_list->KeyCount = $view_revenue_report_opd_list->RowIndex;

		// Init row class and style
		$view_revenue_report_opd->resetAttributes();
		$view_revenue_report_opd->CssClass = "";
		if ($view_revenue_report_opd->isGridAdd()) {
		} else {
			$view_revenue_report_opd_list->loadRowValues($view_revenue_report_opd_list->Recordset); // Load row values
		}
		$view_revenue_report_opd->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_revenue_report_opd->RowAttrs = array_merge($view_revenue_report_opd->RowAttrs, array('data-rowindex'=>$view_revenue_report_opd_list->RowCnt, 'id'=>'r' . $view_revenue_report_opd_list->RowCnt . '_view_revenue_report_opd', 'data-rowtype'=>$view_revenue_report_opd->RowType));

		// Render row
		$view_revenue_report_opd_list->renderRow();

		// Render list options
		$view_revenue_report_opd_list->renderListOptions();
?>
	<tr<?php echo $view_revenue_report_opd->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_revenue_report_opd_list->ListOptions->render("body", "left", $view_revenue_report_opd_list->RowCnt);
?>
	<?php if ($view_revenue_report_opd->DATE->Visible) { // DATE ?>
		<td data-name="DATE"<?php echo $view_revenue_report_opd->DATE->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_DATE" class="view_revenue_report_opd_DATE">
<span<?php echo $view_revenue_report_opd->DATE->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_revenue_report_opd->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_BillNumber" class="view_revenue_report_opd_BillNumber">
<span<?php echo $view_revenue_report_opd->BillNumber->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_revenue_report_opd->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_PatientId" class="view_revenue_report_opd_PatientId">
<span<?php echo $view_revenue_report_opd->PatientId->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->Op_consultations->Visible) { // Op consultations ?>
		<td data-name="Op_consultations"<?php echo $view_revenue_report_opd->Op_consultations->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_Op_consultations" class="view_revenue_report_opd_Op_consultations">
<span<?php echo $view_revenue_report_opd->Op_consultations->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->Op_consultations->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->Scan->Visible) { // Scan ?>
		<td data-name="Scan"<?php echo $view_revenue_report_opd->Scan->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_Scan" class="view_revenue_report_opd_Scan">
<span<?php echo $view_revenue_report_opd->Scan->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->Scan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->PROCEDURES->Visible) { // PROCEDURES ?>
		<td data-name="PROCEDURES"<?php echo $view_revenue_report_opd->PROCEDURES->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_PROCEDURES" class="view_revenue_report_opd_PROCEDURES">
<span<?php echo $view_revenue_report_opd->PROCEDURES->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->PROCEDURES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->LAB->Visible) { // LAB ?>
		<td data-name="LAB"<?php echo $view_revenue_report_opd->LAB->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_LAB" class="view_revenue_report_opd_LAB">
<span<?php echo $view_revenue_report_opd->LAB->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->LAB->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->Others->Visible) { // Others ?>
		<td data-name="Others"<?php echo $view_revenue_report_opd->Others->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_Others" class="view_revenue_report_opd_Others">
<span<?php echo $view_revenue_report_opd->Others->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->Others->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_revenue_report_opd->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_Amount" class="view_revenue_report_opd_Amount">
<span<?php echo $view_revenue_report_opd->Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_revenue_report_opd->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_ModeofPayment" class="view_revenue_report_opd_ModeofPayment">
<span<?php echo $view_revenue_report_opd->ModeofPayment->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $view_revenue_report_opd->Cash->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_Cash" class="view_revenue_report_opd_Cash">
<span<?php echo $view_revenue_report_opd->Cash->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_revenue_report_opd->Card->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_Card" class="view_revenue_report_opd_Card">
<span<?php echo $view_revenue_report_opd->Card->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_opd->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_revenue_report_opd->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_opd_list->RowCnt ?>_view_revenue_report_opd_HospID" class="view_revenue_report_opd_HospID">
<span<?php echo $view_revenue_report_opd->HospID->viewAttributes() ?>>
<?php echo $view_revenue_report_opd->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_revenue_report_opd_list->ListOptions->render("body", "right", $view_revenue_report_opd_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_revenue_report_opd->isGridAdd())
		$view_revenue_report_opd_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_revenue_report_opd->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_revenue_report_opd_list->Recordset)
	$view_revenue_report_opd_list->Recordset->Close();
?>
<?php if (!$view_revenue_report_opd->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_revenue_report_opd->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_revenue_report_opd_list->Pager)) $view_revenue_report_opd_list->Pager = new NumericPager($view_revenue_report_opd_list->StartRec, $view_revenue_report_opd_list->DisplayRecs, $view_revenue_report_opd_list->TotalRecs, $view_revenue_report_opd_list->RecRange, $view_revenue_report_opd_list->AutoHidePager) ?>
<?php if ($view_revenue_report_opd_list->Pager->RecordCount > 0 && $view_revenue_report_opd_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_revenue_report_opd_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_opd_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_revenue_report_opd_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_revenue_report_opd_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_opd_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_opd_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_opd_list->pageUrl() ?>start=<?php echo $view_revenue_report_opd_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_revenue_report_opd_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_revenue_report_opd_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_revenue_report_opd_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_revenue_report_opd_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_revenue_report_opd_list->TotalRecs > 0 && (!$view_revenue_report_opd_list->AutoHidePageSizeSelector || $view_revenue_report_opd_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_revenue_report_opd">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_revenue_report_opd_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_revenue_report_opd_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_revenue_report_opd_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_revenue_report_opd_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_revenue_report_opd_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_revenue_report_opd_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_revenue_report_opd->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_opd_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_revenue_report_opd_list->TotalRecs == 0 && !$view_revenue_report_opd->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_opd_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_revenue_report_opd_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_revenue_report_opd->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_revenue_report_opd->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_revenue_report_opd", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_revenue_report_opd_list->terminate();
?>