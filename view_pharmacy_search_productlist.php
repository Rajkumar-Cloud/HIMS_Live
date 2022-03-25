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
$view_pharmacy_search_product_list = new view_pharmacy_search_product_list();

// Run the page
$view_pharmacy_search_product_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_search_product_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_search_product->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_search_productlist = currentForm = new ew.Form("fview_pharmacy_search_productlist", "list");
fview_pharmacy_search_productlist.formKeyCountName = '<?php echo $view_pharmacy_search_product_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_search_productlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_search_productlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_search_productlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_search_productlistsrch");

// Validate function for search
fview_pharmacy_search_productlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Stock");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->Stock->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->EXPDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BILLDATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product->BILLDATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_search_productlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_search_productlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_search_productlistsrch.filterList = <?php echo $view_pharmacy_search_product_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_search_product->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_search_product_list->TotalRecs > 0 && $view_pharmacy_search_product_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_search_product_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_search_product->isExport() && !$view_pharmacy_search_product->CurrentAction) { ?>
<form name="fview_pharmacy_search_productlistsrch" id="fview_pharmacy_search_productlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_search_product_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_search_productlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_search_product">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_search_product_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_search_product->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_search_product->resetAttributes();
$view_pharmacy_search_product_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_search_product->DES->Visible) { // DES ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product->DES->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DES" id="z_DES" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->DES->EditValue ?>"<?php echo $view_pharmacy_search_product->DES->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->Stock->Visible) { // Stock ?>
	<div id="xsc_Stock" class="ew-cell form-group">
		<label for="x_Stock" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product->Stock->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Stock" id="z_Stock" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_search_product->Stock->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->Stock->EditValue ?>"<?php echo $view_pharmacy_search_product->Stock->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_Stock style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Stock style="d-none"">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->Stock->EditValue2 ?>"<?php echo $view_pharmacy_search_product->Stock->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_search_product->EXPDT->Visible) { // EXPDT ?>
	<div id="xsc_EXPDT" class="ew-cell form-group">
		<label for="x_EXPDT" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product->EXPDT->caption() ?></label>
		<span class="ew-search-operator"><select name="z_EXPDT" id="z_EXPDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_search_product->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->EXPDT->EditValue ?>"<?php echo $view_pharmacy_search_product->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->EXPDT->ReadOnly && !$view_pharmacy_search_product->EXPDT->Disabled && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_EXPDT style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_EXPDT style="d-none"">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->EXPDT->EditValue2 ?>"<?php echo $view_pharmacy_search_product->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->EXPDT->ReadOnly && !$view_pharmacy_search_product->EXPDT->Disabled && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_search_product->BILLDATE->Visible) { // BILLDATE ?>
	<div id="xsc_BILLDATE" class="ew-cell form-group">
		<label for="x_BILLDATE" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product->BILLDATE->caption() ?></label>
		<span class="ew-search-operator"><select name="z_BILLDATE" id="z_BILLDATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_search_product->BILLDATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->BILLDATE->EditValue ?>"<?php echo $view_pharmacy_search_product->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->BILLDATE->ReadOnly && !$view_pharmacy_search_product->BILLDATE->Disabled && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_BILLDATE style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_BILLDATE style="d-none"">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BILLDATE" name="y_BILLDATE" id="y_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product->BILLDATE->EditValue2 ?>"<?php echo $view_pharmacy_search_product->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product->BILLDATE->ReadOnly && !$view_pharmacy_search_product->BILLDATE->Disabled && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "y_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_search_product_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_search_product_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_search_product_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_search_product_list->showPageHeader(); ?>
<?php
$view_pharmacy_search_product_list->showMessage();
?>
<?php if ($view_pharmacy_search_product_list->TotalRecs > 0 || $view_pharmacy_search_product->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_search_product_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_search_product">
<?php if (!$view_pharmacy_search_product->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_search_product->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_search_product_list->Pager)) $view_pharmacy_search_product_list->Pager = new NumericPager($view_pharmacy_search_product_list->StartRec, $view_pharmacy_search_product_list->DisplayRecs, $view_pharmacy_search_product_list->TotalRecs, $view_pharmacy_search_product_list->RecRange, $view_pharmacy_search_product_list->AutoHidePager) ?>
<?php if ($view_pharmacy_search_product_list->Pager->RecordCount > 0 && $view_pharmacy_search_product_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_search_product_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_search_product_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_search_product_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_search_product_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_search_product_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_search_product_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->TotalRecs > 0 && (!$view_pharmacy_search_product_list->AutoHidePageSizeSelector || $view_pharmacy_search_product_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_search_product">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_search_product->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_search_productlist" id="fview_pharmacy_search_productlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_search_product_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_search_product_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_search_product">
<div id="gmp_view_pharmacy_search_product" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_search_product_list->TotalRecs > 0 || $view_pharmacy_search_product->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_search_productlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_search_product_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_search_product_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_search_product_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_search_product->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_PRC" class="view_pharmacy_search_product_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->PRC) ?>',1);"><div id="elh_view_pharmacy_search_product_PRC" class="view_pharmacy_search_product_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->DES->Visible) { // DES ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_DES" class="view_pharmacy_search_product_DES"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->DES) ?>',1);"><div id="elh_view_pharmacy_search_product_DES" class="view_pharmacy_search_product_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->DES->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->DES->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->BATCH->Visible) { // BATCH ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_BATCH" class="view_pharmacy_search_product_BATCH"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->BATCH) ?>',1);"><div id="elh_view_pharmacy_search_product_BATCH" class="view_pharmacy_search_product_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->BATCH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->BATCH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->Stock->Visible) { // Stock ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_Stock" class="view_pharmacy_search_product_Stock"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->Stock) ?>',1);"><div id="elh_view_pharmacy_search_product_Stock" class="view_pharmacy_search_product_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->Stock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->Stock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_EXPDT" class="view_pharmacy_search_product_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->EXPDT) ?>',1);"><div id="elh_view_pharmacy_search_product_EXPDT" class="view_pharmacy_search_product_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->UNIT->Visible) { // UNIT ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product->UNIT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_UNIT" class="view_pharmacy_search_product_UNIT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->UNIT) ?>',1);"><div id="elh_view_pharmacy_search_product_UNIT" class="view_pharmacy_search_product_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->UNIT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->UNIT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_RT" class="view_pharmacy_search_product_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->RT) ?>',1);"><div id="elh_view_pharmacy_search_product_RT" class="view_pharmacy_search_product_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->RT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->RT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->OQ->Visible) { // OQ ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product->OQ->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_OQ" class="view_pharmacy_search_product_OQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->OQ) ?>',1);"><div id="elh_view_pharmacy_search_product_OQ" class="view_pharmacy_search_product_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->OQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->OQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->GENNAME->Visible) { // GENNAME ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product->GENNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_GENNAME" class="view_pharmacy_search_product_GENNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->GENNAME) ?>',1);"><div id="elh_view_pharmacy_search_product_GENNAME" class="view_pharmacy_search_product_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_SSGST" class="view_pharmacy_search_product_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->SSGST) ?>',1);"><div id="elh_view_pharmacy_search_product_SSGST" class="view_pharmacy_search_product_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_SCGST" class="view_pharmacy_search_product_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->SCGST) ?>',1);"><div id="elh_view_pharmacy_search_product_SCGST" class="view_pharmacy_search_product_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_MFRCODE" class="view_pharmacy_search_product_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->MFRCODE) ?>',1);"><div id="elh_view_pharmacy_search_product_MFRCODE" class="view_pharmacy_search_product_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_BILLDATE" class="view_pharmacy_search_product_BILLDATE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->BILLDATE) ?>',1);"><div id="elh_view_pharmacy_search_product_BILLDATE" class="view_pharmacy_search_product_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->BILLDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->BILLDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->id->Visible) { // id ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product->id->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_id" class="view_pharmacy_search_product_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->id) ?>',1);"><div id="elh_view_pharmacy_search_product_id" class="view_pharmacy_search_product_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_search_product->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_PUnit" class="view_pharmacy_search_product_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_search_product->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->PUnit) ?>',1);"><div id="elh_view_pharmacy_search_product_PUnit" class="view_pharmacy_search_product_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->PurRate->Visible) { // PurRate ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacy_search_product->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_PurRate" class="view_pharmacy_search_product_PurRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacy_search_product->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->PurRate) ?>',1);"><div id="elh_view_pharmacy_search_product_PurRate" class="view_pharmacy_search_product_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_search_product->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_PurValue" class="view_pharmacy_search_product_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_search_product->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->PurValue) ?>',1);"><div id="elh_view_pharmacy_search_product_PurValue" class="view_pharmacy_search_product_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->SUnit->Visible) { // SUnit ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacy_search_product->SUnit->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_SUnit" class="view_pharmacy_search_product_SUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacy_search_product->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->SUnit) ?>',1);"><div id="elh_view_pharmacy_search_product_SUnit" class="view_pharmacy_search_product_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacy_search_product->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_PSGST" class="view_pharmacy_search_product_PSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacy_search_product->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->PSGST) ?>',1);"><div id="elh_view_pharmacy_search_product_PSGST" class="view_pharmacy_search_product_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacy_search_product->sortUrl($view_pharmacy_search_product->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacy_search_product->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_PCGST" class="view_pharmacy_search_product_PCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacy_search_product->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_search_product->SortUrl($view_pharmacy_search_product->PCGST) ?>',1);"><div id="elh_view_pharmacy_search_product_PCGST" class="view_pharmacy_search_product_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_search_product_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_search_product->ExportAll && $view_pharmacy_search_product->isExport()) {
	$view_pharmacy_search_product_list->StopRec = $view_pharmacy_search_product_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_search_product_list->TotalRecs > $view_pharmacy_search_product_list->StartRec + $view_pharmacy_search_product_list->DisplayRecs - 1)
		$view_pharmacy_search_product_list->StopRec = $view_pharmacy_search_product_list->StartRec + $view_pharmacy_search_product_list->DisplayRecs - 1;
	else
		$view_pharmacy_search_product_list->StopRec = $view_pharmacy_search_product_list->TotalRecs;
}
$view_pharmacy_search_product_list->RecCnt = $view_pharmacy_search_product_list->StartRec - 1;
if ($view_pharmacy_search_product_list->Recordset && !$view_pharmacy_search_product_list->Recordset->EOF) {
	$view_pharmacy_search_product_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_search_product_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_search_product_list->StartRec > 1)
		$view_pharmacy_search_product_list->Recordset->move($view_pharmacy_search_product_list->StartRec - 1);
} elseif (!$view_pharmacy_search_product->AllowAddDeleteRow && $view_pharmacy_search_product_list->StopRec == 0) {
	$view_pharmacy_search_product_list->StopRec = $view_pharmacy_search_product->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_search_product->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_search_product->resetAttributes();
$view_pharmacy_search_product_list->renderRow();
while ($view_pharmacy_search_product_list->RecCnt < $view_pharmacy_search_product_list->StopRec) {
	$view_pharmacy_search_product_list->RecCnt++;
	if ($view_pharmacy_search_product_list->RecCnt >= $view_pharmacy_search_product_list->StartRec) {
		$view_pharmacy_search_product_list->RowCnt++;

		// Set up key count
		$view_pharmacy_search_product_list->KeyCount = $view_pharmacy_search_product_list->RowIndex;

		// Init row class and style
		$view_pharmacy_search_product->resetAttributes();
		$view_pharmacy_search_product->CssClass = "";
		if ($view_pharmacy_search_product->isGridAdd()) {
		} else {
			$view_pharmacy_search_product_list->loadRowValues($view_pharmacy_search_product_list->Recordset); // Load row values
		}
		$view_pharmacy_search_product->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_search_product->RowAttrs = array_merge($view_pharmacy_search_product->RowAttrs, array('data-rowindex'=>$view_pharmacy_search_product_list->RowCnt, 'id'=>'r' . $view_pharmacy_search_product_list->RowCnt . '_view_pharmacy_search_product', 'data-rowtype'=>$view_pharmacy_search_product->RowType));

		// Render row
		$view_pharmacy_search_product_list->renderRow();

		// Render list options
		$view_pharmacy_search_product_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_search_product->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_search_product_list->ListOptions->render("body", "left", $view_pharmacy_search_product_list->RowCnt);
?>
	<?php if ($view_pharmacy_search_product->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_search_product->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_PRC" class="view_pharmacy_search_product_PRC">
<span<?php echo $view_pharmacy_search_product->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->DES->Visible) { // DES ?>
		<td data-name="DES"<?php echo $view_pharmacy_search_product->DES->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_DES" class="view_pharmacy_search_product_DES">
<span<?php echo $view_pharmacy_search_product->DES->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH"<?php echo $view_pharmacy_search_product->BATCH->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_BATCH" class="view_pharmacy_search_product_BATCH">
<span<?php echo $view_pharmacy_search_product->BATCH->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->Stock->Visible) { // Stock ?>
		<td data-name="Stock"<?php echo $view_pharmacy_search_product->Stock->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_Stock" class="view_pharmacy_search_product_Stock">
<span<?php echo $view_pharmacy_search_product->Stock->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->Stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $view_pharmacy_search_product->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_EXPDT" class="view_pharmacy_search_product_EXPDT">
<span<?php echo $view_pharmacy_search_product->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT"<?php echo $view_pharmacy_search_product->UNIT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_UNIT" class="view_pharmacy_search_product_UNIT">
<span<?php echo $view_pharmacy_search_product->UNIT->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->RT->Visible) { // RT ?>
		<td data-name="RT"<?php echo $view_pharmacy_search_product->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_RT" class="view_pharmacy_search_product_RT">
<span<?php echo $view_pharmacy_search_product->RT->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->OQ->Visible) { // OQ ?>
		<td data-name="OQ"<?php echo $view_pharmacy_search_product->OQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_OQ" class="view_pharmacy_search_product_OQ">
<span<?php echo $view_pharmacy_search_product->OQ->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $view_pharmacy_search_product->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_GENNAME" class="view_pharmacy_search_product_GENNAME">
<span<?php echo $view_pharmacy_search_product->GENNAME->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_pharmacy_search_product->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_SSGST" class="view_pharmacy_search_product_SSGST">
<span<?php echo $view_pharmacy_search_product->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_pharmacy_search_product->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_SCGST" class="view_pharmacy_search_product_SCGST">
<span<?php echo $view_pharmacy_search_product->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_search_product->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_MFRCODE" class="view_pharmacy_search_product_MFRCODE">
<span<?php echo $view_pharmacy_search_product->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE"<?php echo $view_pharmacy_search_product->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_BILLDATE" class="view_pharmacy_search_product_BILLDATE">
<span<?php echo $view_pharmacy_search_product->BILLDATE->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->BILLDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_search_product->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_id" class="view_pharmacy_search_product_id">
<span<?php echo $view_pharmacy_search_product->id->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_pharmacy_search_product->PUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_PUnit" class="view_pharmacy_search_product_PUnit">
<span<?php echo $view_pharmacy_search_product->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $view_pharmacy_search_product->PurRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_PurRate" class="view_pharmacy_search_product_PurRate">
<span<?php echo $view_pharmacy_search_product->PurRate->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->PurRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $view_pharmacy_search_product->PurValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_PurValue" class="view_pharmacy_search_product_PurValue">
<span<?php echo $view_pharmacy_search_product->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $view_pharmacy_search_product->SUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_SUnit" class="view_pharmacy_search_product_SUnit">
<span<?php echo $view_pharmacy_search_product->SUnit->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->SUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $view_pharmacy_search_product->PSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_PSGST" class="view_pharmacy_search_product_PSGST">
<span<?php echo $view_pharmacy_search_product->PSGST->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $view_pharmacy_search_product->PCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCnt ?>_view_pharmacy_search_product_PCGST" class="view_pharmacy_search_product_PCGST">
<span<?php echo $view_pharmacy_search_product->PCGST->viewAttributes() ?>>
<?php echo $view_pharmacy_search_product->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_search_product_list->ListOptions->render("body", "right", $view_pharmacy_search_product_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_search_product->isGridAdd())
		$view_pharmacy_search_product_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_search_product->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_search_product_list->Recordset)
	$view_pharmacy_search_product_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_search_product->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_search_product->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_search_product_list->Pager)) $view_pharmacy_search_product_list->Pager = new NumericPager($view_pharmacy_search_product_list->StartRec, $view_pharmacy_search_product_list->DisplayRecs, $view_pharmacy_search_product_list->TotalRecs, $view_pharmacy_search_product_list->RecRange, $view_pharmacy_search_product_list->AutoHidePager) ?>
<?php if ($view_pharmacy_search_product_list->Pager->RecordCount > 0 && $view_pharmacy_search_product_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_search_product_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_search_product_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_search_product_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_search_product_list->pageUrl() ?>start=<?php echo $view_pharmacy_search_product_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_search_product_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_search_product_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_search_product_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->TotalRecs > 0 && (!$view_pharmacy_search_product_list->AutoHidePageSizeSelector || $view_pharmacy_search_product_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_search_product">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_search_product_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_search_product->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_search_product_list->TotalRecs == 0 && !$view_pharmacy_search_product->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_search_product_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_search_product->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_search_product->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_search_product", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_search_product_list->terminate();
?>