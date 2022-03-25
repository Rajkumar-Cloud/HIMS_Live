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
$view_iui_excel_list = new view_iui_excel_list();

// Run the page
$view_iui_excel_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_iui_excel_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_iui_excel->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_iui_excellist = currentForm = new ew.Form("fview_iui_excellist", "list");
fview_iui_excellist.formKeyCountName = '<?php echo $view_iui_excel_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_iui_excellist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_iui_excellist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_iui_excellistsrch = currentSearchForm = new ew.Form("fview_iui_excellistsrch");

// Validate function for search
fview_iui_excellistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_iui_excel->PREG_TEST_DATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EDD_Date");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_iui_excel->EDD_Date->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_iui_excellistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_iui_excellistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_iui_excellistsrch.filterList = <?php echo $view_iui_excel_list->getFilterList() ?>;
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
<?php if (!$view_iui_excel->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_iui_excel_list->TotalRecs > 0 && $view_iui_excel_list->ExportOptions->visible()) { ?>
<?php $view_iui_excel_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_iui_excel_list->ImportOptions->visible()) { ?>
<?php $view_iui_excel_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_iui_excel_list->SearchOptions->visible()) { ?>
<?php $view_iui_excel_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_iui_excel_list->FilterOptions->visible()) { ?>
<?php $view_iui_excel_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_iui_excel_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_iui_excel->isExport() && !$view_iui_excel->CurrentAction) { ?>
<form name="fview_iui_excellistsrch" id="fview_iui_excellistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_iui_excel_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_iui_excellistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_iui_excel">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_iui_excel_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_iui_excel->RowType = ROWTYPE_SEARCH;

// Render row
$view_iui_excel->resetAttributes();
$view_iui_excel_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_iui_excel->NAME->Visible) { // NAME ?>
	<div id="xsc_NAME" class="ew-cell form-group">
		<label for="x_NAME" class="ew-search-caption ew-label"><?php echo $view_iui_excel->NAME->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NAME" id="z_NAME" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_iui_excel" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_iui_excel->NAME->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->NAME->EditValue ?>"<?php echo $view_iui_excel->NAME->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_iui_excel->HUSBAND_NAME->Visible) { // HUSBAND NAME ?>
	<div id="xsc_HUSBAND_NAME" class="ew-cell form-group">
		<label for="x_HUSBAND_NAME" class="ew-search-caption ew-label"><?php echo $view_iui_excel->HUSBAND_NAME->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HUSBAND_NAME" id="z_HUSBAND_NAME" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_iui_excel" data-field="x_HUSBAND_NAME" name="x_HUSBAND_NAME" id="x_HUSBAND_NAME" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_iui_excel->HUSBAND_NAME->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->HUSBAND_NAME->EditValue ?>"<?php echo $view_iui_excel->HUSBAND_NAME->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_iui_excel->CoupleID->Visible) { // CoupleID ?>
	<div id="xsc_CoupleID" class="ew-cell form-group">
		<label for="x_CoupleID" class="ew-search-caption ew-label"><?php echo $view_iui_excel->CoupleID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_iui_excel" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->CoupleID->EditValue ?>"<?php echo $view_iui_excel->CoupleID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_iui_excel->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<div id="xsc_PREG_TEST_DATE" class="ew-cell form-group">
		<label for="x_PREG_TEST_DATE" class="ew-search-caption ew-label"><?php echo $view_iui_excel->PREG_TEST_DATE->caption() ?></label>
		<span class="ew-search-operator"><select name="z_PREG_TEST_DATE" id="z_PREG_TEST_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_iui_excel->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_iui_excel->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->PREG_TEST_DATE->EditValue ?>"<?php echo $view_iui_excel->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_iui_excel->PREG_TEST_DATE->ReadOnly && !$view_iui_excel->PREG_TEST_DATE->Disabled && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excellistsrch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_PREG_TEST_DATE style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_PREG_TEST_DATE style="d-none"">
<input type="text" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_iui_excel->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->PREG_TEST_DATE->EditValue2 ?>"<?php echo $view_iui_excel->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_iui_excel->PREG_TEST_DATE->ReadOnly && !$view_iui_excel->PREG_TEST_DATE->Disabled && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_iui_excel->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excellistsrch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_iui_excel->RESULTS->Visible) { // RESULTS ?>
	<div id="xsc_RESULTS" class="ew-cell form-group">
		<label for="x_RESULTS" class="ew-search-caption ew-label"><?php echo $view_iui_excel->RESULTS->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RESULTS" id="z_RESULTS" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_iui_excel" data-field="x_RESULTS" name="x_RESULTS" id="x_RESULTS" size="35" placeholder="<?php echo HtmlEncode($view_iui_excel->RESULTS->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->RESULTS->EditValue ?>"<?php echo $view_iui_excel->RESULTS->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_iui_excel->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<div id="xsc_ONGOING_PREG" class="ew-cell form-group">
		<label for="x_ONGOING_PREG" class="ew-search-caption ew-label"><?php echo $view_iui_excel->ONGOING_PREG->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ONGOING_PREG" id="z_ONGOING_PREG" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_iui_excel" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_iui_excel->ONGOING_PREG->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->ONGOING_PREG->EditValue ?>"<?php echo $view_iui_excel->ONGOING_PREG->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($view_iui_excel->EDD_Date->Visible) { // EDD_Date ?>
	<div id="xsc_EDD_Date" class="ew-cell form-group">
		<label for="x_EDD_Date" class="ew-search-caption ew-label"><?php echo $view_iui_excel->EDD_Date->caption() ?></label>
		<span class="ew-search-operator"><select name="z_EDD_Date" id="z_EDD_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_iui_excel->EDD_Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_iui_excel" data-field="x_EDD_Date" name="x_EDD_Date" id="x_EDD_Date" placeholder="<?php echo HtmlEncode($view_iui_excel->EDD_Date->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->EDD_Date->EditValue ?>"<?php echo $view_iui_excel->EDD_Date->editAttributes() ?>>
<?php if (!$view_iui_excel->EDD_Date->ReadOnly && !$view_iui_excel->EDD_Date->Disabled && !isset($view_iui_excel->EDD_Date->EditAttrs["readonly"]) && !isset($view_iui_excel->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excellistsrch", "x_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_EDD_Date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_EDD_Date style="d-none"">
<input type="text" data-table="view_iui_excel" data-field="x_EDD_Date" name="y_EDD_Date" id="y_EDD_Date" placeholder="<?php echo HtmlEncode($view_iui_excel->EDD_Date->getPlaceHolder()) ?>" value="<?php echo $view_iui_excel->EDD_Date->EditValue2 ?>"<?php echo $view_iui_excel->EDD_Date->editAttributes() ?>>
<?php if (!$view_iui_excel->EDD_Date->ReadOnly && !$view_iui_excel->EDD_Date->Disabled && !isset($view_iui_excel->EDD_Date->EditAttrs["readonly"]) && !isset($view_iui_excel->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_iui_excellistsrch", "y_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_iui_excel_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_iui_excel_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_iui_excel_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_iui_excel_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_iui_excel_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_iui_excel_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_iui_excel_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_iui_excel_list->showPageHeader(); ?>
<?php
$view_iui_excel_list->showMessage();
?>
<?php if ($view_iui_excel_list->TotalRecs > 0 || $view_iui_excel->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_iui_excel_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_iui_excel">
<?php if (!$view_iui_excel->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_iui_excel->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_iui_excel_list->Pager)) $view_iui_excel_list->Pager = new NumericPager($view_iui_excel_list->StartRec, $view_iui_excel_list->DisplayRecs, $view_iui_excel_list->TotalRecs, $view_iui_excel_list->RecRange, $view_iui_excel_list->AutoHidePager) ?>
<?php if ($view_iui_excel_list->Pager->RecordCount > 0 && $view_iui_excel_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_iui_excel_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_iui_excel_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_iui_excel_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_iui_excel_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_iui_excel_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_iui_excel_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_iui_excel_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_iui_excel_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_iui_excel_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_iui_excel_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_iui_excel_list->TotalRecs > 0 && (!$view_iui_excel_list->AutoHidePageSizeSelector || $view_iui_excel_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_iui_excel">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_iui_excel_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_iui_excel_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_iui_excel_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_iui_excel_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_iui_excel_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_iui_excel_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_iui_excel->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_iui_excel_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_iui_excellist" id="fview_iui_excellist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_iui_excel_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_iui_excel_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_iui_excel">
<div id="gmp_view_iui_excel" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_iui_excel_list->TotalRecs > 0 || $view_iui_excel->isGridEdit()) { ?>
<table id="tbl_view_iui_excellist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_iui_excel_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_iui_excel_list->renderListOptions();

// Render list options (header, left)
$view_iui_excel_list->ListOptions->render("header", "left");
?>
<?php if ($view_iui_excel->NAME->Visible) { // NAME ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->NAME) == "") { ?>
		<th data-name="NAME" class="<?php echo $view_iui_excel->NAME->headerCellClass() ?>"><div id="elh_view_iui_excel_NAME" class="view_iui_excel_NAME"><div class="ew-table-header-caption"><?php echo $view_iui_excel->NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NAME" class="<?php echo $view_iui_excel->NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->NAME) ?>',1);"><div id="elh_view_iui_excel_NAME" class="view_iui_excel_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->NAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->HUSBAND_NAME->Visible) { // HUSBAND NAME ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->HUSBAND_NAME) == "") { ?>
		<th data-name="HUSBAND_NAME" class="<?php echo $view_iui_excel->HUSBAND_NAME->headerCellClass() ?>"><div id="elh_view_iui_excel_HUSBAND_NAME" class="view_iui_excel_HUSBAND_NAME"><div class="ew-table-header-caption"><?php echo $view_iui_excel->HUSBAND_NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HUSBAND_NAME" class="<?php echo $view_iui_excel->HUSBAND_NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->HUSBAND_NAME) ?>',1);"><div id="elh_view_iui_excel_HUSBAND_NAME" class="view_iui_excel_HUSBAND_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->HUSBAND_NAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->HUSBAND_NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->HUSBAND_NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_iui_excel->CoupleID->headerCellClass() ?>"><div id="elh_view_iui_excel_CoupleID" class="view_iui_excel_CoupleID"><div class="ew-table-header-caption"><?php echo $view_iui_excel->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_iui_excel->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->CoupleID) ?>',1);"><div id="elh_view_iui_excel_CoupleID" class="view_iui_excel_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->CoupleID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->CoupleID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->AGE____WIFE->Visible) { // AGE  - WIFE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->AGE____WIFE) == "") { ?>
		<th data-name="AGE____WIFE" class="<?php echo $view_iui_excel->AGE____WIFE->headerCellClass() ?>"><div id="elh_view_iui_excel_AGE____WIFE" class="view_iui_excel_AGE____WIFE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->AGE____WIFE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AGE____WIFE" class="<?php echo $view_iui_excel->AGE____WIFE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->AGE____WIFE) ?>',1);"><div id="elh_view_iui_excel_AGE____WIFE" class="view_iui_excel_AGE____WIFE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->AGE____WIFE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->AGE____WIFE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->AGE____WIFE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->AGE__HUSBAND->Visible) { // AGE- HUSBAND ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->AGE__HUSBAND) == "") { ?>
		<th data-name="AGE__HUSBAND" class="<?php echo $view_iui_excel->AGE__HUSBAND->headerCellClass() ?>"><div id="elh_view_iui_excel_AGE__HUSBAND" class="view_iui_excel_AGE__HUSBAND"><div class="ew-table-header-caption"><?php echo $view_iui_excel->AGE__HUSBAND->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AGE__HUSBAND" class="<?php echo $view_iui_excel->AGE__HUSBAND->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->AGE__HUSBAND) ?>',1);"><div id="elh_view_iui_excel_AGE__HUSBAND" class="view_iui_excel_AGE__HUSBAND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->AGE__HUSBAND->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->AGE__HUSBAND->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->AGE__HUSBAND->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR) == "") { ?>
		<th data-name="ANXIOUS_TO_CONCEIVE_FOR" class="<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->headerCellClass() ?>"><div id="elh_view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR" class="view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR"><div class="ew-table-header-caption"><?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANXIOUS_TO_CONCEIVE_FOR" class="<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR) ?>',1);"><div id="elh_view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR" class="view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->AMH_28_NG2FML29->Visible) { // AMH ( NG/ML) ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->AMH_28_NG2FML29) == "") { ?>
		<th data-name="AMH_28_NG2FML29" class="<?php echo $view_iui_excel->AMH_28_NG2FML29->headerCellClass() ?>"><div id="elh_view_iui_excel_AMH_28_NG2FML29" class="view_iui_excel_AMH_28_NG2FML29"><div class="ew-table-header-caption"><?php echo $view_iui_excel->AMH_28_NG2FML29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AMH_28_NG2FML29" class="<?php echo $view_iui_excel->AMH_28_NG2FML29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->AMH_28_NG2FML29) ?>',1);"><div id="elh_view_iui_excel_AMH_28_NG2FML29" class="view_iui_excel_AMH_28_NG2FML29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->AMH_28_NG2FML29->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->AMH_28_NG2FML29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->AMH_28_NG2FML29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->TUBAL_PATENCY) == "") { ?>
		<th data-name="TUBAL_PATENCY" class="<?php echo $view_iui_excel->TUBAL_PATENCY->headerCellClass() ?>"><div id="elh_view_iui_excel_TUBAL_PATENCY" class="view_iui_excel_TUBAL_PATENCY"><div class="ew-table-header-caption"><?php echo $view_iui_excel->TUBAL_PATENCY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TUBAL_PATENCY" class="<?php echo $view_iui_excel->TUBAL_PATENCY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->TUBAL_PATENCY) ?>',1);"><div id="elh_view_iui_excel_TUBAL_PATENCY" class="view_iui_excel_TUBAL_PATENCY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->TUBAL_PATENCY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->TUBAL_PATENCY->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->TUBAL_PATENCY->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->HSG->Visible) { // HSG ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->HSG) == "") { ?>
		<th data-name="HSG" class="<?php echo $view_iui_excel->HSG->headerCellClass() ?>"><div id="elh_view_iui_excel_HSG" class="view_iui_excel_HSG"><div class="ew-table-header-caption"><?php echo $view_iui_excel->HSG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSG" class="<?php echo $view_iui_excel->HSG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->HSG) ?>',1);"><div id="elh_view_iui_excel_HSG" class="view_iui_excel_HSG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->HSG->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->HSG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->HSG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->DHL->Visible) { // DHL ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->DHL) == "") { ?>
		<th data-name="DHL" class="<?php echo $view_iui_excel->DHL->headerCellClass() ?>"><div id="elh_view_iui_excel_DHL" class="view_iui_excel_DHL"><div class="ew-table-header-caption"><?php echo $view_iui_excel->DHL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DHL" class="<?php echo $view_iui_excel->DHL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->DHL) ?>',1);"><div id="elh_view_iui_excel_DHL" class="view_iui_excel_DHL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->DHL->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->DHL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->DHL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->UTERINE_PROBLEMS) == "") { ?>
		<th data-name="UTERINE_PROBLEMS" class="<?php echo $view_iui_excel->UTERINE_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_UTERINE_PROBLEMS" class="view_iui_excel_UTERINE_PROBLEMS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->UTERINE_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UTERINE_PROBLEMS" class="<?php echo $view_iui_excel->UTERINE_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->UTERINE_PROBLEMS) ?>',1);"><div id="elh_view_iui_excel_UTERINE_PROBLEMS" class="view_iui_excel_UTERINE_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->UTERINE_PROBLEMS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->UTERINE_PROBLEMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->UTERINE_PROBLEMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->W_COMORBIDS) == "") { ?>
		<th data-name="W_COMORBIDS" class="<?php echo $view_iui_excel->W_COMORBIDS->headerCellClass() ?>"><div id="elh_view_iui_excel_W_COMORBIDS" class="view_iui_excel_W_COMORBIDS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->W_COMORBIDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="W_COMORBIDS" class="<?php echo $view_iui_excel->W_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->W_COMORBIDS) ?>',1);"><div id="elh_view_iui_excel_W_COMORBIDS" class="view_iui_excel_W_COMORBIDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->W_COMORBIDS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->W_COMORBIDS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->W_COMORBIDS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->H_COMORBIDS) == "") { ?>
		<th data-name="H_COMORBIDS" class="<?php echo $view_iui_excel->H_COMORBIDS->headerCellClass() ?>"><div id="elh_view_iui_excel_H_COMORBIDS" class="view_iui_excel_H_COMORBIDS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->H_COMORBIDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="H_COMORBIDS" class="<?php echo $view_iui_excel->H_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->H_COMORBIDS) ?>',1);"><div id="elh_view_iui_excel_H_COMORBIDS" class="view_iui_excel_H_COMORBIDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->H_COMORBIDS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->H_COMORBIDS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->H_COMORBIDS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->SEXUAL_DYSFUNCTION) == "") { ?>
		<th data-name="SEXUAL_DYSFUNCTION" class="<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div id="elh_view_iui_excel_SEXUAL_DYSFUNCTION" class="view_iui_excel_SEXUAL_DYSFUNCTION"><div class="ew-table-header-caption"><?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEXUAL_DYSFUNCTION" class="<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->SEXUAL_DYSFUNCTION) ?>',1);"><div id="elh_view_iui_excel_SEXUAL_DYSFUNCTION" class="view_iui_excel_SEXUAL_DYSFUNCTION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->SEXUAL_DYSFUNCTION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->SEXUAL_DYSFUNCTION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->PREV_IUI->Visible) { // PREV IUI ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->PREV_IUI) == "") { ?>
		<th data-name="PREV_IUI" class="<?php echo $view_iui_excel->PREV_IUI->headerCellClass() ?>"><div id="elh_view_iui_excel_PREV_IUI" class="view_iui_excel_PREV_IUI"><div class="ew-table-header-caption"><?php echo $view_iui_excel->PREV_IUI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREV_IUI" class="<?php echo $view_iui_excel->PREV_IUI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->PREV_IUI) ?>',1);"><div id="elh_view_iui_excel_PREV_IUI" class="view_iui_excel_PREV_IUI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->PREV_IUI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->PREV_IUI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->PREV_IUI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->PREV_IVF->Visible) { // PREV_IVF ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->PREV_IVF) == "") { ?>
		<th data-name="PREV_IVF" class="<?php echo $view_iui_excel->PREV_IVF->headerCellClass() ?>"><div id="elh_view_iui_excel_PREV_IVF" class="view_iui_excel_PREV_IVF"><div class="ew-table-header-caption"><?php echo $view_iui_excel->PREV_IVF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREV_IVF" class="<?php echo $view_iui_excel->PREV_IVF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->PREV_IVF) ?>',1);"><div id="elh_view_iui_excel_PREV_IVF" class="view_iui_excel_PREV_IVF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->PREV_IVF->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->PREV_IVF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->PREV_IVF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->TABLETS->Visible) { // TABLETS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->TABLETS) == "") { ?>
		<th data-name="TABLETS" class="<?php echo $view_iui_excel->TABLETS->headerCellClass() ?>"><div id="elh_view_iui_excel_TABLETS" class="view_iui_excel_TABLETS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->TABLETS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TABLETS" class="<?php echo $view_iui_excel->TABLETS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->TABLETS) ?>',1);"><div id="elh_view_iui_excel_TABLETS" class="view_iui_excel_TABLETS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->TABLETS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->TABLETS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->TABLETS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->INJTYPE->Visible) { // INJTYPE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->INJTYPE) == "") { ?>
		<th data-name="INJTYPE" class="<?php echo $view_iui_excel->INJTYPE->headerCellClass() ?>"><div id="elh_view_iui_excel_INJTYPE" class="view_iui_excel_INJTYPE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->INJTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJTYPE" class="<?php echo $view_iui_excel->INJTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->INJTYPE) ?>',1);"><div id="elh_view_iui_excel_INJTYPE" class="view_iui_excel_INJTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->INJTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->INJTYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->INJTYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->LMP->Visible) { // LMP ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $view_iui_excel->LMP->headerCellClass() ?>"><div id="elh_view_iui_excel_LMP" class="view_iui_excel_LMP"><div class="ew-table-header-caption"><?php echo $view_iui_excel->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $view_iui_excel->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->LMP) ?>',1);"><div id="elh_view_iui_excel_LMP" class="view_iui_excel_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->TRIGGERR->Visible) { // TRIGGERR ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->TRIGGERR) == "") { ?>
		<th data-name="TRIGGERR" class="<?php echo $view_iui_excel->TRIGGERR->headerCellClass() ?>"><div id="elh_view_iui_excel_TRIGGERR" class="view_iui_excel_TRIGGERR"><div class="ew-table-header-caption"><?php echo $view_iui_excel->TRIGGERR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TRIGGERR" class="<?php echo $view_iui_excel->TRIGGERR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->TRIGGERR) ?>',1);"><div id="elh_view_iui_excel_TRIGGERR" class="view_iui_excel_TRIGGERR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->TRIGGERR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->TRIGGERR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->TRIGGERR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->TRIGGERDATE) == "") { ?>
		<th data-name="TRIGGERDATE" class="<?php echo $view_iui_excel->TRIGGERDATE->headerCellClass() ?>"><div id="elh_view_iui_excel_TRIGGERDATE" class="view_iui_excel_TRIGGERDATE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->TRIGGERDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TRIGGERDATE" class="<?php echo $view_iui_excel->TRIGGERDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->TRIGGERDATE) ?>',1);"><div id="elh_view_iui_excel_TRIGGERDATE" class="view_iui_excel_TRIGGERDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->TRIGGERDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->TRIGGERDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->TRIGGERDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->FOLLICLE_STATUS) == "") { ?>
		<th data-name="FOLLICLE_STATUS" class="<?php echo $view_iui_excel->FOLLICLE_STATUS->headerCellClass() ?>"><div id="elh_view_iui_excel_FOLLICLE_STATUS" class="view_iui_excel_FOLLICLE_STATUS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->FOLLICLE_STATUS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FOLLICLE_STATUS" class="<?php echo $view_iui_excel->FOLLICLE_STATUS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->FOLLICLE_STATUS) ?>',1);"><div id="elh_view_iui_excel_FOLLICLE_STATUS" class="view_iui_excel_FOLLICLE_STATUS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->FOLLICLE_STATUS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->FOLLICLE_STATUS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->FOLLICLE_STATUS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->NUMBER_OF_IUI) == "") { ?>
		<th data-name="NUMBER_OF_IUI" class="<?php echo $view_iui_excel->NUMBER_OF_IUI->headerCellClass() ?>"><div id="elh_view_iui_excel_NUMBER_OF_IUI" class="view_iui_excel_NUMBER_OF_IUI"><div class="ew-table-header-caption"><?php echo $view_iui_excel->NUMBER_OF_IUI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NUMBER_OF_IUI" class="<?php echo $view_iui_excel->NUMBER_OF_IUI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->NUMBER_OF_IUI) ?>',1);"><div id="elh_view_iui_excel_NUMBER_OF_IUI" class="view_iui_excel_NUMBER_OF_IUI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->NUMBER_OF_IUI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->NUMBER_OF_IUI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->NUMBER_OF_IUI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->PROCEDURE->Visible) { // PROCEDURE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->PROCEDURE) == "") { ?>
		<th data-name="PROCEDURE" class="<?php echo $view_iui_excel->PROCEDURE->headerCellClass() ?>"><div id="elh_view_iui_excel_PROCEDURE" class="view_iui_excel_PROCEDURE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->PROCEDURE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROCEDURE" class="<?php echo $view_iui_excel->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->PROCEDURE) ?>',1);"><div id="elh_view_iui_excel_PROCEDURE" class="view_iui_excel_PROCEDURE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->PROCEDURE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->PROCEDURE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->PROCEDURE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->LUTEAL_SUPPORT) == "") { ?>
		<th data-name="LUTEAL_SUPPORT" class="<?php echo $view_iui_excel->LUTEAL_SUPPORT->headerCellClass() ?>"><div id="elh_view_iui_excel_LUTEAL_SUPPORT" class="view_iui_excel_LUTEAL_SUPPORT"><div class="ew-table-header-caption"><?php echo $view_iui_excel->LUTEAL_SUPPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LUTEAL_SUPPORT" class="<?php echo $view_iui_excel->LUTEAL_SUPPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->LUTEAL_SUPPORT) ?>',1);"><div id="elh_view_iui_excel_LUTEAL_SUPPORT" class="view_iui_excel_LUTEAL_SUPPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->LUTEAL_SUPPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->LUTEAL_SUPPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->LUTEAL_SUPPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->H2FD_SAMPLE->Visible) { // H/D SAMPLE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->H2FD_SAMPLE) == "") { ?>
		<th data-name="H2FD_SAMPLE" class="<?php echo $view_iui_excel->H2FD_SAMPLE->headerCellClass() ?>"><div id="elh_view_iui_excel_H2FD_SAMPLE" class="view_iui_excel_H2FD_SAMPLE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->H2FD_SAMPLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="H2FD_SAMPLE" class="<?php echo $view_iui_excel->H2FD_SAMPLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->H2FD_SAMPLE) ?>',1);"><div id="elh_view_iui_excel_H2FD_SAMPLE" class="view_iui_excel_H2FD_SAMPLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->H2FD_SAMPLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->H2FD_SAMPLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->H2FD_SAMPLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->DONOR___I_D->Visible) { // DONOR - I.D ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->DONOR___I_D) == "") { ?>
		<th data-name="DONOR___I_D" class="<?php echo $view_iui_excel->DONOR___I_D->headerCellClass() ?>"><div id="elh_view_iui_excel_DONOR___I_D" class="view_iui_excel_DONOR___I_D"><div class="ew-table-header-caption"><?php echo $view_iui_excel->DONOR___I_D->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DONOR___I_D" class="<?php echo $view_iui_excel->DONOR___I_D->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->DONOR___I_D) ?>',1);"><div id="elh_view_iui_excel_DONOR___I_D" class="view_iui_excel_DONOR___I_D">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->DONOR___I_D->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->DONOR___I_D->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->DONOR___I_D->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->PREG_TEST_DATE) == "") { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $view_iui_excel->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_view_iui_excel_PREG_TEST_DATE" class="view_iui_excel_PREG_TEST_DATE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->PREG_TEST_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $view_iui_excel->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->PREG_TEST_DATE) ?>',1);"><div id="elh_view_iui_excel_PREG_TEST_DATE" class="view_iui_excel_PREG_TEST_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->PREG_TEST_DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->PREG_TEST_DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->COLLECTION__METHOD->Visible) { // COLLECTION  METHOD ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->COLLECTION__METHOD) == "") { ?>
		<th data-name="COLLECTION__METHOD" class="<?php echo $view_iui_excel->COLLECTION__METHOD->headerCellClass() ?>"><div id="elh_view_iui_excel_COLLECTION__METHOD" class="view_iui_excel_COLLECTION__METHOD"><div class="ew-table-header-caption"><?php echo $view_iui_excel->COLLECTION__METHOD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COLLECTION__METHOD" class="<?php echo $view_iui_excel->COLLECTION__METHOD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->COLLECTION__METHOD) ?>',1);"><div id="elh_view_iui_excel_COLLECTION__METHOD" class="view_iui_excel_COLLECTION__METHOD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->COLLECTION__METHOD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->COLLECTION__METHOD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->COLLECTION__METHOD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->SAMPLE_SOURCE->Visible) { // SAMPLE SOURCE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->SAMPLE_SOURCE) == "") { ?>
		<th data-name="SAMPLE_SOURCE" class="<?php echo $view_iui_excel->SAMPLE_SOURCE->headerCellClass() ?>"><div id="elh_view_iui_excel_SAMPLE_SOURCE" class="view_iui_excel_SAMPLE_SOURCE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->SAMPLE_SOURCE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAMPLE_SOURCE" class="<?php echo $view_iui_excel->SAMPLE_SOURCE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->SAMPLE_SOURCE) ?>',1);"><div id="elh_view_iui_excel_SAMPLE_SOURCE" class="view_iui_excel_SAMPLE_SOURCE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->SAMPLE_SOURCE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->SAMPLE_SOURCE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->SAMPLE_SOURCE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->SPECIFIC_PROBLEMS) == "") { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_SPECIFIC_PROBLEMS" class="view_iui_excel_SPECIFIC_PROBLEMS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->SPECIFIC_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->SPECIFIC_PROBLEMS) ?>',1);"><div id="elh_view_iui_excel_SPECIFIC_PROBLEMS" class="view_iui_excel_SPECIFIC_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->SPECIFIC_PROBLEMS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->SPECIFIC_PROBLEMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->SPECIFIC_PROBLEMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->IMSC_1->Visible) { // IMSC_1 ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->IMSC_1) == "") { ?>
		<th data-name="IMSC_1" class="<?php echo $view_iui_excel->IMSC_1->headerCellClass() ?>"><div id="elh_view_iui_excel_IMSC_1" class="view_iui_excel_IMSC_1"><div class="ew-table-header-caption"><?php echo $view_iui_excel->IMSC_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_1" class="<?php echo $view_iui_excel->IMSC_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->IMSC_1) ?>',1);"><div id="elh_view_iui_excel_IMSC_1" class="view_iui_excel_IMSC_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->IMSC_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->IMSC_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->IMSC_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->IMSC_2->Visible) { // IMSC_2 ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->IMSC_2) == "") { ?>
		<th data-name="IMSC_2" class="<?php echo $view_iui_excel->IMSC_2->headerCellClass() ?>"><div id="elh_view_iui_excel_IMSC_2" class="view_iui_excel_IMSC_2"><div class="ew-table-header-caption"><?php echo $view_iui_excel->IMSC_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_2" class="<?php echo $view_iui_excel->IMSC_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->IMSC_2) ?>',1);"><div id="elh_view_iui_excel_IMSC_2" class="view_iui_excel_IMSC_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->IMSC_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->IMSC_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->IMSC_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->LIQUIFACTION_STORAGE) == "") { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_view_iui_excel_LIQUIFACTION_STORAGE" class="view_iui_excel_LIQUIFACTION_STORAGE"><div class="ew-table-header-caption"><?php echo $view_iui_excel->LIQUIFACTION_STORAGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->LIQUIFACTION_STORAGE) ?>',1);"><div id="elh_view_iui_excel_LIQUIFACTION_STORAGE" class="view_iui_excel_LIQUIFACTION_STORAGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->LIQUIFACTION_STORAGE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->LIQUIFACTION_STORAGE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->LIQUIFACTION_STORAGE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->IUI_PREP_METHOD) == "") { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $view_iui_excel->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_view_iui_excel_IUI_PREP_METHOD" class="view_iui_excel_IUI_PREP_METHOD"><div class="ew-table-header-caption"><?php echo $view_iui_excel->IUI_PREP_METHOD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $view_iui_excel->IUI_PREP_METHOD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->IUI_PREP_METHOD) ?>',1);"><div id="elh_view_iui_excel_IUI_PREP_METHOD" class="view_iui_excel_IUI_PREP_METHOD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->IUI_PREP_METHOD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->IUI_PREP_METHOD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->IUI_PREP_METHOD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->TIME_FROM_TRIGGER) == "") { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $view_iui_excel->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_view_iui_excel_TIME_FROM_TRIGGER" class="view_iui_excel_TIME_FROM_TRIGGER"><div class="ew-table-header-caption"><?php echo $view_iui_excel->TIME_FROM_TRIGGER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $view_iui_excel->TIME_FROM_TRIGGER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->TIME_FROM_TRIGGER) ?>',1);"><div id="elh_view_iui_excel_TIME_FROM_TRIGGER" class="view_iui_excel_TIME_FROM_TRIGGER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->TIME_FROM_TRIGGER->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->TIME_FROM_TRIGGER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->TIME_FROM_TRIGGER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->COLLECTION_TO_PREPARATION) == "") { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_view_iui_excel_COLLECTION_TO_PREPARATION" class="view_iui_excel_COLLECTION_TO_PREPARATION"><div class="ew-table-header-caption"><?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->COLLECTION_TO_PREPARATION) ?>',1);"><div id="elh_view_iui_excel_COLLECTION_TO_PREPARATION" class="view_iui_excel_COLLECTION_TO_PREPARATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->COLLECTION_TO_PREPARATION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->COLLECTION_TO_PREPARATION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->TIME_FROM_PREP_TO_INSEM) == "") { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_view_iui_excel_TIME_FROM_PREP_TO_INSEM" class="view_iui_excel_TIME_FROM_PREP_TO_INSEM"><div class="ew-table-header-caption"><?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->TIME_FROM_PREP_TO_INSEM) ?>',1);"><div id="elh_view_iui_excel_TIME_FROM_PREP_TO_INSEM" class="view_iui_excel_TIME_FROM_PREP_TO_INSEM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->TIME_FROM_PREP_TO_INSEM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->TIME_FROM_PREP_TO_INSEM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS) == "") { ?>
		<th data-name="SPECIFIC_MATERNAL_PROBLEMS" class="<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS" class="view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPECIFIC_MATERNAL_PROBLEMS" class="<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS) ?>',1);"><div id="elh_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS" class="view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->RESULTS->Visible) { // RESULTS ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->RESULTS) == "") { ?>
		<th data-name="RESULTS" class="<?php echo $view_iui_excel->RESULTS->headerCellClass() ?>"><div id="elh_view_iui_excel_RESULTS" class="view_iui_excel_RESULTS"><div class="ew-table-header-caption"><?php echo $view_iui_excel->RESULTS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULTS" class="<?php echo $view_iui_excel->RESULTS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->RESULTS) ?>',1);"><div id="elh_view_iui_excel_RESULTS" class="view_iui_excel_RESULTS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->RESULTS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->RESULTS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->RESULTS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->ONGOING_PREG) == "") { ?>
		<th data-name="ONGOING_PREG" class="<?php echo $view_iui_excel->ONGOING_PREG->headerCellClass() ?>"><div id="elh_view_iui_excel_ONGOING_PREG" class="view_iui_excel_ONGOING_PREG"><div class="ew-table-header-caption"><?php echo $view_iui_excel->ONGOING_PREG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ONGOING_PREG" class="<?php echo $view_iui_excel->ONGOING_PREG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->ONGOING_PREG) ?>',1);"><div id="elh_view_iui_excel_ONGOING_PREG" class="view_iui_excel_ONGOING_PREG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->ONGOING_PREG->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->ONGOING_PREG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->ONGOING_PREG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_iui_excel->EDD_Date->Visible) { // EDD_Date ?>
	<?php if ($view_iui_excel->sortUrl($view_iui_excel->EDD_Date) == "") { ?>
		<th data-name="EDD_Date" class="<?php echo $view_iui_excel->EDD_Date->headerCellClass() ?>"><div id="elh_view_iui_excel_EDD_Date" class="view_iui_excel_EDD_Date"><div class="ew-table-header-caption"><?php echo $view_iui_excel->EDD_Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD_Date" class="<?php echo $view_iui_excel->EDD_Date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_iui_excel->SortUrl($view_iui_excel->EDD_Date) ?>',1);"><div id="elh_view_iui_excel_EDD_Date" class="view_iui_excel_EDD_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_iui_excel->EDD_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_iui_excel->EDD_Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_iui_excel->EDD_Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_iui_excel_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_iui_excel->ExportAll && $view_iui_excel->isExport()) {
	$view_iui_excel_list->StopRec = $view_iui_excel_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_iui_excel_list->TotalRecs > $view_iui_excel_list->StartRec + $view_iui_excel_list->DisplayRecs - 1)
		$view_iui_excel_list->StopRec = $view_iui_excel_list->StartRec + $view_iui_excel_list->DisplayRecs - 1;
	else
		$view_iui_excel_list->StopRec = $view_iui_excel_list->TotalRecs;
}
$view_iui_excel_list->RecCnt = $view_iui_excel_list->StartRec - 1;
if ($view_iui_excel_list->Recordset && !$view_iui_excel_list->Recordset->EOF) {
	$view_iui_excel_list->Recordset->moveFirst();
	$selectLimit = $view_iui_excel_list->UseSelectLimit;
	if (!$selectLimit && $view_iui_excel_list->StartRec > 1)
		$view_iui_excel_list->Recordset->move($view_iui_excel_list->StartRec - 1);
} elseif (!$view_iui_excel->AllowAddDeleteRow && $view_iui_excel_list->StopRec == 0) {
	$view_iui_excel_list->StopRec = $view_iui_excel->GridAddRowCount;
}

