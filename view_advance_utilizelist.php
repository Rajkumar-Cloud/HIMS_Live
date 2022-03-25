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
$view_advance_utilize_list = new view_advance_utilize_list();

// Run the page
$view_advance_utilize_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_advance_utilize_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_advance_utilize->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_advance_utilizelist = currentForm = new ew.Form("fview_advance_utilizelist", "list");
fview_advance_utilizelist.formKeyCountName = '<?php echo $view_advance_utilize_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_advance_utilizelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_advance_utilizelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_advance_utilizelistsrch = currentSearchForm = new ew.Form("fview_advance_utilizelistsrch");

// Validate function for search
fview_advance_utilizelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Balance");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_advance_utilize->Balance->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_advance_utilizelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_advance_utilizelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_advance_utilizelistsrch.filterList = <?php echo $view_advance_utilize_list->getFilterList() ?>;
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
<?php if (!$view_advance_utilize->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_advance_utilize_list->TotalRecs > 0 && $view_advance_utilize_list->ExportOptions->visible()) { ?>
<?php $view_advance_utilize_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_advance_utilize_list->ImportOptions->visible()) { ?>
<?php $view_advance_utilize_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_advance_utilize_list->SearchOptions->visible()) { ?>
<?php $view_advance_utilize_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_advance_utilize_list->FilterOptions->visible()) { ?>
<?php $view_advance_utilize_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_advance_utilize_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_advance_utilize->isExport() && !$view_advance_utilize->CurrentAction) { ?>
<form name="fview_advance_utilizelistsrch" id="fview_advance_utilizelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_advance_utilize_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_advance_utilizelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_advance_utilize">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_advance_utilize_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_advance_utilize->RowType = ROWTYPE_SEARCH;

// Render row
$view_advance_utilize->resetAttributes();
$view_advance_utilize_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_advance_utilize->patientid->Visible) { // patientid ?>
	<div id="xsc_patientid" class="ew-cell form-group">
		<label for="x_patientid" class="ew-search-caption ew-label"><?php echo $view_advance_utilize->patientid->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patientid" id="z_patientid" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_advance_utilize" data-field="x_patientid" name="x_patientid" id="x_patientid" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_utilize->patientid->getPlaceHolder()) ?>" value="<?php echo $view_advance_utilize->patientid->EditValue ?>"<?php echo $view_advance_utilize->patientid->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_advance_utilize->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_advance_utilize->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_advance_utilize" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_advance_utilize->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_advance_utilize->PatientName->EditValue ?>"<?php echo $view_advance_utilize->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_advance_utilize->Balance->Visible) { // Balance ?>
	<div id="xsc_Balance" class="ew-cell form-group">
		<label for="x_Balance" class="ew-search-caption ew-label"><?php echo $view_advance_utilize->Balance->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Balance" id="z_Balance" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_advance_utilize->Balance->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_advance_utilize" data-field="x_Balance" name="x_Balance" id="x_Balance" size="30" placeholder="<?php echo HtmlEncode($view_advance_utilize->Balance->getPlaceHolder()) ?>" value="<?php echo $view_advance_utilize->Balance->EditValue ?>"<?php echo $view_advance_utilize->Balance->editAttributes() ?>>
</span>
		<span class="ew-search-cond btw1_Balance style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Balance style="d-none"">
