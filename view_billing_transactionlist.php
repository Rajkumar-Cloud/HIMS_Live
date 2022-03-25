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
$view_billing_transaction_list = new view_billing_transaction_list();

// Run the page
$view_billing_transaction_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_transaction_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_billing_transaction->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_billing_transactionlist = currentForm = new ew.Form("fview_billing_transactionlist", "list");
fview_billing_transactionlist.formKeyCountName = '<?php echo $view_billing_transaction_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_billing_transactionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_transactionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_transactionlist.lists["x_Type[]"] = <?php echo $view_billing_transaction_list->Type->Lookup->toClientList() ?>;
fview_billing_transactionlist.lists["x_Type[]"].options = <?php echo JsonEncode($view_billing_transaction_list->Type->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_billing_transactionlistsrch = currentSearchForm = new ew.Form("fview_billing_transactionlistsrch");

// Validate function for search
fview_billing_transactionlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_transaction->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_billing_transactionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_transactionlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_transactionlistsrch.lists["x_Type[]"] = <?php echo $view_billing_transaction_list->Type->Lookup->toClientList() ?>;
fview_billing_transactionlistsrch.lists["x_Type[]"].options = <?php echo JsonEncode($view_billing_transaction_list->Type->options(FALSE, TRUE)) ?>;

// Filters
fview_billing_transactionlistsrch.filterList = <?php echo $view_billing_transaction_list->getFilterList() ?>;
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
<?php if (!$view_billing_transaction->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_billing_transaction_list->TotalRecs > 0 && $view_billing_transaction_list->ExportOptions->visible()) { ?>
<?php $view_billing_transaction_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_transaction_list->ImportOptions->visible()) { ?>
<?php $view_billing_transaction_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_transaction_list->SearchOptions->visible()) { ?>
<?php $view_billing_transaction_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_transaction_list->FilterOptions->visible()) { ?>
<?php $view_billing_transaction_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_billing_transaction_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_billing_transaction->isExport() && !$view_billing_transaction->CurrentAction) { ?>
<form name="fview_billing_transactionlistsrch" id="fview_billing_transactionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_billing_transaction_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_billing_transactionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_transaction">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_billing_transaction_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_billing_transaction->RowType = ROWTYPE_SEARCH;

// Render row
$view_billing_transaction->resetAttributes();
$view_billing_transaction_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_billing_transaction->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $view_billing_transaction->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_billing_transaction->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_transaction" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_transaction->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_transaction->createddatetime->EditValue ?>"<?php echo $view_billing_transaction->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_transaction->createddatetime->ReadOnly && !$view_billing_transaction->createddatetime->Disabled && !isset($view_billing_transaction->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_transaction->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_transactionlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="view_billing_transaction" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_transaction->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_transaction->createddatetime->EditValue2 ?>"<?php echo $view_billing_transaction->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_transaction->createddatetime->ReadOnly && !$view_billing_transaction->createddatetime->Disabled && !isset($view_billing_transaction->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_transaction->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_transactionlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_billing_transaction->Type->Visible) { // Type ?>
	<div id="xsc_Type" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $view_billing_transaction->Type->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Type" id="z_Type" value="LIKE"></span>
		<span class="ew-search-field">
<div id="tp_x_Type" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_transaction" data-field="x_Type" data-value-separator="<?php echo $view_billing_transaction->Type->displayValueSeparatorAttribute() ?>" name="x_Type[]" id="x_Type[]" value="{value}"<?php echo $view_billing_transaction->Type->editAttributes() ?>></div>
<div id="dsl_x_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_transaction->Type->checkBoxListHtml(FALSE, "x_Type[]") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_billing_transaction_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_billing_transaction_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_billing_transaction_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_billing_transaction_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_billing_transaction_list->showPageHeader(); ?>
<?php
$view_billing_transaction_list->showMessage();
?>
<?php if ($view_billing_transaction_list->TotalRecs > 0 || $view_billing_transaction->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_billing_transaction_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_transaction">
<?php if (!$view_billing_transaction->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_billing_transaction->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_billing_transaction_list->Pager)) $view_billing_transaction_list->Pager = new NumericPager($view_billing_transaction_list->StartRec, $view_billing_transaction_list->DisplayRecs, $view_billing_transaction_list->TotalRecs, $view_billing_transaction_list->RecRange, $view_billing_transaction_list->AutoHidePager) ?>
<?php if ($view_billing_transaction_list->Pager->RecordCount > 0 && $view_billing_transaction_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_billing_transaction_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_billing_transaction_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_billing_transaction_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_billing_transaction_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_billing_transaction_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_billing_transaction_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_billing_transaction_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_billing_transaction_list->TotalRecs > 0 && (!$view_billing_transaction_list->AutoHidePageSizeSelector || $view_billing_transaction_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_billing_transaction">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_billing_transaction_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_billing_transaction_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_billing_transaction_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_billing_transaction_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_billing_transaction_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_billing_transaction_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_billing_transaction->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_transaction_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_billing_transactionlist" id="fview_billing_transactionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_transaction_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_transaction_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_transaction">
<div id="gmp_view_billing_transaction" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_billing_transaction_list->TotalRecs > 0 || $view_billing_transaction->isGridEdit()) { ?>
<table id="tbl_view_billing_transactionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_billing_transaction_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_billing_transaction_list->renderListOptions();

// Render list options (header, left)
$view_billing_transaction_list->ListOptions->render("header", "left");
?>
<?php if ($view_billing_transaction->id->Visible) { // id ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_billing_transaction->id->headerCellClass() ?>"><div id="elh_view_billing_transaction_id" class="view_billing_transaction_id"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_billing_transaction->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->id) ?>',1);"><div id="elh_view_billing_transaction_id" class="view_billing_transaction_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_transaction->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_transaction->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->createddatetime) ?>',1);"><div id="elh_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_transaction->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_transaction->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->BillNumber) ?>',1);"><div id="elh_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->PatientId->Visible) { // PatientId ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_transaction->PatientId->headerCellClass() ?>"><div id="elh_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_transaction->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->PatientId) ?>',1);"><div id="elh_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->PatientName->Visible) { // PatientName ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_transaction->PatientName->headerCellClass() ?>"><div id="elh_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_transaction->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->PatientName) ?>',1);"><div id="elh_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->Mobile->Visible) { // Mobile ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_transaction->Mobile->headerCellClass() ?>"><div id="elh_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_transaction->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->Mobile) ?>',1);"><div id="elh_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->IP_OP->Visible) { // IP_OP ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $view_billing_transaction->IP_OP->headerCellClass() ?>"><div id="elh_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $view_billing_transaction->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->IP_OP) ?>',1);"><div id="elh_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->Doctor->Visible) { // Doctor ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_transaction->Doctor->headerCellClass() ?>"><div id="elh_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_transaction->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->Doctor) ?>',1);"><div id="elh_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_transaction->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_transaction->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->ModeofPayment) ?>',1);"><div id="elh_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->Amount->Visible) { // Amount ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_billing_transaction->Amount->headerCellClass() ?>"><div id="elh_view_billing_transaction_Amount" class="view_billing_transaction_Amount"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_billing_transaction->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->Amount) ?>',1);"><div id="elh_view_billing_transaction_Amount" class="view_billing_transaction_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->refund->Visible) { // refund ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->refund) == "") { ?>
		<th data-name="refund" class="<?php echo $view_billing_transaction->refund->headerCellClass() ?>"><div id="elh_view_billing_transaction_refund" class="view_billing_transaction_refund"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->refund->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="refund" class="<?php echo $view_billing_transaction->refund->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->refund) ?>',1);"><div id="elh_view_billing_transaction_refund" class="view_billing_transaction_refund">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->refund->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->refund->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->refund->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->Type->Visible) { // Type ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $view_billing_transaction->Type->headerCellClass() ?>"><div id="elh_view_billing_transaction_Type" class="view_billing_transaction_Type"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $view_billing_transaction->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->Type) ?>',1);"><div id="elh_view_billing_transaction_Type" class="view_billing_transaction_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->BankName->Visible) { // BankName ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_billing_transaction->BankName->headerCellClass() ?>"><div id="elh_view_billing_transaction_BankName" class="view_billing_transaction_BankName"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_billing_transaction->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->BankName) ?>',1);"><div id="elh_view_billing_transaction_BankName" class="view_billing_transaction_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->UserName->Visible) { // UserName ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_billing_transaction->UserName->headerCellClass() ?>"><div id="elh_view_billing_transaction_UserName" class="view_billing_transaction_UserName"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_billing_transaction->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->UserName) ?>',1);"><div id="elh_view_billing_transaction_UserName" class="view_billing_transaction_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->ViewBill->Visible) { // ViewBill ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->ViewBill) == "") { ?>
		<th data-name="ViewBill" class="<?php echo $view_billing_transaction->ViewBill->headerCellClass() ?>"><div id="elh_view_billing_transaction_ViewBill" class="view_billing_transaction_ViewBill"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->ViewBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViewBill" class="<?php echo $view_billing_transaction->ViewBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->ViewBill) ?>',1);"><div id="elh_view_billing_transaction_ViewBill" class="view_billing_transaction_ViewBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->ViewBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->ViewBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->ViewBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_transaction->EditBill->Visible) { // EditBill ?>
	<?php if ($view_billing_transaction->sortUrl($view_billing_transaction->EditBill) == "") { ?>
		<th data-name="EditBill" class="<?php echo $view_billing_transaction->EditBill->headerCellClass() ?>"><div id="elh_view_billing_transaction_EditBill" class="view_billing_transaction_EditBill"><div class="ew-table-header-caption"><?php echo $view_billing_transaction->EditBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBill" class="<?php echo $view_billing_transaction->EditBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_transaction->SortUrl($view_billing_transaction->EditBill) ?>',1);"><div id="elh_view_billing_transaction_EditBill" class="view_billing_transaction_EditBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_transaction->EditBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_transaction->EditBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_transaction->EditBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_billing_transaction_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_billing_transaction->ExportAll && $view_billing_transaction->isExport()) {
	$view_billing_transaction_list->StopRec = $view_billing_transaction_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_billing_transaction_list->TotalRecs > $view_billing_transaction_list->StartRec + $view_billing_transaction_list->DisplayRecs - 1)
		$view_billing_transaction_list->StopRec = $view_billing_transaction_list->StartRec + $view_billing_transaction_list->DisplayRecs - 1;
	else
		$view_billing_transaction_list->StopRec = $view_billing_transaction_list->TotalRecs;
}
$view_billing_transaction_list->RecCnt = $view_billing_transaction_list->StartRec - 1;
if ($view_billing_transaction_list->Recordset && !$view_billing_transaction_list->Recordset->EOF) {
	$view_billing_transaction_list->Recordset->moveFirst();
	$selectLimit = $view_billing_transaction_list->UseSelectLimit;
	if (!$selectLimit && $view_billing_transaction_list->StartRec > 1)
		$view_billing_transaction_list->Recordset->move($view_billing_transaction_list->StartRec - 1);
} elseif (!$view_billing_transaction->AllowAddDeleteRow && $view_billing_transaction_list->StopRec == 0) {
	$view_billing_transaction_list->StopRec = $view_billing_transaction->GridAddRowCount;
}

// Initialize aggregate
$view_billing_transaction->RowType = ROWTYPE_AGGREGATEINIT;
$view_billing_transaction->resetAttributes();
$view_billing_transaction_list->renderRow();
while ($view_billing_transaction_list->RecCnt < $view_billing_transaction_list->StopRec) {
	$view_billing_transaction_list->RecCnt++;
	if ($view_billing_transaction_list->RecCnt >= $view_billing_transaction_list->StartRec) {
		$view_billing_transaction_list->RowCnt++;

		// Set up key count
		$view_billing_transaction_list->KeyCount = $view_billing_transaction_list->RowIndex;

		// Init row class and style
		$view_billing_transaction->resetAttributes();
		$view_billing_transaction->CssClass = "";
		if ($view_billing_transaction->isGridAdd()) {
		} else {
			$view_billing_transaction_list->loadRowValues($view_billing_transaction_list->Recordset); // Load row values
		}
		$view_billing_transaction->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_billing_transaction->RowAttrs = array_merge($view_billing_transaction->RowAttrs, array('data-rowindex'=>$view_billing_transaction_list->RowCnt, 'id'=>'r' . $view_billing_transaction_list->RowCnt . '_view_billing_transaction', 'data-rowtype'=>$view_billing_transaction->RowType));

		// Render row
		$view_billing_transaction_list->renderRow();

		// Render list options
		$view_billing_transaction_list->renderListOptions();
?>
	<tr<?php echo $view_billing_transaction->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_transaction_list->ListOptions->render("body", "left", $view_billing_transaction_list->RowCnt);
?>
	<?php if ($view_billing_transaction->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_billing_transaction->id->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_id" class="view_billing_transaction_id">
<span<?php echo $view_billing_transaction->id->viewAttributes() ?>>
<?php echo $view_billing_transaction->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_billing_transaction->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime">
<span<?php echo $view_billing_transaction->createddatetime->viewAttributes() ?>>
<?php echo $view_billing_transaction->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_billing_transaction->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber">
<span<?php echo $view_billing_transaction->BillNumber->viewAttributes() ?>>
<?php echo $view_billing_transaction->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_billing_transaction->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId">
<span<?php echo $view_billing_transaction->PatientId->viewAttributes() ?>>
<?php echo $view_billing_transaction->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_billing_transaction->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName">
<span<?php echo $view_billing_transaction->PatientName->viewAttributes() ?>>
<?php echo $view_billing_transaction->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_billing_transaction->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile">
<span<?php echo $view_billing_transaction->Mobile->viewAttributes() ?>>
<?php echo $view_billing_transaction->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $view_billing_transaction->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP">
<span<?php echo $view_billing_transaction->IP_OP->viewAttributes() ?>>
<?php echo $view_billing_transaction->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_billing_transaction->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor">
<span<?php echo $view_billing_transaction->Doctor->viewAttributes() ?>>
<?php echo $view_billing_transaction->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_billing_transaction->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment">
<span<?php echo $view_billing_transaction->ModeofPayment->viewAttributes() ?>>
<?php echo $view_billing_transaction->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_billing_transaction->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_Amount" class="view_billing_transaction_Amount">
<span<?php echo $view_billing_transaction->Amount->viewAttributes() ?>>
<?php echo $view_billing_transaction->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->refund->Visible) { // refund ?>
		<td data-name="refund"<?php echo $view_billing_transaction->refund->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_refund" class="view_billing_transaction_refund">
<span<?php echo $view_billing_transaction->refund->viewAttributes() ?>>
<?php echo $view_billing_transaction->refund->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $view_billing_transaction->Type->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_Type" class="view_billing_transaction_Type">
<span<?php echo $view_billing_transaction->Type->viewAttributes() ?>>
<?php echo $view_billing_transaction->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_billing_transaction->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_BankName" class="view_billing_transaction_BankName">
<span<?php echo $view_billing_transaction->BankName->viewAttributes() ?>>
<?php echo $view_billing_transaction->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_billing_transaction->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_UserName" class="view_billing_transaction_UserName">
<span<?php echo $view_billing_transaction->UserName->viewAttributes() ?>>
<?php echo $view_billing_transaction->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->ViewBill->Visible) { // ViewBill ?>
		<td data-name="ViewBill"<?php echo $view_billing_transaction->ViewBill->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_ViewBill" class="view_billing_transaction_ViewBill">
<span<?php echo $view_billing_transaction->ViewBill->viewAttributes() ?>>
<?php echo $view_billing_transaction->ViewBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_transaction->EditBill->Visible) { // EditBill ?>
		<td data-name="EditBill"<?php echo $view_billing_transaction->EditBill->cellAttributes() ?>>
<span id="el<?php echo $view_billing_transaction_list->RowCnt ?>_view_billing_transaction_EditBill" class="view_billing_transaction_EditBill">
<span<?php echo $view_billing_transaction->EditBill->viewAttributes() ?>>
<?php echo $view_billing_transaction->EditBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_transaction_list->ListOptions->render("body", "right", $view_billing_transaction_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_billing_transaction->isGridAdd())
		$view_billing_transaction_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_billing_transaction->RowType = ROWTYPE_AGGREGATE;
$view_billing_transaction->resetAttributes();
$view_billing_transaction_list->renderRow();
?>
<?php if ($view_billing_transaction_list->TotalRecs > 0 && !$view_billing_transaction->isGridAdd() && !$view_billing_transaction->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_billing_transaction_list->renderListOptions();

// Render list options (footer, left)
$view_billing_transaction_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_billing_transaction->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_billing_transaction->id->footerCellClass() ?>"><span id="elf_view_billing_transaction_id" class="view_billing_transaction_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_billing_transaction->createddatetime->footerCellClass() ?>"><span id="elf_view_billing_transaction_createddatetime" class="view_billing_transaction_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" class="<?php echo $view_billing_transaction->BillNumber->footerCellClass() ?>"><span id="elf_view_billing_transaction_BillNumber" class="view_billing_transaction_BillNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_billing_transaction->PatientId->footerCellClass() ?>"><span id="elf_view_billing_transaction_PatientId" class="view_billing_transaction_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_billing_transaction->PatientName->footerCellClass() ?>"><span id="elf_view_billing_transaction_PatientName" class="view_billing_transaction_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_billing_transaction->Mobile->footerCellClass() ?>"><span id="elf_view_billing_transaction_Mobile" class="view_billing_transaction_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP" class="<?php echo $view_billing_transaction->IP_OP->footerCellClass() ?>"><span id="elf_view_billing_transaction_IP_OP" class="view_billing_transaction_IP_OP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" class="<?php echo $view_billing_transaction->Doctor->footerCellClass() ?>"><span id="elf_view_billing_transaction_Doctor" class="view_billing_transaction_Doctor">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $view_billing_transaction->ModeofPayment->footerCellClass() ?>"><span id="elf_view_billing_transaction_ModeofPayment" class="view_billing_transaction_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $view_billing_transaction->Amount->footerCellClass() ?>"><span id="elf_view_billing_transaction_Amount" class="view_billing_transaction_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_billing_transaction->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->refund->Visible) { // refund ?>
		<td data-name="refund" class="<?php echo $view_billing_transaction->refund->footerCellClass() ?>"><span id="elf_view_billing_transaction_refund" class="view_billing_transaction_refund">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_billing_transaction->refund->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->Type->Visible) { // Type ?>
		<td data-name="Type" class="<?php echo $view_billing_transaction->Type->footerCellClass() ?>"><span id="elf_view_billing_transaction_Type" class="view_billing_transaction_Type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->BankName->Visible) { // BankName ?>
		<td data-name="BankName" class="<?php echo $view_billing_transaction->BankName->footerCellClass() ?>"><span id="elf_view_billing_transaction_BankName" class="view_billing_transaction_BankName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_billing_transaction->UserName->footerCellClass() ?>"><span id="elf_view_billing_transaction_UserName" class="view_billing_transaction_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->ViewBill->Visible) { // ViewBill ?>
		<td data-name="ViewBill" class="<?php echo $view_billing_transaction->ViewBill->footerCellClass() ?>"><span id="elf_view_billing_transaction_ViewBill" class="view_billing_transaction_ViewBill">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_billing_transaction->EditBill->Visible) { // EditBill ?>
		<td data-name="EditBill" class="<?php echo $view_billing_transaction->EditBill->footerCellClass() ?>"><span id="elf_view_billing_transaction_EditBill" class="view_billing_transaction_EditBill">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_billing_transaction_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_billing_transaction->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_billing_transaction_list->Recordset)
	$view_billing_transaction_list->Recordset->Close();
?>
<?php if (!$view_billing_transaction->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_billing_transaction->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_billing_transaction_list->Pager)) $view_billing_transaction_list->Pager = new NumericPager($view_billing_transaction_list->StartRec, $view_billing_transaction_list->DisplayRecs, $view_billing_transaction_list->TotalRecs, $view_billing_transaction_list->RecRange, $view_billing_transaction_list->AutoHidePager) ?>
<?php if ($view_billing_transaction_list->Pager->RecordCount > 0 && $view_billing_transaction_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_billing_transaction_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_billing_transaction_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_billing_transaction_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_transaction_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_transaction_list->pageUrl() ?>start=<?php echo $view_billing_transaction_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_billing_transaction_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_billing_transaction_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_billing_transaction_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_billing_transaction_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_billing_transaction_list->TotalRecs > 0 && (!$view_billing_transaction_list->AutoHidePageSizeSelector || $view_billing_transaction_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_billing_transaction">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_billing_transaction_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_billing_transaction_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_billing_transaction_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_billing_transaction_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_billing_transaction_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_billing_transaction_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_billing_transaction->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_transaction_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_billing_transaction_list->TotalRecs == 0 && !$view_billing_transaction->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_billing_transaction_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_billing_transaction_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_billing_transaction->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_billing_transaction->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_billing_transaction", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_billing_transaction_list->terminate();
?>