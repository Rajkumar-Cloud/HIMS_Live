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
$_view_pharmacy_search_product_search_list = new _view_pharmacy_search_product_search_list();

// Run the page
$_view_pharmacy_search_product_search_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_view_pharmacy_search_product_search_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$_view_pharmacy_search_product_search->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var f_view_pharmacy_search_product_searchlist = currentForm = new ew.Form("f_view_pharmacy_search_product_searchlist", "list");
f_view_pharmacy_search_product_searchlist.formKeyCountName = '<?php echo $_view_pharmacy_search_product_search_list->FormKeyCountName ?>';

// Form_CustomValidate event
f_view_pharmacy_search_product_searchlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_view_pharmacy_search_product_searchlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_view_pharmacy_search_product_searchlist.lists["x_BRCODE"] = <?php echo $_view_pharmacy_search_product_search_list->BRCODE->Lookup->toClientList() ?>;
f_view_pharmacy_search_product_searchlist.lists["x_BRCODE"].options = <?php echo JsonEncode($_view_pharmacy_search_product_search_list->BRCODE->lookupOptions()) ?>;

// Form object for search
var f_view_pharmacy_search_product_searchlistsrch = currentSearchForm = new ew.Form("f_view_pharmacy_search_product_searchlistsrch");

// Validate function for search
f_view_pharmacy_search_product_searchlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Stock");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($_view_pharmacy_search_product_search->Stock->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($_view_pharmacy_search_product_search->EXPDT->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
f_view_pharmacy_search_product_searchlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_view_pharmacy_search_product_searchlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

