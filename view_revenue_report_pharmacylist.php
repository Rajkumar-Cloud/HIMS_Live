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
$view_revenue_report_pharmacy_list = new view_revenue_report_pharmacy_list();

// Run the page
$view_revenue_report_pharmacy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_revenue_report_pharmacy_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_revenue_report_pharmacy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_revenue_report_pharmacylist = currentForm = new ew.Form("fview_revenue_report_pharmacylist", "list");
fview_revenue_report_pharmacylist.formKeyCountName = '<?php echo $view_revenue_report_pharmacy_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_revenue_report_pharmacylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_revenue_report_pharmacylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_revenue_report_pharmacylistsrch = currentSearchForm = new ew.Form("fview_revenue_report_pharmacylistsrch");

// Validate function for search
fview_revenue_report_pharmacylistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_DATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_revenue_report_pharmacy->DATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_revenue_report_pharmacylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_revenue_report_pharmacylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_revenue_report_pharmacylistsrch.filterList = <?php echo $view_revenue_report_pharmacy_list->getFilterList() ?>;
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
<?php if (!$view_revenue_report_pharmacy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_revenue_report_pharmacy_list->TotalRecs > 0 && $view_revenue_report_pharmacy_list->ExportOptions->visible()) { ?>
<?php $view_revenue_report_pharmacy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->ImportOptions->visible()) { ?>
<?php $view_revenue_report_pharmacy_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->SearchOptions->visible()) { ?>
<?php $view_revenue_report_pharmacy_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->FilterOptions->visible()) { ?>
<?php $view_revenue_report_pharmacy_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_revenue_report_pharmacy_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_revenue_report_pharmacy->isExport() && !$view_revenue_report_pharmacy->CurrentAction) { ?>
<form name="fview_revenue_report_pharmacylistsrch" id="fview_revenue_report_pharmacylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_revenue_report_pharmacy_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_revenue_report_pharmacylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_revenue_report_pharmacy">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_revenue_report_pharmacy_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_revenue_report_pharmacy->RowType = ROWTYPE_SEARCH;

// Render row
$view_revenue_report_pharmacy->resetAttributes();
$view_revenue_report_pharmacy_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_revenue_report_pharmacy->DATE->Visible) { // DATE ?>
	<div id="xsc_DATE" class="ew-cell form-group">
		<label for="x_DATE" class="ew-search-caption ew-label"><?php echo $view_revenue_report_pharmacy->DATE->caption() ?></label>
		<span class="ew-search-operator"><select name="z_DATE" id="z_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_revenue_report_pharmacy->DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_revenue_report_pharmacy" data-field="x_DATE" name="x_DATE" id="x_DATE" placeholder="<?php echo HtmlEncode($view_revenue_report_pharmacy->DATE->getPlaceHolder()) ?>" value="<?php echo $view_revenue_report_pharmacy->DATE->EditValue ?>"<?php echo $view_revenue_report_pharmacy->DATE->editAttributes() ?>>
<?php if (!$view_revenue_report_pharmacy->DATE->ReadOnly && !$view_revenue_report_pharmacy->DATE->Disabled && !isset($view_revenue_report_pharmacy->DATE->EditAttrs["readonly"]) && !isset($view_revenue_report_pharmacy->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_revenue_report_pharmacylistsrch", "x_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_DATE style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_DATE style="d-none"">
<input type="text" data-table="view_revenue_report_pharmacy" data-field="x_DATE" name="y_DATE" id="y_DATE" placeholder="<?php echo HtmlEncode($view_revenue_report_pharmacy->DATE->getPlaceHolder()) ?>" value="<?php echo $view_revenue_report_pharmacy->DATE->EditValue2 ?>"<?php echo $view_revenue_report_pharmacy->DATE->editAttributes() ?>>
<?php if (!$view_revenue_report_pharmacy->DATE->ReadOnly && !$view_revenue_report_pharmacy->DATE->Disabled && !isset($view_revenue_report_pharmacy->DATE->EditAttrs["readonly"]) && !isset($view_revenue_report_pharmacy->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_revenue_report_pharmacylistsrch", "y_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_revenue_report_pharmacy_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_revenue_report_pharmacy_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_revenue_report_pharmacy_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_revenue_report_pharmacy_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_pharmacy_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_pharmacy_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_revenue_report_pharmacy_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_revenue_report_pharmacy_list->showPageHeader(); ?>
<?php
$view_revenue_report_pharmacy_list->showMessage();
?>
<?php if ($view_revenue_report_pharmacy_list->TotalRecs > 0 || $view_revenue_report_pharmacy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_revenue_report_pharmacy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_revenue_report_pharmacy">
<?php if (!$view_revenue_report_pharmacy->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_revenue_report_pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_revenue_report_pharmacy_list->Pager)) $view_revenue_report_pharmacy_list->Pager = new NumericPager($view_revenue_report_pharmacy_list->StartRec, $view_revenue_report_pharmacy_list->DisplayRecs, $view_revenue_report_pharmacy_list->TotalRecs, $view_revenue_report_pharmacy_list->RecRange, $view_revenue_report_pharmacy_list->AutoHidePager) ?>
<?php if ($view_revenue_report_pharmacy_list->Pager->RecordCount > 0 && $view_revenue_report_pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_revenue_report_pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_revenue_report_pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_revenue_report_pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_revenue_report_pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_revenue_report_pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_revenue_report_pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->TotalRecs > 0 && (!$view_revenue_report_pharmacy_list->AutoHidePageSizeSelector || $view_revenue_report_pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_revenue_report_pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_revenue_report_pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_revenue_report_pharmacylist" id="fview_revenue_report_pharmacylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_revenue_report_pharmacy_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_revenue_report_pharmacy_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_revenue_report_pharmacy">
<div id="gmp_view_revenue_report_pharmacy" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_revenue_report_pharmacy_list->TotalRecs > 0 || $view_revenue_report_pharmacy->isGridEdit()) { ?>
<table id="tbl_view_revenue_report_pharmacylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_revenue_report_pharmacy_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_revenue_report_pharmacy_list->renderListOptions();

// Render list options (header, left)
$view_revenue_report_pharmacy_list->ListOptions->render("header", "left");
?>
<?php if ($view_revenue_report_pharmacy->DATE->Visible) { // DATE ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->DATE) == "") { ?>
		<th data-name="DATE" class="<?php echo $view_revenue_report_pharmacy->DATE->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_DATE" class="view_revenue_report_pharmacy_DATE"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATE" class="<?php echo $view_revenue_report_pharmacy->DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->DATE) ?>',1);"><div id="elh_view_revenue_report_pharmacy_DATE" class="view_revenue_report_pharmacy_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_revenue_report_pharmacy->BillNumber->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_BillNumber" class="view_revenue_report_pharmacy_BillNumber"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_revenue_report_pharmacy->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->BillNumber) ?>',1);"><div id="elh_view_revenue_report_pharmacy_BillNumber" class="view_revenue_report_pharmacy_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->PatientId->Visible) { // PatientId ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_revenue_report_pharmacy->PatientId->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_PatientId" class="view_revenue_report_pharmacy_PatientId"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_revenue_report_pharmacy->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->PatientId) ?>',1);"><div id="elh_view_revenue_report_pharmacy_PatientId" class="view_revenue_report_pharmacy_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->TAXABLE_525->Visible) { // TAXABLE 5% ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->TAXABLE_525) == "") { ?>
		<th data-name="TAXABLE_525" class="<?php echo $view_revenue_report_pharmacy->TAXABLE_525->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_TAXABLE_525" class="view_revenue_report_pharmacy_TAXABLE_525"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->TAXABLE_525->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXABLE_525" class="<?php echo $view_revenue_report_pharmacy->TAXABLE_525->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->TAXABLE_525) ?>',1);"><div id="elh_view_revenue_report_pharmacy_TAXABLE_525" class="view_revenue_report_pharmacy_TAXABLE_525">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->TAXABLE_525->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->TAXABLE_525->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->TAXABLE_525->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->TAXABLE_1225->Visible) { // TAXABLE 12% ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->TAXABLE_1225) == "") { ?>
		<th data-name="TAXABLE_1225" class="<?php echo $view_revenue_report_pharmacy->TAXABLE_1225->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_TAXABLE_1225" class="view_revenue_report_pharmacy_TAXABLE_1225"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->TAXABLE_1225->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXABLE_1225" class="<?php echo $view_revenue_report_pharmacy->TAXABLE_1225->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->TAXABLE_1225) ?>',1);"><div id="elh_view_revenue_report_pharmacy_TAXABLE_1225" class="view_revenue_report_pharmacy_TAXABLE_1225">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->TAXABLE_1225->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->TAXABLE_1225->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->TAXABLE_1225->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->TAXABLE_1825->Visible) { // TAXABLE 18% ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->TAXABLE_1825) == "") { ?>
		<th data-name="TAXABLE_1825" class="<?php echo $view_revenue_report_pharmacy->TAXABLE_1825->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_TAXABLE_1825" class="view_revenue_report_pharmacy_TAXABLE_1825"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->TAXABLE_1825->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TAXABLE_1825" class="<?php echo $view_revenue_report_pharmacy->TAXABLE_1825->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->TAXABLE_1825) ?>',1);"><div id="elh_view_revenue_report_pharmacy_TAXABLE_1825" class="view_revenue_report_pharmacy_TAXABLE_1825">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->TAXABLE_1825->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->TAXABLE_1825->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->TAXABLE_1825->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->Amount->Visible) { // Amount ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_revenue_report_pharmacy->Amount->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Amount" class="view_revenue_report_pharmacy_Amount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_revenue_report_pharmacy->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->Amount) ?>',1);"><div id="elh_view_revenue_report_pharmacy_Amount" class="view_revenue_report_pharmacy_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_revenue_report_pharmacy->ModeofPayment->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_ModeofPayment" class="view_revenue_report_pharmacy_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_revenue_report_pharmacy->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->ModeofPayment) ?>',1);"><div id="elh_view_revenue_report_pharmacy_ModeofPayment" class="view_revenue_report_pharmacy_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->Cash->Visible) { // Cash ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $view_revenue_report_pharmacy->Cash->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Cash" class="view_revenue_report_pharmacy_Cash"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $view_revenue_report_pharmacy->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->Cash) ?>',1);"><div id="elh_view_revenue_report_pharmacy_Cash" class="view_revenue_report_pharmacy_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->Card->Visible) { // Card ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_revenue_report_pharmacy->Card->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Card" class="view_revenue_report_pharmacy_Card"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_revenue_report_pharmacy->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->Card) ?>',1);"><div id="elh_view_revenue_report_pharmacy_Card" class="view_revenue_report_pharmacy_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->DiscountAmount->Visible) { // DiscountAmount ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->DiscountAmount) == "") { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_revenue_report_pharmacy->DiscountAmount->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_DiscountAmount" class="view_revenue_report_pharmacy_DiscountAmount"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->DiscountAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_revenue_report_pharmacy->DiscountAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->DiscountAmount) ?>',1);"><div id="elh_view_revenue_report_pharmacy_DiscountAmount" class="view_revenue_report_pharmacy_DiscountAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->DiscountAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->DiscountAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->DiscountAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->DiscountRemarks) == "") { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_revenue_report_pharmacy->DiscountRemarks->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_DiscountRemarks" class="view_revenue_report_pharmacy_DiscountRemarks"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->DiscountRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_revenue_report_pharmacy->DiscountRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->DiscountRemarks) ?>',1);"><div id="elh_view_revenue_report_pharmacy_DiscountRemarks" class="view_revenue_report_pharmacy_DiscountRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->DiscountRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->DiscountRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->DiscountRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->Remarks->Visible) { // Remarks ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_revenue_report_pharmacy->Remarks->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_Remarks" class="view_revenue_report_pharmacy_Remarks"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_revenue_report_pharmacy->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->Remarks) ?>',1);"><div id="elh_view_revenue_report_pharmacy_Remarks" class="view_revenue_report_pharmacy_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_revenue_report_pharmacy->HospID->Visible) { // HospID ?>
	<?php if ($view_revenue_report_pharmacy->sortUrl($view_revenue_report_pharmacy->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_revenue_report_pharmacy->HospID->headerCellClass() ?>"><div id="elh_view_revenue_report_pharmacy_HospID" class="view_revenue_report_pharmacy_HospID"><div class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_revenue_report_pharmacy->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_revenue_report_pharmacy->SortUrl($view_revenue_report_pharmacy->HospID) ?>',1);"><div id="elh_view_revenue_report_pharmacy_HospID" class="view_revenue_report_pharmacy_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_revenue_report_pharmacy->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_revenue_report_pharmacy->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_revenue_report_pharmacy->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_revenue_report_pharmacy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_revenue_report_pharmacy->ExportAll && $view_revenue_report_pharmacy->isExport()) {
	$view_revenue_report_pharmacy_list->StopRec = $view_revenue_report_pharmacy_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_revenue_report_pharmacy_list->TotalRecs > $view_revenue_report_pharmacy_list->StartRec + $view_revenue_report_pharmacy_list->DisplayRecs - 1)
		$view_revenue_report_pharmacy_list->StopRec = $view_revenue_report_pharmacy_list->StartRec + $view_revenue_report_pharmacy_list->DisplayRecs - 1;
	else
		$view_revenue_report_pharmacy_list->StopRec = $view_revenue_report_pharmacy_list->TotalRecs;
}
$view_revenue_report_pharmacy_list->RecCnt = $view_revenue_report_pharmacy_list->StartRec - 1;
if ($view_revenue_report_pharmacy_list->Recordset && !$view_revenue_report_pharmacy_list->Recordset->EOF) {
	$view_revenue_report_pharmacy_list->Recordset->moveFirst();
	$selectLimit = $view_revenue_report_pharmacy_list->UseSelectLimit;
	if (!$selectLimit && $view_revenue_report_pharmacy_list->StartRec > 1)
		$view_revenue_report_pharmacy_list->Recordset->move($view_revenue_report_pharmacy_list->StartRec - 1);
} elseif (!$view_revenue_report_pharmacy->AllowAddDeleteRow && $view_revenue_report_pharmacy_list->StopRec == 0) {
	$view_revenue_report_pharmacy_list->StopRec = $view_revenue_report_pharmacy->GridAddRowCount;
}

// Initialize aggregate
$view_revenue_report_pharmacy->RowType = ROWTYPE_AGGREGATEINIT;
$view_revenue_report_pharmacy->resetAttributes();
$view_revenue_report_pharmacy_list->renderRow();
while ($view_revenue_report_pharmacy_list->RecCnt < $view_revenue_report_pharmacy_list->StopRec) {
	$view_revenue_report_pharmacy_list->RecCnt++;
	if ($view_revenue_report_pharmacy_list->RecCnt >= $view_revenue_report_pharmacy_list->StartRec) {
		$view_revenue_report_pharmacy_list->RowCnt++;

		// Set up key count
		$view_revenue_report_pharmacy_list->KeyCount = $view_revenue_report_pharmacy_list->RowIndex;

		// Init row class and style
		$view_revenue_report_pharmacy->resetAttributes();
		$view_revenue_report_pharmacy->CssClass = "";
		if ($view_revenue_report_pharmacy->isGridAdd()) {
		} else {
			$view_revenue_report_pharmacy_list->loadRowValues($view_revenue_report_pharmacy_list->Recordset); // Load row values
		}
		$view_revenue_report_pharmacy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_revenue_report_pharmacy->RowAttrs = array_merge($view_revenue_report_pharmacy->RowAttrs, array('data-rowindex'=>$view_revenue_report_pharmacy_list->RowCnt, 'id'=>'r' . $view_revenue_report_pharmacy_list->RowCnt . '_view_revenue_report_pharmacy', 'data-rowtype'=>$view_revenue_report_pharmacy->RowType));

		// Render row
		$view_revenue_report_pharmacy_list->renderRow();

		// Render list options
		$view_revenue_report_pharmacy_list->renderListOptions();
?>
	<tr<?php echo $view_revenue_report_pharmacy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_revenue_report_pharmacy_list->ListOptions->render("body", "left", $view_revenue_report_pharmacy_list->RowCnt);
?>
	<?php if ($view_revenue_report_pharmacy->DATE->Visible) { // DATE ?>
		<td data-name="DATE"<?php echo $view_revenue_report_pharmacy->DATE->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_DATE" class="view_revenue_report_pharmacy_DATE">
<span<?php echo $view_revenue_report_pharmacy->DATE->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_revenue_report_pharmacy->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_BillNumber" class="view_revenue_report_pharmacy_BillNumber">
<span<?php echo $view_revenue_report_pharmacy->BillNumber->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_revenue_report_pharmacy->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_PatientId" class="view_revenue_report_pharmacy_PatientId">
<span<?php echo $view_revenue_report_pharmacy->PatientId->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->TAXABLE_525->Visible) { // TAXABLE 5% ?>
		<td data-name="TAXABLE_525"<?php echo $view_revenue_report_pharmacy->TAXABLE_525->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_TAXABLE_525" class="view_revenue_report_pharmacy_TAXABLE_525">
<span<?php echo $view_revenue_report_pharmacy->TAXABLE_525->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->TAXABLE_525->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->TAXABLE_1225->Visible) { // TAXABLE 12% ?>
		<td data-name="TAXABLE_1225"<?php echo $view_revenue_report_pharmacy->TAXABLE_1225->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_TAXABLE_1225" class="view_revenue_report_pharmacy_TAXABLE_1225">
<span<?php echo $view_revenue_report_pharmacy->TAXABLE_1225->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->TAXABLE_1225->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->TAXABLE_1825->Visible) { // TAXABLE 18% ?>
		<td data-name="TAXABLE_1825"<?php echo $view_revenue_report_pharmacy->TAXABLE_1825->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_TAXABLE_1825" class="view_revenue_report_pharmacy_TAXABLE_1825">
<span<?php echo $view_revenue_report_pharmacy->TAXABLE_1825->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->TAXABLE_1825->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_revenue_report_pharmacy->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_Amount" class="view_revenue_report_pharmacy_Amount">
<span<?php echo $view_revenue_report_pharmacy->Amount->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_revenue_report_pharmacy->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_ModeofPayment" class="view_revenue_report_pharmacy_ModeofPayment">
<span<?php echo $view_revenue_report_pharmacy->ModeofPayment->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $view_revenue_report_pharmacy->Cash->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_Cash" class="view_revenue_report_pharmacy_Cash">
<span<?php echo $view_revenue_report_pharmacy->Cash->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_revenue_report_pharmacy->Card->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_Card" class="view_revenue_report_pharmacy_Card">
<span<?php echo $view_revenue_report_pharmacy->Card->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount"<?php echo $view_revenue_report_pharmacy->DiscountAmount->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_DiscountAmount" class="view_revenue_report_pharmacy_DiscountAmount">
<span<?php echo $view_revenue_report_pharmacy->DiscountAmount->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->DiscountAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td data-name="DiscountRemarks"<?php echo $view_revenue_report_pharmacy->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_DiscountRemarks" class="view_revenue_report_pharmacy_DiscountRemarks">
<span<?php echo $view_revenue_report_pharmacy->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $view_revenue_report_pharmacy->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_Remarks" class="view_revenue_report_pharmacy_Remarks">
<span<?php echo $view_revenue_report_pharmacy->Remarks->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_revenue_report_pharmacy->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_revenue_report_pharmacy_list->RowCnt ?>_view_revenue_report_pharmacy_HospID" class="view_revenue_report_pharmacy_HospID">
<span<?php echo $view_revenue_report_pharmacy->HospID->viewAttributes() ?>>
<?php echo $view_revenue_report_pharmacy->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_revenue_report_pharmacy_list->ListOptions->render("body", "right", $view_revenue_report_pharmacy_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_revenue_report_pharmacy->isGridAdd())
		$view_revenue_report_pharmacy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_revenue_report_pharmacy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_revenue_report_pharmacy_list->Recordset)
	$view_revenue_report_pharmacy_list->Recordset->Close();
?>
<?php if (!$view_revenue_report_pharmacy->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_revenue_report_pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_revenue_report_pharmacy_list->Pager)) $view_revenue_report_pharmacy_list->Pager = new NumericPager($view_revenue_report_pharmacy_list->StartRec, $view_revenue_report_pharmacy_list->DisplayRecs, $view_revenue_report_pharmacy_list->TotalRecs, $view_revenue_report_pharmacy_list->RecRange, $view_revenue_report_pharmacy_list->AutoHidePager) ?>
<?php if ($view_revenue_report_pharmacy_list->Pager->RecordCount > 0 && $view_revenue_report_pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_revenue_report_pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_revenue_report_pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_revenue_report_pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_revenue_report_pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_revenue_report_pharmacy_list->pageUrl() ?>start=<?php echo $view_revenue_report_pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_revenue_report_pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_revenue_report_pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_revenue_report_pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->TotalRecs > 0 && (!$view_revenue_report_pharmacy_list->AutoHidePageSizeSelector || $view_revenue_report_pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_revenue_report_pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_revenue_report_pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_revenue_report_pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_pharmacy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_revenue_report_pharmacy_list->TotalRecs == 0 && !$view_revenue_report_pharmacy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_revenue_report_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_revenue_report_pharmacy_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_revenue_report_pharmacy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_revenue_report_pharmacy->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_revenue_report_pharmacy", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_revenue_report_pharmacy_list->terminate();
?>