<input type="text" data-table="view_advance_utilize" data-field="x_Balance" name="y_Balance" id="y_Balance" size="30" placeholder="<?php echo HtmlEncode($view_advance_utilize->Balance->getPlaceHolder()) ?>" value="<?php echo $view_advance_utilize->Balance->EditValue2 ?>"<?php echo $view_advance_utilize->Balance->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_advance_utilize_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_advance_utilize_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_advance_utilize_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_advance_utilize_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_advance_utilize_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_advance_utilize_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_advance_utilize_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_advance_utilize_list->showPageHeader(); ?>
<?php
$view_advance_utilize_list->showMessage();
?>
<?php if ($view_advance_utilize_list->TotalRecs > 0 || $view_advance_utilize->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_advance_utilize_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_advance_utilize">
<?php if (!$view_advance_utilize->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_advance_utilize->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_advance_utilize_list->Pager)) $view_advance_utilize_list->Pager = new NumericPager($view_advance_utilize_list->StartRec, $view_advance_utilize_list->DisplayRecs, $view_advance_utilize_list->TotalRecs, $view_advance_utilize_list->RecRange, $view_advance_utilize_list->AutoHidePager) ?>
<?php if ($view_advance_utilize_list->Pager->RecordCount > 0 && $view_advance_utilize_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_advance_utilize_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_utilize_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_advance_utilize_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_advance_utilize_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_advance_utilize_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_utilize_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_advance_utilize_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_advance_utilize_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_advance_utilize_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_advance_utilize_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_advance_utilize_list->TotalRecs > 0 && (!$view_advance_utilize_list->AutoHidePageSizeSelector || $view_advance_utilize_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_advance_utilize">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_advance_utilize_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_advance_utilize_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_advance_utilize_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_advance_utilize_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_advance_utilize_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_advance_utilize_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_advance_utilize->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_advance_utilize_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_advance_utilizelist" id="fview_advance_utilizelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_advance_utilize_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_advance_utilize_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_advance_utilize">
<div id="gmp_view_advance_utilize" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_advance_utilize_list->TotalRecs > 0 || $view_advance_utilize->isGridEdit()) { ?>
<table id="tbl_view_advance_utilizelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_advance_utilize_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_advance_utilize_list->renderListOptions();

// Render list options (header, left)
$view_advance_utilize_list->ListOptions->render("header", "left");
?>
<?php if ($view_advance_utilize->patientid->Visible) { // patientid ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->patientid) == "") { ?>
		<th data-name="patientid" class="<?php echo $view_advance_utilize->patientid->headerCellClass() ?>"><div id="elh_view_advance_utilize_patientid" class="view_advance_utilize_patientid"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->patientid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientid" class="<?php echo $view_advance_utilize->patientid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->patientid) ?>',1);"><div id="elh_view_advance_utilize_patientid" class="view_advance_utilize_patientid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->patientid->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->patientid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->patientid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_utilize->PatientName->Visible) { // PatientName ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_advance_utilize->PatientName->headerCellClass() ?>"><div id="elh_view_advance_utilize_PatientName" class="view_advance_utilize_PatientName"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_advance_utilize->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->PatientName) ?>',1);"><div id="elh_view_advance_utilize_PatientName" class="view_advance_utilize_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_utilize->mobile->Visible) { // mobile ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->mobile) == "") { ?>
		<th data-name="mobile" class="<?php echo $view_advance_utilize->mobile->headerCellClass() ?>"><div id="elh_view_advance_utilize_mobile" class="view_advance_utilize_mobile"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile" class="<?php echo $view_advance_utilize->mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->mobile) ?>',1);"><div id="elh_view_advance_utilize_mobile" class="view_advance_utilize_mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_utilize->Advance->Visible) { // Advance ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->Advance) == "") { ?>
		<th data-name="Advance" class="<?php echo $view_advance_utilize->Advance->headerCellClass() ?>"><div id="elh_view_advance_utilize_Advance" class="view_advance_utilize_Advance"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->Advance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Advance" class="<?php echo $view_advance_utilize->Advance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->Advance) ?>',1);"><div id="elh_view_advance_utilize_Advance" class="view_advance_utilize_Advance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->Advance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->Advance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->Advance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_utilize->Utilize->Visible) { // Utilize ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->Utilize) == "") { ?>
		<th data-name="Utilize" class="<?php echo $view_advance_utilize->Utilize->headerCellClass() ?>"><div id="elh_view_advance_utilize_Utilize" class="view_advance_utilize_Utilize"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->Utilize->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Utilize" class="<?php echo $view_advance_utilize->Utilize->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->Utilize) ?>',1);"><div id="elh_view_advance_utilize_Utilize" class="view_advance_utilize_Utilize">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->Utilize->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->Utilize->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->Utilize->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_utilize->Balance->Visible) { // Balance ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->Balance) == "") { ?>
		<th data-name="Balance" class="<?php echo $view_advance_utilize->Balance->headerCellClass() ?>"><div id="elh_view_advance_utilize_Balance" class="view_advance_utilize_Balance"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->Balance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Balance" class="<?php echo $view_advance_utilize->Balance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->Balance) ?>',1);"><div id="elh_view_advance_utilize_Balance" class="view_advance_utilize_Balance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->Balance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->Balance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->Balance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_utilize->HospID->Visible) { // HospID ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_advance_utilize->HospID->headerCellClass() ?>"><div id="elh_view_advance_utilize_HospID" class="view_advance_utilize_HospID"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_advance_utilize->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->HospID) ?>',1);"><div id="elh_view_advance_utilize_HospID" class="view_advance_utilize_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_advance_utilize->PatId->Visible) { // PatId ?>
	<?php if ($view_advance_utilize->sortUrl($view_advance_utilize->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_advance_utilize->PatId->headerCellClass() ?>"><div id="elh_view_advance_utilize_PatId" class="view_advance_utilize_PatId"><div class="ew-table-header-caption"><?php echo $view_advance_utilize->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_advance_utilize->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_advance_utilize->SortUrl($view_advance_utilize->PatId) ?>',1);"><div id="elh_view_advance_utilize_PatId" class="view_advance_utilize_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_advance_utilize->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_advance_utilize->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_advance_utilize->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_advance_utilize_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_advance_utilize->ExportAll && $view_advance_utilize->isExport()) {
	$view_advance_utilize_list->StopRec = $view_advance_utilize_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_advance_utilize_list->TotalRecs > $view_advance_utilize_list->StartRec + $view_advance_utilize_list->DisplayRecs - 1)
		$view_advance_utilize_list->StopRec = $view_advance_utilize_list->StartRec + $view_advance_utilize_list->DisplayRecs - 1;
	else
		$view_advance_utilize_list->StopRec = $view_advance_utilize_list->TotalRecs;
}
$view_advance_utilize_list->RecCnt = $view_advance_utilize_list->StartRec - 1;
if ($view_advance_utilize_list->Recordset && !$view_advance_utilize_list->Recordset->EOF) {
	$view_advance_utilize_list->Recordset->moveFirst();
	$selectLimit = $view_advance_utilize_list->UseSelectLimit;
	if (!$selectLimit && $view_advance_utilize_list->StartRec > 1)
		$view_advance_utilize_list->Recordset->move($view_advance_utilize_list->StartRec - 1);
} elseif (!$view_advance_utilize->AllowAddDeleteRow && $view_advance_utilize_list->StopRec == 0) {
	$view_advance_utilize_list->StopRec = $view_advance_utilize->GridAddRowCount;
}

// Initialize aggregate
$view_advance_utilize->RowType = ROWTYPE_AGGREGATEINIT;
$view_advance_utilize->resetAttributes();
$view_advance_utilize_list->renderRow();
while ($view_advance_utilize_list->RecCnt < $view_advance_utilize_list->StopRec) {
	$view_advance_utilize_list->RecCnt++;
	if ($view_advance_utilize_list->RecCnt >= $view_advance_utilize_list->StartRec) {
		$view_advance_utilize_list->RowCnt++;

		// Set up key count
		$view_advance_utilize_list->KeyCount = $view_advance_utilize_list->RowIndex;

		// Init row class and style
		$view_advance_utilize->resetAttributes();
		$view_advance_utilize->CssClass = "";
		if ($view_advance_utilize->isGridAdd()) {
		} else {
			$view_advance_utilize_list->loadRowValues($view_advance_utilize_list->Recordset); // Load row values
		}
		$view_advance_utilize->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_advance_utilize->RowAttrs = array_merge($view_advance_utilize->RowAttrs, array('data-rowindex'=>$view_advance_utilize_list->RowCnt, 'id'=>'r' . $view_advance_utilize_list->RowCnt . '_view_advance_utilize', 'data-rowtype'=>$view_advance_utilize->RowType));

		// Render row
		$view_advance_utilize_list->renderRow();

		// Render list options
		$view_advance_utilize_list->renderListOptions();
?>
	<tr<?php echo $view_advance_utilize->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_advance_utilize_list->ListOptions->render("body", "left", $view_advance_utilize_list->RowCnt);
?>
	<?php if ($view_advance_utilize->patientid->Visible) { // patientid ?>
		<td data-name="patientid"<?php echo $view_advance_utilize->patientid->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_patientid" class="view_advance_utilize_patientid">
<span<?php echo $view_advance_utilize->patientid->viewAttributes() ?>>
<?php echo $view_advance_utilize->patientid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_advance_utilize->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_advance_utilize->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_PatientName" class="view_advance_utilize_PatientName">
<span<?php echo $view_advance_utilize->PatientName->viewAttributes() ?>>
<?php echo $view_advance_utilize->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_advance_utilize->mobile->Visible) { // mobile ?>
		<td data-name="mobile"<?php echo $view_advance_utilize->mobile->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_mobile" class="view_advance_utilize_mobile">
<span<?php echo $view_advance_utilize->mobile->viewAttributes() ?>>
<?php echo $view_advance_utilize->mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_advance_utilize->Advance->Visible) { // Advance ?>
		<td data-name="Advance"<?php echo $view_advance_utilize->Advance->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_Advance" class="view_advance_utilize_Advance">
<span<?php echo $view_advance_utilize->Advance->viewAttributes() ?>>
<?php echo $view_advance_utilize->Advance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_advance_utilize->Utilize->Visible) { // Utilize ?>
		<td data-name="Utilize"<?php echo $view_advance_utilize->Utilize->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_Utilize" class="view_advance_utilize_Utilize">
<span<?php echo $view_advance_utilize->Utilize->viewAttributes() ?>>
<?php echo $view_advance_utilize->Utilize->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_advance_utilize->Balance->Visible) { // Balance ?>
		<td data-name="Balance"<?php echo $view_advance_utilize->Balance->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_Balance" class="view_advance_utilize_Balance">
<span<?php echo $view_advance_utilize->Balance->viewAttributes() ?>>
<?php echo $view_advance_utilize->Balance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_advance_utilize->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_advance_utilize->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_HospID" class="view_advance_utilize_HospID">
<span<?php echo $view_advance_utilize->HospID->viewAttributes() ?>>
<?php echo $view_advance_utilize->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_advance_utilize->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $view_advance_utilize->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_advance_utilize_list->RowCnt ?>_view_advance_utilize_PatId" class="view_advance_utilize_PatId">
<span<?php echo $view_advance_utilize->PatId->viewAttributes() ?>>
<?php echo $view_advance_utilize->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_advance_utilize_list->ListOptions->render("body", "right", $view_advance_utilize_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_advance_utilize->isGridAdd())
		$view_advance_utilize_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_advance_utilize->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_advance_utilize_list->Recordset)
	$view_advance_utilize_list->Recordset->Close();
?>
<?php if (!$view_advance_utilize->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_advance_utilize->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_advance_utilize_list->Pager)) $view_advance_utilize_list->Pager = new NumericPager($view_advance_utilize_list->StartRec, $view_advance_utilize_list->DisplayRecs, $view_advance_utilize_list->TotalRecs, $view_advance_utilize_list->RecRange, $view_advance_utilize_list->AutoHidePager) ?>
<?php if ($view_advance_utilize_list->Pager->RecordCount > 0 && $view_advance_utilize_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_advance_utilize_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_utilize_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_advance_utilize_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_advance_utilize_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_advance_utilize_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_advance_utilize_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_advance_utilize_list->pageUrl() ?>start=<?php echo $view_advance_utilize_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_advance_utilize_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_advance_utilize_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_advance_utilize_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_advance_utilize_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_advance_utilize_list->TotalRecs > 0 && (!$view_advance_utilize_list->AutoHidePageSizeSelector || $view_advance_utilize_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_advance_utilize">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_advance_utilize_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_advance_utilize_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_advance_utilize_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_advance_utilize_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_advance_utilize_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_advance_utilize_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_advance_utilize->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_advance_utilize_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_advance_utilize_list->TotalRecs == 0 && !$view_advance_utilize->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_advance_utilize_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_advance_utilize_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_advance_utilize->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_advance_utilize->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_advance_utilize", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_advance_utilize_list->terminate();
?>