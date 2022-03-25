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
$view_pharmacy_report_supplier_wise_outstanding_list = new view_pharmacy_report_supplier_wise_outstanding_list();

// Run the page
$view_pharmacy_report_supplier_wise_outstanding_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_report_supplier_wise_outstanding_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_report_supplier_wise_outstandinglist = currentForm = new ew.Form("fview_pharmacy_report_supplier_wise_outstandinglist", "list");
fview_pharmacy_report_supplier_wise_outstandinglist.formKeyCountName = '<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_report_supplier_wise_outstandinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_supplier_wise_outstandinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_report_supplier_wise_outstandinglistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_supplier_wise_outstandinglistsrch");

// Validate function for search
fview_pharmacy_report_supplier_wise_outstandinglistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_TotalAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_report_supplier_wise_outstandinglistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_report_supplier_wise_outstandinglistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_report_supplier_wise_outstandinglistsrch.filterList = <?php echo $view_pharmacy_report_supplier_wise_outstanding_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs > 0 && $view_pharmacy_report_supplier_wise_outstanding_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_wise_outstanding_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_wise_outstanding_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_wise_outstanding_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_report_supplier_wise_outstanding_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_report_supplier_wise_outstanding_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isExport() && !$view_pharmacy_report_supplier_wise_outstanding->CurrentAction) { ?>
<form name="fview_pharmacy_report_supplier_wise_outstandinglistsrch" id="fview_pharmacy_report_supplier_wise_outstandinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_report_supplier_wise_outstanding_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_report_supplier_wise_outstandinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_wise_outstanding">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_report_supplier_wise_outstanding_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_report_supplier_wise_outstanding->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_report_supplier_wise_outstanding->resetAttributes();
$view_pharmacy_report_supplier_wise_outstanding_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_report_supplier_wise_outstanding->Customername->Visible) { // Customername ?>
	<div id="xsc_Customername" class="ew-cell form-group">
		<label for="x_Customername" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Customername" id="z_Customername" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_supplier_wise_outstanding" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_wise_outstanding->Customername->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->EditValue ?>"<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->Visible) { // TotalAmount ?>
	<div id="xsc_TotalAmount" class="ew-cell form-group">
		<label for="x_TotalAmount" class="ew-search-caption ew-label"><?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->caption() ?></label>
		<span class="ew-search-operator"><select name="z_TotalAmount" id="z_TotalAmount" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_report_supplier_wise_outstanding" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->EditValue ?>"<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_TotalAmount style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_TotalAmount style="d-none"">
<input type="text" data-table="view_pharmacy_report_supplier_wise_outstanding" data-field="x_TotalAmount" name="y_TotalAmount" id="y_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->EditValue2 ?>"<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_report_supplier_wise_outstanding_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_report_supplier_wise_outstanding_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_report_supplier_wise_outstanding_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_report_supplier_wise_outstanding_list->showPageHeader(); ?>
<?php
$view_pharmacy_report_supplier_wise_outstanding_list->showMessage();
?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs > 0 || $view_pharmacy_report_supplier_wise_outstanding->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_supplier_wise_outstanding">
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_supplier_wise_outstanding_list->Pager)) $view_pharmacy_report_supplier_wise_outstanding_list->Pager = new NumericPager($view_pharmacy_report_supplier_wise_outstanding_list->StartRec, $view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs, $view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs, $view_pharmacy_report_supplier_wise_outstanding_list->RecRange, $view_pharmacy_report_supplier_wise_outstanding_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->RecordCount > 0 && $view_pharmacy_report_supplier_wise_outstanding_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs > 0 && (!$view_pharmacy_report_supplier_wise_outstanding_list->AutoHidePageSizeSelector || $view_pharmacy_report_supplier_wise_outstanding_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_wise_outstanding">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_supplier_wise_outstanding->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_supplier_wise_outstanding_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_report_supplier_wise_outstandinglist" id="fview_pharmacy_report_supplier_wise_outstandinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_supplier_wise_outstanding">
<div id="gmp_view_pharmacy_report_supplier_wise_outstanding" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs > 0 || $view_pharmacy_report_supplier_wise_outstanding->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_supplier_wise_outstandinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_report_supplier_wise_outstanding_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_report_supplier_wise_outstanding_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_report_supplier_wise_outstanding_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->pc->Visible) { // pc ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->sortUrl($view_pharmacy_report_supplier_wise_outstanding->pc) == "") { ?>
		<th data-name="pc" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_pc" class="view_pharmacy_report_supplier_wise_outstanding_pc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pc" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_wise_outstanding->SortUrl($view_pharmacy_report_supplier_wise_outstanding->pc) ?>',1);"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_pc" class="view_pharmacy_report_supplier_wise_outstanding_pc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_wise_outstanding->pc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_wise_outstanding->pc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->Customername->Visible) { // Customername ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->sortUrl($view_pharmacy_report_supplier_wise_outstanding->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Customername" class="view_pharmacy_report_supplier_wise_outstanding_Customername"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_wise_outstanding->SortUrl($view_pharmacy_report_supplier_wise_outstanding->Customername) ?>',1);"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Customername" class="view_pharmacy_report_supplier_wise_outstanding_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_wise_outstanding->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_wise_outstanding->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->State->Visible) { // State ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->sortUrl($view_pharmacy_report_supplier_wise_outstanding->State) == "") { ?>
		<th data-name="State" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->State->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_State" class="view_pharmacy_report_supplier_wise_outstanding_State"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_wise_outstanding->SortUrl($view_pharmacy_report_supplier_wise_outstanding->State) ?>',1);"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_State" class="view_pharmacy_report_supplier_wise_outstanding_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_wise_outstanding->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_wise_outstanding->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->Pincode->Visible) { // Pincode ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->sortUrl($view_pharmacy_report_supplier_wise_outstanding->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Pincode" class="view_pharmacy_report_supplier_wise_outstanding_Pincode"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_wise_outstanding->SortUrl($view_pharmacy_report_supplier_wise_outstanding->Pincode) ?>',1);"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Pincode" class="view_pharmacy_report_supplier_wise_outstanding_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_wise_outstanding->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_wise_outstanding->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->Phone->Visible) { // Phone ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->sortUrl($view_pharmacy_report_supplier_wise_outstanding->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Phone" class="view_pharmacy_report_supplier_wise_outstanding_Phone"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_wise_outstanding->SortUrl($view_pharmacy_report_supplier_wise_outstanding->Phone) ?>',1);"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_Phone" class="view_pharmacy_report_supplier_wise_outstanding_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_wise_outstanding->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_wise_outstanding->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->NoOfBills->Visible) { // NoOfBills ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->sortUrl($view_pharmacy_report_supplier_wise_outstanding->NoOfBills) == "") { ?>
		<th data-name="NoOfBills" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_NoOfBills" class="view_pharmacy_report_supplier_wise_outstanding_NoOfBills"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfBills" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_wise_outstanding->SortUrl($view_pharmacy_report_supplier_wise_outstanding->NoOfBills) ?>',1);"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_NoOfBills" class="view_pharmacy_report_supplier_wise_outstanding_NoOfBills">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_wise_outstanding->NoOfBills->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_wise_outstanding->NoOfBills->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->sortUrl($view_pharmacy_report_supplier_wise_outstanding->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="view_pharmacy_report_supplier_wise_outstanding_TotalAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_report_supplier_wise_outstanding->SortUrl($view_pharmacy_report_supplier_wise_outstanding->TotalAmount) ?>',1);"><div id="elh_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="view_pharmacy_report_supplier_wise_outstanding_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_report_supplier_wise_outstanding_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_report_supplier_wise_outstanding->ExportAll && $view_pharmacy_report_supplier_wise_outstanding->isExport()) {
	$view_pharmacy_report_supplier_wise_outstanding_list->StopRec = $view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs > $view_pharmacy_report_supplier_wise_outstanding_list->StartRec + $view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs - 1)
		$view_pharmacy_report_supplier_wise_outstanding_list->StopRec = $view_pharmacy_report_supplier_wise_outstanding_list->StartRec + $view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs - 1;
	else
		$view_pharmacy_report_supplier_wise_outstanding_list->StopRec = $view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs;
}
$view_pharmacy_report_supplier_wise_outstanding_list->RecCnt = $view_pharmacy_report_supplier_wise_outstanding_list->StartRec - 1;
if ($view_pharmacy_report_supplier_wise_outstanding_list->Recordset && !$view_pharmacy_report_supplier_wise_outstanding_list->Recordset->EOF) {
	$view_pharmacy_report_supplier_wise_outstanding_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_report_supplier_wise_outstanding_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_report_supplier_wise_outstanding_list->StartRec > 1)
		$view_pharmacy_report_supplier_wise_outstanding_list->Recordset->move($view_pharmacy_report_supplier_wise_outstanding_list->StartRec - 1);
} elseif (!$view_pharmacy_report_supplier_wise_outstanding->AllowAddDeleteRow && $view_pharmacy_report_supplier_wise_outstanding_list->StopRec == 0) {
	$view_pharmacy_report_supplier_wise_outstanding_list->StopRec = $view_pharmacy_report_supplier_wise_outstanding->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_report_supplier_wise_outstanding->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_report_supplier_wise_outstanding->resetAttributes();
$view_pharmacy_report_supplier_wise_outstanding_list->renderRow();
while ($view_pharmacy_report_supplier_wise_outstanding_list->RecCnt < $view_pharmacy_report_supplier_wise_outstanding_list->StopRec) {
	$view_pharmacy_report_supplier_wise_outstanding_list->RecCnt++;
	if ($view_pharmacy_report_supplier_wise_outstanding_list->RecCnt >= $view_pharmacy_report_supplier_wise_outstanding_list->StartRec) {
		$view_pharmacy_report_supplier_wise_outstanding_list->RowCnt++;

		// Set up key count
		$view_pharmacy_report_supplier_wise_outstanding_list->KeyCount = $view_pharmacy_report_supplier_wise_outstanding_list->RowIndex;

		// Init row class and style
		$view_pharmacy_report_supplier_wise_outstanding->resetAttributes();
		$view_pharmacy_report_supplier_wise_outstanding->CssClass = "";
		if ($view_pharmacy_report_supplier_wise_outstanding->isGridAdd()) {
		} else {
			$view_pharmacy_report_supplier_wise_outstanding_list->loadRowValues($view_pharmacy_report_supplier_wise_outstanding_list->Recordset); // Load row values
		}
		$view_pharmacy_report_supplier_wise_outstanding->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_report_supplier_wise_outstanding->RowAttrs = array_merge($view_pharmacy_report_supplier_wise_outstanding->RowAttrs, array('data-rowindex'=>$view_pharmacy_report_supplier_wise_outstanding_list->RowCnt, 'id'=>'r' . $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt . '_view_pharmacy_report_supplier_wise_outstanding', 'data-rowtype'=>$view_pharmacy_report_supplier_wise_outstanding->RowType));

		// Render row
		$view_pharmacy_report_supplier_wise_outstanding_list->renderRow();

		// Render list options
		$view_pharmacy_report_supplier_wise_outstanding_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_report_supplier_wise_outstanding->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_report_supplier_wise_outstanding_list->ListOptions->render("body", "left", $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt);
?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->pc->Visible) { // pc ?>
		<td data-name="pc"<?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt ?>_view_pharmacy_report_supplier_wise_outstanding_pc" class="view_pharmacy_report_supplier_wise_outstanding_pc">
<span<?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt ?>_view_pharmacy_report_supplier_wise_outstanding_Customername" class="view_pharmacy_report_supplier_wise_outstanding_Customername">
<span<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->State->Visible) { // State ?>
		<td data-name="State"<?php echo $view_pharmacy_report_supplier_wise_outstanding->State->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt ?>_view_pharmacy_report_supplier_wise_outstanding_State" class="view_pharmacy_report_supplier_wise_outstanding_State">
<span<?php echo $view_pharmacy_report_supplier_wise_outstanding->State->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_wise_outstanding->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt ?>_view_pharmacy_report_supplier_wise_outstanding_Pincode" class="view_pharmacy_report_supplier_wise_outstanding_Pincode">
<span<?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt ?>_view_pharmacy_report_supplier_wise_outstanding_Phone" class="view_pharmacy_report_supplier_wise_outstanding_Phone">
<span<?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->NoOfBills->Visible) { // NoOfBills ?>
		<td data-name="NoOfBills"<?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt ?>_view_pharmacy_report_supplier_wise_outstanding_NoOfBills" class="view_pharmacy_report_supplier_wise_outstanding_NoOfBills">
<span<?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount"<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt ?>_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="view_pharmacy_report_supplier_wise_outstanding_TotalAmount">
<span<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->viewAttributes() ?>>
<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_report_supplier_wise_outstanding_list->ListOptions->render("body", "right", $view_pharmacy_report_supplier_wise_outstanding_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_report_supplier_wise_outstanding->isGridAdd())
		$view_pharmacy_report_supplier_wise_outstanding_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacy_report_supplier_wise_outstanding->RowType = ROWTYPE_AGGREGATE;
$view_pharmacy_report_supplier_wise_outstanding->resetAttributes();
$view_pharmacy_report_supplier_wise_outstanding_list->renderRow();
?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs > 0 && !$view_pharmacy_report_supplier_wise_outstanding->isGridAdd() && !$view_pharmacy_report_supplier_wise_outstanding->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacy_report_supplier_wise_outstanding_list->renderListOptions();

// Render list options (footer, left)
$view_pharmacy_report_supplier_wise_outstanding_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->pc->Visible) { // pc ?>
		<td data-name="pc" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->pc->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_pc" class="view_pharmacy_report_supplier_wise_outstanding_pc">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Customername->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_Customername" class="view_pharmacy_report_supplier_wise_outstanding_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->State->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_State" class="view_pharmacy_report_supplier_wise_outstanding_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Pincode->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_Pincode" class="view_pharmacy_report_supplier_wise_outstanding_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->Phone->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_Phone" class="view_pharmacy_report_supplier_wise_outstanding_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->NoOfBills->Visible) { // NoOfBills ?>
		<td data-name="NoOfBills" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->NoOfBills->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_NoOfBills" class="view_pharmacy_report_supplier_wise_outstanding_NoOfBills">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount" class="<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->footerCellClass() ?>"><span id="elf_view_pharmacy_report_supplier_wise_outstanding_TotalAmount" class="view_pharmacy_report_supplier_wise_outstanding_TotalAmount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacy_report_supplier_wise_outstanding->TotalAmount->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacy_report_supplier_wise_outstanding_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_report_supplier_wise_outstanding_list->Recordset)
	$view_pharmacy_report_supplier_wise_outstanding_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_report_supplier_wise_outstanding_list->Pager)) $view_pharmacy_report_supplier_wise_outstanding_list->Pager = new NumericPager($view_pharmacy_report_supplier_wise_outstanding_list->StartRec, $view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs, $view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs, $view_pharmacy_report_supplier_wise_outstanding_list->RecRange, $view_pharmacy_report_supplier_wise_outstanding_list->AutoHidePager) ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->RecordCount > 0 && $view_pharmacy_report_supplier_wise_outstanding_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->pageUrl() ?>start=<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_report_supplier_wise_outstanding_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs > 0 && (!$view_pharmacy_report_supplier_wise_outstanding_list->AutoHidePageSizeSelector || $view_pharmacy_report_supplier_wise_outstanding_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_report_supplier_wise_outstanding">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_report_supplier_wise_outstanding->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_supplier_wise_outstanding_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_report_supplier_wise_outstanding_list->TotalRecs == 0 && !$view_pharmacy_report_supplier_wise_outstanding->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_report_supplier_wise_outstanding_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_report_supplier_wise_outstanding_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_report_supplier_wise_outstanding->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_report_supplier_wise_outstanding", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_report_supplier_wise_outstanding_list->terminate();
?>