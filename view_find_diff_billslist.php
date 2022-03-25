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
$view_find_diff_bills_list = new view_find_diff_bills_list();

// Run the page
$view_find_diff_bills_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_find_diff_bills_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_find_diff_bills->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_find_diff_billslist = currentForm = new ew.Form("fview_find_diff_billslist", "list");
fview_find_diff_billslist.formKeyCountName = '<?php echo $view_find_diff_bills_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_find_diff_billslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_find_diff_billslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_find_diff_billslistsrch = currentSearchForm = new ew.Form("fview_find_diff_billslistsrch");

// Validate function for search
fview_find_diff_billslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_diff");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_find_diff_bills->diff->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_find_diff_bills->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_find_diff_billslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_find_diff_billslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_find_diff_billslistsrch.filterList = <?php echo $view_find_diff_bills_list->getFilterList() ?>;
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
<?php if (!$view_find_diff_bills->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_find_diff_bills_list->TotalRecs > 0 && $view_find_diff_bills_list->ExportOptions->visible()) { ?>
<?php $view_find_diff_bills_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->ImportOptions->visible()) { ?>
<?php $view_find_diff_bills_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->SearchOptions->visible()) { ?>
<?php $view_find_diff_bills_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->FilterOptions->visible()) { ?>
<?php $view_find_diff_bills_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_find_diff_bills_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_find_diff_bills->isExport() && !$view_find_diff_bills->CurrentAction) { ?>
<form name="fview_find_diff_billslistsrch" id="fview_find_diff_billslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_find_diff_bills_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_find_diff_billslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_find_diff_bills">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_find_diff_bills_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_find_diff_bills->RowType = ROWTYPE_SEARCH;

// Render row
$view_find_diff_bills->resetAttributes();
$view_find_diff_bills_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_find_diff_bills->diff->Visible) { // diff ?>
	<div id="xsc_diff" class="ew-cell form-group">
		<label for="x_diff" class="ew-search-caption ew-label"><?php echo $view_find_diff_bills->diff->caption() ?></label>
		<span class="ew-search-operator"><select name="z_diff" id="z_diff" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_find_diff_bills->diff->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_find_diff_bills" data-field="x_diff" name="x_diff" id="x_diff" size="30" placeholder="<?php echo HtmlEncode($view_find_diff_bills->diff->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills->diff->EditValue ?>"<?php echo $view_find_diff_bills->diff->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_diff style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_diff style="d-none"">
<input type="text" data-table="view_find_diff_bills" data-field="x_diff" name="y_diff" id="y_diff" size="30" placeholder="<?php echo HtmlEncode($view_find_diff_bills->diff->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills->diff->EditValue2 ?>"<?php echo $view_find_diff_bills->diff->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_find_diff_bills->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $view_find_diff_bills->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_find_diff_bills->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_find_diff_bills" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_find_diff_bills->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills->createddatetime->EditValue ?>"<?php echo $view_find_diff_bills->createddatetime->editAttributes() ?>>
<?php if (!$view_find_diff_bills->createddatetime->ReadOnly && !$view_find_diff_bills->createddatetime->Disabled && !isset($view_find_diff_bills->createddatetime->EditAttrs["readonly"]) && !isset($view_find_diff_bills->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_find_diff_billslistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="view_find_diff_bills" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_find_diff_bills->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills->createddatetime->EditValue2 ?>"<?php echo $view_find_diff_bills->createddatetime->editAttributes() ?>>
<?php if (!$view_find_diff_bills->createddatetime->ReadOnly && !$view_find_diff_bills->createddatetime->Disabled && !isset($view_find_diff_bills->createddatetime->EditAttrs["readonly"]) && !isset($view_find_diff_bills->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_find_diff_billslistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_find_diff_bills_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_find_diff_bills_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_find_diff_bills_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_find_diff_bills_list->showPageHeader(); ?>
<?php
$view_find_diff_bills_list->showMessage();
?>
<?php if ($view_find_diff_bills_list->TotalRecs > 0 || $view_find_diff_bills->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_find_diff_bills_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_find_diff_bills">
<?php if (!$view_find_diff_bills->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_find_diff_bills->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_find_diff_bills_list->Pager)) $view_find_diff_bills_list->Pager = new NumericPager($view_find_diff_bills_list->StartRec, $view_find_diff_bills_list->DisplayRecs, $view_find_diff_bills_list->TotalRecs, $view_find_diff_bills_list->RecRange, $view_find_diff_bills_list->AutoHidePager) ?>
<?php if ($view_find_diff_bills_list->Pager->RecordCount > 0 && $view_find_diff_bills_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_find_diff_bills_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_find_diff_bills_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_find_diff_bills_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_find_diff_bills_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_find_diff_bills_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_find_diff_bills_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_find_diff_bills_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_find_diff_bills_list->TotalRecs > 0 && (!$view_find_diff_bills_list->AutoHidePageSizeSelector || $view_find_diff_bills_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_find_diff_bills">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_find_diff_bills_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_find_diff_bills_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_find_diff_bills_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_find_diff_bills_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_find_diff_bills_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_find_diff_bills_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_find_diff_bills->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_find_diff_bills_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_find_diff_billslist" id="fview_find_diff_billslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_find_diff_bills_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_find_diff_bills_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_find_diff_bills">
<div id="gmp_view_find_diff_bills" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_find_diff_bills_list->TotalRecs > 0 || $view_find_diff_bills->isGridEdit()) { ?>
<table id="tbl_view_find_diff_billslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_find_diff_bills_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_find_diff_bills_list->renderListOptions();

// Render list options (header, left)
$view_find_diff_bills_list->ListOptions->render("header", "left");
?>
<?php if ($view_find_diff_bills->PatientId->Visible) { // PatientId ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_find_diff_bills->PatientId->headerCellClass() ?>"><div id="elh_view_find_diff_bills_PatientId" class="view_find_diff_bills_PatientId"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_find_diff_bills->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->PatientId) ?>',1);"><div id="elh_view_find_diff_bills_PatientId" class="view_find_diff_bills_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->PatientName->Visible) { // PatientName ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_find_diff_bills->PatientName->headerCellClass() ?>"><div id="elh_view_find_diff_bills_PatientName" class="view_find_diff_bills_PatientName"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_find_diff_bills->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->PatientName) ?>',1);"><div id="elh_view_find_diff_bills_PatientName" class="view_find_diff_bills_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_find_diff_bills->BillNumber->headerCellClass() ?>"><div id="elh_view_find_diff_bills_BillNumber" class="view_find_diff_bills_BillNumber"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_find_diff_bills->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->BillNumber) ?>',1);"><div id="elh_view_find_diff_bills_BillNumber" class="view_find_diff_bills_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->Amount->Visible) { // Amount ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_find_diff_bills->Amount->headerCellClass() ?>"><div id="elh_view_find_diff_bills_Amount" class="view_find_diff_bills_Amount"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_find_diff_bills->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->Amount) ?>',1);"><div id="elh_view_find_diff_bills_Amount" class="view_find_diff_bills_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->sum28b_amount29->Visible) { // sum(b.amount) ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->sum28b_amount29) == "") { ?>
		<th data-name="sum28b_amount29" class="<?php echo $view_find_diff_bills->sum28b_amount29->headerCellClass() ?>"><div id="elh_view_find_diff_bills_sum28b_amount29" class="view_find_diff_bills_sum28b_amount29"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->sum28b_amount29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28b_amount29" class="<?php echo $view_find_diff_bills->sum28b_amount29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->sum28b_amount29) ?>',1);"><div id="elh_view_find_diff_bills_sum28b_amount29" class="view_find_diff_bills_sum28b_amount29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->sum28b_amount29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->sum28b_amount29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->sum28b_amount29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->diff->Visible) { // diff ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->diff) == "") { ?>
		<th data-name="diff" class="<?php echo $view_find_diff_bills->diff->headerCellClass() ?>"><div id="elh_view_find_diff_bills_diff" class="view_find_diff_bills_diff"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->diff->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="diff" class="<?php echo $view_find_diff_bills->diff->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->diff) ?>',1);"><div id="elh_view_find_diff_bills_diff" class="view_find_diff_bills_diff">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->diff->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->diff->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->diff->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->HospID->Visible) { // HospID ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_find_diff_bills->HospID->headerCellClass() ?>"><div id="elh_view_find_diff_bills_HospID" class="view_find_diff_bills_HospID"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_find_diff_bills->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->HospID) ?>',1);"><div id="elh_view_find_diff_bills_HospID" class="view_find_diff_bills_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_find_diff_bills->createddatetime->headerCellClass() ?>"><div id="elh_view_find_diff_bills_createddatetime" class="view_find_diff_bills_createddatetime"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_find_diff_bills->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->createddatetime) ?>',1);"><div id="elh_view_find_diff_bills_createddatetime" class="view_find_diff_bills_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills->createdby->Visible) { // createdby ?>
	<?php if ($view_find_diff_bills->sortUrl($view_find_diff_bills->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_find_diff_bills->createdby->headerCellClass() ?>"><div id="elh_view_find_diff_bills_createdby" class="view_find_diff_bills_createdby"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_find_diff_bills->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_find_diff_bills->SortUrl($view_find_diff_bills->createdby) ?>',1);"><div id="elh_view_find_diff_bills_createdby" class="view_find_diff_bills_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_find_diff_bills->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_find_diff_bills_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_find_diff_bills->ExportAll && $view_find_diff_bills->isExport()) {
	$view_find_diff_bills_list->StopRec = $view_find_diff_bills_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_find_diff_bills_list->TotalRecs > $view_find_diff_bills_list->StartRec + $view_find_diff_bills_list->DisplayRecs - 1)
		$view_find_diff_bills_list->StopRec = $view_find_diff_bills_list->StartRec + $view_find_diff_bills_list->DisplayRecs - 1;
	else
		$view_find_diff_bills_list->StopRec = $view_find_diff_bills_list->TotalRecs;
}
$view_find_diff_bills_list->RecCnt = $view_find_diff_bills_list->StartRec - 1;
if ($view_find_diff_bills_list->Recordset && !$view_find_diff_bills_list->Recordset->EOF) {
	$view_find_diff_bills_list->Recordset->moveFirst();
	$selectLimit = $view_find_diff_bills_list->UseSelectLimit;
	if (!$selectLimit && $view_find_diff_bills_list->StartRec > 1)
		$view_find_diff_bills_list->Recordset->move($view_find_diff_bills_list->StartRec - 1);
} elseif (!$view_find_diff_bills->AllowAddDeleteRow && $view_find_diff_bills_list->StopRec == 0) {
	$view_find_diff_bills_list->StopRec = $view_find_diff_bills->GridAddRowCount;
}

// Initialize aggregate
$view_find_diff_bills->RowType = ROWTYPE_AGGREGATEINIT;
$view_find_diff_bills->resetAttributes();
$view_find_diff_bills_list->renderRow();
while ($view_find_diff_bills_list->RecCnt < $view_find_diff_bills_list->StopRec) {
	$view_find_diff_bills_list->RecCnt++;
	if ($view_find_diff_bills_list->RecCnt >= $view_find_diff_bills_list->StartRec) {
		$view_find_diff_bills_list->RowCnt++;

		// Set up key count
		$view_find_diff_bills_list->KeyCount = $view_find_diff_bills_list->RowIndex;

		// Init row class and style
		$view_find_diff_bills->resetAttributes();
		$view_find_diff_bills->CssClass = "";
		if ($view_find_diff_bills->isGridAdd()) {
		} else {
			$view_find_diff_bills_list->loadRowValues($view_find_diff_bills_list->Recordset); // Load row values
		}
		$view_find_diff_bills->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_find_diff_bills->RowAttrs = array_merge($view_find_diff_bills->RowAttrs, array('data-rowindex'=>$view_find_diff_bills_list->RowCnt, 'id'=>'r' . $view_find_diff_bills_list->RowCnt . '_view_find_diff_bills', 'data-rowtype'=>$view_find_diff_bills->RowType));

		// Render row
		$view_find_diff_bills_list->renderRow();

		// Render list options
		$view_find_diff_bills_list->renderListOptions();
?>
	<tr<?php echo $view_find_diff_bills->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_find_diff_bills_list->ListOptions->render("body", "left", $view_find_diff_bills_list->RowCnt);
?>
	<?php if ($view_find_diff_bills->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_find_diff_bills->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_PatientId" class="view_find_diff_bills_PatientId">
<span<?php echo $view_find_diff_bills->PatientId->viewAttributes() ?>>
<?php echo $view_find_diff_bills->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_find_diff_bills->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_PatientName" class="view_find_diff_bills_PatientName">
<span<?php echo $view_find_diff_bills->PatientName->viewAttributes() ?>>
<?php echo $view_find_diff_bills->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_find_diff_bills->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_BillNumber" class="view_find_diff_bills_BillNumber">
<span<?php echo $view_find_diff_bills->BillNumber->viewAttributes() ?>>
<?php echo $view_find_diff_bills->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_find_diff_bills->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_Amount" class="view_find_diff_bills_Amount">
<span<?php echo $view_find_diff_bills->Amount->viewAttributes() ?>>
<?php echo $view_find_diff_bills->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->sum28b_amount29->Visible) { // sum(b.amount) ?>
		<td data-name="sum28b_amount29"<?php echo $view_find_diff_bills->sum28b_amount29->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_sum28b_amount29" class="view_find_diff_bills_sum28b_amount29">
<span<?php echo $view_find_diff_bills->sum28b_amount29->viewAttributes() ?>>
<?php echo $view_find_diff_bills->sum28b_amount29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->diff->Visible) { // diff ?>
		<td data-name="diff"<?php echo $view_find_diff_bills->diff->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_diff" class="view_find_diff_bills_diff">
<span<?php echo $view_find_diff_bills->diff->viewAttributes() ?>>
<?php echo $view_find_diff_bills->diff->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_find_diff_bills->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_HospID" class="view_find_diff_bills_HospID">
<span<?php echo $view_find_diff_bills->HospID->viewAttributes() ?>>
<?php echo $view_find_diff_bills->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_find_diff_bills->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_createddatetime" class="view_find_diff_bills_createddatetime">
<span<?php echo $view_find_diff_bills->createddatetime->viewAttributes() ?>>
<?php echo $view_find_diff_bills->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_find_diff_bills->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCnt ?>_view_find_diff_bills_createdby" class="view_find_diff_bills_createdby">
<span<?php echo $view_find_diff_bills->createdby->viewAttributes() ?>>
<?php echo $view_find_diff_bills->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_find_diff_bills_list->ListOptions->render("body", "right", $view_find_diff_bills_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_find_diff_bills->isGridAdd())
		$view_find_diff_bills_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_find_diff_bills->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_find_diff_bills_list->Recordset)
	$view_find_diff_bills_list->Recordset->Close();
?>
<?php if (!$view_find_diff_bills->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_find_diff_bills->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_find_diff_bills_list->Pager)) $view_find_diff_bills_list->Pager = new NumericPager($view_find_diff_bills_list->StartRec, $view_find_diff_bills_list->DisplayRecs, $view_find_diff_bills_list->TotalRecs, $view_find_diff_bills_list->RecRange, $view_find_diff_bills_list->AutoHidePager) ?>
<?php if ($view_find_diff_bills_list->Pager->RecordCount > 0 && $view_find_diff_bills_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_find_diff_bills_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_find_diff_bills_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_find_diff_bills_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_find_diff_bills_list->pageUrl() ?>start=<?php echo $view_find_diff_bills_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_find_diff_bills_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_find_diff_bills_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_find_diff_bills_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_find_diff_bills_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_find_diff_bills_list->TotalRecs > 0 && (!$view_find_diff_bills_list->AutoHidePageSizeSelector || $view_find_diff_bills_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_find_diff_bills">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_find_diff_bills_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_find_diff_bills_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_find_diff_bills_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_find_diff_bills_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_find_diff_bills_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_find_diff_bills_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_find_diff_bills->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_find_diff_bills_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_find_diff_bills_list->TotalRecs == 0 && !$view_find_diff_bills->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_find_diff_bills_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_find_diff_bills_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_find_diff_bills->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_find_diff_bills->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_find_diff_bills", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_find_diff_bills_list->terminate();
?>