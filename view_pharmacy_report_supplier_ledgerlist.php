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
$view_pharmacy_report_supplier_ledger_list = new view_pharmacy_report_supplier_ledger_list();

// Run the page
$view_pharmacy_report_supplier_ledger_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_report_supplier_ledger_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_report_supplier_ledger->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_report_supplier_ledgerlist = currentForm = new ew.Form("fview_pharmacy_report_supplier_ledgerlist", "list");
fview_pharmacy_report_supplier_ledgerlist.formKeyCountName = '<?php echo $view_pharmacy_report_supplier_ledger_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_report_supplier_ledgerlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_supplier_ledgerlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_report_supplier_ledgerlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_supplier_ledgerlistsrch");

// Validate function for search
fview_pharmacy_report_supplier_ledgerlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_report_supplier_ledgerlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_supplier_ledgerlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_report_supplier_ledgerlistsrch.filterList = <?php echo $view_pharmacy_report_supplier_ledger_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_report_supplier_ledger->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_report_supplier_ledger_list->TotalRecs > 0 && $view_pharmacy_report_supplier_ledger_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_ledger_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_ledger_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_ledger_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_ledger_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_report_supplier_ledger_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_report_supplier_ledger->isExport() && !$view_pharmacy_report_supplier_ledger->CurrentAction) { ?>
<form name="fview_pharmacy_report_supplier_ledgerlistsrch" id="fview_pharmacy_report_supplier_ledgerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_report_supplier_ledger_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_report_supplier_ledgerlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_ledger">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_report_supplier_ledger_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_report_supplier_ledger->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_report_supplier_ledger->resetAttributes();
$view_pharmacy_report_supplier_ledger_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_report_supplier_ledger->Date->Visible) { // Date ?>
	<div id="xsc_Date" class="ew-cell form-group">
		<label for="x_Date" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_supplier_ledger->Date->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Date" id="z_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="LIKE"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "LIKE") ? " selected" : "" ?> ><?php echo $Language->phrase("LIKE") ?></option><option value="NOT LIKE"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "NOT LIKE") ? " selected" : "" ?> ><?php echo $Language->phrase("NOT LIKE") ?></option><option value="STARTS WITH"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "STARTS WITH") ? " selected" : "" ?> ><?php echo $Language->phrase("STARTS WITH") ?></option><option value="ENDS WITH"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "ENDS WITH") ? " selected" : "" ?> ><?php echo $Language->phrase("ENDS WITH") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_report_supplier_ledger->Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Date" name="x_Date" id="x_Date" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_ledger->Date->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_ledger->Date->EditValue ?>"<?php echo $view_pharmacy_report_supplier_ledger->Date->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_Date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Date style="d-none"">
