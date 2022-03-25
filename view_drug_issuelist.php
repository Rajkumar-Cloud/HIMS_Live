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
$view_drug_issue_list = new view_drug_issue_list();

// Run the page
$view_drug_issue_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_drug_issue_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_drug_issue->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_drug_issuelist = currentForm = new ew.Form("fview_drug_issuelist", "list");
fview_drug_issuelist.formKeyCountName = '<?php echo $view_drug_issue_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_drug_issuelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_drug_issuelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_drug_issuelistsrch = currentSearchForm = new ew.Form("fview_drug_issuelistsrch");

// Validate function for search
fview_drug_issuelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_drug_issue->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_drug_issuelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_drug_issuelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_drug_issuelistsrch.filterList = <?php echo $view_drug_issue_list->getFilterList() ?>;
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
<?php if (!$view_drug_issue->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_drug_issue_list->TotalRecs > 0 && $view_drug_issue_list->ExportOptions->visible()) { ?>
<?php $view_drug_issue_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_drug_issue_list->ImportOptions->visible()) { ?>
<?php $view_drug_issue_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_drug_issue_list->SearchOptions->visible()) { ?>
<?php $view_drug_issue_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_drug_issue_list->FilterOptions->visible()) { ?>
<?php $view_drug_issue_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_drug_issue_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_drug_issue->isExport() && !$view_drug_issue->CurrentAction) { ?>
<form name="fview_drug_issuelistsrch" id="fview_drug_issuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_drug_issue_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_drug_issuelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_drug_issue">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_drug_issue_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_drug_issue->RowType = ROWTYPE_SEARCH;

// Render row
$view_drug_issue->resetAttributes();
$view_drug_issue_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_drug_issue->Doctor->Visible) { // Doctor ?>
	<div id="xsc_Doctor" class="ew-cell form-group">
		<label for="x_Doctor" class="ew-search-caption ew-label"><?php echo $view_drug_issue->Doctor->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_drug_issue" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_drug_issue->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_drug_issue->Doctor->EditValue ?>"<?php echo $view_drug_issue->Doctor->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_drug_issue->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_drug_issue->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_drug_issue" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_drug_issue->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_drug_issue->PatientName->EditValue ?>"<?php echo $view_drug_issue->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_drug_issue->Product->Visible) { // Product ?>
	<div id="xsc_Product" class="ew-cell form-group">
		<label for="x_Product" class="ew-search-caption ew-label"><?php echo $view_drug_issue->Product->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Product" id="z_Product" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_drug_issue" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_drug_issue->Product->getPlaceHolder()) ?>" value="<?php echo $view_drug_issue->Product->EditValue ?>"<?php echo $view_drug_issue->Product->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_drug_issue->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $view_drug_issue->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_drug_issue->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_drug_issue" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_drug_issue->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_drug_issue->createddatetime->EditValue ?>"<?php echo $view_drug_issue->createddatetime->editAttributes() ?>>