// Initialize aggregate
$view_iui_excel->RowType = ROWTYPE_AGGREGATEINIT;
$view_iui_excel->resetAttributes();
$view_iui_excel_list->renderRow();
while ($view_iui_excel_list->RecCnt < $view_iui_excel_list->StopRec) {
	$view_iui_excel_list->RecCnt++;
	if ($view_iui_excel_list->RecCnt >= $view_iui_excel_list->StartRec) {
		$view_iui_excel_list->RowCnt++;

		// Set up key count
		$view_iui_excel_list->KeyCount = $view_iui_excel_list->RowIndex;

		// Init row class and style
		$view_iui_excel->resetAttributes();
		$view_iui_excel->CssClass = "";
		if ($view_iui_excel->isGridAdd()) {
		} else {
			$view_iui_excel_list->loadRowValues($view_iui_excel_list->Recordset); // Load row values
		}
		$view_iui_excel->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_iui_excel->RowAttrs = array_merge($view_iui_excel->RowAttrs, array('data-rowindex'=>$view_iui_excel_list->RowCnt, 'id'=>'r' . $view_iui_excel_list->RowCnt . '_view_iui_excel', 'data-rowtype'=>$view_iui_excel->RowType));

		// Render row
		$view_iui_excel_list->renderRow();

		// Render list options
		$view_iui_excel_list->renderListOptions();
?>
	<tr<?php echo $view_iui_excel->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_iui_excel_list->ListOptions->render("body", "left", $view_iui_excel_list->RowCnt);
?>
	<?php if ($view_iui_excel->NAME->Visible) { // NAME ?>
		<td data-name="NAME"<?php echo $view_iui_excel->NAME->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_NAME" class="view_iui_excel_NAME">
<span<?php echo $view_iui_excel->NAME->viewAttributes() ?>>
<?php echo $view_iui_excel->NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->HUSBAND_NAME->Visible) { // HUSBAND NAME ?>
		<td data-name="HUSBAND_NAME"<?php echo $view_iui_excel->HUSBAND_NAME->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_HUSBAND_NAME" class="view_iui_excel_HUSBAND_NAME">
<span<?php echo $view_iui_excel->HUSBAND_NAME->viewAttributes() ?>>
<?php echo $view_iui_excel->HUSBAND_NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID"<?php echo $view_iui_excel->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_CoupleID" class="view_iui_excel_CoupleID">
<span<?php echo $view_iui_excel->CoupleID->viewAttributes() ?>>
<?php echo $view_iui_excel->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->AGE____WIFE->Visible) { // AGE  - WIFE ?>
		<td data-name="AGE____WIFE"<?php echo $view_iui_excel->AGE____WIFE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_AGE____WIFE" class="view_iui_excel_AGE____WIFE">
<span<?php echo $view_iui_excel->AGE____WIFE->viewAttributes() ?>>
<?php echo $view_iui_excel->AGE____WIFE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->AGE__HUSBAND->Visible) { // AGE- HUSBAND ?>
		<td data-name="AGE__HUSBAND"<?php echo $view_iui_excel->AGE__HUSBAND->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_AGE__HUSBAND" class="view_iui_excel_AGE__HUSBAND">
<span<?php echo $view_iui_excel->AGE__HUSBAND->viewAttributes() ?>>
<?php echo $view_iui_excel->AGE__HUSBAND->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
		<td data-name="ANXIOUS_TO_CONCEIVE_FOR"<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR" class="view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR">
<span<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->viewAttributes() ?>>
<?php echo $view_iui_excel->ANXIOUS_TO_CONCEIVE_FOR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->AMH_28_NG2FML29->Visible) { // AMH ( NG/ML) ?>
		<td data-name="AMH_28_NG2FML29"<?php echo $view_iui_excel->AMH_28_NG2FML29->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_AMH_28_NG2FML29" class="view_iui_excel_AMH_28_NG2FML29">
<span<?php echo $view_iui_excel->AMH_28_NG2FML29->viewAttributes() ?>>
<?php echo $view_iui_excel->AMH_28_NG2FML29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<td data-name="TUBAL_PATENCY"<?php echo $view_iui_excel->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_TUBAL_PATENCY" class="view_iui_excel_TUBAL_PATENCY">
<span<?php echo $view_iui_excel->TUBAL_PATENCY->viewAttributes() ?>>
<?php echo $view_iui_excel->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->HSG->Visible) { // HSG ?>
		<td data-name="HSG"<?php echo $view_iui_excel->HSG->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_HSG" class="view_iui_excel_HSG">
<span<?php echo $view_iui_excel->HSG->viewAttributes() ?>>
<?php echo $view_iui_excel->HSG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->DHL->Visible) { // DHL ?>
		<td data-name="DHL"<?php echo $view_iui_excel->DHL->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_DHL" class="view_iui_excel_DHL">
<span<?php echo $view_iui_excel->DHL->viewAttributes() ?>>
<?php echo $view_iui_excel->DHL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<td data-name="UTERINE_PROBLEMS"<?php echo $view_iui_excel->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_UTERINE_PROBLEMS" class="view_iui_excel_UTERINE_PROBLEMS">
<span<?php echo $view_iui_excel->UTERINE_PROBLEMS->viewAttributes() ?>>
<?php echo $view_iui_excel->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<td data-name="W_COMORBIDS"<?php echo $view_iui_excel->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_W_COMORBIDS" class="view_iui_excel_W_COMORBIDS">
<span<?php echo $view_iui_excel->W_COMORBIDS->viewAttributes() ?>>
<?php echo $view_iui_excel->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<td data-name="H_COMORBIDS"<?php echo $view_iui_excel->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_H_COMORBIDS" class="view_iui_excel_H_COMORBIDS">
<span<?php echo $view_iui_excel->H_COMORBIDS->viewAttributes() ?>>
<?php echo $view_iui_excel->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<td data-name="SEXUAL_DYSFUNCTION"<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_SEXUAL_DYSFUNCTION" class="view_iui_excel_SEXUAL_DYSFUNCTION">
<span<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?php echo $view_iui_excel->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->PREV_IUI->Visible) { // PREV IUI ?>
		<td data-name="PREV_IUI"<?php echo $view_iui_excel->PREV_IUI->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_PREV_IUI" class="view_iui_excel_PREV_IUI">
<span<?php echo $view_iui_excel->PREV_IUI->viewAttributes() ?>>
<?php echo $view_iui_excel->PREV_IUI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->PREV_IVF->Visible) { // PREV_IVF ?>
		<td data-name="PREV_IVF"<?php echo $view_iui_excel->PREV_IVF->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_PREV_IVF" class="view_iui_excel_PREV_IVF">
<span<?php echo $view_iui_excel->PREV_IVF->viewAttributes() ?>>
<?php echo $view_iui_excel->PREV_IVF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->TABLETS->Visible) { // TABLETS ?>
		<td data-name="TABLETS"<?php echo $view_iui_excel->TABLETS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_TABLETS" class="view_iui_excel_TABLETS">
<span<?php echo $view_iui_excel->TABLETS->viewAttributes() ?>>
<?php echo $view_iui_excel->TABLETS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->INJTYPE->Visible) { // INJTYPE ?>
		<td data-name="INJTYPE"<?php echo $view_iui_excel->INJTYPE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_INJTYPE" class="view_iui_excel_INJTYPE">
<span<?php echo $view_iui_excel->INJTYPE->viewAttributes() ?>>
<?php echo $view_iui_excel->INJTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $view_iui_excel->LMP->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_LMP" class="view_iui_excel_LMP">
<span<?php echo $view_iui_excel->LMP->viewAttributes() ?>>
<?php echo $view_iui_excel->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->TRIGGERR->Visible) { // TRIGGERR ?>
		<td data-name="TRIGGERR"<?php echo $view_iui_excel->TRIGGERR->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_TRIGGERR" class="view_iui_excel_TRIGGERR">
<span<?php echo $view_iui_excel->TRIGGERR->viewAttributes() ?>>
<?php echo $view_iui_excel->TRIGGERR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<td data-name="TRIGGERDATE"<?php echo $view_iui_excel->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_TRIGGERDATE" class="view_iui_excel_TRIGGERDATE">
<span<?php echo $view_iui_excel->TRIGGERDATE->viewAttributes() ?>>
<?php echo $view_iui_excel->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<td data-name="FOLLICLE_STATUS"<?php echo $view_iui_excel->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_FOLLICLE_STATUS" class="view_iui_excel_FOLLICLE_STATUS">
<span<?php echo $view_iui_excel->FOLLICLE_STATUS->viewAttributes() ?>>
<?php echo $view_iui_excel->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<td data-name="NUMBER_OF_IUI"<?php echo $view_iui_excel->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_NUMBER_OF_IUI" class="view_iui_excel_NUMBER_OF_IUI">
<span<?php echo $view_iui_excel->NUMBER_OF_IUI->viewAttributes() ?>>
<?php echo $view_iui_excel->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->PROCEDURE->Visible) { // PROCEDURE ?>
		<td data-name="PROCEDURE"<?php echo $view_iui_excel->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_PROCEDURE" class="view_iui_excel_PROCEDURE">
<span<?php echo $view_iui_excel->PROCEDURE->viewAttributes() ?>>
<?php echo $view_iui_excel->PROCEDURE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<td data-name="LUTEAL_SUPPORT"<?php echo $view_iui_excel->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_LUTEAL_SUPPORT" class="view_iui_excel_LUTEAL_SUPPORT">
<span<?php echo $view_iui_excel->LUTEAL_SUPPORT->viewAttributes() ?>>
<?php echo $view_iui_excel->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->H2FD_SAMPLE->Visible) { // H/D SAMPLE ?>
		<td data-name="H2FD_SAMPLE"<?php echo $view_iui_excel->H2FD_SAMPLE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_H2FD_SAMPLE" class="view_iui_excel_H2FD_SAMPLE">
<span<?php echo $view_iui_excel->H2FD_SAMPLE->viewAttributes() ?>>
<?php echo $view_iui_excel->H2FD_SAMPLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->DONOR___I_D->Visible) { // DONOR - I.D ?>
		<td data-name="DONOR___I_D"<?php echo $view_iui_excel->DONOR___I_D->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_DONOR___I_D" class="view_iui_excel_DONOR___I_D">
<span<?php echo $view_iui_excel->DONOR___I_D->viewAttributes() ?>>
<?php echo $view_iui_excel->DONOR___I_D->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE"<?php echo $view_iui_excel->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_PREG_TEST_DATE" class="view_iui_excel_PREG_TEST_DATE">
<span<?php echo $view_iui_excel->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $view_iui_excel->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->COLLECTION__METHOD->Visible) { // COLLECTION  METHOD ?>
		<td data-name="COLLECTION__METHOD"<?php echo $view_iui_excel->COLLECTION__METHOD->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_COLLECTION__METHOD" class="view_iui_excel_COLLECTION__METHOD">
<span<?php echo $view_iui_excel->COLLECTION__METHOD->viewAttributes() ?>>
<?php echo $view_iui_excel->COLLECTION__METHOD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->SAMPLE_SOURCE->Visible) { // SAMPLE SOURCE ?>
		<td data-name="SAMPLE_SOURCE"<?php echo $view_iui_excel->SAMPLE_SOURCE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_SAMPLE_SOURCE" class="view_iui_excel_SAMPLE_SOURCE">
<span<?php echo $view_iui_excel->SAMPLE_SOURCE->viewAttributes() ?>>
<?php echo $view_iui_excel->SAMPLE_SOURCE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td data-name="SPECIFIC_PROBLEMS"<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_SPECIFIC_PROBLEMS" class="view_iui_excel_SPECIFIC_PROBLEMS">
<span<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?php echo $view_iui_excel->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->IMSC_1->Visible) { // IMSC_1 ?>
		<td data-name="IMSC_1"<?php echo $view_iui_excel->IMSC_1->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_IMSC_1" class="view_iui_excel_IMSC_1">
<span<?php echo $view_iui_excel->IMSC_1->viewAttributes() ?>>
<?php echo $view_iui_excel->IMSC_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->IMSC_2->Visible) { // IMSC_2 ?>
		<td data-name="IMSC_2"<?php echo $view_iui_excel->IMSC_2->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_IMSC_2" class="view_iui_excel_IMSC_2">
<span<?php echo $view_iui_excel->IMSC_2->viewAttributes() ?>>
<?php echo $view_iui_excel->IMSC_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td data-name="LIQUIFACTION_STORAGE"<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_LIQUIFACTION_STORAGE" class="view_iui_excel_LIQUIFACTION_STORAGE">
<span<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?php echo $view_iui_excel->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td data-name="IUI_PREP_METHOD"<?php echo $view_iui_excel->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_IUI_PREP_METHOD" class="view_iui_excel_IUI_PREP_METHOD">
<span<?php echo $view_iui_excel->IUI_PREP_METHOD->viewAttributes() ?>>
<?php echo $view_iui_excel->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td data-name="TIME_FROM_TRIGGER"<?php echo $view_iui_excel->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_TIME_FROM_TRIGGER" class="view_iui_excel_TIME_FROM_TRIGGER">
<span<?php echo $view_iui_excel->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?php echo $view_iui_excel->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td data-name="COLLECTION_TO_PREPARATION"<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_COLLECTION_TO_PREPARATION" class="view_iui_excel_COLLECTION_TO_PREPARATION">
<span<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?php echo $view_iui_excel->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td data-name="TIME_FROM_PREP_TO_INSEM"<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_TIME_FROM_PREP_TO_INSEM" class="view_iui_excel_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?php echo $view_iui_excel->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<td data-name="SPECIFIC_MATERNAL_PROBLEMS"<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS" class="view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS">
<span<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?php echo $view_iui_excel->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->RESULTS->Visible) { // RESULTS ?>
		<td data-name="RESULTS"<?php echo $view_iui_excel->RESULTS->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_RESULTS" class="view_iui_excel_RESULTS">
<span<?php echo $view_iui_excel->RESULTS->viewAttributes() ?>>
<?php echo $view_iui_excel->RESULTS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<td data-name="ONGOING_PREG"<?php echo $view_iui_excel->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_ONGOING_PREG" class="view_iui_excel_ONGOING_PREG">
<span<?php echo $view_iui_excel->ONGOING_PREG->viewAttributes() ?>>
<?php echo $view_iui_excel->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_iui_excel->EDD_Date->Visible) { // EDD_Date ?>
		<td data-name="EDD_Date"<?php echo $view_iui_excel->EDD_Date->cellAttributes() ?>>
<span id="el<?php echo $view_iui_excel_list->RowCnt ?>_view_iui_excel_EDD_Date" class="view_iui_excel_EDD_Date">
<span<?php echo $view_iui_excel->EDD_Date->viewAttributes() ?>>
<?php echo $view_iui_excel->EDD_Date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_iui_excel_list->ListOptions->render("body", "right", $view_iui_excel_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_iui_excel->isGridAdd())
		$view_iui_excel_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_iui_excel->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_iui_excel_list->Recordset)
	$view_iui_excel_list->Recordset->Close();
?>
<?php if (!$view_iui_excel->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_iui_excel->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_iui_excel_list->Pager)) $view_iui_excel_list->Pager = new NumericPager($view_iui_excel_list->StartRec, $view_iui_excel_list->DisplayRecs, $view_iui_excel_list->TotalRecs, $view_iui_excel_list->RecRange, $view_iui_excel_list->AutoHidePager) ?>
<?php if ($view_iui_excel_list->Pager->RecordCount > 0 && $view_iui_excel_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_iui_excel_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_iui_excel_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_iui_excel_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_iui_excel_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_iui_excel_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_iui_excel_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_iui_excel_list->pageUrl() ?>start=<?php echo $view_iui_excel_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_iui_excel_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_iui_excel_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_iui_excel_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_iui_excel_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_iui_excel_list->TotalRecs > 0 && (!$view_iui_excel_list->AutoHidePageSizeSelector || $view_iui_excel_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_iui_excel">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_iui_excel_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_iui_excel_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_iui_excel_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_iui_excel_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_iui_excel_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_iui_excel_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_iui_excel->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_iui_excel_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_iui_excel_list->TotalRecs == 0 && !$view_iui_excel->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_iui_excel_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_iui_excel_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_iui_excel->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_iui_excel->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_iui_excel", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_iui_excel_list->terminate();
?>