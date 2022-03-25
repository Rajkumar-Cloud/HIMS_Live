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
$view_pharmacy_non_movement_list = new view_pharmacy_non_movement_list();

// Run the page
$view_pharmacy_non_movement_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_non_movement_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_non_movement->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_non_movementlist = currentForm = new ew.Form("fview_pharmacy_non_movementlist", "list");
fview_pharmacy_non_movementlist.formKeyCountName = '<?php echo $view_pharmacy_non_movement_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_non_movementlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_non_movementlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_non_movementlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_non_movementlistsrch");

// Validate function for search
fview_pharmacy_non_movementlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_EXPDT");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_non_movement->EXPDT->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_LastSaleDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_pharmacy_non_movement->LastSaleDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_pharmacy_non_movementlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_non_movementlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_pharmacy_non_movementlistsrch.filterList = <?php echo $view_pharmacy_non_movement_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_non_movement->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_non_movement_list->TotalRecs > 0 && $view_pharmacy_non_movement_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_non_movement_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_non_movement_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_non_movement_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_non_movement_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_non_movement_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_non_movement->isExport() && !$view_pharmacy_non_movement->CurrentAction) { ?>
<form name="fview_pharmacy_non_movementlistsrch" id="fview_pharmacy_non_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_non_movement_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_non_movementlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_non_movement">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_pharmacy_non_movement_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_pharmacy_non_movement->RowType = ROWTYPE_SEARCH;