<input type="text" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Date" name="y_Date" id="y_Date" size="30" maxlength="19" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_ledger->Date->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_ledger->Date->EditValue2 ?>"<?php echo $view_pharmacy_report_supplier_ledger->Date->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->SupplierName->Visible) { // SupplierName ?>
	<div id="xsc_SupplierName" class="ew-cell form-group">
		<label for="x_SupplierName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_supplier_ledger->SupplierName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SupplierName" id="z_SupplierName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_supplier_ledger" data-field="x_SupplierName" name="x_SupplierName" id="x_SupplierName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_ledger->SupplierName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_ledger->SupplierName->EditValue ?>"<?php echo $view_pharmacy_report_supplier_ledger->SupplierName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_report_supplier_ledger->Balance->Visible) { // Balance ?>
	<div id="xsc_Balance" class="ew-cell form-group">
		<label for="x_Balance" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_supplier_ledger->Balance->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Balance" id="z_Balance" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="LIKE"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "LIKE") ? " selected" : "" ?> ><?php echo $Language->phrase("LIKE") ?></option><option value="NOT LIKE"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "NOT LIKE") ? " selected" : "" ?> ><?php echo $Language->phrase("NOT LIKE") ?></option><option value="STARTS WITH"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "STARTS WITH") ? " selected" : "" ?> ><?php echo $Language->phrase("STARTS WITH") ?></option><option value="ENDS WITH"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "ENDS WITH") ? " selected" : "" ?> ><?php echo $Language->phrase("ENDS WITH") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_report_supplier_ledger->Balance->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Balance" name="x_Balance" id="x_Balance" size="30" maxlength="34" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_ledger->Balance->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_ledger->Balance->EditValue ?>"<?php echo $view_pharmacy_report_supplier_ledger->Balance->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_Balance style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Balance style="d-none"">
<input type="text" data-table="view_pharmacy_report_supplier_ledger" data-field="x_Balance" name="y_Balance" id="y_Balance" size="30" maxlength="34" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_ledger->Balance->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_ledger->Balance->EditValue2 ?>"<?php echo $view_pharmacy_report_supplier_ledger->Balance->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_report_supplier_ledger_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_report_supplier_ledger_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_report_supplier_ledger_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_ledger_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_ledger_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_ledger_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_ledger_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_report_supplier_ledger_list->showPageHeader(); ?>
<?php
$view_pharmacy_report_supplier_ledger_list->showMessage();
?>
<?php if ($view_pharmacy_report_supplier_ledger_list->TotalRecs > 0 || $view_pharmacy_report_supplier_ledger->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_report_supplier_ledger_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_supplier_ledger">
<?php if (!$view_pharmacy_report_supplier_ledger->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_report_supplier_ledger->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_supplier_ledger_list->Pager)) $view_pharmacy_report_supplier_ledger_list->Pager = new NumericPager($view_pharmacy_report_supplier_ledger_list->StartRec, $view_pharmacy_report_supplier_ledger_list->DisplayRecs, $view_pharmacy_report_supplier_ledger_list->TotalRecs, $view_pharmacy_report_supplier_ledger_list->RecRange, $view_pharmacy_report_supplier_ledger_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->RecordCount > 0 && $view_pharmacy_report_supplier_ledger_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_supplier_ledger_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_supplier_ledger_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->TotalRecs > 0 && (!$view_pharmacy_report_supplier_ledger_list->AutoHidePageSizeSelector || $view_pharmacy_report_supplier_ledger_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_ledger">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_supplier_ledger->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_supplier_ledger_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_report_supplier_ledgerlist" id="fview_pharmacy_report_supplier_ledgerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_report_supplier_ledger_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_report_supplier_ledger_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_supplier_ledger">
<div id="gmp_view_pharmacy_report_supplier_ledger" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_report_supplier_ledger_list->TotalRecs > 0 || $view_pharmacy_report_supplier_ledger->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_supplier_ledgerlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_report_supplier_ledger_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_report_supplier_ledger_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_report_supplier_ledger_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_report_supplier_ledger->Date->Visible) { // Date ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_pharmacy_report_supplier_ledger->Date->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Date" class="view_pharmacy_report_supplier_ledger_Date"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_pharmacy_report_supplier_ledger->Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->Date) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_Date" class="view_pharmacy_report_supplier_ledger_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Date->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->SupplierName->Visible) { // SupplierName ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->SupplierName) == "") { ?>
		<th data-name="SupplierName" class="<?php echo $view_pharmacy_report_supplier_ledger->SupplierName->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_SupplierName" class="view_pharmacy_report_supplier_ledger_SupplierName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->SupplierName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SupplierName" class="<?php echo $view_pharmacy_report_supplier_ledger->SupplierName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->SupplierName) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_SupplierName" class="view_pharmacy_report_supplier_ledger_SupplierName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->SupplierName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->SupplierName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->SupplierName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->RefNo->Visible) { // RefNo ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->RefNo) == "") { ?>
		<th data-name="RefNo" class="<?php echo $view_pharmacy_report_supplier_ledger->RefNo->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_RefNo" class="view_pharmacy_report_supplier_ledger_RefNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->RefNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefNo" class="<?php echo $view_pharmacy_report_supplier_ledger->RefNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->RefNo) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_RefNo" class="view_pharmacy_report_supplier_ledger_RefNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->RefNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->RefNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->RefNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->Particulars->Visible) { // Particulars ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->Particulars) == "") { ?>
		<th data-name="Particulars" class="<?php echo $view_pharmacy_report_supplier_ledger->Particulars->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Particulars" class="view_pharmacy_report_supplier_ledger_Particulars"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Particulars->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Particulars" class="<?php echo $view_pharmacy_report_supplier_ledger->Particulars->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->Particulars) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_Particulars" class="view_pharmacy_report_supplier_ledger_Particulars">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Particulars->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->Particulars->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->Particulars->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->Debit->Visible) { // Debit ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->Debit) == "") { ?>
		<th data-name="Debit" class="<?php echo $view_pharmacy_report_supplier_ledger->Debit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Debit" class="view_pharmacy_report_supplier_ledger_Debit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Debit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Debit" class="<?php echo $view_pharmacy_report_supplier_ledger->Debit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->Debit) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_Debit" class="view_pharmacy_report_supplier_ledger_Debit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Debit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->Debit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->Debit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->Credit->Visible) { // Credit ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->Credit) == "") { ?>
		<th data-name="Credit" class="<?php echo $view_pharmacy_report_supplier_ledger->Credit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Credit" class="view_pharmacy_report_supplier_ledger_Credit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Credit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Credit" class="<?php echo $view_pharmacy_report_supplier_ledger->Credit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->Credit) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_Credit" class="view_pharmacy_report_supplier_ledger_Credit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Credit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->Credit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->Credit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->Balance->Visible) { // Balance ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->Balance) == "") { ?>
		<th data-name="Balance" class="<?php echo $view_pharmacy_report_supplier_ledger->Balance->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Balance" class="view_pharmacy_report_supplier_ledger_Balance"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Balance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Balance" class="<?php echo $view_pharmacy_report_supplier_ledger->Balance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->Balance) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_Balance" class="view_pharmacy_report_supplier_ledger_Balance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Balance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->Balance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->Balance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->ClBalance->Visible) { // ClBalance ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->ClBalance) == "") { ?>
		<th data-name="ClBalance" class="<?php echo $view_pharmacy_report_supplier_ledger->ClBalance->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_ClBalance" class="view_pharmacy_report_supplier_ledger_ClBalance"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->ClBalance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClBalance" class="<?php echo $view_pharmacy_report_supplier_ledger->ClBalance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->ClBalance) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_ClBalance" class="view_pharmacy_report_supplier_ledger_ClBalance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->ClBalance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->ClBalance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->ClBalance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->Pid->Visible) { // Pid ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->Pid) == "") { ?>
		<th data-name="Pid" class="<?php echo $view_pharmacy_report_supplier_ledger->Pid->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_Pid" class="view_pharmacy_report_supplier_ledger_Pid"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pid" class="<?php echo $view_pharmacy_report_supplier_ledger->Pid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->Pid) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_Pid" class="view_pharmacy_report_supplier_ledger_Pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->Pid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->Pid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->PaymentNo) == "") { ?>
		<th data-name="PaymentNo" class="<?php echo $view_pharmacy_report_supplier_ledger->PaymentNo->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_PaymentNo" class="view_pharmacy_report_supplier_ledger_PaymentNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->PaymentNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentNo" class="<?php echo $view_pharmacy_report_supplier_ledger->PaymentNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->PaymentNo) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_PaymentNo" class="view_pharmacy_report_supplier_ledger_PaymentNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->PaymentNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->PaymentNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->PaymentNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger->IOrder->Visible) { // IOrder ?>
	<?php if ($view_pharmacy_report_supplier_ledger->sortUrl($view_pharmacy_report_supplier_ledger->IOrder) == "") { ?>
		<th data-name="IOrder" class="<?php echo $view_pharmacy_report_supplier_ledger->IOrder->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_ledger_IOrder" class="view_pharmacy_report_supplier_ledger_IOrder"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->IOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IOrder" class="<?php echo $view_pharmacy_report_supplier_ledger->IOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_ledger->SortUrl($view_pharmacy_report_supplier_ledger->IOrder) ?>',1);"><div id="elh_view_pharmacy_report_supplier_ledger_IOrder" class="view_pharmacy_report_supplier_ledger_IOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_ledger->IOrder->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_ledger->IOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_ledger->IOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_report_supplier_ledger_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_report_supplier_ledger->ExportAll && $view_pharmacy_report_supplier_ledger->isExport()) {
	$view_pharmacy_report_supplier_ledger_list->StopRec = $view_pharmacy_report_supplier_ledger_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_report_supplier_ledger_list->TotalRecs > $view_pharmacy_report_supplier_ledger_list->StartRec + $view_pharmacy_report_supplier_ledger_list->DisplayRecs - 1)
		$view_pharmacy_report_supplier_ledger_list->StopRec = $view_pharmacy_report_supplier_ledger_list->StartRec + $view_pharmacy_report_supplier_ledger_list->DisplayRecs - 1;
	else
		$view_pharmacy_report_supplier_ledger_list->StopRec = $view_pharmacy_report_supplier_ledger_list->TotalRecs;
}
$view_pharmacy_report_supplier_ledger_list->RecCnt = $view_pharmacy_report_supplier_ledger_list->StartRec - 1;
if ($view_pharmacy_report_supplier_ledger_list->Recordset && !$view_pharmacy_report_supplier_ledger_list->Recordset->EOF) {
	$view_pharmacy_report_supplier_ledger_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_report_supplier_ledger_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_report_supplier_ledger_list->StartRec > 1)
		$view_pharmacy_report_supplier_ledger_list->Recordset->move($view_pharmacy_report_supplier_ledger_list->StartRec - 1);
} elseif (!$view_pharmacy_report_supplier_ledger->AllowAddDeleteRow && $view_pharmacy_report_supplier_ledger_list->StopRec == 0) {
	$view_pharmacy_report_supplier_ledger_list->StopRec = $view_pharmacy_report_supplier_ledger->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_report_supplier_ledger->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_report_supplier_ledger->resetAttributes();
$view_pharmacy_report_supplier_ledger_list->renderRow();
while ($view_pharmacy_report_supplier_ledger_list->RecCnt < $view_pharmacy_report_supplier_ledger_list->StopRec) {
	$view_pharmacy_report_supplier_ledger_list->RecCnt++;
	if ($view_pharmacy_report_supplier_ledger_list->RecCnt >= $view_pharmacy_report_supplier_ledger_list->StartRec) {
		$view_pharmacy_report_supplier_ledger_list->RowCnt++;

		// Set up key count
		$view_pharmacy_report_supplier_ledger_list->KeyCount = $view_pharmacy_report_supplier_ledger_list->RowIndex;

		// Init row class and style
		$view_pharmacy_report_supplier_ledger->resetAttributes();
		$view_pharmacy_report_supplier_ledger->CssClass = "";
		if ($view_pharmacy_report_supplier_ledger->isGridAdd()) {
		} else {
			$view_pharmacy_report_supplier_ledger_list->loadRowValues($view_pharmacy_report_supplier_ledger_list->Recordset); // Load row values
		}
		$view_pharmacy_report_supplier_ledger->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_report_supplier_ledger->RowAttrs = array_merge($view_pharmacy_report_supplier_ledger->RowAttrs, array('data-rowindex'=>$view_pharmacy_report_supplier_ledger_list->RowCnt, 'id'=>'r' . $view_pharmacy_report_supplier_ledger_list->RowCnt . '_view_pharmacy_report_supplier_ledger', 'data-rowtype'=>$view_pharmacy_report_supplier_ledger->RowType));

		// Render row
		$view_pharmacy_report_supplier_ledger_list->renderRow();

		// Render list options
		$view_pharmacy_report_supplier_ledger_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_report_supplier_ledger->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_report_supplier_ledger_list->ListOptions->render("body", "left", $view_pharmacy_report_supplier_ledger_list->RowCnt);
?>
	<?php if ($view_pharmacy_report_supplier_ledger->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $view_pharmacy_report_supplier_ledger->Date->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_Date" class="view_pharmacy_report_supplier_ledger_Date">
<span<?php echo $view_pharmacy_report_supplier_ledger->Date->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->SupplierName->Visible) { // SupplierName ?>
		<td data-name="SupplierName"<?php echo $view_pharmacy_report_supplier_ledger->SupplierName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_SupplierName" class="view_pharmacy_report_supplier_ledger_SupplierName">
<span<?php echo $view_pharmacy_report_supplier_ledger->SupplierName->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->SupplierName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->RefNo->Visible) { // RefNo ?>
		<td data-name="RefNo"<?php echo $view_pharmacy_report_supplier_ledger->RefNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_RefNo" class="view_pharmacy_report_supplier_ledger_RefNo">
<span<?php echo $view_pharmacy_report_supplier_ledger->RefNo->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->RefNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->Particulars->Visible) { // Particulars ?>
		<td data-name="Particulars"<?php echo $view_pharmacy_report_supplier_ledger->Particulars->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_Particulars" class="view_pharmacy_report_supplier_ledger_Particulars">
<span<?php echo $view_pharmacy_report_supplier_ledger->Particulars->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->Particulars->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->Debit->Visible) { // Debit ?>
		<td data-name="Debit"<?php echo $view_pharmacy_report_supplier_ledger->Debit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_Debit" class="view_pharmacy_report_supplier_ledger_Debit">
<span<?php echo $view_pharmacy_report_supplier_ledger->Debit->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->Debit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->Credit->Visible) { // Credit ?>
		<td data-name="Credit"<?php echo $view_pharmacy_report_supplier_ledger->Credit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_Credit" class="view_pharmacy_report_supplier_ledger_Credit">
<span<?php echo $view_pharmacy_report_supplier_ledger->Credit->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->Credit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->Balance->Visible) { // Balance ?>
		<td data-name="Balance"<?php echo $view_pharmacy_report_supplier_ledger->Balance->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_Balance" class="view_pharmacy_report_supplier_ledger_Balance">
<span<?php echo $view_pharmacy_report_supplier_ledger->Balance->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->Balance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->ClBalance->Visible) { // ClBalance ?>
		<td data-name="ClBalance"<?php echo $view_pharmacy_report_supplier_ledger->ClBalance->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_ClBalance" class="view_pharmacy_report_supplier_ledger_ClBalance">
<span<?php echo $view_pharmacy_report_supplier_ledger->ClBalance->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->ClBalance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->Pid->Visible) { // Pid ?>
		<td data-name="Pid"<?php echo $view_pharmacy_report_supplier_ledger->Pid->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_Pid" class="view_pharmacy_report_supplier_ledger_Pid">
<span<?php echo $view_pharmacy_report_supplier_ledger->Pid->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->Pid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo"<?php echo $view_pharmacy_report_supplier_ledger->PaymentNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_PaymentNo" class="view_pharmacy_report_supplier_ledger_PaymentNo">
<span<?php echo $view_pharmacy_report_supplier_ledger->PaymentNo->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->PaymentNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger->IOrder->Visible) { // IOrder ?>
		<td data-name="IOrder"<?php echo $view_pharmacy_report_supplier_ledger->IOrder->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_ledger_list->RowCnt ?>_view_pharmacy_report_supplier_ledger_IOrder" class="view_pharmacy_report_supplier_ledger_IOrder">
<span<?php echo $view_pharmacy_report_supplier_ledger->IOrder->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_ledger->IOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_report_supplier_ledger_list->ListOptions->render("body", "right", $view_pharmacy_report_supplier_ledger_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_report_supplier_ledger->isGridAdd())
		$view_pharmacy_report_supplier_ledger_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_report_supplier_ledger->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_report_supplier_ledger_list->Recordset)
	$view_pharmacy_report_supplier_ledger_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_report_supplier_ledger->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_report_supplier_ledger->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_supplier_ledger_list->Pager)) $view_pharmacy_report_supplier_ledger_list->Pager = new NumericPager($view_pharmacy_report_supplier_ledger_list->StartRec, $view_pharmacy_report_supplier_ledger_list->DisplayRecs, $view_pharmacy_report_supplier_ledger_list->TotalRecs, $view_pharmacy_report_supplier_ledger_list->RecRange, $view_pharmacy_report_supplier_ledger_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->RecordCount > 0 && $view_pharmacy_report_supplier_ledger_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_supplier_ledger_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_supplier_ledger_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_ledger_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_ledger_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->TotalRecs > 0 && (!$view_pharmacy_report_supplier_ledger_list->AutoHidePageSizeSelector || $view_pharmacy_report_supplier_ledger_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_ledger">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_supplier_ledger_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_supplier_ledger->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_supplier_ledger_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_report_supplier_ledger_list->TotalRecs == 0 && !$view_pharmacy_report_supplier_ledger->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_supplier_ledger_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_report_supplier_ledger_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_report_supplier_ledger->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_report_supplier_ledger->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_report_supplier_ledger", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_report_supplier_ledger_list->terminate();
?>