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
$_view_till_search_view_list = new _view_till_search_view_list();

// Run the page
$_view_till_search_view_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_view_till_search_view_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$_view_till_search_view->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var f_view_till_search_viewlist = currentForm = new ew.Form("f_view_till_search_viewlist", "list");
f_view_till_search_viewlist.formKeyCountName = '<?php echo $_view_till_search_view_list->FormKeyCountName ?>';

// Form_CustomValidate event
f_view_till_search_viewlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_view_till_search_viewlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var f_view_till_search_viewlistsrch = currentSearchForm = new ew.Form("f_view_till_search_viewlistsrch");

// Validate function for search
f_view_till_search_viewlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_DepositDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($_view_till_search_view->DepositDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
f_view_till_search_viewlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_view_till_search_viewlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

f_view_till_search_viewlistsrch.filterList = <?php echo $_view_till_search_view_list->getFilterList() ?>;
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
<?php if (!$_view_till_search_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_view_till_search_view_list->TotalRecs > 0 && $_view_till_search_view_list->ExportOptions->visible()) { ?>
<?php $_view_till_search_view_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_till_search_view_list->ImportOptions->visible()) { ?>
<?php $_view_till_search_view_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_till_search_view_list->SearchOptions->visible()) { ?>
<?php $_view_till_search_view_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_view_till_search_view_list->FilterOptions->visible()) { ?>
<?php $_view_till_search_view_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$_view_till_search_view_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$_view_till_search_view->isExport() && !$_view_till_search_view->CurrentAction) { ?>
<form name="f_view_till_search_viewlistsrch" id="f_view_till_search_viewlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($_view_till_search_view_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="f_view_till_search_viewlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_view_till_search_view">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$_view_till_search_view_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$_view_till_search_view->RowType = ROWTYPE_SEARCH;

// Render row
$_view_till_search_view->resetAttributes();
$_view_till_search_view_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($_view_till_search_view->DepositDate->Visible) { // DepositDate ?>
	<div id="xsc_DepositDate" class="ew-cell form-group">
		<label for="x_DepositDate" class="ew-search-caption ew-label"><?php echo $_view_till_search_view->DepositDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_DepositDate" id="z_DepositDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($_view_till_search_view->DepositDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="_view_till_search_view" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?php echo HtmlEncode($_view_till_search_view->DepositDate->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view->DepositDate->EditValue ?>"<?php echo $_view_till_search_view->DepositDate->editAttributes() ?>>
<?php if (!$_view_till_search_view->DepositDate->ReadOnly && !$_view_till_search_view->DepositDate->Disabled && !isset($_view_till_search_view->DepositDate->EditAttrs["readonly"]) && !isset($_view_till_search_view->DepositDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_view_till_search_viewlistsrch", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_DepositDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_DepositDate style="d-none"">
<input type="text" data-table="_view_till_search_view" data-field="x_DepositDate" data-format="7" name="y_DepositDate" id="y_DepositDate" placeholder="<?php echo HtmlEncode($_view_till_search_view->DepositDate->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view->DepositDate->EditValue2 ?>"<?php echo $_view_till_search_view->DepositDate->editAttributes() ?>>
<?php if (!$_view_till_search_view->DepositDate->ReadOnly && !$_view_till_search_view->DepositDate->Disabled && !isset($_view_till_search_view->DepositDate->EditAttrs["readonly"]) && !isset($_view_till_search_view->DepositDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_view_till_search_viewlistsrch", "y_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($_view_till_search_view->CreatedUserName->Visible) { // CreatedUserName ?>
	<div id="xsc_CreatedUserName" class="ew-cell form-group">
		<label for="x_CreatedUserName" class="ew-search-caption ew-label"><?php echo $_view_till_search_view->CreatedUserName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CreatedUserName" id="z_CreatedUserName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="_view_till_search_view" data-field="x_CreatedUserName" name="x_CreatedUserName" id="x_CreatedUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_view_till_search_view->CreatedUserName->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view->CreatedUserName->EditValue ?>"<?php echo $_view_till_search_view->CreatedUserName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($_view_till_search_view->TransferTo->Visible) { // TransferTo ?>
	<div id="xsc_TransferTo" class="ew-cell form-group">
		<label for="x_TransferTo" class="ew-search-caption ew-label"><?php echo $_view_till_search_view->TransferTo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TransferTo" id="z_TransferTo" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="_view_till_search_view" data-field="x_TransferTo" name="x_TransferTo" id="x_TransferTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_view_till_search_view->TransferTo->getPlaceHolder()) ?>" value="<?php echo $_view_till_search_view->TransferTo->EditValue ?>"<?php echo $_view_till_search_view->TransferTo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($_view_till_search_view_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($_view_till_search_view_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $_view_till_search_view_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($_view_till_search_view_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $_view_till_search_view_list->showPageHeader(); ?>
<?php
$_view_till_search_view_list->showMessage();
?>
<?php if ($_view_till_search_view_list->TotalRecs > 0 || $_view_till_search_view->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_view_till_search_view_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _view_till_search_view">
<?php if (!$_view_till_search_view->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$_view_till_search_view->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_view_till_search_view_list->Pager)) $_view_till_search_view_list->Pager = new NumericPager($_view_till_search_view_list->StartRec, $_view_till_search_view_list->DisplayRecs, $_view_till_search_view_list->TotalRecs, $_view_till_search_view_list->RecRange, $_view_till_search_view_list->AutoHidePager) ?>
<?php if ($_view_till_search_view_list->Pager->RecordCount > 0 && $_view_till_search_view_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($_view_till_search_view_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($_view_till_search_view_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $_view_till_search_view_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($_view_till_search_view_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_view_till_search_view_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_view_till_search_view_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_view_till_search_view_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($_view_till_search_view_list->TotalRecs > 0 && (!$_view_till_search_view_list->AutoHidePageSizeSelector || $_view_till_search_view_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="_view_till_search_view">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($_view_till_search_view_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($_view_till_search_view_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($_view_till_search_view_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($_view_till_search_view_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($_view_till_search_view_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($_view_till_search_view_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($_view_till_search_view->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_till_search_view_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="f_view_till_search_viewlist" id="f_view_till_search_viewlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_view_till_search_view_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_view_till_search_view_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_view_till_search_view">
<div id="gmp__view_till_search_view" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($_view_till_search_view_list->TotalRecs > 0 || $_view_till_search_view->isGridEdit()) { ?>
<table id="tbl__view_till_search_viewlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_view_till_search_view_list->RowType = ROWTYPE_HEADER;

// Render list options
$_view_till_search_view_list->renderListOptions();

// Render list options (header, left)
$_view_till_search_view_list->ListOptions->render("header", "left");
?>
<?php if ($_view_till_search_view->id->Visible) { // id ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->id) == "") { ?>
		<th data-name="id" class="<?php echo $_view_till_search_view->id->headerCellClass() ?>"><div id="elh__view_till_search_view_id" class="_view_till_search_view_id"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $_view_till_search_view->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->id) ?>',1);"><div id="elh__view_till_search_view_id" class="_view_till_search_view_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->DepositDate->Visible) { // DepositDate ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->DepositDate) == "") { ?>
		<th data-name="DepositDate" class="<?php echo $_view_till_search_view->DepositDate->headerCellClass() ?>"><div id="elh__view_till_search_view_DepositDate" class="_view_till_search_view_DepositDate"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->DepositDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepositDate" class="<?php echo $_view_till_search_view->DepositDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->DepositDate) ?>',1);"><div id="elh__view_till_search_view_DepositDate" class="_view_till_search_view_DepositDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->DepositDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->DepositDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->DepositDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->CreatedUserName->Visible) { // CreatedUserName ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->CreatedUserName) == "") { ?>
		<th data-name="CreatedUserName" class="<?php echo $_view_till_search_view->CreatedUserName->headerCellClass() ?>"><div id="elh__view_till_search_view_CreatedUserName" class="_view_till_search_view_CreatedUserName"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->CreatedUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedUserName" class="<?php echo $_view_till_search_view->CreatedUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->CreatedUserName) ?>',1);"><div id="elh__view_till_search_view_CreatedUserName" class="_view_till_search_view_CreatedUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->CreatedUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->CreatedUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->CreatedUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->TransferTo->Visible) { // TransferTo ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->TransferTo) == "") { ?>
		<th data-name="TransferTo" class="<?php echo $_view_till_search_view->TransferTo->headerCellClass() ?>"><div id="elh__view_till_search_view_TransferTo" class="_view_till_search_view_TransferTo"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->TransferTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferTo" class="<?php echo $_view_till_search_view->TransferTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->TransferTo) ?>',1);"><div id="elh__view_till_search_view_TransferTo" class="_view_till_search_view_TransferTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->TransferTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->TransferTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->TransferTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->OpeningBalance->Visible) { // OpeningBalance ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->OpeningBalance) == "") { ?>
		<th data-name="OpeningBalance" class="<?php echo $_view_till_search_view->OpeningBalance->headerCellClass() ?>"><div id="elh__view_till_search_view_OpeningBalance" class="_view_till_search_view_OpeningBalance"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->OpeningBalance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningBalance" class="<?php echo $_view_till_search_view->OpeningBalance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->OpeningBalance) ?>',1);"><div id="elh__view_till_search_view_OpeningBalance" class="_view_till_search_view_OpeningBalance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->OpeningBalance->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->OpeningBalance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->OpeningBalance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->CashCollected->Visible) { // CashCollected ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->CashCollected) == "") { ?>
		<th data-name="CashCollected" class="<?php echo $_view_till_search_view->CashCollected->headerCellClass() ?>"><div id="elh__view_till_search_view_CashCollected" class="_view_till_search_view_CashCollected"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->CashCollected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CashCollected" class="<?php echo $_view_till_search_view->CashCollected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->CashCollected) ?>',1);"><div id="elh__view_till_search_view_CashCollected" class="_view_till_search_view_CashCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->CashCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->CashCollected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->CashCollected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->TotalCash->Visible) { // TotalCash ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->TotalCash) == "") { ?>
		<th data-name="TotalCash" class="<?php echo $_view_till_search_view->TotalCash->headerCellClass() ?>"><div id="elh__view_till_search_view_TotalCash" class="_view_till_search_view_TotalCash"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->TotalCash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalCash" class="<?php echo $_view_till_search_view->TotalCash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->TotalCash) ?>',1);"><div id="elh__view_till_search_view_TotalCash" class="_view_till_search_view_TotalCash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->TotalCash->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->TotalCash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->TotalCash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->Cheque->Visible) { // Cheque ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->Cheque) == "") { ?>
		<th data-name="Cheque" class="<?php echo $_view_till_search_view->Cheque->headerCellClass() ?>"><div id="elh__view_till_search_view_Cheque" class="_view_till_search_view_Cheque"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->Cheque->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cheque" class="<?php echo $_view_till_search_view->Cheque->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->Cheque) ?>',1);"><div id="elh__view_till_search_view_Cheque" class="_view_till_search_view_Cheque">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->Cheque->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->Cheque->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->Cheque->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->Card->Visible) { // Card ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $_view_till_search_view->Card->headerCellClass() ?>"><div id="elh__view_till_search_view_Card" class="_view_till_search_view_Card"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $_view_till_search_view->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->Card) ?>',1);"><div id="elh__view_till_search_view_Card" class="_view_till_search_view_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->RTGS->Visible) { // RTGS ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->RTGS) == "") { ?>
		<th data-name="RTGS" class="<?php echo $_view_till_search_view->RTGS->headerCellClass() ?>"><div id="elh__view_till_search_view_RTGS" class="_view_till_search_view_RTGS"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->RTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RTGS" class="<?php echo $_view_till_search_view->RTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->RTGS) ?>',1);"><div id="elh__view_till_search_view_RTGS" class="_view_till_search_view_RTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->RTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->RTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->RTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->NEFTRTGS) == "") { ?>
		<th data-name="NEFTRTGS" class="<?php echo $_view_till_search_view->NEFTRTGS->headerCellClass() ?>"><div id="elh__view_till_search_view_NEFTRTGS" class="_view_till_search_view_NEFTRTGS"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->NEFTRTGS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NEFTRTGS" class="<?php echo $_view_till_search_view->NEFTRTGS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->NEFTRTGS) ?>',1);"><div id="elh__view_till_search_view_NEFTRTGS" class="_view_till_search_view_NEFTRTGS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->NEFTRTGS->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->NEFTRTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->NEFTRTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->PAYTM->Visible) { // PAYTM ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->PAYTM) == "") { ?>
		<th data-name="PAYTM" class="<?php echo $_view_till_search_view->PAYTM->headerCellClass() ?>"><div id="elh__view_till_search_view_PAYTM" class="_view_till_search_view_PAYTM"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->PAYTM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYTM" class="<?php echo $_view_till_search_view->PAYTM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->PAYTM) ?>',1);"><div id="elh__view_till_search_view_PAYTM" class="_view_till_search_view_PAYTM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->PAYTM->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->PAYTM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->PAYTM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->Other->Visible) { // Other ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->Other) == "") { ?>
		<th data-name="Other" class="<?php echo $_view_till_search_view->Other->headerCellClass() ?>"><div id="elh__view_till_search_view_Other" class="_view_till_search_view_Other"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->Other->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Other" class="<?php echo $_view_till_search_view->Other->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->Other) ?>',1);"><div id="elh__view_till_search_view_Other" class="_view_till_search_view_Other">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->Other->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->Other->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->Other->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->CreatedDateTime) == "") { ?>
		<th data-name="CreatedDateTime" class="<?php echo $_view_till_search_view->CreatedDateTime->headerCellClass() ?>"><div id="elh__view_till_search_view_CreatedDateTime" class="_view_till_search_view_CreatedDateTime"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->CreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDateTime" class="<?php echo $_view_till_search_view->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->CreatedDateTime) ?>',1);"><div id="elh__view_till_search_view_CreatedDateTime" class="_view_till_search_view_CreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->CreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->CreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_till_search_view->BalanceAmount->Visible) { // BalanceAmount ?>
	<?php if ($_view_till_search_view->sortUrl($_view_till_search_view->BalanceAmount) == "") { ?>
		<th data-name="BalanceAmount" class="<?php echo $_view_till_search_view->BalanceAmount->headerCellClass() ?>"><div id="elh__view_till_search_view_BalanceAmount" class="_view_till_search_view_BalanceAmount"><div class="ew-table-header-caption"><?php echo $_view_till_search_view->BalanceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BalanceAmount" class="<?php echo $_view_till_search_view->BalanceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_till_search_view->SortUrl($_view_till_search_view->BalanceAmount) ?>',1);"><div id="elh__view_till_search_view_BalanceAmount" class="_view_till_search_view_BalanceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_till_search_view->BalanceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_till_search_view->BalanceAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_till_search_view->BalanceAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_view_till_search_view_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_view_till_search_view->ExportAll && $_view_till_search_view->isExport()) {
	$_view_till_search_view_list->StopRec = $_view_till_search_view_list->TotalRecs;
} else {

	// Set the last record to display
	if ($_view_till_search_view_list->TotalRecs > $_view_till_search_view_list->StartRec + $_view_till_search_view_list->DisplayRecs - 1)
		$_view_till_search_view_list->StopRec = $_view_till_search_view_list->StartRec + $_view_till_search_view_list->DisplayRecs - 1;
	else
		$_view_till_search_view_list->StopRec = $_view_till_search_view_list->TotalRecs;
}
$_view_till_search_view_list->RecCnt = $_view_till_search_view_list->StartRec - 1;
if ($_view_till_search_view_list->Recordset && !$_view_till_search_view_list->Recordset->EOF) {
	$_view_till_search_view_list->Recordset->moveFirst();
	$selectLimit = $_view_till_search_view_list->UseSelectLimit;
	if (!$selectLimit && $_view_till_search_view_list->StartRec > 1)
		$_view_till_search_view_list->Recordset->move($_view_till_search_view_list->StartRec - 1);
} elseif (!$_view_till_search_view->AllowAddDeleteRow && $_view_till_search_view_list->StopRec == 0) {
	$_view_till_search_view_list->StopRec = $_view_till_search_view->GridAddRowCount;
}

// Initialize aggregate
$_view_till_search_view->RowType = ROWTYPE_AGGREGATEINIT;
$_view_till_search_view->resetAttributes();
$_view_till_search_view_list->renderRow();
while ($_view_till_search_view_list->RecCnt < $_view_till_search_view_list->StopRec) {
	$_view_till_search_view_list->RecCnt++;
	if ($_view_till_search_view_list->RecCnt >= $_view_till_search_view_list->StartRec) {
		$_view_till_search_view_list->RowCnt++;

		// Set up key count
		$_view_till_search_view_list->KeyCount = $_view_till_search_view_list->RowIndex;

		// Init row class and style
		$_view_till_search_view->resetAttributes();
		$_view_till_search_view->CssClass = "";
		if ($_view_till_search_view->isGridAdd()) {
		} else {
			$_view_till_search_view_list->loadRowValues($_view_till_search_view_list->Recordset); // Load row values
		}
		$_view_till_search_view->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_view_till_search_view->RowAttrs = array_merge($_view_till_search_view->RowAttrs, array('data-rowindex'=>$_view_till_search_view_list->RowCnt, 'id'=>'r' . $_view_till_search_view_list->RowCnt . '__view_till_search_view', 'data-rowtype'=>$_view_till_search_view->RowType));

		// Render row
		$_view_till_search_view_list->renderRow();

		// Render list options
		$_view_till_search_view_list->renderListOptions();
?>
	<tr<?php echo $_view_till_search_view->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_view_till_search_view_list->ListOptions->render("body", "left", $_view_till_search_view_list->RowCnt);
?>
	<?php if ($_view_till_search_view->id->Visible) { // id ?>
		<td data-name="id"<?php echo $_view_till_search_view->id->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_id" class="_view_till_search_view_id">
<span<?php echo $_view_till_search_view->id->viewAttributes() ?>>
<?php echo $_view_till_search_view->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate"<?php echo $_view_till_search_view->DepositDate->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_DepositDate" class="_view_till_search_view_DepositDate">
<span<?php echo $_view_till_search_view->DepositDate->viewAttributes() ?>>
<?php echo $_view_till_search_view->DepositDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName"<?php echo $_view_till_search_view->CreatedUserName->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_CreatedUserName" class="_view_till_search_view_CreatedUserName">
<span<?php echo $_view_till_search_view->CreatedUserName->viewAttributes() ?>>
<?php echo $_view_till_search_view->CreatedUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo"<?php echo $_view_till_search_view->TransferTo->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_TransferTo" class="_view_till_search_view_TransferTo">
<span<?php echo $_view_till_search_view->TransferTo->viewAttributes() ?>>
<?php echo $_view_till_search_view->TransferTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance"<?php echo $_view_till_search_view->OpeningBalance->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_OpeningBalance" class="_view_till_search_view_OpeningBalance">
<span<?php echo $_view_till_search_view->OpeningBalance->viewAttributes() ?>>
<?php echo $_view_till_search_view->OpeningBalance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->CashCollected->Visible) { // CashCollected ?>
		<td data-name="CashCollected"<?php echo $_view_till_search_view->CashCollected->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_CashCollected" class="_view_till_search_view_CashCollected">
<span<?php echo $_view_till_search_view->CashCollected->viewAttributes() ?>>
<?php echo $_view_till_search_view->CashCollected->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash"<?php echo $_view_till_search_view->TotalCash->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_TotalCash" class="_view_till_search_view_TotalCash">
<span<?php echo $_view_till_search_view->TotalCash->viewAttributes() ?>>
<?php echo $_view_till_search_view->TotalCash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque"<?php echo $_view_till_search_view->Cheque->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_Cheque" class="_view_till_search_view_Cheque">
<span<?php echo $_view_till_search_view->Cheque->viewAttributes() ?>>
<?php echo $_view_till_search_view->Cheque->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $_view_till_search_view->Card->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_Card" class="_view_till_search_view_Card">
<span<?php echo $_view_till_search_view->Card->viewAttributes() ?>>
<?php echo $_view_till_search_view->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS"<?php echo $_view_till_search_view->RTGS->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_RTGS" class="_view_till_search_view_RTGS">
<span<?php echo $_view_till_search_view->RTGS->viewAttributes() ?>>
<?php echo $_view_till_search_view->RTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS"<?php echo $_view_till_search_view->NEFTRTGS->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_NEFTRTGS" class="_view_till_search_view_NEFTRTGS">
<span<?php echo $_view_till_search_view->NEFTRTGS->viewAttributes() ?>>
<?php echo $_view_till_search_view->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM"<?php echo $_view_till_search_view->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_PAYTM" class="_view_till_search_view_PAYTM">
<span<?php echo $_view_till_search_view->PAYTM->viewAttributes() ?>>
<?php echo $_view_till_search_view->PAYTM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->Other->Visible) { // Other ?>
		<td data-name="Other"<?php echo $_view_till_search_view->Other->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_Other" class="_view_till_search_view_Other">
<span<?php echo $_view_till_search_view->Other->viewAttributes() ?>>
<?php echo $_view_till_search_view->Other->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime"<?php echo $_view_till_search_view->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_CreatedDateTime" class="_view_till_search_view_CreatedDateTime">
<span<?php echo $_view_till_search_view->CreatedDateTime->viewAttributes() ?>>
<?php echo $_view_till_search_view->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_till_search_view->BalanceAmount->Visible) { // BalanceAmount ?>
		<td data-name="BalanceAmount"<?php echo $_view_till_search_view->BalanceAmount->cellAttributes() ?>>
<span id="el<?php echo $_view_till_search_view_list->RowCnt ?>__view_till_search_view_BalanceAmount" class="_view_till_search_view_BalanceAmount">
<span<?php echo $_view_till_search_view->BalanceAmount->viewAttributes() ?>>
<?php echo $_view_till_search_view->BalanceAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_view_till_search_view_list->ListOptions->render("body", "right", $_view_till_search_view_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$_view_till_search_view->isGridAdd())
		$_view_till_search_view_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$_view_till_search_view->RowType = ROWTYPE_AGGREGATE;
$_view_till_search_view->resetAttributes();
$_view_till_search_view_list->renderRow();
?>
<?php if ($_view_till_search_view_list->TotalRecs > 0 && !$_view_till_search_view->isGridAdd() && !$_view_till_search_view->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$_view_till_search_view_list->renderListOptions();

// Render list options (footer, left)
$_view_till_search_view_list->ListOptions->render("footer", "left");
?>
	<?php if ($_view_till_search_view->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $_view_till_search_view->id->footerCellClass() ?>"><span id="elf__view_till_search_view_id" class="_view_till_search_view_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->DepositDate->Visible) { // DepositDate ?>
		<td data-name="DepositDate" class="<?php echo $_view_till_search_view->DepositDate->footerCellClass() ?>"><span id="elf__view_till_search_view_DepositDate" class="_view_till_search_view_DepositDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->CreatedUserName->Visible) { // CreatedUserName ?>
		<td data-name="CreatedUserName" class="<?php echo $_view_till_search_view->CreatedUserName->footerCellClass() ?>"><span id="elf__view_till_search_view_CreatedUserName" class="_view_till_search_view_CreatedUserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->TransferTo->Visible) { // TransferTo ?>
		<td data-name="TransferTo" class="<?php echo $_view_till_search_view->TransferTo->footerCellClass() ?>"><span id="elf__view_till_search_view_TransferTo" class="_view_till_search_view_TransferTo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->OpeningBalance->Visible) { // OpeningBalance ?>
		<td data-name="OpeningBalance" class="<?php echo $_view_till_search_view->OpeningBalance->footerCellClass() ?>"><span id="elf__view_till_search_view_OpeningBalance" class="_view_till_search_view_OpeningBalance">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->OpeningBalance->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->CashCollected->Visible) { // CashCollected ?>
		<td data-name="CashCollected" class="<?php echo $_view_till_search_view->CashCollected->footerCellClass() ?>"><span id="elf__view_till_search_view_CashCollected" class="_view_till_search_view_CashCollected">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->CashCollected->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->TotalCash->Visible) { // TotalCash ?>
		<td data-name="TotalCash" class="<?php echo $_view_till_search_view->TotalCash->footerCellClass() ?>"><span id="elf__view_till_search_view_TotalCash" class="_view_till_search_view_TotalCash">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->TotalCash->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->Cheque->Visible) { // Cheque ?>
		<td data-name="Cheque" class="<?php echo $_view_till_search_view->Cheque->footerCellClass() ?>"><span id="elf__view_till_search_view_Cheque" class="_view_till_search_view_Cheque">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->Cheque->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->Card->Visible) { // Card ?>
		<td data-name="Card" class="<?php echo $_view_till_search_view->Card->footerCellClass() ?>"><span id="elf__view_till_search_view_Card" class="_view_till_search_view_Card">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->Card->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->RTGS->Visible) { // RTGS ?>
		<td data-name="RTGS" class="<?php echo $_view_till_search_view->RTGS->footerCellClass() ?>"><span id="elf__view_till_search_view_RTGS" class="_view_till_search_view_RTGS">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->RTGS->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td data-name="NEFTRTGS" class="<?php echo $_view_till_search_view->NEFTRTGS->footerCellClass() ?>"><span id="elf__view_till_search_view_NEFTRTGS" class="_view_till_search_view_NEFTRTGS">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->NEFTRTGS->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->PAYTM->Visible) { // PAYTM ?>
		<td data-name="PAYTM" class="<?php echo $_view_till_search_view->PAYTM->footerCellClass() ?>"><span id="elf__view_till_search_view_PAYTM" class="_view_till_search_view_PAYTM">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->PAYTM->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->Other->Visible) { // Other ?>
		<td data-name="Other" class="<?php echo $_view_till_search_view->Other->footerCellClass() ?>"><span id="elf__view_till_search_view_Other" class="_view_till_search_view_Other">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->Other->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td data-name="CreatedDateTime" class="<?php echo $_view_till_search_view->CreatedDateTime->footerCellClass() ?>"><span id="elf__view_till_search_view_CreatedDateTime" class="_view_till_search_view_CreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($_view_till_search_view->BalanceAmount->Visible) { // BalanceAmount ?>
		<td data-name="BalanceAmount" class="<?php echo $_view_till_search_view->BalanceAmount->footerCellClass() ?>"><span id="elf__view_till_search_view_BalanceAmount" class="_view_till_search_view_BalanceAmount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $_view_till_search_view->BalanceAmount->ViewValue ?></span>
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$_view_till_search_view_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$_view_till_search_view->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_view_till_search_view_list->Recordset)
	$_view_till_search_view_list->Recordset->Close();
?>
<?php if (!$_view_till_search_view->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$_view_till_search_view->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_view_till_search_view_list->Pager)) $_view_till_search_view_list->Pager = new NumericPager($_view_till_search_view_list->StartRec, $_view_till_search_view_list->DisplayRecs, $_view_till_search_view_list->TotalRecs, $_view_till_search_view_list->RecRange, $_view_till_search_view_list->AutoHidePager) ?>
<?php if ($_view_till_search_view_list->Pager->RecordCount > 0 && $_view_till_search_view_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($_view_till_search_view_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($_view_till_search_view_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $_view_till_search_view_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($_view_till_search_view_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_till_search_view_list->pageUrl() ?>start=<?php echo $_view_till_search_view_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($_view_till_search_view_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_view_till_search_view_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_view_till_search_view_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_view_till_search_view_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($_view_till_search_view_list->TotalRecs > 0 && (!$_view_till_search_view_list->AutoHidePageSizeSelector || $_view_till_search_view_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="_view_till_search_view">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($_view_till_search_view_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($_view_till_search_view_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($_view_till_search_view_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($_view_till_search_view_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($_view_till_search_view_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($_view_till_search_view_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($_view_till_search_view->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_till_search_view_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_view_till_search_view_list->TotalRecs == 0 && !$_view_till_search_view->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_view_till_search_view_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_view_till_search_view_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$_view_till_search_view->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$_view_till_search_view->isExport()) { ?>
<script>
ew.scrollableTable("gmp__view_till_search_view", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$_view_till_search_view_list->terminate();
?>