// Render row
$view_pharmacy_non_movement->resetAttributes();
$view_pharmacy_non_movement_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_non_movement->prc->Visible) { // prc ?>
	<div id="xsc_prc" class="ew-cell form-group">
		<label for="x_prc" class="ew-search-caption ew-label"><?php echo $view_pharmacy_non_movement->prc->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_prc" id="z_prc" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_non_movement" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_non_movement->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_non_movement->prc->EditValue ?>"<?php echo $view_pharmacy_non_movement->prc->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_non_movement->prname->Visible) { // prname ?>
	<div id="xsc_prname" class="ew-cell form-group">
		<label for="x_prname" class="ew-search-caption ew-label"><?php echo $view_pharmacy_non_movement->prname->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_prname" id="z_prname" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_non_movement" data-field="x_prname" name="x_prname" id="x_prname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_non_movement->prname->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_non_movement->prname->EditValue ?>"<?php echo $view_pharmacy_non_movement->prname->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_pharmacy_non_movement->EXPDT->Visible) { // EXPDT ?>
	<div id="xsc_EXPDT" class="ew-cell form-group">
		<label for="x_EXPDT" class="ew-search-caption ew-label"><?php echo $view_pharmacy_non_movement->EXPDT->caption() ?></label>
		<span class="ew-search-operator"><select name="z_EXPDT" id="z_EXPDT" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_non_movement->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_non_movement" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_non_movement->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_non_movement->EXPDT->EditValue ?>"<?php echo $view_pharmacy_non_movement->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_non_movement->EXPDT->ReadOnly && !$view_pharmacy_non_movement->EXPDT->Disabled && !isset($view_pharmacy_non_movement->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_non_movement->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_non_movementlistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_EXPDT style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_EXPDT style="d-none"">
<input type="text" data-table="view_pharmacy_non_movement" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_non_movement->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_non_movement->EXPDT->EditValue2 ?>"<?php echo $view_pharmacy_non_movement->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_non_movement->EXPDT->ReadOnly && !$view_pharmacy_non_movement->EXPDT->Disabled && !isset($view_pharmacy_non_movement->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_non_movement->EXPDT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_non_movementlistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($view_pharmacy_non_movement->LastSaleDate->Visible) { // LastSaleDate ?>
	<div id="xsc_LastSaleDate" class="ew-cell form-group">
		<label for="x_LastSaleDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_non_movement->LastSaleDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_LastSaleDate" id="z_LastSaleDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_pharmacy_non_movement->LastSaleDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_pharmacy_non_movement" data-field="x_LastSaleDate" name="x_LastSaleDate" id="x_LastSaleDate" placeholder="<?php echo HtmlEncode($view_pharmacy_non_movement->LastSaleDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_non_movement->LastSaleDate->EditValue ?>"<?php echo $view_pharmacy_non_movement->LastSaleDate->editAttributes() ?>>
<?php if (!$view_pharmacy_non_movement->LastSaleDate->ReadOnly && !$view_pharmacy_non_movement->LastSaleDate->Disabled && !isset($view_pharmacy_non_movement->LastSaleDate->EditAttrs["readonly"]) && !isset($view_pharmacy_non_movement->LastSaleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_non_movementlistsrch", "x_LastSaleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_LastSaleDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_LastSaleDate style="d-none"">
<input type="text" data-table="view_pharmacy_non_movement" data-field="x_LastSaleDate" name="y_LastSaleDate" id="y_LastSaleDate" placeholder="<?php echo HtmlEncode($view_pharmacy_non_movement->LastSaleDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_non_movement->LastSaleDate->EditValue2 ?>"<?php echo $view_pharmacy_non_movement->LastSaleDate->editAttributes() ?>>
<?php if (!$view_pharmacy_non_movement->LastSaleDate->ReadOnly && !$view_pharmacy_non_movement->LastSaleDate->Disabled && !isset($view_pharmacy_non_movement->LastSaleDate->EditAttrs["readonly"]) && !isset($view_pharmacy_non_movement->LastSaleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_pharmacy_non_movementlistsrch", "y_LastSaleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_non_movement_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_non_movement_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_non_movement_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_non_movement_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_non_movement_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_non_movement_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_non_movement_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_non_movement_list->showPageHeader(); ?>
<?php
$view_pharmacy_non_movement_list->showMessage();
?>
<?php if ($view_pharmacy_non_movement_list->TotalRecs > 0 || $view_pharmacy_non_movement->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_non_movement_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_non_movement">
<?php if (!$view_pharmacy_non_movement->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_non_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_non_movement_list->Pager)) $view_pharmacy_non_movement_list->Pager = new NumericPager($view_pharmacy_non_movement_list->StartRec, $view_pharmacy_non_movement_list->DisplayRecs, $view_pharmacy_non_movement_list->TotalRecs, $view_pharmacy_non_movement_list->RecRange, $view_pharmacy_non_movement_list->AutoHidePager) ?>
<?php if ($view_pharmacy_non_movement_list->Pager->RecordCount > 0 && $view_pharmacy_non_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_non_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_non_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_non_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_non_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_non_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_non_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->TotalRecs > 0 && (!$view_pharmacy_non_movement_list->AutoHidePageSizeSelector || $view_pharmacy_non_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_non_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_non_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_non_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_non_movementlist" id="fview_pharmacy_non_movementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_non_movement_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_non_movement_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_non_movement">
<div id="gmp_view_pharmacy_non_movement" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_non_movement_list->TotalRecs > 0 || $view_pharmacy_non_movement->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_non_movementlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_non_movement_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_non_movement_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_non_movement_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_non_movement->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_non_movement->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_prc" class="view_pharmacy_non_movement_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_non_movement->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->prc) ?>',1);"><div id="elh_view_pharmacy_non_movement_prc" class="view_pharmacy_non_movement_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->prc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->prc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement->prname->Visible) { // prname ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->prname) == "") { ?>
		<th data-name="prname" class="<?php echo $view_pharmacy_non_movement->prname->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_prname" class="view_pharmacy_non_movement_prname"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->prname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prname" class="<?php echo $view_pharmacy_non_movement->prname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->prname) ?>',1);"><div id="elh_view_pharmacy_non_movement_prname" class="view_pharmacy_non_movement_prname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->prname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->prname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->prname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_non_movement->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_BATCHNO" class="view_pharmacy_non_movement_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_non_movement->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->BATCHNO) ?>',1);"><div id="elh_view_pharmacy_non_movement_BATCHNO" class="view_pharmacy_non_movement_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_non_movement->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_EXPDT" class="view_pharmacy_non_movement_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_non_movement->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->EXPDT) ?>',1);"><div id="elh_view_pharmacy_non_movement_EXPDT" class="view_pharmacy_non_movement_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_non_movement->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_MFRCODE" class="view_pharmacy_non_movement_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_non_movement->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->MFRCODE) ?>',1);"><div id="elh_view_pharmacy_non_movement_MFRCODE" class="view_pharmacy_non_movement_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement->PurDate->Visible) { // PurDate ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->PurDate) == "") { ?>
		<th data-name="PurDate" class="<?php echo $view_pharmacy_non_movement->PurDate->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_PurDate" class="view_pharmacy_non_movement_PurDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->PurDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurDate" class="<?php echo $view_pharmacy_non_movement->PurDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->PurDate) ?>',1);"><div id="elh_view_pharmacy_non_movement_PurDate" class="view_pharmacy_non_movement_PurDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->PurDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->PurDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->PurDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement->LastSaleDate->Visible) { // LastSaleDate ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->LastSaleDate) == "") { ?>
		<th data-name="LastSaleDate" class="<?php echo $view_pharmacy_non_movement->LastSaleDate->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_LastSaleDate" class="view_pharmacy_non_movement_LastSaleDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->LastSaleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastSaleDate" class="<?php echo $view_pharmacy_non_movement->LastSaleDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->LastSaleDate) ?>',1);"><div id="elh_view_pharmacy_non_movement_LastSaleDate" class="view_pharmacy_non_movement_LastSaleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->LastSaleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->LastSaleDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->LastSaleDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_non_movement->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_non_movement->sortUrl($view_pharmacy_non_movement->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_non_movement->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_non_movement_HospID" class="view_pharmacy_non_movement_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_non_movement->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_non_movement->SortUrl($view_pharmacy_non_movement->HospID) ?>',1);"><div id="elh_view_pharmacy_non_movement_HospID" class="view_pharmacy_non_movement_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_non_movement->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_non_movement->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_non_movement->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_non_movement_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_non_movement->ExportAll && $view_pharmacy_non_movement->isExport()) {
	$view_pharmacy_non_movement_list->StopRec = $view_pharmacy_non_movement_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_non_movement_list->TotalRecs > $view_pharmacy_non_movement_list->StartRec + $view_pharmacy_non_movement_list->DisplayRecs - 1)
		$view_pharmacy_non_movement_list->StopRec = $view_pharmacy_non_movement_list->StartRec + $view_pharmacy_non_movement_list->DisplayRecs - 1;
	else
		$view_pharmacy_non_movement_list->StopRec = $view_pharmacy_non_movement_list->TotalRecs;
}
$view_pharmacy_non_movement_list->RecCnt = $view_pharmacy_non_movement_list->StartRec - 1;
if ($view_pharmacy_non_movement_list->Recordset && !$view_pharmacy_non_movement_list->Recordset->EOF) {
	$view_pharmacy_non_movement_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_non_movement_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_non_movement_list->StartRec > 1)
		$view_pharmacy_non_movement_list->Recordset->move($view_pharmacy_non_movement_list->StartRec - 1);
} elseif (!$view_pharmacy_non_movement->AllowAddDeleteRow && $view_pharmacy_non_movement_list->StopRec == 0) {
	$view_pharmacy_non_movement_list->StopRec = $view_pharmacy_non_movement->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_non_movement->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_non_movement->resetAttributes();
$view_pharmacy_non_movement_list->renderRow();
while ($view_pharmacy_non_movement_list->RecCnt < $view_pharmacy_non_movement_list->StopRec) {
	$view_pharmacy_non_movement_list->RecCnt++;
	if ($view_pharmacy_non_movement_list->RecCnt >= $view_pharmacy_non_movement_list->StartRec) {
		$view_pharmacy_non_movement_list->RowCnt++;

		// Set up key count
		$view_pharmacy_non_movement_list->KeyCount = $view_pharmacy_non_movement_list->RowIndex;

		// Init row class and style
		$view_pharmacy_non_movement->resetAttributes();
		$view_pharmacy_non_movement->CssClass = "";
		if ($view_pharmacy_non_movement->isGridAdd()) {
		} else {
			$view_pharmacy_non_movement_list->loadRowValues($view_pharmacy_non_movement_list->Recordset); // Load row values
		}
		$view_pharmacy_non_movement->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_non_movement->RowAttrs = array_merge($view_pharmacy_non_movement->RowAttrs, array('data-rowindex'=>$view_pharmacy_non_movement_list->RowCnt, 'id'=>'r' . $view_pharmacy_non_movement_list->RowCnt . '_view_pharmacy_non_movement', 'data-rowtype'=>$view_pharmacy_non_movement->RowType));

		// Render row
		$view_pharmacy_non_movement_list->renderRow();

		// Render list options
		$view_pharmacy_non_movement_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_non_movement->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_non_movement_list->ListOptions->render("body", "left", $view_pharmacy_non_movement_list->RowCnt);
?>
	<?php if ($view_pharmacy_non_movement->prc->Visible) { // prc ?>
		<td data-name="prc"<?php echo $view_pharmacy_non_movement->prc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_prc" class="view_pharmacy_non_movement_prc">
<span<?php echo $view_pharmacy_non_movement->prc->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement->prname->Visible) { // prname ?>
		<td data-name="prname"<?php echo $view_pharmacy_non_movement->prname->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_prname" class="view_pharmacy_non_movement_prname">
<span<?php echo $view_pharmacy_non_movement->prname->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->prname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $view_pharmacy_non_movement->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_BATCHNO" class="view_pharmacy_non_movement_BATCHNO">
<span<?php echo $view_pharmacy_non_movement->BATCHNO->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $view_pharmacy_non_movement->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_EXPDT" class="view_pharmacy_non_movement_EXPDT">
<span<?php echo $view_pharmacy_non_movement->EXPDT->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacy_non_movement->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_MFRCODE" class="view_pharmacy_non_movement_MFRCODE">
<span<?php echo $view_pharmacy_non_movement->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement->PurDate->Visible) { // PurDate ?>
		<td data-name="PurDate"<?php echo $view_pharmacy_non_movement->PurDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_PurDate" class="view_pharmacy_non_movement_PurDate">
<span<?php echo $view_pharmacy_non_movement->PurDate->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->PurDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement->LastSaleDate->Visible) { // LastSaleDate ?>
		<td data-name="LastSaleDate"<?php echo $view_pharmacy_non_movement->LastSaleDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_LastSaleDate" class="view_pharmacy_non_movement_LastSaleDate">
<span<?php echo $view_pharmacy_non_movement->LastSaleDate->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->LastSaleDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_non_movement->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_non_movement_list->RowCnt ?>_view_pharmacy_non_movement_HospID" class="view_pharmacy_non_movement_HospID">
<span<?php echo $view_pharmacy_non_movement->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_non_movement->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_non_movement_list->ListOptions->render("body", "right", $view_pharmacy_non_movement_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_non_movement->isGridAdd())
		$view_pharmacy_non_movement_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_non_movement->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_non_movement_list->Recordset)
	$view_pharmacy_non_movement_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_non_movement->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_non_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_non_movement_list->Pager)) $view_pharmacy_non_movement_list->Pager = new NumericPager($view_pharmacy_non_movement_list->StartRec, $view_pharmacy_non_movement_list->DisplayRecs, $view_pharmacy_non_movement_list->TotalRecs, $view_pharmacy_non_movement_list->RecRange, $view_pharmacy_non_movement_list->AutoHidePager) ?>
<?php if ($view_pharmacy_non_movement_list->Pager->RecordCount > 0 && $view_pharmacy_non_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_non_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_non_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_non_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_non_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_non_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_non_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_non_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_non_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_non_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->TotalRecs > 0 && (!$view_pharmacy_non_movement_list->AutoHidePageSizeSelector || $view_pharmacy_non_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_non_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_non_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_non_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_non_movement_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_non_movement_list->TotalRecs == 0 && !$view_pharmacy_non_movement->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_non_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_non_movement_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_non_movement->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_non_movement->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_non_movement", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_non_movement_list->terminate();
?>