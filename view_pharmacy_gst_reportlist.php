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
$view_pharmacy_gst_report_list = new view_pharmacy_gst_report_list();

// Run the page
$view_pharmacy_gst_report_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_gst_report_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_gst_report->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_gst_reportlist = currentForm = new ew.Form("fview_pharmacy_gst_reportlist", "list");
fview_pharmacy_gst_reportlist.formKeyCountName = '<?php echo $view_pharmacy_gst_report_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_gst_reportlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_gst_reportlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_gst_reportlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_gst_reportlistsrch");

// Validate function for search
fview_pharmacy_gst_reportlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_DATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_gst_report->DATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_gst_reportlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_gst_reportlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_gst_reportlistsrch.filterList = <?php echo $view_pharmacy_gst_report_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_gst_report->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_gst_report_list->TotalRecs > 0 && $view_pharmacy_gst_report_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_gst_report_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_gst_report_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_gst_report_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_gst_report_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_gst_report_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_gst_report->isExport() && !$view_pharmacy_gst_report->CurrentAction) { ?>
<form name="fview_pharmacy_gst_reportlistsrch" id="fview_pharmacy_gst_reportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_gst_report_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_gst_reportlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_gst_report">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_gst_report_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_gst_report->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_gst_report->resetAttributes();
$view_pharmacy_gst_report_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_gst_report->DATE->Visible) { // DATE ?>
	<div id="xsc_DATE" class="ew-cell form-group">
		<label for="x_DATE" class="ew-search-caption ew-label"><?php echo $view_pharmacy_gst_report->DATE->caption() ?></label>
		<span class="ew-search-operator"><select name="z_DATE" id="z_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_gst_report->DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_gst_report" data-field="x_DATE" name="x_DATE" id="x_DATE" placeholder="<?php echo HtmlEncode($view_pharmacy_gst_report->DATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_gst_report->DATE->EditValue ?>"<?php echo $view_pharmacy_gst_report->DATE->editAttributes() ?>>
<?php if (!$view_pharmacy_gst_report->DATE->ReadOnly && !$view_pharmacy_gst_report->DATE->Disabled && !isset($view_pharmacy_gst_report->DATE->EditAttrs["readonly"]) && !isset($view_pharmacy_gst_report->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_gst_reportlistsrch", "x_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_DATE style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_DATE style="d-none"">
<input type="text" data-table="view_pharmacy_gst_report" data-field="x_DATE" name="y_DATE" id="y_DATE" placeholder="<?php echo HtmlEncode($view_pharmacy_gst_report->DATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_gst_report->DATE->EditValue2 ?>"<?php echo $view_pharmacy_gst_report->DATE->editAttributes() ?>>
<?php if (!$view_pharmacy_gst_report->DATE->ReadOnly && !$view_pharmacy_gst_report->DATE->Disabled && !isset($view_pharmacy_gst_report->DATE->EditAttrs["readonly"]) && !isset($view_pharmacy_gst_report->DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_gst_reportlistsrch", "y_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_gst_report->BillNumber->Visible) { // BillNumber ?>
	<div id="xsc_BillNumber" class="ew-cell form-group">
		<label for="x_BillNumber" class="ew-search-caption ew-label"><?php echo $view_pharmacy_gst_report->BillNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_gst_report" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_gst_report->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_gst_report->BillNumber->EditValue ?>"<?php echo $view_pharmacy_gst_report->BillNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_gst_report->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_pharmacy_gst_report->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_gst_report" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_gst_report->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_gst_report->PatientId->EditValue ?>"<?php echo $view_pharmacy_gst_report->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_gst_report->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_gst_report->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_gst_report" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_gst_report->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_gst_report->PatientName->EditValue ?>"<?php echo $view_pharmacy_gst_report->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_gst_report_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_gst_report_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_gst_report_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_gst_report_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_gst_report_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_gst_report_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_gst_report_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_gst_report_list->showPageHeader(); ?>
<?php
$view_pharmacy_gst_report_list->showMessage();
?>
<?php if ($view_pharmacy_gst_report_list->TotalRecs > 0 || $view_pharmacy_gst_report->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_gst_report_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_gst_report">
<?php if (!$view_pharmacy_gst_report->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_gst_report->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_gst_report_list->Pager)) $view_pharmacy_gst_report_list->Pager = new NumericPager($view_pharmacy_gst_report_list->StartRec, $view_pharmacy_gst_report_list->DisplayRecs, $view_pharmacy_gst_report_list->TotalRecs, $view_pharmacy_gst_report_list->RecRange, $view_pharmacy_gst_report_list->AutoHidePager) ?>
<?php if ($view_pharmacy_gst_report_list->Pager->RecordCount > 0 && $view_pharmacy_gst_report_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_gst_report_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_gst_report_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_gst_report_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_gst_report_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_gst_report_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_gst_report_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->TotalRecs > 0 && (!$view_pharmacy_gst_report_list->AutoHidePageSizeSelector || $view_pharmacy_gst_report_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_gst_report">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_gst_report->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_gst_report_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_gst_reportlist" id="fview_pharmacy_gst_reportlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_gst_report_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_gst_report_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_gst_report">
<div id="gmp_view_pharmacy_gst_report" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_gst_report_list->TotalRecs > 0 || $view_pharmacy_gst_report->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_gst_reportlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_gst_report_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_gst_report_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_gst_report_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_gst_report->DATE->Visible) { // DATE ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->DATE) == "") { ?>
		<th data-name="DATE" class="<?php echo $view_pharmacy_gst_report->DATE->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_DATE" class="view_pharmacy_gst_report_DATE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATE" class="<?php echo $view_pharmacy_gst_report->DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->DATE) ?>',1);"><div id="elh_view_pharmacy_gst_report_DATE" class="view_pharmacy_gst_report_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_pharmacy_gst_report->BillNumber->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_BillNumber" class="view_pharmacy_gst_report_BillNumber"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_pharmacy_gst_report->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->BillNumber) ?>',1);"><div id="elh_view_pharmacy_gst_report_BillNumber" class="view_pharmacy_gst_report_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->PatientId->Visible) { // PatientId ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_pharmacy_gst_report->PatientId->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_PatientId" class="view_pharmacy_gst_report_PatientId"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_pharmacy_gst_report->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->PatientId) ?>',1);"><div id="elh_view_pharmacy_gst_report_PatientId" class="view_pharmacy_gst_report_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->PatientName->Visible) { // PatientName ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_pharmacy_gst_report->PatientName->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_PatientName" class="view_pharmacy_gst_report_PatientName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_pharmacy_gst_report->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->PatientName) ?>',1);"><div id="elh_view_pharmacy_gst_report_PatientName" class="view_pharmacy_gst_report_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_gst_report->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_Product" class="view_pharmacy_gst_report_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_gst_report->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->Product) ?>',1);"><div id="elh_view_pharmacy_gst_report_Product" class="view_pharmacy_gst_report_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacy_gst_report->HSN->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_HSN" class="view_pharmacy_gst_report_HSN"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacy_gst_report->HSN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->HSN) ?>',1);"><div id="elh_view_pharmacy_gst_report_HSN" class="view_pharmacy_gst_report_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->HSN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->HSN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->HSN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->QTY->Visible) { // QTY ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->QTY) == "") { ?>
		<th data-name="QTY" class="<?php echo $view_pharmacy_gst_report->QTY->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_QTY" class="view_pharmacy_gst_report_QTY"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->QTY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QTY" class="<?php echo $view_pharmacy_gst_report->QTY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->QTY) ?>',1);"><div id="elh_view_pharmacy_gst_report_QTY" class="view_pharmacy_gst_report_QTY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->QTY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->QTY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->QTY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->Amount->Visible) { // Amount ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_pharmacy_gst_report->Amount->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_Amount" class="view_pharmacy_gst_report_Amount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_pharmacy_gst_report->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->Amount) ?>',1);"><div id="elh_view_pharmacy_gst_report_Amount" class="view_pharmacy_gst_report_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->Amount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->TaxableAmount->Visible) { // TaxableAmount ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->TaxableAmount) == "") { ?>
		<th data-name="TaxableAmount" class="<?php echo $view_pharmacy_gst_report->TaxableAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_TaxableAmount" class="view_pharmacy_gst_report_TaxableAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->TaxableAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaxableAmount" class="<?php echo $view_pharmacy_gst_report->TaxableAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->TaxableAmount) ?>',1);"><div id="elh_view_pharmacy_gst_report_TaxableAmount" class="view_pharmacy_gst_report_TaxableAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->TaxableAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->TaxableAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->TaxableAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->SGST->Visible) { // SGST ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->SGST) == "") { ?>
		<th data-name="SGST" class="<?php echo $view_pharmacy_gst_report->SGST->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_SGST" class="view_pharmacy_gst_report_SGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SGST" class="<?php echo $view_pharmacy_gst_report->SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->SGST) ?>',1);"><div id="elh_view_pharmacy_gst_report_SGST" class="view_pharmacy_gst_report_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->SGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->CGST->Visible) { // CGST ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->CGST) == "") { ?>
		<th data-name="CGST" class="<?php echo $view_pharmacy_gst_report->CGST->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_CGST" class="view_pharmacy_gst_report_CGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CGST" class="<?php echo $view_pharmacy_gst_report->CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->CGST) ?>',1);"><div id="elh_view_pharmacy_gst_report_CGST" class="view_pharmacy_gst_report_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->CGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->RateOfTax->Visible) { // RateOfTax ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->RateOfTax) == "") { ?>
		<th data-name="RateOfTax" class="<?php echo $view_pharmacy_gst_report->RateOfTax->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_RateOfTax" class="view_pharmacy_gst_report_RateOfTax"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->RateOfTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RateOfTax" class="<?php echo $view_pharmacy_gst_report->RateOfTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->RateOfTax) ?>',1);"><div id="elh_view_pharmacy_gst_report_RateOfTax" class="view_pharmacy_gst_report_RateOfTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->RateOfTax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->RateOfTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->RateOfTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_gst_report->Total->Visible) { // Total ?>
	<?php if ($view_pharmacy_gst_report->sortUrl($view_pharmacy_gst_report->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $view_pharmacy_gst_report->Total->headerCellClass() ?>"><div id="elh_view_pharmacy_gst_report_Total" class="view_pharmacy_gst_report_Total"><div class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $view_pharmacy_gst_report->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_gst_report->SortUrl($view_pharmacy_gst_report->Total) ?>',1);"><div id="elh_view_pharmacy_gst_report_Total" class="view_pharmacy_gst_report_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_gst_report->Total->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_gst_report->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_gst_report->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_gst_report_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_gst_report->ExportAll && $view_pharmacy_gst_report->isExport()) {
	$view_pharmacy_gst_report_list->StopRec = $view_pharmacy_gst_report_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_gst_report_list->TotalRecs > $view_pharmacy_gst_report_list->StartRec + $view_pharmacy_gst_report_list->DisplayRecs - 1)
		$view_pharmacy_gst_report_list->StopRec = $view_pharmacy_gst_report_list->StartRec + $view_pharmacy_gst_report_list->DisplayRecs - 1;
	else
		$view_pharmacy_gst_report_list->StopRec = $view_pharmacy_gst_report_list->TotalRecs;
}
$view_pharmacy_gst_report_list->RecCnt = $view_pharmacy_gst_report_list->StartRec - 1;
if ($view_pharmacy_gst_report_list->Recordset && !$view_pharmacy_gst_report_list->Recordset->EOF) {
	$view_pharmacy_gst_report_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_gst_report_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_gst_report_list->StartRec > 1)
		$view_pharmacy_gst_report_list->Recordset->move($view_pharmacy_gst_report_list->StartRec - 1);
} elseif (!$view_pharmacy_gst_report->AllowAddDeleteRow && $view_pharmacy_gst_report_list->StopRec == 0) {
	$view_pharmacy_gst_report_list->StopRec = $view_pharmacy_gst_report->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_gst_report->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_gst_report->resetAttributes();
$view_pharmacy_gst_report_list->renderRow();
while ($view_pharmacy_gst_report_list->RecCnt < $view_pharmacy_gst_report_list->StopRec) {
	$view_pharmacy_gst_report_list->RecCnt++;
	if ($view_pharmacy_gst_report_list->RecCnt >= $view_pharmacy_gst_report_list->StartRec) {
		$view_pharmacy_gst_report_list->RowCnt++;

		// Set up key count
		$view_pharmacy_gst_report_list->KeyCount = $view_pharmacy_gst_report_list->RowIndex;

		// Init row class and style
		$view_pharmacy_gst_report->resetAttributes();
		$view_pharmacy_gst_report->CssClass = "";
		if ($view_pharmacy_gst_report->isGridAdd()) {
		} else {
			$view_pharmacy_gst_report_list->loadRowValues($view_pharmacy_gst_report_list->Recordset); // Load row values
		}
		$view_pharmacy_gst_report->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_gst_report->RowAttrs = array_merge($view_pharmacy_gst_report->RowAttrs, array('data-rowindex'=>$view_pharmacy_gst_report_list->RowCnt, 'id'=>'r' . $view_pharmacy_gst_report_list->RowCnt . '_view_pharmacy_gst_report', 'data-rowtype'=>$view_pharmacy_gst_report->RowType));

		// Render row
		$view_pharmacy_gst_report_list->renderRow();

		// Render list options
		$view_pharmacy_gst_report_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_gst_report->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_gst_report_list->ListOptions->render("body", "left", $view_pharmacy_gst_report_list->RowCnt);
?>
	<?php if ($view_pharmacy_gst_report->DATE->Visible) { // DATE ?>
		<td data-name="DATE"<?php echo $view_pharmacy_gst_report->DATE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_DATE" class="view_pharmacy_gst_report_DATE">
<span<?php echo $view_pharmacy_gst_report->DATE->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_pharmacy_gst_report->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_BillNumber" class="view_pharmacy_gst_report_BillNumber">
<span<?php echo $view_pharmacy_gst_report->BillNumber->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_pharmacy_gst_report->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_PatientId" class="view_pharmacy_gst_report_PatientId">
<span<?php echo $view_pharmacy_gst_report->PatientId->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_pharmacy_gst_report->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_PatientName" class="view_pharmacy_gst_report_PatientName">
<span<?php echo $view_pharmacy_gst_report->PatientName->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view_pharmacy_gst_report->Product->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_Product" class="view_pharmacy_gst_report_Product">
<span<?php echo $view_pharmacy_gst_report->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->HSN->Visible) { // HSN ?>
		<td data-name="HSN"<?php echo $view_pharmacy_gst_report->HSN->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_HSN" class="view_pharmacy_gst_report_HSN">
<span<?php echo $view_pharmacy_gst_report->HSN->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->HSN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->QTY->Visible) { // QTY ?>
		<td data-name="QTY"<?php echo $view_pharmacy_gst_report->QTY->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_QTY" class="view_pharmacy_gst_report_QTY">
<span<?php echo $view_pharmacy_gst_report->QTY->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->QTY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_pharmacy_gst_report->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_Amount" class="view_pharmacy_gst_report_Amount">
<span<?php echo $view_pharmacy_gst_report->Amount->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->TaxableAmount->Visible) { // TaxableAmount ?>
		<td data-name="TaxableAmount"<?php echo $view_pharmacy_gst_report->TaxableAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_TaxableAmount" class="view_pharmacy_gst_report_TaxableAmount">
<span<?php echo $view_pharmacy_gst_report->TaxableAmount->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->TaxableAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->SGST->Visible) { // SGST ?>
		<td data-name="SGST"<?php echo $view_pharmacy_gst_report->SGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_SGST" class="view_pharmacy_gst_report_SGST">
<span<?php echo $view_pharmacy_gst_report->SGST->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->CGST->Visible) { // CGST ?>
		<td data-name="CGST"<?php echo $view_pharmacy_gst_report->CGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_CGST" class="view_pharmacy_gst_report_CGST">
<span<?php echo $view_pharmacy_gst_report->CGST->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->RateOfTax->Visible) { // RateOfTax ?>
		<td data-name="RateOfTax"<?php echo $view_pharmacy_gst_report->RateOfTax->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_RateOfTax" class="view_pharmacy_gst_report_RateOfTax">
<span<?php echo $view_pharmacy_gst_report->RateOfTax->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->RateOfTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $view_pharmacy_gst_report->Total->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_gst_report_list->RowCnt ?>_view_pharmacy_gst_report_Total" class="view_pharmacy_gst_report_Total">
<span<?php echo $view_pharmacy_gst_report->Total->viewAttributes() ?>>
<?php echo $view_pharmacy_gst_report->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_gst_report_list->ListOptions->render("body", "right", $view_pharmacy_gst_report_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_gst_report->isGridAdd())
		$view_pharmacy_gst_report_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_gst_report->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_gst_report_list->Recordset)
	$view_pharmacy_gst_report_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_gst_report->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_gst_report->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_gst_report_list->Pager)) $view_pharmacy_gst_report_list->Pager = new NumericPager($view_pharmacy_gst_report_list->StartRec, $view_pharmacy_gst_report_list->DisplayRecs, $view_pharmacy_gst_report_list->TotalRecs, $view_pharmacy_gst_report_list->RecRange, $view_pharmacy_gst_report_list->AutoHidePager) ?>
<?php if ($view_pharmacy_gst_report_list->Pager->RecordCount > 0 && $view_pharmacy_gst_report_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_gst_report_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_gst_report_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_gst_report_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_gst_report_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_gst_report_list->pageUrl() ?>start=<?php echo $view_pharmacy_gst_report_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_gst_report_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_gst_report_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_gst_report_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->TotalRecs > 0 && (!$view_pharmacy_gst_report_list->AutoHidePageSizeSelector || $view_pharmacy_gst_report_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_gst_report">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_gst_report_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_gst_report->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_gst_report_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_gst_report_list->TotalRecs == 0 && !$view_pharmacy_gst_report->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_gst_report_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_gst_report_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_gst_report->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_gst_report->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_gst_report", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_gst_report_list->terminate();
?>