f_view_pharmacy_search_product_searchlistsrch.filterList = <?php echo $_view_pharmacy_search_product_search_list->getFilterList() ?>;
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
<?php if (!$_view_pharmacy_search_product_search->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_view_pharmacy_search_product_search_list->TotalRecs > 0 && $_view_pharmacy_search_product_search_list->ExportOptions->visible()) { ?>
<?php $_view_pharmacy_search_product_search_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->ImportOptions->visible()) { ?>
<?php $_view_pharmacy_search_product_search_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->SearchOptions->visible()) { ?>
<?php $_view_pharmacy_search_product_search_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->FilterOptions->visible()) { ?>
<?php $_view_pharmacy_search_product_search_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$_view_pharmacy_search_product_search_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$_view_pharmacy_search_product_search->isExport() && !$_view_pharmacy_search_product_search->CurrentAction) { ?>
<form name="f_view_pharmacy_search_product_searchlistsrch" id="f_view_pharmacy_search_product_searchlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($_view_pharmacy_search_product_search_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="f_view_pharmacy_search_product_searchlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_view_pharmacy_search_product_search">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$_view_pharmacy_search_product_search_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$_view_pharmacy_search_product_search->RowType = ROWTYPE_SEARCH;

// Render row
$_view_pharmacy_search_product_search->resetAttributes();
$_view_pharmacy_search_product_search_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($_view_pharmacy_search_product_search->DES->Visible) { // DES ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $_view_pharmacy_search_product_search->DES->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DES" id="z_DES" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="_view_pharmacy_search_product_search" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($_view_pharmacy_search_product_search->DES->getPlaceHolder()) ?>" value="<?php echo $_view_pharmacy_search_product_search->DES->EditValue ?>"<?php echo $_view_pharmacy_search_product_search->DES->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->Stock->Visible) { // Stock ?>
	<div id="xsc_Stock" class="ew-cell form-group">
		<label for="x_Stock" class="ew-search-caption ew-label"><?php echo $_view_pharmacy_search_product_search->Stock->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Stock" id="z_Stock" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($_view_pharmacy_search_product_search->Stock->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="_view_pharmacy_search_product_search" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($_view_pharmacy_search_product_search->Stock->getPlaceHolder()) ?>" value="<?php echo $_view_pharmacy_search_product_search->Stock->EditValue ?>"<?php echo $_view_pharmacy_search_product_search->Stock->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_Stock style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Stock style="d-none"">
<input type="text" data-table="_view_pharmacy_search_product_search" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?php echo HtmlEncode($_view_pharmacy_search_product_search->Stock->getPlaceHolder()) ?>" value="<?php echo $_view_pharmacy_search_product_search->Stock->EditValue2 ?>"<?php echo $_view_pharmacy_search_product_search->Stock->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($_view_pharmacy_search_product_search->EXPDT->Visible) { // EXPDT ?>
	<div id="xsc_EXPDT" class="ew-cell form-group">
		<label for="x_EXPDT" class="ew-search-caption ew-label"><?php echo $_view_pharmacy_search_product_search->EXPDT->caption() ?></label>
		<span class="ew-search-operator"><select name="z_EXPDT" id="z_EXPDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($_view_pharmacy_search_product_search->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="_view_pharmacy_search_product_search" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($_view_pharmacy_search_product_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $_view_pharmacy_search_product_search->EXPDT->EditValue ?>"<?php echo $_view_pharmacy_search_product_search->EXPDT->editAttributes() ?>>
<?php if (!$_view_pharmacy_search_product_search->EXPDT->ReadOnly && !$_view_pharmacy_search_product_search->EXPDT->Disabled && !isset($_view_pharmacy_search_product_search->EXPDT->EditAttrs["readonly"]) && !isset($_view_pharmacy_search_product_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_view_pharmacy_search_product_searchlistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_EXPDT style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_EXPDT style="d-none"">
<input type="text" data-table="_view_pharmacy_search_product_search" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?php echo HtmlEncode($_view_pharmacy_search_product_search->EXPDT->getPlaceHolder()) ?>" value="<?php echo $_view_pharmacy_search_product_search->EXPDT->EditValue2 ?>"<?php echo $_view_pharmacy_search_product_search->EXPDT->editAttributes() ?>>
<?php if (!$_view_pharmacy_search_product_search->EXPDT->ReadOnly && !$_view_pharmacy_search_product_search->EXPDT->Disabled && !isset($_view_pharmacy_search_product_search->EXPDT->EditAttrs["readonly"]) && !isset($_view_pharmacy_search_product_search->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_view_pharmacy_search_product_searchlistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($_view_pharmacy_search_product_search_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($_view_pharmacy_search_product_search_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $_view_pharmacy_search_product_search_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($_view_pharmacy_search_product_search_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($_view_pharmacy_search_product_search_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($_view_pharmacy_search_product_search_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($_view_pharmacy_search_product_search_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $_view_pharmacy_search_product_search_list->showPageHeader(); ?>
<?php
$_view_pharmacy_search_product_search_list->showMessage();
?>
<?php if ($_view_pharmacy_search_product_search_list->TotalRecs > 0 || $_view_pharmacy_search_product_search->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_view_pharmacy_search_product_search_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _view_pharmacy_search_product_search">
<?php if (!$_view_pharmacy_search_product_search->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$_view_pharmacy_search_product_search->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_view_pharmacy_search_product_search_list->Pager)) $_view_pharmacy_search_product_search_list->Pager = new NumericPager($_view_pharmacy_search_product_search_list->StartRec, $_view_pharmacy_search_product_search_list->DisplayRecs, $_view_pharmacy_search_product_search_list->TotalRecs, $_view_pharmacy_search_product_search_list->RecRange, $_view_pharmacy_search_product_search_list->AutoHidePager) ?>
<?php if ($_view_pharmacy_search_product_search_list->Pager->RecordCount > 0 && $_view_pharmacy_search_product_search_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($_view_pharmacy_search_product_search_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($_view_pharmacy_search_product_search_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $_view_pharmacy_search_product_search_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_view_pharmacy_search_product_search_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_view_pharmacy_search_product_search_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_view_pharmacy_search_product_search_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->TotalRecs > 0 && (!$_view_pharmacy_search_product_search_list->AutoHidePageSizeSelector || $_view_pharmacy_search_product_search_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="_view_pharmacy_search_product_search">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($_view_pharmacy_search_product_search->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_pharmacy_search_product_search_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="f_view_pharmacy_search_product_searchlist" id="f_view_pharmacy_search_product_searchlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_view_pharmacy_search_product_search_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_view_pharmacy_search_product_search_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_view_pharmacy_search_product_search">
<div id="gmp__view_pharmacy_search_product_search" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($_view_pharmacy_search_product_search_list->TotalRecs > 0 || $_view_pharmacy_search_product_search->isGridEdit()) { ?>
<table id="tbl__view_pharmacy_search_product_searchlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_view_pharmacy_search_product_search_list->RowType = ROWTYPE_HEADER;

// Render list options
$_view_pharmacy_search_product_search_list->renderListOptions();

// Render list options (header, left)
$_view_pharmacy_search_product_search_list->ListOptions->render("header", "left");
?>
<?php if ($_view_pharmacy_search_product_search->id->Visible) { // id ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->id) == "") { ?>
		<th data-name="id" class="<?php echo $_view_pharmacy_search_product_search->id->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_id" class="_view_pharmacy_search_product_search_id"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $_view_pharmacy_search_product_search->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->id) ?>',1);"><div id="elh__view_pharmacy_search_product_search_id" class="_view_pharmacy_search_product_search_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->DES->Visible) { // DES ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $_view_pharmacy_search_product_search->DES->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_DES" class="_view_pharmacy_search_product_search_DES"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $_view_pharmacy_search_product_search->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->DES) ?>',1);"><div id="elh__view_pharmacy_search_product_search_DES" class="_view_pharmacy_search_product_search_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->DES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->DES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->BATCH->Visible) { // BATCH ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $_view_pharmacy_search_product_search->BATCH->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_BATCH" class="_view_pharmacy_search_product_search_BATCH"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $_view_pharmacy_search_product_search->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->BATCH) ?>',1);"><div id="elh__view_pharmacy_search_product_search_BATCH" class="_view_pharmacy_search_product_search_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->BATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->BATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->PRC->Visible) { // PRC ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $_view_pharmacy_search_product_search->PRC->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_PRC" class="_view_pharmacy_search_product_search_PRC"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $_view_pharmacy_search_product_search->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->PRC) ?>',1);"><div id="elh__view_pharmacy_search_product_search_PRC" class="_view_pharmacy_search_product_search_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->Stock->Visible) { // Stock ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $_view_pharmacy_search_product_search->Stock->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_Stock" class="_view_pharmacy_search_product_search_Stock"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $_view_pharmacy_search_product_search->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->Stock) ?>',1);"><div id="elh__view_pharmacy_search_product_search_Stock" class="_view_pharmacy_search_product_search_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->Stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->Stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->EXPDT->Visible) { // EXPDT ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $_view_pharmacy_search_product_search->EXPDT->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_EXPDT" class="_view_pharmacy_search_product_search_EXPDT"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $_view_pharmacy_search_product_search->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->EXPDT) ?>',1);"><div id="elh__view_pharmacy_search_product_search_EXPDT" class="_view_pharmacy_search_product_search_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->GENNAME->Visible) { // GENNAME ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $_view_pharmacy_search_product_search->GENNAME->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_GENNAME" class="_view_pharmacy_search_product_search_GENNAME"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $_view_pharmacy_search_product_search->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->GENNAME) ?>',1);"><div id="elh__view_pharmacy_search_product_search_GENNAME" class="_view_pharmacy_search_product_search_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->UNIT->Visible) { // UNIT ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $_view_pharmacy_search_product_search->UNIT->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_UNIT" class="_view_pharmacy_search_product_search_UNIT"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $_view_pharmacy_search_product_search->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->UNIT) ?>',1);"><div id="elh__view_pharmacy_search_product_search_UNIT" class="_view_pharmacy_search_product_search_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->UNIT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->UNIT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->RT->Visible) { // RT ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $_view_pharmacy_search_product_search->RT->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_RT" class="_view_pharmacy_search_product_search_RT"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $_view_pharmacy_search_product_search->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->RT) ?>',1);"><div id="elh__view_pharmacy_search_product_search_RT" class="_view_pharmacy_search_product_search_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->SSGST->Visible) { // SSGST ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $_view_pharmacy_search_product_search->SSGST->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_SSGST" class="_view_pharmacy_search_product_search_SSGST"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $_view_pharmacy_search_product_search->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->SSGST) ?>',1);"><div id="elh__view_pharmacy_search_product_search_SSGST" class="_view_pharmacy_search_product_search_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->SCGST->Visible) { // SCGST ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $_view_pharmacy_search_product_search->SCGST->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_SCGST" class="_view_pharmacy_search_product_search_SCGST"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $_view_pharmacy_search_product_search->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->SCGST) ?>',1);"><div id="elh__view_pharmacy_search_product_search_SCGST" class="_view_pharmacy_search_product_search_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $_view_pharmacy_search_product_search->MFRCODE->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_MFRCODE" class="_view_pharmacy_search_product_search_MFRCODE"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $_view_pharmacy_search_product_search->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->MFRCODE) ?>',1);"><div id="elh__view_pharmacy_search_product_search_MFRCODE" class="_view_pharmacy_search_product_search_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search->BRCODE->Visible) { // BRCODE ?>
	<?php if ($_view_pharmacy_search_product_search->sortUrl($_view_pharmacy_search_product_search->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $_view_pharmacy_search_product_search->BRCODE->headerCellClass() ?>"><div id="elh__view_pharmacy_search_product_search_BRCODE" class="_view_pharmacy_search_product_search_BRCODE"><div class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $_view_pharmacy_search_product_search->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_view_pharmacy_search_product_search->SortUrl($_view_pharmacy_search_product_search->BRCODE) ?>',1);"><div id="elh__view_pharmacy_search_product_search_BRCODE" class="_view_pharmacy_search_product_search_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_pharmacy_search_product_search->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_pharmacy_search_product_search->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_view_pharmacy_search_product_search->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_view_pharmacy_search_product_search_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_view_pharmacy_search_product_search->ExportAll && $_view_pharmacy_search_product_search->isExport()) {
	$_view_pharmacy_search_product_search_list->StopRec = $_view_pharmacy_search_product_search_list->TotalRecs;
} else {

	// Set the last record to display
	if ($_view_pharmacy_search_product_search_list->TotalRecs > $_view_pharmacy_search_product_search_list->StartRec + $_view_pharmacy_search_product_search_list->DisplayRecs - 1)
		$_view_pharmacy_search_product_search_list->StopRec = $_view_pharmacy_search_product_search_list->StartRec + $_view_pharmacy_search_product_search_list->DisplayRecs - 1;
	else
		$_view_pharmacy_search_product_search_list->StopRec = $_view_pharmacy_search_product_search_list->TotalRecs;
}
$_view_pharmacy_search_product_search_list->RecCnt = $_view_pharmacy_search_product_search_list->StartRec - 1;
if ($_view_pharmacy_search_product_search_list->Recordset && !$_view_pharmacy_search_product_search_list->Recordset->EOF) {
	$_view_pharmacy_search_product_search_list->Recordset->moveFirst();
	$selectLimit = $_view_pharmacy_search_product_search_list->UseSelectLimit;
	if (!$selectLimit && $_view_pharmacy_search_product_search_list->StartRec > 1)
		$_view_pharmacy_search_product_search_list->Recordset->move($_view_pharmacy_search_product_search_list->StartRec - 1);
} elseif (!$_view_pharmacy_search_product_search->AllowAddDeleteRow && $_view_pharmacy_search_product_search_list->StopRec == 0) {
	$_view_pharmacy_search_product_search_list->StopRec = $_view_pharmacy_search_product_search->GridAddRowCount;
}

// Initialize aggregate
$_view_pharmacy_search_product_search->RowType = ROWTYPE_AGGREGATEINIT;
$_view_pharmacy_search_product_search->resetAttributes();
$_view_pharmacy_search_product_search_list->renderRow();
while ($_view_pharmacy_search_product_search_list->RecCnt < $_view_pharmacy_search_product_search_list->StopRec) {
	$_view_pharmacy_search_product_search_list->RecCnt++;
	if ($_view_pharmacy_search_product_search_list->RecCnt >= $_view_pharmacy_search_product_search_list->StartRec) {
		$_view_pharmacy_search_product_search_list->RowCnt++;

		// Set up key count
		$_view_pharmacy_search_product_search_list->KeyCount = $_view_pharmacy_search_product_search_list->RowIndex;

		// Init row class and style
		$_view_pharmacy_search_product_search->resetAttributes();
		$_view_pharmacy_search_product_search->CssClass = "";
		if ($_view_pharmacy_search_product_search->isGridAdd()) {
		} else {
			$_view_pharmacy_search_product_search_list->loadRowValues($_view_pharmacy_search_product_search_list->Recordset); // Load row values
		}
		$_view_pharmacy_search_product_search->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_view_pharmacy_search_product_search->RowAttrs = array_merge($_view_pharmacy_search_product_search->RowAttrs, array('data-rowindex'=>$_view_pharmacy_search_product_search_list->RowCnt, 'id'=>'r' . $_view_pharmacy_search_product_search_list->RowCnt . '__view_pharmacy_search_product_search', 'data-rowtype'=>$_view_pharmacy_search_product_search->RowType));

		// Render row
		$_view_pharmacy_search_product_search_list->renderRow();

		// Render list options
		$_view_pharmacy_search_product_search_list->renderListOptions();
?>
	<tr<?php echo $_view_pharmacy_search_product_search->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_view_pharmacy_search_product_search_list->ListOptions->render("body", "left", $_view_pharmacy_search_product_search_list->RowCnt);
?>
	<?php if ($_view_pharmacy_search_product_search->id->Visible) { // id ?>
		<td data-name="id"<?php echo $_view_pharmacy_search_product_search->id->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_id" class="_view_pharmacy_search_product_search_id">
<span<?php echo $_view_pharmacy_search_product_search->id->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->DES->Visible) { // DES ?>
		<td data-name="DES"<?php echo $_view_pharmacy_search_product_search->DES->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_DES" class="_view_pharmacy_search_product_search_DES">
<span<?php echo $_view_pharmacy_search_product_search->DES->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH"<?php echo $_view_pharmacy_search_product_search->BATCH->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_BATCH" class="_view_pharmacy_search_product_search_BATCH">
<span<?php echo $_view_pharmacy_search_product_search->BATCH->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $_view_pharmacy_search_product_search->PRC->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_PRC" class="_view_pharmacy_search_product_search_PRC">
<span<?php echo $_view_pharmacy_search_product_search->PRC->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->Stock->Visible) { // Stock ?>
		<td data-name="Stock"<?php echo $_view_pharmacy_search_product_search->Stock->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_Stock" class="_view_pharmacy_search_product_search_Stock">
<span<?php echo $_view_pharmacy_search_product_search->Stock->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->Stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $_view_pharmacy_search_product_search->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_EXPDT" class="_view_pharmacy_search_product_search_EXPDT">
<span<?php echo $_view_pharmacy_search_product_search->EXPDT->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $_view_pharmacy_search_product_search->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_GENNAME" class="_view_pharmacy_search_product_search_GENNAME">
<span<?php echo $_view_pharmacy_search_product_search->GENNAME->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT"<?php echo $_view_pharmacy_search_product_search->UNIT->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_UNIT" class="_view_pharmacy_search_product_search_UNIT">
<span<?php echo $_view_pharmacy_search_product_search->UNIT->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $_view_pharmacy_search_product_search->RT->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_RT" class="_view_pharmacy_search_product_search_RT">
<span<?php echo $_view_pharmacy_search_product_search->RT->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $_view_pharmacy_search_product_search->SSGST->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_SSGST" class="_view_pharmacy_search_product_search_SSGST">
<span<?php echo $_view_pharmacy_search_product_search->SSGST->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $_view_pharmacy_search_product_search->SCGST->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_SCGST" class="_view_pharmacy_search_product_search_SCGST">
<span<?php echo $_view_pharmacy_search_product_search->SCGST->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $_view_pharmacy_search_product_search->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_MFRCODE" class="_view_pharmacy_search_product_search_MFRCODE">
<span<?php echo $_view_pharmacy_search_product_search->MFRCODE->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $_view_pharmacy_search_product_search->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $_view_pharmacy_search_product_search_list->RowCnt ?>__view_pharmacy_search_product_search_BRCODE" class="_view_pharmacy_search_product_search_BRCODE">
<span<?php echo $_view_pharmacy_search_product_search->BRCODE->viewAttributes() ?>>
<?php echo $_view_pharmacy_search_product_search->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_view_pharmacy_search_product_search_list->ListOptions->render("body", "right", $_view_pharmacy_search_product_search_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$_view_pharmacy_search_product_search->isGridAdd())
		$_view_pharmacy_search_product_search_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$_view_pharmacy_search_product_search->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_view_pharmacy_search_product_search_list->Recordset)
	$_view_pharmacy_search_product_search_list->Recordset->Close();
?>
<?php if (!$_view_pharmacy_search_product_search->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$_view_pharmacy_search_product_search->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_view_pharmacy_search_product_search_list->Pager)) $_view_pharmacy_search_product_search_list->Pager = new NumericPager($_view_pharmacy_search_product_search_list->StartRec, $_view_pharmacy_search_product_search_list->DisplayRecs, $_view_pharmacy_search_product_search_list->TotalRecs, $_view_pharmacy_search_product_search_list->RecRange, $_view_pharmacy_search_product_search_list->AutoHidePager) ?>
<?php if ($_view_pharmacy_search_product_search_list->Pager->RecordCount > 0 && $_view_pharmacy_search_product_search_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($_view_pharmacy_search_product_search_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($_view_pharmacy_search_product_search_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $_view_pharmacy_search_product_search_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($_view_pharmacy_search_product_search_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_view_pharmacy_search_product_search_list->pageUrl() ?>start=<?php echo $_view_pharmacy_search_product_search_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_view_pharmacy_search_product_search_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_view_pharmacy_search_product_search_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_view_pharmacy_search_product_search_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->TotalRecs > 0 && (!$_view_pharmacy_search_product_search_list->AutoHidePageSizeSelector || $_view_pharmacy_search_product_search_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="_view_pharmacy_search_product_search">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($_view_pharmacy_search_product_search_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($_view_pharmacy_search_product_search->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_pharmacy_search_product_search_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_view_pharmacy_search_product_search_list->TotalRecs == 0 && !$_view_pharmacy_search_product_search->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_view_pharmacy_search_product_search_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_view_pharmacy_search_product_search_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$_view_pharmacy_search_product_search->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$_view_pharmacy_search_product_search->isExport()) { ?>
<script>
ew.scrollableTable("gmp__view_pharmacy_search_product_search", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$_view_pharmacy_search_product_search_list->terminate();
?>