<?php if (!$view_drug_issue->createddatetime->ReadOnly && !$view_drug_issue->createddatetime->Disabled && !isset($view_drug_issue->createddatetime->EditAttrs["readonly"]) && !isset($view_drug_issue->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_drug_issuelistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="view_drug_issue" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_drug_issue->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_drug_issue->createddatetime->EditValue2 ?>"<?php echo $view_drug_issue->createddatetime->editAttributes() ?>>
<?php if (!$view_drug_issue->createddatetime->ReadOnly && !$view_drug_issue->createddatetime->Disabled && !isset($view_drug_issue->createddatetime->EditAttrs["readonly"]) && !isset($view_drug_issue->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_drug_issuelistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_drug_issue_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_drug_issue_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_drug_issue_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_drug_issue_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_drug_issue_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_drug_issue_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_drug_issue_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_drug_issue_list->showPageHeader(); ?>
<?php
$view_drug_issue_list->showMessage();
?>
<?php if ($view_drug_issue_list->TotalRecs > 0 || $view_drug_issue->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_drug_issue_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_drug_issue">
<?php if (!$view_drug_issue->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_drug_issue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_drug_issue_list->Pager)) $view_drug_issue_list->Pager = new NumericPager($view_drug_issue_list->StartRec, $view_drug_issue_list->DisplayRecs, $view_drug_issue_list->TotalRecs, $view_drug_issue_list->RecRange, $view_drug_issue_list->AutoHidePager) ?>
<?php if ($view_drug_issue_list->Pager->RecordCount > 0 && $view_drug_issue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_drug_issue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_drug_issue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_drug_issue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_drug_issue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_drug_issue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_drug_issue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_drug_issue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_drug_issue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_drug_issue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_drug_issue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_drug_issue_list->TotalRecs > 0 && (!$view_drug_issue_list->AutoHidePageSizeSelector || $view_drug_issue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_drug_issue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_drug_issue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_drug_issue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_drug_issue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_drug_issue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_drug_issue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_drug_issue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_drug_issue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_drug_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_drug_issuelist" id="fview_drug_issuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_drug_issue_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_drug_issue_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_drug_issue">
<div id="gmp_view_drug_issue" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_drug_issue_list->TotalRecs > 0 || $view_drug_issue->isGridEdit()) { ?>
<table id="tbl_view_drug_issuelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_drug_issue_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_drug_issue_list->renderListOptions();

// Render list options (header, left)
$view_drug_issue_list->ListOptions->render("header", "left");
?>
<?php if ($view_drug_issue->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $view_drug_issue->BILLNO->headerCellClass() ?>"><div id="elh_view_drug_issue_BILLNO" class="view_drug_issue_BILLNO"><div class="ew-table-header-caption"><?php echo $view_drug_issue->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $view_drug_issue->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->BILLNO) ?>',1);"><div id="elh_view_drug_issue_BILLNO" class="view_drug_issue_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->Doctor->Visible) { // Doctor ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_drug_issue->Doctor->headerCellClass() ?>"><div id="elh_view_drug_issue_Doctor" class="view_drug_issue_Doctor"><div class="ew-table-header-caption"><?php echo $view_drug_issue->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_drug_issue->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->Doctor) ?>',1);"><div id="elh_view_drug_issue_Doctor" class="view_drug_issue_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->PatientId->Visible) { // PatientId ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_drug_issue->PatientId->headerCellClass() ?>"><div id="elh_view_drug_issue_PatientId" class="view_drug_issue_PatientId"><div class="ew-table-header-caption"><?php echo $view_drug_issue->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_drug_issue->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->PatientId) ?>',1);"><div id="elh_view_drug_issue_PatientId" class="view_drug_issue_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->PatientName->Visible) { // PatientName ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_drug_issue->PatientName->headerCellClass() ?>"><div id="elh_view_drug_issue_PatientName" class="view_drug_issue_PatientName"><div class="ew-table-header-caption"><?php echo $view_drug_issue->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_drug_issue->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->PatientName) ?>',1);"><div id="elh_view_drug_issue_PatientName" class="view_drug_issue_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->Product->Visible) { // Product ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_drug_issue->Product->headerCellClass() ?>"><div id="elh_view_drug_issue_Product" class="view_drug_issue_Product"><div class="ew-table-header-caption"><?php echo $view_drug_issue->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_drug_issue->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->Product) ?>',1);"><div id="elh_view_drug_issue_Product" class="view_drug_issue_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->Product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->Product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->IQ->Visible) { // IQ ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_drug_issue->IQ->headerCellClass() ?>"><div id="elh_view_drug_issue_IQ" class="view_drug_issue_IQ"><div class="ew-table-header-caption"><?php echo $view_drug_issue->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_drug_issue->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->IQ) ?>',1);"><div id="elh_view_drug_issue_IQ" class="view_drug_issue_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->IQ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->IQ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->Mfg->Visible) { // Mfg ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $view_drug_issue->Mfg->headerCellClass() ?>"><div id="elh_view_drug_issue_Mfg" class="view_drug_issue_Mfg"><div class="ew-table-header-caption"><?php echo $view_drug_issue->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $view_drug_issue->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->Mfg) ?>',1);"><div id="elh_view_drug_issue_Mfg" class="view_drug_issue_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->Mfg->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->Mfg->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_drug_issue->BATCHNO->headerCellClass() ?>"><div id="elh_view_drug_issue_BATCHNO" class="view_drug_issue_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_drug_issue->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_drug_issue->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->BATCHNO) ?>',1);"><div id="elh_view_drug_issue_BATCHNO" class="view_drug_issue_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->BATCHNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->BATCHNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_drug_issue->EXPDT->headerCellClass() ?>"><div id="elh_view_drug_issue_EXPDT" class="view_drug_issue_EXPDT"><div class="ew-table-header-caption"><?php echo $view_drug_issue->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_drug_issue->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->EXPDT) ?>',1);"><div id="elh_view_drug_issue_EXPDT" class="view_drug_issue_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->EXPDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->EXPDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_drug_issue->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_drug_issue->sortUrl($view_drug_issue->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_drug_issue->createddatetime->headerCellClass() ?>"><div id="elh_view_drug_issue_createddatetime" class="view_drug_issue_createddatetime"><div class="ew-table-header-caption"><?php echo $view_drug_issue->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_drug_issue->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_drug_issue->SortUrl($view_drug_issue->createddatetime) ?>',1);"><div id="elh_view_drug_issue_createddatetime" class="view_drug_issue_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_drug_issue->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_drug_issue->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_drug_issue->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_drug_issue_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_drug_issue->ExportAll && $view_drug_issue->isExport()) {
	$view_drug_issue_list->StopRec = $view_drug_issue_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_drug_issue_list->TotalRecs > $view_drug_issue_list->StartRec + $view_drug_issue_list->DisplayRecs - 1)
		$view_drug_issue_list->StopRec = $view_drug_issue_list->StartRec + $view_drug_issue_list->DisplayRecs - 1;
	else
		$view_drug_issue_list->StopRec = $view_drug_issue_list->TotalRecs;
}
$view_drug_issue_list->RecCnt = $view_drug_issue_list->StartRec - 1;
if ($view_drug_issue_list->Recordset && !$view_drug_issue_list->Recordset->EOF) {
	$view_drug_issue_list->Recordset->moveFirst();
	$selectLimit = $view_drug_issue_list->UseSelectLimit;
	if (!$selectLimit && $view_drug_issue_list->StartRec > 1)
		$view_drug_issue_list->Recordset->move($view_drug_issue_list->StartRec - 1);
} elseif (!$view_drug_issue->AllowAddDeleteRow && $view_drug_issue_list->StopRec == 0) {
	$view_drug_issue_list->StopRec = $view_drug_issue->GridAddRowCount;
}

// Initialize aggregate
$view_drug_issue->RowType = ROWTYPE_AGGREGATEINIT;
$view_drug_issue->resetAttributes();
$view_drug_issue_list->renderRow();
while ($view_drug_issue_list->RecCnt < $view_drug_issue_list->StopRec) {
	$view_drug_issue_list->RecCnt++;
	if ($view_drug_issue_list->RecCnt >= $view_drug_issue_list->StartRec) {
		$view_drug_issue_list->RowCnt++;

		// Set up key count
		$view_drug_issue_list->KeyCount = $view_drug_issue_list->RowIndex;

		// Init row class and style
		$view_drug_issue->resetAttributes();
		$view_drug_issue->CssClass = "";
		if ($view_drug_issue->isGridAdd()) {
		} else {
			$view_drug_issue_list->loadRowValues($view_drug_issue_list->Recordset); // Load row values
		}
		$view_drug_issue->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_drug_issue->RowAttrs = array_merge($view_drug_issue->RowAttrs, array('data-rowindex'=>$view_drug_issue_list->RowCnt, 'id'=>'r' . $view_drug_issue_list->RowCnt . '_view_drug_issue', 'data-rowtype'=>$view_drug_issue->RowType));

		// Render row
		$view_drug_issue_list->renderRow();

		// Render list options
		$view_drug_issue_list->renderListOptions();
?>
	<tr<?php echo $view_drug_issue->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_drug_issue_list->ListOptions->render("body", "left", $view_drug_issue_list->RowCnt);
?>
	<?php if ($view_drug_issue->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $view_drug_issue->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_BILLNO" class="view_drug_issue_BILLNO">
<span<?php echo $view_drug_issue->BILLNO->viewAttributes() ?>>
<?php echo $view_drug_issue->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_drug_issue->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_Doctor" class="view_drug_issue_Doctor">
<span<?php echo $view_drug_issue->Doctor->viewAttributes() ?>>
<?php echo $view_drug_issue->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_drug_issue->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_PatientId" class="view_drug_issue_PatientId">
<span<?php echo $view_drug_issue->PatientId->viewAttributes() ?>>
<?php echo $view_drug_issue->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_drug_issue->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_PatientName" class="view_drug_issue_PatientName">
<span<?php echo $view_drug_issue->PatientName->viewAttributes() ?>>
<?php echo $view_drug_issue->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->Product->Visible) { // Product ?>
		<td data-name="Product"<?php echo $view_drug_issue->Product->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_Product" class="view_drug_issue_Product">
<span<?php echo $view_drug_issue->Product->viewAttributes() ?>>
<?php echo $view_drug_issue->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->IQ->Visible) { // IQ ?>
		<td data-name="IQ"<?php echo $view_drug_issue->IQ->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_IQ" class="view_drug_issue_IQ">
<span<?php echo $view_drug_issue->IQ->viewAttributes() ?>>
<?php echo $view_drug_issue->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg"<?php echo $view_drug_issue->Mfg->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_Mfg" class="view_drug_issue_Mfg">
<span<?php echo $view_drug_issue->Mfg->viewAttributes() ?>>
<?php echo $view_drug_issue->Mfg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO"<?php echo $view_drug_issue->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_BATCHNO" class="view_drug_issue_BATCHNO">
<span<?php echo $view_drug_issue->BATCHNO->viewAttributes() ?>>
<?php echo $view_drug_issue->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT"<?php echo $view_drug_issue->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_EXPDT" class="view_drug_issue_EXPDT">
<span<?php echo $view_drug_issue->EXPDT->viewAttributes() ?>>
<?php echo $view_drug_issue->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_drug_issue->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_drug_issue->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_drug_issue_list->RowCnt ?>_view_drug_issue_createddatetime" class="view_drug_issue_createddatetime">
<span<?php echo $view_drug_issue->createddatetime->viewAttributes() ?>>
<?php echo $view_drug_issue->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_drug_issue_list->ListOptions->render("body", "right", $view_drug_issue_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_drug_issue->isGridAdd())
		$view_drug_issue_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_drug_issue->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_drug_issue_list->Recordset)
	$view_drug_issue_list->Recordset->Close();
?>
<?php if (!$view_drug_issue->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_drug_issue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_drug_issue_list->Pager)) $view_drug_issue_list->Pager = new NumericPager($view_drug_issue_list->StartRec, $view_drug_issue_list->DisplayRecs, $view_drug_issue_list->TotalRecs, $view_drug_issue_list->RecRange, $view_drug_issue_list->AutoHidePager) ?>
<?php if ($view_drug_issue_list->Pager->RecordCount > 0 && $view_drug_issue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_drug_issue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_drug_issue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_drug_issue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_drug_issue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_drug_issue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_drug_issue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_drug_issue_list->pageUrl() ?>start=<?php echo $view_drug_issue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_drug_issue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_drug_issue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_drug_issue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_drug_issue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_drug_issue_list->TotalRecs > 0 && (!$view_drug_issue_list->AutoHidePageSizeSelector || $view_drug_issue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_drug_issue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_drug_issue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_drug_issue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_drug_issue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_drug_issue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_drug_issue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_drug_issue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_drug_issue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_drug_issue_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_drug_issue_list->TotalRecs == 0 && !$view_drug_issue->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_drug_issue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_drug_issue_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_drug_issue->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_drug_issue->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_drug_issue", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_drug_issue_list->terminate();
?>