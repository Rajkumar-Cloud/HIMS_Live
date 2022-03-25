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
$view_pharmacy_last_sale_list = new view_pharmacy_last_sale_list();

// Run the page
$view_pharmacy_last_sale_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_last_sale_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_last_sale->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_last_salelist = currentForm = new ew.Form("fview_pharmacy_last_salelist", "list");
fview_pharmacy_last_salelist.formKeyCountName = '<?php echo $view_pharmacy_last_sale_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_last_salelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_last_salelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_last_salelistsrch = currentSearchForm = new ew.Form("fview_pharmacy_last_salelistsrch");

// Validate function for search
fview_pharmacy_last_salelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_LastSaleBILLDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_last_sale->LastSaleBILLDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_expdt");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_last_sale->expdt->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_last_salelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_last_salelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_last_salelistsrch.filterList = <?php echo $view_pharmacy_last_sale_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_last_sale->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_last_sale_list->TotalRecs > 0 && $view_pharmacy_last_sale_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_last_sale_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_last_sale_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_last_sale_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_last_sale_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_last_sale_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_last_sale->isExport() && !$view_pharmacy_last_sale->CurrentAction) { ?>
<form name="fview_pharmacy_last_salelistsrch" id="fview_pharmacy_last_salelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_last_sale_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_last_salelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_last_sale">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_last_sale_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_last_sale->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_last_sale->resetAttributes();
$view_pharmacy_last_sale_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_last_sale->LastSaleBILLDT->Visible) { // LastSaleBILLDT ?>
	<div id="xsc_LastSaleBILLDT" class="ew-cell form-group">
		<label for="x_LastSaleBILLDT" class="ew-search-caption ew-label"><?php echo $view_pharmacy_last_sale->LastSaleBILLDT->caption() ?></label>
		<span class="ew-search-operator"><select name="z_LastSaleBILLDT" id="z_LastSaleBILLDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_last_sale->LastSaleBILLDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_last_sale" data-field="x_LastSaleBILLDT" name="x_LastSaleBILLDT" id="x_LastSaleBILLDT" placeholder="<?php echo HtmlEncode($view_pharmacy_last_sale->LastSaleBILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->EditValue ?>"<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->editAttributes() ?>>
<?php if (!$view_pharmacy_last_sale->LastSaleBILLDT->ReadOnly && !$view_pharmacy_last_sale->LastSaleBILLDT->Disabled && !isset($view_pharmacy_last_sale->LastSaleBILLDT->EditAttrs["readonly"]) && !isset($view_pharmacy_last_sale->LastSaleBILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "x_LastSaleBILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_LastSaleBILLDT style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_LastSaleBILLDT style="d-none"">
<input type="text" data-table="view_pharmacy_last_sale" data-field="x_LastSaleBILLDT" name="y_LastSaleBILLDT" id="y_LastSaleBILLDT" placeholder="<?php echo HtmlEncode($view_pharmacy_last_sale->LastSaleBILLDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->EditValue2 ?>"<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->editAttributes() ?>>
<?php if (!$view_pharmacy_last_sale->LastSaleBILLDT->ReadOnly && !$view_pharmacy_last_sale->LastSaleBILLDT->Disabled && !isset($view_pharmacy_last_sale->LastSaleBILLDT->EditAttrs["readonly"]) && !isset($view_pharmacy_last_sale->LastSaleBILLDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "y_LastSaleBILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_last_sale->prc->Visible) { // prc ?>
	<div id="xsc_prc" class="ew-cell form-group">
		<label for="x_prc" class="ew-search-caption ew-label"><?php echo $view_pharmacy_last_sale->prc->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_prc" id="z_prc" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_last_sale" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_last_sale->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_last_sale->prc->EditValue ?>"<?php echo $view_pharmacy_last_sale->prc->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_last_sale->expdt->Visible) { // expdt ?>
	<div id="xsc_expdt" class="ew-cell form-group">
		<label for="x_expdt" class="ew-search-caption ew-label"><?php echo $view_pharmacy_last_sale->expdt->caption() ?></label>
		<span class="ew-search-operator"><select name="z_expdt" id="z_expdt" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_last_sale->expdt->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_last_sale" data-field="x_expdt" name="x_expdt" id="x_expdt" placeholder="<?php echo HtmlEncode($view_pharmacy_last_sale->expdt->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_last_sale->expdt->EditValue ?>"<?php echo $view_pharmacy_last_sale->expdt->editAttributes() ?>>
<?php if (!$view_pharmacy_last_sale->expdt->ReadOnly && !$view_pharmacy_last_sale->expdt->Disabled && !isset($view_pharmacy_last_sale->expdt->EditAttrs["readonly"]) && !isset($view_pharmacy_last_sale->expdt->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "x_expdt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_expdt style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_expdt style="d-none"">
<input type="text" data-table="view_pharmacy_last_sale" data-field="x_expdt" name="y_expdt" id="y_expdt" placeholder="<?php echo HtmlEncode($view_pharmacy_last_sale->expdt->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_last_sale->expdt->EditValue2 ?>"<?php echo $view_pharmacy_last_sale->expdt->editAttributes() ?>>
<?php if (!$view_pharmacy_last_sale->expdt->ReadOnly && !$view_pharmacy_last_sale->expdt->Disabled && !isset($view_pharmacy_last_sale->expdt->EditAttrs["readonly"]) && !isset($view_pharmacy_last_sale->expdt->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "y_expdt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_last_sale->Product->Visible) { // Product ?>
	<div id="xsc_Product" class="ew-cell form-group">
		<label for="x_Product" class="ew-search-caption ew-label"><?php echo $view_pharmacy_last_sale->Product->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Product" id="z_Product" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_last_sale" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_last_sale->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_last_sale->Product->EditValue ?>"<?php echo $view_pharmacy_last_sale->Product->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_last_sale_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_last_sale_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_last_sale_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_last_sale_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_last_sale_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_last_sale_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_last_sale_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_last_sale_list->showPageHeader(); ?>
<?php
$view_pharmacy_last_sale_list->showMessage();
?>
<?php if ($view_pharmacy_last_sale_list->TotalRecs > 0 || $view_pharmacy_last_sale->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_last_sale_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_last_sale">
<?php if (!$view_pharmacy_last_sale->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_last_sale->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_last_sale_list->Pager)) $view_pharmacy_last_sale_list->Pager = new NumericPager($view_pharmacy_last_sale_list->StartRec, $view_pharmacy_last_sale_list->DisplayRecs, $view_pharmacy_last_sale_list->TotalRecs, $view_pharmacy_last_sale_list->RecRange, $view_pharmacy_last_sale_list->AutoHidePager) ?>
<?php if ($view_pharmacy_last_sale_list->Pager->RecordCount > 0 && $view_pharmacy_last_sale_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_last_sale_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_last_sale_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_last_sale_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_last_sale_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_last_sale_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_last_sale_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->TotalRecs > 0 && (!$view_pharmacy_last_sale_list->AutoHidePageSizeSelector || $view_pharmacy_last_sale_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_last_sale">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_last_sale->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_last_sale_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_last_salelist" id="fview_pharmacy_last_salelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_last_sale_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_last_sale_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_last_sale">
<div id="gmp_view_pharmacy_last_sale" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_last_sale_list->TotalRecs > 0 || $view_pharmacy_last_sale->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_last_salelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_last_sale_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_last_sale_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_last_sale_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_last_sale->LastSaleBILLDT->Visible) { // LastSaleBILLDT ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->LastSaleBILLDT) == "") { ?>
		<th data-name="LastSaleBILLDT" class="<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_LastSaleBILLDT" class="view_pharmacy_last_sale_LastSaleBILLDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->LastSaleBILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastSaleBILLDT" class="<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->LastSaleBILLDT) ?>',1);"><div id="elh_view_pharmacy_last_sale_LastSaleBILLDT" class="view_pharmacy_last_sale_LastSaleBILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->LastSaleBILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->LastSaleBILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->LastSaleBILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_last_sale->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_BRCODE" class="view_pharmacy_last_sale_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_last_sale->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->BRCODE) ?>',1);"><div id="elh_view_pharmacy_last_sale_BRCODE" class="view_pharmacy_last_sale_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_last_sale->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_prc" class="view_pharmacy_last_sale_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_last_sale->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->prc) ?>',1);"><div id="elh_view_pharmacy_last_sale_prc" class="view_pharmacy_last_sale_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_last_sale->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_BATCHNO" class="view_pharmacy_last_sale_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_last_sale->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->BATCHNO) ?>',1);"><div id="elh_view_pharmacy_last_sale_BATCHNO" class="view_pharmacy_last_sale_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale->expdt->Visible) { // expdt ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->expdt) == "") { ?>
		<th data-name="expdt" class="<?php echo $view_pharmacy_last_sale->expdt->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_expdt" class="view_pharmacy_last_sale_expdt"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->expdt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="expdt" class="<?php echo $view_pharmacy_last_sale->expdt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->expdt) ?>',1);"><div id="elh_view_pharmacy_last_sale_expdt" class="view_pharmacy_last_sale_expdt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->expdt->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->expdt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->expdt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_last_sale->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_Product" class="view_pharmacy_last_sale_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_last_sale->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->Product) ?>',1);"><div id="elh_view_pharmacy_last_sale_Product" class="view_pharmacy_last_sale_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale->mfg->Visible) { // mfg ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->mfg) == "") { ?>
		<th data-name="mfg" class="<?php echo $view_pharmacy_last_sale->mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_mfg" class="view_pharmacy_last_sale_mfg"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mfg" class="<?php echo $view_pharmacy_last_sale->mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->mfg) ?>',1);"><div id="elh_view_pharmacy_last_sale_mfg" class="view_pharmacy_last_sale_mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->mfg->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->mfg->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_last_sale->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_last_sale->sortUrl($view_pharmacy_last_sale->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_last_sale->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_HospID" class="view_pharmacy_last_sale_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_last_sale->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_last_sale->SortUrl($view_pharmacy_last_sale->HospID) ?>',1);"><div id="elh_view_pharmacy_last_sale_HospID" class="view_pharmacy_last_sale_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_last_sale->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_last_sale->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_last_sale->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_last_sale_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_last_sale->ExportAll && $view_pharmacy_last_sale->isExport()) {
	$view_pharmacy_last_sale_list->StopRec = $view_pharmacy_last_sale_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_last_sale_list->TotalRecs > $view_pharmacy_last_sale_list->StartRec + $view_pharmacy_last_sale_list->DisplayRecs - 1)
		$view_pharmacy_last_sale_list->StopRec = $view_pharmacy_last_sale_list->StartRec + $view_pharmacy_last_sale_list->DisplayRecs - 1;
	else
		$view_pharmacy_last_sale_list->StopRec = $view_pharmacy_last_sale_list->TotalRecs;
}
$view_pharmacy_last_sale_list->RecCnt = $view_pharmacy_last_sale_list->StartRec - 1;
if ($view_pharmacy_last_sale_list->Recordset && !$view_pharmacy_last_sale_list->Recordset->EOF) {
	$view_pharmacy_last_sale_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_last_sale_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_last_sale_list->StartRec > 1)
		$view_pharmacy_last_sale_list->Recordset->move($view_pharmacy_last_sale_list->StartRec - 1);
} elseif (!$view_pharmacy_last_sale->AllowAddDeleteRow && $view_pharmacy_last_sale_list->StopRec == 0) {
	$view_pharmacy_last_sale_list->StopRec = $view_pharmacy_last_sale->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_last_sale->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_last_sale->resetAttributes();
$view_pharmacy_last_sale_list->renderRow();
while ($view_pharmacy_last_sale_list->RecCnt < $view_pharmacy_last_sale_list->StopRec) {
	$view_pharmacy_last_sale_list->RecCnt++;
	if ($view_pharmacy_last_sale_list->RecCnt >= $view_pharmacy_last_sale_list->StartRec) {
		$view_pharmacy_last_sale_list->RowCnt++;

		// Set up key count
		$view_pharmacy_last_sale_list->KeyCount = $view_pharmacy_last_sale_list->RowIndex;

		// Init row class and style
		$view_pharmacy_last_sale->resetAttributes();
		$view_pharmacy_last_sale->CssClass = "";
		if ($view_pharmacy_last_sale->isGridAdd()) {
		} else {
			$view_pharmacy_last_sale_list->loadRowValues($view_pharmacy_last_sale_list->Recordset); // Load row values
		}
		$view_pharmacy_last_sale->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_last_sale->RowAttrs = array_merge($view_pharmacy_last_sale->RowAttrs, array('data-rowindex'=>$view_pharmacy_last_sale_list->RowCnt, 'id'=>'r' . $view_pharmacy_last_sale_list->RowCnt . '_view_pharmacy_last_sale', 'data-rowtype'=>$view_pharmacy_last_sale->RowType));

		// Render row
		$view_pharmacy_last_sale_list->renderRow();

		// Render list options
		$view_pharmacy_last_sale_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_last_sale->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_last_sale_list->ListOptions->render("body", "left", $view_pharmacy_last_sale_list->RowCnt);
?>
	<?php if ($view_pharmacy_last_sale->LastSaleBILLDT->Visible) { // LastSaleBILLDT ?>
		<td data-name="LastSaleBILLDT"<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_LastSaleBILLDT" class="view_pharmacy_last_sale_LastSaleBILLDT">
<span<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->LastSaleBILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_last_sale->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_BRCODE" class="view_pharmacy_last_sale_BRCODE">
<span<?php echo $view_pharmacy_last_sale->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view_pharmacy_last_sale->prc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_prc" class="view_pharmacy_last_sale_prc">
<span<?php echo $view_pharmacy_last_sale->prc->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $view_pharmacy_last_sale->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_BATCHNO" class="view_pharmacy_last_sale_BATCHNO">
<span<?php echo $view_pharmacy_last_sale->BATCHNO->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale->expdt->Visible) { // expdt ?>
		<td data-name="expdt"<?php echo $view_pharmacy_last_sale->expdt->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_expdt" class="view_pharmacy_last_sale_expdt">
<span<?php echo $view_pharmacy_last_sale->expdt->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->expdt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view_pharmacy_last_sale->Product->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_Product" class="view_pharmacy_last_sale_Product">
<span<?php echo $view_pharmacy_last_sale->Product->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale->mfg->Visible) { // mfg ?>
		<td data-name="mfg"<?php echo $view_pharmacy_last_sale->mfg->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_mfg" class="view_pharmacy_last_sale_mfg">
<span<?php echo $view_pharmacy_last_sale->mfg->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->mfg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_last_sale->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_last_sale_list->RowCnt ?>_view_pharmacy_last_sale_HospID" class="view_pharmacy_last_sale_HospID">
<span<?php echo $view_pharmacy_last_sale->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_last_sale->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_last_sale_list->ListOptions->render("body", "right", $view_pharmacy_last_sale_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_last_sale->isGridAdd())
		$view_pharmacy_last_sale_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_last_sale->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_last_sale_list->Recordset)
	$view_pharmacy_last_sale_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_last_sale->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_last_sale->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_last_sale_list->Pager)) $view_pharmacy_last_sale_list->Pager = new NumericPager($view_pharmacy_last_sale_list->StartRec, $view_pharmacy_last_sale_list->DisplayRecs, $view_pharmacy_last_sale_list->TotalRecs, $view_pharmacy_last_sale_list->RecRange, $view_pharmacy_last_sale_list->AutoHidePager) ?>
<?php if ($view_pharmacy_last_sale_list->Pager->RecordCount > 0 && $view_pharmacy_last_sale_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_last_sale_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_last_sale_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_last_sale_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_last_sale_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_last_sale_list->pageUrl() ?>start=<?php echo $view_pharmacy_last_sale_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_last_sale_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_last_sale_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_last_sale_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->TotalRecs > 0 && (!$view_pharmacy_last_sale_list->AutoHidePageSizeSelector || $view_pharmacy_last_sale_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_last_sale">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_last_sale_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_last_sale->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_last_sale_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_last_sale_list->TotalRecs == 0 && !$view_pharmacy_last_sale->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_last_sale_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_last_sale_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_last_sale->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_last_sale->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_last_sale", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_last_sale_list->terminate();
?>